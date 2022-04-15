<?php
//require_once("../../db_connect/db_connect.php");
class Main_Classes 
{
	var $conn;
	var $lastid;
	var $View_details;	
  var $all_service;
  var $all_client;
  var $all_plan_option;
	public function __construct()
	 {
    $this->conn= new mysqli(HOST,USERNAME,PASSWORD,DATABASE);
    if(! $this->conn)
    {
      die("Database Not Found");
    }
    else
    {
       session_start();
    }
  }
    public function Root()
    {
      // return "http://neotrionet.com/demo/Neuromax/";
      return "http://localhost/Neuromax_site/";
    }
    public function redirect($page)
        {
          header('location:'.$page.'');
          exit;
        }
     // ADMIN SESSION CHECK
    public function admin_session_private()
      {
      if(!isset($_SESSION['Admin_logged_in']))
      {
        $this->redirect($this->Root().'admin');
      }
    }
    // Login Session Checking
    public function login_session_Check()
      {
      if(isset($_SESSION['Admin_logged_in']))
      {
        $this->redirect($this->Root().'admin/Dashboard/dashboard.php');
      }
    }

    public function clean_data($data)
     {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
     }

    public function Data_Upload($data){

      if($this->conn->query($data))
      {

         $this->lastid = $this->conn->insert_id;
         return true;
      }
      else{
       
          return false;
      }

    }

    public function Find_Unic_Value($sql)
      {
      $query= $this->conn->query($sql);
     
      if($query)
      {
        $result = $query->fetch_array(MYSQLI_ASSOC);
        if($query->num_rows>0)
         {
            return $result['reg_name'];
        }
      }
      else
       {
          return false;
       }

    }
    public function All_Record($sql){
       $query= $this->conn->query($sql);
        if($count = $query->num_rows)
        {      
            while($result = $query->fetch_array(MYSQLI_ASSOC))
             {
                $this->View_details[] = $result;
             }
        return $count;
          return $this->View_details;     
        }
        else{
            return 0;
        }   

    }
    
     public function All_Plan_Option($sql){
       $query= $this->conn->query($sql);
        if($count = $query->num_rows)
        {      
            while($result = $query->fetch_array(MYSQLI_ASSOC))
             {
                $this->all_plan_option[] = $result;
             }
        return $count;
          return $this->all_plan_option;     
        }
        else{
            return 0;
        }   

    }
   public function Send_email($receiver_email,$subject,$body)
     {
      $mail = new PHPMailer;

      $mail->IsSMTP();

      $mail->Host = 'host';

      $mail->Port = 'port';

      $mail->SMTPAuth = true;

      $mail->Username = 'enter-your-email';

      $mail->Password = 'enter-your-password';

      $mail->SMTPSecure = 'tls';

      $mail->From = 'info@noreply';

      $mail->FromName = 'info@noreply';

      $mail->AddAddress($receiver_email, '');

      $mail->IsHTML(true);

      $mail->Subject = $subject;

      $mail->Body = $body;

      //$mail->AddEmbeddedImage('first.png','apple');

      if($mail->Send())
      {
        return true;
      }
      else
      {
        return "{$mail->ErrorInfo}";
      }
      
    }


 public function All_Specialist($id)
   {
    $sql = "SELECT `Spl_Id`, `Doc_Id`, `Spl_Name`, `Spl_Date` FROM `tbl_doctor_specialization` WHERE Doc_Id='$id'";
    $result = $this->conn->query($sql);
    if($result->num_rows>0)
        { 
           $output='<p class="text-muted text-sm"><b>Specialist:<br/> </b> 
                        ';
            while($fetch = $result->fetch_array(MYSQLI_ASSOC))
             {
                 $output .= '<span>'.$fetch['Spl_Name'].'</span><br/>';
             }
            $output .='</p>'; 

          return $output;        
        }
    
  }

