<?php
require_once("header.php");
?>
<style type="text/css">
	#doctor_profile_image{
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
            <h1>Add/Update Doctor Profile Image</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Profile Image</li>
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
                <h3 class="card-title">Images Upload</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" id="Doctor_Profile__images_form">
                <div class="card-body">
                <div class="form-row">
                  
                  <div class="form-group col-md-12">
                    <label>Select Doctor :*</label>
                    <select class="form-control form-control-sm" name="doc_id" required>
                      <option value="">Select</option>
                      <?php 
                        echo $server->All_Doctor();
                      ?>
                    </select>
                  </div>
                  <div class="form-group col-md-12">
                    <label for="Category">Upload Images :*</label>
                    <input type="file" name="image" id="image" placeholder="News Title" class="form-control form-control-sm" required autocomplete="off">
                    <p class="text-danger">Note : Upload only .jpg/.jpeg/.png files</p>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                 <div class="form-group d-flex justify-content-end">
                    <input type="hidden" name="page" value="doctor_profile_image_form_submit">
                    <input type="hidden" name="action" value="doctor_profile_image_form_submit">
                    <input type="submit" class="btn btn-primary btn-sm" value="Submit" id="image_btn">
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
 require_once("script/doctor_profile_master.php");
 ?>