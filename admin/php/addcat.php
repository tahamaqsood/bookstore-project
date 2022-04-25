<?php

include("../../config/database.php");
$db = new connect();

 if(isset($_POST['btn_sub']))
   {
   		$code = $_POST['code'];
        $name = $_POST['name'];
        $insert = $db->db_insert("insert into tbl_cat (cat_code,cname) values('$code','$name')");
        if($insert==true)
        {
            header("Location:../category.php?msg=success");
        }
        


   }

?>