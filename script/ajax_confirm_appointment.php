<script type="text/javascript">
	$(document).ready(function(){

	 //  SignUp User
		$('#Confirm_Booking_Form').parsley();
  		$('#Confirm_Booking_Form').on('submit',function(event){
  			if($('#Confirm_Booking_Form').parsley().validate())
  			{
  				$.ajax({
        			url:"action-page/user_ajax_action.php",
        			method:"post",
        			data : $(this).serialize(),
        			dataType:"json",
        			beforeSend:function()
        			{
        				$('#submit123').html('<i class="fa fa-spinner fa-pulse fa-2x fa-fw"></i><span class="sr-only">Loading...</span>');
        				$('#submit123').attr('disabled',true);
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
		                 swal("Thankyou", "Your Request Sending Successfully Done, Confirmation Will be Provide soon..!", "success");
		                 $('#submit123').html('<i class="fas fa-arrow-right"></i>');
        				 $('#submit123').attr('disabled',false);
        				 $('#Confirm_Booking_Form')[0].reset();
        				  setTimeout(function(){
                            window.open(data.url, '_blank');
          				}, 2000);
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
		                 $('#submit123').html('<i class="fas fa-arrow-right"></i>');
        				 $('#submit123').attr('disabled',false);
        				 $('#signup_popup').modal('show');
		                } 

		        } 

		    });
		} 
		             
  		event.preventDefault();
  		});

  });
</script>