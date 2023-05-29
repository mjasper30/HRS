<?php
require('includes/dbconnection.php');
$sql="SELECT * from hrs_tblcontact where IsRead='1'";
$result=$conn->query($sql);
$counter=0;
if ($result->num_rows > 0) {
    while($row=$result->fetch_assoc()){
      $subarray = array();
      $ID=$row['ID'];
      $Name=$row['Name'];
      $Email=$row['Email'];
      $MobileNumber=$row['MobileNumber'];
      $EnquiryDate=$row['EnquiryDate'];
      $counter++;
      
      $subarray[] = "<td>".$counter."</td>";
      $subarray[] = "<td>".$Name."</td>";
      $subarray[] = "<td>".$Email."</td>";
      $subarray[] = "<td>".$MobileNumber."</td>";
      $subarray[] = "<td><span class='badge badge-primary'>".$EnquiryDate."</span></td>";
      $subarray[] = "<td><button class='btn-edit'><a href='view-enquiry.php?viewid=".$ID."'>View Details</a></button></td>";

    $data[]=$subarray;
}
}
else {
$data[] = array('','','','','','');
}
$output = array('data'=>$data,);
echo json_encode($output);
?>