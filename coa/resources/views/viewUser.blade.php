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
                                    <h4 class="page-title">Profile</h4>
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
                                                    @if($inductionStatus[0]->status == "Cancelled")
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

                                                </tbody>
                                                <tbody id="content" class="searchData"></tbody>

                                                </table>
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
