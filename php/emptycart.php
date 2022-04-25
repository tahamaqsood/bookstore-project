<?php 
session_start();

unset($_SESSION["scart"]);
echo '<script>window.history.back();</script>';

 ?>