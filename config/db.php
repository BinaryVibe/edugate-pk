<?php
// Database credentials
$host = 'localhost';
$port = '3307';      // <--- ADD THIS
$dbname = 'edugate_db';
$username = 'root';
$password = '';      // Default XAMPP password is usually empty

try {
    // We added ";port=$port" to the connection string below
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8", $username, $password);
    
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

} catch(PDOException $e) {
    die("Database Connection Failed: " . $e->getMessage());
}
?>