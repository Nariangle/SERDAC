<?php
session_start();
echo "sessions:" . "<br>";
foreach ($_SESSION as $key => $value) {
  echo "$key = $value <br>";
}
?>

