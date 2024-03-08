<?php
require_once("../../../Includes/DB.php");
require_once("../../../Includes/Functions.php");
require_once("../../../Includes/Sessions.php");

Confirm_Login();

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare and execute the update statement
    $stmt = $ConnectingDB->prepare("UPDATE users SET status = 'active' WHERE id = ?");
    $stmt->bindParam(1, $id, PDO::PARAM_INT);
    $result = $stmt->execute();

    if ($result) {
        $_SESSION['SuccessMessage'] = "Guest user reactivated successfully!";
        Redirect_to("manage_guest_users.php");
    } else {
        $_SESSION['ErrorMessage'] = "Something went wrong. Please try again!";
        Redirect_to("manage_guest_users.php");
    }
} else {
    $_SESSION['ErrorMessage'] = "No guest user selected for reactivation!";
    Redirect_to("manage_guest_users.php");
}
?>
