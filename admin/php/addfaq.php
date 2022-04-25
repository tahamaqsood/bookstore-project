<?php

include("../../config/database.php");
$db = new connect();

 if(isset($_POST['btn_sub']))
   {
   		$title = $_POST['name'];
        $description = $_POST['desc'];
        $creation_date= $_POST['date'];
        $insert = $db->db_insert("insert into tbl_faq(title,description,creation_date) values ('$title', '$description', '$creation_date')");
        if($insert==true)
        {
            header("Location:../addfaq.php?msg=success");
        }
        


   }

?>