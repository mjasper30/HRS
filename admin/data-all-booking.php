<?php
require('includes/dbconnection.php');
$sql="SELECT hrs_tbluser.*,hrs_tblbooking.BookingNumber,hrs_tblbooking.ID,hrs_tblbooking.Status,hrs_tblbooking.BookingDate from hrs_tblbooking join hrs_tbluser on hrs_tblbooking.UserID=hrs_tbluser.ID";
$result=$conn->query($sql);
$counter=0;
if ($result->num_rows > 0) {
    while($row=$result->fetch_assoc()){
      $subarray = array();
      $ID=$row['ID'];
      $BookingNumber=$row['BookingNumber'];
      $FullName=$row['FullName'];
      $Email=$row['Email'];
      $MobileNumber=$row['MobileNumber'];
      $BookingDate=$row['BookingDate'];
      $Status=$row['Status'];
      $BookingNumber=$row['BookingNumber'];
      $counter++;
      
      $subarray[] = "<td>".$counter."</td>";
      $subarray[] = "<td>".$BookingNumber."</td>";
      $subarray[] = "<td>".$FullName."</td>";
      $subarray[] = "<td>".$Email."</td>";
      $subarray[] = "<td>".$MobileNumber."</td>";
      $subarray[] = "<td>".$BookingDate."</td>";
        if($row['Status']==""){
            $subarray[] = "<td class='d-none d-sm-table-cell'><span class='badge badge-danger'>Not Yet Updated</span></td>";
        }else if($row['Status']=="Check out"){
            $subarray[] = "<td class='d-none d-sm-table-cell'>
                <span class='badge badge-success'>".$Status."</span>
            </td>";
        }else if($row['Status']=="Check in"){
            $subarray[] = "<td class='d-none d-sm-table-cell'>
                <span class='badge badge-warning'>".$Status."</span>
            </td>";
        }else if($row['Status']=="Approved"){
            $subarray[] = "<td class='d-none d-sm-table-cell'>
                <span class='badge badge-info'>".$Status."</span>
            </td>";
        }else{
            $subarray[] = "<td class='d-none d-sm-table-cell'>
                <span class='badge badge-success'>".$Status."</span>
            </td>";
        };
        
      $subarray[] = "
        <td>
            <a class='view-a' href='view-booking-detail.php?bookingid=".$BookingNumber."'><i class='fa fa-eye' aria-hidden='true'></i></a>
        </td>";
      $data[]=$subarray;
    }
}
else {
    $data[] = array('','','','','','','','');
}
    $output = array('data'=>$data,);
    echo json_encode($output);
?>