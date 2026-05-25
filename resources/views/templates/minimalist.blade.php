@extends('templates.layout')

@section('content')
    <!-- Hero Section -->
    <section class="minimalist-hero">
        <div class="container">
            <div class="hero-content">
                <h1>{{ $business->name }}</h1>
                <p class="hero-subtitle">Essence of {{ $business->industry }}</p>
                <p class="hero-description">Pure, refined {{ $business->products }} for {{ $business->target }} who appreciate simplicity</p>
                <div class="hero-actions">
                    <a href="#products" class="btn btn-primary">Discover</a>
                    <a href="#about" class="btn btn-secondary">Philosophy</a>
                </div>
            </div>
            <div class="hero-visual">
                <div class="minimalist-elements">
                    <div class="geometric-shape shape-1"></div>
                    <div class="geometric-shape shape-2"></div>
                    <div class="geometric-shape shape-3"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Products Section -->
    <section id="products" class="products">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Essentials Collection</h2>
                <p class="section-subtitle">Curated pieces with purposeful design</p>
            </div>
            <div class="products-grid">
                @php
                    $products = explode(',', $business->products);
                    $allProducts = $products;
                    if (count($products) < 6) {
                        $variations = ['Essential', 'Pure', 'Refined', 'Simple', 'Minimal', 'Basic'];
                        $minimalColors = ['FFFFFF', 'FAFAFA', 'F5F5F5', 'EEEEEE', 'E0E0E0', 'D4D4D4'];
                        for ($i = count($products); $i < 6; $i++) {
                            $allProducts[] = $variations[$i] . ' ' . $products[0];
                        }
                    }
                @endphp
                
                @foreach(array_slice($allProducts, 0, 6) as $index => $product)
                @php
                    $minimalColors = ['FFFFFF', 'FAFAFA', 'F5F5F5', 'EEEEEE', 'E0E0E0', 'D4D4D4'];
                    $textColors = ['333333', '333333', '333333', '333333', '333333', '333333'];
                    $colorIndex = $index % count($minimalColors);
                    $productColor = $minimalColors[$colorIndex];
                    $textColor = $textColors[$colorIndex];
                @endphp
                <div class="product-card" data-color="{{ $productColor }}">
                    <div class="minimalist-badge">Essential</div>
                    <div class="product-image-container">
                        <div class="minimal-frame">
                            <div class="product-image-placeholder" style="background-color: #{{ $productColor }}; border: 1px solid #{{ $textColor }}20;">
                                <div class="minimal-pattern"></div>
                            </div>
                        </div>
                        <div class="product-overlay">
                            <button class="quick-view">View</button>
                        </div>
                    </div>
                    <div class="product-info">
                        <h3 class="product-title">{{ trim($product) }}</h3>
                        <p class="product-description">Minimal {{ $business->industry }} piece</p>
                        <div class="product-footer">
                            <p class="product-price">${{ rand(45, 195) }}.00</p>
                            <button class="add-to-cart" 
                                    data-product="{{ trim($product) }}" 
                                    data-price="{{ rand(45, 195) }}">
                                <i class="fas fa-plus"></i>
                                Add
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Philosophy Section -->
    <section class="philosophy">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Design Philosophy</h2>
                <p class="section-subtitle">Less, but better</p>
            </div>
            <div class="philosophy-grid">
                <div class="philosophy-item">
                    <div class="philosophy-icon">
                        <i class="fas fa-minus"></i>
                    </div>
                    <h3>Subtraction</h3>
                    <p>Removing the unnecessary to highlight the essential</p>
                </div>
                <div class="philosophy-item">
                    <div class="philosophy-icon">
                        <i class="fas fa-bullseye"></i>
                    </div>
                    <h3>Purpose</h3>
                    <p>Every element serves a clear, defined function</p>
                </div>
                <div class="philosophy-item">
                    <div class="philosophy-icon">
                        <i class="fas fa-infinity"></i>
                    </div>
                    <h3>Timelessness</h3>
                    <p>Designs that transcend trends and temporary styles</p>
                </div>
                <div class="philosophy-item">
                    <div class="philosophy-icon">
                        <i class="fas fa-hand-paper"></i>
                    </div>
                    <h3>Craftsmanship</h3>
                    <p>Attention to detail in every aspect of creation</p>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="about">
        <div class="container">
            <div class="about-grid">
                <div class="about-content">
                    <h2 class="section-title">Quiet Excellence</h2>
                    <p class="about-description">
                        {{ $business->name }} embraces the philosophy that true luxury lies in simplicity. 
                        We create {{ $business->products }} that speak through their absence of noise, 
                        their purity of form, and their dedication to function.
                    </p>
                    <p class="about-description">
                        Each piece is a study in reduction—stripping away the non-essential to reveal 
                        the core beauty of thoughtful design and impeccable craftsmanship.
                    </p>
                    <div class="minimal-stats">
                        <div class="minimal-stat">
                            <span class="stat-number">01</span>
                            <span class="stat-label">Design Principle</span>
                        </div>
                        <div class="minimal-stat">
                            <span class="stat-number">100%</span>
                            <span class="stat-label">Essential</span>
                        </div>
                        <div class="minimal-stat">
                            <span class="stat-number">0%</span>
                            <span class="stat-label">Excess</span>
                        </div>
                    </div>
                </div>
                <div class="about-visual">
                    <div class="minimal-frame">
                        <div class="negative-space"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Quiet Appreciation</h2>
                <p class="section-subtitle">What discerning clients value</p>
            </div>
            <div class="testimonials-grid">
                <div class="testimonial-item">
                    <div class="testimonial-content">
                        <p>"The {{ $business->products }} from {{ $business->name }} possess a quiet confidence that transforms spaces. Their minimal aesthetic brings calm and clarity to everyday life."</p>
                    </div>
                    <div class="testimonial-author">
                        <h4>Emma Sato</h4>
                        <p>Interior Architect</p>
                    </div>
                </div>
                <div class="testimonial-item">
                    <div class="testimonial-content">
                        <p>"In a world of noise, {{ $business->name }} offers silence. Their designs don't shout for attention—they earn it through impeccable form and function."</p>
                    </div>
                    <div class="testimonial-author">
                        <h4>Thomas Wright</h4>
                        <p>Design Editor</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section id="faq" class="faq">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Essential Questions</h2>
                <p class="section-subtitle">Clarity through simplicity</p>
            </div>
            
            <div class="faq-grid">
                <div class="faq-item">
                    <div class="faq-question">
                        <span>What defines minimalist design?</span>
                        <i class="fas fa-plus"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Minimalism is the pursuit of essence through reduction. It's not about having less, but about having exactly what is necessary—nothing more, nothing less. Each element serves a purpose, and every detail is intentional.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">
                        <span>How do you ensure quality in simplicity?</span>
                        <i class="fas fa-plus"></i>
                    </div>
                    <div class="faq-answer">
                        <p>When there are fewer elements, each one must be perfect. We focus on exceptional materials, precise craftsmanship, and thoughtful details that might go unnoticed but are essential to the overall experience.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">
                        <span>Are minimalist designs practical for everyday use?</span>
                        <i class="fas fa-plus"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Absolutely. Minimalism enhances functionality by removing distractions and focusing on what truly matters. Our designs are not only beautiful but also highly practical and durable for daily life.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">
                        <span>How should I care for minimalist products?</span>
                        <i class="fas fa-plus"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Care is simple and straightforward. Use gentle cleaning methods appropriate for the materials. The simplicity of design often means easier maintenance and longer-lasting beauty.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="contact">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Quiet Conversation</h2>
                <p class="section-subtitle">We listen more than we speak</p>
            </div>
            
            <div class="contact-grid">
                <div class="contact-info">
                    <div class="contact-info-item">
                        <div class="contact-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="contact-details">
                            <h4>Email</h4>
                            <p>{{ $business->email }}</p>
                        </div>
                    </div>
                    <div class="contact-info-item">
                        <div class="contact-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div class="contact-details">
                            <h4>Phone</h4>
                            <p>(555) 123-ESSENCE</p>
                        </div>
                    </div>
                    <div class="contact-info-item">
                        <div class="contact-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="contact-details">
                            <h4>Studio</h4>
                            <p>123 Minimal Avenue<br>Design District, NY 10001</p>
                        </div>
                    </div>
                    <div class="contact-info-item">
                        <div class="contact-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="contact-details">
                            <h4>Hours</h4>
                            <p>Tuesday - Saturday: 11AM-6PM<br>By appointment only</p>
                        </div>
                    </div>
                </div>
                
                <div class="contact-form-container">
                    <form id="contactForm" class="contact-form">
                        <div class="form-row">
                            <div class="form-group">
                                <input type="text" placeholder="Name" required>
                            </div>
                            <div class="form-group">
                                <input type="email" placeholder="Email" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" placeholder="Subject" required>
                        </div>
                        <div class="form-group">
                            <textarea placeholder="Message" rows="5" required></textarea>
                        </div>
                        <button type="submit" class="submit-btn">
                            <i class="fas fa-paper-plane"></i>
                            Send
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
                <h2>Essence Newsletter</h2>
                <p>Receive quiet updates on new pieces and design philosophy</p>
                <form class="newsletter-form" id="newsletterForm">
                    <div class="newsletter-input-group">
                        <input type="email" placeholder="Email address" required>
                        <button type="submit">
                            <i class="fas fa-arrow-right"></i>
                            Subscribe
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@php
    // Minimalist color scheme
    $primaryColor = $business->color ?: '333333'; // Almost black
    $secondaryColor = '666666'; // Medium gray
    $accentColor = '999999'; // Light gray
    $textColor = '333333'; // Dark gray
    $lightColor = 'FFFFFF'; // White
    $darkColor = '000000'; // Black
    
    $templateStyles = '
        :root {
            --primary-color: #' . $primaryColor . ';
            --secondary-color: #' . $secondaryColor . ';
            --accent-color: #' . $accentColor . ';
            --text-color: #' . $textColor . ';
            --light-color: #' . $lightColor . ';
            --dark-color: #' . $darkColor . ';
            --border-radius: 4px;
            --shadow: 0 2px 10px rgba(0,0,0,0.05);
            --transition: all 0.3s ease;
            --minimal-gradient: linear-gradient(135deg, #FFFFFF 0%, #FAFAFA 100%);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Inter", "Helvetica Neue", sans-serif;
            line-height: 1.6;
            color: var(--text-color);
            background: var(--light-color);
            overflow-x: hidden;
            -webkit-font-smoothing: antialiased;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Navigation */
        .navbar {
            background: rgba(255, 255, 255, 0.98);
            padding: 1.5rem 0;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            transition: var(--transition);
            border-bottom: 1px solid rgba(0,0,0,0.05);
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
            font-size: 1.8rem;
            font-weight: 300;
            color: var(--text-color);
            letter-spacing: -0.5px;
        }

        .nav-menu {
            display: flex;
            list-style: none;
            gap: 2rem;
        }

        .nav-link {
            text-decoration: none;
            color: var(--text-color);
            font-weight: 400;
            font-size: 1rem;
            transition: var(--transition);
            position: relative;
        }

        .nav-link:after {
            content: \'\';
            position: absolute;
            width: 0;
            height: 1px;
            bottom: -5px;
            left: 0;
            background: var(--text-color);
            transition: var(--transition);
        }

        .nav-link:hover:after {
            width: 100%;
        }

        .cart-icon {
            position: relative;
            cursor: pointer;
            font-size: 1.2rem;
            color: var(--text-color);
            transition: var(--transition);
        }

        .cart-count {
            position: absolute;
            top: -8px;
            right: -8px;
            background: var(--text-color);
            color: var(--light-color);
            border-radius: 50%;
            width: 18px;
            height: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.6rem;
            font-weight: 400;
        }

        /* Hero Section */
        .minimalist-hero {
            background: var(--light-color);
            color: var(--text-color);
            padding: 12rem 0 8rem;
            position: relative;
        }

        .hero-content {
            position: relative;
            z-index: 2;
            max-width: 600px;
            text-align: center;
            margin: 0 auto;
        }

        .minimalist-hero h1 {
            font-size: 3rem;
            font-weight: 300;
            margin-bottom: 1rem;
            line-height: 1.2;
            letter-spacing: -1px;
        }

        .hero-subtitle {
            font-size: 1.2rem;
            margin-bottom: 1rem;
            font-weight: 400;
            color: var(--secondary-color);
        }

        .hero-description {
            font-size: 1rem;
            margin-bottom: 3rem;
            color: var(--secondary-color);
            line-height: 1.6;
        }

        .hero-actions {
            display: flex;
            gap: 1rem;
            justify-content: center;
        }

        .btn {
            padding: 1rem 2rem;
            border: none;
            border-radius: var(--border-radius);
            font-weight: 400;
            text-decoration: none;
            transition: var(--transition);
            cursor: pointer;
            font-size: 0.9rem;
            display: inline-block;
            letter-spacing: 0.5px;
        }

        .btn-primary {
            background: var(--text-color);
            color: var(--light-color);
            border: 1px solid var(--text-color);
        }

        .btn-primary:hover {
            background: transparent;
            color: var(--text-color);
        }

        .btn-secondary {
            background: transparent;
            color: var(--text-color);
            border: 1px solid var(--text-color);
        }

        .btn-secondary:hover {
            background: var(--text-color);
            color: var(--light-color);
        }

        .hero-visual {
            position: absolute;
            right: 10%;
            top: 50%;
            transform: translateY(-50%);
            width: 35%;
            opacity: 0.8;
        }

        .minimalist-elements {
            position: relative;
            height: 200px;
        }

        .geometric-shape {
            position: absolute;
            background: var(--text-color);
            opacity: 0.1;
        }

        .shape-1 {
            width: 80px;
            height: 80px;
            top: 20px;
            right: 50px;
            border-radius: 2px;
        }

        .shape-2 {
            width: 40px;
            height: 40px;
            bottom: 30px;
            right: 100px;
            border-radius: 50%;
        }

        .shape-3 {
            width: 60px;
            height: 2px;
            bottom: 60px;
            right: 30px;
        }

        /* Section Headers */
        .section-header {
            text-align: center;
            margin-bottom: 4rem;
        }

        .section-title {
            font-size: 2.2rem;
            font-weight: 300;
            color: var(--text-color);
            margin-bottom: 0.5rem;
            letter-spacing: -0.5px;
        }

        .section-subtitle {
            font-size: 1rem;
            color: var(--secondary-color);
            font-weight: 400;
        }

        /* Products Section */
        .products {
            padding: 6rem 0;
            background: var(--light-color);
        }

        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }

        .product-card {
            background: var(--light-color);
            border-radius: var(--border-radius);
            overflow: hidden;
            transition: var(--transition);
            position: relative;
            border: 1px solid rgba(0,0,0,0.05);
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow);
        }

        .minimalist-badge {
            position: absolute;
            top: 15px;
            left: 15px;
            background: var(--light-color);
            color: var(--text-color);
            padding: 0.3rem 0.8rem;
            border-radius: 2px;
            font-size: 0.7rem;
            font-weight: 400;
            z-index: 2;
            border: 1px solid rgba(0,0,0,0.1);
        }

        .product-image-container {
            position: relative;
            overflow: hidden;
            height: 250px;
        }

        .minimal-frame {
            padding: 20px;
        }

        .product-image-placeholder {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: var(--transition);
        }

        .minimal-pattern {
            width: 80%;
            height: 80%;
            background: 
                linear-gradient(90deg, transparent 24px, rgba(0,0,0,0.02) 25px, transparent 26px),
                linear-gradient(180deg, transparent 24px, rgba(0,0,0,0.02) 25px, transparent 26px);
            background-size: 30px 30px;
        }

        .product-card:hover .product-image-placeholder {
            transform: scale(1.02);
        }

        .product-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(255, 255, 255, 0.9);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: var(--transition);
        }

        .product-card:hover .product-overlay {
            opacity: 1;
        }

        .quick-view {
            background: var(--text-color);
            color: var(--light-color);
            border: none;
            padding: 0.8rem 1.5rem;
            border-radius: var(--border-radius);
            cursor: pointer;
            font-weight: 400;
            transition: var(--transition);
            font-size: 0.8rem;
        }

        .quick-view:hover {
            background: transparent;
            color: var(--text-color);
            border: 1px solid var(--text-color);
        }

        .product-info {
            padding: 1.5rem;
        }

        .product-title {
            font-size: 1.1rem;
            font-weight: 400;
            margin-bottom: 0.5rem;
            color: var(--text-color);
        }

        .product-description {
            color: var(--secondary-color);
            margin-bottom: 1.5rem;
            font-size: 0.8rem;
            line-height: 1.5;
        }

        .product-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .product-price {
            font-size: 1.2rem;
            font-weight: 400;
            color: var(--text-color);
        }

        .add-to-cart {
            background: transparent;
            color: var(--text-color);
            border: 1px solid var(--text-color);
            padding: 0.5rem 1rem;
            border-radius: var(--border-radius);
            cursor: pointer;
            font-weight: 400;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 0.3rem;
            font-size: 0.8rem;
        }

        .add-to-cart:hover {
            background: var(--text-color);
            color: var(--light-color);
        }

        /* Philosophy Section */
        .philosophy {
            padding: 5rem 0;
            background: #FAFAFA;
        }

        .philosophy-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
        }

        .philosophy-item {
            text-align: center;
            padding: 2rem 1.5rem;
            background: var(--light-color);
            border-radius: var(--border-radius);
            transition: var(--transition);
            border: 1px solid rgba(0,0,0,0.05);
        }

        .philosophy-item:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow);
        }

        .philosophy-icon {
            width: 60px;
            height: 60px;
            background: transparent;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            font-size: 1.5rem;
            color: var(--text-color);
            border: 1px solid rgba(0,0,0,0.1);
        }

        .philosophy-item h3 {
            font-size: 1.1rem;
            margin-bottom: 1rem;
            color: var(--text-color);
            font-weight: 400;
        }

        .philosophy-item p {
            color: var(--secondary-color);
            line-height: 1.6;
            font-size: 0.9rem;
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
            color: var(--secondary-color);
            margin-bottom: 2rem;
            line-height: 1.8;
            font-size: 1rem;
        }

        .minimal-stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1.5rem;
            margin-top: 3rem;
        }

        .minimal-stat {
            text-align: center;
            padding: 1.5rem;
            background: #FAFAFA;
            border-radius: var(--border-radius);
            border: 1px solid rgba(0,0,0,0.05);
        }

        .stat-number {
            display: block;
            font-size: 1.5rem;
            font-weight: 300;
            color: var(--text-color);
            margin-bottom: 0.5rem;
        }

        .stat-label {
            font-size: 0.8rem;
            color: var(--secondary-color);
        }

        .about-visual {
            position: relative;
        }

        .minimal-frame {
            padding: 30px;
            background: var(--light-color);
            border-radius: var(--border-radius);
            border: 1px solid rgba(0,0,0,0.05);
        }

        .negative-space {
            width: 100%;
            height: 300px;
            background: #FAFAFA;
            border: 1px solid rgba(0,0,0,0.05);
        }

        /* Testimonials Section */
        .testimonials {
            padding: 5rem 0;
            background: #FAFAFA;
        }

        .testimonials-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
            gap: 2rem;
        }

        .testimonial-item {
            background: var(--light-color);
            padding: 2rem;
            border-radius: var(--border-radius);
            transition: var(--transition);
            border: 1px solid rgba(0,0,0,0.05);
        }

        .testimonial-item:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow);
        }

        .testimonial-content {
            color: var(--secondary-color);
            margin-bottom: 2rem;
            line-height: 1.8;
            font-size: 1rem;
            position: relative;
        }

        .testimonial-content:before {
            content: \'"\';
            font-size: 3rem;
            color: var(--text-color);
            opacity: 0.1;
            position: absolute;
            top: -15px;
            left: -5px;
        }

        .testimonial-author h4 {
            color: var(--text-color);
            margin-bottom: 0.3rem;
            font-weight: 400;
        }

        .testimonial-author p {
            color: var(--secondary-color);
            font-size: 0.8rem;
        }

        /* FAQ Section */
        .faq {
            padding: 6rem 0;
            background: var(--light-color);
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
            transition: var(--transition);
            border: 1px solid rgba(0,0,0,0.05);
        }

        .faq-item:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow);
        }

        .faq-question {
            padding: 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
            font-weight: 400;
            color: var(--text-color);
            background: var(--light-color);
        }

        .faq-answer {
            padding: 0 1.5rem 1.5rem;
            display: none;
            color: var(--secondary-color);
            line-height: 1.6;
            font-size: 0.9rem;
        }

        .faq-active .faq-answer {
            display: block;
        }

        /* Contact Section */
        .contact {
            padding: 6rem 0;
            background: #FAFAFA;
        }

        .contact-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
        }

        .contact-info-item {
            display: flex;
            align-items: center;
            margin-bottom: 2rem;
        }

        .contact-icon {
            width: 50px;
            height: 50px;
            background: transparent;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1.5rem;
            color: var(--text-color);
            font-size: 1.1rem;
            border: 1px solid rgba(0,0,0,0.1);
        }

        .contact-details h4 {
            color: var(--text-color);
            margin-bottom: 0.5rem;
            font-weight: 400;
        }

        .contact-details p {
            color: var(--secondary-color);
            font-size: 0.9rem;
        }

        .contact-form {
            background: var(--light-color);
            padding: 2rem;
            border-radius: var(--border-radius);
            border: 1px solid rgba(0,0,0,0.05);
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
        .form-group textarea {
            width: 100%;
            padding: 1rem;
            border: 1px solid rgba(0,0,0,0.1);
            border-radius: var(--border-radius);
            background: var(--light-color);
            color: var(--text-color);
            font-family: inherit;
            transition: var(--transition);
            font-size: 0.9rem;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: var(--text-color);
        }

        .form-group textarea {
            min-height: 150px;
            resize: vertical;
        }

        .submit-btn {
            background: var(--text-color);
            color: var(--light-color);
            border: none;
            padding: 1rem 2rem;
            border-radius: var(--border-radius);
            cursor: pointer;
            font-weight: 400;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.9rem;
        }

        .submit-btn:hover {
            background: transparent;
            color: var(--text-color);
            border: 1px solid var(--text-color);
        }

        /* Newsletter Section */
        .newsletter {
            background: var(--light-color);
            padding: 5rem 0;
            text-align: center;
            border-top: 1px solid rgba(0,0,0,0.05);
        }

        .newsletter-content {
            max-width: 500px;
            margin: 0 auto;
        }

        .newsletter h2 {
            font-size: 1.8rem;
            margin-bottom: 1rem;
            font-weight: 300;
            color: var(--text-color);
        }

        .newsletter p {
            margin-bottom: 2rem;
            font-size: 1rem;
            color: var(--secondary-color);
        }

        .newsletter-input-group {
            display: flex;
            max-width: 400px;
            margin: 0 auto;
            border-radius: var(--border-radius);
            overflow: hidden;
            border: 1px solid rgba(0,0,0,0.1);
        }

        .newsletter-input-group input {
            flex: 1;
            padding: 1rem;
            border: none;
            background: var(--light-color);
            color: var(--text-color);
            font-size: 0.9rem;
        }

        .newsletter-input-group button {
            padding: 1rem 1.5rem;
            background: var(--text-color);
            color: var(--light-color);
            border: none;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .newsletter-input-group button:hover {
            background: transparent;
            color: var(--text-color);
        }

        /* Footer */
        .footer {
            background: var(--light-color);
            color: var(--secondary-color);
            padding: 3rem 0 2rem;
            border-top: 1px solid rgba(0,0,0,0.05);
        }

        .footer-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .footer-section h3 {
            color: var(--text-color);
            margin-bottom: 1.5rem;
            font-size: 1.1rem;
            font-weight: 400;
        }

        .footer-section p,
        .footer-section a {
            color: var(--secondary-color);
            margin-bottom: 0.8rem;
            display: block;
            text-decoration: none;
            transition: var(--transition);
            font-size: 0.9rem;
        }

        .footer-section a:hover {
            color: var(--text-color);
        }

        .footer-bottom {
            text-align: center;
            padding-top: 2rem;
            border-top: 1px solid rgba(0,0,0,0.05);
            color: var(--secondary-color);
            font-size: 0.8rem;
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .about-grid,
            .contact-grid {
                grid-template-columns: 1fr;
                gap: 3rem;
            }
            
            .about-content {
                padding-right: 0;
            }
            
            .hero-visual {
                display: none;
            }
        }

        @media (max-width: 768px) {
            .minimalist-hero {
                padding: 8rem 0 4rem;
            }
            
            .minimalist-hero h1 {
                font-size: 2.2rem;
            }
            
            .hero-actions {
                flex-direction: column;
                align-items: center;
            }
            
            .products-grid {
                grid-template-columns: 1fr;
            }
            
            .minimal-stats {
                grid-template-columns: 1fr;
                gap: 1rem;
            }
            
            .form-row {
                grid-template-columns: 1fr;
            }
            
            .testimonials-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 480px) {
            .minimalist-hero h1 {
                font-size: 2rem;
            }
            
            .section-title {
                font-size: 1.8rem;
            }
            
            .product-footer {
                flex-direction: column;
                gap: 1rem;
                align-items: flex-start;
            }
            
            .add-to-cart {
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
            const icon = question.querySelector('i');
            
            item.classList.toggle('faq-active');
            
            if (item.classList.contains('faq-active')) {
                icon.className = 'fas fa-minus';
            } else {
                icon.className = 'fas fa-plus';
            }
        });
    });

    // Smooth scrolling for navigation
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
});
</script>