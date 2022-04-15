<?php
require_once("../sending_mail/PHPMailerAutoload.php");
require_once ("../sending_mail/class.phpmailer.php");
require_once("../db_connect/db_connect.php");
require_once("../class/class.php");
$server = new  Main_Classes;
if(isset($_POST['action']))
{
	date_default_timezone_set("Asia/Kolkata");
    $current_date = date('d-m-Y h:i');
    // SIGNUP FORM METHOD
	if($_POST['page']=="SignUp_Form_Action")
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
	  	  if($server->Send_email($_POST['email'],$subject,$body))
	  	  {
	  	  	 $query = "INSERT INTO `tbl_user`(`User_Id`, `User_Name`, `User_Gender`, `User_Dob`, `User_Email`, `User_Mobile`, `User_Address`, `User_Password`, `User_Email_Verify`, `User_Verify_Status`) VALUES (null,'$_POST[name]','$_POST[gender]','$_POST[dob]','$_POST[email]','$_POST[mobile]','$_POST[address]','$rand_num','$rand_num1','Yes')";
	  	  	 if($server->Data_Upload($query))
	  	  	 {
	  	  	 	$output = array(
			       'success'=>'SignUp Successfully. Please Verify Your Email .'
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
      
     echo json_encode($output);
	}
    // LOGIN FORM METHOD
	if($_POST['page']=="Login_Form_Action")
	{
	  $sql = "SELECT `User_Id`, `User_Email`, `User_Mobile`, `User_Password`, `User_Email_Verify`, `User_Verify_Status` FROM `tbl_user` WHERE User_Email='$_POST[email]'";
	  if($server->All_Record($sql))
	  {
	  	 foreach ($server->View_details as $value) {
	  	 	# code...
	  	 }
	  	if($value['User_Password']==$_POST['password'])
	  	{
            if($value['User_Verify_Status']=="Yes")
            {
            	$output = array(
                   'success'=>'Login Successfully'
            	);
            }
            else{
            	$output = array(
                   'error'=>'This Mail is Not Verify !'
            	);
            }
	  	}
	  	else
	  	{
	  		$output = array(
              'error'=>'Wrong Password !'
	  		);
	  	}

	  }
	  else
	  {
	  	 $output = array(
            'error'=>'Invalid Email Id .. !'
	  	 ); 
	  }
      echo json_encode($output);
	}


 if($_POST['page']=="Search_Doctor_User")
 {
 	if($_POST['page_num'] !="")
	{
		$page = $_POST['page_num'];
	}
	else
	{
		$page = 1;
	}
	$num_per_page=06;
	$start_from=($page-1)*06;


 	if($_POST['value'] !="")
 	{
      //$sql = "SELECT * FROM `tbl_doctor_master` INNER JOIN tbl_doctor_specialization ON tbl_doctor_master.Doc_Id=tbl_doctor_specialization.Doc_Id INNER JOIN tbl_doctor_profile_image ON tbl_doctor_profile_image.Doc_Id=tbl_doctor_master.Doc_Id WHERE tbl_doctor_master.Doc_Name LIKE '%$_POST[value]%' OR tbl_doctor_specialization.Spl_Name LIKE '%$_POST[value]%' GROUP BY tbl_doctor_specialization.Doc_Id ORDER BY tbl_doctor_master.Doc_Id Desc  LIMIT $start_from,$num_per_page";
 	$sql = "SELECT tbl_doctor_master.Doc_Id,tbl_doctor_master.Doc_Mobile,`Doc_Name`,tbl_doctor_specialization.Doc_Id,tbl_doctor_specialization.Spl_Name,table_department_master.Dept_Name,tbl_doctor_profile_image.Pro_Image,tbl_doctor_appointment.App_Fees
	FROM table_department_master INNER JOIN tbl_doctor_specialization ON tbl_doctor_specialization.Dept_Id=table_department_master.Dept_Id INNER JOIN tbl_doctor_master ON tbl_doctor_master.Doc_Id=tbl_doctor_specialization.Doc_Id INNER JOIN tbl_doctor_profile_image ON tbl_doctor_profile_image.Doc_Id=tbl_doctor_master.Doc_Id LEFT JOIN tbl_doctor_appointment ON tbl_doctor_appointment.Doc_Id=tbl_doctor_master.Doc_Id WHERE tbl_doctor_master.Doc_Name LIKE '%$_POST[value]%' OR table_department_master.Dept_Id LIKE '%$_POST[value]%' GROUP BY tbl_doctor_appointment.Doc_Id 
	ORDER BY 
	     CASE Dept_Name WHEN 'PSYCHIATRY' THEN 1
	               WHEN 'DIETETICS' THEN 2
	               WHEN 'SPECIAL EDUCATOR' THEN 4
	               WHEN 'DIABETES and METABOLIC Clinic' THEN 5
	     ELSE 6 END ASC
	     , Dept_Name ASC LIMIT $start_from,$num_per_page ";
 	}
 	else
 	{
     //$sql = "SELECT * FROM `tbl_doctor_master` INNER JOIN tbl_doctor_specialization ON tbl_doctor_master.Doc_Id=tbl_doctor_specialization.Doc_Id INNER JOIN tbl_doctor_profile_image ON tbl_doctor_profile_image.Doc_Id=tbl_doctor_master.Doc_Id ORDER BY tbl_doctor_master.Doc_Id Desc  LIMIT $start_from,$num_per_page";
 	 $sql = "SELECT tbl_doctor_master.Doc_Id,tbl_doctor_master.Doc_Mobile,`Doc_Name`,tbl_doctor_specialization.Doc_Id,tbl_doctor_specialization.Spl_Name,table_department_master.Dept_Name,tbl_doctor_profile_image.Pro_Image,tbl_doctor_appointment.App_Fees
	FROM table_department_master INNER JOIN tbl_doctor_specialization ON tbl_doctor_specialization.Dept_Id=table_department_master.Dept_Id INNER JOIN tbl_doctor_master ON tbl_doctor_master.Doc_Id=tbl_doctor_specialization.Doc_Id INNER JOIN tbl_doctor_profile_image ON tbl_doctor_profile_image.Doc_Id=tbl_doctor_master.Doc_Id LEFT JOIN tbl_doctor_appointment ON tbl_doctor_appointment.Doc_Id=tbl_doctor_master.Doc_Id GROUP BY tbl_doctor_appointment.Doc_Id
	ORDER BY 
	     CASE Dept_Name WHEN 'PSYCHIATRY' THEN 1
	               WHEN 'DIETETICS' THEN 2
	               WHEN 'SPECIAL EDUCATOR' THEN 4
	               WHEN 'DIABETES and METABOLIC Clinic' THEN 5
	     ELSE 6 END ASC
	     , Dept_Name ASC LIMIT $start_from,$num_per_page";
 	}
  
	

 
 if($server->All_Record($sql))
 {
 	$output ='';
 	foreach ($server->View_details as $value) {
 	    
 	    $output.= '<div class="col-12 col-sm-6 col-md-6 d-flex align-items-stretch">
	              <div class="card bg-light">
	                <div class="card-header text-muted border-bottom-0">
	                  Neuromax Healthcare
	                </div>
	                <div class="card-body pt-0">
	                  <div class="row">
	                    <div class="col-8">
	                      <h5 style="font-size:18px;"><b>'.$value['Doc_Name'].'</b></h5>
	                      '.$server->All_Education_details($value['Doc_Id']).'
	                      '.$server->All_Specialist($value['Doc_Id']).'
                           <b>Fees</b><br><i class="fa fa-inr" aria-hidden="true"></i>
                           '.$value['App_Fees'].'
	                      ';
	                    // $output . ='<ul class="ml-4 mb-0 fa-ul text-muted">
	                    //     <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Email: '.$value['Doc_Email'].'</li>
	                    //     <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: + '.$value['Doc_Mobile'].'</li>
	                    //   </ul>';
	                      $output .='
	                    </div>
	                    <div class="col-4 text-center">
	                      <img src="doc_images/'.$value['Pro_Image'].'" alt="" class="img-circle img-fluid">
	                    </div>
	                  </div>
	                </div>
	                <div class="card-footer">
	                  <div class="text-right">
	                    <a href="#" class="btn btn-sm btn-primary View_Profile" data-id="'.$value['Doc_Id'].'">
	                      <i class="fas fa-calendar-check"></i> Appointment 
	                    </a>
	                    
	                  </div>
	                </div>
	              </div>
	            </div>';
 	}
 	// <a href="#" class="btn btn-sm btn-primary View_Profile" data-id="'.$value['Doc_Id'].'">
	 //                      <i class="fas fa-user"></i> View Profile
	 //                    </a>
 	    if($_POST['value'] !="")
	 	{
	      //$p_sql = "SELECT * FROM `tbl_doctor_master` INNER JOIN tbl_doctor_specialization ON tbl_doctor_master.Doc_Id=tbl_doctor_specialization.Doc_Id WHERE tbl_doctor_master.Doc_Name LIKE '%$_POST[value]%' OR tbl_doctor_specialization.Spl_Name LIKE '%$_POST[value]%' GROUP BY tbl_doctor_specialization.Doc_Id ORDER BY tbl_doctor_master.Doc_Id Desc";
	 	$p_sql = "SELECT *
		FROM table_department_master INNER JOIN tbl_doctor_specialization ON tbl_doctor_specialization.Dept_Id=table_department_master.Dept_Id INNER JOIN tbl_doctor_master ON tbl_doctor_master.Doc_Id=tbl_doctor_specialization.Doc_Id INNER JOIN tbl_doctor_profile_image ON tbl_doctor_profile_image.Doc_Id=tbl_doctor_master.Doc_Id WHERE tbl_doctor_master.Doc_Name LIKE '%$_POST[value]%' OR table_department_master.Dept_Id LIKE '%$_POST[value]%'
		ORDER BY 
		     CASE Dept_Name WHEN 'PSYCHIATRY' THEN 1
		               WHEN 'DIETETICS' THEN 2
		               WHEN 'SPECIAL EDUCATOR' THEN 4
		               WHEN 'DIABETES and METABOLIC Clinic' THEN 5
		     ELSE 6 END ASC
		     , Dept_Name ASC";
	 	}
	 	else
	 	{
	    // $p_sql="SELECT Doc_Id, `Doc_Name`, `Doc_Lic`, `Doc_Mobile`, `Doc_Email`, `Doc_Added_Date` FROM `tbl_doctor_master` ORDER BY Doc_Id Desc";
	      $p_sql = "SELECT *
			FROM table_department_master INNER JOIN tbl_doctor_specialization ON tbl_doctor_specialization.Dept_Id=table_department_master.Dept_Id INNER JOIN tbl_doctor_master ON tbl_doctor_master.Doc_Id=tbl_doctor_specialization.Doc_Id INNER JOIN tbl_doctor_profile_image ON tbl_doctor_profile_image.Doc_Id=tbl_doctor_master.Doc_Id
			ORDER BY 
			     CASE Dept_Name WHEN 'PSYCHIATRY' THEN 1
			               WHEN 'DIETETICS' THEN 2
			               WHEN 'SPECIAL EDUCATOR' THEN 4
			               WHEN 'DIABETES and METABOLIC Clinic' THEN 5
			     ELSE 6 END ASC
			     , Dept_Name ASC";
	 	}
 	       
 	       $total_page = $server->Pagination($p_sql,$num_per_page);
 	       $footer='';
		   if($page>1)
            {	
             
             $footer .= '<li class="page-item"><a class="page-link page_click" href="javascript:void(0)" data-id="'.($page-1).'">Previous</a></li>';
            }
           for($i=1;$i<$total_page;$i++)
           {
             
			$footer .= '<li class="page-item"><a class="page-link page_click" href="javascript:void(0)" data-id="'.$i.'">'.$i.'</a></li>';            
           }
           if($i>$page)
           {
            $footer .= '<li class="page-item"><a class="page-link page_click" href="javascript:void(0)" data-id="'.($page+1).'">Next</a></li>';
           }

          
 	$output = array(
     'body'=>$output,
     'page'=>$footer
    );
 }
 else
 {
 	$output = array(
     'body'=>"<h3>Not Found<h3>",
     'page'=>''
    );
 }
 
 echo json_encode($output);

 }

 if($_POST['page']=="Appointment_Details_Per_Doctor")
 {
 	$sql = "SELECT `App_Id`, tbl_doctor_master.Doc_Id, `App_Day`, `App_Day_Shift`, `App_Fees`, `App_Start_Time`, `App_End_Time`,tbl_doctor_master.Doc_Name FROM `tbl_doctor_appointment` INNER JOIN tbl_doctor_master ON tbl_doctor_master.Doc_Id=tbl_doctor_appointment.Doc_Id  WHERE tbl_doctor_appointment.Doc_Id='$_POST[id]'  GROUP BY tbl_doctor_appointment.App_Day ORDER BY tbl_doctor_appointment.App_Day ASC";
 	if($server->All_Record($sql))
 	{
 		$output='<table>
 		    <tr>
 		      <th>Day</th>
 		      <th>Morning</th>
 		      <th>Evening</th>
 		    </tr>';
 		$doc_name = '';
 		foreach ($server->View_details as $value) {
 		    
 		    $output .='
                    <tr>
		             <th>'.$value['App_Day'].'</th>
		             <td>
		             '.$server->Morning_Shift_Time($value['Doc_Id'],$value['App_Day']).'
		             </td> 
		             <td>
                      '.$server->Evening_Shift_Time($value['Doc_Id'],$value['App_Day']).'
		            </td> 
		           </tr>
 		            ';
 		}
 		$output .='</table>';

 		$doc_name .= 'Doctor : '.$value['Doc_Name'];

	     $output1 = array(
	        'success'=>$output,
	        'doc_name'=>$doc_name
	 	);
 	}
 	else
 	{
 		 $output1 = array(
           'error'=>'<h4>Appointment Not Added</h4>',
           'doc_name'=>''
 	     );
 	}

 	

 echo json_encode($output1);
 }

 if($_POST['page']=="Confirm_appointment_page")
 {
 	$sql = "SELECT `User_Id`,`User_Email`,`User_Mobile`,`User_Verify_Status` FROM `tbl_user` WHERE User_Mobile='$_POST[mobile]'";
    if($server->All_Record($sql))
    {
    	foreach ($server->View_details as $value) {
    	  
    	}
    	if($value['User_Mobile']==$_POST['mobile'])
    	{
    		if($value['User_Verify_Status']=="Yes")
    		{
    			$startdate=strtotime($_POST['Day']);
			    $enddate=strtotime("+1 weeks", $startdate);
			    while ($startdate < $enddate) {
			      $book_date = date("Y-m-d", $startdate);
			      $startdate = strtotime("+1 week", $startdate);
			    }
    			$email = $value['User_Email'];
			    $subject = "Booking Appointment Day";
			    $body = "
			        <div>
			          <table border='1'style='background-color:#64D5A6;color:white;width:100%;height:100%;text-align:center;padding:5px;'> 
			              <tr>
			                <th>Doctor Name</th>
			                <td>".$_POST['Doc_Name']."</td>
			              </tr>
			              <tr>
			                <th>App Day</th>
			                <td>".$_POST['Day']."</td>
			              </tr>
			              <tr>
			                <th>App Shift</th>
			                <td>".$_POST['Shift']."</td>
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
			    	$query = "INSERT INTO `tbl_online_appointment`(`Order_Id`, `Doc_Id`, `Cust_Id`, `App_Day`, `App_Shift`, `App_Time`, `Order_Status`,`App_date`) VALUES (null,'$_POST[Doc_Id]','$value[User_Id]','$_POST[Day]','$_POST[Shift]','$_POST[time]','Pending','$book_date')";
		           if($server->Data_Upload($query))
		           {
		           	 $txtmsg= 
	                   "*Online Appointment Information* " ."%0a" . 
	                   "*Patient Mobile No:* " .$_POST['mobile']."%0a" .
	                   "*Doctor Name:* ".$_POST['Doc_Name']."%0a" .
	                   "*Appointment Day:* ".$_POST['Day']."%0a" . 
	                   "*Appointment Shift:* " .$_POST['Shift']."%0a" .
	                   "*Appointment Date:* " .$book_date."%0a" .
	                   "*Appointment Time:* " .$_POST['time']."%0a";
	                   
		           	   $output = array(
		                   'success'=>'Booking Request Successfully',
		                   'url'=>'https://wa.me/919609304072/?text='.$txtmsg.''
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
                      'error'=>'Technical issue, Email is not Send...!'
			    	);
			    }
    			
    		}
    		else
    		{
    			 $output = array(
                    'error'=>'Your Email is Not Verify !'
    			 );
    		}
           
    	}
    	else
    	{
    		$output = array(
               'error'=>'Not Registered This Number !'
    		);
    	}
    }
    else
    {
    	$output = array(
           'error'=>'Not Registered This Number !'
    	);
    }

   echo json_encode($output);
 }

 if($_POST['page']=="Department_doctor_Name")
 {
 	$sql = "SELECT tbl_doctor_master.Doc_Id,tbl_doctor_master.Doc_Mobile,`Doc_Name`,tbl_doctor_specialization.Doc_Id,tbl_doctor_specialization.Spl_Name,table_department_master.Dept_Name,tbl_doctor_profile_image.Pro_Image,tbl_doctor_appointment.App_Fees FROM `tbl_doctor_master` INNER JOIN tbl_doctor_specialization ON tbl_doctor_specialization.Doc_Id=tbl_doctor_master.Doc_Id INNER JOIN table_department_master ON tbl_doctor_specialization.Dept_Id=table_department_master.Dept_Id  INNER JOIN tbl_doctor_profile_image ON tbl_doctor_profile_image.Doc_Id=tbl_doctor_master.Doc_Id LEFT JOIN tbl_doctor_appointment ON tbl_doctor_appointment.Doc_Id=tbl_doctor_master.Doc_Id WHERE  tbl_doctor_specialization.Dept_Id ='$_POST[dept_id]' AND tbl_doctor_master.Doc_Flag !=1 GROUP BY tbl_doctor_appointment.Doc_Id";

 	if($server->All_Record($sql))
 	{
 		$output = '';
 		foreach ($server->View_details as $value) {
 		    
 		    // $output .= '
	 		   //  <div class="col-md-12">
		     //        <label><b>'.$value['Doc_Name'].'</b></label><br/>
		     //        '.$server->All_Education_details($value['Doc_Id']).'
		     //        <p>'.$value['Spl_Name'].'</p><hr/>
	      //       </div>';

 			 $output.= '<div class="col-lg-12 col-sm-12 col-md-12 d-flex align-items-stretch">
	              <div class="card bg-light">
	                <div class="card-header text-muted border-bottom-0">
	                  Neuromax Healthcare
	                </div>
	                <div class="card-body pt-0">
	                  <div class="row">
	                    <div class="col-8">
	                      <h5 style="font-size:18px;"><b>'.$value['Doc_Name'].'</b></h5>
	                      '.$server->All_Education_details($value['Doc_Id']).'<br>
	                      <b>Specialist:</b><br/>
	                       '.$value['Spl_Name'].'<br>
	                       <b>Fees:</b><br/><i c
	                       lass="fa fa-inr" aria-hidden="true"></i>&nbsp;'.$value['App_Fees'].'
	                      ';
	                    // $output . ='<ul class="ml-4 mb-0 fa-ul text-muted">
	                    //     <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Email: '.$value['Doc_Email'].'</li>
	                    //     <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: + '.$value['Doc_Mobile'].'</li>
	                    //   </ul>';
	                      $output .='
	                    </div>
	                    <div class="col-4 text-center">
	                      <img src="doc_images/'.$value['Pro_Image'].'" alt="" class="img-circle img-fluid">
	                    </div>
	                  </div>
	                </div>
	                <div class="card-footer">
	                  <div class="text-right">
	                    <a href="#" class="btn btn-sm btn-primary View_Profile" data-id="'.$value['Doc_Id'].'">
	                      <i class="fas fa-calendar-check"></i> Appointment 
	                    </a>
	                    &nbsp;&nbsp;&nbsp;
	                    
	                    
	                  </div>
	                </div>
	              </div>
	            </div>';

	         // <a href="https://wa.me/91'.$value['Doc_Mobile'].'/?text='.$value['Doc_Name'].'" target="blank">
	         //              <i class="fab fa-whatsapp-square text-success fa-2x" aria-hidden="true"></i> 
	         //            </a>
 		}

 	 $output1 = array(
         'success'=>$output
 	 );
 	 echo json_encode($output1);
 	}
 	else
 	{
 		$output = '';
 		$output .= '<div class="col-md-12">
		            <h5>Not Found</h5>
		            </div>';
 		$output1 = array(
          'error'=>$output
 	    );
 	   echo json_encode($output1);
 	}


 }

 if($_POST['page']=="Need_help_Model")
 {
 	 $sql = "INSERT INTO `tbl_need_help`(`Help_Id`, `Help_Email`, `Help_Desc`, `Help_Date`) VALUES (null,'$_POST[email]','$_POST[desc]','$current_date')";
 	 if($server->Data_Upload($sql))
 	 {
 	 	$output = array(
            'success'=>'Request Sending Successfully'
 	 	);
 	 }
 	 else
 	 {
 	 	 $output  = array(
           'error'=>'Technical issue. Please try Again..!'
 	 	 );
 	 }

echo json_encode($output);
 }

 if($_POST['page']=="Opening_Hour_Page_")
 {
 	$sql = "SELECT `Opn_Id`,`Opn_Day`, `Opn_Time` FROM `tbl_opening_time`";
   if($server->All_Record($sql))
   {
    $output='<table class="table table-bordered text-center"><thead><th>DAY</th><th>TIME</th></thead><tbody>';
    $count = 1;
    foreach ($server->View_details as $value) {
       
       $output .='
            <tr>
               <th>'.$value['Opn_Day'].'</th>
               <td>'.$value['Opn_Time'].'</td>
            </tr>
        '; 
    $count++;
      }
    $output .= '</tbody></table>';

   $output1 = array(
      'success'=>$output
   );

   echo json_encode($output1);
   }

   else
   {
   	  $output = array(
         'error'=>'Time Hour Not Selected !'
   	  );

   	 echo json_encode($output);
   }
 }

 if($_POST['page']=="Less_More_Content")
 {
 	$value = $server->Read_More(35,$_POST['text'],$_POST['content_show']);
 	$output = array(
      'success'=>$value
 	);

 	echo json_encode($output);
 }

 if($_POST['page']=="News_show_modal")
 {
 	$sql = "SELECT `News_Id`, `News_Title`, `News_Desc`, `News_Added` FROM `tbl_news` WHERE News_Id='$_POST[id]'";
 	if($server->All_Record($sql))
 	{
 		foreach ($server->View_details as $value) {
 		    
 		}
 	  $output = array(
        'title'=>$value['News_Title'],
        'body'=>$value['News_Desc'],
        'success'=>true
 	  );
 	}
 	else
 	{
 		$output = array(
           'error'=>' Not Access !' 
 		);
 	}

echo json_encode($output);
 }

 if($_POST['page']=="All_Blog_view_page")
 {
 	$sql = '';
 	if(!empty($_POST['date']))
 	{
 	 $sql = "SELECT `Blog_Id`, `Blog_Header`, `Blog_Desc`, `Blog_Publish_Id`, CONCAT(YEAR(tbl_news.Blog_Date),'-',LPAD(MONTH(tbl_news.Blog_Date),2,'0')) AS Blog_Date,tbl_doctor_master.Doc_Name,tbl_doctor_master.Doc_Id,tbl_doctor_master.Doc_Mobile,tbl_doctor_profile_image.Pro_Image FROM `tbl_news` INNER JOIN tbl_doctor_master ON tbl_doctor_master.Doc_Id=tbl_news.Blog_Publish_Id INNER JOIN tbl_doctor_profile_image ON tbl_doctor_profile_image.Doc_Id=tbl_news.Blog_Publish_Id  WHERE  CONCAT(YEAR(tbl_news.Blog_Date),'-',LPAD(MONTH(tbl_news.Blog_Date),2,'0')) ='$_POST[date]'";
 	}
 	elseif (!empty($_POST['doctor'])) {

 		$sql = "SELECT CONCAT(YEAR(Blog_Date),'-',MONTH(Blog_Date)) AS month ,`Blog_Id`, `Blog_Header`, `Blog_Desc`, `Blog_Publish_Id`, `Blog_Date`,tbl_doctor_master.Doc_Name,tbl_doctor_master.Doc_Mobile,tbl_doctor_master.Doc_Id,tbl_doctor_profile_image.Pro_Image FROM `tbl_news` INNER JOIN tbl_doctor_master ON tbl_doctor_master.Doc_Id=tbl_news.Blog_Publish_Id INNER JOIN tbl_doctor_profile_image ON tbl_doctor_profile_image.Doc_Id=tbl_news.Blog_Publish_Id WHERE tbl_doctor_master.Doc_Id='$_POST[doctor]'";
 	}
 	else
 	{
       $sql = "SELECT CONCAT(YEAR(Blog_Date),'-',MONTH(Blog_Date)) AS month ,`Blog_Id`, `Blog_Header`, `Blog_Desc`, `Blog_Publish_Id`, `Blog_Date`,tbl_doctor_master.Doc_Name,tbl_doctor_master.Doc_Mobile,tbl_doctor_master.Doc_Id,tbl_doctor_profile_image.Pro_Image FROM `tbl_news` INNER JOIN tbl_doctor_master ON tbl_doctor_master.Doc_Id=tbl_news.Blog_Publish_Id INNER JOIN tbl_doctor_profile_image ON tbl_doctor_profile_image.Doc_Id=tbl_news.Blog_Publish_Id ORDER BY tbl_news.Blog_Id Desc";
 	}
 	if($server->All_Record($sql))
 	{
 		 $output='';
 		 foreach ($server->View_details as $value) {
 		 	$output .= '<div data-aos="fade-right" data-aos-delay="100">
              <div class="col-12 col-sm-12 col-md-12 ">
              	<!-- d-flex align-items-stretch -->
	              <div class="card bg-light">
	                <div class="card-header text-muted border-bottom-0">
	                  <h5 style="font-size:16px;font-weight:bold;">'.$value['Blog_Header'].'</h5>
	                </div>
	                <div class="card-body pt-0">
	                  <div class="row">
	                    <div class="col-8">
	                      <b>'.$value['Blog_Date'].'</b><br/>
	                      <div id="'.$value['Blog_Id'].'" style="font-size:14px;">'.$server->Read_More(35,$value['Blog_Desc'],$value['Blog_Id']).'</div>
	                    </div>
	                    <div class="col-4 text-center">
	                       <label>'.$value['Doc_Name'].'</label>
	                      <img src="doc_images/'.$value['Pro_Image'].'" alt="" class="img-circle img-fluid" style="border-radius: 50%; width: 110px;"><br/>
	                      <label>'.$server->All_Education_details($value['Doc_Id']).'</label>
	                    </div>
	                  </div>
	                </div>
	                
	              </div>
	            </div>
            </div><br>';
 	}
    $output1 = array(
      'success'=>$output
    );

    echo json_encode($output1);
 	}
 	else
 	{
 		$output1 = array(
           'error'=>'<h2>Not Found !</h2>'
        );

    echo json_encode($output1);
 	}

 }

 // Zoom Image Method
 if($_POST['page']=="Zoom_Image_show_modal")
 {
 	$sql = "SELECT `Gall_Id`, `Gall_Title`, `Gall_Image` FROM `tb_galllery_master` WHERE Gall_Id='$_POST[id]'";
 	if($server->All_Record($sql))
 	{
 		$output = '';
 		foreach ($server->View_details as $value) {
 			
 			 $output .= '<div class="col-md-12 bg-dark p-1">
            <div class="" data-aos="fade-right" data-aos-delay="100">

             <div id="carouselExampleControlsModel'.$value['Gall_Id'].'" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                  <a href="javascript:void(0)" class="zoom_image" data-id="'.$value['Gall_Id'].'">
                    <img class="d-block w-100" src="images/'.$value['Gall_Image'].'" alt="First slide" width="100%" height="250px" style="background-size: cover;">
                  </a>
                  </div>
                  '.$server->All_Sub_Image_Show($value['Gall_Id'],"Model",$value['Gall_Title']).'
                  
                 ';
 		}

     $output1 = array(
        'success'=>$output
     );
    
 	}
 	else
 	{
 		$output1 = array(
            'error'=>'Access Denied. Please try again..! '
 		);
 	
 	}

 echo json_encode($output1);
 }

 if($_POST['page']=="Feedback_form_send")
 {
 	$sql = "INSERT INTO `tbl_feedback_master`(`Feed_Id`, `Feed_Name`,`Feed_Gender`, `Feed_Mobile`, `Feed_Comment`, `Feed_Rating`) VALUES (null,'$_POST[name]','$_POST[gender]','$_POST[Mobile]','$_POST[commment]','$_POST[rating]')";
 	if($server->Data_Upload($sql))
 	{
 		$output= array(
          'success'=>'Feedback Sending Successfully'
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
	
	
}

?>