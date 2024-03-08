<html>
    <body>
        <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $contactNumber = $_POST['contactNumber'];
    $address = $_POST['address'];
    $zipcode = $_POST['zipcode'];
    $region = $_POST['region'];
    $TimeStart = $_POST['TimeStart'];
    $TimeEnd = $_POST['TimeEnd'];
    $trainer = $_POST['trainer'];
    $dateAppointment = $_POST['dateAppointment'];
    if (empty($firstName)) {
      echo "Name is empty";
    } else {
      echo $firstName . '<br>';
      echo $lastName . '<br>';
      echo $email . '<br>';
      echo $contactNumber . '<br>';
      echo $address . '<br>';
      echo $zipcode . '<br>';
      echo $region . '<br>';
      echo $TimeStart . '<br>';
      echo $TimeEnd . '<br>';
      echo $trainer . '<br>';
      echo $dateAppointment . '<br>';
    }
}
        ?>
        </body>
        </html>