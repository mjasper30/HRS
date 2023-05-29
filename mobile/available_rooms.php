<?php
session_start();
    require_once('dbconnection.php');
    $aid=$_GET['aid'];
    $sql="SELECT hrs_tblroom.*,hrs_tblroom.id as rmid , hrs_tblcategory.Price,hrs_tblcategory.ID,hrs_tblcategory.CategoryName from hrs_tblroom 
    join hrs_tblcategory on hrs_tblroom.RoomType=hrs_tblcategory.ID 
    where hrs_tblroom.Availability='Available'";
    $result = $conn->query($sql);
    $rowcount = mysqli_num_rows($result);
    $current = $rowcount;
    if($rowcount == 0) {
        echo "<br><center><h2><b><i>No Results</i></b></h2></center>";
    } else {
        $counter = 0;
        
        $data = array();
        while ($row = $result->fetch_assoc()) {
            $room = array();
            $room['Image'] = $row['Image'];
            $room['RoomName'] = $row['RoomName'];
            $room['Price'] = $row['Price'];
            // $room['Availability'] = getAvailability($row['Availability']);
            $data[] = $room;
        }
        
        
        
        echo json_encode($data);
            
        }
    
    function getAvailability($roomStatus) {
        if ($roomStatus == 'Available') {
            return 'Available';
        } else {
            return 'Not Available';
        }
    }

?>