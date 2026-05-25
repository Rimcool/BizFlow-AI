<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>System Update - {{ $appName }}</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; line-height: 1.6; color: #333; max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: linear-gradient(135deg, #4ecdc4 0%, #44a08d 100%); padding: 30px; text-align: center; border-radius: 10px 10px 0 0; color: white; }
        .content { padding: 30px; background: #f9f9f9; border-radius: 0 0 10px 10px; border: 1px solid #ddd; border-top: none; }
        .button { display: inline-block; padding: 12px 30px; background: #4ecdc4; color: white; text-decoration: none; border-radius: 5px; margin: 20px 0; }
        .update-item { background: white; padding: 15px; margin: 15px 0; border-radius: 5px; border-left: 4px solid #4ecdc4; }
        .footer { margin-top: 30px; padding-top: 20px; border-top: 1px solid #ddd; font-size: 14px; color: #777; }
    </style>
</head>
<body>
    <div class="header">
        <h1>System Update</h1>
        <p>{{ $updateDetails['title'] }}</p>
    </div>
    
    <div class="content">
        <p>Hello {{ $user->name }},</p>
        
        <p>We've recently updated the {{ $appName }} platform with new features and improvements:</p>
        
        <div class="update-item">
            <h3>What's New</h3>
            <p>{{ $updateDetails['description'] }}</p>
        </div>
        
        @if(isset($updateDetails['features']))
        <h3>New Features</h3>
        <ul>
            @foreach($updateDetails['features'] as $feature)
            <li><strong>{{ $feature['name'] }}:</strong> {{ $feature['description'] }}</li>
            @endforeach
        </ul>
        @endif
        
        @if(isset($updateDetails['improvements']))
        <h3>Improvements</h3>
        <ul>
            @foreach($updateDetails['improvements'] as $improvement)
            <li>{{ $improvement }}</li>
            @endforeach
        </ul>
        @endif
        
        @if(isset($updateDetails['actions']))
        <h3>Action Required</h3>
        <p>{{ $updateDetails['actions'] }}</p>
        @endif
        
        <p>
            <a href="{{ url('/dashboard') }}" class="button">Explore New Features</a>
        </p>
        
        <div class="footer">
            <p>Best regards,<br>
            The {{ $appName }} Team</p>
        </div>
    </div>
</body>
</html>