<?php
require_once '../config.php';

// Redirect if already logged in
if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header('Location: dashboard.php');
    exit;
}
#test for some change 
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // DEBUG - Check what we received
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
      // Check credentials
    $stmt = $pdo->prepare("SELECT * FROM admin_users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();
    
    if ($user && password_verify($password, $user['password'])) {
        // Set session
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_username'] = $user['username'];
        
        // Set cookie for 7 days
        setcookie('admin_session', session_id(), time() + 604800, '/');
        
        header('Location: dashboard.php');
        exit;
    } else {
        $error = 'Invalid username or password.';
    }
    // Check credentials
    $stmt = $pdo->prepare("SELECT * FROM admin_users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();
    
    if ($user && password_verify($password, $user['password'])) {
        // Set session
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_username'] = $user['username'];
        
        // Set cookie for 7 days
        setcookie('admin_session', session_id(), time() + 604800, '/');
        
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
    <link rel="stylesheet" href="../styles.css">
</head>
<body style="display: flex; justify-content: center; align-items: center; min-height: 100vh;">
    <div style="background: var(--bg-card); padding: 3rem; border-radius: 1rem; border: 1px solid var(--border-color); width: 100%; max-width: 400px;">
        <h2 style="text-align: center; margin-bottom: 2rem;"><i class="fas fa-lock"></i> Admin Login</h2>
        
        <?php if ($error): ?>
            <div style="background: rgba(239, 68, 68, 0.1); color: #f87171; padding: 1rem; border-radius: 0.5rem; margin-bottom: 1rem;"><?php echo $error; ?></div>
        <?php endif; ?>
        
        <form method="POST">
            <div class="form-group">
                <input type="text" name="username" required placeholder=" " style="width: 100%; padding: 1rem; background: var(--bg-dark); border: 2px solid var(--border-color); border-radius: 0.5rem; color: var(--text-primary); margin-bottom: 1rem;">
                <label style="display: block; margin-bottom: 0.5rem;">Username</label>
            </div>
            <div class="form-group">
                <input type="password" name="password" required placeholder=" " style="width: 100%; padding: 1rem; background: var(--bg-dark); border: 2px solid var(--border-color); border-radius: 0.5rem; color: var(--text-primary); margin-bottom: 1rem;">
                <label style="display: block; margin-bottom: 0.5rem;">Password</label>
            </div>
            <button type="submit" class="btn btn-primary btn-full">Login</button>
        </form>
        
        <p style="text-align: center; margin-top: 1rem;"><a href="../index.php" style="color: var(--text-secondary);">← Back to Portfolio</a></p>
    </div>
</body>
</html>