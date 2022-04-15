<?php
require_once("../../db_connect/db_connect.php");
require_once("../../class/class.php");
$server= new Main_Classes;
$server->admin_session_private();
if(isset($_GET['id']) && !empty($_GET['id']))
{
	$sql="SELECT `Order_Id`,tbl_user.User_Name,tbl_user.User_Mobile,tbl_user.User_Email,tbl_doctor_master.Doc_Name,tbl_doctor_appointment.App_Fees FROM `tbl_online_appointment` INNER JOIN tbl_user ON tbl_user.User_Id =tbl_online_appointment.Cust_Id INNER JOIN tbl_doctor_master ON tbl_doctor_master.Doc_Id=tbl_online_appointment.Doc_Id INNER JOIN tbl_payment_status ON tbl_payment_status.pay_Id =tbl_online_appointment.pay_status INNER JOIN tbl_doctor_appointment ON tbl_online_appointment.Doc_Id=tbl_doctor_appointment.Doc_Id WHERE tbl_online_appointment.Order_Id='$_GET[id]' GROUP BY tbl_doctor_appointment.Doc_Id";
	if($server->All_Record($sql))
	{
		foreach ($server->View_details as $value) {
			# code...
		}
	}
	else
	{
		echo "<script>alert('Invalid Payment Record..!')</script>";
		echo "<script>window.location='confirm_appointment.php'</script>";
	}
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
   <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css ">
     <!-- parsley validation -->
  <link rel="stylesheet" href="../../assets/plugins/parsley-folder/parsley.css">
  <!-- Toast -->
  <link rel="stylesheet" href="../../assets/plugins/Toast/toastr.min.css">
    <title>Payment Now</title>
  </head>
  <body>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card">
              <div class="card-header">
                <h4 class="card-title text-center">Payment Now</h4>
                <span><b>Patient Name :</b>  <?php echo ucwords($value['User_Name']); ?></span><br/>
                <span><b>Mobile No :</b>  <?php echo ucwords($value['User_Mobile']); ?></span><br/>
                <span><b>Email :</b>  <?php echo $value['User_Email']; ?></span><br/>
                <span><b>Doctor Name :</b> <?php echo ucwords($value['Doc_Name']); ?></span>
                <p><b>Fees : <i class="fa fa-inr" aria-hidden="true"></i><?php echo ucwords($value['App_Fees']); ?></b></p>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                  
                 <div class="form-row">
                 	<label class="font-weight-bold">Select Payment Method*</label>
                 	<div class="form-group col-md-12">
                 		<label><input type="radio" class="pay_method" name="pay_method" checked value="cash"> Cash</label>
                 		<label><input type="radio" class="pay_method" name="pay_method" value="online"> Online</label>
                 	</div>
                 </div>
                 <div id="cash_div">
                 <form id="cash_form">
                 	<div class="form-row">
                 		<div class="form-group">
                 			<label class="font-weight-bold">Enter Cash Amount :
                 			<input type="number" name="cash_amount" class="form-control form-control-sm" required></label>
                 		</div>&nbsp;
                 		<div class="form-group">
                 			<br/>
                 			<input type="hidden" name="app_ord_Id" value="<?php echo $value['Order_Id']; ?>">
                 			<input type="hidden" name="ord_id" value="<?php echo "Neu".substr(md5(rand()), 0, 10); ?>">
                 			<input type="hidden" name="pay_mode" value="Offline">
                 			<input type="hidden" name="pay_type" value="Cash">
                      <input type="hidden" name="email" value="<?php echo $value['User_Email']; ?>">
                 			<input type="submit" name="submit" class="btn btn-success btn-sm" value="Pay">
                 			<input type="hidden" name="page" value="cash_form_submit">
                 			<input type="hidden" name="action" value="cash_form_submit">
                 		</div>
                 	</div>
                 </form>
                 </div>
                 <div id="online_div">
                 	 <form id="online_form" method="POST">
                    <div class="form-row">
                      <div class="form-group">
                        <label class="font-weight-bold">Select Pay :
                        <select class="form-control form-control-sm" name="pay_bank" id="pay_bank" required>
                          <option value="">Select</option>
                          <option value="Paytm">Paytm</option>
                          <option value="Phone Pay">Phone Pay</option>
                          <option value="Google Pay">Google Pay</option>
                          <option value="Swip Card">Swip Card</option>
                          <option value="Other">Other</option>
                        </select></label>
                      </div>&nbsp;
                      <div class="form-group">
                      <label class="font-weight-bold">Enter Cash Amount :
                      <input type="number" name="cash_amount" class="form-control form-control-sm" required></label>
                      <input type="submit" name="Payment_page" class="btn btn-success btn-sm" value="Pay">
                    </div>&nbsp;
                    </div>
                 	 	<input type="hidden" name="app_ord_Id" value="<?php echo $value['Order_Id']; ?>">
                      <input type="hidden" name="ord_id" value="<?php echo "Neu".substr(md5(rand()), 0, 10); ?>">
                      <input type="hidden" name="email" value="<?php echo $value['User_Email']; ?>">
                    <input type="hidden" name="pay_mode" value="Online">
                 	 	<input type="hidden" name="pay_type" value="Online">
                 	 	<input type="hidden" name="page" value="online_form_submit">
                 		<input type="hidden" name="action" value="online_form_submit">
                 	 </form>
                 </div>
               <div id="load"></div>
              </div>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <!-- jQuery -->
     <script src="../../assets/plugins/jquery/jquery.min.js"></script>
    <!-- Parsley validation -->
	<script src="../../assets/plugins/parsley-folder/parsley.js"></script>
	  <!-- Toast Validation -->
	<script src="../../assets/plugins/Toast/toastr.min.js"></script>
    <script type="text/javascript">
    	$(document).ready(function(){
    	    $('#online_div').hide();
    	    $('#cash_div').show();
           $('.pay_method').on('change',function(event){
           	if($(this).val() !="online")
           	{
                $('#online_div').hide();
                $('#cash_div').show();
           	}
           	else
           	{
           		$('#cash_div').hide();
                $('#online_div').show();
           	}
            event.preventDefault();
           });

           // Cash Form Submit
           $('#cash_form').parsley();
           $('#cash_form').on('submit',function(event){
                
                if($('#cash_form').parsley().validate())
                {
                	  	
                $.ajax({
			        url : "../../action-page/admin_ajax_action.php",
			        type : "POST",
			        data : $(this).serialize(),
			        dataType : "json",
			        beforeSend: function(){
			           $('#load').html('<i class="fa fa-spinner fa-spin fa-pulse fa-3x fa-fw"></i><span class="sr-only">Loading...</span>');
			        },
			        success : function(data){
			          if(data.success)
			          {
			             toastr.options = {
			                    "closeButton": true,  // true or false
			                    "debug": false,
			                    "newestOnTop": false,
			                    "progressBar": true,  // true or false
			                    "rtl": false,
			                    "positionClass": "toast-top-right",
			                    "preventDuplicates": false, // true or false
			                    "showDuration": 300,
			                    "hideDuration": 1000,
			                    "timeOut": 5000,
			                    "extendedTimeOut": 1000,
			                    "showEasing": "swing",
			                    "hideEasing": "linear",
			                    "showMethod": "fadeIn",
			                    "hideMethod": "fadeOut"
			                  }
			                  toastr["success"](data.success, "Message");
			                  $('#load').html('');
			                  setTimeout(function(){
			                    window.close();
			                    window.open("confirm_appointment.php");
			                  }, 1000);
			                  
			          }
			          else
			          {
			              toastr.options = {
			                    "closeButton": true,  // true or false
			                    "debug": false,
			                    "newestOnTop": false,
			                    "progressBar": true,  // true or false
			                    "rtl": false,
			                    "positionClass": "toast-top-right",
			                    "preventDuplicates": false, // true or false
			                    "showDuration": 300,
			                    "hideDuration": 1000,
			                    "timeOut": 5000,
			                    "extendedTimeOut": 1000,
			                    "showEasing": "swing",
			                    "hideEasing": "linear",
			                    "showMethod": "fadeIn",
			                    "hideMethod": "fadeOut"
			                  }
			                  toastr["error"](data.error, "Message");
			                  $('#load').html('');
			            }
			        }
			     
			    });

                }
             event.preventDefault();
           });
          

          $('#online_form').parsley();
          $('#online_form').on('submit',function(event){
            if($('#online_form').parsley().validate())
            {
            $.ajax({
			        url : "../../action-page/admin_ajax_action.php",
			        type : "POST",
			        data : $(this).serialize(),
			        dataType : "json",
			        beforeSend: function(){
			           $('#load').html('<i class="fa fa-spinner fa-spin fa-pulse fa-3x fa-fw"></i><span class="sr-only">Loading...</span>');
			        },
			        success : function(data){
			          if(data.success)
			          {
			            toastr.options = {
                          "closeButton": true,  // true or false
                          "debug": false,
                          "newestOnTop": false,
                          "progressBar": true,  // true or false
                          "rtl": false,
                          "positionClass": "toast-top-right",
                          "preventDuplicates": false, // true or false
                          "showDuration": 300,
                          "hideDuration": 1000,
                          "timeOut": 5000,
                          "extendedTimeOut": 1000,
                          "showEasing": "swing",
                          "hideEasing": "linear",
                          "showMethod": "fadeIn",
                          "hideMethod": "fadeOut"
                        }
                        toastr["success"](data.success, "Message");
                        $('#load').html('');
                        setTimeout(function(){
                          window.close();
                          window.open("confirm_appointment.php");
                        }, 1000);
			          }
			          else
			          {
			              toastr.options = {
			                    "closeButton": true,  // true or false
			                    "debug": false,
			                    "newestOnTop": false,
			                    "progressBar": true,  // true or false
			                    "rtl": false,
			                    "positionClass": "toast-top-right",
			                    "preventDuplicates": false, // true or false
			                    "showDuration": 300,
			                    "hideDuration": 1000,
			                    "timeOut": 5000,
			                    "extendedTimeOut": 1000,
			                    "showEasing": "swing",
			                    "hideEasing": "linear",
			                    "showMethod": "fadeIn",
			                    "hideMethod": "fadeOut"
			                  }
			                  toastr["error"](data.error, "Message");
			                  $('#load').html('');
			            }
			        }
			     
			     });
          }

        event.preventDefault();
      });


    });
    </script>
  </body>
</html>