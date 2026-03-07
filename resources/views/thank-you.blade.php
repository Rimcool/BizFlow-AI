<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thank You – BizFlow AI</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(135deg, #036ceb, #4f9bff);
      font-family: 'Segoe UI', sans-serif;
    }
    .thankyou-card {
      max-width: 800px;
      margin: 60px auto;
      padding: 40px;
      background: #fff;
      border-radius: 20px;
      box-shadow: 0 6px 20px rgba(0,0,0,0.15);
      text-align: center;
    }
    .thankyou-card h2 {
      color: #036ceb;
      font-weight: bold;
      margin-bottom: 15px;
    }
    .purchase-summary {
      margin: 20px 0;
      text-align: left;
    }
    .purchase-summary table td {
      padding: 8px 0;
    }
    .btn-download {
      background: #036ceb;
      color: #fff;
      border-radius: 8px;
      padding: 12px 20px;
      margin: 10px;
      text-decoration: none;
      display: inline-block;
      transition: 0.3s;
    }
    .btn-download:hover {
      background: #024fa0;
      color: #fff;
    }
    .support-link {
      margin-top: 25px;
      font-size: 14px;
    }
  </style>
</head>
<body>
  <div class="thankyou-card">
    <h2>🎉 Thank You for Your Purchase!</h2>
    <p>Your BizFlow AI membership has been activated successfully.</p>

    <div class="purchase-summary">
      <h5>Purchase Summary</h5>
      <table class="table table-borderless">
        <tr>
          <td><strong>Package:</strong></td>
          <td>AI Chatbot Membership</td>
        </tr>
        <tr>
          <td><strong>Amount Paid:</strong></td>
          <td>$3.00</td>
        </tr>
        <tr>
          <td><strong>Transaction ID:</strong></td>
          <td>#TXN123456</td>
        </tr>
        <tr>
          <td><strong>Status:</strong></td>
          <td><span class="badge bg-success">Completed</span></td>
        </tr>
        <tr>
          <td><strong>Date:</strong></td>
          <td>September 30, 2025</td>
        </tr>
      </table>
    </div>

    <div class="downloads">
      <a href="/downloads/chatbot.zip" class="btn-download">⬇ Download Chatbot Package</a>
      <a href="/downloads/guide.pdf" class="btn-download">📄 Download Installation Guide</a>
    </div>

    <div class="support-link">
      <p>Need help? <a href="mailto:support@bizflowai.com">Contact Support</a></p>
      <a href="/" class="btn btn-outline-secondary mt-3">⬅ Back to Home</a>
    </div>
  </div>
</body>
</html>
