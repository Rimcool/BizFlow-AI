<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin - Business Overview - BizFlow AI</title>
    <link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="/favicon.svg" />
    <link rel="shortcut icon" href="/favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png" />
    <meta name="apple-mobile-web-app-title" content="MyWebSite" />
    <link rel="manifest" href="/site.webmanifest" />
    <style>
        :root {
            --primary: #3A86FF;
            --secondary: #FF8C42;
            --accent: #00C896;
            --danger: #E74C3C;
            --warning: #F39C12;
            --bg: #F9FAFB;
            --dark: #111827;
            --white: #ffffff;
        }
        
        body { 
            font-family: 'Poppins', Arial, sans-serif; 
            background-color: var(--bg); 
            margin: 0; 
            padding: 0; 
            color: var(--dark);
        }
        
        header { 
            background: linear-gradient(to right, var(--primary), var(--accent));
            color: white; 
            padding: 25px; 
            text-align: center; 
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        header h1 {
            margin: 0;
            font-size: 2rem;
        }
        
        header p {
            margin: 10px 0 0 0;
            opacity: 0.9;
        }
        
        .container { 
            padding: 30px; 
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .back-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: var(--primary);
            color: white;
            padding: 12px 20px;
            border-radius: 8px;
            text-decoration: none;
            margin-bottom: 30px;
            transition: all 0.3s ease;
        }
        
        .back-btn:hover {
            background: #2a75e6;
            transform: translateY(-2px);
        }
        
        .user-section { 
            background: white; 
            padding: 25px; 
            margin-bottom: 30px; 
            border-radius: 12px; 
            box-shadow: 0 4px 16px rgba(0,0,0,0.08); 
        }
        
        .user-header {
            background: linear-gradient(45deg, var(--primary), var(--accent));
            color: white;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .user-header h2 {
            margin: 0;
            font-size: 1.4rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .user-actions {
            display: flex;
            gap: 10px;
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
            transition: all 0.3s ease;
            font-size: 0.9rem;
        }
        
        .btn-danger {
            background: var(--danger);
            color: white;
        }
        
        .btn-danger:hover {
            background: #c0392b;
        }
        
        .btn-warning {
            background: var(--warning);
            color: white;
        }
        
        .btn-warning:hover {
            background: #e67e22;
        }
        
        .card-container { 
            display: grid; 
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px; 
            margin-top: 20px;
        }
        
        .card { 
            background: white; 
            padding: 20px; 
            border: 1px solid #e9ecef; 
            border-radius: 12px; 
            box-shadow: 0 2px 8px rgba(0,0,0,0.06);
            transition: all 0.3s ease;
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.12);
        }
        
        .card h3 { 
            margin: 0 0 15px 0;
            color: var(--primary);
            border-bottom: 2px solid #f1f3f4;
            padding-bottom: 12px;
            font-size: 1.2rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .empty-state {
            color: #6c757d;
            font-style: italic;
            margin: 0;
        }
        
        .website-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        
        .website-item {
            margin-bottom: 12px;
            padding: 12px;
            background: #f8f9fa;
            border-radius: 8px;
            border-left: 4px solid var(--accent);
            position: relative;
        }
        
        .website-item strong {
            display: block;
            margin-bottom: 5px;
            color: var(--dark);
        }
        
        .website-actions {
            display: flex;
            gap: 8px;
            margin-top: 8px;
            flex-wrap: wrap;
        }
        
        .visit-link {
            color: var(--primary);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            font-weight: 500;
            transition: color 0.3s ease;
        }
        
        .visit-link:hover {
            color: #2a75e6;
            text-decoration: underline;
        }
        
        .no-websites {
            padding: 20px;
            text-align: center;
            background: #f8f9fa;
            border-radius: 8px;
            color: #6c757d;
        }
        
        .no-users {
            text-align: center;
            padding: 40px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 16px rgba(0,0,0,0.08);
        }
        
        .no-users h2 {
            color: var(--primary);
            margin-bottom: 15px;
        }
        
        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.5);
            z-index: 1000;
            justify-content: center;
            align-items: center;
        }
        
        .modal-content {
            background: white;
            padding: 30px;
            border-radius: 12px;
            max-width: 500px;
            width: 90%;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }
        
        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid #e9ecef;
        }
        
        .modal-header h3 {
            margin: 0;
            color: var(--dark);
        }
        
        .close-modal {
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: #6c757d;
        }
        
        .close-modal:hover {
            color: var(--dark);
        }
        
        .modal-actions {
            display: flex;
            gap: 10px;
            justify-content: flex-end;
            margin-top: 25px;
        }
        
        .btn-cancel {
            background: #6c757d;
            color: white;
        }
        
        .btn-cancel:hover {
            background: #5a6268;
        }
        
        .form-group {
            margin-bottom: 15px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: 500;
            color: var(--dark);
        }
        
        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-family: 'Poppins', sans-serif;
        }
        
        .form-group textarea {
            resize: vertical;
            min-height: 80px;
        }
        
        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }
            
            .card-container {
                grid-template-columns: 1fr;
            }
            
            header h1 {
                font-size: 1.6rem;
            }
            
            .user-header h2 {
                font-size: 1.2rem;
            }
            
            .user-header {
                flex-direction: column;
                gap: 15px;
                align-items: flex-start;
            }
            
            .website-actions {
                flex-direction: column;
            }
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

