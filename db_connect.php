<?php
$host = '127.0.0.1';      // MySQL server
$db   = 'paramount_db';   // database name
$user = 'root';            // default XAMPP username
$pass = '';                // default XAMPP password (empty)

try {
    // Connect to MySQL
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "✅ Database connected!";
} catch (PDOException $e) {
    echo "❌ Connection failed: " . $e->getMessage();
    exit;
}
