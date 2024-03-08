<?php
require_once("../../../Includes/DB.php"); 
require_once("../../../Includes/Functions.php"); 
require_once("../../../Includes/Sessions.php");

Confirm_Login();



if(isset($_GET['id'])) {
  
    $id = $_GET['id'];

    $stmt = $ConnectingDB->prepare("SELECT * FROM post WHERE id = ?");
    $stmt->execute([$id]);
    $admin = $stmt->fetch();

    date_default_timezone_set('Asia/Manila');
    $CurrentTime=new DateTime();
    $DateTime = $CurrentTime->format('F-d-Y H:i:s');

    if(isset($_POST['submit'])) {

        $datetime = $DateTime;
        $title = $_POST['post_title'];
        $category = $_POST['category'];
        $content = $_POST['content'];
        $author = $_SESSION["AdminName"];
        $date = $DateTime;
        $Image  = $_FILES['img']['name'];
        $view = $admin['view'];
        $post =  $_POST['content'];

        // Prepare and execute the update statement
    
        $stmt = $ConnectingDB->prepare("UPDATE post SET datetime = ?, title = ?, category = ?, author = ?, image = ?, date = ?, post = ?, view = ? WHERE id = ?");
        $stmt->execute([$datetime, $title, $category, $author, $Image, $date, $content, $view, $id]);

     
        $source_file = $_FILES['img']['tmp_name'];
	      $dest_file = "../../../../Uploads/".$_FILES['img']['name'];
		

		if (file_exists($dest_file)) {

			print "The file name already exists!!";
		}
		else {

		move_uploaded_file( $source_file, $dest_file )

		or die ("Error!!");
    }

       
        if($stmt->rowCount() > 0) {
            $_SESSION['SuccessMessage'] = "Post succesfully updated!";
            Redirect_to("manage_posts.php");
        } else {
            $_SESSION['ErrorMessage'] = "Failed to update post. Please try again!";
            Redirect_to("manage_posts.php");
        }
    }
    
    // Fetch the record from the database
    $stmt = $ConnectingDB->prepare("SELECT * FROM post WHERE id = ?");
    $stmt->execute([$id]);
    $admin = $stmt->fetch();
    
    
    if(!$admin) {
        $_SESSION['ErrorMessage'] = "Post not found!";
        Redirect_to("manage_posts.php");
    }
} else {
    $_SESSION['ErrorMessage'] = "Post succesfully updated!";
    Redirect_to("manage_posts.php");
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
                  <h4 class="card-title">Edit an Existing Post!</h4>
                  <p class="card-description">
                    Fill out the form below to edit an <code>existing post</code>!
                  </p>
                  <form class="forms-sample" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="post_title">Post Title <span style="color:red"> * </span> </label>
                      <input type="text" name="post_title" class="form-control" id="post_title" placeholder="Post Title" required>
                    </div>

          
                     <div class="form-group">
                        <label for="category"> Category <span style="color:red"> * </span> </label>
                
                    <select class="form-control" id="category" name="category">
                   
                    <?php
             $data = getCategories();
           foreach($data as $row) {
            $category = $row['title'];
            echo "<option value='$category'> $category  </option>";
         
          }
       ?>
          
              
                      </select>
                    </div>
                      <div class="form-group">
                      <label>Image upload <span style="color:red"> * </span> </label>
                      <input type="file" name="img" id="img" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" name="img" id="img" type="button">Upload</button>
                        </span>
                      </div>
                    </div>
                     <div class="form-group">
                      <label for="content">Content<span style="color:red"> * </span> </label>
                      <textarea name="content" class="form-control" id="content" placeholder="Content" required> </textarea>
                    </div>   
                    <button type="submit" name="submit" class="btn btn-success mr-2">Submit</button>
                    <button class="btn btn-light"><a href="manage_posts.php"> Cancel </a></button>
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
