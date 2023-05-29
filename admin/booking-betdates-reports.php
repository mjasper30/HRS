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
    <title>Rastatel | Booking Between Dates Report</title>
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
                                            <center><h4 style="padding: 15px;">Bookings Report</h4></center>
                                        </div>
                                        <div class="form-body">

                                            <form method="post" action="booking-bwdates-reports-details.php">
                                                <div class="form-group"> <label for="exampleInputEmail1">From
                                                        Date:</label> <input style="width: 250px;" type="date"
                                                        class="form-control" id="fromdate" name="fromdate" value=""
                                                        required='true'> </div>

                                                <div class="form-group"> <label for="exampleInputEmail1">To
                                                        Date:</label> <input style="width: 250px;" type="date"
                                                        class="form-control" id="todate" name="todate" value=""
                                                        required='true'> </div>
                                                <button type="submit" class="btn btn-default"
                                                    name="submit">Submit</button>
                                            </form>
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
                'url': 'data-booking-betdates-reports-details.php',
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