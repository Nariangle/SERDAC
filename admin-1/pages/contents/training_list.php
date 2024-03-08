<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<?php include("../../../Includes/DB.php"); ?>  
<?php require_once("../../../Includes/Functions.php"); ?>
<?php require_once("../../../Includes/Sessions.php"); ?>
<?php 
$_SESSION["TrackingURL"] = $_SERVER["PHP_SELF"];
Confirm_Login() 
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include("header.php")?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <link href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css" rel="stylesheet"/>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
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
            <?php
                    $id = $_GET['id'];
                    $sql = "SELECT trainings.*, trainers.id, trainers.trainer_name, training_details.training_id, training_details.num_participants, training_details.max_participants
                    FROM 
                        trainings
                    INNER JOIN trainers ON trainings.trainer_id = trainers.id
                    INNER JOIN training_details ON trainings.training_id = training_details.training_id
                    WHERE 
                        trainings.training_id=$id";
                    $stmt = $ConnectingDB->query($sql);
                    
                    if ($stmt->rowCount() > 0) {
                        while ($DataRows = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            $trainingTitle  =   $DataRows['title'];
                            $TimeStart      =   $DataRows['start_time'];
                            $TimeEnd        =   $DataRows['end_time'];
                            $TrainingDate   =   $DataRows['training_date'];
                            $TrainingDateEnd   =   $DataRows['training_dateEnd'];
                            $TrainerName    =   $DataRows['trainer_name'];
                            $numParticipants  =   $DataRows['num_participants'];
                            $maxParticipants  =   $DataRows['max_participants'];
                            $venue          =   $DataRows['venue'];
                            $trainingID     =   $DataRows['training_id'];

                            $datetimeStart = date('F j, Y', strtotime($TrainingDate));
                            $dateEnd  = date('F j, Y', strtotime($TrainingDateEnd));

                        }
                      }
        ?>
                
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                        <h4 class="card-title">Manage Trainings Approval</h4>
                    </div>
                    <div class="col-md-6 text-right">
                        <a href="manage_trainings.php" class="btn btn-primary">Manage Trainings</a>
                    </div>
                  </div>
                  <span>
                   <div class="titleheader" style="text-align: center;">
                      <h2><?php echo $trainingTitle ?></h2>
                      <h4><?php echo $TrainerName ?></h4>
                      <div class="row">
                        <div class="col-md-4">Training Date: <?php echo $datetimeStart ?> - <?php echo $dateEnd ?></div>
                        <div class="col-md-4">Training Venue: <?php echo $venue ?></div>
                        <div class="col-md-4">Current Approved Participants: <?php echo $numParticipants ?>/<?php echo $maxParticipants ?></div>
                        <!-- <div class="col-md-6">
                            <a href="manage_trainings.php" class="btn btn-primary">Manage Trainings</a>
                        </div> -->
                      </div>
                  </div>
                </span>
                  <div class="table-responsive">
