<?php 

require('fpdf/fpdf.php');
include('includes/dbconnection.php');

$bookid=$_GET['bookingid'];

$sql="SELECT hrs_tblbooking.BookingNumber,hrs_tblroomnumber.RoomNumber,hrs_tblroom.RoomType,hrs_tbluser.FullName,hrs_tbluser.MobileNumber,hrs_tbluser.Email,hrs_tblbooking.IDType,hrs_tblbooking.Gender,hrs_tblbooking.ArrivalTime,hrs_tblbooking.CheckinDate,hrs_tblbooking.CheckoutDate,hrs_tblbooking.BookingDate,hrs_tblbooking.Remark,hrs_tblbooking.Status,hrs_tblbooking.UpdationDate,hrs_tblcategory.CategoryName,hrs_tblcategory.Description,hrs_tblcategory.Price,hrs_tblroom.RoomName,hrs_tblroom.MaxAdult,hrs_tblroom.MaxChild,hrs_tblroom.RoomDesc,hrs_tblroom.NoofBed,hrs_tblroom.Image,hrs_tblroom.RoomFacility 
    from hrs_tblbooking 
    join hrs_tblroom on hrs_tblbooking.RoomId=hrs_tblroom.ID 
    join hrs_tblroomnumber on hrs_tblroomnumber.ID=hrs_tblroom.ID 
    join hrs_tblcategory on hrs_tblcategory.ID=hrs_tblroom.RoomType 
    join hrs_tbluser on hrs_tblbooking.UserID=hrs_tbluser.ID  
    where hrs_tblbooking.BookingNumber='$bookid'";
    
if($rs=$conn->query($sql)){
    if($rs->num_rows>0){
        if($row=$rs->fetch_assoc()){
            $pdf = new FPDF('P', 'mm', array(80, 160));
        
            //Add New Page
            $pdf->AddPage();
            
            //set font to arial, bold, 16pt end line, [align] )
            $pdf->SetFont('Arial', 'B',16.5);
            
            $pdf->Cell(60,14,'RASTATEL' ,0,1,'C');
            // $image = "images/hrs_logo_outline.png";
            // $pdf->Cell (68,10,$pdf->Image($image, 22.5, 10, 8, 8, 'png') . 'Rastatel',0,1,'C');
            
            $pdf->SetFont('Arial', 'B', 10);
            $pdf->Cell(60,4, '130 J. Ramos St. Caloocan City',0,1,'C');
            $pdf->Cell(60,4, '347-4567-2314',0,1,'C');
            $pdf->Cell(60,4, 'rastatel.hotel@gmail.com',0,1,'C');
            $pdf->Cell(60,4, 'https://ucc-csd-bscs.com/HRS',0,1,'C');
            
            
            
            $pdf->SetFont('Arial','B','5');
            $pdf->Cell(20,8,'============================================================',0,1,'');
            
            //Booking Detail
            
            $pdf->SetFont('Arial','B','10');
            $pdf->Cell(65,10,'Booking Details',0,1,'C');
            
            $pdf->SetFont('Arial','B','10');
            $pdf->Cell(20,5,'Client Name: ' . $row['FullName'],0,1,'');
            
            $pdf->SetFont('Arial','B','10');
            $pdf->Cell(20,5,'Booking Number: ' . $row['BookingNumber'],0,1,'');
            
            $pdf->SetFont('Arial','B','10');
            $pdf->Cell(20,5,'Booking Date: ' . $row['BookingDate'],0,1,''); 
            
            $pdf->SetFont('Arial','B','10');
            $pdf->Cell(20,5,'Check-in Date: ' . $row['CheckinDate'],0,1,'');
            
            $pdf->SetFont('Arial','B','10');
            $pdf->Cell(20,5,'Check-out Date: ' . $row['CheckoutDate'],0,1,'');
        
            //Room Detail
            
            $pdf->SetFont('Arial','B','10');
            $pdf->Cell(65,10,'Room Details',0,1,'C');
            
            $pdf->SetFont('Arial','B','10');
            $pdf->Cell(20,5,'Room Name: ' . $row['RoomName'],0,1,'');
            
            $pdf->SetFont('Arial','B','10');
            $pdf->Cell(20,5,'Room Type: ' . $row['CategoryName'],0,1,'');
            
            $pdf->SetFont('Arial','B','10');
            $pdf->Cell(20,5,'Room Number: ' . $row['RoomNumber'],0,1,'');
            
            $pdf->SetFont('Arial','B','10');
            $pdf->Cell(20,5,'Room Price: ' . $row['Price'],0,1,''); 
            
            // $pdf->SetFont('Arial','B','10');
            // $pdf->Cell(25,5,'Room Name',0,0,'L');
            // $pdf->Cell(37,5, 'Room Price',0,1,'R');
            
            // $pdf->SetFont('Arial','B','10');
            // $pdf->Cell(25,5,$row['RoomName'],0,0,'L');
            // $pdf->Cell(37,5,$row['Price'],0,1,'R');
            $pdf->Cell(65,5,'',0,1,'C');
            
            $pdf->SetFont('Arial','BI','5');
            $pdf->Cell(20,4,'============================================================',0,1,'');
            
            $pdf->SetFont('Arial','B','11');
            $pdf->Cell(60,9,'Thank you, come again!',0,0,'C');
            
            $pdf->Output();
        }
    }
}else{
    die("Error:".$conn->error);
}
?>