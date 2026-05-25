
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
    .verify-wrapper {
        width: 650px;
        max-width: 98vw;
        min-height: 320px;
        background: none;
        display: flex;
        border-radius: 32px;
        box-shadow: 0 8px 32px rgba(44, 62, 80, 0.18);
        overflow: hidden;
        margin: 40px 0;
    }
    .verify-right {
        flex: 1;
        background: #fff;
        padding: 48px 56px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        position: relative;
        border-radius: 32px;
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
        .verify-wrapper { width: 98vw; }
        .verify-right { width: 100%; padding: 32px 12vw; border-radius: 0; }
    }
</style>

<div class="verify-wrapper">
    <div class="verify-right">
        <h2 class="auth-title">Verify your email address</h2>
        <div class="auth-subtitle">
            Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another.
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                A new verification link has been sent to the email address you provided during registration.
            </div>
        @endif

        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit" class="auth-btn">Resend Verification Email</button>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="auth-link" style="margin-top:18px;">Log Out</button>
        </form>
    </div
