
<?php require_once("Includes/DB.php"); ?> <!--Require DB.php one time -->
<?php require_once("Includes/Functions.php"); ?>
<?php require_once("Includes/Sessions.php"); ?>
<?php $msg=""?>
<!DOCTYPE html>
<html lang="en">
<?php

if(!isset($_SESSION['id'])) {
  header("Location: login.php");
  exit;
}
?>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>WMSU-SERDAC</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <link href="assets/css/gallery.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/img/favicon.ico" rel="icon">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/vendor/Hover-master/css/hover.css" rel="stylesheet" media="all">
  <link rel="stylesheet" href="assets/vendor/cssanimation/cssanimation.min.css"/>

</head>
<body>
<header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container-fluid d-flex justify-content-between align-items-center">
      </div>
      <header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container-fluid d-flex justify-content-between align-items-center">
      <div class="logo">
        <h5 class="text-light" style="font-size: 16px;">
          <span id="zk-trigger" style="text-align: center;">
            <img src="assets/img/serdac-icon.png" 
            alt="" width="35" height="35" style="margin-left: 10px; border-radius:16px;" 
            class="d-inline-block d-inline-block align-text-middle"> 
            <span id="hide1" class="hide"></span>
          <p style="display: inline-block; margin-top: 27px;">WMSU - SATTELITE &nbsp;</p>
            S<span id="hide2" class="hide">ocio</span>
            E<span id="hide3" class="hide">conomic</span>
            R<span id="hide4" class="hide">esearch and</span>
            D<span id="hide5" class="hide">ata</span>
            A<span id="hide6" class="hide">nalytics</span>
            C<span id="hide7" class="hide">enter</span>
          </span>
      </h5>
      </div>
      <?php include("Includes/user_header_nav.php"); ?>    
  </header>
  </div>
  </header>
  <section id="hero" class="d-flex justify-cntent-center align-items-center">
  <!--end of header-->
<div id="heroCarousel" class="container carousel carousel-fade" data-bs-ride="carousel" data-bs-interval="3000">
    <div class="carousel-inner">

    <?php
   
        $active = ($count == 0) ? "active" : "";
    ?>
        <!-- carousel code -->
        <div class="carousel-item <?php echo $active; ?>">
            <div class="carousel-container">
                <div class="container-1 mx-auto" style="background-color: white;">
                    <div class="row mask">
                        <div class="col-lg-6 d-flex flex-column justify-content-center video-box animate__animated animate__backInLeft" style="height:max-content; padding: 10px;">
                        <div class="card" style="margin-left: 100px; width:70%; height: 100%;">
                        <img  style="margin-left: 10px; width:80%; height: 200%;" src="assets/img/serdac-icon.png" class="rounded float-start mx-auto img-fluid" style="margin-right: 100px; object-fit: contain;">    
                             </div>
                          </div>                       
                        <div class="col-lg-6 d-flex flex-column justify-content-center p-5 animate__animated animate__backInRight" style="padding: 50px;">
                                <br>
                                <h5 class="card-title" style="text-align:left;"><b>WELCOME TO wmsu-satellite SERDAC </b>
                                <br> <span style="font-size: 12px">  <em>WE HOPE YOU WILL ENJOY OUR OFFERED SERVICES </em> </span> </h5>  
                                <h5 class="card-title" style="text-align:left;" style="color: grey; margin-bottom: 20px; font-size: 13px;"></h5>
                                <a href="#"class="btn btn-primary" style="margin-top: 20px;"></a> 
                          </div>
        </div>
    </div>
  </div>
</div>
</header>
 
    </div>
