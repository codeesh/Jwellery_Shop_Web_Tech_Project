<?php
$page_title = "Contact Us - Jewelry Shop";
require_once 'includes/header.php';
?>

<section class="contact-section">
    <div class="container">
        <h2 class="section-title">Contact Information</h2>
        
        <div class="contact-grid">
            <div class="contact-card">
                <div class="contact-icon">
                    <i class="fas fa-store"></i>
                </div>
                <h3>Visit Us</h3>
                <p>123 Jewelry Lane<br>
                Diamond District<br>
                New York, NY 10001</p>
                <p class="hours">
                    <strong>Hours:</strong><br>
                    Mon-Fri: 10am - 7pm<br>
                    Sat: 10am - 5pm<br>
                    Sun: Closed
                </p>
            </div>
            
            <div class="contact-card">
                <div class="contact-icon">
                    <i class="fas fa-phone"></i>
                </div>
                <h3>Call Us</h3>
                <p class="phone-number">
                    <a href="tel:+15551234567">(555) 123-4567</a>
                </p>
                <p>For immediate assistance during business hours</p>
            </div>
            
            <div class="contact-card">
                <div class="contact-icon">
                    <i class="fas fa-envelope"></i>
                </div>
                <h3>Email Us</h3>
                <p class="email-address">
                    <a href="mailto:info@jewelryshop.com">info@jewelryshop.com</a>
                </p>
                <p>We respond within 24 business hours</p>
            </div>
        </div>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>