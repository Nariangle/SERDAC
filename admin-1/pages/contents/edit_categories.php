<?php 
require_once("../../../Includes/DB.php"); 
require_once("../../../Includes/Functions.php"); 
require_once("../../../Includes/Sessions.php"); 
Confirm_Login();

if(isset($_GET['id'])) {
    $id = $_GET['id'];
   
  
    if(isset($_POST['Submit'])) {
      $category = $_POST['category'];
      $author = $_SESSION['AdminName'];
        $category = $_POST['category'];

  
        // Prepare and execute the update statement
        date_default_timezone_set('Asia/Manila');
        $CurrentTime=new DateTime();
        $DateTime = $CurrentTime->format('F-d-Y H:i:s');
       


        $stmt = $ConnectingDB->prepare("UPDATE category SET title = ?, author = ?, datetime = ? WHERE id = ?");
        $stmt->execute([$category, $author, $DateTime, $id]);
        if($stmt->rowCount() > 0) {
            $_SESSION['SuccessMessage'] = "Category edited successfully!";
            Redirect_to("manage_categories.php");
        } else {
            $_SESSION['ErrorMessage'] = "Failed to edit category. Please try again!";
            Redirect_to("edit_categories.php");
        }
    }
    
    // Fetch the record from the database
    $stmt = $ConnectingDB->prepare("SELECT * FROM category WHERE id = ?");
    $stmt->execute([$id]);
    $admin = $stmt->fetch();
    
    
    if(!$admin) {
        $_SESSION['ErrorMessage'] = "Inquiry not found!";
        Redirect_to("manage_categories.php");
    }
} else {
    $_SESSION['ErrorMessage'] = "Id not found";
    Redirect_to("manage_categories.php");
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
                    <h4 class="card-title"> <h3 class="font-weight-bold">Welcome <?php echo $_SESSION["AdminName"]?></h3></h4>
                    <p class="card-description">
                      <h6 class="font-weight-normal mb-0">All systems are running smoothly!</h6>
                    </p>
              </div>
                </div>
               </div>
            <div class="col-12 grid-margin stretch-card">
                
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Edit a New Category!!</h4>
                  <p class="card-description">
                    Fill out the form below to edit a <code> category</code>!
                  </p>
                  <form class="forms-sample" method="post">
                    <div class="form-group">
                      <label for="category">Category<span style="color:red"> * </span> </label>
                      <input type="text" name="category" class="form-control" id="category" placeholder="Category name" required>
                    </div>                 
                    <button type="submit" name="Submit" class="btn btn-success mr-2">Submit</button>
                    <button class="btn btn-light"><a href="manage_categories.html"> Cancel</a></button>
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
