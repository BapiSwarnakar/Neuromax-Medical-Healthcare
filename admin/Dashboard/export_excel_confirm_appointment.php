<?php
require_once("../../db_connect/db_connect.php");
require_once("../../class/class.php");
$server= new Main_Classes;
$server->admin_session_private();
if(isset($_GET['id']) && !empty($_GET['id']))
{
  $id =  $_GET['id'];
  $id = str_replace(' ',',',$id);
  $sql ="SELECT `Order_Id`,App_date, tbl_doctor_master.Doc_Id, `Cust_Id`, `App_Day`, `App_Shift`, `App_Time`, `Order_Status`, DATE(Order_Created_Date) AS Order_Created_Date,tbl_user.User_Name,tbl_user.User_Mobile,tbl_user.User_Email,tbl_doctor_master.Doc_Name FROM `tbl_online_appointment` INNER JOIN tbl_user ON tbl_user.User_Id =tbl_online_appointment.Cust_Id INNER JOIN tbl_doctor_master ON tbl_doctor_master.Doc_Id=tbl_online_appointment.Doc_Id WHERE  tbl_online_appointment.Order_Status='Confirm' AND Order_Id IN($id) ORDER BY tbl_online_appointment.Order_Created_Date DESC";

	if($row =$server->All_Record($sql))
    {
    	if($row>0)
    	{
    	  $data='';
    	  $data .='<table class="table" border="1">
         <tr>
            <th>Sl. No</th>
            <th>Doctor</th>
            <th>Name</th>
            <th>Mobile</th>
            <th>Day</th>
            <th>Shift</th>
            <th>Time</th>
            <th>Status</th>
            <th>Appointment Date</th>
            <th>Date</th>
         </tr>
    	';
    	$count = 1;
    	foreach ($server->View_details as $value) {
    		
    		$data.='
              <tr>
                <td>'.$count.'</td>
                <td>'.$value['Doc_Name'].'</td>
                <td>'.$value['User_Name'].'</td>
                <td>'.$value['User_Mobile'].'</td>
                <td>'.$value['App_Day'].'</td>
                <td>'.$value['App_Shift'].'</td>
                <td>'.$value['App_Time'].'</td>
                <td>'.$value['Order_Status'].'</td>
                <td>'.$value['App_date'].'</td>
                <td>'.$value['Order_Created_Date'].'</td>
              </tr>
    		';

    	 $count++;
    	}
     
	   $data .='</table>';
	   header('Content-type:application/vnd.ms-excel');
	   header('Content-Disposition:attachment;filename='.rand().'.xls');
	   echo $data;
    	}
    	else
    	{
    		echo "<script>alert('Record not found')</script>";
    	    header("location:confirm_appointment.php");
    	}

    	
    }
    else
    {
        echo "<script>alert('Record not found')</script>";
        header("location:confirm_appointment.php");
    } 

  }
  else
  {
     echo "<script>alert('Not Select Any Record')</script>";
     echo "<script>window.location='confirm_appointment.php'</script>";
     // header("location:display_patient.php");
  }  

?>