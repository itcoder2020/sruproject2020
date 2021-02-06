$(function() {
    $('#perfile1').dmUploader({ //
       url: 'api/upload_file',
       maxFileSize: 50000000, // 50 Megs 
       onNewFile: function(id, file) {
          $('#perfile1').data('dmUploader').settings.extraData = {
             performance_id:$("#file1_1").attr("id-file")
        };
       },
       onBeforeUpload: function(id) {
        
          $('#perfile1').data('dmUploader').settings.extraData = {
             performance_id:$("#file1_1").attr("id-file")
        };
       },
       onUploadSuccess: function(id, data) {
         toastr["success"](data.message)
         setTimeout(function () {

            window.location = "rate"
    
        }, 3000);
       },
       onUploadError: function(id, xhr, status, message) {
         toastr["error"](xhr.responseJSON.message)
       },
       onFileSizeError: function(file) {
          
          toastr["warning"]("อัพโหลดไฟล์เกินขนาด 50 mb")
       }
    });

    $('#perfile2').dmUploader({ //
      url: 'api/upload_file',
      maxFileSize: 50000000, // 50 Megs 
      onNewFile: function(id, file) {
         $('#perfile2').data('dmUploader').settings.extraData = {
            performance_id:$("#file2_1").attr("id-file")
       };
      },
      onBeforeUpload: function(id) {
       
         $('#perfile2').data('dmUploader').settings.extraData = {
            performance_id:$("#file2_1").attr("id-file")
       };
      },
      onUploadSuccess: function(id, data) {
        toastr["success"](data.message)
        setTimeout(function () {

           window.location = "rate"
   
       }, 3000);
      },
      onUploadError: function(id, xhr, status, message) {
        toastr["error"](xhr.responseJSON.message)
      },
      onFileSizeError: function(file) {
         
         toastr["warning"]("อัพโหลดไฟล์เกินขนาด 50 mb")
      }
   });

   $('#perfile3').dmUploader({ //
      url: 'api/upload_file',
      maxFileSize: 50000000, // 50 Megs 
      onNewFile: function(id, file) {
         $('#perfile3').data('dmUploader').settings.extraData = {
            performance_id:$("#file2_2").attr("id-file")
       };
      },
      onBeforeUpload: function(id) {
       
         $('#perfile3').data('dmUploader').settings.extraData = {
            performance_id:$("#file2_2").attr("id-file")
       };
      },
      onUploadSuccess: function(id, data) {
        toastr["success"](data.message)
        setTimeout(function () {

           window.location = "rate"
   
       }, 3000);
      },
      onUploadError: function(id, xhr, status, message) {
        toastr["error"](xhr.responseJSON.message)
      },
      onFileSizeError: function(file) {
         
         toastr["warning"]("อัพโหลดไฟล์เกินขนาด 50 mb")
      }
   });

   $('#perfile4').dmUploader({ //
      url: 'api/upload_file',
      maxFileSize: 50000000, // 50 Megs 
      onNewFile: function(id, file) {
         $('#perfile4').data('dmUploader').settings.extraData = {
            performance_id:$("#file2_3").attr("id-file")
       };
      },
      onBeforeUpload: function(id) {
       
         $('#perfile4').data('dmUploader').settings.extraData = {
            performance_id:$("#file2_3").attr("id-file")
       };
      },
      onUploadSuccess: function(id, data) {
        toastr["success"](data.message)
        setTimeout(function () {

           window.location = "rate"
   
       }, 3000);
      },
      onUploadError: function(id, xhr, status, message) {
        toastr["error"](xhr.responseJSON.message)
      },
      onFileSizeError: function(file) {
         
         toastr["warning"]("อัพโหลดไฟล์เกินขนาด 50 mb")
      }
   });

   $('#perfile5').dmUploader({ //
      url: 'api/upload_file',
      maxFileSize: 50000000, // 50 Megs 
      onNewFile: function(id, file) {
         $('#perfile5').data('dmUploader').settings.extraData = {
            performance_id:$("#file2_4").attr("id-file")
       };
      },
      onBeforeUpload: function(id) {
       
         $('#perfile5').data('dmUploader').settings.extraData = {
            performance_id:$("#file2_4").attr("id-file")
       };
      },
      onUploadSuccess: function(id, data) {
        toastr["success"](data.message)
        setTimeout(function () {

           window.location = "rate"
   
       }, 3000);
      },
      onUploadError: function(id, xhr, status, message) {
        toastr["error"](xhr.responseJSON.message)
      },
      onFileSizeError: function(file) {
         
         toastr["warning"]("อัพโหลดไฟล์เกินขนาด 50 mb")
      }
   });


   $('#perfile6').dmUploader({ //
      url: 'api/upload_file',
      maxFileSize: 50000000, // 50 Megs 
      onNewFile: function(id, file) {
         $('#perfile6').data('dmUploader').settings.extraData = {
            performance_id:$("#file3_1").attr("id-file")
       };
      },
      onBeforeUpload: function(id) {
       
         $('#perfile6').data('dmUploader').settings.extraData = {
            performance_id:$("#file3_1").attr("id-file")
       };
      },
      onUploadSuccess: function(id, data) {
        toastr["success"](data.message)
        setTimeout(function () {

           window.location = "rate"
   
       }, 3000);
      },
      onUploadError: function(id, xhr, status, message) {
        toastr["error"](xhr.responseJSON.message)
      },
      onFileSizeError: function(file) {
         
         toastr["warning"]("อัพโหลดไฟล์เกินขนาด 50 mb")
      }
   });

   $('#perfile7').dmUploader({ //
      url: 'api/upload_file',
      maxFileSize: 50000000, // 50 Megs 
      onNewFile: function(id, file) {
         $('#perfile7').data('dmUploader').settings.extraData = {
            performance_id:$("#file3_2").attr("id-file")
       };
      },
      onBeforeUpload: function(id) {
       
         $('#perfile7').data('dmUploader').settings.extraData = {
            performance_id:$("#file3_2").attr("id-file")
       };
      },
      onUploadSuccess: function(id, data) {
        toastr["success"](data.message)
        setTimeout(function () {

           window.location = "rate"
   
       }, 3000);
      },
      onUploadError: function(id, xhr, status, message) {
        toastr["error"](xhr.responseJSON.message)
      },
      onFileSizeError: function(file) {
         
         toastr["warning"]("อัพโหลดไฟล์เกินขนาด 50 mb")
      }
   });
   $('#perfile8').dmUploader({ //
      url: 'api/upload_file',
      maxFileSize: 50000000, // 50 Megs 
      onNewFile: function(id, file) {
         $('#perfile8').data('dmUploader').settings.extraData = {
            performance_id:$("#file3_3").attr("id-file")
       };
      },
      onBeforeUpload: function(id) {
       
         $('#perfile8').data('dmUploader').settings.extraData = {
            performance_id:$("#file3_3").attr("id-file")
       };
      },
      onUploadSuccess: function(id, data) {
        toastr["success"](data.message)
        setTimeout(function () {

           window.location = "rate"
   
       }, 3000);
      },
      onUploadError: function(id, xhr, status, message) {
        toastr["error"](xhr.responseJSON.message)
      },
      onFileSizeError: function(file) {
         
         toastr["warning"]("อัพโหลดไฟล์เกินขนาด 50 mb")
      }
   });
   $('#perfile9').dmUploader({ //
      url: 'api/upload_file',
      maxFileSize: 50000000, // 50 Megs 
      onNewFile: function(id, file) {
         $('#perfile9').data('dmUploader').settings.extraData = {
            performance_id:$("#file4_1").attr("id-file")
       };
      },
      onBeforeUpload: function(id) {
       
         $('#perfile9').data('dmUploader').settings.extraData = {
            performance_id:$("#file4_1").attr("id-file")
       };
      },
      onUploadSuccess: function(id, data) {
        toastr["success"](data.message)
        setTimeout(function () {

           window.location = "rate"
   
       }, 3000);
      },
      onUploadError: function(id, xhr, status, message) {
        toastr["error"](xhr.responseJSON.message)
      },
      onFileSizeError: function(file) {
         
         toastr["warning"]("อัพโหลดไฟล์เกินขนาด 50 mb")
      }
   });

   $('#perfile10').dmUploader({ //
      url: 'api/upload_file',
      maxFileSize: 50000000, // 50 Megs 
      onNewFile: function(id, file) {
         $('#perfile10').data('dmUploader').settings.extraData = {
            performance_id:$("#file5_1").attr("id-file")
       };
      },
      onBeforeUpload: function(id) {
       
         $('#perfile10').data('dmUploader').settings.extraData = {
            performance_id:$("#file5_1").attr("id-file")
       };
      },
      onUploadSuccess: function(id, data) {
        toastr["success"](data.message)
        setTimeout(function () {

           window.location = "rate"
   
       }, 3000);
      },
      onUploadError: function(id, xhr, status, message) {
        toastr["error"](xhr.responseJSON.message)
      },
      onFileSizeError: function(file) {
         
         toastr["warning"]("อัพโหลดไฟล์เกินขนาด 50 mb")
      }
   });

   $('#perfile11').dmUploader({ //
      url: 'api/upload_file',
      maxFileSize: 50000000, // 50 Megs 
      onNewFile: function(id, file) {
         $('#perfile11').data('dmUploader').settings.extraData = {
            performance_id:$("#file6_1").attr("id-file")
       };
      },
      onBeforeUpload: function(id) {
       
         $('#perfile11').data('dmUploader').settings.extraData = {
            performance_id:$("#file6_1").attr("id-file")
       };
      },
      onUploadSuccess: function(id, data) {
        toastr["success"](data.message)
        setTimeout(function () {

           window.location = "rate"
   
       }, 3000);
      },
      onUploadError: function(id, xhr, status, message) {
        toastr["error"](xhr.responseJSON.message)
      },
      onFileSizeError: function(file) {
         
         toastr["warning"]("อัพโหลดไฟล์เกินขนาด 50 mb")
      }
   });
   $('#workload_file').dmUploader({ //
      url: 'api/upload_workload',
      maxFileSize: 50000000, // 50 Megs 
      onNewFile: function(id, file) {
         
      },
      onBeforeUpload: function(id) {
       
        
      },
      onUploadSuccess: function(id, data) {
        toastr["success"](data.message)
        setTimeout(function () {

           window.location = "rate"
   
       }, 3000);
      },
      onUploadError: function(id, xhr, status, message) {
        toastr["error"](xhr.responseJSON.message)
      },
      onFileSizeError: function(file) {
         
         toastr["warning"]("อัพโหลดไฟล์เกินขนาด 50 mb")
      }
   });
 });
 