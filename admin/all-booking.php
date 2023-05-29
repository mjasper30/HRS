<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['hbmsaid']==0)) {
  header('location:logout.php');
  } else{
  
?>
<!DOCTYPE HTML>
<html>

<head>
    <title>Rastatel | All Reservation</title>
    <link rel="icon" type="image/x-icon" href="../images/favicon.ico">
    <script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
    </script>

    <script type="application/x-javascript">
    addEventListener("load", function() {
        setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
        window.scrollTo(0, 1);
    }
    </script>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
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
    <!-- jquery tables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
</head>

<body>
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
                                            <center><h4 style="padding: 15px;">All Reservation</h4></center>
                                        </div>
                                        <div class="form-body">

                                            <table
                                                class="table table-bordered table-striped table-vcenter js-dataTable-full-pagination"
                                                id="tables">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">S.No</th>
                                                        <th>Booking Number</th>
                                                        <th>Name</th>
                                                        <th class="d-none d-sm-table-cell">Email</th>
                                                        <th class="d-none d-sm-table-cell">Mobile Number</th>
                                                        <th class="d-none d-sm-table-cell">Booking Date<br>(yyyy-mm-dd |
                                                            time)</th>
                                                        <th class="d-none d-sm-table-cell">Status</th>
                                                        <th class="d-none d-sm-table-cell" style="width: 15%;">Action
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>

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
                'url': 'data-all-booking.php',
                'type': 'post',
                'beforeSend': function() {
                    // Disable the search bar before making the AJAX request
                    //   $('#tables_filter input').attr('disabled', true);
                },
                'success': function(data) {
                    $('#tables_filter input').attr('disabled',
                        false); // Re-enable the search bar
                    $('#tables_processing').hide();
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