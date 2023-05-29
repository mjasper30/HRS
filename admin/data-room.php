<?php
require('includes/dbconnection.php');
$sql="SELECT * FROM hrs_tblroom";
$result=$conn->query($sql);
$counter=0;
if ($result->num_rows > 0) {
    while($row=$result->fetch_assoc()){
      $subarray = array();
      $ID=$row['ID'];
      $RoomName=$row['RoomName'];
      $Description=$row['RoomDesc'];
      $Image=$row['Image'];
      $RoomQuantity=$row['RoomQuantity'];
      $Availability=$row['Availability'];
      $Price=$row['Price'];
      $CreationDate=$row['CreationDate'];
      $counter++;
      
      $subarray[] = "<td>".$counter."</td>";
      $subarray[] = "<td>".$RoomName."</td>";
      $subarray[] = "<td>".$Description."</td>";
      $subarray[] = "<td class='d-none d-sm-table-cell'><img src='images/".$Image."' width='100' height='100'></td>"; 
  
        if($row['RoomQuantity'] > 0 && $row['Availability'] == 'Available'){
            $subarray[] = "<td><p style='background-color: green; color: white; border-radius: 5px; padding: 5px;'>".$Availability."</p></td>";
        }else if($row['RoomQuantity'] <= 0 || $row['Availability'] == 'Not Available'){
            $row['Availability'] = 'Not Available';
            $subarray[] = "<td><p style='background-color: red; color: white; border-radius: 5px; padding: 5px;'>".$Availability."</p></td>";
        }else if($row['Availability'] == 'Maintenance'){
            $row['Availability'] = 'Maintenance';
            $subarray[] = "<td><p style='background-color: orange; color: white; border-radius: 5px; padding: 5px;'>".$Availability."</p></td>";
        };                                      

      $subarray[] = "<td>".$RoomQuantity."</td>";
      $subarray[] = "<td>".$Price."</td>";
      $subarray[] = "<td>".$CreationDate."</td>";
      $subarray[] = "
        <td>
            <button class='btn-edit'><a href='edit-room.php?editid=".$ID."' onclick='return'>Edit</a>
            </button>

            <button class='btn-delete'>
                <a href='manage-room.php?delid=".$ID." onclick='return confirm(' Do you really want to Delete
            ?');'>Delete</a>
            </button>
        </td>";
      $data[]=$subarray;
    }
}
else {
    $data[] = array('','','','','','','','','');
}
    $output = array('data'=>$data,);
    echo json_encode($output);
?>