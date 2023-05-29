<!DOCTYPE html>
<html>

<body>
    <?php

include('includes/dbconnection.php');

$sql = "SELECT id, rfid_number, date_created FROM hrs_tblrfid ORDER BY id DESC";

echo '<table cellspacing="5" cellpadding="5">
      <tr> 
        <td>ID</td> 
        <td>RFID Number</td> 
        <td>Timestamp</td> 
      </tr>';
 
if ($result = $conn->query($sql)) {
    while ($row = $result->fetch_assoc()) {
        $row_id = $row["id"];
        $row_rfid_number = $row["rfid_number"];
        $row_date_created = $row["date_created"];
        // Uncomment to set timezone to - 1 hour (you can change 1 to any number)
        //$row_date_created = date("Y-m-d H:i:s", strtotime("$row_date_created - 1 hours"));
      
        // Uncomment to set timezone to + 4 hours (you can change 4 to any number)
        //$row_date_created = date("Y-m-d H:i:s", strtotime("$row_date_created + 4 hours"));
      
        echo '<tr> 
                <td>' . $row_id . '</td> 
                <td>' . $row_rfid_number . '</td> 
                <td>' . $row_date_created . '</td> 
              </tr>';
    }
    $result->free();
}

$conn->close();
?>
    </table>
</body>

</html>