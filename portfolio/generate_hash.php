<?php
$password = 'admin123';
$hash = password_hash($password, PASSWORD_DEFAULT);
echo "Password: $password<br>";
echo "Hash: $hash<br>";
echo "Verify test: " . (password_verify($password, $hash) ? 'TRUE' : 'FALSE');
?>