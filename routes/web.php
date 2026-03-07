<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\AIChatbotController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SiteGeneratorController;
use App\Http\Controllers\JazzCashController;
use App\Http\Controllers\EasyPaisaController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\WebsiteApiController;


/*
|--------------------------------------------------------------------------
| Homepage
|--------------------------------------------------------------------------
*/
Route::get('/', fn () => view('index'))->name('home');

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
// Business Form & Submission
Route::get('/business-form', [BusinessController::class, 'show'])->name('business.form');
Route::post('/submit', [BusinessController::class, 'store'])->name('business.submit');

// Public Pages
Route::get('/success', fn () => view('success'))->name('business.success');
Route::get('/loading', fn () => view('loading'))->name('business.loading');

// Business Preview & Progress
Route::get('/preview/{business}', [BusinessController::class, 'preview'])->name('preview');
Route::get('/progress/{business}', [BusinessController::class, 'progress'])->name('business.progress');
Route::get('/preview-teaser/{business}', [BusinessController::class, 'showPreview'])->name('preview.teaser');
Route::get('/generate-site/{business}', [BusinessController::class, 'generateStaticSite'])->name('generate.static');

// Serve generated sites
Route::get('/sites/{id}/{path?}', function ($id, $path = 'index.html') {
    $filePath = public_path("sites/{$id}/{$path}");
    
    if (file_exists($filePath)) {
        $mimeType = mime_content_type($filePath);
        return response(file_get_contents($filePath))->header('Content-Type', $mimeType);
    }
    
    return abort(404);
})->where('path', '.*')->name('sites');

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/
// 🔑 Register
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

// 🔑 Login / Logout
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// 🔑 Forgot / Reset Password
Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
Route::post('/reset-password', [NewPasswordController::class, 'store'])->name('password.update');

// 🔑 Confirm Password
Route::get('/confirm-password', [ConfirmablePasswordController::class, 'show'])->name('password.confirm');
Route::post('/confirm-password', [ConfirmablePasswordController::class, 'store']);

// 🔑 Email Verification
Route::get('/email/verify', [EmailVerificationPromptController::class, '__invoke'])->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', [VerifyEmailController::class, '__invoke'])->middleware(['signed', 'throttle:6,1'])->name('verification.verify');
Route::post('/email/verification-notification', [VerifyEmailController::class, 'resend'])->middleware(['throttle:6,1'])->name('verification.send');

/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    // Profile Routes - FIXED: Changed route name to avoid conflict
    Route::get('/profile/dashboard', [ProfileController::class, 'dashboard'])->name('profile.dashboard');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('/profile/password', [ProfileController::class, 'editPassword'])->name('profile.password');
    Route::post('/profile/password/update', [ProfileController::class, 'updatePassword'])->name('profile.password.update');

    Route::get('/profile/logout', [ProfileController::class, 'logout'])->name('profile.logout');
    // Add this route to your web.php file
Route::get('/api/user/profile', [ProfileController::class, 'getProfileData'])->name('api.user.profile');
});

// Admin Routes
// Admin routes for managing users and businesses
Route::prefix('admin')->group(function () {
    // Delete user
    Route::delete('/users/{user}', [App\Http\Controllers\AdminController::class, 'deleteUser'])->name('admin.users.delete');
    
    // Delete business
    Route::delete('/businesses/{business}', [App\Http\Controllers\AdminController::class, 'deleteBusiness'])->name('admin.businesses.delete');
    
    // Update business
    Route::put('/businesses/{business}', [App\Http\Controllers\AdminController::class, 'updateBusiness'])->name('admin.businesses.update');
    
    // Edit business (get data)
    Route::get('/businesses/{business}/edit', [App\Http\Controllers\AdminController::class, 'editBusiness'])->name('admin.businesses.edit');
    
    // Regenerate website
    Route::post('/businesses/{business}/regenerate', [App\Http\Controllers\AdminController::class, 'regenerateWebsite'])->name('admin.businesses.regenerate');
    
    // Get stats
    Route::get('/stats/businesses', [App\Http\Controllers\AdminController::class, 'getBusinessStats'])->name('admin.stats.businesses');
    
    // Your existing admin routes
    Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');
    Route::get('/submissions', [App\Http\Controllers\AdminController::class, 'submissions'])->name('admin.submissions');
    Route::get('/test-generator', [App\Http\Controllers\AdminController::class, 'testGenerator'])->name('admin.test-generator');
});
// API Route
Route::get('/api/user/profile', function() {
    return response()->json([
        'name' => auth()->user()->name,
        'email' => auth()->user()->email,
        'created_at' => auth()->user()->created_at,
        'last_login_at' => auth()->user()->last_login_at,
        'membership' => 'premium',
    ]);
})->middleware('auth');

