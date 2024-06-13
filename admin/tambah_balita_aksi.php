<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit;
}

include 'connection.php';
$nik = $_POST['nik'];
$jenis_anggota = $_POST['jenis_anggota'];
$nama = $_POST['nama'];
$tanggal_lahir = $_POST['tgl_lahir'];
$alamat = $_POST['alamat'];

try {
    $stmt = $conn->prepare("INSERT INTO anak (nik, jenis_anggota, nama, tanggal_lahir, alamat) VALUES (:nik, :jenis_anggota, :nama, :tanggal_lahir, :alamat)");
    $stmt->bindParam(":nik", $nik);
    $stmt->bindParam(":jenis_anggota", $jenis_anggota);
    $stmt->bindParam(":nama", $nama);
    $stmt->bindParam(":tanggal_lahir", $tanggal_lahir);
    $stmt->bindParam(":alamat", $alamat);
    $stmt->execute();
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    header("location:tambah_balita.php?pesan=gagal&nik=" . $nik);
    exit;
}

header("location:tambah_balita.php?pesan=input&nik=" . $nik);

?>