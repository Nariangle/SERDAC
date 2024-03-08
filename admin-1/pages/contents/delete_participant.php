<?php
require_once("../../../Includes/DB.php"); 
require_once("../../../Includes/Functions.php"); 
require_once("../../../Includes/Sessions.php");

Confirm_Login();

if(isset($_GET['participant_id']) && isset($_GET['training_id'])) {
    $participantID = $_GET['participant_id'];
    $trainingID = $_GET['training_id'];
    
    // Get the participant's status
    $statusQuery = "SELECT status FROM training_list WHERE participant_id = :id";
    $stmt = $ConnectingDB->prepare($statusQuery);
    $stmt->bindValue(':id', $participantID, PDO::PARAM_INT);
    $stmt->execute();
    $participantStatus = $stmt->fetchColumn();

    // Prepare and execute the delete statement
    $deleteQuery = "DELETE FROM training_list WHERE participant_id = :id";
    $stmt = $ConnectingDB->prepare($deleteQuery);
    $stmt->bindValue(':id', $participantID, PDO::PARAM_INT);
    $result = $stmt->execute();
    
    if($result) {
        $_SESSION['SuccessMessage'] = "Participant deleted successfully!";
        if ($participantStatus == 'approved') {
            // Update the num_participants count in training_details
            $updateQuery = "UPDATE training_details SET num_participants = num_participants - 1 WHERE training_id = :trainingID";
            $stmt = $ConnectingDB->prepare($updateQuery);
            $stmt->bindValue(':trainingID', $trainingID, PDO::PARAM_INT);
            $stmt->execute();
        }
        Redirect_to("manage_trainings.php");
    } else {
        $_SESSION['ErrorMessage'] = "Something went wrong. Please try again!";
        Redirect_to("manage_trainings.php");
    }
} else {
    $_SESSION['ErrorMessage'] = "No participant selected for deletion!";
    Redirect_to("manage_trainings.php");
}


?>
