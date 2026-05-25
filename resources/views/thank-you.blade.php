<!DOCTYPE html>
<html lang="en">
<head>
<<<<<<< HEAD
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI Chatbot Package - BizFlow AI</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #e9ecef 100%);
            color: #333;
            line-height: 1.6;
            padding: 20px;
            min-height: 100vh;
        }
        
        .container {
            max-width: 1000px;
            width: 100%;
            margin: 0 auto;
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 20px 50px rgba(0,0,0,0.1);
        }
        
        .header {
            background: linear-gradient(to right, #036ceb, #00C896);
            color: white;
            padding: 3rem 2rem;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        
        .header h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
            font-weight: 700;
        }
        
        .header p {
            opacity: 0.9;
            font-size: 1.1rem;
        }
        
        .content {
            padding: 30px;
        }
        
        .package-details {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
            margin-bottom: 30px;
        }
        
        .features {
            background: #f9f9f9;
            border-radius: 16px;
            padding: 25px;
        }
        
        .features h2 {
            color: #036ceb;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 1.5rem;
        }
        
        .feature-list {
            list-style: none;
        }
        
        .feature-list li {
            padding: 12px 0;
            border-bottom: 1px solid #eee;
            display: flex;
            align-items: center;
            gap: 12px;
        }
        
        .feature-list li:last-child {
            border-bottom: none;
        }
        
        .feature-list li i {
            color: #00C896;
            font-size: 1.1rem;
        }
        
        .pricing {
            background: linear-gradient(to bottom right, #e8f4fc, #e0f7fa);
            border-radius: 16px;
            padding: 25px;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        
        .price {
            font-size: 3.5rem;
            font-weight: 700;
            color: #036ceb;
            margin: 15px 0;
        }
        
        .price-desc {
            color: #666;
            margin-bottom: 20px;
            font-size: 1.1rem;
        }
        
        .pricing-features {
            list-style: none;
            width: 100%;
            margin-top: 20px;
        }
        
        .pricing-features li {
            padding: 10px 0;
            display: flex;
            align-items: center;
            gap: 10px;
            justify-content: center;
        }
        
        .pricing-features li i {
            color: #00C896;
        }
        
        .payment-section {
            background: white;
            border-radius: 16px;
            padding: 30px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
            margin-bottom: 30px;
        }
        
        .payment-section h2 {
            color: #333;
            margin-bottom: 20px;
            text-align: center;
            font-size: 1.8rem;
        }
        
        .payment-options {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 25px;
        }
        
        .payment-option {
            border: 2px solid #e0e0e0;
            border-radius: 12px;
            padding: 20px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .payment-option:hover {
            border-color: #036ceb;
            transform: translateY(-3px);
        }
        
        .payment-option.selected {
            border-color: #036ceb;
            background: rgba(3, 108, 235, 0.05);
        }
        
        .payment-option i {
            font-size: 2.5rem;
            margin-bottom: 15px;
            color: #666;
        }
        
        .payment-option.selected i {
            color: #036ceb;
        }
        
        .payment-form {
            display: none;
        }
        
        .payment-form.active {
            display: block;
        }
        
        .form-group {
            margin-bottom: 20px;
            position: relative;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #444;
        }
        
        .form-group input {
            width: 100%;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 10px;
            font-size: 1rem;
            transition: border 0.3s;
        }
        
        .form-group input:focus {
            border-color: #036ceb;
            outline: none;
            box-shadow: 0 0 0 2px rgba(3, 108, 235, 0.2);
        }
        
        .form-group input.error {
            border-color: #e74c3c;
        }
        
        .form-group input.valid {
            border-color: #2ecc71;
        }
        
        .error-message {
            color: #e74c3c;
            font-size: 0.85rem;
            margin-top: 5px;
            display: none;
        }
        
        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }
        
        .purchase-btn {
            background: linear-gradient(to right, #036ceb, #00C896);
            color: white;
            border: none;
            padding: 18px 35px;
            border-radius: 12px;
            font-size: 1.2rem;
            font-weight: 600;
            cursor: pointer;
            width: 100%;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            margin-top: 20px;
            box-shadow: 0 5px 15px rgba(3, 108, 235, 0.3);
        }
        
        .purchase-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(3, 108, 235, 0.4);
        }
        
        .purchase-btn:disabled {
            background: #ccc;
            cursor: not-allowed;
            transform: none;
            box-shadow: none;
        }
        
        .faq-section {
            background: #f9f9f9;
            border-radius: 16px;
            padding: 30px;
            margin-bottom: 30px;
        }
        
        .faq-section h2 {
            color: #333;
            margin-bottom: 25px;
            text-align: center;
            font-size: 1.8rem;
        }
        
        .faq-item {
            margin-bottom: 20px;
            border-bottom: 1px solid #eee;
            padding-bottom: 20px;
        }
        
        .faq-question {
            font-weight: 600;
            margin-bottom: 10px;
            color: #444;
            font-size: 1.1rem;
        }
        
        .faq-answer {
            color: #666;
            line-height: 1.6;
        }
        
        .footer {
            text-align: center;
            padding: 25px;
            border-top: 1px solid #eee;
            color: #666;
            font-size: 0.95rem;
        }
        
        .footer a {
            color: #036ceb;
            text-decoration: none;
        }
        
        .footer a:hover {
            text-decoration: underline;
        }
        
        @media (max-width: 768px) {
            .package-details {
                grid-template-columns: 1fr;
            }
            
            .payment-options {
                grid-template-columns: 1fr;
            }
            
            .form-row {
                grid-template-columns: 1fr;
            }
            
            .header h1 {
                font-size: 2rem;
            }
            
            .header {
                padding: 2rem 1.5rem;
            }
            
            .content {
                padding: 20px;
            }
        }
        
        .decorative-circle {
            position: absolute;
            border-radius: 50%;
            background: linear-gradient(135deg, rgba(3, 108, 235, 0.1), rgba(0, 200, 150, 0.1));
            opacity: 0.3;
            z-index: 0;
        }
        
        .circle-1 {
            width: 300px;
            height: 300px;
            top: -150px;
            right: -150px;
        }
        
        .circle-2 {
            width: 200px;
            height: 200px;
            bottom: -100px;
            left: -100px;
        }
        
        .validation-success {
            background: #2ecc71;
            color: white;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            display: none;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <!-- Add this at the top of your thank-you.blade.php to display payment info -->
@if(session('success'))
<div style="background: #d4edda; color: #155724; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
    <i class="fas fa-check-circle"></i> {{ session('success') }}
</div>
@endif

<!-- Display payment information -->
<div class="payment-info" style="background: #e8f4fc; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
    <h4 style="color: #036ceb; margin-bottom: 10px;"><i class="fas fa-receipt"></i> Payment Details</h4>
    <p><strong>Payment ID:</strong> {{ $payment_id ?? 'N/A' }}</p>
    <p><strong>Amount Paid:</strong> ${{ $amount ?? '3.00' }}</p>
    <p><strong>Status:</strong> <span style="color: #00C896;">Completed</span></p>
</div>
            <div class="decorative-circle circle-1"></div>
            <div class="decorative-circle circle-2"></div>
            <h1><i class="fas fa-robot"></i> AI Chatbot Package</h1>
            <p>Enhance your website with our intelligent chatbot solution</p>
        </div>
        
        <div class="content">
            <div class="package-details">
                <div class="features">
                    <h2><i class="fas fa-star"></i> Package Features</h2>
                    <ul class="feature-list">
                        <li><i class="fas fa-check-circle"></i> AI-powered customer support</li>
                        <li><i class="fas fa-check-circle"></i> 24/7 automated responses</li>
                        <li><i class="fas fa-check-circle"></i> Customizable appearance</li>
                        <li><i class="fas fa-check-circle"></i> Easy installation on your website</li>
                        <li><i class="fas fa-check-circle"></i> Multi-language support</li>
                        <li><i class="fas fa-check-circle"></i> Customer query analytics</li>
                        <li><i class="fas fa-check-circle"></i> FAQ automation</li>
                        <li><i class="fas fa-check-circle"></i> Lead generation capabilities</li>
                    </ul>
                </div>
                
                <div class="pricing">
                    <h2>One-Time Purchase</h2>
                    <div class="price">$3</div>
                    <p class="price-desc">One-time payment, lifetime usage</p>
                    <ul class="pricing-features">
                        <li><i class="fas fa-check"></i> No hidden fees</li>
                        <li><i class="fas fa-check"></i> 30-day money back guarantee</li>
                        <li><i class="fas fa-check"></i> Free updates for 1 year</li>
                    </ul>
                </div>
            </div>
            
            <div class="payment-section">
                <h2>Purchase Now</h2>
                
                <div class="validation-success" id="validationSuccess">
                    <i class="fas fa-check-circle"></i> Form validated successfully! Proceeding to payment...
                </div>
                
                <div class="payment-options">
                    <div class="payment-option" data-method="stripe">
                        <i class="fab fa-cc-stripe"></i>
                        <div>Credit/Debit Card</div>
                    </div>
                    <div class="payment-option" data-method="jazzcash">
                        <i class="fas fa-mobile-alt"></i>
                        <div>JazzCash</div>
                    </div>
                    <div class="payment-option" data-method="easypaisa">
                        <i class="fas fa-money-bill-wave"></i>
                        <div>EasyPaisa</div>
                    </div>
                </div>
                
                <div id="stripe-form" class="payment-form">
                    <div class="form-group">
                        <label for="card-number">Card Number</label>
                        <input type="text" id="card-number" placeholder="1234 5678 9012 3456" maxlength="19">
                        <div class="error-message" id="card-number-error">Please enter a valid card number</div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="expiry">Expiry Date</label>
                            <input type="text" id="expiry" placeholder="MM/YY" maxlength="5">
                            <div class="error-message" id="expiry-error">Please enter a valid expiry date (MM/YY)</div>
                        </div>
                        
                        <div class="form-group">
                            <label for="cvc">CVC</label>
                            <input type="text" id="cvc" placeholder="123" maxlength="4">
                            <div class="error-message" id="cvc-error">Please enter a valid CVC</div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="name">Cardholder Name</label>
                        <input type="text" id="name" placeholder="John Doe">
                        <div class="error-message" id="name-error">Please enter cardholder name</div>
                    </div>
                    
                    <button class="purchase-btn" id="stripe-pay-btn">
                        <i class="fas fa-lock"></i> Pay Now - $3
                    </button>
                </div>
                
                <div id="jazzcash-form" class="payment-form">
                    <div class="form-group">
                        <label for="jazzcash-number">JazzCash Number</label>
                        <input type="text" id="jazzcash-number" placeholder="03XX XXXXXXX" maxlength="12">
                        <div class="error-message" id="jazzcash-number-error">Please enter a valid JazzCash number</div>
                    </div>
                    
                    <div class="form-group">
                        <label for="jazzcash-pin">PIN</label>
                        <input type="password" id="jazzcash-pin" placeholder="XXXX" maxlength="5">
                        <div class="error-message" id="jazzcash-pin-error">Please enter your PIN</div>
                    </div>
                    
                    <button class="purchase-btn" id="jazzcash-pay-btn">
                        <i class="fas fa-mobile-alt"></i> Pay via JazzCash - $3
                    </button>
                </div>
                
                <div id="easypaisa-form" class="payment-form">
                    <div class="form-group">
                        <label for="easypaisa-number">EasyPaisa Number</label>
                        <input type="text" id="easypaisa-number" placeholder="03XX XXXXXXX" maxlength="12">
                        <div class="error-message" id="easypaisa-number-error">Please enter a valid EasyPaisa number</div>
                    </div>
                    
                    <div class="form-group">
                        <label for="easypaisa-pin">PIN</label>
                        <input type="password" id="easypaisa-pin" placeholder="XXXX" maxlength="5">
                        <div class="error-message" id="easypaisa-pin-error">Please enter your PIN</div>
                    </div>
                    
                    <button class="purchase-btn" id="easypaisa-pay-btn">
                        <i class="fas fa-money-bill-wave"></i> Pay via EasyPaisa - $3
                    </button>
                </div>
            </div>
            
            <div class="faq-section">
                <h2>Frequently Asked Questions</h2>
                
                <div class="faq-item">
                    <div class="faq-question">How quickly can I install the chatbot on my website?</div>
                    <div class="faq-answer">Installation is quick and easy. After purchase, you'll receive a code snippet that you can add to your website in just a few minutes.</div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">Do I need technical knowledge to set it up?</div>
                    <div class="faq-answer">No technical knowledge is required. We provide step-by-step instructions, and if you need help, our support team is available.</div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">Can I customize the chatbot's appearance?</div>
                    <div class="faq-answer">Yes, you can customize colors, placement, and greeting messages to match your website's branding.</div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">What languages does the chatbot support?</div>
                    <div class="faq-answer">The chatbot supports multiple languages including English, Urdu, Spanish, French, and more.</div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">How does the AI chatbot work?</div>
                    <div class="faq-answer">Our AI chatbot uses natural language processing to understand customer queries and provide relevant responses based on your business information.</div>
                </div>
            </div>
        </div>
        
        <div class="footer">
            <p>© 2023 BizFlow AI. All rights reserved. | <a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a></p>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const paymentOptions = document.querySelectorAll('.payment-option');
            const paymentForms = document.querySelectorAll('.payment-form');
            const validationSuccess = document.getElementById('validationSuccess');
            
            // Format card number input
            const cardNumberInput = document.getElementById('card-number');
            if (cardNumberInput) {
                cardNumberInput.addEventListener('input', function(e) {
                    let value = e.target.value.replace(/\D/g, '');
                    if (value.length > 0) {
                        value = value.match(/.{1,4}/g).join(' ');
                    }
                    e.target.value = value;
                    validateCardNumber(value);
                });
            }
            
            // Format expiry date input
            const expiryInput = document.getElementById('expiry');
            if (expiryInput) {
                expiryInput.addEventListener('input', function(e) {
                    let value = e.target.value.replace(/\D/g, '');
                    if (value.length > 2) {
                        value = value.substring(0, 2) + '/' + value.substring(2);
                    }
                    e.target.value = value;
                    validateExpiry(value);
                });
            }
            
            // Payment option selection
            paymentOptions.forEach(option => {
                option.addEventListener('click', function() {
                    // Remove selected class from all options
                    paymentOptions.forEach(opt => opt.classList.remove('selected'));
                    
                    // Add selected class to clicked option
                    this.classList.add('selected');
                    
                    // Hide all forms
                    paymentForms.forEach(form => form.classList.remove('active'));
                    
                    // Show the selected form
                    const method = this.getAttribute('data-method');
                    document.getElementById(`${method}-form`).classList.add('active');
                    
                    // Reset validation messages
                    hideAllErrorMessages();
                    validationSuccess.style.display = 'none';
                });
            });
            
            // Select first payment option by default
            paymentOptions[0].click();
            
            // Add event listeners to payment buttons
            document.getElementById('stripe-pay-btn').addEventListener('click', function() {
                if (validateStripeForm()) {
                    showValidationSuccess();
                    setTimeout(() => processPayment('stripe'), 1500);
                }
            });
            
            document.getElementById('jazzcash-pay-btn').addEventListener('click', function() {
                if (validateJazzCashForm()) {
                    showValidationSuccess();
                    setTimeout(() => processPayment('jazzcash'), 1500);
                }
            });
            
            document.getElementById('easypaisa-pay-btn').addEventListener('click', function() {
                if (validateEasyPaisaForm()) {
                    showValidationSuccess();
                    setTimeout(() => processPayment('easypaisa'), 1500);
                }
            });
            
            // Validation functions
            function validateCardNumber(cardNumber) {
                const errorElement = document.getElementById('card-number-error');
                const cleanedNumber = cardNumber.replace(/\s/g, '');
                
                if (cleanedNumber.length < 13 || cleanedNumber.length > 19) {
                    showError(cardNumberInput, errorElement, 'Please enter a valid card number');
                    return false;
                }
                
                // Luhn algorithm validation
                if (!isValidLuhn(cleanedNumber)) {
                    showError(cardNumberInput, errorElement, 'Please enter a valid card number');
                    return false;
                }
                
                hideError(cardNumberInput, errorElement);
                return true;
            }
            
            function validateExpiry(expiry) {
                const errorElement = document.getElementById('expiry-error');
                const parts = expiry.split('/');
                
                if (parts.length !== 2 || parts[0].length !== 2 || parts[1].length !== 2) {
                    showError(expiryInput, errorElement, 'Please enter a valid expiry date (MM/YY)');
                    return false;
                }
                
                const month = parseInt(parts[0]);
                const year = parseInt('20' + parts[1]);
                const currentDate = new Date();
                const currentYear = currentDate.getFullYear();
                const currentMonth = currentDate.getMonth() + 1;
                
                if (month < 1 || month > 12) {
                    showError(expiryInput, errorElement, 'Please enter a valid month (01-12)');
                    return false;
                }
                
                if (year < currentYear || (year === currentYear && month < currentMonth)) {
                    showError(expiryInput, errorElement, 'Card has expired');
                    return false;
                }
                
                hideError(expiryInput, errorElement);
                return true;
            }
            
            function validateCvc(cvc) {
                const errorElement = document.getElementById('cvc-error');
                const cvcInput = document.getElementById('cvc');
                
                if (cvc.length < 3 || cvc.length > 4) {
                    showError(cvcInput, errorElement, 'Please enter a valid CVC');
                    return false;
                }
                
                hideError(cvcInput, errorElement);
                return true;
            }
            
            function validateName(name) {
                const errorElement = document.getElementById('name-error');
                const nameInput = document.getElementById('name');
                
                if (name.trim().length < 2) {
                    showError(nameInput, errorElement, 'Please enter cardholder name');
                    return false;
                }
                
                hideError(nameInput, errorElement);
                return true;
            }
            
            function validatePhoneNumber(number, errorElementId, inputId) {
                const errorElement = document.getElementById(errorElementId);
                const inputElement = document.getElementById(inputId);
                
                // Pakistani phone number validation (03XX XXXXXXX)
                const phoneRegex = /^03\d{2}\s?\d{7}$/;
                
                if (!phoneRegex.test(number)) {
                    showError(inputElement, errorElement, 'Please enter a valid phone number');
                    return false;
                }
                
                hideError(inputElement, errorElement);
                return true;
            }
            
            function validatePin(pin, errorElementId, inputId) {
                const errorElement = document.getElementById(errorElementId);
                const inputElement = document.getElementById(inputId);
                
                if (pin.length < 4) {
                    showError(inputElement, errorElement, 'PIN must be at least 4 digits');
                    return false;
                }
                
                hideError(inputElement, errorElement);
                return true;
            }
            
            function validateStripeForm() {
                const cardNumber = document.getElementById('card-number').value;
                const expiry = document.getElementById('expiry').value;
                const cvc = document.getElementById('cvc').value;
                const name = document.getElementById('name').value;
                
                return validateCardNumber(cardNumber) && 
                       validateExpiry(expiry) && 
                       validateCvc(cvc) && 
                       validateName(name);
            }
            
            function validateJazzCashForm() {
                const number = document.getElementById('jazzcash-number').value;
                const pin = document.getElementById('jazzcash-pin').value;
                
                return validatePhoneNumber(number, 'jazzcash-number-error', 'jazzcash-number') && 
                       validatePin(pin, 'jazzcash-pin-error', 'jazzcash-pin');
            }
            
            function validateEasyPaisaForm() {
                const number = document.getElementById('easypaisa-number').value;
                const pin = document.getElementById('easypaisa-pin').value;
                
                return validatePhoneNumber(number, 'easypaisa-number-error', 'easypaisa-number') && 
                       validatePin(pin, 'easypaisa-pin-error', 'easypaisa-pin');
            }
            
            // Helper functions
            function showError(inputElement, errorElement, message) {
                inputElement.classList.add('error');
                inputElement.classList.remove('valid');
                errorElement.textContent = message;
                errorElement.style.display = 'block';
            }
            
            function hideError(inputElement, errorElement) {
                inputElement.classList.remove('error');
                inputElement.classList.add('valid');
                errorElement.style.display = 'none';
            }
            
            function hideAllErrorMessages() {
                const errorMessages = document.querySelectorAll('.error-message');
                errorMessages.forEach(msg => {
                    msg.style.display = 'none';
                });
                
                const inputs = document.querySelectorAll('input');
                inputs.forEach(input => {
                    input.classList.remove('error');
                    input.classList.remove('valid');
                });
            }
            
            function showValidationSuccess() {
                validationSuccess.style.display = 'block';
            }
            
            function isValidLuhn(cardNumber) {
                let sum = 0;
                let isEven = false;
                
                for (let i = cardNumber.length - 1; i >= 0; i--) {
                    let digit = parseInt(cardNumber.charAt(i));
                    
                    if (isEven) {
                        digit *= 2;
                        if (digit > 9) {
                            digit -= 9;
                        }
                    }
                    
                    sum += digit;
                    isEven = !isEven;
                }
                
                return (sum % 10) === 0;
            }
            
            function processPayment(method) {
                // In a real application, this would process the payment
                // For demo purposes, we'll show a success message
                
                alert(`Payment processed successfully via ${method.toUpperCase()}! Your AI chatbot package will be available for download shortly.`);
                
                // Redirect to download page or thank you page
                // window.location.href = 'download-page.html';
            }
        });
    </script>
</body>
</html>
=======
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thank You – BizFlow AI</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(135deg, #036ceb, #4f9bff);
      font-family: 'Segoe UI', sans-serif;
    }
    .thankyou-card {
      max-width: 800px;
      margin: 60px auto;
      padding: 40px;
      background: #fff;
      border-radius: 20px;
      box-shadow: 0 6px 20px rgba(0,0,0,0.15);
      text-align: center;
    }
    .thankyou-card h2 {
      color: #036ceb;
      font-weight: bold;
      margin-bottom: 15px;
    }
    .purchase-summary {
      margin: 20px 0;
      text-align: left;
    }
    .purchase-summary table td {
      padding: 8px 0;
    }
    .btn-download {
      background: #036ceb;
      color: #fff;
      border-radius: 8px;
      padding: 12px 20px;
      margin: 10px;
      text-decoration: none;
      display: inline-block;
      transition: 0.3s;
    }
    .btn-download:hover {
      background: #024fa0;
      color: #fff;
    }
    .support-link {
      margin-top: 25px;
      font-size: 14px;
    }
  </style>
</head>
<body>
  <div class="thankyou-card">
    <h2>🎉 Thank You for Your Purchase!</h2>
    <p>Your BizFlow AI membership has been activated successfully.</p>

    <div class="purchase-summary">
      <h5>Purchase Summary</h5>
      <table class="table table-borderless">
        <tr>
          <td><strong>Package:</strong></td>
          <td>AI Chatbot Membership</td>
        </tr>
        <tr>
          <td><strong>Amount Paid:</strong></td>
          <td>$3.00</td>
        </tr>
        <tr>
          <td><strong>Transaction ID:</strong></td>
          <td>#TXN123456</td>
        </tr>
        <tr>
          <td><strong>Status:</strong></td>
          <td><span class="badge bg-success">Completed</span></td>
        </tr>
        <tr>
          <td><strong>Date:</strong></td>
          <td>September 30, 2025</td>
        </tr>
      </table>
    </div>

    <div class="downloads">
      <a href="/downloads/chatbot.zip" class="btn-download">⬇ Download Chatbot Package</a>
      <a href="/downloads/guide.pdf" class="btn-download">📄 Download Installation Guide</a>
    </div>

    <div class="support-link">
      <p>Need help? <a href="mailto:support@bizflowai.com">Contact Support</a></p>
      <a href="/" class="btn btn-outline-secondary mt-3">⬅ Back to Home</a>
    </div>
  </div>
</body>
</html>
>>>>>>> 6a21fed7f7ff83d705f194ef929999fb894554c9
