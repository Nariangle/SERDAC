<?php include("../../../Includes/DB.php"); ?> 
<?php require_once("../../../Includes/Functions.php"); ?>
<?php require_once("../../../Includes/Sessions.php"); ?>
<?php 
Confirm_Login() ?>
<?php

date_default_timezone_set('Asia/Manila');
$CurrentTime = new DateTime();
$DateTime = $CurrentTime->format('F-d-Y H:i:s');
global $ConnectingDB;

if (isset($_GET['id'])) {
  $training_id = $_GET['id'];

  if (isset($_POST['submit'])) {
      $title = $_POST['training_title'];
      $description = $_POST['content'];
      $start_time = $_POST['TimeStart'];
      $end_time = $_POST['TimeEnd'];
      $date = $_POST['date'];
      $dateEnd = $_POST['dateEnd'];
      $venue = $_POST['venue'];
      $is_shown = isset($_POST['is_shown'][0]) ? $_POST['is_shown'][0] : 0;
      $max_participants = $_POST['maxParticipants'];
      $trainer = $_POST['trainer'];
      $Image = $_FILES['img']['name'];

      $Admin = $_SESSION["AdminName"];
      date_default_timezone_set('Asia/Manila');
      $CurrentTime = new DateTime();
      $DateTime = $CurrentTime->format('F-d-Y H:i:s');
      $datetime = $DateTime;

      if (empty($title) || empty($description) || empty($start_time) || empty($end_time) || empty($date) || empty($dateEnd) || empty($venue) || empty($max_participants)) {
          echo "Please fill in all fields";
      } else {
          // Check if the file is not empty
          if (!empty($_FILES['img']['name'])) {
            // Upload the new image
            $imageName = $_FILES['img']['name'];
            $newImagePath = "../../../Uploads/" . $imageName;

            if (move_uploaded_file($_FILES['img']['tmp_name'], $newImagePath)) {
                // Prepare the query
                $stmt = $ConnectingDB->prepare("UPDATE trainings SET trainingImg = :newImagePath WHERE training_id = :training_id");

                // Bind the parameters
                $stmt->bindValue(':newImagePath', $imageName);
                $stmt->bindValue(':training_id', $training_id);

                // Execute the query
                if ($stmt->execute()) {
                    // Update the training details in the database
                    $stmt = $ConnectingDB->prepare("UPDATE training_details SET max_participants = :max_participants WHERE training_id = :training_id");
                    $stmt->bindValue(':max_participants', $max_participants);
                    $stmt->bindValue(':training_id', $training_id);

                    // Check for errors
                    if ($stmt->execute()) {
                        $_SESSION["SuccessMessage"] = "Training with ID " . $training_id . " updated successfully";
                        header("Location: manage_trainings.php");
                        exit;
                    } else {
                        $errorInfo = $stmt->errorInfo();
                        echo "Error: " . $errorInfo[2];
                    }
                } else {
                    $errorInfo = $stmt->errorInfo();
                    echo "Error: " . $errorInfo[2];
                }
            } else {
                echo "Error uploading the image.";
            }

          } else {
              // Update the training without mentioning the image column
              $stmt = $ConnectingDB->prepare("UPDATE trainings SET trainer_id = :trainer_id, title = :title, description = :description, start_time = :start_time, end_time = :end_time, venue = :venue, is_shown = :is_shown, training_date = :date, training_dateEnd = :dateEnd WHERE training_id = :training_id");

              // Bind the parameters
              $stmt->bindValue(':trainer_id', $trainer);
              $stmt->bindValue(':title', $title);
              $stmt->bindValue(':description', $description);
              $stmt->bindValue(':start_time', $start_time);
              $stmt->bindValue(':end_time', $end_time);
              $stmt->bindValue(':venue', $venue);
              $stmt->bindValue(':is_shown', $is_shown);
              $stmt->bindValue(':date', $date);
              $stmt->bindValue(':dateEnd', $dateEnd);
              $stmt->bindValue(':training_id', $training_id);

              // Execute the query
              if ($stmt->execute()) {
                  // Update the training details in the database
                  $stmt = $ConnectingDB->prepare("UPDATE training_details SET max_participants = :max_participants WHERE training_id = :training_id");
                  $stmt->bindValue(':max_participants', $max_participants);
                  $stmt->bindValue(':training_id', $training_id);

                  // Check for errors
                  if ($stmt->execute()) {
                      $_SESSION["SuccessMessage"] = "Training with ID " . $training_id . " updated successfully";
                      header("Location: manage_trainings.php");
                      exit;
                  } else {
                      $errorInfo = $stmt->errorInfo();
                      echo "Error: " . $errorInfo[2];
                  }
              } else {
                  $errorInfo = $stmt->errorInfo();
                  echo "Error: " . $errorInfo[2];
              }
          }
      }
  }
}

