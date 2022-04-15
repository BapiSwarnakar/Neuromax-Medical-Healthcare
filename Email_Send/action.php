<?php
require_once("sending_mail/PHPMailerAutoload.php");
require_once ("sending_mail/class.phpmailer.php");
require_once ("class/admin.php");
$server=new Admin_Site;
if(isset($_POST['submit']))
{
    $email = $_POST['email'];
    $subject = 'This is Subject';
    $body = '<p>This is Body Tag</p>';
    if($server->Send_email($email,$subject,$body))
    {
    	echo "success";
    }
    else
    {
    	echo "Error";
    }
}