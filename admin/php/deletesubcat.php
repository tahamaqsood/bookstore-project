<?php

$id = $_GET['pid'];
include("../../config/database.php");
$db = new connect();

        
        $delete = $db->deletepro("update tbl_subcat set status = 'Un-Active' where id =$id");
        if($delete>0)
        {
            header("Location:../viewsubcat.php");
        }



?>