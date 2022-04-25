<?php

include("../config/database.php");
$db = new connect();

 if(isset($_POST['btn_signup']))
   {
   		$fname = $_POST['first-name'];
        $lname = $_POST['last-name'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $tel = $_POST['tel'];
        $area = $_POST['cmb-area'];
        $pass = md5($_POST['pass']);
        $insert = $db->db_insert("insert into tbl_user (firstname,lastname,email,address,area,telephone,password) values('$fname','$lname','$email','$address','$area','$tel','$pass')");
        if($insert==true)
        {
            header("Location:../Accounts.php?msg=success");
        }
        


   }

?>