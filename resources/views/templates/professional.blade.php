@extends('templates.layout')

@section('content')
    <!-- Hero Section -->
    <section class="professional-hero">
        <div class="container">
            <div class="hero-content">
                <h1>{{ $business->name }}</h1>
                <p class="hero-subtitle">Professional {{ $business->industry }} Services</p>
                <p class="hero-description">Expert solutions for {{ $business->target }} with a focus on quality and reliability</p>
                <div class="hero-actions">
                    <a href="#services" class="btn btn-primary">Our Services</a>
                    <a href="#contact" class="btn btn-secondary">Contact Us</a>
                </div>
            </div>
            <div class="hero-visual">
                <div class="professional-graphic">
                    <div class="graphic-element"></div>
                    <div class="graphic-element"></div>
                    <div class="graphic-element"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="services">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Our Professional Services</h2>
                <p class="section-subtitle">Comprehensive solutions tailored to your needs</p>
            </div>
            <div class="services-grid">
                @foreach(explode(',', $business->products) as $service)
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h3>{{ trim($service) }}</h3>
                    <p>Professional {{ trim($service) }} services designed specifically for {{ $business->target }}</p>
                    <a href="#contact" class="service-link">Learn More <i class="fas fa-arrow-right"></i></a>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="about">
        <div class="container">
            <div class="about-grid">
                <div class="about-content">
                    <h2 class="section-title">About {{ $business->name }}</h2>
                    <p class="about-description">
                        {{ $business->name }} is a leading provider of professional {{ $business->industry }} services. 
                        With years of experience and a commitment to excellence, we deliver exceptional results 
                        for {{ $business->target }}.
                    </p>
                    <p class="about-description">
                        Our team of experts combines industry knowledge with innovative approaches to solve 
                        complex challenges and drive sustainable growth for our clients.
                    </p>
                    <div class="professional-stats">
                        <div class="stat">
                            <span class="stat-number">98%</span>
                            <span class="stat-label">Client Satisfaction</span>
                        </div>
                        <div class="stat">
                            <span class="stat-number">15+</span>
                            <span class="stat-label">Years Experience</span>
                        </div>
                        <div class="stat">
                            <span class="stat-number">500+</span>
                            <span class="stat-label">Projects Completed</span>
                        </div>
                    </div>
                </div>
                <div class="about-visual">
                    <div class="professional-frame">
                        <img src="https://via.placeholder.com/500x400/2C3E50/FFFFFF?text=Professional+Excellence" alt="{{ $business->name }}">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Process Section -->
    <section class="process">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Our Professional Process</h2>
                <p class="section-subtitle">A systematic approach to delivering exceptional results</p>
            </div>
            <div class="process-steps">
                <div class="process-step">
                    <div class="step-number">01</div>
                    <h3>Consultation</h3>
                    <p>We begin by understanding your unique needs and challenges</p>
                </div>
                <div class="process-step">
                    <div class="step-number">02</div>
                    <h3>Planning</h3>
                    <p>Developing a customized strategy to achieve your goals</p>
                </div>
                <div class="process-step">
                    <div class="step-number">03</div>
                    <h3>Implementation</h3>
                    <p>Executing the plan with precision and attention to detail</p>
                </div>
                <div class="process-step">
                    <div class="step-number">04</div>
                    <h3>Results</h3>
                    <p>Delivering measurable outcomes and ongoing support</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Client Testimonials</h2>
                <p class="section-subtitle">What our valued clients say about our services</p>
            </div>
            <div class="testimonials-grid">
                <div class="testimonial-item">
                    <div class="testimonial-content">
                        <p>"{{ $business->name }} delivered exceptional results for our organization. Their professional approach and expertise in {{ $business->industry }} exceeded our expectations."</p>
                    </div>
                    <div class="testimonial-author">
                        <h4>Michael Johnson</h4>
                        <p>CEO, TechCorp International</p>
                    </div>
                </div>
                <div class="testimonial-item">
                    <div class="testimonial-content">
                        <p>"The team at {{ $business->name }} demonstrated deep industry knowledge and provided solutions that significantly improved our operations."</p>
                    </div>
                    <div class="testimonial-author">
                        <h4>Sarah Williams</h4>
                        <p>Operations Director, Global Solutions</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section id="faq" class="faq">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Frequently Asked Questions</h2>
                <p class="section-subtitle">Find answers to common questions about our services</p>
            </div>
            
            <div class="faq-grid">
                <div class="faq-item">
                    <div class="faq-question">
                        <span>What industries do you specialize in?</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>We specialize in providing {{ $business->industry }} services for {{ $business->target }}. Our expertise covers a wide range of sectors with a focus on delivering tailored solutions.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">
                        <span>How do you ensure quality in your services?</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>We maintain rigorous quality standards through continuous training, process optimization, and regular client feedback. Our team consists of certified professionals with extensive experience.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">
                        <span>What is your typical project timeline?</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Project timelines vary based on complexity and scope. During our initial consultation, we provide a detailed project plan with specific milestones and delivery dates.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">
                        <span>Do you offer ongoing support after project completion?</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Yes, we offer comprehensive support packages to ensure continued success. Our team remains available to address any questions and provide guidance as needed.</p>
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
                <p class="section-subtitle">Ready to discuss your project? Contact us today</p>
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
                            <p>(555) 123-4567</p>
                        </div>
                    </div>
                    <div class="contact-info-item">
                        <div class="contact-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="contact-details">
                            <h4>Office</h4>
                            <p>123 Business Avenue, Suite 100<br>Professional Center, PC 12345</p>
                        </div>
                    </div>
                    <div class="contact-info-item">
                        <div class="contact-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="contact-details">
                            <h4>Business Hours</h4>
                            <p>Monday - Friday: 9:00 AM - 5:00 PM<br>Saturday: By Appointment</p>
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
                            <input type="text" placeholder="Company Name" required>
                        </div>
                        <div class="form-group">
                            <select required>
                                <option value="" disabled selected>Service of Interest</option>
                                @foreach(explode(',', $business->products) as $service)
                                <option value="{{ trim($service) }}">{{ trim($service) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <textarea placeholder="How can we help you?" rows="5" required></textarea>
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

    <!-- CTA Section -->
    <section class="cta">
        <div class="container">
            <div class="cta-content">
                <h2>Ready to Transform Your Business?</h2>
                <p>Schedule a free consultation with our experts to discuss your needs</p>
                <a href="#contact" class="btn btn-light">Schedule Consultation</a>
            </div>
        </div>
    </section>
@endsection

@php
    // Professional color scheme
    $primaryColor = $business->color ?: '#2C3E50'; // Navy blue
    $secondaryColor = '#3498DB'; // Professional blue
    $accentColor = '#E74C3C'; // Professional red
    $lightColor = '#ECF0F1'; // Light gray
    $darkColor = '#2C3E50'; // Dark blue
    $textColor = '#2C3E50'; // Dark text
    
    $templateStyles = '
        :root {
            --primary-color: ' . $primaryColor . ';
            --secondary-color: ' . $secondaryColor . ';
            --accent-color: ' . $accentColor . ';
            --light-color: ' . $lightColor . ';
            --dark-color: ' . $darkColor . ';
            --text-color: ' . $textColor . ';
            --border-radius: 8px;
            --shadow: 0 5px 15px rgba(0,0,0,0.08);
            --transition: all 0.3s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: \'Roboto\', \'Open Sans\', sans-serif;
            line-height: 1.6;
            color: var(--text-color);
            background: #FFFFFF;
            overflow-x: hidden;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Navigation */
        .navbar {
            background: #FFFFFF;
            padding: 1.2rem 0;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
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
            font-size: 1rem;
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
            font-size: 1.2rem;
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
        .professional-hero {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            padding: 10rem 0 6rem;
            position: relative;
            overflow: hidden;
        }

        .hero-content {
            max-width: 600px;
        }

        .professional-hero h1 {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 1rem;
            line-height: 1.2;
        }

        .hero-subtitle {
            font-size: 1.5rem;
            font-weight: 400;
            margin-bottom: 1rem;
        }

        .hero-description {
            font-size: 1.1rem;
            margin-bottom: 2.5rem;
            opacity: 0.9;
        }

        .hero-actions {
            display: flex;
            gap: 1.5rem;
        }

        .btn {
            padding: 1rem 2rem;
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
            background: var(--light-color);
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

        .btn-light {
            background: white;
            color: var(--primary-color);
        }

        .btn-light:hover {
            background: var(--light-color);
            transform: translateY(-2px);
        }

        .hero-visual {
            position: absolute;
            right: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 45%;
        }

        .professional-graphic {
            position: relative;
            height: 300px;
        }

        .graphic-element {
            position: absolute;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 10px;
        }

        .graphic-element:nth-child(1) {
            width: 150px;
            height: 150px;
            top: 20px;
            right: 100px;
            transform: rotate(45deg);
        }

        .graphic-element:nth-child(2) {
            width: 100px;
            height: 100px;
            bottom: 50px;
            right: 200px;
            transform: rotate(30deg);
        }

        .graphic-element:nth-child(3) {
            width: 80px;
            height: 80px;
            top: 100px;
            right: 50px;
            transform: rotate(60deg);
        }

        /* Section Headers */
        .section-header {
            text-align: center;
            margin-bottom: 4rem;
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: 600;
            color: var(--dark-color);
            margin-bottom: 1rem;
        }

        .section-subtitle {
            font-size: 1.2rem;
            color: #666;
            font-weight: 400;
        }

        /* Services Section */
        .services {
            padding: 6rem 0;
            background: var(--light-color);
        }

        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }

        .service-card {
            background: white;
            padding: 2.5rem;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            transition: var(--transition);
            text-align: center;
        }

        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
        }

        .service-icon {
            width: 70px;
            height: 70px;
            background: var(--primary-color);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            font-size: 1.5rem;
            color: white;
        }

        .service-card h3 {
            font-size: 1.4rem;
            margin-bottom: 1rem;
            color: var(--dark-color);
        }

        .service-card p {
            color: #666;
            margin-bottom: 1.5rem;
            line-height: 1.6;
        }

        .service-link {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: var(--transition);
        }

        .service-link:hover {
            gap: 1rem;
        }

        /* About Section */
        .about {
            padding: 6rem 0;
            background: white;
        }

        .about-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: center;
        }

        .about-description {
            color: #666;
            margin-bottom: 2rem;
            line-height: 1.8;
        }

        .professional-stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1.5rem;
            margin-top: 3rem;
        }

        .stat {
            text-align: center;
            padding: 1.5rem;
            background: var(--light-color);
            border-radius: var(--border-radius);
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
            color: #666;
        }

        .about-visual {
            position: relative;
        }

        .professional-frame {
            padding: 10px;
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
        }

        .professional-frame img {
            width: 100%;
            border-radius: calc(var(--border-radius) - 5px);
        }

        /* Process Section */
        .process {
            padding: 6rem 0;
            background: var(--light-color);
        }

        .process-steps {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
        }

        .process-step {
            text-align: center;
            padding: 2rem;
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            transition: var(--transition);
        }

        .process-step:hover {
            transform: translateY(-5px);
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
            color: var(--dark-color);
        }

        .process-step p {
            color: #666;
            line-height: 1.6;
        }

        /* Testimonials Section */
        .testimonials {
            padding: 6rem 0;
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
            color: #666;
            font-style: italic;
            margin-bottom: 2rem;
            line-height: 1.8;
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
            color: #666;
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
            margin-bottom: 1rem;
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: var(--transition);
        }

        .faq-item:hover {
            transform: translateY(-2px);
        }

        .faq-question {
            padding: 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
            font-weight: 500;
            color: var(--dark-color);
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
            width: 50px;
            height: 50px;
            background: var(--primary-color);
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
            color: #666;
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
            box-shadow: 0 0 0 3px rgba(44, 62, 80, 0.1);
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
            font-weight: 500;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .submit-btn:hover {
            background: var(--secondary-color);
            transform: translateY(-2px);
        }

        /* CTA Section */
        .cta {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            padding: 5rem 0;
            text-align: center;
        }

        .cta-content {
            max-width: 600px;
            margin: 0 auto;
        }

        .cta h2 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            font-weight: 600;
        }

        .cta p {
            margin-bottom: 2.5rem;
            font-size: 1.1rem;
            opacity: 0.9;
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
            
            .hero-visual {
                display: none;
            }
            
            .hero-content {
                max-width: 100%;
                text-align: center;
            }
        }

        @media (max-width: 768px) {
            .professional-hero {
                padding: 8rem 0 4rem;
            }
            
            .professional-hero h1 {
                font-size: 2.5rem;
            }
            
            .hero-actions {
                flex-direction: column;
                align-items: center;
            }
            
            .services-grid {
                grid-template-columns: 1fr;
            }
            
            .professional-stats {
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
            .professional-hero h1 {
                font-size: 2rem;
            }
            
            .section-title {
                font-size: 2rem;
            }
            
            .process-steps {
                grid-template-columns: 1fr;
            }
        }
    ';
@endphp