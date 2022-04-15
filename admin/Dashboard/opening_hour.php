<?php
require_once("header.php");
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
            <h1>Add/Update Opening hour</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Add/Update Opening hour</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid col-md-6">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add/Update Opening hour</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" id="Opening_hour_form">
                <div class="card-body">
                <div class="form-row">
                  
                  <div class="form-group col-md-12">
                    <label for="Category">Day :*</label>
                   <select class="form-control select2 form-control-sm" name="day" id="day">
                    <option value="">Select</option>
                    <option value="Monday">Monday</option>
                    <option value="Tuesday">Tuesday</option>
                    <option value="Wednesday">Wednesday</option>
                    <option value="Thusday">Thusday</option>
                    <option value="Friday">Friday</option>
                    <option value="Saturday">Saturday</option>
                    <option value="Sunday">Sunday</option>
                   </select>
                  </div>
                  
                  <div class="form-group col-md-6">
                    <label>Start Time :</label>

                    <div class="input-group date" id="timepicker" data-target-input="nearest">
                      <input type="text" class="form-control form-control-sm datetimepicker-input" id="start" name="StartTime" data-target="#timepicker" placeholder="Start Time" />
                      <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="far fa-clock"></i></div>
                      </div>
                      </div>
                    <!-- /.input group -->
                  </div>
                  <div class="form-group col-md-6">
                    <label>End Time :</label>

                    <div class="input-group date" id="timepicker1" data-target-input="nearest">
                      <input type="text" id="end" class="form-control form-control-sm datetimepicker-input" name="EndTime" data-target="#timepicker1" placeholder="End Time" />
                      <div class="input-group-append" data-target="#timepicker1" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="far fa-clock"></i></div>
                      </div>
                      </div>
                    <!-- /.input group -->

                  </div>
                  <div class="form-group col-md-12 text-center">OR</div>
                  <div class="form-group col-md-12">
                  	<select name="close" id="close" class="form-control form-control-sm">
                  		<option value="">Select</option>
                  		<option value="Close">Close</option>
                  	</select>
                  </div>
                  
                </div>
              </div>
              <div class="card-footer">
                 <div class="form-group d-flex justify-content-end">
                    <input type="hidden" name="page" value="opening_hour_page">
                    <input type="hidden" name="action" value="opening_hour_page">
                    <input type="submit" class="btn btn-primary btn-sm" value="Submit" id="submit">
                  </div>
              </div>
                <!-- /.card-body -->
              
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

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
 require_once("script/opening_hour.php");
 ?>