<?php
$isLocal = in_array($_SERVER['HTTP_HOST'] ?? '', ['localhost', '127.0.0.1']);

if ($isLocal) {
    $host = '127.0.0.1';
    $dbname = 'portfolio_db';
    $username = 'root';
    $password = '';
} else {
    // InfinityFree — REPLACE THESE WITH YOUR ACTUAL VALUES
    $host = 'sql311.infinityfree.com';      // Your MySQL Hostname
    $dbname = 'if0_41902892_portfolio'; // Your Database Name
    $username = 'if0_41902892';      // Your Username
    $password = '16KAfi6TpsdFfKF';     // Your Password
}

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    $errorMsg = $isLocal ? $e->getMessage() : 'Database connection failed.';
    die($errorMsg);
}

session_start();
?>