<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from coderthemes.com/hyper/saas/pages-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 12 Aug 2022 09:06:26 GMT -->
<head>
        <meta charset="utf-8" />
        <title>Department & Role</title>
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
                                    <h4 class="page-title">Add Departments</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title --> 
                        <div>
                            @if (session()->has('success'))
                                <div class="alert alert-success">
                                <h5 class="message"> {{ session()->get('success') }} </h2>
                                </div>
                            @endif
                        </div>
    
                        <div class="card">
                                    <div class="card-body">
<!--                                     <h4 class="header-title mt-0 mb-3"> Additional Uploaded Documents</h4>
 -->                                        <p class="text-muted font-13">
                                        </p>
                            <form method="POST" action="{{ route('save.department') }}" class="department-form" id="department-form"> 
                            @csrf         
                                <div class="row">
                                    <div class="col-md-2 mb-3">
                                        <label for="department" class="form-label">Department Name</label>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                    <input class="form-control" type="text" id="department" name="department" placeholder="Enter Your Department Name" required autocomplete=off>
                                    </div>
                                </div>

                        <div class="row">
                            <div class="col-md-5 mb-3" style="margin-left:-40px;">
                            </div>
                            <div class="col-md-2 mb-0 d-grid text-center">
                                <button class="btn btn-primary" type="submit" id="submit"> Submit</button>
                            </div>
                        </div>
                        </form>
                        </div>
                    </div>

                    <!-- start page title -->
                    <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Add Roles</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title --> 

                    <div class="card">
                                    <div class="card-body">
<!--                                     <h4 class="header-title mt-0 mb-3"> Additional Uploaded Documents</h4>
 -->                                        <p class="text-muted font-13">
                                        </p>
                            <form method="POST" action="{{ route('save.role') }}" class="role-form" id="role-form"> 
                            @csrf         
                            <div class="row">   
                                <div class="col-md-3 mb-3">
                                <label for="department" class="form-label">Select Department</label>
                                    <select name="department" id="department" class="form-control select2 form-select" autocomplete=off required>
                                    <option value="" disabled selected hidden>Choose a deparment</option>
                                    @foreach ($departments as $department)               
                                        <option value="{{ $department->id }}">{{ $department->department_name }}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="col-md-1 mb-3">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="role_name" class="form-label">Role Name</label>
                                    <input class="form-control" type="text" id="role_name" name="role_name" placeholder="Enter Your Role Name" required autocomplete=off>
                                </div>
                             </div>

                        <div class="row">
                            <div class="col-md-5 mb-3" style="margin-left:-40px;">
                            </div>
                            <div class="col-md-2 mb-0 d-grid text-center">
                                <button class="btn btn-primary" type="submit" id="submit"> Submit</button>
                            </div>
                        </div>
                        </form>
                        </div>
                    </div>

                    <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Edit Department</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title --> 

                    <div class="card">
                                    <div class="card-body">
<!--                                     <h4 class="header-title mt-0 mb-3"> Additional Uploaded Documents</h4>
 -->                                        <p class="text-muted font-13">
                                        </p>
                            <form method="POST" action="{{ route('edit.department') }}" class="role-form" id="role-form"> 
                            @csrf         
                            <div class="row">   
                                <div class="col-md-3 mb-3">
                                <label for="department" class="form-label">Select Department</label>
                                    <select name="department" id="department" class="form-control select2 form-select" autocomplete=off required>
                                    <option value="" disabled selected hidden>Choose a deparment</option>
                                    @foreach ($departments as $department)               
                                        <option value="{{ $department->id }}">{{ $department->department_name }}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="col-md-1 mb-3">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="new_department" class="form-label">New Department Name</label>
                                    <input class="form-control" type="text" id="new_department" name="new_department" placeholder="Enter The New Department Name" required autocomplete=off>
                                </div>
                             </div>

                        <div class="row">
                            <div class="col-md-5 mb-3" style="margin-left:-40px;">
                            </div>
                            <div class="col-md-2 mb-0 d-grid text-center">
                                <button class="btn btn-primary" type="submit" id="submit"> Submit</button>
                            </div>
                        </div>
                        </form>
                        </div>
                    </div>

                    <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Edit Role</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title --> 

                    <div class="card">
                                    <div class="card-body">
