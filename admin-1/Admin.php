<?php include("../Includes/DB.php"); ?> 
<?php require_once("../Includes/Functions.php"); ?>
<?php require_once("../Includes/Sessions.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="../assets/css/adminlogin.css">
    <script src="../assets/js/sweetalert.min.js"></script>
</head>
<body style="background-image: url(../assets/img/adminbg.png); background-size: 100%">
  <div class="container">
      <div class="logo">
      <form class="login-form" action="Admin.php" method="post">
      <h5  class="text-light alert-light" style="text-align:center; font-size: 25px;padding-bottom: 0px; margin: 10px">
      <a href="../login.php">  <img src="../assets/img/serdac.ico"  alt="" width="150" height="150" class="d-inline-block align-text-top">
    </a>

    
          <br>
        <span id="zk-trigger"><span class="hide">ADMIN LOGIN</span>
        </h5>
        <div class="form-group">
        <div class="input-box underline">
          <input type="text" id="Username" name="Username" placeholder="Enter Username" required>
          <div class="underline"></div>
        </div>
        <div class="input-box">
          <input type="password" id="Password" name="Password" placeholder="Enter Your Password" required>
          <div class="underline"></div>
        </div>
        <div class="input-box button">
          <input type="submit" name="Submit" value="Submit">
        </div>
        </form>
    </div>
    <div class="">
        <p style="text-align:center; font-size: 13px;">
        <a href="../index.php"> GO BACK </a> </p>
      </div>
  </body>
</html>
<?php 
if (isset($_SESSION["UserId"])) {
    Redirect_to("index.php");
}

    if (isset($_POST["Submit"])) {
        $Username = $_POST["Username"];
        $Password = $_POST["Password"];
        if(empty($Username)||empty($Password)) {
            $_SESSION["ErrorMessage"]="All fields must be filled out";
            Redirect_to("Admin.php");

        } else {
            //code to check username and password from Database
            $Found_Account = Login_Attempt($Username, $Password);
                if($Found_Account) {
                    $_SESSION["UserId"] = $Found_Account["id"];
                    $_SESSION["UserName"] = $Found_Account["username"];
                    $_SESSION["AdminName"] = $Found_Account["name"];
                    
                    if (isset($_SESSION["TrackingURL"])) {
                        Redirect_to($_SESSION["TrackingURL"]);
                    } else {
                        Redirect_to("index.php");
                    }
                    
                } else {
                    echo '<script type="text/javascript">';
                    echo 'swal("Error!", "Username or password incorrect", "error").then(function() { window.location = "Admin.php"; });';
                    echo '</script>';                  
                }
        }
    }
?>

<style>
        /* Responsive styles for mobile devices */
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