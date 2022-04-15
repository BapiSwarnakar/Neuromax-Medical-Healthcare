<?php
require_once("header.php");
?>
<style type="text/css">
	#add_image{
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
            <h1>Add Images</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Add Images</li>
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
          <div class="col-md-6">
               <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Font Images Upload</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" id="main_images_form">
                <div class="card-body">
                <div class="form-row">
                  <div class="form-group col-md-12">
                    <label for="Category">Sub Title :*</label>
                    <input type="text" name="title" placeholder="Subject Header" class="form-control form-control-sm" required autocomplete="off">
                  </div>
                  <div class="form-group col-md-12">
                    <label for="Category">Select Font Image :*</label>
                    <input type="file" name="main_image" id="main_image" placeholder="News Title" class="form-control form-control-sm" required autocomplete="off">
                    <p class="text-danger">Note : Upload only .jpg/.jpeg/.png files</p>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                 <div class="form-group d-flex justify-content-end">
                    <input type="hidden" name="page" value="main_images_form_submit">
                    <input type="hidden" name="action" value="main_images_form_submit">
                    <input type="submit" class="btn btn-primary btn-sm" value="Submit" id="main_image_btn">
                  </div>
              </div>
                <!-- /.card-body -->
              
              </form>
            </div>
          </div>
          <div class="col-md-6">
               <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Sub Images Upload</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" id="Sub_images_form">
                <div class="card-body">
                <div class="form-row">
                  <div class="form-group col-md-12">
                    <label for="Category">Select Title:*</label>
                    <select class="form-control form-control-sm" name="sub_title" required>
                      <option value="">Select</option>
                      <?php
                        echo $server->All_Image_Title();
                      ?>
                    </select>
                  </div>
                  <div class="form-group col-md-12">
                    <label for="Category">Select Images :*</label>
                    <input type="file" name="image[]" placeholder="News Title" class="form-control form-control-sm" required autocomplete="off" multiple>
                    <p class="text-danger">Note : Upload only .jpg/.jpeg/.png files</p>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                 <div class="form-group d-flex justify-content-end">
                    <input type="hidden" name="page" value="images_form_submit">
                    <input type="hidden" name="action" value="images_form_submit">
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
 require_once("script/image_master.php");
 ?>