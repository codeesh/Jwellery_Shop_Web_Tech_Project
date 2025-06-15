<?php
$page_title = "Our Jewelry Collection";
require_once 'includes/header.php';
require_once 'includes/functions.php';

$category = $_GET['category'] ?? 'all';
$products = $category === 'all' ? get_products() : get_products_by_category($category);
?>

<section class="products-section">
    <div class="container">
        <h2 class="section-title">Our Collection</h2>
        
        <div class="category-filter">
            <a href="/products.php" class="filter-btn <?php echo $category === 'all' ? 'active' : ''; ?>">All</a>
            <a href="/products.php?category=rings" class="filter-btn <?php echo $category === 'rings' ? 'active' : ''; ?>">Rings</a>
            <a href="/products.php?category=necklaces" class="filter-btn <?php echo $category === 'necklaces' ? 'active' : ''; ?>">Necklaces</a>
            <a href="/products.php?category=earrings" class="filter-btn <?php echo $category === 'earrings' ? 'active' : ''; ?>">Earrings</a>
            <a href="/products.php?category=bracelets" class="filter-btn <?php echo $category === 'bracelets' ? 'active' : ''; ?>">Bracelets</a>
        </div>

        <div class="products-grid">
            <?php foreach ($products as $product): ?>
            <div class="product-card">
                <div class="product-image">
                    <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>">
                </div>
                <div class="product-info">
                    <h3><?php echo $product['name']; ?></h3>
                    <p class="product-price">$<?php echo number_format($product['price'], 2); ?></p>
                    <button class="add-to-cart" data-id="<?php echo $product['id']; ?>">Add to Cart</button>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>