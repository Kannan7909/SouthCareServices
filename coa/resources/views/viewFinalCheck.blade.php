<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from coderthemes.com/hyper/saas/pages-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 12 Aug 2022 09:06:26 GMT -->
<head>
        <meta charset="utf-8" />
        <title>User View</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="images/images-theme/favicon.ico">

        <!-- App css -->
        <link href="../css/css-theme/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="../css/css-theme/app.min.css" rel="stylesheet" type="text/css" id="app-style"/>

    </head>

    <body class="loading" data-layout-color="light" data-leftbar-theme="dark" data-layout-mode="fluid" data-rightbar-onstart="true">
        <!-- Begin page -->
        <div class="wrapper">
            <!-- ========== Left Sidebar Start ========== -->
            @include('adminNavigation')

            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">
                    <!-- Topbar Start -->
                    <div class="navbar-custom">
                        <ul class="list-unstyled topbar-menu float-end mb-0">
                            <li class="dropdown notification-list">
                                <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                                    aria-expanded="false">
                                    <span class="account-user-avatar"> 
                                        <img src="../images/user.png" alt="user-image" class="rounded-circle">
                                    </span>
                                    <span>
                                    <span class="account-user-name"><strong> {{ $loggedUser->firstname }} {{ $loggedUser->surname }}</strong></span>
                                     <span class="account-position">{{ $loggedUser->login_id }}</span> 
                                    </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
                                     <a href="{{ route('log.out') }}" class="dropdown-item notify-item">
                                        <i class="mdi mdi-logout me-1"></i>
                                        <span>Logout</span>
                                    </a>
                                </div>
                            </li>

                        </ul>
                        <button class="button-menu-mobile open-left">
                            <i class="mdi mdi-menu"></i>
                        </button>
                        <div class="app-search dropdown d-none d-lg-block">
                            <form>
                                
                            </form>

                        </div>
                    </div>
                    <!-- end Topbar -->

                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                    <!-- start page title -->
                    <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Final Check</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title --> 

                        <div class="row">
                            <div class="col-xl-12">
                                <!-- Personal-Information -->
                                <div class="card">
                                    <div class="card-body">
                                    <h4 class="header-title mt-0 mb-3">User Information</h4>
                                        <p class="text-muted font-13">
                                        </p>

                                        <hr>

                                    <div class="text-start">
                                        <div class="row">
                                            <div class="col-md-4">
                                                 <p class="text-muted"><strong>Surname :</strong> <span class="ms-2">{{ $employee->surname }}</span></p>
                                            </div>
                                            <div class="col-md-4">
                                                 <p class="text-muted"><strong>First Name :</strong> <span class="ms-2">{{ $employee->firstname }}</span></p>
                                            </div>
                                            <div class="col-md-4">
                                                <p class="text-muted"><strong>Post Applied For :</strong><span class="ms-2">{{ $employee->posts }}</span></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <p class="text-muted"><strong>Address-1 :</strong> <span class="ms-2">{{ $employee->address1 }}</span></p>
                                            </div>
                                            <div class="col-md-4">
                                                <p class="text-muted"><strong>Address-2 :</strong> <span class="ms-2">{{ $employee->address2 }}</span></p>
                                            </div>
                                            <div class="col-md-4">
                                            <p class="text-muted"><strong>Address-3 :</strong>
                                                <span class="ms-2"> {{ $employee->address3 }} </span>
                                            </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <p class="text-muted"><strong>Post Town:</strong> <span class="ms-2">{{ $employee->postTown }}</span></p>
                                            </div>
                                            <div class="col-md-4">
                                            <p class="text-muted"><strong>Postcode :</strong>
                                                <span class="ms-2"> {{ $employee->postcode }} </span>
                                            </p>
                                            </div>
                                            <div class="col-md-4">
                                                <p class="text-muted"><strong>Whatsapp Number :</strong> <span class="ms-2">{{ $employee->contact_no }}</span></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                            <p class="text-muted"><strong>Mobile No. :</strong> <span class="ms-2">{{ $employee->contact_no }}</span></p>
                                            </div>
                                            <div class="col-md-4">
                                            <p class="text-muted"><strong>Email :</strong> <span class="ms-2">{{ $employee->email }}</span></p>
                                            </div>
                                            <div class="col-md-4">
                                            <p class="text-muted"><strong>User Name :</strong><span class="ms-2">{{ $employee->login_id }}</span></p>
                                            </div>
                                         </div>
                                         <div class="row">
                                            <div class="col-md-4">
                                            <p class="text-muted"><strong>T&C Status :</strong> 
                                                @if( $employee->policy_agree =="yes")
                                                <span class="ms-2">
                                                    Agreed
                                                </span>
                                                @else
                                                <span class="ms-2">
                                                    Pending
                                                </span>
                                                @endif
                                            </p>
                                            </div>
                                         </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- Personal-Information -->
                                <div class="card">
                                    <div class="card-body">
                                    <h4 class="header-title mt-0 mb-3">User Status</h4>
                                    <hr>
                                  
                                    <table class="table table-striped dt-responsive nowrap w-100">
                                              <thead>        
                                                <tr>
                                                    <th>#</th>
                                                    <th>Forms</th>
                                                    <th>Status</th>
                                                 </tr>  
                                                </thead>             
                                                 <tbody class="allData">
                                                <tr>
                                                    <td>1</td>
                                                    <td>Application Form</td>
                                                    @if($employee->application_status == "Pending")
                                                    <td><i class="mdi mdi-circle text-secondary"></i> {{ $employee->application_status }}</td>
                                                    @endif
                                                    @if($employee->application_status == "Submitted")
                                                    <td><i class="mdi mdi-circle text-primary"></i> {{ $employee->application_status }}</td>
                                                    @endif
                                                    @if($employee->application_status == "Under Review")
                                                    <td><i class="mdi mdi-circle text-warning"></i> {{ $employee->application_status }}</td>
                                                    @endif
                                                    @if($employee->application_status == "Approved")
                                                    <td><i class="mdi mdi-circle text-success"></i> {{ $employee->application_status }}</td>
                                                    @endif
                                                </tr> 

                                                <tr>
                                                    <td>2</td>
                                                    <td>Training Check</td>
                                                    @if($employee->training_status == "Pending")
                                                    <td><i class="mdi mdi-circle text-secondary"></i> {{ $employee->training_status }}</td>
                                                    @endif
                                                    @if($employee->training_status == "Submitted")
                                                    <td><i class="mdi mdi-circle text-primary"></i> {{ $employee->training_status }}</td>
                                                    @endif
                                                    @if($employee->training_status == "Requested")
                                                    <td><i class="mdi mdi-circle text-danger"></i> {{ $employee->training_status }}</td>
                                                    @endif
                                                    @if($employee->training_status == "Under Review")
                                                    <td><i class="mdi mdi-circle text-warning"></i> {{ $employee->training_status }}</td>
                                                    @endif
                                                    @if($employee->training_status == "Approved")
                                                    <td><i class="mdi mdi-circle text-success"></i> {{ $employee->training_status }}</td>
                                                    @endif
                                                </tr> 

                                                <tr>
                                                    <td>3</td>
                                                    <td>Reference Check</td>
                                                    @if($employee->reference_status == "Pending")
                                                    <td><i class="mdi mdi-circle text-secondary"></i> {{ $employee->reference_status }}</td>
                                                    @endif
                                                    @if($employee->reference_status == "Submitted")
                                                    <td><i class="mdi mdi-circle text-primary"></i> {{ $employee->reference_status }}</td>
                                                    @endif
                                                    @if($employee->reference_status == "Under Review")
                                                    <td><i class="mdi mdi-circle text-warning"></i> {{ $employee->reference_status }}</td>
                                                    @endif
                                                    @if($employee->reference_status == "Approved")
                                                    <td><i class="mdi mdi-circle text-success"></i> {{ $employee->reference_status }}</td>
                                                    @endif
                                                </tr> 

                                                <tr>
                                                    <td>4</td>
                                                    <td>Health Check</td>
                                                    @if($employee->health_status == "Pending")
                                                    <td><i class="mdi mdi-circle text-secondary"></i> {{ $employee->health_status }}</td>
                                                    @endif
                                                    @if($employee->health_status == "Submitted")
                                                    <td><i class="mdi mdi-circle text-primary"></i> {{ $employee->health_status }}</td>
                                                    @endif
                                                    @if($employee->health_status == "Under Review")
                                                    <td><i class="mdi mdi-circle text-warning"></i> {{ $employee->health_status }}</td>
                                                    @endif
                                                    @if($employee->health_status == "Approved")
                                                    <td><i class="mdi mdi-circle text-success"></i> {{ $employee->health_status }}</td>
                                                    @endif
                                               </tr> 

                                                <tr>
                                                    <td>5</td>
                                                    <td>DBS Check</td>
                                                    @if($employee->dbs_status == "Pending")
                                                    <td><i class="mdi mdi-circle text-secondary"></i> {{ $employee->dbs_status }}</td>
                                                    @endif
                                                    @if($employee->dbs_status == "Submitted")
                                                    <td><i class="mdi mdi-circle text-primary"></i> {{ $employee->dbs_status }}</td>
                                                    @endif
                                                    @if($employee->dbs_status == "Requested")
                                                    <td><i class="mdi mdi-circle text-danger"></i> {{ $employee->dbs_status }}</td>
                                                    @endif
                                                    @if($employee->dbs_status == "Under Review")
                                                    <td><i class="mdi mdi-circle text-warning"></i> {{ $employee->dbs_status }}</td>
                                                    @endif
                                                    @if($employee->dbs_status == "Approved")
                                                    <td><i class="mdi mdi-circle text-success"></i> {{ $employee->dbs_status }}</td>
                                                    @endif
                                                </tr> 

                                                <tr>
                                                    <td>6</td>
                                                    <td>Induction</td>
                                                    @if(count($inductionStatus) == 0)
                                                    <td><i class="mdi mdi-circle text-secondary"></i> Pending </td>
                                                    @else
                                                    @if($inductionStatus[0]->status == "no")
                                                    <td><i class="mdi mdi-circle text-primary"></i> Submitted</td>
                                                    @endif
                                                    @if($inductionStatus[0]->status == "cancelled")
                                                    <td><i class="mdi mdi-circle text-danger"></i> Cancelled </td>
                                                    @endif
                                                    @if($inductionStatus[0]->status == "Confirmed")
                                                    <td><i class="mdi mdi-circle text-warning"></i> Confirmed </td>
                                                    @endif
                                                    @if($inductionStatus[0]->status == "Attended")
                                                    <td><i class="mdi mdi-circle text-success"></i> Attended</td>
                                                    @endif
                                                    @endif
                                                </tr> 

                                                <tr>
                                                    <td>7</td>
                                                    <td>Bank Details</td>
                                                    @if($employee->bank_status == "Pending")
                                                    <td><i class="mdi mdi-circle text-secondary"></i> {{ $employee->bank_status }}</td>
                                                    @endif
                                                    @if($employee->bank_status == "Submitted")
                                                    <td><i class="mdi mdi-circle text-primary"></i> {{ $employee->bank_status }}</td>
                                                    @endif
                                                    @if($employee->bank_status == "Under Review")
                                                    <td><i class="mdi mdi-circle text-warning"></i> {{ $employee->bank_status }}</td>
                                                    @endif
                                                    @if($employee->bank_status == "Approved")
                                                    <td><i class="mdi mdi-circle text-success"></i> {{ $employee->bank_status }}</td>
                                                    @endif
                                                </tr> 

                                                <tr>
                                                    <td>8</td>
                                                    <td>Starter Checklist</td>
                                                    @if($employee->starter_status == "Pending")
                                                    <td><i class="mdi mdi-circle text-secondary"></i> {{ $employee->starter_status }}</td>
                                                    @endif
                                                    @if($employee->starter_status == "Submitted")
                                                    <td><i class="mdi mdi-circle text-primary"></i> {{ $employee->starter_status }}</td>
                                                    @endif
                                                    @if($employee->starter_status == "Under Review")
                                                    <td><i class="mdi mdi-circle text-warning"></i> {{ $employee->starter_status }}</td>
                                                    @endif
                                                    @if($employee->starter_status == "Approved")
                                                    <td><i class="mdi mdi-circle text-success"></i> {{ $employee->starter_status }}</td>
                                                    @endif
                                                </tr> 

                                                <tr>
                                                    <td>9</td>
                                                    <td>Employee Contract</td>
                                                    @if($employee->employee_contract == "Pending")
                                                    <td><i class="mdi mdi-circle text-secondary"></i> {{ $employee->employee_contract }}</td>
                                                    @endif
                                                    @if($employee->employee_contract == "Sent")
                                                    <td><i class="mdi mdi-circle text-success"></i> {{ $employee->employee_contract }}</td>
                                                    @endif
                                                    @if($employee->employee_contract == "Commented")
                                                    <td><i class="mdi mdi-circle text-success"></i> {{ $employee->employee_contract }}</td>
                                                    @endif
                                                    @if($employee->employee_contract == "Submitted")
                                                    <td><i class="mdi mdi-circle text-primary"></i> {{ $employee->employee_contract }}</td>
                                                    @endif
                                                    @if($employee->employee_contract == "Under Review")
                                                    <td><i class="mdi mdi-circle text-warning"></i> {{ $employee->employee_contract }}</td>
                                                    @endif
                                                    @if($employee->employee_contract == "Approved")
                                                    <td><i class="mdi mdi-circle text-success"></i> {{ $employee->employee_contract }}</td>
                                                    @endif
                                                </tr>
                                                <input class="form-control" type="hidden" id="employee_id" name="employee_id" value="{{ $employee->id }}">
                                                <tr>
                                                    <td>10</td>
                                                    <td>Final Check</td>
                                                    @if($employee->final_check == "Pending")
                                                    <td><i class="mdi mdi-circle text-warning"></i> {{ $employee->final_check }}</td>
                                                    @endif
                                                    @if($employee->final_check == "Approved")
                                                    <td><i class="mdi mdi-circle text-success"></i> {{ $employee->final_check }}</td>
                                                    @endif
                                                </tr>
                                                <input class="form-control" type="" id="final_status" name="final_status" value="{{ $employee->final_check }}">

                                                </tbody>
                                                <tbody id="content" class="searchData"></tbody>

                                                </table>
                                                <div class="row">
                                                <div class="col-md-4">
                                                
                                                </div>

                                               <!--  <div class="col-md-2 mb-0 d-grid text-center">
                                                    <button class="btn btn-primary toggle-disabled " type="submit" disabled>Submit </button>
                                                </div> --> 
                                                <div class="row">   
                                                <div class="col-md-3 mb-3">
                                                    <label for="status" class="form-label">Change the user final check status </label>
                                                </div>
                                                <!-- <div class="col-md-2 mb-3">
                                                    <select name="changeStatus" id="changeStatus" class="form-control select2 form-select" required>
                                                        <option value="" disabled selected hidden>Choose One</option>
                                                        <option value="Pending">Disapprove</option>
                                                        <option value="Approved">Approve</option>
                                                    </select>
                                                </div> -->
                                                <input type="checkbox" id="toggle_final" data-switch="info"/>
                                                <label for="toggle_final" data-on-label="Pending" data-off-label="Approve"></label>
                                             </div>
                                             <div class="row">
                                                <div class="col-md-5 mb-3" style="width: 38%">
                                                </div>
                                                <div class="col-md-2 mb-0 d-grid text-center">
                                                    <button class="btn btn-primary" type="submit" id="pendingButton"> </button>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-5 mb-3" style="width: 38%">
                                                </div>
                                                <div class="col-md-2 mb-0 d-grid text-center">
                                                    <button class="btn btn-primary" type="submit" id="approveButton"> </button>
                                                </div>
                                            </div>
                                                 </div>
                                </div>
                                </div>
                                <!-- Toll free number box-->
                                <div class="card text-white bg-info overflow-hidden">
                                    <!-- <div class="card-body">
                                        <div class="toll-free-box text-center">
                                             <h4> <i class="mdi mdi-deskphone"></i> Toll Free : 1-234-567-8901</h4>
                                         </div>
                                    </div> --> <!-- end card-body-->
                                </div> <!-- end card-->
                                <!-- End Toll free number box-->

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
      

