<?php

$id = $_GET['pid'];
include("../../config/database.php");
$db = new connect();

        
        $delete = $db->deletepro("update vproduct set status = 'Un-Active' where id =$id");
        if($delete>0)
        {
            header("Location:../viewpro.php");
        }



?>