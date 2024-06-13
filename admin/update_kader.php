<?php 
include 'connection.php';
$id = $_POST['id'];
$nama = $_POST['username'];
$password = $_POST['password'];
$role = $_POST['role'];
 
try {
    $stmt = $conn->prepare("UPDATE admin SET username=?, password=?, role=? WHERE id=?");
    $stmt->bindParam(1, $nama);
    $stmt->bindParam(2, $password);
    $stmt->bindParam(3, $role);
    $stmt->bindParam(4, $id);
    $stmt->execute();
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    header("location:edit_kader.php?pesan=gagal&id=" . $id);
    exit;
}

header("location:edit_kader.php?pesan=update&id=" . $id);
?>