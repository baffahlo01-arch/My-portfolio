<?php
// Include database connection
require_once 'config.php';

// Only accept POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

// Get form data
$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$subject = trim($_POST['subject'] ?? '');
$message = trim($_POST['message'] ?? '');

// Server-side validation
if (empty($name) || empty($email) || empty($subject) || empty($message)) {
    header('Location: index.php?status=error');
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header('Location: index.php?status=error');
    exit;
}

// Save to database
try {
    $stmt = $pdo->prepare("INSERT INTO contacts (name, email, subject, message) VALUES (?, ?, ?, ?)");
    $stmt->execute([$name, $email, $subject, $message]);
    
    // Success - redirect back with success message
    header('Location: index.php?status=success');
    exit;
    
} catch(PDOException $e) {
    // Error
    header('Location: index.php?status=error');
    exit;
}
?>