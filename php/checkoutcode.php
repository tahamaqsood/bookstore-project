<?php

include("../config/database.php");
require_once '../vendor/autoload.php';
$db = new connect();
session_start();
$id=$_SESSION['user_id'];
$area = $_POST['cmb-area'];
$distance = 3000;



if(isset($_POST['submit']))
   {
    $charges= 100;
    $loc=$db->db_select1("select * from tbl_area where name = '$area'");
    $rows = mysqli_fetch_array($loc);
if ($rows['distance'] > $distance) {
      
      $order= $_POST['ordernum'];
      $user= $id;
      $fname = $_POST['first-name'];
      $lname = $_POST['last-name'];
      $email = $_POST['email'];
      $address = $_POST['address'];
      $telephone = $_POST['tel'];
      $area = $_POST['cmb-area'];
      $orderdate = $_POST['date'];
      $payment = $_POST['payments'];
      $productid = $_POST['productid'];
      $quantity = $_POST['qty'];
      $total = $_POST['total']+100;
      $shippingcharges = '100';
      $subject='Thank you for buying our product';
       $insert = $db->db_insert("insert into tbl_order(order_id, user_id,firstname,lastname,email,address,area,telephone,orderdate,payment_mode,Total,shippingcharges) values ('$order','$user','$fname','$lname','$email','$address','$area','$telephone','$orderdate','$payment','$total','$shippingcharges')") or die("Data into table of order has not been inserted");

    }
    else
    {
      $order= $_POST['ordernum'];
      $user= $id;
      $fname = $_POST['first-name'];
      $lname = $_POST['last-name'];
      $email = $_POST['email'];
      $address = $_POST['address'];
      $telephone = $_POST['tel'];
      $area = $_POST['cmb-area'];
      $orderdate = $_POST['date'];
      $payment = $_POST['payments'];
      $productid = $_POST['productid'];
      $quantity = $_POST['qty'];
      $total = $_POST['total'];
      $shippingcharges= '0';
      $subject='Thank you for buying our product';
       $insert = $db->db_insert("insert into tbl_order(order_id, user_id,firstname,lastname,email,address,area,telephone,orderdate,payment_mode,Total,shippingcharges) values ('$order','$user','$fname','$lname','$email','$address','$area','$telephone','$orderdate','$payment','$total','$shippingcharges')") or die("Data into table of order has not been inserted");

    }

      foreach ($productid as $row) {


         $insert2 = $db->db_insert("insert into tbl_orderdetails(order_id,product_id,quantity) values (
          '$order','$row[0]','$row[2]')") or die("Data into table of order details has not been inserted");

         $update = $db->db_update("update tbl_product SET quantity = quantity - '$row[2]' WHERE id= '$row[0]'");
       

         
      }
      
        if($insert & $insert2 & $update==true)
        {
          $qq = $db->get_max_id("id");
          $fetch = mysqli_fetch_array($qq);
          $id =  $fetch[0];
            header("Location:../ordersummary.php?id=$id");
            unset($_SESSION["scart"]);
        }
        


   }



?> 
