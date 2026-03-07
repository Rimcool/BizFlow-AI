<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Business;
use App\Models\GeneratedSite;
use App\Models\BusinessDetail;
use App\Models\Product;
use App\Models\Page;
use Illuminate\Support\Facades\Mail;
use App\Mail\BusinessSubmitted;
use App\Mail\SeoRecommendations;
use App\Mail\MarketingTips;
use App\Mail\BusinessAdvice;
use App\Mail\WebsiteCreated;
use App\Services\MarketingPdfService;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Contact;

class BusinessController extends Controller
{
    protected $marketingPdfService;
    
    public function __construct(MarketingPdfService $marketingPdfService)
    {
        $this->marketingPdfService = $marketingPdfService;
    }

    public function show()
    {
        return view('index');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'industry' => 'required|string',
            'target' => 'required|string',
            'style' => 'nullable|string',
            'color' => 'nullable|string',
            'products' => 'required|string',
            'goal' => 'required|string',
            'email' => 'required|email',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Only add user_id if the user is authenticated
        if (auth()->check()) {
            $validated['user_id'] = auth()->id();
        }

        // Handle logo upload
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logos', 'public');
            $validated['logo'] = basename($logoPath);
        }

        $business = Business::create($validated);

        // Generate sample products FIRST (before website generation)
        $this->generateSampleProducts($business);

        // Generate marketing PDF
        $pdfPath = $this->marketingPdfService->generateMarketingGuide($business);

        // Generate the website
        $siteUrl = $this->performSiteGeneration($business);

        // Create business details with AI-generated content
        $seoPlan = $this->generateSeoPlan($business);
        $marketingPlan = $this->generateMarketingPlan($business);
        $managementTips = $this->generateManagementTips($business);
        $chatbotPrompt = $this->setupChatbot($business);
        
        BusinessDetail::create([
            'business_id' => $business->id,
            'seo_plan' => $seoPlan,
            'marketing_plan' => $marketingPlan,
            'management_tips' => $managementTips,
            'chatbot_prompt' => $chatbotPrompt,
        ]);

        // Generate default pages
        $this->generateDefaultPages($business);

        // Send confirmation emails with PDF attachment
        Mail::to($validated['email'])->queue(new BusinessSubmitted($business));
        
        // Send website creation email with PDF
        Mail::to($validated['email'])->queue(new WebsiteCreated($business, $siteUrl, $pdfPath));
        
        // Send SEO recommendations email
        $seoRecommendations = $this->generateSeoRecommendations($business);
        Mail::to($validated['email'])->queue(new SeoRecommendations($business, $seoRecommendations));
        
        // Send marketing tips email
        $marketingTips = $this->generateMarketingTipsData($business);
        Mail::to($validated['email'])->queue(new MarketingTips($business, $marketingTips));
        
        // Send business advice email
        $businessAdvice = $this->generateBusinessAdviceData($business);
        Mail::to($validated['email'])->queue(new BusinessAdvice($business, $businessAdvice));

