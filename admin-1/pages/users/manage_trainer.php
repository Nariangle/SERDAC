<?php include("../../../Includes/DB.php"); ?> 
<?php require_once("../../../Includes/Functions.php"); ?>
<?php require_once("../../../Includes/Sessions.php"); ?>
<!DOCTYPE html>
<html lang="en">
<?php include("header.php")?>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.all.min.js"></script>
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
                         
                          echo SuccessMessage();
                      ?>
                  <h4 class="card-title">Manage Existing Trainers</h4>
                  <span>
                  <p class="card-description">
                    Add, delete or edit <code> existing trainers!</code>
                  </p>
                  <!-- bagong Search e copy lang-->
    <div class="navbar-nav align-items-left" >
    <i class="bx bx-search fs-4 lh-0"></i>
    <div class="nav-item d-flex align-items-center">
        <div class="navbar-nav align-items-center">
            <form class="d-flex" method="GET" action="manage_trainer.php">
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
            $sql  = "SELECT * FROM trainers WHERE id LIKE '%$search%' OR trainer_name  LIKE '%$search%' OR added_by LIKE '%$search%'";
        } else {
            // SQL query to retrieve all admin records
            $sql  = "SELECT * FROM trainers";
            
        }
        $stmt = $ConnectingDB->query($sql);
        ?>
                   <div class="add-trainer" style="float:right;">
                    <a href="add_trainer.php" style="color:black;">  <button type="button" class="btn btn-warning"> Add New Trainer </a></button>
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
                            Trainer Name
                          </th>
                          <th style="text-align: center;">
                            Action
                          </th>
                           <th style="text-align: center;">
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
         
         $i = 1;
         while($DataRows = $stmt->fetch()) {
           $id     =   $DataRows["id"];
          //  $trainer_id =   $DataRows["trainer_id"];
           $trainer_name =   $DataRows["trainer_name"];
           $added_by     =   $DataRows["added_by"];

       ?>
                        <tr>
                          <td class="py-1">
                           <?php echo $i++?>
                          </td>
                          <td>
                          <?php echo $trainer_name?>
                          </td>
                          <td style="text-align: center;">         
                         <a href="edit_trainer.php?id=<?php echo $id; ?> "style="color:white"> <button type="button" class="btn btn-info"> Edit </button> </a>
                     
                          </td>
                          <td style="text-align: center;">         
                            <button type="button" class="btn btn-danger" onclick="deletetrainer(<?php echo $id; ?>)">Delete</button>
                          </td>
                        </tr>
                        <script>
                                  // Function to confirm the deletion of an admin
                                  // eto rin yung parang modal nag ask if anjan kapa ba, sure kana ba?
                                  function deletetrainer(id) {
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
                                        window.location.href = `deletetrainer.php?id=${id}`;
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
