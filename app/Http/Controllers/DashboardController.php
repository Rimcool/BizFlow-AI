<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use ZipArchive;

class DashboardController extends Controller
{
    public function index($businessId = null)
    {
        // If user is logged in, get their businesses
        if (Auth::check()) {
            $user = Auth::user();
            $businesses = $user->businesses;
            
            // If no business ID provided, use the first one
            if (!$businessId && $businesses->count() > 0) {
                return redirect()->route('dashboard.show', $businesses->first()->id);
            }
        }
        
        // If no business ID provided, redirect to form
        if (!$businessId) {
            return redirect('/')->with('error', 'Please create a business first.');
        }

        $business = Business::with(['products', 'orders'])->findOrFail($businessId);
        
        // Safe way to get statistics
        $stats = [
            'total_products' => $this->safeCount($business->products),
            'total_orders' => $this->safeCount($business->orders),
            'pending_orders' => $this->safeCount($business->orders->where('status', 'pending')),
            'completed_orders' => $this->safeCount($business->orders->where('status', 'completed')),
            'revenue' => $this->safeSum($business->orders->where('status', 'completed'), 'total_amount'),
        ];

        // Use the relationship method directly instead of the property
        $recentOrders = $business->orders()->latest()->take(5)->get();
        $recentProducts = $business->products()->latest()->take(5)->get();

        return view('dashboard.index', compact('business', 'stats', 'recentOrders', 'recentProducts'));
    }

    /**
     * Safely count items whether it's a collection, array, or other type
     */
    private function safeCount($items)
    {
        if (is_object($items) && method_exists($items, 'count')) {
            return $items->count();
        } elseif (is_array($items)) {
            return count($items);
        } elseif (is_string($items)) {
            return 0;
        }
        return 0;
    }

    /**
     * Safely sum a field
     */
    private function safeSum($items, $field)
    {
        if (is_object($items) && method_exists($items, 'sum')) {
            return $items->sum($field);
        }
        return 0;
    }

    public function products($businessId)
    {
        $business = Business::findOrFail($businessId);
        $products = $business->products()->latest()->get();
        return view('dashboard.products', compact('business', 'products'));
    }

    public function createProduct($businessId)
    {
        $business = Business::findOrFail($businessId);
        return view('dashboard.product-form', compact('business'));
    }

