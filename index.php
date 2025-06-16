<?php
$page_title = "Jewelry Shop - Premium Jewelry Collection";
require_once 'includes/header.php';
require_once 'includes/functions.php';

$featured_products = get_featured_products();
?>

<section class="hero">
    <div class="hero-content">
        <h1 class="hero-title">Exquisite Jewelry Collection</h1>
        <p class="hero-subtitle">Discover timeless elegance with our handcrafted jewelry pieces</p>
        <a href="/products.php" class="cta-btn">Shop Now</a>
    </div>
    <div class="hero-image">
        <img src="/images/luxury_jwelry_hero_img.jpg" alt="Luxury Jewelry">
    </div>
</section>

<section class="products-section">
    <div class="container">
        <h2 class="section-title">Featured Collection</h2>
        <div class="products-grid">
            <?php foreach ($featured_products as $product): ?>
            <div class="product-card">
                <div class="product-image">
                    <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>">
                </div>
                <div class="product-info">
                    <h3><?php echo $product['name']; ?></h3>
                    <p class="product-price">৳<?php echo number_format($product['price'], 2); ?></p>
                    <button class="add-to-cart" data-id="<?php echo $product['id']; ?>">Add to Cart</button>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>