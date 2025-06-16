<?php

// Error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Basic configuration
define('SITE_NAME', 'Jewelry Shop');
define('SITE_URL', 'http://localhost/jewelry-shop');

// File paths - Verify these paths are correct
define('PRODUCTS_FILE', __DIR__ . '/../data/products.json');
define('USERS_FILE', __DIR__ . '/../data/users.json');

// Default timezone
date_default_timezone_set('UTC');