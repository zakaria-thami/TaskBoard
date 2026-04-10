<?php
session_start();

// If the session variable doesn't exist, OR it's not true...
if (!isset($_SESSION["is_logged"]) || $_SESSION["is_logged"] !== true) {
    header("Location: /login.php");
    exit;
}
?>

<?php
require_once '../backend/functions.php';
$label= $_POST["task_label"];
$desc=$_POST["task_desc"];

$file_path="../data/tasks.json";
save_task($label,$desc,$file_path);

header("Location: /");
exit;