<?php require_once("Includes/DB.php"); ?> <!--Require DB.php one time -->
<?php require_once("Includes/Functions.php"); ?>
<?php require_once("Includes/Sessions.php"); ?>
<?php 
$msg="";
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
?>
<!DOCTYPE html>
<html lang="en">

      <?php include("Includes/user_header_nav.php"); ?>
      <script src="assets/js/sweetalert.min.js"></script>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">    



<style>
 img{
  max-height: 200px;
 }
</style>
  <main id="main">
    <section id="gallery" class="service-details">
      <div class="container"  >
      <section id="services" class="services">
      <div class="container" style="margin-top:-5px">
        <div class="cssanimation blurIn" data-aos="fade-up" style="font-size: 35px; text-align:center; margin-bottom: 20px;">  
            Western Mindanao State University - Socio Economic Research and Data Analytics Center welcomes you!  </div>
        <div class="alert alert-light" role="alert">
          <h1 style="text-align:center;" style="margin-top:30px" data-aos="fade-up"> 2nd Service </h1>
          <p style="text-align:center;" data-aos="fade-up"> This section provides what WMSU-SERDAC's can offer to its potential users. </p>
        </div>
        <center>
        <div class="row justify-content-center">
        <div class="col" data-aos="fade-up" data-aos-delay="100">
            <div class="icon-box icon-box-cyan hvr-shrink" style="background-color: #9e1b14;; color:white;">
              <div class="icon"><i class='bx bx-male'></i></div>
              <h4 class="title"><a href="trainings.php" style="color:white;">Capability Training</a></h4>
              <p class="description">The center provides trainings and workshops to initiate research capability building activities.</p>
            </div>
            <hr style="width: 50%;">
          </div>
          </div>
        </center>
          </div>
    </section>
    
    <style>
  #trainings {
    border: 1px solid #ccc;
    padding: 20px;
  }
  .section-title {
    background: linear-gradient(to bottom, #9e1b14, #AE445A);
    color:white;
    
    
  }
</style>

    <?php
    global $ConnectingDB;
    $sql = "SELECT trainings.training_id, trainings.title, trainers.id,trainers.trainer_name, trainings.description, trainings.start_time, trainings.end_time, trainings.training_date, trainings.training_dateEnd, trainings.venue, trainings.trainingImg, training_details.num_participants, training_details.max_participants
    FROM trainings
    INNER JOIN trainers ON trainings.trainer_id = trainers.id
    INNER JOIN training_details ON trainings.training_id = training_details.training_id
    WHERE trainings.is_shown = 1";
    $stmt = $ConnectingDB->query($sql);
    $count = 0; // Counter variable for generating unique IDs
    
    ?>
    

    <section id="trainings"style ="margin-top: -50px;">
      <div class="section-title">
        <h1 id="trainings" data-aos="fade-up">UPCOMING TRAININGS</h1>
        <p data-aos="fade-up">This section provides the SERDAC the latest upcoming Trainings</p>
      </div>
      <div id="carouselExample" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
      <div class="carousel-inner">
      <?php while ($DataRows = $stmt->fetch()) {
        $trainingID    = $DataRows["training_id"];
        $trainingTitle = $DataRows["title"];
        $trainingDisc  = $DataRows["description"];
        $trainerName   = $DataRows["trainer_name"];
        $trainerId     = $DataRows['id'];
        $startTime     = $DataRows["start_time"];
        $endTime       = $DataRows["end_time"];
        $maxParticipants = $DataRows["max_participants"];
        $currentParticipants  = $DataRows["num_participants"];
        $trainingDate   = $DataRows['training_date'];
        $trainingDateEnd   = $DataRows['training_dateEnd'];
        $venue          = $DataRows['venue'];
        $image         = $DataRows['trainingImg'];
        
        $dateStart = date('F j, Y', strtotime($trainingDate));
        $dateEnd = date('F j, Y', strtotime($trainingDateEnd));

        $active = ($count == 0) ? "active" : ""; // Add "active" class to the first slide ?>
        <div class="carousel-item <?php echo $active; ?>">
          <div class="container mx-auto">
            <div class="card" style="margin-top: 70px; display: flex; align-items: center; background-color: rgb(158, 27, 20); padding-top: 100px; padding-bottom: 90px; color: white;">
              <div class="row" data-aos="fade-up">
                <div class="col-md-4" style="align-items: center; width: 300px; height: 300px; margin-top: 50px">
                  <img src="Uploads/<?php echo $image ?>" class="img-fluid" style="max-height: 250px; padding: 20px;" alt="">
                </div>
                <div class="col pt-4 text-center" style="margin-top: 50px">
                  <h3><?php echo $trainingTitle; ?></h3>
                  <p class="fst-italic">
                      <?php
                      if (strlen($trainingDisc) > 150) {
                          $trainingDisc = substr($trainingDisc, 0, 150) . ". . .";
                      }
                      echo htmlentities($trainingDisc);
                      ?>
                  </p>
                  <div class="row mt-3">
                      <div class="col">
                          <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#trainingModal-<?php echo $trainingID ?>">View Details</a>
                          <?php
                            // Assuming $numParticipants contains the current number of participants
                            // Assuming $maxParticipants contains the maximum number of participants
                            if ($currentParticipants >= $maxParticipants) {
                                echo '<h3>This training has reached its maximum participants!</h3>';
                            } else {
                                echo '<a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#joinModal-' . $trainingID . '">Join</a>';
                            }
                        ?>

                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="modal fade" id="trainingModal-<?php echo $trainingID ?>" tabindex="-1" aria-labelledby="trainingModalLabel-<?php echo $trainingID ?>" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="trainingModalLabel-<?php echo $trainingID ?>"><?php echo $trainingTitle ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <p><?php echo $trainingDisc ?></p>
                <p><strong>Trainer:</strong> <?php echo $trainerName ?></p>
                <div class="row">
                  <div class="col-md-6">
                    <p><strong>Date Start:</strong> <?php echo $date ?></p>
                  </div>
                  <div class="col-md-6">
                    <p><strong>Date End:</strong> <?php echo $dateEnd ?></p>
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-md-6">
                    <p><strong>Start Time:</strong> <?php echo $startTime ?></p>
                  </div>
                  <div class="col-md-6">
                    <p><strong>End Time:</strong> <?php echo $endTime ?></p>
                  </div>
                </div>
                <p><strong>Venue: </strong> <?php echo $venue ?></p>
                <p><strong>Max Participants:</strong> <?php echo $maxParticipants ?></p>
                <p><strong>Current Participants:</strong> <?php echo $currentParticipants ?></p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>

        <div class="modal fade" id="joinModal-<?php echo $trainingID ?>" tabindex="-1" aria-labelledby="joinModalLabel-<?php echo $trainingID ?>" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="joinModalLabel-<?php echo $trainingID ?>"><?php echo $trainingTitle ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">

                  <form class="row g-3" method="POST" action="join_training.php">
                  <input type="hidden" class="trainerId" name="trainerId" value=<?php echo $trainerId; ?>>
                  <input type="hidden" class="trainingId" name="trainingId" value=<?php echo $trainingID; ?>>  
                  <div class="col-md-5">
                      <label for="firstname" class="form-label">First Name</label>
                      <input type="text" name="firstname" class="form-control" id="firstname" placeholder="John" value ="<?php echo $firstname ?>" required>
                    </div>
                    <div class="col-md-2">
                      <label for="middleinitial" class="form-label">MI</label>
                      <input type="text" name="middleinitial" class="form-control" id="middleinitial" placeholder="B." value ="<?php echo $MI ?>">
                    </div>
                    <div class="col-md-5">
                      <label for="lastname" class="form-label">Last Name</label>
                      <input type="text" name="lastname" class="form-control" id="lastname" placeholder="Doe" value ="<?php echo $lastname ?>" required>
                    </div>
                    <div class="col-md-6">
                      <label for="affiliation" class="form-label">Affiliation</label>
                      <input type="text" name="affiliation" class="form-control" id="affiliation" placeholder="Affiliation">
                    </div>
                    <div class="col-md-6">
                      <label for="occupation" class="form-label">Occupation</label>
                      <input type="text" name="occupation" class="form-control" id="occupation" placeholder="Student, Professional, etc." required>
                    </div>
                    
                    <div class="form-group">
                    <label for="contactNo" class="form-label">Contact Number</label>
                    <input type="text" name="contactNo" class="form-control" id="contactNo" placeholder="Contact Number" required ></input>
                    </div>
              
                    <div class="form-group">
                    <label for="email" class="form-label">Email Address</label>
                      <input type="email" name="email" class="form-control" id="email" placeholder="Insert email here" value ="<?php echo $email ?>" required >
                    </div>
                    <br>  <br>  <br> <br> 
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <!-- <button type="button" class="btn btn-primary" type="submit">Join</button> -->
                    </div>
                    <button class="btn btn-primary" type="submit">Join</button>
                    <?php
                      if(isset($_GET['success']) && $_GET['success'] == 1){
                        echo '<script type="text/javascript">';
                        echo 'swal("success!", "We are processing your request. We will get back to you via email.", "success");';
                        echo '</script>';
                      }
                      ?>
                  </form>
                </div>
            </div>
          </div>
        </div>


        <?php $count++; // Increment the counter variable for each slide
      } ?>
    </div>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />      


        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class=""><i class="fa-regular chevron-left"></i></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class=""><i class="fa-regular chevron-right"></i></span>
        </button>
      </div>
    </section>

        <section id="gallery" class="service-details">
        <div class="alert alert-light" role="alert">
          <h1 style ="text-align:center;" style ="margin-top: -300px;">Gallery</h1>
        </div>
 <div class='row' style="margin-top: 100px;">
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
            $count = 0;

              echo "<div class='col-lg-4 col-md-8 col-sm-5' style='margin-right: -50px;'>";
              echo "<div class='card hvr-shrink' style='margin-top: 10px; color:black; max-height:300px;'>";
              echo "<div class='card-body'>";
              echo "<a class='portfolio-box' href='Gallery/$Image'>";
              echo "<img class='img-fluid' src='Gallery/$Image'>";
              echo "<div class='portfolio-box-tooltip'>"; 
              echo "<div class='portfolio-box-caption-content'>";
              echo "<div class='project-name'>Training</div>";
              echo "<div class='project-name'>" . htmlentities($GalleryTitle) . "</div>";
              echo "<div class='project-category text-faded'>" . htmlentities($Date) . "</div>";
              echo "<div class='project-category text-faded'>" . htmlentities($Participants) . "</div>";
              echo "</div>";
              echo "</div>";
              echo "</div>";
              echo "</div>";
              echo "</a>";
              echo "</div>";

              $count++;
              if ($count % 3 == 0) {
                  echo "</div><div class='row'>";
              }
          }

          // Close the last row if there are any remaining images
          if ($count % 3 != 0) {
              echo "</div>";
          }
                      
              ?>
        </div>
      </div> 
    </section>
  </main>

  <?php include("Includes/footer.php"); ?>
  
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.js"></script>
</body>
</html>
<script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/js/main.js"></script>
  
  
<style>
  .portfolio-box {
    position: relative;
    display: inline-block;
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
