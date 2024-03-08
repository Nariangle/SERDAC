<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>WMSU-SATELLITE SERDAC</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <link href="./assets/img/favicon.ico" rel="icon">
  <link href="./assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="./assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="./assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="./assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="./assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="./assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="./assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="./assets/vendor/Hover-master/css/hover.css" rel="stylesheet" media="all">
  <link rel="stylesheet" href="../assets/vendor/cssanimation/cssanimation.min.css"/>
  <link href="./assets/css/gallery.css" rel="stylesheet">
  <link href="./assets/css/style.css" rel="stylesheet">
</head>
<body>
<style>
  .logo {
    display: flex;
    align-items: center;
    justify-content: center;
  }

  @media (max-width: 600px) {
    .logo {
      flex-direction: column;
      text-align: center;
    }
  }
</style>

<header id="header" class="fixed-top d-flex align-items-center header-transparent">
<div class="container-fluid d-flex justify-content-between align-items-center">
     <div class="logo">
      <h5 class="text-light" style="font-size: 16px;"> 
          <span id="zk-trigger" style="text-align: center;">
          <img src="assets/img/serdac-icon.png"
            alt=""
       width="37"
       height="37"
       style="margin-top: 6px;
              margin-left: 20px;
              margin-bottom: 15px;
              margin-left: 3px;
              border-radius: 50%;"
            class="d-inline-block d-inline-block align-text-left"> 
            <span id="hide1" class="hide"> </span>
          <p style="display: inline-block; margin-top: 32px;">WMSU Satellite </p>
            S<span id="hide2" class="hide">ocio</span>
            E<span id="hide3" class="hide">conomic</span>
            R<span id="hide4" class="hide">esearch and</span>
            D<span id="hide5" class="hide">ata</span>
            A<span id="hide6" class="hide">nalytics</span>
            C<span id="hide7" class="hide">enter</span>
          </span>
      </h5>
      </div>
    
    <nav id="navbar" class="navbar" >
      <div  style="display: flex; align-items: center; justify-content: center;" class="container d-flex justify-content-between align-items-center;">
        <ul>
        <?php if(isset($_SESSION["email"])) { 
             $is_active = (strpos($_SERVER['REQUEST_URI'], 'index.php') !== false);
             echo '<li><a class="' . ($is_active ? 'active' : '') . '" href="index.php">Home</a></li>';
        }
        else {
          $is_active = (strpos($_SERVER['REQUEST_URI'], 'index.php') !== false);
          echo '<li><a class="' . ($is_active ? 'active' : '') . '" href="index.php">Home</a></li>';
        }
          ?>
         
          <div class="dropdown">
            <a class="btn dropdown-toggle" <?php if(strpos($_SERVER['REQUEST_URI'], 'articles.php') !== false) echo "style='color:#a2cce3'"; ?> id="btn" href="#news" role="button">News</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="articles.php">Articles</a></li>
            </ul>
          </div>
          <div class="dropdown">
          <a class="btn dropdown-toggle" id="btn" href="index.php#services" role="button"  
          <?php if(strpos($_SERVER['REQUEST_URI'], 'data_analytics.php') !== false || strpos($_SERVER['REQUEST_URI'], 'galleries.php') !== false || strpos($_SERVER['REQUEST_URI'], 'data_bank.php') !== false)    
          echo "style='color:#a2cce3'"; ?>>Services</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item <?php if(strpos($_SERVER['REQUEST_URI'], 'data_analytics.php') !== false) echo 'active'; ?>" href="data_analytics.php">Data Analytics</a></li>
            <li><a class="dropdown-item <?php if(strpos($_SERVER['REQUEST_URI'], 'trainings.php') !== false) echo 'active'; ?>" href="trainings.php">Capability Trainings</a></li>
            <li><a class="dropdown-item <?php if(strpos($_SERVER['REQUEST_URI'], 'data_bank.php') !== false) echo 'active'; ?>" href="data_bank.php">Data Repository</a></li>
          </ul>
        </div>
        <div class="dropdown">
          <a class="btn dropdown-toggle" id="btn" href="about_us.php" role="button"<?php if(strpos($_SERVER['REQUEST_URI'], 'about_us.php') !== false 
          || strpos($_SERVER['REQUEST_URI'], 'about_us.php') !== false )    
          echo "style='color:#a2cce3'"; ?> >About us</a>
          <ul class="dropdown-menu">
          <li><a class="dropdown-item <?php if(strpos($_SERVER['REQUEST_URI'], 'about_us.php#about-us') !== false) echo 'active'; ?>" href="about_us.php#about-us">Team</a></li>
          <li><a class="dropdown-item <?php if(strpos($_SERVER['REQUEST_URI'], 'about_us.php#Mission') !== false) echo 'active'; ?>" href="about_us.php#Mission">Vision and Mission</a></li>
          <li><a class="dropdown-item <?php if(strpos($_SERVER['REQUEST_URI'], 'about_us.php#aboutdevs') !== false) echo 'active'; ?>" href="about_us.php#aboutdevs">Developers</a></li>  
          </ul>
        </div>
        <div class="dropdown">
          <a class="btn dropdown-toggle" id="btn" href="index.php#contact" role="button">Contact</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal" >Send Inquiry</a></li>

          </ul>
        </div>
          <?php if(!isset($_SESSION["email"])) { 
            echo"<li class='nav-item'>
              <a class='nav-link' href='login.php'>Login</a>
            </li>";
            }else {
            echo"<div class='dropdown'>
             <a class='btn dropdown-toggle' id='btn' href='#news' role='button'>Profile</a>
             <ul class='dropdown-menu'>
               <li><a class='dropdown-item' href='data_analytics.php'>Appointments</a></li>
               <li><a class='dropdown-item' href='data_bank.php'>Datasets</a></li>
               <li><a class='dropdown-item' href='user_logout.php'>Logout</a></li>
             </ul>
           </div>";
            } ?>   
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
    </div>
  </header>
  
  
  
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen ">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Contact Us</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <section id="contact" class="contact" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
      <div class="container" >
        
        <div class="card" style="padding: 12px;"> 
      <div class="row">
        <div class="col-lg-6">
          <div class="row">
            <div class="col-md-12">
              <div class="info-box">
                <i class="bx bx-map"></i>
                <h3>Our Address</h3>
                <p>Ground Floor, Researcch Building, Western Mindanao State University,<br> Normal Road, Baliwasan, Zamboanga City 7000 Philippines</p><br>
                <div class="row">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3960.807436637633!2d122.0587977!3d6.913612835819681!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xd7958a8ff6fcb0da!2sCTE%20WMSU!5e0!3m2!1sen!2sph!4v1670746701677!5m2!1sen!2sph" width="100" height="200" style="border:0;" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
              </div>
            </div>
            <div class="col-md-6" >
              <div class="info-box">
                <i class="bx bx-envelope"></i>
                <h3>Email Us</h3>
                <p>wmsuserdac@wmsu.edu.ph</p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="info-box">
                <i class="bx bx-phone-call"></i>
                <h3>Call Us</h3>
                <p>0917 109 8164</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
        <?php include("contact.php"); ?>
          <form action="" method="post" role="form">
            <div class="row">
              <div class="col-md-6 form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
              </div>
              <div class="col-md-6 form-group mt-3 mt-md-0">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
              </div>
            </div>
            <div class="form-group mt-3">
              <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone" required>
                  </div>
            <div class="form-group mt-3">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
            </div>
            <div class="form-group mt-3">
              <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
            </div>
            <div class="my-3">
            </div>
            <div class="text-center"><button type="submit" name="submit" class="btn btn-danger" data-bs-dismiss="modal">Send Message</button></div>
          </form>
          <?php echo $msg; ?>
        </div>
      </div>
    </div>
          </div>
  </section>
      </div>
    </div>
  </div>
</div>

                  
              