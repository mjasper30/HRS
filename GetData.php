<?php

if (!empty($_POST)) {
  $id = $_POST["ID"];
  
  include('includes/dbconnection.php');
  
  $sql = "SELECT * FROM hrs_tblroomnumber WHERE ID = '$id'";
  $result = mysqli_query($conn, $sql);
  
  if ($result) {
    $data = mysqli_fetch_assoc($result);
    echo $data['RFIDNumber'];
  } else {
    echo "Error executing query: " . mysqli_error($conn);
  }
  
  mysqli_close($conn);
}
?>