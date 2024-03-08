<?php require_once("Includes/Functions.php"); ?>
<?php require_once("Includes/Sessions.php"); ?>
<?php $msg="";?>
<?php
if(!isset($_SESSION['id'])) {
  header("Location: login.php");
  exit;
}
?>

 
<!DOCTYPE html>
<html lang="en">
   
   <body>
  <main id="main">
  <div class="row"> 
    <section id="services" class="services">
      <div class="container" style="margin-top:-5px">
        <div class="cssanimation blurIn" data-aos="fade-up" style="font-size: 35px; text-align:center; margin-bottom: 20px;">  
            Western Mindanao State University - Socio Economic Research and Data Analytics Center welcomes you!  </div>
        <div class="alert alert-light" role="alert">
          <h1 style="text-align:center;" style="margin-top:30px" data-aos="fade-up"> 3rd Service </h1>
          <p style="text-align:center;" data-aos="fade-up"> This section provides what WMSU-SERDAC's can offer to its potential users. </p>
        </div>
        
        <center>
        <div class="row justify-content-center">
          <div class="col mx-auto" data-aos="fade-up" data-aos-delay="200">
            <div class="icon-box icon-box-green hvr-shrink" style="background-color: #9e1b14;; color:white;">
              <div class="icon"><i class='bx bx-calculator'></i></div>
              <h4 class="title"><a href="data_bank.php" style="color:white;">Data Repository</a></h4>
              <p class="description">The center distributes different assistance to further develop the capability and trust of clients.</p>
            </div>
          </div>
          </div>
            <hr style="width: 50%;">

        </center>
       
          </div>
</div>
    </section>
       <?php include("Includes/user_header_nav.php"); ?> 
    <section id="dataset" class="dataset" data-aos="fade-up" style="background-color:#9e1b14; color:white; border-radius: 10px; margin: 10px;">
      <div class="container">
        <div class="row">
          <h1 style="text-align:center;"> Data Repository </h1>
        <div class="row">
            <style>
    .centered-text {
        text-align: center;
    }
    
    </style>

    <div class="centered-text">
    <p>This section provides datasets that are available to be inquired by users which can be
          provided and downloaded when needed so. This opens a harmonious relationship with 
          not only the SERDAC community itself but as well as the people utilizing the site.</p>
    </div>

          </div>
            </div>
            </div>
            <style>
              ul {
    list-style: none;
    padding-left: 10px;
    margin-top: 10px;
    text-align: left;
            }
    li {
  margin-top: 5px;
      }
            </style>
<div class="container" style="margin-top: 5%;">
  <div class="row">
  <?php
$count = 0;
// $email = $_SESSION['email'];
$sql = "SELECT * from dataset";
$stmt = $ConnectingDB->query($sql);
$i = 1;
while ($DataRows = $stmt->fetch()) {
    $id = $DataRows["id"];
    $dataset_title = $DataRows["dataset_title"];
    $datetime = $DataRows["datetime"];
    // $email = $DataRows["email"];
    $abstract = $DataRows["abstract"];
    $author = $DataRows["author"];
    $file_name = $DataRows["file_name"];
    $file_loc = $DataRows["file_loc"];
    // $requestStatus = $DataRows["status"];
    $count = $count + 1;
    ?>
    <!-- Rest of your code -->
    <!-- HTML or output for each dataset row -->


    <div class="container" style="margin-top: 5%;">
  <div class="row">
    <?php
    $count = 0;
    $sql = "SELECT * FROM dataset";
    $stmt = $ConnectingDB->query($sql);
    while ($DataRows = $stmt->fetch()) {
        $id = $DataRows["id"];
        $dataset_title = $DataRows["dataset_title"];
        $datetime = $DataRows["datetime"];
        $abstract = $DataRows["abstract"];
        $author = $DataRows["author"];
        $file_name = $DataRows["file_name"];
        $file_loc = $DataRows["file_loc"];
        $count = $count + 1;

        $email = $_SESSION['email']; // Retrieve the email value from the session
        $requestStatus = ''; // Default value for $requestStatus
        $locked = true; // Default value is true (locked)

        // Retrieve request status from the requests table
        $requestQuery = "SELECT status FROM requests WHERE dataset_id = :datasetId AND email = :email";
        $requestStmt = $ConnectingDB->prepare($requestQuery);
        $requestStmt->bindValue(':datasetId', $id);
        $requestStmt->bindValue(':email', $email);
        $requestStmt->execute();
        $requestRow = $requestStmt->fetch();

        if ($requestRow) {
            $requestStatus = $requestRow['status'];
        }

        if ($requestStatus == 'approved') {
            $locked = false; // Set locked to false if the status is approved
        } else if ($requestStatus == 'pending' || $requestStatus == 'rejected') {
            $locked = true; // Set locked to true if the status is pending or rejected
        }
    ?>
      <div class="col-sm-6">
        <div class="card hvr-shrink" style="margin-top: 10px; color:black;">
          <p style="margin-top: 10px; margin-left: 10px;"><?php echo $datetime; ?></p>
          <img src="./assets/img/serdac-banner.png" class="card-img-top" alt="..." style = "height: 20%; width 100%;">
          <div class="card-body">
            <h5 class="card-title"><?php echo $id ?></h5>
            <p class="card-text"><?php echo $dataset_title ?></p>
           <p>
               <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
        
          <?php if ($locked): ?>
            <span class="lock-icon"><i class="fas fa-lock"></i></span>
            <a href="#" data-toggle="modal" data-target="#datasetmodal<?php echo $id ?>"><?php echo $file_name ?></a>
          <?php else: ?>
            <a href="admin-1/pages/contents/upload/<?php echo $file_name ?>" download><?php echo $file_name ?></a>
          <?php endif; ?>
        </p>

            <p><?php echo $abstract ?></p>
            <p>Author: <?php echo $author ?></p>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#datasetmodal<?php echo $id ?>">
              Request
            </button>
//     <script>
//     function scrollToModal(id) {
//       var modal = document.getElementById('datasetmodal' + id);
//       modal.scrollIntoView({ behavior: 'smooth' });
//     }
//   </script>
  
          </div>
        </div>
      </div>
    <?php } } ?>
  </div>
