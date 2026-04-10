<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    
    <div class="login">
        <div class="title">Welcome</div>
        <form action="/auth.php" method="post">
        <label for="username">Username</label>
        <input type="text" id="username" name=username>
        <label for="password">Password</label>
        <input type="password" id="password" name="password">
        <input class="button" type="submit" value="Login">
        </form>
    </div>
</body>
</html>