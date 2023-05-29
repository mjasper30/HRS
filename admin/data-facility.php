<?php
require('includes/dbconnection.php');
$sql="SELECT * FROM hrs_tblfacility";
$result=$conn->query($sql);

if ($result->num_rows > 0) {
    while($row=$result->fetch_assoc()){
      $subarray = array();
      $ID=$row['ID'];
      $FacilityTitle=$row['FacilityTitle'];
      $Description=$row['Description'];;
      $Image=$row['Image'];
      $CreationDate=$row['CreationDate'];
    
      $subarray[] = "<td>".$ID."</td>";
      $subarray[] = "<td>".$FacilityTitle."</td>";
      $subarray[] = "<td>".$Description."</td>";
      $subarray[] = "<td class='d-none d-sm-table-cell'><img src='images/".$Image."' width='100' height='100'></td>"; 
      $subarray[] = "<td>".$CreationDate."</td>";
      $subarray[] = "
        <td>
            <button type='button' value='".$ID."' class='editFacilityBtn btn btn-success btn-sm'>Edit</button>
            <button type='button' value='".$ID."' class='deleteFacilityBtn btn btn-danger btn-sm'>Delete</button>
        </td>";

    $data[]=$subarray;

}
}
else {
    $data[] = array('','','','','','');
}
$output = array(
    'data'=>$data,
);

echo json_encode($output);

?>