<?php
// koneksi.php
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'rose';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Koneksi database gagal: " . $e->getMessage();
    exit;
}
?>