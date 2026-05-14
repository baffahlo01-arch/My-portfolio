<?php
session_start();

// Clear all session data
$_SESSION = array();

// Destroy session cookie
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time() - 3600, '/');
}

// Destroy admin cookie
if (isset($_COOKIE['admin_session'])) {
    setcookie('admin_session', '', time() - 3600, '/');
}

// Destroy session
session_destroy();

header('Location: login.php');
exit;
?>