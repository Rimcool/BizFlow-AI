<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beautify - Website Preview</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            color: #333;
            line-height: 1.6;
            padding: 20px;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        .container {
            max-width: 1000px;
            width: 100%;
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }
        
        .header {
            background: linear-gradient(to right, #ff6b6b, #ff9ecb);
            color: white;
            padding: 25px;
            text-align: center;
        }
        
        .header h1 {
            font-size: 2.2rem;
            margin-bottom: 10px;
        }
        
        .header p {
            opacity: 0.9;
        }
        
        .content {
            padding: 30px;
        }
        
        .notification {
            background: #f8f9fa;
            border-left: 4px solid #ff6b6b;
            padding: 15px 20px;
            margin-bottom: 25px;
            border-radius: 4px;
            font-size: 0.95rem;
        }
        
        .preview-container {
            border: 1px solid #e0e0e0;
            border-radius: 10px;
            overflow: hidden;
            height: 400px;
            background: white;
            margin-bottom: 25px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }
        
        .website-preview {
            padding: 20px;
            height: 100%;
            overflow-y: auto;
        }
        
        .website-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 0;
            border-bottom: 1px solid #eee;
            margin-bottom: 25px;
        }
        
        .logo {
            font-size: 26px;
            font-weight: 700;
            color: #ff6b6b;
        }
        
        .nav-links {
            display: flex;
            gap: 20px;
        }
        
        .nav-links a {
            text-decoration: none;
            color: #333;
            font-weight: 500;
            transition: color 0.3s;
        }
        
        .nav-links a:hover {
            color: #ff6b6b;
        }
        
        .hero {
            text-align: center;
            padding: 30px 20px;
            background: linear-gradient(to right, rgba(255, 107, 107, 0.1), rgba(255, 158, 203, 0.1));
            border-radius: 10px;
            margin-bottom: 30px;
        }
        
        .hero h2 {
            color: #ff6b6b;
            margin-bottom: 15px;
            font-size: 2rem;
        }
        
        .hero p {
            margin-bottom: 20px;
            font-size: 1.1rem;
        }
        
        .btn {
            background: #ff6b6b;
            color: white;
            border: none;
            padding: 12px 28px;
            border-radius: 8px;
            font-weight: 500;
            cursor: pointer;
            font-size: 1rem;
            transition: all 0.3s;
        }
        
        .btn:hover {
            background: #ff5252;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 107, 107, 0.3);
        }
        
        .features {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .feature-card {
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 3px 15px rgba(0, 0, 0, 0.08);
        }
        
        .feature-card h3 {
            color: #ff6b6b;
            margin-bottom: 15px;
            font-size: 1.3rem;
        }
        
        .footer {
            text-align: center;
            padding: 20px;
            border-top: 1px solid #eee;
            color: #666;
            font-size: 0.9rem;
        }
        
        .pdf-section {
            background: #e8f4fc;
            border-radius: 10px;
            padding: 25px;
            margin: 25px 0;
            border-left: 4px solid #2196F3;
        }
        
        .pdf-section h3 {
            color: #1976d2;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .pdf-section p {
            margin-bottom: 15px;
            color: #455a64;
        }
        
        .pdf-features {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
            margin: 15px 0;
        }
        
        .pdf-feature {
            background: white;
            padding: 12px;
            border-radius: 8px;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .pdf-feature::before {
            content: "✓";
            color: #4caf50;
            font-weight: bold;
        }
        
        .action-buttons {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
        }
        
        .action-btn {
            padding: 15px 35px;
            border-radius: 8px;
            font-size: 1.1rem;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            transition: all 0.3s ease;
            cursor: pointer;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        
        .visit-btn {
            background: #ff6b6b;
            color: white;
        }
        
        .visit-btn:hover {
            background: #ff5252;
            transform: translateY(-3px);
            box-shadow: 0 7px 15px rgba(255, 107, 107, 0.3);
        }
        
        .pdf-btn {
            background: #4ecdc4;
            color: white;
        }
        
        .pdf-btn:hover {
            background: #3db9b0;
            transform: translateY(-3px);
            box-shadow: 0 7px 15px rgba(78, 205, 196, 0.3);
        }
        
        @media (max-width: 768px) {
            .features, .pdf-features {
                grid-template-columns: 1fr;
            }
            
            .website-header {
                flex-direction: column;
                gap: 15px;
            }
            
            .nav-links {
                flex-wrap: wrap;
                justify-content: center;
            }
            
            .action-buttons {
                flex-direction: column;
                gap: 15px;
            }
            
            .action-btn {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1><i class="fas fa-check-circle"></i> Your Website is Ready!</h1>
            <p>Preview of your Beautify website</p>
        </div>
        
        <div class="content">
            <div class="notification">
                <i class="fas fa-info-circle"></i> This is a preview of how your website will look. Click the button below to visit your live website.
            </div>
            
            <div class="preview-container">
                <div class="website-preview">
                    <div class="website-header">
                        <div class="logo">beautify</div>
                        <div class="nav-links">
                            <a href="#">Home</a>
                            <a href="#">Products</a>
                            <a href="#">About</a>
                            <a href="#">Contact</a>
                        </div>
                    </div>
                    
                    <div class="hero">
                        <h2>Welcome to beautify</h2>
                        <p>Your premier destination for clothes, perfumes, makeup, jewelry & sandals</p>
                        <button class="btn">Shop Now</button>
                    </div>
                    
                    <div class="features">
                        <div class="feature-card">
                            <h3>Our Products</h3>
                            <p>Discover our collection of clothes, perfumes, makeup, jewelry & sandals designed for females.</p>
                        </div>
                        <div class="feature-card">
                            <h3>Why Choose Us</h3>
                            <p>We specialize in providing exceptional quality for the fashion & beauty industry.</p>
                        </div>
                        <div class="feature-card">
                            <h3>Fast Shipping</h3>
                            <p>We deliver anywhere with our reliable shipping partners.</p>
                        </div>
                        <div class="feature-card">
                            <h3>24/7 Support</h3>
                            <p>Our customer service team is always here to help you.</p>
                        </div>
                    </div>
                    
                    <div class="footer">
                        <p>© 2023 beautify. All rights reserved.</p>
                    </div>
                </div>
            </div>
            
            <div class="pdf-section">
                <h3><i class="fas fa-file-pdf"></i> Your Marketing Strategy Guide</h3>
                <p>We've created a personalized marketing plan specifically for your fashion & beauty business. Download your comprehensive guide to start growing your online presence.</p>
                
                <div class="pdf-features">
                    <div class="pdf-feature">Social media strategies</div>
                    <div class="pdf-feature">Email marketing templates</div>
                    <div class="pdf-feature">Content ideas calendar</div>
                    <div class="pdf-feature">Advertising recommendations</div>
                    <div class="pdf-feature">SEO optimization tips</div>
                    <div class="pdf-feature">Performance tracking guide</div>
                </div>
            </div>
            
            <div class="action-buttons">
                <a href="#" class="action-btn visit-btn">
                    <i class="fas fa-external-link-alt"></i> Visit Live Website
                </a>
                <a href="#" class="action-btn pdf-btn">
                    <i class="fas fa-download"></i> Download Marketing PDF
                </a>
            </div>
        </div>
    </div>

    <script>
        // Simple JavaScript to enhance interactivity
        document.addEventListener('DOMContentLoaded', function() {
            const pdfBtn = document.querySelector('.pdf-btn');
            
            pdfBtn.addEventListener('click', function() {
                alert('PDF download would start here. In a real application, this would download your marketing guide.');
            });
            
            const visitBtn = document.querySelector('.visit-btn');
            
            visitBtn.addEventListener('click', function() {
                alert('This would take you to the live website. In a real application, this would redirect to your actual site.');
            });
        });
    </script>
</body>
</html>