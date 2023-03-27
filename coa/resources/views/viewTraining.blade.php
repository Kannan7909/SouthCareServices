<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from coderthemes.com/hyper/saas/pages-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 12 Aug 2022 09:06:26 GMT -->
<head>
        <meta charset="utf-8" />
        <title>Training View</title>
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
                                    <span class="account-user-name"><strong>{{ $loggedUser->firstname }} {{ $loggedUser->surname }} </strong></span>
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
                                    <h4 class="page-title">Training Status</h4>
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
                                                 <p class="text-muted"><strong>Surname :</strong> <span class="ms-2">{{ $user->surname }}</span></p>
                                            </div>
                                            <div class="col-md-4">
                                                 <p class="text-muted"><strong>First Name :</strong> <span class="ms-2">{{ $user->firstname }}</span></p>
                                            </div>
                                            <div class="col-md-4">
                                                <p class="text-muted"><strong>Post Applied For :</strong><span class="ms-2">{{ $user->posts }}</span></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <p class="text-muted"><strong>Address-1 :</strong> <span class="ms-2">{{ $user->address1 }}</span></p>
                                            </div>
                                            <div class="col-md-4">
                                                <p class="text-muted"><strong>Address-2 :</strong> <span class="ms-2">{{ $user->address2 }}</span></p>
                                            </div>
                                            <div class="col-md-4">
                                            <p class="text-muted"><strong>Address-3 :</strong>
                                                <span class="ms-2"> {{ $user->address3 }} </span>
                                            </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <p class="text-muted"><strong>Post Town:</strong> <span class="ms-2">{{ $user->postTown }}</span></p>
                                            </div>
                                            <div class="col-md-4">
                                            <p class="text-muted"><strong>Postcode :</strong>
                                                <span class="ms-2"> {{ $user->postcode }} </span>
                                            </p>
                                            </div>
                                            <div class="col-md-4">
                                            <p class="text-muted"><strong>User Name :</strong><span class="ms-2">{{ $user->login_id }}</span></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                            <p class="text-muted"><strong>Mobile No. :</strong> <span class="ms-2">{{ $user->contact_no }}</span></p>
                                            </div>
                                            <div class="col-md-4">
                                            <p class="text-muted"><strong>Whatsapp No. :</strong><span class="ms-2">{{ $user->uk_contact_no }}</span></p>
                                            </div>
                                            <div class="col-md-4">
                                            <p class="text-muted"><strong>Email :</strong> <span class="ms-2">{{ $user->email }}</span></p>
                                            <input class="form-control" type="hidden" id="userEmail" name="userEmail" value= "{{ $user->email }}" required>
                                            </div>
                                         </div>
                                         <div class="row">
                                            <div class="col-md-4">
                                            <p class="text-muted"><strong>T&C Status :</strong> 
                                                @if( $user->policy_agree =="yes")
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
                                           <!--  <p class="text-muted mb-0" id="tooltip-container"><strong>Elsewhere :</strong>
                                                <a class="d-inline-block ms-2 text-muted" data-bs-container="#tooltip-container" data-bs-placement="top" data-bs-toggle="tooltip" href="#" title="Facebook"><i class="mdi mdi-facebook"></i></a>
                                                <a class="d-inline-block ms-2 text-muted" data-bs-container="#tooltip-container" data-bs-placement="top" data-bs-toggle="tooltip" href="#" title="Twitter"><i class="mdi mdi-twitter"></i></a>
                                                <a class="d-inline-block ms-2 text-muted" data-bs-container="#tooltip-container" data-bs-placement="top" data-bs-toggle="tooltip" href="#" title="Skype"><i class="mdi mdi-skype"></i></a>
                                            </p> -->

                                        </div>
                                    </div>
                                </div>
                                <!-- Personal-Information -->

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


                        <div class="row">
                            <div class="col-xl-12">
                                <!-- Training-Information -->
                                <div class="card">
                                    <div class="card-body">
                                    <h4 class="header-title mt-0 mb-3">Uploaded Documents Details</h4>
                                        <p class="text-muted font-13">
                                        </p>
                                        <hr>
                                         
                                    <div class="text-start">
