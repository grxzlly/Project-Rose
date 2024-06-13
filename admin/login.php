<?php
session_start();

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "rose";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

if (isset($_POST['username'], $_POST['password'], $_POST['role'])) {
    $user = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $query = "SELECT * FROM admin WHERE username = ? AND password = ? AND role= ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sss", $user, $password, $role); // Bind both parameters as strings
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['username'] = $user;
        $_SESSION['password'] = $password;
        $_SESSION['role'] = $role;
        header("Location: include.php");
        exit;
    } else {
        $_SESSION['error'] = "Username atau password atau role salah!";
        header("Location: index.php");
        exit;
    }
}
?>
