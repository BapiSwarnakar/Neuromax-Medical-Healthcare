<?php
require_once('../sending_mail/PHPMailerAutoload.php');
require_once('../sending_mail/class.phpmailer.php');
require_once("../db_connect/db_connect.php");
require_once("../class/class.php");
$server = new Main_Classes;

if(isset($_POST['action']))
{
  date_default_timezone_set("Asia/Kolkata");
  $current_date = date('d-M-Y h:i');
  ////////////////////////  ADMIN LOGIN Start ///////////////////////////////////
	if($_POST['page']=="Admin_form")
	{
		$username = $server->clean_data($_POST['Userame']);
		$password = $server->clean_data($_POST['Password']);

		$sql = "SELECT `Admin_Id`, `Admin_Username`, `Admin_Password`, `Admin_Created` FROM `tbl_admin` WHERE Admin_Username='$username'";
		if($server->All_Plan_Option($sql))
		{
			foreach ($server->all_plan_option as $key => $value) {
				# code...
			}
			if($value['Admin_Username']!=$username)
			{
				$output = array(
			         'error' =>'Invalid Userame !'
					);
			}
			else
			{
				if($value['Admin_Password']!=$password)
				{
					$output = array(
			         'error' =>'Invalid Password !'
					);
				}
				else
				{
					$_SESSION['Admin_logged_in']= $value['Admin_Id'];
					$output = array(
			         'success' =>'Login Successfully'
					);
				}
				
			}
			
		}
		else
		{
			$output = array(
	         'error' =>'Invalid Userame or Password !'
			);
		}
		

	 echo json_encode($output);
	}

///////////////////////////// Admin Login Exit ////////////////////////////////////

// Add Department
if($_POST['page']=="doctor_department_form_submit")
{
  $query = "SELECT `Dept_Id`, `Dept_Name`, `Dept_Date` FROM `table_department_master` WHERE Dept_Name='$_POST[department]'";
  if($server->All_Record($query))
  {
    $output = array(
        'error'=>'This Department is Already Exist !'
    );
  }
  else
  {
     $sql = "INSERT INTO `table_department_master`(`Dept_Id`, `Dept_Name`) VALUES (null,'$_POST[department]')";
      if($server->Data_Upload($sql))
      {
         $output = array(
            'success'=>'Added Successfully'
         );
      }
      else
      {
         $output = array(
            'error'=>'Technical issue. Please try again..!'
         );
      }
  }
 
echo json_encode($output);
}

// All Department  Display
if($_POST['page']=="All_Department_Display")
{
  $sql = "SELECT `Dept_Id`, `Dept_Name`, `Dept_Date` FROM `table_department_master` ORDER BY Dept_Id DESC";
    if($server->All_Record($sql))
    {
      $count=1;
      $output ='';
       foreach ($server->View_details as $value) {
         
         $output .='
                <tr>
                   <td>'.$count.'</td>
                   <td>'.$value['Dept_Name'].'</td>
                   <td>'.$value['Dept_Date'].'</td>
                   <td><a href="view_department.php?id='.base64_encode($value['Dept_Id']).'" class="btn btn-warning btn-sm  Edit_Department" data-id="'.$value['Dept_Id'].'"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>&nbsp;&nbsp;<a href="javascript:void(0)" class="btn btn-danger btn-sm  Delete_Department" data-id="'.$value['Dept_Id'].'"><i class="fas fa-trash"></i></a></td>
                </tr>
         ';
      $count++;
       }
    echo $output;
    }
}

// Delete Department

if($_POST['page']=="Delete_Department")
{
   $sql ="DELETE FROM `table_department_master` WHERE Dept_Id='$_POST[id]'";
   if($server->Data_Upload($sql))
   {
     $output=  array(
        'success'=>'Delete Successfully'
     );
   }
   else
   {
     $output= array(
       'error'=>'Technical issue. Please try again..!'
     );
   }
echo json_encode($output);
}

// Edit Department

if($_POST['page']=="Update_doctor_department_form_submit")
{
  $sql = "SELECT `Dept_Id`, `Dept_Name`, `Dept_Date` FROM `table_department_master` WHERE Dept_Name='$_POST[department]'";
  if($server->All_Record($sql))
  {
     $output = array(
        'error'=>'This Name is Already Exist !'
     );
  }
  else
  {
     $query = "UPDATE `table_department_master` SET `Dept_Name`='$_POST[department]' WHERE `Dept_Id`='$_POST[id]'";
     if($server->Data_Upload($query))
     {
        $output = array(
           'success'=>'Update Successfully'
        );
     }
     else
     {
         $output = array(
           'error'=>'Technical issue . Please try again..!'
         );
     }
  }
echo json_encode($output);
}

//   Add Doctor 

if($_POST['page']=="Personal_Details_form")
{
  if(!empty($_SESSION['last_id']))
  {
     $sql = "UPDATE `tbl_doctor_master` SET `Doc_Name`='$_POST[name]',`Doc_Lic`='$_POST[License]',`Doc_Mobile`='$_POST[mobile]',`Doc_Email`='$_POST[email]' WHERE Doc_Id='$_SESSION[last_id]'";
     if($server->Data_Upload($sql))
     {
      $output = array(
         'success'=>true
      );
     }
     else
     {
       $output = array(
          'error'=>'Technical issue. Please try again..!'
       );
     }
  }
  else
  {
    $sql = "INSERT INTO `tbl_doctor_master`(`Doc_Id`, `Doc_Name`, `Doc_Lic`, `Doc_Mobile`, `Doc_Email`, `Doc_Added_Date`) VALUES (null,'$_POST[name]','$_POST[License]','$_POST[mobile]','$_POST[email]','$current_date')";
    if($server->Data_Upload($sql))
    {
       $_SESSION['last_id'] = $server->lastid;
       $output = array(
          'success'=>true
       );
    }
    else
    {
      $output = array(
        'error'=>'Technical issue. Please try again..!'
      );
    }
  }

echo json_encode($output);
}

// Add Education details
if($_POST['page']=="Education_details")
{
  $sql = "INSERT INTO `tbl_doctor_education`(`Edu_Id`, `Doc_Id`, `Edu_Degree`, `Edu_Year`, `Edu_University`, `Edu_Added_Date`) VALUES (null,'$_SESSION[last_id]','$_POST[Degree]','$_POST[Year]','$_POST[University]','$current_date')";
  if($server->Data_Upload($sql))
  {
    $output = array(
       'success'=>true
    );
  }
  else
  {
     $output = array(
       'error'=>'Technical issue. Please try again..!'
     );
  }
echo json_encode($output);
}
//  Display Education Details

if($_POST['page']=="Display_Education_Details")
{
  $sql = "SELECT `Edu_Id`, `Doc_Id`, `Edu_Degree`, `Edu_Year`, `Edu_University`, `Edu_Added_Date` FROM `tbl_doctor_education` WHERE Doc_Id='$_SESSION[last_id]'";
  if($server->All_Record($sql))
  {
   $output ='<div style="height:200px;overflow-y: scroll;"><table class="table table-sm">
          <tr>
            <th>Degree</th>
            <th>Year</th>
            <th>University</th>
            <th>Action</th>
          </tr>';
    $count =1;
    foreach ($server->View_details as $value) {
      
      $output .='<tr>
         <td>'.$value['Edu_Degree'].'</td>
         <td>'.$value['Edu_Year'].'</td>
         <td>'.$value['Edu_University'].'</td>
         <td><a href="javascript:void(0)" data-id="'.$value['Edu_Id'].'" class="btn btn-danger btn-sm delete_education"><i class="fas fa-trash"></i></a></td>
      </tr>';
    $count++;
    }
    $output .='</table><div>';
    $output .='<div class="d-flex justify-content-end">
       <a href="javascript:void(0)" class="btn btn-primary Special_btn">Save & Next</a></div>
    ';
  }
  else
  {
     $output = "";
  }
echo $output;
}

// Delete Education Details

if($_POST['page']=="Delete_education")
{
   $sql = "DELETE FROM `tbl_doctor_education` WHERE  Edu_Id='$_POST[id]'";
   if($server->Data_Upload($sql))
   {
      $output = array(
         'success'=>true
      );
   }
   else
   {
     $output = array(
        'error'=>'Technical issue. Please try again..!'
     );
   }

 echo json_encode($output);
}

//  Add Specialization 
if($_POST['page']=="Specialization_page")
{
   $sql = "INSERT INTO `tbl_doctor_specialization`(`Spl_Id`, `Doc_Id`,`Dept_Id`, `Spl_Name`, `Spl_Date`) VALUES (null,'$_SESSION[last_id]','$_POST[department]','$_POST[Specialization]','$current_date')";
   if($server->Data_Upload($sql))
   {
     $output = array(
        'success'=>true
     );
   }
   else{
    $output = array(
        'output'=>'Technical issue. Please try again..!'
    );
   }
echo json_encode($output);
}
//  Display Specialization Details

if($_POST['page']=="Display_Specialization_Details")
{
  $sql = "SELECT `Spl_Id`, `Doc_Id`, `Spl_Name`, `Spl_Date`,table_department_master.Dept_Name FROM `tbl_doctor_specialization` INNER JOIN table_department_master ON tbl_doctor_specialization.Dept_Id=table_department_master.Dept_Id WHERE Doc_Id='$_SESSION[last_id]'";
  if($server->All_Record($sql))
  {
   $output ='<div style="height:200px;overflow-y: scroll;"><table class="table table-sm">
          <tr>
            <th>Department</th>
            <th>Spl Name</th>
            <th>Action</th>
          </tr>';
    $count =1;
    foreach ($server->View_details as $value) {
      
      $output .='<tr>
         <td>'.$value['Dept_Name'].'</td>
         <td>'.$value['Spl_Name'].'</td>
         <td><a href="javascript:void(0)" data-id="'.$value['Spl_Id'].'" class="btn btn-danger btn-sm delete_spl"><i class="fas fa-trash"></i></a></td>
      </tr>';
    $count++;
    }
    $output .='</table><div>';
    $output .='<div class="d-flex justify-content-end">
       <a href="javascript:void(0)" class="btn btn-primary btn-sm membership_btn">Save & Next</a></div>
    ';
  }
  else
  {
     $output = "";
  }
echo $output;
}
// Delete Specialization Details

if($_POST['page']=="Delete_Specialization")
{
   $sql = "DELETE FROM `tbl_doctor_specialization` WHERE Spl_Id='$_POST[id]'";
   if($server->Data_Upload($sql))
   {
      $output = array(
         'success'=>true
      );
   }
   else
   {
     $output = array(
        'error'=>'Technical issue. Please try again..!'
     );
   }

 echo json_encode($output);
}

//  Add Membership 
if($_POST['page']=="Membership_page")
{
   $sql = "INSERT INTO `tbl_doctor_membership`(`Mem_Id`, `Doc_Id`, `Mem_Name`, `Mem_Date`) VALUES (null,'$_SESSION[last_id]','$_POST[membership]','$current_date')";
   if($server->Data_Upload($sql))
   {
     $output = array(
        'success'=>true
     );
   }
   else{
    $output = array(
        'output'=>'Technical issue. Please try again..!'
    );
   }
echo json_encode($output);
}
//  Display Membership Details

if($_POST['page']=="Display_Membership_Details")
{
  $sql = "SELECT `Mem_Id`, `Doc_Id`, `Mem_Name`, `Mem_Date` FROM `tbl_doctor_membership` WHERE Doc_Id='$_SESSION[last_id]'";
  if($server->All_Record($sql))
  {
   $output ='<div style="height:200px;overflow-y: scroll;"><table class="table table-sm">
          <tr>
            <th>Mem Name</th>
            <th>Action</th>
          </tr>';
    $count =1;
    foreach ($server->View_details as $value) {
      
      $output .='<tr>
         <td>'.$value['Mem_Name'].'</td>
         <td><a href="javascript:void(0)" data-id="'.$value['Mem_Id'].'" class="btn btn-danger btn-sm delete_Mem"><i class="fas fa-trash"></i></a></td>
      </tr>';
    $count++;
    }
    $output .='</table><div>';
    $output .='<div class="d-flex justify-content-end">
       <a href="javascript:void(0)" class="btn btn-primary final_submit">Submit</a></div>
    ';
  }
  else
  {
     $output = "";
  }
echo $output;
}
// Delete Membership Details

if($_POST['page']=="Delete_Membership")
{
   $sql = "DELETE FROM `tbl_doctor_membership` WHERE Mem_Id='$_POST[id]'";
   if($server->Data_Upload($sql))
   {
      $output = array(
         'success'=>true
      );
   }
   else
   {
     $output = array(
        'error'=>'Technical issue. Please try again..!'
     );
   }

 echo json_encode($output);
}

if($_POST['page']=="final_submit_button")
{
   unset($_SESSION['last_id']);
}
/// DISPLAY ALL DOCTOR
if($_POST['page']=="Display_All_Doctor")
{
   $sql = "SELECT Doc_Id,Doc_Name,Doc_Lic,Doc_Mobile,Doc_Email,Doc_Flag FROM tbl_doctor_master WHERE Doc_Flag !='1' ORDER BY Doc_Id DESC";
   if($server->All_Record($sql))
   {
    $output ='';
    $count =1;
     foreach ($server->View_details as  $value) {
        
        $output .='<tr>
                    <td>'.$count.'</td>
                    <td>'.$value['Doc_Name'].'</td>
                    <td>'.$value['Doc_Email'].'</td>
                    <td>'.$value['Doc_Mobile'].'</td>
                    <td>'.$value['Doc_Lic'].'</td>
                    <td><a href="view_doctor_details.php?id='.$value['Doc_Id'].'" class="btn btn-warning btn-sm Edit_Doctor"><i class="fas fa-edit"></i></a>&nbsp;&nbsp;&nbsp;<a href="javascript:void(0)" class="btn btn-danger btn-sm Delete_Doctor" data-id="'.$value['Doc_Id'].'"><i class="fas fa-trash"></i></a></td>
                  </tr>';

      $count++;             
     }
    echo $output;
   }

}

//  Delete Doctor

if($_POST['page']=="Delete_Doctor_")
{
  $sql = "UPDATE `tbl_doctor_master` SET `Doc_Flag`='1' WHERE  Doc_Id='$_POST[id]'";
  if($server->Data_Upload($sql))
  {
    $output = array(
       'success'=>'Deactivate Successfully'
    );
  }
  else
  {
    $output = array(
       'error'=>'Technical issue. Please try again..!'
    );
  }

echo json_encode($output);
}
//  ADD DOCTOR APPOINTMENT
if($_POST['page']=="Appointment_form_submit")
{
  $query = "SELECT `App_Id`, `Doc_Id`, `Cham_Id`, `App_Day`, `App_Day_Shift`, `App_Fees`, `App_Start_Time`, `App_End_Time`, `App_Created` FROM `tbl_doctor_appointment` WHERE Doc_Id='$_POST[name]' AND App_Day='$_POST[day]' AND App_Day_Shift='$_POST[Shift]'";
  if($server->All_Record($query))
  {
     $output = array(
         'error'=>'You are Already Added This Day Shift !'
     );
  }
  else
  {
    $sql = "INSERT INTO `tbl_doctor_appointment`(`App_Id`, `Doc_Id`, `Cham_Id`, `App_Day`, `App_Day_Shift`, `App_Fees`, `App_Start_Time`, `App_End_Time`, `App_Created`) VALUES (null,'$_POST[name]','1','$_POST[day]','$_POST[Shift]','$_POST[fees]','$_POST[StartTime]','$_POST[EndTime]','$current_date')";
    if($server->Data_Upload($sql))
    {
       $output = array(
         'success'=>'Appointment Added Successfully'
       );
    }
    else
    {
       $output = array(
          'error'=>'Technical issue . Please try again..!'
       );
    }
  }
  
echo json_encode($output);
}
//  DISPLAY ADD(ADMIN) ALL APPOINTMENT
if($_POST['page']=="Display_All_Appointment")
{
   $sql = "SELECT `App_Id`, tbl_doctor_master.Doc_Id,tbl_doctor_master.Doc_Flag,`Cham_Id`, `App_Day`, `App_Day_Shift`, `App_Fees`, `App_Start_Time`, `App_End_Time`,tbl_doctor_master.Doc_Name FROM `tbl_doctor_appointment` INNER JOIN tbl_doctor_master ON tbl_doctor_master.Doc_Id=tbl_doctor_appointment.Doc_Id WHERE tbl_doctor_master.Doc_Flag !='1' ORDER BY tbl_doctor_appointment.App_Id DESC";
   if($server->All_Record($sql))
   {
     $count =1;
     $output ='';
     foreach ($server->View_details as $value) {
        
        $output .='<tr>
            <td>'.$count.'</td>
            <td>'.$value['Doc_Name'].'</td>
            <td>'.$value['App_Day'].'</td>
            <td>'.$value['App_Day_Shift'].'</td>
            <td>'.$value['App_Start_Time'].' - '.$value['App_End_Time'].'</td>
            <td>'.$value['App_Fees'].'</td>
            <td><a href="view_appointment.php?id='.$value['App_Id'].'" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>&nbsp;&nbsp;&nbsp;<a href="javascript:void(0)" data-id="'.$value['App_Id'].'" class="btn btn-danger btn-sm Delete_Appointment"><i class="fas fa-trash"></i></a></td>
          </tr>';
      $count++;
     }
    echo $output;
   }
}

// Edit Appointment

if($_POST['page']=="Update_Appointment_form_submit")
{
  $query = "SELECT `App_Id`, `Doc_Id`, `Cham_Id`, `App_Day`, `App_Day_Shift`, `App_Fees`, `App_Start_Time`, `App_End_Time`, `App_Created` FROM `tbl_doctor_appointment` WHERE Doc_Id='$_POST[name]' AND App_Day='$_POST[day]' AND App_Day_Shift='$_POST[Shift]'";
  if($server->All_Record($query))
  {
     $output = array(
         'error'=>'You are Already Added This Day Shift !'
     );
  }
  else
  {
     $sql = "UPDATE `tbl_doctor_appointment` SET `Doc_Id`='$_POST[name]',`App_Day`='$_POST[day]',`App_Day_Shift`='$_POST[Shift]',`App_Fees`='$_POST[fees]',`App_Start_Time`='$_POST[StartTime]',`App_End_Time`='$_POST[EndTime]' WHERE `App_Id`='$_POST[id]'";
    if($server->Data_Upload($sql))
    {
      $output = array(
          'success'=>'Update Successfully'
      );
    }
    else
    {
      $output = array(
         'error'=>'Technical issue. Please try again..!'
      );
    }
  }

echo json_encode($output);
}
// Delete Appointment

if($_POST['page']=="Delete_Appointment_")
{
   $sql = "DELETE FROM `tbl_doctor_appointment` WHERE App_Id='$_POST[id]'";
   if($server->Data_Upload($sql))
   {
     $output = array(
         'success'=>'Delete Successfully'
     );
   }
   else
   {
     $output = array(
        'error'=>'Technical issue. Please try again..!'
     );
   }
  echo json_encode($output);
}
// DISPLAY ONLINE RECIEVED ALL APPOINTMENT
if($_POST['page']=="Display_Online_Appointment_All")
{
  $date="";
  if($_POST['from_date'] !='' && $_POST['to_date'] !='')
  {
     $date .="AND App_date BETWEEN '$_POST[from_date]' AND '$_POST[to_date]'"; 
  }
  if($_POST['from_date'] =='' && $_POST['to_date'] !='')
  {
     $date .="AND App_date <= '$_POST[to_date]'"; 
  }
  if($_POST['from_date'] !='' && $_POST['to_date'] =='')
  {
     $date .="AND App_date >= '$_POST[from_date]'"; 
  }
  if(is_numeric($_POST['search_val']) !='')
  {
    $date .="AND User_Mobile LIKE '%$_POST[search_val]%'";
  }
  else
  {
    $date .="AND tbl_doctor_master.Doc_Name LIKE '%$_POST[search_val]%'";
  }
  $sql ="SELECT `Order_Id`,App_date, tbl_doctor_master.Doc_Id, `Cust_Id`, `App_Day`, `App_Shift`, `App_Time`, `Order_Status`, DATE(Order_Created_Date) AS Order_Created_Date ,tbl_user.User_Name,tbl_user.User_Mobile,tbl_user.User_Email,tbl_doctor_master.Doc_Name FROM `tbl_online_appointment` INNER JOIN tbl_user ON tbl_user.User_Id =tbl_online_appointment.Cust_Id INNER JOIN tbl_doctor_master ON tbl_doctor_master.Doc_Id=tbl_online_appointment.Doc_Id WHERE tbl_online_appointment.Order_Status='Pending' ".$date." ORDER BY tbl_online_appointment.Order_Created_Date DESC";
  if($row =$server->All_Record($sql))
  {
    $count =1;
    $output='';
    foreach ($server->View_details as $value) {
      $output .='
         <tr>
           <td><input type="checkbox" name="select_record" class="select_record" value="'.$value['Order_Id'].'"></td>
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
           <td><a href="javascript:void(0)" class="btn btn-success btn-sm confirm_appointment" data-ord_id="'.$value['Order_Id'].'"><i class="fas fa-check-circle"></i></a>
           <a href="javascript:void(0)" class="btn btn-danger btn-sm change_appointment" data-doc_id="'.$value['Doc_Id'].'" data-ord_id="'.$value['Order_Id'].'" data-email="'.$value['User_Email'].'">Change</a>
           </td>
        </tr>
      ';
    $count++;
    }
    $output .="<td colspan='11'>Number of Record : ".$row."</td>";
  echo $output;
  }
  else
  {
    echo "<tr><td class='text-danger' colspan='12'>Record Not Found</td></tr>";
  }
}

//  Confirm Appointment

if($_POST['page']=="Confirm_Appointment_")
{
   $sql = "SELECT `Order_Id`,`App_date`, `Doc_Id`, `Cust_Id`, `App_Day`, `App_Shift`, `App_Time`, `Order_Status`, DATE(Order_Created_Date) AS Order_Created_Date,tbl_user.User_Name,tbl_user.User_Mobile,tbl_user.User_Email FROM `tbl_online_appointment` INNER JOIN tbl_user ON tbl_user.User_Id =tbl_online_appointment.Cust_Id WHERE tbl_online_appointment.Order_Id='$_POST[ord_id]'";
   if($server->All_Record($sql))
   {
      foreach ($server->View_details as $value) {
        # code...
      }
    $email = $value['User_Email'];
    $subject = "Confirm Appointment";
    $body = '
          <table border="1">
             <tr>
                <th>Name</th>
                <td>'.$value['User_Name'].'</td>
             </tr>
             <tr>
                <th>Mobile</th>
                <td>'.$value['User_Mobile'].'</td>
              </tr>
              <tr>
                <th>User_Email</th>
                <td>'.$value['User_Email'].'</td>
              </tr>
              <tr>
                <th>App Day</th>
                <td>'.$value['App_Day'].'</td>
              </tr>
              <tr>
                <th>App Shift</th>
                <td>'.$value['App_Shift'].'</td>
              </tr>
              <tr>
                <th>App Date</th>
                <td>'.$value['App_date'].'</td>
              </tr>
              <tr>
                <th>App Time</th>
                <td>'.$value['App_Time'].'</td>
              </tr>
              <tr>
                <th>App Status</th>
                <td>Confirm</td>
              <tr>
              <tr>
                <td colspan="2"><a href="'.$server->Root().'RazorPay/action_payment.php?id='.$value['Order_Id'].'" class="btn btn-success">Cofirm/Pay Now</a></td>
             </tr>
          </table>
        ';
     if($server->Send_email($email,$subject,$body))
     {
        $sql1 = "UPDATE `tbl_online_appointment` SET `Order_Status`='Confirm' WHERE `Order_Id`='$_POST[ord_id]'";
        if($server->Data_Upload($sql1))
        {
                $txtmsg= 
                     "*Confirm Appointment Information* " ."%0a" . 
                     "*Patient Mobile No:* " .$value['User_Mobile']."%0a" .
                     "*Appointment Day:* ".$value['App_Day']."%0a" . 
                     "*Appointment Shift:* " .$value['App_Shift']."%0a" .
                     "*Appointment Date:* " .$value['App_date']."%0a" .
                     "*Appointment Time:* " .$value['App_Time']."%0a".
                     "*Payment Link:* " .$server->Root().'RazorPay/action_payment.php?id='.$value['Order_Id']."%0a";

           $output = array(
              'success'=>'Appointment Confirm Successfully',
              'url'=>'https://wa.me/919609304072/?text='.$txtmsg.''
            );
        }
        else
        {
           $output = array(
              'error'=>'Technical issue. Please try again..!'
            );
        }
     }
     else
     {
       $output = array(
           'error'=>'Technical issue. Please Check your Internet Connection !'
       );
     }
   }
   else
   {
     $output = array(
         'error'=>'You are invalid person !'
     );
   }

  echo json_encode($output);
}

if($_POST['page']=="Change_Appointment_")
{
   $sql = "SELECT `App_Id`, `Doc_Id`, `App_Day` FROM `tbl_doctor_appointment` WHERE Doc_Id='$_POST[doc_id]' GROUP BY App_Day ";
   if($server->All_Record($sql))
   {
     $output ='<option value="">Select</option>';
     foreach ($server->View_details as $value) {
       
       $output .='<option value="'.$value['App_Day'].'">'.$value['App_Day'].'</option>'; 
     }
    $output1 = array(
        'success'=>$output,   
      );
    echo json_encode($output1);
   }
   else
   {
     $output1 = array(
        'success'=>true
     );
    echo json_encode($output1);
   }
}

if($_POST['page']=="Change_Doctor_")
{
  $sql = "SELECT `Doc_Id`, `App_Day` FROM `tbl_doctor_appointment` WHERE Doc_Id='$_POST[doc_id]'";
   if($server->All_Record($sql))
   {
    $output ='<option value="">Select</option>';
     foreach ($server->View_details as $value) {
       $output .= '<option value="'.$value['App_Day'].'">'.$value['App_Day'].'</option>';
     }
    $output1 = array(
      'success'=>$output
    );

   echo json_encode($output1);
  }
  else
  {
     $output1 = array(
        'success'=>true
     );
  echo json_encode($output1);
  }
}
if($_POST['page']=="Change_Day_")
{
   $sql = "SELECT `Doc_Id`, `App_Day`, `App_Day_Shift` FROM `tbl_doctor_appointment` WHERE App_Day='$_POST[day]' AND Doc_Id='$_POST[doc_id]'";
   if($server->All_Record($sql))
   {
    $output ='<option value="">Select</option>';
     foreach ($server->View_details as $value) {
       $output .= '<option value="'.$value['App_Day_Shift'].'">'.$value['App_Day_Shift'].'</option>';
     }
    $output1 = array(
      'success'=>$output
    );

   echo json_encode($output1);
  }
  else
  {
     $output1 = array(
        'success'=>true
     );
  echo json_encode($output1);
  }

}

if($_POST['page']=="Change_Shift_")
{
   $sql= "SELECT `Doc_Id`, `App_Day`, `App_Day_Shift`, `App_Start_Time`, `App_End_Time` FROM `tbl_doctor_appointment` WHERE Doc_Id='$_POST[doc_id]'  AND App_Day ='$_POST[day]' AND App_Day_Shift='$_POST[shift]'";
   if($server->All_Record($sql))
   {
      $output = '<option value="">Select</option>';
      foreach ($server->View_details as $value) {
        
        $output .= '<option value="'.$value['App_Start_Time'].'-'.$value['App_End_Time'].'">'.$value['App_Start_Time'].'-'.$value['App_End_Time'].'</option>';
      }

    $output1 = array(
        'success'=>$output
    );

    echo json_encode($output1);
   }
   else
   {
     $output1 = array(
         'success'=>true
     );

    echo json_encode($output1);
   }
}

if($_POST['page']=="Change_form_Submit")
{
  $startdate=strtotime($_POST['day']);
    $enddate=strtotime("+1 weeks", $startdate);
    while ($startdate < $enddate) {
      $book_date = date("Y-m-d", $startdate);
      $startdate = strtotime("+1 week", $startdate);
    }
    $email = $_POST['email'];
    $subject = "Change Appointment Day";
    $body = "
        <div>
          <table border='1'style='background-color:#64D5A6;color:white;width:100%;height:100%;text-align:center;padding:5px;'> 
              <tr>
                <td colspan='2'>Appointment Day Change, Because Seat is not Available</td>
              </tr>
              <tr>
                <th>App Day</th>
                <td>".$_POST['day']."</td>
              </tr>
              <tr>
                <th>App Shift</th>
                <td>".$_POST['shift']."</td>
              </tr>
              <tr>
                <th>App Date</th>
                <td>".$book_date."</td>
              </tr>
              <tr>
                <th>App Time</th>
                <td>".$_POST['time']."</td>
              </tr>
          </table>
        </div>
        ";
    if($server->Send_email($email,$subject,$body))
    {
      $sql = "UPDATE `tbl_online_appointment` SET `App_Day`='$_POST[day]',`App_Shift`='$_POST[shift]',`App_Time`='$_POST[time]',App_date='$book_date' WHERE `Order_Id`='$_POST[order_id]'";
       if($server->Data_Upload($sql))
       {
         $output = array(
            'success'=>'Change Successfully'
         );
       }
       else
       {
         $output= array(
           'error'=>'Technical issue. Please try again..!'
         );
       }
    }
    else
    {
       $output = array(
         'error'=>'Technical issue, Email is not send..!'
       );
    }
   
  echo json_encode($output);
}
// DISPLAY Confirm  APPOINTMENT
if($_POST['page']=="Display_All_Confirm_Appointment_")
{
  $date="";
  if($_POST['from_date'] !='' && $_POST['to_date'] !='')
  {
     $date .="AND App_date BETWEEN '$_POST[from_date]' AND '$_POST[to_date]'"; 
  }
  if($_POST['from_date'] =='' && $_POST['to_date'] !='')
  {
     $date .="AND App_date <= '$_POST[to_date]'"; 
  }
  if($_POST['from_date'] !='' && $_POST['to_date'] =='')
  {
     $date .="AND App_date >= '$_POST[from_date]'"; 
  }
  if(is_numeric($_POST['search_val']) !='')
  {
    $date .="AND User_Mobile LIKE '%$_POST[search_val]%'";
  }
  else
  {
    $date .="AND tbl_doctor_master.Doc_Name LIKE '%$_POST[search_val]%'";
  }
  $sql ="SELECT `Order_Id`,App_date, tbl_doctor_master.Doc_Id, `Cust_Id`, `App_Day`, `App_Shift`, `App_Time`, `Order_Status`, DATE(Order_Created_Date) AS Order_Created_Date,tbl_user.User_Name,tbl_user.User_Mobile,tbl_user.User_Email,tbl_doctor_master.Doc_Name,tbl_payment_status.Pay_Name,tbl_online_appointment.pay_status FROM `tbl_online_appointment` INNER JOIN tbl_user ON tbl_user.User_Id =tbl_online_appointment.Cust_Id INNER JOIN tbl_doctor_master ON tbl_doctor_master.Doc_Id=tbl_online_appointment.Doc_Id INNER JOIN tbl_payment_status ON tbl_payment_status.pay_Id =tbl_online_appointment.pay_status WHERE  tbl_online_appointment.Order_Status='Confirm' ".$date." ORDER BY tbl_online_appointment.Order_Created_Date DESC";
  if($row=$server->All_Record($sql))
  {
    $count =1;
    $output='';
    foreach ($server->View_details as $value) {
      $output .='
         <tr>
           <td><input type="checkbox" name="select_record" class="select_record" value="'.$value['Order_Id'].'"></td>
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
          ';
            if($value['pay_status'] !=1)
            {
              $output.=' <td><a href="javascript:void(0)" class="btn btn-info btn-sm Pay_Now" data-ord_id="'.$value['Order_Id'].'">Pay Now</a>
           </td>';
            }
            else
            {
                $output.=' <td>'.$value['Pay_Name'].'</td>';
            }
          $output .='
           <td><a href="javascript:void(0)" class="btn btn-success btn-sm success_" data-ord_id="'.$value['Order_Id'].'"><i class="fas fa-check-circle"></i></a>
           <a href="javascript:void(0)" class="btn btn-danger btn-sm Cancel_" data-ord_id="'.$value['Order_Id'].'"><i class="far fa-times-circle"></i></a>

           </td>
        </tr>
      ';
    $count++;
    }
    $output .='<td colspan="12">Number of Record: '.$row.'</td>';
  echo $output;
  }
  else
  {
    echo "<tr><td colspan='13' class='text-danger'>Record Not Found</td></tr>";
  }
}
if($_POST['page']=="Display_Success_Users_")
{
   $sql = "UPDATE `tbl_online_appointment` SET `Order_Status`='Success' WHERE `Order_Id`='$_POST[ord_id]'";
   if($server->Data_Upload($sql))
   {
     $output = array(
        'success'=>'Thankyou,Success Check Patient'
     );
   }
   else
   {
     $output = array(
       'error'=>'Technical issue. Please try again..!'
     );
   }
  echo json_encode($output);
}

if($_POST['page']=="Display_Cancel_Users_")
{
   $sql = "UPDATE `tbl_online_appointment` SET `Order_Status`='Cancel' WHERE `Order_Id`='$_POST[ord_id]'";
   if($server->Data_Upload($sql))
   {
     $output = array(
        'success'=>'Cancel Patient Details'
     );
   }
   else
   {
     $output = array(
       'error'=>'Technical issue. Please try again..!'
     );
   }
  echo json_encode($output);
}

if($_POST['page']=="Display_All_Success_Appointment_")
{
  $date="";
  if($_POST['from_date'] !='' && $_POST['to_date'] !='')
  {
     $date .="AND App_date BETWEEN '$_POST[from_date]' AND '$_POST[to_date]'"; 
  }
  if($_POST['from_date'] =='' && $_POST['to_date'] !='')
  {
     $date .="AND App_date <= '$_POST[to_date]'"; 
  }
  if($_POST['from_date'] !='' && $_POST['to_date'] =='')
  {
     $date .="AND App_date >= '$_POST[from_date]'"; 
  }
  if(is_numeric($_POST['search_val']) !='')
  {
    $date .="AND User_Mobile LIKE '%$_POST[search_val]%'";
  }
  else
  {
    $date .="AND tbl_doctor_master.Doc_Name LIKE '%$_POST[search_val]%'";
  }
  $sql ="SELECT `Order_Id`,App_date, tbl_doctor_master.Doc_Id, `Cust_Id`, `App_Day`, `App_Shift`, `App_Time`, `Order_Status`, DATE(Order_Created_Date) AS Order_Created_Date,tbl_user.User_Name,tbl_user.User_Mobile,tbl_user.User_Email,tbl_doctor_master.Doc_Name FROM `tbl_online_appointment` INNER JOIN tbl_user ON tbl_user.User_Id =tbl_online_appointment.Cust_Id INNER JOIN tbl_doctor_master ON tbl_doctor_master.Doc_Id=tbl_online_appointment.Doc_Id WHERE  tbl_online_appointment.Order_Status='Success' ".$date." ORDER BY tbl_online_appointment.Order_Created_Date DESC";
  if($server->All_Record($sql))
  {
    $count =1;
    $output='';
    foreach ($server->View_details as $value) {
      $output .='
         <tr>
           <td><input type="checkbox" name="select_record" class="select_record" value="'.$value['Order_Id'].'"></td>
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
  echo $output;
  }
  else
  {
    echo "<tr><td class='text-danger' colspan='11'>Record Not Found</td></tr>";
  }
}

if($_POST['page']=="Display_All_Cancel_Appointment_")
{
  $sql ="SELECT `Order_Id`, tbl_doctor_master.Doc_Id, `Cust_Id`, `App_Day`, `App_Shift`, `App_Time`, `Order_Status`, DATE(Order_Created_Date) AS Order_Created_Date,tbl_user.User_Name,tbl_user.User_Mobile,tbl_user.User_Email,tbl_doctor_master.Doc_Name FROM `tbl_online_appointment` INNER JOIN tbl_user ON tbl_user.User_Id =tbl_online_appointment.Cust_Id INNER JOIN tbl_doctor_master ON tbl_doctor_master.Doc_Id=tbl_online_appointment.Doc_Id WHERE  tbl_online_appointment.Order_Status='Cancel' ORDER BY tbl_online_appointment.Order_Created_Date DESC";
  if($server->All_Record($sql))
  {
    $count =1;
    $output='';
    foreach ($server->View_details as $value) {
      $output .='
         <tr>
           <td>'.$count.'</td>
           <td>'.$value['Doc_Name'].'</td>
           <td>'.$value['User_Name'].'</td>
           <td>'.$value['User_Mobile'].'</td>
           <td>'.$value['App_Day'].'</td>
           <td>'.$value['App_Shift'].'</td>
           <td>'.$value['App_Time'].'</td>
           <td>'.$value['Order_Status'].'</td>
           <td>'.$value['Order_Created_Date'].'</td>
        </tr>
      ';
    $count++;
    }
  echo $output;
  }
}


if($_POST['page']=="Need_help_request_list_Display")
{
  $sql = "SELECT `Help_Id`, `Help_Email`, `Help_Desc`, `Help_Date` FROM `tbl_need_help` ORDER BY Help_Id Desc";
  if($server->All_Record($sql))
  {
    $output = '';
    $count =1;
    foreach ($server->View_details as $value) {
        $output .='
            <tr>
               <td>'.$count.'</td>
               <td>'.$value['Help_Email'].'</td>
               <td>'.$value['Help_Desc'].'</td>
               <td>'.$value['Help_Date'].'</td>
               <td><a href="javascript:void(0)" id="Help_Request_send" data-email="'.$value['Help_Email'].'"><i class="fas fa-share-square"></i></a></td>
            </tr>
        '; 
    }
  echo $output;
  }
}

if($_POST['page']=="Need_help_Request")
{
   $email = $_POST['email'];
   $subject = "Response Neuromax. Your Helping Answer";
   $body = $_POST['desc'];
   if($server->Send_email($email,$subject,$body))
   {
      $output = array(
         'success'=>'Email Sending Successfully'
      );
   }
   else
   {
     $output = array(
        'error'=>'Technical issue . Please try again..!'
     );
   }

  echo json_encode($output);
}


if($_POST['page']=="opening_hour_page")
{
   if($_POST['close']=="")
   {
     $time = $_POST['StartTime']." - ".$_POST['EndTime'];
   }
   elseif ($_POST['close']!="" && $_POST['StartTime'] !="" && $_POST['EndTime'] !="") {
     
      $output = array(
          'error'=>'Please Select Any One Time opening hour !'
      );
    echo json_encode($output);
    exit;
   }
   else
   {
      $time = $_POST['close'];
   }


$query = "SELECT `Opn_Id`,`Opn_Day`, `Opn_Time` FROM `tbl_opening_time` WHERE Opn_Day='$_POST[day]'";
if($server->All_Record($query))
{
  foreach ($server->View_details as $value) {
  }

  $sql = "UPDATE `tbl_opening_time` SET `Opn_Time`='$time' WHERE `Opn_Day`='$value[Opn_Day]'";
  if($server->Data_Upload($sql))
    {
      $output = array(
         'success'=>'Saved Successfully'
      );
    }
    else
    {
       $output = array(
           'error'=>'Technical issue. Please try again..!'
       );
    }
}
else
{
    $sql = "INSERT INTO `tbl_opening_time`(`Opn_Id`, `Opn_Day`, `Opn_Time`) VALUES (null,'$_POST[day]','$time')";
    if($server->Data_Upload($sql))
    {
      $output = array(
         'success'=>'Saved Successfully'
      );
    }
    else
    {
       $output = array(
           'error'=>'Technical issue. Please try again..!'
       );
    }
}
  
echo json_encode($output);
}

if($_POST['page']=="Opening_Hour_All_Record")
{
   $sql = "SELECT `Opn_Id`,`Opn_Day`, `Opn_Time` FROM `tbl_opening_time`";
   if($server->All_Record($sql))
   {
    $output='';
    $count = 1;
    foreach ($server->View_details as $value) {
       
       $output .='
            <tr>
               <td>'.$count.'</td>
               <td>'.$value['Opn_Day'].'</td>
               <td>'.$value['Opn_Time'].'</td>
            </tr>
        '; 
    $count++;
      }

    echo $output;
   }
}
//  Main Image Add Submit

if($_POST['page']=="main_images_form_submit")
{
   $image = time()."_".$_FILES['main_image']['name'];
   $path = "../images/";
   $tmp_name = $_FILES['main_image']['tmp_name'];
   if($server->Upload_Image($tmp_name,$path,$image))
   {
      $sql = "INSERT INTO `tb_galllery_master`(`Gall_Id`, `Gall_Title`, `Gall_Image`) VALUES (null,'$_POST[title]','$image')";
      if($server->Data_Upload($sql))
      {
         $output = array(
             'success'=>'Inserted Successfully'
         );
      }
      else
      {
         $output = array(
              'error'=>'Technical issue. Please try again..!'
         );
      }
   }
   else
   {
     $output = array(
         'error'=>'Image Not Uploaded !'
     );
   }
echo json_encode($output);
}


if($_POST['page']=="images_form_submit")
{
  // echo "<pre>";
  //  print_r($_FILES);
  $issue = 0;
  $success = 0;
  foreach ($_FILES['image']['name'] as $key => $value) {
     
     if($_FILES['image']['type'][$key] !='image/png' && $_FILES['image']['type'][$key] !='image/jpeg' && $_FILES['image']['type'][$key] !='image/jpg')
     {
        $issue ++;
     }
     else
     {
        $image = time()."_".$value;
        $path = "../images/";
        $tmp_name = $_FILES['image']['tmp_name'][$key];
        if($server->Upload_Image($tmp_name,$path,$image))
        {
          $sql = "INSERT INTO `tbl_sub_gallery_master`(`Gall_Sub_Id`, `Gall_Id`, `Gall_Sub_Image`) VALUES (null,'$_POST[sub_title]','$image')";
          if($server->Data_Upload($sql))
          {
             $success++;
          }
        }
     }
  }

  $output = array(
     'success'=> $issue." file Invalid Extension.".$success." file Uploaded"
  );

  echo json_encode($output);
}

if($_POST['page']=="news_form_submit")
{
   $sql = "INSERT INTO `tbl_news`(`Blog_Id`, `Blog_Header`, `Blog_Desc`, `Blog_Publish_Id`) VALUES (null,'$_POST[title]','$_POST[desc]','$_POST[doc_id]')";
   if($server->Data_Upload($sql))
   {
     $output = array(
        'success'=>'Added Successfully'
     );
   }
   else
   {
     $output = array(
        'error'=>'Technical issue. Please try again..!'
     );
   }

  echo json_encode($output);
}

//  All Font Images Show
if($_POST['page']=="All_Font_Images_Show")
{
    $sql = "SELECT `Gall_Id`, `Gall_Title`, `Gall_Image` FROM `tb_galllery_master` ORDER BY Gall_Id DESC";
    if($server->All_Record($sql))
    {
      $count=1;
      $output ='';
       foreach ($server->View_details as $value) {
         
         $output .='
                <tr>
                   <td>'.$count.'</td>
                   <td>'.$value['Gall_Title'].'</td>
                   <td><a href="../../images/'.$value['Gall_Image'].'" target="_blank"><img src="../../images/'.$value['Gall_Image'].'" width="60px" height="40px"></a></td>
                   <td><a href="view_font_image.php?id='.$value['Gall_Id'].'" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>&nbsp;&nbsp;&nbsp;<a href="javascript:void(0)" class="btn btn-danger btn-sm  Delete_Images" data-id="'.$value['Gall_Id'].'" data-image_name ="'.$value['Gall_Image'].'"><i class="fas fa-trash"></i></a></td>
                </tr>
         ';
      $count++;
       }
    echo $output;
    }

}

// Update Font Images

if($_POST['page']=="Update_main_images_form_submit")
{
  if(!empty($_FILES['main_image']))
  {
     $image = time()."_".$_FILES['main_image']['name'];
     $path = "../images/";
     $tmp_name = $_FILES['main_image']['tmp_name'];
     if($server->Upload_Image($tmp_name,$path,$image))
     {
        $sql = "UPDATE `tb_galllery_master` SET `Gall_Title`='$_POST[title]',`Gall_Image`='$image' WHERE `Gall_Id`='$_POST[id]'";
        if($server->Data_Upload($sql))
        {
           $output = array(
               'success'=>'Update Successfully'
           );
        }
        else
        {
           $output = array(
                'error'=>'Technical issue. Please try again..!'
           );
        }
    }
    else{
      $output = array(
          'error'=>'Image Not Uploaded !'
      );
    }
  }
  else
  {
       $sql = "UPDATE `tb_galllery_master` SET `Gall_Title`='$_POST[title]' WHERE `Gall_Id`='$_POST[id]'";
        if($server->Data_Upload($sql))
        {
           $output = array(
               'success'=>'Update Successfully'
           );
        }
        else
        {
           $output = array(
                'error'=>'Technical issue. Please try again..!'
           );
        }
  }

echo json_encode($output);
}

//  Delete Font Images Show

if($_POST['page']=="Delete_Images_Unic")
{
  $sql = "SELECT `Gall_Sub_Id`, `Gall_Id`, `Gall_Sub_Image` FROM `tbl_sub_gallery_master` WHERE Gall_Id='$_POST[id]'";
  if($server->All_Record($sql))
  {
    $output = array(
       'error'=>'Delete Denied ! Please Delete First Sub Images !'
    );
  }
  else
  {
    $sql = "DELETE FROM `tb_galllery_master` WHERE  Gall_Id='$_POST[id]'";
     if($server->Data_Upload($sql))
     {
         if(unlink('../images/'.$_POST['image_name']))
         {
            $output = array(
               'success'=>'Delete Successfully'
            );
         }
         else
         {
            $output = array(
                'error'=>'Delete Successfully. But Uploaded Images Not Delete !'
            );
         }
     }
     else
     {
        $output = array(
             'error'=>'Technical issue . Please try again..!'
        );
     }
  }
   
 echo json_encode($output);
}

// Display Sub Images
if($_POST['page']=="All_Sub_Images_Show")
{
  $sql = "SELECT tb_galllery_master.Gall_Id, tb_galllery_master.Gall_Title,tbl_sub_gallery_master.Gall_Sub_Image,tbl_sub_gallery_master.Gall_Sub_Id FROM  tbl_sub_gallery_master INNER JOIN `tb_galllery_master` ON tbl_sub_gallery_master.Gall_Id=tb_galllery_master.Gall_Id ORDER BY tbl_sub_gallery_master.Gall_Sub_Id DESC";
    if($server->All_Record($sql))
    {
      $count=1;
      $output ='';
       foreach ($server->View_details as $value) {
         
         $output .='
                <tr>
                   <td>'.$count.'</td>
                   <td>'.$value['Gall_Title'].'</td>
                   <td><a href="../../images/'.$value['Gall_Sub_Image'].'" target="_blank"><img src="../../images/'.$value['Gall_Sub_Image'].'" width="60px" height="40px"></a></td>
                   <td><a href="javascript:void(0)" class="btn btn-danger btn-sm  Delete_Sub_Images" data-id="'.$value['Gall_Sub_Id'].'" data-image_name ="'.$value['Gall_Sub_Image'].'"><i class="fas fa-trash"></i></a></td>
                </tr>
         ';
      $count++;
       }
    echo $output;
    }
}

//  Delete Sub Images 

if($_POST['page']=="Delete_Sub_Images_Unic")
{
  $sql = "DELETE FROM `tbl_sub_gallery_master` WHERE  Gall_Sub_Id='$_POST[id]'";
   if($server->Data_Upload($sql))
   {
       if(unlink('../images/'.$_POST['image_name']))
       {
          $output = array(
             'success'=>'Delete Successfully'
          );
       }
       else
       {
          $output = array(
              'error'=>'Delete Successfully. But Uploaded Images Not Delete !'
          );
       }
   }
   else
   {
      $output = array(
           'error'=>'Technical issue . Please try again..!'
      );
   }

 echo json_encode($output);
}

if($_POST['page']=="All_News_Show")
{
   $sql = "SELECT `Blog_Id`, `Blog_Header`, `Blog_Desc`, `Blog_Publish_Id`, `Blog_Date`,tbl_doctor_master.Doc_Id,tbl_doctor_master.Doc_Name FROM `tbl_news` INNER JOIN tbl_doctor_master ON tbl_doctor_master.Doc_Id=tbl_news.Blog_Publish_Id ORDER BY Blog_Id Desc";
   if($server->All_Record($sql))
   {
     $count=1;
      $output ='';
       foreach ($server->View_details as $value) {
         
         $output .='
                <tr>
                   <td>'.$count.'</td>
                   <td>'.$value['Doc_Name'].'</td>
                   <td>'.$value['Blog_Header'].'</td>
                   <td>'.$value['Blog_Desc'].'</td>
                   <td>'.$value['Blog_Date'].'</td>
                   <td><a href="view_news.php?id='.$value['Blog_Id'].'" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>&nbsp;&nbsp;&nbsp;<a href="javascript:void(0)" class="btn btn-danger btn-sm  Delete_News" data-id="'.$value['Blog_Id'].'"><i class="fas fa-trash"></i></a></td>
                </tr>
         ';
      $count++;
       }
    echo $output;
   }
}

if($_POST['page']=="Delete_News_Unic")
{
  $sql = "DELETE FROM `tbl_news` WHERE Blog_Id='$_POST[id]'";
  if($server->Data_Upload($sql))
  {
    $output = array(
      'success'=>'Dalete Successfully'
    );
  }
  else
  {
     $output = array(
        'error'=>'Technical issue. Please try again..!'
     );
  }
echo json_encode($output);
}

if($_POST['page']=="Update_news_form_submit")
{
  $sql = "UPDATE `tbl_news` SET `Blog_Header`='$_POST[title]',`Blog_Desc`='$_POST[desc]',`Blog_Publish_Id`='$_POST[doc_id]' WHERE `Blog_Id`='$_POST[id]'";
  if($server->Data_Upload($sql))
  {
    $output = array(
       'success'=>'Update Successfully'
    );
  }
  else
  {
    $output = array(
       'error'=>'Technical issue. Please try again..!'
    );
  }

echo json_encode($output);
}

// View Delete  Doctor Degree

if($_POST['page']=="Delete_Education_")
{
  // $query = "SELECT COUNT(Doc_Id) AS Doc_Id FROM `tbl_doctor_education` WHERE Doc_Id='$_POST[doc_id]'";
  // if($server->All_Record($query))
  // {
  //   foreach ($server->View_details as $value) {
      
  //   }
  //   if($value['Doc_Id']==1)
  //   {
  //      $output = array(
          
  //      );
  //   }
  // }
  $sql = "DELETE FROM `tbl_doctor_education` WHERE Edu_Id='$_POST[id]'";
  if($server->Data_Upload($sql))
  {
     $output = array(
          'success'=>'Dalete Successfully'
     );
  }
  else
  {
     $output = array(
       'error'=>'Technical issue. Please Try again..!'
     );
  }

echo json_encode($output);
} 

// View Delete Doctor Specialization

if($_POST['page']=="Delete_Specialization_")
{
  $sql = "DELETE FROM `tbl_doctor_specialization` WHERE  Spl_Id='$_POST[id]'";
  if($server->Data_Upload($sql))
  {
     $output = array(
          'success'=>'Dalete Successfully'
     );
  }
  else
  {
     $output = array(
       'error'=>'Technical issue. Please Try again..!'
     );
  }

echo json_encode($output);
} 
// View Delete Doctor Membership

if($_POST['page']=="Delete_Membership_")
{
  $sql = "DELETE FROM `tbl_doctor_membership` WHERE  Mem_Id='$_POST[id]'";
  if($server->Data_Upload($sql))
  {
     $output = array(
          'success'=>'Dalete Successfully'
     );
  }
  else
  {
     $output = array(
       'error'=>'Technical issue. Please Try again..!'
     );
  }

echo json_encode($output);
} 

// Update Personal Details

if($_POST['page']=="Update_Personal_details_submit")
{
   $sql = "UPDATE `tbl_doctor_master` SET `Doc_Name`='$_POST[name]',`Doc_Lic`='$_POST[License]',`Doc_Mobile`='$_POST[Mobile]',`Doc_Email`='$_POST[Email]' WHERE Doc_Id='$_POST[id]'";
   if($server->Data_Upload($sql))
   {
     $output = array(
        'success'=>'Personal Details Update Successfully'
     );
   }
   else
   {
     $output = array(
        'error'=>'Technical issue. Please try again..!'
     );
   }

echo json_encode($output);
}

if($_POST['page']=="Update_Education_details_submit")
{
   $sql = "INSERT INTO `tbl_doctor_education`(`Edu_Id`, `Doc_Id`, `Edu_Degree`, `Edu_Year`, `Edu_University`, `Edu_Added_Date`) VALUES (null,'$_POST[id]','$_POST[Degree]','$_POST[Year]','$_POST[University]','$current_date')";
   if($server->Data_Upload($sql))
   {
     $output = array(
        'success'=>'Education Details Added Successfully'
     );
   }
   else
   {
     $output = array(
        'error'=>'Technical issue. Please try again..!'
     );
   }

echo json_encode($output);
}

// Specialization Update

if($_POST['page']=="Update_Specialization_details_submit")
{
   $sql = "INSERT INTO `tbl_doctor_specialization`(`Spl_Id`, `Doc_Id`, `Dept_Id`, `Spl_Name`, `Spl_Date`) VALUES (null,'$_POST[id]','$_POST[department]','$_POST[spl_name]','$current_date')";
   if($server->Data_Upload($sql))
   {
     $output = array(
        'success'=>'Specialization Added Successfully'
     );
   }
   else
   {
     $output = array(
        'error'=>'Technical issue. Please try again..!'
     );
   }

echo json_encode($output);
}


// Membership Update

if($_POST['page']=="Update_Membership_details_submit")
{
   $sql = "INSERT INTO `tbl_doctor_membership`(`Mem_Id`, `Doc_Id`, `Mem_Name`, `Mem_Date`) VALUES (null,'$_POST[id]','$_POST[mem_name]','$current_date')";
   if($server->Data_Upload($sql))
   {
     $output = array(
        'success'=>'Membership Added Successfully'
     );
   }
   else
   {
     $output = array(
        'error'=>'Technical issue. Please try again..!'
     );
   }

echo json_encode($output);
}


//  Doctor Profile Image Form Upload Image Add

if($_POST['page']=="doctor_profile_image_form_submit")
{
   $sql = "SELECT `Pro_Id`, `Doc_Id`, `Pro_Image` FROM `tbl_doctor_profile_image` WHERE Doc_Id='$_POST[doc_id]'";

   if($server->All_Record($sql))
   {
      foreach ($server->View_details as $value) {
        # code...
      }
      if(unlink('../doc_images/'.$value['Pro_Image']))
      {
        $image = time()."_".$_FILES['image']['name'];
        $path = "../doc_images/";
        $tmp_name = $_FILES['image']['tmp_name'];
        if($server->Upload_Image($tmp_name,$path,$image))
        {
          $sql = "UPDATE `tbl_doctor_profile_image` SET `Pro_Image`='$image' WHERE  `Doc_Id`='$_POST[doc_id]'";
          if($server->Data_Upload($sql))
          {
             $output = array(
                'success'=>'Upload Successfully'
             );
          }
          else
          {
             $output = array(
                'error'=>'Technical issue . Please Try again..!'
             );
          }
        }
        else
        {
          $output = array(
              'error'=>'Not Upload Image'
          );
        }
        
      }
      else
      {
         $output = array(
             'error'=>'Your Old Image is Not Found !'
         );
      }

   }
  else
    {
        $image = time()."_".$_FILES['image']['name'];
        $path = "../doc_images/";
        $tmp_name = $_FILES['image']['tmp_name'];
        if($server->Upload_Image($tmp_name,$path,$image))
        {
          $sql = "INSERT INTO `tbl_doctor_profile_image`(`Pro_Id`, `Doc_Id`, `Pro_Image`) VALUES (null,'$_POST[doc_id]','$image')";
          if($server->Data_Upload($sql))
          {
             $output = array(
                'success'=>'Upload Successfully'
             );
          }
          else
          {
             $output = array(
                'error'=>'Technical issue . Please Try again..!'
             );
          }
        }
        else
        {
           $output = array(
              'error'=>'Not Upload Image !'
           );
        }
    }

echo json_encode($output);
}
if($_POST['page']=="All_Doctor_Profile_Image_Show")
{
  $sql = "SELECT `Pro_Id`, tbl_doctor_master.Doc_Id, `Pro_Image`,tbl_doctor_master.Doc_Name FROM `tbl_doctor_profile_image` INNER JOIN tbl_doctor_master ON tbl_doctor_master.Doc_Id=tbl_doctor_profile_image.Doc_Id ORDER BY Pro_Id DESC";
    if($server->All_Record($sql))
    {
      $count=1;
      $output ='';
       foreach ($server->View_details as $value) {
         
         $output .='
                <tr>
                   <td>'.$count.'</td>
                   <td>'.$value['Doc_Name'].'</td>
                   <td><a href="../../doc_images/'.$value['Pro_Image'].'" target="_blank"><img src="../../doc_images/'.$value['Pro_Image'].'" width="60px" height="40px"></a></td>
                   <td><a href="javascript:void(0)" class="btn btn-danger btn-sm  Delete_Profile_Images" data-id="'.$value['Pro_Id'].'" data-image_name ="'.$value['Pro_Image'].'"><i class="fas fa-trash"></i></a></td>
                </tr>
         ';
      $count++;
       }
    echo $output;
    }
}
if($_POST['page']=="Delete_Profile_Images_Unic")
{
   $sql = "DELETE FROM `tbl_doctor_profile_image` WHERE  Pro_Id='$_POST[id]'";
   if($server->Data_Upload($sql))
   {
       if(unlink('../doc_images/'.$_POST['image_name']))
       {
          $output = array(
             'success'=>'Delete Successfully'
          );
       }
       else
       {
          $output = array(
              'error'=>'Delete Successfully. But Uploaded Images Not Delete !'
          );
       }
   }
   else
   {
      $output = array(
           'error'=>'Technical issue . Please try again..!'
      );
   }

 echo json_encode($output);
}

if($_POST['page']=="All_Feedback_")
{
  $sql = "SELECT `Feed_Id`, `Feed_Name`,`Feed_Gender`, `Feed_Mobile`, `Feed_Comment`, `Feed_Rating`, `Feed_Date` FROM `tbl_feedback_master` ORDER BY  Feed_Id Desc";
  if($server->All_Record($sql))
  {
    $count=1;
    $output= '';
    foreach ($server->View_details as $value) {
      
      $output .='
                <tr>
                   <td>'.$count.'</td>
                   <td>'.$value['Feed_Name'].'</td>
                   <td>'.$value['Feed_Gender'].'</td>
                   <td>'.$value['Feed_Mobile'].'</td>
                   <td>'.$value['Feed_Comment'].'</td>
                   <td>'.$value['Feed_Rating'].'</td>
                   <td>'.$value['Feed_Date'].'</td>
                </tr>
         ';
      $count++;
       }
    echo $output;
    }
  }


  // ADD PATIENT ADMIN PANEL

  // SIGNUP FORM METHOD
  if($_POST['page']=="SignUp_Form_Action")
  {
   $query = "SELECT `User_Id` FROM `tbl_user` WHERE User_Id='$_POST[exist_user_id]'" ;
   if($server->All_Record($query))
   {
      $up="UPDATE `tbl_user` SET `User_Name`='$_POST[name]',`User_Gender`='$_POST[gender]',`User_Dob`='$_POST[dob]',`User_Address`='$_POST[address]' WHERE `User_Id`='$_POST[exist_user_id]'";
      if($server->Data_Upload($up))
      {
         $output = array(
           'success'=>'Thankyou,'.$_POST['name'],
           'user_id'=>$_POST['exist_user_id']
         );
      }
      else
      {
         $output = array(
           'error'=>'Technical issue, Please try again..!'
         );
      }
   }
   else
   {
    $sql = "SELECT `User_Email`, `User_Mobile` FROM `tbl_user` WHERE User_Mobile='$_POST[mobile]' OR User_Email='$_POST[email]'";
    if($server->All_Record($sql))
    {
      $output = array(
        'error'=>'Already Registered Your Email/Mobile No !'
      );
    }
    else
    {
      $rand_num1= md5(rand());
      $rand_num = substr($rand_num1, 0, 6);
      $subject = "Verify Email";

        $body = "
        <div class='container col-md-10'>
          <table border='1'>
             <tr>
              <th>Name</th>
              <td>".$_POST['name']."</td>
             </tr>
             <tr>
              <th>Gender</th>
              <td>".$_POST['gender']."</td>
             </tr>
             <tr>
             <th>DOB</th>
              <td>".$_POST['dob']."</td>
             </tr>
             <tr>
              <th>Mobile No</th>
              <td>".$_POST['mobile']."</td>
             </tr>
             <tr>
             <th>Email</th>
              <td>".$_POST['email']."</td>
             </tr>
             <tr>
              <th>Address</th>
              <td>".$_POST['address']."</td>
             </tr>
             <tr>
                 <th>Generated Password is :</th>
                 <td>".$rand_num."</td>
             </tr>
             <tr>
                <th colspan='2'><a href='".$server->Root()."action-page/verify.php?hash=".$rand_num1."' class='btn btn-success'>Click Here to Verify</a></th>
             </tr>
          </table>
         </div>
        ";
        if($_POST['email']!="demo@gmail.com")
        {
          $verify_mail="No";
        }
        else
        {
          $verify_mail = "Yes";
        }
        if($server->Send_email($_POST['email'],$subject,$body))
        {
           $query = "INSERT INTO `tbl_user`(`User_Id`, `User_Name`, `User_Gender`, `User_Dob`, `User_Email`, `User_Mobile`, `User_Address`, `User_Password`, `User_Email_Verify`, `User_Verify_Status`) VALUES (null,'$_POST[name]','$_POST[gender]','$_POST[dob]','$_POST[email]','$_POST[mobile]','$_POST[address]','$rand_num','$rand_num1','$verify_mail')";
           if($server->Data_Upload($query))
           {
            $output = array(
             'success'=>'SignUp Successfully. Please Verify Your Email .',
             'user_id'=>$server->lastid
          );
           }
          else
          {
            $output = array(
                  'error'=>'Technical issue. Please try Again..!'
            );
          }
        }
        else
        {
           $output = array(
               'error'=>'Email is not send..!'
           );
        }
    }
  }    
  echo json_encode($output);
  }

  if($_POST['page']=="Appointmnent_form_Submit")
  {
    $startdate=strtotime($_POST['day']);
    $enddate=strtotime("+1 weeks", $startdate);
    while ($startdate < $enddate) {
      $book_date = date("Y-m-d", $startdate);
      $startdate = strtotime("+1 week", $startdate);
    }
    $email = $_POST['email'];
    $subject = "Booking Appointment Day";
    $body = "
        <div>
          <table border='1'style='background-color:#64D5A6;color:white;width:100%;height:100%;text-align:center;padding:5px;'> 
              <tr>
                <th>Doctor Name</th>
                <td>".$server->Doctor_Name($_POST['doctor'])."</td>
              </tr>
              <tr>
                <th>App Day</th>
                <td>".$_POST['day']."</td>
              </tr>
              <tr>
                <th>App Shift</th>
                <td>".$_POST['shift']."</td>
              </tr>
              <tr>
                <th>App Date</th>
                <td>".$book_date."</td>
              </tr>
              <tr>
                <th>App Time</th>
                <td>".$_POST['time']."</td>
              </tr>
          </table>
        </div>
        ";
    if($server->Send_email($email,$subject,$body))
    {

     $query = "INSERT INTO `tbl_online_appointment`(`Order_Id`, `Doc_Id`, `Cust_Id`, `App_Day`, `App_Shift`, `App_Time`, `Order_Status`,`App_date`) VALUES (null,'$_POST[doctor]','$_POST[user_id]','$_POST[day]','$_POST[shift]','$_POST[time]','Pending','$book_date')";
               if($server->Data_Upload($query))
               {
                   $output = array(
                       'success'=>'Booking Request Successfully'
                   );
               }
               else
               {
                 $output = array(
                    'errror'=>'Technical issue. Please try Again..!'
                 );
               }
    }
    else
    {
      $output = array(
         'error'=>'Technical issue, Email  is not send..!'
      );
    }
    echo json_encode($output);
  }

if($_POST['page']=="Display_All_Patient")
{
  $date="";
  if($_POST['from_date'] !='' && $_POST['to_date'] !='')
  {
     $date .="WHERE DATE(User_Added_Date) BETWEEN '$_POST[from_date]' AND '$_POST[to_date]'"; 
  }
  if($_POST['from_date'] =='' && $_POST['to_date'] !='')
  {
     $date .="WHERE DATE(User_Added_Date) <= '$_POST[to_date]'"; 
  }
  if($_POST['from_date'] !='' && $_POST['to_date'] =='')
  {
     $date .="WHERE DATE(User_Added_Date) >= '$_POST[from_date]'"; 
  }
  if($_POST['search_val'] !='')
  {
    $date .="AND User_Mobile LIKE '%$_POST[search_val]%'";
  }
  $sql ="SELECT `User_Id`, `User_Name`, `User_Gender`, `User_Dob`, `User_Email`, `User_Mobile`, `User_Address`,DATE(User_Added_Date) AS User_Added_Date FROM `tbl_user` ".$date." ORDER BY User_Id DESC";
  
  if($row=$server->All_Record($sql))
  {
    $count =1;
    $output='';
    foreach ($server->View_details as $value) {
      $output .='
         <tr>
         <td><input type="checkbox" name="select_record" class="select_record" value="'.$value['User_Id'].'"></td>
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
     // <td>
     //        <a href="javascript:void(0)" class="btn btn-danger btn-sm change_appointment" data-user_id="'.$value['User_Id'].'">Change</a>
     //       </td>
    }
    $output .="<td colspan='9'>Number of Record : ".$row."</td>";
  echo $output;
  }
  else
  {
    ?>
    <tr>
      <td colspan="9"  class="text-danger">Record Not Found</td>
    </tr>
    <?php
  }
}

if($_POST['page']=="Search_Patient")
{
   $sql = "SELECT `User_Id`, `User_Name`, `User_Gender`, `User_Dob`, `User_Email`, `User_Mobile`, `User_Address` FROM `tbl_user` WHERE User_Mobile LIKE '%$_POST[mobile]%'";
   if($value = $server->Search_Method($sql))
   {
      $output = array(
         'success'=>true,
         'data'=>$value
      );
   }
   else
   {
    $output = array(
         'success'=>true,
         'data'=>'<li class="list-unstyled item">Not Found</li>'
      );
   }
  echo json_encode($output);
}

// Search Mobile No

if($_POST['page']=="Search_Patient_form")
{
   $sql="SELECT `User_Id`, `User_Name`, `User_Gender`, `User_Dob`, `User_Email`, `User_Mobile`, `User_Address` FROM `tbl_user` WHERE User_Mobile='$_POST[Search_mobile]'";
   if($server->All_Record($sql))
   {
      foreach ($server->View_details as $value) {
      }
     $output = array(
        'success'=>'Thankyou,'.$value['User_Name'],
        'User_Id'=>$value['User_Id'],
        'User_Name'=>$value['User_Name'],
        'User_Gender'=>$value['User_Gender'],
        'User_Dob'=>$value['User_Dob'],
        'User_Email'=>$value['User_Email'],
        'User_Mobile'=>$value['User_Mobile'],
        'User_Address'=>$value['User_Address']
     );
   }
   else
   {
      $output = array(
        'error'=>'Not Registered Number'
      );
   }

  echo json_encode($output);
}


// PAYMENT SUBMIT CASH
if($_POST['page']=="cash_form_submit")
{
  $check = "SELECT `pay_status` FROM `tbl_online_appointment` WHERE Order_Id='$_POST[app_ord_Id]'";
  if($server->All_Record($check))
  {
     foreach ($server->View_details as $value) {
       
     }
     if($value['pay_status'] !=0)
     {
        $output = array(
           'error'=>'You are Already Payment ..!'
        );
     }
     else
     {
        $subject = "Neuromax Healthcare";

        $body = "
        <div style='background-color:#64D5A6;color:white;width:100%;height:100%;text-align:center;padding:5px;'>
           <h2>Payment Successfully Done<h2>
           <p>Rupees : $_POST[cash_amount]</p>
           <p>Transection id: $_POST[ord_id] </p>
           <p>Transection Mode: $_POST[pay_mode] </p>
           <p>Transection Type: $_POST[pay_type] </p>
           <p>Pay : $_POST[pay_bank] </p>
        <div>
         ";
         $email = $_POST['email'];
         if($server->Send_email($email,$subject,$body))
         {
            $sql = "INSERT INTO `tbl_payment`(`Pay_Id`, `Pay_Order_Id`, `Order_Id`, `Pay_Mode`, `Pay_Type`, `Pay_Amount`, `Pay_Bank`) VALUES (null,
           '$_POST[ord_id]','$_POST[app_ord_Id]','$_POST[pay_mode]','$_POST[pay_type]','$_POST[cash_amount]','Cash')";
           if($server->Data_Upload($sql))
           {
              $sql1 = "UPDATE `tbl_online_appointment` SET `pay_status`=1 WHERE `Order_Id`='$_POST[app_ord_Id]'";
              if($server->Data_Upload($sql1))
              {
                $output = array(
                 'success'=>'Payment Accept Successfully'
                );
              }
              else
              {
                $output = array(
                 'error'=>'Technical issue, Please try again..!'
                );
              }  
           }
           else
           {
             $output = array(
                 'error'=>'Technical issue, Please try again..!'
             );
           }
         }
         else
         {
            $output = array(
              'error'=>'Technical issue, Email is Not Send...!'
            );
         }
       


     }
  }
   
echo json_encode($output);
}

//  Check Online Payment

if($_POST['page']=="online_form_submit")
{
  $check = "SELECT `pay_status` FROM `tbl_online_appointment` WHERE Order_Id='$_POST[app_ord_Id]'";
  if($server->All_Record($check))
  {
     foreach ($server->View_details as $value) {
       
     }
     if($value['pay_status'] !=0)
     {
        $output = array(
           'error'=>'You are Already Payment ..!'
        );
     }
     else
     {
      $subject = "Neuromax Healthcare";

        $body = "
        <div style='background-color:#64D5A6;color:white;width:100%;height:100%;text-align:center;padding:5px;'>
           <h2>Payment Successfully Done<h2>
           <p>Rupees : $_POST[cash_amount]</p>
           <p>Transection id: $_POST[ord_id] </p>
           <p>Transection Mode: $_POST[pay_mode] </p>
           <p>Transection Type: $_POST[pay_type] </p>
           <p>Pay : $_POST[pay_bank] </p>
        <div>
         ";
         $email = $_POST['email'];
         if($server->Send_email($email,$subject,$body))
         {
           $sql = "INSERT INTO `tbl_payment`(`Pay_Id`, `Pay_Order_Id`, `Order_Id`, `Pay_Mode`, `Pay_Type`, `Pay_Amount`, `Pay_Bank`) VALUES (null,
           '$_POST[ord_id]','$_POST[app_ord_Id]','$_POST[pay_mode]','$_POST[pay_type]','$_POST[cash_amount]','$_POST[pay_bank]')";
           if($server->Data_Upload($sql))
           {
              $sql1 = "UPDATE `tbl_online_appointment` SET `pay_status`=1 WHERE `Order_Id`='$_POST[app_ord_Id]'";
              if($server->Data_Upload($sql1))
              {
                $output = array(
                 'success'=>'Payment Accept Successfully'
                );
              }
              else
              {
                $output = array(
                 'error'=>'Technical issue, Please try again..!'
                );
              }  
           }
           else
           {
             $output = array(
                 'error'=>'Technical issue, Please try again..!'
             );
           }
         }
         else
         {
           $output = array(
             'error'=>'Technical issue , Email is Not Send..!'
           );
         }
        
     }
  }
  else
  {
    $output = array(
        'error'=>'Technical issue, Please try again..!'
    );
  }
echo json_encode($output);

}

