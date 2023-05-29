<?php
require('includes/dbconnection.php');
$sql="SELECT * FROM hrs_tblcategory";
$result=$conn->query($sql);

if ($result->num_rows > 0) {
    while($row=$result->fetch_assoc()){
      $subarray = array();
      $ID=$row['ID'];
      $CategoryName=$row['CategoryName'];
      $Description=$row['Description'];
      $Price=$row['Price'];
      $Date=$row['Date'];
    
      $subarray[] = "<td>".$ID."</td>";
      $subarray[] = "<td>".$CategoryName."</td>";
      $subarray[] = "<td>".$Description."</td>";
      $subarray[] = "<td>".$Price."</td>";
      $subarray[] = "<td>".$Date."</td>";
      $subarray[] = "
        <td>
            <button type='button' value='".$ID."' class='editCategoryBtn btn btn-success btn-sm'>Edit</button>
            <button type='button' value='".$ID."' class='deleteCategoryBtn btn btn-danger btn-sm'>Delete</button>
        </td>";
/*

*/
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