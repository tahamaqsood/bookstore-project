<?php 
include("../config/database.php");
require_once '../vendor/autoload.php';
$db = new connect();
session_start();
if (isset($_POST['submit']))
{

	 $user = $db->db_select1("select * from tbl_bankaccount where user_id = $_SESSION[user_id] ");
      foreach ($user as $p)
     $cardno = $_POST['cardno'];
      if ($cardno==$p['account_number']) 
       {
       	header("Location:../addcard.php?failure=Cardalreadyadded");
       }
      

  else{
	 $_SESSION['code'] = $_POST['code'];
	 $_SESSION['card'] = $_POST['cardno'];
	 $_SESSION['name'] = $_POST['name'];
	 $_SESSION['date'] = $_POST['date'];
	 $_SESSION['key'] = $_POST['key'];
	 $_SESSION['email'] = $_POST['email'];
	 $email=$_POST['email'];
 // Create the Transport
$transport = (new Swift_SmtpTransport('smtp.gmail.com',465, 'ssl'))
  ->setUsername('shahardabookstore@gmail.com')
  ->setPassword('shahardabookstore110')
;

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);

// Create a message
$message = (new Swift_Message("Security Key"))
  ->setFrom(['shahardabookstore@gmail.com' => 'Card Comfirmation'])
  ->setTo($email)
  ->setBody("Your Card Confirmation Code is:".$_POST['code'])

  ;

// Send the message
$result = $mailer->send($message);
header("Location:../cardconformation.php");
}
}
 ?>