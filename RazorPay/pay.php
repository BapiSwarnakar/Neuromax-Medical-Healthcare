<?php
require_once("../class/class.php");
require_once("../db_connect/db_connect.php");
require('config.php.sample');
require('razorpay-php/Razorpay.php');
$server= new Main_Classes;
if(isset($_POST['Payment_page']))
{

    //echo $_POST['ord_Id']; 
    $_SESSION['order_id']=$_POST['id'];
    $sql="SELECT `Order_Id`,tbl_user.User_Name,tbl_user.User_Mobile,tbl_user.User_Email,tbl_doctor_master.Doc_Name,tbl_doctor_appointment.App_Fees FROM `tbl_online_appointment` INNER JOIN tbl_user ON tbl_user.User_Id =tbl_online_appointment.Cust_Id INNER JOIN tbl_doctor_master ON tbl_doctor_master.Doc_Id=tbl_online_appointment.Doc_Id INNER JOIN tbl_payment_status ON tbl_payment_status.pay_Id =tbl_online_appointment.pay_status INNER JOIN tbl_doctor_appointment ON tbl_online_appointment.Doc_Id=tbl_doctor_appointment.Doc_Id WHERE tbl_online_appointment.Order_Id='$_POST[id]' GROUP BY tbl_doctor_appointment.Doc_Id";
    if($server->All_Record($sql))
    {
        foreach ($server->View_details as $value) {
                # code...
        }
    }
    else
    {
        echo "Invalid Access...!";
        exit(); 
    }
}
else
{
    echo "Invalid Access";
    exit();
}

//Create the Razorpay Order

use Razorpay\Api\Api;

$api = new Api($keyId, $keySecret);

//
// We create an razorpay order using orders api
// Docs: https://docs.razorpay.com/docs/orders
//
$orderData = [
    'receipt'         => 3456,
    'amount'          => $value['App_Fees'] * 100, // 2000 rupees in paise
    'currency'        => 'INR',
    'payment_capture' => 1 // auto capture
];

$razorpayOrder = $api->order->create($orderData);

$razorpayOrderId = $razorpayOrder['id'];

$_SESSION['razorpay_order_id'] = $razorpayOrderId;

$displayAmount = $amount = $orderData['amount'];

if ($displayCurrency !== 'INR')
{
    $url = "https://api.fixer.io/latest?symbols=$displayCurrency&base=INR";
    $exchange = json_decode(file_get_contents($url), true);

    $displayAmount = $exchange['rates'][$displayCurrency] * $amount / 100;
}

$checkout = 'automatic';

if (isset($_GET['checkout']) and in_array($_GET['checkout'], ['automatic', 'manual'], true))
{
    $checkout = $_GET['checkout'];
}

$data = [
    "key"               => $keyId,
    "amount"            => $amount,
    "name"              => $value['User_Name'],
    "description"       => "Online Payment",
    "image"             => "https://s29.postimg.org/r6dj1g85z/daft_punk.jpg",
    "prefill"           => [
    "name"              =>  $value['User_Name'],
    "email"             =>  $value['User_Email'],
    "contact"           =>  $value['User_Mobile'],
    ],
    "notes"             => [
    "address"           => "Hello World",
    "merchant_order_id" => "12312321",
    ],
    "theme"             => [
    "color"             => "#F37254"
    ],
    "order_id"          => $razorpayOrderId,
];

if ($displayCurrency !== 'INR')
{
    $data['display_currency']  = $displayCurrency;
    $data['display_amount']    = $displayAmount;
}

$json = json_encode($data);

if(isset($_POST['id']))
{
   require("checkout/{$checkout}.php");
}
else
{
    echo "Access Denied";
}
