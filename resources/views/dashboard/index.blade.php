<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $business->name }} - Admin Dashboard</title>
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
        
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .stat-card {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            border-left: 4px solid var(--primary-color);
        }
        
        .stat-card h3 {
            color: var(--gray-color);
            font-size: 0.9rem;
            margin-bottom: 10px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        .stat-card .value {
            font-size: 2rem;
            font-weight: 700;
            color: var(--dark-color);
        }
        
        .content-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 20px;
        }
        
        .card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            padding: 25px;
            margin-bottom: 20px;
        }
        
        .card-header {
            display: flex;
            justify-content: between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid #eee;
        }
        
        .card-header h3 {
            color: var(--dark-color);
            font-size: 1.2rem;
        }
        
        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 500;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s;
        }
        
        .btn-primary {
            background: var(--primary-color);
            color: white;
        }
        
        .btn-primary:hover {
            background: #2a75f0;
            transform: translateY(-2px);
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
        }
        
        table th, table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }
        
        table th {
            background: #f8f9fa;
            font-weight: 600;
            color: var(--gray-color);
        }
        
        .status-badge {
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 500;
        }
        
        .status-pending {
            background: #fff3cd;
            color: #856404;
        }
        
        .status-completed {
            background: #d1edff;
            color: #0c5460;
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
            }
            
            .content-grid {
                grid-template-columns: 1fr;
            }
            
            .stats-grid {
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
            <li><a href="#" class="active"><i class="fas fa-home"></i> <span>Dashboard</span></a></li>
            <li><a href="{{ route('dashboard.products', $business->id) }}"><i class="fas fa-box"></i> <span>Products</span></a></li>
            <li><a href="{{ route('dashboard.orders', $business->id) }}"><i class="fas fa-shopping-cart"></i> <span>Orders</span></a></li>
            <li><a href="{{ route('dashboard.settings', $business->id) }}"><i class="fas fa-cog"></i> <span>Settings</span></a></li>
            <li><a href="/"><i class="fas fa-globe"></i> <span>View Website</span></a></li>
        </ul>
    </div>
    
    <!-- Main Content -->
    <div class="main-content">
        <div class="header">
            <h1>Dashboard Overview</h1>
            <div class="header-actions">
                <a href="{{ route('dashboard.products', $business->id) }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Add Product
                </a>
            </div>
        </div>
        
        <!-- Statistics Cards -->
        <div class="stats-grid">
            <div class="stat-card">
                <h3>Total Products</h3>
                <div class="value">{{ $stats['total_products'] }}</div>
            </div>
            <div class="stat-card">
                <h3>Total Orders</h3>
                <div class="value">{{ $stats['total_orders'] }}</div>
            </div>
            <div class="stat-card">
                <h3>Pending Orders</h3>
                <div class="value">{{ $stats['pending_orders'] }}</div>
            </div>
            <div class="stat-card">
                <h3>Total Revenue</h3>
                <div class="value">${{ number_format($stats['revenue'], 2) }}</div>
            </div>
        </div>
        
        <!-- Main Content Grid -->
        <div class="content-grid">
            <!-- Recent Orders -->
            <div class="card">
                <div class="card-header">
                    <h3>Recent Orders</h3>
                    <a href="{{ route('dashboard.orders', $business->id) }}" class="btn btn-primary">View All</a>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>Order #</th>
                            <th>Customer</th>
                            <th>Amount</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($recentOrders as $order)
                        <tr>
                            <td>#{{ $order->order_number }}</td>
                            <td>{{ $order->customer_name }}</td>
                            <td>${{ number_format($order->total_amount, 2) }}</td>
                            <td>
                                <span class="status-badge status-{{ $order->status }}">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <!-- Quick Actions -->
            <div class="card">
                <div class="card-header">
                    <h3>Quick Actions</h3>
                </div>
                <div style="display: flex; flex-direction: column; gap: 10px;">
                    <a href="{{ route('dashboard.products', $business->id) }}" class="btn btn-primary">
                        <i class="fas fa-box"></i> Manage Products
                    </a>
                    <a href="{{ route('dashboard.orders', $business->id) }}" class="btn btn-primary">
                        <i class="fas fa-shopping-cart"></i> View Orders
                    </a>
                    <a href="{{ route('dashboard.settings', $business->id) }}" class="btn btn-primary">
                        <i class="fas fa-cog"></i> Website Settings
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>