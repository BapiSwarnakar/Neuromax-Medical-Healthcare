<script type="text/javascript">
  $(document).ready(function(){
    $('#Doctor_department_form').parsley();
    $('#Doctor_department_form').on('submit',function(event){
    if($('#Doctor_department_form').parsley().validate())
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
              $('#dept_btn').val('Please wait..');
              $('#dept_btn').attr('disabled',true);
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
                $('#Doctor_department_form')[0].reset();
                $('#dept_btn').val('Submit');
                $('#dept_btn').attr('disabled',false);
                
               
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
                  $('#dept_btn').val('Submit');
                  $('#dept_btn').attr('disabled',false);
               }
              
             }
           });
    }
   event.preventDefault();
  });


    All_Department();

      function All_Department()
      {
          $.ajax({
            url : "../../action-page/admin_ajax_action.php",
            type : "POST",
            data : {
              page : "All_Department_Display",
              action :"All_Department_Display"
            },
            success : function(data){
              $('#data').html(data);
              $("#dept_table").DataTable({
                "responsive": true,
                "autoWidth": false,
             });
            }
        });
      }

   $(document).on('click','.Delete_Department',function(event){

    id = $(this).data('id')
    conn = confirm("Are You Sure Delete !");
    if(conn==true)
    {
      $.ajax({
        url : "../../action-page/admin_ajax_action.php",
        type : "POST",
        data:{
          page : "Delete_Department",
          action  : "Delete_Department",
          id : id,
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

// Check Valid Image
  $(document).ready(function(){
//  MADHYAMIK DOC UPLOAD
     $('#success').hide();

    $("#image").change(function () {
        if(fileExtValidate(this)) {
           if(fileSizeValidate(this)) {
            showImg(this);
           }   
        }    
      });
    // File extension validation, Add more extension you want to allow
    var validExt = ".jpg , .jpeg , .png";
    function fileExtValidate(fdata) {
     var filePath = fdata.value;
     var getFileExt = filePath.substring(filePath.lastIndexOf('.') + 1).toLowerCase();
     var pos = validExt.indexOf(getFileExt);
     if(pos < 0) {
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
                  $('#image').val('');
                  toastr["error"]("This file is not allowed, please upload valid file.", "Message");
                  $('#success').hide();
      //alert("This file is not allowed, please upload valid file.");
                
      return false;
      } else {
        return true;
      }
    }
    // file size validation
    function fileSizeValidate(file) {
        var FileSize = file.files[0].size/1024/1024;  //1024/1024; // in MB
        if (FileSize >2) {  /// 15 MB CHECK ALL FILE
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
                  $('#image').val('');
                  toastr["warning"]("File size exceeds 3 MB"+FileSize, "Message");
            //alert('File size exceeds 1 MB'+FileSize);
              $('#success').hide();
              
              // $('#zip_img').attr('src','');
          return false;
           // $(file).val(''); //for clearing with Jquery
        } else {
            //alert('File size '+FileSize);
              return true;
          }
       }
     // display img preview before upload.
    function showImg(fdata) {
            if (fdata.files && fdata.files[0])
             {
                var reader = new FileReader();
              reader.onload = function (e) 
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
                  toastr["success"]("Image Upload Success", "Message");
                  // $('#zip_img').attr('src', e.target.result);
                  $('#success').show();
                }
                reader.readAsDataURL(fdata.files[0]);
            }
        }

     });
</script>