    public function storeProduct(Request $request, $businessId)
    {
        $business = Business::findOrFail($businessId);
        
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|string',
        ]);

        $business->products()->create($request->all());

        return redirect()->route('dashboard.products', $businessId)
            ->with('success', 'Product created successfully!');
    }

    public function orders($businessId)
    {
        $business = Business::findOrFail($businessId);
        $orders = $business->orders()->latest()->get();
        return view('dashboard.orders', compact('business', 'orders'));
    }

    public function updateOrderStatus(Request $request, $businessId, $orderId)
    {
        $business = Business::findOrFail($businessId);
        $order = $business->orders()->findOrFail($orderId);
        
        $request->validate([
            'status' => 'required|in:pending,processing,completed,cancelled'
        ]);

        $order->update(['status' => $request->status]);

        return redirect()->back()->with('success', 'Order status updated!');
    }

    public function settings($businessId)
    {
        $business = Business::with('websiteSettings')->findOrFail($businessId);
        
        if (method_exists($business, 'ensureWebsiteSettings')) {
            $business->ensureWebsiteSettings();
        }
        
        return view('dashboard.settings', compact('business'));
    }

    public function updateSettings(Request $request, $businessId)
    {
        $business = Business::findOrFail($businessId);
        
        $request->validate([
            'name' => 'required|string|max:255',
            'color' => 'nullable|string|max:7',
        ]);

        $business->update($request->only(['name', 'color']));

        return redirect()->back()->with('success', 'Settings updated successfully!');
    }

    public function regenerateApiKey($businessId)
    {
        $business = Business::findOrFail($businessId);
        
        if (method_exists($business, 'generateApiKey')) {
            $newApiKey = $business->generateApiKey();
            return redirect()->back()->with('success', 'API Key regenerated!')->with('api_key', $newApiKey);
        }
        
        return redirect()->back()->with('error', 'API Key generation not supported.');
    }

    /**
     * Download complete business package including the actual generated website
     */
    public function downloadPackage($businessId)
    {
        $business = Business::findOrFail($businessId);
        
        $zip = new ZipArchive();
        $fileName = $business->name . '-business-package.zip';
        $filePath = storage_path('app/temp/' . $fileName);
        
        // Ensure temp directory exists
        if (!file_exists(dirname($filePath))) {
            mkdir(dirname($filePath), 0755, true);
        }
        
        if ($zip->open($filePath, ZipArchive::CREATE) === TRUE) {
            
            try {
                // 1. Add the ACTUAL generated website from public/sites folder
                $this->addActualWebsite($zip, $business);
                
                // 2. Add dashboard files
                $this->addDashboardFiles($zip, $business);
                
                // 3. Add configuration files
                $this->addConfigFiles($zip, $business);
                
                // 4. Add PDF guides
                $this->addPdfGuides($zip, $business);
                
                $zip->close();
                
                return response()->download($filePath)->deleteFileAfterSend(true);
                
            } catch (\Exception $e) {
                $zip->close();
                \Log::error('Error creating package: ' . $e->getMessage());
                return redirect()->back()->with('error', 'Error creating package: ' . $e->getMessage());
            }
        }
        
        return redirect()->back()->with('error', 'Failed to create zip file.');
    }

    /**
     * Add the ACTUAL generated website from public/sites folder
     */
    private function addActualWebsite($zip, $business)
    {
        $websitePath = public_path('sites/' . $business->id);
        
        if (!file_exists($websitePath)) {
            throw new \Exception("Website not found for business: " . $business->name);
        }
        
        // Add all files from the website directory
        $this->addFolderToZip($zip, $websitePath, 'website');
        
        \Log::info("Added actual website from: " . $websitePath);
    }

    /**
     * Recursively add folder contents to zip
     */
    private function addFolderToZip($zip, $folderPath, $zipPath = '')
    {
        $files = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($folderPath),
            \RecursiveIteratorIterator::LEAVES_ONLY
        );
        
        foreach ($files as $name => $file) {
            // Skip directories (they would be added automatically)
            if (!$file->isDir()) {
                // Get real and relative path for current file
                $filePath = $file->getRealPath();
                $relativePath = substr($filePath, strlen($folderPath) + 1);
                
                // Add current file to archive
                if (!empty($zipPath)) {
                    $relativePath = $zipPath . '/' . $relativePath;
                }
                
                $zip->addFile($filePath, $relativePath);
            }
        }
    }
    
    /**
     * Add dashboard files from views/dashboard folder
     */
    private function addDashboardFiles($zip, $business)
    {
        $dashboardFiles = [
            'index.blade.php' => 'index.html',
            'products.blade.php' => 'products.html', 
            'orders.blade.php' => 'orders.html',
            'settings.blade.php' => 'settings.html',
            'product-form.blade.php' => 'product-form.html'
        ];
        
        $addedFiles = 0;
        
        foreach ($dashboardFiles as $sourceFile => $targetFile) {
            $sourcePath = resource_path("views/dashboard/{$sourceFile}");
            
            if (file_exists($sourcePath)) {
                // Use existing blade file
                $content = file_get_contents($sourcePath);
                $content = $this->processBladeContent($content, $business);
            } else {
                // Create basic HTML file
                $content = $this->generateBasicDashboardFile($targetFile, $business);
            }
            
            $zip->addFromString("admin-dashboard/{$targetFile}", $content);
            $addedFiles++;
        }
        
        // Add dashboard CSS and JS
        $this->addDashboardAssets($zip, $business);
        
        return $addedFiles;
    }

    /**
     * Generate basic dashboard file based on type
     */
    private function generateBasicDashboardFile($fileType, $business)
    {
        switch ($fileType) {
            case 'index.html':
                return $this->generateBasicDashboardIndex($business);
            case 'products.html':
                return $this->generateBasicDashboardProducts($business);
            case 'orders.html':
                return $this->generateBasicDashboardOrders($business);
            case 'settings.html':
                return $this->generateBasicDashboardSettings($business);
            case 'product-form.html':
                return $this->generateBasicProductForm($business);
            default:
                return $this->generateBasicDashboardIndex($business);
        }
    }

    private function generateBasicDashboardIndex($business)
    {
        return '<!DOCTYPE html>
<html>
<head>
    <title>' . $business->name . ' - Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="dashboard">
        <div class="sidebar">
            <div class="logo">
                <h2>' . $business->name . '</h2>
            </div>
            <nav class="nav">
                <a href="index.html" class="nav-link active">Dashboard</a>
                <a href="products.html" class="nav-link">Products</a>
                <a href="orders.html" class="nav-link">Orders</a>
                <a href="settings.html" class="nav-link">Settings</a>
            </nav>
        </div>
        <div class="main-content">
            <h1>Welcome to ' . $business->name . ' Dashboard</h1>
            <p>Industry: ' . $business->industry . '</p>
            <p>Products: ' . $business->products . '</p>
            <p>Target Audience: ' . $business->target . '</p>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>';
    }

    private function generateBasicDashboardProducts($business)
    {
        return '<!DOCTYPE html>
<html>
<head>
    <title>' . $business->name . ' - Products</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="dashboard">
        <div class="sidebar">
            <div class="logo">
                <h2>' . $business->name . '</h2>
            </div>
            <nav class="nav">
                <a href="index.html" class="nav-link">Dashboard</a>
                <a href="products.html" class="nav-link active">Products</a>
                <a href="orders.html" class="nav-link">Orders</a>
                <a href="settings.html" class="nav-link">Settings</a>
            </nav>
        </div>
        <div class="main-content">
            <h1>Product Management</h1>
            <button class="btn btn-primary" onclick="addProduct()">Add Product</button>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="4" style="text-align: center;">No products yet</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>';
    }

    private function generateBasicDashboardOrders($business)
    {
        return '<!DOCTYPE html>
<html>
<head>
    <title>' . $business->name . ' - Orders</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="dashboard">
        <div class="sidebar">
            <div class="logo">
                <h2>' . $business->name . '</h2>
            </div>
            <nav class="nav">
                <a href="index.html" class="nav-link">Dashboard</a>
                <a href="products.html" class="nav-link">Products</a>
                <a href="orders.html" class="nav-link active">Orders</a>
                <a href="settings.html" class="nav-link">Settings</a>
            </nav>
        </div>
        <div class="main-content">
            <h1>Order Management</h1>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Customer</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="5" style="text-align: center;">No orders yet</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>';
    }

    private function generateBasicDashboardSettings($business)
    {
        $primaryColor = $business->color ?? '#667eea';
        
        return '<!DOCTYPE html>
<html>
<head>
    <title>' . $business->name . ' - Settings</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="dashboard">
        <div class="sidebar">
            <div class="logo">
                <h2>' . $business->name . '</h2>
            </div>
            <nav class="nav">
                <a href="index.html" class="nav-link">Dashboard</a>
                <a href="products.html" class="nav-link">Products</a>
                <a href="orders.html" class="nav-link">Orders</a>
                <a href="settings.html" class="nav-link active">Settings</a>
            </nav>
        </div>
        <div class="main-content">
            <h1>Business Settings</h1>
            <div class="table-container">
                <form>
                    <div class="form-group">
                        <label>Business Name</label>
                        <input type="text" class="form-control" id="business-name" value="' . $business->name . '">
                    </div>
                    <div class="form-group">
                        <label>Primary Color</label>
                        <input type="color" class="form-control" id="primary-color" value="' . $primaryColor . '">
                    </div>
                    <div class="form-group">
                        <label>Industry</label>
                        <input type="text" class="form-control" value="' . $business->industry . '" readonly>
                    </div>
                    <button type="button" class="btn btn-primary" onclick="saveSettings()">Save Settings</button>
                </form>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>';
    }

    private function generateBasicProductForm($business)
    {
        return '<!DOCTYPE html>
<html>
<head>
    <title>' . $business->name . ' - Add Product</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="dashboard">
        <div class="sidebar">
            <div class="logo">
                <h2>' . $business->name . '</h2>
            </div>
            <nav class="nav">
                <a href="index.html" class="nav-link">Dashboard</a>
                <a href="products.html" class="nav-link">Products</a>
                <a href="orders.html" class="nav-link">Orders</a>
                <a href="settings.html" class="nav-link">Settings</a>
            </nav>
        </div>
        <div class="main-content">
            <h1>Add New Product</h1>
            <div class="table-container">
                <form>
                    <div class="form-group">
                        <label>Product Name</label>
                        <input type="text" class="form-control" id="product-name">
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input type="number" class="form-control" id="product-price">
                    </div>
                    <div class="form-group">
                        <label>Stock</label>
                        <input type="number" class="form-control" id="product-stock">
                    </div>
                    <button type="button" class="btn btn-primary" onclick="saveProduct()">Save Product</button>
                    <a href="products.html" class="btn">Cancel</a>
                </form>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>';
    }
    
    /**
     * Process Blade content and replace with actual values
     */
    private function processBladeContent($content, $business)
    {
        // Replace common Blade syntax
        $replacements = [
            '{{ $business->name }}' => $business->name,
            '{{ $business->industry }}' => $business->industry,
            '{{ $business->target }}' => $business->target,
            '{{ $business->products }}' => $business->products,
            '{{ $business->goal }}' => $business->goal,
            '{{ $business->color }}' => $business->color ?? '#667eea',
            '{{ csrf_field() }}' => '',
            '@csrf' => '',
        ];
        
        foreach ($replacements as $search => $replace) {
            $content = str_replace($search, $replace, $content);
        }
        
        // Remove any remaining Blade syntax using regex
        $content = preg_replace('/\@section\(.*?\)/', '', $content);
        $content = preg_replace('/\@endsection/', '', $content);
        $content = preg_replace('/\@extends\(.*?\)/', '', $content);
        $content = preg_replace('/\@yield\(.*?\)/', '', $content);
        $content = preg_replace('/\{\{--.*?--\}\}/s', '<!-- -->', $content);
        $content = preg_replace('/\{\{.*?\}\}/', '', $content);
        $content = preg_replace('/\@\w+\(.*?\)/', '', $content);
        
        return $content;
    }
    
    /**
     * Add dashboard CSS and JS assets
     */
    private function addDashboardAssets($zip, $business)
    {
        // Add CSS file
        $cssContent = $this->generateDashboardCSS($business);
        $zip->addFromString("admin-dashboard/styles.css", $cssContent);
        
        // Add JavaScript file
        $jsContent = $this->generateDashboardJS($business);
        $zip->addFromString("admin-dashboard/script.js", $jsContent);
        
        // Add configuration
        $configContent = $this->generateDashboardConfig($business);
        $zip->addFromString("admin-dashboard/config.js", $configContent);
    }
    
    /**
     * Generate dashboard CSS
     */
    private function generateDashboardCSS($business)
    {
        $primaryColor = $business->color ?? '#667eea';
        
        $css = ":root {
    --primary-color: {$primaryColor};
    --secondary-color: #00C896;
    --dark-color: #2D3748;
    --light-color: #F8FAFC;
    --gray-color: #718096;
    --success-color: #48BB78;
    --warning-color: #ED8936;
    --danger-color: #F56565;
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Poppins', sans-serif;
    background: #f5f7fa;
    color: var(--dark-color);
}

