<?php

include("../../config/database.php");
$db = new connect();

 if(isset($_POST['btn_sub']))
   {    
        $id=$_POST['id'];
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $email=$_POST['email'];
        $address = $_POST['address'];
        $telephone=$_POST['telephone'];
        $status=$_POST['combo'];
       
        $update = $db->db_update("update tbl_user set firstname='$fname', lastname='$lname', email='$email', address='$address', telephone='$telephone', status='$status' where id = $id");
        if($update==true)
        {
            header("Location:../viewuser.php?msg=success");
        }

        


   }

?>