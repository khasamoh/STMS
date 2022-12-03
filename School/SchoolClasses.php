<?php
    include '../session.php';
    include '../Functionality/classSchool.php';
    $call = new STMSchool();
    if(isset($_POST['UpdateTotalStu'])){
           $call->UpdateTotalStudent();
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
    <?php include '../headLink.php';?>
    <link href="../assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    <link href="../dist/css/style.min.css" rel="stylesheet">
    <style type="text/css">
        .inputSrch{width:30%;align-self:center;margin-top:10px}
        .title{margin-left:25px;width:30%}
        span{margin-left:10px}
    </style>
</head>

<body>
    <div id="main-wrapper">
        <header class="topbar" data-navbarbg="skin5">
            <?php include 'Header.php';?>
        </header>
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <aside class="left-sidebar" data-sidebarbg="skin5">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                 <?php include 'Sidebar.php';?>
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <div class="page-wrapper">
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">List Of Class <span><i class="mdi mdi-human-male-female"></i>Over Roll: <?php echo $call->Count("OverRoll")?></span></h5>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Academic Year</th>
                                                <th>Class Name</th>
                                                <th>Total Student</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $call->ViewSchoolClasses();?>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
            <footer class="footer text-center">
                <?php include '../footer.php';?>
            </footer>
        </div>
    </div>
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="../assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Menu sidebar -->
    <script src="../dist/js/sidebarmenu.js"></script>
    <link href="../dist/css/sweetalert.min.css" rel="stylesheet">
    <script src="../dist/js/sweetalert2.all.min.js"></script>
    <!--Custom JavaScript -->
    <script src="../dist/js/custom.min.js"></script>
    <script src="../assets/extra-libs/DataTables/datatables.min.js"></script>
    <script>$('#zero_config').DataTable();</script>
    <?php
        if (isset($_SESSION['Updated'])) {
    ?>
    <script>
       Swal.fire({toast:true, type:"success", title:"Total Student Updated", animation:true, showConfirmButton: false, position:"top", timer:3000, timerProgressBar:true,});
    </script>
    <?php
   
        }
        unset($_SESSION['Updated']);
    ?>
</body>

</html>