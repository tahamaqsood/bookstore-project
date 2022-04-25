<?php

$id = $_GET['id'];
include("../../config/database.php");
$db = new connect();

        
        $delete = $db->deletepro("delete from tbl_contact where id =$id");
        if($delete>0)
        {
            header("Location:../viewcontact.php?msg=success");
        }



?>