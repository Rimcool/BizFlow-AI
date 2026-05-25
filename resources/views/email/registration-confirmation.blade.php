<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to {{ $appName }}</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 30px;
            text-align: center;
            border-radius: 10px 10px 0 0;
            color: white;
        }
        .content {
            padding: 30px;
            background: #f9f9f9;
            border-radius: 0 0 10px 10px;
            border: 1px solid #ddd;
            border-top: none;
        }
        .button {
            display: inline-block;
            padding: 12px 30px;
            background: #667eea;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin: 20px 0;
        }
        .features {
            margin: 20px 0;
        }
        .feature-item {
            margin-bottom: 10px;
            padding-left: 20px;
            position: relative;
        }
        .feature-item:before {
            content: "✓";
            position: absolute;
            left: 0;
            color: #667eea;
        }
        .footer {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #ddd;
            font-size: 14px;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Welcome to {{ $appName }}!</h1>
    </div>
    
    <div class="content">
        <p>Dear {{ $user->name }},</p>
        
        <p>Thank you for registering with {{ $appName }}. We're excited to help you build and manage your e-commerce business with our AI-powered tools.</p>
        
        <p>With your account, you can:</p>
        <div class="features">
            <div class="feature-item">Generate a complete e-commerce website</div>
            <div class="feature-item">Optimize your site for search engines (SEO)</div>
            <div class="feature-item">Create effective marketing campaigns</div>
            <div class="feature-item">Get expert business management tips</div>
            <div class="feature-item">Use our AI chatbot for personalized assistance</div>
        </div>
        
        <p>Get started now by accessing your dashboard:</p>
        <p>
            <a href="{{ $loginUrl }}" class="button">Access Your Dashboard</a>
        </p>
        
        <p>If you have any questions, please don't hesitate to contact our support team.</p>
        
        <div class="footer">
            <p>Best regards,<br>
            The {{ $appName }} Team</p>
            
            <p>If you did not create an account with us, please ignore this email.</p>
        </div>
    </div>
</body>
</html>