<?php

include("../config/database.php");
$db = new connect();
require_once '../vendor/autoload.php';

 if(isset($_POST['btn_sub']))
   {
   		$fname = $_POST['first-name'];
        $lname = $_POST['last-name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $msg = $_POST['msg'];
        $insert = $db->db_insert("insert into tbl_contact (firstname,lastname,email,subject,message) values('$fname','$lname','$email','$subject','$msg')");

        // Create the Transport
$transport = (new Swift_SmtpTransport('smtp.gmail.com',465, 'ssl'))
  ->setUsername('shahardabookstore@gmail.com')
  ->setPassword('shahardabookstore110')
;

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);

// Create a message
$message = (new Swift_Message($subject))
  ->setFrom([$email => $email])
  ->setTo('shahardabookstore@gmail.com')
  ->setBody($msg)
  ;

// Send the message
$result = $mailer->send($message);
        if($insert==true)
        {
            header("Location:../contactus.php?msg=success");
        }
        


   }

?>