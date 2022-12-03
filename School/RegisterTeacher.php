<?php
    include '../session.php';
    include '../Functionality/classSchool.php';
    $call = new STMSchool();
        if(isset($_POST['btnAddTeacher'])){
            $call->AddTeacher("School");
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
    <link href="../dist/css/style.min.css" rel="stylesheet">
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
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <div class="card">
                            <form class="form-horizontal row" method="post" action="RegisterTeacher.php">
                                <div class="col-sm-6">
                                    <div class="card-body">
                                        <h4 class="card-title">Register Teacher</h4>
                                        <div class="form-group row">
                                            <label for="EmpNo" class="col-sm-3 text-right control-label col-form-label">Employee No</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="EmpNo" required placeholder="Employee No Here">
                                            </div>
                                        </div>
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
                                            <label for="Dob" class="col-sm-3 text-right control-label col-form-label">Dob</label>
                                            <div class="col-sm-9">
                                                <input type="date" class="form-control" name="Dob" required placeholder="Date Of Birth Here">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="Image" class="col-sm-3 text-right control-label col-form-label">Upload Image</label>
                                            <div class="col-sm-9">
                                                <input type="file" class="form-control" name="img" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="card-body">
                                        <h5 class="card-title"><i>Education Background</i></h5>
                                         <div class="form-group row">
                                            <label for="Level" class="col-sm-3 text-right control-label col-form-label">Edu_Level</label>
                                            <div class="col-sm-9">
                                                <select class="form-control" name="Level">
                                                    <option value="PHD">PHD</option>
                                                    <option value="Master">Master</option>
                                                    <option value="Degree">Degree</option>
                                                    <option value="Diploma">Diploma</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="Title" class="col-sm-3 text-right control-label col-form-label">Edu_Title</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="Title" required placeholder="Education Title Here">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="Year" class="col-sm-3 text-right control-label col-form-label">Edu_Year</label>
                                            <div class="col-sm-9">
                                                <input type="number" min="1980" class="form-control" name="Year" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="Category" class="col-sm-3 text-right control-label col-form-label">Edu_Category</label>
                                            <div class="col-sm-9">
                                                <select class="form-control" name="Category">
                                                    <option value="SCIENCE">SCIENCE</option>
                                                    <option value="ART">ART</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="Certificate" class="col-sm-3 text-right control-label col-form-label">Upload_Cert.</label>
                                            <div class="col-sm-9">
                                                <input type="file" class="form-control" name="CertImg" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 border-top">
                                        <div class="card-body" style="float:right;">
                                            <button type="submit" name="btnAddTeacher" class="btn btn-success"><i class="ti-plus"></i> Add</button>
                                            <button type="reset" class="btn btn-primary">Reset</button>
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                </div>
            </div>
            <footer class="footer text-center">
                <?php include '../footer.php';?>
            </footer>
        </div>
    </div>
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="../assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Menu sidebar -->
    <script src="../dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="../dist/js/sweetalert2.all.min.js"></script>
    <script src="../dist/js/custom.min.js"></script>
    <script src="../dist/js/custom.min.js"></script>
    <?php
        if (isset($_SESSION['Success'])) {
    ?>
    <script>
       Swal.fire({toast:true, type:"success", title:"The Teacher Added", animation:true, showConfirmButton: false, position:"top", timer:3000, timerProgressBar:true,});
    </script>
    <?php
   
        }
        if (isset($_SESSION['Exist'])) {
    ?>
    <script>
        Swal.fire({toast:true, type:"info", title:"This Employee No Exist", animation:true, showConfirmButton: false, position:"top", timer:3000, timerProgressBar:true,});
    </script>
        <?php
        }
        unset($_SESSION['Success']);
        unset($_SESSION['Exist']);
    ?>
</body>

</html>