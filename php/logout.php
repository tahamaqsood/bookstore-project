<?php 

session_start();
unset($_SESSION["user_name"]);
unset($_SESSION["user_id"]);
unset($_SESSION["email"]);
echo '<script>window.history.back();</script>';


 ?>