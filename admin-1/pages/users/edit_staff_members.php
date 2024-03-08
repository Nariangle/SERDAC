<?php
require_once("../../../Includes/DB.php"); 
require_once("../../../Includes/Functions.php"); 
require_once("../../../Includes/Sessions.php");

Confirm_Login();

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
    if(isset($_POST['submit'])) {
        $username = $_POST['username'];
        $name = $_POST['name'];
        $password = $_POST['password'];
        
    if(empty($username)||empty($name)||empty($password)){  #if input field is empty run validation check, show error message, and redirect to same page
      $_SESSION["ErrorMessage"] = "All fields must be filled out";
      Redirect_to("edit_staff_members.php");
  }elseif (strlen($password)<4) {
      $_SESSION["ErrorMessage"] = "Password should be greater than 4 characters";
      Redirect_to("edit_staff_members.php");
  } elseif (strlen($password)>29) {
      $_SESSION["ErrorMessage"] = "Password should be less than 30 characters";
      Redirect_to("edit_staff_members.php");
  }
            
        // Prepare and execute the update statement
        $stmt = $ConnectingDB->prepare("UPDATE admins SET username = ?, name = ?, password = ? WHERE id = ?");
        $stmt->execute([$username, $name, $password, $id]);
        
        if($stmt->rowCount() > 0) {
            $_SESSION['SuccessMessage'] = "Admin staff updated successfully!";
            Redirect_to("edit_staff_members.php");
        } else {
            $_SESSION['ErrorMessage'] = "Failed to update admin. Please try again!";
        }
    }
    
    // Fetch the record from the database
    $stmt = $ConnectingDB->prepare("SELECT * FROM admins WHERE id = ?");
    $stmt->execute([$id]);
    $admin = $stmt->fetch();
    
    if(!$admin) {
        $_SESSION['ErrorMessage'] = "Inquiry not found!";
        Redirect_to("manage_staff_members.php");
    }
} else {
    $_SESSION['ErrorMessage'] = "";
    Redirect_to("manage_staff_members.php");
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
                <?php 
                          echo ErrorMessage(); #call errormessage
                          echo SuccessMessage();
                      ?>
                  <h4 class="card-title">Edit an existing admin</h4>
                  <p class="card-description">
    
                    Fill out the form below to edit an <code> existing admin. </code>
                  </p>
                  
                  <form class="forms-sample" method="post">
                    <div class="form-group">
                      <label for="username">Username <span style="color:red"> * </span> </label>
                      <input type="text" name="username" class="form-control" id="username" placeholder="Username" value="<?php echo $admin['username']; ?>" required>
                    </div>
                    <div class="form-group">
                      <label for="name">Name <span style="color:red"> * </span> </label>
                      <input type="text" name="name" class="form-control" id="name" placeholder="Name" value="<?php echo $admin['name']; ?>" required>
                    </div>
                    <div class="form-group">
                      <label for="password">Password <span style="color:red"> * </span> </label>
                      <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="<?php echo $admin['password']; ?>" required>
                    </div>

                    <button type="submit" name="submit"class="btn btn-success mr-2" href= "manage_staff_members.php">Submit</button>
                    <button class="btn btn-light"><a href="manage_staff_members.php"> Cancel </a></button>
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

<?php
// Display success message if it exists
if(isset($_SESSION['SuccessMessage'])) {
  echo '<div class="alert alert-success">' . $_SESSION['SuccessMessage'] . '</div>';
  unset($_SESSION['SuccessMessage']);
}
?>
</html>
