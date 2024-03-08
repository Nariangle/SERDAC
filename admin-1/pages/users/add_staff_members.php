<?php include("../../../Includes/DB.php"); ?> 
<?php require_once("../../../Includes/Functions.php"); ?>
<?php require_once("../../../Includes/Sessions.php"); ?>
<?php 
$_SESSION["TrackingURL"] = $_SERVER["PHP_SELF"];
Confirm_Login() ?>

<?php
    global $ConnectingDB;
    
if(isset($_POST["Submit"])){ #if button of publish is set then place input to category database
    $Username        = $_POST["Username"];
    $Name            = $_POST["Name"];
    $Password        = $_POST["Password"];
    $ConfirmPassword = $_POST["ConfirmPassword"];
    $Admin = $_SESSION["AdminName"];
    date_default_timezone_set('Asia/Manila');
    $CurrentTime=new DateTime();
    $DateTime = $CurrentTime->format('F-d-Y H:i:s');

    if(empty($Username)||empty($Password)||empty($ConfirmPassword)){  #if input field is empty run validation check, show error message, and redirect to same page
        $_SESSION["ErrorMessage"] = "All fields must be filled out";
        Redirect_to("add_staff_members.php");
    }elseif (strlen($Password)<4) {
        $_SESSION["ErrorMessage"] = "Password should be greater than 4 characters";
        Redirect_to("add_staff_members.php");
    }elseif ($Password != $ConfirmPassword) {
        $_SESSION["ErrorMessage"] = "Passwords do not match!";
        Redirect_to("add_staff_members.php"); 
    } elseif (CheckUserNameExistOrNot($Username)){
      $_SESSION["ErrorMessage"] = "Username already exists, try another";
      Redirect_to("add_staff_members.php");
    } elseif (strlen($Password)>29) {
        $_SESSION["ErrorMessage"] = "Password should be less than 30 characters";
        Redirect_to("add_staff_members.php");
    } else {

        //Query to insert New Admin in admins when everything is ok

        $sql = "INSERT INTO admins(datetime,username,password,name,addedby)"; //SQL query string to insert values into the admins table of the database. 
        $sql .= "VALUES(:dateTime,:userName,:password,:name,:adminName)"; //VALUES clause specifies that these values will be inserted into the table
        $stmt = $ConnectingDB->prepare($sql);

        $stmt->bindValue(':dateTime',$DateTime);
        $stmt->bindValue(':userName',$Username);
        $stmt->bindValue(':password',$Password);
        $stmt->bindValue(':name',$Name);
        $stmt->bindValue(':adminName',$Admin);

        $Execute=$stmt->execute();

        if($Execute) {
            $_SESSION["SuccessMessage"]="New Admin with the name of ".$Name." added Successfully";
            Redirect_to("manage_staff_members.php");
        } else {
            $_SESSION["ErrorMessage"]="Something went wrong. Try Again.";
            Redirect_to("add_staff_members.php");
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
                  <h4 class="card-title">Add a new admin</h4>
                  <p class="card-description">
                    Fill out the form below to add <code>a new admin. </code>
                  </p>
                  <form class="forms-sample" action="add_staff_members.php" method="post">
                    <div class="form-group">
                      <label for="username">Username <span style="color:red"> * </span> </label>
                      <input type="text" name="Username" class="form-control" id="Username" placeholder="Username" required>
                    </div>
                    <div class="form-group">
                      <label for="name">Name <span style="color:red"> * </span> </label>
                      <input type="text" name="Name" class="form-control" id="Name" placeholder="Name" required>
                    </div>
                    <div class="form-group">
                      <label for="password">Password <span style="color:red"> * </span> </label>
                      <input type="password" class="form-control" id="Password" name="Password" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Confirm Password <span style="color:red"> * </span> </label>
                        <input type="password" class="form-control" id="ConfirmPassword" name="ConfirmPassword" placeholder="Confirm Password">
                      </div>
                
                    <button type="submit" name="Submit" class="btn btn-success mr-2">Submit</button>
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

</html>
