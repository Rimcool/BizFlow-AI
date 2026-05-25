@extends('templates.layout')

@section('content')
    <!-- Hero Section -->
    <section class="artistic-hero">
        <div class="container">
            <div class="hero-content">
                <h1>{{ $business->name }}</h1>
                <p class="hero-subtitle">Where Creativity Meets Expression</p>
                <p class="hero-description">Unique {{ $business->products }} for {{ $business->target }} who appreciate artistic vision</p>
                <div class="hero-actions">
                    <a href="#gallery" class="btn btn-primary">View Gallery</a>
                    <a href="#commission" class="btn btn-secondary">Commission Work</a>
                </div>
            </div>
            <div class="hero-visual">
                <div class="artistic-elements">
                    <div class="paint-splash splash-1"></div>
                    <div class="paint-splash splash-2"></div>
                    <div class="paint-splash splash-3"></div>
                    <div class="brush-stroke"></div>
                </div>
            </div>
        </div>
        <div class="canvas-texture"></div>
    </section>

    <!-- Gallery Section -->
    <section id="gallery" class="gallery">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Creative Gallery</h2>
                <p class="section-subtitle">A showcase of artistic expression and imagination</p>
            </div>
            <div class="gallery-grid">
                @php
                    $products = explode(',', $business->products);
                    $allProducts = $products;
                    if (count($products) < 6) {
                        $variations = ['Abstract', 'Expressive', 'Modern', 'Contemporary', 'Mixed Media', 'Original'];
                        $artisticColors = ['FF6B6B', '4ECDC4', '45B7D1', '96CEB4', 'FECA57', 'FF9FF3'];
                        for ($i = count($products); $i < 6; $i++) {
                            $allProducts[] = $variations[$i] . ' ' . $products[0];
                        }
                    }
                @endphp
                
                @foreach(array_slice($allProducts, 0, 6) as $index => $product)
                @php
                    $artisticColors = ['FF6B6B', '4ECDC4', '45B7D1', '96CEB4', 'FECA57', 'FF9FF3'];
                    $textColors = ['FFFFFF', 'FFFFFF', 'FFFFFF', 'FFFFFF', 'FFFFFF', 'FFFFFF'];
                    $colorIndex = $index % count($artisticColors);
                    $productColor = $artisticColors[$colorIndex];
                    $textColor = $textColors[$colorIndex];
                @endphp
                <div class="gallery-item" data-color="{{ $productColor }}">
                    <div class="artwork-badge">Original</div>
                    <div class="artwork-frame">
                        <div class="artwork-image" style="background-color: #{{ $productColor }};">
                            <div class="abstract-pattern"></div>
                        </div>
                        <div class="artwork-overlay">
                            <button class="view-details">View Details</button>
                        </div>
                    </div>
                    <div class="artwork-info">
                        <h3 class="artwork-title">{{ trim($product) }}</h3>
                        <p class="artwork-description">Unique {{ $business->industry }} piece</p>
                        <div class="artwork-meta">
                            <span class="artwork-medium">Acrylic & Mixed Media</span>
                            <span class="artwork-size">24" × 36"</span>
                        </div>
                        <div class="artwork-footer">
                            <p class="artwork-price">${{ rand(150, 1200) }}.00</p>
                            <button class="acquire-artwork" 
                                    data-product="{{ trim($product) }}" 
                                    data-price="{{ rand(150, 1200) }}">
                                <i class="fas fa-palette"></i>
                                Acquire
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Process Section -->
    <section class="creative-process">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">The Creative Journey</h2>
                <p class="section-subtitle">From inspiration to finished masterpiece</p>
            </div>
            <div class="process-steps">
                <div class="process-step">
                    <div class="step-number">01</div>
                    <div class="step-icon">
                        <i class="fas fa-lightbulb"></i>
                    </div>
                    <h3>Inspiration</h3>
                    <p>Every piece begins with a spark of inspiration and conceptual development</p>
                </div>
                <div class="process-step">
                    <div class="step-number">02</div>
                    <div class="step-icon">
                        <i class="fas fa-drafting-compass"></i>
                    </div>
                    <h3>Sketching</h3>
                    <p>Initial ideas take form through sketches and compositional studies</p>
                </div>
                <div class="process-step">
                    <div class="step-number">03</div>
                    <div class="step-icon">
                        <i class="fas fa-brush"></i>
                    </div>
                    <h3>Creation</h3>
                    <p>The artwork comes to life through layers of color, texture, and expression</p>
                </div>
                <div class="process-step">
                    <div class="step-number">04</div>
                    <div class="step-icon">
                        <i class="fas fa-star"></i>
                    </div>
                    <h3>Refinement</h3>
                    <p>Final touches and details complete the artistic vision</p>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="about">
        <div class="container">
            <div class="about-grid">
                <div class="about-content">
                    <h2 class="section-title">The Artist's Vision</h2>
                    <p class="about-description">
                        {{ $business->name }} is more than just a studio—it's a celebration of creative expression. 
                        Founded on the belief that art should evoke emotion and spark imagination, we create 
                        {{ $business->products }} that speak to the soul.
                    </p>
                    <p class="about-description">
                        Each piece is a journey of exploration, blending traditional techniques with contemporary 
                        vision to create works that are both timeless and innovative.
                    </p>
                    <div class="artist-stats">
                        <div class="artist-stat">
                            <span class="stat-number">500+</span>
                            <span class="stat-label">Artworks Created</span>
                        </div>
                        <div class="artist-stat">
                            <span class="stat-number">15</span>
                            <span class="stat-label">Years Creating</span>
                        </div>
                        <div class="artist-stat">
                            <span class="stat-number">100%</span>
                            <span class="stat-label">Handcrafted</span>
                        </div>
                    </div>
                </div>
                <div class="about-visual">
                    <div class="artist-studio">
                        <div class="studio-image">
                            <div class="paint-splatter"></div>
                            <div class="color-swatch"></div>
                            <div class="color-swatch"></div>
                            <div class="color-swatch"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Commission Section -->
    <section id="commission" class="commission">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Commission Artwork</h2>
                <p class="section-subtitle">Bring your vision to life with a custom creation</p>
            </div>
            <div class="commission-grid">
                <div class="commission-info">
                    <h3>Personalized Artistic Creation</h3>
                    <p>Work directly with the artist to create a unique piece that captures your vision, story, and aesthetic preferences.</p>
                    <ul class="commission-features">
                        <li><i class="fas fa-check"></i> One-on-one consultation</li>
                        <li><i class="fas fa-check"></i> Custom size and medium</li>
                        <li><i class="fas fa-check"></i> Color scheme matching</li>
                        <li><i class="fas fa-check"></i> Progress updates</li>
                        <li><i class="fas fa-check"></i> Certificate of authenticity</li>
                    </ul>
                </div>
                <div class="commission-form">
                    <form id="commissionForm">
                        <div class="form-group">
                            <input type="text" placeholder="Your Name" required>
                        </div>
                        <div class="form-group">
                            <input type="email" placeholder="Email Address" required>
                        </div>
                        <div class="form-group">
                            <select required>
                                <option value="" disabled selected>Project Type</option>
                                <option>Portrait</option>
                                <option>Landscape</option>
                                <option>Abstract</option>
                                <option>Custom Design</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <textarea placeholder="Tell us about your vision..." rows="4" required></textarea>
                        </div>
                        <button type="submit" class="submit-btn">
                            <i class="fas fa-magic"></i>
                            Begin Collaboration
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Art Lovers' Praise</h2>
                <p class="section-subtitle">What collectors and art enthusiasts are saying</p>
            </div>
            <div class="testimonials-grid">
                <div class="testimonial-item">
                    <div class="testimonial-content">
                        <p>"The {{ $business->products }} from {{ $business->name }} transformed my space. Each piece tells a story and brings such vibrant energy to my home. The artistic quality is exceptional."</p>
                    </div>
                    <div class="testimonial-author">
                        <h4>Sophia Rivers</h4>
                        <p>Art Collector</p>
                    </div>
                </div>
                <div class="testimonial-item">
                    <div class="testimonial-content">
                        <p>"Commissioning a custom piece was an incredible experience. The artist captured exactly what I envisioned and created something even more beautiful than I imagined."</p>
                    </div>
                    <div class="testimonial-author">
                        <h4>Marcus Chen</h4>
                        <p>Gallery Owner</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section id="faq" class="faq">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Artistic Inquiries</h2>
                <p class="section-subtitle">Answers to common questions about our creative process</p>
            </div>
            
            <div class="faq-grid">
                <div class="faq-item">
                    <div class="faq-question">
                        <span>What mediums do you work with?</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>We work with a variety of mediums including acrylics, oils, watercolors, mixed media, and digital art. Each piece may incorporate multiple techniques to achieve the desired artistic effect.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">
                        <span>How long does a custom commission take?</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>The timeline varies based on complexity, size, and current commission queue. Typically, pieces take 4-8 weeks from consultation to completion. We'll provide a detailed timeline during our initial discussion.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">
                        <span>Do you offer international shipping?</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Yes, we ship worldwide with professional art packaging and insurance. Each piece is carefully prepared for safe transit, regardless of destination.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">
                        <span>Can I visit your studio?</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>We welcome visitors by appointment. Studio visits provide a wonderful opportunity to see works in progress and discuss potential commissions in person.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="contact">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Studio Contact</h2>
                <p class="section-subtitle">Let's create something beautiful together</p>
            </div>
            
            <div class="contact-grid">
                <div class="contact-info">
                    <div class="contact-info-item">
                        <div class="contact-icon">
                            <i class="fas fa-palette"></i>
                        </div>
                        <div class="contact-details">
                            <h4>Studio</h4>
                            <p>{{ $business->email }}</p>
                        </div>
                    </div>
                    <div class="contact-info-item">
                        <div class="contact-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div class="contact-details">
                            <h4>Call</h4>
                            <p>(555) 123-ARTIST</p>
                        </div>
                    </div>
                    <div class="contact-info-item">
                        <div class="contact-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="contact-details">
                            <h4>Visit</h4>
                            <p>123 Creative District<br>Arts Quarter, CA 90210</p>
                        </div>
                    </div>
                    <div class="contact-info-item">
                        <div class="contact-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="contact-details">
                            <h4>Studio Hours</h4>
                            <p>Wednesday - Sunday: 11AM - 7PM<br>By Appointment: Monday & Tuesday</p>
                        </div>
                    </div>
                </div>
                
                <div class="contact-form-container">
                    <form id="contactForm" class="contact-form">
                        <div class="form-row">
                            <div class="form-group">
                                <input type="text" placeholder="Your Name" required>
                            </div>
                            <div class="form-group">
                                <input type="email" placeholder="Email Address" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" placeholder="Subject" required>
                        </div>
                        <div class="form-group">
                            <textarea placeholder="Tell us about your artistic vision..." rows="5" required></textarea>
                        </div>
                        <button type="submit" class="submit-btn">
                            <i class="fas fa-paper-plane"></i>
                            Send Message
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="newsletter">
        <div class="container">
            <div class="newsletter-content">
                <h2>Join Our Creative Circle</h2>
                <p>Receive updates on new works, studio events, and artistic inspiration</p>
                <form class="newsletter-form" id="newsletterForm">
                    <div class="newsletter-input-group">
                        <input type="email" placeholder="Enter your email address" required>
                        <button type="submit">
                            <i class="fas fa-paint-brush"></i>
                            Subscribe
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@php
    // Artistic color scheme
    $primaryColor = $business->color ?: '#FF6B6B'; // Coral
    $secondaryColor = '#4ECDC4'; // Turquoise
    $accentColor = '#FECA57'; // Yellow
    $textColor = '#2D3436'; // Dark gray
    $lightColor = '#F9F9F9'; // Light background
    $darkColor = '#2D3436'; // Dark text
    
    $templateStyles = '
        :root {
            --primary-color: ' . $primaryColor . ';
            --secondary-color: ' . $secondaryColor . ';
            --accent-color: ' . $accentColor . ';
            --text-color: ' . $textColor . ';
            --light-color: ' . $lightColor . ';
            --dark-color: ' . $darkColor . ';
            --border-radius: 12px;
            --shadow: 0 8px 25px rgba(0,0,0,0.1);
            --transition: all 0.3s ease;
            --artistic-gradient: linear-gradient(135deg, #FF6B6B 0%, #4ECDC4 50%, #FECA57 100%);
            --creative-gradient: linear-gradient(45deg, #FF6B6B, #4ECDC4, #45B7D1, #96CEB4, #FECA57, #FF9FF3);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Poppins", "Raleway", sans-serif;
            line-height: 1.6;
            color: var(--text-color);
            background: var(--light-color);
            overflow-x: hidden;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Navigation */
        .navbar {
            background: rgba(249, 249, 249, 0.95);
            backdrop-filter: blur(10px);
            padding: 1.5rem 0;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            transition: var(--transition);
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 2rem;
            font-weight: 700;
            color: var(--primary-color);
            letter-spacing: 0.5px;
        }

        .nav-menu {
            display: flex;
            list-style: none;
            gap: 2rem;
        }

        .nav-link {
            text-decoration: none;
            color: var(--text-color);
            font-weight: 500;
            font-size: 1.1rem;
            transition: var(--transition);
            position: relative;
        }

        .nav-link:after {
            content: \'\';
            position: absolute;
            width: 0;
            height: 3px;
            bottom: -5px;
            left: 0;
            background: var(--primary-color);
            transition: var(--transition);
            border-radius: 2px;
        }

        .nav-link:hover:after {
            width: 100%;
        }

        .nav-link:hover {
            color: var(--primary-color);
        }

        .cart-icon {
            position: relative;
            cursor: pointer;
            font-size: 1.3rem;
            color: var(--text-color);
            transition: var(--transition);
        }

        .cart-icon:hover {
            color: var(--primary-color);
        }

        .cart-count {
            position: absolute;
            top: -8px;
            right: -8px;
            background: var(--accent-color);
            color: var(--dark-color);
            border-radius: 50%;
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.7rem;
            font-weight: 600;
        }

        /* Hero Section */
        .artistic-hero {
            background: linear-gradient(135deg, rgba(255, 107, 107, 0.9) 0%, rgba(78, 205, 196, 0.8) 100%);
            color: white;
            padding: 12rem 0 8rem;
            position: relative;
            overflow: hidden;
        }

        .hero-content {
            position: relative;
            z-index: 2;
            max-width: 600px;
        }

        .artistic-hero h1 {
            font-size: 3.5rem;
            font-weight: 800;
            margin-bottom: 1rem;
            line-height: 1.2;
            background: linear-gradient(135deg, #fff 0%, #f0f0f0 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero-subtitle {
            font-size: 1.5rem;
            margin-bottom: 1rem;
            font-weight: 400;
            color: rgba(255, 255, 255, 0.9);
        }

        .hero-description {
            font-size: 1.1rem;
            margin-bottom: 3rem;
            color: rgba(255, 255, 255, 0.8);
        }

        .hero-actions {
            display: flex;
            gap: 1.5rem;
        }

        .btn {
            padding: 1.2rem 2.5rem;
            border: none;
            border-radius: var(--border-radius);
            font-weight: 600;
            text-decoration: none;
            transition: var(--transition);
            cursor: pointer;
            font-size: 1rem;
            display: inline-block;
        }

        .btn-primary {
            background: white;
            color: var(--primary-color);
            box-shadow: var(--shadow);
        }

        .btn-primary:hover {
            background: var(--light-color);
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        }

        .btn-secondary {
            background: transparent;
            color: white;
            border: 2px solid white;
        }

        .btn-secondary:hover {
            background: white;
            color: var(--primary-color);
            transform: translateY(-3px);
        }

        .hero-visual {
            position: absolute;
            right: 5%;
            top: 50%;
            transform: translateY(-50%);
            width: 40%;
        }

        .artistic-elements {
            position: relative;
            height: 300px;
            width: 300px;
        }

        .paint-splash {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
            animation: float 6s ease-in-out infinite;
        }

        .splash-1 {
            width: 100px;
            height: 100px;
            top: 20px;
            right: 50px;
            background: rgba(255, 255, 255, 0.4);
            animation-delay: 0s;
        }

        .splash-2 {
            width: 80px;
            height: 80px;
            bottom: 50px;
            right: 120px;
            background: rgba(255, 255, 255, 0.3);
            animation-delay: 2s;
        }

        .splash-3 {
            width: 120px;
            height: 120px;
            top: 100px;
            right: 0;
            background: rgba(255, 255, 255, 0.2);
            animation-delay: 4s;
        }

        .brush-stroke {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 200px;
            height: 30px;
            background: rgba(255, 255, 255, 0.5);
            border-radius: 15px;
            transform: translate(-50%, -50%) rotate(-30deg);
            animation: brushStroke 4s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(10deg); }
        }

        @keyframes brushStroke {
            0%, 100% { transform: translate(-50%, -50%) rotate(-30deg) scale(1); }
            50% { transform: translate(-50%, -50%) rotate(-25deg) scale(1.1); }
        }

        .canvas-texture {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: 
                radial-gradient(circle at 20% 30%, rgba(255, 255, 255, 0.1) 2px, transparent 2px),
                radial-gradient(circle at 80% 70%, rgba(255, 255, 255, 0.1) 2px, transparent 2px);
            background-size: 50px 50px;
            opacity: 0.3;
            pointer-events: none;
        }

        /* Section Headers */
        .section-header {
            text-align: center;
            margin-bottom: 4rem;
        }

        .section-title {
            font-size: 2.8rem;
            font-weight: 800;
            color: var(--text-color);
            margin-bottom: 1rem;
            background: var(--creative-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .section-subtitle {
            font-size: 1.2rem;
            color: var(--text-color);
            font-weight: 400;
            opacity: 0.8;
        }

        /* Gallery Section */
        .gallery {
            padding: 6rem 0;
            background: var(--light-color);
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2.5rem;
        }

        .gallery-item {
            background: white;
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: var(--transition);
            position: relative;
        }

        .gallery-item:hover {
            transform: translateY(-10px) rotate(1deg);
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }

        .artwork-badge {
            position: absolute;
            top: 15px;
            left: 15px;
            background: var(--primary-color);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            z-index: 2;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .artwork-frame {
            position: relative;
            overflow: hidden;
            height: 250px;
        }

        .artwork-image {
            width: 100%;
            height: 100%;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .abstract-pattern {
            width: 80%;
            height: 80%;
            background: 
                radial-gradient(circle at 30% 30%, rgba(255, 255, 255, 0.3) 2px, transparent 2px),
                radial-gradient(circle at 70% 70%, rgba(255, 255, 255, 0.2) 2px, transparent 2px);
            background-size: 30px 30px;
            border-radius: 8px;
        }

        .artwork-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0,0,0,0.7);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: var(--transition);
        }

        .gallery-item:hover .artwork-overlay {
            opacity: 1;
        }

        .view-details {
            background: var(--primary-color);
            color: white;
            border: none;
            padding: 0.8rem 1.5rem;
            border-radius: var(--border-radius);
            cursor: pointer;
            font-weight: 600;
            transition: var(--transition);
        }

        .view-details:hover {
            background: var(--secondary-color);
            transform: scale(1.05);
        }

        .artwork-info {
            padding: 2rem;
        }

        .artwork-title {
            font-size: 1.4rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            color: var(--text-color);
        }

        .artwork-description {
            color: var(--text-color);
            margin-bottom: 1rem;
            font-size: 0.9rem;
            opacity: 0.8;
        }

        .artwork-meta {
            display: flex;
            justify-content: space-between;
            margin-bottom: 1.5rem;
            font-size: 0.8rem;
            color: var(--text-color);
            opacity: 0.7;
        }

        .artwork-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .artwork-price {
            font-size: 1.4rem;
            font-weight: 700;
            color: var(--primary-color);
        }

        .acquire-artwork {
            background: var(--primary-color);
            color: white;
            border: none;
            padding: 0.8rem 1.5rem;
            border-radius: var(--border-radius);
            cursor: pointer;
            font-weight: 600;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .acquire-artwork:hover {
            background: var(--secondary-color);
            transform: translateY(-2px);
        }

        /* Process Section */
        .creative-process {
            padding: 5rem 0;
            background: white;
        }

        .process-steps {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
        }

        .process-step {
            text-align: center;
            padding: 2.5rem 1.5rem;
            background: var(--light-color);
            border-radius: var(--border-radius);
            transition: var(--transition);
            box-shadow: var(--shadow);
            position: relative;
            overflow: hidden;
        }

        .process-step:before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--creative-gradient);
        }

        .process-step:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
        }

        .step-number {
            font-size: 2.5rem;
            font-weight: 800;
            color: rgba(0,0,0,0.1);
            margin-bottom: 1rem;
        }

        .step-icon {
            width: 80px;
            height: 80px;
            background: var(--creative-gradient);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            font-size: 2rem;
            color: white;
        }

        .process-step h3 {
            font-size: 1.3rem;
            margin-bottom: 1rem;
            color: var(--text-color);
        }

        .process-step p {
            color: var(--text-color);
            line-height: 1.6;
            opacity: 0.8;
        }

        /* About Section */
        .about {
            padding: 6rem 0;
            background: var(--light-color);
        }

        .about-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: center;
        }

        .about-content {
            padding-right: 2rem;
        }

        .about-description {
            color: var(--text-color);
            margin-bottom: 2rem;
            line-height: 1.8;
            font-size: 1.1rem;
        }

        .artist-stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2rem;
            margin-top: 3rem;
        }

        .artist-stat {
            text-align: center;
            padding: 1.5rem;
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
        }

        .stat-number {
            display: block;
            font-size: 2rem;
            font-weight: 800;
            color: var(--primary-color);
            margin-bottom: 0.5rem;
        }

        .stat-label {
            font-size: 0.9rem;
            color: var(--text-color);
            opacity: 0.8;
        }

        .about-visual {
            position: relative;
        }

        .artist-studio {
            padding: 20px;
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            transform: rotate(2deg);
        }

        .studio-image {
            position: relative;
            height: 300px;
            background: var(--creative-gradient);
            border-radius: calc(var(--border-radius) - 5px);
            overflow: hidden;
        }

        .paint-splatter {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 200px;
            height: 200px;
            background: rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            filter: blur(20px);
        }

        .color-swatch {
            position: absolute;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            animation: float 4s ease-in-out infinite;
        }

        .color-swatch:nth-child(2) {
            top: 30px;
            left: 30px;
            background: var(--primary-color);
            animation-delay: 0s;
        }

        .color-swatch:nth-child(3) {
            bottom: 30px;
            right: 30px;
            background: var(--secondary-color);
            animation-delay: 1s;
        }

        .color-swatch:nth-child(4) {
            top: 30px;
            right: 30px;
            background: var(--accent-color);
            animation-delay: 2s;
        }

        /* Commission Section */
        .commission {
            padding: 6rem 0;
            background: white;
        }

        .commission-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: center;
        }

        .commission-info h3 {
            font-size: 1.8rem;
            margin-bottom: 1.5rem;
            color: var(--text-color);
        }

        .commission-info p {
            color: var(--text-color);
            margin-bottom: 2rem;
            line-height: 1.8;
        }

        .commission-features {
            list-style: none;
        }

        .commission-features li {
            margin-bottom: 1rem;
            color: var(--text-color);
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }

        .commission-features i {
            color: var(--primary-color);
            font-size: 1.2rem;
        }

        .commission-form {
            background: var(--light-color);
            padding: 2.5rem;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 1rem;
            border: 1px solid #ddd;
            border-radius: var(--border-radius);
            background: white;
            color: var(--text-color);
            font-family: inherit;
            transition: var(--transition);
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(255, 107, 107, 0.2);
        }

        .form-group textarea {
            min-height: 120px;
            resize: vertical;
        }

        .submit-btn {
            background: var(--primary-color);
            color: white;
            border: none;
            padding: 1.2rem 2.5rem;
            border-radius: var(--border-radius);
            cursor: pointer;
            font-weight: 600;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 0.5rem;
            width: 100%;
            justify-content: center;
        }

        .submit-btn:hover {
            background: var(--secondary-color);
            transform: translateY(-2px);
        }

        /* Testimonials Section */
        .testimonials {
            padding: 5rem 0;
            background: var(--light-color);
        }

        .testimonials-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
            gap: 2rem;
        }

        .testimonial-item {
            background: white;
            padding: 2.5rem;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            transition: var(--transition);
        }

        .testimonial-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
        }

        .testimonial-content {
            color: var(--text-color);
            font-style: italic;
            margin-bottom: 2rem;
            line-height: 1.8;
            font-size: 1.1rem;
            position: relative;
        }

        .testimonial-content:before {
            content: \'"\';
            font-size: 4rem;
            color: var(--primary-color);
            opacity: 0.2;
            position: absolute;
            top: -20px;
            left: -10px;
        }

        .testimonial-author h4 {
            color: var(--text-color);
            margin-bottom: 0.5rem;
        }

        .testimonial-author p {
            color: var(--text-color);
            font-size: 0.9rem;
            opacity: 0.8;
        }

        /* FAQ Section */
        .faq {
            padding: 6rem 0;
            background: white;
        }

        .faq-grid {
            max-width: 800px;
            margin: 0 auto;
        }

        .faq-item {
            background: var(--light-color);
            border-radius: var(--border-radius);
            margin-bottom: 1rem;
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: var(--transition);
        }

        .faq-item:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }

        .faq-question {
            padding: 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
            font-weight: 600;
            color: var(--text-color);
            background: var(--light-color);
        }

        .faq-answer {
            padding: 0 1.5rem 1.5rem;
            display: none;
            color: var(--text-color);
            line-height: 1.6;
        }

        .faq-active .faq-answer {
            display: block;
        }

        /* Contact Section */
        .contact {
            padding: 6rem 0;
            background: var(--light-color);
        }

        .contact-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
        }

        .contact-info-item {
            display: flex;
            align-items: center;
            margin-bottom: 2.5rem;
        }

        .contact-icon {
            width: 60px;
            height: 60px;
            background: var(--creative-gradient);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1.5rem;
            color: white;
            font-size: 1.2rem;
        }

        .contact-details h4 {
            color: var(--text-color);
            margin-bottom: 0.5rem;
        }

        .contact-details p {
            color: var(--text-color);
            opacity: 0.8;
        }

        .contact-form {
            background: white;
            padding: 2.5rem;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 1rem;
            border: 1px solid #ddd;
            border-radius: var(--border-radius);
            background: white;
            color: var(--text-color);
            font-family: inherit;
            transition: var(--transition);
        }

        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(255, 107, 107, 0.2);
        }

        .form-group textarea {
            min-height: 150px;
            resize: vertical;
        }

        /* Newsletter Section */
        .newsletter {
            background: var(--creative-gradient);
            color: white;
            padding: 5rem 0;
            text-align: center;
        }

        .newsletter-content {
            max-width: 600px;
            margin: 0 auto;
        }

        .newsletter h2 {
            font-size: 2.8rem;
            margin-bottom: 1rem;
            font-weight: 800;
        }

        .newsletter p {
            margin-bottom: 2.5rem;
            font-size: 1.1rem;
            opacity: 0.9;
        }

        .newsletter-input-group {
            display: flex;
            max-width: 400px;
            margin: 0 auto;
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: var(--shadow);
        }

        .newsletter-input-group input {
            flex: 1;
            padding: 1rem;
            border: none;
            background: white;
            color: var(--text-color);
        }

        .newsletter-input-group button {
            padding: 1rem 1.5rem;
            background: var(--text-color);
            color: white;
            border: none;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .newsletter-input-group button:hover {
            background: var(--primary-color);
        }

        /* Footer */
        .footer {
            background: var(--text-color);
            color: white;
            padding: 4rem 0 2rem;
        }

        .footer-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 3rem;
            margin-bottom: 3rem;
        }

        .footer-section h3 {
            color: white;
            margin-bottom: 1.5rem;
            font-size: 1.2rem;
        }

        .footer-section p,
        .footer-section a {
            color: rgba(255, 255, 255, 0.7);
            margin-bottom: 0.8rem;
            display: block;
            text-decoration: none;
            transition: var(--transition);
        }

        .footer-section a:hover {
            color: var(--primary-color);
        }

        .footer-bottom {
            text-align: center;
            padding-top: 2rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: rgba(255, 255, 255, 0.5);
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .about-grid,
            .contact-grid,
            .commission-grid {
                grid-template-columns: 1fr;
                gap: 3rem;
            }
            
            .about-content {
                padding-right: 0;
            }
            
            .hero-visual {
                display: none;
            }
            
            .hero-content {
                max-width: 100%;
                text-align: center;
            }
        }

        @media (max-width: 768px) {
            .artistic-hero {
                padding: 8rem 0 4rem;
            }
            
            .artistic-hero h1 {
                font-size: 2.5rem;
            }
            
            .hero-actions {
                flex-direction: column;
                align-items: center;
            }
            
            .gallery-grid {
                grid-template-columns: 1fr;
            }
            
            .artist-stats {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }
            
            .form-row {
                grid-template-columns: 1fr;
            }
            
            .testimonials-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 480px) {
            .artistic-hero h1 {
                font-size: 2rem;
            }
            
            .section-title {
                font-size: 2rem;
            }
            
            .artwork-footer {
                flex-direction: column;
                gap: 1rem;
                align-items: flex-start;
            }
            
            .acquire-artwork {
                width: 100%;
                justify-content: center;
            }
        }
    ';
@endphp

<script>
document.addEventListener('DOMContentLoaded', function() {
    // FAQ toggle
    const faqQuestions = document.querySelectorAll('.faq-question');
    faqQuestions.forEach(question => {
        question.addEventListener('click', () => {
            const item = question.parentElement;
            item.classList.toggle('faq-active');
        });
    });

    // Animate elements on scroll
    const animatedElements = document.querySelectorAll('.process-step, .gallery-item');
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, { threshold: 0.1 });
    
    animatedElements.forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(20px)';
        el.style.transition = 'all 0.6s ease';
        observer.observe(el);
    });
});
</script>