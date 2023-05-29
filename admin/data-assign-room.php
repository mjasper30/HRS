<?php
require('includes/dbconnection.php');
$sql="SELECT * FROM hrs_tblroomnumber";
$result=$conn->query($sql);
$counter=0;
if ($result->num_rows > 0) {
    while($row=$result->fetch_assoc()){
      $subarray = array();
      $ID=$row['ID'];
      $RoomName=$row['RoomName'];
      $RoomNumber=$row['RoomNumber'];
      $RFIDNumber=$row['RFIDNumber'];
      $ElectricityStatus=$row['Electricity'];
      $Status=$row['Status'];
      $counter++;
      
      $subarray[] = "<td>".$counter."</td>";
      $subarray[] = "<td>".$RoomName."</td>";
      $subarray[] = "<td>".$RoomNumber."</td>";
      $subarray[] = "<td>".$RFIDNumber."</td>";
        if($row['Electricity'] == "ON"){
            $row['Electricity'] = "ON";
            $subarray[] = "<center><td><p style='background-color: green; text-align: center; color: white; border-radius: 5px; padding: 5px; width: 130px;'>ON</p></td></center>";
        }else{
            $row['Electricity'] = "OFF";
            $subarray[] = "<center><td><p style='background-color: red; text-align: center; color: white; border-radius: 5px; padding: 5px; width: 130px;'>OFF</p></td></center>";
        }
  
        if($row['Status'] == "Available"){
            $subarray[] = "<center><td><p style='background-color: green; text-align: center; color: white; border-radius: 5px; padding: 5px; width: 130px;'>".$Status."</p></td></center>";
        }else if($row['Status'] == "Not Available"){
            $row['Status'] = "Not Available";
            $subarray[] = "<center><td><p style='background-color: red; text-align: center; color: white; border-radius: 5px; padding: 5px; width: 130px;'>".$Status."</p></td></center>";
        }else if($row['Status'] == "Occupied"){
            $row['Status'] = "Occupied";
            $subarray[] = "<center><td><p style='background-color: red; text-align: center; color: white; border-radius: 5px; padding: 5px; width: 130px;'>".$Status."</p></td></center>";
        }else if($row['Status'] == "Maintenance"){
            $row['Status'] = "Maintenance";
            $subarray[] = "<center><td><p style='background-color: blue; text-align: center; color: white; border-radius: 5px; padding: 5px; width: 130px;'>".$Status."</p></td></center>";
        }                 
      $subarray[] = "
        <td>
            <button class='btn-edit'><a href='edit-room-number.php?editid=".$ID."' onclick='return'>Edit</a>
            </button>

            <button class='btn-delete'>
                <a href='assign-room.php?delid=".$ID." onclick='return confirm(' Do you really want to Delete
            ?');'>Delete</a>
            </button>
        </td>";
      $data[]=$subarray;
}
}
else {
    $data[] = array('','','','','','','');
}
    $output = array('data'=>$data,);
    echo json_encode($output);
?>