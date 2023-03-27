
$(document).ready(function(){

  $('#passportSubmit').click(function(){
 
    // Get the selected file
    var files = $('#passportFile')[0].files;
    console.log(files);

    if(files.length > 0){
       var fd = new FormData();

       // Append data 
       fd.append('file',files[0]);
       fd.append('_token',CSRF_TOKEN);

       // Hide alert 
       $('#responseMsg').hide();

       // AJAX request 
       $.ajax({
         url: "{{route('file.upload')}}",
         method: 'post',
         data: fd,
         contentType: false,
         processData: false,
         dataType: 'json',
         success: function(response){

           // Hide error container
           $('#err_file').removeClass('d-block');
           $('#err_file').addClass('d-none');

           if(response.success == 1){ // Uploaded successfully

             // Response message
             $('#responseMsg').removeClass("alert-danger");
             $('#responseMsg').addClass("alert-success");
             $('#responseMsg').html(response.message);
             $('#responseMsg').show();

             // File preview
             $('#filepreview').show();
             $('#filepreview img,#filepreview a').hide();
             if(response.extension == 'jpg' || response.extension == 'jpeg' || response.extension == 'png'){

                $('#filepreview img').attr('src',response.filepath);
                $('#filepreview img').show();
             }else{
                $('#filepreview a').attr('href',response.filepath).show();
                $('#filepreview a').show();
             }
           }else if(response.success == 2){ // File not uploaded

             // Response message
             $('#responseMsg').removeClass("alert-success");
             $('#responseMsg').addClass("alert-danger");
             $('#responseMsg').html(response.message);
             $('#responseMsg').show();
           }else{
             // Display Error
             $('#err_file').text(response.error);
             $('#err_file').removeClass('d-none');
             $('#err_file').addClass('d-block');
           } 
         },
         error: function(response){
            console.log("error : " + JSON.stringify(response) );
         }
       });
    }else{
       alert("Please select a file.");
    }

  });

  $('#brpSubmit').click(function(){
 
 // Get the selected file
 var files = $('#brpFile')[0].files;
 console.log(files);

 if(files.length > 0){
    var fd = new FormData();

    // Append data 
    fd.append('file',files[0]);
    fd.append('_token',CSRF_TOKEN);

    // Hide alert 
    $('#responseMsg').hide();

    // AJAX request 
    $.ajax({
      url: "{{route('file.upload')}}",
      method: 'post',
      data: fd,
      contentType: false,
      processData: false,
      dataType: 'json',
      success: function(response){

        // Hide error container
        $('#err_file').removeClass('d-block');
        $('#err_file').addClass('d-none');

        if(response.success == 1){ // Uploaded successfully

          // Response message
          $('#responseMsg').removeClass("alert-danger");
          $('#responseMsg').addClass("alert-success");
          $('#responseMsg').html(response.message);
          $('#responseMsg').show();

          // File preview
          $('#filepreview').show();
          $('#filepreview img,#filepreview a').hide();
          if(response.extension == 'jpg' || response.extension == 'jpeg' || response.extension == 'png'){

             $('#filepreview img').attr('src',response.filepath);
             $('#filepreview img').show();
          }else{
             $('#filepreview a').attr('href',response.filepath).show();
             $('#filepreview a').show();
          }
        }else if(response.success == 2){ // File not uploaded

          // Response message
          $('#responseMsg').removeClass("alert-success");
          $('#responseMsg').addClass("alert-danger");
          $('#responseMsg').html(response.message);
          $('#responseMsg').show();
        }else{
          // Display Error
          $('#err_file').text(response.error);
          $('#err_file').removeClass('d-none');
          $('#err_file').addClass('d-block');
        } 
      },
      error: function(response){
         console.log("error : " + JSON.stringify(response) );
      }
    });
 }else{
    alert("Please select a file.");
 }

});

$('#dbsSubmit').click(function(){
 
 // Get the selected file
 var files = $('#dbsFile')[0].files;
 console.log(files);

 if(files.length > 0){
    var fd = new FormData();

    // Append data 
    fd.append('file',files[0]);
    fd.append('_token',CSRF_TOKEN);

    // Hide alert 
    $('#responseMsg').hide();

    // AJAX request 
    $.ajax({
      url: "{{route('file.upload')}}",
      method: 'post',
      data: fd,
      contentType: false,
      processData: false,
      dataType: 'json',
      success: function(response){

        // Hide error container
        $('#err_file').removeClass('d-block');
        $('#err_file').addClass('d-none');

        if(response.success == 1){ // Uploaded successfully

          // Response message
          $('#responseMsg').removeClass("alert-danger");
          $('#responseMsg').addClass("alert-success");
          $('#responseMsg').html(response.message);
          $('#responseMsg').show();

          // File preview
          $('#filepreview').show();
          $('#filepreview img,#filepreview a').hide();
          if(response.extension == 'jpg' || response.extension == 'jpeg' || response.extension == 'png'){

             $('#filepreview img').attr('src',response.filepath);
             $('#filepreview img').show();
          }else{
             $('#filepreview a').attr('href',response.filepath).show();
             $('#filepreview a').show();
          }
        }else if(response.success == 2){ // File not uploaded

          // Response message
          $('#responseMsg').removeClass("alert-success");
          $('#responseMsg').addClass("alert-danger");
          $('#responseMsg').html(response.message);
          $('#responseMsg').show();
        }else{
          // Display Error
          $('#err_file').text(response.error);
          $('#err_file').removeClass('d-none');
          $('#err_file').addClass('d-block');
        } 
      },
      error: function(response){
         console.log("error : " + JSON.stringify(response) );
      }
    });
 }else{
    alert("Please select a file.");
 }

});

$('#trainingSubmit').click(function(){
 
 // Get the selected file
 var files = $('#trainingFile')[0].files;
 console.log(files);

 if(files.length > 0){
    var fd = new FormData();

    // Append data 
    fd.append('file',files[0]);
    fd.append('_token',CSRF_TOKEN);

    // Hide alert 
    $('#responseMsg').hide();

    // AJAX request 
    $.ajax({
      url: "{{route('file.upload')}}",
      method: 'post',
      data: fd,
      contentType: false,
      processData: false,
      dataType: 'json',
      success: function(response){

        // Hide error container
        $('#err_file').removeClass('d-block');
        $('#err_file').addClass('d-none');

        if(response.success == 1){ // Uploaded successfully

          // Response message
          $('#responseMsg').removeClass("alert-danger");
          $('#responseMsg').addClass("alert-success");
          $('#responseMsg').html(response.message);
          $('#responseMsg').show();

          // File preview
          $('#filepreview').show();
          $('#filepreview img,#filepreview a').hide();
          if(response.extension == 'jpg' || response.extension == 'jpeg' || response.extension == 'png'){

             $('#filepreview img').attr('src',response.filepath);
             $('#filepreview img').show();
          }else{
             $('#filepreview a').attr('href',response.filepath).show();
             $('#filepreview a').show();
          }
        }else if(response.success == 2){ // File not uploaded

          // Response message
          $('#responseMsg').removeClass("alert-success");
          $('#responseMsg').addClass("alert-danger");
          $('#responseMsg').html(response.message);
          $('#responseMsg').show();
        }else{
          // Display Error
          $('#err_file').text(response.error);
          $('#err_file').removeClass('d-none');
          $('#err_file').addClass('d-block');
        } 
      },
      error: function(response){
         console.log("error : " + JSON.stringify(response) );
      }
    });
 }else{
    alert("Please select a file.");
 }

});

$('#rightSubmit').click(function(){
 
 // Get the selected file
 var files = $('#rightFile')[0].files;
 console.log(files);

 if(files.length > 0){
    var fd = new FormData();

    // Append data 
    fd.append('file',files[0]);
    fd.append('_token',CSRF_TOKEN);

    // Hide alert 
    $('#responseMsg').hide();

    // AJAX request 
    $.ajax({
      url: "{{route('file.upload')}}",
      method: 'post',
      data: fd,
      contentType: false,
      processData: false,
      dataType: 'json',
      success: function(response){

        // Hide error container
        $('#err_file').removeClass('d-block');
        $('#err_file').addClass('d-none');

        if(response.success == 1){ // Uploaded successfully

          // Response message
          $('#responseMsg').removeClass("alert-danger");
          $('#responseMsg').addClass("alert-success");
          $('#responseMsg').html(response.message);
          $('#responseMsg').show();

          // File preview
          $('#filepreview').show();
          $('#filepreview img,#filepreview a').hide();
          if(response.extension == 'jpg' || response.extension == 'jpeg' || response.extension == 'png'){

             $('#filepreview img').attr('src',response.filepath);
             $('#filepreview img').show();
          }else{
             $('#filepreview a').attr('href',response.filepath).show();
             $('#filepreview a').show();
          }
        }else if(response.success == 2){ // File not uploaded

          // Response message
          $('#responseMsg').removeClass("alert-success");
          $('#responseMsg').addClass("alert-danger");
          $('#responseMsg').html(response.message);
          $('#responseMsg').show();
        }else{
          // Display Error
          $('#err_file').text(response.error);
          $('#err_file').removeClass('d-none');
          $('#err_file').addClass('d-block');
        } 
      },
      error: function(response){
         console.log("error : " + JSON.stringify(response) );
      }
    });
 }else{
    alert("Please select a file.");
 }

});

});