<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;
use App\Mail\PasswordReset;
use Illuminate\Support\Facades\Mail;
use App\Models\User;

class PasswordResetLinkController extends Controller
{
    /**
     * Display the password reset link request view.
     */
    public function create(): View
    {
        return view('auth.forgot-password');
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        // Find the user
        $user = User::where('email', $request->email)->first();
        
        if (!$user) {
            return back()->withInput($request->only('email'))
                        ->withErrors(['email' => __(Password::RESET_LINK_SENT)]);
        }
        
        // Generate reset token
        $token = Password::createToken($user);
        
        // Generate reset link
        $resetLink = url(route('password.reset', [
            'token' => $token,
            'email' => $user->email,
        ], false));
        
        // Send password reset email
        Mail::to($user->email)->send(new PasswordReset($user, $resetLink));
        
        return back()->with('status', 'Password reset link has been sent to your email!');
    }
}