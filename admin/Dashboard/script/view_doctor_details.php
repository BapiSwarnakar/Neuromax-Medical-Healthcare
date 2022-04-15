<script type="text/javascript">
	$(document).ready(function(){
		$(document).on('click','.Delete_Education',function(event){

			id = $(this).data('id');
			doc_id = $(this).data('doc_id');
			con = confirm("Are You Sure Delete !");
			if(con==true)
			{
				$.ajax({
					url:"../../action-page/admin_ajax_action.php",
		            method:"POST",
		            data  : {
		            	page : "Delete_Education_",
		            	action : "Delete_Education_",
		            	id : id,
		            	doc_id : doc_id
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
				})
			}
		event.preveDefault();
		});


		$(document).on('click','.Delete_Specialization',function(event){

			id = $(this).data('id');
			doc_id = $(this).data('doc_id');
			con = confirm("Are You Sure Delete !");
			if(con==true)
			{
				$.ajax({
					url:"../../action-page/admin_ajax_action.php",
		            method:"POST",
		            data  : {
		            	page : "Delete_Specialization_",
		            	action : "Delete_Specialization_",
		            	id : id,
		            	doc_id : doc_id
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
				})
			}
		event.preveDefault();
		});


		$(document).on('click','.Delete_Membership',function(event){

			id = $(this).data('id');
			doc_id = $(this).data('doc_id');
			con = confirm("Are You Sure Delete !");
			if(con==true)
			{
				$.ajax({
					url:"../../action-page/admin_ajax_action.php",
		            method:"POST",
		            data  : {
		            	page : "Delete_Membership_",
		            	action : "Delete_Membership_",
		            	id : id,
		            	doc_id : doc_id
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
				})
			}
		event.preveDefault();
		});

// Personal Details
   $('#personal_details_form').parsley();

   $('#personal_details_form').on('submit',function(event){
		if($('#personal_details_form').parsley().validate())
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
              $('#p_btn').val('Please wait..');
              $('#p_btn').attr('disabled',true);
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
                $('#personal_details_form')[0].reset();
                $('#p_btn').val('Submit');
                $('#p_btn').attr('disabled',false);
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
                  $('#p_btn').val('Submit');
                  $('#p_btn').attr('disabled',false);
               }
              
             }
           });
		}
	event.preventDefault();
	});

 // Education Details
   $('#Education_form').parsley();

   $('#Education_form').on('submit',function(event){
		if($('#Education_form').parsley().validate())
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
              $('#education').val('Please wait..');
              $('#education').attr('disabled',true);
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
                $('#Education_form')[0].reset();
                $('#education').val('Submit');
                $('#education').attr('disabled',false);
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
                  $('#education').val('Submit');
                  $('#education').attr('disabled',false);
               }
              
             }
           });
		}
	event.preventDefault();
	});

 // Specialization Details
   $('#Specialization_form').parsley();

   $('#Specialization_form').on('submit',function(event){
		if($('#Specialization_form').parsley().validate())
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
              $('#spl_btn').val('Please wait..');
              $('#spl_btn').attr('disabled',true);
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
                $('#Specialization_form')[0].reset();
                $('#spl_btn').val('Submit');
                $('#spl_btn').attr('disabled',false);
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
                  $('#spl_btn').val('Submit');
                  $('#spl_btn').attr('disabled',false);
               }
              
             }
           });
		}
	event.preventDefault();
	});

// Membership Details
   $('#membership_form').parsley();

   $('#membership_form').on('submit',function(event){
		if($('#membership_form').parsley().validate())
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
              $('#mem_btn').val('Please wait..');
              $('#mem_btn').attr('disabled',true);
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
                $('#membership_form')[0].reset();
                $('#mem_btn').val('Submit');
                $('#mem_btn').attr('disabled',false);
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
                  $('#mem_btn').val('Submit');
                  $('#mem_btn').attr('disabled',false);
               }
              
             }
           });
		}
	event.preventDefault();
	});


	});
</script>