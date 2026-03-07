<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $business->name }} - Preview</title>
   <link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96" />
<link rel="icon" type="image/svg+xml" href="/favicon.svg" />
<link rel="shortcut icon" href="/favicon.ico" />
<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png" />
<meta name="apple-mobile-web-app-title" content="MyWebSite" />
<link rel="manifest" href="/site.webmanifest" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Playfair+Display:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>
    <style>
        :root {
            --primary-color: {{ $business->color ?? '#3A86FF' }};
            --secondary-color: #00C896;
            --accent-color: #9b59b6;
            --dark-color: #2D3748;
            --light-color: #F8FAFC;
            --gray-color: #718096;
            --success-color: #48BB78;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            color: var(--dark-color);
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        
        .preview-container {
            width: 100%;
            max-width: 1200px;
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 50px rgba(0,0,0,0.1);
            overflow: hidden;
            position: relative;
        }
        
        .preview-header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 3rem 2rem;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        
        .preview-header::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
            transform: rotate(30deg);
        }
        
        .preview-header h1 {
            margin: 0 0 1rem 0;
            font-size: 2.5rem;
            font-weight: 700;
            position: relative;
            z-index: 1;
        }
        
        .preview-header p {
            margin: 0;
            opacity: 0.9;
            font-size: 1.1rem;
            position: relative;
            z-index: 1;
        }
        
        .preview-header small {
            display: inline-block;
            margin-top: 10px;
            background: rgba(255,255,255,0.2);
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.85rem;
        }
        
        .preview-content {
            padding: 2.5rem;
        }
        
        .notification {
            background: #f1f8ff;
            border-left: 4px solid var(--primary-color);
            padding: 1.2rem;
            margin-bottom: 2rem;
            border-radius: 8px;
            font-size: 1rem;
            display: flex;
            align-items: center;
            gap: 12px;
        }
        
        .notification::before {
            content: '💡';
            font-size: 1.2rem;
        }
        
        .website-preview {
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            overflow: hidden;
            height: 500px;
            background: white;
            overflow-y: auto;
            margin-bottom: 2rem;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        }
        
        .preview-website {
            padding: 25px;
        }
        
        .website-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 0;
            border-bottom: 1px solid #eee;
            margin-bottom: 30px;
        }
        
        .logo {
            font-size: 28px;
            font-weight: 700;
            color: var(--primary-color);
            font-family: 'Playfair Display', serif;
        }
        
        .nav-links {
            display: flex;
            gap: 25px;
        }
        
        .nav-links a {
            text-decoration: none;
            color: var(--dark-color);
            font-weight: 500;
            transition: all 0.3s;
            position: relative;
        }
        
        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--primary-color);
            transition: width 0.3s;
        }
        
        .nav-links a:hover {
            color: var(--primary-color);
        }
        
        .nav-links a:hover::after {
            width: 100%;
        }
        
        .hero-section {
            text-align: center;
            padding: 50px 30px;
            background: linear-gradient(to right, rgba(58, 134, 255, 0.08), rgba(0, 200, 150, 0.08));
            border-radius: 16px;
            margin-bottom: 40px;
            position: relative;
            overflow: hidden;
        }
        
        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%233A86FF' fill-opacity='0.05' fill-rule='evenodd'/%3E%3C/svg%3E");
            opacity: 0.5;
        }
        
        .hero-section h1 {
            margin: 0 0 20px 0;
            color: var(--primary-color);
            font-size: 2.5rem;
            font-weight: 700;
            font-family: 'Playfair Display', serif;
            position: relative;
        }
        
        .hero-section p {
            margin-bottom: 25px;
            font-size: 1.2rem;
            color: var(--gray-color);
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }
        
        .btn-primary {
            background: var(--primary-color);
            color: white;
            border: none;
            padding: 14px 32px;
            border-radius: 10px;
            font-weight: 600;
            cursor: pointer;
            font-size: 1.1rem;
            transition: all 0.3s;
            box-shadow: 0 4px 10px rgba(58, 134, 255, 0.3);
            position: relative;
            z-index: 1;
        }
        
        .btn-primary:hover {
            background: #2a75f0;
            transform: translateY(-3px);
            box-shadow: 0 7px 15px rgba(58, 134, 255, 0.4);
        }
        
        .btn-primary:active {
            transform: translateY(-1px);
        }
        
        .content-section {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 25px;
            margin-bottom: 40px;
        }
        
        .content-card {
            background: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
            transition: all 0.3s;
            border: 1px solid #f1f3f4;
            position: relative;
            overflow: hidden;
        }
        
        .content-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 5px;
            height: 100%;
            background: var(--primary-color);
        }
        
        .content-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }
        
        .content-card h3 {
            margin-top: 0;
            color: var(--primary-color);
            font-size: 1.4rem;
            margin-bottom: 15px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .content-card h3 i {
            font-size: 1.2rem;
            color: var(--secondary-color);
        }
        
        .content-card p {
            color: var(--gray-color);
            line-height: 1.6;
        }
        
        .website-footer {
            text-align: center;
            padding: 30px;
            border-top: 1px solid #eee;
            color: var(--gray-color);
            font-size: 0.95rem;
            margin-top: 40px;
        }
        
        .button-container {
            text-align: center;
            padding: 30px;
            background: #f9fafb;
            border-radius: 16px;
            margin-top: 2rem;
        }
        
        .btn-visit {
            background: var(--primary-color);
            color: white;
            padding: 16px 45px;
            border: none;
            border-radius: 10px;
            font-size: 1.2rem;
            text-decoration: none;
            display: inline-block;
            margin: 10px;
            transition: all 0.3s ease;
            cursor: pointer;
            font-weight: 600;
            box-shadow: 0 5px 15px rgba(58, 134, 255, 0.3);
        }
        
        .btn-visit:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(58, 134, 255, 0.4);
            background: #2a75f0;
        }
        
        .btn-download-all {
            background: var(--accent-color);
            color: white;
            padding: 16px 45px;
            border: none;
            border-radius: 10px;
            font-size: 1.2rem;
            text-decoration: none;
            display: inline-block;
            margin: 10px;
            transition: all 0.3s ease;
            cursor: pointer;
            font-weight: 600;
            box-shadow: 0 5px 15px rgba(155, 89, 182, 0.3);
        }
        
        .btn-download-all:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(155, 89, 182, 0.4);
            background: #8e44ad;
        }
        
        .button-description {
            color: var(--gray-color);
            font-size: 1rem;
            margin-top: 15px;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }
        
        .pdf-section {
            background: linear-gradient(135deg, #e8f4fc 0%, #e0f7fa 100%);
            border-radius: 16px;
            padding: 30px;
            margin: 30px 0;
            border-left: 5px solid #2196F3;
        }
        
        .pdf-section h3 {
            color: #1976d2;
            margin-top: 0;
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 1.5rem;
            margin-bottom: 20px;
        }
        
        .pdf-section p {
            margin-bottom: 20px;
            color: #455a64;
            line-height: 1.6;
        }
        
        .pdf-features {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 18px;
            margin: 20px 0;
        }
        
        .pdf-feature {
            background: white;
            padding: 15px;
            border-radius: 10px;
            font-size: 1rem;
            display: flex;
            align-items: center;
            gap: 10px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.05);
        }
        
        .pdf-feature::before {
            content: "✓";
            color: var(--success-color);
            font-weight: bold;
            font-size: 1.2rem;
        }

        /* Hidden PDF templates for generation */
        .pdf-template {
            position: absolute;
            left: -9999px;
            top: -9999px;
            width: 210mm;
            padding: 25px;
            background: white;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        .pdf-header {
            text-align: center;
            margin-bottom: 25px;
            border-bottom: 2px solid var(--primary-color);
            padding-bottom: 15px;
        }

        .pdf-content {
            margin: 20px 0;
        }

        .pdf-section-item {
            margin-bottom: 20px;
            page-break-inside: avoid;
        }

        .pdf-footer {
            text-align: center;
            margin-top: 40px;
            font-size: 14px;
            color: var(--gray-color);
            border-top: 1px solid #eee;
            padding-top: 15px;
        }

        /* Loading overlay */
        .loading-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.85);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            display: none;
            color: white;
        }

        .spinner {
            width: 60px;
            height: 60px;
            border: 5px solid rgba(255,255,255,0.2);
            border-top: 5px solid var(--primary-color);
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin-bottom: 25px;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .progress-bar {
            width: 350px;
            height: 22px;
            background: rgba(255,255,255,0.2);
            border-radius: 12px;
            margin: 25px 0;
            overflow: hidden;
        }

        .progress {
            height: 100%;
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
            width: 0%;
            transition: width 0.4s ease;
            border-radius: 12px;
        }

        @media (max-width: 992px) {
            .preview-container {
                max-width: 90%;
            }
            
            .content-section {
                grid-template-columns: 1fr;
            }
            
            .pdf-features {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .website-header {
                flex-direction: column;
                gap: 20px;
            }
            
            .nav-links {
                flex-wrap: wrap;
                justify-content: center;
            }
            
            .hero-section h1 {
                font-size: 2rem;
            }
            
            body {
                padding: 15px;
            }
            
            .preview-content {
                padding: 1.5rem;
            }
            
            .button-container {
                display: flex;
                flex-direction: column;
                gap: 15px;
            }
            
            .btn-visit, .btn-download-all {
                margin-left: 0;
                width: 100%;
                margin-top: 0;
                text-align: center;
            }
            /* Add this to your existing CSS */


/* Update button container for multiple buttons */
@media (max-width: 768px) {
    .button-container {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }
    
    .btn-visit, .btn-download-all, .btn-ai-package {
        margin-left: 0;
        width: 100%;
        margin-top: 0;
        text-align: center;
    }
}
            .progress-bar {
                width: 280px;
            }
            
            .preview-header h1 {
                font-size: 2rem;
            }
        }

        /* Ensure PDF section and button are always visible */
        .pdf-section, .btn-download-all {
            display: block !important;
            visibility: visible !important;
            opacity: 1 !important;
        }
        
        /* Decorative elements */
        .decorative-circle {
            position: absolute;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            opacity: 0.1;
            z-index: 0;
        }
        
        .circle-1 {
            width: 300px;
            height: 300px;
            top: -150px;
            right: -150px;
        }
        
        .circle-2 {
            width: 200px;
            height: 200px;
            bottom: -100px;
            left: -100px;
        }
        .btn-ai-package {
    background: var(--accent-color);
    color: white;
    padding: 16px 45px;
    border: none;
    border-radius: 10px;
    font-size: 1.2rem;
    text-decoration: none;
    display: inline-block;
    margin: 10px;
    transition: all 0.3s ease;
    cursor: pointer;
    font-weight: 600;
    box-shadow: 0 5px 15px rgba(155, 89, 182, 0.3);
}

.btn-ai-package:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 20px rgba(155, 89, 182, 0.4);
    background: #8e44ad;
}

    </style>
</head>
<body>
    <div class="preview-container">
        <div class="preview-header">
            <div class="decorative-circle circle-1"></div>
            <div class="decorative-circle circle-2"></div>
            <h1>Your Website is Ready! 🎉</h1>
            <p>Here's a preview of {{ $business->name }}</p>
            <small>Style: {{ $business->style ?? 'Modern' }}</small>
        </div>
        
        <div class="preview-content">
            <div class="notification">
                This is a preview of how your website will look. Click the button below to visit your live website.
            </div>
            
           <!-- Update this section in your preview page -->
<div class="website-header">
    <div class="logo">
        @if($business->logo)
            <img src="{{ asset('storage/logos/' . $business->logo) }}" 
                 alt="{{ $business->name }} Logo" 
                 style="max-height: 50px; max-width: 200px; object-fit: contain;">
        @else
            <span style="font-size: 28px; font-weight: 700; color: var(--primary-color); font-family: 'Playfair Display', serif;">
                {{ $business->name }}
            </span>
        @endif
    </div>
    <div class="nav-links">
        <a href="#">Home</a>
        <a href="#">Products</a>
        <a href="#">About</a>
        <a href="#">Contact</a>
    </div>
</div>
            <div class="button-container">
               <a href="{{ url('sites/'.$business->id) }}" class="btn-visit" target="_blank">
    <i class="fas fa-external-link-alt"></i> Visit Your Live Website
</a>
                
                <a href="{{ route('dashboard.download-package', $business->id) }}" 
   class="btn-download-all"
   onclick="showDownloadMessage()">
   <i class="fas fa-download"></i> Download Complete Business Package
</a>

                <a href="/ai-chatbot-package" class="btn-ai-package">
        <i class="fas fa-robot"></i> Get AI Chatbot Package ($3)
    </a> 

    <!-- Add this button to your preview page button container -->
<a href="{{ route('dashboard.show', $business->id) }}" class="btn-visit" style="background: var(--success-color);">
    <i class="fas fa-cog"></i> Access Admin Dashboard
</a>

                <p class="button-description">
                    Get your website, SEO guide, marketing plan, and business growth strategy all in one download.
                </p>
            </div>
        </div>
    </div>

    <!-- Hidden Marketing PDF Template -->
    <div id="marketing-pdf-template" class="pdf-template">
        <div class="pdf-header">
            <h1>Marketing Strategy Guide</h1>
            <h2>For {{ $business->name }}</h2>
            <p>Generated on: <span class="current-date"></span></p>
        </div>
        
        <div class="pdf-content">
            <div class="pdf-section-item">
                <h3>Business Overview</h3>
                <p><strong>Industry:</strong> {{ $business->industry }}</p>
                <p><strong>Target Audience:</strong> {{ $business->target }}</p>
                <p><strong>Products/Services:</strong> {{ $business->products }}</p>
                <p><strong>Business Goals:</strong> {{ $business->goal }}</p>
            </div>
            
            <div class="pdf-section-item">
                <h3>Social Media Strategies</h3>
                <p>1. Create engaging content that resonates with your target audience of {{ $business->target }}</p>
                <p>2. Post regularly on platforms where your audience is most active</p>
                <p>3. Use hashtags relevant to {{ $business->industry }} industry</p>
                <p>4. Run targeted ads to reach potential customers interested in {{ $business->products }}</p>
                <p>5. Collaborate with influencers in your niche to expand reach</p>
            </div>
            
            <div class="pdf-section-item">
                <h3>Content Marketing Plan</h3>
               <p>1. Blog about topics related to {{ $business->products }} and {{ $business->industry }}</p>
                <p>2. Create video tutorials showcasing your products/services</p>
                <p>3. Share customer testimonials and success stories</p>
                <p>4. Develop a content calendar to maintain consistency</p>
                <p>5. Repurpose content across different platforms (blog, social media, email)</p>
            </div>
            
            <div class="pdf-section-item">
                <h3>Email Marketing Strategy</h3>
                <p>1. Build an email list with lead magnets relevant to your audience</p>
                <p>2. Send weekly newsletters with valuable content and promotions</p>
                <p>3. Segment your email list based on customer interests and behaviors</p>
                <p>4. Automate email sequences for new subscribers and customers</p>
                <p>5. A/B test subject lines and content to improve open rates</p>
            </div>
            
            <div class="pdf-section-item">
                <h3>Advertising Strategy</h3>
                <p>1. Run Google Ads targeting people searching for {{ $business->products }}</p>
                <p>2. Use Facebook/Instagram ads to target {{ $business->target }} demographics</p>
                <p>3. Consider influencer partnerships in the {{ $business->industry }} space</p>
                <p>4. Track ROI for all advertising campaigns</p>
                <p>5. Retarget website visitors with personalized ads</p>
            </div>
            
            <div class="pdf-section-item">
                <h3>Performance Tracking</h3>
                <p>1. Set up Google Analytics to track website traffic and conversions</p>
                <p>2. Monitor social media engagement metrics regularly</p>
                <p>3. Track email open rates, click-through rates, and conversions</p>
                <p>4. Use UTM parameters to track campaign effectiveness</p>
                <p>5. Monthly review of all marketing efforts and ROI calculation</p>
            </div>
        </div>
        
        <div class="pdf-footer">
            <p>This marketing strategy guide was generated specifically for {{ $business->name }}.</p>
            <p>For more personalized recommendations, consider consulting with a marketing professional.</p>
        </div>
    </div>

    <!-- Hidden SEO PDF Template -->
    <div id="seo-pdf-template" class="pdf-template">
        <div class="pdf-header">
            <h1>SEO Strategy Guide</h1>
            <h2>For {{ $business->name }}</h2>
            <p>Generated on: <span class="current-date"></span></p>
        </div>
        
        <div class="pdf-content">
            <div class="pdf-section-item">
                <h3>Business Overview</h3>
                <p><strong>Industry:</strong> {{ $business->industry }}</p>
                <p><strong>Target Audience:</strong> {{ $business->target }}</p>
                <p><strong>Products/Services:</strong> {{ $business->products }}</p>
                <p><strong>Business Goals:</strong> {{ $business->goal }}</p>
            </div>
            
            <div class="pdf-section-item">
                <h3>Keyword Strategy</h3>
                <p>1. Primary Keywords: {{ $business->industry }} {{ $business->target }}</p>
                <p>2. Secondary Keywords: "best {{ $business->products }}", "{{ $business->industry }} near me"</p>
                <p>3. Long-tail Keywords: "affordable {{ $business->products }} for {{ $business->target }}"</p>
                <p>4. Competitor Keywords: Analyze competitors' keyword strategies</p>
                <p>5. Local Keywords: Include location-based terms if serving local customers</p>
            </div>
            
            <div class="pdf-section-item">
                <h3>On-Page SEO Optimization</h3>
                <p>1. Optimize title tags with primary keywords (under 60 characters)</p>
                <p>2. Write compelling meta descriptions (under 160 characters)</p>
                <p>3. Use header tags (H1, H2, H3) properly with relevant keywords</p>
                <p>4. Optimize images with descriptive file names and alt text</p>
                <p>5. Create SEO-friendly URLs that include target keywords</p>
            </div>
            
            <div class="pdf-section-item">
                <h3>Content Strategy</h3>
                <p>1. Create pillar content around main topics related to {{ $business->industry }}</p>
                <p>2. Develop cluster content linking back to pillar pages</p>
                <p>3. Answer common questions your {{ $business->target }} audience has</p>
                <p>4. Update old content regularly to keep it fresh and relevant</p>
                <p>5. Use internal linking to connect related content</p>
            </div>
            
            <div class="pdf-section-item">
                <h3>Technical SEO Recommendations</h3>
                <p>1. Ensure website is mobile-friendly and responsive</p>
                <p>2. Improve page loading speed (aim for under 3 seconds)</p>
                <p>3. Fix any broken links and 404 errors</p>
                <p>4. Create an XML sitemap and submit to Google Search Console</p>
                <p>5. Implement schema markup for better rich results</p>
            </div>
            
            <div class="pdf-section-item">
                <h3>Local SEO Strategy</h3>
                <p>1. Claim and optimize Google Business Profile listing</p>
                <p>2. Ensure NAP (Name, Address, Phone) consistency across directories</p>
                <p>3. Get listed in relevant local directories and industry-specific sites</p>
                <p>4. Encourage customers to leave positive reviews</p>
                <p>5. Create location-specific content if serving multiple areas</p>
            </div>
            
            <div class="pdf-section-item">
                <h3>Link Building Strategy</h3>
                <p>1. Guest post on reputable websites in your industry</p>
                <p>2. Build relationships with influencers and industry experts</p>
                <p>3. Create shareable content that naturally attracts backlinks</p>
                <p>4. Fix broken links on other websites (broken link building)</p>
                <p>5. Monitor your backlink profile regularly for quality and spam</p>
            </div>
        </div>
        
        <div class="pdf-footer">
            <p>This SEO strategy guide was generated specifically for {{ $business->name }}.</p>
            <p>SEO is an ongoing process - regularly review and update your strategy based on performance data.</p>
        </div>
    </div>

    <!-- Hidden Business Growth PDF Template -->
    <div id="growth-pdf-template" class="pdf-template">
        <div class="pdf-header">
            <h1>Business Growth Strategy</h1>
            <h2>For {{ $business->name }}</h2>
            <p>Generated on: <span class="current-date"></span></p>
        </div>
        
        <div class="pdf-content">
            <div class="pdf-section-item">
                <h3>Business Overview</h3>
                <p><strong>Industry:</strong> {{ $business->industry }}</p>
                <p><strong>Target Audience:</strong> {{ $business->target }}</p>
                <p><strong>Products/Services:</strong> {{ $business->products }}</p>
                <p><strong>Business Goals:</strong> {{ $business->goal }}</p>
            </div>
            
            <div class="pdf-section-item">
                <h3>Growth Opportunities</h3>
                <p>1. Expand your {{ $business->products }} line to attract new customer segments</p>
                <p>2. Develop subscription models for recurring revenue</p>
                <p>3. Explore partnership opportunities with complementary businesses</p>
                <p>4. Consider franchising or licensing your business model</p>
                <p>5. Expand to new geographic markets or online sales channels</p>
            </div>
            
            <div class="pdf-section-item">
                <h3>Customer Acquisition Strategy</h3>
                <p>1. Develop a referral program to encourage word-of-mouth marketing</p>
                <p>2. Implement a customer loyalty program to increase retention</p>
                <p>3. Use data analytics to identify your most profitable customer segments</p>
                <p>4. Create targeted offers for different customer personas</p>
                <p>5. Develop strategic partnerships to reach new audiences</p>
            </div>
            
            <div class="pdf-section-item">
                <h3>Financial Growth Plan</h3>
                <p>1. Analyze your unit economics to identify profitability drivers</p>
                <p>2. Develop financial projections for different growth scenarios</p>
                <p>3. Identify cost-saving opportunities without sacrificing quality</p>
                <p>4. Explore funding options for expansion (loans, investors, grants)</p>
                <p>5. Implement systems for better cash flow management</p>
            </div>
            
            <div class="pdf-section-item">
                <h3>Operational Scaling</h3>
                <p>1. Document all business processes for consistency and training</p>
                <p>2. Identify technology solutions to automate repetitive tasks</p>
                <p>3. Develop a hiring plan for key roles as you grow</p>
                <p>4. Create training materials for new team members</p>
                <p>5. Establish quality control measures to maintain standards</p>
            </div>
            
            <div class="pdf-section-item">
                <h3>12-Month Growth Roadmap</h3>
                <p><strong>Months 1-3:</strong> Optimize current operations and establish baseline metrics</p>
                <p><strong>Months 4-6:</strong> Implement new customer acquisition strategies</p>
                <p><strong>Months 7-9:</strong> Expand product/service offerings and markets</p>
                <p><strong>Months 10-12:</strong> Scale successful initiatives and plan for next year</p>
            </div>
            
            <div class="pdf-section-item">
                <h3>Key Performance Indicators</h3>
                <p>1. Monthly revenue growth rate</p>
                <p>2. Customer acquisition cost (CAC)</p>
                <p>3. Customer lifetime value (LTV)</p>
                <p>极速. Conversion rates at each stage of your funnel</p>
                <p>5. Profit margins by product/service category</p>
            </div>
        </div>
        
        <div class="pdf-footer">
            <p>This business growth strategy was generated specifically for {{ $business->name }}.</p>
            <p>Regularly review and adjust your growth strategy based on market conditions and performance data.</p>
        </div>
    </div>

    <!-- Loading Overlay -->
    <div class="loading-overlay" id="loadingOverlay">
        <div class="spinner"></div>
        <p id="loadingText">Preparing your complete business package...</p>
        <div class="progress-bar">
            <div class="progress" id="progressBar"></div>
        </div>
        <p id="progressText">0%</p>
    </div>

    <script>
        // Initialize jsPDF
        const { jsPDF } = window.jspdf;
        
        document.addEventListener('DOMContentLoaded', function() {
            const downloadAllBtn = document.getElementById('downloadAllBtn');
            const loadingOverlay = document.getElementById('loadingOverlay');
            const loadingText = document.getElementById('loadingText');
            const progressBar = document.getElementById('progressBar');
            const progressText = document.getElementById('progressText');
            const currentDateElements = document.querySelectorAll('.current-date');
            
            // Set current date
            const now = new Date();
            currentDateElements.forEach(el => {
                el.text极速ntent = now.toLocaleDateString();
            });
            
            downloadAllBtn.addEventListener('click', function() {
                downloadAllResources();
            });
            
            function downloadAllResources() {
                // Show loading overlay
                loadingText.textContent = 'Preparing your complete business package...';
                loadingOverlay.style.display = 'flex';
                updateProgress(0);
                
                // Create a zip file to hold all resources
                const zip = new JSZip();
                
                // Generate all PDFs and add to zip
                setTimeout(() => {
                    generateAllPdfs(zip);
                }, 100);
            }
            
            function generateAllPdfs(zip) {
                updateProgress(10);
                loadingText.textContent = 'Generating Marketing Strategy Guide...';
                
                // Generate Marketing PDF
                generatePdf('marketing').then(marketingPdf => {
                    zip.file("Marketing-Strategy-Guide.pdf", marketingPdf.output('blob'));
                    updateProgress(30);
                    loadingText.textContent = 'Generating SEO Strategy Guide...';
                    
                    // Generate SEO PDF
                    return generatePdf('seo');
                }).then(seoPdf => {
                    zip.file("SEO-Strategy-Guide.pdf", seoPdf.output('blob'));
                    updateProgress(50);
                    loadingText.textContent = 'Generating Business Growth Strategy...';
                    
                    // Generate Growth PDF
                    return generatePdf('growth');
                }).then(growthPdf => {
                    zip.file("Business-Growth-Strategy.pdf", growthPdf.output('blob'));
                    updateProgress(70);
                    loadingText.textContent = 'Adding website resources...';
                    
                    // Add website HTML to zip (in a real scenario, this would be the actual generated website)
                    const websiteContent = `<!DOCTYPE html>
<html>
<head>
    <title>{{ $business->name }} - Generated Website</title>
    <style>body{font-family: 'Poppins', sans-serif; max-width: 1200px; margin: 0 auto; padding: 20px;}</style>
</head>
<body>
    <h1>Welcome to {{ $business->name }}</h1>
    <p>This is your generated website for the {{ $business->industry }} industry.</p>
    <p>Target audience: {{ $business->target }}</p>
    <p>Products/Services: {{ $business->products }}</p>
    <p>For the complete website, visit: <a href="{{ url('sites/'.$business->id) }}">{{ url('sites/'.$business->id) }}</a></p>
</body>
</html>`;
                    
                    zip.file("website/Index.html", websiteContent);
                    updateProgress(90);
                    loadingText.textContent = 'Creating download package...';
                    
                    // Generate the zip file
                    return zip.generateAsync({type: "blob"});
                }).then(function(content) {
                    // Save the zip file
                    saveAs(content, "{{ $business->name }}-Business-Package.zip");
                    updateProgress(100);
                    
                    // Hide loading overlay after a delay
                    setTimeout(() => {
                        loadingOverlay.style.display = 'none';
                        showSuccessMessage(downloadAllBtn);
                    }, 1000);
                }).catch(error => {
                    console.error('Error generating package:', error);
                    loadingOverlay.style.display = 'none';
                    alert('Error generating business package. Please try again.');
                });
            }
            
            function generatePdf(type) {
                return new Promise((resolve, reject) => {
                    try {
                        // Create a new PDF document
                        const doc = new jsPDF();
                        
                        // Get the PDF template content
                        const templateId = `${type}-pdf-template`;
                        const pdfTemplate = document.getElementById(templateId);
                        
                        // Use html2canvas to capture the template as an image
                        html2canvas(pdfTemplate, {
                            scale: 2,
                            useCORS: true,
                            logging: false
                        }).then(canvas => {
                            // Convert canvas to image data
                            const imgData = canvas.toDataURL('image/jpeg', 1.0);
                            
                            // Calculate PDF dimensions
                            const imgWidth = doc.internal.pageSize.getWidth();
                            const imgHeight = canvas.height * imgWidth / canvas.width;
                            
                            // Add image to PDF
                            doc.addImage(imgData, 'JPEG', 0, 0, imgWidth, imgHeight);
                            
                            resolve(doc);
                        }).catch(reject);
                    } catch (error) {
                        reject(error);
                    }
                });
            }
            
            function updateProgress(percent) {
                progressBar.style.width = percent + '%';
                progressText.textContent = percent + '%';
            }
            
            function showSuccessMessage(button) {
                const originalText = button.innerHTML;
                button.innerHTML = '<i class="fas fa-check"></i> Download Complete!';
                button.style.opacity = '0.8';
                
                setTimeout(() => {
                    button.innerHTML = originalText;
                    button.style.opacity = '1';
                }, 3000);
            }
        });
    </script>
</body>
</html>