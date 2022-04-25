<?php

include("../config/database.php");
$db = new connect();
session_start();

if(isset($_SESSION['user_id']))
{
if(isset($_POST['btn_wishlist']))
{
    
$proid = $_POST['id'];
$user_id = $_POST['userid'];
       
$query = $db->check($proid,$user_id);

if (mysqli_num_rows($query) > 0) {
header("Location:../wishlist.php?fail=Alreadyadded");
}      

else
{
   $insert = $db->db_insert("insert into tbl_wishlist (product_id,user_id) values('$proid','$user_id')");
   header("Location:../wishlist.php?success=Added");
}
}
}

else
{
	header("Location:../Accounts.php");
}

?>