<!--                                     <div class="mt-0 mb-3"><b>Uploaded Documents</b></div>
 -->                                    <table class="table table-striped  dt-responsive nowrap w-100"">
                                                <tr>
                                                <thead>
                                                <th>#</th>
                                                <th>Documents</th>
                                                 <th>File Preview</th>
                                                 <th>Expiry Date</th>
                                                </thead>
                                                  </tr>     
                                                 <tbody class="allData">
                                                 @if(count($employee) == 0)
                                                 <tr>
                                                    <td align="center" colspan="10">No Data Found</td>
                                                </tr>
                                                @else
                                                 @foreach ($employee as $employee)
                                                <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                        
                                                     <td>{{ $employee->file_type}}</td>
                                                     <td>
                                                    <div id="filepreview" class="displaynone"> 
                                                        <i class="fa fa-file" aria-hidden="true" style="color:blue;font-size: 1.95em;"></i>
                                                     <a target="_blank" href="{{ $employee->file_path}}" class="displaynone" data-toggle="tooltip" data-placement="right" title="Click here to view">{{ $employee->file_name}}</a> 
  <!--                                                  <a target="_blank" href="{{ $employee->file_path}}" class="displaynone" data-toggle="tooltip" data-placement="right" title="Click here to view"><img src="../images/documentView.png" alt="user-image" style="width:40px" class="rounded-circle"></a> 
 -->                                                    </div> 
                                                    </td>
                                                    <td>{{ $employee->expiry_date}}</td>
                                                </tr> 
                                                @endforeach
                                                @endif
                                                </tbody>                  
                                                </table>
                                                </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                    </br>
                                    <div class="row">   
                                                <div class="col-md-12 mb-3">
                                                <p class="text-muted"><strong>Current status of the user :</strong><span class="ms-2">{{ $trainingEmployee[0]->training_status }}</span></p>
                                                </div>
                                                <input class="form-control" type="hidden" id="created_by" name="created_by" value="{{ $loggedUser->firstname }} {{ $loggedUser->surname }}">
                                            </div>
                                            <div id="comment_history"><h4 class="header-title mt-0 mb-3">Comment History</h4></div>
                                                    <p class="text-muted font-13">
                                                    </p>

                                    <div class="text-start">
                                    <table  class="table table-striped dt-responsive nowrap w-100">
                                    <thead> 
                                                <tr>
                                                <th>#</th>
                                                <th>Comment</th>
                                                <th>Created By</th>
                                                <th>Created At</th>
                                                 </tr> 
                                        </thead> 
                                                 <tbody class="allData">
                                                 @if(count($comments) == 0)
                                                 <tr>
                                                    <td align="center" colspan="10">No Data Found</td>
                                                </tr>
                                                @else

                                                 @foreach ($comments as $comment)
                                                 
                                                <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                 <td>{{ $comment->comment}}</td>
                                                 <td>{{ $comment->created_by}}</td>
                                                 <td>{{ $comment->created_at}}</td>
                                                </tr> 
                                                @endforeach
                                                @endif
                                                </tbody>      
                                                </table>
                                        </div>
                                            <div class="col-md-8">
                                                    <textarea  class="form-control required-personal" id="training_comments" name="training_comments"  rows="3"  placeholder="Enter Your Comment"  autocomplete=off></textarea>
                                            </div> </br>
                                            <div class="row">   
                                                <div class="col-md-3 mb-3">
                                                    <label for="status" class="form-label">Change the status of the user </label>
                                                </div>
                                                <div class="col-md-2 mb-3">
                                                    <select name="changeStatus" id="changeStatus" class="form-control select2 form-select"  autocomplete=off required>
                                                        <option value="" disabled selected hidden>Choose One</option>
                                                        <option value="Reviewed">Under Review</option>
                                                        <option value="Approved">Approve</option>
                                                    </select>
                                                </div>
                                             </div>
                                             <div class="row">
                                                <div class="col-md-5 mb-3" style="width: 38%">
                                                </div>
                                                <div class="col-md-2 mb-0 d-grid text-center">
                                                    <button class="btn btn-primary" type="submit" id="reviewButton"> </button>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-5 mb-3" style="width: 38%">
                                                </div>
                                                <div class="col-md-2 mb-0 d-grid text-center">
                                                    <button class="btn btn-primary" type="submit" id="approveButton"> </button>
                                                </div>
                                            </div>

                                            <h4 id="mailSend" class="mailSend text-center">Please Wait, Email Sending...</h3>
                                        </div>
                                    </div>
                                
                                <!-- Training-Information -->

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
        <script src="../js/js-theme/app.min.js"></script>

        <!-- third party js -->
        <script src="../js/js-theme/vendor/chart.min.js"></script>
        <!-- third party js ends -->

        <!-- demo app -->
        <script src="../js/js-theme/pages/demo.profile.js"></script>
        <!-- end demo js-->
    </body>

<!-- Mirrored from coderthemes.com/hyper/saas/pages-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 12 Aug 2022 09:07:07 GMT -->
</html>

<!-- 
   //Jquery worked in local but not in cpanel 
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
 -->
<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>

<script>
 $(document).ready(function(){
        $("#reviewButton").hide();
        $("#approveButton").hide();
        $("#mailSend").hide();
    });

    $('#changeStatus').on('change', function () {
    // if (this.value == '1'); { No semicolon and I used === instead of ==

    if (this.value === 'Reviewed'){
        $("#approveButton").hide();
        $("#reviewButton").show();
        $("#reviewButton").text("Submit");
    } else {
        $("#approveButton").show();
        $("#approveButton").text("Submit");
        $("#approveButton").css('background-color','#727cf5');
        $("#reviewButton").hide();

    }
});
$('#approveButton').click(function(){
    $("#approveButton").hide();
    $("#mailSend").show();
    $("#mailSend").css('color','#727cf5');
    var email=$("#userEmail").val();
    var comment_section = "Training";
    var comment=$("#training_comments").val();
    if(comment==""){
        comment="Nil";
    }
    var created_by=$("#created_by").val();
    jQuery.ajax({
  
  url: "{{ route('approve.training') }}",
  method: 'get',
  data: {
    email :  email,
    comment: comment,
    comment_section: comment_section,
    created_by: created_by
 }, 
  success: function(result){
     console.log(result);
    // successFunction();
    window.location.href = "{{ route('training.list') }}"

  }});
});
function successFunction(result){
    $("#approveButton").css('background-color','green');
    $("#approveButton").text("Approved");

}
$('#reviewButton').click(function(){
    $("#reviewButton").hide();
    $("#mailSend").show();
    $("#mailSend").css('color','#727cf5');
    var email=$("#userEmail").val();
    var comment_section = "Training";
    var comment=$("#training_comments").val();
    if(comment==""){
        comment="Nil";
    }
    var created_by=$("#created_by").val();
    jQuery.ajax({
  
  url: "{{ route('review.training') }}",
  method: 'get',
    data: {
    email :  email,
    comment: comment,
    comment_section: comment_section,
    created_by: created_by
 },  
  success: function(result){
     console.log(result);
    window.location.href = "{{ route('training.list') }}"

  }});
});

</script>