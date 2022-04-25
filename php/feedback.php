<?php

include("../config/database.php");
$db = new connect();

 if(isset($_POST['btn_sub']))
   {
   		$rate = $_POST['rate'];
        $name = $_POST['name'];
        $email = $_POST['em'];
        $msg = $_POST['msg'];
        $insert = $db->db_insert("insert into tbl_feedback (name,email,rate,message) values('$name','$email','$rate','$msg')");
        if($insert==true)
        {
            header("Location:../feedback.php?msg=success");
        }
        


   }

?>