?>


<!DOCTYPE html>
<html lang="en">
<?php include("header.php")?>
      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                  <?php 
                          echo ErrorMessage(); #call errormessage
                          echo SuccessMessage();

                          $id = $_GET["id"];
                          $sql = "SELECT trainings.training_id, trainings.title, trainers.trainer_name, trainings.description, trainings.start_time, trainings.end_time, trainings.training_date, trainings.training_dateEnd, trainings.venue, trainings.trainingImg, training_details.num_participants, training_details.max_participants
                                  FROM trainings
                                  INNER JOIN trainers ON trainings.trainer_id = trainers.id
                                  INNER JOIN training_details ON trainings.training_id = training_details.training_id
                                  WHERE trainings.training_id = :id"; // Add this condition to filter by the specific training_id
                          $stmt = $ConnectingDB->prepare($sql);
                          $stmt->bindValue(':id', $id);
                          $stmt->execute();
                          
                          if ($DataRows = $stmt->fetch()) {
                              $title2update = $DataRows["title"];
                              $desc2update = $DataRows["description"];
                              $trainer2update = $DataRows["trainer_name"];
                              $startTime2update = $DataRows["start_time"];
                              $endTime2update = $DataRows["end_time"];
                              $maxParticipants2update = $DataRows["max_participants"];
                              $currentParticipants = $DataRows["num_participants"];
                              $date2update = $DataRows['training_date'];
                              $dateEnd2update = $DataRows['training_dateEnd'];
                              $image2update = $DataRows['trainingImg'];
                              $venue2update = $DataRows['venue'];
                          }
                          

                      ?>
                    <h4 class="card-title"> <h3 class="font-weight-bold">Welcome <?php echo $_SESSION["AdminName"]; ?>!</h3></h4>
                    <p class="card-description">
                      <h6 class="font-weight-normal mb-0">All systems are running smoothly!</h6>
                    </p>
              </div>
                </div>
               </div>
            <div class="col-12 grid-margin stretch-card">
                
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Edit Training!</h4>
                  <p class="card-description">
                    Fill out the form below to edit a <code>training</code>!
                  </p>
                  <form class="forms-sample" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="training_title">Training Title <span style="color:red"> * </span> </label>
                      <input type="text" name="training_title" class="form-control" id="training_title" placeholder="Training Title" value="<?php echo $title2update; ?>" required>
                    </div>
                    <div class="col-md-3">
                        <label for="trainer" class="form-label">Trainer</label><br>
                        <select class="form-select" id="trainer" name="trainer" aria-label="Default select example">
                          <option selected>Select a Trainer</option>
                          <?php
                          $count = 0;
                          global $ConnectingDB;
                          $sql = "SELECT * FROM trainers";
                          $stmt = $ConnectingDB->query($sql);
                          while ($DataRows = $stmt->fetch()) {
                              $trainer_id = $DataRows["id"];
                              $trainer = $DataRows["trainer_name"];
                              
                              // Check if the current trainer matches the desired value
                              $isSelected = ($trainer === $trainer2update) ? "selected" : "";
                          ?>
                              <option value="<?php echo $trainer_id ?>" <?php echo $isSelected ?>><?php echo $trainer ?></option>
                          <?php
                          }
                          ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Show/Hide Trainings<span style="color:red">*</span></label><br>
                      <div class="row">
                        <div class="col-auto">
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="is_shown[]" id="shown" value="1" <?php if (isset($is_shown) && $is_shown == 1) echo 'checked'; ?>>
                            <label class="form-check-label" for="shown">Show</label>
                          </div>
                        </div>
                        <div class="col-auto">
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="is_shown[]" id="hidden" value="0" <?php if (isset($is_shown) && $is_shown == 0) echo 'checked'; ?>>
                            <label class="form-check-label" for="hidden">Hide</label>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="TimeStart" class="form-label">Time Start</label>
                          <select class="form-select" name="TimeStart" id="TimeStart" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            <?php
                            $timeOptions = array(
                              "07:00 AM",
                              "08:00 AM",
                              "09:00 AM",
                              "10:00 AM",
                              "11:00 AM",
                              "12:00 PM",
                              "01:00 PM",
                              "02:00 PM",
                              "03:00 PM",
                              "04:00 PM"
                            );

                            foreach ($timeOptions as $timeOption) {
                              $isSelected = ($timeOption === $startTime2update) ? "selected" : "";
                              ?>
                              <option value="<?php echo $timeOption ?>" <?php echo $isSelected ?>><?php echo $timeOption ?></option>
                            <?php
                            }
                            ?>
                          </select>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="TimeEnd" class="form-label">Time End</label>
                          <select class="form-select" name="TimeEnd" id="TimeEnd" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            <?php
                            $timeOptions2 = array(
                              "07:00 AM",
                              "08:00 AM",
                              "09:00 AM",
                              "10:00 AM",
                              "11:00 AM",
                              "12:00 PM",
                              "01:00 PM",
                              "02:00 PM",
                              "03:00 PM",
                              "04:00 PM"
                            );

                            foreach ($timeOptions2 as $timeOption2) {
                              $isSelected = ($timeOption2 === $endTime2update) ? "selected" : "";
                              ?>
                              <option value="<?php echo $timeOption2 ?>" <?php echo $isSelected ?>><?php echo $timeOption2 ?></option>
                            <?php
                            }
                            ?>
                          </select>
                        </div>
                      </div>
                    </div>

                    <br>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="date" class="form-label">Date Start</label>
                          <input type="date" id="date" name="date" class="form-control" value="<?php echo $date2update ?>" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="dateEnd" class="form-label">Date End</label>
                          <input type="date" id="dateEnd" name="dateEnd" class="form-control" value="<?php echo $dateEnd2update ?>" required>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <label for="maxParticipants" class="form-label">Max Participants</label>
                      <input type="number" id="maxParticipants" name="maxParticipants" class="form-control" value="<?php echo $maxParticipants2update ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Image upload <span style="color:red">*</span></label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="img" id="img" class="custom-file-input">
                                <label class="custom-file-label" for="img">Choose file</label>
                            </div>
                            <div class="input-group-append">
                                <button class="btn btn-primary" name="upload" type="button">Upload</button>
                            </div>
                        </div>
                        <?php
                        $imagePath = '../../../Uploads/' . $image2update; // Path to the image file
                        if (file_exists($imagePath)) {
                            echo '<div class="mt-3">';
                            echo '<br>';
                            echo '<img src="' . $imagePath . '" alt="' . $image2update . '" class="img-thumbnail">';
                            echo '<br>';
                            echo '<span class="text-muted">' . $image2update . '</span>';
                            echo '</div>';
                        } else {
                            echo '<div class="mt-3">Image not found</div>';
                        }
                        ?>
                    </div>


                    <div class="form-group">
                        <label for="venue">Venue for Training<span style="color:red"> * </span> </label>
                        <textarea name="venue" class="form-control" id="venue" placeholder="Content" required><?php echo $venue2update; ?></textarea>
                    </div>

                     <div class="form-group">
                      <label for="content">Description<span style="color:red"> * </span> </label>
                      <textarea name="content" class="form-control" id="content" placeholder="Content" required> <?php echo $desc2update; ?> </textarea>
                    </div>   
                    <button type="submit" name="submit" class="btn btn-success mr-2">Update</button>
                    <button class="btn btn-light"><a href="manage_trainings.php"> Cancel </a></button>
                  </form>
                </div>
              </div>
            </div>
            </div>
        </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="../../vendors/typeahead.js/typeahead.bundle.min.js"></script>
  <script src="../../vendors/select2/select2.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/settings.js"></script>
  <script src="../../js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../../js/file-upload.js"></script>
  <script src="../../js/typeahead.js"></script>
  <script src="../../js/select2.js"></script>
  <!-- End custom js for this page-->

  <style>
    .img-thumbnail {
        max-width: 200px;
        max-height: 200px;
    }
</style>

</body>

</html>