<!--     //settings div rightside  
    
        <div class="rightbar-overlay"></div>
 -->        <!-- /End-bar -->


        <!-- bundle -->
        <script src="../js/js-theme/vendor.min.js"></script>
        <script src="js/js-theme/app.min.js"></script>

        <!-- third party js -->
        <script src="../js/js-theme/vendor/chart.min.js"></script>
        <!-- third party js ends -->

        <!-- demo app -->
        <script src="../js/js-theme/pages/demo.profile.js"></script>
        <!-- end demo js-->
    </body>

<!-- Mirrored from coderthemes.com/hyper/saas/pages-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 12 Aug 2022 09:07:07 GMT -->
</html>

<script>
        $( document ).ready(function() {
        $("#pendingButton").hide();
        $("#approveButton").hide(); 
        if($("#final_status").val()=="Approved"){
            $("#toggle_final").prop('checked',true);
        }
    });
        $(document).on('change keyup', '.required-input', function(e){
                let Disabled = true;
                $(".required-input").each(function() {
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
            $('#changeStatus').on('change', function () {
    // if (this.value == '1'); { No semicolon and I used === instead of ==

    if (this.value === 'Pending'){
        $("#approveButton").hide();
        $("#pendingButton").show();
        $("#pendingButton").text("Disapprove");
    } else {
        $("#approveButton").show();
        $("#approveButton").text("Approve");
        $("#approveButton").css('background-color','#727cf5');
        $("#pendingButton").hide();

    }
});
/* $('#approveButton').click(function(){
    $("#approveButton").hide();
    jQuery.ajax({
  
  url: "{{ route('approve.finalCheck') }}",
  method: 'get',
  data: {
  
 }, 
  success: function(result){
     console.log(result);
    window.location.href = "{{ route('final.check') }}"
  }});
});
$('#pendingButton').click(function(){
    $("#pendingButton").hide();
    jQuery.ajax({
  
  url: "{{ route('disApprove.finalCheck') }}",
  method: 'get',
  data: {
  
 }, 
  success: function(result){
     console.log(result);
    window.location.href = "{{ route('final.check') }}"
  }});
}); */

$('#toggle_final').click(function() {
    if ($(this).prop('checked')==true){ 
    jQuery.ajax({
  
  url: "{{ route('approve.finalCheck') }}",
  method: 'get',
  data: {
  
 }, 
  success: function(result){
     console.log(result);
    window.location.href = "{{ route('final.check') }}"
  }});
}
});
$('#toggle_final').click(function() {
    if ($(this).prop('checked')==false){ 
    jQuery.ajax({
  
  url: "{{ route('disApprove.finalCheck') }}",
  method: 'get',
  data: {
  
 }, 
  success: function(result){
     console.log(result);
    window.location.href = "{{ route('final.check') }}"
  }});
}
});
</script>
