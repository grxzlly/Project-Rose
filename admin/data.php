<?php
include 'connection.php';

ob_start();
include 'fetch_anak_data.php';
$fetch_anak_data_output = ob_get_clean();

ob_start();
include 'fetch_pengukuran_data.php';
$fetch_pengukuran_data_output = ob_get_clean();


header('Content-Type: application/json');
echo json_encode([
    'anak_data' => json_decode($fetch_anak_data_output, true),
    'pengukuran_data' => json_decode($fetch_pengukuran_data_output, true)
]);

// Kosongkan buffer dan kirim output ke browser
ob_end_flush();