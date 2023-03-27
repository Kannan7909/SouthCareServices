<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from coderthemes.com/hyper/saas/pages-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 12 Aug 2022 09:06:26 GMT -->
<head>
        <meta charset="utf-8" />
        <title>Delete/Deactivate Staff</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="images/images-theme/favicon.ico">

        <!-- App css -->
        <link href="css/css-theme/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="css/css-theme/app.min.css" rel="stylesheet" type="text/css" id="app-style"/>

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
                                        <img src="images/user.png" alt="user-image" class="rounded-circle">
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
                                    <h4 class="page-title">Delete Users</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title --> 
                        <div class="alert alert-success successMsg" id="successMsg"role="alert" style="display:none">
                                    Saved Successfully!
                                </div>

                    <div class="card">
                         <div class="card-body"> 
                            <div class="row">     
                            <div class="col-md-3 mb-3">
                                <label for="user" class="form-label">Select Staff Name</label>
                                <select name="user" id="user" class="form-control select2 form-select" required>
                                <option value="" disabled selected hidden>Choose a user</option>
                                @foreach ($staffs as $staff)               
                                    <option value="{{ $staff->id }}">{{ $staff->login_id }}</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="col-md-3 mb-3" id="fullName">
                                <label for="name" class="form-label">Name</label>
                                <input class="form-control" type="text" id="name" name="name" disabled required>
                            </div>
                        </div>
                    
                        <div class="row" id="deactivate-staff">
                            <div class="col-md-2 mb-3">
                            </div>
                            <div class="col-md-2 mb-0 d-grid text-center">
                                <button class="btn btn-primary" type="submit" id="deactivate-button"> Deactivate</button>
                            </div>
                 
                           <div class="col-md-2 mb-3">
                            </div>
                            <div class="col-md-2 mb-0 d-grid text-center" id="delete-staff">
                                <button class="btn btn-primary" type="submit" id="delete-button"> Delete</button>
                            </div>
                   
                        </div>
                        <div class="row" id="activate-staff">
                            <div class="col-md-2 mb-3">
                            </div>
                            <div class="col-md-2 mb-0 d-grid text-center">
                                <button class="btn btn-primary" type="submit" id="activate-button"> Activate</button>
                            </div>

                            <div class="col-md-2 mb-3">
                            </div>
                            <div class="col-md-2 mb-0 d-grid text-center" id="delete-staff-section">
                                <button class="btn btn-primary" type="submit" id="delete-staff-button"> Delete</button>
                            </div>
                        </div>
                    </div> <!-- container -->

                </div> <!-- content -->
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
        <script src="js/js-theme/vendor.min.js"></script>
        <script src="js/js-theme/app.min.js"></script>

        <!-- third party js -->
        <script src="js/js-theme/vendor/chart.min.js"></script>
        <!-- third party js ends -->

        <!-- demo app -->
        <script src="js/js-theme/pages/demo.profile.js"></script>
        <!-- end demo js-->

    </body>

<!-- Mirrored from coderthemes.com/hyper/saas/pages-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 12 Aug 2022 09:07:07 GMT -->
</html>

<script>
 $( document ).ready(function() {
    $("#fullName").hide();
    $("#delete-staff").hide();
    $("#deactivate-staff").hide();
    $("#activate-staff").hide();
 });
 $('#user').on('change', function () {
     var user = $('#user').val();
     jQuery.ajax({
        data: {
    user: user
 }, 
  url: "{{ route('get.name') }}",
  method: 'get',

  success: function(result){
     console.log(result);
     showName(result);

  }});      
});
function showName(result){
    $("#fullName").show();
    $('#name').val(result['name'])
    if(result['staff_status']=="Active"){
        $("#deactivate-staff").show();
        $("#delete-staff").show();
        $("#activate-staff").hide();
    }
    if(result['staff_status']=="Inactive"){
        $("#activate-staff").show();
        $("#delete-staff").hide();
        $("#deactivate-staff").hide();
    }
}
$('#deactivate-button').on('click', function () {
     var user = $('#user').val();
     jQuery.ajax({
        data: {
    user: user
 }, 
  url: "{{ route('deactivate.staff') }}",
  method: 'get',

  success: function(result){
     console.log("gjhg");
     window.location.href = "{{ route('delete.users') }}"
  }});      
});
$('#activate-button').on('click', function () {
     var user = $('#user').val();
     jQuery.ajax({
        data: {
    user: user
 }, 
  url: "{{ route('activate.staff') }}",
  method: 'get',

  success: function(result){
     console.log("gjhg");
     window.location.href = "{{ route('delete.users') }}"
  }});      
});
$('#delete-button').on('click', function () {
     var user = $('#user').val();
     jQuery.ajax({
        data: {
    user: user
 }, 
  url: "{{ route('delete.staff') }}",
  method: 'get',

  success: function(result){
     console.log("gjhg");
     window.location.href = "{{ route('delete.users') }}"
  }});      
});
$('#delete-staff-button').on('click', function () {
     var user = $('#user').val();
     jQuery.ajax({
        data: {
    user: user
 }, 
  url: "{{ route('delete.staff') }}",
  method: 'get',

  success: function(result){
     console.log("gjhg");
     window.location.href = "{{ route('delete.users') }}"
  }});      
});
</script>