@extends('templates.layout')

@section('content')
    <!-- Hero Section -->
    <section class="luxury-hero">
        <div class="container">
            <div class="hero-content">
                <h1>{{ $business->name }}</h1>
                <p class="hero-subtitle">Exquisite {{ $business->industry }} for the Discerning</p>
                <p class="hero-description">Where opulence meets craftsmanship for {{ $business->target }} who demand excellence</p>
                <div class="hero-actions">
                    <a href="#collection" class="btn btn-primary">View Collection</a>
                    <a href="#heritage" class="btn btn-secondary">Our Heritage</a>
                </div>
            </div>
            <div class="hero-visual">
                <div class="luxury-elements">
                    <div class="gold-accent"></div>
                    <div class="gold-accent"></div>
                    <div class="crystal-element"></div>
                    <div class="marble-texture"></div>
                </div>
            </div>
        </div>
        <div class="gold-overlay"></div>
    </section>

    <!-- Collection Section -->
    <section id="collection" class="collection">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">The Gold Collection</h2>
                <p class="section-subtitle">Masterpieces of luxury and refinement</p>
            </div>
            <div class="collection-grid">
                @php
                    $products = explode(',', $business->products);
                    $allProducts = $products;
                    if (count($products) < 6) {
                        $variations = ['Prestige', 'Elegance', 'Heritage', 'Royal', 'Imperial', 'Supreme'];
                        $luxuryColors = ['0D0D0D', '1A1A1A', '262626', '333333', '404040', '4D4D4D'];
                        for ($i = count($products); $i < 6; $i++) {
                            $allProducts[] = $variations[$i] . ' ' . $products[0];
                        }
                    }
                @endphp
                
                @foreach(array_slice($allProducts, 0, 6) as $index => $product)
                @php
                    $luxuryColors = ['0D0D0D', '1A1A1A', '262626', '333333', '404040', '4D4D4D'];
                    $textColors = ['D4AF37', 'D4AF37', 'D4AF37', 'D4AF37', 'D4AF37', 'D4AF37'];
                    $colorIndex = $index % count($luxuryColors);
                    $productColor = $luxuryColors[$colorIndex];
                    $textColor = $textColors[$colorIndex];
                @endphp
                <div class="collection-item" data-color="{{ $productColor }}">
                    <div class="luxury-badge">Exclusive</div>
                    <div class="item-image-container">
                        <div class="luxury-frame">
                            <div class="item-image" style="background-color: #{{ $productColor }};">
                                <div class="gold-detail"></div>
                            </div>
                        </div>
                        <div class="item-overlay">
                            <button class="preview-item">Preview</button>
                        </div>
                    </div>
                    <div class="item-info">
                        <h3 class="item-title">{{ trim($product) }}</h3>
                        <p class="item-description">Premium {{ $business->industry }} with gold accents</p>
                        <div class="luxury-features">
                            <span class="luxury-tag">24K Gold</span>
                            <span class="luxury-tag">Hand-Finished</span>
                            <span class="luxury-tag">Limited Edition</span>
                        </div>
                        <div class="item-footer">
                            <p class="item-price">${{ rand(500, 5000) }}.00</p>
                            <button class="acquire-item" 
                                    data-product="{{ trim($product) }}" 
                                    data-price="{{ rand(500, 5000) }}">
                                <i class="fas fa-crown"></i>
                                Reserve
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Craftsmanship Section -->
    <section class="craftsmanship">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Exceptional Craftsmanship</h2>
                <p class="section-subtitle">Where every detail matters</p>
            </div>
            <div class="craftsmanship-grid">
                <div class="craftsmanship-item">
                    <div class="craft-icon">
                        <i class="fas fa-gem"></i>
                    </div>
                    <h3>Precious Materials</h3>
                    <p>Only the finest materials including 24K gold and premium components</p>
                </div>
                <div class="craftsmanship-item">
                    <div class="craft-icon">
                        <i class="fas fa-hand-sparkles"></i>
                    </div>
                    <h3>Artisan Finishing</h3>
                    <p>Hand-finished by master craftsmen with generations of expertise</p>
                </div>
                <div class="craftsmanship-item">
                    <div class="craft-icon">
                        <i class="fas fa-award"></i>
                    </div>
                    <h3>Quality Assurance</h3>
                    <p>Rigorous quality control ensuring perfection in every piece</p>
                </div>
                <div class="craftsmanship-item">
                    <div class="craft-icon">
                        <i class="fas fa-certificate"></i>
                    </div>
                    <h3>Authentication</h3>
                    <p>Each piece comes with certificate of authenticity and provenance</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Heritage Section -->
    <section id="heritage" class="heritage">
        <div class="container">
            <div class="heritage-grid">
                <div class="heritage-content">
                    <h2 class="section-title">A Legacy of Luxury</h2>
                    <p class="heritage-description">
                        Since our establishment, {{ $business->name }} has been synonymous with uncompromising luxury 
                        and exceptional craftsmanship. Our heritage is built upon a foundation of excellence, 
                        serving discerning clients who appreciate the finer things in life.
                    </p>
                    <p class="heritage-description">
                        Each {{ $business->products }} in our collection represents the pinnacle of luxury, combining 
                        traditional techniques with contemporary design to create pieces that transcend time 
                        and trends.
                    </p>
                    <div class="heritage-stats">
                        <div class="heritage-stat">
                            <span class="stat-number">Est. 1985</span>
                            <span class="stat-label">Years of Excellence</span>
                        </div>
                        <div class="heritage-stat">
                            <span class="stat-number">100%</span>
                            <span class="stat-label">Handcrafted</span>
                        </div>
                        <div class="heritage-stat">
                            <span class="stat-number">24K</span>
                            <span class="stat-label">Gold Standard</span>
                        </div>
                    </div>
                </div>
                <div class="heritage-visual">
                    <div class="luxury-showcase">
                        <div class="showcase-item"></div>
                        <div class="gold-highlight"></div>
                        <div class="crystal-element"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Distinguished Clientele</h2>
                <p class="section-subtitle">Testimonials from our exclusive patrons</p>
            </div>
            <div class="testimonials-grid">
                <div class="testimonial-item">
                    <div class="testimonial-content">
                        <p>"The {{ $business->products }} from {{ $business->name }} exemplify true luxury. The craftsmanship is exceptional, and the gold detailing is simply magnificent. These are heirloom pieces that will be treasured for generations."</p>
                    </div>
                    <div class="testimonial-author">
                        <h4>Alexander Montgomery</h4>
                        <p>Luxury Collector</p>
                    </div>
                </div>
                <div class="testimonial-item">
                    <div class="testimonial-content">
                        <p>"In a world of mass production, {{ $business->name }} remains a beacon of true craftsmanship. Their attention to detail and use of precious materials sets them apart in the luxury market."</p>
                    </div>
                    <div class="testimonial-author">
                        <h4>Isabella Laurent</h4>
                        <p>Style Director</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section id="faq" class="faq">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Concierge Questions</h2>
                <p class="section-subtitle">Everything about our luxury offerings</p>
            </div>
            
            <div class="faq-grid">
                <div class="faq-item">
                    <div class="faq-question">
                        <span>What makes your gold pieces different from gold-plated items?</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Our pieces feature substantial gold elements rather than mere plating. We use 24K gold applied through techniques that ensure longevity and maintain their luxurious appearance. Unlike gold-plated items that may wear over time, our gold elements are integrated into the design to preserve their beauty and value indefinitely.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">
                        <span>Do you offer customization options for your pieces?</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Yes, we offer bespoke customization for discerning clients. Our master craftsmen can work with you to create unique pieces tailored to your specifications. This includes custom gold patterns, personalized inscriptions, and modifications to suit individual preferences. Custom commissions typically require 4-6 weeks for completion.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">
                        <span>How do I care for and maintain luxury gold items?</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Our pieces are designed for both beauty and durability. For maintenance, we recommend using the provided luxury care kit. Gently wipe with a soft, dry cloth after use. Avoid exposure to harsh chemicals, and store in the provided velvet presentation case when not in use. With proper care, your luxury piece will maintain its brilliance for generations.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">
                        <span>What is your authentication process?</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Each piece undergoes rigorous authentication, including hallmark verification, quality certification, and individual craftsmanship review. We provide a numbered certificate of authenticity, detailed provenance documentation, and lifetime authentication services. Our pieces are also registered in our exclusive client registry for added security and provenance tracking.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="contact">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Personal Consultation</h2>
                <p class="section-subtitle">Experience luxury service tailored to you</p>
            </div>
            
            <div class="contact-grid">
                <div class="contact-info">
                    <div class="contact-info-item">
                        <div class="contact-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="contact-details">
                            <h4>Concierge</h4>
                            <p>{{ $business->email }}</p>
                        </div>
                    </div>
                    <div class="contact-info-item">
                        <div class="contact-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div class="contact-details">
                            <h4>Private Line</h4>
                            <p>(555) 123-LUXURY</p>
                        </div>
                    </div>
                    <div class="contact-info-item">
                        <div class="contact-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="contact-details">
                            <h4>Showroom</h4>
                            <p>1 Luxury Avenue<br>Prestige District, NY 10001</p>
                        </div>
                    </div>
                    <div class="contact-info-item">
                        <div class="contact-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="contact-details">
                            <h4>Appointments</h4>
                            <p>By prior arrangement<br>Monday - Saturday: 10AM-6PM</p>
                        </div>
                    </div>
                </div>
                
                <div class="contact-form-container">
                    <form id="contactForm" class="contact-form">
                        <div class="form-row">
                            <div class="form-group">
                                <input type="text" placeholder="Full Name" required>
                            </div>
                            <div class="form-group">
                                <input type="email" placeholder="Email Address" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" placeholder="Company" required>
                        </div>
                        <div class="form-group">
                            <select required>
                                <option value="" disabled selected>Interest</option>
                                <option>Personal Collection</option>
                                <option>Corporate Gifting</option>
                                <option>Special Commission</option>
                                <option>Investment Piece</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <textarea placeholder="How may we assist you?" rows="5" required></textarea>
                        </div>
                        <button type="submit" class="submit-btn">
                            <i class="fas fa-paper-plane"></i>
                            Request Consultation
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
                <h2>The Gold Circle</h2>
                <p>Join our exclusive list for first access to new collections and private events</p>
                <form class="newsletter-form" id="newsletterForm">
                    <div class="newsletter-input-group">
                        <input type="email" placeholder="Enter your email address" required>
                        <button type="submit">
                            <i class="fas fa-star"></i>
                            Subscribe
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@php
    // Luxury Gold color scheme
    $primaryColor = $business->color ?: 'D4AF37'; // Gold
    $secondaryColor = '0D0D0D'; // Near black
    $accentColor = 'FFFFFF'; // White
    $textColor = 'FFFFFF'; // White
    $lightColor = '1A1A1A'; // Dark gray
    $darkColor = '000000'; // Black
    
    $templateStyles = '
        :root {
            --primary-color: #' . $primaryColor . ';
            --secondary-color: #' . $secondaryColor . ';
            --accent-color: #' . $accentColor . ';
            --text-color: #' . $textColor . ';
            --light-color: #' . $lightColor . ';
            --dark-color: #' . $darkColor . ';
            --border-radius: 8px;
            --shadow: 0 8px 32px rgba(212, 175, 55, 0.15);
            --transition: all 0.3s ease;
            --gold-gradient: linear-gradient(135deg, #D4AF37 0%, #FFD700 50%, #D4AF37 100%);
            --luxury-gradient: linear-gradient(135deg, #000000 0%, #1A1A1A 50%, #000000 100%);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Cormorant Garamond", "Playfair Display", serif;
            line-height: 1.6;
            color: var(--text-color);
            background: var(--dark-color);
            overflow-x: hidden;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Navigation */
        .navbar {
            background: rgba(0, 0, 0, 0.95);
            backdrop-filter: blur(10px);
            padding: 1.5rem 0;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            transition: var(--transition);
            border-bottom: 1px solid rgba(212, 175, 55, 0.2);
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
            font-size: 2.2rem;
            font-weight: 600;
            color: var(--primary-color);
            letter-spacing: 1px;
            font-style: italic;
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
            height: 2px;
            bottom: -5px;
            left: 0;
            background: var(--primary-color);
            transition: var(--transition);
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
            background: var(--primary-color);
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
        .luxury-hero {
            background: var(--luxury-gradient);
            color: var(--text-color);
            padding: 12rem 0 8rem;
            position: relative;
            overflow: hidden;
        }

        .hero-content {
            position: relative;
            z-index: 2;
            max-width: 600px;
        }

        .luxury-hero h1 {
            font-size: 4rem;
            font-weight: 600;
            margin-bottom: 1rem;
            line-height: 1.1;
            background: var(--gold-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero-subtitle {
            font-size: 1.5rem;
            margin-bottom: 1rem;
            font-weight: 400;
            color: var(--primary-color);
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
            font-weight: 500;
            text-decoration: none;
            transition: var(--transition);
            cursor: pointer;
            font-size: 1rem;
            display: inline-block;
        }

        .btn-primary {
            background: var(--gold-gradient);
            color: var(--dark-color);
            box-shadow: var(--shadow);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(212, 175, 55, 0.3);
        }

        .btn-secondary {
            background: transparent;
            color: var(--primary-color);
            border: 2px solid var(--primary-color);
        }

        .btn-secondary:hover {
            background: var(--primary-color);
            color: var(--dark-color);
            transform: translateY(-3px);
        }

        .hero-visual {
            position: absolute;
            right: 5%;
            top: 50%;
            transform: translateY(-50%);
            width: 40%;
        }

        .luxury-elements {
            position: relative;
            height: 300px;
        }

        .gold-accent {
            position: absolute;
            background: var(--gold-gradient);
            border-radius: 50%;
            animation: glow 4s ease-in-out infinite;
        }

        .gold-accent:nth-child(1) {
            width: 100px;
            height: 100px;
            top: 20px;
            right: 50px;
            animation-delay: 0s;
        }

        .gold-accent:nth-child(2) {
            width: 70px;
            height: 70px;
            bottom: 50px;
            right: 150px;
            animation-delay: 2s;
        }

        .crystal-element {
            position: absolute;
            width: 60px;
            height: 60px;
            top: 100px;
            right: 100px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 10px;
            transform: rotate(45deg);
            animation: float 6s ease-in-out infinite;
        }

        .marble-texture {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 200px;
            height: 200px;
            background: 
                linear-gradient(45deg, 
                    rgba(255, 255, 255, 0.02) 25%, 
                    transparent 25%, 
                    transparent 75%, 
                    rgba(255, 255, 255, 0.02) 75%),
                linear-gradient(45deg, 
                    rgba(255, 255, 255, 0.02) 25%, 
                    transparent 25%, 
                    transparent 75%, 
                    rgba(255, 255, 255, 0.02) 75%);
            background-size: 30px 30px;
            opacity: 0.3;
        }

        @keyframes glow {
            0%, 100% { opacity: 0.7; transform: scale(1); }
            50% { opacity: 1; transform: scale(1.1); }
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(45deg); }
            50% { transform: translateY(-20px) rotate(50deg); }
        }

        .gold-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                radial-gradient(circle at 20% 30%, rgba(212, 175, 55, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 70%, rgba(212, 175, 55, 0.1) 0%, transparent 50%);
            pointer-events: none;
        }

        /* Section Headers */
        .section-header {
            text-align: center;
            margin-bottom: 4rem;
        }

        .section-title {
            font-size: 3rem;
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }

        .section-subtitle {
            font-size: 1.2rem;
            color: rgba(255, 255, 255, 0.7);
            font-weight: 400;
        }

        /* Collection Section */
        .collection {
            padding: 6rem 0;
            background: var(--dark-color);
        }

        .collection-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2.5rem;
        }

        .collection-item {
            background: var(--light-color);
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: var(--transition);
            position: relative;
            border: 1px solid rgba(212, 175, 55, 0.1);
        }

        .collection-item:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(212, 175, 55, 0.2);
        }

        .luxury-badge {
            position: absolute;
            top: 15px;
            left: 15px;
            background: var(--gold-gradient);
            color: var(--dark-color);
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            z-index: 2;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .item-image-container {
            position: relative;
            overflow: hidden;
            height: 250px;
        }

        .luxury-frame {
            padding: 20px;
            background: rgba(0, 0, 0, 0.5);
        }

        .item-image {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: var(--transition);
            position: relative;
        }

        .gold-detail {
            width: 80%;
            height: 80%;
            background: 
                linear-gradient(45deg, 
                    transparent 40%, 
                    rgba(212, 175, 55, 0.3) 45%, 
                    rgba(212, 175, 55, 0.3) 55%, 
                    transparent 60%),
                linear-gradient(-45deg, 
                    transparent 40%, 
                    rgba(212, 175, 55, 0.3) 45%, 
                    rgba(212, 175, 55, 0.3) 55%, 
                    transparent 60%);
            background-size: 30px 30px;
        }

        .collection-item:hover .item-image {
            transform: scale(1.05);
        }

        .item-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.8);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: var(--transition);
        }

        .collection-item:hover .item-overlay {
            opacity: 1;
        }

        .preview-item {
            background: var(--gold-gradient);
            color: var(--dark-color);
            border: none;
            padding: 1rem 2rem;
            border-radius: var(--border-radius);
            cursor: pointer;
            font-weight: 600;
            transition: var(--transition);
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .preview-item:hover {
            transform: scale(1.05);
        }

        .item-info {
            padding: 2rem;
        }

        .item-title {
            font-size: 1.4rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: var(--primary-color);
        }

        .item-description {
            color: rgba(255, 255, 255, 0.7);
            margin-bottom: 1.5rem;
            font-size: 0.9rem;
        }

        .luxury-features {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            margin-bottom: 1.5rem;
        }

        .luxury-tag {
            background: rgba(212, 175, 55, 0.2);
            color: var(--primary-color);
            padding: 0.3rem 0.8rem;
            border-radius: 15px;
            font-size: 0.7rem;
            font-weight: 600;
            border: 1px solid rgba(212, 175, 55, 0.3);
        }

        .item-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .item-price {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary-color);
        }

        .acquire-item {
            background: var(--gold-gradient);
            color: var(--dark-color);
            border: none;
            padding: 0.8rem 1.5rem;
            border-radius: var(--border-radius);
            cursor: pointer;
            font-weight: 600;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 0.5rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .acquire-item:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(212, 175, 55, 0.3);
        }

        /* Craftsmanship Section */
        .craftsmanship {
            padding: 5rem 0;
            background: var(--light-color);
        }

        .craftsmanship-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
        }

        .craftsmanship-item {
            text-align: center;
            padding: 2.5rem 1.5rem;
            background: rgba(0, 0, 0, 0.5);
            border-radius: var(--border-radius);
            transition: var(--transition);
            box-shadow: var(--shadow);
            border: 1px solid rgba(212, 175, 55, 0.1);
        }

        .craftsmanship-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(212, 175, 55, 0.2);
        }

        .craft-icon {
            width: 80px;
            height: 80px;
            background: var(--gold-gradient);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            font-size: 2rem;
            color: var(--dark-color);
        }

        .craftsmanship-item h3 {
            font-size: 1.3rem;
            margin-bottom: 1rem;
            color: var(--primary-color);
        }

        .craftsmanship-item p {
            color: rgba(255, 255, 255, 0.8);
            line-height: 1.6;
        }

        /* Heritage Section */
        .heritage {
            padding: 6rem 0;
            background: var(--dark-color);
        }

        .heritage-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: center;
        }

        .heritage-content {
            padding-right: 2rem;
        }

        .heritage-description {
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 2rem;
            line-height: 1.8;
            font-size: 1.1rem;
        }

        .heritage-stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2rem;
            margin-top: 3rem;
        }

        .heritage-stat {
            text-align: center;
            padding: 1.5rem;
            background: var(--light-color);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            border: 1px solid rgba(212, 175, 55, 0.1);
        }

        .stat-number {
            display: block;
            font-size: 2rem;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 0.5rem;
        }

        .stat-label {
            font-size: 0.9rem;
            color: rgba(255, 255, 255, 0.7);
        }

        .heritage-visual {
            position: relative;
        }

        .luxury-showcase {
            padding: 30px;
            background: var(--light-color);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            border: 1px solid rgba(212, 175, 55, 0.1);
        }

        .showcase-item {
            width: 100%;
            height: 250px;
            background: var(--dark-color);
            border-radius: var(--border-radius);
            position: relative;
            overflow: hidden;
        }

        .gold-highlight {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 150px;
            height: 150px;
            background: var(--gold-gradient);
            border-radius: 50%;
            opacity: 0.3;
            animation: glow 4s ease-in-out infinite;
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
            background: rgba(0, 0, 0, 0.5);
            padding: 2.5rem;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            transition: var(--transition);
            border: 1px solid rgba(212, 175, 55, 0.1);
        }

        .testimonial-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(212, 175, 55, 0.2);
        }

        .testimonial-content {
            color: rgba(255, 255, 255, 0.8);
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
            color: var(--primary-color);
            margin-bottom: 0.5rem;
        }

        .testimonial-author p {
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.9rem;
        }

        /* FAQ Section */
        .faq {
            padding: 6rem 0;
            background: var(--dark-color);
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
            border: 1px solid rgba(212, 175, 55, 0.1);
        }

        .faq-item:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(212, 175, 55, 0.2);
        }

        .faq-question {
            padding: 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
            font-weight: 600;
            color: var(--primary-color);
            background: var(--light-color);
        }

        .faq-answer {
            padding: 0 1.5rem 1.5rem;
            display: none;
            color: rgba(255, 255, 255, 0.8);
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
            background: var(--gold-gradient);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1.5rem;
            color: var(--dark-color);
            font-size: 1.2rem;
        }

        .contact-details h4 {
            color: var(--primary-color);
            margin-bottom: 0.5rem;
        }

        .contact-details p {
            color: rgba(255, 255, 255, 0.8);
        }

        .contact-form {
            background: rgba(0, 0, 0, 0.5);
            padding: 2.5rem;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            border: 1px solid rgba(212, 175, 55, 0.1);
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 1rem;
            border: 1px solid rgba(212, 175, 55, 0.2);
            border-radius: var(--border-radius);
            background: var(--dark-color);
            color: var(--text-color);
            font-family: inherit;
            transition: var(--transition);
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.2);
        }

        .form-group textarea {
            min-height: 150px;
            resize: vertical;
        }

        .submit-btn {
            background: var(--gold-gradient);
            color: var(--dark-color);
            border: none;
            padding: 1.2rem 2.5rem;
            border-radius: var(--border-radius);
            cursor: pointer;
            font-weight: 600;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(212, 175, 55, 0.3);
        }

        /* Newsletter Section */
        .newsletter {
            background: var(--gold-gradient);
            color: var(--dark-color);
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
            font-weight: 600;
        }

        .newsletter p {
            margin-bottom: 2.5rem;
            font-size: 1.1rem;
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
            background: var(--dark-color);
            color: var(--text-color);
        }

        .newsletter-input-group button {
            padding: 1rem 1.5rem;
            background: var(--dark-color);
            color: var(--primary-color);
            border: none;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-weight: 600;
        }

        .newsletter-input-group button:hover {
            background: var(--primary-color);
            color: var(--dark-color);
        }

        /* Footer */
        .footer {
            background: var(--dark-color);
            color: rgba(255, 255, 255, 0.7);
            padding: 4rem 0 2rem;
            border-top: 1px solid rgba(212, 175, 55, 0.1);
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
            color: var(--primary-color);
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
            border-top: 1px solid rgba(212, 175, 55, 0.1);
            color: rgba(255, 255, 255, 0.5);
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .heritage-grid,
            .contact-grid {
                grid-template-columns: 1fr;
                gap: 3rem;
            }
            
            .heritage-content {
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
            .luxury-hero {
                padding: 8rem 0 4rem;
            }
            
            .luxury-hero h1 {
                font-size: 3rem;
            }
            
            .hero-actions {
                flex-direction: column;
                align-items: center;
            }
            
            .collection-grid {
                grid-template-columns: 1fr;
            }
            
            .heritage-stats {
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
            .luxury-hero h1 {
                font-size: 2.5rem;
            }
            
            .section-title {
                font-size: 2rem;
            }
            
            .item-footer {
                flex-direction: column;
                gap: 1rem;
                align-items: flex-start;
            }
            
            .acquire-item {
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

    // Gold element animations
    const goldElements = document.querySelectorAll('.collection-item, .craftsmanship-item');
    
    goldElements.forEach((element, index) => {
        element.style.opacity = '0';
        element.style.transform = 'translateY(20px)';
        element.style.transition = 'all 0.6s ease';
        
        setTimeout(() => {
            element.style.opacity = '1';
            element.style.transform = 'translateY(0)';
        }, 100 + (index * 100));
    });

    // Add gold shimmer effect on hover
    const luxuryItems = document.querySelectorAll('.collection-item, .craftsmanship-item');
    
    luxuryItems.forEach(item => {
        item.addEventListener('mouseenter', () => {
            item.style.boxShadow = '0 15px 30px rgba(212, 175, 55, 0.3)';
        });
        
        item.addEventListener('mouseleave', () => {
            item.style.boxShadow = 'var(--shadow)';
        });
    });
});
</script>