<head>
    <link rel="stylesheet" href="dist/css/result.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="dist/css/result.css">
    <link rel="icon" type="image/x-icon" href="dist/assets/favicon.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
    <title>Posyandu Mawar</title>
</head>
<html>
    <body>
        
    
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nik = $_POST['nik'];

    // Koneksi ke database
    $conn = new mysqli('localhost', 'root', '', 'rose');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Ambil data anak berdasarkan NIK
    $stmt = $conn->prepare("SELECT * FROM anak WHERE nik = ?");
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("s", $nik);
    if (!$stmt->execute()) {
        die("Execute failed: " . $stmt->error);
    }

    $result_anak = $stmt->get_result();
    if ($result_anak === false) {
        die("Get result failed: " . $stmt->error);
    }

    $anak = $result_anak->fetch_assoc();

    if ($anak) {
        // Ambil data pengukuran berdasarkan NIK
        $stmt = $conn->prepare("SELECT * FROM pengukuran WHERE nik = ?");
        if ($stmt === false) {
            die("Prepare failed: " . $conn->error);
        }

        $stmt->bind_param("s", $nik);
        if (!$stmt->execute()) {
            die("Execute failed: " . $stmt->error);
        }

        $result_pengukuran = $stmt->get_result();
        if ($result_pengukuran === false) {
            die("Get result failed: " . $stmt->error);
        }
        // start box header title
        echo "<div class='widget-box'>";
        echo "<div class='container-fluid'>";
        echo "<div class='widget-header widget-header-small'>";
        echo "<b><h5 class='widget-title'><i class='bi bi-person-fill'></i>Data Anak</h5></b>";
        echo "</div>";
        // finish box header title

        //IMPORTANT DO NOT DELETE/EDIT AT ALL
        // echo "<div class='data-anak'>";
        // echo "<p>NIK: " . $anak['nik'] . "</p>" ;
        // echo "<p>Nama: " . $anak['nama'] . "</p>" ;
        // echo "<p>Tanggal Lahir: " . $anak['tanggal_lahir'] . "</p>" ;
        // echo "<p>Alamat: " . $anak['alamat'] . "</p>" ;
        // echo "<p>Provinsi: " . $anak['provinsi'] . "</p>" ;
        // echo "<p>Kabupaten: " . $anak['kabupaten'] . "</p>" ;
        // echo "<p>Kecamatan: " . $anak['kecamatan'] . "</p>" ;
        // echo "</div></div>" ;
        //END OF IMPOORTANT

        echo "<div class='data-anak'>";
        echo "<table class='table table-anak'>";
        echo "<tbody>";
        echo "<tr>" ;
        echo "<td>NIK</td>" . "<td>:</td>" . "<td>" . "&nbsp;" . $anak['nik'] . "</td>" ;  
        echo "</tr>" ;
        echo "<tr>" ;
        echo "<td>Nama</td>" . "<td>:</td>" . "<td>" . "&nbsp;" . $anak['nama'] . "</td>" ;
        echo "</tr>" ;
        echo "<tr>" ;
        echo "<td>Tanggal Lahir</td>" . "<td>:</td>" . "<td>" . "&nbsp;" . $anak['tanggal_lahir'] . "</td>" ;
        echo "</tr>" ;
        echo "<tr>" ;
        echo "<td>Alamat</td>" . "<td>:</td>" . "<td>" . "&nbsp;" . $anak['alamat'] . "</td>" ;
        echo "</tr>" ;
        echo "</tbody>" ;
        echo "</table>" ;
        echo "</div>" ;
        echo "</div>" ;
        echo "<hr>";

        echo "<div class='container-fluid table-responsive'>" ;
        echo "<h5>Data Pengukuran</h5>" ;
        if ($result_pengukuran->num_rows > 0) {
            echo "<table class='table table-ukur'>" ;
            echo "<thead>" ;
            echo "<tr>" ;
            echo "<th>Tanggal Pengukuran</th>" ;
            echo "<th>Berat Badan (Kg)</th>" ;
            echo "<th>Tinggi Badan (Cm)</th>" ;
            echo "<th>BBU</th>" ;
            echo "<th>TBU</th>" ;
            echo "<th>BBTB</th>" ;
            echo "</tr>" ;
            echo "</thead>" ;
            echo "<tbody>" ;
            while ($row = $result_pengukuran->fetch_assoc()) {
                echo "<tr>" ;
                echo "<td>" . $row['tanggal_pengukuran'] . "</td>" ;
                echo "<td>" . $row['berat_badan'] . "</td>" ;
                echo "<td>" . $row['tinggi_badan'] . "</td>" ;
                echo "<td>" . $row['bbu'] . "</td>" ;
                echo "<td>" . $row['tbu'] . "</td>" ;
                echo "<td>" . $row['bbtb'] . "</td>" ;
                echo "</tr>" ;
            }
            echo "</div>" ;
            echo "</tbody>" ;
            echo "</table>" ;
        } else {
            echo "<p>Belum ada data pengukuran untuk anak ini.</p>" ;
        }

        echo "</div>" ;
    } else {
        echo "<div class='container'><p>NIK tidak ditemukan.</p></div>" ;
    }

    $stmt->close();
    $conn->close();
}
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>