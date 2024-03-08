<?php include("../../../Includes/DB.php"); ?>
<?php require_once("../../../Includes/Functions.php"); ?>
<?php require_once("../../../Includes/Sessions.php"); ?>
<?php 
$_SESSION["TrackingURL"] = $_SERVER["PHP_SELF"];
Confirm_Login() ?>

<?php
    global $ConnectingDB;

if(isset($_POST["Submit"])) { 
  // Retrieve form data
  $dataset_title = $_POST["dataset_title"];
  $added_by = $_SESSION["AdminName"];
  $abstract = $_POST["abstract"];
  $author = $_POST["author"];
  $file_name = $_FILES['docFile']['name'];
  $view_count = 0;
  
  // Set file destination and move uploaded file
  $upload_dir = "upload/";
  $file_path = $upload_dir . $file_name;
  move_uploaded_file($_FILES['docFile']['tmp_name'], $file_path);

  // Get the file extension
  $file_extension = pathinfo($file_path, PATHINFO_EXTENSION);

  // Valid document types
  $valid_extensions = array('pdf', 'doc', 'docx');

  if (!in_array($file_extension, $valid_extensions)) {
    $_SESSION["ErrorMessage"] = "Invalid file format. Please upload a PDF, DOC, or DOCX file.";
    Redirect_to("add_dataset.php");
  }

  // Prepare and execute the database query
  $sql = "INSERT INTO dataset (dataset_title, datetime, added_by, abstract, author, view_count, file_name, file_loc)
          VALUES (:dataset_title, :datetime, :added_by, :abstract, :author, :view_count, :file_name, :file_loc)";
  $stmt = $ConnectingDB->prepare($sql);
  $stmt->bindValue(':dataset_title', $dataset_title);
  $stmt->bindValue(':datetime', date('F-d-Y H:i:s'));
  $stmt->bindValue(':added_by', $added_by);
  $stmt->bindValue(':abstract', $abstract);
  $stmt->bindValue(':author', $author);
  $stmt->bindValue(':view_count', $view_count);
  $stmt->bindValue(':file_name', $file_name);
  $stmt->bindValue(':file_loc', $file_path);
  $Execute = $stmt->execute();

  if ($Execute) {
    $_SESSION["SuccessMessage"] = "New dataset with the name of ".$dataset_title." added successfully.";
    Redirect_to("manage_dataset.php");
  } else {
    $_SESSION["ErrorMessage"] = "Something went wrong. Try again.";
    Redirect_to("add_dataset.php");
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
                  <h4 class="card-title">Add A New Dataset!</h4>
                  <p class="card-description">
                    Fill out the form below to add a <code>new dataset</code>!
                  </p>
                  <form class="forms-sample" method="POST" enctype="multipart/form-data">
                
                    <!--  <label for="dataset_id">Dataset ID<span style="color:red"> * </span> </label>-->
                    <!--  <input type="text" name="dataset_id" class="form-control" id="dataset_id" placeholder="Dataset ID" required>-->
                    <!--</div>-->
                    <div class="form-group">
                      <label for="dataset_title">Dataset Title<span style="color:red"> * </span> </label>
                      <input type="text" name="dataset_title" class="form-control" id="dataset_title" placeholder="Dataset Title" required>
                    </div>
                    
                     <div class="form-group">
                      <label for="file_name">File Name<span style="color:red"> * </span> </label>
                      <input type="text" name="file_name" class="form-control" id="file_name" placeholder="File Name" required>
                    </div>
                    
                    <div class="form-group">
                      <label for="author">Author<span style="color:red"> * </span> </label>
                      <input type="text" name="author" class="form-control" id="author" placeholder="Author" required>
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
                      <label for="abstract">Abstract<span style="color:red"> * </span> </label>
                      <textarea name="abstract" class="form-control" rows = "10" id="abstract" placeholder="Abstract" required> </textarea>
                    </div>
                   
                
                    <button type="submit" name="Submit" class="btn btn-success mr-2">Submit</button>
                   <a  <button class="btn btn-light" href="manage_dataset.php">Cancel </button> </a>
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
