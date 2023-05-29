<?php
    session_start();
    require_once('dbconnection.php');
    
    $uid= $_SESSION['hbmsuid'];
    $sql="SELECT hrs_tblbooking.BookingNumber,hrs_tbluser.FullName,hrs_tbluser.MobileNumber,hrs_tbluser.Email,hrs_tblbooking.ID as tid,hrs_tblbooking.IDType,hrs_tblbooking.Gender,hrs_tblbooking.ArrivalTime,hrs_tblbooking.CheckinDate,hrs_tblbooking.CheckoutDate,hrs_tblbooking.BookingDate,hrs_tblbooking.Remark,hrs_tblbooking.Status,hrs_tblbooking.UpdationDate,hrs_tblcategory.CategoryName,hrs_tblcategory.Description,hrs_tblcategory.Price,hrs_tblroom.RoomName,hrs_tblroom.MaxAdult,hrs_tblroom.MaxChild,hrs_tblroom.RoomDesc,hrs_tblroom.NoofBed,hrs_tblroom.Image,hrs_tblroom.RoomFacility 
                    from hrs_tblbooking 
                    join hrs_tblroom on hrs_tblbooking.RoomId=hrs_tblroom.ID 
                    join hrs_tblcategory on hrs_tblcategory.ID=hrs_tblroom.RoomType 
                    join hrs_tbluser on hrs_tblbooking.UserID=hrs_tbluser.ID  
                    where UserID='1'";
    
    $result = $conn->query($sql);
    $rowcount = mysqli_num_rows($result);
    
    if($rowcount == 0) {
        echo "<br><center><h2><b><i>No Results</i></b></h2></center>";
    } else {
        $data = array();
        while ($row = $result->fetch_assoc()) {
            $room = array();
            $room['Image'] = $row['Image'];
            $room['RoomName'] = $row['RoomName'];
            $room['Price'] = $row['Price'];
            $room['BookingNumber'] = $row['BookingNumber'];
            $room['CheckinDate'] = $row['CheckinDate'];
            $room['CheckoutDate'] = $row['CheckoutDate'];
            $room['Status'] = getStatus($row['Status']);
            $data[] = $room;
        }
        
        echo json_encode($data);
            
    }
    
    function getStatus($bookingStatus) {
        if ($bookingStatus == null) {
            return 'Not Approved Yet';
        } else if($bookingStatus == "Approved"){
            return 'Approved';
        } else if($bookingStatus == "Cancelled"){
            return 'Cancelled';
        } else if($bookingStatus == "Check in"){
            return 'Check in';
        } else if($bookingStatus == "Check out"){
            return 'Check out';
        }
    }

?>