<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Settings</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #3A86FF;
            --secondary-color: #FF8C42;
            --text-dark: #000000;
            --text-light: #444444;
            --bg-light: #F7FAFC;
            --white: #FFFFFF;
            --sidebar-bg: #2c3e50;
            --sidebar-hover: #34495e;
            --shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            color: var(--text-dark);
            background-color: var(--bg-light);
            line-height: 1.6;
            display: flex;
        }

        /* Sidebar Styles */
        .sidebar {
            width: 250px;
            background-color: var(--sidebar-bg);
            color: white;
            height: 100vh;
            position: fixed;
            padding: 1.5rem 1rem;
            transition: var(--transition);
        }

        .sidebar-header {
            display: flex;
            align-items: center;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .sidebar-header h2 {
            font-size: 1.5rem;
            margin-left: 10px;
        }

        .sidebar-menu {
            list-style: none;
        }

        .sidebar-menu li {
            margin-bottom: 0.5rem;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            padding: 0.8rem 1rem;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            transition: var(--transition);
        }

        .sidebar-menu a:hover {
            background-color: var(--sidebar-hover);
        }

        .sidebar-menu i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
        }

        .sidebar-menu .active {
            background-color: var(--primary-color);
        }

        /* Main Content */
        .main-content {
            flex: 1;
            margin-left: 250px;
            padding: 2rem;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid #eee;
        }

        .welcome-message h1 {
            font-size: 1.8rem;
            color: var(--text-dark);
        }

        .welcome-message p {
            color: var(--text-light);
        }

        .admin-info {
            display: flex;
            align-items: center;
        }

        .admin-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: var(--primary-color);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 10px;
            font-weight: 600;
        }

        /* Dashboard Cards */
        .dashboard-cards {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .card {
            background-color: var(--white);
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: var(--shadow);
            transition: var(--transition);
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        }

        .card-header {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
        }

        .card-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            background-color: rgba(58, 134, 255, 0.1);
            color: var(--primary-color);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
            font-size: 1.5rem;
        }

        .card-title {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--text-dark);
        }

        .card-content {
            color: var(--text-light);
        }

        /* Settings Sections */
        .settings-section {
            background-color: var(--white);
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: var(--shadow);
            margin-bottom: 2rem;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid #eee;
        }

        .section-title {
            font-size: 1.5rem;
            color: var(--text-dark);
        }

        .section-content {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
        }

        .setting-item {
            padding: 1rem;
            border: 1px solid #eee;
            border-radius: 8px;
            transition: var(--transition);
        }

        .setting-item:hover {
            border-color: var(--primary-color);
        }

        .setting-title {
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: var(--text-dark);
        }

        .setting-description {
            color: var(--text-light);
            font-size: 0.9rem;
            margin-bottom: 1rem;
        }

        .btn {
            padding: 0.6rem 1.2rem;
            background-color: var(--primary-color);
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 500;
            transition: var(--transition);
        }

        .btn:hover {
            background-color: #2a75e6;
        }

        /* Responsive Design */
        @media (max-width: 992px) {
            .sidebar {
                width: 80px;
                padding: 1rem 0.5rem;
            }
            
            .sidebar-header h2, .sidebar-menu span {
                display: none;
            }
            
            .sidebar-menu i {
                margin-right: 0;
            }
            
            .main-content {
                margin-left: 80px;
            }
        }

        @media (max-width: 768px) {
            .dashboard-cards, .section-content {
                grid-template-columns: 1fr;
            }
            
            .sidebar {
                width: 0;
                overflow: hidden;
            }
            
            .main-content {
                margin-left: 0;
            }
            
            .header {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .admin-info {
                margin-top: 1rem;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-header">
            <i class="fas fa-cogs"></i>
            <h2>Admin Panel</h2>
        </div>
        <ul class="sidebar-menu">
            <li><a href="#" class="active"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a></li>
            <li><a href="#"><i class="fas fa-user"></i> <span>Profile</span></a></li>
            <li><a href="#"><i class="fas fa-users"></i> <span>User Management</span></a></li>
            <li><a href="#"><i class="fas fa-sliders-h"></i> <span>System Settings</span></a></li>
            <li><a href="#"><i class="fas fa-shield-alt"></i> <span>Security</span></a></li>
            <li><a href="#"><i class="fas fa-chart-bar"></i> <span>Analytics</span></a></li>
            <li><a href="#"><i class="fas fa-cog"></i> <span>Preferences</span></a></li>
            <li><a href="#"><i class="fas fa-sign-out-alt"></i> <span>Logout</span></a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="header">
            <div class="welcome-message">
                <h1>Admin Settings Dashboard</h1>
                <p>Update profile, manage users and system settings</p>
            </div>
            <div class="admin-info">
                <div class="admin-avatar">A</div>
                <div>
                    <div>Admin User</div>
                    <small>Administrator</small>
                </div>
            </div>
        </div>

        <!-- Dashboard Cards -->
        <div class="dashboard-cards">
            <div class="card">
                <div class="card-header">
                    <div class="card-icon">
                        <i class="fas fa-user"></i>
                    </div>
                    <h3 class="card-title">Profile Settings</h3>
                </div>
                <div class="card-content">
                    <p>Update your personal information, change password, and manage your account preferences.</p>
                    <button class="btn">Manage Profile</button>
                </div>
            </div>
            
            <div class="card">
                <div class="card-header">
                    <div class="card-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3 class="card-title">User Management</h3>
                </div>
                <div class="card-content">
                    <p>View, add, edit, or delete users. Manage user roles and permissions across the system.</p>
                    <button class="btn">Manage Users</button>
                </div>
            </div>
            
            <div class="card">
                <div class="card-header">
                    <div class="card-icon">
                        <i class="fas fa-sliders-h"></i>
                    </div>
                    <h3 class="card-title">System Settings</h3>
                </div>
                <div class="card-content">
                    <p>Configure system-wide settings, appearance, and functionality options for your business.</p>
                    <button class="btn">System Config</button>
                </div>
            </div>
        </div>

        <!-- Profile Settings Section -->
        <div class="settings-section">
            <div class="section-header">
                <h2 class="section-title">Profile Settings</h2>
            </div>
            <div class="section-content">
                <div class="setting-item">
                    <h3 class="setting-title">Personal Information</h3>
                    <p class="setting-description">Update your name, email, contact information and other personal details.</p>
                    <button class="btn">Edit Information</button>
                </div>
                
                <div class="setting-item">
                    <h3 class="setting-title">Change Password</h3>
                    <p class="setting-description">Update your password to keep your account secure. Use a strong, unique password.</p>
                    <button class="btn">Change Password</button>
                </div>
                
                <div class="setting-item">
                    <h3 class="setting-title">Notification Preferences</h3>
                    <p class="setting-description">Manage how and when you receive notifications from the system.</p>
                    <button class="btn">Configure Notifications</button>
                </div>
            </div>
        </div>

        <!-- User Management Section -->
        <div class="settings-section">
            <div class="section-header">
                <h2 class="section-title">User Management</h2>
            </div>
            <div class="section-content">
                <div class="setting-item">
                    <h3 class="setting-title">User List</h3>
                    <p class="setting-description">View all users, filter by status, and manage user accounts.</p>
                    <button class="btn">View Users</button>
                </div>
                
                <div class="setting-item">
                    <h3 class="setting-title">Add New User</h3>
                    <p class="setting-description">Create new user accounts with specific roles and permissions.</p>
                    <button class="btn">Add User</button>
                </div>
                
                <div class="setting-item">
                    <h3 class="setting-title">Role Management</h3>
                    <p class="setting-description">Define and manage user roles and their permissions within the system.</p>
                    <button class="btn">Manage Roles</button>
                </div>
            </div>
        </div>

        <!-- System Settings Section -->
        <div class="settings-section">
            <div class="section-header">
                <h2 class="section-title">System Settings</h2>
            </div>
            <div class="section-content">
                <div class="setting-item">
                    <h3 class="setting-title">Business Information</h3>
                    <p class="setting-description">Update your business name, contact details, and other business information.</p>
                    <button class="btn">Update Business Info</button>
                </div>
                
                <div class="setting-item">
                    <h3 class="setting-title">Appearance</h3>
                    <p class="setting-description">Customize the look and feel of your storefront and admin panel.</p>
                    <button class="btn">Customize Appearance</button>
                </div>
                
                <div class="setting-item">
                    <h3 class="setting-title">Security Settings</h3>
                    <p class="setting-description">Configure security options, including login rules and data protection.</p>
                    <button class="btn">Security Config</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Simple navigation functionality
        document.querySelectorAll('.sidebar-menu a').forEach(link => {
            link.addEventListener('click', (e) => {
                e.preventDefault();
                document.querySelectorAll('.sidebar-menu a').forEach(item => {
                    item.classList.remove('active');
                });
                link.classList.add('active');
            });
        });

        // Button functionality
        document.querySelectorAll('.btn').forEach(button => {
            button.addEventListener('click', () => {
                alert('This functionality would open a detailed settings page in a real application.');
            });
        });
    </script>
</body>
</html>