<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>BizFlow AI</title>
  <link rel="icon" type="images/logo.png" href="/favicon-96x96.png" sizes="96x96" />
  <link rel="icon" type="image/logo.png" href="/favicon-96x96.png" sizes="96x96">
  <link rel="icon" type="image/logo.png" href="/favicon-32x32.png" sizes="32x32">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    :root {
      --primary-color: #3A86FF;
      --secondary-color: #FF8C42;
      --success-color: #00C896;
      --text-dark: #111827;
      --bg-light: #F9FAFB;
    }

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: 'Poppins', sans-serif;
      background-color: var(--bg-light);
      color: var(--text-dark);
      line-height: 1.6;
      scroll-behavior: smooth;
    }

    .navbar {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 20px 40px;
      background-color: white;
      box-shadow: 0 2px 6px rgba(0,0,0,0.05);
    }

    .navbar img {
      width: 40px;
    }

    .logo-text {
      font-size: 1.5rem;
      font-weight: 600;
    }

    .logo-text span {
      color: var(--primary-color);
    }

    /* Hero Section */
    .hero {
      padding: 100px 20px;
      text-align: center;
      background: linear-gradient(to right, #3A86FF, #00C896);
      color: white;
      position: relative;
    }

    .hero h1 {
      font-size: 3rem;
      font-weight: 700;
      margin-bottom: 20px;
    }

    .hero p {
      font-size: 1.2rem;
      margin-bottom: 40px;
    }

    .btn-primary {
      background-color: white;
      color: var(--primary-color);
      padding: 14px 32px;
      border: none;
      border-radius: 8px;
      font-weight: 600;
      cursor: pointer;
      font-size: 1rem;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      transition: all 0.3s ease;
    }

    .btn-primary:hover {
      background-color: #e6e6e6;
      transform: scale(1.03);
    }

    /* Form Section */
    .form-section {
      max-width: 600px;
      margin: 40px auto;
      background: white;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 0 10px rgba(0,0,0,0.05);
      display: none;
      animation: fadeIn 1s ease forwards;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    .form-section h3 {
      margin-bottom: 20px;
      color: var(--primary-color);
    }

    .form-group {
      margin-bottom: 20px;
    }

    label {
      display: block;
      margin-bottom: 8px;
      font-weight: 500;
    }

    input, select, textarea {
      width: 100%;
      padding: 12px;
      border: 1px solid #ddd;
      border-radius: 6px;
      font-size: 1rem;
    }

    input:focus, select:focus, textarea:focus {
      outline: none;
      border-color: var(--primary-color);
    }

    .chat-bubble {
      position: fixed;
      bottom: 20px;
      right: 20px;
      background: var(--success-color);
      color: white;
      width: 60px;
      height: 60px;
      border-radius: 50%;
      box-shadow: 0 0 15px rgba(0,0,0,0.15);
      cursor: pointer;
      font-size: 1.5rem;
      display: flex;
      align-items: center;
      justify-content: center;
      z-index: 999;
      transition: transform 0.3s ease;
    }

    .chat-bubble:hover {
      transform: scale(1.1);
    }

    /* Chat Modal Styles */
    .chat-modal {
      position: fixed;
      bottom: 90px;
      right: 20px;
      width: 380px;
      height: 500px;
      background: white;
      border-radius: 16px;
      box-shadow: 0 5px 25px rgba(0,0,0,0.2);
      display: flex;
      flex-direction: column;
      z-index: 1000;
      overflow: hidden;
      transform: translateY(20px);
      opacity: 0;
      visibility: hidden;
      transition: all 0.3s ease;
    }

    .chat-modal.active {
      transform: translateY(0);
      opacity: 1;
      visibility: visible;
    }

    .chat-header {
      background: var(--primary-color);
      color: white;
      padding: 16px 20px;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .chat-header h3 {
      margin: 0;
      font-size: 1.2rem;
      font-weight: 600;
    }

    .close-chat {
      background: none;
      border: none;
      color: white;
      font-size: 1.2rem;
      cursor: pointer;
    }

    .chat-messages {
      flex: 1;
      padding: 20px;
      overflow-y: auto;
      display: flex;
      flex-direction: column;
      gap: 12px;
    }

    .message {
      max-width: 80%;
      padding: 12px 16px;
      border-radius: 18px;
      line-height: 1.4;
      position: relative;
      animation: fadeIn 0.3s ease;
    }

    .user-message {
      align-self: flex-end;
      background-color: var(--primary-color);
      color: white;
      border-bottom-right-radius: 5px;
    }

    .ai-message {
      align-self: flex-start;
      background-color: #e9ecef;
      color: var(--text-dark);
      border-bottom-left-radius: 5px;
    }

    .message-actions {
      position: absolute;
      top: 5px;
      right: 5px;
      display: none;
    }

    .user-message .message-actions {
      left: 5px;
      right: auto;
    }

    .message:hover .message-actions {
      display: flex;
      gap: 5px;
    }

    .message-action-btn {
      background: rgba(255, 255, 255, 0.2);
      border: none;
      border-radius: 50%;
      width: 22px;
      height: 22px;
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      font-size: 0.7rem;
      color: inherit;
      transition: background 0.2s;
    }

    .user-message .message-action-btn {
      background: rgba(0, 0, 0, 0.2);
    }

    .message-action-btn:hover {
      background: rgba(255, 255, 255, 0.3);
    }

    .user-message .message-action-btn:hover {
      background: rgba(0, 0, 0, 0.3);
    }

    .chat-input {
      display: flex;
      padding: 15px;
      background-color: #f8f9fa;
      border-top: 1px solid #dee2e6;
    }

    .chat-input input {
      flex: 1;
      padding: 12px 15px;
      border: 1px solid #ced4da;
      border-radius: 20px;
      outline: none;
      font-size: 16px;
    }

    .chat-input button {
      margin-left: 10px;
      padding: 12px 20px;
      background-color: var(--primary-color);
      color: white;
      border: none;
      border-radius: 20px;
      cursor: pointer;
      font-weight: 600;
      transition: background-color 0.2s;
    }

    .chat-input button:hover {
      background-color: var(--secondary-color);
    }

    .typing-indicator {
      display: none;
      align-self: flex-start;
      background-color: #e9ecef;
      color: var(--text-dark);
      padding: 12px 16px;
      border-radius: 18px;
      border-bottom-left-radius: 5px;
    }

    .typing-indicator span {
      height: 8px;
      width: 8px;
      background-color: #6c757d;
      border-radius: 50%;
      display: inline-block;
      margin: 0 2px;
      animation: typing 1.2s infinite;
    }

    .typing-indicator span:nth-child(2) {
      animation-delay: 0.2s;
    }

    .typing-indicator span:nth-child(3) {
      animation-delay: 0.4s;
    }

    @keyframes typing {
      0%, 100% { transform: translateY(0); }
      50% { transform: translateY(-5px); }
    }

    /* Edit message modal */
    .edit-modal {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.5);
      display: flex;
      align-items: center;
      justify-content: center;
      z-index: 2000;
      opacity: 0;
      visibility: hidden;
      transition: all 0.3s ease;
    }

    .edit-modal.active {
      opacity: 1;
      visibility: visible;
    }

    .edit-modal-content {
      background: white;
      width: 90%;
      max-width: 500px;
      border-radius: 12px;
      padding: 20px;
      box-shadow: 0 5px 25px rgba(0, 0, 0, 0.2);
    }

    .edit-modal-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 15px;
    }

    .edit-modal-header h3 {
      margin: 0;
      color: var(--primary-color);
    }

    .edit-modal-close {
      background: none;
      border: none;
      font-size: 1.5rem;
      cursor: pointer;
      color: #6c757d;
    }

    .edit-modal-body textarea {
      width: 100%;
      min-height: 120px;
      padding: 12px;
      border: 1px solid #ddd;
      border-radius: 8px;
      font-size: 1rem;
      font-family: inherit;
      resize: vertical;
    }

    .edit-modal-footer {
      display: flex;
      justify-content: flex-end;
      gap: 10px;
      margin-top: 15px;
    }

    .edit-modal-footer button {
      padding: 8px 16px;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      font-weight: 500;
      transition: background-color 0.2s;
    }

    .edit-modal-cancel {
      background: #f8f9fa;
      color: #6c757d;
    }

    .edit-modal-cancel:hover {
      background: #e9ecef;
    }

    .edit-modal-save {
      background: var(--primary-color);
      color: white;
    }

    .edit-modal-save:hover {
      background: #2a75e6;
    }

    /* Button hover effects */
    .register-btn:hover {
      background-color: var(--primary-color) !important;
      color: white !important;
      transform: translateY(-2px);
      box-shadow: 0 4px 8px rgba(58, 134, 255, 0.3);
    }

    .login-btn:hover {
      background: #2a75e6 !important;
      transform: translateY(-2px);
      box-shadow: 0 4px 8px rgba(58, 134, 255, 0.3);
    }

    /* Profile dropdown styles */
    .profile-btn:hover {
      opacity: 0.9;
      transform: scale(1.05);
    }

    .dropdown-menu a:hover,
    .dropdown-menu button:hover {
      background-color: #f5f5f5;
    }

    /* For mobile responsiveness */
    @media (max-width: 768px) {
      .nav-links {
        gap: 12px !important;
      }
      
      .register-btn span,
      .login-btn span {
        display: none;
      }
      
      .register-btn,
      .login-btn {
        padding: 10px !important;
        font-size: 1.2rem !important;
      }
      
      .dropdown-menu {
        position: fixed !important;
        left: 10px;
        right: 10px;
        width: auto !important;
      }
      
      .hero h1 {
        font-size: 2rem;
      }
      
      .chat-modal {
        width: 90%;
        right: 5%;
        bottom: 80px;
        height: 70%;
      }
    }
  </style>
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar">
    <div style="display:flex; align-items:center; gap:10px;">
      <img src="images/logo.png" alt="BizFlow AI Logo">
<<<<<<< HEAD
      <h1 class="logo-text">BizFlow <span>AI</span></h1>
=======
      <h1 class="logo-text">My<span>AI</span></h1>
>>>>>>> 6a21fed7f7ff83d705f194ef929999fb894554c9
    </div>
    
    <div class="nav-links" style="display: flex; align-items: center; gap: 20px;">
      @auth
        <!-- User is logged in - show profile dropdown -->
        <div class="profile-dropdown" style="position: relative;">
          <button class="profile-btn" style="
            width: 40px;
            height: 40px;
            border-radius: 50%;
            border: none;
            background: var(--primary-color);
            color: white;
            font-weight: bold;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
          ">
            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
          </button>
          
          <div class="dropdown-menu" style="
            position: absolute;
            top: 100%;
            right: 0;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            padding: 10px 0;
            margin-top: 10px;
            min-width: 180px;
            display: none;
            z-index: 1000;
          ">
            <div style="padding: 10px 15px; border-bottom: 1px solid #eee;">
              <div style="font-weight: 500;">{{ auth()->user()->name }}</div>
              <div style="font-size: 0.8rem; color: #666;">{{ auth()->user()->email }}</div>
            </div>
            
            <a href="{{ route('profile.dashboard') }}" style="
              display: block;
              padding: 10px 15px;
              text-decoration: none;
              color: var(--text-dark);
              transition: background 0.2s;
            ">
              <i class="fas fa-tachometer-alt" style="margin-right: 8px;"></i> Dashboard
            </a>
            
            <a href="{{ route('profile.edit') }}" style="
              display: block;
              padding: 10px 15px;
              text-decoration: none;
              color: var(--text-dark);
              transition: background 0.2s;
            ">
              <i class="fas fa-user" style="margin-right: 8px;"></i> Profile
            </a>
            
            <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
              @csrf
              <button type="submit" style="
                width: 100%;
                text-align: left;
                padding: 10px 15px;
                border: none;
                background: none;
                cursor: pointer;
                color: var(--text-dark);
                transition: background 0.2s;
                font-family: inherit;
                font-size: inherit;
              ">
                <i class="fas fa-sign-out-alt" style="margin-right: 8px;"></i> Logout
              </button>
            </form>
          </div>
        </div>
      @else
        <!-- User is not logged in - show login and register buttons -->
        <div style="display: flex; align-items: center; gap: 12px;">
          <a href="{{ route('register') }}" class="register-btn" style="
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 8px 16px;
            background: transparent;
            color: var(--primary-color);
            border: 2px solid var(--primary-color);
            border-radius: 8px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
          ">
            <i class="fas fa-user-plus"></i>
            <span>Sign Up</span>
          </a>
          
          <a href="{{ route('login') }}" class="login-btn" style="
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 8px 16px;
            background: var(--primary-color);
            color: white;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
          ">
            <i class="fas fa-sign-in-alt"></i>
            <span>Login</span>
          </a>
        </div>
      @endauth
    </div>
  </nav>

  <!-- Hero Section -->
  <section class="hero">
    <h1>Turn Ideas Into Reality with AI</h1>
    <p>Create your dream business, website, branding & growth plan — all in one place.</p>
    <button class="btn-primary" onclick="showForm()">Make It Happen</button>
  </section>

  <!-- Business Form Section -->
<<<<<<< HEAD
  <section id="formSection" class="form-section">
=======
  <!-- Business Form Section -->
<section id="formSection" class="form-section">
>>>>>>> 6a21fed7f7ff83d705f194ef929999fb894554c9
    @if(session('success'))
      <div style="background:#d1e7dd;color:#0f5132;padding:10px;border-radius:6px;margin-bottom:20px;">
        {{ session('success') }}
      </div>
    @endif

    @if($errors->any())
      <div style="background:#f8d7da;color:#842029;padding:10px;border-radius:6px;margin-bottom:20px;">
        <ul>
          @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    @if(session('reminder'))
      <div style="background:#cce5ff;padding:10px;margin:10px 0;color:#004085;border-radius:8px;">
        {{ session('reminder') }}
      </div>
    @endif

    <h3>Let's Build Your Business</h3>
<<<<<<< HEAD
    <form id="businessForm" action="{{ route('business.submit') }}" method="POST">
      @csrf
=======
    <form id="businessForm" action="{{ route('business.submit') }}" method="POST" enctype="multipart/form-data">
      @csrf
      
      <!-- Business Logo Upload -->
      <div class="form-group">
        <label for="logo">Business Logo (Optional)</label>
        <div style="margin-bottom: 10px;">
          <div id="logoPreview" style="width: 120px; height: 120px; border: 2px dashed #ddd; border-radius: 8px; display: flex; align-items: center; justify-content: center; margin-bottom: 10px; overflow: hidden; background: #f8f9fa;">
            <span style="color: #666; font-size: 0.9rem;">Logo Preview</span>
          </div>
          <input type="file" id="logo" name="logo" accept="image/*" style="display: none;">
          <button type="button" id="logoUploadBtn" style="
            background: var(--primary-color);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 500;
            transition: all 0.3s;
          ">
            <i class="fas fa-upload"></i> Upload Logo
          </button>
          <small style="display: block; margin-top: 5px; color: #666;">
            Upload your company logo (PNG, JPG, SVG). Max 2MB.
          </small>
        </div>
      </div>

>>>>>>> 6a21fed7f7ff83d705f194ef929999fb894554c9
      <!-- Business Name -->
      <div class="form-group">
        <label for="name">Business Name</label>
        <input type="text" id="name" name="name" placeholder="e.g. GlowHub, TechNest">
      </div>

      <!-- Industry -->
      <div class="form-group">
        <label for="industry">Your Industry</label>
        <select id="industry" name="industry">
          <option selected disabled>Choose an industry</option>
          <option>Fashion</option>
          <option>Tech</option>
          <option>Beauty</option>
          <option>Food & Beverage</option>
          <option>Health & Wellness</option>
          <option>Education</option>
          <option>Travel</option>
          <option>All</option>
          <option>Other</option>
        </select>
      </div>

      <!-- Target Audience -->
      <div class="form-group">
        <label for="target">Target Audience</label>
        <input type="text" id="target" name="target" placeholder="e.g. Teens, entrepreneurs, parents,all ages">
      </div>

      <!-- Preferred Website Style -->
      <div class="form-group">
        <label for="style">Preferred Website Style</label>
        <textarea id="style" name="style" rows="2" placeholder="e.g. Minimal, dark, vibrant, luxury, playful,girly ,modern ,etc."></textarea>
      </div>

      <!-- Color Preference -->
      <div class="form-group">
        <label for="color">Main Color Preference</label>
        <input type="text" id="color" name="color" placeholder="e.g. Blue, pastel pink, bold red">
      </div>

      <!-- Products/Services -->
      <div class="form-group">
        <label for="products">What Will You Sell?</label>
        <textarea id="products" name="products" rows="2" placeholder="e.g. Digital courses, handmade candles, consulting services"></textarea>
      </div>

      <!-- Main Business Goal -->
      <div class="form-group">
        <label for="goal">Main Goal of Your Website</label>
        <select id="goal" name="goal">
          <option selected disabled>Choose your goal</option>
          <option>Sell products online</option>
          <option>Book appointments/services</option>
          <option>Build brand presence</option>
          <option>Grow an audience</option>
          <option>All of the above</option>
        </select>
      </div>

      <!-- Email -->
      <div class="form-group">
        <label for="email">Your Email Address</label>
        <input type="email" id="email" name="email" placeholder="e.g. yourname@example.com">
      </div>

      <button class="btn-primary" type="submit" id="generateButton">Generate My Website</button>
    </form>
  </section>

  <!-- Chat Bubble -->
  <div class="chat-bubble" title="Ask AI Assistant">
    <i class="fas fa-comment"></i>
  </div>

  <!-- Chat Modal -->
  <div class="chat-modal" id="chatModal">
    <div class="chat-header">
      <h3>BizFlow AI Assistant</h3>
      <button class="close-chat" id="closeChat">
        <i class="fas fa-times"></i>
      </button>
    </div>
    <div class="chat-messages" id="chatMessages">
      <div class="message ai-message">
        Hi there! I'm your BizFlow AI Assistant. 🤖<br><br>
        I can help you with business strategy, marketing tips, SEO optimization, and answer any questions about creating and growing your online business.<br><br>
        How can I assist you today?
      </div>
    </div>
    <div class="typing-indicator" id="typingIndicator">
      <span></span>
      <span></span>
      <span></span>
    </div>
    <div class="chat-input">
      <input type="text" id="userInput" placeholder="Type your message here...">
      <button id="sendMessage">
        <i class="fas fa-paper-plane"></i>
      </button>
    </div>
  </div>

  <!-- Edit Message Modal -->
  <div class="edit-modal" id="editModal">
    <div class="edit-modal-content">
      <div class="edit-modal-header">
        <h3>Edit Message</h3>
        <button class="edit-modal-close" id="closeEditModal">
          <i class="fas fa-times"></i>
        </button>
      </div>
      <div class="edit-modal-body">
        <textarea id="editMessageText" placeholder="Edit your message..."></textarea>
      </div>
      <div class="edit-modal-footer">
        <button class="edit-modal-cancel" id="cancelEdit">Cancel</button>
        <button class="edit-modal-save" id="saveEdit">Save Changes</button>
      </div>
    </div>
  </div>

  <!-- Login Required Modal -->
  <div class="edit-modal" id="loginRequiredModal">
    <div class="edit-modal-content">
      <div class="edit-modal-header">
        <h3>Login Required</h3>
        <button class="edit-modal-close" id="closeLoginModal">
          <i class="fas fa-times"></i>
        </button>
      </div>
      <div class="edit-modal-body">
        <p>You need to be logged in to generate a website. Please log in or create an account to continue.</p>
      </div>
      <div class="edit-modal-footer">
        <button class="edit-modal-cancel" id="cancelLogin">Maybe Later</button>
        <a href="{{ route('login') }}" class="edit-modal-save" style="text-decoration: none; text-align: center;">
          Go to Login
        </a>
      </div>
    </div>
  </div>

<script>
  function showForm() {
    const form = document.getElementById('formSection');
    form.style.display = 'block';
    form.scrollIntoView({ behavior: 'smooth' });
  }
<<<<<<< HEAD

=======
// Logo upload functionality
document.addEventListener('DOMContentLoaded', function() {
    const logoUploadBtn = document.getElementById('logoUploadBtn');
    const logoInput = document.getElementById('logo');
    const logoPreview = document.getElementById('logoPreview');
    const maxSizeMB = 2;
    
    logoUploadBtn.addEventListener('click', function() {
        logoInput.click();
    });
    
    logoInput.addEventListener('change', function(e) {
        const file = e.target.files[0];
        
        if (file) {
            // Check file size
            if (file.size > maxSizeMB * 1024 * 1024) {
                alert(`File size must be less than ${maxSizeMB}MB`);
                logoInput.value = '';
                return;
            }
            
            // Check file type
            const validTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/svg+xml', 'image/gif'];
            if (!validTypes.includes(file.type)) {
                alert('Please upload a valid image file (JPEG, PNG, SVG, GIF)');
                logoInput.value = '';
                return;
            }
            
            // Preview the image
            const reader = new FileReader();
            reader.onload = function(e) {
                logoPreview.innerHTML = '';
                const img = document.createElement('img');
                img.src = e.target.result;
                img.style.width = '100%';
                img.style.height = '100%';
                img.style.objectFit = 'contain';
                logoPreview.appendChild(img);
                logoPreview.style.border = '2px solid var(--primary-color)';
                
                // Show remove button
                const removeBtn = document.createElement('button');
                removeBtn.innerHTML = '<i class="fas fa-times"></i>';
                removeBtn.style.position = 'absolute';
                removeBtn.style.top = '5px';
                removeBtn.style.right = '5px';
                removeBtn.style.background = '#ff4444';
                removeBtn.style.color = 'white';
                removeBtn.style.border = 'none';
                removeBtn.style.borderRadius = '50%';
                removeBtn.style.width = '24px';
                removeBtn.style.height = '24px';
                removeBtn.style.cursor = 'pointer';
                removeBtn.style.display = 'flex';
                removeBtn.style.alignItems = 'center';
                removeBtn.style.justifyContent = 'center';
                removeBtn.title = 'Remove logo';
                
                removeBtn.addEventListener('click', function(e) {
                    e.stopPropagation();
                    logoPreview.innerHTML = '<span style="color: #666; font-size: 0.9rem;">Logo Preview</span>';
                    logoInput.value = '';
                    logoPreview.style.border = '2px dashed #ddd';
                });
                
                logoPreview.appendChild(removeBtn);
            };
            reader.readAsDataURL(file);
        }
    });
    
    // Drag and drop functionality
    logoPreview.addEventListener('dragover', function(e) {
        e.preventDefault();
        logoPreview.style.border = '2px dashed var(--primary-color)';
        logoPreview.style.background = '#e8f4ff';
    });
    
    logoPreview.addEventListener('dragleave', function(e) {
        e.preventDefault();
        logoPreview.style.border = '2px dashed #ddd';
        logoPreview.style.background = '#f8f9fa';
    });
    
    logoPreview.addEventListener('drop', function(e) {
        e.preventDefault();
        logoPreview.style.border = '2px dashed #ddd';
        logoPreview.style.background = '#f8f9fa';
        
        const file = e.dataTransfer.files[0];
        if (file && file.type.startsWith('image/')) {
            logoInput.files = e.dataTransfer.files;
            const event = new Event('change', { bubbles: true });
            logoInput.dispatchEvent(event);
        } else {
            alert('Please drop a valid image file');
        }
    });
});
>>>>>>> 6a21fed7f7ff83d705f194ef929999fb894554c9
  // Check if user is logged in
  function isLoggedIn() {
    // This would typically be set by your backend
    // For this example, we'll check if the user dropdown exists
    return document.querySelector('.profile-dropdown') !== null;
  }

  // Chat functionality
  document.addEventListener('DOMContentLoaded', function() {
    const chatBubble = document.querySelector('.chat-bubble');
    const chatModal = document.getElementById('chatModal');
    const closeChat = document.getElementById('closeChat');
    const chatMessages = document.getElementById('chatMessages');
    const userInput = document.getElementById('userInput');
    const sendButton = document.getElementById('sendMessage');
    const typingIndicator = document.getElementById('typingIndicator');
    const editModal = document.getElementById('editModal');
    const closeEditModal = document.getElementById('closeEditModal');
    const cancelEdit = document.getElementById('cancelEdit');
    const saveEdit = document.getElementById('saveEdit');
    const editMessageText = document.getElementById('editMessageText');
    const loginRequiredModal = document.getElementById('loginRequiredModal');
    const closeLoginModal = document.getElementById('closeLoginModal');
    const cancelLogin = document.getElementById('cancelLogin');
    const businessForm = document.getElementById('businessForm');
    const generateButton = document.getElementById('generateButton');

    let currentEditId = null;
    let messageIdCounter = 1;
    let messageThreads = {}; // To track user message and corresponding AI response

    // Profile dropdown functionality
    const profileBtn = document.querySelector('.profile-btn');
    const dropdownMenu = document.querySelector('.dropdown-menu');

    if (profileBtn && dropdownMenu) {
      profileBtn.addEventListener('click', function(e) {
        e.stopPropagation();
        dropdownMenu.style.display = dropdownMenu.style.display === 'block' ? 'none' : 'block';
      });

      // Close dropdown when clicking elsewhere
      document.addEventListener('click', function() {
        dropdownMenu.style.display = 'none';
      });

      // Prevent dropdown from closing when clicking inside it
      dropdownMenu.addEventListener('click', function(e) {
        e.stopPropagation();
      });
    }

    // Toggle chat modal
    chatBubble.addEventListener('click', function() {
      chatModal.classList.toggle('active');
    });

    closeChat.addEventListener('click', function() {
      chatModal.classList.remove('active');
    });

    // Close edit modal handlers
    closeEditModal.addEventListener('click', closeEditModalFunc);
    cancelEdit.addEventListener('click', closeEditModalFunc);

    // Close login modal handlers
    closeLoginModal.addEventListener('click', closeLoginModalFunc);
    cancelLogin.addEventListener('click', closeLoginModalFunc);

    function closeEditModalFunc() {
      editModal.classList.remove('active');
      currentEditId = null;
      editMessageText.value = '';
    }

    function closeLoginModalFunc() {
      loginRequiredModal.classList.remove('active');
    }

    // Save edited message
    saveEdit.addEventListener('click', function() {
      if (currentEditId && editMessageText.value.trim()) {
        const messageElement = document.querySelector(`[data-message-id="${currentEditId}"] .message-text`);
        if (messageElement) {
          messageElement.textContent = editMessageText.value;

          // If this is a user message, regenerate AI response
          const messageDiv = document.querySelector(`[data-message-id="${currentEditId}"]`);
          if (messageDiv.classList.contains('user-message')) {
            const aiResponseId = messageThreads[currentEditId];
            if (aiResponseId) {
              // Remove old AI response
              const aiResponseElement = document.querySelector(`[data-message-id="${aiResponseId}"]`);
              if (aiResponseElement) {
                aiResponseElement.remove();
              }

              // Generate new AI response from backend
              typingIndicator.style.display = 'flex';
              getAIResponse(editMessageText.value, currentEditId);
            }
          }
        }
        closeEditModalFunc();
      }
    });

    // Form submission handler
    businessForm.addEventListener('submit', function(e) {
      if (!isLoggedIn()) {
        e.preventDefault();
        loginRequiredModal.classList.add('active');
      }
    });

    // Send message
    function sendMessage() {
      const message = userInput.value.trim();
      if (message) {
        const userMessageId = addMessage(message, true);
        userInput.value = '';

        typingIndicator.style.display = 'flex';
        chatMessages.scrollTop = chatMessages.scrollHeight;

        // Call backend to get AI response
        getAIResponse(message, userMessageId);
      }
    }

    // Add message to chat
    function addMessage(text, isUser = false) {
      const messageId = messageIdCounter++;
      const messageDiv = document.createElement('div');
      messageDiv.classList.add('message');
      messageDiv.classList.add(isUser ? 'user-message' : 'ai-message');
      messageDiv.setAttribute('data-message-id', messageId);

      const messageText = document.createElement('div');
      messageText.classList.add('message-text');
      messageText.textContent = text;
      messageDiv.appendChild(messageText);

      if (isUser) {
        const actionsDiv = document.createElement('div');
        actionsDiv.classList.add('message-actions');

        const editButton = document.createElement('button');
        editButton.classList.add('message-action-btn');
        editButton.innerHTML = '<i class="fas fa-edit"></i>';
        editButton.title = 'Edit message';
        editButton.addEventListener('click', () => editMessage(messageId, text));

        const deleteButton = document.createElement('button');
        deleteButton.classList.add('message-action-btn');
        deleteButton.innerHTML = '<i class="fas fa-trash"></i>';
        deleteButton.title = 'Delete message';
        deleteButton.addEventListener('click', () => deleteMessageThread(messageId));

        actionsDiv.appendChild(editButton);
        actionsDiv.appendChild(deleteButton);
        messageDiv.appendChild(actionsDiv);
      }

      chatMessages.appendChild(messageDiv);
      chatMessages.scrollTop = chatMessages.scrollHeight;

      return messageId;
    }

    // Edit message
    function editMessage(messageId, currentText) {
      currentEditId = messageId;
      editMessageText.value = currentText;
      editModal.classList.add('active');
    }

    // Delete thread
    function deleteMessageThread(userMessageId) {
      if (confirm('Are you sure you want to delete this conversation thread?')) {
        const userMessageElement = document.querySelector(`[data-message-id="${userMessageId}"]`);
        if (userMessageElement) userMessageElement.remove();

        const aiResponseId = messageThreads[userMessageId];
        if (aiResponseId) {
          const aiResponseElement = document.querySelector(`[data-message-id="${aiResponseId}"]`);
          if (aiResponseElement) aiResponseElement.remove();
          delete messageThreads[userMessageId];
        }
      }
    }

    // ✅ Get AI response from backend - FIXED VERSION
    async function getAIResponse(userMessage, userMessageId) {
      try {
        // Fixed the space between await and fetch
        const response = await fetch("/chat/send", {
          method: "POST",
          headers: { 
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": "{{ csrf_token() }}" // Add CSRF token for Laravel
          },
          body: JSON.stringify({ message: userMessage })
        });
        
        if (!response.ok) throw new Error("Network response was not ok"); 
        const data = await response.json();

        typingIndicator.style.display = 'none';

        const aiResponseId = addMessage(data.reply);
        messageThreads[userMessageId] = aiResponseId;

      } catch (error) {
        typingIndicator.style.display = 'none';
        addMessage("⚠️ Sorry, I couldn't reach the AI server. Please try again later.", false);
        console.error("API Error:", error);
      }
    }

    // Event listeners
    sendButton.addEventListener('click', sendMessage);
    userInput.addEventListener('keypress', function(e) {
      if (e.key === 'Enter') {
        sendMessage();
      }
    });
  });
</script>

</body>
</html>