<script type="text/javascript">
	$(document).ready(function(){

		//Timepicker
	    $('#timepicker').datetimepicker({
	      format: 'LT'
	    });
	  //Timepicker
	    $('#timepicker1').datetimepicker({
	      format: 'LT'
	    });
         //$('#Opening_hour_form').parsley();
        $('#Opening_hour_form').on('submit',function(event){
            if($('#day').val()=="")
	         {
	         	alert("Please Select Day !");
	         }
	        else if($('#close').val() =="" && $('#start').val()=="" && $('#end').val()=="")
	        {
               alert("Please Select Time or Close !");
	        }
	        else if($('#start').val() !="" && $('#end').val() =="")
	        {
	        	alert("Please Select End Time !");
	        }
	        else if($('#end').val() !="" && $('#start').val()=="")
	        {
	        	alert("Please Select Start Time !");
	        }
	        else
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
		                $('#Opening_hour_form')[0].reset();
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


    Opening_Hour_Record();

		  function Opening_Hour_Record()
		  {
		      $.ajax({
		        url : "../../action-page/admin_ajax_action.php",
		        type : "POST",
		        data : {
		          page : "Opening_Hour_All_Record",
		          action :"Opening_Hour_All_Record"
		        },
		        success : function(data){
		          $('#data').html(data);
		          $("#opening_table").DataTable({
		            "responsive": true,
		            "autoWidth": false,
		         });
		        }
		    });
		  }
         
	});
</script>