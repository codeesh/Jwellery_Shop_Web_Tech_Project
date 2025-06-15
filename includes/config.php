<?php
// Basic configuration
define('SITE_NAME', 'Jewelry Shop');
define('SITE_URL', 'http://localhost/jewelry-shop');

// File paths
define('PRODUCTS_FILE', __DIR__ . '/../data/products.json');
define('USERS_FILE', __DIR__ . '/../data/users.json');

// Start session
session_start();

// Default timezone
date_default_timezone_set('UTC');
?>