  public function All_Education_details($id)
   {
    $sql = "SELECT `Edu_Id`, `Doc_Id`, `Edu_Degree`, `Edu_Year`, `Edu_University`, `Edu_Added_Date` FROM `tbl_doctor_education` WHERE Doc_Id='$id'";
    $result = $this->conn->query($sql);
    if($result->num_rows>0)
        { 
           $output='';
            while($fetch = $result->fetch_array(MYSQLI_ASSOC))
             {
                 $output .= '<span>'.$fetch['Edu_Degree'].'</span>,';
             }
            $output = trim($output, ',');

          return $output;        
        }
    
  }

  public function Pagination($sql,$page)
  {
    $result = $this->conn->query($sql);
    if($row = $result->num_rows)
    {
        $total_page= ceil($row/$page);
        return $total_page;
    }
  }

  public function All_specialist_Search()
  {
    $sql = "SELECT `Dept_Id`, `Dept_Name`, `Dept_Date` FROM `table_department_master` ORDER BY Dept_Id Asc";
    $result = $this->conn->query($sql);
     if($result->num_rows)
        { 
           $output='<option value="">Specialist</option>';
            while($fetch = $result->fetch_array(MYSQLI_ASSOC))
             {
                 $output .= '<option value="'.$fetch['Dept_Id'].'">'.$fetch['Dept_Name'].'</option>';
             }
          return $output;        
        }
  }

  public function Total_Doctor()
  {
    $sql = "SELECT Doc_Id FROM `tbl_doctor_master`";
    $result = $this->conn->query($sql);
    if($num =$result->num_rows)
        {  
          return $num;        
        }
        else
        {
          return 0;
        }
  }

  public function Doctor_Name($id)
  {
    $sql = "SELECT Doc_Name FROM `tbl_doctor_master` WHERE Doc_Id='$id'";
    $result = $this->conn->query($sql);
    if($fetch = $result->fetch_array(MYSQLI_ASSOC))
        {  
          return $fetch['Doc_Name'];        
        }
        else
        {
          return 'Unknown Doctor Name';
        }
  }

  public function Total_Patient()
  {
    
    $sql = "SELECT * FROM `tbl_user`";
    $result = $this->conn->query($sql);
    if($num =$result->num_rows)
        {  
          return $num;        
        }
        else
        {
          return 0;
        }
  }

  public function Total_Success_Visit()
  {
    
    $sql = "SELECT `Order_Status`,`pay_status` FROM `tbl_online_appointment` WHERE Order_Status='Success' AND pay_status='1'";
    $result = $this->conn->query($sql);
    if($num =$result->num_rows)
        {  
          return $num;        
        }
        else
        {
          return 0;
        }
  }

  public function Total_Amount()
  {
    $sql = "SELECT ROUND(IFNULL(SUM(Pay_Amount),0),2) AS amount FROM `tbl_payment`";
    $result = $this->conn->query($sql);
    if($fetch = $result->fetch_array(MYSQLI_ASSOC))
    {
      return $fetch['amount'];
    }
  }


  public function All_Doctor()
  {
    $sql = "SELECT tbl_doctor_master.Doc_Id,table_department_master.Dept_Name,tbl_doctor_master.Doc_Name FROM `tbl_doctor_specialization` INNER JOIN tbl_doctor_master ON tbl_doctor_master.Doc_Id=tbl_doctor_specialization.Doc_Id INNER JOIN table_department_master ON table_department_master.Dept_Id=tbl_doctor_specialization.Dept_Id WHERE Doc_Flag !='1' GROUP BY tbl_doctor_specialization.Doc_Id ORDER BY tbl_doctor_master.Doc_Id Desc";
    $result = $this->conn->query($sql);
     if($result->num_rows)
        { 
           $output='';
            while($fetch = $result->fetch_array(MYSQLI_ASSOC))
             {
                 $output .= '<option value="'.$fetch['Doc_Id'].'">'.$fetch['Doc_Name'].', <span style="opacity:0.9;font-size:10px;">'.$fetch['Dept_Name'].'</span></option>';
             }
          return $output;        
        }
  }

