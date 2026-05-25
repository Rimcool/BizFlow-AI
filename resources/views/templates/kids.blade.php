@extends('templates.layout')

@section('content')
    <!-- Hero Section -->
    <section class="kids-hero">
        <div class="container">
            <div class="hero-content">
                <h1>{{ $business->name }}</h1>
                <p class="hero-subtitle">Where Imagination Comes to Life!</p>
                <p class="hero-description">Fun {{ $business->products }} for {{ $business->target }} who love to play and learn</p>
                <div class="hero-actions">
                    <a href="#products" class="btn btn-primary">Explore Toys</a>
                    <a href="#about" class="btn btn-secondary">Our Story</a>
                </div>
            </div>
            <div class="hero-visual">
                <div class="fun-elements">
                    <div class="bouncing-ball"></div>
                    <div class="floating-star"></div>
                    <div class="rotating-heart"></div>
                    <div class="jumping-animal"></div>
                </div>
            </div>
        </div>
        <div class="rainbow-overlay"></div>
    </section>

    <!-- Products Section -->
    <section id="products" class="products">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Awesome Collection</h2>
                <p class="section-subtitle">Toys that spark joy and creativity</p>
            </div>
            <div class="products-grid">
                @php
                    $products = explode(',', $business->products);
                    $allProducts = $products;
                    if (count($products) < 6) {
                        $variations = ['Super', 'Magic', 'Adventure', 'Fantasy', 'Wonder', 'Dream'];
                        $funColors = ['FF6B6B', '4ECDC4', '45B7D1', '96CEB4', 'FECA57', 'FF9FF3'];
                        for ($i = count($products); $i < 6; $i++) {
                            $allProducts[] = $variations[$i] . ' ' . $products[0];
                        }
                    }
                @endphp
                
                @foreach(array_slice($allProducts, 0, 6) as $index => $product)
                @php
                    $funColors = ['FF6B6B', '4ECDC4', '45B7D1', '96CEB4', 'FECA57', 'FF9FF3'];
                    $textColors = ['FFFFFF', 'FFFFFF', 'FFFFFF', 'FFFFFF', 'FFFFFF', 'FFFFFF'];
                    $colorIndex = $index % count($funColors);
                    $productColor = $funColors[$colorIndex];
                    $textColor = $textColors[$colorIndex];
                @endphp
                <div class="product-card" data-color="{{ $productColor }}">
                    <div class="fun-badge">Fun!</div>
                    <div class="product-image-container">
                        <div class="toy-image" style="background-color: #{{ $productColor }};">
                            <div class="toy-face">
                                <div class="eye"></div>
                                <div class="eye"></div>
                                <div class="smile"></div>
                            </div>
                        </div>
                        <div class="product-overlay">
                            <button class="quick-view">Quick Peek</button>
                        </div>
                    </div>
                    <div class="product-info">
                        <h3 class="product-title">{{ trim($product) }}</h3>
                        <p class="product-description">Super fun {{ $business->industry }} toy</p>
                        <div class="fun-features">
                            <span class="fun-tag">Educational</span>
                            <span class="fun-tag">Safe</span>
                            <span class="fun-tag">Creative</span>
                        </div>
                        <div class="product-footer">
                            <p class="product-price">${{ rand(25, 75) }}.00</p>
                            <button class="add-to-cart" 
                                    data-product="{{ trim($product) }}" 
                                    data-price="{{ rand(25, 75) }}">
                                <i class="fas fa-gift"></i>
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
            <div class="section-header">
                <h2 class="section-title">Why Kids Love Us</h2>
                <p class="section-subtitle">Fun features that make playtime awesome</p>
            </div>
            <div class="features-grid">
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-brain"></i>
                    </div>
                    <h3>Educational</h3>
                    <p>Learning through play with fun, engaging activities</p>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3>Super Safe</h3>
                    <p>Non-toxic materials and child-safe designs</p>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-paint-brush"></i>
                    </div>
                    <h3>Creative</h3>
                    <p>Spark imagination and creative thinking</p>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-heart"></i>
                    </div>
                    <h3>Made with Love</h3>
                    <p>Designed by parents who care about quality</p>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="about">
        <div class="container">
            <div class="about-grid">
                <div class="about-content">
                    <h2 class="section-title">Our Playful Story</h2>
                    <p class="about-description">
                        {{ $business->name }} was created by parents who believe childhood should be filled with 
                        magic, laughter, and endless possibilities. We design {{ $business->products }} that 
                        inspire creativity and make learning an adventure!
                    </p>
                    <p class="about-description">
                        Every toy is carefully crafted to be safe, educational, and most importantly—super fun! 
                        We're passionate about creating products that both kids and parents will love.
                    </p>
                    <div class="fun-stats">
                        <div class="fun-stat">
                            <span class="stat-number">100%</span>
                            <span class="stat-label">Kid Approved</span>
                        </div>
                        <div class="fun-stat">
                            <span class="stat-number">0%</span>
                            <span class="stat-label">Boring Stuff</span>
                        </div>
                        <div class="fun-stat">
                            <span class="stat-number">∞</span>
                            <span class="stat-label">Smiles Created</span>
                        </div>
                    </div>
                </div>
                <div class="about-visual">
                    <div class="playful-scene">
                        <div class="cloud"></div>
                        <div class="cloud"></div>
                        <div class="sun"></div>
                        <div class="rainbow"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Happy Families</h2>
                <p class="section-subtitle">What kids and parents are saying</p>
            </div>
            <div class="testimonials-grid">
                <div class="testimonial-item">
                    <div class="testimonial-content">
                        <p>"My daughter absolutely loves her {{ $business->products }} from {{ $business->name }}! They're educational, durable, and most importantly—she has so much fun playing with them. Best purchase ever!"</p>
                    </div>
                    <div class="testimonial-author">
                        <h4>Sarah Johnson</h4>
                        <p>Mom of Emily, age 5</p>
                    </div>
                </div>
                <div class="testimonial-item">
                    <div class="testimonial-content">
                        <p>"Finally, toys that are both fun AND educational! My son has learned so much while playing, and I love that everything is made with safe, non-toxic materials."</p>
                    </div>
                    <div class="testimonial-author">
                        <h4>Michael Chen</h4>
                        <p>Dad of Liam, age 7</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section id="faq" class="faq">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Curious Questions</h2>
                <p class="section-subtitle">Everything parents want to know</p>
            </div>
            
            <div class="faq-grid">
                <div class="faq-item">
                    <div class="faq-question">
                        <span>Are your products safe for young children?</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Absolutely! Safety is our top priority. All our products are made with non-toxic, child-safe materials and undergo rigorous testing. We follow all safety standards and our toys are designed without small parts for younger children. Everything is made with love and care to ensure your little ones can play safely!</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">
                        <span>What age range are your products designed for?</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Our products are designed for children ages 3-8, but many older kids enjoy them too! Each product has specific age recommendations based on developmental stages and safety considerations. We create toys that grow with your child, offering different ways to play as they develop new skills.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">
                        <span>How do you make learning fun?</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>We believe learning should feel like play! Our toys incorporate educational elements naturally through games, puzzles, and creative activities. Kids develop important skills like problem-solving, creativity, and coordination without even realizing they're learning. It's all about making education an adventure!</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">
                        <span>Do you offer gift wrapping?</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Yes! We offer special birthday-themed gift wrapping at checkout. Each gift-wrapped package comes with a personalized message and colorful wrapping that kids love. It's the perfect way to make birthdays and special occasions even more magical!</p>
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
                <p class="section-subtitle">We love hearing from our little customers and their grown-ups!</p>
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
                            <p>(555) 123-PLAY</p>
                        </div>
                    </div>
                    <div class="contact-info-item">
                        <div class="contact-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="contact-details">
                            <h4>Playroom</h4>
                            <p>123 Fun Street<br>Playtown, PT 12345</p>
                        </div>
                    </div>
                    <div class="contact-info-item">
                        <div class="contact-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="contact-details">
                            <h4>Hours</h4>
                            <p>Monday - Friday: 9AM-6PM<br>Saturday: 10AM-4PM</p>
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
                            <input type="text" placeholder="Child's Age (optional)">
                        </div>
                        <div class="form-group">
                            <textarea placeholder="Tell us what you're looking for..." rows="5" required></textarea>
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
                <h2>Join the Fun Club!</h2>
                <p>Get updates on new toys, special offers, and free activities for kids</p>
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
    // Kids color scheme
    $primaryColor = $business->color ?: 'FF6B6B'; // Coral
    $secondaryColor = '4ECDC4'; // Turquoise
    $accentColor = 'FECA57'; // Yellow
    $textColor = '333333'; // Dark gray
    $lightColor = 'FFFFFF'; // White
    $darkColor = 'FF6B6B'; // Coral
    
    $templateStyles = '
        :root {
            --primary-color: #' . $primaryColor . ';
            --secondary-color: #' . $secondaryColor . ';
            --accent-color: #' . $accentColor . ';
            --text-color: #' . $textColor . ';
            --light-color: #' . $lightColor . ';
            --dark-color: #' . $darkColor . ';
            --border-radius: 16px;
            --shadow: 0 8px 25px rgba(0,0,0,0.1);
            --transition: all 0.3s ease;
            --rainbow-gradient: linear-gradient(45deg, #FF6B6B, #4ECDC4, #45B7D1, #96CEB4, #FECA57, #FF9FF3);
            --fun-gradient: linear-gradient(135deg, #FF6B6B 0%, #4ECDC4 50%, #FECA57 100%);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Comic Neue", "Nunito", sans-serif;
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
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            padding: 1.5rem 0;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            transition: var(--transition);
            border-bottom: 3px solid var(--primary-color);
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
            font-weight: 700;
            color: var(--primary-color);
            letter-spacing: 1px;
        }

        .nav-menu {
            display: flex;
            list-style: none;
            gap: 2rem;
        }

        .nav-link {
            text-decoration: none;
            color: var(--text-color);
            font-weight: 600;
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
            color: var(--text-color);
            border-radius: 50%;
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.7rem;
            font-weight: 700;
        }

        /* Hero Section */
        .kids-hero {
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

        .kids-hero h1 {
            font-size: 3.5rem;
            font-weight: 800;
            margin-bottom: 1rem;
            line-height: 1.2;
            text-shadow: 2px 2px 0 rgba(0,0,0,0.1);
        }

        .hero-subtitle {
            font-size: 1.5rem;
            margin-bottom: 1rem;
            font-weight: 600;
        }

        .hero-description {
            font-size: 1.1rem;
            margin-bottom: 3rem;
            opacity: 0.9;
        }

        .hero-actions {
            display: flex;
            gap: 1.5rem;
        }

        .btn {
            padding: 1.2rem 2.5rem;
            border: none;
            border-radius: 30px;
            font-weight: 700;
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
            background: var(--accent-color);
            transform: translateY(-3px) scale(1.05);
            box-shadow: 0 12px 30px rgba(0,0,0,0.2);
        }

        .btn-secondary {
            background: transparent;
            color: white;
            border: 3px solid white;
        }

        .btn-secondary:hover {
            background: white;
            color: var(--primary-color);
            transform: translateY(-3px) scale(1.05);
        }

        .hero-visual {
            position: absolute;
            right: 5%;
            top: 50%;
            transform: translateY(-50%);
            width: 40%;
        }

        .fun-elements {
            position: relative;
            height: 300px;
        }

        .bouncing-ball {
            position: absolute;
            width: 60px;
            height: 60px;
            background: var(--accent-color);
            border-radius: 50%;
            top: 50px;
            right: 100px;
            animation: bounce 2s ease-in-out infinite;
        }

        .floating-star {
            position: absolute;
            width: 40px;
            height: 40px;
            background: white;
            clip-path: polygon(50% 0%, 61% 35%, 98% 35%, 68% 57%, 79% 91%, 50% 70%, 21% 91%, 32% 57%, 2% 35%, 39% 35%);
            top: 100px;
            right: 50px;
            animation: float 3s ease-in-out infinite;
        }

        .rotating-heart {
            position: absolute;
            width: 50px;
            height: 50px;
            background: #FF9FF3;
            clip-path: path("M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z");
            bottom: 70px;
            right: 150px;
            animation: rotate 4s linear infinite;
        }

        .jumping-animal {
            position: absolute;
            width: 70px;
            height: 70px;
            background: var(--secondary-color);
            border-radius: 50%;
            bottom: 30px;
            right: 80px;
            animation: jump 2.5s ease-in-out infinite;
        }

        .jumping-animal:before, .jumping-animal:after {
            content: "";
            position: absolute;
            width: 20px;
            height: 20px;
            background: white;
            border-radius: 50%;
            top: 15px;
        }

        .jumping-animal:before { left: 10px; }
        .jumping-animal:after { right: 10px; }

        @keyframes bounce {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-30px); }
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(10deg); }
        }

        @keyframes rotate {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        @keyframes jump {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-40px); }
        }

        .rainbow-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, 
                rgba(255, 107, 107, 0.3) 0%, 
                rgba(78, 205, 196, 0.3) 25%, 
                rgba(254, 202, 87, 0.3) 50%, 
                rgba(255, 159, 243, 0.3) 75%, 
                rgba(150, 206, 180, 0.3) 100%);
            pointer-events: none;
        }

        /* Section Headers */
        .section-header {
            text-align: center;
            margin-bottom: 4rem;
        }

        .section-title {
            font-size: 3rem;
            font-weight: 800;
            color: var(--primary-color);
            margin-bottom: 1rem;
            text-shadow: 2px 2px 0 rgba(0,0,0,0.1);
        }

        .section-subtitle {
            font-size: 1.2rem;
            color: var(--text-color);
            font-weight: 600;
        }

        /* Products Section */
        .products {
            padding: 6rem 0;
            background: var(--light-color);
        }

        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2.5rem;
        }

        .product-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: var(--transition);
            position: relative;
            border: 3px solid var(--primary-color);
        }

        .product-card:hover {
            transform: translateY(-10px) rotate(2deg);
            box-shadow: 0 20px 40px rgba(0,0,0,0.2);
        }

        .fun-badge {
            position: absolute;
            top: 15px;
            left: 15px;
            background: var(--accent-color);
            color: var(--text-color);
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 700;
            z-index: 2;
            text-transform: uppercase;
        }

        .product-image-container {
            position: relative;
            overflow: hidden;
            height: 250px;
        }

        .toy-image {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: var(--transition);
            position: relative;
        }

        .toy-face {
            position: relative;
            width: 100px;
            height: 100px;
        }

        .eye {
            position: absolute;
            width: 20px;
            height: 20px;
            background: white;
            border-radius: 50%;
            top: 30px;
        }

        .eye:nth-child(1) { left: 20px; }
        .eye:nth-child(2) { right: 20px; }

        .smile {
            position: absolute;
            width: 60px;
            height: 30px;
            border-bottom: 4px solid white;
            border-radius: 0 0 30px 30px;
            bottom: 20px;
            left: 20px;
        }

        .product-card:hover .toy-image {
            transform: scale(1.1);
        }

        .product-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(255, 107, 107, 0.8);
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
            background: white;
            color: var(--primary-color);
            border: none;
            padding: 1rem 2rem;
            border-radius: 30px;
            cursor: pointer;
            font-weight: 700;
            transition: var(--transition);
            font-size: 1rem;
        }

        .quick-view:hover {
            background: var(--accent-color);
            transform: scale(1.1);
        }

        .product-info {
            padding: 2rem;
        }

        .product-title {
            font-size: 1.4rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            color: var(--primary-color);
        }

        .product-description {
            color: var(--text-color);
            margin-bottom: 1.5rem;
            font-size: 0.9rem;
        }

        .fun-features {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            margin-bottom: 1.5rem;
        }

        .fun-tag {
            background: var(--secondary-color);
            color: white;
            padding: 0.3rem 0.8rem;
            border-radius: 15px;
            font-size: 0.7rem;
            font-weight: 700;
        }

        .product-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .product-price {
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--primary-color);
        }

        .add-to-cart {
            background: var(--primary-color);
            color: white;
            border: none;
            padding: 0.8rem 1.5rem;
            border-radius: 30px;
            cursor: pointer;
            font-weight: 700;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .add-to-cart:hover {
            background: var(--accent-color);
            transform: translateY(-2px);
        }

        /* Features Section */
        .features {
            padding: 5rem 0;
            background: linear-gradient(135deg, #FF6B6B 0%, #4ECDC4 100%);
            color: white;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
        }

        .feature-item {
            text-align: center;
            padding: 2.5rem 1.5rem;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            transition: var(--transition);
            backdrop-filter: blur(10px);
        }

        .feature-item:hover {
            transform: translateY(-5px) scale(1.05);
            background: rgba(255, 255, 255, 0.3);
        }

        .feature-icon {
            width: 80px;
            height: 80px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            font-size: 2rem;
            color: var(--primary-color);
        }

        .feature-item h3 {
            font-size: 1.3rem;
            margin-bottom: 1rem;
            color: white;
        }

        .feature-item p {
            color: rgba(255, 255, 255, 0.9);
            line-height: 1.6;
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

        .fun-stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2rem;
            margin-top: 3rem;
        }

        .fun-stat {
            text-align: center;
            padding: 1.5rem;
            background: white;
            border-radius: 20px;
            box-shadow: var(--shadow);
            transition: var(--transition);
            border: 2px solid var(--primary-color);
        }

        .fun-stat:hover {
            transform: translateY(-5px);
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
            font-weight: 600;
        }

        .about-visual {
            position: relative;
        }

        .playful-scene {
            position: relative;
            height: 300px;
        }

        .cloud {
            position: absolute;
            background: white;
            border-radius: 50px;
            animation: float 4s ease-in-out infinite;
        }

        .cloud:nth-child(1) {
            width: 80px;
            height: 40px;
            top: 50px;
            left: 50px;
            animation-delay: 0s;
        }

        .cloud:nth-child(2) {
            width: 60px;
            height: 30px;
            top: 100px;
            right: 80px;
            animation-delay: 2s;
        }

        .sun {
            position: absolute;
            width: 80px;
            height: 80px;
            background: var(--accent-color);
            border-radius: 50%;
            top: 30px;
            right: 30px;
            animation: rotate 10s linear infinite;
        }

        .rainbow {
            position: absolute;
            bottom: 50px;
            left: 50px;
            width: 200px;
            height: 100px;
            background: var(--rainbow-gradient);
            border-radius: 50%;
            clip-path: polygon(0% 50%, 100% 50%, 100% 100%, 0% 100%);
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
            border-radius: 20px;
            box-shadow: var(--shadow);
            transition: var(--transition);
            border: 2px solid var(--secondary-color);
        }

        .testimonial-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.2);
        }

        .testimonial-content {
            color: var(--text-color);
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
            font-weight: 700;
        }

        .testimonial-author p {
            color: var(--text-color);
            font-size: 0.9rem;
        }

        /* FAQ Section */
        .faq {
            padding: 6rem 0;
            background: linear-gradient(135deg, #4ECDC4 0%, #FF6B6B 100%);
            color: white;
        }

        .faq-grid {
            max-width: 800px;
            margin: 0 auto;
        }

        .faq-item {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            margin-bottom: 1rem;
            overflow: hidden;
            transition: var(--transition);
            backdrop-filter: blur(10px);
        }

        .faq-item:hover {
            transform: translateY(-2px);
            background: rgba(255, 255, 255, 0.3);
        }

        .faq-question {
            padding: 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
            font-weight: 700;
            color: white;
            background: transparent;
        }

        .faq-answer {
            padding: 0 1.5rem 1.5rem;
            display: none;
            color: rgba(255, 255, 255, 0.9);
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
            background: var(--fun-gradient);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1.5rem;
            color: white;
            font-size: 1.2rem;
        }

        .contact-details h4 {
            color: var(--primary-color);
            margin-bottom: 0.5rem;
            font-weight: 700;
        }

        .contact-details p {
            color: var(--text-color);
        }

        .contact-form {
            background: white;
            padding: 2.5rem;
            border-radius: 20px;
            box-shadow: var(--shadow);
            border: 3px solid var(--primary-color);
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
            border: 2px solid var(--secondary-color);
            border-radius: 10px;
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

        .submit-btn {
            background: var(--primary-color);
            color: white;
            border: none;
            padding: 1.2rem 2.5rem;
            border-radius: 30px;
            cursor: pointer;
            font-weight: 700;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .submit-btn:hover {
            background: var(--accent-color);
            transform: translateY(-2px);
        }

        /* Newsletter Section */
        .newsletter {
            background: var(--fun-gradient);
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
            text-shadow: 2px 2px 0 rgba(0,0,0,0.1);
        }

        .newsletter p {
            margin-bottom: 2.5rem;
            font-size: 1.1rem;
        }

        .newsletter-input-group {
            display: flex;
            max-width: 400px;
            margin: 0 auto;
            border-radius: 30px;
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
            background: var(--accent-color);
            color: var(--text-color);
            border: none;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-weight: 700;
        }

        .newsletter-input-group button:hover {
            background: white;
        }

        /* Footer */
        .footer {
            background: var(--primary-color);
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
            font-weight: 700;
        }

        .footer-section p,
        .footer-section a {
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 0.8rem;
            display: block;
            text-decoration: none;
            transition: var(--transition);
        }

        .footer-section a:hover {
            color: var(--accent-color);
        }

        .footer-bottom {
            text-align: center;
            padding-top: 2rem;
            border-top: 1px solid rgba(255, 255, 255, 0.2);
            color: rgba(255, 255, 255, 0.6);
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
            
            .hero-content {
                max-width: 100%;
                text-align: center;
            }
        }

        @media (max-width: 768px) {
            .kids-hero {
                padding: 8rem 0 4rem;
            }
            
            .kids-hero h1 {
                font-size: 2.5rem;
            }
            
            .hero-actions {
                flex-direction: column;
                align-items: center;
            }
            
            .products-grid {
                grid-template-columns: 1fr;
            }
            
            .fun-stats {
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
            .kids-hero h1 {
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

    // Add fun animations to elements
    const funElements = document.querySelectorAll('.product-card, .feature-item, .testimonial-item');
    
    funElements.forEach((element, index) => {
        element.style.opacity = '0';
        element.style.transform = 'translateY(20px)';
        element.style.transition = 'all 0.6s ease';
        
        setTimeout(() => {
            element.style.opacity = '1';
            element.style.transform = 'translateY(0)';
        }, 100 + (index * 100));
    });

    // Add bounce effect to buttons
    const buttons = document.querySelectorAll('.btn, .add-to-cart, .quick-view');
    
    buttons.forEach(button => {
        button.addEventListener('mouseenter', () => {
            button.style.transform = 'scale(1.05)';
        });
        
        button.addEventListener('mouseleave', () => {
            button.style.transform = 'scale(1)';
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