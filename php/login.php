<?php

include("../config/database.php");
$db = new connect();

if (isset($_POST['btn_login']))
{
	$email = $_POST['email'];
	$password = md5($_POST['pass']);
	$db->user_login($email,$password);

}

 ?>