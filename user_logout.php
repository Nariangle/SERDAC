<?php
// Start session if it hasn't been started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if the user is a regular user
if (isset($_SESSION["user_id"]) || $_SESSION['UserID'] || isset($_SESSION["UserName"]) || $_SESSION["AdminName"] != "admins") {
    // Unset all session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();

    // Redirect to the login page
    header("Location: index.php");
    exit();
} else {
    // Redirect to the homepage
    header("Location: index.php");
    exit();
}
?>
