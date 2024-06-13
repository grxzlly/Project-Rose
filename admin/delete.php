<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit;
}
include 'connection.php';
$nik = $_GET['nik'];

try {
    $stmt = $conn->prepare("DELETE FROM anak WHERE nik=?");
    $stmt->execute([$nik]);
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    header("location:master_balita.php?pesan=gagal&nik=" . $nik);
    exit;
}

header("location:master_balita.php?pesan=hapus&nik=" . $nik);
?>