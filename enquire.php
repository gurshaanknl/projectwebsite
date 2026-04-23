<?php
require_once __DIR__ . '/session-autofill.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
     <!-- Meta Tags -->
     <meta charset="utf-8">
     <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
     <!-- Author -->
     <meta name="author" content="Themes Industry">
     <!-- description -->
     <meta name="description" content="Start your enquiry with Veer Dreams. Share your vision and let us bring it to life with our premium outdoor furniture.">
     <!-- keywords -->
     <meta name="keywords" content="Veer Dreams, enquire, contact, custom furniture, outdoor furniture enquiry">
     <!-- Page Title -->
     <title>Enquire | Veer Dreams</title>
    
    <!-- Favicon -->
    <link href="furniture/img/favicon.ico" rel="icon">
    <!-- Bundle -->
    <link href="vendor/css/bundle.min.css" rel="stylesheet">
    <!-- Plugin Css -->
    <link href="vendor/css/LineIcons.min.css" rel="stylesheet">
    <link href="vendor/css/revolution-settings.min.css" rel="stylesheet">
    <link href="vendor/css/jquery.fancybox.min.css" rel="stylesheet">
    <link href="vendor/css/owl.carousel.min.css" rel="stylesheet">
    <link href="vendor/css/cubeportfolio.min.css" rel="stylesheet">
    <link href="vendor/css/wow.css" rel="stylesheet">
    <link href="furniture/css/style.css" rel="stylesheet">
</head>

<body class="site-hidden" data-spy="scroll" data-target=".navbar" data-offset="90">

<div id="site-wrapper">
   
<!-- NEW LUXURY NAVBAR START -->
<nav class="vd-navbar">
    <div class="vd-nav-inner">

        <div class="vd-nav-left">
            <a href="index.html">Home</a>
            <a href="about.html">About</a>
            <a href="our-range.html">Our Range</a>
            <a href="collections.html">Collections</a>
        </div>

        <div class="vd-nav-center">
            <img src="furniture/img/vdlogob.png" class="logo-white" alt="Veer Dreams White Logo">
            <img src="furniture/img/logoovd.png" class="logo-dark" alt="Veer Dreams Dark Logo">
        </div>

        <div class="vd-nav-right">
            <a href="clients.html">Clients</a>
            <a href="enquire.html">Enquire</a>
            <a href="catalogue.html">Catalogue</a>
            <a href="location.html">Location</a>
        </div>

    </div>
</nav>
<!-- NEW LUXURY NAVBAR END -->

<!-- HERO SECTION - AMBIENT VIDEO -->
<section class="enquire-hero-section">
    <div class="hero-video-wrapper">
        <img src="furniture/img/ss1.jpg" alt="Hero Image" class="hero-video" id="enquire-hero-video" style="width: 100%; height: 100%; object-fit: cover;">
        <div class="enquire-hero-overlay"></div>
    </div>
    <div class="enquire-hero-content">
        <h1 class="enquire-hero-title">Let's Begin a Conversation</h1>
        <p class="enquire-hero-subtext">Tell us about your vision. We'll take it from there.</p>
        <a href="#enquire-form-section" class="enquire-hero-btn">Start Your Enquiry</a>
    </div>
</section>

