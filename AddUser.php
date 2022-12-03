<?php
    include 'session.php';
    include 'Functionality/classes.php';
    $call = new STMS();
    if(isset($_POST['adduser'])){
        $call->AddUser();
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
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="card">
                            <form class="form-horizontal" method="post" action="AddUser.php">
                                <div class="card-body">
                                    <h4 class="card-title">Create User</h4>
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">First Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="FName" required placeholder="First Name Here">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Last Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="LName" required placeholder="Last Name Here">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Gender" class="col-sm-3 text-right control-label col-form-label">Gender</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="Gender">
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Address" class="col-sm-3 text-right control-label col-form-label">Address</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="Address" required placeholder="Address Here">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Phone" class="col-sm-3 text-right control-label col-form-label">Phone</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="Phone" required placeholder="Phone Here">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email" class="col-sm-3 text-right control-label col-form-label">Email</label>
                                        <div class="col-sm-9">
                                            <input type="email" class="form-control" name="Email" required placeholder="Email Here">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="UserName" class="col-sm-3 text-right control-label col-form-label">User Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="UserName" required placeholder="User Name Here">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="password" class="col-sm-3 text-right control-label col-form-label">Password</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control" name="Password" required placeholder="Password Here">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Privilage" class="col-sm-3 text-right control-label col-form-label">Privilage</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="Privilage">
                                                <option value="Administrator">Administrator</option>
                                                <option value="Director">Director</option>
                                                <option value="School">School</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Status" class="col-sm-3 text-right control-label col-form-label">Status</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="Status">
                                                <option value="Active">Active</option>
                                                <option value="Deactive">Deactive</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <button type="submit" name="adduser" class="btn btn-success"><i class="ti-plus"></i> Add</button>
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
    <?php
        if (isset($_SESSION['Success'])) {
    ?>
    <script>
       Swal.fire({toast:true, type:"success", title:"The User Added", animation:true, showConfirmButton: false, position:"top", timer:3000, timerProgressBar:true,});
    </script>
    <?php
   
        }
        if (isset($_SESSION['Exist'])) {
    ?>
    <script>
        Swal.fire({toast:true, type:"info", title:"This UserName Exist", animation:true, showConfirmButton: false, position:"top", timer:3000, timerProgressBar:true,});
    </script>
        <?php
        }
        unset($_SESSION['Success']);
        unset($_SESSION['Exist']);
    ?>
</body>

</html>