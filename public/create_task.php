<?php
session_start();

// If the session variable doesn't exist, OR it's not true...
if (!isset($_SESSION["is_logged"]) || $_SESSION["is_logged"] !== true) {
    header("Location: /login.php");
    exit;
}

require_once '../backend/functions.php';
require_once '../backend/db.php';

$label= $_POST["task_label"];
$desc=$_POST["task_desc"];

#$file_path="../data/tasks.json";
save_task($conn, $label, $desc, 1);

header("Location: /");
exit;