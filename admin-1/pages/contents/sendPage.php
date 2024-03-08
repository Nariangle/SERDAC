<?php 
include("../../../Includes/DB.php");
require_once("../../../Includes/Functions.php");
require_once("../../../Includes/Sessions.php");
// include("../contents/datafile.php"); 

$_SESSION["TrackingURL"] = $_SERVER["PHP_SELF"];
Confirm_Login();
?>

<!DOCTYPE html>
<html lang="en">
<?php include("header.php"); ?>

<script src="assets/js/sweetalert.min.js"></script>
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
            $id = $_GET['userID'];
            $sql = "SELECT * FROM training_list where participant_id=$id";
            $stmt = $ConnectingDB->query($sql);

            if ($stmt->rowCount() > 0) {
                while ($DataRows = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $id = $DataRows['participant_id'];
                    $first_name = $DataRows['fname'];
                    $middleInitial = $DataRows['mname'];
                    $last_name = $DataRows['lname'];
                    $email = $DataRows['email'];
                    echo ErrorMessage(); // Call errormessage
                    echo SuccessMessage();
                }
            }
            ?>
            <h4 class="card-title">Send Email </h4>
            <span>
              <form method="post" action="trainings_sendEmail.php" enctype="multipart/form-data">
                <label for="email">Recipient Email:</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required value="<?php echo $email; ?>">

                <label for="subject">Subject:</label>
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Enter the subject" required >

                <label for="message">Message:</label>
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>

                <br>
                <button class="btn btn-success" type="submit" name="submit">Send</button>
                <button class="btn btn-danger"><a href="javascript:history.back()"> Cancel </a></button>
              </form>
                <?php
                if (isset($_SESSION['SuccessMessage'])) {
                  echo '<script type="text/javascript">';
                  echo 'swal("Success!", "Email has been sent succesfully", "success").then(function() { window.location = "training_list.php?userID='.$id.'"; });';
                  echo '</script>';
                  unset($_SESSION['SuccessMessage']);
                }
                ?>
              </body>
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

