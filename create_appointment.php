<?php
ob_start();
session_start();
  include("Includes/connection.php");
  include("Includes/Functions.php");
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;
  
  //Load Composer's autoloader
  require 'vendor/autoload.php';
$DSN='mysql:host = localhost; dbname=u946870446_cms'; 
$ConnectingDB = new PDO($DSN,'u946870446_serdac','WmsuSerdac123'); 

$stmt = $ConnectingDB->prepare("INSERT INTO appointments (user, first_name, last_name, email, 
contact, address, zip, region, date, mi) 
VALUES (:user, :first_name, :last_name, :email, 
:contact, :address, :zip, :region, :date, :mi)");
$msggg ="guest"; //might need edit
$stmt->bindParam(':user', $msggg);
$stmt->bindParam(':first_name', $_POST['firstName']);
$stmt->bindParam(':last_name', $_POST['lastName']);
$stmt->bindParam(':email', $_POST['email']);
$stmt->bindParam(':contact', $_POST['contactNumber']);
$stmt->bindParam(':address', $_POST['address']);
$stmt->bindParam(':zip', $_POST['zipcode']);
$stmt->bindParam(':region', $_POST['region']);
$stmt->bindParam(':date', $_POST['dateAppointment']);
$stmt->bindParam(':mi', $_POST['mi']);


$stmt->execute();
$first_name = $_POST['firstName'];
$date = $_POST['dateAppointment'];

$mail = new PHPMailer(true);
try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'wushyyme@gmail.com';                   //SMTP username
    $mail->Password   = 'noelajugepwrrpyi';                     //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    //Recipients
    $mail->setFrom('wushyyme@gmail.com');
    $mail->addAddress($_POST['email']);
    $image_path = 'assets/img/serdac-banner.png';
    $image_cid = $mail->addEmbeddedImage($image_path, 'my-image');
    $html_body = "<img src='cid:my-image' />";
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'WMSU-SERDAC Appointment Creation';
    $mail->Body    = " <br> $html_body <br> 
    <b>Greetings <i> $first_name </i> from WMSU-SERDAC.</b> <br> <br> You have succesfully created an appointment at <i>$date</i>. <br>
    Please wait for the confirmation of your appointment. <br> Thank you for understanding! <br> <br>
    - Western Mindanao State University Satellite - Socio-economic and Data Analytics Center.";
    $mail->send();
    header("Location: data_analytics.php?success=1");
    
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
ob_end_clean(); 

?>