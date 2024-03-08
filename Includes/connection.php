<?php

$dbhost = "localhost";
$dbuser = "u946870446_serdac";
$dbpass = "WmsuSerdac123";
$dbname = "u946870446_cms";

if (!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
(
    die("failed to coonect!")
)
?>