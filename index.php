<?php require_once("Includes/DB.php"); ?> <!--Require DB.php one time -->
<?php require_once("Includes/Functions.php"); ?>
<?php require_once("Includes/Sessions.php"); ?>
<?php $msg="";?>
<!DOCTYPE html>
<html lang="en">
<?php include("Includes/user_header_nav.php"); ?>   

  <section id="hero" class="d-flex justify-cntent-center align-items-center">
  <!--end of header-->

        <?php
            global $ConnectingDB;
            $sql    = "SELECT * FROM post WHERE category IN ('Editorial','Feature','Trainings')";
            $stmt   = $ConnectingDB->query($sql);
        ?>

<div id="heroCarousel" class="container carousel carousel-fade" data-bs-ride="carousel" data-bs-interval="3000">
    <div class="carousel-inner">

    <?php
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
    ?>

        <!-- carousel code -->
        <div class="carousel-item <?php echo $active; ?>">
            <div class="carousel-container">
                <div class="container-1 mx-auto" style="background-color: white;">
                    <div class="row mask">
                        <div class="col-lg-6 d-flex flex-column justify-content-center video-box animate__animated animate__backInLeft" style="height:max-content; padding: 10px;">
                        <div class="card" style="margin-left: 15px;">
                         
                            <img src="Uploads/<?php echo $Image; ?>" class="rounded float-start mx-auto img-fluid" style="margin-right: 50px; object-fit: contain;">    
                       
                             </div>
                          </div>                       
                        <div class="col-lg-6 d-flex flex-column justify-content-center p-5 animate__animated animate__backInRight" style="padding: 50px;">
                         
                                <br>
                                <h5 class="card-title" style="text-align:left;"><b> <?php echo $PostTitle?> </b>
                                <br> <span style="font-size: 12px">  <em> Published on: <?php echo $DateTime?> </em> </span> </h5>  
                                <h5 class="card-title" style="text-align:left;" style="color: grey; margin-bottom: 20px; font-size: 13px;"><?php echo substr($PostDescription, 0, 50) . '...'; ?></h5>
                                <a href="FullPost.php?id=<?php echo $PostId?>" class="btn btn-primary" style="margin-top: 20px;">View article</a>
                          
                          </div>
                    </div>
                </div>
            </div>
        </div>
<?php
        $count++; // increment the count variable for each loop iteration
    }
?>

    </div>
</div>

