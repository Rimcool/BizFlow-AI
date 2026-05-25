 @extends('templates.layout')

@section('content')
    <!-- Hero Section -->
    <section id="home" class="hero">
        <div class="hero-container">
            <h1>Welcome to {{ $business->name }}</h1>
            <p>Discover our premium {{ $business->products }} for {{ $business->target }}</p>
            <a href="#products" class="btn">Shop Now</a>
        </div>
    </section>

    <!-- Products Section -->
    <section id="products" class="products">
        <div class="container">
            <h2 class="section-title">Our Products</h2>
            <div class="products-grid">
                @php
                    $products = explode(',', $business->products);
                    $allProducts = $products;
                    if (count($products) < 6) {
                        $variations = ['Premium', 'Deluxe', 'Professional', 'Luxury', 'Essential', 'Advanced'];
                        for ($i = count($products); $i < 6; $i++) {
                            $allProducts[] = $variations[$i] . ' ' . $products[0];
                        }
                    }
                @endphp
                
                @foreach(array_slice($allProducts, 0, 6) as $index => $product)
                <div class="product-card">
                    <img src="https://via.placeholder.com/300x200/{{ str_replace('#', '', $business->color) }}/FFFFFF?text={{ urlencode(trim($product)) }}" alt="{{ trim($product) }}" class="product-image">
                    <div class="product-info">
                        <h3 class="product-title">{{ trim($product) }}</h3>
                        <p class="product-price">${{ rand(20, 200) }}.00</p>
                        <button class="add-to-cart" 
                                data-product="{{ trim($product) }}" 
                                data-price="{{ rand(20, 200) }}"
                                data-image="https://via.placeholder.com/300x200/{{ str_replace('#', '', $business->color) }}/FFFFFF?text={{ urlencode(trim($product)) }}">
                            Add to Cart
                        </button>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="about">
        <div class="container">
            <h2 class="section-title">About Us</h2>
            <div class="about-content">
                <p>Welcome to {{ $business->name }}, your premier destination for {{ $business->products }}. We specialize in providing exceptional quality products for {{ $business->target }} in the {{ $business->industry }} industry.</p>
                <p>Our mission is to deliver outstanding value through our carefully curated selection of products that meet the highest standards of quality and customer satisfaction.</p>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section id="faq" class="faq">
        <div class="container">
            <h2 class="section-title">Frequently Asked Questions</h2>
            
            <div class="faq-item">
                <div class="faq-question">
                    <span>What products do you offer?</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>We specialize in {{ $business->products }} for {{ $business->target }}. Our product range includes various options to meet your specific needs.</p>
                </div>
            </div>
            
            <div class="faq-item">
                <div class="faq-question">
                    <span>How can I place an order?</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>You can easily place orders through our website. Browse products, add to cart, and proceed to checkout.</p>
                </div>
            </div>
            
            <div class="faq-item">
                <div class="faq-question">
                    <span>What is your return policy?</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>We offer a 30-day return policy for all unused products in original packaging.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="contact">
        <div class="container">
            <h2 class="section-title">Contact Us</h2>
            
            <div class="contact-grid">
                <div class="contact-info">
                    <h3>Get in Touch</h3>
                    <div class="contact-info-item">
                        <i class="fas fa-envelope"></i>
                        <span>{{ $business->email }}</span>
                    </div>
                    <div class="contact-info-item">
                        <i class="fas fa-phone"></i>
                        <span>(555) 123-4567</span>
                    </div>
                </div>
                
                <div class="contact-form">
                    <h3>Send us a Message</h3>
                    <form id="contactForm">
                        <div class="form-group">
                            <input type="text" placeholder="Your Name" required>
                        </div>
                        <div class="form-group">
                            <input type="email" placeholder="Your Email" required>
                        </div>
                        <div class="form-group">
                            <textarea placeholder="Your Message" required></textarea>
                        </div>
                        <button type="submit" class="submit-btn">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="newsletter">
        <div class="container">
            <h2>Stay Updated</h2>
            <p>Subscribe to our newsletter for the latest products and offers</p>
            <form class="newsletter-form" id="newsletterForm">
                <input type="email" placeholder="Enter your email" required>
                <button type="submit">Subscribe</button>
            </form>
        </div>
    </section>
@endsection

