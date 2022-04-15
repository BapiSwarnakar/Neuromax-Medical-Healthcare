<?php
require_once("header.php");
if($_GET['id'] !="")
{
  $id = base64_decode($_GET['id']);
  $sql = "SELECT `Dept_Id`, `Dept_Name`, `Dept_Date` FROM `table_department_master` WHERE Dept_Id='$id'";
  if($server->All_Record($sql))
  {
    foreach ($server->View_details as $value) {
      # code...
    }
  }
  else
  {
    echo "<script>window.location='display_department.php'</script>";
  }
}
else
{
  echo "<script>window.location='display_department.php'</script>";
}
?>
<style type="text/css">
	#add_department{
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
            <h1>Update Department</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              
              <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="display_department.php">All Department</a></li>
              <li class="breadcrumb-item active">Update Department</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid col-md-12">
        <div class="row"> 
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-2"></div>
          <div class="col-md-6">
               <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update Department</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" id="Doctor_department_form">
                <div class="card-body">
                <div class="form-row">
                  
                  <div class="form-group col-md-12">
                    <label>Department Name :*</label>
                    <input type="text" name="department" required class="form-control" placeholder="Department Name" value="<?php echo $value['Dept_Name'] ?>">
                  </div>
                </div>
              </div>
              <div class="card-footer">
                 <div class="form-group d-flex justify-content-end">
                  <input type="hidden" name="id" value="<?php  echo $value['Dept_Id']; ?>">
                    <input type="hidden" name="page" value="Update_doctor_department_form_submit">
                    <input type="hidden" name="action" value="Update_doctor_department_form_submit">
                    <input type="submit" class="btn btn-primary btn-sm" value="Submit" id="dept_btn">
                  </div>
              </div>
                <!-- /.card-body -->
              
              </form>
            </div>
          </div>
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
 require_once("script/department_master.php");
 ?>