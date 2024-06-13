<?php 
include 'connection.php';
$nik = $_POST['nik'];
$jenis_anggota = $_POST['jenis_anggota'];
$nama = $_POST['nama'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$alamat =  $_POST['alamat'];
try {
    $stmt = $conn->prepare("UPDATE anak SET jenis_anggota=?, nama=?, tanggal_lahir=?, alamat=? WHERE nik=?");
    $stmt->bindParam(1, $jenis_anggota);
    $stmt->bindParam(2, $nama);
    $stmt->bindParam(3, $tanggal_lahir);
    $stmt->bindParam(4, $alamat);
    $stmt->bindParam(5, $nik);
    $stmt->execute();
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    header("location:edit_anak.php?pesan=gagal&nik=" . $nik);
    exit;
}

header("location:edit_anak.php?pesan=update&nik=" . $nik);
?>