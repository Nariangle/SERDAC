<?php
require_once("../../../Includes/DB.php"); 
require_once("../../../Includes/Functions.php"); 
require_once("../../../Includes/Sessions.php");

Confirm_Login();

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
    if(isset($_POST['submit'])) {
        $name = $_POST['name'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $ConfirmPassword = $_POST["confirm_password"];

        if(empty($username)||empty($name)||empty($password)){  #if input field is empty run validation check, show error message, and redirect to same page
          $_SESSION["ErrorMessage"] = "All fields must be filled out";
          Redirect_to("edit_guest_users.php");
      }elseif (strlen($password)<4) {
          $_SESSION["ErrorMessage"] = "Password should be greater than 4 characters";
          Redirect_to("edit_guest_users.php");
      } elseif (strlen($password)>29) {
          $_SESSION["ErrorMessage"] = "Password should be less than 30 characters";
          Redirect_to("edit_guest_users.php");
      }elseif ($password != $ConfirmPassword) {
        $_SESSION["ErrorMessage"] = "Passwords do not match!";
        Redirect_to("edit_guest_users.php"); 
    }

  
        // Prepare and execute the update statement
        date_default_timezone_set('Asia/Manila');
        $CurrentTime=new DateTime();
        $DateTime = $CurrentTime->format('F-d-Y H:i:s');
       
        
        $stmt = $ConnectingDB->prepare("UPDATE users SET name = ?, username = ?, email = ?, password = ?, date = ? WHERE id = ?");
        $stmt->execute([$name, $username, $email, $password, $DateTime, $id]);
        if($stmt->rowCount() > 0) {
            $_SESSION['SuccessMessage'] = "Guest user updated successfully!";
            Redirect_to("manage_guest_users.php");
        } else {
            $_SESSION['ErrorMessage'] = "Failed to update guest user. Please try again!";
        }
    }
    
    // Fetch the record from the database
    $stmt = $ConnectingDB->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->execute([$id]);
    $admin = $stmt->fetch();
    
    
    if(!$admin) {
        $_SESSION['ErrorMessage'] = "Inquiry not found!";
        Redirect_to("manage_requests.php");
    }
} else {
    $_SESSION['ErrorMessage'] = "Id not found";
    Redirect_to("manage_requests.php");
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
                    <h4 class="card-title"> <h3 class="font-weight-bold">Welcome <?php echo $_SESSION["AdminName"]; ?>!</h3></h4>
                    <p class="card-description">
                      <h6 class="font-weight-normal mb-0">All systems are running smoothly!</h6>
                    </p>
              </div>
                </div>
               </div>
            <div class="col-12 grid-margin stretch-card">
                
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Edit a Dataset Inquiry!</h4>
                  <p class="card-description">
                    Fill out the form below to edit an <code>existing dataset inquiry</code>!
                  </p>
                  <form class="forms-sample">
                    <div class="form-group">
                      <label for="first_name">First Name <span style="color:red"> * </span> </label>
                      <input type="text" name="first_name" class="form-control" id="first_name" placeholder="First Name" value="MADAH" disabled required>
                    </div>
                     <div class="form-group">
                      <label for="last_name">Last Name <span style="color:red"> * </span> </label>
                      <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Last Name" value="PAXLEY" disabled required>
                     </div>
                    <div class="form-group">
                        <label for="email">Email<span style="color:red"> * </span> </label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Last Name" value="gusionuser@gmail.com" disabled required>
                      </div>
                      <div class="form-group">
                        <label for="dataset_name">Dataset Name <span style="color:red"> * </span> </label>
                        <input type="text" name="dataset_name" class="form-control" id="dataset_name" placeholder="Last Name" value="gusioncombos.pdf" disabled required>
                       </div>
                       <div class="form-group">
                        <label for="dataset_author">Dataset Author <span style="color:red"> * </span> </label>
                        <input type="text" name="dataset_author" class="form-control" id="dataset_author" placeholder="Last Name" value="gusion-paxley" disabled required>
                       </div>
                     <div class="form-group">
                        <label for="status"> Status <span style="color:red"> * </span> </label>
                    <select class="form-control" id="category" name="category">
                        <option value="Sent">Sent</option>
                        <option value="Pending">Pending</option>
                      </select>
                    </div>
                      
                    
                
                    <button type="submit" class="btn btn-success mr-2">Submit</button>
                    <button class="btn btn-light"><a href="manage_requests.html"> Cancel </a></button>
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
