<?php
require_once("../../../Includes/DB.php");
require_once("../../../Includes/Functions.php");
require_once("../../../Includes/Sessions.php");
require_once('../../../vendor/autoload.php');


$_SESSION["TrackingURL"] = $_SERVER["PHP_SELF"];
Confirm_Login();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$DSN = 'mysql:host=localhost;dbname=u946870446_cms';
$ConnectingDB = new PDO($DSN, 'u946870446_serdac', 'WmsuSerdac123');

// Database connection
// Fetching data for the form
$id = $_GET['editid'];
$sql = "SELECT * FROM requests WHERE id = :id";
$stmt = $ConnectingDB->prepare($sql);
$stmt->bindValue(':id', $id);
$stmt->execute();

if ($stmt->rowCount() > 0) {
    while ($DataRows = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $id = $DataRows['id'];
        $first_name = $DataRows['first_name'];
        $last_name = $DataRows['last_name'];
        $email = $DataRows['email'];
        $dataset = $DataRows['dataset'];
        $author = $DataRows['author'];
        $status = $DataRows['status'];
        $purpose = $DataRows['purpose'];
        $Occupation = $DataRows['Occupation'];
        $Affiliation = $DataRows['Affiliation'];
        
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
            $id = $_GET['editid'];
            $newStatus = filter_var($_POST['status'], FILTER_SANITIZE_STRING);

            // Update the status in the database
            $sql = "UPDATE requests SET status = :status WHERE id = :id";
            $stmt = $ConnectingDB->prepare($sql);
            $stmt->bindValue(':status', $newStatus);
            $stmt->bindValue(':id', $id);

            $execute = $stmt->execute();
            if ($execute) {
                $_SESSION["SuccessMessage"] = "Status updated successfully.";

                // Send email notification
                $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
                $status = $newStatus;

                try {
                    $mail = new PHPMailer(true);
                    $mail->isSMTP();
                    $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                    $mail->Username   = 'wushyyme@gmail.com';                   //SMTP username
                    $mail->Password   = 'noelajugepwrrpyi';                     //SMTP password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                    $mail->Port       = 465;                                    
                    
                    $mail->setFrom('wushyyme@gmail.com');
                    $mail->addAddress($_POST['email']);

                    $mail->isHTML(true);
                    $mail->Subject = 'WMSU-SATELLITE SERDAC';

                    if ($status == 'approved') {
                        $mail->Body = "
                        <br>
                        $html_body
                        <br>
                        <b>Greetings $email from WMSU-SATELLITE SERDAC</b>
                        <br><br>
                        Your request has been approved. You can now download the file you requested from our site. Please revisit our site and download the file.
                        <br>
                        Thank you for choosing WMSU-SATELLITE SERDAC!
                        <br><br>
                        - Western Mindanao State University Satellite - Socio-economic and Data Analytics Center.";
                    } elseif ($status == 'rejected') {
                        $mail->Body = "
                        <br>
                        $html_body
                        <br>
                        <b>Greetings $email from WMSU-SATELLITE SERDAC.</b>
                        <br><br>
                        We regret to inform you that your request has been rejected.
                        <br>
                        If you have any questions or concerns, please contact our support team.
                        <br>
                        Thank you for your understanding.
                        <br><br>
                        - Western Mindanao State University Satellite - Socio-economic and Data Analytics Center.";
                    }

                    $mail->send();
                    $_SESSION["SuccessMessage"] = "Status updated successfully. Email sent.";
                    Redirect_to("manage_dataset.php");
                } catch (Exception $e) {
                    $_SESSION["ErrorMessage"] = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
            } else {
                $_SESSION["ErrorMessage"] = "Failed to update status.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<?php include("header.php"); ?>
<head>
<script src="assets/js/sweetalert.min.js"></script>
</head>
<body>
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            <h3 class="font-weight-bold">Welcome <?php echo $_SESSION["AdminName"]; ?></h3>
                        </h4>
                        <p class="card-description">
                            <h6 class="font-weight-normal mb-0">All systems are running smoothly!</h6>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <?php
                        echo ErrorMessage(); // Call errormessage
                        echo SuccessMessage();
                        ?>

                        <form method="post" enctype="multipart/form-data">
                            <label for="status">Status:</label>
                            <select name="status" id="status">
                                <option value="pending" <?php if ($status == 'pending') echo 'selected'; ?>>Pending</option>
                                <option value="approved" <?php if ($status == 'approved') echo 'selected'; ?>>Approved</option>
                                <option value="rejected" <?php if ($status == 'rejected') echo 'selected'; ?>>Rejected</option>
                            </select>
                           <div class="row">
                              <div class="col-md-6">
                                <label for="firstname" class="form-label">First Name</label>
                                <input type="text" name="firstname" class="form-control" id="firstname" value="<?php echo $first_name ?>" required>
                              </div>
                              <div class="col-md-6">
                                <label for="lastname" class="form-label">Last Name</label>
                                <input type="text" name="lastname" class="form-control" id="lastname" value="<?php echo $last_name ?>">
                              </div>
                            </div>
                            <div
                            <div class="row">
                              <div class="col-md-6">
                                <label for="occupation" class="form-label">Occupation</label>
                                <input type="text" name="occupation" class="form-control" id="occupation" value="<?php echo $Occupation ?>">
                              </div>
                              <div class="col-md-6">
                                <label for="affiliation" class="form-label">Affiliation</label>
                                <input type="text" name="affiliation" class="form-control" id="affiliation" value="<?php echo $Affiliation ?>">
                              </div>
                            </div>
                            <br> 
                            <div class="row-md-4">
                              <label for="email" class="form-label">Email Address</label>
                              <input type="text" class="form-control" name="email" id="email" value="<?php echo $email ?>">
                            </div>
                              <br> 
                              <div class="row-md">
                              <label for="purpose" class="form-label">PURPOSE</label>
                              <textarea class="form-control" name="purpose" rows= "6" id="purpose" readonly><?php echo $purpose; ?></textarea>
                            </div>
                            <br><br>
                            <button class="btn btn-success" type="submit" name="submit">Send</button>
                            <button class="btn btn-danger"><a href="javascript:history.back()">Cancel</a></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

<style>
     body {
        font-family: Arial, sans-serif;
    }

    label {
        font-size: 16px;
        font-weight: bold;
        color: #333;
    }

    select,
    button {
        font-size: 14px;
        font-family: Arial, sans-serif;
        padding: 10px;
        border-radius: 2px;
        border: socket_addrinfo_connect;
        cursor: pointer;
    }

    .btn {
        display: inline-block;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        font-size: 16px;
    
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .btn-success {
        background-color: #28a745;
    }

    .btn-success:hover {
        background-color: #218838;
    }

    .btn-danger {
        background-color: #dc3545;
    }

    .btn-danger:hover {
        background-color: #c82333;
    }

    .btn a {
        color: #fff;
        text-decoration: none;
    }

    .btn:hover {
        opacity: 0.8;
    
    }
    .select-wrapper {
        position: relative;
        display: inline-block;
        width: 200px;
        margin-bottom: 20px;
    }

    .select-wrapper select {
        width: 100%;
        padding: 10px;
        border-radius: 4px;
        background-color: #f8f9fa;
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        cursor: pointer;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .select-wrapper select:focus {
        outline: none;
        box-shadow: 0 0 0 2px #80bdff;
    }

    .select-wrapper::after {
        content: '\25BC';
        position: absolute;
        top: 50%;
        right: 10px;
        transform: translateY(-50%);
        font-size: 12px;
        color: #495057;
        pointer-events: none;
    }

    .select-wrapper select option:hover {
        background-color: #007bff;
        color: #fff;
    }
</style>

