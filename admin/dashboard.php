<?php

session_start();
require_once '../includes/config.php';
require_once '../includes/functions.php';

if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product = [
        'name' => $_POST['name'],
        'description' => $_POST['description'],
        'price' => (float)$_POST['price'],
        'category' => $_POST['category'],
        'image' => $_POST['image'],
        'featured' => isset($_POST['featured'])
    ];
    
    add_product($product);
    $success = "Product added successfully!";
}

$products = get_products();
$page_title = "Admin Dashboard";
require_once '../includes/header.php';
?>

<div class="admin-container">
    <h2>Admin Dashboard</h2>
    
    <?php if (isset($success)): ?>
        <div class="success-message"><?php echo $success; ?></div>
    <?php endif; ?>
    
    <div class="admin-section">
        <h3>Add New Product</h3>
        <form method="POST">
            <div class="form-group">
                <label>Name:</label>
                <input type="text" name="name" required>
            </div>
            <div class="form-group">
                <label>Description:</label>
                <textarea name="description" required></textarea>
            </div>
            <div class="form-group">
                <label>Price:</label>
                <input type="number" step="0.01" name="price" required>
            </div>
            <div class="form-group">
                <label>Category:</label>
                <select name="category" required>
                    <option value="rings">Rings</option>
                    <option value="necklaces">Necklaces</option>
                    <option value="earrings">Earrings</option>
                    <option value="bracelets">Bracelets</option>
                </select>
            </div>
            <div class="form-group">
                <label>Image URL:</label>
                <input type="text" name="image" required>
            </div>
            <div class="form-group">
                <label>
                    <input type="checkbox" name="featured"> Featured Product
                </label>
            </div>
            <button type="submit" class="add-product-btn">Add Product</button>
        </form>
    </div>
    
    <div class="admin-section">
        <h3>Current Products</h3>
        <div class="products-list">
            <?php foreach ($products as $product): ?>
            <div class="product-item">
                <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>">
                <div class="product-details">
                    <h4><?php echo $product['name']; ?></h4>
                    <p>৳<?php echo number_format($product['price'], 2); ?></p>
                    <p><?php echo ucfirst($product['category']); ?></p>
                    <?php if ($product['featured'] ?? false): ?>
                        <span class="featured-badge">Featured</span>
                    <?php endif; ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<?php require_once '../includes/footer.php'; ?>