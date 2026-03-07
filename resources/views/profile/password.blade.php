<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password - BizFlow AI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #3498db;
            --secondary-color: #2c3e50;
            --accent-color: #e74c3c;
        }
        
        /* Navigation Bar */
        .navbar {
            background: white;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
            padding: 12px 5%;
            position: sticky;
            top: 0;
            z-index: 1000;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .logo-container {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .logo-text {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--secondary-color);
            margin: 0;
        }
        
        .logo-text span {
            color: var(--primary-color);
        }
        
        .nav-links {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .nav-link {
            color: var(--secondary-color);
            text-decoration: none;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 8px 15px;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        
        .nav-link:hover {
            background-color: #f0f5ff;
            color: var(--primary-color);
        }
        
        .nav-link.active {
            background-color: var(--primary-color);
            color: white !important;
        }
        
        .nav-link.logout {
            color: var(--accent-color);
        }
        
        .nav-link.logout:hover {
            background-color: #ffeeee;
        }
        
        /* Body Styles */
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
        }
        
        .main-content {
            padding: 20px;
            padding-top: 80px;
        }
        
        .password-container {
            max-width: 500px;
            margin: 0 auto;
            padding: 2rem;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }
        
        .password-header {
            text-align: center;
            margin-bottom: 1.5rem;
            color: #2c3e50;
        }
        
        .form-label {
            font-weight: 500;
            color: #2c3e50;
        }
        
        .btn-primary {
            background-color: #3498db;
            border-color: #3498db;
            width: 100%;
            padding: 0.75rem;
            font-weight: 600;
        }
        
        .btn-primary:hover {
            background-color: #2980b9;
            border-color: #2980b9;
        }
        
        .password-instructions {
            background-color: #f8f9fa;
            padding: 1rem;
            border-radius: 5px;
            margin-bottom: 1.5rem;
            font-size: 0.9rem;
        }
        
        .password-instructions h5 {
            color: #2c3e50;
            margin-bottom: 0.5rem;
        }
        
        /* Form styling */
        .form-control {
            padding: 0.75rem;
            border-radius: 8px;
            border: 1px solid #ddd;
            transition: border-color 0.3s;
            width: 100%;
            margin-bottom: 1rem;
        }
        
        .form-control:focus {
            border-color: #3498db;
            box-shadow: 0 0 0 0.25rem rgba(52, 152, 219, 0.25);
        }
        
        /* Validation styles */
        .is-invalid {
            border-color: #dc3545;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 12 12' width='12' height='12' fill='none' stroke='%23dc3545'%3e%3ccircle cx='6' cy='6' r='4.5'/%3e%3cpath d='M5.8 3.6h.4L6 6.5z'/%3e%3ccircle cx='6' cy='8.2' r='.6' fill='%23dc3545' stroke='none'/%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right calc(0.375em + 0.1875rem) center;
            background-size: calc(0.75em + 0.375rem) calc(0.75em + 0.375rem);
        }
        
        .is-valid {
            border-color: #198754;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 8 8'%3e%3cpath fill='%23198754' d='M2.3 6.73L.6 4.53c-.4-1.04.46-1.4 1.1-.8l1.1 1.4 3.4-3.8c.6-.63 1.6-.27 1.2.7l-4 4.6c-.43.5-.8.4-1.1.1z'/%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right calc(0.375em + 0.1875rem) center;
            background-size: calc(0.75em + 0.375rem) calc(0.75em + 0.375rem);
        }
        
        .invalid-feedback {
            display: none;
            width: 100%;
            margin-top: -0.5rem;
            margin-bottom: 1rem;
            font-size: 0.875em;
            color: #dc3545;
        }
        
        .was-validated .form-control:invalid ~ .invalid-feedback,
        .form-control.is-invalid ~ .invalid-feedback {
            display: block;
        }
        
        /* Responsive adjustments */
        @media (max-width: 992px) {
            .nav-links {
                gap: 10px;
            }
            
            .nav-link span {
                display: none;
            }
            
            .nav-link {
                padding: 10px;
                font-size: 1.2rem;
            }
        }
        
        @media (max-width: 768px) {
            .navbar {
                flex-direction: column;
                padding: 1rem;
            }
            
            .nav-links {
                margin-top: 1rem;
                flex-wrap: wrap;
                justify-content: center;
                gap: 5px;
            }
            
            .password-container {
                margin: 1rem;
                padding: 1.5rem;
            }
            
            .main-content {
                padding-top: 140px;
            }
        }
        
        @media (max-width: 480px) {
            .logo-text {
                font-size: 1.5rem;
            }
            
            .nav-link {
                padding: 8px;
            }
            
            .password-header h2 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="logo-container">
            <div style="width: 40px; height: 40px; background: linear-gradient(135deg, #3498db, #2c3e50); border-radius: 8px; display: flex; align-items: center; justify-content: center; color: white; font-weight: bold;">B</div>
            <h1 class="logo-text">BizFlow <span>AI</span></h1>
        </div>
            
        <div class="nav-links">
            <a href="/" class="nav-link">
                <i class="fas fa-home"></i>
                <span>Home</span>
            </a>
            <a href="/profile/dashboard" class="nav-link">
                <i class="fas fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
            <a href="/profile/edit" class="nav-link">
                <i class="fas fa-user-edit"></i>
                <span>Edit Profile</span>
            </a>
            <a href="/profile/password" class="nav-link active">
                <i class="fas fa-key"></i>
                <span>Change Password</span>
            </a>
            <a href="/profile/logout" class="nav-link logout">
                <i class="fas fa-sign-out-alt"></i>
                <span>Logout</span>
            </a>
        </div>
    </nav>

    <!-- Password Content -->
    <div class="main-content">
        <div class="container">
            <div class="password-container">
                <div class="password-header">
                    <h2>Change Your Password</h2>
                    <p class="text-muted">Secure your account with a new password</p>
                </div>

                <div class="password-instructions">
                    <h5>Password Requirements:</h5>
                    <ul class="mb-0">
                        <li>Minimum 8 characters long</li>
                        <li>Include at least one uppercase letter</li>
                        <li>Include at least one number</li>
                        <li>Include at least one special character</li>
                    </ul>
                </div>

                <!-- Success message placeholder -->
                <div class="alert alert-success alert-dismissible fade show" role="alert" style="display: none;" id="successAlert">
                    Password updated successfully!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

                <form id="passwordForm" novalidate>
                    <div class="form-group">
                        <label for="current_password" class="form-label">Current Password</label>
                        <input type="password" id="current_password" name="current_password" class="form-control" required>
                        <div class="invalid-feedback" id="currentPasswordError">
                            Please enter your current password.
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="form-label">New Password</label>
                        <input type="password" id="password" name="password" class="form-control" required pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$">
                        <div class="invalid-feedback" id="passwordError">
                            Password must be at least 8 characters with uppercase, number, and special character.
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation" class="form-label">Confirm New Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
                        <div class="invalid-feedback" id="passwordConfirmationError">
                            Passwords do not match.
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Update Password</button>
                    
                    <div class="text-center mt-3">
                        <a href="/profile/dashboard" class="text-decoration-none">← Back to Dashboard</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Form validation
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('passwordForm');
            const successAlert = document.getElementById('successAlert');
            const passwordInput = document.getElementById('password');
            const confirmPasswordInput = document.getElementById('password_confirmation');
            
            // Add input event listeners for real-time validation
            const currentPasswordInput = document.getElementById('current_password');
            
            currentPasswordInput.addEventListener('input', function() {
                validateField(this);
            });
            
            passwordInput.addEventListener('input', function() {
                validateField(this);
                validatePasswordConfirmation();
            });
            
            confirmPasswordInput.addEventListener('input', function() {
                validatePasswordConfirmation();
            });
            
            form.addEventListener('submit', function(event) {
                event.preventDefault();
                
                // Validate all fields
                let isValid = true;
                
                if (!validateField(currentPasswordInput)) isValid = false;
                if (!validateField(passwordInput)) isValid = false;
                if (!validatePasswordConfirmation()) isValid = false;
                
                if (isValid) {
                    // Form is valid - show success message
                    successAlert.style.display = 'block';
                    
                    // Hide alert after 3 seconds
                    setTimeout(function() {
                        successAlert.style.display = 'none';
                    }, 3000);
                    
                    // Clear form
                    form.reset();
                    
                    // Here you would typically submit the form to your server
                    console.log('Form is valid. Submitting...');
                } else {
                    // Form is invalid - scroll to first error
                    const firstError = form.querySelector('.is-invalid');
                    if (firstError) {
                        firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    }
                }
            });
            
            function validateField(field) {
                if (field.hasAttribute('required') && field.value.trim() === '') {
                    field.classList.add('is-invalid');
                    field.classList.remove('is-valid');
                    return false;
                }
                
                if (field.id === 'password' && field.value.trim() !== '') {
                    const passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
                    if (!passwordPattern.test(field.value)) {
                        field.classList.add('is-invalid');
                        field.classList.remove('is-valid');
                        return false;
                    }
                }
                
                field.classList.remove('is-invalid');
                field.classList.add('is-valid');
                return true;
            }
            
            function validatePasswordConfirmation() {
                if (passwordInput.value !== confirmPasswordInput.value) {
                    confirmPasswordInput.classList.add('is-invalid');
                    confirmPasswordInput.classList.remove('is-valid');
                    return false;
                } else if (confirmPasswordInput.value.trim() !== '') {
                    confirmPasswordInput.classList.remove('is-invalid');
                    confirmPasswordInput.classList.add('is-valid');
                    return true;
                }
                return false;
            }
        });
    </script>
</body>
</html>