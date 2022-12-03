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
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="card">
                                <div class="card-body">
                                 <?php
                                 $SchlID = $_GET['SchlID'];
                                 global $conn;
                                 $sql = "SELECT * FROM tbl_School WHERE SchlID = $SchlID";
                                    $result = $conn->query($sql);
                                    $row = $result->fetch_assoc();
                                $sql1 = "SELECT COUNT(EmpNo) AS TotalTeacher FROM tbl_Sch_Tch inner join tbl_Teacher using(TchID) WHERE tbl_Sch_Tch.SchlID = $SchlID";
                                    $result1 = $conn->query($sql1);
                                    $row2 = $result1->fetch_assoc();
                                    $sql2 = "SELECT * FROM tbl_School INNER JOIN ((tbl_Sch_Year inner join tbl_YearClass using(SchYrID)) inner join tbl_Class using(ClassID))USING(SchlID) WHERE tbl_School.SchlID = '$SchlID'";
                                    $result2 = $conn->query($sql2);
                                    $OverRoll = 0;
                                    if($result2->num_rows > 0){
                                        while($row3 = $result2->fetch_assoc()){
                                            $OverRoll += $row3['TotalStudent'];
                                        }
                                    }
                                        
                                    echo "<div class='card-body'>
                                            <h3 class='card-title'>Information of School  <i style='color:#499dff'>{$row['SchlName']}</i></h3>
                                        <div class='row'>
                                            <div class='col-md-6'>
                                                <div class='row'>
                                                <label>School Code :</label>
                                                <p> {$row['SchlCode']}</p>
                                                </div>
                                                <div class='row'>
                                                <label>School Name :</label>
                                                <p> {$row['SchlName']}</p>
                                                </div>
                                                <div class='row'>
                                                <label>Region :</label>
                                                <p> {$row['Region']}</p>
                                                </div>
                                                <div class='row'>
                                                <label>District :</label>
                                                <p> {$row['District']}</p>
                                                </div>
                                                <div class='row'>
                                                <label>Category :</label>
                                                <p> {$row['CtgName']}</p>
                                                </div>
                                                <div class='row'>
                                                <label>State :</label>
                                                <p> {$row['CtgState']}</p>
                                                </div>
                                            </div>
                                            <div class='col-md-6'>
                                                <div class='row'>
                                                <label>Total Student :</label>
                                                <p> {$OverRoll}</p>
                                                </div>
                                                <div class='row'>
                                                <label>TotalTeacher : </label>
                                                <p> {$row2['TotalTeacher']}</p>
                                                </div>
                                            </div>
                                            </div>
                                        </div>

                                    
                                    </div>";
                                 ?> 
                                 <div class="border-top">
                                    <div class="card-body">
                                        <a href="ViewSchool.php" class="btn btn-primary">Cancel</a>
                                    </div>
                                </div>  
                                </div>
                        </div>
                    
                    </div>
                    <div class="col-md-2"></div>
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