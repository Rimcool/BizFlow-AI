<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $business->name }} - {{ $business->industry }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Template-specific CSS will be injected here */
        {!! $templateStyles !!}
<<<<<<< HEAD
=======
        
        /* Add Checkout & Thank You Styles */
        .checkout-section, .thank-you-section {
            display: none;
        }

        .business-logo {
    max-height: 60px;
    max-width: 200px;
    object-fit: contain;
}

.text-logo {
    font-size: 1.8rem;
    font-weight: 700;
    color: var(--primary-color);
}
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
            padding: 0 20px;
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
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar">
        <div class="nav-container">
<<<<<<< HEAD
            <div class="logo">{{ $business->name }}</div>
=======
            <div class="logo-container">
            @if(isset($content['has_logo']) && $content['has_logo'])
                <img src="{{ $content['logo'] }}" alt="{{ $business->name }} Logo" class="business-logo">
            @else
                <div class="text-logo">{{ $business->name }}</div>
            @endif
            </div>
            
>>>>>>> 6a21fed7f7ff83d705f194ef929999fb894554c9
            <ul class="nav-menu">
                <li><a href="#home" class="nav-link">Home</a></li>
                <li><a href="#products" class="nav-link">Products</a></li>
                <li><a href="#about" class="nav-link">About</a></li>
                <li><a href="#faq" class="nav-link">FAQ</a></li>
                <li><a href="#contact" class="nav-link">Contact</a></li>
                <li class="cart-icon" id="cart-icon">
                    <i class="fas fa-shopping-cart"></i>
                    <span class="cart-count">0</span>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
<<<<<<< HEAD
    <main>
        @yield('content')
    </main>

=======
    <main id="main-content">
        @yield('content')
    </main>

    <!-- Checkout Page (Outside main) -->
    <section id="checkout" class="checkout-section">
        <div class="container">
            <h2 class="section-title">Checkout</h2>
            
            <div class="checkout-container">
                <!-- Order Summary -->
                <div class="order-summary">
                    <h3>Order Summary</h3>
                    <div id="checkout-items" class="checkout-items">
                        <!-- Items will be populated by JavaScript -->
                    </div>
                    <div class="order-totals">
                        <div class="total-row">
                            <span>Subtotal:</span>
                            <span id="checkout-subtotal">$0.00</span>
                        </div>
                        <div class="total-row">
                            <span>Shipping:</span>
                            <span id="checkout-shipping">$0.00</span>
                        </div>
                        <div class="total-row">
                            <span>Tax:</span>
                            <span id="checkout-tax">$0.00</span>
                        </div>
                        <div class="total-row grand-total">
                            <span>Total:</span>
                            <span id="checkout-total">$0.00</span>
                        </div>
                    </div>
                </div>
                
                <!-- Checkout Form -->
                <div class="checkout-form">
                    <form id="checkout-form">
                        <div class="form-section">
                            <h3>Shipping Information</h3>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="first-name">First Name</label>
                                    <input type="text" id="first-name" name="first_name" required>
                                </div>
                                <div class="form-group">
                                    <label for="last-name">Last Name</label>
                                    <input type="text" id="last-name" name="last_name" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="tel" id="phone" name="phone" required>
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" id="address" name="address" required>
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="city">City</label>
                                    <input type="text" id="city" name="city" required>
                                </div>
                                <div class="form-group">
                                    <label for="zip">ZIP Code</label>
                                    <input type="text" id="zip" name="zip" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="country">Country</label>
                                <select id="country" name="country" required>
                                    <option value="">Select Country</option>
                                    <option value="US">United States</option>
                                    <option value="CA">Canada</option>
                                    <option value="UK">United Kingdom</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-section">
                            <h3>Payment Information</h3>
                            <div class="form-group">
                                <label for="card-name">Name on Card</label>
                                <input type="text" id="card-name" name="card_name" required>
                            </div>
                            <div class="form-group">
                                <label for="card-number">Card Number</label>
                                <input type="text" id="card-number" name="card_number" placeholder="1234 5678 9012 3456" required>
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="expiry">Expiry Date</label>
                                    <input type="text" id="expiry" name="expiry" placeholder="MM/YY" required>
                                </div>
                                <div class="form-group">
                                    <label for="cvv">CVV</label>
                                    <input type="text" id="cvv" name="cvv" required>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-actions">
                            <button type="button" id="back-to-cart" class="btn-secondary">Back to Cart</button>
                            <button type="submit" class="btn-primary">Place Order</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Thank You Page (Outside main) -->
    <section id="thank-you" class="thank-you-section">
        <div class="container">
            <div class="thank-you-content">
                <div class="success-icon">
                    <i class="fas fa-check-circle"></i>
                </div>
                <h2>Thank You for Your Order!</h2>
                <p class="order-confirmation">Your order has been successfully placed.</p>
                <div class="order-details">
                    <div class="detail-item">
                        <span class="detail-label">Order Number:</span>
                        <span id="order-number" class="detail-value">#12345</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Order Date:</span>
                        <span id="order-date" class="detail-value">October 15, 2023</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Total Amount:</span>
                        <span id="order-total" class="detail-value">$0.00</span>
                    </div>
                </div>
                <p class="shipping-info">We've sent a confirmation email to your address. You'll receive a shipping confirmation once your order is on its way.</p>
                <div class="action-buttons">
                    <button id="continue-shopping" class="btn-primary">Continue Shopping</button>
                    <button id="view-order" class="btn-secondary">View Order Details</button>
                </div>
            </div>
        </div>
    </section>

>>>>>>> 6a21fed7f7ff83d705f194ef929999fb894554c9
    <!-- Footer -->
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-section">
                <h3>{{ $business->name }}</h3>
                <p>Providing quality {{ $business->products }} for {{ $business->target }}.</p>
            </div>
            <div class="footer-section">
                <h3>Quick Links</h3>
                <a href="#home">Home</a>
                <a href="#products">Products</a>
                <a href="#about">About</a>
                <a href="#contact">Contact</a>
            </div>
            <div class="footer-section">
                <h3>Contact Info</h3>
                <p>Email: {{ $business->email }}</p>
                <p>Phone: (555) 123-4567</p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; {{ date('Y') }} {{ $business->name }}. All rights reserved.</p>
        </div>
    </footer>

    <!-- Shopping Cart Sidebar -->
    <div class="cart-sidebar" id="cart-sidebar">
        <div class="cart-header">
            <h3>Your Cart</h3>
            <button id="close-cart">&times;</button>
        </div>
        <div class="cart-items" id="cart-items">
            <!-- Cart items will be added here dynamically -->
        </div>
        <div class="cart-total">
            <span>Total:</span>
            <span id="cart-total">$0.00</span>
        </div>
        <button class="checkout-btn">Proceed to Checkout</button>
    </div>

    <!-- Overlay -->
    <div class="overlay" id="overlay"></div>

    <!-- JavaScript -->
    <script>
<<<<<<< HEAD
=======
        // Your existing JavaScript code remains the same...
>>>>>>> 6a21fed7f7ff83d705f194ef929999fb894554c9
        // Ecommerce functionality
        let cart = [];
        const cartIcon = document.getElementById('cart-icon');
        const cartSidebar = document.getElementById('cart-sidebar');
        const closeCart = document.getElementById('close-cart');
        const overlay = document.getElementById('overlay');
        const cartItems = document.getElementById('cart-items');
        const cartTotal = document.getElementById('cart-total');
        const cartCount = document.querySelector('.cart-count');
<<<<<<< HEAD
=======
        const mainContent = document.getElementById('main-content');
>>>>>>> 6a21fed7f7ff83d705f194ef929999fb894554c9

        // Cart functionality
        cartIcon.addEventListener('click', () => {
            cartSidebar.classList.add('open');
            overlay.style.display = 'block';
        });

        closeCart.addEventListener('click', () => {
            cartSidebar.classList.remove('open');
            overlay.style.display = 'none';
        });

        overlay.addEventListener('click', () => {
            cartSidebar.classList.remove('open');
            overlay.style.display = 'none';
        });

        // Add to cart functionality
        document.addEventListener('click', (e) => {
            if (e.target.classList.contains('add-to-cart')) {
                const product = e.target.dataset.product;
                const price = parseFloat(e.target.dataset.price);
                const image = e.target.dataset.image;
                
                const existingItem = cart.find(item => item.product === product);
                
                if (existingItem) {
                    existingItem.quantity += 1;
                } else {
                    cart.push({
                        product,
                        price,
                        image,
                        quantity: 1
                    });
                }
                
                updateCart();
                
                // Show cart sidebar
                cartSidebar.classList.add('open');
                overlay.style.display = 'block';
            }
        });

        function updateCart() {
            // Clear cart items
            cartItems.innerHTML = '';
            
            let total = 0;
            let count = 0;
            
            // Add items to cart
            cart.forEach(item => {
                const itemTotal = item.price * item.quantity;
                total += itemTotal;
                count += item.quantity;
                
                const cartItem = document.createElement('div');
                cartItem.className = 'cart-item';
                cartItem.innerHTML = `
                    <img src="${item.image}" alt="${item.product}" class="cart-item-image">
                    <div class="cart-item-details">
                        <h4>${item.product}</h4>
                        <p>$${item.price} x ${item.quantity}</p>
                    </div>
                    <button class="cart-item-remove" data-product="${item.product}">&times;</button>
                `;
                
                cartItems.appendChild(cartItem);
            });
            
            // Update total and count
            cartTotal.textContent = `$${total.toFixed(2)}`;
            cartCount.textContent = count;
            
            // Add event listeners to remove buttons
            document.querySelectorAll('.cart-item-remove').forEach(button => {
                button.addEventListener('click', () => {
                    const product = button.dataset.product;
                    cart = cart.filter(item => item.product !== product);
                    updateCart();
                });
            });
        }

<<<<<<< HEAD
=======
        // Checkout functionality
        const checkoutSection = document.getElementById('checkout');
        const thankYouSection = document.getElementById('thank-you');
        const checkoutBtn = document.querySelector('.checkout-btn');
        const backToCartBtn = document.getElementById('back-to-cart');
        const checkoutForm = document.getElementById('checkout-form');
        const continueShoppingBtn = document.getElementById('continue-shopping');
        const viewOrderBtn = document.getElementById('view-order');

        // Proceed to checkout
        checkoutBtn.addEventListener('click', () => {
            if (cart.length === 0) {
                alert('Your cart is empty. Please add items to your cart before proceeding to checkout.');
                return;
            }
            
            // Hide cart sidebar and show checkout
            cartSidebar.classList.remove('open');
            overlay.style.display = 'none';
            
            // Hide main content and show checkout
            mainContent.style.display = 'none';
            checkoutSection.style.display = 'block';
            
            // Update checkout items and totals
            updateCheckout();
        });

        // Back to cart
        backToCartBtn.addEventListener('click', () => {
            checkoutSection.style.display = 'none';
            mainContent.style.display = 'block';
            cartSidebar.classList.add('open');
            overlay.style.display = 'block';
        });

        // Continue shopping
        continueShoppingBtn.addEventListener('click', () => {
            thankYouSection.style.display = 'none';
            mainContent.style.display = 'block';
            
            // Clear cart after successful order
            cart = [];
            updateCart();
        });

        // View order (placeholder functionality)
        viewOrderBtn.addEventListener('click', () => {
            alert('Order details would be displayed here. In a real implementation, this would show order history.');
        });

        // Update checkout display
        function updateCheckout() {
            const checkoutItems = document.getElementById('checkout-items');
            const checkoutSubtotal = document.getElementById('checkout-subtotal');
            const checkoutShipping = document.getElementById('checkout-shipping');
            const checkoutTax = document.getElementById('checkout-tax');
            const checkoutTotal = document.getElementById('checkout-total');
            
            // Clear checkout items
            checkoutItems.innerHTML = '';
            
            let subtotal = 0;
            
            // Add items to checkout
            cart.forEach(item => {
                const itemTotal = item.price * item.quantity;
                subtotal += itemTotal;
                
                const checkoutItem = document.createElement('div');
                checkoutItem.className = 'checkout-item';
                checkoutItem.innerHTML = `
                    <img src="${item.image}" alt="${item.product}" class="checkout-item-image">
                    <div class="checkout-item-details">
                        <h4>${item.product}</h4>
                        <p>Quantity: ${item.quantity}</p>
                    </div>
                    <div class="checkout-item-price">$${itemTotal.toFixed(2)}</div>
                `;
                
                checkoutItems.appendChild(checkoutItem);
            });
            
            // Calculate totals
            const shipping = subtotal > 50 ? 0 : 5.99; // Free shipping over $50
            const tax = subtotal * 0.08; // 8% tax
            
            // Update totals
            checkoutSubtotal.textContent = `$${subtotal.toFixed(2)}`;
            checkoutShipping.textContent = shipping === 0 ? 'FREE' : `$${shipping.toFixed(2)}`;
            checkoutTax.textContent = `$${tax.toFixed(2)}`;
            checkoutTotal.textContent = `$${(subtotal + shipping + tax).toFixed(2)}`;
        }

        // Handle form submission
        checkoutForm.addEventListener('submit', (e) => {
            e.preventDefault();
            
            // Generate order details
            const orderNumber = 'ORD' + Math.floor(Math.random() * 10000);
            const orderDate = new Date().toLocaleDateString('en-US', {
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            });
            const orderTotal = document.getElementById('checkout-total').textContent;
            
            // Update thank you page with order details
            document.getElementById('order-number').textContent = orderNumber;
            document.getElementById('order-date').textContent = orderDate;
            document.getElementById('order-total').textContent = orderTotal;
            
            // Show thank you page
            checkoutSection.style.display = 'none';
            thankYouSection.style.display = 'block';
            
            // In a real implementation, you would send the order to the server
            console.log('Order placed:', {
                orderNumber,
                items: cart,
                customerInfo: {
                    firstName: document.getElementById('first-name').value,
                    lastName: document.getElementById('last-name').value,
                    email: document.getElementById('email').value,
                }
            });
        });

>>>>>>> 6a21fed7f7ff83d705f194ef929999fb894554c9
        // Form validation
        document.addEventListener('DOMContentLoaded', function() {
            const contactForm = document.getElementById('contactForm');
            if (contactForm) {
                contactForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    alert('Thank you for your message! We will get back to you soon.');
                    this.reset();
                });
            }

            const newsletterForm = document.getElementById('newsletterForm');
            if (newsletterForm) {
                newsletterForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    alert('Thank you for subscribing to our newsletter!');
                    this.reset();
                });
            }

            // FAQ functionality
            document.querySelectorAll('.faq-question').forEach(question => {
                question.addEventListener('click', () => {
                    const item = question.parentElement;
                    item.classList.toggle('faq-active');
                });
            });
        });
    </script>
</body>
</html>