  public function All_Doctor_Blog()
  {
    $sql = "SELECT `Blog_Id`, `Blog_Header`, `Blog_Desc`, `Blog_Publish_Id`, `Blog_Date`,tbl_doctor_master.Doc_Name,tbl_doctor_master.Doc_Id FROM `tbl_news` INNER JOIN tbl_doctor_master ON tbl_doctor_master.Doc_Id=tbl_news.Blog_Publish_Id  ORDER BY Doc_Id Desc";
    $result = $this->conn->query($sql);
     if($result->num_rows)
        { 
           $output='';
            while($fetch = $result->fetch_array(MYSQLI_ASSOC))
             {
                 $output .= '<option value="'.$fetch['Doc_Id'].'">'.$fetch['Doc_Name'].'</option>';
             }
          return $output;        
        }
  }
  public function All_Department_List()
  {
    $sql = "SELECT `Dept_Id`, `Dept_Name`, `Dept_Date` FROM `table_department_master` ORDER BY Dept_Id Desc";
    $result = $this->conn->query($sql);
     if($result->num_rows)
        { 
           $output='';
            while($fetch = $result->fetch_array(MYSQLI_ASSOC))
             {
                 $output .= '<option value="'.$fetch['Dept_Id'].'">'.$fetch['Dept_Name'].'</option>';
             }
          return $output;        
        }
  }

  // public function Per_Day_Check($doc_id,$day)
  // {
  //    $sql = "SELECT `App_Id`, `Doc_Id`, `Cham_Id`, `App_Day`, `App_Day_Shift`, `App_Fees`, `App_Start_Time`, `App_End_Time`, `App_Created` FROM `tbl_doctor_appointment` WHERE Doc_Id='$doc_id' AND App_Day='$day' AND App_Day_Shift='Morning'";
  //    $result = $this->conn->query($sql);
  //    if($result->num_rows)
  //       { 
  //          $output='';
  //           while($fetch = $result->fetch_array(MYSQLI_ASSOC))
  //            {
  //                $output .= ' 
  //                   <li>'.$fetch['App_Day_Shift'].'
  //                    <ul>
  //                      '.$this->Time_check_Per_shift($fetch['Doc_Id'],$fetch['App_Day'],$fetch['App_Day_Shift']).'
  //                    </ul>
  //                   </li>';
  //            }
  //         return $output;        
  //       }
  // }
  public function Morning_Shift_Time($doc_id,$day)
  {
     $sql = "SELECT `App_Id`, `Doc_Id`, `Cham_Id`, `App_Day`, `App_Day_Shift`, `App_Fees`, `App_Start_Time`, `App_End_Time`, `App_Created` FROM `tbl_doctor_appointment` WHERE Doc_Id='$doc_id' AND App_Day='$day' AND App_Day_Shift='Morning'";
     $result = $this->conn->query($sql);
     if($result->num_rows)
        { 
           $output='';
            while($fetch = $result->fetch_array(MYSQLI_ASSOC))
             {
                 $output .= ' 
                     <a href="confirm_appointment.php?verify='.md5(rand()).'&checkout='.password_hash($fetch['Doc_Id'], PASSWORD_DEFAULT).'&doc_id='.$fetch['Doc_Id'].'&day='.$fetch['App_Day'].'&shift='.$fetch['App_Day_Shift'].'&appointment='.$fetch['App_Id'].'">'.$fetch['App_Start_Time'].' - '.$fetch['App_End_Time'].'</a>
                   ';
             }
          return $output;        
        }
  }
  public function Evening_Shift_Time($doc_id,$day)
  {
     $sql = "SELECT `App_Id`, `Doc_Id`, `Cham_Id`, `App_Day`, `App_Day_Shift`, `App_Fees`, `App_Start_Time`, `App_End_Time`, `App_Created` FROM `tbl_doctor_appointment` WHERE Doc_Id='$doc_id' AND App_Day='$day' AND App_Day_Shift='Evening'";
     $result = $this->conn->query($sql);
     if($result->num_rows)
        { 
           $output='';
            while($fetch = $result->fetch_array(MYSQLI_ASSOC))
             {
                 $output .= ' 
                     <a href="confirm_appointment.php?verify='.md5(rand()).'&checkout='.password_hash($fetch['Doc_Id'], PASSWORD_DEFAULT).'&doc_id='.$fetch['Doc_Id'].'&day='.$fetch['App_Day'].'&shift='.$fetch['App_Day_Shift'].'&appointment='.$fetch['App_Id'].'">'.$fetch['App_Start_Time'].' - '.$fetch['App_End_Time'].'</a>
                   ';
             }
          return $output;        
        }
  }

