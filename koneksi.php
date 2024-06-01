<?php
$conn = new mysqli('localhost', 'root', '', 'rose');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$result = $conn->query("SELECT * FROM pengukuran JOIN anak ON pengukuran.nik = anak.nik");
?>