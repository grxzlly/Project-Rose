<?php
session_start();
include 'connection.php';

$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM admin WHERE username =? AND password =?";
$stmt = $conn->prepare($query);
$stmt->execute([$username, $password]);
$result = $stmt->fetch(); // Fixed here

if ($result) {
    $_SESSION['username'] = $username;
    header("Location: include.php");
    exit;
} else {
    echo "Invalid username or password.";
}
?>