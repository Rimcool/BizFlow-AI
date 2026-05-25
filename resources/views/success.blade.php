<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Success - BizFlow AI</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #F9FAFB;
      color: #111827;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      text-align: center;
      padding: 20px;
    }
    .success-box {
      background: white;
      padding: 40px;
      border-radius: 12px;
      box-shadow: 0 0 20px rgba(0,0,0,0.08);
    }
    .success-box h1 {
      color: #3A86FF;
      margin-bottom: 20px;
    }
    .success-box p {
      font-size: 1.1rem;
      margin-bottom: 30px;
    }
    .btn-home {
      background-color: #3A86FF;
      color: white;
      border: none;
      padding: 12px 30px;
      border-radius: 8px;
      text-decoration: none;
      font-weight: 600;
      font-size: 1rem;
      transition: background-color 0.3s ease;
    }
    .btn-home:hover {
      background-color: #2e6ed8;
    }
  </style>
</head>
<body>

  <div class="success-box">
    <h1>🎉 Success!</h1>
    <p>Your business has been submitted successfully. We'll build your custom AI-powered site soon!</p>
    <a href="{{ route('business.form') }}" class="btn-home">Back to Homepage</a>
  </div>

</body>
</html>
