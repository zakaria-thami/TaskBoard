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
    
    <div class="kanban-board">
        <div class="column">
            <h3>To do</h3>
            <div id="col-todo" class="task-list"></div>
        </div>
        <div class="column">
            <h3>Doing</h3>
            <div id="col-doing" class="task-list"></div>
        </div>
        <div class="column">
            <h3>Done</h3>
            <div id="col-done" class="task-list"></div>
        </div>


    </div>
    
<script src="app.js"></script>

</body>
</html>