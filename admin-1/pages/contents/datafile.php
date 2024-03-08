<?php

ob_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require_once('../../../vendor/autoload.php'); 
require_once("../../../Includes/DB.php");
require_once("../../../Includes/Functions.php");
require_once("../../../Includes/Sessions.php");
$id=$_GET['sendid'];
$sql = "SELECT * FROM requests WHERE id=$id";
            $stmt = $ConnectingDB->query($sql);
            if ($stmt->rowCount() > 0) {
                while ($DataRows = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $status = $DataRows['status'];
                    echo ErrorMessage(); // Call errormessage
                    echo SuccessMessage();
                }
            }

if (isset($_POST['submit'])) {

  // Get form data
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];
  $file_path = $_FILES['file']['tmp_name'];
  $file_name = $_FILES['file']['name'];
  $status = $_POST['status'];

  $sql = "UPDATE requests set status='active' where id='$id'";
  $stmt = $ConnectingDB->query($sql);
  if ($stmt->rowCount() > 0) {
      while ($DataRows = $stmt->fetch(PDO::FETCH_ASSOC)) {
          $status = $DataRows['status'];
          echo ErrorMessage(); // Call errormessage
          echo SuccessMessage();
      }
  }

  // Create a new PHPMailer object
  $mail = new PHPMailer(true);

  try {
    // Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER; // Set to SMTP::DEBUG_OFF for production use
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'wushyyme@gmail.com'; // Replace with your Gmail address
    $mail->Password = 'noelajugepwrrpyi'; // Replace with your Gmail password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Recipients
    $mail->setFrom('wushyyme@gmail.com', 'Wushy'); // Replace with your name and Gmail account
    $mail->addAddress($email); // Set recipient email address
    $mail->addAttachment($file_path, $file_name); // Add attachment

    // Content
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body = $message;

    
// Send email
$mail->send();
// set success message and redirect to datafilesend.php
$_SESSION["SuccessMessage"] = "The file has been sent successfully!";
header("Location: manage_dataset.php");
exit();
  } catch (Exception $e) {
    echo '<p style="color: red;">Error: ' . $mail->ErrorInfo . '</p>';
  }
}
?>
