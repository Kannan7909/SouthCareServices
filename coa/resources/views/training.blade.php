
<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from coderthemes.com/hyper/saas/pages-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 12 Aug 2022 09:06:26 GMT -->
<head>
        <meta charset="utf-8" />
        <title>Training Check</title>
<!--         <meta name="viewport" content="width=device-width, initial-scale=1.0">
 -->    <meta name="csrf-token" content="{{ csrf_token() }}">   
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
            @if( $employee->employee_contract == "Pending" )
                @include('navigationMenu')
            @else
                @include('navigationMenuContract')
            @endif
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
                                    
                                    <h4 class="page-title">Training Check</h4>
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
                                    <form method="POST" action="{{ route('save.training') }}" class="training-form" id="training-form">
                                    @csrf
                                        <div class="row">   
                                            <div class="col-md-4 mb-3">
                                                <label for="criminal_offence" class="form-label">Do you have a Mandatory Training Certificate:</label>
                                            </div>
                                            <div class="col-md-2 mb-3">
                                                <select name="training" id="training" class="form-control select2 form-select required-dbs" autocomplete=off required>
                                                    <option value="" disabled selected hidden>Choose One</option>
                                                    <option value="yes">Yes</option>
                                                    <option value="no">No</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div style='display:none;' id='is_no'>
                                           <!--  You will need to get an application form from us for your Training. We will contact you soon. Please click on the below button. -->
                                            We will contact you to organise your training session. Please get in touch with us if you do not hear within 3 working days. Please click on the below button.<br/>&nbsp;
                                             <div class="row">
                                                <div class="col-md-5 mb-3" style="width: 38%">
                                                </div>
                                                <div class="col-md-2 mb-0 d-grid text-center">
                                                    <button class="btn btn-primary" type="submit">Request Training </button>
                                                </div>
                                            </div> 
                                                                                   
                                        </div>

                                        <div style='display:none;' id='is_yes'>
                                        <hr>
                                        Kindly upload the certificates you have, we can help you arrange training for the missing certificates.<br/>&nbsp;    
                                    
                                      
                                        <div class="row">
                                               <!--  <div class="col-md-6 mb-3">
                                                    <small id="" class="info-msg form-text text-muted"><i class="fa fa-lightbulb-o" style="font-size:24px"></i><b>Please click on the corresponding Upload button once the file is selected.</b></small>
                                                </div> -->
                                            </div>
                                            <div class="alert displaynone" id="responseMsg" style="display:none"></div>

                                            <div class="row">
                                                 <div class="col-md-3 mb-3">
                                                 <br/><br/>
                                                    <label for="movingFile" class="form-label">Moving and Handling</label>
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                     <label for="moving" class="form-label">Moving and Handling Expiry Date</label>
                                                    <input type="date" class="form-control date" id="movingFile_expiry_date" name="movingFile_expiry_date">
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                    <label for="movingFile" class="form-label">Choose File</label>
                                                    <input class="form-control required-training" type="file" id="movingFile" name="movingFile" onchange="movingSubmit()">
                                                </div>
                                                <!-- <div class="col-md-1 mb-3">
                                                    <input class="btn btn-primary" type="button" id="movingSubmit" name="movingSubmit" value='Upload' required>
                                                </div> -->
                                            </div>

                                            <div class="row">
                                                <div class="col-md-3 mb-3">
                                                <br/><br/>
                                                    <label for="safeguardingFile" class="form-label">Safeguarding Adults</label>
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                     <label for="safeguarding" class="form-label">Safeguarding Adults Expiry Date</label>
                                                    <input type="date" class="form-control date" id="safeguarding_expiry_date" name="safeguarding_expiry_date">
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                     <label for="safeguardingFile" class="form-label">Choose File</label>
                                                    <input class="form-control required-training" type="file" id="safeguardingFile" name="safeguardingFile" onchange="safeguarding()">
                                                </div>
                                                <!-- <div class="col-md-3 mb-3">
                                                    <input class="btn btn-primary" type="button" id="safeguarding" name="safeguarding" value='Upload' required>
                                                </div> -->
                                            </div>

                                            <div class="row">
                                                <div class="col-md-3 mb-3">
                                                <br/><br/>
                                                    <label for="healthFile" class="form-label">Health and Safety</label>
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                     <label for="health" class="form-label">Health and Safety Adults Expiry Date</label>
                                                    <input type="date" class="form-control date" id="health_expiry_date" name="health_expiry_date">
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                     <label for="healthFile" class="form-label">Choose File</label>
                                                    <input class="form-control required-training" type="file" id="healthFile" name="healthFile" onchange="healthSubmit()">
                                                </div>
                                               <!--  <div class="col-md-3 mb-3">
                                                    <input class="btn btn-primary" type="button" id="healthSubmit" name="healthSubmit" value='Upload' required>
                                                </div> -->
                                            </div>

                                            <div class="row">
                                                <div class="col-md-3 mb-3">
                                                <br/><br/>
                                                    <label for="foodFile" class="form-label">Food and Hygiene</label>
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                     <label for="food" class="form-label">Food and Hygiene Expiry Date</label>
                                                    <input type="date" class="form-control date" id="food_expiry_date" name="food_expiry_date">
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                    <label for="foodFile" class="form-label">Choose File</label>
                                                    <input class="form-control required-training" type="file" id="foodFile" name="foodFile" onchange="foodSubmit()">
                                                </div>
                                               <!--  <div class="col-md-3 mb-3">
                                                    <input class="btn btn-primary" type="button" id="foodSubmit" name="foodSubmit" value='Upload' required>
                                                </div> -->
                                            </div>

                                            <div class="row">
                                                <div class="col-md-3 mb-3">
                                                <br/><br/>
                                                    <label for="supportFile" class="form-label">First Aid/ Basic Life Support</label>
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                     <label for="support" class="form-label">First Aid/ Basic Life Support Expiry Date</label>
                                                    <input type="date" class="form-control date" id="support_expiry_date" name="support_expiry_date">
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                     <label for="supportFile" class="form-label">Choose File</label>
                                                    <input class="form-control required-training" type="file" id="supportFile" name="supportFile" onchange="supportSubmit()">
                                                </div>
                                               <!--  <div class="col-md-3 mb-3">
                                                    <input class="btn btn-primary" type="button" id="supportSubmit" name="supportSubmit" value='Upload' required>
                                                </div> -->
                                            </div>

                                            <div class="row">
                                                <div class="col-md-3 mb-3">
                                                <br/><br/>
                                                    <label for="coshhFile" class="form-label">COSHH</label>
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                     <label for="coshh" class="form-label">COSHH Expiry Date</label>
                                                    <input type="date" class="form-control date" id="coshh_expiry_date" name="coshh_expiry_date">
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                    <label for="coshhFile" class="form-label">Choose File</label>
                                                    <input class="form-control required-training" type="file" id="coshhFile" name="coshhFile" onchange="coshhSubmit()">
                                                </div>
                                                <!-- <div class="col-md-3 mb-3">
                                                    <input class="btn btn-primary" type="button" id="coshhSubmit" name="coshhSubmit" value='Upload' required>
                                                </div> -->
                                            </div>
                                          
                                            <div class="row">
                                                <div class="col-md-3 mb-3">
                                                <br/><br/>
                                                    <label for="safetyFile" class="form-label">Fire Safety</label>
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                     <label for="safety" class="form-label">Fire Safety Expiry Date</label>
                                                    <input type="date" class="form-control date" id="safety_expiry_date" name="safety_expiry_date">
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                <label for="safetyFile" class="form-label">Choose File</label>
                                                    <input class="form-control required-training" type="file" id="safetyFile" name="safetyFile" onchange="safetySubmit()">
                                                </div>
                                               <!--  <div class="col-md-3 mb-3">
                                                    <input class="btn btn-primary" type="button" id="safetySubmit" name="safetySubmit" value='Upload' required>
                                                </div> -->
                                            </div>

                                            <div class="row">
                                                <div class="col-md-3 mb-3">
                                                <br/><br/>
                                                    <label for="behaviourFile" class="form-label">Challenging Behavior</label>
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                     <label for="behaviour" class="form-label">Challenging Behavior Expiry Date</label>
                                                    <input type="date" class="form-control date" id="behaviour_expiry_date" name="behaviour_expiry_date">
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                <label for="behaviourFile" class="form-label">Choose File</label>
                                                    <input class="form-control required-training" type="file" id="behaviourFile" name="behaviourFile" onchange="behaviourSubmit()">
                                                </div>
                                               <!--  <div class="col-md-3 mb-3">
                                                    <input class="btn btn-primary" type="button" id="behaviourSubmit" name="behaviourSubmit" value='Upload' required>
                                                </div> -->
                                            </div>

                                            <div class="row">
                                                <div class="col-md-3 mb-3">
                                                <br/><br/>
                                                    <label for="epilepsyFile" class="form-label">Epilepsy</label>
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                     <label for="epilepsy" class="form-label">Epilepsy Expiry Date</label>
                                                    <input type="date" class="form-control date" id="epilepsy_expiry_date" name="epilepsy_expiry_date">
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                <label for="epilepsyFile" class="form-label">Choose File</label>
                                                    <input class="form-control required-training" type="file" id="epilepsyFile" name="epilepsyFile" onchange="epilepsySubmit()">
                                                </div>
                                                <!-- <div class="col-md-3 mb-3">
                                                    <input class="btn btn-primary" type="button" id="epilepsySubmit" name="epilepsySubmit" value='Upload' required>
                                                </div> -->
                                            </div>

                                            <div class="row">
                                                <div class="col-md-3 mb-3">
                                                <br/><br/>
                                                    <label for="demantiaFile" class="form-label">Dementia</label>
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                     <label for="demantia" class="form-label">Dementia Expiry Date</label>
                                                    <input type="date" class="form-control date" id="demantia_expiry_date" name="demantia_expiry_date">
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                <label for="demantiaFile" class="form-label">Choose File</label>
                                                    <input class="form-control required-training" type="file" id="demantiaFile" name="demantiaFile" onchange="demantiaSubmit()">
                                                </div>
                                                <!-- <div class="col-md-3 mb-3">
                                                    <input class="btn btn-primary" type="button" id="demantiaSubmit" name="demantiaSubmit" value='Upload' required>
                                                </div> -->
                                            </div>

                                            <div class="row">
                                                <div class="col-md-3 mb-3">
                                                <br/><br/>
                                                    <label for="actFile" class="form-label">Mental Capacity Act</label>
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                     <label for="act" class="form-label">Mental Capacity Act Expiry Date</label>
                                                    <input type="date" class="form-control date" id="act_expiry_date" name="act_expiry_date">
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                <label for="actFile" class="form-label">Choose File</label>
                                                    <input class="form-control required-training" type="file" id="actFile" name="actFile" onchange="actSubmit()">
                                                </div>
                                               <!--  <div class="col-md-3 mb-3">
                                                    <input class="btn btn-primary" type="button" id="actSubmit" name="actSubmit" value='Upload' required>
                                                </div> -->
                                            </div>

                                            <div class="row">
                                                <div class="col-md-3 mb-3">
                                                <br/><br/>
                                                    <label for="preventionFile" class="form-label">Infection Prevention Control</label>
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                     <label for="prevention" class="form-label">Infection Prevention Control Expiry Date</label>
                                                    <input type="date" class="form-control date" id="prevention_expiry_date" name="prevention_expiry_date">
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                <label for="preventionFile" class="form-label">Choose File</label>
                                                    <input class="form-control required-training" type="file" id="preventionFile" name="preventionFile" onchange="preventionSubmit()">
                                                </div>
                                               <!--  <div class="col-md-3 mb-3">
                                                    <input class="btn btn-primary" type="button" id="preventionSubmit" name="preventionSubmit" value='Upload' required>
                                                </div> -->
                                            </div>

                                            <div class="row">
                                                <div class="col-md-3 mb-3">
                                                <br/><br/>
                                                    <label for="disabilityFile" class="form-label">Learning Disabilities</label>
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                     <label for="disability" class="form-label">Learning Disabilities Expiry Date</label>
                                                    <input type="date" class="form-control date" id="disability_expiry_date" name="disability_expiry_date">
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                <label for="disabilityFile" class="form-label">Choose File</label>
                                                    <input class="form-control required-training" type="file" id="disabilityFile" name="disabilityFile" onchange="disabilitySubmit()">
                                                </div>
                                                <!-- <div class="col-md-3 mb-3">
                                                    <input class="btn btn-primary" type="button" id="disabilitySubmit" name="disabilitySubmit" value='Upload' required>
                                                </div> -->
                                            </div>

                                            <div class="row">
                                                <div class="col-md-3 mb-3">
                                                <br/><br/>
                                                    <label for="careFile" class="form-label">Care Certificate </label>
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                     <label for="care" class="form-label">Care Certificate Expiry Date</label>
                                                    <input type="date" class="form-control date" id="care_expiry_date" name="care_expiry_date">
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                <label for="careFile" class="form-label">Choose File</label>
                                                    <input class="form-control required-training" type="file" id="careFile" name="careFile" onchange="careSubmit()">
                                                </div>
                                               <!--  <div class="col-md-3 mb-3">
                                                    <input class="btn btn-primary" type="button" id="careSubmit" name="careSubmit" value='Upload' required>
                                                </div> -->
                                            </div>
                                            
    
                                            <div id="otherTable">
                                                <table id="tbl">
                                                <!-- <tr>
                                                    <th>SL. No</th>
                                                    <th>Place Of Study</th>
                                                    <th>Qualification</th>
                                                    <th>Graduation Date</th>
                                                </tr>   --> 
                                                <tr>
                                                    <td><label for="other" class="form-label mb-3"></label></td> 
                                                    <td><label for="other" class="form-label mb-3"></label>File Type</td> 
                                                    <td><label for="other" class="form-label mb-3"></label>Expiry Date</td> 
                                                    <td><label for="other" class="form-label mb-3"></label>Choose File</td> 

                                                </tr> 
                                                 <tr>
                                                    <td><label for="other" class="form-label mb-3" style="width:90px">Additional</label></td> 
                                                    <td><input class="form-control  mb-3 required-personal" type="text" id="other_file_type1" name="other_file_type1" placeholder="Enter The File Type"></td> 
                                                    <td><input type="date" class="form-control date mb-3" id="other_expiry_date1" name="other_expiry_date1"></td> 
                                                    <td><input class="form-control mb-3" type="file" id="otherFile1" name="otherFile1" onchange="otherSubmit1()"></td> 
