<?php
require_once("header.php");
if($_GET['id'] !="")
{
  $sql = "SELECT `Doc_Id`, `Doc_Name`, `Doc_Lic`, `Doc_Mobile`, `Doc_Email`, `Doc_Flag`, `Doc_Added_Date` FROM `tbl_doctor_master` WHERE Doc_Id='$_GET[id]'";
  if($server->All_Record($sql))
  {
    foreach ($server->View_details as $value) {
      # code...
    }
  }
}
else
{
  echo "<script>window.location='display_news.php'</script>";
}
?>
<style type="text/css">
	#opening_hour{
		background-color: white;
		color: black;
	}
</style>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Update Doctor Details</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="display_doctor.php">All Doctor</a></li>
              <li class="breadcrumb-item active">Update Doctor Details</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid col-md-10">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Doctor Details</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" id="personal_details_form">
                <div class="card-body">
                  <h4>Personal Details :</h4>
                <div class="form-row">
                  
                  <div class="form-group col-md-3">
                    <label for="Category">Name :*</label>
                    <input type="text" name="name" placeholder="Doctor Name" class="form-control form-control-sm" required autocomplete="off" value="<?php echo $value['Doc_Name']; ?>">
                  </div>
                  <div class="form-group col-md-3">
                     <label class="font-weight-bold">License :*</label>
                     <input type="text" name="License" id="License" placeholder="License" class="form-control form-control-sm" autocomplete="off" required value="<?php echo $value['Doc_Lic']; ?>">
                  </div>
                  <div class="form-group col-md-3">
                     <label class="font-weight-bold">Mobile No :*</label>
                     <input type="number" name="Mobile" id="Mobile" class="form-control form-control-sm" placeholder="Mobile No" required autocomplete="off" maxlength="10" minlength="10" value="<?php echo $value['Doc_Mobile']; ?>">
                  </div>
                  <div class="form-group col-md-3">
                     <label class="font-weight-bold">Email :*</label>
                     <input type="email" name="Email" id="Email"  class="form-control form-control-sm" placeholder="Valid Email" required autocomplete="off" value="<?php echo $value['Doc_Email']; ?>">
                  </div>
                  
                </div>
              </div>
              <div class="card-footer">
                 <div class="form-group d-flex justify-content-end">
                    <input type="hidden" name="id" value="<?php echo $value['Doc_Id']; ?>">
                    <input type="hidden" name="page" value="Update_Personal_details_submit">
                    <input type="hidden" name="action" value="Update_Personal_details_submit">
                    <input type="submit" class="btn btn-primary btn-sm" value="Submit" id="p_btn">
                  </div>
              </div>
                <!-- /.card-body -->
              
              </form>
              <form id="Education_form">
                 <div class="card-body">
                  <h4>Education Details :</h4>
                <div class="form-row">
                  
                  <div class="form-group col-md-3">
                    <label for="Category">Degree :*</label>
                    <input type="text" name="Degree" placeholder="Degree" class="form-control form-control-sm" required autocomplete="off">
                  </div>
                  <div class="form-group col-md-3">
                     <label class="font-weight-bold">Year :*</label>
                     <input type="number" name="Year" id="Year" placeholder="License" class="form-control form-control-sm" required autocomplete="off" required>
                  </div>
                  <div class="form-group col-md-3">
                     <label class="font-weight-bold">University :*</label>
                     <input type="text" name="University" id="University" class="form-control form-control-sm" placeholder="University" required autocomplete="off" required>
                  </div>

                  <div class="form-group col-md-3">
                    <input type="hidden" name="id" value="<?php echo $value['Doc_Id']; ?>">
                    <input type="hidden" name="page" value="Update_Education_details_submit">
                    <input type="hidden" name="action" value="Update_Education_details_submit">
                    <label class="font-weight-bold"></label><br/>
                    <input type="submit" name="submit" id="education" class="btn btn-success" value="Add">
                  </div>

                  <div class="form-group col-md-12" style="height: 150px; overflow-y: scroll;">
                    <p class="text-danger">Note :One is must Added</p>
                    <?php
                     echo $server->All_Degree($value['Doc_Id']);
                    ?>
                  </div>
                  
                </div>
              </div>
               
              </form>
              <form id="Specialization_form">
                 <div class="card-body">
                  <h4>Specialization Details :</h4>
                <div class="form-row">
                  <div class="form-group col-md-3">
                             <label class="font-weight-bold">Department :*</label>
                             <select name="department" class="form-control form-control-sm" required>
                               <option value="">Select</option>
                               <?php
                                echo $server->All_Department_List();
                               ?>
                             </select>
                   </div>
                  <div class="form-group col-md-3">
                    <label for="Category">Specialization :*</label>
                    <input type="text" name="spl_name" placeholder="Specialization Name" class="form-control form-control-sm" required autocomplete="off">
                  </div>
                  <div class="form-group col-md-2">
                    <input type="hidden" name="id" value="<?php echo $value['Doc_Id']; ?>">
                    <input type="hidden" name="page" value="Update_Specialization_details_submit">
                    <input type="hidden" name="action" value="Update_Specialization_details_submit">
                    <label class="font-weight-bold"></label><br/>
                    <input type="submit" name="submit" id="spl_btn" class="btn btn-success" value="Add">
                  </div>

                  <div class="form-group col-md-12" style="height: 150px; overflow-y: scroll;">
                    <p class="text-danger">Note :One is must Added</p>
                       <?php
                        echo $server->All_Specialization($value['Doc_Id']);
                       ?>
                  </div>
                  
                </div>
              </div>
               
              </form>
              <form id="membership_form">
                <div class="card-body">
                  <h4>Membership Details :</h4>
                <div class="form-row">
                  
                  <div class="form-group col-md-3">
                    <label for="Category">Membership :*</label>
                    <input type="text" name="mem_name" placeholder="Doctor Name" class="form-control form-control-sm" required autocomplete="off">
                  </div>
                  <div class="form-group col-md-3">
                     <label class="font-weight-bold"></label><br/>
                    <input type="hidden" name="id" value="<?php echo $value['Doc_Id']; ?>">
                    <input type="hidden" name="page" value="Update_Membership_details_submit">
                    <input type="hidden" name="action" value="Update_Membership_details_submit">
                     <input type="submit" name="submit" id="mem_btn" class="btn btn-success" value="Add">
                  </div>

                  <div class="form-group col-md-6" style="height: 150px; overflow-y: scroll;">
                    <p class="text-danger">Note :One is must Added</p>
                     <?php
                        echo $server->All_Membership($value['Doc_Id']);
                     ?>
                  </div>
                  
                </div>
              </div>
               
              </form>

            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 <?php
 require_once("footer.php");
 require_once("script/view_doctor_details.php");
 ?>