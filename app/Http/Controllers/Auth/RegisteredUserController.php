<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Mail\RegistrationConfirmation;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        try {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }

        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            event(new Registered($user));
            
            // Send registration confirmation email
            Mail::to($user->email)->send(new RegistrationConfirmation($user));
            
            // Log the user in
            Auth::login($user);
            
            // Redirect to intended page or dashboard
            return redirect()->intended('/profile/dashboard')->with('success', 'Welcome to our platform! Your registration was successful. A confirmation email has been sent to your email address.');
            
        } catch (\Exception $e) {
            // Log the error
            \Log::error('Registration error: ' . $e->getMessage());
            
            return redirect()->back()->with('error', 'Registration failed. Please try again.')->withInput();
        }
    }

    /**
     * Redirect to the registration form.
     */
    public function redirectToForm(): RedirectResponse
    {
        return redirect()->route('register.form');
    }
}