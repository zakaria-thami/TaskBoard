<?php
// 1. ALWAYS start the session first thing!
// Hint: Look up the PHP function to start a session.
session_start();

require_once "../backend/db.php";

// 2. Grab the submitted username and password from the form
$submitted_user = trim($_POST['username']);
$submitted_pass = $_POST['password'];

// 4. Check for match in db
$sql="SELECT * FROM users WHERE username=? ";
$stmt=$conn->prepare($sql);
$stmt->execute([$submitted_user]);

$user=$stmt->fetch();
#if user holds an array signifies a correct fetch with at least one element;
if ($user && 1){
    if(password_verify($submitted_pass, $user['password'])){
        $_SESSION["is_logged"]= true;
        $_SESSION["user_id"]=$user['id'];
        // 7. Redirect them to the main board (index.php)
        header("Location: /");
    }else{
        //wrong password case
        header("Location: /login.php");
    }
}else{
    //unexisiting user case
    header("Location: /login.php");
};
exit;