<?php

$id = $_GET['id'];
include("../../config/database.php");
$db = new connect();

        
        $update = $db->deletepro("update tbl_subcat set status = 'Active' where id =$id");
        if($update>0)
        {
            header("Location:../viewsubcat.php");
        }



?>