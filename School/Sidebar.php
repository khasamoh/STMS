<nav class="sidebar-nav">
    <ul id="sidebarnav" class="p-t-30">
        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="Dashboard.php" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>
        <li class="sidebar-item"><a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-account"></i><span class="hide-menu">Teacher</span></a>
            <ul aria-expanded="false" class="collapse  first-level">
                <?php
                    if($_SESSION['CtgName'] == "Private"){
                ?>
                 <li class="sidebar-item"><a href="RegisterTeacher.php" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> Add Teacher </span></a></li>
                 <?php
                    }
                 ?>
                <li class="sidebar-item"><a href="ViewTeacher.php" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> View Teachers </span></a></li><li class="sidebar-item"><a href="ViewComingTeacher.php" class="sidebar-link"><i class="fas fa-angle-double-right"></i><span class="hide-menu"> Comming Teacher </span></a></li>
            </ul>
        </li>
        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-account-multiple-outline"></i><span class="hide-menu">Add Total Students</span></a>
            <ul aria-expanded="false" class="collapse  first-level">
                <?php
                    if($_SESSION['CtgState'] == "Primary"){
                        echo "<li class='sidebar-item'> <a class='sidebar-link has-arrow waves-effect waves-dark' href='javascript:void(0)' aria-expanded='false'><i class='mdi mdi-home-variant'></i><span class='hide-menu'>Primary</span></a>
                        <ul aria-expanded='false' class='collapse  first-level'>";
                        echo $call->ViewClass("Primary");
                        echo "</ul>
                        </li>";
                    }elseif($_SESSION['CtgState'] == "Secondary"){
                        echo "<li class='sidebar-item'> <a class='sidebar-link has-arrow waves-effect waves-dark' href='javascript:void(0)' aria-expanded='false'><i class='mdi mdi-home-variant'></i><span class='hide-menu'>Secondary</span></a>
                        <ul aria-expanded='false' class='collapse  first-level'>";
                        echo $call->ViewClass("Secondary");
                        echo "</ul>
                        </li>";
                    }elseif($_SESSION['CtgState'] == "Both"){
                        echo "<li class='sidebar-item'> <a class='sidebar-link has-arrow waves-effect waves-dark' href='javascript:void(0)' aria-expanded='false'><i class='mdi mdi-home-variant'></i><span class='hide-menu'>Primary</span></a>
                        <ul aria-expanded='false' class='collapse  first-level'>";
                        echo $call->ViewClass("Primary");
                        echo "</ul>
                        </li>";
                        echo "<li class='sidebar-item'> <a class='sidebar-link has-arrow waves-effect waves-dark' href='javascript:void(0)' aria-expanded='false'><i class='mdi mdi-home-variant'></i><span class='hide-menu'>Secondary</span></a>
                        <ul aria-expanded='false' class='collapse  first-level'>";
                        echo $call->ViewClass("Secondary");
                        echo "</ul>
                        </li>";
                    }
                ?>
                
            </ul>
        </li>
        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="SchoolClasses.php" aria-expanded="false"><i class="mdi mdi-home-variant"></i><span class="hide-menu">View Classes</span></a></li>
    </ul>
</nav>