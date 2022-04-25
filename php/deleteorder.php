<?php 
include("../config/database.php");
require_once '../vendor/autoload.php';
$db = new connect();
$id = $_GET['id'];
session_start();
if (isset($_POST['btn_sub']))
{
	 $subject = $_POST['subject'];
	 $msg = $_POST['msg'];
	 $email=$_POST['email'];
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
header("Location:../deleteorder.php?id=$id");
}
 ?>