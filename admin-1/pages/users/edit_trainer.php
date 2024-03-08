<?php
require_once("../../../Includes/DB.php"); 
require_once("../../../Includes/Functions.php"); 
require_once("../../../Includes/Sessions.php");

Confirm_Login();

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
    if(isset($_POST['submit'])) {
        // $trainer_id = $_POST['trainer_id'];
        $trainer_name = $_POST['trainer_name'];

        // Prepare and execute the update statement
    
        $stmt = $ConnectingDB->prepare("UPDATE trainers SET trainer_name = ? WHERE id = ?");
        $stmt->execute([$trainer_name, $id]);
        
        if($stmt->rowCount() > 0) {
            $_SESSION['SuccessMessage'] = "Trainer updated successfully!";
            Redirect_to("edit_trainer.php");
        } else {
            $_SESSION['ErrorMessage'] = "Failed to update trainer. Please try again!";
        }
    }
    
    // Fetch the record from the database
    $stmt = $ConnectingDB->prepare("SELECT * FROM trainers WHERE id = ?");
    $stmt->execute([$id]);
    $admin = $stmt->fetch();
    
    if(!$admin) {
        $_SESSION['ErrorMessage'] = "Inquiry not found!";
        Redirect_to("edit_trainer.php");
    }
} else {
    $_SESSION['ErrorMessage'] = "";
    Redirect_to("manage_trainer.php");
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
                  <h4 class="card-title">Edit an existing trainer!</h4>
                  <p class="card-description">
                    Fill out the form below to edit an <code> existing trainer! </code>
                  </p>
                  <form class="forms-sample" method="post">

                    <div class="form-group">
                      <label for="trainer_name">Trainer Name <span style="color:red"> * </span> </label>
                      <input type="text" name="trainer_name" class="form-control" id="trainer_name" placeholder="Trainer Name" value="<?php echo $admin['trainer_name']?>" required>
                    </div>
                     
                
                    <button type="submit" name="submit" class="btn btn-success mr-2">Submit</button>
                    <button class="btn btn-light"><a href="manage_trainer.php">Cancel </a></button>
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
