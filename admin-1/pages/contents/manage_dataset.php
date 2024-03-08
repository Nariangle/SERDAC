<?php include("../../../Includes/DB.php"); ?>  
<?php require_once("../../../Includes/Functions.php"); ?>
<?php require_once("../../../Includes/Sessions.php"); ?>
<?php 
$_SESSION["TrackingURL"] = $_SERVER["PHP_SELF"];
Confirm_Login() ?>
<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.css">
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
        
       
            <div class="col-lg-12 grid-margin stretch-card">
                
              <div class="card">
                <div class="card-body">
                   <?php 
                          echo ErrorMessage(); #call errormessage
                          echo SuccessMessage();
                      ?>
                  <h4 class="card-title">Manage Existing Datasets</h4>
                  <span>
                    <!-- bagong Search e copy lang-->
               <div class="navbar-nav align-items-left">
                <i class="bx bx-search fs-4 lh-0"></i>
                <div class="nav-item d-flex align-items-center">
                    <div class="navbar-nav align-items-center">
                        <form class="d-flex" method="GET" action="manage_dataset.php">
                            <input type="text" class="form-control me-2" name="search" placeholder="Search..." value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
                            <button class="btn btn-primary" type="submit">Search</button>
                        </form>
                    </div>
                </div>
            </div>

    <!-- /Search -->
    <span>
        <p class="card-description">
            View or delete <code>inquiries!</code>
        </p>
    </span>
    <div class="table-responsive">
        <?php
      
        // Check if a search query is submitted
        if(isset($_GET['search'])) {
            // Get the search term
            $search = $_GET['search'];
        
            // Modify the SQL query to search for the search term
            $sql  = "SELECT * FROM dataset WHERE dataset_id LIKE '%$search%' OR dataset_title LIKE '%$search%' OR added_by LIKE '%$search%' OR abstract LIKE '%$search%' OR author LIKE '%$search%'";
        } else {
            // SQL query to retrieve all admin records
            $sql  = "SELECT * FROM dataset";
        }
        
        $stmt = $ConnectingDB->query($sql);
        
        

        $stmt = $ConnectingDB->query($sql);
        ?>
                  <p class="card-description">
                    Add, delete or edit <code> existing datasets!</code>
                  </p>
                   <div class="add-new-post" style="float:right;">
                    <a href="add_dataset.php" style="color:black;">  <button type="button" class="btn btn-warning"> Add New Dataset </button></a>
                  </div>
                </span>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                       #
                          </th>
                            <th>
                       Dataset Title
                          </th>
                          <th>
                           Date and Time
                          </th>
                          <th>
                           Added by
                          </th>
                           <th>
                           Abstract
                          </th>
                          <th>
                            Author
                          </th>
                        
                          <th style="text-align:center;">
                            File
                          </th>
                          <th style="text-align: center;">
                            Requests
                          </th>
                          <th style="text-align: center;">
                            Actions
                          </th>
                             <!-- <th style="text-align: center;">
                            Live Preview
                          </th> -->
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                        <?php
  
                          $i = 1;
                          while($DataRows = $stmt->fetch()) {
                            $id             =   $DataRows["id"];
                            $dataset_title  =      $DataRows["dataset_title"];
                            $datetime       =   $DataRows["datetime"];
                            $added_by       =   $DataRows["added_by"];
                            $abstract       =   $DataRows["abstract"];
                            $author         = $DataRows["author"];
                            $file_name      = $DataRows["file_name"];
                            $file_loc       = $DataRows["file_loc"];
                        ?>
                          <td class="py-1">
                           <?php echo $id?>
                          </td>
                          <td>
                          <?php echo $dataset_title?>
                          </td>
                          <td>
                          <?php echo $datetime?>
                          </td>
                          <td>
                          <?php echo $added_by?>
                          </td>
                          <td>
                          <!--<#?php echo $abstract?>-->
                          <?php 
                              if (strlen($abstract)>15) {
                                $abstract = substr($abstract,0,15).". . .";
                              }
                              echo htmlentities($abstract) 
                            ?>
                          </td>
                           <td>
                           <?php echo $author?>
                          </td>
                          
                         <td>
                          <a href="<?php echo $file_loc ?>" download>
                              <p style="text-align:center"><?php echo $file_name ?></p>
                          </a>
                          </td>

                          <td style="text-align: center;">
                            <a href="manage_requests.php?request=<?php echo $id?>" style="color:white"> <button type="button" class="btn btn-success">View Requests  </button></a>
                          </td>
                          <td style="text-align: center;">
                            <a href="edit_dataset.php?id=<?php echo $id?>" style="color:white"><button type="button" class="btn btn-info"> Edit  </button></a>
                          </td>
                                                    <td style="text-align: center;">
                            <button  class="btn btn-danger" onclick="deletedataset(<?php echo $id; ?>)">Delete</button> <br>
                          </td>
                          <!-- <td>
                            <button type="button" class="btn btn-primary"><a href="edit_posts.html" style="color:white"> Live Preview </a> </button>
                          </td> -->
                        </tr>
                        <script>
                                  // Function to confirm the deletion of an admin
                                  // eto rin yung parang modal nag ask if anjan kapa ba, sure kana ba?
                                  function deletedataset(id) {
                                     Swal.fire({
                                      title: 'Are you sure to delete this?',
                                      text: "Please confirm your action",
                                      icon: 'warning',
                                      showCancelButton: true,
                                      confirmButtonColor: '#d33',
                                      cancelButtonColor: '#3085d6',
                                      confirmButtonText: 'Proceed with deletion.'
                                    }).then((result) => {
                                      if (result.isConfirmed) {
                                        window.location.href = `delete_dataset.php?id=${id}`;
                                      }
                                    });
                                  }
                                </script>
                        
                      
                      </tbody>
                      <?php } ?>
                    </table>
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
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.js"></script>
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/settings.js"></script>
  <script src="../../js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <!-- End custom js for this page-->
</body>

</html>
