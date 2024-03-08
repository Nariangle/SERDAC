<?php ob_start(); ?>
<?php require_once("Includes/DB.php"); ?> <!--Require DB.php one time -->
<?php require_once("Includes/Functions.php"); ?>
<?php require_once("Includes/Sessions.php"); ?>
<?php 

if(isset($_SESSION['id'])){
  $id = $_SESSION['id'];

  $stmt = $ConnectingDB->prepare("SELECT firstname, MI, lastname, email FROM users WHERE id = :id");
  $stmt->bindParam(':id', $id);
  $stmt->execute();
  $user = $stmt->fetch(PDO::FETCH_ASSOC);

  $firstname = $user['firstname'];
  $MI = $user['MI'];
  $lastname = $user['lastname'];
  $email  = $user['email'];
}

$msg="";

?>
<!DOCTYPE html>
<html lang="en">

    <script src="assets/js/sweetalert.min.js"></script>
      <?php include("Includes/user_header_nav.php"); ?>    

        <?php
            global $ConnectingDB;
            $sql    = "SELECT * FROM post WHERE category = 'News'";
            $stmt   = $ConnectingDB->query($sql);
        ?>


  <main id="main">
    <section id="services" class="services">
      <div class="container" style="margin-top:-5px">
        <div class="cssanimation blurIn" data-aos="fade-up" style="font-size: 35px; text-align:center; margin-bottom: 20px;">  
            Western Mindanao State University - Socio Economic Research and Data Analytics Center welcomes you!  </div>
        <div class="alert alert-light" role="alert">
          <h1 style="text-align:center;" style="margin-top:30px" data-aos="fade-up"> 1st Service </h1>
          <p style="text-align:center;" data-aos="fade-up"> This section provides what WMSU-SERDAC's can offer to its potential users. </p>
        </div>
        <center>
        <div class="row justify-content-center">
          <div class="col" data-aos="fade-up">
            <div class="icon-box icon-box-pink hvr-shrink" style="background-color: #9e1b14;; color:white;">
              <div class="icon"><i class='bx bx-data'></i></div>
              <h4 class="title"><a href="" style="color:white;">Data Analytics</a></h4>
              <p class="description">The center ultimately provides socio-economic, econometric and statistical analysis.</p>
            </div>
            <hr style="width: 50%;">
          </div>
          </div>
        </center>
          </div>
    </section>
        <!-- About Us -->
    <section id="create-appointment" class="service-details" style="background-color:#9e1b14; color:white; border-radius: 10px; margin: 10px;">
    <div class="container-lg">
      <center>
        <div class="alert alert-light hvr-shrink"  role="alert" >
          <h1 style="text-align:center;" data-aos="fade-up" style="margin-top: 10px;"> Create Appointment</h1>
          <p style="text-align:center;" data-aos="fade-up"> This section allows the user to create an appointment in order to book a particular utilization of a servicec provided by WMSU Satellite SERDAC.</p>
        </div>
        </center>
    <form class="row g-3 needs-validation" data-aos="fade-up" method="POST" action="create_appointment.php">
        <div class="col-md-5">
          <label for="firstName" class="form-label">First name</label>
          <input type="text" class="form-control" id="firstName" name="firstName" value="<?php echo $firstname ?>"  required>
        </div>
        <div class="col-md-2">
          <label for="mi" class="form-label">Middle Initial</label>
          <input type="text" class="form-control" id="mi" name="mi" value="<?php echo $MI ?>"  required>
        </div>
        <div class="col-md-5">
          <label for="lastName" class="form-label">Last name</label>
          <input type="text" class="form-control" id="lastName" name="lastName" value="<?php echo $lastname ?>"  required>
        </div>
        <div class="col-md-4">
          <label for="email" class="form-label">Email</label>
          <div class="input-group has-validation">
            <span class="input-group-text" id="inputGroupPrepend">@</span>
            <input type="text" class="form-control" id="email" name="email" aria-describedby="inputGroupPrepend" value="<?php echo $email ?>" required>
          </div>
        </div>
        <div class="col-md-4">
          <label for="contactNumber" class="form-label">Contact</label>
          <div class="input-group has-validation">
            <span class="input-group-text" id="inputGroupPrepend">+63</span>
          <input type="text" class="form-control" id="contactNumber" name="contactNumber" required>
        </div>
        </div>
        <div class="col-md-4">
          <label for="address" class="form-label">Address</label>
          <input type="text" class="form-control" name="address" id="address" required>    
        </div>
        <div class="col-md-3">
          <label for="zipcode" class="form-label">Zip</label>
          <input type="text" class="form-control" id="zipcode" name="zipcode" required>
        </div>
          <div class="col-md-5">
          <label for="region" class="form-label">Region</label>
          <label class="visually-hidden" for="inlineFormSelectPref">...</label>
        <select class="form-select" id="region" name="region">
        <option selected>Choose...</option>
        <option value="Zamboanga del Sur">Zamboanga Del Sur</option>
        <option value="Zamboanga del Norte">Zamboanga Del Norte</option>
        </select>
        </div>
       
        <div class="col-md-4">
            <label for="dateAppointment" class="form-label">Date</label>
        <input type="date" id="dateAppointment" name="dateAppointment" class="form-control" required>
        </div>
        <div class="col-12">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
            <label class="form-check-label" for="invalidCheck">
              Agree to terms and conditions
            </label>
          </div>
        </div>
        <div class="col-12">
          <button class="btn btn-primary" type="submit">Submit form</button>
               </form>
               
               <?php
               if(isset($_GET['success']) && $_GET['success'] == 1){
                echo '<script type="text/javascript">';
                echo 'swal("success!", "We are processing your request. We will get back to you via email.", "success");';
                echo '</script>';
               }
               ?>
               
        </div>
    </div>
    
 
    </section>
  </main>

  <?php include("Includes/footer.php"); ?>
  
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  
  <script src='https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.1.4/dist/js/datepicker-full.min.js'></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/cssanimation/letteranimation.js"></script>
  <script src="assets/js/main.js"></script>
</body>
</html>