<header>
    <h1><i class="fas fa-cogs"></i> Admin Dashboard - Business Overview</h1>
    <p>Manage user businesses and generated websites</p>
</header>

<div class="container">
    <a href="{{ route('admin.index') }}" class="back-btn">
        <i class="fas fa-arrow-left"></i> Back to Dashboard
    </a>

    @if($users->count() > 0)
        @foreach($users as $user)
            <div class="user-section">
                <div class="user-header">
                    <h2>
                        <i class="fas fa-user"></i> 
                        {{ $user->name }} 
                        <span style="font-size: 0.9em; opacity: 0.9;">- {{ $user->email }}</span>
                    </h2>
                    <div class="user-actions">
                        <button class="btn btn-danger" onclick="confirmDeleteUser({{ $user->id }}, '{{ $user->name }}')">
                            <i class="fas fa-trash"></i> Delete User
                        </button>
                    </div>
                </div>

                <div class="card-container">
                    <!-- Websites Card -->
                    <div class="card">
                        <h3><i class="fas fa-globe"></i> Websites</h3>
                        @if($user->businesses->count() > 0)
                            <ul class="website-list">
                                @php
                                    $hasGeneratedSites = false;
                                @endphp
                                
                                @foreach($user->businesses as $business)
                                    @if($business->generatedSite)
                                        @php $hasGeneratedSites = true; @endphp
                                        <li class="website-item">
                                            <strong>{{ $business->name }}</strong>
                                            <div style="font-size: 0.9em; color: #6c757d; margin: 5px 0;">
                                                Industry: {{ $business->industry }}<br>
                                                Products: {{ $business->products }}<br>
                                                Created: {{ $business->created_at->format('M d, Y') }}
                                            </div>
                                            @if(!empty($business->generatedSite->site_url))
                                                <a href="{{ $business->generatedSite->site_url }}" target="_blank" class="visit-link">
                                                    <i class="fas fa-external-link-alt"></i> Visit Website
                                                </a>
                                            @else
                                                <span class="empty-state">No URL available</span>
                                            @endif
                                            <div class="website-actions">
                                                <button class="btn btn-warning" onclick="openEditModal({{ $business->id }})">
                                                    <i class="fas fa-edit"></i> Edit
                                                </button>
                                                <button class="btn btn-danger" onclick="confirmDeleteBusiness({{ $business->id }}, '{{ $business->name }}')">
                                                    <i class="fas fa-trash"></i> Delete
                                                </button>
                                            </div>
                                        </li>
                                    @endif
                                @endforeach
                                
                                @if(!$hasGeneratedSites)
                                    <li class="no-websites">
                                        <i class="fas fa-exclamation-circle"></i>
                                        No websites generated yet for this user's businesses.
                                    </li>
                                @endif
                            </ul>
                        @else
                            <div class="no-websites">
                                <i class="fas fa-business-time"></i>
                                No businesses created yet.
                            </div>
                        @endif
                    </div>

                    <!-- Marketing Card -->
                    <div class="card">
                        <h3><i class="fas fa-chart-line"></i> Marketing</h3>
                        <p class="empty-state">Marketing reports, campaigns, and analytics will appear here once implemented.</p>
                    </div>

                    <!-- Business Management Card -->
                    <div class="card">
                        <h3><i class="fas fa-business-time"></i> Business Management</h3>
                        <p class="empty-state">Business strategies, inventory, and operational tips will appear here once implemented.</p>
                    </div>

                    <!-- Chatbot Card -->
                    <div class="card">
                        <h3><i class="fas fa-robot"></i> Personal Chatbot</h3>
                        <p class="empty-state">Chatbot details, conversations, and analytics will appear here once implemented.</p>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <div class="no-users">
            <h2><i class="fas fa-users"></i> No Users Found</h2>
            <p class="empty-state">There are no users with business data to display.</p>
        </div>
    @endif
