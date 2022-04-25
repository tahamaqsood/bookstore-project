<?php 
include("../config/database.php");
$db = new connect();
session_start();

$id=$_SESSION['user_id'];
$card = $_SESSION['card'];

if (isset($_POST['submit']))
{
$_SESSION['code']."<br>";
$code = $_POST['concode'];

	if ($_SESSION['code']==$code)
	{
$insert = $db->db_insert("insert into tbl_bankaccount(user_id,account_number)values('$id','$card')");	 
	 header("Location:../myaccount.php?Card=SuccessfullyAdded");
	  unset($_SESSION['code']);
	 unset($_SESSION['card'] );
	 unset($_SESSION['name'] );
	 unset($_SESSION['date']); 
	 unset($_SESSION['key']);
	header("Location:../cardconformation.php?message=SuccessfullyAdded");
	}
			
	 
	else
	{
		header("Location:../cardconformation.php?msg=InvalidCode");
	}
	
	}
?>