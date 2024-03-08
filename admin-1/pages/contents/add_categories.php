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

    if(isset($_POST['Submit'])) {
        $datetime = $DateTime;
        $category = $_POST['category'];
        $author = $_SESSION["AdminName"];
       


    $Admin = $_SESSION["AdminName"];
    date_default_timezone_set('Asia/Manila');
    $CurrentTime=new DateTime();
    $DateTime = $CurrentTime->format('F-d-Y H:i:s');
    $datetime = $DateTime;

        $sql = "INSERT INTO category(title, author, datetime)"; //SQL query string to insert values into the admins table of the database. 
        $sql .= "VALUES(:title, :author, :datetime)"; //VALUES clause specifies that these values will be inserted into the table
        $stmt = $ConnectingDB->prepare($sql);

        $stmt->bindValue(':title',$category);
        $stmt->bindValue(':author',$author);
        $stmt->bindValue(':datetime', $datetime);

        $Execute=$stmt->execute();
        if($Execute) {
            $_SESSION["SuccessMessage"]="New post with the name of ".$category." added Successfully";
            Redirect_to("manage_categories.php");
        } else {
            $_SESSION["ErrorMessage"]= $stmt->errorInfo();
            Redirect_to("add_categories.php");
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
                  <h4 class="card-title">Add a New Category!</h4>
                  <p class="card-description">
                    Fill out the form below to add a <code>new category</code>!
                  </p>
                  <form class="forms-sample" method="post">
                    <div class="form-group">
                      <label for="category">Category<span style="color:red"> * </span> </label>
                      <input type="text" name="category" class="form-control" id="category" placeholder="Category name" required>
                    </div>                 
                    <button type="submit" name="Submit" class="btn btn-success mr-2">Submit</button>
                    <button class="btn btn-light"><a href="manage_categories.php"> Cancel</a></button>
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
