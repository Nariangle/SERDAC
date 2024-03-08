<?php
ob_start(); #Output buffering

// Include the necessary files
include_once("Includes/DB.php");
include_once("Includes/Functions.php");
include_once("Includes/Sessions.php");

// Check if the post ID is a valid integer
if(!isset($_GET["id"]) || !is_numeric($_GET["id"])) {
  $_SESSION["ErrorMessage"] = "You are trying to view an invalid post";
  Redirect_to("articles.php");
}

// Fetch the post data from the database
$PostId = $_GET["id"];

global $ConnectingDB;
$sql = "SELECT * FROM post WHERE id=:postId";
$stmt = $ConnectingDB->prepare($sql);
$stmt->bindValue(':postId', $PostId);
$stmt->execute();
$DataRows = $stmt->fetch();

// If no data is found, show an error message
if ($DataRows == null) {
  $_SESSION["ErrorMessage"] = "Post not found";
  Redirect_to("articles.php");
}

// Extract the post data
$PostTitle        =   $DataRows["title"];
$Category         =   $DataRows["category"];
$Image            =   $DataRows["image"];
$PostDescription  =   $DataRows["post"];
$DateTime         =   $DataRows["datetime"];
$Admin            =   $DataRows["author"];
$views            =   $DataRows["view"];

// Add view count
$views = $views + 1;
$sql1 = "UPDATE post SET view = :view WHERE id = :postId";
$stmt1 = $ConnectingDB->prepare($sql1);
$stmt1->bindParam(':view', $views, PDO::PARAM_INT);
$stmt1->bindParam(':postId', $PostId, PDO::PARAM_INT);
$stmt1->execute();

ob_end_flush();
?>

<?php include("Includes/user_header_nav.php"); ?>  

<body>
  <!-- Main -->

      <!-- Query for showing content -->
    <div class="container" style="margin-top: 100px;">
      <div class="row mt-4">
        <div class="col-sm-8">
          <h1>Viewing article</h1>
          <div class="card mt-5">
            <img src="Uploads/<?php echo htmlentities($Image) ?>" class="img-fluid mx-auto d-block">
              <div class="card-body">
                <h4 class="card-title"><?php echo htmlentities($PostTitle) ?></h4>
                <small class="text-muted">Posted By: <?php echo htmlentities($Admin) ?> On <?php echo htmlentities($DateTime) ?></small>
                <span style="float:right;" class="badge badge-dark text-dark">Views(<?php echo $views;?>)</span>
                <hr>
                <div class="post-text" style="line-height: 1.5; font-size: 110%">
                  <?php 
                    echo nl2br(htmlentities($PostDescription)); 
                    // use nl2br to replace newlines with HTML line breaks
                  ?>
                </div>
              </div>
          </div>

        </div>

        <div class="col-sm-4" style="background-color:#F7E7CE; border-radius: 7px; border: 1px solid rgb(189, 187, 187);">
          <form class="form-inline d-none d-sm-block" action="articles.php">
              <div class="row d-flex align-items-center justify-content-center">
                <h5 style="margin-top: 20px; text-align:center;"><i class="bi bi-search Search"> Search</i> </h5>
                  <div class="col-sm-8">
                    <div class="searchbar-container">
                      <span> <input class="form-control mt-3" type="text" name="Search" placeholder="Search Article">
                    </div>
                  </div>
                  <div class="col-sm-1">
                    <div class="searchbar-container" style="margin-top:16px;"> 
                    <button class="btn btn-primary" class="search-bar" name="SearchButton"> <i class="bi bi-search"></i> </button> </span>
                  </div>
              </div>
              </form>
          
            <hr>
              <div class="date">
              <h5  style="text-align:center"> <i class='bx bx-calendar' ></i> Date </h5>
            </div>
              <div class="col-sm-5">
              <?php echo
                  "<p> <i class='bx bxs-sort-alt'></i> <a href='articles.php?sortAsc=ASC'> Ascending<i class='bx bx-up-arrow-alt' ></i> </p> </a>"
              ?>
                  
            </div>
              <div class="col-sm-5">
                <?php
                  echo
                  "<p> <i class='bx bxs-sort-alt'></i> <a href='articles.php?sortDesc=DESC'>Descending<i class='bx bx-down-arrow-alt' ></i> </p> </a>"
                  ?>
                  </div>
             
        </div>
      </div>
    </div>
      </div>
    </div>
  

 
</body>
  <!-- FOOTER -->
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
</html>
         <style>
              /* for android to siya */
              @media (max-width: 768px) {
                .card {
                  flex-direction: column;
                  align-items: center;
                  text-align: left;
                }
                .card .col-md-4 {
                  width: 100%;
                }
              }
            
              .card-img {
                width: 100%;
                height: auto;
                object-fit: cover;
              }
            
              .card-title {
                font-size: 24px;
                margin-bottom: 10px;
              }
            
              .text-muted {
                font-size: 14px;
                margin-bottom: 5px;
              }
            
              .badge {
                font-size: 14px;
                margin-bottom: 10px;
              }
            
              .card-text {
                margin-bottom: 15px;
              }
            
              .btn {
                font-size: 14px;
              }
            </style>
<style>
.searchbar-container, .search-bar{
        display: block;
    }  
  
</style>