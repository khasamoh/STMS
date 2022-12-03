<?php
    include 'session.php';
    include 'Functionality/classes.php';
    $call = new STMS();
    if(isset($_POST['AddSubject'])){
       $call->AddSubject();
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
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="card">
                            <form class="form-horizontal" method="post" action="AddSubject.php">
                                <div class="card-body">
                                    <h4 class="card-title">Register Subject</h4>
                                    <div class="form-group row">
                                        <label for="SbjCode" class="col-sm-3 text-right control-label col-form-label">Subject Code</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="SubjectCode" required placeholder="Subject Code Here">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="SubjName" class="col-sm-3 text-right control-label col-form-label">Subject Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="SubjectName" required placeholder="Subject Name Here">
                                        </div>
                                    </div>
                                </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <button type="submit" name="AddSubject" class="btn btn-success"><i class="ti-plus"></i> Add</button>
                                        <button type="reset" class="btn btn-primary">Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    
                    </div>
                    <div class="col-md-3"></div>
                </div>
            </div>
            <footer class="footer text-center">
                <?php include 'footer.php';?>
            </footer>
        </div>
    </div>
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Menu sidebar -->
    <script src="dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="dist/js/custom.min.js"></script>
    <script type="text/javascript">
        $(".select2").select2();
    </script>
    <?php
        if (isset($_SESSION['Success'])) {
    ?>
    <script>
       Swal.fire({toast:true, type:"success", title:"The Subject Added", animation:true, showConfirmButton: false, position:"top", timer:3000, timerProgressBar:true,});
    </script>
    <?php
   
        }
        if (isset($_SESSION['Exist'])) {
    ?>
    <script>
        Swal.fire({toast:true, type:"info", title:"This Subject Exist", animation:true, showConfirmButton: false, position:"top", timer:3000, timerProgressBar:true,});
    </script>
        <?php
        }
        unset($_SESSION['Success']);
        unset($_SESSION['Exist']);
    ?>
</body>

</html>