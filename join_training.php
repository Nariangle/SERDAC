<?php
include("Includes/Functions.php");
include("Includes/DB.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

?>

<?php

        global $ConnectingDB;
        session_start();

        
        $trainingID = $_POST['trainingId'];
        $stmt = $ConnectingDB->prepare("SELECT * FROM trainings WHERE training_id = :trainingID");
        $stmt->bindValue(':trainingID', $trainingID, PDO::PARAM_INT);
        $stmt->execute();
        
        $trainingData = $stmt->fetch(PDO::FETCH_ASSOC);
        $title = $trainingData['title'];
        $description = $trainingData['description'];
        $start_time = $trainingData['start_time'];
        $end_time = $trainingData['end_time'];
        $training_date = $trainingData['training_date'];
        $venue = $trainingData['venue'];

        

            $stmt = $ConnectingDB->prepare("INSERT INTO training_list (training_id, trainer_id, fname, mname, lname, email, contact, affiliation, occupation, status)
                VALUES (:trainingID, :trainerID, :firstName, :middleInitial, :lastName, :email, :contact, :affiliation, :occupation, 'pending')");
        
            // Bind the values to the placeholders
            $stmt->bindParam(':trainingID', $_POST['trainingId']);
            $stmt->bindValue(':trainerID', $_POST['trainerId']);
            $stmt->bindValue(':firstName', $_POST['firstname']);
            $stmt->bindValue(':middleInitial', $_POST['middleinitial']);
            $stmt->bindValue(':lastName', $_POST['lastname']);
            $stmt->bindValue(':email', $_POST['email']);
            $stmt->bindValue(':contact', $_POST['contactNo']);
            $stmt->bindValue(':affiliation', $_POST['affiliation']);
            $stmt->bindValue(':occupation', $_POST['occupation']);

            $stmt->execute();

            $Name   =   $_POST['firstname'];

            $mail = new PHPMailer(true);
            try {
                //Server settings
                $mail->SMTPDebug = 0;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'wushyyme@gmail.com';                   //SMTP username
                $mail->Password   = 'noelajugepwrrpyi';                     //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS
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
                <b>Greetings, <i> $Name </i> from WMSU-SERDAC.</b> <br> <br> Your request to join the training titled <b>$title</b> which is scheduled to start on
                <b>$training_date</b> at <i>$start_time</i> has been sent successfully. The training will be held at <b>$venue</b>. <br>
                Please wait for an administrator to contact you and approve your request. <br> Thank you for understanding! <br> <br>
                - Western Mindanao State University Satellite - Socio-economic and Data Analytics Center.";
                $mail->send();
                header("Location: trainings.php?success=1");
                
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
            ob_end_clean(); 


?>