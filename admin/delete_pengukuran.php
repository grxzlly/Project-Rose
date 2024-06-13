<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit;
}
include 'connection.php';
$id = $_GET['id'];

try {
    $stmt = $conn->prepare("DELETE FROM pengukuran WHERE id=?");
    $stmt->execute([$id]);
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    header("location:data_pengukuran.php?pesan=gagal&id=" . $id);
    exit;
}

header("location:data_pengukuran.php?pesan=hapus&id=" . $id);
?>