<?php
require_once("Includes/Sessions.php");

if(isset($_POST['submit'])) {
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $affiliation = $_POST['affiliation'];
  $email = $_POST['email'];
  $purpose = $_POST['purpose'];
  $nameDataset = $_POST['nameDataset'];
  $dataset_id = $_POST['dataset_id'];
  $file_name = $_POST['file_name'];
  $file_loc = $_POST['file_loc'];
  $author = $_POST['author'];
  $Occupation = $_POST['Occupation'];

    $dbhost = "localhost";
    $dbuser = "u946870446_serdac";
    $dbpass = "WmsuSerdac123";
    $dbname = "u946870446_cms";

  $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

  if(!$conn) {
    die('Database connection error: ' . mysqli_connect_error());
  }

  $query = "INSERT INTO requests (dataset_id, first_name, last_name, affiliation, email, purpose, dataset, author, file_name, Occupation,file_loc, status) 
            VALUES ('$dataset_id', '$firstname', '$lastname', '$affiliation', '$email', '$purpose', '$nameDataset', '$author', '$file_name','$Occupation','$file_loc','pending')";

  $result = mysqli_query($conn, $query);

  if ($result) {
    $_SESSION["SuccessMessage"] = "Your request has been sent successfully.";
    header('Location: data_bank.php');
    exit();
  } else {
    $_SESSION['ErrorMessage'] = "Something went wrong!";
    header('Location: data_bank.php');
    exit();
  }

  mysqli_close($conn);
}
?>
