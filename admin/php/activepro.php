<?php

$id = $_GET['pid'];
include("../../config/database.php");
$db = new connect();

        
        $update = $db->deletepro("update tbl_product set status = 'Active' where id =$id");
        if($update>0)
        {
            header("Location:../viewpro.php");
        }



?>