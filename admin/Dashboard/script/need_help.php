<script type="text/javascript">
	$(document).ready(function(){
       Need_Help_All_Record();

		  function Need_Help_All_Record()
		  {
		      $.ajax({
		        url : "../../action-page/admin_ajax_action.php",
		        type : "POST",
		        data : {
		          page : "Need_help_request_list_Display",
		          action :"Need_help_request_list_Display"
		        },
		        success : function(data){
		          $('#data').html(data);
		          $("#help_list").DataTable({
		            "responsive": true,
		            "autoWidth": false,
		         });
		        }
		    });
		  }

        $('#Need_Help_modal').modal('hide');
		$(document).on('click','#Help_Request_send',function(event){
            
            email = $(this).data('email');
			$('#email').val(email);
			$('#Need_Help_modal').modal('show');
		});


		$('#Need_Help_Form').parsley();
		$('#Need_Help_Form').on('submit',function(event){

			if($('#Need_Help_Form').parsley().validate())
			{
				$.ajax({
        			url:"../../action-page/admin_ajax_action.php",
        			method:"post",
        			data : $(this).serialize(),
        			dataType:"json",
        			beforeSend:function()
        			{
        				$('#help_btn').val('Please Wait..');
        				$('#help_btn').attr('disabled',true);
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
		                 $('#help_btn').val('Confirm Booking');
        				 $('#help_btn').attr('disabled',false);
        				 $('#Need_Help_Form')[0].reset();
        				  // setTimeout(function(){
              //              $('#success').hide();
          				// }, 5000);
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
		                 $('#help_btn').val('Send Request');
        				 $('#help_btn').attr('disabled',false);
		                } 

		        } 

		    });
			}

		event.preventDefault();
		})
	});
</script>