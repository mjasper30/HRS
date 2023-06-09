<?php
    session_start();
    error_reporting(0);
    include('includes/dbconnection.php');
    if (strlen($_SESSION['hbmsaid']==0)) {
        header('location: index.php');
    } else{



  ?>
<!DOCTYPE HTML>
<html>

<head>
    <title>Rastatel | Dashboard</title>
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
    <script src="js/amcharts.js"></script>
    <script src="js/serial.js"></script>
    <script src="js/light.js"></script>
    <!-- //lined-icons -->
    <script src="js/jquery-1.10.2.min.js"></script>
    <!-- jquery tables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <!--pie-chart--->
    <script src="js/pie-chart.js" type="text/javascript"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('#demo-pie-1').pieChart({
            barColor: '#3bb2d0',
            trackColor: '#eee',
            lineCap: 'round',
            lineWidth: 8,
            onStep: function(from, to, percent) {
                $(this.element).find('.pie-value').text(Math.round(percent) + '%');
            }
        });

        $('#demo-pie-2').pieChart({
            barColor: '#fbb03b',
            trackColor: '#eee',
            lineCap: 'butt',
            lineWidth: 8,
            onStep: function(from, to, percent) {
                $(this.element).find('.pie-value').text(Math.round(percent) + '%');
            }
        });

        $('#demo-pie-3').pieChart({
            barColor: '#ed6498',
            trackColor: '#eee',
            lineCap: 'square',
            lineWidth: 8,
            onStep: function(from, to, percent) {
                $(this.element).find('.pie-value').text(Math.round(percent) + '%');
            }
        });


    });
    </script>
</head>

