<?php

ob_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require_once('../../../vendor/autoload.php'); 
require_once("../../../Includes/DB.php");
require_once("../../../Includes/Functions.php");
require_once("../../../Includes/Sessions.php");


if (isset($_POST['submit'])) {

  // Get form data
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];

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
    $mail->setFrom('wushyyme@gmail.com', 'zura'); // Replace with your name and Gmail account
    $mail->addAddress($email); // Set recipient email address
    // $mail->addAttachment($file_path, $file_name); // Add attachment

    // Content
    $mail->isHTML(true);
    $mail->Subject = $subject;

    // Add the image banner to the message
    $image_path = '../../../assets/img/serdac-banner.png';
    $image_cid = $mail->addEmbeddedImage($image_path, 'my-image');
    $html_body = "<img src='cid:my-image' />";

    $mail->Body = "<br> $html_body <br> 
                    $message
                    <br> <br>
                    - Western Mindanao State University Satellite - Socio-economic and Data Analytics Center.";
    
// Send email
$mail->send();
// set success message and redirect to datafilesend.php
$_SESSION["SuccessMessage"] = "The email has been sent successfully!";
header("Location: manage_trainings.php");
exit();
  } catch (Exception $e) {
    echo '<p style="color: red;">Error: ' . $mail->ErrorInfo . '</p>';
  }
}
?>
