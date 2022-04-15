<?php
require_once("header.php");
?>
<style type="text/css">
	#doctor_appointment{
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
            <h1>Add Appointment</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Add Appointment</li>
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
                <h3 class="card-title">Add Appointment</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" id="Appointment_form">
                <div class="card-body">
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="Category">Select Doctor Name :*</label>
                   <select class="form-control select2 form-control-sm " required name="name" id="name">
                    <option value="">Select</option>
                    <?php
                      echo $server->All_Doctor();
                    ?>
                   </select>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="name">Fees :*</label>
                    <input type="number" name="fees" class="form-control form-control-sm" id="fees" placeholder="Doctor Fees" autocomplete="off" required>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="Category">Day :*</label>
                   <select class="form-control select2 form-control-sm" required name="day" id="day">
                    <option value="">Select</option>
                    <option value="Mon">Mon</option>
                    <option value="Tue">Tue</option>
                    <option value="Wed">Wed</option>
                    <option value="Thu">Thu</option>
                    <option value="Fri">Fri</option>
                    <option value="Sat">Sat</option>
                    <option value="Sun">Sun</option>
                   </select>
                  </div>
                  
                  <div class="form-group col-md-6">
                    <label for="name">Shift :*</label>
                     <select class="form-control select2 form-control-sm" required name="Shift" id="Shift">
                      <option value="">Select</option>
                      <option value="Morning">Morning</option>
                      <option value="Evening">Evening</option>
                     </select>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Start Time :</label>

                    <div class="input-group date" id="timepicker" data-target-input="nearest">
                      <input type="text" class="form-control form-control-sm datetimepicker-input" name="StartTime" data-target="#timepicker" required placeholder="Start Time" />
                      <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="far fa-clock"></i></div>
                      </div>
                      </div>
                    <!-- /.input group -->
                  </div>
                  <div class="form-group col-md-6">
                    <label>End Time :</label>

                    <div class="input-group date" id="timepicker1" data-target-input="nearest">
                      <input type="text" class="form-control form-control-sm datetimepicker-input" name="EndTime" data-target="#timepicker1" required placeholder="End Time" />
                      <div class="input-group-append" data-target="#timepicker1" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="far fa-clock"></i></div>
                      </div>
                      </div>
                    <!-- /.input group -->
                  </div>
                  
                </div>
              </div>
              <div class="card-footer">
                 <div class="form-group d-flex justify-content-end">
                    <input type="hidden" name="page" value="Appointment_form_submit">
                    <input type="hidden" name="action" value="Appointment_form_submit">
                    <input type="submit" class="btn btn-primary btn-sm" value="Add Appointment" id="submit">
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
 require_once("script/appointment_master.php");
 ?>