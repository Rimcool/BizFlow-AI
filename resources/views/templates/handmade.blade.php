@extends('templates.layout')

@section('content')
    <!-- Hero Section -->
    <section class="handmade-hero">
        <div class="container">
            <div class="hero-content">
                <h1>{{ $business->name }}</h1>
                <p class="hero-subtitle">Handcrafted {{ $business->industry }} with Heart</p>
                <p class="hero-description">Artisanal creations for {{ $business->target }} who appreciate the beauty of handmade</p>
                <div class="hero-actions">
                    <a href="#products" class="btn btn-primary">Discover Creations</a>
                    <a href="#story" class="btn btn-secondary">Our Story</a>
                </div>
            </div>
            <div class="hero-visual">
                <div class="craft-elements">
                    <div class="craft-tool tool-1"></div>
                    <div class="craft-tool tool-2"></div>
                    <div class="craft-material"></div>
                    <div class="stitching"></div>
                </div>
            </div>
        </div>
        <div class="texture-overlay"></div>
    </section>

    <!-- Products Section -->
    <section id="products" class="products">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Handcrafted Collection</h2>
                <p class="section-subtitle">Each piece tells a story of craftsmanship and care</p>
            </div>
            <div class="products-grid">
                @php
                    $products = explode(',', $business->products);
                    $allProducts = $products;
                    if (count($products) < 6) {
                        $variations = ['Artisanal', 'Handmade', 'Crafted', 'Traditional', 'Heritage', 'Custom'];
                        $craftColors = ['8D6E63', 'A1887F', 'BCAAA4', 'D7CCC8', 'EFEBE9', 'F5F5F5'];
                        for ($i = count($products); $i < 6; $i++) {
                            $allProducts[] = $variations[$i] . ' ' . $products[0];
                        }
                    }
                @endphp
                
                @foreach(array_slice($allProducts, 0, 6) as $index => $product)
                @php
                    $craftColors = ['8D6E63', 'A1887F', 'BCAAA4', 'D7CCC8', 'EFEBE9', 'F5F5F5'];
                    $textColors = ['FFFFFF', 'FFFFFF', '333333', '333333', '333333', '333333'];
                    $colorIndex = $index % count($craftColors);
                    $productColor = $craftColors[$colorIndex];
                    $textColor = $textColors[$colorIndex];
                @endphp
                <div class="product-card" data-color="{{ $productColor }}">
                    <div class="handmade-badge">Handmade</div>
                    <div class="product-image-container">
                        <div class="craft-image" style="background-color: #{{ $productColor }};">
                            <div class="texture-pattern"></div>
                        </div>
                        <div class="product-overlay">
                            <button class="quick-view">View Details</button>
                        </div>
                    </div>
                    <div class="product-info">
                        <h3 class="product-title">{{ trim($product) }}</h3>
                        <p class="product-description">Handcrafted {{ $business->industry }} piece</p>
                        <div class="craft-details">
                            <span class="craft-tag">Handmade</span>
                            <span class="craft-tag">Natural Materials</span>
                            <span class="craft-tag">Artisanal</span>
                        </div>
                        <div class="product-footer">
                            <p class="product-price">${{ rand(45, 195) }}.00</p>
                            <button class="add-to-cart" 
                                    data-product="{{ trim($product) }}" 
                                    data-price="{{ rand(45, 195) }}"
                                    data-image="https://via.placeholder.com/400x300/{{ $productColor }}/{{ $textColor }}?text={{ urlencode(trim($product)) }}">
                                <i class="fas fa-hand-sparkles"></i>
                                Add to Cart
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
                <h2 class="section-title">The Art of Handmade</h2>
                <p class="section-subtitle">Traditional techniques meet modern craftsmanship</p>
            </div>
            <div class="craftsmanship-grid">
                <div class="craftsmanship-item">
                    <div class="craft-icon">
                        <i class="fas fa-hand-rock"></i>
                    </div>
                    <h3>Handcrafted</h3>
                    <p>Each piece shaped by skilled hands, not machines</p>
                </div>
                <div class="craftsmanship-item">
                    <div class="craft-icon">
                        <i class="fas fa-leaf"></i>
                    </div>
                    <h3>Natural Materials</h3>
                    <p>Using sustainable, natural materials sourced responsibly</p>
                </div>
                <div class="craftsmanship-item">
                    <div class="craft-icon">
                        <i class="fas fa-heart"></i>
                    </div>
                    <h3>Made with Love</h3>
                    <p>Every creation infused with care and attention to detail</p>
                </div>
                <div class="craftsmanship-item">
                    <div class="craft-icon">
                        <i class="fas fa-award"></i>
                    </div>
                    <h3>Time-Honored Techniques</h3>
                    <p>Preserving traditional methods passed through generations</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Story Section -->
    <section id="story" class="story">
        <div class="container">
            <div class="story-grid">
                <div class="story-content">
                    <h2 class="section-title">Our Craft Story</h2>
                    <p class="story-description">
                        {{ $business->name }} began as a passion project in a small workshop, where the scent of 
                        natural materials and the sound of careful craftsmanship filled the air. Today, we continue 
                        that tradition, creating {{ $business->products }} that honor the art of handmade.
                    </p>
                    <p class="story-description">
                        Each piece in our collection is created using time-honored techniques, with attention to 
                        detail that only human hands can provide. We believe in the beauty of imperfection, the 
                        warmth of natural materials, and the story that each handmade item carries.
                    </p>
                    <div class="craft-stats">
                        <div class="craft-stat">
                            <span class="stat-number">100%</span>
                            <span class="stat-label">Handmade</span>
                        </div>
                        <div class="craft-stat">
                            <span class="stat-number">15+</span>
                            <span class="stat-label">Years Crafting</span>
                        </div>
                        <div class="craft-stat">
                            <span class="stat-number">1 of 1</span>
                            <span class="stat-label">Each Piece Unique</span>
                        </div>
                    </div>
                </div>
                <div class="story-visual">
                    <div class="workshop-scene">
                        <div class="craft-tools">
                            <div class="tool"></div>
                            <div class="tool"></div>
                            <div class="tool"></div>
                        </div>
                        <div class="material-swatch"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Process Section -->
    <section class="process">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Our Making Process</h2>
                <p class="section-subtitle">From raw materials to finished treasure</p>
            </div>
            <div class="process-steps">
                <div class="process-step">
                    <div class="step-number">1</div>
                    <h3>Material Selection</h3>
                    <p>Choosing the finest natural materials with care and consideration</p>
                </div>
                <div class="process-step">
                    <div class="step-number">2</div>
                    <h3>Hand Crafting</h3>
                    <p>Shaping and forming each piece using traditional techniques</p>
                </div>
                <div class="process-step">
                    <div class="step-number">3</div>
                    <h3>Attention to Detail</h3>
                    <p>Adding finishing touches that make each piece unique</p>
                </div>
                <div class="process-step">
                    <div class="step-number">4</div>
                    <h3>Quality Check</h3>
                    <p>Ensuring every piece meets our standards of excellence</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Customer Stories</h2>
                <p class="section-subtitle">What lovers of handmade are saying</p>
            </div>
            <div class="testimonials-grid">
                <div class="testimonial-item">
                    <div class="testimonial-content">
                        <p>"The {{ $business->products }} from {{ $business->name }} are exceptional. You can feel the care and craftsmanship in every piece. They bring warmth and character to our home that mass-produced items simply can't match."</p>
                    </div>
                    <div class="testimonial-author">
                        <h4>Eleanor Matthews</h4>
                        <p>Interior Stylist</p>
                    </div>
                </div>
                <div class="testimonial-item">
                    <div class="testimonial-content">
                        <p>"I appreciate knowing that my purchase supports traditional craftsmanship. Each piece tells a story and has become a conversation starter in our home. The quality is outstanding."</p>
                    </div>
                    <div class="testimonial-author">
                        <h4>James Wilson</h4>
                        <p>Art Collector</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section id="faq" class="faq">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Craft Questions</h2>
                <p class="section-subtitle">About our handmade process and products</p>
            </div>
            
            <div class="faq-grid">
                <div class="faq-item">
                    <div class="faq-question">
                        <span>What makes handmade products different from mass-produced ones?</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Handmade products carry the unique touch of the artisan who created them. Each piece has slight variations that make it one-of-a-kind, unlike identical mass-produced items. The quality of craftsmanship is typically higher, with attention to detail that machines can't replicate. Handmade pieces also support traditional skills and often use better materials than factory-produced equivalents.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">
                        <span>How do you ensure quality in handmade items?</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Quality is built into every step of our process. We start with premium materials, use time-tested techniques, and implement rigorous quality checks. Each artisan is highly skilled in their craft, and every piece is individually inspected before it leaves our workshop. We stand behind the durability and craftsmanship of every item we create.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">
                        <span>Are your materials sustainably sourced?</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Yes, we're committed to ethical and sustainable practices. We source materials from reputable suppliers who share our values, prioritize natural and renewable resources, and minimize waste in our production process. Many of our materials are locally sourced, reducing our carbon footprint and supporting other small businesses.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">
                        <span>Do you accept custom orders?</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Absolutely! We love creating custom pieces for our customers. Whether you have a specific size, color, or design in mind, we can work with you to create something truly special. Custom orders typically take 2-4 weeks depending on complexity, and we'll guide you through the entire process from concept to completion.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="contact">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Visit Our Workshop</h2>
                <p class="section-subtitle">We'd love to share our craft with you</p>
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
                            <p>(555) 123-CRAFT</p>
                        </div>
                    </div>
                    <div class="contact-info-item">
                        <div class="contact-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="contact-details">
                            <h4>Workshop</h4>
                            <p>123 Artisan Lane<br>Craft District, CA 90210</p>
                        </div>
                    </div>
                    <div class="contact-info-item">
                        <div class="contact-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="contact-details">
                            <h4>Studio Hours</h4>
                            <p>Wednesday - Sunday: 11AM-6PM<br>By appointment: Monday & Tuesday</p>
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
                            <textarea placeholder="Tell us about your interest in handmade crafts..." rows="5" required></textarea>
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
                <h2>Join Our Craft Community</h2>
                <p>Receive updates on new creations, crafting stories, and exclusive offers</p>
                <form class="newsletter-form" id="newsletterForm">
                    <div class="newsletter-input-group">
                        <input type="email" placeholder="Enter your email address" required>
                        <button type="submit">
                            <i class="fas fa-heart"></i>
                            Subscribe
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@php
    // Handmade color scheme
    $primaryColor = $business->color ?: '8D6E63'; // Brown
    $secondaryColor = 'A1887F'; // Light brown
    $accentColor = 'D7CCC8'; // Beige
    $textColor = '5D4037'; // Dark brown
    $lightColor = 'F5F5F5'; // Light background
    $darkColor = '4E342E'; // Dark brown
    
    $templateStyles = '
        :root {
            --primary-color: #' . $primaryColor . ';
            --secondary-color: #' . $secondaryColor . ';
            --accent-color: #' . $accentColor . ';
            --text-color: #' . $textColor . ';
            --light-color: #' . $lightColor . ';
            --dark-color: #' . $darkColor . ';
            --border-radius: 8px;
            --shadow: 0 4px 12px rgba(0,0,0,0.1);
            --transition: all 0.3s ease;
            --craft-gradient: linear-gradient(135deg, #8D6E63 0%, #A1887F 100%);
            --texture: url("data:image/svg+xml,%3Csvg width=\'100\' height=\'100\' viewBox=\'0 0 100 100\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cfilter id=\'noise\'%3E%3CfeTurbulence type=\'fractalNoise\' baseFrequency=\'0.9\' numOctaves=\'1\' stitchTiles=\'stitch\'/%3E%3C/filter%3E%3Crect width=\'100\' height=\'100\' filter=\'url(%23noise)\' opacity=\'0.1\'/%3E%3C/svg%3E");
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Merriweather", "Playfair Display", serif;
            line-height: 1.6;
            color: var(--text-color);
            background: var(--light-color);
            overflow-x: hidden;
            background-image: var(--texture);
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Navigation */
        .navbar {
            background: rgba(245, 245, 245, 0.95);
            backdrop-filter: blur(5px);
            padding: 1.5rem 0;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            transition: var(--transition);
            border-bottom: 1px solid rgba(141, 110, 99, 0.1);
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
            color: var(--primary-color);
            letter-spacing: 0.5px;
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
        .handmade-hero {
            background: linear-gradient(135deg, rgba(141, 110, 99, 0.9) 0%, rgba(161, 136, 127, 0.8) 100%);
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

        .handmade-hero h1 {
            font-size: 3.5rem;
            font-weight: 600;
            margin-bottom: 1rem;
            line-height: 1.2;
            font-family: "Playfair Display", serif;
        }

        .hero-subtitle {
            font-size: 1.5rem;
            margin-bottom: 1rem;
            font-weight: 400;
            font-style: italic;
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
            font-weight: 500;
            text-decoration: none;
            transition: var(--transition);
            cursor: pointer;
            font-size: 1rem;
            display: inline-block;
        }

        .btn-primary {
            background: white;
            color: var(--primary-color);
        }

        .btn-primary:hover {
            background: var(--accent-color);
            transform: translateY(-2px);
            box-shadow: var(--shadow);
        }

        .btn-secondary {
            background: transparent;
            color: white;
            border: 2px solid white;
        }

        .btn-secondary:hover {
            background: white;
            color: var(--primary-color);
            transform: translateY(-2px);
        }

        .hero-visual {
            position: absolute;
            right: 5%;
            top: 50%;
            transform: translateY(-50%);
            width: 40%;
        }

        .craft-elements {
            position: relative;
            height: 300px;
        }

        .craft-tool {
            position: absolute;
            background: rgba(255, 255, 255, 0.3);
            border-radius: 4px;
        }

        .tool-1 {
            width: 80px;
            height: 20px;
            top: 50px;
            right: 100px;
            transform: rotate(45deg);
            animation: float 6s ease-in-out infinite;
        }

        .tool-2 {
            width: 60px;
            height: 60px;
            bottom: 70px;
            right: 150px;
            border-radius: 50%;
            animation: float 7s ease-in-out infinite;
            animation-delay: 2s;
        }

        .craft-material {
            position: absolute;
            width: 100px;
            height: 100px;
            top: 100px;
            right: 50px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 8px;
            animation: float 8s ease-in-out infinite;
            animation-delay: 4s;
        }

        .stitching {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 150px;
            height: 2px;
            background: rgba(255, 255, 255, 0.5);
            transform: translate(-50%, -50%) rotate(-30deg);
            animation: stitch 4s ease-in-out infinite;
        }

        .stitching:before, .stitching:after {
            content: "";
            position: absolute;
            width: 10px;
            height: 2px;
            background: inherit;
        }

        .stitching:before {
            top: -5px;
            left: 20px;
            transform: rotate(90deg);
        }

        .stitching:after {
            bottom: -5px;
            right: 20px;
            transform: rotate(90deg);
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(5deg); }
        }

        @keyframes stitch {
            0%, 100% { opacity: 0.5; }
            50% { opacity: 1; }
        }

        .texture-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: var(--texture);
            opacity: 0.1;
            pointer-events: none;
        }

        /* Section Headers */
        .section-header {
            text-align: center;
            margin-bottom: 4rem;
        }

        .section-title {
            font-size: 2.8rem;
            font-weight: 600;
            color: var(--text-color);
            margin-bottom: 1rem;
            font-family: "Playfair Display", serif;
        }

        .section-subtitle {
            font-size: 1.2rem;
            color: var(--text-color);
            font-weight: 400;
            opacity: 0.8;
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
            border: 1px solid rgba(141, 110, 99, 0.1);
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }

        .handmade-badge {
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
            font-style: italic;
        }

        .product-image-container {
            position: relative;
            overflow: hidden;
            height: 250px;
        }

        .craft-image {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: var(--transition);
        }

        .texture-pattern {
            width: 80%;
            height: 80%;
            background: 
                linear-gradient(45deg, transparent 40%, rgba(0,0,0,0.1) 45%, rgba(0,0,0,0.1) 55%, transparent 60%),
                linear-gradient(-45deg, transparent 40%, rgba(0,0,0,0.1) 45%, rgba(0,0,0,0.1) 55%, transparent 60%);
            background-size: 30px 30px;
            opacity: 0.5;
        }

        .product-card:hover .craft-image {
            transform: scale(1.05);
        }

        .product-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(141, 110, 99, 0.8);
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
            padding: 0.8rem 1.5rem;
            border-radius: var(--border-radius);
            cursor: pointer;
            font-weight: 600;
            transition: var(--transition);
        }

        .quick-view:hover {
            background: var(--accent-color);
            color: var(--text-color);
        }

        .product-info {
            padding: 2rem;
        }

        .product-title {
            font-size: 1.4rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: var(--text-color);
        }

        .product-description {
            color: var(--text-color);
            margin-bottom: 1.5rem;
            font-size: 0.9rem;
            opacity: 0.8;
        }

        .craft-details {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            margin-bottom: 1.5rem;
        }

        .craft-tag {
            background: var(--accent-color);
            color: var(--text-color);
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
            color: var(--primary-color);
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

        /* Craftsmanship Section */
        .craftsmanship {
            padding: 5rem 0;
            background: white;
        }

        .craftsmanship-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
        }

        .craftsmanship-item {
            text-align: center;
            padding: 2.5rem 1.5rem;
            background: var(--light-color);
            border-radius: var(--border-radius);
            transition: var(--transition);
            box-shadow: var(--shadow);
            border: 1px solid rgba(141, 110, 99, 0.1);
        }

        .craftsmanship-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        }

        .craft-icon {
            width: 80px;
            height: 80px;
            background: var(--craft-gradient);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            font-size: 2rem;
            color: white;
        }

        .craftsmanship-item h3 {
            font-size: 1.3rem;
            margin-bottom: 1rem;
            color: var(--text-color);
        }

        .craftsmanship-item p {
            color: var(--text-color);
            line-height: 1.6;
            opacity: 0.8;
        }

        /* Story Section */
        .story {
            padding: 6rem 0;
            background: var(--light-color);
        }

        .story-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: center;
        }

        .story-content {
            padding-right: 2rem;
        }

        .story-description {
            color: var(--text-color);
            margin-bottom: 2rem;
            line-height: 1.8;
            font-size: 1.1rem;
        }

        .craft-stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2rem;
            margin-top: 3rem;
        }

        .craft-stat {
            text-align: center;
            padding: 1.5rem;
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            border: 1px solid rgba(141, 110, 99, 0.1);
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
            color: var(--text-color);
            opacity: 0.8;
        }

        .story-visual {
            position: relative;
        }

        .workshop-scene {
            padding: 20px;
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            border: 1px solid rgba(141, 110, 99, 0.1);
        }

        .craft-tools {
            position: relative;
            height: 200px;
        }

        .tool {
            position: absolute;
            background: var(--accent-color);
            border-radius: 4px;
        }

        .tool:nth-child(1) {
            width: 80px;
            height: 15px;
            top: 50px;
            left: 50px;
            transform: rotate(45deg);
        }

        .tool:nth-child(2) {
            width: 60px;
            height: 60px;
            top: 100px;
            right: 50px;
            border-radius: 50%;
        }

        .tool:nth-child(3) {
            width: 100px;
            height: 10px;
            bottom: 50px;
            left: 70px;
            transform: rotate(-30deg);
        }

        .material-swatch {
            width: 100px;
            height: 100px;
            background: var(--primary-color);
            border-radius: 8px;
            margin: 20px auto 0;
            position: relative;
        }

        .material-swatch:before {
            content: "";
            position: absolute;
            top: 10px;
            left: 10px;
            right: 10px;
            bottom: 10px;
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 4px;
        }

        /* Process Section */
        .process {
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
            padding: 2rem 1.5rem;
            background: var(--light-color);
            border-radius: var(--border-radius);
            transition: var(--transition);
            box-shadow: var(--shadow);
            border: 1px solid rgba(141, 110, 99, 0.1);
            position: relative;
        }

        .process-step:before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: var(--craft-gradient);
        }

        .process-step:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        }

        .step-number {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 1rem;
            opacity: 0.3;
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
            border: 1px solid rgba(141, 110, 99, 0.1);
            position: relative;
        }

        .testimonial-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
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
            border: 1px solid rgba(141, 110, 99, 0.1);
        }

        .faq-item:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
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
            background: var(--craft-gradient);
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
            border: 1px solid rgba(141, 110, 99, 0.1);
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
            border: 1px solid rgba(141, 110, 99, 0.2);
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
            box-shadow: 0 0 0 3px rgba(141, 110, 99, 0.1);
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
            font-weight: 600;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .submit-btn:hover {
            background: var(--dark-color);
            transform: translateY(-2px);
        }

        /* Newsletter Section */
        .newsletter {
            background: var(--craft-gradient);
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
            font-weight: 600;
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
            background: var(--text-color);
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
            color: rgba(255, 255, 255, 0.5);
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .story-grid,
            .contact-grid {
                grid-template-columns: 1fr;
                gap: 3rem;
            }
            
            .story-content {
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
            .handmade-hero {
                padding: 8rem 0 4rem;
            }
            
            .handmade-hero h1 {
                font-size: 2.5rem;
            }
            
            .hero-actions {
                flex-direction: column;
                align-items: center;
            }
            
            .products-grid {
                grid-template-columns: 1fr;
            }
            
            .craft-stats {
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
            .handmade-hero h1 {
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

    // Add subtle animations to craft elements
    const craftElements = document.querySelectorAll('.craftsmanship-item, .product-card, .process-step');
    
    craftElements.forEach((element, index) => {
        element.style.opacity = '0';
        element.style.transform = 'translateY(20px)';
        element.style.transition = 'all 0.6s ease';
        
        setTimeout(() => {
            element.style.opacity = '1';
            element.style.transform = 'translateY(0)';
        }, 100 + (index * 100));
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