</div>
       
    </div>
      
    </div>
  </section>
   
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
                <p>W376+CGQ, Normal Rd, Zamboanga, 7000 Zamboanga del Sur</p><br>
                <div class="row">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3960.807436637633!2d122.0587977!3d6.913612835819681!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xd7958a8ff6fcb0da!2sCTE%20WMSU!5e0!3m2!1sen!2sph!4v1670746701677!5m2!1sen!2sph" width="100" height="200" style="border:0;" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
              </div>
            </div>
            <div class="col-md-6" >
              <div class="info-box">
                <i class="bx bx-envelope"></i>
                <h3>Email Us</h3>
                <p>clsu_mindanao@wmsu.com<br>clsu_mindanao@wmsu.com</p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="info-box">
                <i class="bx bx-phone-call"></i>
                <h3>Call Us</h3>
                <p>+1 5589 55488 55<br>+1 6678 254445 41</p>
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
 
 <section id="news">
  <div class="section-title">
    <div class="alert alert-light" role="alert" style="margin-top: -8%;">
      <h1 style="text-align:center; color:black; font-size:26px;"> Welcome <i><?php echo $_SESSION['username'] ?> </i> to Western Mindanao State Univrsity Satellite - <br>
      Socio Economic Research and Data Analytics Center</h1>
      <hr>
      <div class="row">
        <div class="col">
          <div class="container mx-auto">
            <h1 style="text-align: center;"> News Section </h1>

            <?php
            global $ConnectingDB;
            $sql    = "SELECT * FROM post WHERE category = 'Trainings'";
            $stmt   = $ConnectingDB->query($sql);
            $count = 0;
            while ($DataRows = $stmt->fetch()) {
              $PostId             = $DataRows["id"];
              $DateTime           = $DataRows["datetime"];
              $PostTitle          = $DataRows["title"];
              $Category           = $DataRows["category"];
              $Admin              = $DataRows["author"];
              $Image              = $DataRows["image"];
              $PostDescription    = $DataRows["post"];

              $active = ($count == 0) ? "active" : "";
              } // end of while loop
            ?>
            <div class="card">
              <div class="row" data-aos="fade-up">
                <div class="col-md-4">
                  <img src="Uploads/<?php echo $Image ?>" class="img-fluid" style="max-height: 250px; padding: 20px;" alt="">
                </div>
                <div class="col pt-4">
                  <h3><?php echo $PostTitle; ?></h3>
                  <p class="fst-italic">
                    <?php 
                    if (strlen($PostDescription)>150) {
                      $PostDescription = substr($PostDescription,0,150).". . .";
                    }
                    echo htmlentities($PostDescription);
                    ?>
                  </p>
                  <i class="bi bi-check"></i> <a href="FullPost.php?id=<?php echo $PostId; ?>"> Read more... </a>
                </div>
              </div>
            </div>
            <?php
              $count++;
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

      </div>
  <main id="main">


   <!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="datasetmodal" tabindex="-1" role="dialog" aria-labelledby="datasetmodal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="datasetmodal">Inquire a dataset...</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <?php if(isset($_POST['submit'])) {
          $_SESSION['firstname']  = $_POST['firstname'];
          $_SESSION['lastname'] = $_POST['lastname'];
          $_SESSION['email'] = $_POST['email'];
          $_SESSION['name_dataset'] = $_POST['name_dataset'];
          $_SESSION['name_author'] = $_POST['name_author'];
          $_SESSION['status'] = $_POST['status'];
      }?>
      <form class="row g-3" method="POST" action="inquire_dataset.php">
          <div class="col-md-6">
              <label for="firstname" class="form-label">First Name</label>
              <input type="text" name="firstname" class="form-control" id="firstname" placeholder="Insert first name here">
          </div>
          <div class="col-md-6">
              <label for="lastname" class="form-label">Last Name</label>
              <input type="text" name="lastname" class="form-control" id="lastname" placeholder="Insert last name here">
          </div>
          <div class="col-md-6">
              <label for="nameDataset" class="form-label">Name of Dataset</label>
              <select class="form-select" id="nameDataset" name="nameDataset" aria-label="Dataset name">
                <option selected>Open this select menu</option>
                <?php
                  $count = 0;
                    global $ConnectingDB;
                    $sql = "SELECT * FROM dataset ";
                    $stmt = $ConnectingDB->query($sql);   
                    while($DataRows = $stmt->fetch()) {
                    $dataset_title = $DataRows["dataset_title"];
                    
                ?>
                  <option value="<?php echo $dataset_title?>"><?php echo $dataset_title?></option>
                <?php } ?>
              </select>
          </div>
          <div class="col-md-6">
            <label for="fullnameauthor" class="form-label">Full Name Of Author</label>
            <input type="fullnameauthor" name="fullnameauthor" class="form-control" id="fullnameauthor" placeholder="Name of Author">
          </div>
          <div class="col">
              <label for="email" class="form-label">Email</label>
              <input type="email" name="email" class="form-control" id="email" placeholder="Insert email here">
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" name="submit">Inquire dataset</button>
          </div>
      </form>

    </div>
  </div>

</div>
  <hr>

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
                <p>W376+CGQ, Normal Rd, Zamboanga, 7000 Zamboanga del Sur</p><br>
                <div class="row">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3960.807436637633!2d122.0587977!3d6.913612835819681!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xd7958a8ff6fcb0da!2sCTE%20WMSU!5e0!3m2!1sen!2sph!4v1670746701677!5m2!1sen!2sph" width="100" height="200" style="border:0;" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
              </div>
            </div>
            <div class="col-md-6" >
              <div class="info-box">
                <i class="bx bx-envelope"></i>
                <h3>Email Us</h3>
                <p>clsu_mindanao@wmsu.com<br>clsu_mindanao@wmsu.com</p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="info-box">
                <i class="bx bx-phone-call"></i>
                <h3>Call Us</h3>
                <p>+1 5589 55488 55<br>+1 6678 254445 41</p>
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
  </main>
 
  <footer id="footer" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
    
    <div class="footer-top">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="userdashboard.php">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="about_us.php">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="userdashboard.php#services">Services</a></li>
            </ul>
          </div>

          <div id="services" class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="data_analytics.php"> Data Analytics </a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="trainings.php"> Capability Trainings</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="data_bank.php"> Data Repository</a></li>
              
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
              Ground Floor, Research Building,<br>
              Western Mindanao State University,<br>
              Normal Road, Baliwasan, <br>
              Zamboanga City 7000 Philippines <br>
              <br>
              <strong>Phone:</strong> 0917 109 8164<br>
              <strong>Email:</strong> wmsuserdac@wmsu.com
            </p>

          </div>


          <div class="col-lg-3 col-md-6 footer-info">
            <h3>About WMSU-SERDAC </h3>
    
            <div class="social-links mt-3">
              <a href="https://www.facebook.com/wmsu.serdac" class="facebook"><i class="bx bxl-facebook"></i></a>
              <p> Facebook link</p>
            </div>
          </div>

        </div>
      </div>
    </div>
  </footer>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/js/main.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>

<style>
.modal-backdrop {
    background-color: transparent;
    z-index: 1040 !important;
    display: none !important;
}

.modal {
  z-index: 1050 !important;
  
}
.modal {
  overflow-y: auto;
}

.modal-backdrop {
  background-color: rgba(0, 0, 0, 0.5) !important;
}

</style>

<script>
  $(document).ready(function() {
    $("#modal-btn").click(function() {
      $("#datasetmodal").modal("show");
    });
  });

</script>
