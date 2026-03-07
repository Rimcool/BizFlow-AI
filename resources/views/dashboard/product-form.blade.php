<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $business->name }} - Add Product</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: {{ $business->color ?? '#3A86FF' }};
            --secondary-color: #00C896;
            --dark-color: #2D3748;
            --light-color: #F8FAFC;
            --gray-color: #718096;
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
            max-width: 800px;
        }
        
        .form-group {
            margin-bottom: 25px;
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
        
        textarea.form-control {
            min-height: 100px;
            resize: vertical;
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
        
        .btn-secondary {
            background: var(--gray-color);
            color: white;
        }
        
        .btn-secondary:hover {
            background: #5a6c7d;
        }
        
        .form-actions {
            display: flex;
            gap: 15px;
            margin-top: 30px;
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
            
            .form-actions {
                flex-direction: column;
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
            <li><a href="{{ route('dashboard.settings', $business->id) }}"><i class="fas fa-cog"></i> <span>Settings</span></a></li>
            <li><a href="/"><i class="fas fa-globe"></i> <span>View Website</span></a></li>
        </ul>
    </div>
    
    <!-- Main Content -->
    <div class="main-content">
        <div class="header">
            <h1>Add New Product</h1>
            <a href="{{ route('dashboard.products', $business->id) }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Back to Products
            </a>
        </div>
        
        <div class="card">
            <form action="{{ route('dashboard.products.store', $business->id) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Product Name *</label>
                    <input type="text" id="name" name="name" class="form-control" placeholder="Enter product name" required>
                </div>
                
                <div class="form-group">
                    <label for="description">Product Description</label>
                    <textarea id="description" name="description" class="form-control" placeholder="Describe your product..."></textarea>
                </div>
                
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                    <div class="form-group">
                        <label for="price">Price ($) *</label>
                        <input type="number" id="price" name="price" class="form-control" step="0.01" min="0" placeholder="0.00" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="stock">Stock Quantity *</label>
                        <input type="number" id="stock" name="stock" class="form-control" min="0" placeholder="0" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="image">Product Image URL</label>
                    <input type="url" id="image" name="image" class="form-control" placeholder="https://example.com/image.jpg">
                    <small style="color: var(--gray-color); margin-top: 5px; display: block;">
                        Enter a direct link to your product image
                    </small>
                </div>
                
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Save Product
                    </button>
                    <a href="{{ route('dashboard.products', $business->id) }}" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>