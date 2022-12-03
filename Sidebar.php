<nav class="sidebar-nav">
    <ul id="sidebarnav" class="p-t-30">
        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="AdminDashboard.php" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>
        <?php
            if($_SESSION['Privl'] == "Director"){
        ?>
        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="ViewSchool.php" aria-expanded="false"><i class="mdi mdi-bank"></i><span class="hide-menu">View School</span></a></li>
        <?php
            }else{
        ?>
        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-account-key"></i><span class="hide-menu">User</span></a>
            <ul aria-expanded="false" class="collapse  first-level">
                <li class="sidebar-item"><a href="AddUser.php" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> Add User </span></a></li>
                <li class="sidebar-item"><a href="ViewUser.php" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> View Users </span></a></li>
            </ul>
        </li>
        <li class="sidebar-item"><a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-account"></i><span class="hide-menu">Teacher</span></a>
            <ul aria-expanded="false" class="collapse  first-level">
                <li class="sidebar-item"><a href="RegisterTeacher.php" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> Add Teacher </span></a></li>
                <li class="sidebar-item"><a href="ViewTeacher.php" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> View Teachers </span></a></li>
            </ul>
        </li>
        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-bank"></i><span class="hide-menu">Schools</span></a>
            <ul aria-expanded="false" class="collapse  first-level">
                <li class="sidebar-item"><a href="RegisterSchool.php" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> Add School </span></a></li>
                <li class="sidebar-item"><a href="ViewSchool.php" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> View School </span></a></li>
            </ul>
        </li>
        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-book-open-variant"></i><span class="hide-menu">Subject</span></a>
            <ul aria-expanded="false" class="collapse  first-level">
                <li class="sidebar-item"><a href="AddSubject.php" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> Add Subject </span></a></li>
                <li class="sidebar-item"><a href="ViewSubject.php" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> View Subject </span></a></li>
            </ul>
        </li>
        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-home-variant"></i><span class="hide-menu">Class</span></a>
            <ul aria-expanded="false" class="collapse  first-level">
                <li class="sidebar-item"><a href="#" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> Add Class </span></a></li>
                <li class="sidebar-item"><a href="#" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> View Class </span></a></li>
            </ul>
        </li>
    </ul>
</nav>
<?php
    }
?>