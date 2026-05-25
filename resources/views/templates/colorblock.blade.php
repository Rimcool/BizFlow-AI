@extends('templates.layout')

@section('content')
    <!-- Hero Section -->
    <section class="colorblock-hero">
        <div class="container">
            <div class="hero-content">
                <h1>{{ $business->name }}</h1>
                <p class="hero-subtitle">Bold {{ $business->industry }} for {{ $business->target }}</p>
                <p class="hero-description">Vibrant, statement-making designs that command attention</p>
                <div class="hero-actions">
                    <a href="#products" class="btn btn-primary">Explore Collection</a>
                    <a href="#about" class="btn btn-secondary">Our Vision</a>
                </div>
            </div>
            <div class="hero-visual">
                <div class="color-block-grid">
                    <div class="color-block block-1"></div>
                    <div class="color-block block-2"></div>
                    <div class="color-block block-3"></div>
                    <div class="color-block block-4"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Products Section -->
    <section id="products" class="products">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Bold Collection</h2>
                <p class="section-subtitle">Statement pieces that transform spaces</p>
            </div>
            <div class="products-grid">
                @php
                    $products = explode(',', $business->products);
                    $allProducts = $products;
                    if (count($products) < 6) {
                        $variations = ['Bold', 'Vibrant', 'Dynamic', 'Electric', 'Graphic', 'Statement'];
                        $boldColors = ['FF5252', 'FFEB3B', '2196F3', '4CAF50', '9C27B0', 'FF9800'];
                        for ($i = count($products); $i < 6; $i++) {
                            $allProducts[] = $variations[$i] . ' ' . $products[0];
                        }
                    }
                @endphp
                
                @foreach(array_slice($allProducts, 0, 6) as $index => $product)
                @php
                    $boldColors = ['FF5252', 'FFEB3B', '2196F3', '4CAF50', '9C27B0', 'FF9800'];
                    $textColors = ['FFFFFF', '333333', 'FFFFFF', 'FFFFFF', 'FFFFFF', '333333'];
                    $colorIndex = $index % count($boldColors);
                    $productColor = $boldColors[$colorIndex];
                    $textColor = $textColors[$colorIndex];
                @endphp
                <div class="product-card" data-color="{{ $productColor }}">
                    <div class="bold-badge">Bold</div>
                    <div class="product-image-container">
                        <div class="color-block-image" style="background-color: #{{ $productColor }};">
                            <div class="geometric-shape"></div>
                        </div>
                        <div class="product-overlay">
                            <button class="quick-view">View Details</button>
                        </div>
                    </div>
                    <div class="product-info">
                        <h3 class="product-title">{{ trim($product) }}</h3>
                        <p class="product-description">Eye-catching {{ $business->industry }} piece</p>
                        <div class="product-footer">
                            <p class="product-price">${{ rand(75, 250) }}.00</p>
                            <button class="add-to-cart" 
                                    data-product="{{ trim($product) }}" 
                                    data-price="{{ rand(75, 250) }}"
                                    data-color="{{ $productColor }}">
                                <i class="fas fa-plus"></i>
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
                <h2 class="section-title">Design Elements</h2>
                <p class="section-subtitle">What makes our pieces stand out</p>
            </div>
            <div class="features-grid">
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-palette"></i>
                    </div>
                    <h3>Vibrant Colors</h3>
                    <p>Bold, saturated hues that command attention and create impact</p>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-vector-square"></i>
                    </div>
                    <h3>Geometric Forms</h3>
                    <p>Clean, graphic shapes that create visual interest and modern appeal</p>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-gem"></i>
                    </div>
                    <h3>Premium Materials</h3>
                    <p>High-quality materials that ensure durability and luxury feel</p>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </div>
                    <h3>Statement Scale</h3>
                    <p>Bold proportions that transform any space into a focal point</p>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="about">
        <div class="container">
            <div class="about-grid">
                <div class="about-content">
                    <h2 class="section-title">Bold Vision</h2>
                    <p class="about-description">
                        {{ $business->name }} was founded on the belief that design should be fearless, expressive, 
                        and unapologetically bold. We create {{ $business->products }} that don't just fill space—they 
                        transform it.
                    </p>
                    <p class="about-description">
                        Our pieces are designed for those who aren't afraid to make a statement, who appreciate 
                        the power of color and form, and who understand that great design is meant to be noticed.
                    </p>
                    <div class="bold-stats">
                        <div class="bold-stat">
                            <span class="stat-number">100%</span>
                            <span class="stat-label">Bold Designs</span>
                        </div>
                        <div class="bold-stat">
                            <span class="stat-number">24</span>
                            <span class="stat-label">Vibrant Colors</span>
                        </div>
                        <div class="bold-stat">
                            <span class="stat-number">500+</span>
                            <span class="stat-label">Happy Clients</span>
                        </div>
                    </div>
                </div>
                <div class="about-visual">
                    <div class="color-block-composition">
                        <div class="composition-block block-1"></div>
                        <div class="composition-block block-2"></div>
                        <div class="composition-block block-3"></div>
                        <div class="composition-block block-4"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Client Reactions</h2>
                <p class="section-subtitle">What people say about our bold designs</p>
            </div>
            <div class="testimonials-grid">
                <div class="testimonial-item">
                    <div class="testimonial-content">
                        <p>"The {{ $business->products }} from {{ $business->name }} completely transformed my space. The bold colors and graphic shapes create such an incredible focal point—everyone comments on them!"</p>
                    </div>
                    <div class="testimonial-author">
                        <h4>Marcus Johnson</h4>
                        <p>Interior Designer</p>
                    </div>
                </div>
                <div class="testimonial-item">
                    <div class="testimonial-content">
                        <p>"I was hesitant about going bold, but {{ $business->name }}'s pieces are perfectly designed. They make a statement without overwhelming the space. Absolutely love them!"</p>
                    </div>
                    <div class="testimonial-author">
                        <h4>Sarah Chen</h4>
                        <p>Art Director</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section id="faq" class="faq">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Bold Questions</h2>
                <p class="section-subtitle">Everything about our statement pieces</p>
            </div>
            
            <div class="faq-grid">
                <div class="faq-item">
                    <div class="faq-question">
                        <span>How do I incorporate bold pieces into my existing decor?</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Bold pieces work best as focal points. Start with one statement item and build around it with neutral tones. Our pieces are designed to stand out while complementing various styles. Many clients find that our bold items actually help tie together diverse elements in a space.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">
                        <span>Are the colors as vibrant in person as they appear online?</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Yes! We use high-quality materials and precise color matching to ensure our pieces are just as vibrant in person. We've optimized our photography to represent the true colors as accurately as possible. Many customers are pleasantly surprised that the colors are even more impressive in real life.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">
                        <span>Do you offer custom color options?</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>We do offer limited custom color options for certain pieces. Our design team can work with you to create something truly unique that fits your space perfectly. Custom orders typically take 2-3 weeks longer than our standard pieces.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">
                        <span>How do I care for and maintain bold-colored items?</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Our pieces are designed for both beauty and durability. Most items can be cleaned with a soft, damp cloth. We use UV-resistant materials where appropriate to prevent fading. Each product comes with specific care instructions to ensure your bold piece stays vibrant for years to come.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="contact">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Make a Statement</h2>
                <p class="section-subtitle">Ready to transform your space with bold design?</p>
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
                            <p>(555) 123-BOLD</p>
                        </div>
                    </div>
                    <div class="contact-info-item">
                        <div class="contact-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="contact-details">
                            <h4>Studio</h4>
                            <p>123 Design District<br>Creative City, CC 90210</p>
                        </div>
                    </div>
                    <div class="contact-info-item">
                        <div class="contact-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="contact-details">
                            <h4>Hours</h4>
                            <p>Monday - Friday: 10AM-7PM<br>Saturday: 11AM-6PM</p>
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
                            <textarea placeholder="Tell us about your vision..." rows="5" required></textarea>
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
                <h2>Join the Bold Movement</h2>
                <p>Get updates on new collections, design tips, and exclusive offers</p>
                <form class="newsletter-form" id="newsletterForm">
                    <div class="newsletter-input-group">
                        <input type="email" placeholder="Enter your email address" required>
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
    // Bold color scheme
    $primaryColor = $business->color ?: 'FF5252'; // Vibrant red
    $secondaryColor = '2196F3'; // Bright blue
    $accentColor = 'FFEB3B'; // Yellow
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
            --border-radius: 8px;
            --shadow: 0 8px 25px rgba(0,0,0,0.15);
            --transition: all 0.3s ease;
            --bold-gradient: linear-gradient(135deg, #' . $primaryColor . ' 0%, #' . $secondaryColor . ' 100%);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Montserrat", "Poppins", sans-serif;
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
            border-bottom: 2px solid var(--primary-color);
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
            font-weight: 800;
            color: var(--primary-color);
            letter-spacing: -1px;
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
            color: white;
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
        .colorblock-hero {
            background: linear-gradient(135deg, #FFFFFF 0%, #F5F5F5 100%);
            color: var(--text-color);
            padding: 12rem 0 8rem;
            position: relative;
        }

        .hero-content {
            position: relative;
            z-index: 2;
            max-width: 600px;
        }

        .colorblock-hero h1 {
            font-size: 4rem;
            font-weight: 800;
            margin-bottom: 1rem;
            line-height: 1.1;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero-subtitle {
            font-size: 1.5rem;
            margin-bottom: 1rem;
            font-weight: 600;
            color: var(--text-color);
        }

        .hero-description {
            font-size: 1.1rem;
            margin-bottom: 3rem;
            color: #666;
        }

        .hero-actions {
            display: flex;
            gap: 1.5rem;
        }

        .btn {
            padding: 1.2rem 2.5rem;
            border: none;
            border-radius: var(--border-radius);
            font-weight: 700;
            text-decoration: none;
            transition: var(--transition);
            cursor: pointer;
            font-size: 1rem;
            display: inline-block;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .btn-primary {
            background: var(--primary-color);
            color: white;
            box-shadow: var(--shadow);
        }

        .btn-primary:hover {
            background: var(--secondary-color);
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(0,0,0,0.2);
        }

        .btn-secondary {
            background: transparent;
            color: var(--text-color);
            border: 3px solid var(--text-color);
        }

        .btn-secondary:hover {
            background: var(--text-color);
            color: white;
            transform: translateY(-3px);
        }

        .hero-visual {
            position: absolute;
            right: 5%;
            top: 50%;
            transform: translateY(-50%);
            width: 45%;
        }

        .color-block-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            grid-template-rows: repeat(2, 1fr);
            gap: 20px;
            width: 300px;
            height: 300px;
        }

        .color-block {
            border-radius: 15px;
            animation: float 4s ease-in-out infinite;
        }

        .block-1 {
            background: var(--primary-color);
            animation-delay: 0s;
        }

        .block-2 {
            background: var(--secondary-color);
            animation-delay: 1s;
        }

        .block-3 {
            background: var(--accent-color);
            animation-delay: 2s;
        }

        .block-4 {
            background: var(--text-color);
            animation-delay: 3s;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-15px); }
        }

        /* Section Headers */
        .section-header {
            text-align: center;
            margin-bottom: 4rem;
        }

        .section-title {
            font-size: 3rem;
            font-weight: 800;
            color: var(--text-color);
            margin-bottom: 1rem;
            text-transform: uppercase;
            letter-spacing: -1px;
        }

        .section-subtitle {
            font-size: 1.2rem;
            color: #666;
            font-weight: 500;
        }

        /* Products Section */
        .products {
            padding: 6rem 0;
            background: #FAFAFA;
        }

        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2.5rem;
        }

        .product-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: var(--transition);
            position: relative;
        }

        .product-card:hover {
            transform: translateY(-10px) rotate(2deg);
            box-shadow: 0 20px 40px rgba(0,0,0,0.2);
        }

        .bold-badge {
            position: absolute;
            top: 15px;
            left: 15px;
            background: white;
            color: var(--primary-color);
            padding: 0.5rem 1rem;
            border-radius: 25px;
            font-size: 0.8rem;
            font-weight: 800;
            z-index: 2;
            text-transform: uppercase;
            letter-spacing: 1px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        .product-image-container {
            position: relative;
            overflow: hidden;
            height: 250px;
        }

        .color-block-image {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: var(--transition);
        }

        .geometric-shape {
            width: 100px;
            height: 100px;
            background: rgba(255, 255, 255, 0.2);
            clip-path: polygon(50% 0%, 100% 50%, 50% 100%, 0% 50%);
        }

        .product-card:hover .color-block-image {
            transform: scale(1.1);
        }

        .product-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0,0,0,0.8);
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
            border-radius: var(--border-radius);
            cursor: pointer;
            font-weight: 700;
            transition: var(--transition);
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .quick-view:hover {
            background: var(--primary-color);
            color: white;
            transform: scale(1.05);
        }

        .product-info {
            padding: 2rem;
        }

        .product-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            color: var(--text-color);
        }

        .product-description {
            color: #666;
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
            color: white;
            border: none;
            padding: 1rem 1.5rem;
            border-radius: var(--border-radius);
            cursor: pointer;
            font-weight: 700;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 0.5rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .add-to-cart:hover {
            background: var(--secondary-color);
            transform: translateY(-2px);
        }

        /* Features Section */
        .features {
            padding: 5rem 0;
            background: white;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
        }

        .feature-item {
            text-align: center;
            padding: 2.5rem 1.5rem;
            background: #FAFAFA;
            border-radius: 15px;
            transition: var(--transition);
            box-shadow: var(--shadow);
            border: 3px solid transparent;
        }

        .feature-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.15);
            border-color: var(--primary-color);
        }

        .feature-icon {
            width: 80px;
            height: 80px;
            background: var(--bold-gradient);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            font-size: 2rem;
            color: white;
        }

        .feature-item h3 {
            font-size: 1.3rem;
            margin-bottom: 1rem;
            color: var(--text-color);
            font-weight: 700;
        }

        .feature-item p {
            color: #666;
            line-height: 1.6;
        }

        /* About Section */
        .about {
            padding: 6rem 0;
            background: #FAFAFA;
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
            color: #666;
            margin-bottom: 2rem;
            line-height: 1.8;
            font-size: 1.1rem;
        }

        .bold-stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2rem;
            margin-top: 3rem;
        }

        .bold-stat {
            text-align: center;
            padding: 1.5rem;
            background: white;
            border-radius: 15px;
            box-shadow: var(--shadow);
            transition: var(--transition);
        }

        .bold-stat:hover {
            transform: translateY(-5px);
        }

        .stat-number {
            display: block;
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--primary-color);
            margin-bottom: 0.5rem;
        }

        .stat-label {
            font-size: 0.9rem;
            color: #666;
            font-weight: 600;
        }

        .about-visual {
            position: relative;
        }

        .color-block-composition {
            position: relative;
            width: 100%;
            height: 400px;
        }

        .composition-block {
            position: absolute;
            border-radius: 15px;
            transition: var(--transition);
        }

        .block-1 {
            width: 150px;
            height: 150px;
            top: 50px;
            left: 50px;
            background: var(--primary-color);
            animation: float 4s ease-in-out infinite;
        }

        .block-2 {
            width: 120px;
            height: 120px;
            top: 150px;
            right: 50px;
            background: var(--secondary-color);
            animation: float 5s ease-in-out infinite;
            animation-delay: 1s;
        }

        .block-3 {
            width: 100px;
            height: 100px;
            bottom: 50px;
            left: 100px;
            background: var(--accent-color);
            animation: float 6s ease-in-out infinite;
            animation-delay: 2s;
        }

        .block-4 {
            width: 80px;
            height: 80px;
            bottom: 100px;
            right: 100px;
            background: var(--text-color);
            animation: float 7s ease-in-out infinite;
            animation-delay: 3s;
        }

        /* Testimonials Section */
        .testimonials {
            padding: 5rem 0;
            background: white;
        }

        .testimonials-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
            gap: 2rem;
        }

        .testimonial-item {
            background: #FAFAFA;
            padding: 2.5rem;
            border-radius: 15px;
            box-shadow: var(--shadow);
            transition: var(--transition);
            border-left: 5px solid var(--primary-color);
        }

        .testimonial-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.15);
        }

        .testimonial-content {
            color: #666;
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
            font-weight: 700;
        }

        .testimonial-author p {
            color: #666;
            font-size: 0.9rem;
        }

        /* FAQ Section */
        .faq {
            padding: 6rem 0;
            background: #FAFAFA;
        }

        .faq-grid {
            max-width: 800px;
            margin: 0 auto;
        }

        .faq-item {
            background: white;
            border-radius: 15px;
            margin-bottom: 1rem;
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: var(--transition);
        }

        .faq-item:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.15);
        }

        .faq-question {
            padding: 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
            font-weight: 700;
            color: var(--text-color);
            background: white;
        }

        .faq-answer {
            padding: 0 1.5rem 1.5rem;
            display: none;
            color: #666;
            line-height: 1.6;
        }

        .faq-active .faq-answer {
            display: block;
        }

        /* Contact Section */
        .contact {
            padding: 6rem 0;
            background: white;
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
            background: var(--bold-gradient);
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
            font-weight: 700;
        }

        .contact-details p {
            color: #666;
        }

        .contact-form {
            background: #FAFAFA;
            padding: 2.5rem;
            border-radius: 15px;
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
            border: 2px solid #EEE;
            border-radius: var(--border-radius);
            background: white;
            color: var(--text-color);
            font-family: inherit;
            transition: var(--transition);
            font-weight: 500;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(255, 82, 82, 0.2);
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
            border-radius: var(--border-radius);
            cursor: pointer;
            font-weight: 700;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 0.5rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .submit-btn:hover {
            background: var(--secondary-color);
            transform: translateY(-2px);
        }

        /* Newsletter Section */
        .newsletter {
            background: var(--bold-gradient);
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
            font-weight: 500;
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
            font-weight: 700;
        }

        .newsletter-input-group button:hover {
            background: white;
            color: var(--text-color);
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
            font-weight: 700;
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
            .colorblock-hero {
                padding: 8rem 0 4rem;
            }
            
            .colorblock-hero h1 {
                font-size: 3rem;
            }
            
            .hero-actions {
                flex-direction: column;
                align-items: center;
            }
            
            .products-grid {
                grid-template-columns: 1fr;
            }
            
            .bold-stats {
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
            .colorblock-hero h1 {
                font-size: 2.5rem;
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

    // Add to cart color matching
    const addToCartButtons = document.querySelectorAll('.add-to-cart');
    addToCartButtons.forEach(button => {
        button.addEventListener('mouseenter', () => {
            const color = button.getAttribute('data-color');
            button.style.backgroundColor = '#' + color;
        });
        
        button.addEventListener('mouseleave', () => {
            button.style.backgroundColor = 'var(--primary-color)';
        });
    });

    // Animate elements on scroll
    const animatedElements = document.querySelectorAll('.feature-item, .product-card, .testimonial-item');
    
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