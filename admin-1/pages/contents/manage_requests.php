<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<?php include("../../../Includes/DB.php"); ?>  
<?php require_once("../../../Includes/Functions.php"); ?>
<?php require_once("../../../Includes/Sessions.php"); ?>
<?php 
$_SESSION["TrackingURL"] = $_SERVER["PHP_SELF"];
Confirm_Login() ?>
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
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />-->


    
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
                    $id = $_GET['request'];
                    $sql = "SELECT * FROM requests where dataset_id=$id";
                    $stmt = $ConnectingDB->query($sql);
                    
                    if ($stmt->rowCount() > 0) {
                        while ($DataRows = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        }
                      }
        ?>
                
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Manage Datasets Requests</h4>
                  <span>
                  <p class="card-description">
                    Add, delete or edit <code> existing datasets requests!</code>
                  </p>
                   <!-- <div class="go-back" style="float:right;">
                    <a href="print.php?printid=<?php echo $id ?>" style="color:black;">  <button type="button" class="btn btn-warning"> Print </button></a>
                    <a href="manage_dataset.php" style="color:black;">  <button type="button" class="btn btn-warning"> Go back </button></a>
                  </div> -->
                </span>
                  <div class="table-responsive">
<table class="table table-striped" id="example">
    <thead>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Name of Author</th>
            <th>Dataset Title</th>
            <th>Purpose of use</th>
             <th>Name of file</th>
            <th>created</th>
            <th>Status</th>
            <th style="text-align: center;">Send File via Email</th>
            <th style="text-align: center;">Unlock File</th>
            <th style="text-align: center;">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $id = $_GET['request'];
        $sql = "SELECT * FROM requests where dataset_id=$id";
        $stmt = $ConnectingDB->query($sql);
        
        if ($stmt->rowCount() > 0) {
            while ($DataRows = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $id = $DataRows['id'];
                $first_name = $DataRows['first_name'];
                $last_name = $DataRows['last_name'];
                $email = $DataRows['email'];
                $purpose = $DataRows['purpose'];
                $dataset = $DataRows['dataset'];
                $author = $DataRows['author'];
                $status = $DataRows['status'];
                $file_loc = $DataRows['file_loc'];
                $file_name = $DataRows['file_name'];
                $created_at = $DataRows['created_at'];
        ?>
        <tr>
            <td class="py-1"><?php echo $id ?></td>
            <td><?php echo $first_name ?></td>
            <td><?php echo $last_name ?></td>
            <td><?php echo $email ?></td>
            <td><?php echo $dataset ?></td>
            <td><?php echo $author ?></td>
            <td><?php echo $purpose ?></td>
            <td><?php echo $file_name ?></td>
             <td><?php echo $created_at ?></td>
             <td>
                <?php if ($status == 'pending') { ?>
                    <span class="badge badge-warning">Pending</span>
                <?php } elseif ($status == 'approved') { ?>
                    <span class="badge badge-success">Approved</span>
                <?php } elseif ($status == 'rejected') { ?>
                    <span class="badge badge-danger">Rejected</span>
                <?php } ?>
            </td>
            <td style="text-align: center;">
                <a href="datafilesend.php?sendid=<?php echo $id ?>" style="color:white">
                    <button type="button" class="btn btn-success">Send</button>
                </a>
            </td>
            <td>
                 <a href="edit.php?editid=<?php echo $id ?>" style="color:white">
                 <button type="button" class="btn btn-success">View & Approve</button>
                </a>
            </td>
            <td>
                 <button type="button" onclick="deleterequest(<?php echo $id; ?>)" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
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
    // Function to confirm the deletion of a request
    function deleterequest(id) {
        Swal.fire({
            title: 'Are you sure you want to delete this request?',
            text: 'Please confirm your action',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Proceed with deletion'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = `delete_request.php?id=${id}`;
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

div.dataTables_wrapper div.dataTables_filter input {
  border: 1px solid #ccc;
  border-radius: 0.25rem;
  padding: 0.5rem;
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

div.dataTables_wrapper div.dataTables_filter input:focus {
  border-color: crimson;
  box-shadow: 2px 2px 0 0.2rem rgba(220, 20, 60, 0.25);
}

div.dataTables_wrapper div.dataTables_filter input:hover {
  background-color: crimson;
  color: white;
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
  width: 100px; /* Adjust the width as needed */
  padding: 0.5rem 1.25rem;
  font-size: 1rem;
  font-weight: 400;
  line-height: 1.5;
  color: #495057;
  background-color: #fff;
  border: 1px solid #ced4da;
  border-radius: 1rem;
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
                    columns: [1, 2, 3, 4, 5, 6, 7] // Print only the first two columns
                },
                customize: function (win) {
                  // Set the font size for the print layout
                  $(win.document.body).css('font-size', '10pt');
                 // Add a style tag inside the print document head
                  var $style = $('<style>').appendTo(win.document.head);
                  
                  // Set the print layout as landscape using @media print rule
                  $style.append('@media print { @page { size: landscape; } }');

                  // Add a logo and system title container to the header
                  var header = '<div style="text-align: center;">';
                var header = '<div style="text-align: center;">';
                header += '<img src="https://scontent.fdvo2-1.fna.fbcdn.net/v/t39.30808-6/308846036_102733425950907_2799202200733023322_n.jpg?_nc_cat=108&ccb=1-7&_nc_sid=09cbfe&_nc_ohc=Gpd5WqVvllsAX-O9kxd&_nc_ht=scontent.fdvo2-1.fna&oh=00_AfDyaUxaozED76KEZrTU8ucO3EtXBAW1o-CTdPT6dJMJaQ&oe=64768CD1" width="80" height="70" style="margin: 10px; font-size: 10px; vertical-align: center;">';
                header += '<h1 style="display: inline-block; padding: 10px; margin: 5px; font-size: 18px; font-family: Arial, sans-serif; color: #333;">WMSU-SATELLITE SERDAC</h1>';
                header += '<hr>';
                // header += '<p style="font-family: Arial, sans-serif; font-size: 14px; color: #555;">Welcome to our website! We provide satellite services and solutions to meet your needs.</p>';
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

