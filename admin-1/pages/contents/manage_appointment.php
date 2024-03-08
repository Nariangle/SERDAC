
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
                  <?php 
                          echo ErrorMessage(); #call errormessage
                          echo SuccessMessage();
                      ?>
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
                  <h4 class="card-title">Manage Appointments</h4>
                  <span>
                  <p class="card-description">
                    View or delete <code> appointment! </code>
                  </p>
                  
                </span>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                          #
                          </th>
                            <th>
                          Full Name
                          </th>
                          <th>
                          Email
                          </th>      
                          <th>
                            Phone
                          </th>
                          <th >
                            Status
                          </th>
                          <th style="text-align: center;">
                            Actions
                          </th>
                             <th style="text-align: center;">
                            View Appointment
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
            $sql = "SELECT * FROM appointments ORDER BY id DESC";
            $stmt = $ConnectingDB->query($sql);
         $i = 0;
         while($DataRows = $stmt->fetch()) {
            $id         = $DataRows['id'];
            $name       = $DataRows["first_name"] . " " . $DataRows["mi"] . " " . $DataRows["last_name"];
            $email      = $DataRows["email"];
            $phone      = $DataRows["contact"];
            $address    = $DataRows["address"];
            $zip        = $DataRows["zip"];
            $region     = $DataRows["region"];
            $timeStart  = $DataRows["time_start"];
            $timeEnd    = $DataRows["time_end"];
            $trainer    = $DataRows["trainer"];
            $date       = $DataRows["date"];
            $status     = $DataRows["status"];
            $midInitial = $DataRows["mi"];
            
        $i++;

        $dateObj = new DateTime($date);
        $formattedDate = $dateObj->format('F j, Y');
        $dateTime = $timeStart . ' - ' . $timeEnd . '  ' . $formattedDate;

       ?>
                        <tr>
                          <td class="py-1">
                        <?php echo $i?>   
                          </td>
                          <td>
                           <?php echo $name?>
                          </td>
                          <td>
                          <?php echo $email?>
                          </td>
                          <td>
                         <?php echo $phone?>
                          </td>

                          <td>
                            <?php echo $status?>
                          </td>

                           <td style="text-align: center;">
                           <button type="button" class="btn btn-danger" onclick="delete_appointment(<?php echo $id; ?>)">Delete</button>
                           <?php if ($status !== 'approved'): ?>
                              <button type="button" class="btn btn-success" onclick="approveAppointment(<?php echo $id; ?>)">Approve</button>
                          <?php endif; ?>
                           <!-- <button type="button" class="btn btn-success" onclick="approveAppointment()">Approve</button> -->
</td>
                      <?php 
                      
                      ?>
                          <td  style="text-align:center">
                          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal<?php echo $id; ?>">View Appointment</button>
                          </td>

                            <!-- Modal -->
                            <div class="modal fade" id="myModal<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Appointment Details</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p><strong>Name: </strong><?php echo $name; ?></p>
                                        <p><strong>Address: </strong><?php echo $address; ?></p>
                                        <p><strong>Email: </strong><?php echo $email; ?></p>
                                        <p><strong>Phone: </strong><?php echo $phone; ?></p>
                                        <p><strong>Region: </strong><?php echo $region; ?></p>
                                        <p><strong>Zip: </strong><?php echo $zip; ?></p>

                                        <p><strong>Date: </strong><?php echo $date; ?></p>
                                        <!-- Add more appointment details here -->
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                    </div>
                                </div>
                            </div>

                        </tr>
                        <script>
    function approveAppointment(id) {
    Swal.fire({
      title: 'Are you sure you want to approve this appointment?',
      text: 'Please confirm your action',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#19C619',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Approve',
      cancelButtonText: 'Cancel'
    }).then((result) => {
      if (result.isConfirmed) {
        // send email to user using Gmail
        $.ajax({
          type: 'POST',
          url: 'send_email.php',
          data: { id: id },
          success: function(response) {
            if (response === 'success') {
              // show success message
              Swal.fire({
                title: 'Appointment Approved',
                text: 'An email has been sent to the user.',
                icon: 'success'
              }).then(() => {
                // redirect to appointments page
                window.location.href = 'manage_appointment.php';
              });
            } else {
              // show error message
              Swal.fire({
                title: 'Success',
                text: 'Successfully approved.',
                icon: 'success'
              });
            }
          }
        });
      }
    });
  }


                                  // Function to confirm the deletion of an admin
                                  // eto rin yung parang modal nag ask if anjan kapa ba, sure kana ba?
                                  function delete_appointment(id) {
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
                                        window.location.href = `delete_appointment.php?id=${id}`;
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
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.js"></script>

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
