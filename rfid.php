<html>

<body>

    <?php

$dbname = 'ytoovumw_bscs3a';
$dbuser = 'ytoovumw_bscs3a';  
$dbpass = 'kaAGi]gz8H2*'; 
$dbhost = 'localhost'; 

$connect = @mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

if(!$connect){
	echo "Error: " . mysqli_connect_error();
	exit();
}

echo "Connection Success yey!<br><br>";

$rfid_number = $_GET["rfid_number"];

$query = "INSERT INTO hrs_tblrfid (rfid_number) VALUES ('$rfid_number')";
mysqli_query($connect,$query);

echo "Insertion Success!<br>";

?>
</body>

</html>