.dashboard {
    display: flex;
    min-height: 100vh;
}

.sidebar {
    width: 250px;
    background: white;
    box-shadow: 2px 0 10px rgba(0,0,0,0.1);
    padding: 20px 0;
}

.logo {
    text-align: center;
    padding: 20px;
    border-bottom: 1px solid #eee;
    margin-bottom: 20px;
}

.logo h2 {
    color: var(--primary-color);
    font-size: 1.5rem;
}

.nav {
    padding: 0 20px;
}

.nav-link {
    display: flex;
    align-items: center;
    padding: 12px 15px;
    text-decoration: none;
    color: var(--dark-color);
    border-radius: 8px;
    transition: all 0.3s;
    gap: 12px;
    margin-bottom: 5px;
}

.nav-link:hover,
.nav-link.active {
    background: var(--primary-color);
    color: white;
}

.main-content {
    flex: 1;
    padding: 30px;
}

.header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 30px;
}

.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 20px;
    margin-bottom: 30px;
}

.stat-card {
    background: white;
    padding: 25px;
    border-radius: 12px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    border-left: 4px solid var(--primary-color);
}

.stat-card h3 {
    color: var(--gray-color);
    font-size: 0.9rem;
    margin-bottom: 10px;
}

.stat-number {
    font-size: 2rem;
    font-weight: 700;
    color: var(--dark-color);
}

