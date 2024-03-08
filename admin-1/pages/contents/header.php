<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>WMSU - SERDAC</title>
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
  <link rel="stylesheet" href="../../vendors/sweetalert/sweetalert2.min.css">
  <script src="../../vendors/sweetalert/sweetalert2.all.min.js"></script>

  
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/serdac-icon.png" />
</head>

<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="../../index.php"><img src="../../images/serdac-icon.png" class="mr-2" alt="logo" style="width: 50px; height: auto;" /></a>
        <a class="navbar-brand brand-logo-mini" href="../../index.php"><img src="../../images/serdac-icon.png" alt="logo" style="width: 50px; height: auto;" /></a>
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
            <img src="../../images/faces/face28.jpg" alt="profile" style="width: 50px; height: auto;" />
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
             
              <a class="dropdown-item"  href="../../Logout.php">
                <i class="ti-power-off text-primary"></i>
                Logout
              </a>
            </div>
          </li>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_settings-panel.html -->
    
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
            <a class="nav-link" href="../../index.php">
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
                <li class="nav-item"> <a class="nav-link" href="../contents/manage_posts.php">Posts</a></li>
                <li class="nav-item"> <a class="nav-link" href="../contents/manage_trainings.php">Trainings</a></li>
                <li class="nav-item"> <a class="nav-link" href="../contents/manage_appointment.php">Appointments</a></li>
                <li class="nav-item"> <a class="nav-link" href="../contents/manage_gallery.php">Gallery</a></li>
                <li class="nav-item"> <a class="nav-link" href="../contents/manage_dataset.php">Datasets</a></li>
                <li class="nav-item"> <a class="nav-link" href="../contents/manage_inquiry.php">Inquiries</a></li>
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
                <li class="nav-item"> <a class="nav-link" href="../users/manage_staff_members.php"> Manage Staff <br>Members </a></li>
                <li class="nav-item"> <a class="nav-link" href="../users/manage_guest_users.php"> Manage Guest Users </a></li>
                <li class="nav-item"> <a class="nav-link" href="../users/manage_trainer.php"> Manage Trainers </a></li>
              </ul>
            </div>
          </li>
        </ul>
      </nav>