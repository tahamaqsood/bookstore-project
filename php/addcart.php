<?php 
session_start();
$pid = $_POST['id'];
$qty = $_POST['qty'];
$price = $_POST['price'];
$name = $_POST['name'];
$_SESSION['scart'] [$pid] = array("id"=>$pid,"qty"=>$qty,"price"=>$price,"name"=>$name) or die("Sesion Not Created");

echo '<script>window.history.back();</script>'

 ?>

