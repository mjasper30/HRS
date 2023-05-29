<?php
require('includes/dbconnection.php');
$sql="SELECT * from hrs_tbluser";
$result=$conn->query($sql);
$counter=0;
if ($result->num_rows > 0) {
    while($row=$result->fetch_assoc()){
      $subarray = array();
      $ID=$row['ID'];
      $FullName=$row['FullName'];
      $MobileNumber=$row['MobileNumber'];
      $Email=$row['Email'];
      $RegDate=$row['RegDate'];
      $counter++;
      
      $subarray[] = "<td>".$counter."</td>";
      $subarray[] = "<td>".$FullName."</td>";
      $subarray[] = "<td>".$MobileNumber."</td>";
      $subarray[] = "<td>".$Email."</td>";
      $subarray[] = "<td><span class='badge badge-primary'>".$RegDate."</span></td>";

      $data[]=$subarray;
    }
}
else {
    $data[] = array('','','','','','','','','');
}
    $output = array('data'=>$data,);
    echo json_encode($output);
?>