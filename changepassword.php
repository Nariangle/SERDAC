<?php
session_start();
    include("Includes/connection.php");
    include("Includes/Functions.php");

  ?>
<!DOCTYPE html>
<html lang="en">  
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="assets/js/sweetalert.min.js"></script>
    <title> Chnage password</title>
    <link rel="stylesheet" href="assets/css/adminlogin.css">
</head>
<body style="background-image: url(assets/img/adminbg.png); background-size: 100%">
  <div class="container">
      <div class="logo">
      <form class="login-form" action="" method="post">
      <h5  class="text-light alert-light" style="text-align:center; font-size: 25px;padding-bottom: 0px; 10px; margin: 10px">
      <img src="assets/img/serdac.ico" 
          alt="" width="150" height="150" 
          class="d-inline-block align-text-top">
          <br>
      <span id="zk-trigger"><span>CHANGE PASSWORD</span>
      <?php $msg; ?>
    </h5>
    <div class="form-group"> <!-- pag nasa taas kase need ilagay yung value, pag sa baba wag na-->
        <div class="input-box">
          <input type="password" name="password" placeholder="Enter new Password" required>
          <div class="underline"></div>
        </div>
        <div class="input-box">
          <input type="password" name="cpassword" placeholder="Confirm Password" required>
          <div class="underline"></div>
        </div>
        <div class="input-box button">
          <input type="submit" name="submit" value="Submit">
        </div>
        <div class="">
          <a href="login.php" >Back to Login</a>
      </form>
    </div>
  </body>
</html>
<?php
if (isset($_GET['reset'])) {
  if (mysqli_num_rows(mysqli_query($con, "SELECT * FROM users WHERE code='{$_GET['reset']}'")) > 0) {
      if (isset($_POST['submit'])) {
          $password = mysqli_real_escape_string($con, $_POST['password']);
          $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);

          if ($password === $cpassword) {
              $query = mysqli_query($con, "UPDATE users SET password='{$password}', code='' WHERE code='{$_GET['reset']}'");
              if ($query) {
                echo '<script type="text/javascript">';
                echo 'swal("Success!", "Password has been changed successfully!", "success").then(function() { window.location = "login.php"; });';
                echo '</script>';
            }            
          } else {
            echo "</div>";
            echo '<script type="text/javascript">';
            echo 'swal("error!", "password and email do not matched", "error").then(function() { window.location = "changepassword.php"; });';
            echo '</script>';
          }
      }
  } else {
    echo "</div>";
    echo '<script type="text/javascript">';
    echo 'swal("error!", "error occured!", "error").then(function() { window.location = "changepassword.php"; });';
    echo '</script>';
  }
} else {
 // header("Location: forgotpassword.php");
}
?>

 <style>
        /* Responsive styles para sa mobile devices dunno if gumagna pero goods lang man*/
        @media only screen and (max-width: 600px) {
            body {
                padding: 20px;
            }

            .container {
                width: 100%;
                max-width: 400px;
                margin: 0 auto;
                padding: 20px;
                box-sizing: border-box;
            }

            .container .logo {
                text-align: center;
            }

            .container .logo img {
                width: 120px;
                height: 120px;
            }

            .container form .text-light {
                font-size: 22px;
                margin-bottom: 10px;
            }

            .container form .input-box input {
                font-size: 16px;
            }

            .container form .input-box button[type="submit"] {
                font-size: 16px;
            }

            .container form .input-box .links {
                display: flex;
                justify-content: space-between;
                align-items: center;
                flex-wrap: wrap;
                margin-top: 10px;
            }

            .container form .input-box .links a {
                font-size: 14px;
                text-decoration: none;
                color: #000;
                flex-basis: 50%;
                text-align: center;
            }
        }
    </style>
