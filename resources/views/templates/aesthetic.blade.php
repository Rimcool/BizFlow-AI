@extends('templates.layout')

@section('content')
    <!-- Hero Section -->
    <section id="home" class="hero">
        <div class="hero-container">
            <div class="hero-content">
                <h1>Welcome to <span class="brand-name">{{ $business->name }}</span></h1>
                <p class="hero-subtitle">Discover beautiful {{ $business->products }} crafted for {{ $business->target }}</p>
                <div class="hero-actions">
                    <a href="#products" class="btn btn-primary">Explore Collection</a>
                    <a href="#about" class="btn btn-secondary">Our Story</a>
                </div>
            </div>
            <div class="hero-visual">
                <div class="floating-elements">
                    <div class="shape shape-1"></div>
                    <div class="shape shape-2"></div>
                    <div class="shape shape-3"></div>
                    <div class="shape shape-4"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Products Section -->
    <section id="products" class="products">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Beautiful Collection</h2>
                <p class="section-subtitle">Curated {{ $business->products }} for the aesthetic enthusiast</p>
            </div>
            <div class="products-grid">
                @php
                    $products = explode(',', $business->products);
                    $allProducts = $products;
                    if (count($products) < 6) {
                        $variations = ['Ethereal', 'Dreamy', 'Serene', 'Harmony', 'Bliss', 'Tranquil'];
                        $pastelColors = ['FFD6E7', 'D4F1F9', 'E2F0CB', 'FFE5D9', 'E6E6FA', 'F0F8FF'];
                        for ($i = count($products); $i < 6; $i++) {
                            $allProducts[] = $variations[$i] . ' ' . $products[0];
                        }
                    }
                @endphp
                
                @foreach(array_slice($allProducts, 0, 6) as $index => $product)
                @php
                    $pastelColors = ['FFD6E7', 'D4F1F9', 'E2F0CB', 'FFE5D9', 'E6E6FA', 'F0F8FF'];
                    $textColors = ['8A5C7D', '5C8A94', '7D8A5C', '8A735C', '5C5C8A', '5C7D8A'];
                    $colorIndex = $index % count($pastelColors);
                    $productColor = $pastelColors[$colorIndex];
                    $textColor = $textColors[$colorIndex];
                @endphp
                <div class="product-card" data-color="{{ $productColor }}">
                    <div class="product-image-container">
                        <img src="https://via.placeholder.com/400x300/{{ $productColor }}/{{ $textColor }}?text={{ urlencode(trim($product)) }}" alt="{{ trim($product) }}" class="product-image">
                        <div class="product-overlay">
                            <button class="quick-view">Quick View</button>
                        </div>
                    </div>
                    <div class="product-info">
                        <h3 class="product-title">{{ trim($product) }}</h3>
                        <p class="product-description">Beautifully crafted {{ $business->industry }} product</p>
                        <div class="product-footer">
                            <p class="product-price">${{ rand(25, 120) }}.00</p>
                            <button class="add-to-cart" 
                                    data-product="{{ trim($product) }}" 
                                    data-price="{{ rand(25, 120) }}"
                                    data-image="https://via.placeholder.com/400x300/{{ $productColor }}/{{ $textColor }}?text={{ urlencode(trim($product)) }}">
                                <i class="fas fa-heart"></i>
                                Add to Cart
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features">
        <div class="container">
            <div class="features-grid">
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-paint-brush"></i>
                    </div>
                    <h3>Beautiful Design</h3>
                    <p>Carefully curated aesthetics and thoughtful design</p>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-leaf"></i>
                    </div>
                    <h3>Eco-Friendly</h3>
                    <p>Sustainable materials and ethical production</p>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-gift"></i>
                    </div>
                    <h3>Thoughtful Packaging</h3>
                    <p>Beautiful packaging that makes unboxing special</p>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-star"></i>
                    </div>
                    <h3>Premium Quality</h3>
                    <p>Exceptional craftsmanship and attention to detail</p>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="about">
        <div class="container">
            <div class="about-grid">
                <div class="about-content">
                    <h2 class="section-title">Our Aesthetic Journey</h2>
                    <p class="about-description">
                        {{ $business->name }} was born from a passion for beauty and meaningful design. 
                        We create {{ $business->products }} that inspire and delight {{ $business->target }} 
                        who appreciate the art of everyday living.
                    </p>
                    <p class="about-description">
                        Our philosophy is simple: beauty matters. We believe that well-designed 
                        {{ $business->products }} can transform ordinary moments into extraordinary experiences.
                    </p>
                    <div class="aesthetic-stats">
                        <div class="stat">
                            <span class="stat-number">100%</span>
                            <span class="stat-label">Handcrafted</span>
                        </div>
                        <div class="stat">
                            <span class="stat-number">Eco</span>
                            <span class="stat-label">Friendly</span>
                        </div>
                        <div class="stat">
                            <span class="stat-number">❤️</span>
                            <span class="stat-label">Made with Love</span>
                        </div>
                    </div>
                </div>
                <div class="about-visual">
                    <div class="aesthetic-frame">
                        <img src="https://via.placeholder.com/500x400/FFD6E7/8A5C7D?text=Beautiful+Design" alt="{{ $business->name }}" class="about-image">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section id="faq" class="faq">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Common Questions</h2>
                <p class="section-subtitle">Everything you need to know about our beautiful products</p>
            </div>
            
            <div class="faq-grid">
                <div class="faq-item">
                    <div class="faq-question">
                        <span>What makes your products aesthetic?</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Our {{ $business->products }} are designed with careful attention to color, form, and texture. We focus on creating pieces that are not only functional but also visually pleasing and meaningful.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">
                        <span>Are your products sustainable?</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Yes! We prioritize eco-friendly materials and ethical production practices. We believe beautiful design should also be responsible design.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">
                        <span>Do you offer custom orders?</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Absolutely! We love creating custom pieces. Contact us to discuss your vision and we'll bring it to life with our signature aesthetic touch.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">
                        <span>How do I care for my products?</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Each product comes with specific care instructions to help maintain its beauty. We use quality materials that are designed to last when properly cared for.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Lovely Reviews</h2>
                <p class="section-subtitle">What our beautiful community is saying</p>
            </div>
            <div class="testimonials-grid">
                <div class="testimonial-item">
                    <div class="testimonial-content">
                        <p>"These {{ $business->products }} are absolutely stunning! The attention to detail and beautiful design make every use feel special."</p>
                    </div>
                    <div class="testimonial-author">
                        <h4>Isabella Rose</h4>
                        <p>Art Director</p>
                    </div>
                </div>
                <div class="testimonial-item">
                    <div class="testimonial-content">
                        <p>"I'm constantly amazed by the beauty and quality of {{ $business->name }} products. They've transformed my space into a sanctuary!"</p>
                    </div>
                    <div class="testimonial-author">
                        <h4>Oliver Moon</h4>
                        <p>Interior Designer</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="contact">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Get in Touch</h2>
                <p class="section-subtitle">We'd love to hear from you</p>
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
                            <p>(555) 123-BEAUTY</p>
                        </div>
                    </div>
                    <div class="contact-info-item">
                        <div class="contact-icon">
                            <i class="fas fa-heart"></i>
                        </div>
                        <div class="contact-details">
                            <h4>Social Love</h4>
                            <p>@{{ str_replace(' ', '', strtolower($business->name)) }}</p>
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
                            <textarea placeholder="Your Beautiful Message" rows="5" required></textarea>
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
                <h2>Join Our Beauty List</h2>
                <p>Receive inspiration, new arrivals, and special offers</p>
                <form class="newsletter-form" id="newsletterForm">
                    <div class="newsletter-input-group">
                        <input type="email" placeholder="Enter your email address" required>
                        <button type="submit">
                            <i class="fas fa-feather"></i>
                            Subscribe
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@php
    $primaryColor = $business->color ?: '#FFD6E7';
    $secondaryColor = '#D4F1F9';
    $accentColor = '#E2F0CB';
    $textColor = '#5C5C5C';
    $lightColor = '#FAFAFA';
    $darkColor = '#8A5C7D';
    
    $templateStyles = '
        :root {
            --primary-color: ' . $primaryColor . ';
            --secondary-color: ' . $secondaryColor . ';
            --accent-color: ' . $accentColor . ';
            --text-color: ' . $textColor . ';
            --light-color: ' . $lightColor . ';
            --dark-color: ' . $darkColor . ';
            --border-radius: 20px;
            --shadow: 0 8px 25px rgba(0,0,0,0.08);
            --transition: all 0.3s ease;
            --gradient: linear-gradient(135deg, ' . $primaryColor . ' 0%, ' . $secondaryColor . ' 100%);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: \'Cormorant Garamond\', \'Playfair Display\', serif;
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
            background: rgba(250, 250, 250, 0.95);
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
            font-weight: 600;
            color: var(--dark-color);
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
            color: var(--dark-color);
        }

        .cart-icon {
            position: relative;
            cursor: pointer;
            font-size: 1.3rem;
            color: var(--text-color);
            transition: var(--transition);
        }

        .cart-icon:hover {
            color: var(--dark-color);
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
        .hero {
            background: var(--gradient);
            color: var(--text-color);
            padding: 12rem 0 8rem;
            position: relative;
            overflow: hidden;
        }

        .hero-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: center;
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .hero h1 {
            font-size: 3.2rem;
            font-weight: 400;
            margin-bottom: 1.5rem;
            line-height: 1.2;
        }

        .brand-name {
            font-weight: 600;
            color: var(--dark-color);
            font-style: italic;
        }

        .hero-subtitle {
            font-size: 1.3rem;
            margin-bottom: 3rem;
            color: var(--text-color);
            font-weight: 300;
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
            letter-spacing: 0.5px;
        }

        .btn-primary {
            background: var(--dark-color);
            color: var(--light-color);
        }

        .btn-primary:hover {
            background: var(--text-color);
            transform: translateY(-2px);
            box-shadow: var(--shadow);
        }

        .btn-secondary {
            background: transparent;
            color: var(--text-color);
            border: 2px solid var(--text-color);
        }

        .btn-secondary:hover {
            background: var(--text-color);
            color: var(--light-color);
            transform: translateY(-2px);
        }

        .hero-visual {
            position: relative;
            z-index: 1;
        }

        .floating-elements {
            position: relative;
            height: 300px;
        }

        .shape {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
            animation: float 6s ease-in-out infinite;
        }

        .shape-1 {
            width: 80px;
            height: 80px;
            top: 20px;
            left: 50px;
            animation-delay: 0s;
        }

        .shape-2 {
            width: 60px;
            height: 60px;
            top: 100px;
            right: 30px;
            animation-delay: 2s;
        }

        .shape-3 {
            width: 100px;
            height: 100px;
            bottom: 50px;
            left: 80px;
            animation-delay: 4s;
        }

        .shape-4 {
            width: 70px;
            height: 70px;
            bottom: 20px;
            right: 60px;
            animation-delay: 6s;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(10deg); }
        }

        /* Section Headers */
        .section-header {
            text-align: center;
            margin-bottom: 4rem;
        }

        .section-title {
            font-size: 2.8rem;
            font-weight: 400;
            color: var(--dark-color);
            margin-bottom: 1rem;
        }

        .section-subtitle {
            font-size: 1.2rem;
            color: var(--text-color);
            font-weight: 300;
        }

        /* Products Section */
        .products {
            padding: 6rem 0;
            background: var(--light-color);
        }

        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2.5rem;
        }

        .product-card {
            background: var(--light-color);
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: var(--transition);
            position: relative;
        }

        .product-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }

        .product-image-container {
            position: relative;
            overflow: hidden;
        }

        .product-image {
            width: 100%;
            height: 300px;
            object-fit: cover;
            transition: var(--transition);
        }

        .product-card:hover .product-image {
            transform: scale(1.05);
        }

        .product-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0,0,0,0.1);
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
            background: var(--light-color);
            color: var(--dark-color);
            border: none;
            padding: 0.8rem 1.5rem;
            border-radius: var(--border-radius);
            cursor: pointer;
            font-weight: 500;
            transition: var(--transition);
        }

        .quick-view:hover {
            background: var(--dark-color);
            color: var(--light-color);
        }

        .product-info {
            padding: 2rem;
        }

        .product-title {
            font-size: 1.4rem;
            font-weight: 500;
            margin-bottom: 0.5rem;
            color: var(--dark-color);
        }

        .product-description {
            color: var(--text-color);
            margin-bottom: 1.5rem;
            font-size: 0.9rem;
        }

        .product-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .product-price {
            font-size: 1.4rem;
            font-weight: 600;
            color: var(--dark-color);
        }

        .add-to-cart {
            background: var(--primary-color);
            color: var(--dark-color);
            border: none;
            padding: 0.8rem 1.5rem;
            border-radius: var(--border-radius);
            cursor: pointer;
            font-weight: 500;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .add-to-cart:hover {
            background: var(--dark-color);
            color: var(--light-color);
            transform: translateY(-2px);
        }

        /* Features Section */
        .features {
            padding: 5rem 0;
            background: var(--light-color);
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
        }

        .feature-item {
            text-align: center;
            padding: 2.5rem 1.5rem;
            background: var(--light-color);
            border-radius: var(--border-radius);
            transition: var(--transition);
            box-shadow: var(--shadow);
        }

        .feature-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
        }

        .feature-icon {
            width: 80px;
            height: 80px;
            background: var(--gradient);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            font-size: 2rem;
            color: var(--dark-color);
        }

        .feature-item h3 {
            font-size: 1.3rem;
            margin-bottom: 1rem;
            color: var(--dark-color);
        }

        .feature-item p {
            color: var(--text-color);
            line-height: 1.6;
        }

        /* About Section */
        .about {
            padding: 6rem 0;
            background: var(--gradient);
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

        .aesthetic-stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2rem;
            margin-top: 3rem;
        }

        .stat {
            text-align: center;
            padding: 1.5rem;
            background: rgba(255, 255, 255, 0.3);
            border-radius: var(--border-radius);
            backdrop-filter: blur(10px);
        }

        .stat-number {
            display: block;
            font-size: 2rem;
            font-weight: 600;
            color: var(--dark-color);
            margin-bottom: 0.5rem;
        }

        .stat-label {
            font-size: 0.9rem;
            color: var(--text-color);
        }

        .about-visual {
            position: relative;
        }

        .aesthetic-frame {
            padding: 20px;
            background: var(--light-color);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
        }

        .about-image {
            width: 100%;
            border-radius: calc(var(--border-radius) - 5px);
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
            margin-bottom: 1.5rem;
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: var(--transition);
        }

        .faq-item:hover {
            transform: translateY(-2px);
        }

        .faq-question {
            padding: 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
            font-weight: 500;
            color: var(--dark-color);
            background: var(--light-color);
        }

        .faq-answer {
            padding: 0 2rem 2rem;
            display: none;
            color: var(--text-color);
            line-height: 1.6;
        }

        .faq-active .faq-answer {
            display: block;
        }

        /* Testimonials Section */
        .testimonials {
            padding: 5rem 0;
            background: var(--gradient);
        }

        .testimonials-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
            gap: 2rem;
        }

        .testimonial-item {
            background: var(--light-color);
            padding: 2.5rem;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            transition: var(--transition);
        }

        .testimonial-item:hover {
            transform: translateY(-5px);
        }

        .testimonial-content {
            color: var(--text-color);
            font-style: italic;
            margin-bottom: 2rem;
            line-height: 1.8;
            font-size: 1.1rem;
        }

        .testimonial-author h4 {
            color: var(--dark-color);
            margin-bottom: 0.5rem;
        }

        .testimonial-author p {
            color: var(--text-color);
            font-size: 0.9rem;
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
            background: var(--gradient);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1.5rem;
            color: var(--dark-color);
            font-size: 1.2rem;
        }

        .contact-details h4 {
            color: var(--dark-color);
            margin-bottom: 0.5rem;
        }

        .contact-details p {
            color: var(--text-color);
        }

        .contact-form {
            background: var(--light-color);
            padding: 2.5rem;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
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
        }

        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(255, 214, 231, 0.3);
        }

        .form-group textarea {
            min-height: 150px;
            resize: vertical;
        }

        .submit-btn {
            background: var(--dark-color);
            color: var(--light-color);
            border: none;
            padding: 1.2rem 2.5rem;
            border-radius: var(--border-radius);
            cursor: pointer;
            font-weight: 500;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .submit-btn:hover {
            background: var(--text-color);
            transform: translateY(-2px);
        }

        /* Newsletter Section */
        .newsletter {
            background: var(--gradient);
            color: var(--text-color);
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
            font-weight: 400;
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
            background: var(--light-color);
            color: var(--text-color);
        }

        .newsletter-input-group button {
            padding: 1rem 1.5rem;
            background: var(--dark-color);
            color: var(--light-color);
            border: none;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .newsletter-input-group button:hover {
            background: var(--text-color);
        }

        /* Footer */
        .footer {
            background: var(--light-color);
            color: var(--text-color);
            padding: 4rem 0 2rem;
            border-top: 1px solid rgba(0,0,0,0.1);
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
            color: var(--dark-color);
            margin-bottom: 1.5rem;
            font-size: 1.2rem;
        }

        .footer-section p,
        .footer-section a {
            color: var(--text-color);
            margin-bottom: 0.8rem;
            display: block;
            text-decoration: none;
            transition: var(--transition);
        }

        .footer-section a:hover {
            color: var(--dark-color);
        }

        .footer-bottom {
            text-align: center;
            padding-top: 2rem;
            border-top: 1px solid rgba(0,0,0,0.1);
        }

        /* Cart Sidebar */
        .cart-sidebar {
            position: fixed;
            top: 0;
            right: -400px;
            width: 400px;
            height: 100vh;
            background: var(--light-color);
            box-shadow: -5px 0 25px rgba(0,0,0,0.1);
            transition: right 0.3s ease;
            z-index: 1000;
            overflow-y: auto;
        }

        .cart-sidebar.open {
            right: 0;
        }

        .cart-header {
            padding: 2rem;
            border-bottom: 1px solid rgba(0,0,0,0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: var(--light-color);
        }

        .cart-header h3 {
            color: var(--dark-color);
        }

        #close-cart {
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: var(--text-color);
        }

        .cart-items {
            padding: 1.5rem;
        }

        .cart-item {
            display: flex;
            margin-bottom: 1.5rem;
            padding-bottom: 1.5rem;
            border-bottom: 1px solid rgba(0,0,0,0.1);
        }

        .cart-item-image {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: var(--border-radius);
            margin-right: 1.5rem;
        }

        .cart-item-details {
            flex: 1;
        }

        .cart-item-details h4 {
            margin-bottom: 0.5rem;
            color: var(--dark-color);
        }

        .cart-item-remove {
            background: none;
            border: none;
            color: #dc3545;
            cursor: pointer;
            font-size: 1.2rem;
        }

        .cart-total {
            padding: 1.5rem;
            border-top: 1px solid rgba(0,0,0,0.1);
            display: flex;
            justify-content: space-between;
            font-weight: 600;
            color: var(--dark-color);
        }

        .checkout-btn {
            display: block;
            width: calc(100% - 3rem);
            margin: 0 1.5rem 1.5rem;
            padding: 1.2rem;
            background: var(--dark-color);
            color: var(--light-color);
            border: none;
            border-radius: var(--border-radius);
            font-weight: 500;
            cursor: pointer;
            transition: var(--transition);
        }

        .checkout-btn:hover {
            background: var(--text-color);
        }

        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.5);
            display: none;
            z-index: 999;
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
        }

        @media (max-width: 768px) {
            .hero-container {
                grid-template-columns: 1fr;
                text-align: center;
                gap: 3rem;
            }
            
            .hero h1 {
                font-size: 2.5rem;
            }
            
            .hero-actions {
                flex-direction: column;
                align-items: center;
            }
            
            .products-grid {
                grid-template-columns: 1fr;
            }
            
            .aesthetic-stats {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }
            
            .form-row {
                grid-template-columns: 1fr;
            }
            
            .nav-menu {
                flex-direction: column;
                gap: 1.5rem;
            }
            
            .cart-sidebar {
                width: 100%;
                right: -100%;
            }
            
            .testimonials-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 480px) {
            .hero {
                padding: 8rem 0 4rem;
            }
            
            .hero h1 {
                font-size: 2rem;
            }
            
            .section-title {
                font-size: 2rem;
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
            
            .floating-elements {
                display: none;
            }
        }
    ';
@endphp