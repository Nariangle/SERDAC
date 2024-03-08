<?php include("../../../Includes/DB.php"); ?> 
<?php require_once("../../../Includes/Functions.php"); ?>
<?php require_once("../../../Includes/Sessions.php"); ?>
<?php 
$_SESSION["TrackingURL"] = $_SERVER["PHP_SELF"];
Confirm_Login() ?>

<?php
    global $ConnectingDB;
    
if(isset($_POST["Submit"])){ #if button of publish is set then place input to category database
  // $trainer_id        = $_POST["trainer_id"];
  $trainer_name            = $_POST["trainer_name"];
  $Admin = $_SESSION["AdminName"];
    date_default_timezone_set('Asia/Manila');
    $CurrentTime=new DateTime();
    $DateTime = $CurrentTime->format('F-d-Y H:i:s');

    if(empty($trainer_name)){  #if input field is empty run validation check, show error message, and redirect to same page
        $_SESSION["ErrorMessage"] = "All fields must be filled out";
        Redirect_to("add_trainer.php");
    }else {

        //Query to insert New Admin in admins when everything is ok

        $sql = "INSERT INTO trainers(trainer_name, added_by)"; //SQL query string to insert values into the admins table of the database. 
        $sql .= "VALUES(:trainer_name, :added_by)"; //VALUES clause specifies that these values will be inserted into the table
        $stmt = $ConnectingDB->prepare($sql);
        $stmt->bindValue(':trainer_name',$trainer_name);
        $stmt->bindValue(':added_by',$Admin);


        $Execute=$stmt->execute();

        if($Execute) {
            $_SESSION["SuccessMessage"]="New trainer with the name of ". $trainer_name ." added Successfully";
            Redirect_to("manage_trainer.php");
        } else {
            $_SESSION["ErrorMessage"]="Something went wrong. Try Again.";
            Redirect_to("add_trainer.php");
        }

    }

}
?>
<!DOCTYPE html>
<html lang="en">

<?php include("header.php")?>
      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                       <?php 
                          echo ErrorMessage(); #call errormessage
                          echo SuccessMessage();
                      ?>
                                       <h4 class="card-title"> <h3 class="font-weight-bold">Welcome <?php echo $_SESSION["AdminName"]; ?></h4>
                    <p class="card-description">
                      <h6 class="font-weight-normal mb-0">All systems are running smoothly!</h6>
                    </p>
              </div>
                </div>
               </div>
            <div class="col-12 grid-margin stretch-card">
                
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add a new trainer!</h4>
                  <p class="card-description">
                    Fill out the form below to add a <code> new trainer! </code>
                  </p>
                  <form class="forms-sample" action="add_trainer.php" method="post">
                    <div class="form-group">
                      <label for="trainer_name">Name <span style="color:red"> * </span> </label>
                      <input type="text" name="trainer_name" class="form-control" id="trainer_name" placeholder="Trainer Name" required>
                    </div>
                    <button type="submit" name="Submit" class="btn btn-success mr-2">Submit</button>
                    <button class="btn btn-light"><a href="manage_trainer.php"> Cancel </a></button>
                  </form>
                </div>
              </div>
            </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
   
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="../../vendors/typeahead.js/typeahead.bundle.min.js"></script>
  <script src="../../vendors/select2/select2.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/settings.js"></script>
  <script src="../../js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../../js/file-upload.js"></script>
  <script src="../../js/typeahead.js"></script>
  <script src="../../js/select2.js"></script>
  <!-- End custom js for this page-->
</body>

</html>
