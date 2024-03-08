<?php
require_once("../../../Includes/DB.php"); 
require_once("../../../Includes/Functions.php"); 
require_once("../../../Includes/Sessions.php");

Confirm_Login();

if (isset($_GET['participant_id']) && isset($_GET['training_id'])) {
    $participantID = $_GET['participant_id'];
    $trainingID = $_GET['training_id'];

    // Get the participant's current status
    $statusQuery = "SELECT status FROM training_list WHERE participant_id = :id";
    $stmt = $ConnectingDB->prepare($statusQuery);
    $stmt->bindValue(':id', $participantID, PDO::PARAM_INT);
    $stmt->execute();
    $participantStatus = $stmt->fetchColumn();

    // Prepare and execute the update statement to set status to 'declined'
    $updateQuery = "UPDATE training_list SET status = 'declined' WHERE participant_id = :id";
    $stmt = $ConnectingDB->prepare($updateQuery);
    $stmt->bindValue(':id', $participantID, PDO::PARAM_INT);
    $result = $stmt->execute();

    if ($result) {
        $_SESSION['SuccessMessage'] = "A participant has been declined in training ID of " . $trainingID . "!";
        
        // Check if the previous status was 'approved' and update num_participants accordingly
        if ($participantStatus == 'approved') {
            $updateCountQuery = "UPDATE training_details SET num_participants = num_participants - 1 WHERE training_id = :trainingID";
            $stmt = $ConnectingDB->prepare($updateCountQuery);
            $stmt->bindValue(':trainingID', $trainingID, PDO::PARAM_INT);
            $stmt->execute();
        }

        Redirect_to("manage_trainings.php");
    } else {
        $_SESSION['ErrorMessage'] = "Something went wrong. Please try again!";
        Redirect_to("manage_trainings.php");
    }
} else {
    $_SESSION['ErrorMessage'] = "No participant selected for declining!";
    Redirect_to("manage_trainings.php");
}


?>
