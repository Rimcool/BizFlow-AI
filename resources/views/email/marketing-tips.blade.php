<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Marketing Tips - {{ $appName }}</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; line-height: 1.6; color: #333; max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: linear-gradient(135deg, #ff758c 0%, #ff7eb3 100%); padding: 30px; text-align: center; border-radius: 10px 10px 0 0; color: white; }
        .content { padding: 30px; background: #f9f9f9; border-radius: 0 0 10px 10px; border: 1px solid #ddd; border-top: none; }
        .button { display: inline-block; padding: 12px 30px; background: #ff758c; color: white; text-decoration: none; border-radius: 5px; margin: 20px 0; }
        .tip { background: white; padding: 15px; margin: 15px 0; border-radius: 5px; border-left: 4px solid #ff758c; }
        .footer { margin-top: 30px; padding-top: 20px; border-top: 1px solid #ddd; font-size: 14px; color: #777; }
    </style>
</head>
<body>
    <div class="header">
        <h1>Marketing Tips</h1>
        <p>For {{ $business->name }}</p>
    </div>
    
    <div class="content">
        <p>Hello {{ $user->name }},</p>
        
        <p>Here are some marketing tips to help grow your business <strong>{{ $business->name }}</strong>:</p>
        
        @foreach($tips as $tip)
        <div class="tip">
            <h3>{{ $tip['title'] }}</h3>
            <p>{{ $tip['description'] }}</p>
            @if(isset($tip['platform']))
            <p><strong>Platform:</strong> {{ $tip['platform'] }}</p>
            @endif
        </div>
        @endforeach
        
        <p>Try implementing these strategies to reach more customers and increase sales.</p>
        
        <p>
            <a href="{{ url('/dashboard/marketing') }}" class="button">Explore Marketing Tools</a>
        </p>
        
        <div class="footer">
            <p>Best regards,<br>
            The {{ $appName }} Team</p>
        </div>
    </div>
</body>
</html>