<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $business->name }} - Orders</title>
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
            padding: 25px;
            margin-bottom: 20px;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
        }
        
        table th, table td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }
        
        table th {
            background: #f8f9fa;
            font-weight: 600;
            color: var(--gray-color);
        }
        
        .status-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 500;
        }
        
        .status-pending {
            background: #fff3cd;
            color: #856404;
        }
        
        .status-processing {
            background: #cce7ff;
            color: #004085;
        }
        
        .status-completed {
            background: #d1edff;
            color: #0c5460;
        }
        
        .status-cancelled {
            background: #f8d7da;
            color: #721c24;
        }
        
        .btn {
            padding: 8px 16px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 500;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: all 0.3s;
            font-size: 0.8rem;
        }
        
        .btn-primary {
            background: var(--primary-color);
            color: white;
        }
        
        .btn-success {
            background: var(--success-color);
            color: white;
        }
        
        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: var(--gray-color);
        }
        
        .empty-state i {
            font-size: 4rem;
            margin-bottom: 20px;
            opacity: 0.5;
        }
        
        .order-items {
            max-width: 200px;
        }
        
        .order-items ul {
            padding-left: 15px;
            margin: 0;
        }
        
        .order-items li {
            margin-bottom: 5px;
            font-size: 0.8rem;
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
            
            table {
                display: block;
                overflow-x: auto;
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
            <li><a href="#" class="active"><i class="fas fa-shopping-cart"></i> <span>Orders</span></a></li>
            <li><a href="{{ route('dashboard.settings', $business->id) }}"><i class="fas fa-cog"></i> <span>Settings</span></a></li>
            <li><a href="/"><i class="fas fa-globe"></i> <span>View Website</span></a></li>
        </ul>
    </div>
    
    <!-- Main Content -->
    <div class="main-content">
        <div class="header">
            <h1>Order Management</h1>
            <div style="color: var(--gray-color);">
                {{ $orders->count() }} total orders
            </div>
        </div>
        
        <div class="card">
            @if($orders->count() > 0)
            <table>
                <thead>
                    <tr>
                        <th>Order #</th>
                        <th>Customer</th>
                        <th>Items</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    @php
                        $orderItems = json_decode($order->order_items, true) ?? [];
                    @endphp
                    <tr>
                        <td><strong>{{ $order->order_number }}</strong></td>
                        <td>
                            <strong>{{ $order->customer_name }}</strong><br>
                            <small style="color: var(--gray-color);">{{ $order->customer_email }}</small>
                        </td>
                        <td class="order-items">
                            @if(is_array($orderItems) && count($orderItems) > 0)
                            <ul>
                                @foreach(array_slice($orderItems, 0, 2) as $item)
                                <li>{{ $item['name'] ?? 'Item' }} x{{ $item['quantity'] ?? 1 }}</li>
                                @endforeach
                                @if(count($orderItems) > 2)
                                <li>... and {{ count($orderItems) - 2 }} more</li>
                                @endif
                            </ul>
                            @else
                            <span style="color: var(--gray-color);">No items</span>
                            @endif
                        </td>
                        <td>${{ number_format($order->total_amount, 2) }}</td>
                        <td>
                            <span class="status-badge status-{{ $order->status }}">
                                {{ ucfirst($order->status) }}
                            </span>
                        </td>
                        <td>{{ $order->created_at->format('M j, Y') }}</td>
                        <td>
                            <form action="{{ route('dashboard.orders.update-status', [$business->id, $order->id]) }}" method="POST" style="display: inline;">
                                @csrf
                                <select name="status" onchange="this.form.submit()" class="btn" style="padding: 6px 10px;">
                                    <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Processing</option>
                                    <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                    <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                </select>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <div class="empty-state">
                <i class="fas fa-shopping-cart"></i>
                <h3>No Orders Yet</h3>
                <p>Orders from your customers will appear here.</p>
            </div>
            @endif
        </div>
    </div>
</body>
</html>