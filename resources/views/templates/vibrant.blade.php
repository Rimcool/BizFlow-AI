@extends('templates.layout')

@section('content')
    <!-- Hero Section -->
    <section id="home" class="hero">
        <div class="hero-container">
            <div class="hero-content">
                <h1>Welcome to <span class="brand-name">{{ $business->name }}</span></h1>
                <p class="hero-subtitle">Discover the most colorful and exciting {{ $business->products }} for {{ $business->target }}</p>
                <div class="hero-actions">
                    <a href="#products" class="btn btn-primary">Explore Products</a>
                    <a href="#about" class="btn btn-secondary">Our Story</a>
                </div>
            </div>
            <div class="hero-visual">
                <div class="floating-shapes">
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
                <h2 class="section-title">Colorful Collection</h2>
                <p class="section-subtitle">Vibrant {{ $business->products }} that bring energy to your life</p>
            </div>
            <div class="products-grid">
                @php
                    $products = explode(',', $business->products);
                    $allProducts = $products;
                    if (count($products) < 6) {
                        $variations = ['Rainbow', 'Electric', 'Neon', 'Vibrant', 'Colorful', 'Bright'];
                        $colors = ['FF6B6B', '4ECDC4', '45B7D1', 'F9A826', 'A363D9', 'FF9FF3'];
                        for ($i = count($products); $i < 6; $i++) {
                            $allProducts[] = $variations[$i] . ' ' . $products[0];
                        }
                    }
                @endphp
                
                @foreach(array_slice($allProducts, 0, 6) as $index => $product)
                @php
                    $vibrantColors = ['FF6B6B', '4ECDC4', '45B7D1', 'F9A826', 'A363D9', 'FF9FF3'];
                    $colorIndex = $index % count($vibrantColors);
                    $productColor = $vibrantColors[$colorIndex];
                @endphp
                <div class="product-card" data-color="{{ $productColor }}">
                    <div class="product-image-container">
                        <img src="https://via.placeholder.com/400x300/{{ $productColor }}/FFFFFF?text={{ urlencode(trim($product)) }}" alt="{{ trim($product) }}" class="product-image">
                        <div class="product-badge">New</div>
                    </div>
                    <div class="product-info">
                        <h3 class="product-title">{{ trim($product) }}</h3>
                        <p class="product-description">Bright and energetic {{ $business->industry }} product</p>
                        <div class="product-footer">
                            <p class="product-price">${{ rand(25, 150) }}.00</p>
                            <button class="add-to-cart" 
                                    data-product="{{ trim($product) }}" 
                                    data-price="{{ rand(25, 150) }}"
                                    data-image="https://via.placeholder.com/400x300/{{ $productColor }}/FFFFFF?text={{ urlencode(trim($product)) }}">
                                <i class="fas fa-bolt"></i>
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
                        <i class="fas fa-palette"></i>
                    </div>
                    <h3>Vibrant Colors</h3>
                    <p>Eye-catching designs that stand out from the crowd</p>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-shipping-fast"></i>
                    </div>
                    <h3>Fast Shipping</h3>
                    <p>Quick delivery to brighten your day faster</p>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-recycle"></i>
                    </div>
                    <h3>Eco-Friendly</h3>
                    <p>Sustainable materials for a brighter future</p>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-smile"></i>
                    </div>
                    <h3>Happy Customers</h3>
                    <p>Join thousands of satisfied colorful shoppers</p>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="about">
        <div class="container">
            <div class="about-grid">
                <div class="about-content">
                    <h2 class="section-title">Our Colorful Story</h2>
                    <p class="about-description">
                        {{ $business->name }} was born from a passion for bringing color and energy to everyday life. 
                        We believe that {{ $business->products }} should be as vibrant and exciting as the people who use them.
                    </p>
                    <p class="about-description">
                        Our mission is to spread joy and creativity through our carefully curated collection of 
                        {{ $business->products }} designed for {{ $business->target }} who appreciate bold expression.
                    </p>
                    <div class="color-stats">
                        <div class="color-stat">
                            <span class="stat-number">50+</span>
                            <span class="stat-label">Vibrant Colors</span>
                        </div>
                        <div class="color-stat">
                            <span class="stat-number">10K+</span>
                            <span class="stat-label">Happy Customers</span>
                        </div>
                        <div class="color-stat">
                            <span class="stat-number">100%</span>
                            <span class="stat-label">Color Guarantee</span>
                        </div>
                    </div>
                </div>
                <div class="about-visual">
                    <div class="color-splash"></div>
                    <img src="https://via.placeholder.com/500x400/FF6B6B/FFFFFF?text=Colorful+Products" alt="Vibrant {{ $business->products }}" class="about-image">
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section id="faq" class="faq">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Colorful Questions</h2>
                <p class="section-subtitle">Everything you need to know about our vibrant products</p>
            </div>
            
            <div class="faq-grid">
                <div class="faq-item">
                    <div class="faq-question">
                        <span>Are the colors really that vibrant?</span>
                        <i class="fas fa-plus"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Yes! Our {{ $business->products }} feature premium, fade-resistant colors that maintain their vibrancy. We use special techniques to ensure the colors pop!</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">
                        <span>Can I customize colors?</span>
                        <i class="fas fa-plus"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Absolutely! We offer custom color options for many of our products. Contact us to create your perfect color combination.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">
                        <span>How do I care for colorful items?</span>
                        <i class="fas fa-plus"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Each product comes with specific care instructions. Generally, we recommend gentle washing and avoiding direct sunlight to maintain vibrancy.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">
                        <span>Do you offer color matching?</span>
                        <i class="fas fa-plus"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Yes! Send us your color inspiration and we'll do our best to match it with our vibrant palette.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Colorful Reviews</h2>
                <p class="section-subtitle">What our happy customers are saying</p>
            </div>
            <div class="testimonials-grid">
                <div class="testimonial-item">
                    <div class="testimonial-content">
                        <p>"The colors are absolutely incredible! These {{ $business->products }} brought so much energy to my space."</p>
                    </div>
                    <div class="testimonial-author">
                        <h4>Jessica Taylor</h4>
                        <p>Art Director</p>
                    </div>
                </div>
                <div class="testimonial-item">
                    <div class="testimonial-content">
                        <p>"I've never seen such vibrant {{ $business->products }}! The quality matches the amazing colors."</p>
                    </div>
                    <div class="testimonial-author">
                        <h4>Marcus Chen</h4>
                        <p>Design Enthusiast</p>
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
                <p class="section-subtitle">Let's create something colorful together</p>
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
                            <p>(555) 123-COLOR</p>
                        </div>
                    </div>
                    <div class="contact-info-item">
                        <div class="contact-icon">
                            <i class="fas fa-hashtag"></i>
                        </div>
                        <div class="contact-details">
                            <h4>Social Media</h4>
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
                            <textarea placeholder="Your Colorful Message" rows="5" required></textarea>
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
                <h2>Stay Colorful!</h2>
                <p>Join our newsletter for exclusive colorful updates and offers</p>
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
    $primaryColor = $business->color ?: '#FF6B6B';
    $secondaryColor = '#4ECDC4';
    $accentColor = '#F9A826';
    $darkColor = '#2D3436';
    $lightColor = '#FFFFFF';
    
    $templateStyles = '
        :root {
            --primary-color: ' . $primaryColor . ';
            --secondary-color: ' . $secondaryColor . ';
            --accent-color: ' . $accentColor . ';
            --dark-color: ' . $darkColor . ';
            --light-color: ' . $lightColor . ';
            --text-dark: #2D3436;
            --text-light: #636E72;
            --white: #FFFFFF;
            --border-radius: 16px;
            --shadow: 0 10px 30px rgba(0,0,0,0.15);
            --transition: all 0.3s ease;
            --gradient: linear-gradient(135deg, ' . $primaryColor . ' 0%, ' . $secondaryColor . ' 100%);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: \'Inter\', \'Helvetica Neue\', Arial, sans-serif;
            line-height: 1.6;
            color: var(--text-dark);
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
            font-weight: 800;
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
            color: var(--text-dark);
            font-weight: 600;
            font-size: 1rem;
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
            background: var(--gradient);
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
            color: var(--text-dark);
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
            color: var(--white);
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
        .hero {
            background: var(--gradient);
            color: var(--white);
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
            font-size: 3.5rem;
            font-weight: 800;
            margin-bottom: 1.5rem;
            line-height: 1.2;
        }

        .brand-name {
            background: linear-gradient(45deg, var(--accent-color), var(--secondary-color));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero-subtitle {
            font-size: 1.3rem;
            margin-bottom: 3rem;
            opacity: 0.9;
            font-weight: 400;
        }

        .hero-actions {
            display: flex;
            gap: 1.5rem;
        }

        .btn {
            padding: 1.2rem 2.5rem;
            border: none;
            border-radius: 50px;
            font-weight: 700;
            text-decoration: none;
            transition: var(--transition);
            cursor: pointer;
            font-size: 1rem;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }

        .btn-primary {
            background: var(--accent-color);
            color: var(--white);
            box-shadow: 0 5px 15px rgba(249, 168, 38, 0.3);
        }

        .btn-primary:hover {
            background: #E59400;
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(249, 168, 38, 0.4);
        }

        .btn-secondary {
            background: transparent;
            color: var(--white);
            border: 3px solid var(--white);
        }

        .btn-secondary:hover {
            background: var(--white);
            color: var(--primary-color);
            transform: translateY(-3px);
        }

        .hero-visual {
            position: relative;
            z-index: 1;
        }

        .floating-shapes {
            position: relative;
            height: 300px;
        }

        .shape {
            position: absolute;
            border-radius: 50%;
            animation: float 6s ease-in-out infinite;
        }

        .shape-1 {
            width: 80px;
            height: 80px;
            background: rgba(255, 255, 255, 0.2);
            top: 20px;
            left: 50px;
            animation-delay: 0s;
        }

        .shape-2 {
            width: 60px;
            height: 60px;
            background: rgba(255, 255, 255, 0.3);
            top: 100px;
            right: 30px;
            animation-delay: 1s;
        }

        .shape-3 {
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.4);
            bottom: 50px;
            left: 80px;
            animation-delay: 2s;
        }

        .shape-4 {
            width: 100px;
            height: 100px;
            background: rgba(255, 255, 255, 0.1);
            bottom: 20px;
            right: 60px;
            animation-delay: 3s;
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
            font-size: 3rem;
            font-weight: 800;
            color: var(--text-dark);
            margin-bottom: 1rem;
            background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .section-subtitle {
            font-size: 1.2rem;
            color: var(--text-light);
            font-weight: 400;
        }

        /* Products Section */
        .products {
            padding: 6rem 0;
            background: linear-gradient(135deg, #F8F9FA 0%, #FFFFFF 100%);
        }

        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2.5rem;
        }

        .product-card {
            background: var(--white);
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: var(--transition);
            position: relative;
        }

        .product-card:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 20px 40px rgba(0,0,0,0.2);
        }

        .product-image-container {
            position: relative;
            overflow: hidden;
        }

        .product-image {
            width: 100%;
            height: 250px;
            object-fit: cover;
            transition: var(--transition);
        }

        .product-card:hover .product-image {
            transform: scale(1.1);
        }

        .product-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background: var(--accent-color);
            color: var(--white);
            padding: 0.5rem 1rem;
            border-radius: 25px;
            font-weight: 700;
            font-size: 0.8rem;
        }

        .product-info {
            padding: 2rem;
        }

        .product-title {
            font-size: 1.4rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            color: var(--text-dark);
        }

        .product-description {
            color: var(--text-light);
            margin-bottom: 1.5rem;
            font-size: 0.9rem;
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
            color: var(--white);
            border: none;
            padding: 1rem 1.5rem;
            border-radius: 50px;
            cursor: pointer;
            font-weight: 700;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 0.5rem;
            text-transform: uppercase;
            font-size: 0.9rem;
        }

        .add-to-cart:hover {
            background: var(--secondary-color);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(78, 205, 196, 0.3);
        }

        /* Features Section */
        .features {
            padding: 5rem 0;
            background: var(--white);
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
        }

        .feature-item {
            text-align: center;
            padding: 2.5rem 1.5rem;
            background: linear-gradient(135deg, #FFFFFF 0%, #F8F9FA 100%);
            border-radius: var(--border-radius);
            transition: var(--transition);
        }

        .feature-item:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow);
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
            color: var(--white);
        }

        .feature-item h3 {
            font-size: 1.3rem;
            margin-bottom: 1rem;
            color: var(--text-dark);
            font-weight: 700;
        }

        .feature-item p {
            color: var(--text-light);
            line-height: 1.6;
        }

        /* About Section */
        .about {
            padding: 6rem 0;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: var(--white);
            position: relative;
            overflow: hidden;
        }

        .about-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: center;
            position: relative;
            z-index: 2;
        }

        .about-content {
            padding-right: 2rem;
        }

        .about-description {
            margin-bottom: 2rem;
            line-height: 1.8;
            font-size: 1.1rem;
        }

        .color-stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2rem;
            margin-top: 3rem;
        }

        .color-stat {
            text-align: center;
        }

        .stat-number {
            display: block;
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 0.5rem;
        }

        .stat-label {
            font-size: 0.9rem;
            opacity: 0.9;
        }

        .about-visual {
            position: relative;
        }

        .color-splash {
            position: absolute;
            width: 200px;
            height: 200px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            top: -20px;
            right: -20px;
            animation: pulse 3s ease-in-out infinite;
        }

        .about-image {
            width: 100%;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            position: relative;
            z-index: 1;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); opacity: 0.1; }
            50% { transform: scale(1.1); opacity: 0.2; }
        }

        /* FAQ Section */
        .faq {
            padding: 6rem 0;
            background: var(--white);
        }

        .faq-grid {
            max-width: 800px;
            margin: 0 auto;
        }

        .faq-item {
            background: linear-gradient(135deg, #FFFFFF 0%, #F8F9FA 100%);
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
            font-weight: 700;
            color: var(--text-dark);
            background: var(--gradient);
            color: var(--white);
        }

        .faq-answer {
            padding: 0 2rem 2rem;
            display: none;
            color: var(--text-light);
            line-height: 1.6;
        }

        .faq-active .faq-answer {
            display: block;
        }

        /* Testimonials Section */
        .testimonials {
            padding: 5rem 0;
            background: linear-gradient(135deg, #F8F9FA 0%, #FFFFFF 100%);
        }

        .testimonials-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
            gap: 2rem;
        }

        .testimonial-item {
            background: var(--white);
            padding: 2.5rem;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            transition: var(--transition);
        }

        .testimonial-item:hover {
            transform: translateY(-5px);
        }

        .testimonial-content {
            color: var(--text-light);
            font-style: italic;
            margin-bottom: 2rem;
            line-height: 1.8;
            font-size: 1.1rem;
        }

        .testimonial-author h4 {
            color: var(--text-dark);
            margin-bottom: 0.5rem;
            font-weight: 700;
        }

        .testimonial-author p {
            color: var(--text-light);
            font-size: 0.9rem;
        }

        /* Contact Section */
        .contact {
            padding: 6rem 0;
            background: var(--white);
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
            color: var(--white);
            font-size: 1.2rem;
        }

        .contact-details h4 {
            color: var(--text-dark);
            margin-bottom: 0.5rem;
            font-weight: 700;
        }

        .contact-details p {
            color: var(--text-light);
        }

        .contact-form {
            background: linear-gradient(135deg, #FFFFFF 0%, #F8F9FA 100%);
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
            border: 2px solid #E9ECEF;
            border-radius: var(--border-radius);
            font-family: inherit;
            transition: var(--transition);
        }

        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(255, 107, 107, 0.1);
        }

        .form-group textarea {
            min-height: 150px;
            resize: vertical;
        }

        .submit-btn {
            background: var(--primary-color);
            color: var(--white);
            border: none;
            padding: 1.2rem 2.5rem;
            border-radius: 50px;
            cursor: pointer;
            font-weight: 700;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 0.5rem;
            text-transform: uppercase;
        }

        .submit-btn:hover {
            background: var(--secondary-color);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(78, 205, 196, 0.3);
        }

        /* Newsletter Section */
        .newsletter {
            background: var(--gradient);
            color: var(--white);
            padding: 5rem 0;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .newsletter-content {
            max-width: 600px;
            margin: 0 auto;
            position: relative;
            z-index: 2;
        }

        .newsletter h2 {
            font-size: 3rem;
            margin-bottom: 1rem;
            font-weight: 800;
        }

        .newsletter p {
            margin-bottom: 2.5rem;
            opacity: 0.9;
            font-size: 1.1rem;
        }

        .newsletter-input-group {
            display: flex;
            max-width: 400px;
            margin: 0 auto;
            border-radius: 50px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }

        .newsletter-input-group input {
            flex: 1;
            padding: 1.2rem;
            border: none;
            font-size: 1rem;
        }

        .newsletter-input-group button {
            padding: 1.2rem 2rem;
            background: var(--accent-color);
            color: var(--white);
            border: none;
            cursor: pointer;
            font-weight: 700;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 0.5rem;
            text-transform: uppercase;
        }

        .newsletter-input-group button:hover {
            background: #E59400;
        }

        /* Footer */
        .footer {
            background: var(--dark-color);
            color: var(--light-color);
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
            color: var(--white);
            margin-bottom: 1.5rem;
            font-size: 1.2rem;
            font-weight: 700;
        }

        .footer-section p,
        .footer-section a {
            color: var(--light-color);
            opacity: 0.8;
            margin-bottom: 0.8rem;
            display: block;
            text-decoration: none;
            transition: var(--transition);
        }

        .footer-section a:hover {
            opacity: 1;
            color: var(--primary-color);
        }

        .footer-bottom {
            text-align: center;
            padding-top: 2rem;
            border-top: 1px solid rgba(255,255,255,0.1);
        }

        /* Cart Sidebar */
        .cart-sidebar {
            position: fixed;
            top: 0;
            right: -400px;
            width: 400px;
            height: 100vh;
            background: var(--white);
            box-shadow: -5px 0 25px rgba(0,0,0,0.15);
            transition: right 0.3s ease;
            z-index: 1000;
            overflow-y: auto;
        }

        .cart-sidebar.open {
            right: 0;
        }

        .cart-header {
            padding: 2rem;
            border-bottom: 1px solid #eee;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: var(--gradient);
            color: var(--white);
        }

        .cart-header h3 {
            color: var(--white);
        }

        #close-cart {
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: var(--white);
        }

        .cart-items {
            padding: 1.5rem;
        }

        .cart-item {
            display: flex;
            margin-bottom: 1.5rem;
            padding-bottom: 1.5rem;
            border-bottom: 1px solid #eee;
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
            color: var(--text-dark);
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
            border-top: 1px solid #eee;
            display: flex;
            justify-content: space-between;
            font-weight: 700;
            color: var(--text-dark);
            font-size: 1.2rem;
        }

        .checkout-btn {
            display: block;
            width: calc(100% - 3rem);
            margin: 0 1.5rem 1.5rem;
            padding: 1.2rem;
            background: var(--primary-color);
            color: var(--white);
            border: none;
            border-radius: 50px;
            font-weight: 700;
            cursor: pointer;
            transition: var(--transition);
            text-transform: uppercase;
        }

        .checkout-btn:hover {
            background: var(--secondary-color);
            transform: translateY(-2px);
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
            .hero-container {
                grid-template-columns: 1fr;
                text-align: center;
                gap: 3rem;
            }
            
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
            
            .color-stats {
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
                font-size: 2.2rem;
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
            
            .floating-shapes {
                display: none;
            }
        }
    ';
@endphp