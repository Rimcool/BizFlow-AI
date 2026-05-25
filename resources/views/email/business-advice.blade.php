<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Business Advice - {{ $appName }}</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; line-height: 1.6; color: #333; max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%); padding: 30px; text-align: center; border-radius: 10px 10px 0 0; color: white; }
        .content { padding: 30px; background: #f9f9f9; border-radius: 0 0 10px 10px; border: 1px solid #ddd; border-top: none; }
        .button { display: inline-block; padding: 12px 30px; background: #6a11cb; color: white; text-decoration: none; border-radius: 5px; margin: 20px 0; }
        .advice { background: white; padding: 15px; margin: 15px 0; border-radius: 5px; border-left: 4px solid #6a11cb; }
        .footer { margin-top: 30px; padding-top: 20px; border-top: 1px solid #ddd; font-size: 14px; color: #777; }
    </style>
</head>
<body>
    <div class="header">
        <h1>Business Management Advice</h1>
        <p>For {{ $business->name }}</p>
    </div>
    
    <div class="content">
        <p>Hello {{ $user->name }},</p>
        
        <p>Here's some business management advice tailored for <strong>{{ $business->name }}</strong>:</p>
        
        @foreach($advice as $item)
        <div class="advice">
            <h3>{{ $item['area'] }}</h3>
            <p>{{ $item['advice'] }}</p>
            @if(isset($item['resources']))
            <p><strong>Resources:</strong> {{ $item['resources'] }}</p>
            @endif
        </div>
        @endforeach
        
        <p>Implementing these practices can help streamline your operations and improve profitability.</p>
        
        <p>
            <a href="{{ url('/dashboard/business') }}" class="button">View Business Tools</a>
        </p>
        
        <div class="footer">
            <p>Best regards,<br>
            The {{ $appName }} Team</p>
        </div>
    </div>
</body>
</html>