<!--
      <div class="carousel-item">
        <div class="carousel-container">
          <h2 class="animate__animated animate__fadeInDown">Data Analytics, Training and Technical Assistance</h2>
          <p class="animate__animated animate__fadeInUp">Researchers are most welcome to visit SERDAC for data analytics, library resources and technical assistance.
            Books in agriculture, economics, statistics and related fields are available for reading at SERDAC. </p>
        </div>
      </div>
      <div class="carousel-item">
        <div class="carousel-container">
          <h2 class="animate__animated animate__fadeInDown">What is SERDAC?</h2>
          <p class="animate__animated animate__fadeInUp">
            The establishment of the Mindanao Socio-economic Research and Data Analytics Center (SERDAC-Mindanao) is very important because this supports the research capability of the institution, faculty and staff in the field of socio-economics. With this, researchers in the Mindanao can now access to analytical tools that will enhance the conduct of socio-economic research.</p>
            </div>
        </div>
         <div class="carousel-item ">
        <div class="carousel-container">
          <div class="container-1" style="background-color: white;">
            <div class="row mask" style="padding-left: 75px;">
              <div class="col-lg-6 d-flex flex-column justify-content-center p-5 animate__animated animate__backInRight " style="padding: 50px;">
                <div class="caption"> 
                  <h3 style="text-align:center" > Test Article </h3>
                  <div class="hover">  </div>
               <div class="column">
               <p> words </p>
               </div>
              </div>
            </div>
              <div class="col-lg-6 video-box  animate__animated animate__backInLeft responsive" style="padding-left: 75px;">
                <img src="imgg.jpg" class="img-fluid" alt="" style="width: 400px; height:350px;">
              </div>
            </div>
          </div>
          </div>
        </div>

      </div>
    -->
        
    </div>
      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bx bx-chevron-left" aria-hidden="true"></span>
      </a>
      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bx bx-chevron-right" aria-hidden="true"></span>
      </a>
    </div>
  </section>
    <!-- end of carousel -->


  <main id="main">
    
            <!-- SERVICES -->
    <section id="services" class="services">
      <!-- if $_SESSION["AdminName"]   {

      }
      <p>Welcome --> 
      <?php 

      /*
      echo $_SESSION["AdminName"];
      
      */ ?> 
   <div class="container" style="margin-top: -75px">
  <div class="cssanimation blurIn" data-aos="fade-up" style="font-size: 35px; text-align: center; margin-bottom: 20px;">
    Western Mindanao State University - Socio Economic Research and Data Analytics Center welcomes you!
  </div>
  <div class="alert alert-light" role="alert">
    <h1 style="text-align: center;" data-aos="fade-up">Services</h1>
    <p style="text-align: center;" data-aos="fade-up">This section provides what WMSU-SERDAC can offer to its potential users.</p>
  </div>
  <div class="row" style="margin-bottom: -20px;">
    <div class="col-md-4" data-aos="fade-up">
      <div class="card" style="border: none; box-shadow: none;">
        <div class="card-body" style="background-color: transparent; border: none;">
          <div class="icon-box icon-box-pink hvr-shrink" style="background-color: #9e1b14; color: white;">
            <div class="icon"><i class='bx bx-data'></i></div>
            <h4 class="title"><a href="data_analytics.php" style="color: white;">Data Analytics</a></h4>
            <p class="description">The center ultimately provides socio-economic, econometric and statistical analysis.</p>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
      <div class="card" style="border: none; box-shadow: none;">
        <div class="card-body" style="background-color: transparent; border: none;">
          <div class="icon-box icon-box-cyan hvr-shrink" style="background-color: #9e1b14; color: white;">
            <div class="icon"><i class='bx bx-male'></i></div>
            <h4 class="title"><a href="trainings.php" style="color: white;">Capability Training</a></h4>
            <p class="description">The center provides trainings and workshops to initiate research capability building activities.</p>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
      <div class="card" style="border: none; box-shadow: none;">
        <div class="card-body" style="background-color: transparent; border: none;">
          <div class="icon-box icon-box-green hvr-shrink" style="background-color: #9e1b14; color: white;">
            <div class="icon"><i class='bx bx-calculator'></i></div>
            <h4 class="title"><a href="data_bank.php" style="color: white;">Data Repository</a></h4>
            <p class="description">The center distributes different assistance to further develop the capability and trust of clients.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</section>

        <!-- About Us -->
    <section id="about-us" class="service-details">
      <div class="container">
        <div class="alert alert-light" role="alert">
          <h1 style="text-align:center; margin-top:-100px;" data-aos="fade-up"> About Us </h1>
          <p style="text-align:center;" data-aos="fade-up"> This section provides what WMSU-SERDAC stands for as well as providing a glimpse to its purpose.</p>
        </div>
        <div class="row">
          <div class="col-md-6 d-flex align-items-stretch" data-aos="fade-up">
            <div class="card">
              <div class="card-img">
                <img src="assets/img/serdacfb.png" alt="...">
              </div>
              <div class="card-body">
                <h5 class="card-title"><a href="#">What is WMSU-SERDAC?</a></h5>
                <p class="card-text">The demand for socio-economic research in the university and other regions in Mindanao are increasing, therefore, enhancing the technology that will help its result to be more accurate is desirable. The need to strengthen socio-economic research was address by establishing a facility called Socio-Economic Research Center and Data Analytics Center (SERDAC).</p>
              </div>
            </div>
          </div>
          <div class="col-md-6 d-flex align-items-stretch" data-aos="fade-up">
            <div class="card">
              <div class="card-img">
                <img src="assets/img/ourmission.jpg" alt="...">
              </div>
              <div class="card-body">
                <h5 class="card-title"><a href="#">Our Mission</a></h5>
                <p class="card-text">Provide access to genuine socio-economic tools, cutting edge data analytics and relevant capacity development for quality research to generate inputs for policy makers that can enhance people’s welfare.</p>
              </div>
            </div>
          </div>
          <div class="col-md-6 d-flex align-items-stretch" data-aos="fade-up">
            <div class="card">
              <div class="card-img">
                <img src="assets/img/ourvision.jpg" alt="...">
              </div>
              <div class="card-body">
                <h5 class="card-title"><a href="#">Our Vision</a></h5>
                <p class="card-text">To become the leading center for socio-economic research and development in Western Mindanao.</p>
              </div>
            </div>
          </div>
          <div class="col-md-6 d-flex align-items-stretch" data-aos="fade-up">
            <div class="card">
              <div class="card-img">
                <img src="assets/img/objectives.jpg" alt="...">
              </div>
              <div class="card-body">
                <h5 class="card-title"><a href="#">Our Objectives</a></h5>
                <p class="card-text">WMSU-SERDAC generally aims to enhance the capacity of socio-economic researchers in Mindanao and tap the potential of the socio-economic R&D sector in providing technical assistance to the other research sectors (e.g. crops, livestock, forestry, and fishery). </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- News -->
    <section id="news" style="margin-top: -50px">
      <div class="section-title">
        <h1 id="news" data-aos="fade-up">News</h1>
        <p data-aos="fade-up">This section provide the latest WMSU-SERDAC's update such as glimpses to happenings to its environment. In order to seek more, please click this <a href="articles.php"> here. </a></p>
      </div>
      <div class="container mx-auto">
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
                echo htmlentities($PostDescription) 
              ?>
            </p>
            <i class="bi bi-check"></i> <a href="FullPost.php?id=<?php echo $PostId; ?>"> Read more... </a>
          </div>
        </div>
        <div class="row" data-aos="fade-up">
        </div>
      </div>
        </div>
      </div>
    </section>
    <section id="contact" class="contact" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
      <div class="container" >
        <h1 style="text-align:center"> Contact Us </h1>
          <p style="text-align:center">This section allows you to send an inquiry towards WMSU Satellite SERDAC.</p>
        <div class="card" style="padding: 12px;"> 
      <div class="row">
        <div class="col-lg-6">
          <div class="row">
            <div class="col-md-12">
              <div class="info-box">
                <i class="bx bx-map"></i>
                <h3>Our Address</h3>
                <p>Ground Floor, Researcch Building, Western Mindanao State Uniiversity,<br> Normal Road, Baliwasan, Zamboanga City 7000 Philippines</p><br>
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
            <?php echo $msg; ?>
            </div>
            <div class="text-center"><button type="submit" name="submit" class="btn btn-danger">Send Message</button></div>
          </form>
        </div>
      </div>
    </div>
          </div>
             </div>
  </section>
  </main>
  
  <?php include("Includes/footer.php"); ?>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <script src="./assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="./assets/vendor/aos/aos.js"></script>
  <script src="./assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="./assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="./assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="./assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="./assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="./assets/vendor/php-email-form/validate.js"></script>
  <script src="./assets/vendor/cssanimation/letteranimation.js"></script>
  <script src="./assets/js/main.js"></script>
</body>
</html>
