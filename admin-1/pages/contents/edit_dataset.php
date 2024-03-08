<?php include("../../../Includes/DB.php"); ?> 
<?php require_once("../../../Includes/Functions.php"); ?>
<?php require_once("../../../Includes/Sessions.php"); ?>
<?php 
$_SESSION["TrackingURL"] = $_SERVER["PHP_SELF"];
Confirm_Login() ?>

<?php
    global $ConnectingDB;
    if(isset($_GET['id'])) {
      $id = $_GET['id'];
      $stmt = $ConnectingDB->prepare("SELECT * FROM dataset WHERE id = ?");
      $stmt->execute([$id]);
      $DataRows = $stmt->fetch();
      $admin = $stmt->fetch();
    

if(isset($_POST["Submit"])){ #if button of publish is set then place input to category database
  $dataset_title	   = $_POST["dataset_title"];
  $added_by	         = $_SESSION["AdminName"];
  $abstract          = $_POST["abstract"];
  $author	           = $_POST["author"];
  $file_name	        = $_POST["file_name"];
  $view_count        = $admin['view_count'];
  
  if ($_FILES['docFile']['type'] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document") {
 

  $source_file = $_FILES['docFile']['tmp_name'];
	$dest_file = "upload/".$_FILES['docFile']['name'];
		

		if (file_exists($dest_file)) {

			print "The file name already exists!!";
		}
		else {

		move_uploaded_file( $source_file, $dest_file )

		or die ("Error!!");
    }
  }


    $Admin = $_SESSION["AdminName"];
    date_default_timezone_set('Asia/Manila');
    $CurrentTime=new DateTime();
    $DateTime = $CurrentTime->format('F-d-Y H:i:s');
    echo $DateTime;

    $datetime = $DateTime;

    if(empty($dataset_title)||empty($abstract)||empty($author)){  #if input field is empty run validation check, show error message, and redirect to same page
        $_SESSION["ErrorMessage"] = "All fields must be filled out";
        Redirect_to("add_dataset.php");
    
    } else {

        //Query to insert New Admin in admins when everything is ok

        $stmt = $ConnectingDB->prepare(" UPDATE dataset SET dataset_title = ?, datetime =?, added_by = ?, abstract = ?, author = ?, view_count = ?, file_name =?, file_loc =? WHERE id = ?");
        $stmt->execute([$dataset_title, $datetime, $added_by, $abstract , $author, $view_count, $file_name, $dest_file, $id ]);
        if($stmt->rowCount() > 0) {
          $_SESSION['SuccessMessage'] = "Dataset updated successfully!";
          Redirect_to("manage_dataset.php");
      } else {
          $_SESSION['ErrorMessage'] = "Failed to update dataset . Please try again!";
          Redirect_to("manage_dataset.php");
      }
  }
 

}
  $stmt = $ConnectingDB->prepare("SELECT * FROM dataset WHERE id = ?");
  $stmt->execute([$id]);
  $admin = $stmt->fetch();

  if(!$admin) {
    $_SESSION['ErrorMessage'] = "Inquiry not found!";
    Redirect_to("manage_dataset.php");
  }} else {
  $_SESSION['ErrorMessage'] = "";
  Redirect_to("manage_dataset.php");
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
                <?php 
                          echo ErrorMessage(); #call errormessage
                          echo SuccessMessage();
                          
                      ?>
                  <h4 class="card-title">Edit an existing dataset!</h4>
                  <p class="card-description">
                    Fill out the form below to edit a <code>new dataset</code>!
                  </p>
                  <form class="forms-sample" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="dataset_title">Dataset Title<span style="color:red"> * </span> </label>
                      <input type="text" name="dataset_title" class="form-control" id="dataset_title" placeholder="<?php echo $DataRows['dataset_title'] ?>" value = "<?php echo $DataRows['dataset_title'] ?>">
                    </div>

                     <div class="form-group">
                      <label for="file_name">File Name<span style="color:red"> * </span> </label>
                      <input type="text" name="file_name" class="form-control" id="file_name" placeholder="<?php echo $DataRows['file_name'] ?>" value = "<?php echo $DataRows['file_name'] ?>">
                    </div>
                   
                      <div class="form-group">
                      <label>File upload <span style="color:red"> * </span> </label>
                      <input type="file" name="docFile" id="docFile" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" name="file" class="form-control file-upload-info" disabled placeholder="Upload File">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" name="docFile" type="button">Upload</button>
                        </span>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="author">Author<span style="color:red"> * </span> </label>
                      <input type="text" name="author" class="form-control" id="author" placeholder="<?php echo $DataRows['author'] ?>" value = "<?php echo $DataRows['author'] ?>">
                    </div>
                    </div>
                   <div class="col">
                     <div class="form-group">
                      <label for="abstract">Abstract<span style="color:red"> * </span> </label>
                      <textarea name="abstract" class="form-control" rows = "10" id="abstract" placeholder="Abstract" required value = "<?php echo $abstract ?>"> </textarea>
                </div>
                    <button type="submit" name="Submit" class="btn btn-success mr-2">Submit</button>
                    <a href="manage_dataset.php" button class="btn btn-light"> Cancel </button></a>
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