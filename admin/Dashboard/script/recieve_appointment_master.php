<script type="text/javascript">
$(document).ready(function(){
  // Current Date 
  current_date = (new Date()).toISOString().split('T')[0];
  Display_All_Online_Appointment(current_date,current_date,'');
  function Display_All_Online_Appointment(from_date,to_date,search_val)
  {
      $.ajax({
        url : "../../action-page/admin_ajax_action.php",
        type : "POST",
        data : {
          page : "Display_Online_Appointment_All",
          action :"Display_Online_Appointment_All",
          from_date : from_date,
          to_date : to_date,
          search_val : search_val
        },
        success : function(data){
          $('#data_').html(data);
          /*$("#recieved_app").DataTable(
          {
            "responsive": true,
            "autoWidth": false,
         });*/
        }
    });
  }

  $('#filter_form').parsley();
  $('#filter_form').on('submit',function(event){
    if($('#filter_form').parsley().validate())
    {
      Display_All_Online_Appointment($('#from_date_r').val(),$('#to_date_r').val(),'');
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
      window.open('export_excel_all_appointment.php?id='+id+'','_blank' );
      //alert(id);
   });
    // Search All AppointMent
    $("#myInput1").on("keyup", function() {
      var Search_val = $(this).val();
       if(Search_val !="")
       {
         Display_All_Online_Appointment($('#from_date_r').val(),$('#to_date_r').val(),Search_val);
       }
    });



  $('#load').hide();
  $(document).on('click','.confirm_appointment',function(event){
      
    order_id = $(this).data('ord_id');
    con = confirm("Are You Sure Confirm This Appointment !");
    if(con==true)
    {
      $.ajax({
            url:"../../action-page/admin_ajax_action.php",
            method:"POST",
            data:{
              ord_id : order_id,
              page : "Confirm_Appointment_",
              action :"Confirm_Appointment_"
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
                $('#load').hide();
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
                  $('#load').hide();
              }
              
             }
           });
    }
  event.preventDefault();
  });

$('#Confirm_modal').modal('hide');
// Change Appointment
 $(document).on('click','.change_appointment',function(event){
    
    $('#email').val($(this).data('email'));
    doc_id = $(this).data('doc_id');
    Order_id = $(this).data('ord_id');
      $.ajax({
            url:"../../action-page/admin_ajax_action.php",
            method:"POST",
            data:{
              doc_id : doc_id,
              page : "Change_Appointment_",
              action :"Change_Appointment_"
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
                $('#order_id').val(Order_id);
                $('#day').data('doc_id',doc_id);
                $('#shift').data('doc_id',doc_id);
                $('#time').data('doc_id',doc_id);
                $('#Confirm_modal').modal('show');
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

 $('#changes_appointment_form').parsley();
 $('#changes_appointment_form').on('submit',function(event){

   if($('#changes_appointment_form').parsley().validate())
   {
      $.ajax({
            url:"../../action-page/admin_ajax_action.php",
            method:"POST",
            data: $(this).serialize(),
            dataType:"json",    
            beforeSend:function()
            {
              $('#load').show();
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
                  $('#load').hide();
                  //Display_All_Online_Appointment();
                  $('#changes_appointment_form')[0].reset();
                  $('#Confirm_modal').modal('hide');
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
                  $('#load').hide();
              }
              
             }
           });
   }

  event.preventDefault();
 });

  Display_All_Confirm_Appointment(current_date,current_date,'');
  function Display_All_Confirm_Appointment(from_date,to_date,search_val)
  {
      $.ajax({
        url : "../../action-page/admin_ajax_action.php",
        type : "POST",
        data : {
          page : "Display_All_Confirm_Appointment_",
          action :"Display_All_Confirm_Appointment_",
          from_date : from_date,
          to_date : to_date,
          search_val : search_val
        },
        success : function(data){
          $('#data_Confirm').html(data);
         //  $("#recieved_confirm_app").DataTable({
         //    "responsive": true,
         //    "autoWidth": false,
         // });
        }
    });
  }

  
// Confirm Appointment Filter
  $('#filter_confirm_form').parsley();
  $('#filter_confirm_form').on('submit',function(event){
    if($('#filter_confirm_form').parsley().validate())
    {
      Display_All_Confirm_Appointment($('#from_date_c').val(),$('#to_date_c').val(),'');
    }
    event.preventDefault();
  });

  // Select All Checkbox
   $('#select_all_con').change(function(event){
     $('.select_record').prop("checked",$(this).prop("checked"));

    event.preventDefault();
   });
   // $('#select_all').on('change',function(event){
   //   $('.select_record').prop("checked",$(this).prop("checked"));
   //   event.preventDefault();
   // })

   $('#excel_downlode_btn_con').click(function(){
      var id = $('.select_record:checked').map(function(){
         return $(this).val();
      }).get().join(' ');
      window.open('export_excel_confirm_appointment.php?id='+id+'','_blank' );
      //alert(id);
   });
     // Search All AppointMent
    $("#myInput").on("keyup", function() {
      var Search_val = $(this).val();
       if(Search_val !="")
       {
         Display_All_Confirm_Appointment($('#from_date_c').val(),$('#to_date_c').val(),Search_val);
       }
    });



  $(document).on('click','.success_',function(event){
    
    con = confirm("Are You Sure Patient Attend !");
    if(con==true)
    {  
       $.ajax({
        url : "../../action-page/admin_ajax_action.php",
        type : "POST",
        data : {
          ord_id : $(this).data('ord_id'),
          page : "Display_Success_Users_",
          action :"Display_Success_Users_"
        },
        dataType : "json",
        beforeSend: function(){
           $('#load').show()
        },
        success : function(data){
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
                  $('#load').hide();
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
                  $('#load').hide();
          }
        }
    });

    }

   // alert($(this).data('ord_id'));
   event.preventDefault();
  });

  $(document).on('click','.Cancel_',function(event){

    //alert($(this).data('ord_id'));
     con = confirm("Are You Sure Cancel Patient Details !");
    if(con==true)
    {  
       $.ajax({
        url : "../../action-page/admin_ajax_action.php",
        type : "POST",
        data : {
          ord_id : $(this).data('ord_id'),
          page : "Display_Cancel_Users_",
          action :"Display_Cancel_Users_"
        },
        dataType : "json",
        beforeSend: function(){
           $('#load').show()
        },
        success : function(data){
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
                  $('#load').hide();
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
                  $('#load').hide();
          }
        }
    });
       
    }
    event.preventDefault();
  });

  $(document).on('click','.Pay_Now',function(event){
    var order_id = $(this).data('ord_id');
    window.open("payment.php?id="+order_id+"","", "width=600, height=600");

    event.preventDefault();
  });








   


});
</script>