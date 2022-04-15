<script type="text/javascript">
	$(document).ready(function(){

	 //  SignUp User
		$('#SignUp_Form').parsley();
  		$('#SignUp_Form').on('submit',function(event){
  			if($('#SignUp_Form').parsley().validate())
  			{
  				$.ajax({
        			url:"action-page/user_ajax_action.php",
        			method:"post",
        			data : $(this).serialize(),
        			dataType:"json",
        			beforeSend:function()
        			{
        				$('#submit').html('Please Wait..');
        				$('#submit').attr('disabled',true);
        			},
        			success:function(data)
        			{
        			if(data.success)
		              {
		              	$('#success').show();
		              	 $('#success').html('<span class="alert alert-success" id="success">'+data.success+'</span>');
		                 $('#submit').html('SignUp');
        				 $('#submit').attr('disabled',false);
        				 $('#SignUp_Form')[0].reset();
        				  setTimeout(function(){
                           $('#success').hide();
          				}, 5000);
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
		                 $('#submit').html('SignUp');
        				 $('#submit').attr('disabled',false);
		                } 

		        } 

		    });
		} 
		             
  		event.preventDefault();
  		});

  	// Login User

  	$('#login_form').parsley();
  		$('#login_form').on('submit',function(event){
  			if($('#login_form').parsley().validate())
  			{
  				$.ajax({
        			url:"action-page/user_ajax_action.php",
        			method:"post",
        			data : $(this).serialize(),
        			dataType:"json",
        			beforeSend:function()
        			{
        				$('#login').html('Please Wait..');
        				$('#login').attr('disabled',true);
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
		                 $('#login').html('SignUp');
        				 $('#login').attr('disabled',false);
        				setTimeout(function(){
          				  location.href= 'find_doctor.php';
          				}, 3000);
		              }
		               else
		               {
		                 $('#login').html('SignUp');
        				 $('#login').attr('disabled',false);
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