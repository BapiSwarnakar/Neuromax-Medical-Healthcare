<?php
require_once("header.php");
?>
<style type="text/css">
	#add_category{
		background-color: white;
		color: black;
	}
  .item{  
     padding:8px;
     background-color: lightgrey;
     cursor: pointer;  
    } 
</style>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Patient</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Add Patient</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

      <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Add Patient</h3>
              </div>
              <!-- /.card-header -->

        <div class="card-body">
            <div class="container col-md-8">
          <div class="row">
            <div class="card card-tabs">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Personal</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="" href="#" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Doctor Appointment</a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent">
                  <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                    <h3>Patient Details</h3>
              <form id="Search_Patient_form">
                <div class="form-row">
                    <div class="form-group col-md-10">
                       <input type="number" name="Search_mobile" id="Search_mobile" placeholder="Registered Mobile No" maxlength="10" class="form-control form-control-sm" required>
                      <div id="show_data"></div>
                    </div>
                    <div class="form-group col-md-2">
                      <input type="submit" name="Search" value="Search" class=" btn btn-success btn-sm">
                      <input type="hidden" name="page" value="Search_Patient_form">
                      <input type="hidden" name="action" value="Search_Patient_form">
                    </div>
                </div>
              </form>
              <div id="load"></div>
              <form id="patient_register_Form">
                <div class="modal-body col-md-12">
                   <div class="form-row">
                     <div class="form-group col-md-12">
                       <label class="font-weight-bold">Name :*</label>
                       <input type="text" class="form-control form-control-sm" name="name" placeholder="Enter Name" id="name" maxlength="100" required autocomplete="off">
                     </div>
                     <div class="form-group col-md-6">
                       <label class="font-weight-bold">Gender :*</label>
                       <select class="form-control form-control-sm" id="gender" name="gender" required>
                         <option value="">Select</option>
                         <option value="Male">Male</option>
                         <option value="Female">Female</option>
                       </select>
                     </div>
                     <div class="form-group col-md-6">
                       <label class="font-weight-bold">Date of birth :*</label>
                       <input type="date" class="form-control form-control-sm" id="dob" name="dob" required >
                     </div>
                      <div class="form-group col-md-6">
                       <label class="font-weight-bold">Mobile No :*</label>
                       <input type="text" class="form-control form-control-sm" name="mobile" placeholder="Contact No" maxlength="10" id="mobile" required autocomplete="off">
                     </div>
                     <div class="form-group col-md-6">
                       <label class="font-weight-bold">Mail :*</label>
                       <input type="email" class="form-control form-control-sm" name="email" placeholder="Valid Email" id="email" maxlength="100" required autocomplete="off" value="demo@gmail.com">
                     </div>
                     <div class="form-group col-md-12">
                       <label class="font-weight-bold">Address :*</label>
                       <textarea class="form-control form-control-sm" name="address" required maxlength="200" id="address" autocomplete="off"></textarea>
                     </div>
                   </div>
                </div>
                <div class="modal-footer">
                  <div id="success"></div>
                  <input type="hidden" name="page" value="SignUp_Form_Action">
                  <input type="hidden" name="action" value="SignUp_Form_Action">
                  <input type="hidden" name="exist_user_id" id="exist_user_id">
                  <input type="submit" id="Register" class="btn btn-primary" value="Register">
                </div>
              </form>
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                    <h3>Book Appointment</h3>
                     <form id="appointment_form">
                        <div class="modal-body col-md-12">
                            <div class="form-row">
                              <div class="form-group col-md-12">
                                 <label class="font-weight-bold">Select Doctor :*</label>
                                 <select class="form-control form-control-sm select2" name="doctor" id="doctor" required> 
                                  <option value="">Select</option>
                                  <?php
                                    echo $server->All_Doctor(); 
                                  ?> 
                                </select>
                              </div>
                              <div class="form-group col-md-12">
                                 <label class="font-weight-bold">Select Day :*</label>
                                 <select class="form-control form-control-sm" name="day" id="day" data-doc_id="" required>   
                                </select>
                              </div>
                              <div class="form-group col-md-12">
                                 <label class="font-weight-bold">Select Shift :*</label>
                                 <select class="form-control form-control-sm" name="shift" id="shift" data-doc_id="" data-day="" required>
                                   
                                 </select>
                              </div>
                              <div class="form-group col-md-12">
                                 <label class="font-weight-bold">Select Time :*</label>
                                 <select class="form-control form-control-sm" name="time" id="time" data-doc_id="" required>
                                   
                                 </select>
                              </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                          <input type="hidden" name="page" value="Appointmnent_form_Submit">
                          <input type="hidden" name="action" value="Appointmnent_form_Submit">
                          <input type="hidden" name="email" id="email_user">
                          <input type="hidden" name="user_id" value="" id="user_id">
                          <input type="submit" class="btn btn-primary" id="app" value="Submit">
                        </div>
                      </form>
                  </div>
                 
                  
                </div>
              </div>
              <!-- /.card -->
            </div>
          </div>
         
        </div>

              </div>
              
              <!-- form start -->
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 <?php
 require_once("footer.php");
 require_once("script/patient_master.php");
 ?>