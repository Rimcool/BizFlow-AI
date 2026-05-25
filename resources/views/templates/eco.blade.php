@extends('templates.layout')

@section('content')
    <!-- Hero Section -->
    <section class="eco-hero">
        <div class="container">
            <div class="hero-content">
                <h1>{{ $business->name }}</h1>
                <p class="hero-subtitle">Sustainable {{ $business->industry }} for a Greener Future</p>
                <p class="hero-description">Eco-friendly solutions for {{ $business->target }} who care about our planet</p>
                <div class="hero-actions">
                    <a href="#products" class="btn btn-primary">Explore Products</a>
                    <a href="#about" class="btn btn-secondary">Our Mission</a>
                </div>
            </div>
            <div class="hero-visual">
                <div class="nature-elements">
                    <div class="leaf-element"></div>
                    <div class="leaf-element"></div>
                    <div class="leaf-element"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Products Section -->
    <section id="products" class="products">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Eco-Friendly Products</h2>
                <p class="section-subtitle">Sustainable choices for conscious living</p>
            </div>
            <div class="products-grid">
                @php
                    $products = explode(',', $business->products);
                    $allProducts = $products;
                    if (count($products) < 6) {
                        $variations = ['Organic', 'Sustainable', 'Natural', 'Eco', 'Green', 'Earth-Friendly'];
                        $ecoColors = ['8FBC8F', '3CB371', '2E8B57', '228B22', '006400', '556B2F'];
                        for ($i = count($products); $i < 6; $i++) {
                            $allProducts[] = $variations[$i] . ' ' . $products[0];
                        }
                    }
                @endphp
                
                @foreach(array_slice($allProducts, 0, 6) as $index => $product)
                @php
                    $ecoColors = ['8FBC8F', '3CB371', '2E8B57', '228B22', '006400', '556B2F'];
                    $textColors = ['FFFFFF', 'FFFFFF', 'FFFFFF', 'FFFFFF', 'FFFFFF', 'FFFFFF'];
                    $colorIndex = $index % count($ecoColors);
                    $productColor = $ecoColors[$colorIndex];
                    $textColor = $textColors[$colorIndex];
                @endphp
                <div class="product-card" data-color="{{ $productColor }}">
                    <div class="eco-badge">Eco-Friendly</div>
                    <div class="product-image-container">
                        <img src="https://via.placeholder.com/400x300/{{ $productColor }}/{{ $textColor }}?text={{ urlencode(trim($product)) }}" alt="{{ trim($product) }}" class="product-image">
                        <div class="product-overlay">
                            <button class="quick-view">Quick View</button>
                        </div>
                    </div>
                    <div class="product-info">
                        <h3 class="product-title">{{ trim($product) }}</h3>
                        <p class="product-description">Sustainable {{ $business->industry }} product made with eco-friendly materials</p>
                        <div class="eco-features">
                            <span class="eco-tag">Organic</span>
                            <span class="eco-tag">Biodegradable</span>
                            <span class="eco-tag">Sustainable</span>
                        </div>
                        <div class="product-footer">
                            <p class="product-price">${{ rand(25, 120) }}.00</p>
                            <button class="add-to-cart" 
                                    data-product="{{ trim($product) }}" 
                                    data-price="{{ rand(25, 120) }}"
                                    data-image="https://via.placeholder.com/400x300/{{ $productColor }}/{{ $textColor }}?text={{ urlencode(trim($product)) }}">
                                <i class="fas fa-leaf"></i>
                                Add to Cart
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Sustainability Section -->
    <section class="sustainability">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Our Sustainability Commitment</h2>
                <p class="section-subtitle">Making a positive impact on our planet</p>
            </div>
            <div class="sustainability-grid">
                <div class="sustainability-item">
                    <div class="sustainability-icon">
                        <i class="fas fa-recycle"></i>
                    </div>
                    <h3>Recycled Materials</h3>
                    <p>All our products use recycled and upcycled materials to reduce waste</p>
                </div>
                <div class="sustainability-item">
                    <div class="sustainability-icon">
                        <i class="fas fa-leaf"></i>
                    </div>
                    <h3>Carbon Neutral</h3>
                    <p>We offset our carbon footprint through verified environmental projects</p>
                </div>
                <div class="sustainability-item">
                    <div class="sustainability-icon">
                        <i class="fas fa-truck"></i>
                    </div>
                    <h3>Eco Shipping</h3>
                    <p>All shipments use biodegradable packaging and carbon-neutral delivery</p>
                </div>
                <div class="sustainability-item">
                    <div class="sustainability-icon">
                        <i class="fas fa-hand-holding-heart"></i>
                    </div>
                    <h3>Ethical Sourcing</h3>
                    <p>We partner with suppliers who share our commitment to people and planet</p>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="about">
        <div class="container">
            <div class="about-grid">
                <div class="about-content">
                    <h2 class="section-title">Our Green Journey</h2>
                    <p class="about-description">
                        {{ $business->name }} was founded on a simple belief: business can be a force for good. 
                        We create {{ $business->products }} that not only serve {{ $business->target }} but also 
                        protect our precious planet.
                    </p>
                    <p class="about-description">
                        Every product we make is designed with sustainability at its core, from sourcing 
                        to production to delivery. We're committed to leaving the world better than we found it.
                    </p>
                    <div class="impact-stats">
                        <div class="impact-stat">
                            <span class="stat-number">5,280</span>
                            <span class="stat-label">Trees Planted</span>
                        </div>
                        <div class="impact-stat">
                            <span class="stat-number">87%</span>
                            <span class="stat-label">Waste Reduction</span>
                        </div>
                        <div class="impact-stat">
                            <span class="stat-number">100%</span>
                            <span class="stat-label">Carbon Neutral</span>
                        </div>
                    </div>
                </div>
                <div class="about-visual">
                    <div class="nature-frame">
                        <img src="https://via.placeholder.com/500x400/8FBC8F/FFFFFF?text=Sustainable+Future" alt="{{ $business->name }}">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section id="faq" class="faq">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Eco Questions</h2>
                <p class="section-subtitle">Everything you need to know about our sustainable practices</p>
            </div>
            
            <div class="faq-grid">
                <div class="faq-item">
                    <div class="faq-question">
                        <span>What makes your products eco-friendly?</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Our {{ $business->products }} are made from sustainable, organic, and recycled materials. We use environmentally responsible manufacturing processes and ensure all packaging is biodegradable or recyclable.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">
                        <span>Are your products certified organic/sustainable?</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Yes! We hold several certifications including Organic Content Standard, Global Organic Textile Standard, and Forest Stewardship Council certification where applicable.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">
                        <span>How do you offset your carbon footprint?</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>We partner with verified carbon offset programs that support reforestation, renewable energy, and community-based sustainability projects around the world.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">
                        <span>What is your packaging made from?</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>We use 100% recycled and biodegradable materials for all our packaging. Our shipping materials are either compostable or easily recyclable through standard municipal programs.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Earth-Friendly Reviews</h2>
                <p class="section-subtitle">What our eco-conscious community is saying</p>
            </div>
            <div class="testimonials-grid">
                <div class="testimonial-item">
                    <div class="testimonial-content">
                        <p>"I love that I can enjoy beautiful {{ $business->products }} without compromising my environmental values. {{ $business->name }} proves sustainability and quality can go hand in hand."</p>
                    </div>
                    <div class="testimonial-author">
                        <h4>Emma Green</h4>
                        <p>Environmental Advocate</p>
                    </div>
                </div>
                <div class="testimonial-item">
                    <div class="testimonial-content">
                        <p>"Finally, a company that takes sustainability as seriously as I do! The {{ $business->products }} are not only eco-friendly but also incredibly well-made and beautiful."</p>
                    </div>
                    <div class="testimonial-author">
                        <h4>David Earth</h4>
                        <p>Sustainability Consultant</p>
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
                <p class="section-subtitle">We'd love to hear about your sustainability journey</p>
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
                            <p>(555) 123-GREEN</p>
                        </div>
                    </div>
                    <div class="contact-info-item">
                        <div class="contact-icon">
                            <i class="fas fa-seedling"></i>
                        </div>
                        <div class="contact-details">
                            <h4>Eco Initiatives</h4>
                            <p>Join our sustainability newsletter</p>
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
                            <textarea placeholder="Your Green Message" rows="5" required></textarea>
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
                <h2>Join Our Green Community</h2>
                <p>Receive eco-tips, new sustainable products, and special offers</p>
                <form class="newsletter-form" id="newsletterForm">
                    <div class="newsletter-input-group">
                        <input type="email" placeholder="Enter your email address" required>
                        <button type="submit">
                            <i class="fas fa-leaf"></i>
                            Subscribe
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@php
    // Eco-friendly color scheme
    $primaryColor = $business->color ?: '#3CB371'; // Medium sea green
    $secondaryColor = '#8FBC8F'; // Dark sea green
    $accentColor = '#2E8B57'; // Sea green
    $textColor = '#2F4F4F'; // Dark slate gray
    $lightColor = '#F5FFFA'; // Mint cream
    $darkColor = '#228B22'; // Forest green
    
    $templateStyles = '
        :root {
            --primary-color: ' . $primaryColor . ';
            --secondary-color: ' . $secondaryColor . ';
            --accent-color: ' . $accentColor . ';
            --text-color: ' . $textColor . ';
            --light-color: ' . $lightColor . ';
            --dark-color: ' . $darkColor . ';
            --border-radius: 16px;
            --shadow: 0 8px 25px rgba(0,0,0,0.08);
            --transition: all 0.3s ease;
            --gradient: linear-gradient(135deg, ' . $primaryColor . ' 0%, ' . $secondaryColor . ' 100%);
            --nature-gradient: linear-gradient(135deg, #3CB371 0%, #8FBC8F 25%, #2E8B57 50%, #228B22 100%);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: \'Montserrat\', \'Open Sans\', sans-serif;
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
            background: rgba(245, 255, 250, 0.95);
            backdrop-filter: blur(10px);
            padding: 1.5rem 0;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            transition: var(--transition);
            border-bottom: 1px solid rgba(46, 139, 87, 0.1);
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
            color: var(--dark-color);
            letter-spacing: 0.5px;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .logo:before {
            content: "🌱";
            font-size: 1.8rem;
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
            background: var(--accent-color);
            color: white;
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
        .eco-hero {
            background: var(--nature-gradient);
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

        .eco-hero h1 {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            line-height: 1.2;
        }

        .hero-subtitle {
            font-size: 1.5rem;
            margin-bottom: 1rem;
            font-weight: 400;
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
            color: var(--dark-color);
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
            color: var(--dark-color);
            transform: translateY(-3px);
        }

        .hero-visual {
            position: absolute;
            right: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 45%;
            opacity: 0.8;
        }

        .nature-elements {
            position: relative;
            height: 300px;
        }

        .leaf-element {
            position: absolute;
            background: rgba(255, 255, 255, 0.3);
            border-radius: 50% 0 50% 50%;
            transform: rotate(45deg);
            animation: float 6s ease-in-out infinite;
        }

        .leaf-element:nth-child(1) {
            width: 80px;
            height: 80px;
            top: 20px;
            right: 100px;
            animation-delay: 0s;
        }

        .leaf-element:nth-child(2) {
            width: 60px;
            height: 60px;
            top: 100px;
            right: 200px;
            animation-delay: 2s;
            transform: rotate(135deg);
        }

        .leaf-element:nth-child(3) {
            width: 100px;
            height: 100px;
            bottom: 50px;
            right: 50px;
            animation-delay: 4s;
            transform: rotate(225deg);
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(45deg); }
            50% { transform: translateY(-20px) rotate(55deg); }
        }

        /* Section Headers */
        .section-header {
            text-align: center;
            margin-bottom: 4rem;
        }

        .section-title {
            font-size: 2.8rem;
            font-weight: 700;
            color: var(--dark-color);
            margin-bottom: 1rem;
        }

        .section-subtitle {
            font-size: 1.2rem;
            color: var(--text-color);
            font-weight: 400;
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
            background: white;
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

        .eco-badge {
            position: absolute;
            top: 15px;
            left: 15px;
            background: var(--accent-color);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            z-index: 2;
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
            background: white;
            color: var(--dark-color);
            border: none;
            padding: 0.8rem 1.5rem;
            border-radius: var(--border-radius);
            cursor: pointer;
            font-weight: 600;
            transition: var(--transition);
        }

        .quick-view:hover {
            background: var(--dark-color);
            color: white;
        }

        .product-info {
            padding: 2rem;
        }

        .product-title {
            font-size: 1.4rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: var(--dark-color);
        }

        .product-description {
            color: var(--text-color);
            margin-bottom: 1.5rem;
            font-size: 0.9rem;
        }

        .eco-features {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            margin-bottom: 1.5rem;
        }

        .eco-tag {
            background: var(--light-color);
            color: var(--dark-color);
            padding: 0.3rem 0.8rem;
            border-radius: 15px;
            font-size: 0.7rem;
            font-weight: 600;
        }

        .product-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .product-price {
            font-size: 1.4rem;
            font-weight: 700;
            color: var(--dark-color);
        }

        .add-to-cart {
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

        .add-to-cart:hover {
            background: var(--dark-color);
            transform: translateY(-2px);
        }

        /* Sustainability Section */
        .sustainability {
            padding: 5rem 0;
            background: white;
        }

        .sustainability-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
        }

        .sustainability-item {
            text-align: center;
            padding: 2.5rem 1.5rem;
            background: var(--light-color);
            border-radius: var(--border-radius);
            transition: var(--transition);
            box-shadow: var(--shadow);
        }

        .sustainability-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
        }

        .sustainability-icon {
            width: 80px;
            height: 80px;
            background: var(--gradient);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            font-size: 2rem;
            color: white;
        }

        .sustainability-item h3 {
            font-size: 1.3rem;
            margin-bottom: 1rem;
            color: var(--dark-color);
        }

        .sustainability-item p {
            color: var(--text-color);
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

        .impact-stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2rem;
            margin-top: 3rem;
        }

        .impact-stat {
            text-align: center;
            padding: 1.5rem;
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
        }

        .stat-number {
            display: block;
            font-size: 2rem;
            font-weight: 700;
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

        .nature-frame {
            padding: 15px;
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            border: 2px solid var(--primary-color);
        }

        .nature-frame img {
            width: 100%;
            border-radius: calc(var(--border-radius) - 5px);
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
            font-weight: 600;
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
            background: var(--gradient);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1.5rem;
            color: white;
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
            box-shadow: 0 0 0 3px rgba(60, 179, 113, 0.2);
        }

        .form-group textarea {
            min-height: 150px;
            resize: vertical;
        }

        .submit-btn {
            background: var(--dark-color);
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
        }

        .submit-btn:hover {
            background: var(--accent-color);
            transform: translateY(-2px);
        }

        /* Newsletter Section */
        .newsletter {
            background: var(--nature-gradient);
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
            font-weight: 700;
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
            background: var(--dark-color);
            color: white;
            border: none;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .newsletter-input-group button:hover {
            background: var(--accent-color);
        }

        /* Footer */
        .footer {
            background: var(--dark-color);
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
            color: white;
        }

        .footer-bottom {
            text-align: center;
            padding-top: 2rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: rgba(255, 255, 255, 0.7);
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
            .eco-hero {
                padding: 8rem 0 4rem;
            }
            
            .eco-hero h1 {
                font-size: 2.5rem;
            }
            
            .hero-actions {
                flex-direction: column;
                align-items: center;
            }
            
            .products-grid {
                grid-template-columns: 1fr;
            }
            
            .impact-stats {
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
            .eco-hero h1 {
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