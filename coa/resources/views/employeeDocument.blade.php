<!DOCTYPE html>
<html>
<head>
<title>Document Uploading</title>

<!-- Meta -->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Bootstrap CDN -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

 
<!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
 -->
  <!-- Script -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>


<style type="text/css">
.displaynone{
display: none;
}

</style>
</head>
<body>

  <div id="documentcontainer" class="container">

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
          <label class="" for="name">File    <span class="required">*</span></label>
        </div>
         <div class="col-md-4"> Passport : </div>
             <div class="col-md-3">
                 <input type='file' id="passportFile" name='passportFile' class="">
             <!-- Error -->
              <div class='alert alert-danger mt-2 d-none text-danger' id="err_file"></div>
         </div>
    
        <div class="form-group">
            <div class="col-md-2">
            <input type="button" id="passportSubmit" value='Upload' class='btn btn-success'>
            </div>
        </div>
      </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
         <!-- Form -->
        <div class="col-md-4"> BRP : </div>
            <div class="col-md-3">
              <input type='file' id="brpFile" name='brpFile' class="">
              <!-- Error -->
              <div class='alert alert-danger mt-2 d-none text-danger' id="err_file"></div>
            </div>
        <div class="form-group">
           <div class="col-md-2">
              <input type="button" id="brpSubmit" value='Upload' class='btn btn-success'>
           </div>
        </div>
      </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
         <!-- Form -->
        <div class="col-md-4"> DBS : </div>
            <div class="col-md-3">
              <input type='file' id="dbsFile" name='dbsFile' class="">
              <!-- Error -->
              <div class='alert alert-danger mt-2 d-none text-danger' id="err_file"></div>
            </div>
        <div class="form-group">
           <div class="col-md-2">
              <input type="button" id="dbsSubmit" value='Upload' class='btn btn-success'>
           </div>
        </div>
      </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
         <!-- Form -->
        <div class="col-md-4"> Training Certificate : </div>
            <div class="col-md-3">
              <input type='file' id="trainingFile" name='trainingFile' class="">
              <!-- Error -->
              <div class='alert alert-danger mt-2 d-none text-danger' id="err_file"></div>
            </div>
        <div class="form-group">
           <div class="col-md-2">
              <input type="button" id="trainingSubmit" value='Upload' class='btn btn-success'>
           </div>
        </div>
      </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
         <!-- Form -->
        <div class="col-md-4"> Right to Work : </div>
            <div class="col-md-3">
              <input type='file' id="rightFile" name='rightFile' class="">
              <!-- Error -->
              <div class='alert alert-danger mt-2 d-none text-danger' id="err_file"></div>
            </div>
        <div class="form-group">
           <div class="col-md-2">
              <input type="button" id="rightSubmit" value='Upload' class='btn btn-success'>
           </div>
        </div>
      </div>
    </div>

    <div class="row">
			<div class="col-md-12">
				<div class="col-md-6">
				</div>
				<div class="col-md-3">
                <input type="submit" id="documentSubmit" value='Confirm' onclick="submitDocument()" class='submit-action'>
				</div>
		</div>
  </div>

  </div>
    <div  id="documentInfo" >
            
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
  function submitDocument(){
    jQuery.ajax({  
      url: "{{route('document.status')}}",
        type: 'get', 
          success: function(data) {  
            document.getElementById('documentInfo').style.display = "block";
            document.getElementById('documentcontainer').style.display = "none";
            document.getElementById("documentInfo").innerHTML = data['result'];
            console.log(document.getElementById('documentInfo').style.display)                }  
        }); 
  }
  </script>

</body>
</html>