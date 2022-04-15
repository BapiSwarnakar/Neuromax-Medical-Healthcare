<?php
require_once("header.php");
?>
<style type="text/css">
	#add_category{
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
            <h1>Add Doctor</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Add Doctor</li>
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
                <h3 class="card-title">Add Doctor</h3>
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
                    <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="" href="#" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Education</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="" href="#" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">Specialization</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-settings-tab" data-toggle="" href="#" role="tab" aria-controls="custom-tabs-one-settings" aria-selected="false">Membership</a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent">
                  <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                    <form id="Personal_Details_form" method="post">
                        <h3>Personal Details</h3>
                     <div class="form-row">
                         <div class="form-group col-md-12">
                             <label class="font-weight-bold">Name :*</label>
                             <input type="text" name="name" placeholder="Doctor Name" class="form-control form-control-sm" required>
                         </div>
                         <div class="form-group col-md-6">
                             <label class="font-weight-bold">License :*</label>
                             <input type="text" name="License" placeholder="License No" class="form-control form-control-sm" required>
                         </div>
                         <div class="form-group col-md-6">
                             <label class="font-weight-bold">Mobile No :*</label>
                             <input type="text" name="mobile" placeholder="valid Mobile" class="form-control form-control-sm" required>
                         </div>
                         <div class="form-group col-md-12">
                             <label class="font-weight-bold">Email :*</label>
                             <input type="email" name="email" placeholder="Valid Email" class="form-control form-control-sm" required>
                         </div>
                          <div class="form-group col-md-12 d-flex justify-content-end">
                            <input type="hidden" name="page" value="Personal_Details_form">
                            <input type="hidden" name="action" value="Personal_Details_form">
                             <input type="submit" name="submit" id="Personal" class="btn btn-primary btn-sm" value="Save & Next">
                         </div>
                     </div>
                    </form>
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                     <form id="Education_details" method="post">
                        <h3>Education Details</h3>
                     <div class="form-row">
                         <div class="form-group col-md-8">
                             <label class="font-weight-bold">Degree :*</label>
                             <input type="text" name="Degree" placeholder="Doctor Name" class="form-control form-control-sm" required>
                         </div>
                         <div class="form-group col-md-4">
                             <label class="font-weight-bold">Year :*</label>
                             <input type="text" name="Year" placeholder="Year" class="form-control form-control-sm" required>
                         </div>
                         <div class="form-group col-md-11">
                             <label class="font-weight-bold">University :*</label>
                             <input type="text" name="University" placeholder="University Name" class="form-control form-control-sm" required>
                         </div>
                          <div class="form-group col-md-1 d-flex justify-content-end">
                            <input type="hidden" name="page" name="page" value="Education_details">
                            <input type="hidden" name="action" value="Education_details">
                             <button type="submit" class="btn btn-sm"><i class="fas fa-plus-square bg-success p-2 mt-4"></i></button>
                         </div>
                         <div class="form-group col-md-12" id="table">
                           
                         </div>

                     </div>
                    </form>
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab">
                      <form id="Specialization_Form" method="post">
                        <h3>Specialization Details</h3>
                     <div class="form-row">
                      <div class="form-group col-md-11">
                             <label class="font-weight-bold">Department :*</label>
                             <select name="department" class="form-control form-control-sm" required>
                               <option value="">Select</option>
                               <?php
                                echo $server->All_Department_List();
                               ?>
                             </select>
                         </div>
                         <div class="form-group col-md-11">
                             <label class="font-weight-bold">Specialization :*</label>
                             <input type="text" name="Specialization" placeholder="Specialization" class="form-control form-control-sm" required>
                         </div>
                          <div class="form-group col-md-1">
                            <input type="hidden" name="page" name="page" value="Specialization_page">
                            <input type="hidden" name="action" value="Specialization_page">
                             <button type="submit" id="spl" class="btn btn-sm"><i class="fas fa-plus-square bg-success p-2" style="margin-top: 27px; margin-left: "></i></button>
                         </div>
                         <div class="form-group col-md-12" id="spl_table">
                           
                         </div>

                     </div>
                    </form>
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-one-settings" role="tabpanel" aria-labelledby="custom-tabs-one-settings-tab">
                     <form id="Membership_Form" method="post">
                        <h3>Membership Details</h3>
                     <div class="form-row">
                         <div class="form-group col-md-10">
                             <label class="font-weight-bold">Membership :*</label>
                             <input type="text" name="membership" placeholder="Membership" class="form-control form-control-sm" required>
                         </div>
                          <div class="form-group col-md-2 d-flex justify-content-end">
                            <input type="hidden" name="page" name="page" value="Membership_page">
                            <input type="hidden" name="action" value="Membership_page">
                             <button type="submit" id="mem" class="btn btn-sm"><i class="fas fa-plus-square bg-success p-2" style="margin-top: 27px; margin-left: "></i></button>
                         </div>
                         <div class="form-group col-md-12" id="mem_table">
                           
                         </div>

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
 require_once("script/doctor_master.php");
 ?>