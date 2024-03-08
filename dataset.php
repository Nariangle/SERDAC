<?php require_once("Includes/DB.php"); ?> <!--Require DB.php one time -->
<?php require_once("Includes/Functions.php"); ?>
<?php require_once("Includes/Sessions.php"); ?>



<!DOCTYPE html>
<html lang="en">

<head class="mb-4">
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>SERDAC - Mindanao</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
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
  <link href="assets/css/gallery.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
</head>


  <!-- HEADER -->
  <header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container-fluid d-flex justify-content-between align-items-center">
  
      <div class="logo">

        <h5 class="text-light" style="font-size: 18px;">
          <span id="zk-trigger" style="text-align: center;">
            <img src="assets/img/serdac-icon.png"
            alt=""
       width="40"
       height="40"
       style="margin-top: 7px;
              margin-left: 200px;
              margin-bottom: 15px;
              border-radius: 50%;"
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
      <?php include("Includes/headernav.php"); ?>
    </div>
  </header>
  </div>
  </header>
  </section>
  <main id="main">
    <section id="dataset" class="dataset">
      <div class="container">
        <div class="row">
        <div class="alert alert-light" role="alert" style="margin-top: 0%;">
          <h1 style="text-align:center;"> Datasets </h1>
        </div>
        <div class="row">
          This section provides datasets that are available to be inquired by users which can be
          provided and downloaded when needed so. This opens a harmonious relationship with 
          not only the SERDAC community itself but as well as the people utilizing the site.
          </div>
            </div>
            </div>

            
      <div class="container" style="margin-top: 5%;">
        <div class="row">
          <div class="col-1-3" style="text-align:right">
              
              <div class="w-75"></div>
          </div>
          <div class="col">
            <div class="card" style="margin-top: 10px;" >
              <p style="margin-top: 10px; margin-left: 10px;"> Date: 3/19/2023 </p>
              <img src="./assets/img/hero-bg.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Dataset #1</h5>
                <p class="card-text">This dataset is chuchu buruchu.</p>
                <p>abstract: ..... </p>
                <p>Author: Fernandez</p>
               
                <button class="btn btn-primary">
                <a href="login.php" style= "color:White;  ">Inquire Dataset</a>
                </button>
         
            </div>
          </div>

          <div class="card" style="margin-top: 10px;" >
            <p style="margin-top: 10px; margin-left: 10px;"> Date: 3/20/2023 </p>
            <img src="./assets/img/jaja.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Dataset #2</h5>
              <p class="card-text">This dataset is chuchu buruchu.</p>
              <p>Genre: News </p>
              <p>Author: Fernandez</p>
             
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#datasetmodal">
                Acquire dataset
              </button>
       
          </div>
        </div>
      
        </div>
      </div>



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
        <form class="row g-3">
          <div class="col-md-6">
            <label for="firstname" class="form-label">First Name</label>
            <input type="text" class="form-control" id="firstname" placeholder="Insert first name here">
          </div>
          <div class="col-md-6">
            <label for="lastname" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="lastname" placeholder="Insert last name here">
          </div>
  <div class="col">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" placeholder="Insert email  here">
  </div>
 
  <div class="col-12">
    <label for="inputAddress" class="form-label">Address</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="Insert address here">
  </div>
  
  <div class="col-12">
    <label for="nameDataset" class="form-label">Name of Dataset</label>
    <input type="text" class="form-control" id="nameDataset" placeholder="Name of Dataset">
  </div>
  <div class="col-md-6">
    <label for="firstnameauthor" class="form-label">First Name Of Author</label>
    <input type="text" class="form-control" id="firstnameauthor" placeholder="Insert first name of author here">
  </div>
  <div class="col-md-6">
    <label for="lastnameauthor" class="form-label">Last Name Of Author</label>
    <input type="text" class="form-control" id="lastnameauthor"  placeholder="Insert last name of author here">
  </div>
  <div class="col-12">
    <label for="email" class="form-label">Type of Dataset</label>
    <select class="form-select" id="inlineFormSelectPref">
      <option selected>Choose type...</option>
      <option value="XLSX">XLSX</option>
      <option value="DOCX">DOCX</option>
      <option value="PDF">PDF</option>
    </select>
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" href="homepage.html">Inquire dataset</button>
      </div>
    </div>
  </div>
</form>
</div>
  
  </main>
  
  <?php include("Includes/footer.php"); ?>
  
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