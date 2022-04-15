<?php
require_once("../db_connect/db_connect.php");
require_once("../class/class.php");
$server = new  Main_Classes;
if(isset($_GET['hash']) && !empty($_GET['hash']))
{
	$hash = $_GET['hash'];
	$sql ="UPDATE `tbl_user` SET `User_Verify_Status`='Yes' WHERE `User_Email_Verify`='$hash'";
	if($server->Data_Upload($sql))
	{
		echo "<script>window.location='../index.php?code=".$hash."'</script>";
	}
	else{
		die("Technical Issue. Please Try Again.. !");
	} 
}

?>