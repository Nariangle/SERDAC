<?php include("../../../Includes/DB.php"); ?>  
<?php require_once("../../../Includes/Functions.php"); ?>
<?php require_once("../../../Includes/Sessions.php"); ?>
<?php 
$_SESSION["TrackingURL"] = $_SERVER["PHP_SELF"];
if(isset($_GET['id'])) {
  
  $id = $_GET['id'];
}
Confirm_Login() 


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
                    <h4 class="card-title"> <h3 class="font-weight-bold">Welcome <?php echo $_SESSION['AdminName']?></h3></h4>
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
            $sql  = "SELECT * FROM contact where id = $id;";
            $stmt = $ConnectingDB->query($sql);
         $i = 1;
         while($DataRows = $stmt->fetch()) {
         
           $name     =   $DataRows["name"];
           $email =   $DataRows["email"];
           $subject =      $DataRows["subject"];
           $message =      $DataRows["message"];
            $phone =      $DataRows["phone"];
        $i++;
       ?>
                  <h4 class="card-title">Viewing Content of Inquiry</h4>
                  <p class="card-description">
                    Here are the contents of the inquiry made by: <?php echo $name?>
                  <form class="forms-sample">
                    <div class="form-group">
                      <label for="fullname">Full Name</label>
                      <input type="text" class="form-control" name="fullname" id="fullname" value="<?php echo $name?> " disabled>
                    </div>
                    <div class="form-group">
                      <label for="email">Email address</label>
                      <input type="email" class="form-control" id="email" name = "email"  value="<?php echo $email?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="subject">Subject</label>
                        <input type="text" class="form-control" name="subject" id="subject"  value="<?php echo $subject?>" disabled>
                      </div>
                      <div class="form-group">
                        <label for="inquiry">Content of Inquiry</label>
                        <textarea class="form-control" id="inquiry" name="inquiry" rows="6"  disabled> <?php echo $message?>"</textarea>
                      </div>
                    <div class="form-group">
                      <label for="phone">Phone Number</label>
                      <input type="text" class="form-control" name="phone" id="phone"  value="<?php echo $phone?>" disabled>
                    </div>
                   <button class="btn btn-light">  <a href="manage_inquiry.php"  style="color:black"> Go back </a> </button> 
                  </form>
                  <?php } ?>
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
