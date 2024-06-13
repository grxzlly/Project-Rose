<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit;
}
include 'connection.php';
$id = $_GET['id'];

try {
    $stmt = $conn->prepare("DELETE FROM admin WHERE id=?");
    $stmt->execute([$id]);
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    header("location:data_admin.php?pesan=gagal&id=" . $id);
    exit;
}

header("location:data_admin.php?pesan=hapus&id=" . $id);
?>