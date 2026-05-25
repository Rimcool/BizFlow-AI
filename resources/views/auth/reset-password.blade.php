@extends('layouts.auth')

@section('content')
<style>
    body {
        background: linear-gradient(120deg, #1abc9c 0%, #3498db 100%);
        min-height: 100vh;
        margin: 0;
        font-family: 'Segoe UI', 'Roboto', Arial, sans-serif;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .reset-wrapper {
        width: 650px;
        max-width: 98vw;
        min-height: 420px;
        background: none;
        display: flex;
        border-radius: 32px;
        box-shadow: 0 8px 32px rgba(44, 62, 80, 0.18);
        overflow: hidden;
        margin: 40px 0;
    }
    .reset-right {
        flex: 1;
        background: #fff;
        padding: 48px 56px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        position: relative;
        border-radius: 32px;
    }
    .top-link {
        position: absolute;
        right: 56px;
        top: 32px;
        font-size: 1rem;
        color: #888;
    }
    .top-link a {
        margin-left: 8px;
        padding: 6px 18px;
        border: 1.5px solid #888;
        border-radius: 18px;
        color: #888;
        text-decoration: none;
        font-weight: 500;
        transition: border-color 0.2s, color 0.2s;
        background: #fff;
    }
    .top-link a:hover {
        border-color: #3498db;
        color: #3498db;
    }
    .auth-title {
        font-size: 2rem;
        font-weight: 700;
        color: #222;
        margin-bottom: 8px;
        font-family: 'Segoe UI', 'Roboto', Arial, sans-serif;
    }
    .auth-subtitle {
        color: #888;
        margin-bottom: 28px;
        font-size: 1.1rem;
    }
    .auth-label {
        font-size: 1rem;
        color: #222;
        margin-bottom: 6px;
        font-weight: 500;
        display: block;
        text-align: left;
        width: 100%;
    }
    .auth-input {
        width: 100%;
        padding: 12px 18px;
        margin-bottom: 18px;
        border: 1.5px solid #3498db;
        border-radius: 10px;
        background: #fff;
        font-size: 1rem;
        color: #222;
        transition: border-color 0.3s, box-shadow 0.3s, background 0.3s;
        box-shadow: 0 2px 8px rgba(52,152,219,0.08);
    }
    .auth-input:focus, .auth-input:hover {
        border-color: #1abc9c;
        background: #f8faff;
        box-shadow: 0 0 12px #3498db55;
        outline: none;
    }
    .input-group {
        position: relative;
    }
    .toggle-btn {
        position: absolute;
        right: 16px;
        top: 50%;
        transform: translateY(-50%);
        background: none;
        border: none;
        cursor: pointer;
        font-size: 1.2rem;
        color: #3498db;
        padding: 0;
    }
    .auth-btn {
        width: 100%;
        padding: 14px 0;
        border: none;
        border-radius: 24px;
        font-size: 1.1rem;
        font-weight: 600;
        color: #fff;
        background: linear-gradient(90deg, #1abc9c 0%, #3498db 100%);
        box-shadow: 0 4px 16px rgba(52,152,219,0.15);
        cursor: pointer;
        margin-top: 10px;
        margin-bottom: 18px;
        transition: background 0.3s, box-shadow 0.3s, transform 0.2s;
    }
    .auth-btn:hover, .auth-btn:focus {
        background: linear-gradient(90deg, #16a085 0%, #2980b9 100%);
        box-shadow: 0 0 24px #3498db55;
        transform: scale(1.04);
    }
    .auth-link {
        color: #3498db;
        text-decoration: underline;
        font-weight: 500;
        transition: color 0.2s;
    }
    .auth-link:hover {
        color: #1abc9c;
        text-shadow: 0 0 8px #1abc9c55;
    }
    .text-sm {
        font-size: 0.98rem;
    }
    @media (max-width: 900px) {
        .reset-wrapper { width: 98vw; }
        .reset-right { width: 100%; padding: 32px 12vw; border-radius: 0; }
        .top-link { position: static; margin-bottom: 18px; text-align: right; }
    }
</style>

<div class="reset-wrapper">
    <div class="reset-right">
        <div class="top-link">
            Remembered your password?
            <a href="{{ route('login') }}">SIGN IN</a>
        </div>
        <h2 class="auth-title">Reset your password</h2>
        <div class="auth-subtitle">Enter your new password below</div>
        <form method="POST" action="{{ route('password.store') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <label class="auth-label" for="email">Email</label>
            <input type="email" name="email" id="email" class="auth-input" value="{{ old('email', $request->email) }}" required autofocus autocomplete="username">
            @error('email')
                <div class="text-sm text-red-600 mb-2">{{ $message }}</div>
            @enderror

            <label class="auth-label" for="password">Password</label>
            <div class="input-group">
                <input type="password" name="password" id="password" class="auth-input" required autocomplete="new-password">
                <button type="button" class="toggle-btn" onclick="togglePassword('password')" aria-label="Show/Hide Password">&#128065;</button>
            </div>
            @error('password')
                <div class="text-sm text-red-600 mb-2">{{ $message }}</div>
            @enderror

            <label class="auth-label" for="password_confirmation">Confirm Password</label>
            <div class="input-group">
                <input type="password" name="password_confirmation" id="password_confirmation" class="auth-input" required autocomplete="new-password">
                <button type="button" class="toggle-btn" onclick="togglePassword('password_confirmation')" aria-label="Show/Hide Confirm Password">&#128065;</button>
            </div>
            @error('password_confirmation')
                <div class="text-sm text-red-600 mb-2">{{ $message }}</div>
            @enderror

            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="auth-btn">
                    {{ __('Reset Password') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</div>

<script>
    function togglePassword(inputId) {
        const input = document.getElementById(inputId);
        const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
        input.setAttribute('type', type);
    }
</script>
@endsection
