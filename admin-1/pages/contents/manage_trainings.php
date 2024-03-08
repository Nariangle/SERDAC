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
                  <h4 class="card-title">Manage Upcomming Trainings</h4>
                  <span>
                  <p class="card-description">
                    Add, delete or edit <code>trainings!</code>
                  </p>
                  
                  <a href="add_trainings.php"style="color:black;"><div class="add-new-post" style="float:right;">
                    <button type="button" class="btn btn-warning"> Add New Trainings</button>
                  </div></a>
                </span>
                  <div class="table-responsive">
               <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                          ID
                          </th>
                          <th>
                           Title
                          </th>
                            <th>
                          Trainor
                          </th>
                          <th>
                           Current Participants
                          </th>
                          <th style="text-align: center;">
                           Date
                          </th>
                           
                          <th>
                            Image
                          </th>
                          <!-- <th>
                            Content
                          </th> -->
                          <th>
                            Shown/Hidden
                          </th>
                          <th style="text-align: center;">
                            Actions
                          </th>
                          <th style="text-align: center;">
                            List of Participants
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                          global $ConnectingDB;
                          $sql = "SELECT trainings.training_id, trainings.title, trainers.trainer_name, trainings.description, trainings.start_time, trainings.end_time, trainings.training_date, trainings.training_dateEnd, trainings.trainingImg, trainings.is_shown, training_details.num_participants, training_details.max_participants
                          FROM trainings
                          INNER JOIN trainers ON trainings.trainer_id = trainers.id
                          INNER JOIN training_details ON trainings.training_id = training_details.training_id";
                          $stmt = $ConnectingDB->query($sql);
                            
                            $i = 0;
                            while($DataRows = $stmt->fetch()) {
                              $id         =   $DataRows["training_id"];
                              $date   =   $DataRows["training_date"];
                              $dateEnd   =   $DataRows["training_dateEnd"];
                              $title      =   $DataRows["title"];
                              $trainor    =   $DataRows["trainer_name"];
                              $currentParticipants  = $DataRows["num_participants"];
                              $maxParticipants      = $DataRows["max_participants"];
                              $image      =   $DataRows["trainingImg"];
                              $is_shown   = $DataRows["is_shown"];


                              $datetimeStart = date('F j, Y', strtotime($date)) . ' ' . $DataRows["start_time"];
                              $datetimeEnd = date('F j, Y', strtotime($dateEnd)) . ' ' . $DataRows["end_time"];
                        
                        $i = $i+1;
                    ?>
               
                        <tr>
                          <td class="py-1">
                           <?php echo $id; ?>
                          </td>
                          <td>
                           <?php echo $title; ?>
                          </td>
                          <td>
                           <?php echo $trainor; ?>
                          </td>
                          <td style="text-align: center;">
                          <?php echo $currentParticipants?>
                          </td>
                          <td style="text-align: center;">
                            <?php echo $datetimeStart?> - <?php echo $datetimeEnd?>
                          </td>
                          <td>
                          <img src="../../../Uploads/<?php echo $image ?>" style="border:radius: 0px; image-rendering: optimizeQuality;">
                          </td>
                          <!-- <td>
                          <#?php if (strlen($post)>10){$post = substr($post,0,10);}
                                                    echo $post. "..."   ?>
                          </td> -->
                          <td>
                            <?php
                            if ($is_shown == 1) {
                                echo "<span class='badge badge-success'>Shown</span>";
                            } else {
                                echo "<span class='badge badge-danger'>Hidden</span>";
                            }
                            ?>
                          </td>
                          <td style="text-align: center;">
                            <a href="edit_trainings.php?id=<?php echo $id?>" style="color:white"><button type="button" class="btn btn-info"> Edit </button></a> 
                            <button type="button" class="btn btn-danger" onclick="deletetraining(<?php echo $id; ?>)">Delete</button>
                          </td>
                          <td>
                            <a href="training_list.php?id=<?php echo $id?>"><button type="button" class="btn btn-success" >View List</button></a>
                          </td>
                        </tr>
                       
                          <script>
                                  // Function to confirm the deletion of an admin
                                  // eto rin yung parang modal nag ask if anjan kapa ba, sure kana ba?
                                  function deletetraining(id) {
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
                                          window.location.href = `delete_training.php?id=${id}`;
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

<style>
  /* progress bar sana css */
 /* .progress { 
  border: 1px solid #ccc;
  height: 20px;
}

.progress-bar {
  background-color: #007bff;
  color: #000;
} */


</style>

</html>