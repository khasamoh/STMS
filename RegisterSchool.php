<?php
    include 'session.php';
    include 'Functionality/classes.php';
    $call = new STMS();
    if(isset($_POST['AddSchool'])){
       $call->AddSchool();
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
                            <form class="form-horizontal" method="post" action="RegisterSchool.php">
                                <div class="card-body">
                                    <h4 class="card-title">Register School</h4>
                                    <div class="form-group row">
                                        <label for="SchCode" class="col-sm-3 text-right control-label col-form-label">School Reg No.</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="SchoolCode" required placeholder="School Code Here">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="SchName" class="col-sm-3 text-right control-label col-form-label">School Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="SchoolName" required placeholder="School Name Here">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Region" class="col-sm-3 text-right control-label col-form-label">Region</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="Region">
                                                <option value="North Unguja">North Unguja</option>
                                                <option value="South Unguja">South Unguja</option>
                                                <option value="Urbun-West Unguja">Urbun-West Unguja</option>
                                                <option value="North Pemba">North Pemba</option>
                                                <option value="South Pemba">South Pemba</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="District" class="col-sm-3 text-right control-label col-form-label">District</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="District">
                                                <option value="Jangombe">Jangombe</option>
                                                <option value="Amani">Amani</option>
                                                <option value="Mwera">Mwera</option>
                                                <option value="Magomeni">Magomeni</option>
                                                <option value="Wete">Wete</option>
                                                <option value="Chake">Chake</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Category" class="col-sm-3 text-right control-label col-form-label">Category</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="Category">
                                                <option value="Government">Government</option>
                                                <option value="Private">Private</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="State" class="col-sm-3 text-right control-label col-form-label">State</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="State">
                                                <option value="Secondary">Secondary</option>
                                                <option value="Primary">Primary</option>
                                                <option value="Both">Both</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <button type="submit" name="AddSchool" class="btn btn-success"><i class="ti-plus"></i> Add</button>
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
       Swal.fire({toast:true, type:"success", title:"The School Added", animation:true, showConfirmButton: false, position:"top", timer:3000, timerProgressBar:true,});
    </script>
    <?php
   
        }
        if (isset($_SESSION['Exist'])) {
    ?>
    <script>
        Swal.fire({toast:true, type:"info", title:"This School Exist", animation:true, showConfirmButton: false, position:"top", timer:3000, timerProgressBar:true,});
    </script>
        <?php
        }
        unset($_SESSION['success']);
        unset($_SESSION['Exist']);
    ?>
</body>

</html>