<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background: #f4f6f9;
            font-family: Arial, sans-serif;
        }
        .profile-card {
            background: #fff;
            border-radius: 12px;
            padding: 30px;
            text-align: center;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        .profile-card img {
            border-radius: 50%;
            width: 100px;
            height: 100px;
        }
        .nav-tabs {
            border-bottom: none;
            justify-content: center;
            margin-bottom: 20px;
        }
        .nav-tabs .nav-link {
            border: none;
            color: #555;
            font-weight: 500;
        }
        .nav-tabs .nav-link.active {
            color: #007bff;
            border-bottom: 2px solid #007bff;
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <!-- Navbar -->
        <ul class="nav nav-tabs">
            <li class="nav-item"><a class="nav-link {{ request()->is('profile/dashboard') ? 'active' : '' }}" href="{{ route('profile.dashboard') }}">Dashboard</a></li>
            <li class="nav-item"><a class="nav-link {{ request()->is('profile/edit') ? 'active' : '' }}" href="{{ route('profile.edit') }}">Edit Profile</a></li>
            <li class="nav-item"><a class="nav-link {{ request()->is('profile/password') ? 'active' : '' }}" href="{{ route('profile.password') }}">Edit Password</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
        </ul>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>

        <!-- Page Content -->
        <div class="mt-4">
            @yield('content')
        </div>
    </div>
</body>
</html>
