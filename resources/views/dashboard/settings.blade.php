<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $business->name }} - Settings</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: {{ $business->color ?? '#3A86FF' }};
            --secondary-color: #00C896;
            --dark-color: #2D3748;
            --light-color: #F8FAFC;
            --gray-color: #718096;
            --success-color: #48BB78;
            --warning-color: #ED8936;
            --danger-color: #F56565;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background: #f5f7fa;
            color: var(--dark-color);
            display: flex;
            min-height: 100vh;
        }
        
        .sidebar {
            width: 250px;
            background: white;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            padding: 20px 0;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
        }
        
        .logo {
            text-align: center;
            padding: 20px;
            border-bottom: 1px solid #eee;
            margin-bottom: 20px;
        }
        
        .logo h2 {
            color: var(--primary-color);
            font-size: 1.5rem;
        }
        
        .nav-links {
            list-style: none;
            padding: 0 20px;
        }
        
        .nav-links li {
            margin-bottom: 5px;
        }
        
        .nav-links a {
            display: flex;
            align-items: center;
            padding: 12px 15px;
            text-decoration: none;
            color: var(--dark-color);
            border-radius: 8px;
            transition: all 0.3s;
            gap: 12px;
        }
        
        .nav-links a:hover, .nav-links a.active {
            background: var(--primary-color);
            color: white;
        }
        
        .nav-links a i {
            width: 20px;
            text-align: center;
        }
        
        .main-content {
            flex: 1;
            margin-left: 250px;
            padding: 30px;
        }
        
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }
        
        .card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            padding: 30px;
            margin-bottom: 25px;
        }
        
        .card-header {
            border-bottom: 1px solid #eee;
            padding-bottom: 15px;
            margin-bottom: 20px;
        }
        
        .card-header h3 {
            color: var(--dark-color);
            font-size: 1.3rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: var(--dark-color);
        }
        
        .form-control {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-family: 'Poppins', sans-serif;
            font-size: 1rem;
            transition: all 0.3s;
        }
        
        .form-control:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(58, 134, 255, 0.1);
        }
        
        .btn {
            padding: 12px 24px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 500;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s;
            font-family: 'Poppins', sans-serif;
        }
        
        .btn-primary {
            background: var(--primary-color);
            color: white;
        }
        
        .btn-primary:hover {
            background: #2a75f0;
        }
        
        .btn-danger {
            background: var(--danger-color);
            color: white;
        }
        
        .btn-danger:hover {
            background: #e53e3e;
        }
        
        .api-key-container {
            background: #f8f9fa;
            border: 1px solid #e9ecef;
            border-radius: 8px;
            padding: 15px;
            margin: 15px 0;
        }
        
        .api-key {
            font-family: monospace;
            background: white;
            padding: 10px;
            border-radius: 6px;
            border: 1px dashed #ddd;
            word-break: break-all;
            margin: 10px 0;
        }
        
        .color-preview {
            width: 40px;
            height: 40px;
            border-radius: 6px;
            border: 2px solid #ddd;
            display: inline-block;
            vertical-align: middle;
            margin-left: 10px;
        }
        
        .alert {
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        
        .alert-success {
            background: #d1edff;
            color: #0c5460;
            border-left: 4px solid var(--success-color);
        }
        
        .business-info {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 15px;
            margin-top: 20px;
        }
        
        .info-item {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 8px;
        }
        
        .info-item label {
            font-weight: 600;
            color: var(--gray-color);
            font-size: 0.9rem;
            display: block;
            margin-bottom: 5px;
        }
        
        .info-item span {
            color: var(--dark-color);
            font-size: 1rem;
        }
        
        @media (max-width: 768px) {
            .sidebar {
                width: 70px;
            }
            
            .sidebar .logo h2, .nav-links span {
                display: none;
            }
            
            .main-content {
                margin-left: 70px;
                padding: 15px;
            }
            
            .business-info {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="logo">
            <h2>{{ $business->name }}</h2>
            <small>Admin Dashboard</small>
        </div>
        
        <ul class="nav-links">
            <li><a href="{{ route('dashboard.show', $business->id) }}"><i class="fas fa-home"></i> <span>Dashboard</span></a></li>
            <li><a href="{{ route('dashboard.products', $business->id) }}"><i class="fas fa-box"></i> <span>Products</span></a></li>
            <li><a href="{{ route('dashboard.orders', $business->id) }}"><i class="fas fa-shopping-cart"></i> <span>Orders</span></a></li>
            <li><a href="#" class="active"><i class="fas fa-cog"></i> <span>Settings</span></a></li>
            <li><a href="/"><i class="fas fa-globe"></i> <span>View Website</span></a></li>
        </ul>
    </div>
    
    <!-- Main Content -->
    <div class="main-content">
        <div class="header">
            <h1>Website Settings</h1>
        </div>

        @if(session('success'))
        <div class="alert alert-success">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
        </div>
        @endif

        @if(session('api_key'))
        <div class="alert alert-success">
            <i class="fas fa-key"></i> New API Key Generated: {{ session('api_key') }}
        </div>
        @endif
        
        <!-- Business Settings Card -->
        <div class="card">
            <div class="card-header">
                <h3><i class="fas fa-store"></i> Business Information</h3>
            </div>
            
            <form action="{{ route('dashboard.settings.update', $business->id) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Business Name</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ $business->name }}" required>
                </div>
                
                <div class="form-group">
                    <label for="color">Primary Color</label>
                    <div style="display: flex; align-items: center; gap: 15px;">
                        <input type="color" id="color" name="color" class="form-control" value="{{ $business->color }}" style="width: 80px; height: 50px; padding: 5px;">
                        <span>Current: <span class="color-preview" style="background: {{ $business->color }};"></span></span>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Save Changes
                </button>
            </form>
            
            <div class="business-info">
                <div class="info-item">
                    <label>Industry</label>
                    <span>{{ $business->industry ?? 'Not specified' }}</span>
                </div>
                <div class="info-item">
                    <label>Target Audience</label>
                    <span>{{ $business->target ?? 'Not specified' }}</span>
                </div>
                <div class="info-item">
                    <label>Products/Services</label>
                    <span>{{ $business->products ?? 'Not specified' }}</span>
                </div>
                <div class="info-item">
                    <label>Business Goal</label>
                    <span>{{ $business->goal ?? 'Not specified' }}</span>
                </div>
            </div>
        </div>
        
        <!-- API Settings Card -->
        <div class="card">
            <div class="card-header">
                <h3><i class="fas fa-key"></i> API Configuration</h3>
            </div>
            
            <p>Your API key is used to connect your generated website with this dashboard.</p>
            
            <div class="api-key-container">
                <label>API Key:</label>
                <div class="api-key">{{ $business->getApiKey() }}</div>
                <small style="color: var(--gray-color);">Keep this key secure. It allows access to your store data.</small>
            </div>
            
            <form action="{{ route('dashboard.regenerate-api-key', $business->id) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure? This will invalidate your current API key.')">
                    <i class="fas fa-sync-alt"></i> Regenerate API Key
                </button>
            </form>
        </div>
        
        <!-- Website Integration Card -->
        <div class="card">
            <div class="card-header">
                <h3><i class="fas fa-code"></i> Website Integration</h3>
            </div>
            
            <p>To connect your generated website with this dashboard, include this configuration in your website:</p>
            
            <div class="api-key-container">
                <pre style="background: #f8f9fa; padding: 15px; border-radius: 8px; overflow-x: auto;">
&lt;script&gt;
window.STORE_CONFIG = {
    API_KEY: "{{ $business->getApiKey() }}",
    API_BASE_URL: "{{ url('/api/v1') }}",
    ADMIN_DASHBOARD_URL: "{{ route('dashboard.show', $business->id) }}"
};
&lt;/script&gt;</pre>
            </div>
        </div>
    </div>

    <script>
        // Update color preview in real-time
        document.getElementById('color').addEventListener('input', function(e) {
            document.querySelector('.color-preview').style.background = e.target.value;
        });
    </script>
</body>
</html>