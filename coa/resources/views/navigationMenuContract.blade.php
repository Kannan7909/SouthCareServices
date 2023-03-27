<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <title>Side Navigation Menu</title>
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
        <a href="{{ route('user.dashboard') }}" class="side-nav-link">
            <i class="uil-home"></i>
            <span> Home </span>
        </a>
    </li>

    <li class="side-nav-item">
        <a href="{{ route('application.form') }}" class="side-nav-link">
            <i class="uil-file-plus-alt "></i>
            <span> Application  </span>
        </a>
    </li>

    <li class="side-nav-item">
        <a href="{{ route('training.form') }}" class="side-nav-link">
            <i class="uil-books"></i>
            <span> Training  </span>
        </a>
    </li>

    <li class="side-nav-item">
        <a href="{{ route('dbs.check') }}" class="side-nav-link">
            <i class="uil-file-bookmark-alt "></i>
            <span> DBS  </span>
        </a>
    </li>

    <li class="side-nav-item">
        <a href="{{ route('reference.form') }}" class="side-nav-link">
            <i class="uil-users-alt "></i>
            <span> Reference </span>
        </a>
    </li>

    <li class="side-nav-item">
        <a href="{{ route('show.health') }}" class="side-nav-link">
            <i class="uil-medical-square "></i>
            <span> Health Check</span>
        </a>
    </li>

    <li class="side-nav-item">
        <a href="{{route('bank.details')}}" class="side-nav-link">
            <i class="uil-moneybag"></i>
            <span> Bank Details </span>
        </a>
    </li>

    <li class="side-nav-item">
        <a href="{{route('starter.checklist')}}" class="side-nav-link">
            <i class="uil-check-circle"></i>
            <span> Starter Checklist </span>
        </a>
    </li>

    <li class="side-nav-item">
        <a href="{{route('induction.employee')}}" class="side-nav-link">
            <i class="uil-calendar-alt"></i>
            <span> Induction </span>
        </a>
    </li>

<!--     <li class="side-nav-item">
        <a href="{{route('induction.checklist')}}" class="side-nav-link">
            <i class="uil-presentation-check"></i>
            <span> Induction Checklist </span>
        </a>
    </li> -->

    <li class="side-nav-item">
        <a href="{{route('contract.form')}}" class="side-nav-link">
            <i class="uil-file-contract-dollar"></i>
            <span> Employee Contract </span>
        </a>
    </li>

    <li class="side-nav-item">
        <a href="{{route('all.documents')}}" class="side-nav-link">
            <i class="uil-file-download-alt"></i>
            <span> All Documents </span>
        </a>
    </li>
    <!--<li class="side-nav-item">
        <a href="#" class="side-nav-link">
            <i class="uil-copy-alt"></i>
            <span> All Documents </span>
        </a>
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