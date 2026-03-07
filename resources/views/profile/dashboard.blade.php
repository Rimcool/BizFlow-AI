<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard - BizFlow AI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #3498db;
            --secondary-color: #2c3e50;
            --accent-color: #e74c3c;
            --light-color: #f8f9fa;
            --dark-color: #343a40;
            --success-color: #2ecc71;
            --warning-color: #f39c12;
            --info-color: #1abc9c;
            --gradient: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            background-color: #f5f7fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
            padding-top: 80px;
        }
        
        /* Navigation Bar */
        .navbar {
            background: white;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
            padding: 15px 5%;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
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
        }
        
        .logo-text span {
            color: var(--primary-color);
        }
        
        .nav-links {
            display: flex;
            align-items: center;
            gap: 25px;
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
            color: white;
        }
        
        .nav-link.logout {
            color: var(--accent-color);
        }
        
        .nav-link.logout:hover {
            background-color: #ffeeee;
        }
        
        /* Dashboard Content */
        .dashboard-container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 15px;
        }
        
        .profile-card {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            border: none;
            transition: transform 0.3s ease;
        }
        
        .profile-card:hover {
            transform: translateY(-5px);
        }
        
        .profile-header {
            background: var(--gradient);
            padding: 2rem;
            color: white;
            position: relative;
        }
        
        .profile-avatar {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            border: 4px solid white;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            object-fit: cover;
            background: linear-gradient(45deg, #6a11cb, #2575fc);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            color: white;
        }
        
        .profile-avatar-initials {
            font-weight: bold;
        }
        
        .stats-card {
            border-radius: 12px;
            overflow: hidden;
            border: none;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
        }
        
        .stats-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
        }
        
        .stats-icon {
            font-size: 2rem;
            margin-bottom: 1rem;
            display: inline-block;
            padding: 15px;
            border-radius: 50%;
        }
        
        .quick-access-card {
            border-radius: 12px;
            overflow: hidden;
            border: none;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            height: 100%;
        }
        
        .quick-access-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
        }
        
        .quick-access-icon {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            color: var(--primary-color);
        }
        
        .activity-timeline {
            position: relative;
            padding-left: 30px;
        }
        
        .activity-timeline::before {
            content: '';
            position: absolute;
            left: 10px;
            top: 0;
            bottom: 0;
            width: 2px;
            background: var(--primary-color);
        }
        
        .timeline-item {
            position: relative;
            margin-bottom: 20px;
        }
        
        .timeline-item::before {
            content: '';
            position: absolute;
            left: -30px;
            top: 5px;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: var(--primary-color);
            border: 2px solid white;
            box-shadow: 0 0 0 2px var(--primary-color);
        }
        
        .badge-premium {
            background: linear-gradient(45deg, #FFD700, #FFA500);
            color: #333;
            font-weight: bold;
        }
        
        .progress {
            height: 8px;
            margin-top: 5px;
        }
        
        .section-title {
            position: relative;
            padding-bottom: 15px;
            margin-bottom: 25px;
            font-weight: 600;
        }
        
        .section-title::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 50px;
            height: 3px;
            background: var(--primary-color);
        }
        
        .btn-action {
            background: var(--gradient);
            color: white;
            border: none;
            border-radius: 30px;
            padding: 8px 20px;
            font-weight: 500;
            transition: all 0.3s;
        }
        
        .btn-action:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            color: white;
        }
        
        .geometric-pattern {
            background: 
                linear-gradient(45deg, #e3f2fd 25%, transparent 25%, transparent 75%, #e3f2fd 75%, #e3f2fd),
                linear-gradient(45deg, #e3f2fd 25%, transparent 25%, transparent 75%, #e3f2fd 75%, #e3f2fd);
            background-size: 20px 20px;
            background-position: 0 0, 10px 10px;
        }
        
        .website-list {
            list-style: none;
            padding: 0;
        }
        
        .website-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 15px;
            border-bottom: 1px solid #eee;
            transition: background-color 0.2s;
        }
        
        .website-item:hover {
            background-color: #f8f9fa;
        }
        
        .website-info {
            flex: 1;
        }
        
        .website-name {
            font-weight: 600;
            margin-bottom: 3px;
        }
        
        .website-url {
            font-size: 0.85rem;
            color: #6c757d;
        }
        
        .website-date {
            font-size: 0.8rem;
            color: #6c757d;
            margin-left: 15px;
        }
        
        .website-actions {
            display: flex;
            gap: 10px;
        }
        
        .empty-state {
            text-align: center;
            padding: 30px;
            color: #6c757d;
        }
        
        .empty-state i {
            font-size: 3rem;
            margin-bottom: 15px;
            color: #dee2e6;
        }
        
        /* Loading Spinner */
        .spinner {
            width: 40px;
            height: 40px;
            margin: 100px auto;
            border: 4px solid rgba(0, 0, 0, 0.1);
            border-left-color: var(--primary-color);
            border-radius: 50%;
            animation: spin 1s linear infinite;
            display: none;
        }
        
        @keyframes spin {
            to { transform: rotate(360deg); }
        }
        
        /* Error Message */
        .error-message {
            background-color: #f8d7da;
            color: #721c24;
            padding: 15px;
            border-radius: 8px;
            margin: 20px 0;
            text-align: center;
            display: none;
        }
        
        /* Responsive Design */
        @media (max-width: 992px) {
            .navbar {
                flex-direction: column;
                padding: 15px;
            }
            
            .logo-container {
                margin-bottom: 15px;
            }
            
            .nav-links {
                flex-wrap: wrap;
                justify-content: center;
            }
            
            body {
                padding-top: 120px;
            }
        }
        
        @media (max-width: 576px) {
            .nav-links {
                gap: 10px;
            }
            
            .nav-link {
                padding: 6px 10px;
                font-size: 0.9rem;
            }
            
            .website-item {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .website-date {
                margin-left: 0;
                margin-top: 5px;
            }
            
            .website-actions {
                margin-top: 10px;
                width: 100%;
                justify-content: flex-end;
            }
            
            body {
                padding-top: 140px;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar">
        <div style="display:flex; align-items:center; gap:10px;">
            <img src="images/logo.png" alt="BizFlow AI Logo">
            <h1 class="logo-text">BizFlow <span>AI</span></h1>
        </div>
        
        <div class="nav-links">
            <a href="/" class="nav-link">
                <i class="fas fa-home"></i>
                <span>Home</span>
            </a>
            <a href="/profile/dashboard" class="nav-link active">
                <i class="fas fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
            <a href="/profile/edit" class="nav-link">
                <i class="fas fa-user-edit"></i>
                <span>Edit Profile</span>
            </a>
            <a href="/profile/password" class="nav-link">
                <i class="fas fa-key"></i>
                <span>Change Password</span>
            </a>
            <a href="/profile/logout" class="nav-link logout">
                <i class="fas fa-sign-out-alt"></i>
                <span>Logout</span>
            </a>
        </div>
    </nav>

    <!-- Loading Spinner -->
    <div class="spinner" id="loadingSpinner"></div>

    <!-- Error Message -->
    <div class="error-message" id="errorMessage"></div>

    <!-- Dashboard Content -->
    <div class="dashboard-container" id="dashboardContent">
        <!-- Content will be dynamically loaded here -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Function to format date
        function formatDate(dateString) {
            if (!dateString) return 'Not available';
            const options = { year: 'numeric', month: 'short', day: 'numeric' };
            return new Date(dateString).toLocaleDateString(undefined, options);
        }

        // Function to get time ago
        function timeAgo(dateString) {
            if (!dateString) return 'Not available';
            
            const date = new Date(dateString);
            const now = new Date();
            const diffInSeconds = Math.floor((now - date) / 1000);
            
            if (diffInSeconds < 60) return 'Just now';
            
            const diffInMinutes = Math.floor(diffInSeconds / 60);
            if (diffInMinutes < 60) return `${diffInMinutes} minute${diffInMinutes > 1 ? 's' : ''} ago`;
            
            const diffInHours = Math.floor(diffInMinutes / 60);
            if (diffInHours < 24) return `${diffInHours} hour${diffInHours > 1 ? 's' : ''} ago`;
            
            const diffInDays = Math.floor(diffInHours / 24);
            if (diffInDays < 30) return `${diffInDays} day${diffInDays > 1 ? 's' : ''} ago`;
            
            const diffInMonths = Math.floor(diffInDays / 30);
            return `${diffInMonths} month${diffInMonths > 1 ? 's' : ''} ago`;
        }

        // Function to generate initials from name
        function getInitials(name) {
            if (!name) return 'U';
            return name.split(' ').map(word => word[0]).join('').toUpperCase();
        }

        // Function to calculate percentage
        function calculatePercentage(current, max) {
            return max > 0 ? Math.min(100, Math.round((current / max) * 100)) : 0;
        }

        // Function to get limit based on membership
        function getLimits(membership) {
            const limits = {
                'basic': {
                    websites: 5,
                    seoTools: 15,
                    campaigns: 10,
                    pdfs: 5
                },
                'pro': {
                    websites: 20,
                    seoTools: 50,
                    campaigns: 30,
                    pdfs: 20
                },
                'enterprise': {
                    websites: 100,
                    seoTools: 200,
                    campaigns: 100,
                    pdfs: 50
                }
            };
            
            return limits[membership] || limits.basic;
        }

        // Function to render website list
        function renderWebsiteList(websites) {
            if (!websites || websites.length === 0) {
                return `
                    <div class="empty-state">
                        <i class="fas fa-folder-open"></i>
                        <h5>No websites created yet</h5>
                        <p>Get started by creating your first website</p>
                        <a href="/websites/create" class="btn btn-action mt-2">Create Your First Website</a>
                    </div>
                `;
            }
            
            return `
                <div class="card shadow-sm">
                    <div class="card-body p-0">
                        <ul class="website-list">
                            ${websites.map(website => `
                                <li class="website-item">
                                    <div class="website-info">
                                        <div class="website-name">${website.business_name || 'Unnamed Website'}</div>
                                        <div class="website-url">
                                            <a href="${website.site_url}" target="_blank">${website.site_url}</a>
                                        </div>
                                    </div>
                                    <div class="website-date">Created: ${formatDate(website.created_at)}</div>
                                    <div class="website-actions">
                                        <a href="${website.site_url}" target="_blank" class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-external-link-alt"></i> View
                                        </a>
                                        <a href="/sites/${website.id}" class="btn btn-sm btn-outline-secondary">
                                            <i class="fas fa-cog"></i> Manage
                                        </a>
                                    </div>
                                </li>
                            `).join('')}
                        </ul>
                    </div>
                </div>
            `;
        }

        // Function to render dashboard content
        function renderDashboard(user) {
            const limits = getLimits(user.membership || 'basic');
            const dashboardContent = document.getElementById('dashboardContent');
            
            // Calculate percentages
            const websitesPercent = calculatePercentage(user.websites_count || 0, limits.websites);
            const seoToolsPercent = calculatePercentage(user.seo_tools_count || 0, limits.seoTools);
            const campaignsPercent = calculatePercentage(user.campaigns_count || 0, limits.campaigns);
            const pdfsPercent = calculatePercentage(user.pdfs_count || 0, limits.pdfs);
            
            dashboardContent.innerHTML = `
                <!-- User Profile Section -->
                <div class="card profile-card mb-4">
                    <div class="profile-header">
                        <div class="d-flex align-items-center">
                            <div class="profile-avatar me-4 geometric-pattern">
                                <div class="profile-avatar-initials">${getInitials(user.name)}</div>
                            </div>
                            <div>
                                <h2 class="mb-1">${user.name || 'User'}</h2>
                                <p class="mb-1">${user.email || 'No email provided'}</p>
                                <span class="badge badge-premium">${(user.membership || 'basic').charAt(0).toUpperCase() + (user.membership || 'basic').slice(1)} Member</span>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <p><i class="fas fa-calendar-alt me-2 text-primary"></i> Member since: <strong>${formatDate(user.created_at)}</strong></p>
                                <p><i class="fas fa-clock me-2 text-info"></i> Last login: <strong>${timeAgo(user.last_login_at)}</strong></p>
                            </div>
                            <div class="col-md-6">
                                <p><i class="fas fa-shield-alt me-2 text-success"></i> Account status: <strong class="text-success">Verified</strong></p>
                                <p><i class="fas fa-globe me-2 text-warning"></i> Timezone: <strong>EST (UTC-5)</strong></p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Account Overview Section - Dynamic Content -->
                <h4 class="section-title">Account Overview</h4>
                <div class="row mb-4">
                    <div class="col-md-3 mb-3">
                        <div class="card stats-card text-center h-100">
                            <div class="card-body">
                                <div class="stats-icon bg-primary bg-opacity-10 text-primary">
                                    <i class="fas fa-globe"></i>
                                </div>
                                <h3 class="fw-bold text-primary">${user.websites_count || 0}</h3>
                                <h6 class="text-muted">Websites Created</h6>
                                <div class="progress">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: ${websitesPercent}%" aria-valuenow="${websitesPercent}" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <small>${websitesPercent}% of limit (${limits.websites} websites)</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="card stats-card text-center h-100">
                            <div class="card-body">
                                <div class="stats-icon bg-success bg-opacity-10 text-success">
                                    <i class="fas fa-chart-line"></i>
                                </div>
                                <h3 class="fw-bold text-success">${user.seo_tools_count || 0}</h3>
                                <h6 class="text-muted">SEO Tools Used</h6>
                                <div class="progress">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: ${seoToolsPercent}%" aria-valuenow="${seoToolsPercent}" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <small>${seoToolsPercent}% of limit (${limits.seoTools} tools)</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="card stats-card text-center h-100">
                            <div class="card-body">
                                <div class="stats-icon bg-danger bg-opacity-10 text-danger">
                                    <i class="fas fa-bullhorn"></i>
                                </div>
                                <h3 class="fw-bold text-danger">${user.campaigns_count || 0}</h3>
                                <h6 class="text-muted">Campaigns Launched</h6>
                                <div class="progress">
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: ${campaignsPercent}%" aria-valuenow="${campaignsPercent}" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <small>${campaignsPercent}% of limit (${limits.campaigns} campaigns)</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="card stats-card text-center h-100">
                            <div class="card-body">
                                <div class="stats-icon bg-warning bg-opacity-10 text-warning">
                                    <i class="fas fa-file-pdf"></i>
                                </div>
                                <h3 class="fw-bold text-warning">${user.pdfs_count || 0}</h3>
                                <h6 class="text-muted">Business Growth PDFs</h6>
                                <div class="progress">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: ${pdfsPercent}%" aria-valuenow="${pdfsPercent}" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <small>${pdfsPercent}% of limit (${limits.pdfs} PDFs)</small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Websites Section - Show user's created websites -->
                <h4 class="section-title">Your Websites</h4>
                <div class="mb-4">
                    ${renderWebsiteList(user.websites || [])}
                </div>

                <!-- Quick Access Section - Dynamic Content -->
                <h4 class="section-title">Quick Access</h4>
                <div class="row mb-4">
                    <div class="col-md-3 mb-3">
                        <div class="card quick-access-card text-center h-100">
                            <div class="card-body">
                                <div class="quick-access-icon">
                                    <i class="fas fa-laptop-code"></i>
                                </div>
                                <h5 class="card-title">Website Creation</h5>
                                <p class="card-text">Start building a new website with our easy-to-use tools.</p>
                                <a href="/websites/create" class="btn btn-action">Create Website</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="card quick-access-card text-center h-100">
                            <div class="card-body">
                                <div class="quick-access-icon">
                                    <i class="fas fa-search"></i>
                                </div>
                                <h5 class="card-title">SEO Tools</h5>
                                <p class="card-text">Optimize your website and rank higher on search engines.</p>
                                <a href="/seo/tools" class="btn btn-action">Use SEO Tools</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="card quick-access-card text-center h-100">
                            <div class="card-body">
                                <div class="quick-access-icon">
                                    <i class="fas fa-rocket"></i>
                                </div>
                                <h5 class="card-title">Marketing Campaigns</h5>
                                <p class="card-text">Launch campaigns to reach more customers and grow your business.</p>
                                <a href="/campaigns/create" class="btn btn-action">Start Campaign</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="card quick-access-card text-center h-100">
                            <div class="card-body">
                                <div class="quick-access-icon">
                                    <i class="fas fa-file-pdf"></i>
                                </div>
                                <h5 class="card-title">Business Growth PDFs</h5>
                                <p class="card-text">Create professional business growth strategy documents.</p>
                                <a href="/pdfs/create" class="btn btn-action">Create PDF</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Activity Section - Dynamic Content -->
                <h4 class="section-title">Recent Activity</h4>
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-white py-3">
                        <ul class="nav nav-pills card-header-pills">
                            <li class="nav-item">
                                <a class="nav-link active" href="#"><i class="fas fa-list me-1"></i> All Activities</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fas fa-globe me-1"></i> Websites</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fas fa-chart-line me-1"></i> SEO</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fas fa-bullhorn me-1"></i> Campaigns</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fas fa-file-pdf me-1"></i> PDFs</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="activity-timeline">
                            ${user.activity && user.activity.length > 0 ? user.activity.map(item => `
                                <div class="timeline-item">
                                    <h6 class="mb-1">${item.action} ${item.details ? `<strong>"${item.details}"</strong>` : ''}</h6>
                                    <p class="text-muted mb-0"><small><i class="fas fa-clock me-1"></i> ${item.time}</small></p>
                                </div>
                            `).join('') : `
                                <div class="timeline-item">
                                    <h6 class="mb-1">No recent activity</h6>
                                    <p class="text-muted mb-0"><small>Your activities will appear here</small></p>
                                </div>
                            `}
                        </div>
                    </div>
                </div>
            `;

            // Add animation to cards after rendering
            const cards = document.querySelectorAll('.card');
            cards.forEach((card, index) => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                setTimeout(() => {
                    card.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, 100 + (index * 100));
            });
        }

        // Fetch user data from backend
        async function fetchUserData() {
            try {
                const response = await fetch('/api/user/profile', {
                    headers: {
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest',
                    },
                    credentials: 'include' // Include cookies for authentication
                });
                
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                
                const userData = await response.json();
                return userData;
            } catch (error) {
                console.error('Error fetching user data:', error);
                throw error;
            }
        }

        // Load dashboard data
        document.addEventListener('DOMContentLoaded', async function() {
            const spinner = document.getElementById('loadingSpinner');
            const errorMessage = document.getElementById('errorMessage');
            const dashboardContent = document.getElementById('dashboardContent');
            
            // Show loading spinner
            spinner.style.display = 'block';
            dashboardContent.style.display = 'none';
            errorMessage.style.display = 'none';
            
            try {
                // Fetch user data from your backend API
                const userData = await fetchUserData();
                
                // Hide spinner and show content
                spinner.style.display = 'none';
                dashboardContent.style.display = 'block';
                
                // Render dashboard with user data
                renderDashboard(userData);
            } catch (error) {
                // Hide spinner and show error
                spinner.style.display = 'none';
                errorMessage.textContent = 'Failed to load user data. Please try again later.';
                errorMessage.style.display = 'block';
                console.error('Error loading dashboard:', error);
                
                // Fallback: Show a basic message if API fails
                dashboardContent.innerHTML = `
                    <div class="alert alert-warning">
                        <h4>Welcome to BizFlow AI</h4>
                        <p>Unable to load your profile data at this time. Please try refreshing the page.</p>
                        <button class="btn btn-primary mt-2" onclick="location.reload()">Refresh Page</button>
                    </div>
                `;
                dashboardContent.style.display = 'block';
            }
        });
    </script>
</body>
</html>