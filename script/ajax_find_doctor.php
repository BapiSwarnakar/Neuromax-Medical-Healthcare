<script type="text/javascript">
 $(document).ready(function(){
 	$('#wait').hide();
 	$('#Search_form').parsley();
 	$('#Search_form').on('submit',function(event){
 		if($('#Search_form').parsley().validate())
 		{
		   Display_Doctor(1,$('[name=Search_field]').val());
		   $('#Specialist').val('');
		}

 	event.preventDefault();
 	});
  
  Display_Doctor(1,'');
  function Display_Doctor(page,value)
  {
     $.ajax({
		        url : "action-page/user_ajax_action.php",
		        type : "POST",
		        data : {
		        	page_num : page,
		        	value : value,
		        	page : "Search_Doctor_User",
		        	action :"Search_Doctor_User"
		        },
		        dataType : "json",
		         beforeSend:function()
	            {  
	            	$('#wait').show();
	            },
		        success : function(data){
		        	 $('#data').html(data.body);
		        	 $('#pagination').html(data.page);
		             $('#wait').hide();
		       
		        }
		    });
    }
 
$(document).on('click','.page_click',function(event){
	page = $(this).data('id');
	Display_Doctor(page,$('[name=Search_field]').val() || $('#Specialist').val());

event.preventDefault();
});

$('#Specialist').on('change',function(event){
   $('[name=Search_field]').val('');
   Display_Doctor(1,$(this).val());
});

$('#Appointment_Details').modal('hide');
$(document).on('click','.View_Profile',function(event){
    
     $.ajax({
		        url : "action-page/user_ajax_action.php",
		        type : "POST",
		        data : {
		        	id : $(this).data('id'),
		        	page : "Appointment_Details_Per_Doctor",
		        	action :"Appointment_Details_Per_Doctor"
		        },
		        dataType : "json",
		         beforeSend:function()
	            {  
	            	$(this).html('Please Wait..');
	            },
		        success : function(data){
                   if(data.success)
                   {
                   	 $(this).html('Appointment');
                   	 $('#App_Details').html(data.success)
                   	 $('#doc_name').html(data.doc_name);
		        	 $('#Appointment_Details').modal('show');
		        	 $('#Doc_Model').modal('hide');
                   }
                   else
                   {
                   	  $(this).html('Appointment');
                   	  $('#App_Details').html(data.error)
                   	  $('#doc_name').html(data.doc_name);
		        	  $('#Appointment_Details').modal('show');
		        	  $('#Doc_Model').modal('hide');
                   }
                    
		        }
		    });
	//alert($(this).data('id'));
	

  event.preventDefault();
});


 });
</script>