@extends('templates.layout')

@section('content')
    <!-- Hero Section -->
    <section id="home" class="hero">
        <div class="hero-container">
            <div class="hero-content">
                <h1>Explore with <span class="brand-name">{{ $business->name }}</span></h1>
                <p class="hero-subtitle">Discover unforgettable {{ $business->products }} adventures</p>
                <div class="hero-actions">
                    <a href="#destinations" class="btn btn-primary">View Destinations</a>
                    <a href="#about" class="btn btn-secondary">Our Story</a>
                </div>
            </div>
            <div class="hero-visual">
                <div class="adventure-elements">
                    <div class="mountain"></div>
                    <div class="sun"></div>
                    <div class="cloud cloud-1"></div>
                    <div class="cloud cloud-2"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Destinations Section -->
    <section id="destinations" class="destinations">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Adventure Destinations</h2>
                <p class="section-subtitle">Explore the world's most breathtaking places</p>
            </div>
            <div class="destinations-grid">
                @php
                    $destinations = explode(',', $business->products);
                    $allDestinations = $destinations;
                    if (count($destinations) < 6) {
                        $variations = ['Majestic', 'Hidden', 'Ancient', 'Tropical', 'Mystical', 'Wild'];
                        for ($i = count($destinations); $i < 6; $i++) {
                            $allDestinations[] = $variations[$i] . ' ' . $destinations[0];
                        }
                    }
                @endphp
                
                @foreach(array_slice($allDestinations, 0, 6) as $index => $destination)
                @php
                    $adventureColors = ['FF6B6B', '4ECDC4', '45B7D1', 'F9A826', '6A0572', '1A535C'];
                    $colorIndex = $index % count($adventureColors);
                    $destinationColor = $adventureColors[$colorIndex];
                @endphp
                <div class="destination-card">
                    <div class="destination-image-container">
                        <img src="https://via.placeholder.com/400x300/{{ $destinationColor }}/FFFFFF?text={{ urlencode(trim($destination)) }}" alt="{{ trim($destination) }}" class="destination-image">
                        <div class="destination-overlay">
                            <button class="explore-btn">Explore Now</button>
                        </div>
                    </div>
                    <div class="destination-info">
                        <h3 class="destination-title">{{ trim($destination) }}</h3>
                        <p class="destination-description">Experience the adventure of a lifetime</p>
                        <div class="destination-features">
                            <span class="feature"><i class="fas fa-map-marker-alt"></i> Adventure</span>
                            <span class="feature"><i class="fas fa-clock"></i> 7-14 Days</span>
                        </div>
                        <div class="destination-footer">
                            <p class="destination-price">From ${{ rand(499, 2999) }}</p>
                            <button class="book-now" 
                                    data-destination="{{ trim($destination) }}" 
                                    data-price="{{ rand(499, 2999) }}">
                                <i class="fas fa-compass"></i>
                                Book Now
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Adventures Section -->
    <section class="adventures">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Types of Adventures</h2>
                <p class="section-subtitle">Find your perfect travel experience</p>
            </div>
            <div class="adventures-grid">
                <div class="adventure-type">
                    <div class="adventure-icon">
                        <i class="fas fa-hiking"></i>
                    </div>
                    <h3>Trekking</h3>
                    <p>Mountain adventures and wilderness exploration</p>
                </div>
                <div class="adventure-type">
                    <div class="adventure-icon">
                        <i class="fas fa-water"></i>
                    </div>
                    <h3>Water Sports</h3>
                    <p>Diving, surfing, and aquatic adventures</p>
                </div>
                <div class="adventure-type">
                    <div class="adventure-icon">
                        <i class="fas fa-mountain"></i>
                    </div>
                    <h3>Wilderness</h3>
                    <p>Remote locations and untouched nature</p>
                </div>
                <div class="adventure-type">
                    <div class="adventure-icon">
                        <i class="fas fa-city"></i>
                    </div>
                    <h3>Cultural</h3>
                    <p>Historical sites and local experiences</p>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="about">
        <div class="container">
            <div class="about-grid">
                <div class="about-content">
                    <h2 class="section-title">Our Adventure Story</h2>
                    <p class="about-description">
                        {{ $business->name }} was founded by passionate explorers who believe that travel changes lives. 
                        We create unforgettable {{ $business->products }} experiences for {{ $business->target }} 
                        who seek authentic adventures and meaningful connections.
                    </p>
                    <p class="about-description">
                        Our mission is to take you beyond the ordinary and into the extraordinary. 
                        We believe that the best adventures are those that challenge you, inspire you, 
                        and leave you with stories that last a lifetime.
                    </p>
                    <div class="adventure-stats">
                        <div class="stat">
                            <span class="stat-number">50+</span>
                            <span class="stat-label">Destinations</span>
                        </div>
                        <div class="stat">
                            <span class="stat-number">1000+</span>
                            <span class="stat-label">Happy Travelers</span>
                        </div>
                        <div class="stat">
                            <span class="stat-number">15</span>
                            <span class="stat-label">Years Experience</span>
                        </div>
                    </div>
                </div>
                <div class="about-visual">
                    <div class="adventure-frame">
                        <img src="https://via.placeholder.com/500x400/4ECDC4/FFFFFF?text=Adventure+Awaits" alt="{{ $business->name }}" class="about-image">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Traveler Stories</h2>
                <p class="section-subtitle">Hear from adventurers who've explored with us</p>
            </div>
            <div class="testimonials-grid">
                <div class="testimonial-item">
                    <div class="testimonial-content">
                        <p>"The {{ $business->products }} tour with {{ $business->name }} exceeded all expectations. Every moment was perfectly crafted for adventure and discovery."</p>
                    </div>
                    <div class="testimonial-author">
                        <h4>Emma Rodriguez</h4>
                        <p>Adventure Photographer</p>
                    </div>
                </div>
                <div class="testimonial-item">
                    <div class="testimonial-content">
                        <p>"Life-changing experiences and incredible guides. {{ $business->name }} knows how to create authentic adventures that you'll remember forever."</p>
                    </div>
                    <div class="testimonial-author">
                        <h4>Mark Taylor</h4>
                        <p>World Traveler</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section id="faq" class="faq">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Adventure Questions</h2>
                <p class="section-subtitle">Everything you need to know before you go</p>
            </div>
            
            <div class="faq-grid">
                <div class="faq-item">
                    <div class="faq-question">
                        <span>What skill level is required for your adventures?</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>We offer adventures for all skill levels, from beginner-friendly tours to expert-level expeditions. Each adventure is clearly marked with its difficulty level, and our guides are trained to accommodate varying abilities.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">
                        <span>What's included in the adventure package?</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Our packages typically include accommodation, experienced guides, most meals, transportation during the adventure, and all necessary equipment. Flights and travel insurance are usually additional.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">
                        <span>How do I prepare for an adventure trip?</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>We provide detailed preparation guides for each adventure, including fitness recommendations, packing lists, and travel documentation requirements. Our team is always available to answer specific questions.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">
                        <span>What is your cancellation policy?</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>We offer flexible cancellation policies with full refunds available up to 60 days before departure. We also offer trip protection plans for additional flexibility and peace of mind.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="contact">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Start Your Adventure</h2>
                <p class="section-subtitle">Get in touch with our travel experts</p>
            </div>
            
            <div class="contact-grid">
                <div class="contact-info">
                    <div class="contact-info-item">
                        <div class="contact-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="contact-details">
                            <h4>Adventure HQ</h4>
                            <p>123 Explorer's Way, Adventure City, AC 12345</p>
                        </div>
                    </div>
                    <div class="contact-info-item">
                        <div class="contact-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div class="contact-details">
                            <h4>Call Us</h4>
                            <p>(555) 123-EXPLORE</p>
                        </div>
                    </div>
                    <div class="contact-info-item">
                        <div class="contact-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="contact-details">
                            <h4>Email Us</h4>
                            <p>{{ $business->email }}</p>
                        </div>
                    </div>
                    <div class="contact-info-item">
                        <div class="contact-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="contact-details">
                            <h4>Adventure Hours</h4>
                            <p>Mon-Fri: 8am-8pm<br>Sat-Sun: 9am-6pm</p>
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
                            <input type="tel" placeholder="Phone Number" required>
                        </div>
                        <div class="form-group">
                            <select required>
                                <option value="">Adventure Interest</option>
                                @foreach($destinations as $destination)
                                <option value="{{ trim($destination) }}">{{ trim($destination) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <textarea placeholder="Tell us about your dream adventure" rows="5" required></textarea>
                        </div>
                        <button type="submit" class="submit-btn">
                            <i class="fas fa-paper-plane"></i>
                            Plan My Adventure
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
                <h2>Wanderlust Weekly</h2>
                <p>Get inspired with adventure stories, travel tips, and exclusive offers</p>
                <form class="newsletter-form" id="newsletterForm">
                    <div class="newsletter-input-group">
                        <input type="email" placeholder="Enter your email address" required>
                        <button type="submit">
                            <i class="fas fa-globe"></i>
                            Subscribe
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
        <!-- Footer Section -->
    <footer class="footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-section">
                    <h3>{{ $business->name }}</h3>
                    <p>Providing quality {{ $business->products }} for everyone.</p>
                    <div class="newsletter-signup">
                        <h4>Stay Updated</h4>
                        <form class="footer-newsletter-form">
                            <input type="email" placeholder="Enter your email address" required>
                            <button type="submit">Subscribe</button>
                        </form>
                    </div>
                </div>
                
                <div class="footer-section">
                    <h4>Quick Links</h4>
                    <ul class="footer-links">
                        <li><a href="#home">Home</a></li>
                        <li><a href="#destinations">Destinations</a></li>
                        <li><a href="#about">About</a></li>
                        <li><a href="#contact">Contact</a></li>
                    </ul>
                </div>
                
                <div class="footer-section">
                    <h4>Contact Info</h4>
                    <div class="contact-info">
                        <p><i class="fas fa-envelope"></i> {{ $business->email }}</p>
                        <p><i class="fas fa-phone"></i> (555) 123-4567</p>
                    </div>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                
                <div class="footer-section">
                    <h4>Your Cart</h4>
                    <div class="cart-summary">
                        <p>Total: $0.00</p>
                        <a href="#" class="view-cart-btn">View Cart</a>
                    </div>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; 2025 {{ $business->name }}. All rights reserved.</p>
            </div>
        </div>
    </footer>
@endsection

@php
    $primaryColor = $business->color ?: '#FF6B6B';
    $secondaryColor = '#4ECDC4';
    $accentColor = '#45B7D1';
    $textColor = '#2D334A';
    $lightColor = '#F7F9FC';
    $darkColor = '#1A535C';
    
    $templateStyles = '
        :root {
            --primary-color: ' . $primaryColor . ';
            --secondary-color: ' . $secondaryColor . ';
            --accent-color: ' . $accentColor . ';
            --text-color: ' . $textColor . ';
            --light-color: ' . $lightColor . ';
            --dark-color: ' . $darkColor . ';
            --border-radius: 12px;
            --shadow: 0 10px 30px rgba(0,0,0,0.1);
            --transition: all 0.3s ease;
            --gradient: linear-gradient(135deg, ' . $primaryColor . ' 0%, ' . $secondaryColor . ' 100%);
            --adventure-gradient: linear-gradient(135deg, #FF6B6B 0%, #4ECDC4 50%, #45B7D1 100%);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Poppins", "Open Sans", sans-serif;
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
            background: rgba(247, 249, 252, 0.95);
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
            font-weight: 700;
            color: var(--dark-color);
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
        .hero {
            background: var(--adventure-gradient);
            color: white;
            padding: 12rem 0 8rem;
            position: relative;
            overflow: hidden;
        }

        .hero:before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url(\'data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="mountains" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse"><path d="M0 20 L10 10 L20 20 Z" fill="rgba(255,255,255,0.1)"/></pattern></defs><rect width="100" height="100" fill="url(%23mountains)"/></svg>\');
            opacity: 0.3;
        }

        .hero-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: center;
            position: relative;
            z-index: 2;
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .hero h1 {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            line-height: 1.2;
        }

        .brand-name {
            color: white;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }

        .hero-subtitle {
            font-size: 1.3rem;
            margin-bottom: 3rem;
            color: rgba(255, 255, 255, 0.9);
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
            font-weight: 600;
            text-decoration: none;
            transition: var(--transition);
            cursor: pointer;
            font-size: 1rem;
        }

        .btn-primary {
            background: white;
            color: var(--primary-color);
            box-shadow: var(--shadow);
        }

        .btn-primary:hover {
            background: rgba(255, 255, 255, 0.9);
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.2);
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
            position: relative;
            z-index: 1;
            height: 300px;
        }

        .adventure-elements {
            position: relative;
            width: 100%;
            height: 100%;
        }

        .mountain {
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 200px;
            height: 100px;
            background: white;
            clip-path: polygon(0 100%, 50% 0, 100% 100%);
        }

        .sun {
            position: absolute;
            top: 50px;
            right: 50px;
            width: 60px;
            height: 60px;
            background: #FFE066;
            border-radius: 50%;
            box-shadow: 0 0 20px #FFE066;
        }

        .cloud {
            position: absolute;
            background: white;
            border-radius: 50%;
            opacity: 0.8;
            animation: float 8s ease-in-out infinite;
        }

        .cloud-1 {
            width: 40px;
            height: 20px;
            top: 30px;
            left: 40px;
            animation-delay: 0s;
        }

        .cloud-2 {
            width: 60px;
            height: 30px;
            top: 20px;
            right: 80px;
            animation-delay: 2s;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
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
            font-weight: 300;
        }

        /* Destinations Section */
        .destinations {
            padding: 6rem 0;
            background: var(--light-color);
        }

        .destinations-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2.5rem;
        }

        .destination-card {
            background: white;
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: var(--transition);
            position: relative;
        }

        .destination-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }

        .destination-image-container {
            position: relative;
            overflow: hidden;
            height: 250px;
        }

        .destination-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: var(--transition);
        }

        .destination-card:hover .destination-image {
            transform: scale(1.05);
        }

        .destination-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0,0,0,0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: var(--transition);
        }

        .destination-card:hover .destination-overlay {
            opacity: 1;
        }

        .explore-btn {
            background: var(--primary-color);
            color: white;
            border: none;
            padding: 0.8rem 1.5rem;
            border-radius: var(--border-radius);
            cursor: pointer;
            font-weight: 600;
            transition: var(--transition);
        }

        .explore-btn:hover {
            background: var(--secondary-color);
            transform: translateY(-2px);
        }

        .destination-info {
            padding: 2rem;
        }

        .destination-title {
            font-size: 1.4rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: var(--dark-color);
        }

        .destination-description {
            color: var(--text-color);
            margin-bottom: 1rem;
            font-size: 0.9rem;
        }

        .destination-features {
            display: flex;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .feature {
            background: var(--light-color);
            color: var(--text-color);
            padding: 0.3rem 0.8rem;
            border-radius: 20px;
            font-size: 0.8rem;
            display: flex;
            align-items: center;
            gap: 0.3rem;
        }

        .destination-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .destination-price {
            font-size: 1.4rem;
            font-weight: 700;
            color: var(--primary-color);
        }

        .book-now {
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

        .book-now:hover {
            background: var(--secondary-color);
            transform: translateY(-2px);
        }

        /* Adventures Section */
        .adventures {
            padding: 5rem 0;
            background: white;
        }

        .adventures-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
        }

        .adventure-type {
            text-align: center;
            padding: 2.5rem 1.5rem;
            background: var(--light-color);
            border-radius: var(--border-radius);
            transition: var(--transition);
            box-shadow: var(--shadow);
        }

        .adventure-type:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
        }

        .adventure-icon {
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
            transition: var(--transition);
        }

        .adventure-type:hover .adventure-icon {
            transform: scale(1.1) rotate(5deg);
        }

        .adventure-type h3 {
            font-size: 1.3rem;
            margin-bottom: 1rem;
            color: var(--dark-color);
        }

        .adventure-type p {
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
        }

        .adventure-stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2rem;
            margin-top: 3rem;
        }

        .stat {
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
            color: var(--primary-color);
            margin-bottom: 0.5rem;
        }

        .stat-label {
            font-size: 0.9rem;
            color: var(--text-color);
        }

        .about-visual {
            position: relative;
        }

        .adventure-frame {
            padding: 15px;
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
        }

        .about-image {
            width: 100%;
            border-radius: calc(var(--border-radius) - 5px);
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
            position: relative;
        }

        .testimonial-content:before {
            content: "“";   
            font-size: 4rem;
            color: var(--primary-color);
            position: absolute;
            top: -1rem;
            left: -1rem;
            opacity: 0.3;
            line-height: 1;
        }

        .testimonial-content:after {
            content: "”";
            font-size: 4rem;
            color: var(--primary-color);
            position: absolute;
            bottom: -1rem;
            right: -1rem;
            opacity: 0.3;
            line-height: 1;
        }

        .testimonial-author h4 {
            color: var(--dark-color);
            margin-bottom: 0.5rem;
        }

        .testimonial-author p {
            color: var(--text-color);
            font-size: 0.9rem;
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
            background: white;
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
            padding: 1.5rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
            font-weight: 600;
            color: var(--dark-color);
            background: white;
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
            min-height: 150px;
            resize: vertical;
        }

        .submit-btn {
            background: var(--gradient);
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
            opacity: 0.9;
            transform: translateY(-2px);
        }

        /* Newsletter Section */
        .newsletter {
            background: var(--adventure-gradient);
            color: white;
            padding: 5rem 0;
            text-align: center;
        }

        .newsletter-content {
            max-width: 600px;
            margin: 0 auto;
        }

        .newsletter h2 {
            font-size: 2.5rem;
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
            background: #2D334A;
        }
        /* Footer Section */
        .footer {
            background: var(--dark-color);
            color: white;
            padding: 4rem 0 2rem;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 3rem;
            margin-bottom: 3rem;
        }

        .footer-section h3,
        .footer-section h4 {
            color: white;
            margin-bottom: 1.5rem;
            font-size: 1.2rem;
        }

        .footer-section p {
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 1.5rem;
            line-height: 1.6;
        }

        .newsletter-signup h4 {
            margin-top: 2rem;
            margin-bottom: 1rem;
        }

        .footer-newsletter-form {
            display: flex;
            gap: 0.5rem;
        }

        .footer-newsletter-form input {
            flex: 1;
            padding: 0.8rem;
            border: none;
            border-radius: var(--border-radius);
            background: rgba(255, 255, 255, 0.1);
            color: white;
        }

        .footer-newsletter-form input::placeholder {
            color: rgba(255, 255, 255, 0.6);
        }

        .footer-newsletter-form button {
            padding: 0.8rem 1.2rem;
            background: var(--primary-color);
            color: white;
            border: none;
            border-radius: var(--border-radius);
            cursor: pointer;
            transition: var(--transition);
        }

        .footer-newsletter-form button:hover {
            background: var(--secondary-color);
        }

        .footer-links {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 0.8rem;
        }

        .footer-links a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: var(--transition);
        }

        .footer-links a:hover {
            color: var(--primary-color);
        }

        .contact-info p {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 1rem;
        }

        .social-links {
            display: flex;
            gap: 1rem;
            margin-top: 1.5rem;
        }

        .social-links a {
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            transition: var(--transition);
        }

        .social-links a:hover {
            background: var(--primary-color);
            transform: translateY(-3px);
        }

        .cart-summary {
            background: rgba(255, 255, 255, 0.1);
            padding: 1.5rem;
            border-radius: var(--border-radius);
        }

        .cart-summary p {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .view-cart-btn {
            display: inline-block;
            padding: 0.8rem 1.5rem;
            background: var(--primary-color);
            color: white;
            text-decoration: none;
            border-radius: var(--border-radius);
            transition: var(--transition);
        }

        .view-cart-btn:hover {
            background: var(--secondary-color);
            transform: translateY(-2px);
        }

        .footer-bottom {
            text-align: center;
            padding-top: 2rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .footer-bottom p {
            color: rgba(255, 255, 255, 0.6);
            margin: 0;
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
            
            .destinations-grid {
                grid-template-columns: 1fr;
            }
            
            .adventure-stats {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }
            
            .form-row {
                grid-template-columns: 1fr;
            }
            
            .adventure-elements {
                transform: scale(0.8);
            }
            
            .testimonials-grid {
                grid-template-columns: 1fr;
            }
        }
        @media (max-width: 600px) {
            .footer-grid {
                grid-template-columns: 1fr;
                text-align: center;
                gap: 2rem;
            }
            
            .footer-newsletter-form {
                flex-direction: column;
            }
            
            .social-links {
                justify-content: center;
            }
            
            .contact-info p {
                justify-content: center;
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
            
            .adventure-elements {
                display: none;
            }
            
            .destination-footer {
                flex-direction: column;
                gap: 1rem;
                align-items: flex-start;
            }
            
            .book-now {
                width: 100%;
                justify-content: center;
            }
            
            .destination-features {
                flex-direction: column;
                gap: 0.5rem;
            }
        }
    ';
@endphp