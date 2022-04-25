<?php

$id = $_GET['faqid'];
include("../../config/database.php");
$db = new connect();

        
        $delete = $db->deletepro("update tbl_faq set status = 'Un-Active' where id =$id");
        if($delete>0)
        {
            header("Location:../viewfaq.php");
        }



?>