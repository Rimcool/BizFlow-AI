<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business Info Email</title>
</head>
<body>
    <h2>Hi {{ $business['name'] }},</h2>
<p>Thanks for submitting your business idea to <strong>BizFlow AI</strong>!</p>
<p>We're already working on building your custom eCommerce website.</p>
<p>Stay tuned! You'll be notified once it's ready 🚀</p>
<p>— BizFlow AI Team</p>
    <footer style="margin-top: 20px; font-size: 0.9rem; color: #666;">
        <p>&copy; {{ date('Y') }} BizFlow AI. All rights reserved.</p>
    </footer>
</body>
</html>