<?php
session_start();
$_SESSION['UID'];
$_SESSION['Name'];
$_SESSION['Privl'];
$_SESSION['SchlID'];
$_SESSION['SchlName'];

session_destroy();
header("Location:index.php")
?>