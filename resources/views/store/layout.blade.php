<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width,initial-scale=1"/>
  <title>{{ $business->name ?? 'Store' }}</title>

  <!-- dynamic CSS variables -->
  <style>
    :root {
      --primary: {{ $business->main_color ?? '#3A86FF' }};
      --accent: {{ data_get($business->settings,'accent','#FF8C42') }};
      --font-family: "{{ data_get($business->settings,'font','Poppins') }}", sans-serif;
    }
    body { font-family: var(--font-family); background: #fff; color: #111; }
    .btn-primary { background: var(--primary); color: #fff; padding: .6rem 1.2rem; border-radius: 8px; }
  </style>

  <link href="https://fonts.googleapis.com/css2?family={{ urlencode(data_get($business->settings,'font','Poppins')) }}:wght@400;600&display=swap" rel="stylesheet">
  @stack('head')
</head>
<body>
  @include('store.partials.navbar', ['business'=>$business])
  <main>
    @yield('content')
  </main>

  @include('store.partials.footer', ['business'=>$business])

  @stack('scripts')
</body>
</html>
