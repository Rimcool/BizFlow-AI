<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Monthly Report - {{ $appName }}</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; line-height: 1.6; color: #333; max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: linear-gradient(135deg, #ff9a9e 0%, #fad0c4 100%); padding: 30px; text-align: center; border-radius: 10px 10px 0 0; color: white; }
        .content { padding: 30px; background: #f9f9f9; border-radius: 0 0 10px 10px; border: 1px solid #ddd; border-top: none; }
        .button { display: inline-block; padding: 12px 30px; background: #ff9a9e; color: white; text-decoration: none; border-radius: 5px; margin: 20px 0; }
        .metric { background: white; padding: 15px; margin: 15px 0; border-radius: 5px; display: flex; justify-content: space-between; }
        .metric .value { font-weight: bold; font-size: 1.2em; }
        .improvement { color: green; }
        .decline { color: red; }
        .footer { margin-top: 30px; padding-top: 20px; border-top: 1px solid #ddd; font-size: 14px; color: #777; }
    </style>
</head>
<body>
    <div class="header">
        <h1>Monthly Performance Report</h1>
        <p>For {{ $business->name }}</p>
    </div>
    
    <div class="content">
        <p>Hello {{ $user->name }},</p>
        
        <p>Here's your monthly performance report for <strong>{{ $business->name }}</strong>:</p>
        
        <h2>Key Metrics</h2>
        
        @foreach($reportData['metrics'] as $metric)
        <div class="metric">
            <span>{{ $metric['name'] }}:</span>
            <span class="value">
                {{ $metric['value'] }}
                @if(isset($metric['change']))
                    @if($metric['change'] > 0)
                        <span class="improvement">(+{{ $metric['change'] }}%)</span>
                    @elseif($metric['change'] < 0)
                        <span class="decline">({{ $metric['change'] }}%)</span>
                    @endif
                @endif
            </span>
        </div>
        @endforeach
        
        <h2>Top Recommendations</h2>
        
        <ul>
            @foreach($reportData['recommendations'] as $rec)
            <li>{{ $rec }}</li>
            @endforeach
        </ul>
        
        <p>
            <a href="{{ url('/dashboard/analytics') }}" class="button">View Detailed Analytics</a>
        </p>
        
        <div class="footer">
            <p>Best regards,<br>
            The {{ $appName }} Team</p>
        </div>
    </div>
</body>
</html>