<!-- MAIN ENQUIRY FORM SECTION -->
<section class="enquire-form-section" id="enquire-form-section">
    <div class="container">
        <div class="row">
            <!-- Left Column - Form -->
            <div class="col-12 col-lg-7">
                <div class="enquire-form-wrapper">
                    <h2 class="enquire-form-title">Share Your Details</h2>
                    
                    <!-- Google Sign-In Button -->
                    <div id="google-signin-container" class="google-signin-wrapper" style="display: none;">
                        <div id="g_id_onload"></div>
                        <div class="google-signin-button-container">
                            <div id="google-signin-button"></div>
                        </div>
                        <p class="google-signin-hint">Quick fill with Google</p>
                    </div>
                    <div id="google-or-divider" class="google-or-divider" style="display: none;">
                        <span class="divider-line"></span>
                        <span class="divider-text">OR</span>
                        <span class="divider-line"></span>
                    </div>
                    
                    <form id="enquire-form" class="enquire-form" autocomplete="on">
                        <div class="form-group">
                            <label for="name" class="floating-label">Name</label>
                            <input type="text" id="name" name="name" class="form-control" autocomplete="name" value="<?php echo $session_name; ?>" required>
                            <span class="form-error"></span>
                        </div>

                        <div class="form-group">
                            <label for="email" class="floating-label">Email Address</label>
                            <input type="email" id="email" name="email" class="form-control" autocomplete="email" value="<?php echo $session_email; ?>" required>
                            <span class="form-error"></span>
                        </div>

                        <div class="form-group">
                            <label for="phone" class="floating-label">Phone Number (Optional)</label>
                            <input type="tel" id="phone" name="phone" class="form-control" autocomplete="tel" value="<?php echo $session_phone; ?>">
                            <span class="form-error"></span>
                        </div>

                        <div class="form-group">
                            <label for="message" class="floating-label">Message</label>
                            <textarea id="message" name="message" class="form-control" rows="6" autocomplete="off" required></textarea>
                            <span class="form-error"></span>
                        </div>

                        <button type="submit" class="enquire-submit-btn">
                            <span>Send Enquiry</span>
                            <i class="fas fa-arrow-right"></i>
                        </button>

                        <div class="form-success-message" id="form-success" style="display: none;">
                            <i class="fas fa-check-circle"></i>
                            <p>Thank you! We've received your enquiry and will respond within 24-48 hours.</p>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Right Column - Guidance Panel -->
            <div class="col-12 col-lg-5">
                <div class="enquire-guidance-panel">
                    <h3 class="guidance-title">What happens next?</h3>
                    <ul class="guidance-list">
                        <li class="guidance-item">
                            <i class="fas fa-check-circle"></i>
                            <span>We review your enquiry carefully</span>
                        </li>
                        <li class="guidance-item">
                            <i class="fas fa-check-circle"></i>
                            <span>Our team responds within 24–48 hours</span>
                        </li>
                        <li class="guidance-item">
                            <i class="fas fa-check-circle"></i>
                            <span>You receive clear next steps</span>
                        </li>
                        <li class="guidance-item">
                            <i class="fas fa-check-circle"></i>
                            <span>No obligation, no pressure</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Contact Details -->
        <div class="row">
            <div class="col-12">
                <div class="enquire-contact-details">
                    <h3 class="contact-details-title">Prefer direct contact?</h3>
                    <div class="contact-details-grid">
                        <a href="mailto:veerdreams21@gmail.com" class="contact-button contact-button-email">
                            <div class="contact-button-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="contact-button-content">
                                <span class="contact-button-label">Email Us</span>
                                <span class="contact-button-value">veerdreams21@gmail.com</span>
                            </div>
                            <div class="contact-button-arrow">
                                <i class="fas fa-arrow-right"></i>
                            </div>
                        </a>
                        <a href="tel:+919996223444" class="contact-button contact-button-phone">
                            <div class="contact-button-icon">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div class="contact-button-content">
                                <span class="contact-button-label">Call Us</span>
                                <span class="contact-button-value">+91 99962 23444</span>
                            </div>
                            <div class="contact-button-arrow">
                                <i class="fas fa-arrow-right"></i>
                            </div>
                        </a>
                        <a href="https://wa.me/919996223444?text=Hello, I am interested in your outdoor furniture collection." target="_blank" class="contact-button contact-button-whatsapp">
                            <div class="contact-button-icon">
                                <i class="fab fa-whatsapp"></i>
                            </div>
                            <div class="contact-button-content">
                                <span class="contact-button-label">WhatsApp</span>
                                <span class="contact-button-value">Chat with us</span>
                            </div>
                            <div class="contact-button-arrow">
                                <i class="fas fa-arrow-right"></i>
                            </div>
                        </a>
                        <div class="contact-button contact-button-hours">
                            <div class="contact-button-icon">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div class="contact-button-content">
                                <span class="contact-button-label">Business Hours</span>
                                <span class="contact-button-value">Mon – Sat, 10 AM – 7 PM</span>
                            </div>
                            <div class="contact-button-arrow">
                                <i class="fas fa-info-circle"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FOOTER CTA STRIP -->
