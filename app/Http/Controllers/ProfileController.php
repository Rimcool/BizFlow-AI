<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\GeneratedSite;
use App\Models\Business;

class ProfileController extends Controller
{
    // Dashboard page
    public function dashboard()
    {
        return view('profile.dashboard');
    }

    // API endpoint to get user profile data with websites
    public function getProfileData(Request $request)
    {
        $user = Auth::user();
        
        // Get user's business
        $business = Business::where('user_id', $user->id)->first();
        
        if (!$business) {
            return response()->json([
                'error' => 'Business not found for this user'
            ], 404);
        }
        
        // Get user's generated sites
        $websites = GeneratedSite::where('business_id', $business->id)
            ->select('id', 'site_url', 'seo_plan', 'marketing_plan', 'management_tips', 'created_at')
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function ($site) {
                // Extract business name from SEO plan or other fields
                $businessName = 'Unnamed Website';
                if (!empty($site->seo_plan)) {
                    // Try to extract business name from SEO plan
                    if (preg_match('/for\s+(.+)$/i', $site->seo_plan, $matches)) {
                        $businessName = $matches[1];
                    } elseif (preg_match('/Strategy for (.+)/i', $site->seo_plan, $matches)) {
                        $businessName = $matches[1];
                    }
                }
                
                return [
                    'id' => $site->id,
                    'business_name' => $businessName,
                    'site_url' => $site->site_url,
                    'created_at' => $site->created_at->toISOString()
                ];
            });
        
        // Get counts for other resources (you'll need to implement these based on your models)
        $seoToolsCount = 12; // Replace with actual count from your database
        $campaignsCount = 5; // Replace with actual count from your database
        $pdfsCount = 2; // Replace with actual count from your database
        
        return response()->json([
            'name' => $user->name,
            'email' => $user->email,
            'membership' => $user->membership_level ?? 'basic',
            'created_at' => $user->created_at->toISOString(),
            'last_login_at' => $user->last_login_at ? $user->last_login_at->toISOString() : null,
            'websites_count' => $websites->count(),
            'seo_tools_count' => $seoToolsCount,
            'campaigns_count' => $campaignsCount,
            'pdfs_count' => $pdfsCount,
            'websites' => $websites,
            'activity' => $this->getRecentActivity($user)
        ]);
    }
    
    // Helper method to get recent activity
    private function getRecentActivity($user)
    {
        // This is a simplified example - you should replace with your actual activity logic
        $activities = [];
        
        // Get recent websites
        $business = Business::where('user_id', $user->id)->first();
        if ($business) {
            $recentSites = GeneratedSite::where('business_id', $business->id)
                ->orderBy('created_at', 'desc')
                ->limit(3)
                ->get();
                
            foreach ($recentSites as $site) {
                $businessName = 'a website';
                if (!empty($site->seo_plan)) {
                    if (preg_match('/for\s+(.+)$/i', $site->seo_plan, $matches)) {
                        $businessName = $matches[1];
                    }
                }
                
                $activities[] = [
                    'action' => 'Created website',
                    'details' => $businessName,
                    'time' => $site->created_at->diffForHumans()
                ];
            }
        }
        
        // Add some placeholder activities if needed
        if (count($activities) < 3) {
            $activities[] = [
                'action' => 'Signed up',
                'details' => 'Joined BizFlow AI',
                'time' => $user->created_at->diffForHumans()
            ];
        }
        
        return $activities;
    }

    // Edit profile page (form to update user info)
    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    // Update profile info
    public function update(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
        ]);

        $user->update($request->only('name', 'email'));

        return redirect()->route('profile.edit')->with('success', 'Profile updated successfully.');
    }

    // Show change password form
    public function editPassword()
    {
        return view('profile.password');
    }

    // Update password
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed|min:8',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Current password does not match']);
        }

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('profile.password')->with('success', 'Password updated successfully.');
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}