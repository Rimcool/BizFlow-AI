<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     */
    public function __invoke(EmailVerificationRequest $request): RedirectResponse
    {
        $user = $request->user();

        // Check if email is already verified
        if ($user->hasVerifiedEmail()) {
            return redirect()->intended(
                route('profile.dashboard', absolute: false) . '?verified=1'
            );
        }

        // Mark email as verified and trigger event
        if ($user->markEmailAsVerified()) {
            event(new Verified($user));
        }

        // Redirect to dashboard with verification success
        return redirect()->intended(
            route('profile.dashboard', absolute: false) . '?verified=1'
        );
    }
}