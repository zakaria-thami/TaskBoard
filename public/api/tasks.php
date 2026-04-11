<?php
session_start();

// If the session variable doesn't exist, OR it's not true...
if (!isset($_SESSION["is_logged"]) || $_SESSION["is_logged"] !== true) {
    header("Location: /login.php");
    exit;
}

#$file_path="../../data/tasks.json";

require_once "../../backend/db.php";

header('Content-Type: application/json');

$sql="SELECT * FROM tasks WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([1]) ;

#fetch the data executed from stmt

#PDO::FETCH_ASSOC to make the pdo return a clean array
$tasks = $stmt->fetchall(PDO::FETCH_ASSOC);

echo json_encode($tasks);
exit;