<body>
    <div class="page-container">
        <!--/content-inner-->
        <div class="left-content">
            <div class="inner-content">
                <!-- header-starts -->
                <?php include_once('includes/header.php');?>
                <!-- //header-ends -->

                <!--content-->
                <div class="content">



                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="content-top-1">
                                    <h4 class="text-left text-uppercase" style="color: orange"><a class = "dashboard-a"
                                            href="new-booking.php"><b>New Booking</b></a></h4>
                                    <div class="row vertical-center-box 
                                vertical-center-box-tablet">
                                        <?php 
                        $sql2 ="SELECT * from  hrs_tblbooking where Status is null ";
                        $totnewbooking = '0';
                        if($rs=$conn->query($sql2)){
                            if($rs->num_rows>0){
                                while($row=$rs->fetch_assoc()){
                                    $totnewbooking=$rs->num_rows;
                                }
                            }
                        }
                        else{
                            die("Error:".$conn->error);
                        } 
                        ?>
                                        <div class="col-xs-3 mar-bot-15 text-left">
                                            <label class="label bg-green">30% <i class="fa fa-level-up"
                                                    aria-hidden="true"></i></label>
                                        </div>
                                        <div class="col-xs-9 cus-gh-hd-pro">
                                            <h2 class="text-right no-margin"><?php echo $totnewbooking;?>
                                            </h2>
                                        </div>
                                    </div>
                                    <div class="progress progress-mini">
                                        <div style="width: 78%;" class="progress-bar bg-green"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" style="margin-bottom:1px;">
                                <div class="content-top-1">
                                    <h4 class="text-left text-uppercase" style="color: red"><a class = "dashboard-a"
                                            href="approved-booking.php"><b>Approved Booking</b></a></h4>
                                    <div class="row vertical-center-box vertical-center-box-tablet">
                                        <?php 
                                        
                                            $sql2 ="SELECT * from  hrs_tblbooking where Status='Approved'";
                                            $totappbooking = '0';
                                            if($rs=$conn->query($sql2)){
                                                if($rs->num_rows>0){
                                                    while($row=$rs->fetch_assoc()){
                                                        $totappbooking=$rs->num_rows;
                                                    }
                                                }
                                            }else{
                                                die("Error:".$conn->error);
                                            } 
                                        ?>
                                        <div class="text-left col-xs-3 mar-bot-15">
                                            <label class="label bg-red">15% <i class="fa fa-level-down"
                                                    aria-hidden="true"></i></label>
                                        </div>
                                        <div class="col-xs-9 cus-gh-hd-pro">
                                            <h2 class="text-right no-margin"><?php echo $totappbooking;?>
                                            </h2>
                                        </div>
                                    </div>
                                    <div class="progress progress-mini">
                                        <div style="width: 38%;" class="progress-bar progress-bar-danger bg-red"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="content-top-1">
                                    <h4 class="text-left text-uppercase" style="color: magenta"><a class = "dashboard-a"
                                            href="cancelled-booking.php"><b>Cancelled Booking</b></a></h4>
                                    <div class="row vertical-center-box vertical-center-box-tablet">
                                        <?php 
                                            $sql2 ="SELECT * from  hrs_tblbooking where Status='Cancelled'";
                                            $totcanbooking = '0';
                                            if($rs=$conn->query($sql2)){
                                                if($rs->num_rows>0){
                                                    while($row=$rs->fetch_assoc()){
                                                        $totcanbooking=$rs->num_rows;
                                                    }
                                                }
                                            }
                                            else{
                                                die("Error:".$conn->error);
                                            } 
                                        ?>
                                        <div class="text-left col-xs-3 mar-bot-15">
                                            <label class="label bg-blue">50% <i class="fa fa-level-up"
                                                    aria-hidden="true"></i></label>
                                        </div>
                                        <div class="col-xs-9 cus-gh-hd-pro">
                                            <h2 class="text-right no-margin"><?php echo $totcanbooking;?>
                                            </h2>
                                        </div>
                                    </div>
                                    <div class="progress progress-mini">
                                        <div style="width: 60%;" class="progress-bar bg-blue"></div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-12" style="padding-top: 20px">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="content-top-1">
                                    <h4 class="text-left text-uppercase" style="color: orange"><a class = "dashboard-a"
                                            href="reg-users.php"><b>Reg Users</b></a></h4>
                                    <div class="row vertical-center-box vertical-center-box-tablet">
                                        <?php 
                    						$sql1 ="SELECT * from  hrs_tbluser";
                    						$totregusers = '0';
                                            if($rs=$conn->query($sql1)){
                                                if($rs->num_rows>0){
                                                    while($row=$rs->fetch_assoc()){
                                                        $totregusers=$rs->num_rows;
                                                    }
                                                }
                                            }
                                            else{
                                                die("Error:".$conn->error);
                                            } 
                                        ?>
                                        <div class="col-xs-3 mar-bot-15 text-left">
                                            <label class="label bg-green">30% <i class="fa fa-level-up"
                                                    aria-hidden="true"></i></label>
                                        </div>
                                        <div class="col-xs-9 cus-gh-hd-pro">
                                            <h2 class="text-right no-margin"><?php echo $totregusers;?>
                                            </h2>
                                        </div>
                                    </div>
                                    <div class="progress progress-mini">
                                        <div style="width: 78%;" class="progress-bar bg-green"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" style="margin-bottom:1px;">
                                <div class="content-top-1">
                                    <h4 class="text-left text-uppercase" style="color: red"><a class = "dashboard-a"
                                            href="read-enquiry.php"><b>Read Enquries</b></a></h4>
                                    <div class="row vertical-center-box vertical-center-box-tablet">
                                        <?php 
                    						$sql1 ="SELECT * from  hrs_tblcontact where Isread='1'";
                    						$totreadqueries = '0';
                                            if($rs=$conn->query($sql1)){
                                                if($rs->num_rows>0){
                                                    while($row=$rs->fetch_assoc()){
                                                        $totreadqueries=$rs->num_rows;
                                                    }
                                                }
                                            }
                                            else{
                                                die("Error:".$conn->error);
                                            } 
                                        ?>
                                        <div class="text-left col-xs-3 mar-bot-15">
                                            <label class="label bg-red">15% <i class="fa fa-level-down"
                                                    aria-hidden="true"></i></label>
                                        </div>
                                        <div class="col-xs-9 cus-gh-hd-pro">
                                            <h2 class="text-right no-margin"><?php echo $totreadqueries;?>
                                            </h2>
                                        </div>
                                    </div>
                                    <div class="progress progress-mini">
                                        <div style="width: 38%;" class="progress-bar progress-bar-danger bg-red"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="content-top-1">
                                    <h4 class="text-left text-uppercase" style="color: magenta"><a class = "dashboard-a"
                                            href="unread-enquiry.php"><b>Unread Enquries</b></a></h4>
                                    <div class="row vertical-center-box vertical-center-box-tablet">
                                        <?php 
                    						$sql1 ="SELECT * from  hrs_tblcontact where Isread is null";
                    						$totunreadqueries = '0';
                                            if($rs=$conn->query($sql1)){
                                                if($rs->num_rows>0){
                                                    while($row=$rs->fetch_assoc()){
                                                        $totunreadqueries=$rs->num_rows;
                                                    }
                                                }
                                            }
                                            else{
                                                die("Error:".$conn->error);
                                            } 
                                        ?>
                                        <div class="text-left col-xs-3 mar-bot-15">
                                            <label class="label bg-blue">50% <i class="fa fa-level-up"
                                                    aria-hidden="true"></i></label>
                                        </div>
                                        <div class="col-xs-9 cus-gh-hd-pro">
                                            <h2 class="text-right no-margin">
                                                <?php echo $totunreadqueries;?></h2>
                                        </div>
                                    </div>
                                    <div class="progress progress-mini">
                                        <div style="width: 60%;" class="progress-bar bg-blue"></div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        
                        
                        <!--content-->
                <div class="content" style="margin-top: 10px;">
                    <div class="women_main">
                        <!-- start content -->
                        <div class="grids">
                            <div class="form-body">
                                            <?php
                                            if(isset($_POST['search'])){ 
                                                $sdata=$_POST['searchdata'];
                                            ?>
                                            <h4 align="center">Result against "<?php echo $sdata;?>" keyword </h4>
                                            <table
                                                class="table table-bordered table-striped table-vcenter js-dataTable-full-pagination" id="example">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">S.No</th>
                                                        <th>Booking Number</th>
                                                        <th>Name</th>
                                                        <th class="d-none d-sm-table-cell">Email</th>
                                                        <th class="d-none d-sm-table-cell">Mobile Number</th>
                                                        <th class="d-none d-sm-table-cell">Booking Date<br>(yyyy-mm-dd | time)</th>
                                                        <th class="d-none d-sm-table-cell">Status</th>
                                                        <th class="d-none d-sm-table-cell" style="width: 15%;">Action
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    if (isset($_GET['pageno'])) {
                                                        $pageno = $_GET['pageno'];
                                                    } else {
                                                        $pageno = 1;
                                                    }
                                                    // Formula for pagination
                                                    $no_of_records_per_page = 3;
                                                    $offset = ($pageno-1) * $no_of_records_per_page;
                                                    $ret = "SELECT ID FROM hrs_tblbooking";
                                                    $result = mysqli_query($conn, $ret);
                                                    mysqli_fetch_all($result, MYSQLI_ASSOC);
                                                    $total_rows=$result->num_rows;
                                                    $total_pages = ceil($total_rows / $no_of_records_per_page);

                                                    $sql="SELECT hrs_tbluser.*,hrs_tblbooking.BookingNumber,hrs_tblbooking.ID,hrs_tblbooking.Status,hrs_tblbooking.BookingDate from hrs_tblbooking join hrs_tbluser on hrs_tblbooking.UserID=hrs_tbluser.ID where hrs_tblbooking.BookingNumber like '$sdata%' LIMIT $offset, $no_of_records_per_page";
                                                    
                                                    if($rs=$conn->query($sql)){
                                                        $cnt=1;
                                                        if($rs->num_rows>0){
                                                                if($row=$rs->fetch_assoc()){
                                                                    ?>
                                                    <tr>
                                                        <td class="text-center"><?php echo $cnt;?></td>
                                                        <td class="font-w600">
                                                            <?php  echo $row['BookingNumber'];?></td>
                                                        <td class="font-w600">
                                                            <?php  echo $row['FullName'];?></td>
                                                        <td class="d-none d-sm-table-cell">
                                                            <?php  echo $row['Email'];?></td>
                                                        <td class="d-none d-sm-table-cell">
                                                            <?php  echo $row['MobileNumber'];?></td>

                                                        <td class="d-none d-sm-table-cell">
                                                            <span
                                                                class="badge badge-primary"><?php  echo $row['BookingDate'];?></span>
                                                        </td>
                                                        <?php if($row['Status']==""){ ?>

                                                        <td class="font-w600"><?php echo "Not Updated Yet"; ?></td>
                                                        <?php } else { ?>
                                                        <td class="d-none d-sm-table-cell">
                                                            <span class="badge badge-warning"><?php  echo $row['Status'];?>
                                                        </td>
                                                        <?php } ?>
                                                        <td class="d-none d-sm-table-cell"><a
                                                                href="view-booking-detail.php?=&&bookingid=<?php echo $row['BookingNumber'];?>"><i
                                                                    class="fa fa-eye" aria-hidden="true"></i></a></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            
                                            <?php 
                                                $cnt=$cnt+1;
                                                                }
                                                            }else { ?>
                                            <tr>
                                                <td colspan="8"> No record found against this search</td>
                                            </tr>
                                            <?php }
                                                        }
                                                        else{
                                                            die("Error:".$conn->error);
                                                        }  }?>
                                        </div>
                                                    
                            <div class="panel panel-widget forms-panel">
                                <div class="forms">
                                    <div class="form-grids widget-shadow" data-example-id="basic-forms">
                                        <div class="form-title">
                                            <center><h4 style="padding: 15px;">All Booking</h4></center> 
                                        </div>
                                        <div class="form-body">
                                            <table
                                                class="table table-bordered table-striped table-vcenter js-dataTable-full-pagination" id="tables">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">S.No</th>
                                                        <th>Booking Number</th>
                                                        <th>Name</th>
                                                        <th class="d-none d-sm-table-cell">Email</th>
                                                        <th class="d-none d-sm-table-cell">Mobile Number</th>
                                                        <th class="d-none d-sm-table-cell">Booking Date<br>(yyyy-mm-dd | time)</th>
                                                        <th class="d-none d-sm-table-cell">Status</th>
                                                        <th class="d-none d-sm-table-cell" style="width: 15%;">Action
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    if (isset($_GET['pageno'])) {
                                                        $pageno = $_GET['pageno'];
                                                    } else {
                                                        $pageno = 1;
                                                    }
                                                    // Formula for pagination
                                                    $no_of_records_per_page = 10;
                                                    $offset = ($pageno-1) * $no_of_records_per_page;
                                                    $ret = "SELECT ID FROM hrs_tblbooking";

                                                    $result = mysqli_query($conn, $ret);
                                                    mysqli_fetch_all($result, MYSQLI_ASSOC);
                                                    $total_rows=$result->num_rows;
                                                    $total_pages = ceil($total_rows / $no_of_records_per_page);

                                                    $sql="SELECT hrs_tbluser.*,hrs_tblbooking.BookingNumber,hrs_tblbooking.ID,hrs_tblbooking.Status,hrs_tblbooking.BookingDate from hrs_tblbooking join hrs_tbluser on hrs_tblbooking.UserID=hrs_tbluser.ID  LIMIT $offset, $no_of_records_per_page";
                                                    
                                                    if($rs=$conn->query($sql)){
                                                        $cnt=1;
                                                        if($rs->num_rows>0){
                                                            while($row=$rs->fetch_assoc()){
                                                                ?>
                                                    <tr>
                                                        <td class="text-center"><?php echo $cnt;?></td>
                                                        <td class="font-w600">
                                                            <?php  echo $row['BookingNumber'];?></td>
                                                        <td class="font-w600">
                                                            <?php  echo $row['FullName'];?></td>
                                                        <td class="d-none d-sm-table-cell">
                                                            <?php  echo $row['Email'];?></td>
                                                        <td class="d-none d-sm-table-cell">
                                                            <?php  echo $row['MobileNumber'];?></td>

                                                        <td class="d-none d-sm-table-cell">
                                                            <span
                                                                class="badge badge-primary"><?php echo $row['BookingDate'];?></span>
                                                        </td>
                                                        <?php if($row['Status']==""){ ?>

                                                        <td class="font-w600"><?php echo "Not Updated Yet"; ?></td>
                                                        <?php } else { ?>
                                                        <td class="d-none d-sm-table-cell">
                                                            <span
                                                                class="badge badge-primary"><?php  echo $row['Status'];?></span>
                                                        </td>
                                                        <?php } ?>
                                                        <td class="d-none d-sm-table-cell"><a class = "view-a"
                                                                href="view-booking-detail.php?bookingid=<?php echo $row['BookingNumber'];?>"><i
                                                                    class="fa fa-eye" aria-hidden="true"></i></a></td>
                                                    </tr>
                                                    <?php $cnt=$cnt+1;
                                                            }
                                                        }else{
                                                            ?>
                                                    <tr>
                                                        <td colspan="8"
                                                            style="color:red; font-size:22px; text-align:center">No
                                                            record found</td>
                                                    </tr>
                                                    <?php 
                                                        }
                                                    }
                                                    else{
                                                        die("Error:".$conn->error);
                                                    }?>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>

                        <!-- end content -->
                        
                        
                    </div>
                    
                    

                    
                    
                    <div class="clearfix"></div>


                    <div class="content-top">


                        <?php include_once('includes/footer.php');?>
                    </div>
                    <!--content-->
                </div>

            </div>
            <!--//content-inner-->

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
        <!--js -->
        <script src="js/scripts.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
        <!-- /Bootstrap Core JavaScript -->
        <!-- real-time -->
        <script language="javascript" type="text/javascript" src="js/jquery.flot.js"></script>
        <script type="text/javascript">
        $(function() {

            // We use an inline data source in the example, usually data would
            // be fetched from a server

            var data = [],
                totalPoints = 300;

            function getRandomData() {

                if (data.length > 0)
                    data = data.slice(1);

                // Do a random walk

                while (data.length < totalPoints) {

                    var prev = data.length > 0 ? data[data.length - 1] : 50,
                        y = prev + Math.random() * 10 - 5;

                    if (y < 0) {
                        y = 0;
                    } else if (y > 100) {
                        y = 100;
                    }

                    data.push(y);
                }

                // Zip the generated y values with the x values

                var res = [];
                for (var i = 0; i < data.length; ++i) {
                    res.push([i, data[i]])
                }

                return res;
            }

            // Set up the control widget

            var updateInterval = 30;
            $("#updateInterval").val(updateInterval).change(function() {
                var v = $(this).val();
                if (v && !isNaN(+v)) {
                    updateInterval = +v;
                    if (updateInterval < 1) {
                        updateInterval = 1;
                    } else if (updateInterval > 2000) {
                        updateInterval = 2000;
                    }
                    $(this).val("" + updateInterval);
                }
            });

            var plot = $.plot("#placeholder", [getRandomData()], {
                series: {
                    shadowSize: 0 // Drawing is faster without shadows
                },
                yaxis: {
                    min: 0,
                    max: 100
                },
                xaxis: {
                    show: false
                }
            });

            function update() {

                plot.setData([getRandomData()]);

                // Since the axes don't change, we don't need to call plot.setupGrid()

                plot.draw();
                setTimeout(update, updateInterval);
            }

            update();

            // Add the Flot version string to the footer

            $("#footer").prepend("Flot " + $.plot.version + " &ndash; ");
        });
        </script>
        <!-- /real-time -->
        <script src="js/jquery.fn.gantt.js"></script>
        <script>
        $(function() {

            "use strict";

            $(".gantt").gantt({
                source: [{
                    name: "Sprint 0",
                    desc: "Analysis",
                    values: [{
                        from: "/Date(1320192000000)/",
                        to: "/Date(1322401600000)/",
                        label: "Requirement Gathering",
                        customClass: "ganttRed"
                    }]
                }, {
                    name: " ",
                    desc: "Scoping",
                    values: [{
                        from: "/Date(1322611200000)/",
                        to: "/Date(1323302400000)/",
                        label: "Scoping",
                        customClass: "ganttRed"
                    }]
                }, {
                    name: "Sprint 1",
                    desc: "Development",
                    values: [{
                        from: "/Date(1323802400000)/",
                        to: "/Date(1325685200000)/",
                        label: "Development",
                        customClass: "ganttGreen"
                    }]
                }, {
                    name: " ",
                    desc: "Showcasing",
                    values: [{
                        from: "/Date(1325685200000)/",
                        to: "/Date(1325695200000)/",
                        label: "Showcasing",
                        customClass: "ganttBlue"
                    }]
                }, {
                    name: "Sprint 2",
                    desc: "Development",
                    values: [{
                        from: "/Date(1326785200000)/",
                        to: "/Date(1325785200000)/",
                        label: "Development",
                        customClass: "ganttGreen"
                    }]
                }, {
                    name: " ",
                    desc: "Showcasing",
                    values: [{
                        from: "/Date(1328785200000)/",
                        to: "/Date(1328905200000)/",
                        label: "Showcasing",
                        customClass: "ganttBlue"
                    }]
                }, {
                    name: "Release Stage",
                    desc: "Training",
                    values: [{
                        from: "/Date(1330011200000)/",
                        to: "/Date(1336611200000)/",
                        label: "Training",
                        customClass: "ganttOrange"
                    }]
                }, {
                    name: " ",
                    desc: "Deployment",
                    values: [{
                        from: "/Date(1336611200000)/",
                        to: "/Date(1338711200000)/",
                        label: "Deployment",
                        customClass: "ganttOrange"
                    }]
                }, {
                    name: " ",
                    desc: "Warranty Period",
                    values: [{
                        from: "/Date(1336611200000)/",
                        to: "/Date(1349711200000)/",
                        label: "Warranty Period",
                        customClass: "ganttOrange"
                    }]
                }],
                navigate: "scroll",
                scale: "weeks",
                maxScale: "months",
                minScale: "days",
                itemsPerPage: 10,
                onItemClick: function(data) {
                    alert("Item clicked - show some details");
                },
                onAddClick: function(dt, rowId) {
                    alert("Empty space clicked - add an item!");
                },
                onRender: function() {
                    if (window.console && typeof console.log === "function") {
                        console.log("chart rendered");
                    }
                }
            });

            $(".gantt").popover({
                selector: ".bar",
                title: "I'm a popover",
                content: "And I'm the content of said popover.",
                trigger: "hover"
            });

            prettyPrint();

        });
        </script>
        <script src="js/menu_jquery.js"></script>
</body>

</html><?php }  ?>