        // Redirect to progress page
        return redirect()->route('business.progress', $business->id);
    }

    public function showPreview(Business $business)
    {
        return view('preview-teaser', compact('business'));
    }
    
    public function preview(Business $business)
    {
        return view('preview', compact('business'));
    }

    public function progress(Business $business)
    {
        return view('progress', compact('business'));
    }

    public function downloadMarketingGuide($id)
    {
        $business = Business::findOrFail($id);
        $filename = "marketing-guides/{$business->id}-marketing-guide.pdf";
        
        // Check if file exists
        if (!Storage::exists($filename)) {
            // Generate the PDF if it doesn't exist
            $pdfPath = $this->marketingPdfService->generateMarketingGuide($business);
        } else {
            $pdfPath = $filename;
        }
        
        // Check again if file exists after generation attempt
        if (Storage::exists($pdfPath)) {
            return Storage::download($pdfPath, "{$business->name}-marketing-guide.pdf");
        }
        
        // If PDF still doesn't exist, return an error
        return response()->json([
            'error' => 'Marketing guide not found. Please try again later.'
        ], 404);
    }

    public function generateStaticSite(Business $business)
    {
        try {
            // Generate the complete website
            $this->performSiteGeneration($business);

            // Return JSON response for AJAX requests
            if (request()->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Website generated successfully',
                    'url' => url("sites/{$business->id}")
                ]);
            }

            // Redirect to the actual generated site for normal requests
            return redirect()->route('preview', $business->id);

        } catch (\Exception $e) {
            if (request()->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => $e->getMessage()
                ], 500);
            }
            
            return back()->with('error', 'Failed to generate website: ' . $e->getMessage());
        }
    }

    private function generateWebsiteContent(Business $business)
    {
        return [
            'hero_title' => "Welcome to {$business->name}",
            'hero_tagline' => "Empowering {$business->target} with {$business->products}",
            'about_text' => $this->generateAboutContent($business),
            'cta_text' => "Get Started with {$business->name} today!",
            'logo' => $business->logo ? asset('storage/logos/' . $business->logo) : null,
            'has_logo' => !empty($business->logo),
        ];
    }

    private function performSiteGeneration(Business $business)
    {
        $template = $this->selectTemplate($business);

        // Get products for THIS business
        $products = Product::where('business_id', $business->id)->get();

        // Get template-specific styles
        $templateStyles = $this->getTemplateStyles($business);

        // Render with THIS business's data
        $rendered = view($template, [
            'business' => $business,
            'products' => $products,
            'templateStyles' => $templateStyles,
        ])->render();

        // Create directory if it doesn't exist
        $sitePath = public_path("sites/{$business->id}");
        if (!file_exists($sitePath)) {
            mkdir($sitePath, 0755, true);
        }

        // Save HTML file - overwrite if exists
        file_put_contents("{$sitePath}/index.html", $rendered);

        // Copy logo to site folder if exists
        if ($business->logo) {
            $logoPath = storage_path("app/public/logos/{$business->logo}");
            if (file_exists($logoPath)) {
                $logoExtension = pathinfo($business->logo, PATHINFO_EXTENSION);
                copy($logoPath, "{$sitePath}/logo.{$logoExtension}");
            }
        }

        $siteUrl = url("sites/{$business->id}");

        // Update or create in DB to ensure we have the latest data
        GeneratedSite::updateOrCreate(
            ['business_id' => $business->id],
            [
                'site_url' => $siteUrl,
                'seo_plan' => $this->generateSeoPlan($business),
                'marketing_plan' => $this->generateMarketingPlan($business),
                'management_tips' => $this->generateManagementTips($business),
                'chatbot_details' => $this->setupChatbot($business),
            ]
        );

        return $siteUrl;
    }

    private function selectTemplate($business)
    {
        $style = strtolower($business->style ?? '');
        
        if (strpos($style, 'minimal') !== false) {
            return 'templates.minimal';
        } elseif (strpos($style, 'luxury') !== false) {
            return 'templates.luxury';
        } elseif (strpos($style, 'vibrant') !== false) {
            return 'templates.vibrant';
        } elseif (strpos($style, 'playful') !== false) {
            return 'templates.playful';
        } elseif (strpos($style, 'dark') !== false) {
            return 'templates.dark';
        } elseif (strpos($style, 'aesthetic') !== false) {
            return 'templates.aesthetic';
        } elseif (strpos($style, 'girly') !== false) {
            return 'templates.girly';
        } elseif (strpos($style, 'modern') !== false) {
            return 'templates.modern';
        } elseif (strpos($style, 'professional') !== false) {
            return 'templates.professional';
        } elseif (strpos($style, 'eco') !== false || strpos($style, 'green') !== false) {
            return 'templates.eco';
        } elseif (strpos($style, 'tech') !== false || strpos($style, 'futuristic') !== false) {
            return 'templates.tech';
        } elseif (strpos($style, 'vintage') !== false || strpos($style, 'retro') !== false) {
            return 'templates.vintage';
        } elseif (strpos($style, 'artistic') !== false || strpos($style, 'creative') !== false) {
            return 'templates.artistic';
        } elseif (strpos($style, 'minimalist') !== false) {
            return 'templates.minimalist';
        } elseif (strpos($style, 'bold') !== false || strpos($style, 'colorblock') !== false) {
            return 'templates.colorblock';
        } elseif (strpos($style, 'handmade') !== false || strpos($style, 'artisanal') !== false) {
            return 'templates.handmade';
        } elseif (strpos($style, 'luxury gold') !== false || strpos($style, 'gold') !== false) {
            return 'templates.luxurygold';
        } elseif (strpos($style, 'kids') !== false || strpos($style, 'children') !== false) {
            return 'templates.kids';
        } elseif (strpos($style, 'health') !== false || strpos($style, 'wellness') !== false) {
            return 'templates.health';
        } elseif (strpos($style, 'industrial') !== false) {
            return 'templates.industrial';
        } elseif (strpos($style, 'travel') !== false || strpos($style, 'adventure') !== false) {
            return 'templates.travel';
        } elseif (strpos($style, 'food') !== false || strpos($style, 'restaurant') !== false) {
            return 'templates.food';
        } elseif (strpos($style, 'sports') !== false || strpos($style, 'athletic') !== false) {
            return 'templates.sports';
        } elseif (strpos($style, 'educational') !== false || strpos($style, 'academic') !== false) {
            return 'templates.educational';
        } elseif (strpos($style, 'music') !== false || strpos($style, 'entertainment') !== false) {
            return 'templates.music';
        } else {
            return 'templates.minimal'; // Default template
        }
    }

    private function getTemplateStyles($business)
    {
        $style = strtolower($business->style ?? '');
        
        $styles = [
            'background' => '#ffffff',
            'headerBackground' => 'white',
            'headerShadow' => '0 2px 10px rgba(0,0,0,0.1)',
            'custom_css' => ''
        ];
        
        if (strpos($style, 'dark') !== false) {
            $styles['background'] = '#1a1a1a';
            $styles['headerBackground'] = '#2d2d2d';
            $styles['headerShadow'] = '0 2px 10px rgba(0,0,0,0.3)';
            $styles['custom_css'] = 'body { color: #f0f0f0; }';
        } elseif (strpos($style, 'minimal') !== false) {
            $styles['headerShadow'] = '0 1px 3px rgba(0,0,0,0.05)';
            $styles['custom_css'] = '.nav-links a { font-weight: 400; }';
        }
        
        return $styles;
    }

    private function generateSampleProducts($business)
    {
        $products = explode(',', $business->products);
        
        foreach ($products as $product) {
            Product::create([
                'business_id' => $business->id,
                'name' => trim($product),
                'description' => "High-quality " . trim($product) . " for " . $business->target,
                'price' => rand(10, 200),
                'stock' => rand(10, 100),
                'image' => $this->generateProductImage(trim($product), $business->color)
            ]);
        }
    }

    private function generateProductImage($productName, $color)
    {
        // Generate a placeholder image with the product name and business color
        $colorHex = str_replace('#', '', $color ?? '3A86FF');
        return "https://via.placeholder.com/300x200/{$colorHex}/FFFFFF?text=" . urlencode($productName);
    }

    private function generateDefaultPages($business)
    {
        $pages = [
            [
                'title' => 'About Us',
                'slug' => 'about',
                'content' => $this->generateAboutContent($business),
                'order' => 1
            ],
            [
                'title' => 'Contact Us',
                'slug' => 'contact',
                'content' => $this->generateContactContent($business),
                'order' => 2
            ],
            [
                'title' => 'Shipping Policy',
                'slug' => 'shipping',
                'content' => $this->generateShippingContent($business),
                'order' => 3
            ],
            [
                'title' => 'Privacy Policy',
                'slug' => 'privacy',
                'content' => $this->generatePrivacyContent($business),
                'order' => 4
            ]
        ];

        foreach ($pages as $page) {
            Page::create(array_merge($page, ['business_id' => $business->id]));
        }
    }

    private function generateSeoPlan($business)
    {
        return "## SEO Strategy for {$business->name}\n\n**Primary Keywords:** {$business->industry} {$business->target}\n**Meta Description:** Premium {$business->products} for {$business->target}\n**Content Strategy:** Blog about {$business->industry} trends\n**Technical SEO:** Optimized for mobile, fast loading\n**Local SEO:** Google Business Profile optimization";
    }

    private function generateMarketingPlan($business)
    {
        return "## Marketing Plan for {$business->name}\n\n**Social Media:** Instagram, Facebook targeting {$business->target}\n**Email Marketing:** Weekly newsletters about {$business->products}\n**PPC Ads:** Google Ads for '{$business->industry} near me'\n**Influencers:** Collaborate with {$business->target} influencers\n**Promotions:** Seasonal discounts and loyalty program";
    }

    private function generateManagementTips($business)
    {
        return "## Business Management Tips for {$business->name}\n\n**Inventory Management:** \n- Track best-selling {$business->products} regularly\n- Maintain optimal stock levels for {$business->target} preferences\n- Use inventory management software for {$business->industry}\n\n**Customer Service:**\n- Respond to inquiries within 24 hours\n- Implement a hassle-free return policy\n- Collect and act on customer feedback\n\n**Financial Management:**\n- Monitor cash flow weekly\n- Set aside 20% of profits for taxes\n- Track expenses related to {$business->products}\n\n**Growth Strategies:**\n- Expand product line based on {$business->target} feedback\n- Explore partnerships with complementary {$business->industry} businesses\n- Consider seasonal promotions for {$business->products}";
    }

    private function setupChatbot($business)
    {
        return "## AI Chatbot Configuration for {$business->name}\n\n**Purpose:** Assist customers with questions about {$business->products}\n**Knowledge Base:** \n- Product information: {$business->products}\n- Target audience: {$business->target}\n- Industry expertise: {$business->industry}\n\n**Common Queries:**\n- Product availability and pricing\n- Shipping and return policies\n- Custom orders for {$business->products}\n- Recommendations for {$business->target}\n\n**Personality:** \n- Friendly and helpful\n- Knowledgeable about {$business->industry}\n- Reflects the {$business->style} style of the brand\n\n**Integration:**\n- Available on all pages of the website\n- Can escalate to human support when needed\n- Collects customer feedback for business improvement";
    }

    private function generateAboutContent($business)
    {
        return "Welcome to {$business->name}, your go-to destination for premium {$business->products}. Founded with the vision to serve {$business->target}, we pride ourselves on quality and customer satisfaction.";
    }

    private function generateContactContent($business)
    {
        return "Have questions? Reach out to us at contact@{$business->name}.com or call us at (123) 456-7890. We're here to help!";
    }

    private function generateShippingContent($business)
    {
        return "We offer worldwide shipping on all orders. Orders are processed within 2-3 business days and delivery times vary based on location.";
    }

    private function generatePrivacyContent($business)
    {
        return "{$business->name} is committed to protecting your privacy. We do not share your information with third parties and use it solely to improve your shopping experience.";
    }
    
    // New methods for email content generation
    
    private function generateSeoRecommendations($business)
    {
        return [
            [
                'title' => 'Keyword Optimization',
                'description' => 'Your website could benefit from better keyword targeting for "' . $business->industry . '".',
                'action' => 'Add these keywords to your product descriptions and page titles: "' . $business->industry . '", "' . $business->products . '", "' . $business->target . '"'
            ],
            [
                'title' => 'Meta Descriptions',
                'description' => 'Several pages are missing meta descriptions which help with click-through rates.',
                'action' => 'Add compelling meta descriptions to all your product pages (150-160 characters).'
            ],
            [
                'title' => 'Image Optimization',
                'description' => 'Your product images could be better optimized for faster loading.',
                'action' => 'Compress images and add alt text with relevant keywords like "' . $business->products . ' for ' . $business->target . '"'
            ],
            [
                'title' => 'Mobile Optimization',
                'description' => 'Ensure your website is fully responsive on all mobile devices.',
                'action' => 'Test your site on various screen sizes and fix any layout issues.'
            ]
        ];
    }
    
    private function generateMarketingTipsData($business)
    {
        return [
            [
                'title' => 'Social Media Strategy',
                'description' => 'Create a consistent posting schedule on platforms where your target audience (' . $business->target . ') is most active.',
                'platform' => 'Instagram, Facebook, TikTok'
            ],
            [
                'title' => 'Email Marketing Campaign',
                'description' => 'Start building an email list to promote new products and special offers to interested customers.',
                'platform' => 'Brevo, Mailchimp'
            ],
            [
                'title' => 'Content Marketing',
                'description' => 'Create blog content around ' . $business->industry . ' to attract organic traffic and establish authority.',
                'platform' => 'Your website blog, Medium, LinkedIn'
            ],
            [
                'title' => 'Influencer Collaborations',
                'description' => 'Partner with micro-influencers who appeal to your target audience of ' . $business->target . '.',
                'platform' => 'Instagram, YouTube, TikTok'
            ]
        ];
    }
    
    private function generateBusinessAdviceData($business)
    {
        return [
            [
                'area' => 'Inventory Management',
                'advice' => 'Track your best-selling ' . $business->products . ' and ensure you maintain adequate stock levels to meet demand.',
                'resources' => 'Use our inventory tracking tools to automate stock management'
            ],
            [
                'area' => 'Customer Service',
                'advice' => 'Implement a system for quickly responding to customer inquiries to improve satisfaction and retention.',
                'resources' => 'Set up automated responses for common questions using our AI chatbot'
            ],
            [
                'area' => 'Financial Planning',
                'advice' => 'Set aside 20-30% of profits for taxes and business reinvestment to ensure sustainable growth.',
                'resources' => 'Use our financial dashboard for expense tracking and profit analysis'
            ],
            [
                'area' => 'Marketing ROI',
                'advice' => 'Track the return on investment for each marketing channel to optimize your advertising budget.',
                'resources' => 'Our analytics dashboard provides detailed campaign performance metrics'
            ]
        ];
    }
}