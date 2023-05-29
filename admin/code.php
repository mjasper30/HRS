<?php

require 'includes/dbconnection.php';

if(isset($_POST['save_category']))
{
    $category_name = mysqli_real_escape_string($conn, $_POST['category_name']);
    $category_description = mysqli_real_escape_string($conn, $_POST['category_description']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);

    if($category_name == NULL || $category_description == NULL || $price == NULL)
    {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return false;
    }

    $query = "INSERT INTO hrs_tblcategory (CategoryName,Description,Price) VALUES ('$category_name','$category_description','$price')";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Category Created Successfully'
        ];
        echo json_encode($res);
        return false;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Category Not Created'
        ];
        echo json_encode($res);
        return false;
    }
}

if(isset($_GET['category_id']))
{
    $category_id = mysqli_real_escape_string($conn, $_GET['category_id']);

    $query = "SELECT * FROM hrs_tblcategory WHERE ID='$category_id'";
    $query_run = mysqli_query($conn, $query);

    if(mysqli_num_rows($query_run) == 1)
    {
        $category = mysqli_fetch_array($query_run);

        $res = [
            'status' => 200,
            'message' => 'Category Edit Successfully',
            'data' => $category
        ];
        echo json_encode($res);
        return false;
    }
    else
    {
        $res = [
            'status' => 404,
            'message' => 'Category Id Not Found'
        ];
        echo json_encode($res);
        return false;
    }
}

if(isset($_POST['update_category']))
{
    $category_id = mysqli_real_escape_string($conn, $_POST['category_id']);

    $category_name = mysqli_real_escape_string($conn, $_POST['category_name']);
    $category_description = mysqli_real_escape_string($conn, $_POST['category_description']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);

    if($category_name == NULL || $category_description == NULL || $price == NULL)
    {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }

    $query = "UPDATE hrs_tblcategory SET CategoryName='$category_name', Description='$category_description', Price='$price' WHERE ID='$category_id'";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Category Updated Successfully'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Category Not Updated'
        ];
        echo json_encode($res);
        return;
    }
}

if(isset($_POST['delete_category']))
{
    $category_id = mysqli_real_escape_string($conn, $_POST['category_id']);

    $query = "DELETE FROM hrs_tblcategory WHERE ID='$category_id'";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Category Deleted Successfully'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Category Not Deleted'
        ];
        echo json_encode($res);
        return;
    }
}

// ------------------------------------------

if(isset($_POST['save_facility']))
{
    $facility_title = mysqli_real_escape_string($conn, $_POST['facility_title']);
    $facility_description = mysqli_real_escape_string($conn, $_POST['facility_description']);
    $img=$_FILES["image"]["name"];
    $extension = substr($img,strlen($img)-4,strlen($img));
    $allowed_extensions = array(".jpg","jpeg",".png",".gif");
    $img=md5($img).time().$extension;
    move_uploaded_file($_FILES["image"]["tmp_name"],"images/".$img);
        
    $image = mysqli_real_escape_string($conn, $img);
    //$image = mysqli_real_escape_string($conn, "517dcc35f07ca8e52cfdd588ac861dc51670484801.jpg");

    if($facility_title == NULL || $facility_description == NULL || $image == NULL)
    {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return false;
    }

    $query = "INSERT INTO hrs_tblfacility (FacilityTitle,Description,Image) VALUES ('$facility_title','$facility_description','$image')";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Category Created Successfully'
        ];
        echo json_encode($res);
        return false;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Category Not Created'
        ];
        echo json_encode($res);
        return false;
    }
}

if(isset($_GET['facility_id']))
{
    $facility_id = mysqli_real_escape_string($conn, $_GET['facility_id']);

    $query = "SELECT * FROM hrs_tblfacility WHERE ID='$facility_id'";
    $query_run = mysqli_query($conn, $query);

    if(mysqli_num_rows($query_run) == 1)
    {
        $facility = mysqli_fetch_array($query_run);

        $res = [
            'status' => 200,
            'message' => 'Category Edit Successfully',
            'data' => $facility
        ];
        echo json_encode($res);
        return false;
    }
    else
    {
        $res = [
            'status' => 404,
            'message' => 'Category Id Not Found'
        ];
        echo json_encode($res);
        return false;
    }
}

if(isset($_POST['update_facility']))
{
    $facility_id = mysqli_real_escape_string($conn, $_POST['facility_id']);
    $facility_title = mysqli_real_escape_string($conn, $_POST['facility_title']);
    $facility_description = mysqli_real_escape_string($conn, $_POST['facility_description']);
    $img = addslashes(file_get_contents($_FILES["image"]["name"]));
    $image = mysqli_real_escape_string($conn, $img);
    // $img=$_FILES["image"]["name"];
    // $extension = substr($img,strlen($img)-4,strlen($img));
    // $allowed_extensions = array(".jpg","jpeg",".png",".gif");
    // $img=md5($img).time().$extension;
    // $image = mysqli_real_escape_string($conn, $img);
    
    if($facility_title == NULL || $facility_description == NULL || $image == NULL)
    {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }

    $query = "UPDATE hrs_tblfacility SET FacilityTitle='$facility_title', Description='$facility_description'Image='$image' WHERE ID='$facility_id'";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Category Updated Successfully'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Category Not Updated'
        ];
        echo json_encode($res);
        return;
    }
}

if(isset($_POST['delete_facility']))
{
    $facility_id = mysqli_real_escape_string($conn, $_POST['facility_id']);

    $query = "DELETE FROM hrs_tblfacility WHERE ID='$facility_id'";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Category Deleted Successfully'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Category Not Deleted'
        ];
        echo json_encode($res);
        return;
    }
}

?>