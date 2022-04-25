<?php

include("../config/database.php");
$db = new connect();

 if(isset($_POST['btn_review']))
   {
   		 $name = $_POST['name'];
       $email = $_POST['email'];
       $review = $_POST['review'];
       $date = $_POST['date'];
       $rating = $_POST['rating'];
        $id = $_POST['id'];

        $insert = $db->db_insert("insert into tbl_review (product_id, name, email, review, datetime, rating) values ('$id','$name','$email','$review','$date','$rating')");
       
        echo '<script>window.history.back();</script>';

   }

?>