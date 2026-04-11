<?php
session_start();

// If the session variable doesn't exist, OR it's not true...
if (!isset($_SESSION["is_logged"]) || $_SESSION["is_logged"] !== true) {
    header("Location: /login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Taskboard</title>
</head>
<body>
    <div class="header">
        <div class="title" >Welcome to Taskboard Lite</div>
    </div>
    
    <div class="section">
        <div class="task_section">
        
            <form action="/create_task.php" method="post">
                <label for="task_label">Label</label>
                <input type="text" id="task_label" name="task_label">
                <label for="task_desc">Description</label>
                <input type="text" id="task_desc" name="task_desc">
                <input class="button" type="submit" value="Create">
            </form>
        </div>
    </div>
    
    <div class="section">
        <div class="title">
                Tasks :
            </div>
        <div class="card_section" id="card_board">
            
        </div>
    </div>
    
<script src="app.js"></script>

</body>
</html>