<script type="text/javascript">
	$(document).ready(function(){
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    });


  // $('#Search_mobile').on('keyup',function(event){
  //     $.ajax({
  //           url:"../../action-page/admin_ajax_action.php",
  //           method:"POST",
  //           enctype : "multipart/form-data",
  //           data: {
  //             mobile : $(this).val(),
  //             page : "Search_Patient",
  //             action : "Search_Patient"
  //           },
  //           dataType:"json",
  //           success:function(data)
  //           {
  //             if(data.success)
  //             {  
  //               $('#show_data').html(data.data);
  //             } 
  //           }
  //       });
  // })

   $('#Search_mobile').keyup(function(){  
           var query = $(this).val();  
           if(query != '')  
           {  
                $.ajax({  
                     url:"../../action-page/admin_ajax_action.php",  
                     method:"POST",  
                     data: {
                        mobile : $(this).val(),
                        page : "Search_Patient",
                        action : "Search_Patient"
                      },
                    dataType:"json", 
                     success:function(data)  
                     {  
                          $('#show_data').fadeIn();  
                          $('#show_data').html(data.data);  
                     }  
                });  
           }
           else
           {
            $('#show_data').fadeOut();
           }  
      });  
      $(document).on('click', '.item', function(){  
           $('#Search_mobile').val($(this).text());  
           $('#show_data').fadeOut();  
      });

      // Search Patient Form

   $('#Search_Patient_form').parsley();
   $('#Search_Patient_form').on('submit',function(event){
    if($('#Search_Patient_form').parsley().validate())
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
              $('#load').html('<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i><span class="sr-only">Loading...</span>');
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
                $('#load').html('');
                $('#exist_user_id').val(data.User_Id);
                $('#name').val(data.User_Name);
                $('#gender').val(data.User_Gender);
                $('#dob').val(data.User_Dob);
                $('#email').val(data.User_Email);
                $('#mobile').val(data.User_Mobile);
                $('#address').val(data.User_Address);

                $('#email_user').val(data.User_Email);
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
                  $('#load').html('');
               }
              
             }
           });
    }
    event.preventDefault();
   })
  
  $('#patient_register_Form').parsley();
	$('#patient_register_Form').on('submit',function(event){
		if($('#patient_register_Form').parsley().validate())
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
              $('#Register').val('Please wait..');
              $('#Register').attr('disabled',true);
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
                $('#custom-tabs-one-profile-tab').attr('href','#custom-tabs-one-profile');
                $('#custom-tabs-one-profile-tab').attr('data-toggle','pill');
                $('#Register').val('Register');
                $('#Register').attr('disabled',false);
                $('#user_id').val(data.user_id);
                setTimeout(function(){ 
                   $('#custom-tabs-one-profile-tab').click();
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
                  $('#Register').val('Submit');
                  $('#Register').attr('disabled',false);
               }
              
             }
           });
		}
	event.preventDefault();
	});
$('#doctor').on('change',function(event){

    doc_id = $(this).val();
    $.ajax({
            url:"../../action-page/admin_ajax_action.php",
            method:"POST",
            data:{
              doc_id : doc_id,
              page : "Change_Doctor_",
              action :"Change_Doctor_"
            },
            dataType:"json",    
            beforeSend:function()
            {
              $('#load').show();
            },
            success:function(data)
            {
              if(data.success)
              {
                $('#load').hide();
                $('#day').html(data.success);
                $('#day').data('doc_id',doc_id);
                $('#shift').data('doc_id',doc_id);
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
                  $('#load').hide();
              }
              
             }
           });


  event.preventDefault();
 });
  $('#day').on('change',function(event){

    day = $(this).val();
    doc_id = $(this).data('doc_id');
    $.ajax({
            url:"../../action-page/admin_ajax_action.php",
            method:"POST",
            data:{
              doc_id : doc_id,
              day : day,
              page : "Change_Day_",
              action :"Change_Day_"
            },
            dataType:"json",    
            beforeSend:function()
            {
              $('#load').show();
            },
            success:function(data)
            {
              if(data.success)
              {
                $('#load').hide();
                $('#shift').html(data.success);
                $('#shift').data('day',day);
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
                  $('#load').hide();
              }
              
             }
           });


  event.preventDefault();
 });
 

 $('#shift').on('change',function(event){

     shift =$(this).val();
     doc_id = $(this).data('doc_id');
     day= $(this).data('day');
     $.ajax({
            url:"../../action-page/admin_ajax_action.php",
            method:"POST",
            data:{
              doc_id : doc_id,
              day : day,
              shift : shift,
              page : "Change_Shift_",
              action :"Change_Shift_"
            },
            dataType:"json",    
            beforeSend:function()
            {
              $('#load').show();
            },
            success:function(data)
            {
              if(data.success)
              {
                $('#load').hide();
                $('#time').html(data.success);
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
                  $('#load').hide();
              }
              
             }
           });
  event.preventDefault();
 });

 $('#appointment_form').parsley();
 $('#appointment_form').on('submit',function(event){

   if($('#appointment_form').parsley().validate())
   {
      $.ajax({
            url:"../../action-page/admin_ajax_action.php",
            method:"POST",
            data: $(this).serialize(),
            dataType:"json",    
            beforeSend:function()
            {
              $('#app').val("Please Wait..");
              $('#app').attr('disabled',true);
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
                  //Display_All_Online_Appointment();
                  $('#appointment_form')[0].reset();
                  $('#app').val("Submit");
                  $('#app').attr('disabled',false);
                  setTimeout(function(){
                    location.reload();
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
                  $('#app').val("Submit");
                  $('#app').attr('disabled',false);
              }
              
             }
           });
   }

  event.preventDefault();
 });
 current_date = (new Date()).toISOString().split('T')[0];
$('#load').hide();
 Display_All_Patient(current_date,current_date,'');
  function Display_All_Patient(from_date,to_date,search_val)
  {
      $.ajax({
        url : "../../action-page/admin_ajax_action.php",
        type : "POST",
        data : {
          page : "Display_All_Patient",
          action :"Display_All_Patient",
          from_date : from_date,
          to_date : to_date,
          search_val : search_val
        },
        beforeSend : function(){ 
           $('#load').show();
        },
        success : function(data){
          $('#data_').html(data);
          //$("#recieved_app").DataTable();

         //  {
         //    "responsive": true,
         //    "autoWidth": false,
         // }
        $('#load').hide();
        }
    });
  }

// Filter Date Wise

$('#filter_form').parsley();
$('#filter_form').on('submit',function(event){
  if($('#filter_form').parsley().validate())
  {
    Display_All_Patient($('#from_date').val(),$('#to_date').val(),'');
  }
  event.preventDefault();
});

// Select All Checkbox
 $('#select_all').change(function(event){
   $('.select_record').prop("checked",$(this).prop("checked"));

  event.preventDefault();
 });
 // $('#select_all').on('change',function(event){
 //   $('.select_record').prop("checked",$(this).prop("checked"));
 //   event.preventDefault();
 // })

 $('#excel_downlode_btn').click(function(){
    var id = $('.select_record:checked').map(function(){
       return $(this).val();
    }).get().join(' ');
    window.open('export_excel_patient_details.php?id='+id+'','_blank' );
    //alert(id);
 });

 // Search All AppointMent
    $("#myInput1").on("keyup", function() {
      // var value = $(this).val().toLowerCase();
      // $("#data_ tr").filter(function() {
      //   $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      // });
       var Search_val = $(this).val();
       if(Search_val !="")
       {
         Display_All_Patient($('#from_date').val(),$('#to_date').val(),Search_val);
       }
    });


});
</script>