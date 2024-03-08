<?php
session_start();
    include("Includes/connection.php");
    include("Includes/Functions.php");

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;
  //Load Composer's autoloader
  ?> <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="assets/js/sweetalert.min.js"></script>
    <title>SignUp</title>
    <link rel="stylesheet" href="assets/css/adminlogin.css">
    
</head>
<body style="background-image: url(assets/img/adminbg.png);">
    <div class="container">
        <div class="logo">
            <form class="login-form" action="signup.php" method="post">
                <h5 class="text-light alert-light" style="text-align:center;">
                    <img src="assets/img/serdac.ico" alt="" width="150" height="150" class="d-inline-block align-text-top"><br>
                    <span id="zk-trigger"><span style="font-size: 28px; font-weight: bold;">SIGN UP</span></span>
                    <?php $msg; ?>
                </h5>
                <div class="form-group">
                    <div class="input-box">
                      <input type="text" name="firstname" placeholder="Enter firstname" required />
                      <div class="underline"></div>
                    </div> 
                    <div class="input-box">
                      <input type="text" name="MI" placeholder="Enter Middle Initial" required />
                      <div class="underline"></div>
                    </div>
                    <div class="input-box">
                      <input type="text" name="lastname" placeholder="Enter lastname" required />
                      <div class="underline"></div>
                    </div>
                    <div class="input-box">
                        <input type="email" name="email" placeholder="Email" required>
                        <div class="underline"></div>
                    </div>
                    <div class="input-box">
                        <input type="password" name="password" placeholder="Enter Your Password" required>
                        <div class="underline"></div>
                    </div>
                    <div class="input-box">
                        <input type="password" name="cpassword" placeholder="Confirm Password" required>
                        <div class="underline"></div>
                    </div>
                    <div class="input-box button">
                        <input type="submit" name="submit" value="Submit">
                    </div>
                    <div>
                        <a href="login.php">Back to Login</a>
                    </div>
                </div>
            </form>
            
  <style>
.container {
  width: 100%;
  max-width: 500px;
  margin: 10px auto;
  padding: 10px;
  box-sizing: border-box;
}

.
/* eto for mobile devices */
@media only screen and (max-width: 600px) {
  .container {
    margin: 0 auto;
    padding: 10px;
  }

  .container .logo img {
    width: 120px;
    height: 120px;
  }

  .container form .title {
    font-size: 24px;
  }

  .container form .input-box input,
  .container form .input-box button[type="submit"] {
    font-size: 14px;
    margin-bottom: 8px;
  }

  .container form .input-box .links a {
    font-size: 12px;
  }
}

/* di ko sure pero nag set up to for laptops */
@media only screen and (min-width: 501px) and (max-width: 1024px) {
  .container {
    max-width: 500px;
    padding: 20px;
  }

  .container .logo img {
    width: 100px;
    height: 100px;
  }

  .container form .title {
    font-size: 24px;
  }

  .container form .input-box input,
  .container form .input-box button[type="submit"] {
    font-size: 16px;
    margin-bottom: 12px;
  }

  .container form .input-box .links a {
    font-size: 12px;
  }
}

/* larger screens */
@media only screen and (min-width: 995px) {
  .container {
    max-width: 580px;
    padding: 40px;
    padding-top: 10px;
    padding-bottom: 20px;
  }

  .container .logo img {
    width: 150px;
    height: 150px;
  }

  .container form .title {
    font-size: 28px;
  }

  .container form .input-box input,
  .container form .input-box button[type="submit"] {
    font-size: 18px;
    margin-bottom: 14px;
  }

  .container form .input-box .links a {
    font-size: 14px;
  }
}


  </style>
        </div>
    </div>
</body>
</html>


<?php
require 'vendor/autoload.php';
  $msg = "";
  if (isset($_POST['submit'])) {
    $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
    $MI = mysqli_real_escape_string($con, $_POST['MI']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
    $code = mysqli_real_escape_string($con, md5(rand()));
  
    if (mysqli_num_rows(mysqli_query($con, "SELECT * FROM users WHERE email='{$email}'")) > 0) {
        echo "</div>";
          echo '<script type="text/javascript">';
          echo 'swal("error!", "Email address is already in use!", "error").then(function() { window.location = "signup.php"; });';
          echo '</script>';
    } else {
      if ($password === $cpassword) {
         $sql = "INSERT INTO users (firstname, lastname, MI, email, password, code, status) VALUES  ('{$firstname}', '{$lastname}', '{$MI}',  '{$email}', '{$password}', '{$code}' ,'active')";
        echo"</i>
        </div>";

        $class1 = '"preview-icon bg-success"';
        $class2 = '"ti-info-alt mx-0"';
        $code_msg = 
        "<div class=$class1> 
        <i class=$class2> 
        </i> 
        </div>";

        $code_msg = mysqli_real_escape_string($con, $code_msg);

        $msg = "User registration!";
        $msg_disp = "A user has succesfully registered!";
        $Now = new DateTime('now', new DateTimeZone('Asia/Taipei'));
        $Now = $Now->format('Y-m-d H:i:s');
         $sql = "INSERT INTO users (firstname, lastname, MI, email, password, code, status) VALUES  ('{$firstname}', '{$lastname}', '{$MI}',  '{$email}', '{$password}', '{$code}' ,'active')";
       $result = mysqli_query($con, $sql);

        if ($result) {
          // success message
        } else {
          // error message
        }

        
  
        if ($result) {
           echo "<div style='display: none;'>";
          //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'wushyyme@gmail.com';                   //SMTP username
            $mail->Password   = 'noelajugepwrrpyi';                     //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            //Recipients
            $mail->setFrom('wushyyme@gmail.com');
            $mail->addAddress($email);
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'WMSU-SERDAC Account Verification';
            $mail->Body = 'Greetings! Welcome to WMSU-SERDAC! In order to access your account, please verify your account.<br><br>'
            . '<a href="http://wmsuserdac.online/login.php?verification='.$code.'" style="display: inline-block; padding: 10px 20px; background-color: #4CAF50; color: #FFFFFF; text-decoration: none; border-radius: 5px;">Verify Account</a>';
            $mail->send();

            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        echo "</div>";
        echo '<script type="text/javascript">';
        echo 'swal("success!", "We have sent a verification to your email", "success").then(function() { window.location = "signup.php"; });';
        echo '</script>';
        } else{
          echo "</div>";
          echo '<script type="text/javascript">';
          echo 'swal("error!", "Error occured!", "error").then(function() { window.location = "signup.php"; });';
          echo '</script>';
        }
      } else {
        echo "</div>";
          echo '<script type="text/javascript">';
          echo 'swal("error!", "Password did not match!", "error").then(function() { window.location = "signup.php"; });';
          echo '</script>';
     
         }  
        }
      }
  ?>
  
  
  