</div>
<style>.card-container {
  height: 400px; 
}
</style>


<!-- Modal -->
<?php
$count = 0;
global $ConnectingDB;
$sql = "SELECT * FROM dataset";
$stmt = $ConnectingDB->query($sql);
while($DataRows = $stmt->fetch()) {
  $dataset_title = $DataRows["dataset_title"];
  $id = $DataRows["id"];
  $file_name = $DataRows["file_name"];
  $author = $DataRows["author"];


?>

<div class="modal fade" id="datasetmodal<?php echo $id ?>" tabindex="-1" role="dialog" aria-labelledby="datasetmodal<?php echo $id ?>" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="datasetmodal<?php echo $id ?>">Request Dataset</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

          <form class="row g-3" method="POST" action="inquire_dataset.php">
          <!--<input type="text" name="dataset_id" class="form-control" id="dataset_id" placeholder="Insert first name here" value=<?php echo $id ?>>-->
    
              <input type="hidden" name="dataset_id" class="form-control" id="dataset_id" value=<?php echo $id ?>>
          
            <div class="col-md-6">
              <label for="firstname" class="form-label">First Name</label>
              <input type="text" name="firstname" class="form-control" id="firstname" placeholder="Insert first name here"value="<?php echo $_SESSION['firstname']; ?>" readonly>
            </div>
            <div class="col-md-6">
              <label for="lastname" class="form-label">Last Name</label>
              <input type="text" name="lastname" class="form-control" id="lastname" placeholder="Insert last name here" value="<?php echo $_SESSION['lastname']; ?>" readonly>
            </div>
            <div class="col-md-6">
              <label for="Occupation" class="form-label">Occupation</label>
              <input type="text" name="Occupation" class="form-control" id="Occupation" placeholder="Occupation" required>
            </div>
            <div class="col-md-6">
              <label for="affiliation" class="form-label">Affiliation</label>
              <input type="text" name="affiliation" class="form-control" id="affiliation" placeholder="affiliation" required>
            </div>
            <div class="col-md-6">
              <label for="nameDataset" class="form-label">Dataset Title</label>
              <input type="text" name="nameDataset" class="form-control" id="nameDataset" placeholder="Insert first name here" value=<?php echo $dataset_title ?> readonly>
            </div>
            <div class="col-md-6">
              <label for="atuhor" class="form-label">Full Name Of Author</label>
              <input type="atuhor" name="author" class="form-control" id="author" placeholder="Name of Author" value=<?php echo $author ?> readonly>
            </div>
            <div class="form-group">
            <label for="file_name" class="form-label">Name of the file</label>
            <input type="text" name="file_name" class="form-control" id="file_name" readonly value="<?php echo $file_name ?>">
           </div>
              
            <div class="form-group">
            <label for="email" class="form-label">Email Address</label>
              <input type="email" name="email" class="form-control" id="email" placeholder="Insert email here" value="<?php echo $_SESSION['email']; ?>" required>
            </div>
            <br>  <br>  <br> <br> 
            <div class="form-group">
                <textarea class="form-control" name="purpose" id="purpose" rows="6" placeholder="Purpose of use" required></textarea>
              </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" name="submit">Request File</button>
            </div>
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
  </div>
</div>

<?php } ?>
  
<style>
.lock-icon {
  margin-right: 5px;
}

  .form-label{
    color: white;
  }
  .modal-content {
    color: black;
    background: maroon;
  }
  .modal-title {
    color: white;
  }

</style>


  <hr>

  
  </main>
  

  
  
  <?php include("Includes/footer.php"); ?>
  
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

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
.modal-backdrop {
    background-color: transparent;
    z-index: 1040 !important;
    display: none !important;
}

.modal {
  z-index: 0 !important;
  
}
.modal {
  overflow-y: auto;
}

.modal-backdrop {
  background-color: rgba(0, 0, 0, 0.5) !important;
}

</style>

