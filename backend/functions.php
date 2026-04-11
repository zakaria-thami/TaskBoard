<?php

function save_task($conn, $label, $desc, $user_id){

    $sql="INSERT INTO tasks (label,description, user_id) VALUES (?, ?, ?)";

    //satement using PDO
    $stmt = $conn->prepare($sql);

    //excute the statement passing an array of variable to fill the place holders
    $stmt->execute([$label, $desc, $user_id]);

    return true;
}