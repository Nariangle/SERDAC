<?php
if(isset($_POST['submit'])) {

    // Get the form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];
    
    // Check if email is either gmail or yahoo
    if (!preg_match('/@(gmail|yahoo)\.com$/', $email)) {
      $msg = "<div class='alert alert-danger'>Error: Invalid email address. Please enter a Gmail or Yahoo email address.</div>";
    } else {
  
      // Connect to the database
      $servername = "localhost";
      $username = "u946870446_serdac";
      $password = "WmsuSerdac123";
      $dbname = "u946870446_cms";
  
      $conn = new mysqli($servername, $username, $password, $dbname);
  
      // Check for connection errors
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
  
      // Insert the form data into the database
      $sql = "INSERT INTO contact (name, email, subject, message, phone) VALUES ('$name', '$email', '$subject', '$message', '$phone')";
  
      if ($conn->query($sql) === TRUE) {
        $msg = "<div class='alert alert-success'>Message sent towards WMSU-SATELLITE SERDAC. Thank you for your time.</div>";
        echo"<script>
        window.location.href = 'index.php#contact';
      </script>";
      } else {
        $msg = "<div class='alert alert-danger'>An error has occurred. Please try again!</div>";
        echo"<script>
        window.location.href = 'index.php';
      </script>";
      }
    }
    $class1 = '"preview-icon bg-success"';
    $class2 = '"ti-quote-left mx-0"';
    $code_msg = 
    "<div class=$class1> 
    <i class=$class2> 
    </i> 
    </div>";

    $code_msg = mysqli_real_escape_string($conn, $code_msg);

    $message = "User inquiry!";
    $msg_disp = "A user has sent an inquiry!";
    $Now = new DateTime('now', new DateTimeZone('Asia/Taipei'));
    $Now = $Now->format('Y-m-d H:i:s');
    $sql = "INSERT INTO notifications(type, code, title, message, datetime) VALUES ('user_registration','{$code_msg}', '{$message}',
  '{$msg_disp}', '{$Now}' )";
    $result = mysqli_query($conn, $sql);
  }
  
?>