<!--                                                     <td><input class="btn btn-primary mb-3" type="button" id="otherSubmit1" name="otherSubmit1" value='Upload' required></td>
 -->                                                    <td><input type="button" class="button mb-3" value="+" id="" onclick="addOtherRows('tbl')"/></td>

                                                </tr> 
                                                <tr>
                                                    <span id="select-file" class="hide-text mob-helpers mb-3" style="color:red;">
                                                        Should Enter Your File Type Before Uploading
                                                    </span>
                                                </tr>
                                                </table>
                                               
                                                </div>
                                            <div>
                                            <!-- <div class="row">
                                                <div class="col-md-1 mb-3" style="width: 12.499999995%">
                                                    <label for="otherFile" class="form-label">Other </label>
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                    <input class="form-control required-training" type="file" id="otherFile" name="otherFile">
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                    <input class="btn btn-primary" type="button" id="otherSubmit" name="otherSubmit" value='Upload' required>
                                                </div>
                                            </div> -->
                                                <div class="row">   
                                                    <div class="col-md-5 mb-3" style="width: 35%">
                                                        <label for="documents" class="form-label">Do you have all the above mentioned training certificates?</label>
                                                    </div>
                                                    <div class="col-md-2 mb-3">
                                                        <select name="documents" id="documents" class="form-control select2 form-select required-dbs">
                                                            <option value="" disabled selected hidden>Choose One</option>
                                                            <option value="yes">Yes</option>
                                                            <option value="no">No</option>
                                                        </select>
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

                                            <!-- <div class="row">
                                                <div class="col-md-5 mb-3" style="width: 38%">
                                                </div>
                                                <div class="col-md-2 mb-0 d-grid text-center">
                                                    <button class="btn btn-primary" type="submit">Submit </button>
                                                </div>
                                            </div> -->
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
<style>
.hide-text{
  display: none;
}
</style>
<script>
          var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute("content");
          var i=1;
    $(document).ready(function(){
        
        $("#submit").hide();
    });
