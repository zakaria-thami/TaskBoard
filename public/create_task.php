<?php
session_start();

// If the session variable doesn't exist, OR it's not true...
if (!isset($_SESSION["is_logged"]) || $_SESSION["is_logged"] !== true) {
    header("Location: /login.php");
    exit;
}

require_once '../backend/functions.php';
require_once '../backend/db.php';

$label = htmlspecialchars(trim($_POST['task_label']), ENT_QUOTES, 'UTF-8');
$desc = htmlspecialchars(trim($_POST['task_desc']), ENT_QUOTES, 'UTF-8');


#$file_path="../data/tasks.json";
save_task($conn, $label, $desc, $_SESSION['user_id']);

header("Location: /");
exit;