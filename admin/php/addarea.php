<?php

include("../../config/database.php");
$db = new connect();

 if(isset($_POST['btn_sub']))
   {
   		$name = $_POST['name'];
        $distance = $_POST['distance'];
        $insert = $db->db_insert("insert into tbl_area (name,distance) values('$name','$distance')");
        if($insert==true)
        {
            header("Location:../addarea.php?msg=success");
        }
        


   }

?>