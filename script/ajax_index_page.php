<script type="text/javascript">
$(document).ready(function(){
	$('#Doc_Model').modal('hide');
	$(document).on('click','.Department_Doctor',function(event){
		dept_id =  $(this).data('dept_id');
		$.ajax({
			url : "action-page/user_ajax_action.php",
			method:"post",
			data : {
				dept_id : dept_id,
				page  :"Department_doctor_Name",
				action : "Department_doctor_Name"
			},
			dataType : "json",
			success : function(data)
			{
				if(data.success)
				{
				  $('#exampleModalLongTitle').html('Doctor List');
                  $('#data').html(data.success);
                  $('#Doc_Model').modal('show');
				}
				else
				{
				 $('#exampleModalLongTitle').html('Doctor List');
				 $('#data').html(data.error);
                 $('#Doc_Model').modal('show');
				}
			
			}
		});

	event.preventDefault();
	});

	$('#Need_Help_Button').on('click',function(event){
        
        $('#Need_Help').modal('show');

	event.preventDefault();
	});

	$('#Need_Help_Form').parsley();
    $('#Need_Help_Form').on('submit',function(event){
       if($('#Need_Help_Form').parsley().validate())
       {
       	  $.ajax({
        			url:"action-page/user_ajax_action.php",
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

   $('#Doc_Model').modal('hide');
	$('#Opening_Hour').on('click',function(event){

		$.ajax({
			url : "action-page/user_ajax_action.php",
			method : "post",
			data : {
				page : "Opening_Hour_Page_",
				action : "Opening_Hour_Page_"
			},
			dataType : "json",
			success : function(data)
			{
				if(data.success)
				{
				   $('#exampleModalLongTitle').html("Opening Hour");
				   $('#data').html(data.success);
                   $('#Doc_Model').modal('show');
				}
				else
				{
					alert(data.error);
				}
			}
		});
	event.preventDefault();
	});

// READ MORE LESS OR NOT CHECK
	$(document).on('click','.Read_more_btn',function(event){
    data =  $(this).data('text');
    content_show = $(this).data('content_show');
    $('#'+content_show).html(data+'<a href="javascript:void(0)" class="text-danger Less_More_btn" data-text="'+data+'" data-content_show="'+content_show+'">Less More..</a>');
	 event.preventDefault();
	});	

    $(document).on('click','.Less_More_btn',function(event){
    	data =  $(this).data('text');
        content_show = $(this).data('content_show');
    	$.ajax({
    		url : "action-page/user_ajax_action.php",
    		data : {
    			text : data,
    			content_show : content_show,
    			page :"Less_More_Content",
    			action : "Less_More_Content"
    		},
    		method : "post",
    		dataType : "json",

    		success : function(data)
    		{
               $('#'+content_show).html(data.success);
    		}
    	})

    event.preventDefault();
    });

    // EXIT

    $(document).on('click','.update_news_show',function(event){
    	id = $(this).data('id');
    	$.ajax({
			url : "action-page/user_ajax_action.php",
			method : "post",
			data : {
				id : id,
				page : "News_show_modal",
				action : "News_show_modal"
			},
			dataType : "json",
			success : function(data)
			{
				if(data.success)
				{
				   $('#News_Title').html(data.title);
				   $('#news_body').html(data.body);
                   $('#News_Model').modal('show');
				}
				else
				{
					alert(data.error);
				}
			}
		});
    });

  $('.zoom_image').on('click',function(event){
    
    id = $(this).data('id');
    	$.ajax({
			url : "action-page/user_ajax_action.php",
			method : "post",
			data : {
				id : id,
				page : "Zoom_Image_show_modal",
				action : "Zoom_Image_show_modal"
			},
			dataType : "json",
			success : function(data)
			{
				if(data.success)
				{
				   $('#zoom_Data').html(data.success);
				   $('#zoom_Mdl').modal('show');
				}
				else
				{
					alert("Access Denied !");
				}

			}
		});
  	
  })
});
</script>