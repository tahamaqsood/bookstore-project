<?php

include("../../config/database.php");
$db = new connect();

 if(isset($_POST['btn_sub']))
   {
        $code = $_POST['code'];
        $name = $_POST['name'];
        $catid = $_POST['cmb_cat'];
        $insert = $db->db_insert("insert into tbl_subcat (subcat_code,subcat_name,category_id) values('$code','$name','$catid')");
        if($insert==true)
        {
            header("Location:../addsubcat.php?msg=success");
        }
        


   }

?>