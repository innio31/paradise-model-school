<?php
// Database configuration
define('DB_HOST', 'localhost');
define('DB_USER', 'school_db_user');
define('DB_PASS', 'secure_password');
define('DB_NAME', 'greenwood_high');

// Establish database connection
try {
    $pdo = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
}
?>