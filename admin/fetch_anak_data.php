<?php
session_start();
include 'connection.php';

// Query to fetch the data from the anak entity
$sql = "SELECT COUNT(*) as jumlah_anak FROM anak;";
$result = $conn->query($sql);

// Fetch the data from the query result
$row = $result->fetch(PDO::FETCH_ASSOC);

// Return the data as JSON
echo json_encode($row);

