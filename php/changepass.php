<?php

include("../config/database.php");
$db = new connect();
session_start();

 if(isset($_POST['btn_sub']))
   {
   		 $old = md5($_POST['oldpass']);
         $new = md5($_POST['newpass']);
        
      $user = $db->db_select1("select * from tbl_user where id = $_SESSION[user_id] ");
      foreach ($user as $p)
      
         if ($old==$p['password']) 
         {
          $update = $db->db_update("update tbl_user set password = '$new' where id= '$_SESSION[user_id]'");
            header("Location:../myaccount.php?msgsuccess=success");
          
         }
         else
         {
          header("Location:../myaccount.php?msgfail=failed");
         }
         
        
       /* $insert = $db->db_insert("insert into tbl_contact (firstname,lastname,email,subject,message) values('$fname','$lname','$email','$subject','$msg')");*/
        /*if($insert==true)
        {
            header("Location:../contactus.php?msg=success");
        }
        */


   }

?>