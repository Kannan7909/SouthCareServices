<!DOCTYPE html>
<html>
<head>
<title>How to upload a file using jQuery AJAX in Laravel 8</title>

<!-- Meta -->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta name="csrf-token" content="{{ csrf_token() }}">

<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<style type="text/css">
.displaynone{
display: none;
}
.file{
	width: 220px !important;
    height: 60px !important;
    margin-left: -10px !important;
}
.dbs-file{
    margin-top: 29px;
    margin-left: -152px !important; 
  }
.training-file{
    margin-top: -40px !important; 
    margin-left: -6px !important; 
  }
  .right-file{
    margin-top: -40px !important; 
    margin-left: 10px !important; 
  }
.upload{
     margin-top: -113px !important;
     margin-left: 400px !important; 
	 background-color: orange !important;
   /* margin-left: 54px!important;
    height: 25px !important;
    padding-top: 3px !important; */
}
.brp-upload{
     margin-top: -113px !important;
     margin-left: 417px !important; 
	   background-color: orange !important;
}
.training-upload{
     margin-top: -113px !important;
     margin-left: 417px !important; 
	   background-color: orange !important;
}
.file-upload{
    margin-left: 160px !important;
	/* background-color: orange !important;
    margin-left: 54px!important;
    height: 25px !important;
    padding-top: 3px !important; */
}
.passport{
    margin-left: -490px;
    margin-bottom: -35px;
    margin-top: 10px;
}
.brp{
    margin-left: -458px !important;
    margin-bottom: -35px;
    margin-top: 10px;
}
.dbs{
    margin-left: -430px;
    margin-bottom: -35px;
    margin-top: 45px;
}
.training{
    margin-left: -560px;
}
.right{
    margin-left: -530px;
}
</style>
</head>
<body>

  <div class="container">

    <div class="row">

      <div class="col-md-12 col-sm-12 col-xs-12">

        <!-- Response message -->
        <div class="alert displaynone" id="responseMsg"></div>

        <!-- File preview --> 
        <div id="filepreview" class="displaynone" > 
          <img src="" class="displaynone" with="200px" height="200px"><br>

         <a href="#" class="displaynone" >Click Here..</a> 
        </div> 

        <!-- Form -->
        <div class="form-group">
           <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">File    <span class="required">*</span></label>
           <div class="passport"> Passport : </div>
           <div class="col-md-6 col-sm-6 col-xs-12 file-upload">

             <input type='file' id="passportFile" name='passportFile' class="form-control file">

              <!-- Error -->
              <div class='alert alert-danger mt-2 d-none text-danger' id="err_file"></div>

           </div>
        </div>

        <div class="form-group">
           <div class="col-md-6">
              <input type="button" id="passportSubmit" value='Upload' class='btn btn-success upload'>
           </div>
        </div>
      
        <div class="brp"> BRP : </div>
           <div class="col-md-6 col-sm-6 col-xs-12 file-upload">

             <input type='file' id="brpFile" name='brpFile' class="form-control file">

              <!-- Error -->
              <div class='alert alert-danger mt-2 d-none text-danger' id="err_file"></div>

           </div>
        </div>

        <div class="form-group">
           <div class="col-md-6">
              <input type="button" id="brpSubmit" value='Upload' class='btn btn-success upload brp-upload'>
           </div>
        </div>

        <div class="dbs"> DBS : </div>
           <div class="col-md-6 col-sm-6 col-xs-12 file-upload">

             <input type='file' id="dbsFile" name='dbsFile' class="form-control file dbs-file">

              <!-- Error -->
              <div class='alert alert-danger mt-2 d-none text-danger' id="err_file"></div>

           </div>
        </div>

        <div class="form-group">
           <div class="col-md-6">
              <input type="button" id="dbsSubmit" value='Upload' class='btn btn-success upload'>
           </div>
        </div>


        <div class="training"> Training Certificate : </div>
           <div class="col-md-6 col-sm-6 col-xs-12 file-upload">

             <input type='file' id="trainingFile" name='trainingFile' class="form-control file training-file">

              <!-- Error -->
              <div class='alert alert-danger mt-2 d-none text-danger' id="err_file"></div>

           </div>
        </div>

        <div class="form-group">
           <div class="col-md-6">
              <input type="button" id="trainingSubmit" value='Upload' class='btn btn-success upload training-upload'>
           </div>
        </div>

        <div class="right"> Right to Work : </div>
           <div class="col-md-6 col-sm-6 col-xs-12 file-upload">

             <input type='file' id="rightFile" name='rightFile' class="form-control file right-file">

              <!-- Error -->
              <div class='alert alert-danger mt-2 d-none text-danger' id="err_file"></div>

           </div>
        </div>

        <div class="form-group">
           <div class="col-md-6">
              <input type="button" id="rightSubmit" value='Upload' class='btn btn-success upload training-upload'>
           </div>
        </div>

      </div>
    </div>
  </div>

  <!-- Script -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>

  <script type="text/javascript">
  var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute("content");

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
  </script>

</body>
</html>