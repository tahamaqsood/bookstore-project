<?php

include("../config/database.php");
$db = new connect();
session_start();

 if(isset($_POST['btn_sub']))
   {

        $fname = $_POST['first-name'];
        $lname = $_POST['last-name'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $tel = $_POST['tel'];
        $area = $_POST['cmb-area'];
    

        $update = $db->db_insert("update tbl_user SET firstname= '$fname', lastname= '$lname' , email = '$email' , address ='$address' , area='$area' , telephone ='$tel' where id ='$_SESSION[user_id]'");
        if($update==true)
        {
            header("Location:../myaccount.php?msg=success");
        }
        else
        {
            header("Location:../myaccount.php?msgfailure=fail");
        }

        


   }

?>