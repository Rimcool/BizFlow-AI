<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Submissions - Admin - BizFlow AI</title>
  <link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96" />
<link rel="icon" type="image/svg+xml" href="/favicon.svg" />
<link rel="shortcut icon" href="/favicon.ico" />
<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png" />
<meta name="apple-mobile-web-app-title" content="MyWebSite" />
<link rel="manifest" href="/site.webmanifest" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    :root {
      --primary: #3A86FF;
      --secondary: #FF8C42;
      --accent: #00C896;
      --bg: #F9FAFB;
      --dark: #111827;
      --white: #ffffff;
    }
    
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    
    body {
      font-family: 'Poppins', sans-serif;
      background: var(--bg);
      color: var(--dark);
      padding: 20px;
      line-height: 1.6;
    }
    
    .admin-header {
      background: linear-gradient(to right, var(--primary), var(--accent));
      padding: 20px 40px;
      color: white;
      display: flex;
      justify-content: space-between;
      align-items: center;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
      margin-bottom: 30px;
      border-radius: 10px;
    }
    
    .admin-header h1 {
      font-size: 1.8rem;
      font-weight: 600;
    }
    
    .back-btn {
      background: rgba(255, 255, 255, 0.2);
      color: white;
      padding: 10px 20px;
      border-radius: 8px;
      text-decoration: none;
      font-weight: 500;
      transition: background 0.3s ease;
    }
    
    .back-btn:hover {
      background: rgba(255, 255, 255, 0.3);
    }
    
    .container {
      max-width: 1200px;
      margin: 0 auto;
      background: white;
      border-radius: 12px;
      box-shadow: 0 4px 16px rgba(0,0,0,0.08);
      overflow: hidden;
    }
    
    table {
      width: 100%;
      border-collapse: collapse;
    }
    
    th, td {
      padding: 16px 20px;
      border-bottom: 1px solid #eee;
      text-align: left;
    }
    
    th {
      background: var(--primary);
      color: white;
      font-weight: 600;
      position: sticky;
      top: 0;
    }
    
    tr:hover {
      background-color: #f8f9fa;
    }
    
    .pagination {
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 20px;
      background: #f8f9fa;
      border-top: 1px solid #eee;
    }
    
    .pagination-info {
      margin-right: 20px;
      color: #666;
      font-size: 0.9rem;
    }
    
    .pagination-links {
      display: flex;
      gap: 8px;
    }
    
    .pagination-links a, 
    .pagination-links span {
      padding: 8px 14px;
      border-radius: 6px;
      text-decoration: none;
      transition: all 0.3s ease;
    }
    
    .pagination-links a {
      background: var(--primary);
      color: white;
    }
    
    .pagination-links a:hover {
      background: #2a75e6;
      transform: translateY(-2px);
    }
    
    .pagination-links span {
      background: #e9ecef;
      color: #6c757d;
    }
    
    .empty-state {
      text-align: center;
      padding: 60px 20px;
      color: #666;
    }
    
    .empty-state i {
      font-size: 3rem;
      color: #dee2e6;
      margin-bottom: 20px;
    }
    
    .empty-state h3 {
      font-size: 1.5rem;
      margin-bottom: 10px;
      color: #6c757d;
    }
    
    .action-btns {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 20px 40px;
      background: white;
      border-bottom: 1px solid #eee;
    }
    
    .export-btn {
      background: var(--accent);
      color: white;
      padding: 10px 20px;
      border-radius: 8px;
      text-decoration: none;
      font-weight: 500;
      transition: all 0.3s ease;
    }
    
    .export-btn:hover {
      background: #00b386;
      transform: translateY(-2px);
    }
    
    @media (max-width: 768px) {
      .admin-header {
        flex-direction: column;
        gap: 15px;
        text-align: center;
      }
      
      th, td {
        padding: 12px 15px;
      }
      
      .action-btns {
        flex-direction: column;
        gap: 15px;
      }
      
      .pagination {
        flex-direction: column;
        gap: 15px;
      }
      
      table {
        font-size: 0.9rem;
      }
    }
  </style>
</head>
<body>

  <div class="admin-header">
    <h1><i class="fas fa-business-time"></i> Business Submissions</h1>
    <a href="{{ route('admin.index') }}" class="back-btn">
      <i class="fas fa-arrow-left"></i> Back to Dashboard
    </a>
  </div>

  <div class="container">
    <div class="action-btns">
      <div>
        <h2>All Business Submissions</h2>
      </div>
      <a href="#" class="export-btn">
        <i class="fas fa-download"></i> Export Data
      </a>
    </div>

    @if($businesses->count() > 0)
      <table>
        <thead>
          <tr>
            <th>Business Name</th>
            <th>Industry</th>
            <th>Goal</th>
            <th>Email</th>
            <th>Submitted By</th>
            <th>Date Submitted</th>
          </tr>
        </thead>
        <tbody>
          @foreach($businesses as $business)
            <tr>
              <td><strong>{{ $business->name }}</strong></td>
              <td>{{ $business->industry }}</td>
              <td>{{ $business->goal }}</td>
              <td>{{ $business->email }}</td>
              <td>{{ $business->user->name ?? 'Unknown User' }}</td>
              <td>{{ $business->created_at->format('M d, Y H:i') }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>

      <!-- Pagination -->
      <div class="pagination">
        <div class="pagination-info">
          Showing {{ $businesses->firstItem() }} to {{ $businesses->lastItem() }} of {{ $businesses->total() }} results
        </div>
        <div class="pagination-links">
          {{ $businesses->links('pagination::simple-bootstrap-4') }}
        </div>
      </div>
    @else
      <div class="empty-state">
        <i class="fas fa-inbox"></i>
        <h3>No submissions yet</h3>
        <p>No business submissions have been made yet. Check back later!</p>
      </div>
    @endif
  </div>

</body>
</html>