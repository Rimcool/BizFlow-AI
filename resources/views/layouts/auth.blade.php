
@if(session('reminder'))
    <div style="background:#cce5ff;padding:10px;margin:10px 0;color:#004085;border-radius:8px;">
        {{ session('reminder') }}
    </div>
@endif
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'BizFlow AI') }}</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-secondary text-white font-sans">

    <div class="min-h-screen flex items-center justify-center">
        <div class="auth-container">
            @yield('content')
        </div>
    </div>

</body>
</html>
