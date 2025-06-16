<?php

session_start();
require_once '../includes/config.php';
require_once '../includes/functions.php';

session_regenerate_id(true);
$_SESSION = array();

// Redirect if already logged in
if (isset($_SESSION['admin'])) {
    header('Location: dashboard.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');
    
    // Basic validation
    if (empty($email)) {
        $error = 'Email is required';
    } elseif (empty($password)) {
        $error = 'Password is required';
    } else {
        // Load users from JSON file
        $users = [];
        if (file_exists(USERS_FILE)) {
            $json = file_get_contents(USERS_FILE);
            $users = json_decode($json, true) ?? [];
        }
        
        // Find admin user
        $admin = null;
        foreach ($users as $user) {
            if (isset($user['email']) && 
                $user['email'] === $email && 
                isset($user['role']) && 
                $user['role'] === 'admin') {
                $admin = $user;
                break;
            }
        }
        
        // Verify credentials
        if ($admin && isset($admin['password']) && $password === $admin['password']) {
            $_SESSION['admin'] = [
                'id' => $admin['id'] ?? '',
                'name' => $admin['name'] ?? '',
                'email' => $admin['email'] ?? '',
                'password' => $admin['password'] ?? '',
                'role' => $admin['role'] ?? ''
            ];
            header('Location: dashboard.php');
            exit;
        } else {
            $error = 'Invalid email or password';
        }
    }
}

$page_title = "Admin Login";
require_once '../includes/header.php';
?>

<div class="login-container">
    <h2>Admin Login</h2>
    <?php if (isset($error)): ?>
        <div class="error-message"><?php echo htmlspecialchars($error); ?></div>
    <?php endif; ?>
    <form method="POST">
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required 
                   value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>">
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit" class="login-btn">Login</button>
    </form>
</div>

<?php require_once '../includes/footer.php'; ?>