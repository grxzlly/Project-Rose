<?php
session_start();

// Unset all session variables
$_SESSION = array();
if (isset($_COOKIE[session_name()])){
    setcookie(session_name(), '',time()-86400,'/');
}

session_destroy();
// Redirect to index.php
header('Location: index.php?action=logout');
exit;
?>
