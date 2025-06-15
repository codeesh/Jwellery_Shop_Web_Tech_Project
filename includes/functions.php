<?php
require_once 'config.php';

// Get all products
function get_products() {
    if (file_exists(PRODUCTS_FILE)) {
        $json = file_get_contents(PRODUCTS_FILE);
        return json_decode($json, true) ?: [];
    }
    return [];
}

// Get featured products
function get_featured_products() {
    $products = get_products();
    return array_filter($products, function($product) {
        return $product['featured'] ?? false;
    });
}

// Get products by category
function get_products_by_category($category) {
    $products = get_products();
    return array_filter($products, function($product) use ($category) {
        return $product['category'] === $category;
    });
}

// Verify admin login
function verify_admin($email, $password) {
    if (file_exists(USERS_FILE)) {
        $users = json_decode(file_get_contents(USERS_FILE), true);
        foreach ($users as $user) {
            if ($user['email'] === $email && password_verify($password, $user['password'])) {
                return $user;
            }
        }
    }
    return false;
}

// Add new product
function add_product($product_data) {
    $products = get_products();
    $product_data['id'] = uniqid();
    $products[] = $product_data;
    file_put_contents(PRODUCTS_FILE, json_encode($products, JSON_PRETTY_PRINT));
    return $product_data;
}
?>