<table class="table table-striped" id="example">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Contact</th>
            <th>Occupation</th>
            <th>Affiliation</th>
            
            <th>Status</th>

            <th style="text-align: center;">
            Actions
            </th>
            
        </tr>
    </thead>
    <tbody>
        <?php
        
        $trainingID = $_GET['id'];
        $sql = "SELECT
        tl.*,
        tr.id,
        tr.trainer_name,
        tn.training_id,
        tn.title,
        tn.description,
        tn.start_time,
        tn.end_time,
        tn.training_date,
        tn.venue,
        td.num_participants,
        td.max_participants
    FROM
        training_list AS tl
        INNER JOIN trainers AS tr ON tl.trainer_id = tr.id
        INNER JOIN trainings AS tn ON tl.training_id = tn.training_id
        INNER JOIN training_details AS td ON tn.training_id = td.training_id
    WHERE
        tl.training_id = $trainingID";
        $stmt = $ConnectingDB->query($sql);
        $i = 0;
        if ($stmt->rowCount() > 0) {
            while ($DataRows = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $participantID      = $DataRows['participant_id'];
                $Name               = $DataRows['fname'] . ' ' . $DataRows['mname'] . ' ' . $DataRows['lname'];
                $email              = $DataRows['email'];
                $contact            = $DataRows['contact'];
                $occupation         = $DataRows['occupation'];
                $affiliation        = $DataRows['affiliation'];
                $status             = $DataRows['status'];
          $i++;
        ?>
        <tr>
            <td class="py-1"><?php echo $i ?></td>
            <td><?php echo $Name ?></td>
            <td><?php echo $email ?></td>
            <td><?php echo $contact ?></td>
            <td><?php echo $occupation ?></td>
            <td><?php echo $affiliation ?></td>


              <td>
                <?php if ($status == 'pending') { ?>
                    <label class="badge badge-warning">Pending</label>
                <?php } elseif ($status == 'approved') { ?>
                    <label class="badge badge-success">Approved</label>
                <?php } elseif ($status == 'declined') { ?>
                    <label class="badge badge-danger">Declined</label>
                <?php } ?>
            </td>

            <td style="text-align: center;">

                <?php        
                      if ($numParticipants >= $maxParticipants) {
                          // Display warning message
                          echo '<p class="text-danger">Maximum number of participants has been reached.</p>';

                          // Disable the join buttons using JavaScript
                          echo '<script>document.querySelectorAll(".join-button").forEach(function(button) { button.disabled = true; });</script>';
                      } else {
                          // Check if the participant's status is not 'approved'
                          if ($status != 'approved') {
                  ?>
                              <a href="update_training_status.php?trainingID=<?php echo $trainingID; ?>&participantID=<?php echo $participantID; ?>" style="color:white">
                                  <button type="button" class="btn btn-success join-button">Approve</button>
                              </a>
                  <?php
                          } else {
                  ?>
                              <button type="button" class="btn btn-success join-button" disabled>Approve</button>
                  <?php
                          }
                        }
                      
                      if ($status != 'declined') {
                  ?>
                      <button type="button" onclick="declineParticipant(<?php echo $participantID; ?>, <?php echo $trainingID; ?>)" class="btn btn-danger">Decline</button>
                  <?php
                      } else {
                  ?>
                      <button type="button" class="btn btn-danger" disabled>Decline</button>
                  <?php
                      }
              ?>

                <button type="button" onclick="deleteparticipant(<?php echo $participantID; ?>, <?php echo $trainingID; ?>)" class="btn btn-warning">Delete</button>

                <a href="sendPage.php?userID=<?php echo $participantID?>" class="btn btn-info">Send Email</a>
            </td>
        </tr>
        <?php
            }
        } else {
            echo "<tr><td colspan='8'>No data found.</td></tr>";
        }
        ?>
    </tbody>
</table>

<script>
//decline praticipant
function declineParticipant(participantID,  trainingID) {
    Swal.fire({
        title: 'Are you sure you want to decline this participant?',
        text: 'Please confirm your action',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Proceed with declining'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = `decline_participant.php?participant_id=${participantID}&training_id=${trainingID}`;
        }
    });
}


    // Function to confirm the deletion of a request
    function deleteparticipant(participantID, trainingID) {
        Swal.fire({
            title: 'Are you sure you want to delete this Participant?',
            text: 'Please confirm your action',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Proceed with deletion'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = `delete_participant.php?participant_id=${participantID}&training_id=${trainingID}`;
            }
        });
    }
</script>


<style>
button.dt-button.buttons-print {
  display: block;
  padding: 0.3rem 0.75rem;
  font-size: 1rem;
  text-align: center;
  line-height: 1.5;
  color: #fff;
  background-color: crimson;
  border: none;
  border-radius: 0.25rem;
  transition: background-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
  box-shadow: none;
  cursor: pointer;
}

button.dt-button.buttons-print:active {
  background-color: black !important;
  color: white;
}

button.dt-button.buttons-print:focus {
  outline: none;
  box-shadow: none;
}
div.dataTables_wrapper div.dataTables_filter {
  position: relative;
}

