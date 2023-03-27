<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <title>Admin Side Navigation Menu</title>
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

<body>
     <!-- ========== Left Sidebar Start ========== -->
     <div class="leftside-menu">

<!-- LOGO -->
   <a href="index.html" class="logo text-center logo-dark">
       <span class="logo-lg">
           <img src="images/images-theme/logo-dark.png" alt="" height="16">
       </span>
       <span class="logo-sm">
           <img src="images/images-theme/logo_sm_dark.png" alt="" height="16">
       </span>
   </a>

   <div class="h-100" id="leftside-menu-container" data-simplebar>

<!--- Sidemenu -->
<ul class="side-nav">

    <li class="side-nav-title side-nav-item">Navigation</li>



   <li class="side-nav-item">
        <a href="{{ route('admin.dashboard') }}" class="side-nav-link">
            <i class="uil-home"></i>
            <span> Home </span>
        </a>
    </li>

    <li class="side-nav-item">
        <a href="{{ route('employee.list') }}" class="side-nav-link">
        <i class="uil-user-circle"></i>
            <span> All Users </span>
        </a>
    </li>
    
     <li class="side-nav-item">
        <a href="{{ route('application.list') }}" class="side-nav-link">
        <i class="uil-file-plus-alt"></i>
            <span> Application Status </span>
        </a>
    </li>
    
     <li class="side-nav-item">
        <a href="{{ route('training.list') }}" class="side-nav-link">
        <i class="uil-books"></i>
            <span> Training Status </span>
        </a>
    </li>
    
    <li class="side-nav-item">
        <a href="{{ route('reference.list') }}" class="side-nav-link">
        <i class="uil-users-alt"></i>
            <span> Reference Status </span>
        </a>
    </li>

    <li class="side-nav-item">
        <a href="{{ route('health.list') }}" class="side-nav-link">
        <i class="uil-medical-square"></i>
            <span> Health Status </span>
        </a>
    </li>
    
    <li class="side-nav-item">
        <a href="{{ route('dbs.list') }}" class="side-nav-link">
        <i class="uil-file-bookmark-alt"></i>
            <span> DBS Status </span>
        </a>
    </li>

    <li class="side-nav-item">
        <a href="{{ route('bank.list') }}" class="side-nav-link">
        <i class="uil-moneybag"></i>
            <span> Bank Status </span>
        </a>
    </li>

    <li class="side-nav-item">
        <a href="{{ route('starter.list') }}" class="side-nav-link">
        <i class="uil-check-circle"></i>
            <span> Starter Status </span>
        </a>
    </li>

    <li class="side-nav-item">
        <a href="{{ route('contract.list') }}" class="side-nav-link">
        <i class="uil-file-contract-dollar"></i>
            <span> Contract Status </span>
        </a>
    </li>
    
    <li class="side-nav-item">
        <a href="{{ route('final.check') }}" class="side-nav-link">
        <i class="uil-check"></i>
            <span> Final Check </span>
        </a>
    </li>
    
    <li class="side-nav-item">
        <a data-bs-toggle="collapse" href="#sidebarDashboards" aria-expanded="false" aria-controls="sidebarDashboards" class="side-nav-link">
            <i class="uil-calendar-alt"></i>
            <span> Induction </span>
            <span class="menu-arrow"></span>
        </a>
        <div class="collapse" id="sidebarDashboards">
            <ul class="side-nav-second-level">
                <li>
                    <a href="{{ route('induction.phase1Details') }}">View Induction</a>
                </li>
                <li>
                    <a href="{{ route('induction.list') }}">Induction List</a>
                </li>
                <li>
                    <a href="{{ route('induction.addphase1') }}">Create Induction</a>
                </li>
                <li>
                    <a href="{{ route('checklist.list') }}">Checklist Status</a>
                </li>
            </ul>
        </div>
    </li>


    <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarEmail" aria-expanded="false" aria-controls="sidebarEmail" class="side-nav-link">
                                <i class="uil-edit"></i>
                                <span> Editor </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarEmail">
                                <ul class="side-nav-second-level">
                                    <li>
                                    <a href="{{ route('policy.template') }}">Terms & Conditions</a>
                                    </li>
                    
                                    <li>
                                        <a href="{{ route('contract.template') }}">Contract Content</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('payrate.template') }}">Pay Rates</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                     <!--     <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarAdmin" aria-expanded="false" aria-controls="sidebarEmail" class="side-nav-link">
                                <i class="dripicons-gear"></i>
                                <span> Admin Mangement </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarAdmin">
                                <ul class="side-nav-second-level">
                                    <li>
                                    <a href="{{ route('add.roles') }}">Department & Role</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('staff.list') }}">View/Edit Staff</a>
                                    </li>
                                    <li>
                                    <a href="{{ route('add.users') }}">Add Staff</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('delete.users') }}">Delete/De-activate</a>
                                    </li>
                                </ul>
                            </div>
                        </li> -->
    
    


   </ul>

<!-- Help Box -->
<!--     <div class="help-box text-white text-center">
    <a href="javascript: void(0);" class="float-end close-btn text-white">
        <i class="mdi mdi-close"></i>
    </a>
    <img src="images/images-theme/help-icon.svg" height="90" alt="Helper Icon Image" />
    <h5 class="mt-3">Unlimited Access</h5>
    <p class="mb-3">Upgrade to plan to get access to unlimited reports</p>
    <a href="javascript: void(0);" class="btn btn-secondary btn-sm">Upgrade</a>
</div> -->
<!-- end Help Box -->
<!-- End Sidebar -->

<div class="clearfix"></div>

</div>
<!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->

</body>
</html>