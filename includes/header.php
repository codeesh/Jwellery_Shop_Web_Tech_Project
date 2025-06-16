<?php require_once 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title ?? SITE_NAME; ?></title>
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/components.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
</head>
<body>
    <nav class="navbar">
        <div class="nav-container">
            <div class="nav-logo">
                <h1><a href="/">📿Jewelry Shop</a></h1>
            </div>
            <ul class="nav-menu">
                <li><a href="/" class="nav-link">Home</a></li>
                <li><a href="/products.php" class="nav-link">Products</a></li>
                <li><a href="/about.php" class="nav-link">About</a></li>
                <li><a href="/contact.php" class="nav-link">Contact</a></li>
            </ul>
            <div class="nav-actions">
                <button class="cart-btn" onclick="toggleCart()">
                    🛒 <span id="cart-count">0</span>
                </button>
                <?php if (isset($_SESSION['admin'])): ?>
                    <a href="/admin/dashboard.php" class="auth-btn">Admin</a>
                <?php else: ?>
                    <a href="/admin/login.php" class="auth-btn">Login</a>
                <?php endif; ?>
            </div>
        </div>
    </nav>