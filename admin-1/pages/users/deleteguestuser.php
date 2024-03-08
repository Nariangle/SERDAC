<?php
require_once("../../../Includes/DB.php"); 
require_once("../../../Includes/Functions.php"); 
require_once("../../../Includes/Sessions.php");

Confirm_Login();

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Prepare and execute the delete statement
    $stmt = $ConnectingDB->prepare("DELETE FROM users WHERE id = ?");
    $stmt->bindParam(1, $id, PDO::PARAM_INT);
    $result = $stmt->execute();
    
    if($result) {
        $_SESSION['SuccessMessage'] = "Guest user deleted successfully!";
        Redirect_to("manage_guest_users.php");
    } else {
        $_SESSION['ErrorMessage'] = "Something went wrong. Please try again!";
        Redirect_to("manage_guest_users.php");
    }
} else {
    $_SESSION['ErrorMessage'] = "No guest user selected for deletion!";
    Redirect_to("manage_guest_users.php");
}
?>