<section class="enquire-footer-cta">
    <div class="container">
        <div class="enquire-cta-content">
            <div class="cta-divider"></div>
            <p class="cta-text">We look forward to creating something meaningful together.</p>
            <!-- Creative Moving Element -->
            <div class="creative-moving-element">
                <svg class="flowing-lines" viewBox="0 0 1200 200" preserveAspectRatio="none">
                    <defs>
                        <linearGradient id="lineGradient1" x1="0%" y1="0%" x2="100%" y2="0%">
                            <stop offset="0%" style="stop-color:rgba(212, 175, 55, 0);stop-opacity:0" />
                            <stop offset="50%" style="stop-color:rgba(212, 175, 55, 0.4);stop-opacity:0.4" />
                            <stop offset="100%" style="stop-color:rgba(212, 175, 55, 0);stop-opacity:0" />
                        </linearGradient>
                        <linearGradient id="lineGradient2" x1="0%" y1="0%" x2="100%" y2="0%">
                            <stop offset="0%" style="stop-color:rgba(43, 43, 43, 0);stop-opacity:0" />
                            <stop offset="50%" style="stop-color:rgba(43, 43, 43, 0.3);stop-opacity:0.3" />
                            <stop offset="100%" style="stop-color:rgba(43, 43, 43, 0);stop-opacity:0" />
                        </linearGradient>
                        <filter id="glow">
                            <feGaussianBlur stdDeviation="3" result="coloredBlur"/>
                            <feMerge>
                                <feMergeNode in="coloredBlur"/>
                                <feMergeNode in="SourceGraphic"/>
                            </feMerge>
                        </filter>
                    </defs>
                    <path class="flowing-path path-1" d="M0,100 Q300,50 600,100 T1200,100" fill="none" stroke="url(#lineGradient1)" stroke-width="2"/>
                    <path class="flowing-path path-2" d="M0,120 Q400,80 800,120 T1200,120" fill="none" stroke="url(#lineGradient2)" stroke-width="1.5"/>
                    <path class="flowing-path path-3" d="M0,80 Q250,120 500,80 T1000,80 T1200,80" fill="none" stroke="url(#lineGradient1)" stroke-width="1.8"/>
                </svg>
                <div class="elegant-particles">
                    <div class="particle particle-1"></div>
                    <div class="particle particle-2"></div>
                    <div class="particle particle-3"></div>
                    <div class="particle particle-4"></div>
                    <div class="particle particle-5"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--Footer Start-->
<footer class="main-footer">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-md-6">
                <div class="footer-social-wrapper">
                    <span class="follow-us-text">Follow Us</span>
                    <div class="footer-social">
                        <a href="https://www.facebook.com/share/182h4jxqeh/?mibextid=wwXIfr" target="_blank" class="social-icon" aria-label="Facebook">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://www.instagram.com/veer_dreams?igsh=MW4ydHV6Zm51emtpaw%3D%3D&utm_source=qr" target="_blank" class="social-icon" aria-label="Instagram">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="https://share.google/h0aXHTm781zXcaSh3" target="_blank" class="social-icon" aria-label="Google">
                            <i class="fab fa-google"></i>
                        </a>
                        <a href="https://www.linkedin.com/in/veer-dreams-65b766394/" target="_blank" class="social-icon" aria-label="LinkedIn">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="admin-login.php" class="social-icon" aria-label="Admin Dashboard" title="Admin Dashboard">
                            <i class="fas fa-shield-alt"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 text-center text-md-right">
                <p class="footer-copyright">© 2021 Veer Dreams. <span class="rights-reserved">All Rights Reserved</span>.</p>
            </div>
        </div>
    </div>
</footer>
<!--Footer End-->

</div>

<!-- WhatsApp Circle Button (Above Chat) -->
<a href="https://wa.me/919996223444?text=Hello, I am interested in your outdoor furniture collection." target="_blank" id="chatbot-whatsapp-circle" title="Chat on WhatsApp">
    <svg viewBox="0 0 24 24" fill="#25D366">
        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.375a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
    </svg>
