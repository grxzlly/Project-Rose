<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit;
}

include 'connection.php';
$username = $_POST['username'];
$password = $_POST['password'];
$role = $_POST['role'];

try {
    $stmt = $conn->prepare("INSERT INTO admin (username, password, role) VALUES (:username, :password, :role)");
    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":password", $password);
    $stmt->bindParam(":role", $role);
    $stmt->execute();
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    header("location:add_kader.php?pesan=gagal");
    exit;
}

header("location:add_kader.php?pesan=input");

?>