div.dataTables_wrapper div.dataTables_filter::before {
  content: '\f002'; /* Search icon content */
  font-family: 'Font Awesome 5 Free'; /* Font Awesome font-family */
  position: absolute;
  top: 50%;
  left: 10px;
  transform: translateY(-50%);
  font-size: 16px;
  color: #888;
}

/* Hover effects for search input field */
div.dataTables_wrapper div.dataTables_filter input:focus {
  border-color: crimson;
  box-shadow: 2 2 0 0.2rem rgba(220, 20, 60, 0.25);
}

div.dataTables_wrapper div.dataTables_filter input:hover {
  background-color: crimson;
  color: white;
}
div.dataTables_wrapper div.dataTables_filter input {
  border: 1px solid #ccc;
  border-radius: 0.25rem;
  padding: 0.5rem;
}

div.dataTables_wrapper div.dataTables_filter input:focus {
  outline: none;
  box-shadow: 0 0 5px #ddd;
}

.dataTables_wrapper .dataTables_paginate .paginate_button {
  display: inline-block;
  padding: 0.2rem 0.5rem;
  margin-left: 0.1rem;
  font-size: 0.9rem;
  color: #333;
  background-color: #eee;
  border: none;
  border-radius: 0.25rem;
  cursor: pointer;
}

.dataTables_wrapper .dataTables_paginate .paginate_button:hover {
  background-color: #ddd;
}

.dataTables_wrapper .dataTables_paginate .paginate_button.current {
  background-color: #555;
  color: #fff;
}

select#length {
  padding: 0.5rem 1.25rem;
  font-size: 1rem;
  font-weight: 400;
  line-height: 1.5;
  color: #495057;
  background-color: #fff;
  border: 1px solid #ced4da;
  appearance: none;
  -webkit-appearance: none;
  -moz-appearance: none;
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 4 5'%3E%3Cpath fill='%23333' d='M2 0L0 2h4zm0 5L0 3h4z'/%3E%3C/svg%3E");
  background-repeat: no-repeat;
  background-position: right 0.55rem center;
  background-size: 8px 10px;
}

select#length:focus {
  border-color: #80bdff;
  box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
}

select#length::-ms-expand {
  display: none;
}

select#length option {
  font-weight: normal;
}
</style>
</head>
<body>
<!-- Your HTML content -->
<script>
$(document).ready(function() {
    $('#example').DataTable( {
        info: false,
        dom: 'Blfrtip',
        lengthMenu: [10, 25, 50, 100],
        language: {
            lengthMenu: '<select id="length"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> records',
            search: "",
            searchPlaceholder: " Search Records "
        },
        buttons: [
    {
        extend: 'print',
        text: 'Custom Print',
        title: '',
        messageTop: '',
        exportOptions: {
            columns: [1, 2, 3, 4, 5, 6] // Print only the first two columns
        },
        customize: function ( win ) {
            // Set the font size for the print layout
            $(win.document.body).css( 'font-size', '10pt' );

            // Add a logo and system title container to the header
            var header = '<div style="text-align: center;">';
            header += '<img src="https://scontent.fcgy1-1.fna.fbcdn.net/v/t39.30808-6/304778337_547546363837817_9115768991328849889_n.png?_nc_cat=100&ccb=1-7&_nc_sid=09cbfe&_nc_ohc=jV0HDgcNNbMAX90msSU&_nc_ht=scontent.fcgy1-1.fna&oh=00_AfC5fB_ZGF8p4YDx5L_0mkkUiLHYtU6_iZ1YcjBpoLPYSg&oe=6468246E" width="80" height="70" style="margin:10px; font-size: 10px; vertical-align: center;">';
            header += '<h1 style="display: inline-block;">WMSU-SATELLITE SERDAC</h1>';
            header += '<hr>';
            header += '</div>';
            $(win.document.body).find('h1').before(header);
        }
    }
]

    } );
} );

</script>



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

</html>

