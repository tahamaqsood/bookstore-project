<?php

$id = $_GET['id'];
include("../../config/database.php");
$db = new connect();

        
        $delete = $db->deletepro("update tbl_user set status = 'Un-Active' where id =$id");
        if($delete>0)
        {
            header("Location:../viewuser.php");
        }



?>