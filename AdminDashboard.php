<?php
    include 'session.php';
    include 'Functionality/classSchool.php';
    $call = new STMS();
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
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>School And Teacher Monitoring System</title>
    <!-- Custom CSS -->
    <link href="assets/extra-libs/calendar/calendar.css" rel="stylesheet" />
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    <link href="dist/css/style.min.css" rel="stylesheet">
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
                                    <div class="box bg-cyan text-center">
                                        <h1 class="font-light text-white"><i class="mdi mdi-bank"></i></h1>
                                        <h6 class="text-white">SCHOOLS</h6>
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right mailbox animated bounceInDown D" aria-labelledby="2">
                                <ul class="list-style-none">
                                    <li>
                                        <div class="">
                                             <!-- Message -->
                                            <a href="javascript:void(0)" class="link border-top">
                                                <div class="d-flex no-block align-items-center p-10">
                                                    <span class="btn btn-success btn-circle"><i class="fas fa-warehouse"></i></span>
                                                    <div class="m-l-10">
                                                        <h5 class="m-b-0">Government School</h5> 
                                                        <span class="mail-desc"><?php echo $call->Count("Government")?></span> 
                                                    </div>
                                                </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="javascript:void(0)" class="link border-top">
                                                <div class="d-flex no-block align-items-center p-10">
                                                    <span class="btn btn-info btn-circle"><i class="mdi mdi-bank"></i></span>
                                                    <div class="m-l-10">
                                                        <h5 class="m-b-0">Private School</h5> 
                                                        <span class="mail-desc"><?php echo $call->Count("Private")?></span> 
                                                    </div>
                                                </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="javascript:void(0)" class="link border-top">
                                                <div class="d-flex no-block align-items-center p-10">
                                                    <span class="btn btn-primary btn-circle"><i class="mdi mdi-format-list-bulleted"></i></span>
                                                    <div class="m-l-10">
                                                        <h5 class="m-b-0">Total School</h5> 
                                                        <span class="mail-desc"><?php echo $call->Count("School")?></span> 
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-3">
                            <a  class="nav-link waves-effect waves-dark A" href="" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                                <div class="card card-hover">
                                    <div class="box bg-success text-center">
                                        <h1 class="font-light text-white"><i class="mdi mdi-account"></i></h1>
                                        <h6 class="text-white">TEACHERS</h6>
                                    </div>
                                </div>
                            </a>
                            <div  class="dropdown-menu dropdown-menu-right mailbox animated bounceInDown D" aria-labelledby="2">
                                <ul class="list-style-none">
                                    <li>
                                        <div class="">
                                            <a href="javascript:void(0)" class="link border-top">
                                                <div class="d-flex no-block align-items-center p-10">
                                                    <span class="btn btn-success btn-circle"><i class="mdi mdi-check-all"></i></span>
                                                    <div class="m-l-10">
                                                        <h5 class="m-b-0">Assigned Teachers</h5> 
                                                        <span class="mail-desc"><?php echo $call->Count("Assigned")?></span> 
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="javascript:void(0)" class="link border-top">
                                                <div class="d-flex no-block align-items-center p-10">
                                                    <span class="btn btn-info btn-circle"><i class="mdi mdi-check"></i></span>
                                                    <div class="m-l-10">
                                                        <h5 class="m-b-0">UnAssigned Teachers</h5> 
                                                        <span class="mail-desc"><?php echo $call->Count("UnAssigned")?></span> 
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="javascript:void(0)" class="link border-top">
                                                <div class="d-flex no-block align-items-center p-10">
                                                    <span class="btn btn-primary btn-circle"><i class="mdi mdi-format-list-bulleted"></i></span>
                                                    <div class="m-l-10">
                                                        <h5 class="m-b-0">Total Teachers</h5> 
                                                        <span class="mail-desc"><?php echo $call->Count("Teacher")?></span> 
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-3">
                        <?php 
                            if($_SESSION['Privl'] != "Director"){
                            ?>
                            <a  class="nav-link waves-effect waves-dark A" href="RegisterSchool.php"> 
                                <div class="card card-hover">
                                    <div class="box bg-warning text-center">
                                        <h1 class="font-light text-white"><i class="mdi mdi-plus"></i></h1>
                                        <h6 class="text-white">ADD SCHOOL</h6>
                                    </div>
                                </div>
                            </a>
                            <?php
                                }else{

                                }
                            ?>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-3">
                        <?php 
                            if($_SESSION['Privl'] != "Director"){
                            ?>
                            <a  class="nav-link waves-effect waves-dark A"  href="RegisterTeacher.php"> 
                                <div class="card card-hover">
                                    <div class="box bg-danger text-center">
                                        <h1 class="font-light text-white"><i class="mdi mdi-plus"></i></h1>
                                        <h6 class="text-white">ADD TEACHER</h6>
                                    </div>
                                </div>
                            </a>
                            <?php
                                }else{

                                }
                            ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">List Of Users <a href="AddUser.php"><span style="margin-left:30px;"><i class="mdi mdi-plus"></i> Create New</span></a></h5>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <?php 
                                            if($_SESSION['Privl'] != "Director"){
                                            ?>
                                        <thead>
                                            <tr>
                                                <th>Full Name</th>
                                                <th>Gender</th>
                                                <th>Address</th>
                                                <th>Phone</th>
                                                <th>Email</th>
                                                <th>User Name</th>
                                                <th>Privilage</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $call->ViewUser();?>
                                        </tbody>
                                        <tfoot>
                                        </tfoot>
                                        <?php
                                            }else{
                                        ?>
                                            <thead>
                                            <tr>
                                                <th>Reg No.</th>
                                                <th>School Name</th>
                                                <th>Region</th>
                                                <th>District</th>
                                                <th>Categery</th>
                                                <th>State</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $call->ViewSchool();?>
                                        </tbody>
                                        <?php
                                            }
                                        ?>
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
                <?php include 'footer.php';?>
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
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="dist/js/jquery.ui.touch-punch-improved.js"></script>
    <script src="dist/js/jquery-ui.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="dist/js/custom.min.js"></script>
    <!-- this page js -->
    <script src="assets/libs/moment/min/moment.min.js"></script>
    <script src="assets/libs/fullcalendar/dist/fullcalendar.min.js"></script>
    <script src="dist/js/pages/calendar/cal-init.js"></script>
    <script src="assets/extra-libs/DataTables/datatables.min.js"></script>
    <script>$('#zero_config').DataTable();</script>

</body>

</html>