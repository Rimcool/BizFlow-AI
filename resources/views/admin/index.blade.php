<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Dashboard - BizFlow AI</title>
  <link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96" />
<link rel="icon" type="image/svg+xml" href="/favicon.svg" />
<link rel="shortcut icon" href="/favicon.ico" />
<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png" />
<meta name="apple-mobile-web-app-title" content="MyWebSite" />
<link rel="manifest" href="/site.webmanifest" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
    :root {
  --primary: #3A86FF;
  --secondary: #FF8C42;
  --accent: #00C896;
  --bg: #F9FAFB;
  --dark: #111827;
  --white: #ffffff;
  --glass: rgba(255, 255, 255, 0.25);
  --glass-dark: rgba(30, 30, 30, 0.25);
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
  transition: background 0.3s ease, color 0.3s ease;
}

header {
  background: linear-gradient(to right, var(--primary), var(--accent));
  padding: 20px 40px;
  color: white;
  display: flex;
  justify-content: space-between;
  align-items: center;
  box-shadow: 0 2px 8px rgba(0,0,0,0.1);
}

header h1 {
  font-size: 1.8rem;
  font-weight: 600;
}

.container {
  padding: 40px 60px;
}

.grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
  gap: 24px;
  margin-bottom: 40px;
}

.card {
  background: var(--white);
  padding: 24px;
  border-radius: 14px;
  box-shadow: 0 4px 16px rgba(0,0,0,0.06);
  transition: all 0.3s ease;
  position: relative;
  overflow: hidden;
}

.card:hover {
  transform: translateY(-4px);
  box-shadow: 0 6px 18px rgba(0,0,0,0.1);
}

.card h3 {
  font-size: 1.1rem;
  color: var(--primary);
  margin-bottom: 8px;
}

.metric {
  font-size: 2.4rem;
  color: var(--secondary);
}

.metric-bar {
  height: 6px;
  background: linear-gradient(to right, var(--accent), var(--primary));
  border-radius: 10px;
  margin-top: 12px;
}

.platform-header {
  margin: 60px 0 20px;
  text-align: left;
  padding-left: 10px;
}

.platform-header h2 {
  font-size: 1.8rem;
  color: var(--primary);
}

.platform-header hr {
  border: none;
  height: 4px;
  background: linear-gradient(to right, #3A86FF, #00C896);
  width: 240px;
  margin-top: 10px;
  border-radius: 8px;
}

table {
  width: 100%;
  border-collapse: collapse;
  background: var(--white);
  border-radius: 10px;
  overflow: hidden;
  box-shadow: 0 4px 12px rgba(0,0,0,0.05);
}

th, td {
  padding: 14px 18px;
  text-align: left;
  border-bottom: 1px solid #eee;
}

th {
  background: var(--primary);
  color: white;
  font-weight: 600;
}

.tooltip {
  position: absolute;
  top: 10px;
  right: 10px;
  font-size: 0.85rem;
  background: var(--primary);
  color: white;
  padding: 6px 10px;
  border-radius: 6px;
  display: none;
  z-index: 10;
}

.card:hover .tooltip {
  display: block;
}

.floating-toggle {
  position: fixed;
  bottom: 20px;
  right: 20px;
  background: var(--primary);
  color: white;
  border: none;
  padding: 10px 16px;
  border-radius: 50px;
  font-size: 1rem;
  cursor: pointer;
  box-shadow: 0 4px 10px rgba(0,0,0,0.2);
  z-index: 1000;
  transition: background 0.3s ease;
}

.floating-toggle:hover {
  background: var(--accent);
}

html.dark-mode {
  background: #121212;
  color: #eee;
}

html.dark-mode .card,
html.dark-mode table {
  background: #1e1e1e;
  color: #eee;
  box-shadow: 0 0 10px rgba(255,255,255,0.05);
}

html.dark-mode th {
  background: #3A86FF;
}

html.dark-mode .tooltip {
  background: #555;
}

html.dark-mode .floating-toggle {
  background: var(--secondary);
  color: #fff;
}

.card.action-card {
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  padding: 24px;
  border-radius: 14px;
  height: 200px;
  box-shadow: 0 8px 20px rgba(0,0,0,0.08);
  transition: all 0.3s ease;
  background: linear-gradient(to right top, var(--primary), var(--accent));
  color: white;
}

.card.action-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 10px 24px rgba(0,0,0,0.12);
}

.card.action-card h3 {
  font-size: 1.2rem;
  font-weight: 600;
}

.card.action-card p {
  font-size: 0.9rem;
  margin-bottom: 14px;
  flex-grow: 1;
  opacity: 0.95;
}

.action-btn {
  background: rgba(255, 255, 255, 0.25);
  color: white;
  padding: 8px 16px;
  border-radius: 8px;
  text-decoration: none;
  font-weight: 600;
  transition: background 0.3s ease;
  align-self: flex-start;
}