// Google OAuth Routes
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback'])->name('google.callback');
 
// Example route
Route::post('/chat/send', [ChatController::class, 'sendMessage']);

// Marketing PDF Routes
Route::get('/business/{id}/download-marketing-guide', [BusinessController::class, 'downloadMarketingGuide'])
    ->name('business.marketing-guide');
    Route::post('/business/{id}/generate-marketing-pdf', [BusinessController::class, 'generateMarketingPdf'])
    ->name('generate.marketing-pdf');

    // Dashboard Routes



Route::get('/ai-chatbot-package', [AIChatbotController::class, 'showPackagePage']);




// For JazzCash/Easypaisa callbacks
Route::post('/payment/jazzcash/callback', [PaymentController::class, 'jazzcashCallback']);
Route::post('/payment/easypaisa/callback', [PaymentController::class, 'easypaisaCallback']);


Route::get('/download/ai-chatbot-package', [DownloadController::class, 'downloadAIChatbotPackage'])->name('download.ai.chatbot');
Route::get('/download/installation-guide', [DownloadController::class, 'downloadInstallationGuide'])->name('download.installation.guide');


// ...existing code...

Route::get('/thank-you', function () {
    return view('thank-you');
})->name('thank.you');

// ...existing code...

        // Dashboard Routes
// Dashboard Routes
Route::prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/business/{businessId}', [DashboardController::class, 'index'])->name('dashboard.show');
    Route::get('/business/{businessId}/products', [DashboardController::class, 'products'])->name('dashboard.products');
    Route::get('/business/{businessId}/products/create', [DashboardController::class, 'createProduct'])->name('dashboard.products.create');
    Route::post('/business/{businessId}/products', [DashboardController::class, 'storeProduct'])->name('dashboard.products.store');
    Route::get('/business/{businessId}/orders', [DashboardController::class, 'orders'])->name('dashboard.orders');
    Route::post('/business/{businessId}/orders/{orderId}/status', [DashboardController::class, 'updateOrderStatus'])->name('dashboard.orders.update-status');
    Route::get('/business/{businessId}/settings', [DashboardController::class, 'settings'])->name('dashboard.settings');
    Route::post('/business/{businessId}/settings', [DashboardController::class, 'updateSettings'])->name('dashboard.settings.update');
    Route::post('/business/{businessId}/regenerate-api-key', [DashboardController::class, 'regenerateApiKey'])->name('dashboard.regenerate-api-key');
});

// API Routes for generated websites
Route::prefix('api/v1')->group(function () {
    Route::get('products/{apiKey}', [WebsiteApiController::class, 'getProducts']);
    Route::get('products/{apiKey}/{productId}', [WebsiteApiController::class, 'getProduct']);
    Route::post('orders/{apiKey}', [WebsiteApiController::class, 'createOrder']);
});

Route::get('/business/{businessId}/download-package', [DashboardController::class, 'downloadPackage'])->name('dashboard.download-package');

Route::get('/chat', [AIChatbotController::class, 'showChatInterface'])->name('chat');
Route::post('/chat/send', [AIChatbotController::class, 'processChat'])->name('chat.send');
Route::post('/chatbot/train', [AIChatbotController::class, 'trainChatbot'])->name('chatbot.train');
Route::get('/api/health', [AIChatbotController::class, 'checkHealth']);

// Post-payment route
Route::get('/post-payment-setup', function () {
    return view('chatbot.post-payment');
})->name('post-payment.setup');

// routes/web.php
Route::get('/download-chatbot', function () {
    $filePath = storage_path('app/public/BusinessChatbot.exe');
    
    if (!file_exists($filePath)) {
        abort(404, 'File not found');
    }
    
    return response()->download($filePath, 'BusinessChatbot.exe');
})->name('download.chatbot');

// routes/web.php
