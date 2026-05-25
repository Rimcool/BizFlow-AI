<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Password Reset - {{ $appName }}</title>
</head>
<body>
    <h2>Password Reset Request</h2>
    <p>Hello {{ $user->name }},</p>
    
    <p>We received a request to reset your password for your {{ $appName }} account.</p>
    
    <p>Click the link below to reset your password:</p>
    <p><a href="{{ $resetLink }}">Reset Password</a></p>
    
    <p>If you didn't request a password reset, please ignore this email. Your password will remain unchanged.</p>
    
    <p>This password reset link will expire in 60 minutes.</p>
    
    <p>Best regards,<br>
    The {{ $appName }} Team</p>
</body>
</html>