</a>

<!-- Google Sign-In Circle Button (Above Chat) -->
<div id="chatbot-google-signin-circle" title="Sign in with Google">
    <svg viewBox="0 0 24 24">
        <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
        <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
        <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
        <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
    </svg>
</div>

<!-- AI Chat Panel -->
<div id="ai-bot">
    <div id="ai-bot-header">
        <span>Your Personal Assistant</span>
        <button id="ai-bot-close" title="Close Chat">×</button>
    </div>

    <div id="ai-bot-messages">
        <div class="bot-msg">Hi 👋 What are you looking for today?</div>
        <div class="bot-msg">
            <div class="bot-msg-buttons">
                <button class="bot-msg-button" data-action="browse-collections">Browse Collections</button>
                <button class="bot-msg-button" data-action="need-help">Need Help Choosing</button>
                <button class="bot-msg-button" data-action="custom-bulk">Custom / Bulk Enquiry</button>
            </div>
        </div>
    </div>

</div>

<!-- Floating AI Assistant -->
<div id="ai-bot-trigger">
    <img id="ai-bot-face" src="furniture/img/ai-bot-normal.webp" alt="Veer AI Assistant">
</div>

</div>

</body>
<!-- JavaScript -->
<script src="vendor/js/bundle.min.js"></script>
<!-- Plugin Js -->
<script src="vendor/js/jquery.appear.js"></script>
<script src="vendor/js/jquery.fancybox.min.js"></script>
<script src="vendor/js/owl.carousel.min.js"></script>
<script src="vendor/js/parallaxie.min.js"></script>
<script src="vendor/js/wow.min.js"></script>
<script src="vendor/js/jquery.cubeportfolio.min.js"></script>
<script src="vendor/js/wow.min.js"></script>
<!--custom js-->
<script src="vendor/js/contact_us.js"></script>
<script src="furniture/js/script.js"></script>

<!-- Form submission is handled by script.js -->

