<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Business;
use App\Models\User;
use App\Models\GeneratedSite;
use App\Models\Product;
use App\Models\Page;
use App\Models\BusinessDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    /**
     * Show the admin dashboard.
     */
    public function index()
    {
        // Get statistics for the dashboard
        $totalUsers = User::count();
        $totalBusinesses = Business::count();
        $todaySubmissions = Business::whereDate('created_at', today())->count();
        
        // Get distinct industries with counts
        $industries = Business::select('industry', DB::raw('count(*) as count'))
            ->groupBy('industry')
            ->get();
            
        // Get latest submissions
        $latest = Business::latest()->take(3)->get();
        
        // Get recent businesses with safe user relationship handling
        $recentBusinesses = Business::with(['user' => function($query) {
                $query->withDefault([
                    'name' => 'Unknown User'
                ]);
            }])
            ->latest()
            ->take(5)
            ->get();

        return view('admin.index', compact(
            'totalUsers', 
            'totalBusinesses', 
            'recentBusinesses',
            'todaySubmissions',
            'industries',
            'latest'
        ));
    }

    /**
     * Show all business submissions.
     */
    public function submissions()
    {
        $businesses = Business::with(['user' => function($query) {
                $query->withDefault([
                    'name' => 'Unknown User'
                ]);
            }])
            ->latest()
            ->paginate(10);

        return view('admin.submissions', compact('businesses'));
    }

    /**
     * Test the site generator functionality.
     */
    public function testGenerator()
    {
        // Get users with their businesses and generated sites
        $users = User::with(['businesses.generatedSite'])->get();
        
        return view('admin.test-generator', compact('users'));
    }

    /**
     * Delete a user and all associated data
     */
    public function deleteUser(User $user)
    {
        try {
            \DB::beginTransaction();

            Log::info("Deleting user: {$user->id} - {$user->name}");

            // Delete user's businesses and associated data
            foreach ($user->businesses as $business) {
                $this->deleteBusinessData($business);
            }

            // Delete the user
            $user->delete();

            \DB::commit();

            Log::info("User deleted successfully: {$user->id}");
            return response()->json(['success' => true, 'message' => 'User deleted successfully']);

        } catch (\Exception $e) {
            \DB::rollBack();
            Log::error("Error deleting user {$user->id}: " . $e->getMessage());
            return response()->json([
                'success' => false, 
                'message' => 'Error deleting user: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Delete a business and all associated data
     */
    public function deleteBusiness(Business $business)
    {
        try {
            \DB::beginTransaction();

            Log::info("Deleting business: {$business->id} - {$business->name}");

            $this->deleteBusinessData($business);

            \DB::commit();

            Log::info("Business deleted successfully: {$business->id}");
            return response()->json(['success' => true, 'message' => 'Business deleted successfully']);

        } catch (\Exception $e) {
            \DB::rollBack();
            Log::error("Error deleting business {$business->id}: " . $e->getMessage());
            return response()->json([
                'success' => false, 
                'message' => 'Error deleting business: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Delete all business-related data
     */
    private function deleteBusinessData(Business $business)
    {
        $businessId = $business->id;
        
        Log::info("Deleting business data for business ID: {$businessId}");

        // Delete generated site files
        $sitePath = public_path("sites/{$businessId}");
        if (file_exists($sitePath)) {
            Log::info("Deleting site directory: {$sitePath}");
            
            // Delete all files in the directory
            $files = glob("{$sitePath}/*");
            foreach ($files as $file) {
                if (is_file($file)) {
                    if (unlink($file)) {
                        Log::info("Deleted file: {$file}");
                    } else {
                        Log::warning("Failed to delete file: {$file}");
                    }
                }
            }
            
            // Remove the directory
            if (rmdir($sitePath)) {
                Log::info("Deleted directory: {$sitePath}");
            } else {
                Log::warning("Failed to delete directory: {$sitePath}");
            }
        } else {
            Log::info("Site directory not found: {$sitePath}");
        }

        // Delete marketing PDF
        $pdfPath = "marketing-guides/{$businessId}-marketing-guide.pdf";
        if (Storage::exists($pdfPath)) {
            if (Storage::delete($pdfPath)) {
                Log::info("Deleted marketing PDF: {$pdfPath}");
            } else {
                Log::warning("Failed to delete marketing PDF: {$pdfPath}");
            }
        } else {
            Log::info("Marketing PDF not found: {$pdfPath}");
        }

        // Delete related records
        $generatedSiteDeleted = GeneratedSite::where('business_id', $businessId)->delete();
        Log::info("Deleted {$generatedSiteDeleted} generated site records");

        $productsDeleted = Product::where('business_id', $businessId)->delete();
        Log::info("Deleted {$productsDeleted} product records");

        $pagesDeleted = Page::where('business_id', $businessId)->delete();
        Log::info("Deleted {$pagesDeleted} page records");

        $businessDetailsDeleted = BusinessDetail::where('business_id', $businessId)->delete();
        Log::info("Deleted {$businessDetailsDeleted} business detail records");

        Log::info("Completed deleting business data for ID: {$businessId}");
    }

    /**
     * Update business information
     */
    public function updateBusiness(Request $request, Business $business)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'industry' => 'required|string',
                'target' => 'required|string',
                'products' => 'required|string',
                'goal' => 'required|string',
            ]);

            $business->update($validated);

            return response()->json(['success' => true, 'message' => 'Business updated successfully']);

        } catch (\Exception $e) {
            Log::error("Error updating business {$business->id}: " . $e->getMessage());
            return response()->json([
                'success' => false, 
                'message' => 'Error updating business: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Show business edit form
     */
    public function editBusiness(Business $business)
    {
        return response()->json([
            'success' => true,
            'business' => $business
        ]);
    }

    /**
     * Regenerate a website for a business
     */
    public function regenerateWebsite(Business $business)
    {
        try {
            // You'll need to call your site generation logic here
            // This is a placeholder - implement your actual site generation
            $siteUrl = $this->regenerateSite($business);

            return response()->json([
                'success' => true,
                'message' => 'Website regenerated successfully',
                'url' => $siteUrl
            ]);

        } catch (\Exception $e) {
            Log::error("Error regenerating website for business {$business->id}: " . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error regenerating website: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Placeholder for site regeneration logic
     * You'll need to integrate this with your existing site generation code
     */
    private function regenerateSite(Business $business)
    {
        // This should call your existing site generation logic
        // For now, return the existing site URL
        $generatedSite = GeneratedSite::where('business_id', $business->id)->first();
        
        if ($generatedSite) {
            return $generatedSite->site_url;
        }

        return url("sites/{$business->id}");
    }

    /**
     * Get business statistics for admin
     */
    public function getBusinessStats()
    {
        $stats = [
            'total_businesses' => Business::count(),
            'businesses_today' => Business::whereDate('created_at', today())->count(),
            'businesses_this_week' => Business::where('created_at', '>=', now()->subWeek())->count(),
            'businesses_this_month' => Business::where('created_at', '>=', now()->subMonth())->count(),
            'top_industries' => Business::select('industry', DB::raw('count(*) as count'))
                ->groupBy('industry')
                ->orderBy('count', 'desc')
                ->take(5)
                ->get()
        ];

        return response()->json($stats);
    }
}