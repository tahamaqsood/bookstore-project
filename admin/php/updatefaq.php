<?php

include("../../config/database.php");
$db = new connect();

 if(isset($_POST['btn_sub']))
   {
        $id=$_POST['id'];
        $pcode=$_POST['pcode'];
        $name = $_POST['name'];
        $category=$_POST['cat'];
        $quantity=$_POST['qty'];
        $price=$_POST['price'];
        $desc=$_POST['desc'];
        $featurepro=$_POST['combo'];
        $shortdesc=$_POST['shortdesc'];
    

        $insert = $db->db_insert("update tbl_product SET product_code= '$pcode', name= '$name' , quantity = '$quantity' , price ='$price' , description='$desc' , featurepro ='$featurepro' , short_description = '$shortdesc' where id ='$id'");
        if($insert==true)
        {
            header("Location:../viewpro.php?msg=success");
        }

        


   }

?>