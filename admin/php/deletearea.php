<?php

$id = $_GET['id'];
include("../../config/database.php");
$db = new connect();

        
        $delete = $db->deletepro("delete from tbl_area where id =$id");
        if($delete>0)
        {
            header("Location:../viewarea.php?msg=success");
        }



?>