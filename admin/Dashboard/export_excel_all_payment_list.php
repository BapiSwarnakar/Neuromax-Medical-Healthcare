<?php
require_once("../../db_connect/db_connect.php");
require_once("../../class/class.php");
$server= new Main_Classes;
$server->admin_session_private();
if(isset($_GET['id']) && !empty($_GET['id']))
{
  $id =  $_GET['id'];
  $id = str_replace(' ',',',$id);
  $sql ="SELECT tbl_online_appointment.Order_Id,tbl_doctor_master.Doc_Name,tbl_user.User_Name,tbl_user.User_Mobile,tbl_payment.Pay_Order_Id,tbl_payment.Pay_Mode,tbl_payment.Pay_Amount,tbl_payment.Pay_Bank,DATE(tbl_payment.Pay_Date) AS Pay_Date FROM `tbl_online_appointment` INNER JOIN tbl_user on tbl_user.User_Id=tbl_online_appointment.Cust_Id INNER JOIN tbl_doctor_master ON tbl_doctor_master.Doc_Id=tbl_online_appointment.Doc_Id INNER JOIN tbl_payment ON tbl_payment.Order_Id=tbl_online_appointment.Order_Id WHERE tbl_online_appointment.Order_Id IN($id) ORDER BY DATE(tbl_payment.Pay_Date) DESC";

	if($row =$server->All_Record($sql))
    {
    	if($row>0)
    	{
    	  $data='';
    	  $data .='<table class="table" border="1">
         <tr>
            <th>Sl. No</th>
            <th>Doctor</th>
            <th>Patient Name</th>
            <th>Mobile</th>
            <th>Order Id</th>
            <th>Pay Mode</th>
            <th>Pay Amount</th>
            <th>Pay Bank</th>
            <th>Pay Date</th>
         </tr>
    	';
    	$count = 1;
      $total_amount=0;
    	foreach ($server->View_details as $value) {
    		
    		$data.='
              <tr>
               <td>'.$count.'</td>
               <td>'.$value['Doc_Name'].'</td>
               <td>'.$value['User_Name'].'</td>
               <td>'.$value['User_Mobile'].'</td>
               <td>'.$value['Pay_Order_Id'].'</td>
               <td>'.$value['Pay_Mode'].'</td>
               <td>'.number_format($value['Pay_Amount'],2).'</td>
               <td>'.$value['Pay_Bank'].'</td>
               <td>'.$value['Pay_Date'].'</td>
              </tr>
    		';

    	 $count++;
       $total_amount +=$value['Pay_Amount'];
    	}

      $data .='<tr>
       <td colspan="5">Total Record : '.$row.'</td>
       <td colspan="4">Total Amount : '.number_format($total_amount,2).'</td>
       </tr>';
     
	   $data .='</table>';
	   header('Content-type:application/vnd.ms-excel');
	   header('Content-Disposition:attachment;filename='.rand().'.xls');
	   echo $data;
    	}
    	else
    	{
    		echo "<script>alert('Record not found')</script>";
    	    header("location:payment_details.php");
    	}

    	
    }
    else
    {
        echo "<script>alert('Record not found')</script>";
        header("location:payment_details.php");
    } 

  }
  else
  {
     echo "<script>alert('Not Select Any Record')</script>";
     echo "<script>window.location='payment_details.php'</script>";
     // header("location:display_patient.php");
  }  

?>