  // public function Time_check_Per_shift($doc_Id,$day,$shift)
  // {
  //     $sql = "SELECT `App_Id`, `Doc_Id`, `Cham_Id`, `App_Day`, `App_Day_Shift`, `App_Fees`, `App_Start_Time`, `App_End_Time`, `App_Created` FROM `tbl_doctor_appointment` WHERE Doc_Id='$doc_Id' AND App_Day='$day' AND App_Day_Shift='$shift'";
  //     $result = $this->conn->query($sql);
  //     if($result->num_rows)
  //       { 
  //          $output='';
  //           while($fetch = $result->fetch_array(MYSQLI_ASSOC))
  //            {
  //                $output .= ' 
  //                   <li><a href="confirm_appointment.php?verify='.md5(rand()).'&checkout='.password_hash($fetch['Doc_Id'], PASSWORD_DEFAULT).'&doc_id='.$fetch['Doc_Id'].'&day='.$fetch['App_Day'].'&shift='.$fetch['App_Day_Shift'].'&appointment='.$fetch['App_Id'].'">'.$fetch['App_Start_Time'].' - '.$fetch['App_End_Time'].'</a></li>
  //                   ';
  //            }
  //         return $output;        
  //       }

  // }

  // public function All_Department()
  // {
  //    $sql = "SELECT `Dept_Id`, `Dept_Name`, `Dept_Date` FROM `table_department_master` ORDER BY Dept_Id ASC";

  //    $result = $this->conn->query($sql);
  //     if($result->num_rows)
  //       { 
  //          $output='<div class="row">';
  //          $count = 1;
  //           while($fetch = $result->fetch_array(MYSQLI_ASSOC))
  //            {
  //               $output .='
  //                     <div class="col-xl-4 col-md-4" data-aos="zoom-in" data-aos-delay="100">
  //                     <div class="icon-box">
  //                       <div class="icon d-flex justify-content-center"><img src="assets/img/banner/doc_logo2.jpg" width="50px" height="50px" class="doc_logo"></div>
  //                        <h6 class="text-center"><a href="javascript:void(0)" data-dept_id="'.$fetch['Dept_Id'].'" class="Department_Doctor">'.ucwords($fetch['Dept_Name']).'</a></h6>
  //                     </div>
  //                   </div>       
  //               ';
  //               if($count==3)
  //               {
  //                 $output .= '</div><br/>';
  //                 $output .= '<div class="row">';
  //                 $count=0;
  //               }
  //             $count++;
  //            }
  //         $output .= '</div>';
  //         return $output;        
  //       }

  // }

  public function All_Department_Left($limit_start, $limit_end)
  {
     $sql = "SELECT `Dept_Id`, `Dept_Name`, `Dept_Date` FROM `table_department_master` ORDER BY Dept_Id ASC LIMIT ".$limit_start.",".$limit_end."";

     $result = $this->conn->query($sql);
      if($result->num_rows)
        { 
           $output='';
            while($fetch = $result->fetch_array(MYSQLI_ASSOC))
             {
                $output .='
                <div class="single-feature">

                        

                    <div class="col-md-12">
                        <div class="row">
                          <div class="col-md-9">
                              <p class="text_doc"><a href="javascript:void(0)" data-dept_id="'.$fetch['Dept_Id'].'" class="Department_Doctor">'.ucwords($fetch['Dept_Name']).'</a></p>
                          </div>
                          <div class="col-md-3 logo_img_doc">
                              <img src="assets/img/banner/doc_logo2.jpg" width="auto" height="50px" class="doc_logo">
                          </div>
                        </div>
                        </div>
                    </div>                          
                ';   
             }
          return $output;        
        }

  }


