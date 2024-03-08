<?php include("../../../Includes/DB.php"); ?>  
<?php require_once("../../../Includes/Functions.php"); ?>
<?php require_once("../../../Includes/Sessions.php"); ?>
<?php 
$_SESSION["TrackingURL"] = $_SERVER["PHP_SELF"];
Confirm_Login() ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>WMSU - SERDAC</title>
      <!-- search -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

      <!-- sweetalet to siya eyy -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.min.css">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.min.js">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.all.min.js"></script>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../vendors/feather/feather.css">
  <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="../../vendors/select2/select2.min.css">
  <link rel="stylesheet" href="../../vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
    <link rel="stylesheet" href="../../vendors/sweetalert/sweetalert2.all.min.js">
  <link rel="stylesheet" href="../../vendors/sweetalert/sweetalert2.min.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/serdac-icon.png" />
</head>

<body onload="print()">

<div class="">
<center>
                <img src="../../../assets/img/serdac.ico" width="100" height="100">
                <h3 style="margin-top: 30px;">Western Mindanao State University</h3>
                <h4>WMSU-Satellite Socio Economic Research and Data Analytics Center</h4>
                <h6>Normal Road, Baliwasan, Zamboanga City</h6>
                </div>
        <hr>
</center>
<table class="table table-striped">
                      
                      <thead>
                        <tr>
                          <th>
                       #
                          </th>
                            <th>
                        First Name
                          </th>
                          <th>
                            Last Name
                          </th>
                          <th>
                            Email
                          </th>
                          <th>
                            Name of Dataset
                          </th>
                           <th>
                            Author
                          </th>
                         
                        </tr>
                      </thead>
                      <tbody>
                      <?php
            $id= $_GET['printid'];
            $sql  = "SELECT * FROM requests where dataset_id=$id";
            $stmt = $ConnectingDB->query($sql);
         $i = 1;
         while($DataRows = $stmt->fetch()) {
           $id     =   $DataRows["id"];
           $first_name =   $DataRows["first_name"];
           $last_name =      $DataRows["last_name"];
           $email =   $DataRows["email"];
           $dataset     =   $DataRows["dataset"];
           $author       = $DataRows["author"];
           $status = $DataRows["status"];
      
       ?>
                        <tr>
                          <td class="py-1">
                           <?php echo $id ?>
                          </td>
                          <td>
                          <?php echo $first_name ?>
                          </td>
                          <td>
                          <?php echo $last_name ?>
                          </td>
                          <td>
                          <?php echo $email ?>
                          </td>
                          <td>
                          <?php echo $dataset ?>
                          </td>
                           <td>
                           <?php echo $author ?>
                          </td>
                       
                        </tr>
                       
                           
                      </tbody>
                      <?php } ?>
                    </table>
</div>
<div class="container">
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