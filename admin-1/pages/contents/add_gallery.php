<?php include("../../../Includes/DB.php"); ?> 
<?php require_once("../../../Includes/Functions.php"); ?>
<?php require_once("../../../Includes/Sessions.php"); ?>
<?php 
Confirm_Login() ?>
<?php 
    global $ConnectingDB;
    date_default_timezone_set('Asia/Manila');
    $CurrentTime=new DateTime();
    $DateTime = $CurrentTime->format('F-d-Y H:i:s');
    if(isset($_POST['submit'])) {
        $datetime = $DateTime;
        $title = $_POST['PostTitle'];
        $content = $_POST['PostDescription'];
        $author = $_SESSION["AdminName"];
        $date = $_POST["Date"];
        $Image  = $_FILES['Image']['name'];
        $view = 0;


        $source_file = $_FILES['Image']['tmp_name'];
        $dest_file = "../../../Gallery/".$_FILES['Image']['name'];
        
		if (file_exists($dest_file)) {

			print "The file name already exists!!";
		}
		else {

		move_uploaded_file( $source_file, $dest_file )

		or die ("Error!!");
    }
 
    $Admin = $_SESSION["AdminName"];
    date_default_timezone_set('Asia/Manila');
    $CurrentTime=new DateTime();
    $DateTime = $CurrentTime->format('F-d-Y H:i:s');
    $datetime = $DateTime;

        $sql = "INSERT INTO post(datetime, title, category, author, image	, date, post, view)"; //SQL query string to insert values into the admins table of the database. 
        $sql .= "VALUES(:datetime, :title, 'gallery', :author, :image, :date, :post, :view)"; //VALUES clause specifies that these values will be inserted into the table
        $stmt = $ConnectingDB->prepare($sql);
        
        $stmt->bindValue(':datetime', $datetime);
        $stmt->bindValue(':title',$title);
        // $stmt->bindValue(':category',$category);
        $stmt->bindValue(':author',$author);
        $stmt->bindValue(':image',$Image);
        $stmt->bindValue(':date', $date);
        $stmt->bindValue(':post', $content);
        $stmt->bindValue(':view', $view);

        $Execute=$stmt->execute();

        if($Execute) {
            $_SESSION["SuccessMessage"]="New gallery with the name of ".$title." added Successfully";
            Redirect_to("manage_gallery.php");
        } else {
            $_SESSION["ErrorMessage"]= $stmt->errorInfo();
            Redirect_to("add_gallery.php");
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
                      <div class="d-flex align-items-center">
                        <div class="col-lg-12 mb-4 order-0">
                          <div class="card-body">
                            <div class="col-xl">
                                <div class="card mb-4">
                                  <div class="card-header d-flex justify-content-between align-items-center">
                                    <h2 class="mb-0">Add New Image for Gallery</h2>
                                 
                                  </div>
                                  <div class="card-body">
                                  <form class="" action="add_gallery.php" method="post" enctype="multipart/form-data">
                    <div class="card bg-secondary text-light mb-3">
                        <div class="card-body bg-dark">
                            <div class="form-group">
                                <label for="title" style="color:black">Title: </label>
                                <input class="form-control" type="text" name="PostTitle" id="title" placeholder="Type title here" value="">
                            </div>
                            <div class="form-group">
                                <label for="imageSelect">
                                  <span class="FieldInfo" style="color:black"> Select Image </span>
                                </label>
                                    <div class="custom-file">
                                        <input class="custom-file-input" type="file"" name="Image" id="imageSelect" value="">
                                    </div>
                            </div>

                            <div class="form-group">
                                <label for="Post">
                                  <span class="FieldInfo" style="color:black"> Date of Training: </span>
                                </label>
                                <input class="form-control" type="text" name="Date" id="Date" placeholder="Input date of Training" value="">
                            </div>

                            <div class="form-group">
                                <label for="Post">
                                  <span class="FieldInfo" style="color:black"> Participants: </span>
                                </label>
                                <textarea class="form-control" name="PostDescription" id="Post" cols="30" rows="10"></textarea>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 mb-2">
                                    <a href="manage_gallery.php" class="btn btn-warning btn-block" style="width:150px; margin-top: 20px; background-color:maroon; border-color:black">Cancel</a>
                                </div>
                                <div class="col-lg-6 mb-2">
                                    <button type="submit" name="submit" class="btn btn-success btn-block" style="width:150px; margin-top: 20px; background-color:maroon; border-color:black;">
                                        Publish
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
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
