<?php 
require_once '../backend/db.php';

if($_SERVER['REQUEST_METHOD']==='POST'){
    $username=trim($_POST['username']);
    $raw_password=$_POST['password'];

    $hashed_password=password_hash($raw_password, PASSWORD_DEFAULT); 
 
    $sql="INSERT INTO users (username, password) VALUES (?, ?)";
    $stmt= $conn->prepare($sql);

    try{
        $stmt->execute([$username,$hashed_password]);

        header("Location: /login.php");
        exit;
    }catch(\PDOException $e){
        $error_message= "Username already taken!";
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Register</title>
</head>

<body>
    
    <div class="login">
        <div class="title">Registration</div>
        <form action="/register.php" method="post">
        <label for="username">Username</label>
        <input type="text" id="username" name=username>
        <label for="password">Password</label>
        <input type="password" id="password" name="password">
        <input class="button" type="submit" value="Login">
        </form>
    </div>
</body>
</html>