.btn {
    padding: 12px 24px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    font-weight: 500;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: all 0.3s;
    font-family: inherit;
}

.btn-primary {
    background: var(--primary-color);
    color: white;
}

.btn-primary:hover {
    background: #e6b800;
}

.table-container {
    background: white;
    border-radius: 12px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    overflow: hidden;
}

table {
    width: 100%;
    border-collapse: collapse;
}

th, td {
    padding: 15px;
    text-align: left;
    border-bottom: 1px solid #eee;
}

th {
    background: #f8f9fa;
    font-weight: 600;
    color: var(--gray-color);
}

.form-group {
    margin-bottom: 20px;
}

.form-control {
    width: 100%;
    padding: 12px 15px;
    border: 1px solid #ddd;
    border-radius: 8px;
    font-family: inherit;
    font-size: 1rem;
}

.form-control:focus {
    outline: none;
    border-color: var(--primary-color);
}";

        return $css;
    }
    
    /**
     * Generate dashboard JavaScript
     */
    private function generateDashboardJS($business)
    {
        $businessName = addslashes($business->name);
        $industry = addslashes($business->industry);
        $target = addslashes($business->target);
        $products = addslashes($business->products);
        $primaryColor = addslashes($business->color ?? '#667eea');
        
        $js = "// Dashboard Configuration
const BUSINESS_CONFIG = {
    name: \"{$businessName}\",
    industry: \"{$industry}\",
    target: \"{$target}\",
    products: \"{$products}\",
    primaryColor: \"{$primaryColor}\"
};

console.log('Dashboard loaded for:', BUSINESS_CONFIG.name);

// Initialize dashboard
document.addEventListener('DOMContentLoaded', function() {
    initializeDashboard();
});

function initializeDashboard() {
    loadBusinessData();
    setupEventListeners();
}

function loadBusinessData() {
    const businessData = {
        name: BUSINESS_CONFIG.name,
        industry: BUSINESS_CONFIG.industry,
        color: BUSINESS_CONFIG.primaryColor
    };
    updateBusinessUI(businessData);
}

function updateBusinessUI(data) {
    // Update business name in logos
    const logoElements = document.querySelectorAll('.logo h2');
    logoElements.forEach(el => {
        el.textContent = data.name;
    });
    
    // Update primary color
    document.documentElement.style.setProperty('--primary-color', data.color);
}

function setupEventListeners() {
    console.log('Dashboard initialized for ' + BUSINESS_CONFIG.name);
}

function addProduct() {
    alert('In a real application, this would open a product form. For this demo version, you can add products through the online dashboard.');
}

function saveProduct() {
    alert('Product saved! In a real application, this would save the product data.');
}

function saveSettings() {
    const businessName = document.getElementById('business-name')?.value || BUSINESS_CONFIG.name;
    const primaryColor = document.getElementById('primary-color')?.value || BUSINESS_CONFIG.primaryColor;
    
    alert('Settings saved for: ' + businessName);
    
    // Update UI
    updateBusinessUI({name: businessName, color: primaryColor});
}";

        return $js;
    }
    
    /**
     * Generate dashboard config
     */
    private function generateDashboardConfig($business)
    {
        $businessName = addslashes($business->name);
        $industry = addslashes($business->industry);
        $target = addslashes($business->target);
        $products = addslashes($business->products);
        $goal = addslashes($business->goal);
        $primaryColor = addslashes($business->color ?? '#667eea');
        
        $config = "// Dashboard Configuration
const CONFIG = {
    business: {
        name: \"{$businessName}\",
        industry: \"{$industry}\",
        target: \"{$target}\",
        products: \"{$products}\",
        color: \"{$primaryColor}\",
        goal: \"{$goal}\"
    },
    api: {
        baseUrl: \"/api/v1\"
    },
    features: {
        products: true,
        orders: true,
        analytics: true,
        settings: true
    }
};

console.log('Dashboard configuration loaded for:', CONFIG.business.name);";

        return $config;
    }
    
    /**
     * Add configuration files
     */
    private function addConfigFiles($zip, $business)
    {
        // Add README
        $readmeContent = $this->generateReadme($business);
        $zip->addFromString("README.md", $readmeContent);
        
        // Add setup guide
        $setupContent = $this->generateSetupGuide($business);
        $zip->addFromString("SETUP_GUIDE.md", $setupContent);
    }
    
    /**
     * Generate README file
     */
    private function generateReadme($business)
    {
        return "# {$business->name} - Business Package

## What's Included

- **Website Files** - Complete e-commerce website (from public/sites folder)
- **Admin Dashboard** - Business management system  
- **Documentation** - Setup and usage guides
- **Strategy Guides** - Marketing, SEO, and Business Growth PDFs

## Quick Start

1. Upload website files to your hosting
2. Upload admin-dashboard to your server
3. Configure your business settings

## Support

Contact for assistance.
";
    }
    
    /**
     * Generate setup guide
     */
    private function generateSetupGuide($business)
    {
        return "# Setup Guide - {$business->name}

## Installation Steps

1. Upload the website folder to your web hosting
2. Upload the admin-dashboard folder to your server
3. Open admin-dashboard/index.html to access your dashboard

## Configuration

Update the business settings in the admin dashboard to match your requirements.
";
    }
    
    /**
     * Add PDF guides (placeholder - you can generate actual PDFs here)
     */
    /**
 * Add actual PDF guides using DomPDF
 */
