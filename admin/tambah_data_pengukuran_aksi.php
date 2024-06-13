<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit;
}

include 'connection.php';
$nik = $_POST['nik'];
$tanggal_pengukuran = $_POST['tanggal_pengukuran'];
$berat_badan = $_POST['berat_badan'];
$tinggi_badan = $_POST['tinggi_badan'];
$bbu = $_POST['bbu'];
$tbu = $_POST['tbu'];
$bbtb = $_POST['bbtb'];

try {
    $stmt = $conn->prepare("INSERT INTO pengukuran (nik, tanggal_pengukuran, berat_badan, tinggi_badan, bbu, tbu, bbtb) VALUES (:nik, :tanggal_pengukuran, :berat_badan, :tinggi_badan, :bbu, :tbu, :bbtb)");
    $stmt->bindParam(":nik", $nik);
    $stmt->bindParam(":tanggal_pengukuran", $tanggal_pengukuran);
    $stmt->bindParam(":berat_badan", $berat_badan);
    $stmt->bindParam(":tinggi_badan", $tinggi_badan);
    $stmt->bindParam(":bbu", $tbu);
    $stmt->bindParam(":tbu", $tbu);
    $stmt->bindParam(":bbtb", $bbtb);
    $stmt->execute();
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    header("location:tambah_data_pengukuran.php?pesan=gagal&nik=" . $nik);
    exit;
}

header("location:tambah_data_pengukuran.php?pesan=input&nik=" . $nik);

?>