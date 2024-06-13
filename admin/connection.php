<?php
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'rose';
try {
    $conn = new PDO("mysql:host=localhost;dbname=rose", 'root', '');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}