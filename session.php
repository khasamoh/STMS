<?php
session_start();
if (!empty($_SESSION['UID']) && !empty($_SESSION['Privl']))
{
	$_SESSION['UID'];
	$_SESSION['Name'];
	$_SESSION['Privl'];
	if($_SESSION['Privl'] == "School"){
		$_SESSION['SchlID'];
		$_SESSION['SchlName'];
		$_SESSION['CtgName'];
		$_SESSION['CtgState'];
	}	
}else
{
header("location:index.php");
}

?>