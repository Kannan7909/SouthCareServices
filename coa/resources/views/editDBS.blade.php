<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from coderthemes.com/hyper/saas/pages-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 12 Aug 2022 09:06:26 GMT -->
<head>
        <meta charset="utf-8" />
        <title>Edit DBS</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="images/images-theme/favicon.ico">

        <!-- App css -->
        <link href="css/css-theme/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="css/css-theme/app.min.css" rel="stylesheet" type="text/css" id="app-style"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    </head>

    <body class="loading" data-layout-color="light" data-leftbar-theme="dark" data-layout-mode="fluid" data-rightbar-onstart="true">
        <!-- Begin page -->
        <div class="wrapper">
            <!-- ========== Left Sidebar Start ========== -->
            @if( $employee->employee_contract == "Pending" )
                @include('navigationMenu')
            @else
                @include('navigationMenuContract')
            @endif
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">
                    <!-- Topbar Start -->
                   @include('topBar')
                    <!-- end Topbar -->

                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                    <!-- start page title -->
                    <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    
                                    <h4 class="page-title">Edit DBS</h4>
                                    <input class="form-control  mb-3 required-personal" type="hidden" id="loggedId" name="loggedId"  value="{{ $employee->id }}" autocomplete=off> 

                                </div>
                            </div>
                        </div>
                        <!-- end page title --> 
                       
                        <div class="row">
                            <div class="col-xl-12">
                                <!-- training-Information -->
                                <div class="card">
                                    <div class="card-body">
                                    
                                    <form method="POST" action="{{ route('update.dbs') }}" class="dbs-request-form" id="dbs-request-form">
                                         @csrf

                                       <!--  <div class="row">   
                                            <div class="col-md-4 mb-3">
                                                <label for="criminal_offence" class="form-label">Do you have a current DBS certificate and update service</label>
                                            </div>
                                            <div class="col-md-2 mb-3">
                                                <select name="dbs" id="dbs" class="form-control select2 form-select required-dbs" required>
                                                    <option value="" disabled selected hidden>Choose One</option>
                                                    <option value="yes">Yes</option>
                                                    <option value="no">No</option>
                                                </select>
                                            </div>
                                        </div> -->

                                         <div style='display:none;' id='is_no'>
<!--                                             <div>You will need to get an application form from us for your DBS check. We will contact you soon. Please click on the below button.</div>
 -->                                            We will contact you to organise your DBS check. Please get in touch with us if you do not hear within 3 working days.<br/>&nbsp;
                                            <!-- <div class="row">
                                                <div class="col-md-5 mb-3" style="width: 38%">
                                                </div>
                                                <div class="col-md-2 mb-0 d-grid text-center">
                                                    <button class="btn btn-primary" type="submit">Request DBS </button>
                                                </div>
                                            </div> -->
                                                                                   
                                        </div>

                                        <div style='display:none;' id='is_yes'>
