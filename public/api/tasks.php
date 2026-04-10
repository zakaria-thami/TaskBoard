<?php
session_start();

// If the session variable doesn't exist, OR it's not true...
if (!isset($_SESSION["is_logged"]) || $_SESSION["is_logged"] !== true) {
    header("Location: /login.php");
    exit;
}
?>

<?php

$file_path="../../data/tasks.json";

header('Content-Type: application/json');

if (file_exists($file_path)){
    echo file_get_contents($file_path);
}else{
    echo "[]";
}



exit;