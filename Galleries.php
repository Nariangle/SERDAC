<?php require_once("Includes/DB.php"); ?> <!--Require DB.php one time -->
<?php require_once("Includes/Functions.php"); ?>
<?php require_once("Includes/Sessions.php"); ?>

<!DOCTYPE html>
<html lang="en">
<?php include("Includes/user_header_nav.php"); ?>  

 
  <main id="main">
    <section id="gallery" class="service-details">
      <div class="container">
        <div class="alert alert-light" role="alert">
          <h1 style="text-align:center;">Gallery</h1>
        </div>
<div class='container'>
 <div class='row'>

        <?php
        $count = 0;
          global $ConnectingDB;
          $sql = "SELECT * FROM post WHERE category = 'Gallery' ORDER BY id"; //fetch post in descending order from latest post
          $stmt = $ConnectingDB->query($sql);   
          while($DataRows = $stmt->fetch()) {
            $PostId         = $DataRows["id"];
            $GalleryTitle   = $DataRows["title"];
            $Category       = $DataRows["category"];
            $Image          = $DataRows["image"];
            $Participants   = $DataRows["post"];
            $Date           = $DataRows["date"];
            $count = $count + 1;
            echo"  <div class='col-lg-3 col-md-5 col-sm-5' style='margin-right: 40px;'>";
              echo"    <a class='portfolio-box' href='Gallery/$Image'>";
               echo"    <img class='img-fluid' src='Gallery/$Image '>";
               echo"  <div class='portfolio-box-tooltip'>";
                echo"   <div class='portfolio-box-caption-content'>";
                  echo"    <div class='project-name'>
                         Training 
                      </div>";
                      echo"    <div class='project-name'>";
                        echo htmlentities($GalleryTitle);
                        echo"       </div>";
                        echo"        <div class='project-category text-faded'>";
                        echo htmlentities($Date);
                      echo'</div>';
                      echo"      <div class='project-category text-faded'>";
                        echo htmlentities($Participants);
                        echo"    </div>";
                    echo"</div>";
                  echo"</div>";
                  echo" </a>";
       echo"   </div>";
         
         
      
            }
              ?>

        </div>
      </div> 
    </section>
   
          
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
</body>
</html>

<style>

  .portfolio-box {
    position: relative;
    display: inline-block;
  }
  .portfolio-box-tooltip {
    visibility: hidden;
    position: absolute;
    bottom: 100%;
    left: 50%;
    transform: translateX(-50%);
    padding: 10px;
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
    opacity: 0;
    transition: visibility 0s, opacity 0.3s ease-out;
  }
  .portfolio-box:hover .portfolio-box-tooltip {
    visibility: visible;
    opacity: 1;
  }
  .project-name {
    font-size: 16px;
    font-weight: bold;
    margin-bottom: 5px;
  }
  .project-category {
    font-size: 14px;
    color: #666;
  }
  .project-category .text-faded {
    opacity: 0.7;
  }

  /* Style 2 */

  .portfolio-box {
  position: relative;
}

.portfolio-box-tooltip {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: rgba(255, 255, 255, 0.8);
  display: none;
  padding: 10px;
  text-align: center;
}

.portfolio-box:hover .img-fluid {
  opacity: 0.5;
}

.portfolio-box:hover .portfolio-box-tooltip {
  display: block;
}

</style>

<script>
  // Optionally, you can add a tooltip arrow with this code
  function addTooltipArrow() {
    var tooltipEls = document.querySelectorAll('.portfolio-box-tooltip');
    tooltipEls.forEach(function(tooltipEl) {
      var arrowEl = document.createElement('div');
      arrowEl.classList.add('tooltip-arrow');
      tooltipEl.appendChild(arrowEl);
    });
  }
  addTooltipArrow();
</script>