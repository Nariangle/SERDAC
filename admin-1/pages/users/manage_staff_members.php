<?php include("../../../Includes/DB.php"); ?> 
<?php require_once("../../../Includes/Functions.php"); ?>
<?php require_once("../../../Includes/Sessions.php"); ?>
<?php 
$_SESSION["TrackingURL"] = $_SERVER["PHP_SELF"];
Confirm_Login() ?>
<?php include("header.php")?>
<!DOCTYPE html>
<html lang="en">

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
        
               <?php
                                // Number of records to display per page
                                $records_per_page = 9;
                                
                                // Retrieve current page number from URL
                                if(isset($_GET["page"])) {
                                  $page = $_GET["page"];
                                } else {
                                  $page = 1;
                                }
                                
                               // Calculate offset for SQL query
                               $offset = ($page - 1) * $records_per_page;

                               // Check if a search query is submitted
                               if(isset($_GET['search'])) {
                                   // Get the search term
                                   $search = $_GET['search'];

                                   // Modify the SQL query to search for the search term
                                   $sql  = "SELECT * FROM admins WHERE username LIKE '%$search%' OR name LIKE '%$search%' OR password LIKE '%$search%' LIMIT $records_per_page OFFSET $offset";
                               } else {
                                   // SQL query to retrieve admin records with pagination
                                   $sql  = "SELECT * FROM admins LIMIT $records_per_page OFFSET $offset";
                               }

                               $stmt = $ConnectingDB->query($sql);
                               ?>
                              
            <div class="col-lg-12 grid-margin stretch-card">
                
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Manage Existing Admins</h4>
                  <span>
                  <p class="card-description">
                    Add, delete or edit <code> existing admins!</code>
                  </p>
                   <!-- bagong Search e copy lang-->
    <div class="navbar-nav align-items-left" >
    <i class="bx bx-search fs-4 lh-0"></i>
    <div class="nav-item d-flex align-items-center">
        <div class="navbar-nav align-items-center">
            <form class="d-flex" method="GET" action="manage_staff_members.php">
                <input type="text" class="form-control me-2" name="search" placeholder="Search...">
                <button class="btn btn-primary" type="submit">Search</button>
            </form>
        </div>
    </div>
    <!-- /Search -->
    <div class="table-responsive">
        <?php
        // Check if a search query is submitted
        if(isset($_GET['search'])) {
            // Get the search term
            $search = $_GET['search'];

            // Modify the SQL query to search for the search term
            $sql  = "SELECT * FROM admins WHERE id LIKE '%$search%' OR username LIKE '%$search%' OR name  LIKE '%$search%' OR password  LIKE '%$search%'OR addedby LIKE '%$search%'";
        } else {
            // SQL query to retrieve all admin records
            $sql  = "SELECT * FROM admins";
            
        }
        $stmt = $ConnectingDB->query($sql);
        ?>
                   <div class="add-new-admin" style="float:right;">
                    <a href="add_staff_members.php" style="color:black;">  <button type="button" class="btn btn-warning"> Add New Admin </a></button>
                  </div>
                </span>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            User #
                          </th>
                          <th>
                            Full Name
                          </th>
                           <th>Username/Email</th>
                          <th>
                            Password
                          </th>
                          <th>
                            Status
                          </th>
                          <th style="text-align: center;">
                            Action
                          </th>
                           <th style="text-align: center;">
                            Action
                          </th>
                        </tr>
                      </thead>
                      <?php

                      $i = 1;
                        $Sr=0;
                      while($DataRows = $stmt->fetch()) {
                    // add kolang since naga delete tayo base sa id, e make sure na 
                      // dapat e fetch natin ang id
                  $id     =   $DataRows["id"];
                $Name     =   $DataRows["name"];
                $Username =   $DataRows["username"];
                $password =   $DataRows["password"];
                $Sr++;

         // Display only the first 5 records on the current page
     if($Sr > $records_per_page) {
       break;
         }

?>
                      <tbody>
                        <tr>
                          <td class="py-1">
                          <?php echo $i++ ?>
                          </td>
                          <td>
                          <?php echo $Name ?>
                          </td>
                          <td>
                          <?php echo $Username ?>
                          </td>
                          <td>
                          <?php echo $password ?>
                          </td>
                          <td>
                            <label class="badge badge-info">Active</label>
                          </td>
                          <td style="text-align: center;">
                            <button type="button" class="btn btn-info"><a href="edit_staff_members.php?id=<?php echo $id; ?>" style="color:white"> Edit </a> </button>
                          </td>
                          <td style="text-align: center;">
                            <button type="button"  onclick="deleteadmins(<?php echo $id; ?>)" class="btn btn-danger">Delete</button>
                          </td>
                        </tr>

                        <script>
                                  // Function to confirm the deletion of an admin
                                  // eto rin yung parang modal nag ask if anjan kapa ba, sure kana ba?
                                  function deleteadmins(id) {
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
                                        window.location.href = `deleteadmin.php?id=${id}`;
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