</div>

<!-- Delete Confirmation Modal -->
<div id="deleteModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h3>Confirm Deletion</h3>
            <button class="close-modal" onclick="closeModal('deleteModal')">&times;</button>
        </div>
        <p id="deleteMessage">Are you sure you want to delete this item?</p>
        <div class="modal-actions">
            <button class="btn btn-cancel" onclick="closeModal('deleteModal')">Cancel</button>
            <button class="btn btn-danger" id="confirmDeleteBtn">Delete</button>
        </div>
    </div>
</div>

<!-- Edit Business Modal -->
<div id="editModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h3>Edit Business</h3>
            <button class="close-modal" onclick="closeModal('editModal')">&times;</button>
        </div>
        <form id="editBusinessForm" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="edit_name">Business Name</label>
                <input type="text" id="edit_name" name="name" required>
            </div>
            <div class="form-group">
                <label for="edit_industry">Industry</label>
                <input type="text" id="edit_industry" name="industry" required>
            </div>
            <div class="form-group">
                <label for="edit_target">Target Audience</label>
                <input type="text" id="edit_target" name="target" required>
            </div>
            <div class="form-group">
                <label for="edit_products">Products/Services</label>
                <textarea id="edit_products" name="products" required></textarea>
            </div>
            <div class="form-group">
                <label for="edit_goal">Business Goal</label>
                <input type="text" id="edit_goal" name="goal" required>
            </div>
            <div class="modal-actions">
                <button type="button" class="btn btn-cancel" onclick="closeModal('editModal')">Cancel</button>
                <button type="submit" class="btn btn-warning">Update Business</button>
            </div>
        </form>
    </div>
</div>

<script>
    let itemToDelete = null;
    let deleteType = null; // 'user' or 'business'

    function confirmDeleteUser(userId, userName) {
        itemToDelete = userId;
        deleteType = 'user';
        document.getElementById('deleteMessage').textContent = `Are you sure you want to delete user "${userName}" and all their associated businesses? This action cannot be undone.`;
        document.getElementById('deleteModal').style.display = 'flex';
    }

    function confirmDeleteBusiness(businessId, businessName) {
        itemToDelete = businessId;
        deleteType = 'business';
        document.getElementById('deleteMessage').textContent = `Are you sure you want to delete the business "${businessName}" and all its associated data? This action cannot be undone.`;
        document.getElementById('deleteModal').style.display = 'flex';
    }

    function openEditModal(businessId) {
        // In a real implementation, you would fetch the business data via AJAX
        // For now, we'll just set up the form action
        document.getElementById('editBusinessForm').action = `/admin/businesses/${businessId}`;
        document.getElementById('editModal').style.display = 'flex';
        
        // You would populate the form fields here with actual data
        // This is a placeholder - implement actual data fetching
        console.log('Editing business ID:', businessId);
    }

    function closeModal(modalId) {
        document.getElementById(modalId).style.display = 'none';
        itemToDelete = null;
        deleteType = null;
    }

    document.getElementById('confirmDeleteBtn').addEventListener('click', function() {
        if (itemToDelete && deleteType) {
            let url, method;
            
            if (deleteType === 'user') {
                url = `/admin/users/${itemToDelete}`;
                method = 'DELETE';
            } else if (deleteType === 'business') {
                url = `/admin/businesses/${itemToDelete}`;
                method = 'DELETE';
            }

            // Send delete request
            fetch(url, {
                method: method,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json',
                },
            })
            .then(response => {
                if (response.ok) {
                    location.reload(); // Reload the page to reflect changes
                } else {
                    alert('Error deleting item. Please try again.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error deleting item. Please try again.');
            });

            closeModal('deleteModal');
        }
    });

    // Close modal when clicking outside
    window.addEventListener('click', function(event) {
        const deleteModal = document.getElementById('deleteModal');
        const editModal = document.getElementById('editModal');
        
        if (event.target === deleteModal) {
            closeModal('deleteModal');
        }
        if (event.target === editModal) {
            closeModal('editModal');
        }
    });
</script>

</body>
</html>