<?php

$id = $_GET['id'];
include("../../config/database.php");
$db = new connect();

        
        $update = $db->deletepro("update tbl_cat set status = 'Active' where id =$id");
        if($update>0)
        {
            header("Location:../viewcat.php");
        }



?>