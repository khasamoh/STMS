<?php
    include '../session.php';
    include '../Functionality/classSchool.php';
    $call = new STMSchool();
    if(isset($_POST['ApproveTeacher'])){
           $call->AssignTeacherToSchool();
        }
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title>School And Teacher Monitoring System</title>
    <!-- Custom CSS -->
    <link href="../assets/extra-libs/calendar/calendar.css" rel="stylesheet" />
    <link href="../assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    <link href="../dist/css/style.min.css" rel="stylesheet">
    <style type="text/css">
        .A{width:100%}
        .D{margin:108px 0 0 0px;}
    </style>
</head>

<body>
    <div id="main-wrapper">
        <header class="topbar" data-navbarbg="skin5">
            <?php include 'Header.php';?>
        </header>
        <aside class="left-sidebar" data-sidebarbg="skin5">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <?php include 'Sidebar.php';?>
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <div class="page-wrapper">
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-md-6 col-lg-3">
                            <a  class="nav-link waves-effect waves-dark A" href="" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                                <div class="card card-hover">
                                    <div class="box bg-success text-center">
                                        <h1 class="font-light text-white"><i class="mdi mdi-account"></i></h1>
                                        <h6 class="text-white">TEACHERS</h6>
                                        <h6 class="text-white"><i class="mdi mdi-account"></i>Science <span class="mail-desc"><?php echo $call->Count("Science")?></span> </h6>
                                        <h6 class="text-white"><i class="mdi mdi-account"></i>Art <span class="mail-desc"> <?php echo $call->Count("Art")?></span> </h6>
                                        <h6 class="text-white"><i class="mdi mdi-account-multiple"></i>Total<span class="mail-desc"> <?php echo $call->Count("SchlTech")?></span> </h6>
                                    </div>
                                </div>
                            </a>
                    </div>
                    <div class="col-md-6 col-lg-3">
                            <a  class="nav-link waves-effect waves-dark A" href="" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                                <div class="card card-hover">
                                    <div class="box bg-cyan text-center">
                                        <h1 class="font-light text-white"><i class="mdi mdi-human-male-female"></i></h1>
                                        <h6 class="text-white">OVER ROll</h6>
                                        <h4 class="text-white"><?php echo $call->Count("OverRoll")?></h4>
                                    </div>
                                </div>
                            </a>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-3">
                            <a  class="nav-link waves-effect waves-dark A"  href="ViewComingTeacher.php"> 
                                <div class="card card-hover">
                                    <div class="box bg-danger text-center">
                                        <h1 class="font-light text-white"><i class="mdi mdi-chevron-double-down"></i></h1>
                                        <h6 class="text-white">COMMING TEACHERS</h6>
                                        <h4 class="text-white"><?php echo $call->Count("ComingTech")?></h4>
                                    </div>
                                </div>
                            </a>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-3">
                            <a  class="nav-link waves-effect waves-dark A" href="SchoolClasses.php"> 
                                <div class="card card-hover">
                                    <div class="box bg-warning text-center">
                                        <h1 class="font-light text-white"><i class="mdi mdi-home-variant"></i></h1>
                                        <h6 class="text-white">CLASSES</h6>
                                    </div>
                                </div>
                            </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">List Of Teachers <a href="ViewComingTeacher.php"><span style="margin-left:30px;"><i class="fas fa-angle-double-right"></i> Comming Teacher</span></a></h5>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Emplo No.</th>
                                                <th>Full Name</th>
                                                <th>Gender</th>
                                                <th>Address</th>
                                                <th>Age</th>
                                                <th>Phone</th>
                                                <th>Email</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $call->ViewSchoolTeacher();?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                <?php include '../footer.php';?>
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../dist/js/jquery.ui.touch-punch-improved.js"></script>
    <script src="../dist/js/jquery-ui.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="../assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="../dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="../dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="../dist/js/custom.min.js"></script>
    <!-- this page js -->
    <script src="../assets/libs/moment/min/moment.min.js"></script>
    <script src="../assets/libs/fullcalendar/dist/fullcalendar.min.js"></script>
    <script src="../dist/js/pages/calendar/cal-init.js"></script>
    <script src="../assets/extra-libs/DataTables/datatables.min.js"></script>
    <script>$('#zero_config').DataTable();</script>

</body>

</html>