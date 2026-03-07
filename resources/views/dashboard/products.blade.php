<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $business->name }} - Products</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    {{-- PHP Doc comments for Intelephense --}}
    @php
        /**
         * @var \App\Models\Business $business
         * @var \Illuminate\Database\Eloquent\Collection $products
         */
    @endphp
    
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
        }
        
        .btn-primary {
            background: var(--primary-color);
            color: white;
        }
        
        .btn-primary:hover {
            background: #2a75f0;
            transform: translateY(-2px);
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
        
        .product-image {
            width: 60px;
            height: 60px;
            border-radius: 8px;
            background: #f8f9fa;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--gray-color);
        }
        
        .product-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 8px;
        }
        
        .stock-badge {
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 500;
        }
        
        .stock-in {
            background: #d1edff;
            color: #0c5460;
        }
        
        .stock-out {
            background: #f8d7da;
            color: #721c24;
        }
        
        .actions {
            display: flex;
            gap: 8px;
        }
        
        .action-btn {
            padding: 6px 12px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 0.8rem;
            transition: all 0.3s;
        }
        
        .action-edit {
            background: #fff3cd;
            color: #856404;
        }
        
        .action-delete {
            background: #f8d7da;
            color: #721c24;
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
            
            .header {
                flex-direction: column;
                gap: 15px;
                align-items: flex-start;
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
            <li><a href="#" class="active"><i class="fas fa-box"></i> <span>Products</span></a></li>
            <li><a href="{{ route('dashboard.orders', $business->id) }}"><i class="fas fa-shopping-cart"></i> <span>Orders</span></a></li>
            <li><a href="{{ route('dashboard.settings', $business->id) }}"><i class="fas fa-cog"></i> <span>Settings</span></a></li>
            <li><a href="/"><i class="fas fa-globe"></i> <span>View Website</span></a></li>
        </ul>
    </div>
    
    <!-- Main Content -->
    <div class="main-content">
        <div class="header">
            <h1>Product Management</h1>
            <a href="{{ route('dashboard.products.create', $business->id) }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Add New Product
            </a>
        </div>
        
        <div class="card">
            @if($products->count() > 0)
            <table>
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td>
                            <div class="product-image">
                                @if(!empty($product->image))
                                    <img src="{{ $product->image }}" alt="{{ $product->name }}">
                                @else
                                    <i class="fas fa-image"></i>
                                @endif
                            </div>
                        </td>
                        <td>
                            <strong>{{ $product->name ?? 'No Name' }}</strong>
                            @if(!empty($product->description))
                            <br><small style="color: var(--gray-color);">
                                {{ Illuminate\Support\Str::limit($product->description, 50) }}
                            </small>
                            @endif
                        </td>
                        <td>${{ number_format($product->price ?? 0, 2) }}</td>
                        <td>{{ $product->stock ?? 0 }}</td>
                        <td>
                            <span class="stock-badge {{ ($product->stock ?? 0) > 0 ? 'stock-in' : 'stock-out' }}">
                                {{ ($product->stock ?? 0) > 0 ? 'In Stock' : 'Out of Stock' }}
                            </span>
                        </td>
                        <td>
                            <div class="actions">
                                <button class="action-btn action-edit">
                                    <i class="fas fa-edit"></i> Edit
                                </button>
                                <button class="action-btn action-delete">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <div class="empty-state">
                <i class="fas fa-box-open"></i>
                <h3>No Products Yet</h3>
                <p>Get started by adding your first product to your store.</p>
                <a href="{{ route('dashboard.products.create', $business->id) }}" class="btn btn-primary" style="margin-top: 20px;">
                    <i class="fas fa-plus"></i> Add Your First Product
                </a>
            </div>
            @endif
        </div>
        
        @if($products->count() > 0)
        <div class="card" style="text-align: center; padding: 15px;">
            <p>Showing {{ $products->count() }} product(s)</p>
        </div>
        @endif
    </div>

    <script>
        // Simple confirmation for delete actions
        document.querySelectorAll('.action-delete').forEach(button => {
            button.addEventListener('click', function() {
                if (confirm('Are you sure you want to delete this product?')) {
                    // Add your delete logic here
                    alert('Product deletion would happen here. In a real application, this would make an API call.');
                }
            });
        });
    </script>
</body>
</html>