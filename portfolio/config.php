<?php
// Line 1: Database settings
$host = 'localhost';
$dbname = 'portfolio_db';
$username = 'root';     // Change this to your MySQL username
$password = '';         // Empty is default for XAMPP

// Line 8: Connect to database
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Line 18: Start session (for admin login later)
session_start();
?>