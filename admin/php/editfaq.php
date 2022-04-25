<?php

include("../../config/database.php");
$db = new connect();

 if(isset($_POST['btn_sub']))
   {
        $id=$_POST['id'];      
        $name = $_POST['title'];
        $desc=$_POST['desc'];
        $status = $_POST['combo'];
 
        $update = $db->db_update("update tbl_faq set title='$name' , description='$desc' , Status='$status' where id ='$id'");
        if($update>0)
        {
            header("Location:../viewfaq.php?msg=success");
        }


   }

?>