<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from coderthemes.com/hyper/saas/pages-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 12 Aug 2022 09:06:26 GMT -->
<head>
        <meta charset="utf-8" />
        <title>New Induction</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="images/images-theme/favicon.ico">

        <!-- App css -->
        <link href="css/css-theme/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="css/css-theme/app.min.css" rel="stylesheet" type="text/css" id="app-style"/>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" rel="stylesheet" />
	
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    </head>

    <body class="loading" data-layout-color="light" data-leftbar-theme="dark" data-layout-mode="fluid" data-rightbar-onstart="true">
        <!-- Begin page -->
        <div class="wrapper">
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
                                    <span class="account-user-name"><strong>{{ $employee->surname }} {{ $employee->firstname }}</strong></span>
                                     <span class="account-position">{{ $employee->login_id }}</span> 
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
                                    <!-- <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Hyper</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                                            <li class="breadcrumb-item active">Profile 2</li>
                                        </ol>
                                    </div> -->
                                    <h4 class="page-title"> OFFICE INDUCTION </h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title --> 


                        
                        <div class="row">
                            <div class="col-xl-2"></div>
                            <div class="col-xl-6">
                                <!-- Personal-Information -->
                                <div class="card">
                                    <div class="card-body">
                                    <h4 class="header-title mt-0 mb-3">Add Data</h4>
                                        <p id="induction_info" class="text-muted font-13">
                                        </p>

                                        <hr>

                                    <div class="text-start" id="formInfo">
                                        <div class="row">
                                            
                                            
                                            <div class="col-md-12">
                                                 <form  method="POST" action="{{ route('add.inductionPhase1') }}" >
                                                     {{ csrf_field() }}
                                                     <div >
                                                       Choose Induction Date: <input type="date" name="inductionDate1" id="inductionDate1" class="form-control required-personal" required>
                                                    </div><br>
                                                    
                                                    <div >
                                                       Choose Induction Time: <input type="time" name="inductionTime1" id="inductionTime1" class="form-control required-personal" required>
                                                    </div><br>
                                                    
                                                    <div >
                                                    Induction Limit: <input type="number" name="inductionLimit1" id="inductionLimit1" class="form-control required-personal" required>
                                                    </div><br>
                                                    
                                                    <input type="submit" value="Submit" class="btn btn-primary toggle-disabled" name="submit" id="submit" />
                                                </form> 
                                            </div>
                                           
                                        </div>
                                       
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
