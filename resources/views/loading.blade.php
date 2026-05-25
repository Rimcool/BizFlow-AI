<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Preparing...</title>
  <style>
    body {
      background: #F9FAFB;
      font-family: 'Poppins', sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      flex-direction: column;
      text-align: center;
    }
    .spinner {
      width: 50px;
      height: 50px;
      border: 6px solid #eee;
      border-top: 6px solid #3A86FF;
      border-radius: 50%;
      animation: spin 1s linear infinite;
      margin-bottom: 20px;
    }
    @keyframes spin {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }
  </style>
</head>
<body>
  <div class="spinner"></div>
  <h2>Hold on... we're preparing your AI-powered site!</h2>
  <p>Redirecting you shortly...</p>

  <script>
    setTimeout(() => {
      window.location.href = "{{ route('business.progress') }}";
    }, 3000);
  </script>
</body>
</html>
