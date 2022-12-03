<?php
    include 'session.php';
    include 'Functionality/classes.php';
    $call = new STMS();
        if(isset($_POST['AssignTeacher'])){
           $call->AssignTeacherToSchool();
        }
        if(isset($_POST['updateTeacher'])){
           $call->UpdateTeacher();
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
    <?php include 'headLink.php';?>
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
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">List Of Teachers <a href="RegisterTeacher.php"><span style="margin-left:30px;"><i class="mdi mdi-plus"></i> Create New</span></a><a href="ViewTeacherAssinged.php"><span style="margin-left:30px;"><i class="mdi mdi-check-all"></i> Assigned To School</span></a><a href="ViewTeacherUnAssinged.php"><span style="margin-left:30px;"><i class="mdi mdi-check"></i> Not Assigned</span></a></h5>
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
                                            <?php $call->ViewTeacher();?>
                                        </tbody>
                                        <tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer text-center">
                <?php include 'footer.php';?>
            </footer>
        </div>
    </div>
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Menu sidebar -->
    <script src="dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="dist/js/custom.min.js"></script>
    <script src="assets/extra-libs/DataTables/datatables.min.js"></script>
    <script src="assets/libs/select2/dist/js/select2.full.min.js"></script>
    <script type="text/javascript">$(".select2").select2();</script>
    <script> $('#zero_config').DataTable();</script>

    <?php
        if (isset($_SESSION['Assigned'])) {
    ?>
    <script>
       Swal.fire({toast:true, type:"success", title:"Teacher Successful Assigned to School", animation:true, showConfirmButton: false, position:"top", timer:3000, timerProgressBar:true,});
    </script>
    <?php
   
        }
        if (isset($_SESSION['Updated'])) {
    ?>
    <script>
        Swal.fire({toast:true, type:"success", title:"The Teacher Updated", animation:true, showConfirmButton: false, position:"top", timer:3000, timerProgressBar:true,});
    </script>
        <?php
        }
        unset($_SESSION['Assigned']);
        unset($_SESSION['Updated']);
    ?>

</body>

</html>