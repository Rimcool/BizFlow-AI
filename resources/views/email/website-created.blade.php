<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Your Website is Ready!</title>
</head>
<body>
    <h1>Congratulations, {{ $business->name }} is Live! 🎉</h1>
    
    <p>Your professional e-commerce website has been successfully created and is now live at:</p>
    
    <p style="text-align: center; margin: 30px 0;">
        <a href="{{ $siteUrl }}" style="background: #4f46e5; color: white; padding: 15px 30px; 
           text-decoration: none; border-radius: 5px; font-size: 18px;">
           View Your Website
        </a>
    </p>
    
    <p>We've attached a comprehensive marketing guide specifically created for your {{ $business->industry }} 
       business. This guide includes:</p>
    
    <ul>
        <li>Social media strategies for your target audience</li>
        <li>Email marketing templates and sequences</li>
        <li>Content ideas and posting schedules</li>
        <li>Advertising recommendations</li>
        <li>Key metrics to track your success</li>
    </ul>
    
    <p>Your personal AI assistant is also ready to help you with any questions about marketing, 
       business management, or growing your online presence.</p>
    
    <p>Welcome to the BizFlow AI family! We're excited to see your business grow.</p>
    
    <p>Best regards,<br>The BizFlow AI Team</p>
</body>
</html>