  public function All_Department_Right($limit_start, $limit_end)
  {
     $sql = "SELECT `Dept_Id`, `Dept_Name`, `Dept_Date` FROM `table_department_master` ORDER BY Dept_Id ASC LIMIT ".$limit_start.",".$limit_end."";

     $result = $this->conn->query($sql);
      if($result->num_rows)
        { 
           $output='';
            while($fetch = $result->fetch_array(MYSQLI_ASSOC))
             {
                $output .='
                <div class="single-feature right_list">

                        

                    <div class="col-md-12">
                        <div class="row">
                          
                          <div class="col-md-3 logo_img_doc1">
                              <img src="assets/img/banner/doc_logo2.jpg" width="auto" height="50px" class="doc_logo">
                          </div>
                          <div class="col-md-9">
                              <p class="text_doc1"><a href="javascript:void(0)"  data-dept_id="'.$fetch['Dept_Id'].'" class="Department_Doctor">'.ucwords($fetch['Dept_Name']).'</a></p>
                          </div>
                        </div>
                        </div>
                    </div>                          
                ';   
             }
          return $output;        
        }

  }


  public function Read_More($limit,$text,$content_show)
  {
    $output ='';
    // $text = htmlentities($text);
    $content = explode(" ", $text);
    $words = array_slice($content,0,$limit);
    $output .= implode(" ",$words);
    $output .="<a href='javascript:void(0)' class='text-danger Read_more_btn' data-text='".$text."' data-content_show='".$content_show."'>&nbsp;Read More..</a>";
    return $output;
  }


  public function Upload_Image($tmp_file,$path,$image)
  {
     return move_uploaded_file($tmp_file,$path.$image);
  }

  public function All_Degree($id)
  {
     $sql = "SELECT `Edu_Id`, `Doc_Id`, `Edu_Degree`, `Edu_Year`, `Edu_University`, `Edu_Added_Date` FROM `tbl_doctor_education` WHERE Doc_Id='$id'";
     $result = $this->conn->query($sql);
      if($result->num_rows)
        { 
           $output='<table class="table">
                          <thead>
                           <tr>
                              <th>Degree</th>
                              <th>Year</th>
                              <th>University</th>
                              <th>View/Action</th>
                           </tr>
                          <thead
                          <tbody>
                        ';
            while($fetch = $result->fetch_array(MYSQLI_ASSOC))
             {
                 $output .= '
                          <tr>
                            <td>'.$fetch['Edu_Degree'].'</td>
                            <td>'.$fetch['Edu_Degree'].'</td>
                            <td>'.$fetch['Edu_Degree'].'</td>
                            <td><a href="javascript:void(0)" class="btn btn-danger btn-sm Delete_Education" data-id="'.$fetch['Edu_Id'].'" data-doc_id="'.$fetch['Edu_Id'].'"><i class="fas fa-trash"></i></a></td>
                          </tr> 
                         ';
             }

            $output .='</tbody></table>';
          return $output;        
        }
  }


  public function All_Specialization($id)
  {
     $sql = "SELECT `Spl_Id`, `Doc_Id`, `Spl_Name`, `Spl_Date`,table_department_master.Dept_Name FROM `tbl_doctor_specialization` INNER JOIN table_department_master ON tbl_doctor_specialization.Dept_Id=table_department_master.Dept_Id WHERE Doc_Id='$id'";
     $result = $this->conn->query($sql);
      if($result->num_rows)
        { 
           $output='<table class="table">
                          <thead>
                           <tr>
                              <th>Department</th>
                              <th>Specialist</th>
                              <th>View/Action</th>
                           </tr>
                          <thead
                          <tbody>
                        ';
            while($fetch = $result->fetch_array(MYSQLI_ASSOC))
             {
                 $output .= '
                          <tr>
                            <td>'.$fetch['Dept_Name'].'</td>
                            <td>'.$fetch['Spl_Name'].'</td>
                            <td><a href="javascript:void(0)" class="btn btn-danger btn-sm Delete_Specialization" data-id="'.$fetch['Spl_Id'].'" data-doc_id="'.$fetch['Doc_Id'].'"><i class="fas fa-trash"></i></a></td>
                          </tr> 
                         ';
             }

            $output .='</tbody></table>';
          return $output;        
        }
  }


