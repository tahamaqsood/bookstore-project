<?php

include("../../config/database.php");
$db = new connect();

 if(isset($_POST['btn_sub']))
   {
        $pcode=$_POST['pcode'];
        $name = $_POST['name'];
        $category=$_POST['cmb_cat'];
        $quantity=$_POST['qty'];
        $price=$_POST['price'];
        $desc=$_POST['desc'];
        $featurepro=$_POST['combo'];
        $shortdesc=$_POST['shortdesc'];

        $insert = $db->db_insert("insert into tbl_product(product_code, name, subcat_id, quantity, price , description,featurepro,short_description) values ('$pcode','$name','$category','$quantity','$price','$desc','$featurepro','$shortdesc')");
        if($insert==true)
        {
            header("Location:../product.php?msg=success");
        }

        


   }

?>