<!-- Google Sign-In API -->
<script src="https://accounts.google.com/gsi/client" async defer></script>
<script>
    // Load Google Client ID and initialize
    function initGoogleSignIn() {
        fetch('get-google-config.php')
            .then(response => response.json())
            .then(data => {
                if (data.enabled && data.client_id) {
                    // Show Google Sign-In button
                    document.getElementById('google-signin-container').style.display = 'block';
                    document.getElementById('google-or-divider').style.display = 'block';
                    
                    // Wait for Google API to be ready
                    waitForGoogleAPI(function() {
                        initializeGoogleButton(data.client_id);
                    });
                }
            })
            .catch(error => {
                console.log('Google Sign-In not configured:', error);
            });
    }
    
    function waitForGoogleAPI(callback) {
        if (typeof google !== 'undefined' && google.accounts && google.accounts.id) {
            callback();
        } else {
            // Check every 100ms until Google API is loaded
            setTimeout(function() {
                waitForGoogleAPI(callback);
            }, 100);
        }
    }
    
    function initializeGoogleButton(clientId) {
        try {
            // Initialize Google Sign-In
            google.accounts.id.initialize({
                client_id: clientId,
                callback: handleGoogleSignIn,
                auto_select: false,
                cancel_on_tap_outside: true,
                ux_mode: 'popup'
            });
            
            // Render the button (for manual sign-in option)
            google.accounts.id.renderButton(
                document.getElementById('google-signin-button'),
                { 
                    theme: "outline", 
                    size: "large", 
                    text: "sign_in_with", 
                    shape: "rectangular",
                    width: "100%"
                }
            );
            
            // Auto-prompt the sign-in popup after page loads (like homepage)
            setTimeout(function() {
                // Check if user already signed in (to avoid popup on every page load)
                if (sessionStorage.getItem('google_signed_in') !== 'true') {
                    try {
                        google.accounts.id.prompt((notification) => {
                            // Handle notification if needed
                            if (notification.isNotDisplayed()) {
                                console.log('Google Sign-In prompt not displayed:', notification.getNotDisplayedReason());
                            } else if (notification.isSkippedMoment()) {
                                console.log('Google Sign-In prompt skipped:', notification.getSkippedReason());
                            } else if (notification.isDismissedMoment()) {
                                console.log('Google Sign-In prompt dismissed:', notification.getDismissedReason());
                            }
                        });
                    } catch (error) {
                        console.error('Error showing Google Sign-In prompt:', error);
                    }
                }
            }, 2000); // Wait 2 seconds after page load
        } catch (error) {
            console.error('Error initializing Google Sign-In:', error);
        }
    }
    
    // Initialize when page loads
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', function() {
            initGoogleSignIn();
            checkHomepageSignIn();
        });
    } else {
        // Wait a bit for Google script to load
        setTimeout(initGoogleSignIn, 500);
        setTimeout(checkHomepageSignIn, 500);
    }
    
    // Check if user signed in from homepage
    function checkHomepageSignIn() {
        const signedIn = sessionStorage.getItem('google_signed_in');
        const userName = sessionStorage.getItem('google_user_name');
        const userEmail = sessionStorage.getItem('google_user_email');
        
        if (signedIn === 'true' && userName && userEmail) {
            // Auto-fill form from homepage sign-in
            const nameField = document.getElementById('name');
            const emailField = document.getElementById('email');
            const messageField = document.getElementById('message');
            
            if (nameField && userName) {
                nameField.value = userName;
                nameField.dispatchEvent(new Event('input', { bubbles: true }));
                nameField.dispatchEvent(new Event('change', { bubbles: true }));
            }
            
            if (emailField && userEmail) {
                emailField.value = userEmail;
                emailField.dispatchEvent(new Event('input', { bubbles: true }));
                emailField.dispatchEvent(new Event('change', { bubbles: true }));
            }
            
            // Set default message if empty
            if (messageField && (!messageField.value || messageField.value.trim() === '')) {
                messageField.value = 'I am interested in your furniture collection. Please contact me for more information.';
                messageField.dispatchEvent(new Event('input', { bubbles: true }));
            }
            
            // Show visual feedback
            if (nameField && emailField) {
                nameField.style.borderColor = '#4CAF50';
                emailField.style.borderColor = '#4CAF50';
                setTimeout(() => {
                    nameField.style.borderColor = '';
                    emailField.style.borderColor = '';
                }, 2000);
            }
            
            // Auto-submit after a short delay
            setTimeout(function() {
                const formData = {
                    name: nameField ? nameField.value.trim() : '',
                    email: emailField ? emailField.value.trim() : '',
                    phone: document.getElementById('phone') ? document.getElementById('phone').value.trim() : '',
                    message: messageField ? messageField.value.trim() : ''
                };
                
                if (formData.name && formData.email && formData.message) {
                    // Show loading message
                    const formWrapper = document.querySelector('.enquire-form-wrapper');
                    const loadingMsg = document.createElement('div');
                    loadingMsg.id = 'google-submit-loading';
                    loadingMsg.style.cssText = 'text-align: center; padding: 15px; background: #f0f8ff; border: 2px solid #4CAF50; border-radius: 5px; margin: 15px 0; color: #4CAF50; font-weight: 500;';
                    loadingMsg.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Submitting your enquiry automatically...';
                    if (formWrapper) {
                        formWrapper.insertBefore(loadingMsg, formWrapper.querySelector('form'));
                    }
                    
                    // Submit via AJAX
                    $.ajax({
                        url: 'submit-enquiry.php',
                        type: 'POST',
                        data: formData,
                        dataType: 'json',
                        success: function(response) {
                            const loadingEl = document.getElementById('google-submit-loading');
                            if (loadingEl) loadingEl.remove();
                            
                            if (response.status === 'success') {
                                const successMsg = document.createElement('div');
                                successMsg.style.cssText = 'text-align: center; padding: 20px; background: #d4edda; border: 2px solid #4CAF50; border-radius: 5px; margin: 15px 0; color: #155724;';
                                successMsg.innerHTML = '<i class="fas fa-check-circle" style="font-size: 24px; color: #4CAF50; margin-bottom: 10px; display: block;"></i><strong>Thank you!</strong><br>Your enquiry has been submitted successfully. We will contact you soon.';
                                if (formWrapper) {
                                    formWrapper.insertBefore(successMsg, formWrapper.querySelector('form'));
                                }
                                
                                document.getElementById('enquire-form').style.display = 'none';
                                
                                // Clear session storage
                                sessionStorage.removeItem('google_signed_in');
                                sessionStorage.removeItem('google_user_name');
                                sessionStorage.removeItem('google_user_email');
                                sessionStorage.removeItem('google_user_picture');
                                
                                // Scroll to success message
                                $('html, body').animate({
                                    scrollTop: successMsg.offsetTop - 100
                                }, 500);
                            } else {
                                alert('Error: ' + (response.message || 'Failed to submit enquiry'));
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('Error:', error);
                            alert('Failed to submit enquiry. Please try again.');
                            const loadingEl = document.getElementById('google-submit-loading');
                            if (loadingEl) loadingEl.remove();
                        }
                    });
                }
            }, 1000);
        }
    }
    
    function handleGoogleSignIn(response) {
        // Decode the JWT token to get user info
        const parts = response.credential.split('.');
        const payload = JSON.parse(atob(parts[1].replace(/-/g, '+').replace(/_/g, '/')));
        
        // Auto-fill the form fields
        const nameField = document.getElementById('name');
        const emailField = document.getElementById('email');
        const messageField = document.getElementById('message');
        
        if (payload.name) {
            nameField.value = payload.name;
            nameField.dispatchEvent(new Event('input', { bubbles: true }));
            nameField.dispatchEvent(new Event('change', { bubbles: true }));
        }
        
        if (payload.email) {
            emailField.value = payload.email;
            emailField.dispatchEvent(new Event('input', { bubbles: true }));
            emailField.dispatchEvent(new Event('change', { bubbles: true }));
        }
        
        // Set default message if empty
        if (!messageField.value || messageField.value.trim() === '') {
            messageField.value = 'I am interested in your furniture collection. Please contact me for more information.';
            messageField.dispatchEvent(new Event('input', { bubbles: true }));
        }
        
        // Show visual feedback
        nameField.style.borderColor = '#4CAF50';
        emailField.style.borderColor = '#4CAF50';
        messageField.style.borderColor = '#4CAF50';
        
        // Show loading message
        const formWrapper = document.querySelector('.enquire-form-wrapper');
        const loadingMsg = document.createElement('div');
        loadingMsg.id = 'google-submit-loading';
        loadingMsg.style.cssText = 'text-align: center; padding: 15px; background: #f0f8ff; border: 2px solid #4CAF50; border-radius: 5px; margin: 15px 0; color: #4CAF50; font-weight: 500;';
        loadingMsg.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Submitting your enquiry automatically...';
        formWrapper.insertBefore(loadingMsg, formWrapper.querySelector('form'));
        
        // Auto-submit the form after a short delay
        setTimeout(function() {
            // Get form data
            const formData = {
                name: nameField.value.trim(),
                email: emailField.value.trim(),
                phone: document.getElementById('phone').value.trim(),
                message: messageField.value.trim()
            };
            
            // Submit via AJAX (same as regular form submission)
            $.ajax({
                url: 'submit-enquiry.php',
                type: 'POST',
                data: formData,
                dataType: 'json',
                success: function(response) {
                    // Remove loading message
                    const loadingEl = document.getElementById('google-submit-loading');
                    if (loadingEl) loadingEl.remove();
                    
                    if (response.status === 'success') {
                        // Show success message
                        const successMsg = document.createElement('div');
                        successMsg.style.cssText = 'text-align: center; padding: 20px; background: #d4edda; border: 2px solid #4CAF50; border-radius: 5px; margin: 15px 0; color: #155724;';
                        successMsg.innerHTML = '<i class="fas fa-check-circle" style="font-size: 24px; color: #4CAF50; margin-bottom: 10px; display: block;"></i><strong>Thank you!</strong><br>Your enquiry has been submitted successfully. We will contact you soon.';
                        formWrapper.insertBefore(successMsg, formWrapper.querySelector('form'));
                        
                        // Hide the form
                        document.getElementById('enquire-form').style.display = 'none';
                        
                        // Reset border colors
                        nameField.style.borderColor = '';
                        emailField.style.borderColor = '';
                        messageField.style.borderColor = '';
                        
                        // Scroll to success message
                        $('html, body').animate({
                            scrollTop: successMsg.offsetTop - 100
                        }, 500);
                    } else {
                        // Show error
                        alert('Error: ' + (response.message || 'Failed to submit enquiry'));
                        const loadingEl = document.getElementById('google-submit-loading');
                        if (loadingEl) loadingEl.remove();
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                    alert('Failed to submit enquiry. Please try again.');
                    const loadingEl = document.getElementById('google-submit-loading');
                    if (loadingEl) loadingEl.remove();
                }
            });
        }, 1000); // Wait 1 second before auto-submitting
    }

    // Chatbot Google Sign-In Handler
    let chatbotGoogleClientId = null;
    
    function initChatbotGoogleSignIn() {
        fetch('get-google-config.php')
            .then(response => response.json())
            .then(data => {
                if (data.enabled && data.client_id) {
                    chatbotGoogleClientId = data.client_id;
                    
                    // Wait for Google API
                    function waitForGoogle() {
                        if (typeof google !== 'undefined' && google.accounts && google.accounts.id) {
                            // Set up chatbot button click
                            const chatbotBtn = document.getElementById('chatbot-google-signin-btn');
                            if (chatbotBtn) {
                                chatbotBtn.addEventListener('click', function() {
                                    // Initialize and prompt Google Sign-In
                                    google.accounts.id.initialize({
                                        client_id: chatbotGoogleClientId,
                                        callback: handleChatbotGoogleSignIn
                                    });
                                    
                                    // Trigger the sign-in popup
                                    google.accounts.id.prompt();
                                });
                            }
                        } else {
                            setTimeout(waitForGoogle, 100);
                        }
                    }
                    waitForGoogle();
                } else {
                    // Hide Google Sign-In button if not configured
                    const googleSigninDiv = document.getElementById('ai-bot-google-signin');
                    if (googleSigninDiv) {
                        googleSigninDiv.style.display = 'none';
                    }
                }
            })
            .catch(error => {
                console.log('Google Sign-In not configured for chatbot');
                const googleSigninDiv = document.getElementById('ai-bot-google-signin');
                if (googleSigninDiv) {
                    googleSigninDiv.style.display = 'none';
                }
            });
    }

    function handleChatbotGoogleSignIn(response) {
        // Decode the JWT token to get user info
        const parts = response.credential.split('.');
        const payload = JSON.parse(atob(parts[1].replace(/-/g, '+').replace(/_/g, '/')));
        
        // Save to database via our API
        fetch('save-chatbot-contact.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                name: payload.name || '',
                email: payload.email || '',
                phone: '' // Google doesn't provide phone
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                // Hide Google Sign-In button
                const googleSigninDiv = document.getElementById('ai-bot-google-signin');
                if (googleSigninDiv) {
                    googleSigninDiv.classList.add('hidden');
                }
                
                // Show success message in chatbot
                const messagesDiv = document.getElementById('ai-bot-messages');
                if (messagesDiv) {
                    const successMsg = document.createElement('div');
                    successMsg.className = 'bot-msg';
                    successMsg.innerHTML = '✅ Thank you! Your contact information has been shared with us. We\'ll get in touch with you soon!';
                    messagesDiv.appendChild(successMsg);
                    messagesDiv.scrollTop = messagesDiv.scrollHeight;
                }
            } else {
                alert('Error: ' + (data.message || 'Failed to save contact information'));
            }
        })
        .catch(error => {
            console.error('Error saving contact:', error);
            alert('Error saving contact information. Please try again.');
        });
    }

    // Initialize chatbot Google Sign-In when page loads
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initChatbotGoogleSignIn);
    } else {
        setTimeout(initChatbotGoogleSignIn, 1000);
    }
</script>

</body>
</html>
