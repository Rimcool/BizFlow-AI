<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'BizFlow AI') }}</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-secondary text-white font-sans">
    
    @include('partials.navbar')

    <div class="container mx-auto p-6">
        @yield('content')
    </div>

    @if(session('reminder'))
        <div style="background:#cce5ff;padding:10px;margin:10px 0;color:#004085;">
            {{ session('reminder') }}
        </div>
    @endif

</body>
</html>
