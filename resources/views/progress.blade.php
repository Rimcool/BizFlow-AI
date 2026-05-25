<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Progress - BizFlow AI</title>
   <link rel="icon" href="images/logo.png" type="image/png">
   <link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96" />
<link rel="icon" type="image/svg+xml" href="/favicon.svg" />
<link rel="shortcut icon" href="/favicon.ico" />
<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png" />
<meta name="apple-mobile-web-app-title" content="MyWebSite" />
<link rel="manifest" href="/site.webmanifest" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: #F9FAFB;
      color: #111827;
      padding: 40px;
      text-align: center;
      position: relative;
      overflow-x: hidden;
    }

    h1 {
      animation: fadeInDown 1s ease;
    }

    p {
      animation: fadeIn 1.5s ease;
    }

    .progress-bar {
      position: fixed;
      top: 0;
      left: 0;
      height: 6px;
      background: linear-gradient(to right, #3A86FF, #00C896);
      width: 0%;
      transition: width 1s ease;
      z-index: 999;
    }

    .step {
      margin: 30px auto;
      max-width: 600px;
      padding: 18px;
      border-radius: 12px;
      background-color: white;
      box-shadow: 0 4px 10px rgba(0,0,0,0.05);
      opacity: 0.3;
      transform: translateY(30px);
      transition: 0.5s ease;
    }

    .step.active {
      opacity: 1;
      background-color: #e0f4ff;
      border-left: 5px solid #3A86FF;
      transform: translateY(0);
      animation: pulse 1s infinite alternate;
    }

    .step.complete {
      background-color: #d3f9d8;
      border-left: 5px solid #00C896;
      animation: bounce 0.8s ease;
    }

    /* AI Spinner */
    .ai-spinner {
      margin: 40px auto;
      width: 60px;
      height: 60px;
      border: 6px solid #3A86FF;
      border-top: 6px solid transparent;
      border-radius: 50%;
      animation: spin 1s linear infinite;
    }

    /* Floating Animated Background */
    .bg-bubble {
      position: absolute;
      border-radius: 50%;
      opacity: 0.1;
      animation: float 6s infinite ease-in-out alternate;
    }

    .bg-bubble.one {
      width: 100px;
      height: 100px;
      background: #3A86FF;
      top: 20%;
      left: -50px;
      animation-delay: 0s;
    }

    .bg-bubble.two {
      width: 140px;
      height: 140px;
      background: #00C896;
      bottom: 10%;
      right: -60px;
      animation-delay: 2s;
    }

    .bg-bubble.three {
      width: 60px;
      height: 60px;
      background: #FF8C42;
      top: 60%;
      left: -40px;
      animation-delay: 4s;
    }

    @keyframes float {
      0% { transform: translateY(0); }
      100% { transform: translateY(-30px); }
    }

    @keyframes spin {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }

    @keyframes fadeInDown {
      from { opacity: 0; transform: translateY(-20px); }
      to   { opacity: 1; transform: translateY(0); }
    }

    @keyframes fadeIn {
      from { opacity: 0; }
      to   { opacity: 1; }
    }

    @keyframes pulse {
      0% { box-shadow: 0 0 10px rgba(58,134,255, 0.2); }
      100% { box-shadow: 0 0 16px rgba(58,134,255, 0.4); }
    }

    @keyframes bounce {
      0%, 100% { transform: translateY(0); }
      50% { transform: translateY(-8px); }
    }
  </style>
</head>
<body>

  <div class="progress-bar" id="progressBar"></div>

  <div class="bg-bubble one"></div>
  <div class="bg-bubble two"></div>
  <div class="bg-bubble three"></div>

  <h1>🔧 We're Building Your AI Website</h1>
  <p>Hang tight while we work our magic...</p>

  <div class="ai-spinner"></div>

  <div class="step" id="step1">1️⃣ Collecting business details</div>
  <div class="step" id="step2">2️⃣ Designing your homepage</div>
  <div class="step" id="step3">3️⃣ Generating brand visuals</div>
  <div class="step" id="step4">4️⃣ Setting up backend & products</div>
  <div class="step" id="step5">5️⃣ Integrating your AI assistant</div>
  <div class="step" id="step6">✅ Your website is ready!</div>

  <script>
    const steps = ["step1", "step2", "step3", "step4", "step5", "step6"];
    let current = 0;
    const progressBar = document.getElementById("progressBar");

    function activateStep() {
      if (current > 0) {
        const prev = document.getElementById(steps[current - 1]);
        prev.classList.remove('active');
        prev.classList.add('complete');
      }

      if (current < steps.length) {
        const stepEl = document.getElementById(steps[current]);
        stepEl.classList.add('active');

        // Update progress bar
        const progressPercent = ((current + 1) / steps.length) * 100;
        progressBar.style.width = `${progressPercent}%`;

        current++;
        setTimeout(activateStep, 2200); // next step in 2.2s
      } else {
        // Redirect to preview page
        setTimeout(() => {
  window.location.href = "/preview/{{ $business->id }}";
}, 2500);

      // Show completion message
        const finalStep = document.getElementById(steps[steps.length - 1]);
        finalStep.innerHTML = "✅ Your website is ready! <br> Redirecting to preview...";
        finalStep.classList.add('complete');
        progressBar.style.width = '100%';
      }
    }

    activateStep();
  </script>

</body>
</html>
