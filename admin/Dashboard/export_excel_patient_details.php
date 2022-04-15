<?php
require_once("../../db_connect/db_connect.php");
require_once("../../class/class.php");
$server= new Main_Classes;
$server->admin_session_private();
if(isset($_GET['id']) && !empty($_GET['id']))
{
  $id =  $_GET['id'];
  $id = str_replace(' ',',',$id);
  $sql = "SELECT `User_Id`, `User_Name`, `User_Gender`, `User_Dob`, `User_Email`, `User_Mobile`, `User_Address`, `User_Password`, `User_Email_Verify`, `User_Verify_Status`, DATE(User_Added_Date) AS User_Added_Date  FROM `tbl_user` WHERE User_Id IN($id)";

	if($row =$server->All_Record($sql))
    {
    	if($row>0)
    	{
    	  $data='';
    	  $data .='<table class="table" border="1">
         <tr>
            <th>Sl. No</th>
            <th>Patient Name</th>
            <th>Gender</th>
            <th>Date of Birth</th>
            <th>Email</th>
            <th>Mobile No</th>
            <th>Address</th>
            <th>Date</th>
         </tr>
    	';
    	$count = 1;
    	foreach ($server->View_details as $value) {
    		
    		$data.='
              <tr>
                <td>'.$count.'</td>
                <td>'.$value['User_Name'].'</td>
                <td>'.$value['User_Gender'].'</td>
                <td>'.$value['User_Dob'].'</td>
                <td>'.$value['User_Email'].'</td>
                <td>'.$value['User_Mobile'].'</td>
                <td>'.$value['User_Address'].'</td>
                <td>'.$value['User_Added_Date'].'</td>
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
    	    header("location:display_patient.php");
    	}

    	
    }
    else
    {
        echo "<script>alert('Record not found')</script>";
        header("location:display_patient.php");
    } 

  }
  else
  {
     echo "<script>alert('Not Select Any Record')</script>";
     echo "<script>window.location='display_patient.php'</script>";
     // header("location:display_patient.php");
  }  

?>