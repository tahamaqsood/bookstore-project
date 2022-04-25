<?php

include("../../config/database.php");
$db = new connect();

if (isset($_POST['btn_sub']))
{
	$name = $_POST['name'];
	$password = md5($_POST['password']);
	$db->admin_login($name,$password);

}
 ?>