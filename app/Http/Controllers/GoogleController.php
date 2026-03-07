<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log; // ← ADD THIS IMPORT
use Illuminate\Support\Facades\DB;   // ← ADD THIS IMPORT
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback(Request $request)
    {
        try {
            Log::info('=== GOOGLE CALLBACK STARTED ===', [
                'session_id' => session()->getId(),
                'auth_status' => Auth::check()
            ]);

            $googleUser = Socialite::driver('google')->user();

            // Find or create user
            $user = User::where('email', $googleUser->getEmail())->first();

            if (!$user) {
                $user = User::create([
                    //'name'     => $googleUser->getName(),
                    'email'    => $googleUser->getEmail(),
                    'password' => bcrypt(Str::random(16)),
                ]);
                Log::info('New user created', ['user_id' => $user->id]);
            }

            // ✅ CRITICAL: Manually save the session before login
            session()->save();

            // Log the user in
            Auth::login($user, true);
            
            // ✅ Regenerate session ID (important for security)
            $request->session()->regenerate();
            
            // ✅ Force immediate session save to database
            session()->save();

            Log::info('Google login completed', [
                'user_id' => $user->id,
                'auth_status' => Auth::check(),
                'session_id' => session()->getId()
            ]);

            // ✅ Check if session is properly stored in database
            $sessionInDb = DB::table('sessions')
                ->where('id', session()->getId())
                ->first();
                
            if ($sessionInDb) {
                Log::info('Session stored in database', [
                    'session_user_id' => $sessionInDb->user_id,
                    'payload_size' => strlen($sessionInDb->payload)
                ]);
            } else {
                Log::warning('Session not found in database after login');
            }

            // ✅ Redirect to homepage
            return redirect('/')->with('success', 'Logged in with Google successfully!');

        } catch (\Exception $e) {
            Log::error('Google login failed: ' . $e->getMessage());
            return redirect('/login')->withErrors('Google login failed: ' . $e->getMessage());
        }
    }
}