private function addPdfGuides($zip, $business)
{
    try {
        // Generate Marketing PDF
        $marketingPdf = $this->generateMarketingPdf($business);
        $zip->addFromString("Marketing-Strategy-Guide.pdf", $marketingPdf);
        
        // Generate SEO PDF
        $seoPdf = $this->generateSeoPdf($business);
        $zip->addFromString("SEO-Strategy-Guide.pdf", $seoPdf);
        
        // Generate Business Growth PDF
        $growthPdf = $this->generateGrowthPdf($business);
        $zip->addFromString("Business-Growth-Strategy.pdf", $growthPdf);
        
    } catch (\Exception $e) {
        \Log::error('PDF Generation Error: ' . $e->getMessage());
        // Fallback: Add placeholder text files instead of corrupted PDFs
        $this->addPdfPlaceholders($zip, $business);
    }
}

private function generateMarketingPdf($business)
{
    $html = view('pdfs.marketing', compact('business'))->render();
    return $this->generatePdfFromHtml($html);
}

private function generateSeoPdf($business)
{
    $html = view('pdfs.seo', compact('business'))->render();
    return $this->generatePdfFromHtml($html);
}

private function generateGrowthPdf($business)
{
    $html = view('pdfs.growth', compact('business'))->render();
    return $this->generatePdfFromHtml($html);
}

