<?php include("../../../Includes/DB.php"); ?>  
<?php require_once("../../../Includes/Functions.php"); ?>
<?php require_once("../../../Includes/Sessions.php"); ?>
<?php 
$_SESSION["TrackingURL"] = $_SERVER["PHP_SELF"];
Confirm_Login() ?>

<!DOCTYPE html>
<html lang="en">



<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <?php include("header.php")?>
    <!-- partial -->
    
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
                  <h4 class="card-title">Manage Existing Users</h4>
                  <span>
                  <p class="card-description">
                    Add, delete or edit <code> existing users!</code>
                  </p>
                <!-- bagong Search e copy lang-->
    <div class="navbar-nav align-items-left" >
    <i class="bx bx-search fs-4 lh-0"></i>
    <div class="nav-item d-flex align-items-center">
        <div class="navbar-nav align-items-center">
            <form class="d-flex" method="GET" action="manage_guest_users.php">
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
            $sql  = "SELECT * FROM users WHERE id LIKE '%$search%' OR lastname  LIKE '%$search%'  OR firstname LIKE '%$search%' OR email  LIKE '%$search%' OR password LIKE '%$search%'";
        } else {
            // SQL query to retrieve all admin records
            $sql  = "SELECT * FROM users";
            
        }
        $stmt = $ConnectingDB->query($sql);
        ?>
                   <div class="add-new-user" style="float:right;">
                    <a href="add_guest_users.php" style="color:black;">  <button type="button" class="btn btn-warning"> Add New Guest User </button></a>
                  </div>
                </span>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                           ID
                          </th>
                          <th>
                           Fisrtname
                          </th>
                           <th>
                           Lastname
                          </th>
                          <th>
                           Email
                          </th>
                          <th style="text-align: center;">
                            status
                          </th>
                          <th style="text-align: center;">
                            Actions
                          </th>
                        </tr>
                      </thead>
                      
                      <tbody>
                      <tr>

                        <?php
                          $i = 1;
                          while($DataRows = $stmt->fetch()) {
                            $id     =   $DataRows["id"];
                            $firstname =   $DataRows["firstname"];
                            $lastname =   $DataRows["lastname"];
                            $email     =   $DataRows["email"];
                            $status     =   $DataRows["status"];
                        ?>
                      <tr>
                          <td><?php echo $i++ ?></td>
                                    <td><?php echo $firstname ?></td>
                                      <td><?php echo $lastname ?></td>
                                    <td><?php echo $email ?></td>
                                    <td style="text-align: center;">
                                    <?php if ($status == 'active' ): ?>
                                      <span class="badge badge-success">Active</span>
                                    <?php else: ?>
                                      <span class="badge badge-danger">Inactive</span>
                                    <?php endif; ?>
                                  </td>
                                  <style>
                                  .badge {
                                    padding: 6px 12px;
                                    font-size: 14px;
                                    font-weight: 500;
                                    border-radius: 4px;
                                  }

                                  .badge-success {
                                    background-color: #28a745;
                                    color: #fff;
                                  }

                                  .badge-danger {
                                    background-color: #dc3545;
                                    color: #fff;
                                  }
                                </style>

                          <td style="text-align: center;">
                            <!-- <button type="button" class="btn btn-info"><a href="edit_guest_users.php?id=<?php echo $id?>" style="color:white"> Edit </a> </button> -->
                            <button class="btn btn-success" onclick="reactivate(<?php echo $id; ?>)">reactivate</button><br>
                             </td>
                             <td> <button class="btn btn-danger" onclick="deactivateguestuser(<?php echo $id; ?>)">Deactivate</button><br>
                        </td>
                        </tr>
                          <script>
                          function deactivateguestuser(id) {
                              Swal.fire({
                                  title: 'Are you sure to deactivate this user?',
                                  text: "Please confirm your action",
                                  icon: 'warning',
                                  showCancelButton: true,
                                  confirmButtonColor: '#d33',
                                  cancelButtonColor: '#3085d6',
                                  confirmButtonText: 'Proceed with deactivation'
                              }).then((result) => {
                                  if (result.isConfirmed) {
                                      // Assuming you have the necessary code to perform an AJAX request
                                      // Send the user ID to the server-side script to handle the deactivation
                                      // Upon success, display a success message and update the UI as needed
                                      // Upon failure, display an error message or handle the error appropriately
                                      window.location.href = `deactivateguestuser.php?id=${id}`;
                                  }
                              });
                          }
                          </script>
                          <script>
                          function reactivate(id) {
                              Swal.fire({
                                  title: 'Are you sure to reactivate this user?',
                                  text: "Please confirm your action",
                                  icon: 'warning',
                                  showCancelButton: true,
                                  confirmButtonColor: '#d33',
                                  cancelButtonColor: '#3085d6',
                                  confirmButtonText: 'Proceed with activation'
                              }).then((result) => {
                                  if (result.isConfirmed) {
                                      // Assuming you have the necessary code to perform an AJAX request
                                      // Send the user ID to the server-side script to handle the deactivation
                                      // Upon success, display a success message and update the UI as needed
                                      // Upon failure, display an error message or handle the error appropriately
                                      window.location.href = `reactivate.php?id=${id}`;
                                  }
                              });
                          }
                          </script>

                      
                        <!-- <script>
                                  // Function to confirm the deletion of an admin
                                  // eto rin yung parang modal nag ask if anjan kapa ba, sure kana ba?
                                  function deleteguestuser(id) {
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
                                        window.location.href = `deleteguestuser.php?id=${id}`;
                                      }
                                    });
                                  }
                                </script> -->
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