<!--                                     <h4 class="header-title mt-0 mb-3"> Additional Uploaded Documents</h4>
 -->                                        <p class="text-muted font-13">
                                        </p>
                            <form method="POST" action="{{ route('edit.role') }}" class="role-form" id="role-form"> 
                            @csrf         
                            <div class="row">   
                                <div class="col-md-3 mb-3">
                                <label for="department_name" class="form-label">Select Department</label>
                                    <select name="department_name" id="department_name" class="form-control select2 form-select" autocomplete=off required>
                                    <option value="" disabled selected hidden>Choose a deparment</option>
                                    @foreach ($departments as $department)               
                                        <option value="{{ $department->id }}">{{ $department->department_name }}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="col-md-1 mb-3">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="role" class="form-label">Select Role</label>
                                    <select name="role" id="role" class="form-control select2 form-select" autocomplete=off required>
                                        <option value="" disabled selected hidden>Choose a role</option>
                                       
                                    </select>
                                </div>
                                <div class="col-md-1 mb-3">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="new_role" class="form-label">New Role Name</label>
                                    <input class="form-control" type="text" id="new_role" name="new_role" placeholder="Enter The New Role Name" required autocomplete=off>
                                </div>
                             </div>

                        <div class="row">
                            <div class="col-md-5 mb-3" style="margin-left:-40px;">
                            </div>
                            <div class="col-md-2 mb-0 d-grid text-center">
                                <button class="btn btn-primary" type="submit" id="submit"> Submit</button>
                            </div>
                        </div>
                        </form>
                        </div>
                    </div>
                    <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Delete Department</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title --> 

                    <div class="card">
                                    <div class="card-body">
<!--                                     <h4 class="header-title mt-0 mb-3"> Additional Uploaded Documents</h4>
 -->                                        <p class="text-muted font-13">
                                        </p>
                            <form method="POST" action="{{ route('delete.department') }}" class="role-form" id="role-form"> 
                            @csrf         
                            <div class="row">   
                                <div class="col-md-3 mb-3">
                                <label for="department" class="form-label">Select Department</label>
                                    <select name="department" id="department" class="form-control select2 form-select" autocomplete=off required>
                                    <option value="" disabled selected hidden>Choose a deparment</option>
                                    @foreach ($departments as $department)               
                                        <option value="{{ $department->id }}">{{ $department->department_name }}</option>
                                    @endforeach
                                    </select>
                                </div>
                             </div>

                        <div class="row">
                            <div class="col-md-5 mb-3" style="margin-left:-40px;">
                            </div>
                            <div class="col-md-2 mb-0 d-grid text-center">
                                <button class="btn btn-primary" type="submit" id="submit"> Submit</button>
                            </div>
                        </div>
                        </form>
                        </div>
                    </div>
                    <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Delete Role</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title --> 

                    <div class="card">
                                    <div class="card-body">
<!--                                     <h4 class="header-title mt-0 mb-3"> Additional Uploaded Documents</h4>
 -->                                        <p class="text-muted font-13">
                                        </p>
                            <form method="POST" action="{{ route('delete.role') }}" class="role-form" id="role-form"> 
                            @csrf         
                            <div class="row">   
                                <div class="col-md-3 mb-3">
                                <label for="delete_department" class="form-label">Select Department</label>
                                    <select name="delete_department" id="delete_department" class="form-control select2 form-select" autocomplete=off required>
                                    <option value="" disabled selected hidden>Choose a deparment</option>
                                    @foreach ($departments as $department)               
                                        <option value="{{ $department->id }}">{{ $department->department_name }}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="col-md-1 mb-3">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="delete_role" class="form-label">Select Role</label>
                                    <select name="delete_role" id="delete_role" class="form-control select2 form-select" autocomplete=off required>
                                        <option value="" disabled selected hidden>Choose a role</option>
                                       
                                    </select>
                                </div>
                             </div>

                        <div class="row">
                            <div class="col-md-5 mb-3" style="margin-left:-40px;">
                            </div>
                            <div class="col-md-2 mb-0 d-grid text-center">
                                <button class="btn btn-primary" type="submit" id="submit"> Submit</button>
                            </div>
                        </div>
                        </form>
                        </div>
                    </div>
                    
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
    $(document).ready(function(){
         //alert("hgh")
     });
$('#department_name').on('change', function () {
    var department= $("#department_name").val()
     $.ajax({
        url: "{{route('get.role')}}",
        method: 'get',
        data: {department:department},
        success: function(result){
            console.log(result);
            getRoleSuccess(result);
        }
       
      }); 
    });
    function getRoleSuccess(result){
        document.getElementById("role").options.length = 0;
       for (let i = 0; i < result.length; i++) {
            console.log(result[i]);
            var role = document.getElementById("role");
	        role.options[role.options.length] = new Option(result[i]['role_name'], result[i]['id']);          
        }
           }
    $('#delete_department').on('change', function () {
    var department= $("#delete_department").val()
     $.ajax({
        url: "{{route('get.role')}}",
        method: 'get',
        data: {department:department},
        success: function(result){
            console.log(result);
            getDeleteRoleSuccess(result);
        }
       
      }); 
    });
    function getDeleteRoleSuccess(result){
        document.getElementById("delete_role").options.length = 0;
       for (let i = 0; i < result.length; i++) {
            console.log(result[i]);
            var role = document.getElementById("delete_role");
	        role.options[role.options.length] = new Option(result[i]['role_name'], result[i]['id']);          
        }
           }
</script>