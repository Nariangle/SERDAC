<?php include("../../../Includes/DB.php"); ?>  
<?php require_once("../../../Includes/Functions.php"); ?>
<?php require_once("../../../Includes/Sessions.php"); ?>
<?php

global $ConnectingDB;

if (isset($_GET['trainingID']) && isset($_GET['participantID'])) {
    $trainingID = $_GET['trainingID'];
    $participantID = $_GET['participantID'];

    // Update the 'status' column in the 'training_list' table
    $stmt = $ConnectingDB->prepare("UPDATE training_list SET status = 'approved' WHERE training_id = :trainingID AND participant_id = :participantID");
    $stmt->bindParam(':trainingID', $trainingID);
    $stmt->bindParam(':participantID', $participantID);
    $stmt->execute();

    // Increment the 'num_participants' count in the 'training_details' table
    $stmt = $ConnectingDB->prepare("UPDATE training_details SET num_participants = num_participants + 1 WHERE training_id = :trainingID");
    $stmt->bindParam(':trainingID', $trainingID);
    $Execute=$stmt->execute();

        if($Execute) {
            $_SESSION["SuccessMessage"]="Participant APPROVED succesfully in training id of:".$trainingID." ! ";
            Redirect_to("manage_trainings.php");
        } else {
            $_SESSION["ErrorMessage"]= $stmt->errorInfo();
            Redirect_to("manage_trainings.php");
        }

} else {
    // Handle the case when the parameters are not provided
    // Redirect back to the previous page or display an error message
}
?>