<script type="text/javascript">
	$(document).ready(function(){
   
      $(function () {
        // Summernote
        $('.textarea').summernote()
      })


    $('#new_form').parsley();
    $('#new_form').on('submit',function(event){
		if($('#new_form').parsley().validate())
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
              $('#news_btn').val('Please wait..');
              $('#news_btn').attr('disabled',true);
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
                $('#new_form')[0].reset();
                $('#news_btn').val('Submit');
                $('#news_btn').attr('disabled',false);
                
               
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
                  $('#news_btn').val('Submit');
                  $('#news_btn').attr('disabled',false);
               }
              
             }
           });
		}
	 event.preventDefault();
	});
     
    All_News();

		  function All_News()
		  {
		      $.ajax({
		        url : "../../action-page/admin_ajax_action.php",
		        type : "POST",
		        data : {
		          page : "All_News_Show",
		          action :"All_News_Show"
		        },
		        success : function(data){
		          $('#news_data').html(data);
		          $("#news_table").DataTable({
		            "responsive": true,
		            "autoWidth": false,
		         });
		        }
		    });
		  }


 
  $(document).on('click','.Delete_News',function(event){
   
   id = $(this).data('id')
    conn = confirm("Are You Sure Delete !");
    if(conn==true)
    {
      $.ajax({
        url : "../../action-page/admin_ajax_action.php",
        type : "POST",
        data:{
          page : "Delete_News_Unic",
          action  : "Delete_News_Unic",
          id : id
        },
        dataType : "json",
        success : function (data)
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