@php
    $templateStyles = '
        :root {
            --primary-color: ' . ($business->color ?: '#3A86FF') . ';
            --secondary-color: #6c757d;
            --text-dark: #212529;
            --text-light: #6c757d;
            --bg-light: #f8f9fa;
            --white: #ffffff;
            --border-radius: 4px;
            --shadow: 0 2px 4px rgba(0,0,0,0.1);
            --transition: all 0.3s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: \'Inter\', sans-serif;
            line-height: 1.6;
            color: var(--text-dark);
            background: var(--bg-light);
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Navigation */
        .navbar {
            background: var(--white);
            box-shadow: var(--shadow);
            padding: 1rem 0;
            position: sticky;
            top: 0;
            z-index: 100;
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
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary-color);
        }

        .nav-menu {
            display: flex;
            list-style: none;
            gap: 2rem;
        }

        .nav-link {
            text-decoration: none;
            color: var(--text-dark);
            font-weight: 500;
            transition: var(--transition);
        }

        .nav-link:hover {
            color: var(--primary-color);
        }

        .cart-icon {
            position: relative;
            cursor: pointer;
            font-size: 1.2rem;
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
            font-size: 0.8rem;
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(135deg, var(--primary-color) 0%, #2a75e6 100%);
            color: white;
            padding: 4rem 0;
            text-align: center;
        }

        .hero-container {
            max-width: 800px;
            margin: 0 auto;
        }

        .hero h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        .hero p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
        }

        .btn {
            display: inline-block;
            background: var(--white);
            color: var(--primary-color);
            padding: 12px 24px;
            border-radius: var(--border-radius);
            text-decoration: none;
            font-weight: 600;
            transition: var(--transition);
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow);
        }

        /* Products Section */
        .products {
            padding: 4rem 0;
        }

        .section-title {
            text-align: center;
            font-size: 2rem;
            margin-bottom: 3rem;
            color: var(--text-dark);
        }

        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
        }

        .product-card {
            background: var(--white);
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: var(--transition);
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        }

        .product-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .product-info {
            padding: 1.5rem;
        }

        .product-title {
            font-size: 1.1rem;
            margin-bottom: 0.5rem;
            color: var(--text-dark);
        }

        .product-price {
            font-size: 1.2rem;
            color: var(--primary-color);
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .add-to-cart {
            width: 100%;
            padding: 0.8rem;
            background: var(--primary-color);
            color: white;
            border: none;
            border-radius: var(--border-radius);
            cursor: pointer;
            font-weight: 500;
            transition: var(--transition);
        }

        .add-to-cart:hover {
            background: #2a75e6;
        }

        /* About Section */
        .about {
            padding: 4rem 0;
            background: var(--white);
        }

        .about-content {
            max-width: 800px;
            margin: 0 auto;
            text-align: center;
        }

        .about-content p {
            margin-bottom: 1.5rem;
            font-size: 1.1rem;
        }

        /* FAQ Section */
        .faq {
            padding: 4rem 0;
            background: var(--bg-light);
        }

        .faq-item {
            background: var(--white);
            border-radius: var(--border-radius);
            margin-bottom: 1rem;
            overflow: hidden;
            box-shadow: var(--shadow);
        }

        .faq-question {
            padding: 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
            font-weight: 600;
        }

        .faq-answer {
            padding: 0 1.5rem 1.5rem;
            display: none;
            color: var(--text-light);
        }

        .faq-active .faq-answer {
            display: block;
        }

        /* Contact Section */
        .contact {
            padding: 4rem 0;
            background: var(--white);
        }

        .contact-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }

        .contact-info {
            padding: 2rem;
            background: var(--bg-light);
            border-radius: var(--border-radius);
        }

        .contact-info h3 {
            margin-bottom: 1.5rem;
            color: var(--primary-color);
        }

        .contact-info-item {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
        }

        .contact-info-item i {
            margin-right: 1rem;
            color: var(--primary-color);
        }

        .contact-form {
            padding: 2rem;
            background: var(--bg-light);
            border-radius: var(--border-radius);
        }

        .contact-form h3 {
            margin-bottom: 1.5rem;
            color: var(--primary-color);
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 0.8rem;
            border: 1px solid #ddd;
            border-radius: var(--border-radius);
            font-family: inherit;
        }

        .form-group textarea {
            min-height: 120px;
            resize: vertical;
        }

        .submit-btn {
            background: var(--primary-color);
            color: white;
            border: none;
            padding: 1rem 2rem;
            border-radius: var(--border-radius);
            cursor: pointer;
            font-weight: 600;
            transition: var(--transition);
        }

        .submit-btn:hover {
            background: #2a75e6;
        }

        /* Newsletter Section */
        .newsletter {
            background: var(--primary-color);
            color: white;
            padding: 3rem 0;
            text-align: center;
        }

        .newsletter-form {
            display: flex;
            max-width: 400px;
            margin: 0 auto;
        }

        .newsletter-form input {
            flex: 1;
            padding: 0.8rem;
            border: none;
            border-radius: var(--border-radius) 0 0 var(--border-radius);
        }

        .newsletter-form button {
            padding: 0 1.5rem;
            background: #000;
            color: white;
            border: none;
            border-radius: 0 var(--border-radius) var(--border-radius) 0;
            cursor: pointer;
        }

        /* Footer */
        .footer {
            background: var(--text-dark);
            color: var(--bg-light);
            padding: 3rem 0 1rem;
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
            margin-bottom: 1rem;
            color: white;
        }

        .footer-section a {
            color: var(--bg-light);
            text-decoration: none;
            display: block;
            margin-bottom: 0.5rem;
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
            box-shadow: -5px 0 15px rgba(0,0,0,0.1);
            transition: right 0.3s ease;
            z-index: 1000;
            overflow-y: auto;
        }

        .cart-sidebar.open {
            right: 0;
        }

        .cart-header {
            padding: 1.5rem;
            border-bottom: 1px solid #eee;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .cart-items {
            padding: 1rem;
        }

        .cart-item {
            display: flex;
            margin-bottom: 1rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid #eee;
        }

        .cart-item-image {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: var(--border-radius);
            margin-right: 1rem;
        }

        .cart-item-details {
            flex: 1;
        }

        .cart-item-details h4 {
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
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
            font-weight: 600;
        }

        .checkout-btn {
            display: block;
            width: calc(100% - 3rem);
            margin: 0 1.5rem 1.5rem;
            padding: 1rem;
            background: var(--primary-color);
            color: white;
            border: none;
            border-radius: var(--border-radius);
            font-weight: 600;
            cursor: pointer;
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
<<<<<<< HEAD

=======
/* Checkout Styles */
.checkout-section {
    padding: 40px 0;
    background-color: #f9f9f9;
    min-height: 100vh;
}

.checkout-container {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 40px;
    max-width: 1200px;
    margin: 0 auto;
}

.order-summary, .checkout-form {
    background: white;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.order-summary h3, .checkout-form h3 {
    margin-bottom: 20px;
    padding-bottom: 10px;
    border-bottom: 1px solid #eee;
}

.checkout-items {
    margin-bottom: 20px;
}

.checkout-item {
    display: flex;
    align-items: center;
    padding: 15px 0;
    border-bottom: 1px solid #eee;
}

.checkout-item:last-child {
    border-bottom: none;
}

.checkout-item-image {
    width: 60px;
    height: 60px;
    object-fit: cover;
    border-radius: 4px;
    margin-right: 15px;
}

.checkout-item-details {
    flex: 1;
}

.checkout-item-details h4 {
    margin: 0 0 5px 0;
}

.checkout-item-price {
    font-weight: 600;
}

.order-totals {
    border-top: 1px solid #eee;
    padding-top: 15px;
}

.total-row {
    display: flex;
    justify-content: space-between;
    margin-bottom: 10px;
}

.grand-total {
    font-weight: 700;
    font-size: 1.2em;
    border-top: 1px solid #eee;
    padding-top: 10px;
    margin-top: 10px;
}

.form-section {
    margin-bottom: 30px;
}

.form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 15px;
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    margin-bottom: 5px;
    font-weight: 500;
}

.form-group input, .form-group select {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 16px;
}

.form-actions {
    display: flex;
    justify-content: space-between;
    margin-top: 30px;
}

.btn-primary, .btn-secondary {
    padding: 12px 24px;
    border: none;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.btn-primary {
    background-color: #4a6cf7;
    color: white;
}

.btn-primary:hover {
    background-color: #3a5ce5;
}

.btn-secondary {
    background-color: #f1f1f1;
    color: #333;
}

.btn-secondary:hover {
    background-color: #e1e1e1;
}

/* Thank You Page Styles */
.thank-you-section {
    padding: 60px 0;
    background-color: #f9f9f9;
    min-height: 100vh;
    display: flex;
    align-items: center;
}

.thank-you-content {
    max-width: 600px;
    margin: 0 auto;
    text-align: center;
    background: white;
    padding: 50px;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.success-icon {
    font-size: 60px;
    color: #4CAF50;
    margin-bottom: 20px;
}

.thank-you-content h2 {
    margin-bottom: 15px;
    color: #333;
}

.order-confirmation {
    font-size: 18px;
    margin-bottom: 30px;
    color: #666;
}

.order-details {
    background: #f9f9f9;
    padding: 20px;
    border-radius: 6px;
    margin-bottom: 30px;
    text-align: left;
}

.detail-item {
    display: flex;
    justify-content: space-between;
    margin-bottom: 10px;
}

.detail-item:last-child {
    margin-bottom: 0;
}

.detail-label {
    font-weight: 500;
}

.detail-value {
    font-weight: 600;
}

.shipping-info {
    margin-bottom: 30px;
    color: #666;
    line-height: 1.6;
}

.action-buttons {
    display: flex;
    gap: 15px;
    justify-content: center;
}

/* Responsive Styles */
@media (max-width: 768px) {
    .checkout-container {
        grid-template-columns: 1fr;
    }
    
    .form-row {
        grid-template-columns: 1fr;
    }
    
    .form-actions {
        flex-direction: column;
        gap: 10px;
    }
    
    .action-buttons {
        flex-direction: column;
    }
}
>>>>>>> 6a21fed7f7ff83d705f194ef929999fb894554c9
        /* Responsive Design */
        @media (max-width: 768px) {
            .nav-menu {
                flex-direction: column;
                gap: 1rem;
            }
            
            .products-grid {
                grid-template-columns: 1fr;
            }
            
            .cart-sidebar {
                width: 100%;
                right: -100%;
            }
            
            .contact-grid {
                grid-template-columns: 1fr;
            }
            
            .newsletter-form {
                flex-direction: column;
            }
            
            .newsletter-form input {
                border-radius: var(--border-radius);
                margin-bottom: 1rem;
            }
            
            .newsletter-form button {
                border-radius: var(--border-radius);
                padding: 0.8rem;
            }
<<<<<<< HEAD
=======

>>>>>>> 6a21fed7f7ff83d705f194ef929999fb894554c9
        }
    ';
@endphp