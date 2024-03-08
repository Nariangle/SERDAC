<?php
require_once("Includes/DB.php");

if (isset($_GET["datasetTitle"])) {
  $datasetTitle = $_GET["datasetTitle"];
//   var_dump($datasetTitle);
  
  $sql = "SELECT author FROM dataset WHERE dataset_title = :title";
  $stmt = $ConnectingDB->prepare($sql);
  $stmt->bindParam(':title', $datasetTitle);
  $stmt->execute();
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
  echo $row["author"];
}

?>
