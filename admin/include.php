<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}

include 'connection.php';

include 'includes/header.php';
include 'includes/body.php';
include 'includes/footer.php';
?>