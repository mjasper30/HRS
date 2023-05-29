<?php
// Create 4 variables to store these information

//local
// $server="localhost";
// $username="root";
// $password="";
// $database = "hrs_local";

//online
$server = "localhost";
$username = "ytoovumw_bscs3a";
$password = "kaAGi]gz8H2*";
$database = "ytoovumw_bscs3a";

// Create connection
$conn = new mysqli($server, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>