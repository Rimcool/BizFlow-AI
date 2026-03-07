<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - BizFlow AI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background: linear-gradient(120deg, #1abc9c 0%, #3498db 100%);
            min-height: 100vh;
            margin: 0;
            font-family: 'Segoe UI', 'Roboto', Arial, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .register-container {
            width: 500px;
            max-width: 90vw;
            background: #fff;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 8px 32px rgba(44, 62, 80, 0.18);
        }
        .top-link {
            text-align: right;
            margin-bottom: 20px;
            font-size: 1rem;
            color: #888;
        }
        .top-link a {
            margin-left: 8px;
            padding: 6px 18px;
            border: 1.5px solid #888;
            border-radius: 18px;
            color: #888;
            text-decoration: none;
            font-weight: 500;
            transition: border-color 0.2s, color 0.2s;
            background: #fff;
        }
        .top-link a:hover {
            border-color: #3498db;
            color: #3498db;
        }
        .auth-title {
            font-size: 2rem;
            font-weight: 700;
            color: #222;
            margin-bottom: 8px;
            font-family: 'Segoe UI', 'Roboto', Arial, sans-serif;
        }
        .auth-subtitle {
            color: #888;
            margin-bottom: 28px;
            font-size: 1.1rem;
        }
        .auth-label {
            font-size: 1rem;
            color: #222;
            margin-bottom: 6px;
            font-weight: 500;
            display: block;
            text-align: left;
            width: 100%;
        }
        .auth-input {
            width: 100%;
            padding: 12px 18px;
            margin-bottom: 18px;
            border: 1.5px solid #3498db;
            border-radius: 10px;
            background: #fff;
            font-size: 1rem;
            color: #222;
            transition: border-color 0.3s, box-shadow 0.3s, background 0.3s;
            box-shadow: 0 2px 8px rgba(52,152,219,0.08);
        }
        .auth-input:focus, .auth-input:hover {
            border-color: #1abc9c;
            background: #f8faff;
            box-shadow: 0 0 12px #3498db55;
            outline: none;
        }
        .input-group {
            position: relative;
        }
        .toggle-btn {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
            font-size: 1.2rem;
            color: #3498db;
            padding: 0;
        }
        .auth-btn {
            width: 100%;
            padding: 14px 0;
            border: none;
            border-radius: 24px;
            font-size: 1.1rem;
            font-weight: 600;
            color: #fff;
            background: linear-gradient(90deg, #1abc9c 0%, #3498db 100%);
            box-shadow: 0 4px 16px rgba(52,152,219,0.15);
            cursor: pointer;
            margin-top: 10px;
            margin-bottom: 18px;
            transition: background 0.3s, box-shadow 0.3s, transform 0.2s;
        }
        .auth-btn:hover, .auth-btn:focus {
            background: linear-gradient(90deg, #16a085 0%, #2980b9 100%);
            box-shadow: 0 0 24px #3498db55;
            transform: scale(1.04);
        }
        .social-row {
            display: flex;
            gap: 18px;
            justify-content: center;
            margin-top: 12px;
        }
        .social-btn {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: #f8faff;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1.5px solid #3498db;
            cursor: pointer;
            transition: background 0.2s, border-color 0.2s;
        }
        .social-btn:hover {
            background: #e3f6f5;
            border-color: #1abc9c;
        }
        .auth-link {
            color: #3498db;
            text-decoration: underline;
            font-weight: 500;
            transition: color 0.2s;
        }
        .auth-link:hover {
            color: #1abc9c;
            text-shadow: 0 0 8px #1abc9c55;
        }
        .text-sm {
            font-size: 0.98rem;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .welcome-message {
            background: linear-gradient(90deg, #1abc9c22 0%, #3498db22 100%);
            padding: 16px;
            border-radius: 10px;
            margin-bottom: 24px;
            border-left: 4px solid #1abc9c;
            color: #222;
            font-weight: 500;
            animation: fadeIn 0.5s ease-in-out;
        }
        .welcome-message p {
            margin: 0;
            font-size: 1rem;
        }
        .alert {
            padding: 12px 16px;
            border-radius: 10px;
            margin-bottom: 20px;
            border-left: 4px solid;
        }
        .alert-danger {
            background-color: #f8d7da;
            border-color: #dc3545;
            color: #721c24;
        }
        .alert-success {
            background-color: #d4edda;
            border-color: #28a745;
            color: #155724;
        }
        .divider {
            display: flex;
            align-items: center;
            margin: 20px 0;
        }
        .divider::before, .divider::after {
            content: "";
            flex: 1;
            border-bottom: 1px solid #ddd;
        }
        .divider span {
            padding: 0 10px;
            color: #888;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <div class="top-link">
            Already have an account?
            <a href="{{ route('login') }}">SIGN IN</a>
        </div>
        
        <h2 class="auth-title">Welcome to BizFlow AI!</h2>
        <div class="auth-subtitle">Register your account</div>
        
        {{-- Display Laravel's session-based success messages --}}
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- Display Laravel's validation errors --}}
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

       <form id="registerForm" method="POST" action="{{ route('register') }}">
    @csrf
            <label class="auth-label" for="name">Name</label>
            <input type="text" name="name" id="name" class="auth-input" required autocomplete="name" placeholder="Enter your full name" value="{{ old('name') }}">

            <label class="auth-label" for="email">Email</label>
            <input type="email" name="email" id="email" class="auth-input" required autocomplete="email" placeholder="Enter your email address" value="{{ old('email') }}">

            <label class="auth-label" for="password">Password</label>
            <div class="input-group">
                <input type="password" name="password" id="password" class="auth-input" required autocomplete="new-password" placeholder="Create a password">
                <button type="button" class="toggle-btn" onclick="togglePassword('password')" aria-label="Show/Hide Password">
                    <i class="fas fa-eye"></i>
                </button>
            </div>

            <label class="auth-label" for="password_confirmation">Confirm Password</label>
            <div class="input-group">
                <input type="password" name="password_confirmation" id="password_confirmation" class="auth-input" required autocomplete="new-password" placeholder="Confirm your password">
                <button type="button" class="toggle-btn" onclick="togglePassword('password_confirmation')" aria-label="Show/Hide Confirm Password">
                    <i class="fas fa-eye"></i>
                </button>
            </div>

            <button type="submit" class="auth-btn">Register</button>
            
            <div class="divider">
                <span>OR</span>
            </div>

            <div class="social-row">
                <button type="button" class="social-btn" title="Sign up with Facebook">
                    <i class="fab fa-facebook-f"></i>
                </button>
                <button type="button" class="social-btn" title="Sign up with LinkedIn">
                    <i class="fab fa-linkedin-in"></i>
                </button>
                <button type="button" class="social-btn" title="Sign up with Google">
                    <i class="fab fa-google"></i>
                </button>
            </div>
        </form>
    </div>

    <script>
        function togglePassword(id) {
            var input = document.getElementById(id);
            var icon = input.nextElementSibling.querySelector('i');
            
            if (input.type === "password") {
                input.type = "text";
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                input.type = "password";
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }
    </script>
</body>
</html>