/**
 * Generate PDF from HTML using DomPDF
 */
private function generatePdfFromHtml($html)
{
    // Check if DomPDF is available
    if (class_exists('Dompdf\Dompdf')) {
        $dompdf = new \Dompdf\Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        return $dompdf->output();
    }
    
    // Fallback: Create basic PDF using TCPDF if available
    if (class_exists('TCPDF')) {
        $pdf = new \TCPDF();
        $pdf->AddPage();
        $pdf->writeHTML($html, true, false, true, false, '');
        return $pdf->Output('', 'S');
    }
    
    // Ultimate fallback: Return HTML as text with .pdf extension
    // This is better than corrupted PDFs
    throw new \Exception('PDF generation libraries not available');
}

/**
 * Fallback: Add text files instead of corrupted PDFs
 */
private function addPdfPlaceholders($zip, $business)
{
    $guides = [
        'Marketing-Strategy-Guide.txt' => $this->generateMarketingText($business),
        'SEO-Strategy-Guide.txt' => $this->generateSeoText($business),
        'Business-Growth-Strategy.txt' => $this->generateGrowthText($business),
    ];
    
    foreach ($guides as $filename => $content) {
        $zip->addFromString($filename, $content);
    }
    
    // Add a note about PDF generation
    $zip->addFromString("PDF-GUIDE-README.txt", 
        "PDF files could not be generated due to missing PDF library.\n" .
        "Please install DomPDF or TCPDF for proper PDF generation.\n" .
        "For now, text versions of the guides are provided."
    );
}

/**
 * Generate marketing guide as text
 */
private function generateMarketingText($business)
{
    return "MARKETING STRATEGY GUIDE\n" .
           "For: {$business->name}\n" .
           "Industry: {$business->industry}\n" .
           "Target: {$business->target}\n\n" .
           "1. Social Media Strategy\n" .
           "2. Content Marketing Plan\n" .
           "3. Email Marketing\n" .
           "4. Advertising Strategy\n" .
           "5. Performance Tracking\n";
}

/**
 * Generate SEO guide as text
 */
private function generateSeoText($business)
{
    return "SEO STRATEGY GUIDE\n" .
           "For: {$business->name}\n" .
           "Industry: {$business->industry}\n\n" .
           "1. Keyword Strategy\n" .
           "2. On-Page Optimization\n" .
           "3. Content Strategy\n" .
           "4. Technical SEO\n" .
           "5. Local SEO\n" .
           "6. Link Building\n";
}

/**
 * Generate growth guide as text
 */
private function generateGrowthText($business)
{
    return "BUSINESS GROWTH STRATEGY\n" .
           "For: {$business->name}\n" .
           "Industry: {$business->industry}\n\n" .
           "1. Growth Opportunities\n" .
           "2. Customer Acquisition\n" .
           "3. Financial Planning\n" .
           "4. Operational Scaling\n" .
           "5. 12-Month Roadmap\n" .
           "6. Key Performance Indicators\n";
}
}