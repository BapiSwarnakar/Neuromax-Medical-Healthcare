<?php
define('MY_SITE',true);
require_once("landing_header.php");
if(isset($_GET['appointment']))
{
  $sql ="SELECT `App_Id`, tbl_doctor_master.Doc_Id, `Cham_Id`, `App_Day`, `App_Day_Shift`, `App_Fees`, `App_Start_Time`, `App_End_Time`,tbl_doctor_master.Doc_Name,tbl_doctor_master.Doc_Email,tbl_doctor_master.Doc_Mobile,tbl_doctor_profile_image.Pro_Image FROM `tbl_doctor_appointment` INNER JOIN tbl_doctor_master ON tbl_doctor_master.Doc_Id=tbl_doctor_appointment.Doc_Id INNER JOIN tbl_doctor_profile_image ON tbl_doctor_profile_image.Doc_Id=tbl_doctor_master.Doc_Id WHERE tbl_doctor_appointment.App_Id='$_GET[appointment]'";
  if($count=$server->All_Record($sql))
  {
    if($count>0)
    {
      foreach ($server->View_details as $value) {
        # code...
      }
    }
    else
    {
       echo "<script>window.location='find_doctor.php'</script>";
    }
    
  }
  else
  {
     echo "<script>window.location='find_doctor.php'</script>";
  }
}
else
  {
     echo "<script>window.location='find_doctor.php'</script>";
  }
?>
<br>
 <main id="main" style="margin-top: 12%;">
<div class="wrapper">
<div class="content-wrapper">
 <section class="content" id="content">
    <div class="container-fluied mt-4" style="background-color: #DCDCE1;">
      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body pb-0">
          <div class="row offset-md-1">
          	 <div class="col-md-4 m-2 ">

          	 	<div class="row d-flex align-items-stretch">
                <div class="card bg-light">
                  <div class="card-header text-muted border-bottom-0">
                    Neuromax Healthcare <span><a href="find_doctor.php">Change</a></span>
                  </div>
                  <div class="card-body pt-0">
                    <div class="row">
                      <div class="col-md-7">
                        <h6>Selected Time :</h6>
                          Time : <?php echo  $value['App_Start_Time']." - ".$value['App_End_Time']; ?>
                        <hr/>
                        <h2 class="lead"><b><?php echo  $value['Doc_Name']; ?></b></h2>
                        <?php echo $server->All_Specialist($value['Doc_Id']); ?>
                    
                     <!--  <ul class="ml-4 mb-0 fa-ul text-muted">
                          <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Email: <?php echo $value['Doc_Email']; ?></li>
                          <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: + <?php echo  $value['Doc_Mobile']; ?></li>
                        </ul> -->
                      </div>
                      <div class="col-5 text-center">
                        <img src="doc_images/<?php echo $value['Pro_Image']; ?>" alt="" class="img-circle img-fluid">
                      </div>
                    </div>
                  </div>
                  <!-- <div class="card-footer">
                    <div class="text-right">
                      <a href="#" class="btn btn-sm btn-success bg-teal">
                        <i class="fas fa-comments"></i>
                      </a>
                    </div>
                  </div> -->
                </div>
          	</div>
           </div> 
           <div class="col-md-1"></div>
           <div class="col-md-4 m-2">
              <div class="card">
                <div class="card-header">
                  Please enter your mobile number to Booking
                </div>
                <form id="Confirm_Booking_Form">
                <div class="card-body">
                  <div class="row">
                    <div class="form-group col-md-12">
                      <label class="font-weight-bold">Mobile No :</label>
                      <input type="text" name="mobile" class="form-control form-control-sm" placeholder="Registered Contact No" maxlength="10" minlength="10" required>
                      
                    </div>
                  </div>
                  <input type="hidden" name="Doc_Id" value="<?php echo $value['Doc_Id']; ?>">
                  <input type="hidden" name="Doc_Name" value="<?php echo $value['Doc_Name']; ?>">
                  <input type="hidden" name="Day" value="<?php echo $value['App_Day']; ?>">
                  <input type="hidden" name="Shift" value="<?php echo $value['App_Day_Shift']; ?>">
                  <input type="hidden" name="time" value="<?php echo $value['App_Start_Time']." - ".$value['App_End_Time']; ?>">
                  <input type="hidden" name="page" value="Confirm_appointment_page">
                  <input type="hidden" name="action" value="Confirm_appointment_page">
                <div class="form-group col-md-12 d-flex justify-content-end">
                    <button type="submit" name="submit" id="submit123" class="btn btn-primary btn-sm"><i class="fas fa-arrow-right"></i></button>
                </div>
                 
                  
                </div>
                
                </form>
              </div>
           </div>


          </div>
        </div>
        <!-- /.card-footer -->
      </div>


      </div>
      <!-- /.card -->
    </section>
    <!-- /.content -->
</div>
</div>

</main>
<br>
<?php
require_once("landing_footer.php");
require_once("script/ajax_confirm_appointment.php");
?>