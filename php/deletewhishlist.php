<?php

include("../config/database.php");
$db = new connect();

 if(isset($_POST['delete']))
   {
   		
        $proid = $_POST['proid'];
        $userid = $_POST['userid'];

        $delete = $db->deletepro("delete from tbl_wishlist WHERE product_id='$proid' and user_id='$userid'");
       
   

        if($delete>0)
        {
          header("Location:../wishlist.php?deletesuccess=deleted");
        }
        else
        {
          header("Location:../wishlist.php?deletefailed=Notdeleted");
        }


   }

?>