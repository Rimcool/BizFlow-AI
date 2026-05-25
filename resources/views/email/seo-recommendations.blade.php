<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SEO Recommendations - {{ $appName }}</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; line-height: 1.6; color: #333; max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); padding: 30px; text-align: center; border-radius: 10px 10px 0 0; color: white; }
        .content { padding: 30px; background: #f9f9f9; border-radius: 0 0 10px 10px; border: 1px solid #ddd; border-top: none; }
        .button { display: inline-block; padding: 12px 30px; background: #4facfe; color: white; text-decoration: none; border-radius: 5px; margin: 20px 0; }
        .recommendation { background: white; padding: 15px; margin: 15px 0; border-radius: 5px; border-left: 4px solid #4facfe; }
        .footer { margin-top: 30px; padding-top: 20px; border-top: 1px solid #ddd; font-size: 14px; color: #777; }
    </style>
</head>
<body>
    <div class="header">
        <h1>SEO Recommendations</h1>
        <p>For {{ $business->name }}</p>
    </div>
    
    <div class="content">
        <p>Hello {{ $user->name }},</p>
        
        <p>Based on our analysis of your website <strong>{{ $business->name }}</strong>, here are some SEO recommendations to improve your search engine visibility:</p>
        
        @foreach($recommendations as $rec)
        <div class="recommendation">
            <h3>{{ $rec['title'] }}</h3>
            <p>{{ $rec['description'] }}</p>
            @if(isset($rec['action']))
            <p><strong>Action:</strong> {{ $rec['action'] }}</p>
            @endif
        </div>
        @endforeach
        
        <p>Implementing these recommendations can help drive more organic traffic to your website.</p>
        
        <p>
            <a href="{{ url('/dashboard/seo') }}" class="button">View Detailed SEO Report</a>
        </p>
        
        <div class="footer">
            <p>Best regards,<br>
            The {{ $appName }} Team</p>
        </div>
    </div>
</body>
</html>