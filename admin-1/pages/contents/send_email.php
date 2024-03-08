<?php 
  ob_start();
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;
  require_once('../../../vendor/autoload.php'); // Fix the path to autoload.php
   
  require_once("../../../Includes/DB.php");
  require_once("../../../Includes/Functions.php");
  require_once("../../../Includes/Sessions.php");
  $msg="";

  
  // Get the appointment details from the database

  $id = $_POST['id'];
  
  global $ConnectingDB;
  $stmt =   $ConnectingDB->prepare("SELECT * from appointments where id = :id");
  $stmt->bindValue(':id', $id);
  $stmt->execute();
  $row = $stmt->fetch(PDO::FETCH_ASSOC);

    $user            = $row['user'];
    $firstName       = $row['first_name'];
    $lastName        = $row['last_name'];
    $email           = $row['email'];
    $contact         = $row['contact'];
    $address         = $row['address'];
    $zip             = $row['zip'];
    $region          = $row['region'];
    $timeStart       = $row['time_start'];
    $timeEnd         = $row['time_end'];
    $trainer         = $row['trainer'];
    $date            = $row['date'];
  

    $sql = "UPDATE appointments SET status = 'approved' WHERE id = :id";
    $stmt = $ConnectingDB->prepare($sql);
    $stmt->bindValue(':id', $id);

    $stmt->execute();

    // $firstName = $_POST['firstName'];
    // $timeStart  = $_POST['TimeStart'];
    // $timeEnd    = $_POST['TimeEnd'];
    // $date       = $_POST['dateAppointment'];

  // Create a new PHPMailer object
  $mail = new PHPMailer(true);

  try {
    // Server settings
    $mail->SMTPDebug = 2; // Set to 2 for debugging
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'wushyyme@gmail.com';                   //SMTP username
    $mail->Password   = 'noelajugepwrrpyi';  
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Recipients
    $mail->setFrom('wushyyme@gmail.com', 'zura'); // Replace with your name and Gmail account
    $mail->addAddress($email, $firstName); // Use the email and firstNam$firstName variables from the appointment details
    $image_path = '../../../assets/img/serdac-banner.png';
    $image_cid = $mail->addEmbeddedImage($image_path, 'my-image');
    $html_body = "<img src='cid:my-image' />";
    // Content
    $mail->isHTML(true);
    $mail->Subject = 'WMSU-SERDAC Appointment Confirmation';
    $mail->Body = "<br> $html_body <br> 
    <b>Greetings <i> $firstName </i> from WMSU-SERDAC.</b> <br> <br> This is a notification that serves as confirmation that your appointment has been approved on: <b>$timeStart</b> which ends at 
    <b>$timeEnd</b> at <i>$date</i>. <br>
    For further questions of your appointment you can contact us at 0917 109 8164 or email us at wmsuserdac@wmsu.edu.ph 
    <br><br> Sincerly, 
    <br> Administrator <br>
    - Western Mindanao State University Satellite - Socio-economic and Data Analytics Center.";
    $mail->send();
    echo 'success';
  } catch (Exception $e) {
    echo 'Error: ' . $mail->ErrorInfo;
  }

?>
