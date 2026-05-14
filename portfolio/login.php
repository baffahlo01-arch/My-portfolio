<?php
require_once 'config.php';

// Redirect if already logged in
if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header('Location: dashboard.php');
    exit;
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
    
    // Check credentials
    $stmt = $pdo->prepare("SELECT * FROM admin_users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();
    
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_username'] = $user['username'];
        
        header('Location: dashboard.php');
        exit;
    } else {
        $error = 'Invalid username or password.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body style="display: flex; justify-content: center; align-items: center; min-height: 100vh; background: #0f0f1a;">
    <div style="background: #1a1a2e; padding: 3rem; border-radius: 1rem; border: 1px solid #2d2d44; width: 100%; max-width: 400px;">
        <h2 style="text-align: center; margin-bottom: 2rem; color: #fff;">
            <i class="fas fa-lock" style="color: #6366f1;"></i> Admin Login
        </h2>
        
        <?php if ($error): ?>
            <div style="background: rgba(239, 68, 68, 0.1); color: #f87171; padding: 1rem; border-radius: 0.5rem; margin-bottom: 1rem;"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>
        
        <form method="POST">
            <div style="margin-bottom: 1.5rem;">
                <label style="display: block; color: #a0a0b0; margin-bottom: 0.5rem; font-size: 0.875rem;">Username</label>
                <input type="text" name="username" required style="width: 100%; padding: 0.75rem 1rem; background: #0f0f1a; border: 2px solid #2d2d44; border-radius: 0.5rem; color: #fff; font-size: 1rem;">
            </div>
            <div style="margin-bottom: 1.5rem;">
                <label style="display: block; color: #a0a0b0; margin-bottom: 0.5rem; font-size: 0.875rem;">Password</label>
                <input type="password" name="password" required style="width: 100%; padding: 0.75rem 1rem; background: #0f0f1a; border: 2px solid #2d2d44; border-radius: 0.5rem; color: #fff; font-size: 1rem;">
            </div>
            <button type="submit" style="width: 100%; padding: 0.875rem; background: linear-gradient(135deg, #6366f1, #8b5cf6); color: #fff; border: none; border-radius: 0.5rem; font-size: 1rem; font-weight: 600; cursor: pointer;">
                Login
            </button>
        </form>
        
        <p style="text-align: center; margin-top: 1.5rem;">
            <a href="index.php" style="color: #6366f1; text-decoration: none;">← Back to Portfolio</a>
        </p>
    </div>
</body>
</html>