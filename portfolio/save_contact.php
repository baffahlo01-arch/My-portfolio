<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$subject = trim($_POST['subject'] ?? '');
$message = trim($_POST['message'] ?? '');

// Validation
if (empty($name) || empty($email) || empty($subject) || empty($message)) {
    header('Location: index.php?status=error');
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header('Location: index.php?status=error');
    exit;
}

try {
    // Save to database
    $stmt = $pdo->prepare("INSERT INTO contacts (name, email, subject, message, created_at) VALUES (?, ?, ?, ?, NOW())");
    $stmt->execute([$name, $email, $subject, $message]);
    
    // Optional: Send email notification via SMTP
    // Uncomment and configure after uploading PHPMailer
    /*
    require_once 'includes/PHPMailer/src/Exception.php';
    require_once 'includes/PHPMailer/src/PHPMailer.php';
    require_once 'includes/PHPMailer/src/SMTP.php';
    
    $mail = new PHPMailer\PHPMailer\PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'your-email@gmail.com';
    $mail->Password = 'your-app-password';
    $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;
    $mail->setFrom('your-email@gmail.com', 'Portfolio Contact');
    $mail->addAddress('your-email@gmail.com');
    $mail->Subject = "New Contact: $subject";
    $mail->Body = "From: $name\nEmail: $email\n\n$message";
    $mail->send();
    */
    
    header('Location: index.php?status=success');
    exit;
    
} catch(PDOException $e) {
    header('Location: index.php?status=error');
    exit;
}
?>