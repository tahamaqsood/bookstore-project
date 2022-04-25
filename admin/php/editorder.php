<?php

include("../../config/database.php");
$db = new connect();

 if(isset($_POST['btn_sub']))
   {
        $id=$_POST['id'];
        $orderid=$_POST['orderid'];
        $orderdate=$_POST['orderdate'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email=$_POST['email'];
        $address=$_POST['address'];
        $area=$_POST['area'];
        $tel=$_POST['tel'];
        $status=$_POST['combo'];
        $paymentstatus=$_POST['combopay'];
        $paymentmode=$_POST['combomode'];
        
    

        $update = $db->db_update("update tbl_order set order_id='$orderid',firstname='$fname',lastname='$lname',email='$email',address='$address',area='$area',telephone='$tel',orderdate='$orderdate',payment_mode='$paymentmode',payment_status='$paymentstatus',status='$status' where id = '$id'");
        if($update==true)
        {
            header("Location:../vieworder.php?msg=success");
        }

        


   }

?>