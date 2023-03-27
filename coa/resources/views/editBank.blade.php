<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from coderthemes.com/hyper/saas/pages-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 12 Aug 2022 09:06:26 GMT -->
<head>
        <meta charset="utf-8" />
        <title>Edit Bank</title>
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
                                    
                                    <h4 class="page-title">Edit Bank</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title --> 


                        


                        <div class="row">
                            <div class="col-xl-12">
                        <div class="card" id="health-check">
                         <div class="card-body">
                         <form method="POST" action="{{ route('update.bank') }}" class="bank-form" id="bank-form">
                         @csrf
                         <div id="bank-details" class="bank-details">
                                        <h4 class="header-title mt-0 mb-3">Bank Details</h4>
                                            <p class="text-muted font-13">
                                            </p>

                                            <hr>
                                        
                                            <div class="row">   
                                        <div class="col-md-4 mb-3">
                                            <label for="title" class="form-label">Title</label>
                                            <select name="title" id="title" class="form-control select2 required-personal form-select" disabled required>
                                                <option value="{{ $employee->title }}" disabled selected hidden>{{ $employee->title }}</option>
                                                <!--  <option value="Mr">Mr.</option>
                                                <option value="Mrs">Mrs.</option>
                                                <option value="Miss">Miss.</option> -->                                                              
                                            </select> 
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="surname" class="form-label">Surname</label>
                                            <input class="form-control required-personal" type="text" id="surname" name="surname" placeholder="Enter Your Surname" value="{{ $employee->surname }}" disabled required>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="first_name" class="form-label">First Name</label>
                                            <input class="form-control required-personal" type="text" id="first_name" name="first_name" placeholder="Enter Your First Name" value="{{ $employee->firstname }}" disabled required>
                                        </div>
                                    </div>
                                    <div class="row">   
                                        <div class="col-md-4 mb-3">
                                            <label for="address1" class="form-label">Address Line One</label>
                                            <input class="form-control" type="text" id="address1" name="address1" placeholder="Enter Address Line One" value="{{ $employee->address1 }}" disabled required>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="address1" class="form-label">Address Line Two </label>(Optional)
                                            <input class="form-control" type="text" id="address2" name="address2" placeholder="Nil" value="{{ $employee->address2 }}" disabled>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="address1" class="form-label">Address Line Three</label>(Optional)
                                            <input class="form-control" type="text" id="address3" name="address3" placeholder="Nil" value="{{ $employee->address3 }}" disabled>
                                        </div>
                                    </div> 
                                    <div class="row">   
                                        <div class="col-md-4 mb-3">
                                            <label for="address1" class="form-label">Post Town</label>
                                            <input class="form-control" type="text" id="" name="" placeholder="Enter Your Post Town" value="{{ $employee->postTown }}" disabled>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="password" class="form-label">Postcode</label>
                                            <input class="form-control" type="text" id="" name="" placeholder="Enter Your Postcode" value="{{ $employee->postcode }}" disabled>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label for="tel_no" class="form-label">Whatsapp Number </label>
                                            <input class="form-control required-personal" type="text" id="contact" name="contact" placeholder="Enter Your Contact Number" value="{{ $employee->contact_no }}" disabled required>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="mobile_no" class="form-label">Mobile Number </label>
                                            <input class="form-control required-personal" type="text" id="uk_contact" name="uk_contact" placeholder="Enter Your Mobile Number" value="{{ $employee->uk_contact_no }}" disabled required>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="email" class="form-label">Email </label>
                                            <input class="form-control required-personal" type="email" id="email" name="email" placeholder="Enter Your Email Address" value="{{ $employee->email }}" disabled required>
                                        </div>
                                    </div>        
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label for="bank_name" class="form-label">Bank Name </label>
                                            <input class="form-control required-personal" type="text" id="bank_name" name="bank_name" placeholder="Enter Your Bank Name"  value="{{ $bank->bank_name }}" required autocomplete=off>
                                        </div>
                                        <div class="col-md-1 mb-3">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="sort_code" class="form-label">Sort Code Number </label>(must be 6 digits long)
                                            <input class="form-control required-personal" type="text" id="sort_code" name="sort_code" placeholder="Enter Your Sort Code Number"  value="{{ $bank->sort_code }}" required title="Should be digits only" minlength="6" maxlength="6" autocomplete=off onkeypress="return onlyNumberKey(event)">
                                        </div>
                                    </div>        
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label for="account_no" class="form-label">Account Number </label> (must be 8 digits long) 
                                            <input class="form-control required-personal" type="text" id="account_no" name="account_no" placeholder="Enter Your Account Number"  value="{{ $bank->account_no }}" required autocomplete=off title="Should be digits only" minlength="8" maxlength="8" onkeypress="return onlyNumberKey(event)">
                                        </div>
                                        <div class="col-md-1 mb-3">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="account_holder" class="form-label">Name of Account Holder </label>
                                            <input class="form-control required-personal" type="text" id="account_holder" name="account_holder" placeholder="Enter Account Holder Name"  value="{{ $bank->account_holder }}" required autocomplete=off>
                                        </div>
                                    </div>      
                                    <div class="row">   
                                        <div class="col-md-4 mb-3">
                                            <label for="address1" class="form-label">Address Line One</label>
                                            <input class="form-control" type="text" id="address1" name="address1" placeholder="Enter Address Line One" value="{{ $bank->address1 }}" required>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="address1" class="form-label">Address Line Two </label>(Optional)
                                            <input class="form-control" type="text" id="address2" name="address2" value="{{ $bank->address2 }}">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="address1" class="form-label">Address Line Three </label>(Optional)
                                            <input class="form-control" type="text" id="address3" name="address3" value="{{ $bank->address3 }}">
                                        </div>
                                    </div> 
                                    <div class="row">   
                                        <div class="col-md-4 mb-3">
                                            <label for="address1" class="form-label">Post Town</label>
                                            <input class="form-control" type="text" id="" name="" placeholder="Enter Your Post Town" value="{{ $bank->postTown }}">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="password" class="form-label">Postcode</label>
                                            <input class="form-control" type="text" id="" name="" placeholder="Enter Your Postcode" value="{{ $bank->postcode }}">
                                        </div>
                                    </div>                       
                                            
                                    <div class="row">
                                                <div class="col-md-4">
                                                
                                                </div>

                                                <div class="col-md-2 mb-0 d-grid text-center">
                                                    <button class="btn btn-primary toggle-disabled" type="submit">Update </button>
                                                </div> 
                                         </div>
                                            </div>   
                                       </div>                        
                                    </div>  <!-- Health-Questionnaire end-->

                                        </form>                    
                                 
                                    
                            


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
    $( document ).ready(function() {
        //$('#health-check').hide();
    });
   
   
    $('#health').on('change', function () {
         if (this.value === 'yes'){
            $('#health-check').show();
            //$('#Health-Question').hide();
        } else {
            $('#health-check').hide();
        }
    });

    $('#depression').on('change', function () {
         if (this.value === 'yes'){
            $('#depression_note').show();
            $("#depression_note").attr("class","form-control required-health");
            $('#depression_note').attr('required', 'required');
        } else {
            $('#depression_note').hide();
            $('#depression_note').removeAttr('required');
            $("#depression_note").attr("class","");
        }
    });
    $('#epilepsy').on('change', function () {
         if (this.value === 'yes'){
            $('#epilepsy_note').show();
            $("#epilepsy_note").attr("class","form-control required-health");
            $('#epilepsy_note').attr('required', 'required');
        } else {
            $('#epilepsy_note').hide();
            $('#epilepsy_note').removeAttr('required');
            $("#epilepsy_note").attr("class","");
        }
    });
    $('#ailment').on('change', function () {
         if (this.value === 'yes'){
            $('#ailment_note').show();
            $("#ailment_note").attr("class","form-control required-health");
            $('#ailment_note').attr('required', 'required');
        } else {
            $('#ailment_note').hide();
            $('#ailment_note').removeAttr('required');
            $("#ailment_note").attr("class","");
        }
    });
    $('#spinal').on('change', function () {
         if (this.value === 'yes'){
            $('#spinal_note').show();
            $("#spinal_note").attr("class","form-control required-health");
            $('#spinal_note').attr('required', 'required');
        } else {
            $('#spinal_note').hide();
            $('#spinal_note').removeAttr('required');
            $("#spinal_note").attr("class","");
        }
    });
    $('#arthritis').on('change', function () {
         if (this.value === 'yes'){
            $('#arthritis_note').show();
            $("#arthritis_note").attr("class","form-control required-health");
            $('#arthritis_note').attr('required', 'required');
        } else {
            $('#arthritis_note').hide();
            $('#arthritis_note').removeAttr('required');
            $("#arthritis_note").attr("class","");
        }
    });
    $('#heart').on('change', function () {
         if (this.value === 'yes'){
            $('#heart_note').show();
            $("#heart_note").attr("class","form-control required-health");
            $('#heart_note').attr('required', 'required');
        } else {
            $('#heart_note').hide();
            $('#heart_note').removeAttr('required');
            $("#heart_note").attr("class","");
        }
    });
    $('#kidney').on('change', function () {
         if (this.value === 'yes'){
            $('#kidney_note').show();
            $("#kidney_note").attr("class","form-control required-health");
            $('#kidney_note').attr('required', 'required');
        } else {
            $('#kidney_note').hide();
            $('#kidney_note').removeAttr('required');
            $("#kidney_note").attr("class","");
        }
    });
    $('#diabetes').on('change', function () {
         if (this.value === 'yes'){
            $('#diabetes_note').show();
            $("#diabetes_note").attr("class","form-control required-health");
            $('#diabetes_note').attr('required', 'required');
        } else {
            $('#diabetes_note').hide();
            $('#diabetes_note').removeAttr('required');
            $("#diabetes_note").attr("class","");
        }
    });
    $('#skin').on('change', function () {
         if (this.value === 'yes'){
            $('#skin_note').show();
            $("#skin_note").attr("class","form-control required-health");
            $('#skin_note').attr('required', 'required');
        } else {
            $('#skin_note').hide();
            $('#skin_note').removeAttr('required');
            $("#skin_note").attr("class","");
        }
    });
    $('#disabled').on('change', function () {
         if (this.value === 'yes'){
            $('#disabled_show').show();
            $("#disabled_note").attr("class","form-control required-health");
            $('#disabled_note').attr('required', 'required');
        } else {
            $('#disabled_show').hide();
            $('#disabled_note').removeAttr('required');
            $("#disabled_note").attr("class","");
        }
    });
    $('#pregnant').on('change', function () {
         if (this.value === 'yes'){
            $('#pregnant_note').show();
            $("#pregnant_note").attr("class","form-control required-health");
            $('#pregnant_note').attr('required', 'required');
        } else {
            $('#pregnant_note').hide();
            $('#pregnant_note').removeAttr('required');
            $("#pregnant_note").attr("class","");
        }
    });
    $(document).on('change keyup', '.required-health', function(e){
                let Disabled = true;
                $(".required-health").each(function() {
                let value = this.value
                if ((value)&&(value.trim() !=''))
                    {
                        Disabled = false
                    }else{
                        Disabled = true
                        return false
                    }
                });
            
            if(Disabled){
                    $('.toggle-disabled').prop("disabled", true);
                }else{
                    $('.toggle-disabled').prop("disabled", false);
                }
            });
    function onlyNumberKey(evt) {
          
          // Only ASCII character in that range allowed
          var ASCIICode = (evt.which) ? evt.which : evt.keyCode
          if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
              return false;
              
          return true;
      }
</script>