  public function All_Membership($id)
  {
     $sql = "SELECT `Mem_Id`, `Doc_Id`, `Mem_Name`, `Mem_Date` FROM `tbl_doctor_membership` WHERE Doc_Id='$id'";
     $result = $this->conn->query($sql);
      if($result->num_rows)
        { 
           $output='<table class="table">
                          <thead>
                           <tr>
                              <th>Membership</th>
                              <th>View/Action</th>
                           </tr>
                          <thead
                          <tbody>
                        ';
            while($fetch = $result->fetch_array(MYSQLI_ASSOC))
             {
                 $output .= '
                          <tr>
                            <td>'.$fetch['Mem_Name'].'</td>
                            <td><a href="javascript:void(0)" class="btn btn-danger btn-sm Delete_Membership"  data-id="'.$fetch['Mem_Id'].'" data-doc_id="'.$fetch['Doc_Id'].'"><i class="fas fa-trash"></i></a></td>
                          </tr> 
                         ';
             }

            $output .='</tbody></table>';
          return $output;        
        }
  }

public function All_Gallery_Images()
{
   $sql = "SELECT `Image_Id`, `Image_Name`, `Image_Added` FROM `tbl_gallery` ORDER BY Image_Id Desc";
  $result = $this->conn->query($sql);
      if($result->num_rows)
        { 
           $output='<div class="row mb-4">';
           $count = 1;
            while($fetch = $result->fetch_array(MYSQLI_ASSOC))
             {
                 $output .= ' 
                   <div class="col-6 col-md-3">
                      <a href="images/'.$fetch['Image_Name'].'" class="thumbnail" title="San Francisco">
                        <img src="images/'.$fetch['Image_Name'].'" alt="" class="img-fluid">
                      </a>
                    </div>
                    ';
                if($count==4)
                {
                  $output .= '</div><br/><div class="row mb-4"> ';
                 $count = 0;
                }

            $count++;
          }
          return $output;        
        }
}

public function All_Update_News()
{
  $sql = "SELECT `News_Id`, `News_Title`, `News_Desc`, `News_Added` FROM `tbl_news` ORDER BY News_Id Desc";
  $result = $this->conn->query($sql);
      if($result->num_rows)
        { 
           $output='';
            while($fetch = $result->fetch_array(MYSQLI_ASSOC))
             {
                 $output .= ' 
                      <a href="javascript:void(0)"  class="update_news_show" style ="color:#1F58FD;" data-id="'.$fetch['News_Id'].'"><u>'.$fetch['News_Title'].'</u></a><br/>
                    ';
          }
          return $output;        
        }
}


public function All_Image_Title()
{
  $sql = "SELECT `Gall_Id`, `Gall_Title`, `Gall_Image` FROM `tb_galllery_master` ORDER BY Gall_Id Asc";
  $result = $this->conn->query($sql);
      if($result->num_rows)
        { 
           $output='';
            while($fetch = $result->fetch_array(MYSQLI_ASSOC))
             {
                 $output .= '<option value="'.$fetch['Gall_Id'].'">'.$fetch['Gall_Title'].'</option>';
          }
          return $output;        
        }
}

public function All_Image_Show_Gallery_Page()
{
   $sql = "SELECT `Gall_Id`, `Gall_Title`, `Gall_Image` FROM tb_galllery_master ORDER BY Gall_Id DESC";
   $result = $this->conn->query($sql);
      if($result->num_rows)
        { 
           $output='';
            while($fetch = $result->fetch_array(MYSQLI_ASSOC))
             {
               $output .= '<div class="col-md-4 bg-dark p-1">
            <div class="" data-aos="fade-right" data-aos-delay="100">

             <div id="carouselExampleControlsMain'.$fetch['Gall_Id'].'" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                  <a href="javascript:void(0)" class="zoom_image" data-id="'.$fetch['Gall_Id'].'">
                    <img class="d-block w-100" src="images/'.$fetch['Gall_Image'].'" alt="First slide" width="100%" height="200px" style="background-size: cover;">
                  </a>
                  </div>
                  '.$this->All_Sub_Image_Show($fetch['Gall_Id'],"Main",$fetch['Gall_Title']).'
                  
        ';
      }
      return $output;        
    }
}

public function All_Sub_Image_Show($id,$val,$title){

  $sql = "SELECT `Gall_Sub_Id`,`Gall_Sub_Image`,tb_galllery_master.Gall_Title,tb_galllery_master.Gall_Id FROM `tbl_sub_gallery_master` INNER JOIN tb_galllery_master ON tb_galllery_master.Gall_Id=tbl_sub_gallery_master.Gall_Id WHERE tb_galllery_master.Gall_Id='$id' ORDER BY tbl_sub_gallery_master.Gall_Id Asc";
  $result = $this->conn->query($sql);
    $output = '';
      if($result->num_rows)
        { 
            while($fetch = $result->fetch_array(MYSQLI_ASSOC))
             {
                 $output .= '
                 <div class="carousel-item">
                  <a href="javascript:void(0)" class="zoom_image" data-id="'.$fetch['Gall_Id'].'">
                    <img class="d-block w-100" src="images/'.$fetch['Gall_Sub_Image'].'" alt="Third slide" width="100%" height="250px" style="background-size: cover;">
                  </a>
                  </div>';
             }        
        }

  $output .='
             </div>
            <a class="carousel-control-prev" href="#carouselExampleControls'.$val.$id.'" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls'.$val.$id.'" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
          </div>
          <h6 class="text-center text-light mt-2">'.$title.'</h6>
        </div>';
  return $output;
}

public function  All_Patient_Feedback()
{
  $sql = "SELECT `Feed_Id`, `Feed_Name`,`Feed_Gender`, `Feed_Mobile`, `Feed_Comment`, `Feed_Rating`, `Feed_Date` FROM `tbl_feedback_master` WHERE Feed_Rating='5' OR Feed_Rating='4'";
    $result = $this->conn->query($sql);
      if($result->num_rows)
        { 
           $output='';
            while($fetch = $result->fetch_array(MYSQLI_ASSOC))
             {

              $output .= '<div class="testimonial-item" style="background-color: #004a80;">';
              if($fetch['Feed_Gender']=="Male")
              {
                $output .='<img src="assets/img/banner/patient.jpg" class="testimonial-img" alt="">';
              }
              else
              {
                $output .='<img src="assets/img/banner/female.jpg" class="testimonial-img" alt="">';
              }
            $output .='
                <h3 class="text-light">'.$fetch['Feed_Name'].'</h3>
                <p class="text-justify text-center"> 
                  '.$fetch['Feed_Comment'].'
                </p>';
          if($fetch['Feed_Rating']=='4')
          {
            $output .=' <p style="color:gold;"><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i></p>';
           
          }
          else
          {
            $output .=' <p style="color:gold;"><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i></p>';
          }

        $output.='</div>';
      }
          return $output;        
    }
}

public function Search_Method($sql)
{
   $result = $this->conn->query($sql);
    if($result->num_rows)
      { 
        $output='<ul class="list-unstyled">';
        while($fetch = $result->fetch_array(MYSQLI_ASSOC))
        {
            $output .= '<li class="item">'.$fetch['User_Mobile'].'</li>';
        }
       $output .= '</ul>';
      return $output;        
      }
    
     
    
}






}


?>
