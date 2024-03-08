<?php include("../../../Includes/DB.php"); ?> 
<?php require_once("../../../Includes/Functions.php"); ?>
<?php require_once("../../../Includes/Sessions.php"); ?>
<?php 
Confirm_Login() ?>
<?php 
    global $ConnectingDB;
    date_default_timezone_set('Asia/Manila');
    $CurrentTime=new DateTime();
    $DateTime = $CurrentTime->format('F-d-Y H:i:s');
    if(isset($_POST['submit'])) {

        $title                  = $_POST['training_title'];
        $description            = $_POST['content'];
        $start_time             = $_POST['TimeStart'];
        $end_time               = $_POST['TimeEnd'];
        $date                   = $_POST['date'];
        $dateEnd                   = $_POST['dateEnd'];
        $venue                  = $_POST['venue'];
        $is_shown               = isset($_POST['is_shown']) ? 1 : 0;
        $max_participants       = $_POST['maxParticipants'];
        $trainer                =   $_POST['trainer'];
        $Image                  = $_FILES['img']['name'];

        $source_file = $_FILES['img']['tmp_name'];
        $dest_file = "../../../Uploads/".$_FILES['img']['name'];
        
		if (file_exists($dest_file)) {

			print "The file name already exists!!";
		}
		else {

		move_uploaded_file( $source_file, $dest_file )

		or die ("Error!!");
    }
 
    $Admin = $_SESSION["AdminName"];
    date_default_timezone_set('Asia/Manila');
    $CurrentTime=new DateTime();
    $DateTime = $CurrentTime->format('F-d-Y H:i:s');
    $datetime = $DateTime;

    if (empty($title) || empty($description) || empty($start_time) || empty($end_time) || empty($date) || empty($dateEnd) || empty($venue) || empty($max_participants)) {
      echo "Please fill in all fields";
    } else {
      // Insert the new training into the database
      $stmt = $ConnectingDB->prepare("INSERT INTO trainings (trainer_id, title, description, start_time, end_time, venue, is_shown, trainingImg, training_date, training_dateEnd) VALUES (:trainer_id, :title, :description, :start_time, :end_time, :venue, :is_shown, :img, :date, :dateEnd)");
      $stmt->bindValue(':trainer_id', $trainer); // Replace $admin_id with the ID of the admin who is adding the training
      $stmt->bindValue(':title', $title);
      $stmt->bindValue(':description', $description);
      $stmt->bindValue(':start_time', $start_time);
      $stmt->bindValue(':end_time', $end_time);
      $stmt->bindValue(':venue', $venue);
      $stmt->bindValue(':is_shown', $is_shown);
      $stmt->bindValue(':img', $Image);
      $stmt->bindValue(':date', $date);
      $stmt->bindValue(':dateEnd', $dateEnd);
      $stmt->execute();

      $training_id = $ConnectingDB->lastInsertId(); // Get the ID of the newly inserted training

      // Insert the training details into the database
      $stmt = $ConnectingDB->prepare("INSERT INTO training_details (training_id, max_participants, num_participants) VALUES (:training_id, :max_participants, 0)");
      $stmt->bindValue(':training_id', $training_id);
      $stmt->bindValue(':max_participants', $max_participants);
      // $stmt->execute();

      $Execute  = $stmt->execute();

        if($Execute) {
          $_SESSION["SuccessMessage"]="New training post with the name of ".$title." added Successfully";
          Redirect_to("manage_trainings.php");
      } else {
          $_SESSION["ErrorMessage"]= $stmt->errorInfo();
          Redirect_to("add_trainings.php");
      }
    }

  }

  ?>

<!-- if($Execute) {
            $_SESSION["SuccessMessage"]="New training post with the name of ".$title." added Successfully";
            Redirect_to("manage_trainings.php");
        } else {
            $_SESSION["ErrorMessage"]= $stmt->errorInfo();
            Redirect_to("add_trainings.php");
        } -->

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
                  <h4 class="card-title">Add new Training!</h4>
                  <p class="card-description">
                    Fill out the form below to add a <code>training</code>!
                  </p>
                  <form class="forms-sample" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="training_title">Training Title <span style="color:red"> * </span> </label>
                      <input type="text" name="training_title" class="form-control" id="training_title" placeholder="Training Title" required>
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
                          while($DataRows = $stmt->fetch()) {
                              $trainer_id = $DataRows["id"];
                              $trainer_name = $DataRows["trainer_name"];
                        ?>
                              <option value="<?php echo $trainer_id ?>"><?php echo $trainer_name ?></option>
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
                          <input type="date" id="dateEnd" name="dateEnd" class="form-control" value="<?php echo $date2update ?>" required>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <label for="maxParticipants" class="form-label">Max Participants</label>
                      <input type="number" id="maxParticipants" name="maxParticipants" class="form-control" required>
                    </div>
                      <div class="form-group">
                      <label>Image upload <span style="color:red"> * </span> </label>
                      <input type="file" name="img" id="img" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" name="img" id="img" type="button">Upload</button>
                        </span>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="venue">Venue for Training<span style="color:red"> * </span> </label>
                      <textarea name="venue" class="form-control" id="venue" placeholder="Content" required> </textarea>
                    </div>
                     <div class="form-group">
                      <label for="content">Description<span style="color:red"> * </span> </label>
                      <textarea name="content" class="form-control" id="content" placeholder="Content" required> </textarea>
                    </div>   
                    <button type="submit" name="submit" class="btn btn-success mr-2">Submit</button>
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
</body>

</html>
