<?php

$id = $_GET['pid'];
include("../../config/database.php");
$db = new connect();

        
        $delete = $db->deletepro("update tbl_cat set status = 'Un-Active' where id =$id");
        if($delete>0)
        {
            header("Location:../viewcat.php");
        }



?>