<?php include("../Includes/DB.php"); ?> 
<?php require_once("../Includes/Functions.php"); ?>
<?php require_once("../Includes/Sessions.php"); ?>
<?php 
$_SESSION["TrackingURL"] = $_SERVER["PHP_SELF"];
Confirm_Login() 
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>WMSU - SERDAC</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/serdac-icon.png" />
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="index.php"><img src="images/serdac-icon.png" class="mr-2" alt="logo" style="width: 50px; height: auto;" /></a>
        <a class="navbar-brand brand-logo-mini" href="index.php"><img src="images/serdac-icon.png" alt="logo" style="width: 50px; height: auto;" /></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item nav-search d-none d-lg-block">
            <div class="input-group">
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="images/faces/face28.jpg" alt="profile" style="width: 50px; height: auto;" />
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
             
 
              <a class="dropdown-item"  href="Logout.php">
             <i class="ti-power-off text-primary"></i>
             Logout
              </a>
            </div>
          </li>
        
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
   
      <div id="right-sidebar" class="settings-panel">
        <i class="settings-close ti-close"></i>
        <div class="tab-content" id="setting-content">
   
        </div>
      </div>
      <!-- partial -->
      <!-- partial:../../partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">Manage Content</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/contents/manage_posts.php">Posts</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/contents/manage_trainings.php">Trainings</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/contents/manage_appointment.php">Appointment</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/contents/manage_gallery.php">Gallery</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/contents/manage_dataset.php">Datasets</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/contents/manage_inquiry.php">Inquiries</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <i class="icon-head menu-icon"></i>
              <span class="menu-title">Manage Users</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/users/manage_staff_members.php"> Manage Staff <br>Members </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/users/manage_guest_users.php"> Manage Guest Users </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/users/manage_trainer.php"> Manage Trainers </a></li>
              </ul>
            </div>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title"> <h2 class="font-weight-bold">Welcome <?php echo $_SESSION["AdminName"]; ?></h2></h4>
                      <p class="card-description">
                        <h3 class="font-weight-normal mb-0" >All systems are running smoothly!</h3>
                      </p>
                </div>
                  </div>
                 </div>
                </div>
             </div>
            <div class="col grid-margin stretch-card">
              <div class="card tale-bg">
                <div class="card-people mt-auto">
                  <img src="./../assets/img/serdacfb.png" alt="..."  style = "height: 100%; width 100%;">
                </div>
              </div>
            </div>
            <div class="col-md-6 grid-margin transparent">
              <div class="row">
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-tale">
                    <div class="card-body">
                    <p class="mb-4">Total Users</p>
                      <br>
                      <?php
                    $sql = "SELECT * FROM trainers";
                    $stmt = $ConnectingDB->query($sql);
                    $count_trainers = 0;
                    while ($DataRows = $stmt->fetch()) {
                        $count_trainers = $count_trainers + 1;
                    }

                    $sql = "SELECT * FROM users";
                    $stmt = $ConnectingDB->query($sql);
                    $count_users = 0;
                    while ($DataRows = $stmt->fetch()) {
                        $count_users = $count_users + 1;
                    }

                    $total = $count_trainers + $count_users;
                    ?>

                      <p class="fs-30 mb-2"><?php echo $total?></p>
                
                    </div>
                  </div>
                </div>
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-dark-blue">
                    <div class="card-body">
                      <p class="mb-4">Admin Users</p>
                      <br>
                      <?php
          $sql  = "SELECT * FROM admins";
          $stmt = $ConnectingDB->query($sql);
  
         $count_users = 0;
         while($DataRows = $stmt->fetch()) {
         $count_users = $count_users + 1;
         }
       ?>
                     <p class="fs-30 mb-2"><?php echo $count_users?></p>
               
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
              <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-light-blue">
                    <div class="card-body">
                      <p class="mb-4">Number of Articles</p>
                      <br>
                      <?php
          $sql  = "SELECT * FROM post";
          $stmt = $ConnectingDB->query($sql);
          
         $count_post = 0;
         while($DataRows = $stmt->fetch()) {
         $count_post = $count_post + 1;
         }
       ?>
                      <p class="fs-30 mb-2"><?php echo $count_post?></p>
                  
                    </div>
                  </div>
                </div>
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-light-danger">
                    <div class="card-body">
                      <p class="mb-4">Number of Datasets</p>
                      <br>
                      <?php
          $sql  = "SELECT * FROM dataset";
          $stmt = $ConnectingDB->query($sql);

         $count_post = 0;
         while($DataRows = $stmt->fetch()) {
         $count_post = $count_post + 1;
         }
       ?>
                        <p class="fs-30 mb-2"><?php echo $count_post?></p>
              
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
              <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-light-blue">
                    <div class="card-body">
                      <p class="mb-4">Number of Request</p>
                      <br>
                      <?php
          $sql  = "SELECT * FROM requests";
          $stmt = $ConnectingDB->query($sql);
          
         $count_post = 0;
         while($DataRows = $stmt->fetch()) {
         $count_post = $count_post + 1;
         }
       ?>
                      <p class="fs-30 mb-2"><?php echo $count_post?></p>
                  
                    </div>
                  </div>
                </div>
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-light-danger">
                    <div class="card-body">
                      <p class="mb-4">Number of Appointment</p>
                      <br>
                      <?php
          $sql  = "SELECT * FROM appointments";
          $stmt = $ConnectingDB->query($sql);

         $count_post = 0;
         while($DataRows = $stmt->fetch()) {
         $count_post = $count_post + 1;
         }
       ?>
                        <p class="fs-30 mb-2"><?php echo $count_post?></p>
              
                    </div>
                  </div>
                </div>
              </div>

            </div>
  
      
            </div>
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">List of Registered Admin Users</h4>
                  <p class="card-description">
                   <a href="pages/users/manage_staff_members.php"> View and Manage Users </a>
                  </p>
                  <div class="table-responsive">
                  <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>User</th>
                          <th>Username</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                  <?php
                                  
                                  global $ConnectingDB;
                                  $sql  = "SELECT * FROM admins";
                                  $stmt = $ConnectingDB->query($sql);

                                  $Sr = 0;
                                  while($DataRows = $stmt->fetch()) {
                                    $Name     =   $DataRows["name"];
                                    $Username =   $DataRows["username"];

                                  $Sr++;
                                ?>

                   
                      <tbody>
                        <tr>
                          <td><?php echo $Name ?></td>
                          <td><?php echo $Username ?></td>
      
                          <td><label class="badge badge-success">active</label></td>
                        </tr>
                        
                      </tbody>
                      <?php } ?>
                    </table>
                  </div>
                </div>
              </div>
            </div>
    
       
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
     
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="js/dataTables.select.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <script src="js/Chart.roundedBarCharts.js"></script>
  <!-- End custom js for this page-->
</body>

</html>

<style>
  p {
    font-size: 1.5rem;
    margin-bottom: 0.5rem;
    line-height: 1.3rem;
}
</style>