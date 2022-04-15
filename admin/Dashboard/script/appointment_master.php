<script type="text/javascript">
$(document).ready(function(){

  $('.select2').select2();

  //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    });
  //Timepicker
    $('#timepicker1').datetimepicker({
      format: 'LT'
    });
  
    //Initialize Select2 Elements
    // $('.select2bs4').select2({
    //   theme: 'bootstrap4'
    // })
 
	$('#Appointment_form').parsley();
	$('#Appointment_form').on('submit',function(event){
		if($('#Appointment_form').parsley().validate())
		{
			$.ajax({
            url:"../../action-page/admin_ajax_action.php",
            method:"POST",
            enctype : "multipart/form-data",
            data: new FormData(this),
            dataType:"json",
            contentType: false,
            cache: false,
            processData:false, 
            //contentType: false,
            //cache: false,
            // processData:false,        
            beforeSend:function()
            {
              $('#submit').val('Please wait..');
              $('#submit').attr('disabled',true);
            },
            success:function(data)
            {
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
                $('#Appointment_form')[0].reset();
                $('#submit').val('Submit');
                $('#submit').attr('disabled',false);
                
               
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
                  $('#submit').val('Submit');
                  $('#submit').attr('disabled',false);
               }
              
             }
           });
		}
	event.preventDefault();
	});

// Display Doctor Appointment
Display_All_Doctor();
function Display_All_Doctor()
  {
       $.ajax({
        url : "../../action-page/admin_ajax_action.php",
        type : "POST",
        data : {
          page : "Display_All_Appointment",
          action :"Display_All_Appointment"
        },
        success : function(data){
          $('#data').html(data);
          $("#doctor_app").DataTable({
          "responsive": true,
          "autoWidth": false,
         });
        }
      });
  }

  // $(document).on('click','.View',function(event){
  //   id = $(this).data('id');
  //   $.ajax({
  //       url : "../../action-page/admin_ajax_action.php",
  //       type : "POST",
  //       data : {
  //         id : id,
  //         page : "Edit_Details_Sub_category",
  //         action :"Edit_Details_Sub_category"
  //       },
  //       dataType:"json",
  //       success : function(data){
  //         if(data.success)
  //         {
  //           $('#Category').val(data.Category);
  //           $('#name').val(data.Scat_Name);
  //           $('#id').val(data.id);
  //         //location.href='view_sub_category.php';
  //         }
  //         else
  //         {
  //           alert(data.error);
  //         }
  //       }
  //     });
  //   event.preventDefault();
  // });

	$(document).on('click','.Delete_Appointment',function(event){

		id = $(this).data('id');
		con = confirm("Are you sure Delete !");
		if(con==true)
		{
			$.ajax({
	        url : "../../action-page/admin_ajax_action.php",
	        type : "POST",
	        data : {
	        	id : id,
	        	page : "Delete_Appointment_",
	        	action :"Delete_Appointment_"
	        },
	        dataType : "json",
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
                setTimeout(function(){
          	        location.reload();
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
              }
	          }
	       });
		}

	event.preventDefault();
	});
});
</script>