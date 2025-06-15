<?php
require_once '../includes/config.php';
require_once '../includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    
    $admin = verify_admin($email, $password);
    
    if ($admin) {
        $_SESSION['admin'] = $admin;
        header('Location: dashboard.php');
        exit;
    } else {
        $error = "Invalid email or password";
    }
}

$page_title = "Admin Login";
require_once '../includes/header.php';
?>

<div class="login-container">
    <h2>Admin Login</h2>
    <?php if (isset($error)): ?>
        <div class="error-message"><?php echo $error; ?></div>
    <?php endif; ?>
    <form method="POST">
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit" class="login-btn">Login</button>
    </form>
</div>

<?php require_once '../includes/footer.php'; ?>