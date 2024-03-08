<?php
require_once("../../../Includes/DB.php"); 
require_once("../../../Includes/Functions.php"); 
require_once("../../../Includes/Sessions.php");

Confirm_Login();

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Prepare and execute the delete statement
    $stmt = $ConnectingDB->prepare("DELETE FROM trainers WHERE id = ?");
    $stmt->bindParam(1, $id, PDO::PARAM_INT);
    $result = $stmt->execute();
    
    if($result) {
        $_SESSION['SuccessMessage'] = "Trainer deleted successfully!";
        Redirect_to("manage_trainer.php");
    } else {
        $_SESSION['ErrorMessage'] = "Something went wrong. Please try again!";
        Redirect_to("manage_trainer.php");
    }
} else {
    $_SESSION['ErrorMessage'] = "No trainer selected for deletion!";
    Redirect_to("manage_trainer.php");
}
?>
