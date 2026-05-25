<?php

namespace App\Services;

use App\Models\Business;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class MarketingPdfService
{
    public function generateMarketingGuide(Business $business)
    {
        // Generate AI content
        $content = $this->generateMarketingContent($business);
        
        // Generate PDF
<<<<<<< HEAD
        $pdf = Pdf::loadView('pdfs.marketing-guide', [
=======
        $pdf = Pdf::loadView('pdfs.marketing', [
>>>>>>> 6a21fed7f7ff83d705f194ef929999fb894554c9
            'business' => $business,
            'content' => $content
        ]);
        
        // Save PDF
        $filename = "marketing-guides/{$business->id}-marketing-guide.pdf";
        Storage::put($filename, $pdf->output());
        
        return $filename;
    }
    
    private function generateMarketingContent(Business $business)
    {
        return [
            'intro' => $this->generateSection('intro', $business),
            'target_audience' => $this->generateSection('target_audience', $business),
            'social_media' => $this->generateSection('social_media', $business),
            'email_marketing' => $this->generateSection('email_marketing', $business),
            'content_ideas' => $this->generateSection('content_ideas', $business),
            'advertising' => $this->generateSection('advertising', $business),
            'metrics' => $this->generateSection('metrics', $business)
        ];
    }
    
    private function generateSection($sectionType, Business $business)
    {
        $prompts = [
            'intro' => "Create an introduction for a marketing guide for a {$business->industry} business called '{$business->name}' that sells {$business->products} to {$business->target}. Keep it encouraging and focused on 3-4 key opportunities.",
            
            'target_audience' => "Analyze the target audience for a {$business->industry} business targeting {$business->target}. Include demographic info, psychographic characteristics, where they spend time online, and what messaging resonates with them.",
            
            'social_media' => "Create a social media strategy for a {$business->industry} business targeting {$business->target}. Recommend specific platforms, posting frequency, content types, and provide 10 post ideas.",
            
            'email_marketing' => "Develop an email marketing strategy for a {$business->industry} business. Include list building strategies, newsletter content ideas, automation sequences, and frequency recommendations.",
            
            'content_ideas' => "Generate 15 content ideas for a {$business->industry} business that sells {$business->products}. Include blog topics, social media content, and video ideas.",
            
            'advertising' => "Create a digital advertising guide for a {$business->industry} business with a small budget. Recommend platforms, targeting options, ad formats, and budget allocation.",
            
            'metrics' => "Explain the key marketing metrics a {$business->industry} business should track. Focus on 5-7 most important metrics with simple explanations and target benchmarks."
        ];
        
        try {
            $response = Http::withToken(config('services.openai.secret'))
                ->timeout(30)
                ->post('https://api.openai.com/v1/chat/completions', [
                    'model' => 'gpt-3.5-turbo',
                    'messages' => [
                        ['role' => 'user', 'content' => $prompts[$sectionType]]
                    ],
                    'max_tokens' => 800,
                    'temperature' => 0.7
                ]);
            
            if ($response->successful()) {
                return $response->json('choices.0.message.content');
            }
        } catch (\Exception $e) {
            // Fallback to template content if API fails
            return $this->getFallbackContent($sectionType, $business);
        }
        
        return $this->getFallbackContent($sectionType, $business);
    }
    
    private function getFallbackContent($sectionType, Business $business)
    {
        $fallbacks = [
            'intro' => "This marketing guide will help you effectively promote your {$business->industry} business to your target audience of {$business->target}. Let's get started!",
            
            'target_audience' => "Your target audience consists of {$business->target}. Research shows they respond well to authentic messaging and value-quality {$business->products}.",
            
            'social_media' => "Focus on visual platforms like Instagram and Facebook. Post 3-5 times per week showing your {$business->products} in action.",
            
            'email_marketing' => "Build your email list by offering a discount for signups. Send monthly newsletters featuring new products and tips.",
            
            'content_ideas' => "1. Behind-the-scenes content\n2. Customer testimonials\n3. Product demonstrations\n4. Industry tips and advice",
            
            'advertising' => "Start with Facebook and Instagram ads targeting people interested in {$business->industry}. Budget $5-10/day initially.",
            
            'metrics' => "Track website traffic, social media engagement, conversion rates, and customer acquisition cost."
        ];
        
        return $fallbacks[$sectionType];
    }
}