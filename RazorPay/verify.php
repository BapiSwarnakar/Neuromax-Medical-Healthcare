<?php
require_once('../sending_mail/PHPMailerAutoload.php');
require_once('../sending_mail/class.phpmailer.php');
require_once("../class/class.php");
require_once("../db_connect/db_connect.php");
require('config.php.sample');
require('razorpay-php/Razorpay.php');

$server= new Main_Classes;

date_default_timezone_set('Asia/Kolkata');
$current_date = date('d-m-Y h:i');
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

$success = true;

$error = "Payment Failed";
$api = new Api($keyId, $keySecret);
if (empty($_POST['razorpay_payment_id']) === false)
{
    

    try
    {
        // Please note that the razorpay order ID must
        // come from a trusted source (session here, but
        // could be database or something else)
        $attributes = array(
            'razorpay_order_id' => $_SESSION['razorpay_order_id'],
            'razorpay_payment_id' => $_POST['razorpay_payment_id'],
            'razorpay_signature' => $_POST['razorpay_signature']
        );

        $api->utility->verifyPaymentSignature($attributes);
    }
    catch(SignatureVerificationError $e)
    {
        $success = false;
        $error = 'Razorpay Error : ' . $e->getMessage();
    }
}

if ($success === true)
{
    // $html = "<p>Your payment was successful</p>
    //          <p>Payment ID: {$_POST['razorpay_payment_id']}</p>";
    $payment = $api->payment->fetch($_POST['razorpay_payment_id']);
    $file_name = $_SESSION['order_id'].'_'.time();
    $data = [
        'payment_id'=>$payment['id'],
        'order_id'=>$payment['order_id'],
        'amount'=>$payment['amount']/100,
        'currency'=>$payment['currency'],
        'bank'=>$payment['bank'],
        'email'=>$payment['email'],
        'contact'=>$payment['contact'],
        'App_Ord_Id'=>$_SESSION['order_id'],
        'Time'=>$current_date
    ];
   $write_data = json_encode($data,true);
   $file = fopen('Payment_file/'.$file_name,'w');
    if(fwrite($file,$write_data)==false)
    {
       echo "Technical Issue. Please Wait for Sometime..!";
    }
    else
    {
        $sql = "INSERT INTO `tbl_payment`(`Pay_Id`, `Pay_Order_Id`, `Order_Id`, `Pay_Mode`, `Pay_Type`, `Pay_Amount`, `Pay_Bank`) VALUES (null,
       '$data[payment_id]','$data[App_Ord_Id]','Online','Online','$data[amount]','$data[bank]')";
       if($server->Data_Upload($sql))
       {
          $sql1 = "UPDATE `tbl_online_appointment` SET `pay_status`=1 WHERE `Order_Id`='$data[App_Ord_Id]'";
          if($server->Data_Upload($sql1))
          {
            $subject = "Neuromax Healthcare";
            $body = "
            <div style='background-color:#64D5A6;color:white;width:100%;height:100%;text-align:center;padding:5px;'>
               <h2>Payment Successfully Done<h2>
               <p>Rupees : $data[amount]</p>
               <p>Transection id: $data[payment_id] </p>
               <p>Transection Mode: Online </p>
               <p>Transection Type: Online </p>
               <p>Pay : $data[bank] </p>
            <div>
             ";
             if($server->Send_email($data['email'],$subject,$body))
             {
               echo "<script>window.location='success.php?mail=success'</script>";
             }
             else
             {
               echo "<script>window.location='success.php?mail=error'</script>";
             }
          }
          else
          {
            echo "Technical issue, Please try again..!";
          }  
       }
       else
       {
         echo "Technical issue, Please try again..!";
       }

    }
    
}
else
{
    // $html = "<p>Your payment failed</p>
    //          <p>{$error}</p>";
    echo "Payment Failed";
}

//echo $html;
