<?php
$page_title = "About Us - Jewelry Shop";
require_once 'includes/header.php';
?>

<section class="about-section">
    <div class="container">
        <div class="about-content">
            <div class="about-text">
                <h2>About Jewelry Shop</h2>
                <p>For over 50 years, we have been crafting exceptional jewelry pieces that celebrate life's most precious moments. Our master artisans combine traditional techniques with contemporary design to create timeless pieces that will be treasured for generations.</p>
                
                <div class="features">
                    <div class="feature">
                        <h3>✨ Premium Quality</h3>
                        <p>Only the finest materials and gemstones</p>
                    </div>
                    <div class="feature">
                        <h3>🎨 Custom Design</h3>
                        <p>Bespoke pieces tailored to your vision</p>
                    </div>
                    <div class="feature">
                        <h3>🛡️ Lifetime Warranty</h3>
                        <p>Guaranteed craftsmanship and quality</p>
                    </div>
                </div>
            </div>
            
            <div class="about-image">
                <img src="/assets/images/about.jpg" alt="Jewelry Crafting">
            </div>
        </div>
        
        <!-- Our Team Section -->
        <div class="team-section">
            <h3>Meet Our Master Jewelers</h3>
            <div class="team-grid">
                <div class="team-member">
                    <img src="/assets/images/team1.jpg" alt="Sarah Johnson">
                    <h4>Sarah Johnson</h4>
                    <p>Head Designer</p>
                    <p>25 years of experience in diamond setting</p>
                </div>
                <div class="team-member">
                    <img src="/assets/images/team2.jpg" alt="Michael Chen">
                    <h4>Michael Chen</h4>
                    <p>Master Goldsmith</p>
                    <p>Specializes in custom engagement rings</p>
                </div>
                <div class="team-member">
                    <img src="/assets/images/team3.jpg" alt="Elena Rodriguez">
                    <h4>Elena Rodriguez</h4>
                    <p>Gemstone Expert</p>
                    <p>GIA certified gemologist</p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>