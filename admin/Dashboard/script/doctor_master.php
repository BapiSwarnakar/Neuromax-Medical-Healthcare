<script type="text/javascript">

 $(document).ready(function(){
	$('#Personal_Details_form').parsley();

	$('#Personal_Details_form').on('submit',function(event){
		if($('#Personal_Details_form').parsley().validate())
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
              $('#Personal').val('Please wait..');
              $('#Personal').attr('disabled',true);
            },
            success:function(data)
            {
              if(data.success)
              {
                $('#custom-tabs-one-profile-tab').attr('href','#custom-tabs-one-profile');
                $('#custom-tabs-one-profile-tab').attr('data-toggle','pill');
                $('#custom-tabs-one-profile-tab').click();
                $('#Personal').val('Save & Next');
                $('#Personal').attr('disabled',false);
                Display_Education();
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
                  $('#Personal').val('Submit');
                  $('#Personal').attr('disabled',false);
               }
              
             }
           });
		}
	event.preventDefault();
	});
// Education Details
 
	function Display_Education()
	{
       $.ajax({
        url : "../../action-page/admin_ajax_action.php",
        type : "POST",
        data : {
        	page : "Display_Education_Details",
        	action :"Display_Education_Details"
        },
        success : function(data){
          $('#table').html(data);
        }
    });
	}

  $('#Education_details').parsley();

  $('#Education_details').on('submit',function(event){
    if($('#Education_details').parsley().validate())
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
              $('#Personal').attr('disabled',true);
            },
            success:function(data)
            {
              if(data.success)
              {
                $('#Education_details')[0].reset();
                $('#Personal').attr('disabled',false);
                Display_Education();
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
                  $('#Personal').attr('disabled',false);
               }
              
             }
           });
    }
  event.preventDefault();
  });

	$(document).on('click','.delete_education',function(event){

		id = $(this).data('id');
		con = confirm("Are you sure Delete !");
		if(con==true)
		{
			$.ajax({
	        url : "../../action-page/admin_ajax_action.php",
	        type : "POST",
	        data : {
	        	id : id,
	        	page : "Delete_education",
	        	action :"Delete_education"
	        },
	        dataType : "json",
	        success : function(data){
	           if(data.success)
              {  
                Display_Education();
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

  // Specialization Details

$(document).on('click','.Special_btn',function(event){
  
  $('#custom-tabs-one-messages-tab').attr('href','#custom-tabs-one-messages');
  $('#custom-tabs-one-messages-tab').attr('data-toggle','pill');
  $('#custom-tabs-one-messages-tab').click();
  Display_Specialization();
  event.preventDefault();
});
  
  function Display_Specialization()
  {
       $.ajax({
        url : "../../action-page/admin_ajax_action.php",
        type : "POST",
        data : {
          page : "Display_Specialization_Details",
          action :"Display_Specialization_Details"
        },
        success : function(data){
          $('#spl_table').html(data);
        }
    });
  }

  $('#Specialization_Form').parsley();

  $('#Specialization_Form').on('submit',function(event){
    if($('#Specialization_Form').parsley().validate())
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
              $('#spl').attr('disabled',true);
            },
            success:function(data)
            {
              if(data.success)
              {
                $('#Specialization_Form')[0].reset();
                $('#spl').attr('disabled',false);
                Display_Specialization();
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
                  $('#spl').attr('disabled',false);
               }
              
             }
           });
    }
  event.preventDefault();
  });

  $(document).on('click','.delete_spl',function(event){

    id = $(this).data('id');
    con = confirm("Are you sure Delete !");
    if(con==true)
    {
      $.ajax({
          url : "../../action-page/admin_ajax_action.php",
          type : "POST",
          data : {
            id : id,
            page : "Delete_Specialization",
            action :"Delete_Specialization"
          },
          dataType : "json",
          success : function(data){
             if(data.success)
              {  
                Display_Specialization();
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


$(document).on('click','.membership_btn',function(event){
  
  $('#custom-tabs-one-settings-tab').attr('href','#custom-tabs-one-settings');
  $('#custom-tabs-one-settings-tab').attr('data-toggle','pill');
  $('#custom-tabs-one-settings-tab').click();
  Display_Membership();
  event.preventDefault();
});

  
  function Display_Membership()
  {
       $.ajax({
        url : "../../action-page/admin_ajax_action.php",
        type : "POST",
        data : {
          page : "Display_Membership_Details",
          action :"Display_Membership_Details"
        },
        success : function(data){
          $('#mem_table').html(data);
        }
    });
  }

  $('#Membership_Form').parsley();

  $('#Membership_Form').on('submit',function(event){
    if($('#Membership_Form').parsley().validate())
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
              $('#mem').attr('disabled',true);
            },
            success:function(data)
            {
              if(data.success)
              {
                $('#Membership_Form')[0].reset();
                $('#mem').attr('disabled',false);
                Display_Membership();
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
                  $('#spl').attr('disabled',false);
               }
              
             }
           });
    }
  event.preventDefault();
  });

  $(document).on('click','.delete_Mem',function(event){

    id = $(this).data('id');
    con = confirm("Are you sure Delete !");
    if(con==true)
    {
      $.ajax({
          url : "../../action-page/admin_ajax_action.php",
          type : "POST",
          data : {
            id : id,
            page : "Delete_Membership",
            action :"Delete_Membership"
          },
          dataType : "json",
          success : function(data){
             if(data.success)
              {  
                Display_Membership();
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
$(document).on('click','.final_submit',function(event){

  $.ajax({
        url : "../../action-page/admin_ajax_action.php",
        type : "POST",
        data : {
          page : "final_submit_button",
          action :"final_submit_button"
        },
        success : function(data){
          swal("Submitted Successfully", "You clicked the button!", "success");
          setTimeout(function(){
            location.reload();
          }, 2000);
        }
    });
  event.preventDefault();
});

// All Display Doctor

Display_All_Doctor();
function Display_All_Doctor()
  {
       $.ajax({
        url : "../../action-page/admin_ajax_action.php",
        type : "POST",
        data : {
          page : "Display_All_Doctor",
          action :"Display_All_Doctor"
        },
        success : function(data){
          $('#data').html(data);
          $("#doctor_table").DataTable({
          "responsive": true,
          "autoWidth": false,
         });
        }
      });
  }


  $(document).on('click','.Delete_Doctor',function(event){

    id = $(this).data('id');
    conn = confirm("Are You Sure Delete !");
    if(conn == true)
    {
    $.ajax({
      url : "../../action-page/admin_ajax_action.php",
      method : "post",
      data : {
        page : "Delete_Doctor_",
        action : "Delete_Doctor_",
        id : id
      },
      dataType : "json",
      success : function(data)
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
