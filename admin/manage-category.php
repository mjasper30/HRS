<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['hbmsaid']==0)) {
    header('location:logout.php');
}else{
    // Code for deleting product from cart
    if(isset($_GET['delid'])){
        $rid=intval($_GET['delid']);
        $sql="delete from hrs_tblcategory where ID='$rid'";
        
        if($rs=$conn->query($sql)){
            if($rs->num_rows>0){
                echo "<script>alert('Data deleted');</script>"; 
                echo "<script>window.location.href = 'manage-category.php'</script>"; 
            }
        }else{
            die("Error:".$conn->error);
        }    
    }
?>
<!DOCTYPE HTML>
<html>

<head>
    <title>Rastatel | Add Category</title>
    <link rel="icon" type="image/x-icon" href="../images/favicon.ico">

    <script type="application/x-javascript">
    addEventListener("load", function() {
        setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
        window.scrollTo(0, 1);
    }
    </script>
    <!-- Bootstrap Core CSS -->
    <!-- <link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' /> -->
    <!-- Custom CSS -->
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <!-- Graph CSS -->
    <link href="css/font-awesome.css" rel="stylesheet">
    <!-- jQuery -->
    <link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet'
        type='text/css' />
    <link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <!-- lined-icons -->
    <link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
    <script src="js/simpleCart.min.js"> </script>
    <script src="js/amcharts.js"></script>
    <script src="js/serial.js"></script>
    <script src="js/light.js"></script>
    <!-- //lined-icons -->
    <script src="js/jquery-1.10.2.min.js"></script>
    <!-- jquery tables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <!-- Add Category -->
    <div class="modal fade" id="categoryAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="saveCategory">
                    <div class="modal-body">

                        <div id="errorMessage" class="alert alert-warning d-none"></div>

                        <div class="mb-3">
                            <label for="">Category Name</label>
                            <input type="text" name="category_name" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label for="">Description</label>
                            <textarea class="form-control" name="category_description" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="">Price</label>
                            <input type="text" name="price" class="form-control" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Category Modal -->
    <div class="modal fade" id="categoryEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="updateCategory">
                    <div class="modal-body">

                        <div id="errorMessageUpdate" class="alert alert-warning d-none"></div>

                        <input type="hidden" name="category_id" id="category_id">

                        <div class="mb-3">
                            <label for="">Category Name</label>
                            <input type="text" name="category_name" id="category_name" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label for="">Description</label>
                            <textarea class="form-control" name="category_description" id="category_description" rows="5"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="">Price</label>
                            <input type="text" name="price" id="price" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label for="">Creation Date</label>
                            <input type="text" name="creation_date" id="creation_date" class="form-control" disabled />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="page-container">
        <!--/content-inner-->
        <div class="left-content">
            <div class="inner-content">
                <!-- header-starts -->
                <?php include_once('includes/header.php');?>

                <!--content-->
                <div class="content">
                    <div class="women_main">
                        <!-- start content -->
                        <div class="grids">
                            <div class="panel panel-widget forms-panel">
                                <div class="forms">
                                    <div class="form-grids widget-shadow" data-example-id="basic-forms">
                                        <div class="form-title">
                                            <center><h4 style="padding: 15px;">Manage Category</h4></center>
                                        </div>
                                        <button type="button" class="btn btn-primary float-end m-3"
                                            data-bs-toggle="modal" data-bs-target="#categoryAddModal">
                                            Add Category
                                        </button>
                                        <div class="form-body m-3">

                                            <table border="1"
                                                class="table table-bordered table-striped table-vcenter js-dataTable-full-pagination"
                                                id="tables">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center" style="width: 20px;">S.No</th>
                                                        <th>Category Name</th>
                                                        <th class="d-none d-sm-table-cell">Category Description</th>
                                                        <th class="d-none d-sm-table-cell" style="width: 100px;">
                                                            Price
                                                        </th>
                                                        <th class="d-none d-sm-table-cell">Creation Date
                                                            (yyyy-mm-dd | time)</th>
                                                        <th class="d-none d-sm-table-cell" style="width: 15%;">
                                                            Action
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php
                                                require 'includes/dbconnection.php';

                                                $query = "SELECT * FROM hrs_tblcategory";
                                                $query_run = mysqli_query($conn, $query);

                                                if(mysqli_num_rows($query_run) > 0)
                                                {
                                                    foreach($query_run as $category)
                                                    {
                                                ?>
                                                    <tr>
                                                        <td><?= $category['ID'] ?></td>
                                                        <td><?= $category['CategoryName'] ?></td>
                                                        <td><?= $category['Description'] ?></td>
                                                        <td><?= $category['Price'] ?></td>
                                                        <td><?= $category['Date'] ?></td>
                                                        <td>
                                                            <button type="button" value="<?=$category['ID'];?>"
                                                                class="editCategoryBtn btn btn-success btn-sm">Edit</button>
                                                            <button type="button" value="<?=$category['ID'];?>"
                                                                class="deleteCategoryBtn btn btn-danger btn-sm">Delete</button>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                    }
                                                }
                                                ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- end content -->

                        <?php include_once('includes/footer.php');?>
                    </div>

                </div>
                <!--content-->


            </div>
        </div>
        <!--//content-inner-->
        <!--/sidebar-menu-->
        <?php include_once('includes/sidebar.php');?>
        <div class="clearfix"></div>
    </div>
    <!-- jquery datatables -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link href="https://nightly.datatables.net/css/jquery.dataTables.css" rel="stylesheet" type="text/css" />
    <script src="https://nightly.datatables.net/js/jquery.dataTables.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script>
    $(document).ready(function() {
        // Initialize DataTable
        var table = $('#tables').DataTable({
            'serverside': true,
            'processing': false,
            'paging': true,
            "columnDefs": [{
                "className": "dt-center",
                "targets": "_all"
            }],
            'ajax': {
                'url': 'data-category.php',
                'type': 'post',
                'beforeSend': function() {
                    // Disable the search bar before making the AJAX request
                    //   $('#tables_filter input').attr('disabled', true);
                },
                'success': function(data) {
                    $('#tables_filter input').attr('disabled',
                        false); // Re-enable the search bar
                    var currentPage = table.page();
                    $('#tables').DataTable().clear().rows.add(data.data).draw();
                    table.page(currentPage).draw(false);
                }
            },
        });

        // // Periodically refresh DataTable data
        // setInterval(function() {
        //     $('#tables_processing').hide();
        //     var currentPage = table.page(); // Get the current page number
        //     table.ajax.reload(null, false);
        // }, 10000); // Refresh every 10 seconds
    });
    $(document).on('submit', '#saveCategory', function(e) {
        e.preventDefault();

        var formData = new FormData(this);
        formData.append("save_category", true);

        $.ajax({
            type: "POST",
            url: "code.php",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {

                var res = jQuery.parseJSON(response);
                if (res.status == 422) {
                    $('#errorMessage').removeClass('d-none');
                    $('#errorMessage').text(res.message);

                } else if (res.status == 200) {

                    $('#errorMessage').addClass('d-none');
                    $('#categoryAddModal').modal('hide');
                    $('#saveCategory')[0].reset();

                    alertify.set('notifier', 'position', 'top-right');
                    alertify.success(res.message);

                    $('#tables').load(location.href + " #tables");

                } else if (res.status == 500) {
                    alert(res.message);
                }
            }
        });

    });

    $(document).on('click', '.editCategoryBtn', function() {

        var category_id = $(this).val();

        $.ajax({
            type: "GET",
            url: "code.php?category_id=" + category_id,
            success: function(response) {

                var res = jQuery.parseJSON(response);
                if (res.status == 422) {

                    alert(res.message);
                } else if (res.status == 200) {
                    $('#category_id').val(res.data.ID);
                    $('#category_name').val(res.data.CategoryName);
                    $('#category_description').val(res.data.Description);
                    $('#price').val(res.data.Price);
                    $('#creation_date').val(res.data.Date);

                    $('#categoryEditModal').modal('show');
                }

            }
        });

    });

    $(document).on('submit', '#updateCategory', function(e) {
        e.preventDefault();

        var formData = new FormData(this);
        formData.append("update_category", true);

        $.ajax({
            type: "POST",
            url: "code.php",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {

                var res = jQuery.parseJSON(response);
                if (res.status == 422) {
                    $('#errorMessageUpdate').removeClass('d-none');
                    $('#errorMessageUpdate').text(res.message);

                } else if (res.status == 200) {

                    $('#errorMessageUpdate').addClass('d-none');

                    $('#categoryEditModal').modal('hide');
                    $('#updateCategory')[0].reset();

                    $('#tables').load(location.href + " #tables");

                } else if (res.status == 500) {
                    alert(res.message);
                }
            }
        });

    });

    $(document).on('click', '.deleteCategoryBtn', function(e) {
        e.preventDefault();

        if (confirm('Are you sure you want to delete this data?')) {
            var category_id = $(this).val();
            $.ajax({
                type: "POST",
                url: "code.php",
                data: {
                    'delete_category': true,
                    'category_id': category_id
                },
                success: function(response) {

                    var res = jQuery.parseJSON(response);
                    if (res.status == 500) {

                        alert(res.message);
                    } else {
                        alertify.set('notifier', 'position', 'top-right');
                        alertify.success(res.message);

                        $('#tables').load(location.href + " #tables");
                    }
                }
            });
        }
    });
    </script>

    <script>
    var toggle = true;

    $(".sidebar-icon").click(function() {
        if (toggle) {
            $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
            $("#menu span").css({
                "position": "absolute"
            });
        } else {
            $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
            setTimeout(function() {
                $("#menu span").css({
                    "position": "relative"
                });
            }, 400);
        }

        toggle = !toggle;
    });
    </script>
</body>

</html><?php }  ?>