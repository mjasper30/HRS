<?php
require('includes/dbconnection.php');
$bookid=$_GET['bookingid'];

$sql="SELECT hrs_tblbooking.BookingNumber,hrs_tbluser.FullName,hrs_tbluser.MobileNumber,hrs_tbluser.Email,hrs_tblbooking.IDType,hrs_tblbooking.Gender,hrs_tblbooking.ArrivalTime,hrs_tblbooking.CheckinDate,hrs_tblbooking.CheckoutDate,hrs_tblbooking.BookingDate,hrs_tblbooking.Remark,hrs_tblbooking.Status,hrs_tblbooking.UpdationDate,hrs_tblcategory.CategoryName,hrs_tblcategory.Description,hrs_tblcategory.Price,hrs_tblroom.RoomName,hrs_tblroom.MaxAdult,hrs_tblroom.MaxChild,hrs_tblroom.RoomDesc,hrs_tblroom.NoofBed,hrs_tblroom.Image,hrs_tblroom.RoomFacility from hrs_tblbooking join hrs_tblroom on hrs_tblbooking.RoomId=hrs_tblroom.ID join hrs_tblcategory on hrs_tblcategory.ID=hrs_tblroom.RoomType join hrs_tbluser on hrs_tblbooking.UserID=hrs_tbluser.ID where hrs_tblbooking.BookingNumber='$bookid'";

  $result=$conn->query($sql);
  $counter=0;
  if ($result->num_rows > 0) {
    while($row=$result->fetch_assoc()){
      $subarray = array();
      $ID=$row['ID'];
      $BookingNumber=$row['BookingNumber'];
      $FullName=$row['FullName'];
      $Email=$row['Email'];
      $IDType=$row['IDType'];
      $Gender=$row['Gender'];
      $ArrivalTime=$row['ArrivalTime'];
      $CheckinDate=$row['CheckinDate'];
      $CheckoutDate=$row['CheckoutDate'];
      $CategoryName=$row['CategoryName'];
      $Price=$row['Price'];
      $RoomName=$row['RoomName'];
      $RoomDesc=$row['RoomDesc'];
      $MaxAdult=$row['MaxAdult'];
      $MaxChild=$row['MaxChild'];
      $NoofBed=$row['NoofBed'];
      $Image=$row['Image'];
      $RoomFacility=$row['RoomFacility'];
      $BookingDate=$row['BookingDate'];
      $Image=$row['Image'];
      $Status=$row['Status'];
      $counter++;
      
      $subarray[] = "<tr>
      <th colspan='4' style='color: red;font-weight: bold;text-align: center;font-size: 20px'>Booking Number:".$BookingNumber."</th></tr>";

      $data[]=$subarray;
    }
  }
  else {
    $data[] = array('');
  }
  $output = array('data'=>$data,);
  echo json_encode($output);

?>