//  Payment Report
if($_POST['page']=="Display_All_Payment")
{
  $date="";
  if($_POST['from_date'] !='' && $_POST['to_date'] !='')
  {
     $date .="WHERE DATE(tbl_payment.Pay_Date) BETWEEN '$_POST[from_date]' AND '$_POST[to_date]'";
  }
  if($_POST['from_date'] =='' && $_POST['to_date'] !='')
  {
     $date .="WHERE DATE(tbl_payment.Pay_Date)<= '$_POST[to_date]'"; 
  }
  if($_POST['from_date'] !='' && $_POST['to_date'] =='')
  {
     $date .="WHERE DATE(tbl_payment.Pay_Date) >= '$_POST[from_date]'"; 
  }
  if(is_numeric($_POST['search_val']) !='')
  {
    $date .="AND User_Mobile LIKE '%$_POST[search_val]%'";
  }
  else
  {
    $date .="AND tbl_doctor_master.Doc_Name LIKE '%$_POST[search_val]%'";
  }
  $sql ="SELECT tbl_online_appointment.Order_Id,tbl_doctor_master.Doc_Name,tbl_user.User_Name,tbl_user.User_Mobile,tbl_payment.Pay_Order_Id,tbl_payment.Pay_Mode,tbl_payment.Pay_Amount,tbl_payment.Pay_Bank,DATE(tbl_payment.Pay_Date) AS Pay_Date FROM `tbl_online_appointment` INNER JOIN tbl_user on tbl_user.User_Id=tbl_online_appointment.Cust_Id INNER JOIN tbl_doctor_master ON tbl_doctor_master.Doc_Id=tbl_online_appointment.Doc_Id INNER JOIN tbl_payment ON tbl_payment.Order_Id=tbl_online_appointment.Order_Id ".$date." ORDER BY DATE(tbl_payment.Pay_Date) DESC";
  if($row =$server->All_Record($sql))
  {
    $count =1;
    $output='';
    $total_amount=0;
    foreach ($server->View_details as $value) {
      $output .='
         <tr>
           <td><input type="checkbox" name="select_record" class="select_record" value="'.$value['Order_Id'].'"></td>
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
    $total_amount += $value['Pay_Amount'];
    }
    $output .='<tr>
       <td colspan="6">Total Record : '.$row.'</td>
       <td colspan="4">Total Amount : '.number_format($total_amount,2).'</td>
       </tr>';
  echo $output;
  }
  else
  {
    echo "<tr><td class='text-danger' colspan='10'>Record Not Found</td></tr>";
  }
}






}
?>