$('#training').on('change', function () {
    // if (this.value == '1'); { No semicolon and I used === instead of ==

    if (this.value === 'yes'){
        $("#is_yes").show();
        $("#is_no").hide();
        $("#submit").hide();
    } else {
        $("#is_yes").hide();
        $("#is_no").show();
        document.getElementById("is_no").style.color = "red";
        $("#submit").show();
        $("input").prop('required',false);
        $("#submit").text("Request DBS");
    }
});

$('#documents').on('change', function () {
    // if (this.value == '1'); { No semicolon and I used === instead of ==

    if (this.value === 'yes'){
        $("#submit").show();
        $("#submit").text("Finish");
    } else {
        $("#submit").show();
        $("#submit").text("Request Training");

    }
});

$('#moreDocuments').on('change', function () {

    if (this.value === 'yes'){
        $("#otherTable").show();
    }
});
function movingSubmit(){
  var employeeId= $("#loggedId").val()
  var movingFile_expiry_date= $("#movingFile_expiry_date").val()

//$('#movingSubmit').click(function(){
   
   // Get the selected file
   var files = $('#movingFile')[0].files;
   console.log(files);

   if(files.length > 0){
      var fd = new FormData();

      // Append data 
      fd.append('file',files[0]);
      fd.append('_token',CSRF_TOKEN);
      fd.append('file_type','Moving and Handling');
      fd.append('file_type_additional','Moving and Handling');
      fd.append('employeeId',employeeId);
      fd.append('expiry_date',movingFile_expiry_date);


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
            console.log(response);
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

 //});
  }

  function safeguarding(){
    var employeeId= $("#loggedId").val()
    var safeguarding_expiry_date= $("#safeguarding_expiry_date").val()

 //$('#safeguarding').click(function(){
   
   // Get the selected file
   var files = $('#safeguardingFile')[0].files;
   console.log(files);

   if(files.length > 0){
      var fd = new FormData();

      // Append data 
      fd.append('file',files[0]);
      fd.append('_token',CSRF_TOKEN);
      fd.append('file_type','Safeguarding Adults');
      fd.append('file_type_additional','Safeguarding Adults');
      fd.append('employeeId',employeeId);
      fd.append('expiry_date',safeguarding_expiry_date);

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

 //});
  }

  function healthSubmit(){
    var employeeId= $("#loggedId").val()
    var health_expiry_date= $("#health_expiry_date").val()

 //$('#healthSubmit').click(function(){
   
   // Get the selected file
   var files = $('#healthFile')[0].files;
   console.log(files);

   if(files.length > 0){
      var fd = new FormData();

      // Append data 
      fd.append('file',files[0]);
      fd.append('_token',CSRF_TOKEN);
      fd.append('file_type','Health and Safety');
      fd.append('file_type_additional','Health and Safety');
      fd.append('employeeId',employeeId);
      fd.append('expiry_date',health_expiry_date);

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

 //});
  }

  function foodSubmit(){
    var employeeId= $("#loggedId").val()
    var food_expiry_date= $("#food_expiry_date").val()

 //$('#foodSubmit').click(function(){
   
   // Get the selected file
   var files = $('#foodFile')[0].files;
   console.log(files);

   if(files.length > 0){
      var fd = new FormData();

      // Append data 
      fd.append('file',files[0]);
      fd.append('_token',CSRF_TOKEN);
      fd.append('file_type','Food and Hygiene');
      fd.append('file_type_additional','Food and Hygiene');
      fd.append('employeeId',employeeId);
      fd.append('expiry_date',food_expiry_date);

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

 //});
  }

  function supportSubmit(){
    var employeeId= $("#loggedId").val()
    var support_expiry_date= $("#support_expiry_date").val()

 //$('#supportSubmit').click(function(){
   
   // Get the selected file
   var files = $('#supportFile')[0].files;
   console.log(files);

   if(files.length > 0){
      var fd = new FormData();

      // Append data 
      fd.append('file',files[0]);
      fd.append('_token',CSRF_TOKEN);
      fd.append('file_type','First Aid/ Basic Life Support');
      fd.append('file_type_additional','First Aid/ Basic Life Support');
      fd.append('employeeId',employeeId);
      fd.append('expiry_date',support_expiry_date);

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

 //});
  }

  function coshhSubmit(){
    var employeeId= $("#loggedId").val()
    var coshh_expiry_date= $("#coshh_expiry_date").val()

 //$('#coshhSubmit').click(function(){
   
   // Get the selected file
   var files = $('#coshhFile')[0].files;
   console.log(files);

   if(files.length > 0){
      var fd = new FormData();

      // Append data 
      fd.append('file',files[0]);
      fd.append('_token',CSRF_TOKEN);
      fd.append('file_type','COSHH');
      fd.append('file_type_additional','COSHH');
      fd.append('employeeId',employeeId);
      fd.append('expiry_date',coshh_expiry_date);


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

 //});
  }

  function safetySubmit(){
    var employeeId= $("#loggedId").val()
    var safety_expiry_date= $("#safety_expiry_date").val()

 //$('#safetySubmit').click(function(){
   
   // Get the selected file
   var files = $('#safetyFile')[0].files;
   console.log(files);

   if(files.length > 0){
      var fd = new FormData();

      // Append data 
      fd.append('file',files[0]);
      fd.append('_token',CSRF_TOKEN);
      fd.append('file_type','Fire Safety');
      fd.append('file_type_additional','Fire Safety');
      fd.append('employeeId',employeeId);
      fd.append('expiry_date',safety_expiry_date);


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

 //});
  }

 function behaviourSubmit(){
  var employeeId= $("#loggedId").val()
  var behaviour_expiry_date= $("#behaviour_expiry_date").val()

 //$('#behaviourSubmit').click(function(){
   
   // Get the selected file
   var files = $('#behaviourFile')[0].files;
   console.log(files);

   if(files.length > 0){
      var fd = new FormData();

      // Append data 
      fd.append('file',files[0]);
      fd.append('_token',CSRF_TOKEN);
      fd.append('file_type','Challenging Behavior');
      fd.append('file_type_additional','Challenging Behavior');
      fd.append('employeeId',employeeId);
      fd.append('expiry_date',behaviour_expiry_date);


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

 //});
  }

  function epilepsySubmit(){
    var employeeId= $("#loggedId").val()
    var epilepsy_expiry_date= $("#epilepsy_expiry_date").val()

 //$('#epilepsySubmit').click(function(){
   
   // Get the selected file
   var files = $('#epilepsyFile')[0].files;
   console.log(files);

   if(files.length > 0){
      var fd = new FormData();

      // Append data 
      fd.append('file',files[0]);
      fd.append('_token',CSRF_TOKEN);
      fd.append('file_type','Epilepsy');
      fd.append('file_type_additional','Epilepsy');
      fd.append('employeeId',employeeId);
      fd.append('expiry_date',epilepsy_expiry_date);


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

 //});
  }
  function demantiaSubmit(){
    var employeeId= $("#loggedId").val()
    var demantia_expiry_date= $("#demantia_expiry_date").val()

 //$('#demantiaSubmit').click(function(){
   
   // Get the selected file
   var files = $('#demantiaFile')[0].files;
   console.log(files);

   if(files.length > 0){
      var fd = new FormData();

      // Append data 
      fd.append('file',files[0]);
      fd.append('_token',CSRF_TOKEN);
      fd.append('file_type','Dementia');
      fd.append('file_type_additional','Dementia');
      fd.append('employeeId',employeeId);
      fd.append('expiry_date',demantia_expiry_date);



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

 //});
  }

  function actSubmit(){ 
    var employeeId= $("#loggedId").val()
    var act_expiry_date= $("#act_expiry_date").val()

 //$('#actSubmit').click(function(){
   
   // Get the selected file
   var files = $('#actFile')[0].files;
   console.log(files);

   if(files.length > 0){
      var fd = new FormData();

      // Append data 
      fd.append('file',files[0]);
      fd.append('_token',CSRF_TOKEN);
      fd.append('file_type','Mental Capacity Act');
      fd.append('file_type_additional','Mental Capacity Act');
      fd.append('employeeId',employeeId);
      fd.append('expiry_date',act_expiry_date);


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

 //});
  }

  function preventionSubmit(){ 
    var employeeId= $("#loggedId").val()
    var prevention_expiry_date= $("#prevention_expiry_date").val()

 //$('#preventionSubmit').click(function(){
   
   // Get the selected file
   var files = $('#preventionFile')[0].files;
   console.log(files);

   if(files.length > 0){
      var fd = new FormData();

      // Append data 
      fd.append('file',files[0]);
      fd.append('_token',CSRF_TOKEN);
      fd.append('file_type','Infection Prevention Control');
      fd.append('file_type_additional','Infection Prevention Control');
      fd.append('employeeId',employeeId);
      fd.append('expiry_date',prevention_expiry_date);


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

 //});
  }

  function disabilitySubmit(){ 
    var employeeId= $("#loggedId").val()
    var disability_expiry_date= $("#disability_expiry_date").val()

 //$('#disabilitySubmit').click(function(){
   
   // Get the selected file
   var files = $('#disabilityFile')[0].files;
   console.log(files);

   if(files.length > 0){
      var fd = new FormData();

      // Append data 
      fd.append('file',files[0]);
      fd.append('_token',CSRF_TOKEN);
      fd.append('file_type','Learning Disabilities');
      fd.append('file_type_additional','Learning Disabilities');
      fd.append('employeeId',employeeId);
      fd.append('expiry_date',disability_expiry_date);


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

// });
  }

  function careSubmit(){ 
    var employeeId= $("#loggedId").val()
    var care_expiry_date= $("#care_expiry_date").val()

 //$('#careSubmit').click(function(){
   
   // Get the selected file
   var files = $('#careFile')[0].files;
   console.log(files);

   if(files.length > 0){
      var fd = new FormData();

      // Append data 
      fd.append('file',files[0]);
      fd.append('_token',CSRF_TOKEN);
      fd.append('file_type','Care Certificate');
      fd.append('file_type_additional','Care Certificate');
      fd.append('employeeId',employeeId);
      fd.append('expiry_date',care_expiry_date);


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

 //});
  }


//Adding new Rows to the work details          
        function addOtherRows( table ){
            i=i+1;
            var tableRef = document.getElementById(table);
          console.log(tableRef)
            var newRow   = tableRef.insertRow(-1);

            var newCell  = newRow.insertCell(0);
            var newElem = document.createElement( 'label' );
            newElem.setAttribute("name", "other");
            newElem.setAttribute("name", "other");
            //newElem.innerHTML = "Other "+i;
            newElem.innerHTML = "Additional";
            newElem.setAttribute("class", " mb-3");
            newCell.appendChild(newElem);

            var newCell  = newRow.insertCell(1);
            var newElem = document.createElement( 'input' );
            newElem.setAttribute("name", 'other_file_type'+i);
            newElem.setAttribute("id", 'other_file_type'+i);
            newElem.setAttribute("type", "text");
            newElem.setAttribute("class", "form-control mb-3");
            newElem.setAttribute("placeholder", "Enter The File Type");
            newCell.appendChild(newElem);

            var newCell  = newRow.insertCell(2);
            var newElem = document.createElement( 'input' );
            newElem.setAttribute("name", 'other_expiry_date'+i);
            newElem.setAttribute("id", 'other_expiry_date'+i);
            newElem.setAttribute("type", "date");
            newElem.setAttribute("class", "form-control mb-3");
            newCell.appendChild(newElem);
           
            var newCell  = newRow.insertCell(3);
            var newElem = document.createElement( 'input' );
            newElem.setAttribute("name", 'otherFile'+i);
            newElem.setAttribute("id", 'otherFile'+i);
            newElem.setAttribute("type", "file");
            newElem.setAttribute("class", "form-control mb-3");
            newElem.setAttribute("onchange", "otherFileUpload(i)");
            newCell.appendChild(newElem);
           
           /*  var newCell  = newRow.insertCell(2);
            var newElem = document.createElement( 'input' );
            newElem.setAttribute("name",i);
            newElem.setAttribute("id", i);
            newElem.setAttribute("type", "button");
            newElem.setAttribute("value", "Upload");
            newElem.setAttribute("class", "btn btn-primary mb-3");
            newElem.setAttribute("onclick", "otherFileUpload(this.id)");
            newCell.appendChild(newElem); */

            /*  newCell = newRow.insertCell(3);
            newElem = document.createElement( 'input' );
            newElem.setAttribute("type", "button");
            newElem.setAttribute("value", "Delete Row");
            newElem.setAttribute("onclick", 'SomeDeleteRowFunction(this)')
            newCell.appendChild(newElem); */
            }


            window.SomeDeleteRowFunction = function SomeDeleteRowFunction(o) {
            var p=o.parentNode.parentNode;
            p.parentNode.removeChild(p);
            }


 function otherSubmit1() {      
//$('#otherSubmit1').click(function(){
   
   // Get the selected file
   var files = $('#otherFile1')[0].files;
   console.log(files);
   var additional = $("#other_file_type1").val();
 var employeeId= $("#loggedId").val()
 var additional_expiry_date= $("#other_expiry_date1").val()

 if(additional==""){
    $('#other_file_type1').attr('required', true);
    $("#select-file").removeClass("hide-text");
 }else{
   if(files.length > 0){
      var fd = new FormData();

      // Append data 
      fd.append('file',files[0]);
      fd.append('_token',CSRF_TOKEN);
     // fd.append('file_type','Other1');
      fd.append('file_type',additional);
      fd.append('file_type_additional','Training Additional 1');
      fd.append('employeeId',employeeId);
      fd.append('expiry_date',additional_expiry_date);

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

 //});
  }
}
 $/* ('input[id^="otherSubmit"]').on('click', function() {  
    alert(this.id); // Get the ID
    alert($(this).attr('value')); // Get the value attribute
}); */
    
function otherFileUpload(id){
 
   // Get the selected file
   var files = $('#otherFile'+id)[0].files;
   console.log(files);
   var type = $("#otherFile"+id).val();
   var additional = $("#other_file_type"+id).val();
   var additional_expiry_date = $("#other_expiry_date"+id).val();
   var employeeId= $("#loggedId").val()
 if(additional==""){
    $('#other_file_type'+id).attr('required', true);
    $("#select-file").removeClass("hide-text");
 }else{
   if(files.length > 0){
      var fd = new FormData();

      // Append data 
      fd.append('file',files[0]);
      fd.append('_token',CSRF_TOKEN);
      //fd.append('file_type','Other'+id);
      fd.append('file_type',additional);
      fd.append('file_type_additional','Training Additional'+id);
      fd.append('employeeId',employeeId);
      fd.append('expiry_date',additional_expiry_date);

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
}
</script>