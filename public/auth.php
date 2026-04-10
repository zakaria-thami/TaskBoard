<?php
// 1. ALWAYS start the session first thing!
// Hint: Look up the PHP function to start a session.
session_start();

// 2. Grab the submitted username and password from the form
$submitted_user = trim($_POST['username']);
$submitted_pass = trim($_POST['password']);

// 3. hardcoded credentials 
$correct_user = 'admin';
$correct_pass = 'admin';

// 4. Check if they match!
if ($submitted_pass!=$correct_pass || $submitted_user != $correct_user ) {
    // 5. Failure! Kick them back to the login page.
    header("Location: /login.php");
    
} else {
   // 6. Success! Give them the VIP badge.
   $_SESSION["is_logged"]= true;
   // 7. Redirect them to the main board (index.php)
   header("Location: /");
}

exit;