<!--                                         <hr>
 -->                                        Kindly upload the certificates you have, we can help you arrange training for the missing certificates.<br/>&nbsp;    
                                    
                                    <!--     <form method="POST" action="{{ route('save.dbs') }}" class="dbs-form" id="dbs-form">
                                    @csrf -->
                                        <div class="row">
                                                <!-- <div class="col-md-6 mb-3">
                                                    <small id="" class="info-msg form-text text-muted"><i class="fa fa-lightbulb-o" style="font-size:24px"></i><b>Please click on the corresponding Upload button once the file is selected.</b></small>
                                                </div> -->
                                            </div>
                                            <div class="alert displaynone" id="responseMsg" style="display:none"></div>
                                            <div class="row">
                                                 <div class="col-md-1 mb-3" style="width: 12.499999995%">
                                                 <br/><br/>
                                                    <label for="dbsFile" class="form-label">DBS Certificate</label>
                                                </div>  
                                                @if(count($dbsExpiry) == 0)                                                   
                                                <div class="col-md-3 mb-3">
                                                     <label for="dbs" class="form-label">DBS Certificate Expiry Date</label>
                                                    <input type="date" class="form-control date" id="dbs_expiry_date" name="dbs_expiry_date">
                                                </div>
                                                @else
                                                <div class="col-md-3 mb-3">
                                                     <label for="dbs" class="form-label">DBS Certificate Expiry Date</label>
                                                    <input type="date" class="form-control date" id="dbs_expiry_date" name="dbs_expiry_date" value="{{ $dbsExpiry[0]->expiry_date }}">
                                                </div>
                                                @endif
                                                <div class="col-md-3 mb-3">
                                                <label for="dbsFile" class="form-label">Choose File</label>
                                                    <input class="form-control required-dbs" type="file" id="dbsFile" name="dbsFile" onchange="dbsSubmit()">
                                                </div>

                                              
                                               <!--  <div class="col-md-1 mb-3">
                                                    <input class="btn btn-primary" type="button" id="dbsSubmit" name="dbsSubmit" value='Upload' required>
                                                </div> -->
                                            </div>

                                            <div class="row">
                                                <div class="col-md-1 mb-3" style="width: 12.499999995%">
                                                    <label for="updateFile" class="form-label">Update Service</label>
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                    <input class="form-control required-dbs" type="file" id="updateFile" name="updateFile" onchange="updateService()">
                                                </div>
                                             
                                                <!-- <div class="col-md-3 mb-3">
                                                    <input class="btn btn-primary" type="button" id="updateService" name="updateService" value='Upload' >
                                                </div> -->
                                            </div>

                                            <div class="row">
                                                <div class="col-md-1 mb-3" style="width: 12.499999995%">
                                                    <label for="dbsNumber" class="form-label">DBS Number</label>
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                     <input class="form-control required-dbs" type="text" id="dbsNumber" name="dbsNumber" placeholder="Enter DBS Number" value="{{ $dbs->dbsNumber }}" required>
                                                </div>
                                            </div>
                                            </div> 
                                            <div class="row">
                                                <div class="col-md-5 mb-3" style="width: 38%">
                                                </div>
                                                <div class="col-md-2 mb-0 d-grid text-center">
                                                    <button class="btn btn-primary" type="submit" id="submit"> </button>
                                                </div>
                                            </div>
                                        </form> 
                                    
                                    </div>
                                </div>
                                <!-- training-Information -->


                                <!-- Messages-->
                              

                            </div> <!-- end col-->



                        </div>
                        <!-- end row -->
                        
                    </div> <!-- container -->

                </div> <!-- content -->

                <!-- Footer Start -->
                
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->


        <!-- Right Sidebar -->
      

       <!-- /End-bar -->


        <!-- bundle -->
        <script src="js/js-theme/vendor.min.js"></script>
        <script src="js/js-theme/app.min.js"></script>

        <!-- third party js -->
        <script src="js/js-theme/vendor/chart.min.js"></script>
        <!-- third party js ends -->

        <!-- demo app -->
        <script src="js/js-theme/pages/demo.profile.js"></script>
        <!-- end demo js-->
    </body>

</html>

<script>
          var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute("content");

    $(document).ready(function(){
        $("#submit").show();
        $("#is_yes").show();
        $("#submit").text("Update");
    });
$('#dbs').on('change', function () {
    // if (this.value == '1'); { No semicolon and I used === instead of ==

    if (this.value === 'yes'){
        $("#is_yes").show();
        $("#is_no").hide();
       // $("input").prop('required',true);
        $("#submit").show();
        $("#submit").text("Submit");
    } else {
        $("#is_yes").hide();
        $("#is_no").show();
        document.getElementById("is_no").style.color = "red";
        $("#submit").show();
        $("input").prop('required',false);
        $("#submit").text("Request DBS");
    }
});

//$('#dbsSubmit').click(function(){
  function dbsSubmit(){
    var employeeId= $("#loggedId").val()
    var dbs_expiry_date= $("#dbs_expiry_date").val()

   // Get the selected file
   var files = $('#dbsFile')[0].files;
   console.log(files);

   if(files.length > 0){
      var fd = new FormData();

      // Append data 
      fd.append('file',files[0]);
      fd.append('_token',CSRF_TOKEN);
      fd.append('file_type','DBS');
      fd.append('file_type_additional','DBS');
      fd.append('employeeId',employeeId);
      fd.append('expiry_date',dbs_expiry_date);


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
  }
 //});

 //$('#updateService').click(function(){
   function updateService(){
    var employeeId= $("#loggedId").val()
   // Get the selected file
   var files = $('#updateFile')[0].files;
   console.log(files);

   if(files.length > 0){
      var fd = new FormData();

      // Append data 
      fd.append('file',files[0]);
      fd.append('_token',CSRF_TOKEN);
      fd.append('file_type','UpdateFile');
      fd.append('file_type_additional','UpdateFile');
      fd.append('employeeId',employeeId);

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
   }
 //});

</script>