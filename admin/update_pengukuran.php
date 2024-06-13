<?php 
include 'connection.php';
$id = $_POST['id'];
$tanggal_pengukuran = $_POST['tanggal_pengukuran'];
$berat_badan = $_POST['berat_badan'];
$tinggi_badan = $_POST['tinggi_badan'];
$bbu =  $_POST['bbu'];
$tbu =  $_POST['tbu'];
$bbtb =  $_POST['bbtb'];
try {
    $stmt = $conn->prepare("UPDATE pengukuran SET id=?, tanggal_pengukuran=?, berat_badan=?, tinggi_badan=?, bbu=?, tbu=?, bbtb=? WHERE id=?");
    $stmt->bindParam(1, $id);
    $stmt->bindParam(2, $tanggal_pengukuran);
    $stmt->bindParam(3, $berat_badan);
    $stmt->bindParam(4, $tinggi_badan);
    $stmt->bindParam(5, $bbu);
    $stmt->bindParam(6, $tbu);
    $stmt->bindParam(7, $bbtb);
    $stmt->bindParam(8, $id);
    $stmt->execute();
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    header("location:edit_pengukuran.php?pesan=gagal&id=" . $id);
    exit;
}

header("location:edit_pengukuran.php?pesan=update&id=" . $id);
?>