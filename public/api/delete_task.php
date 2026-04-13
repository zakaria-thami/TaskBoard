<?php
session_start();

// If the session variable doesn't exist, OR it's not true...
if (!isset($_SESSION["is_logged"]) || $_SESSION["is_logged"] !== true) {
    header("Location: /login.php");
    exit;
}
require_once "../../backend/db.php";

header("Content-Type: application/json");

$task_id=trim($_POST['id']);
$user_id=$_SESSION["user_id"];

$sql = "DELETE FROM tasks WHERE id = ? AND user_id = ?";
$stmt = $conn->prepare($sql);

if($stmt->execute([$task_id,$user_id])){
    echo json_encode(["success"=>true]);
}else{
    echo json_encode(["success"=> false, "error" => "Database failed"]);
}