.action-btn:hover {
  background: rgba(255, 255, 255, 0.4);
}

.recent-entry {
  margin-bottom: 8px;
  font-size: 0.9rem;
}

.section-title {
  font-size: 1.5rem;
  color: var(--primary);
  margin: 40px 0 20px;
  padding-left: 10px;
}

@media (max-width: 768px) {
  .card {
    height: auto;
  }

  .container {
    padding: 20px;
  }

  .platform-header h2 {
    font-size: 1.4rem;
  }
}
  </style>
</head>
<body>
  <header>
    <h1>🔧 BizFlow AI Admin Panel</h1>
    <div><strong>Welcome, Admin</strong></div>
  </header>

  <div class="container">
    <div class="grid">
      <div class="card" title="Total number of user submissions">
        <h3>Total Submissions</h3>
        <div class="metric">{{ $totalBusinesses }}</div>
        <div class="metric-bar" style="width: 90%"></div>
        <div class="tooltip">All business form entries</div>
      </div>
      <div class="card" title="Submissions received today">
        <h3>Submitted Today</h3>
        <div class="metric">{{ $todaySubmissions }}</div>
        <div class="metric-bar" style="width: 60%"></div>
        <div class="tooltip">Today's entries</div>
      </div>
      <div class="card" title="Unique business industries">
        <h3>Industries Detected</h3>
        <div class="metric">{{ $industries->count() }}</div>
        <div class="metric-bar" style="width: 70%"></div>
        <div class="tooltip">Different industry types</div>
      </div>
      <div class="card">
        <h3>Latest Entries</h3>
        @foreach($latest as $entry)
        <div class="recent-entry">📌 <strong>{{ $entry->name }}</strong> – {{ $entry->created_at->diffForHumans() }}</div>
        @endforeach
      </div>
    </div>

    <canvas id="submissionsChart" height="100"></canvas>

    <div class="platform-header">
      <h2>⚙️ Manage Your Platform</h2>
      <hr>
    </div>

    <div class="grid">
      <div class="card action-card">
        <h3>📂 Business Submissions</h3>
        <p>View and manage all user-submitted business data.</p>
        <a href="{{ route('admin.submissions') }}" class="action-btn">Go to Submissions</a>
      </div>
      <div class="card action-card">
        <h3>📧 Email Logs</h3>
        <p>Review sent emails and delivery status.</p>
        <a href="#" class="action-btn">View Logs</a>
      </div>
      <div class="card action-card">
        <h3>🤖 AI Logs</h3>
        <p>Track AI assistant actions and output.</p>
        <a href="#" class="action-btn">Explore AI Logs</a>
      </div>
      <div class="card action-card">
        <h3>📤 Export Data</h3>
        <p>Export business data in CSV, Excel, or PDF format.</p>
        <a href="#" class="action-btn">Export Now</a>
      </div>
      <div class="card action-card">
        <h3>🧪 Generated Sites</h3>
        <p>View all user sites with SEO, marketing, chatbot & tips.</p>
        <a href="{{ route('admin.testGenerator') }}" class="action-btn">View All</a>
      </div>
      <div class="card action-card">
        <h3>🔐 Admin Settings</h3>
        <p>Update profile, manage users and system settings.</p>
        <a href="#" class="action-btn">Settings</a>
      </div>
    </div>

    <div class="section-title">📊 Industries Breakdown</div>
    <table>
      <thead>
        <tr>
          <th>Industry</th>
          <th>Count</th>
        </tr>
      </thead>
      <tbody>
        @foreach($industries as $industry)
        <tr>
          <td>{{ $industry->industry }}</td>
          <td>{{ $industry->count }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <button class="floating-toggle" onclick="toggleDark()">🌓 Toggle Mode</button>

  <script>
    function toggleDark() {
      const html = document.documentElement;
      html.classList.toggle('dark-mode');
      localStorage.setItem('theme', html.classList.contains('dark-mode') ? 'dark' : 'light');
    }

    window.onload = () => {
      if(localStorage.getItem('theme') === 'dark') {
        document.documentElement.classList.add('dark-mode');
      }

      const ctx = document.getElementById('submissionsChart').getContext('2d');
      new Chart(ctx, {
        type: 'line',
        data: {
          labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
          datasets: [{
            label: 'Weekly Submissions',
            data: [3, 5, 8, 2, 6, 4, 9],
            fill: true,
            backgroundColor: 'rgba(58,134,255,0.2)',
            borderColor: 'rgba(58,134,255,1)',
            tension: 0.4
          }]
        },
        options: {
          responsive: true,
          plugins: {
            legend: {
              display: false
            }
          },
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      });
    };
  </script>
</body>
</html>