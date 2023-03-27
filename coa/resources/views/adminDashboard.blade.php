<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from coderthemes.com/hyper/saas/pages-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 12 Aug 2022 09:06:26 GMT -->
<head>
        <meta charset="utf-8" />
        <title>Admin Dashboard</title>
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
                                    <span class="account-user-name"><strong> {{ $employee->firstname }} {{ $employee->surname }}</strong></span>
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
                            <div class="col-md-5">
                                <div class="page-title-box">                                   
                                    <h4 class="page-title">Dashboard</h4>
                                </div>
                            </div>
                            <!-- <div class="app-search dropdown d-none d-lg-block col-xl-3" style="margin-top: 18px;">
                                <form>
                                    <div class="input-group">
                                        <input type="text" class="form-control dropdown-toggle"  placeholder="Search..." id="search" name="search">
                                        <span class="mdi mdi-magnify search-icon"></span>
                                </div>
                                </form>
                            </div>
                            <div class="col-md-3">
                                <div class="page-title-box">                                   
                                <label for="status_filter" style="margin-top: 27px;">Status Filter</label>
                                <select name="filter_status" id="filter_status" class="" required style="background-color:#f1f3fa">
                                    <option value="" disabled selected hidden>Choose Filter Status</option>
                                    <option value="bank_pending"> Bank Pending</option>
                                    <option value="bank_submitted"> Bank Submitted</option>
                                    <option value="bank_under Review">Bank Under Review </option>
                                    <option value="bank_approved"> Bank Approved</option>
                                </select>   
                                </div>
                            </div> -->
                           
                        </div>
                        <!-- end page title --> 


                        <div class="row">
                            <div class="col-xl-12">
                                <!-- training-Information -->
                                <!-- <div class="card">
                                    <div class="card-body">
                                    <form method="POST" action="{{ route('filter.countUser') }}" class="contract-form" id="contract-form">
                                    @csrf  
                                    <div class="row">
                                        <div class="col-md-3 mb-3">
                                            <label for="date">From Date </label></br>
                                            <input type="date" class="form-control date" id="from_date" name="from_date"  required autocomplete=off>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="date">To Date </label></br>
                                            <input type="date" class="form-control date" id="to_date" name="to_date"  required autocomplete=off>
                                        </div>
                                        <div class="col-md-2 mb-3">
                                            <button class="form-control btn btn-primary" type="submit" id="submit" style="margin-top: 20px;"> Submit</button>
                                        </div>
                                     </div>
                                    </form>
                                    </div>
                                </div>
 -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card widget-inline">
                                    <div class="card-body p-0">
                                        <div class="row g-0">
                                            <div class="col-sm-6 col-lg-3">
                                                <div class="card shadow-none m-0">
                                                    <div class="card-body text-center">
                                                        <i class="uil-user-circle text-muted iconUser"></i>
                                                        <h3><span style="color:blue">{{ $countUser }}</span></h3>
                                                        <p class="text-muted font-15 mb-0"><a href="{{ route('employee.list') }}" style="color:black">Total Registered Users</a></p>
                                                    </div>
                                                </div>
                                            </div>
                
                                            <div class="col-sm-6 col-lg-3">
                                                <div class="card shadow-none m-0 border-start">
                                                    <div class="card-body text-center">
                                                        <i class="uil-books text-muted iconTraining"></i>
                                                        <h3><span style="color:red">{{ $countTrainingRequest }}</span></h3>
                                                        <p class="text-muted font-15 mb-0"><a href="{{ route('training.list') }}" style="color:black">Total Training Request</a></p>
                                                    </div>
                                                </div>
                                            </div>
                
                                            <div class="col-sm-6 col-lg-3">
                                                <div class="card shadow-none m-0 border-start">
                                                    <div class="card-body text-center">
                                                        <i class="uil-file-bookmark-alt text-muted iconDBS"></i>
                                                        <h3><span style="color:red">{{ $countDBSRequest }}</span></h3>
                                                        <p class="text-muted font-15 mb-0"><a href="{{ route('dbs.list') }}" style="color:black">Total DBS Request</a></p>
                                                    </div>
                                                </div>
                                            </div>
                
                                            <div class="col-sm-6 col-lg-3">
                                                <div class="card shadow-none m-0 border-start">
                                                    <div class="card-body text-center">
                                                        <i class="uil-calendar-alt text-muted iconInduction"></i>
                                                        <h3><span style="color:red">{{ $countInductionRequest }}</span> <!-- <i class="mdi mdi-arrow-up text-success"></i> --></h3>
                                                        <p class="text-muted font-15 mb-0"><a href="{{ route('induction.phase1Details') }}" style="color:black">Total Induction Request</a></p>
                                                    </div>
                                                </div>
                                            </div>
                
                                        </div> <!-- end row -->
                                    </div>
                                </div> <!-- end card-box-->
                            </div> <!-- end col-->
                        </div>
                        <!-- end row-->

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h4 class="header-title">Application Status</h4>
                                            <div class="dropdown">
                                                <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="mdi mdi-dots-vertical"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <!-- item-->
                                                    <a href="{{ route('application.list') }}" class="dropdown-item">View</a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mt-3 mb-4 chartjs-chart" style="height: 207px;">
                                            <canvas id="application-status-chart" data-colors="#0acf97,#727cf5,#fa5c7c"></canvas>
                                        </div>

                                        <div class="row text-center mt-2 py-2">
                                            <div class="col-sm-4">
                                                <div class="my-2 my-sm-0">
                                                        <i class="mdi mdi-trending-up text-primary mt-3 h3"></i>
                                                    <h3 class="fw-normal">
                                                        <span>{{ $countApplicationSubmitted }}</span>
                                                    </h3>
                                                    <p class="text-muted mb-0">Submitted</p>
                                                </div>
                                                
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="my-2 my-sm-0">
                                                        <i class="mdi mdi-trending-up text-danger mt-3 h3"></i>
                                                    <h3 class="fw-normal">
                                                        <span>{{ $countApplicationReviewed }}</span>
                                                    </h3>
                                                    <p class="text-muted mb-0"> In-review</p>
                                                </div>
                                                
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="my-2 my-sm-0">
                                                        <i class="mdi mdi-trending-up text-success mt-3 h3"></i>
                                                    <h3 class="fw-normal">
                                                        <span>{{ $countApplicationApproved }}</span>
                                                    </h3>
                                                    <p class="text-muted mb-0"> Approved</p>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <!-- end row-->

                                    </div> <!-- end card body-->
                                </div> <!-- end card -->
                            </div><!-- end col-->
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h4 class="header-title">Training Status</h4>
                                            <div class="dropdown">
                                                <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="mdi mdi-dots-vertical"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <!-- item-->
                                                    <a href="{{ route('training.list') }}" class="dropdown-item">View</a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mt-3 mb-4 chartjs-chart" style="height: 207px;">
                                            <canvas id="training-status-chart" data-colors="#0acf97,#727cf5,#fa5c7c"></canvas>
                                        </div>

                                        <div class="row text-center mt-2 py-2">
                                            <div class="col-sm-4">
                                                <div class="my-2 my-sm-0">
                                                        <i class="mdi mdi-trending-up text-primary mt-3 h3"></i>
                                                    <h3 class="fw-normal">
                                                        <span>{{ $countTrainingSubmitted }}</span>
                                                    </h3>
                                                    <p class="text-muted mb-0">Submitted</p>
                                                </div>
                                                
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="my-2 my-sm-0">
                                                        <i class="mdi mdi-trending-up text-danger mt-3 h3"></i>
                                                    <h3 class="fw-normal">
                                                        <span>{{ $countTrainingReviewed }}</span>
                                                    </h3>
                                                    <p class="text-muted mb-0"> In-review</p>
                                                </div>
                                                
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="my-2 my-sm-0">
                                                        <i class="mdi mdi-trending-up text-success mt-3 h3"></i>
                                                    <h3 class="fw-normal">
                                                        <span>{{ $countTrainingApproved }}</span>
                                                    </h3>
                                                    <p class="text-muted mb-0"> Approved</p>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <!-- end row-->

                                    </div> <!-- end card body-->
                                </div> <!-- end card -->
                            </div><!-- end col-->
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h4 class="header-title">Reference Status</h4>
                                            <div class="dropdown">
                                                <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="mdi mdi-dots-vertical"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <!-- item-->
                                                    <a href="{{ route('reference.list') }}" class="dropdown-item">View</a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mt-3 mb-4 chartjs-chart" style="height: 207px;">
                                            <canvas id="reference-status-chart" data-colors="#0acf97,#727cf5,#fa5c7c"></canvas>
                                        </div>

                                        <div class="row text-center mt-2 py-2">
                                            <div class="col-sm-4">
                                                <div class="my-2 my-sm-0">
                                                        <i class="mdi mdi-trending-up text-primary mt-3 h3"></i>
                                                    <h3 class="fw-normal">
                                                        <span>{{ $countReferenceSubmitted }}</span>
                                                    </h3>
                                                    <p class="text-muted mb-0">Submitted</p>
                                                </div>
                                                
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="my-2 my-sm-0">
                                                        <i class="mdi mdi-trending-up text-danger mt-3 h3"></i>
                                                    <h3 class="fw-normal">
                                                        <span>{{ $countReferenceReviewed }}</span>
                                                    </h3>
                                                    <p class="text-muted mb-0"> In-review</p>
                                                </div>
                                                
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="my-2 my-sm-0">
                                                        <i class="mdi mdi-trending-up text-success mt-3 h3"></i>
                                                    <h3 class="fw-normal">
                                                        <span>{{ $countReferenceApproved }}</span>
                                                    </h3>
                                                    <p class="text-muted mb-0"> Approved</p>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <!-- end row-->
                                    </div> <!-- end card body-->
                                </div> <!-- end card -->
                            </div><!-- end col-->
                            </div>
                        <!-- end row-->
                    <div class="row">
                        <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <h4 class="header-title">Employee Contract</h4>
                                            <div class="dropdown">
                                                <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="mdi mdi-dots-vertical"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <!-- item-->
                                                    <a href="{{ route('contract.list') }}" class="dropdown-item">View</a>
                                                </div>
                                            </div>
                                        </div>

                                         <p><b></b> Latest 5 records</p>
 
<!--                                         <div class="table-responsive">
 -->                                 <div class="">    
                                       <table class="table table-centered table-nowrap table-hover mb-0">
                                            <thead>   
                                                <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Mobile No.</th>
                                                <th>Whatsapp No.</th>
                                                <th>Email</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                                 </tr>
                                             </thead>                  
                                                 <tbody class="allData">
                                                 @if(count($contractData) == 0)
                                                 <tr>
                                                    <td align="center" colspan="10">No Data Found</td>
                                                </tr>
                                                @else
                                                 @foreach ($contractData as $employee)
                                                <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                    <td>
                                                        <b>{{ $employee->firstname }} {{ $employee->surname }}</b></br>
                                                         <span class="">{{ $employee->posts }}</span>
                                                    </td>
                                                    <td><b>{{ $employee->contact_no }}</b></td>
                                                    <td><b>{{ $employee->uk_contact_no }}</b></td>                                                    
                                                    <td><b>{{ $employee->email }}</b></td>
                                                    @if($employee->employee_contract == "Submitted")
                                                    <td>
                                                    <span class="badge badge-primary-lighten">{{ $employee->employee_contract }}</span>
                                                    </td>
                                                    @endif
                                                    @if($employee->employee_contract == "Commented")
                                                    <td>
                                                    <span class="badge badge-danger-lighten">{{ $employee->employee_contract }}</span>
                                                    </td>
                                                    @endif
                                                    @if($employee->employee_contract == "Under Review")
                                                    <td>
                                                    <span class="badge badge-warning-lighten">{{ $employee->employee_contract }}</span>
                                                    </td>
                                                    @endif
                                                    @if($employee->employee_contract == "Approved")
                                                    <td>
                                                    <span class="badge badge-success-lighten">{{ $employee->employee_contract }}</span>
                                                    </td>
                                                    @endif
                                                    <td>
                                                        <a href="{{ route('view.contract',encrypt($employee->employee_id)) }}" class="btn btn-primary" title="View" data-toggle="tooltip">View</a>
                                                  </td>
                                                </tr> 
                                                @endforeach
                                                @endif
                                                </tbody>
                                                <tbody id="content" class="searchData"></tbody>

                                            </table>
                                        </div> <!-- end table-responsive-->

                                    </div> <!-- end card body-->
                                </div> <!-- end card -->
                            </div><!-- end col-->
                        </div>
                        <!-- end row-->
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h4 class="header-title">Health Status</h4>
                                            <div class="dropdown">
                                                <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="mdi mdi-dots-vertical"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <!-- item-->
                                                    <a href="{{ route('health.list') }}" class="dropdown-item">View</a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mt-3 mb-4 chartjs-chart" style="height: 207px;">
                                            <canvas id="health-status-chart" data-colors="#0acf97,#727cf5,#fa5c7c"></canvas>
                                        </div>

                                        <div class="row text-center mt-2 py-2">
                                            <div class="col-sm-4">
                                                <div class="my-2 my-sm-0">
                                                        <i class="mdi mdi-trending-up text-primary mt-3 h3"></i>
                                                    <h3 class="fw-normal">
                                                        <span>{{ $countHealthSubmitted }}</span>
                                                    </h3>
                                                    <p class="text-muted mb-0">Submitted</p>
                                                </div>
                                                
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="my-2 my-sm-0">
                                                        <i class="mdi mdi-trending-up text-danger mt-3 h3"></i>
                                                    <h3 class="fw-normal">
                                                        <span>{{ $countHealthReviewed }}</span>
                                                    </h3>
                                                    <p class="text-muted mb-0"> In-review</p>
                                                </div>
                                                
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="my-2 my-sm-0">
                                                        <i class="mdi mdi-trending-up text-success mt-3 h3"></i>
                                                    <h3 class="fw-normal">
                                                        <span>{{ $countHealthApproved }}</span>
                                                    </h3>
                                                    <p class="text-muted mb-0"> Approved</p>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <!-- end row-->

                                    </div> <!-- end card body-->
                                </div> <!-- end card -->
                            </div><!-- end col-->
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h4 class="header-title">DBS Status</h4>
                                            <div class="dropdown">
                                                <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="mdi mdi-dots-vertical"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <!-- item-->
                                                    <a href="{{ route('dbs.list') }}" class="dropdown-item">View</a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mt-3 mb-4 chartjs-chart" style="height: 207px;">
                                            <canvas id="dbs-status-chart" data-colors="#0acf97,#727cf5,#fa5c7c"></canvas>
                                        </div>

                                        <div class="row text-center mt-2 py-2">
                                            <div class="col-sm-4">
                                                <div class="my-2 my-sm-0">
                                                        <i class="mdi mdi-trending-up text-primary mt-3 h3"></i>
                                                    <h3 class="fw-normal">
                                                        <span>{{ $countDBSSubmitted }}</span>
                                                    </h3>
                                                    <p class="text-muted mb-0">Submitted</p>
                                                </div>
                                                
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="my-2 my-sm-0">
                                                        <i class="mdi mdi-trending-up text-danger mt-3 h3"></i>
                                                    <h3 class="fw-normal">
                                                        <span>{{ $countDBSReviewed }}</span>
                                                    </h3>
                                                    <p class="text-muted mb-0"> In-review</p>
                                                </div>
                                                
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="my-2 my-sm-0">
                                                        <i class="mdi mdi-trending-up text-success mt-3 h3"></i>
                                                    <h3 class="fw-normal">
                                                        <span>{{ $countDBSApproved }}</span>
                                                    </h3>
                                                    <p class="text-muted mb-0"> Approved</p>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <!-- end row-->

                                    </div> <!-- end card body-->
                                </div> <!-- end card -->
                            </div><!-- end col-->
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h4 class="header-title">Induction Status</h4>
                                            <div class="dropdown">
                                                <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="mdi mdi-dots-vertical"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <!-- item-->
                                                    <a href="{{ route('induction.phase1Details') }}" class="dropdown-item">View</a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mt-3 mb-4 chartjs-chart" style="height: 207px;">
                                            <canvas id="induction-status-chart" data-colors="#0acf97,#727cf5,#fa5c7c"></canvas>
                                        </div>

                                        <div class="row text-center mt-2 py-2">
                                            <div class="col-sm-4">
                                                <div class="my-2 my-sm-0">
                                                        <i class="mdi mdi-trending-up text-primary mt-3 h3"></i>
                                                    <h3 class="fw-normal">
                                                        <span>{{ $countInductionConfirmed }}</span>
                                                    </h3>
                                                    <p class="text-muted mb-0">Confirmed</p>
                                                </div>
                                                
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="my-2 my-sm-0">
                                                        <i class="mdi mdi-trending-up text-danger mt-3 h3"></i>
                                                    <h3 class="fw-normal">
                                                        <span>{{ $countInductionCancelled }}</span>
                                                    </h3>
                                                    <p class="text-muted mb-0"> Cancelled</p>
                                                </div>
                                                
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="my-2 my-sm-0">
                                                        <i class="mdi mdi-trending-up text-success mt-3 h3"></i>
                                                    <h3 class="fw-normal">
                                                        <span>{{ $countInductionAttended }}</span>
                                                    </h3>
                                                    <p class="text-muted mb-0"> Attended</p>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <!-- end row-->
                                    </div> <!-- end card body-->
                                </div> <!-- end card -->
                            </div><!-- end col-->
                            </div>
                        <!-- end row-->
                
                                <input class="form-control" type="hidden" id="applicationSubmittedPercentage" name="applicationSubmittedPercentage" value="{{number_format($applicationSubmittedPercentage, 2)}}">
                            
                                <input class="form-control" type="hidden" id="applicationReviewedPercentage" name="applicationReviewedPercentage" value="{{number_format($applicationReviewedPercentage, 2)}}">
                   
                                <input class="form-control" type="hidden" id="applicationApprovedPercentage" name="applicationApprovedPercentage" value="{{number_format($applicationApprovedPercentage, 2)}}">
                 
                                <input class="form-control" type="hidden" id="trainingSubmittedPercentage" name="trainingSubmittedPercentage" value="{{number_format($trainingSubmittedPercentage, 2)}}">
                   
                                <input class="form-control" type="hidden" id="trainingReviewedPercentage" name="trainingReviewedPercentage" value="{{number_format($trainingReviewedPercentage, 2)}}">
                       
                                <input class="form-control" type="hidden" id="trainingApprovedPercentage" name="trainingApprovedPercentage" value="{{number_format($trainingApprovedPercentage, 2)}}">
                    
                                <input class="form-control" type="hidden" id="referenceSubmittedPercentage" name="referenceSubmittedPercentage" value="{{number_format($referenceSubmittedPercentage, 2)}}">
                    
                                <input class="form-control" type="hidden" id="referenceReviewedPercentage" name="referenceReviewedPercentage" value="{{number_format($referenceReviewedPercentage, 2)}}">
              
                                <input class="form-control" type="hidden" id="referenceApprovedPercentage" name="referenceApprovedPercentage" value="{{number_format($referenceApprovedPercentage, 2)}}">
                   
                                <input class="form-control" type="hidden" id="healthSubmittedPercentage" name="healthSubmittedPercentage" value="{{number_format($healthSubmittedPercentage, 2)}}">
                    
                                <input class="form-control" type="hidden" id="healthReviewedPercentage" name="healthReviewedPercentage" value="{{number_format($healthReviewedPercentage, 2)}}">
                      
                                <input class="form-control" type="hidden" id="healthApprovedPercentage" name="healthApprovedPercentage" value="{{number_format($healthApprovedPercentage, 2)}}">
                            
                                <input class="form-control" type="hidden" id="DBSSubmittedPercentage" name="DBSSubmittedPercentage" value="{{number_format($DBSSubmittedPercentage, 2)}}">
                     
                                <input class="form-control" type="hidden" id="DBSReviewedPercentage" name="DBSReviewedPercentage" value="{{number_format($DBSReviewedPercentage, 2)}}">
                            
                                <input class="form-control" type="hidden" id="DBSApprovedPercentage" name="DBSApprovedPercentage" value="{{number_format($DBSApprovedPercentage, 2)}}">
                  
                                <input class="form-control" type="hidden" id="inductionConfirmedPercentage" name="inductionConfirmedPercentage" value="{{number_format($inductionConfirmedPercentage, 2)}}">
               
                                <input class="form-control" type="hidden" id="inductionAttenededPercentage" name="inductionAttenededPercentage" value="{{number_format($inductionAttenededPercentage, 2)}}">
                   
                                <input class="form-control" type="hidden" id="inductionCancelledPercentage" name="inductionCancelledPercentage" value="{{number_format($inductionCancelledPercentage, 2)}}">
                        
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
<!--        <script src="js/js-theme//pages/demo.dashboard-projects.js"></script>
 -->        <!-- end demo js-->
 
        
    </body>

</html>

<style>
.iconUser{
    font-size: 24px;
    color: blue !important;
}
.iconTraining{
    font-size: 24px;
    color: red !important;
}
.iconDBS{
    font-size: 24px;
    color: red !important;
}
.iconInduction{
    font-size: 24px;
    color: red !important;
}
</style>

<script>
//application-status-chart
!function(o){"use strict";
    var applicationSubmitted = $('#applicationSubmittedPercentage').val();
    var applicationReviewed = $('#applicationReviewedPercentage').val();
    var applicationApproved = $('#applicationApprovedPercentage').val();

function t(){this.$body=o("body"),this.charts=[]}t.prototype.respChart=function(r,a,e,i){Chart.defaults.font.color="#8391a2",Chart.defaults.scale.grid.color="#8391a2";var n=r.get(0).getContext("2d"),s=o(r).parent();return function(){var t;switch(r.attr("width",o(s).width()),a){case"Line":t=new Chart(n,{type:"line",data:e,options:i});break;case"Bar":t=new Chart(n,{type:"bar",data:e,options:i});break;case"Doughnut":t=new Chart(n,{type:"doughnut",data:e,options:i})}return t}()},t.prototype.initCharts=function(){var t,r,a,e=[];return 0<o("#task-area-chart").length&&(t={labels:["Sprint 1","Sprint 2","Sprint 3","Sprint 4","Sprint 5","Sprint 6","Sprint 7","Sprint 8","Sprint 9","Sprint 10","Sprint 11","Sprint 12","Sprint 13","Sprint 14","Sprint 15","Sprint 16","Sprint 17","Sprint 18","Sprint 19","Sprint 20","Sprint 21","Sprint 22","Sprint 23","Sprint 24"],datasets:[{label:"This year",backgroundColor:o("#task-area-chart").data("bgcolor")||"#727cf5",borderColor:o("#task-area-chart").data("bordercolor")||"#727cf5",data:[16,44,32,48,72,60,84,64,78,50,68,34,26,44,32,48,72,60,74,52,62,50,32,22]}]},e.push(this.respChart(o("#task-area-chart"),"Bar",t,{maintainAspectRatio:!1,barPercentage:.7,categoryPercentage:.5,plugins:{filler:{propagate:!1},legend:{display:!1},tooltips:{intersect:!1},hover:{intersect:!0}},scales:{x:{grid:{color:"rgba(0,0,0,0.05)"}},y:{ticks:{stepSize:10,display:!1},min:10,max:100,display:!0,borderDash:[5,5],grid:{color:"rgba(0,0,0,0)",fontColor:"#fff"}}}}))),0<o("#application-status-chart").length&&(a={labels:["Approved(%)","Submitted(%)","In-review(%)"],datasets:[{data:[applicationApproved,applicationSubmitted,applicationReviewed],backgroundColor:(r=o("#application-status-chart").data("colors"))?r.split(","):["#0acf97","#727cf5","#fa5c7c"],borderColor:"transparent",borderWidth:"3"}]},e.push(this.respChart(o("#application-status-chart"),"Doughnut",a,{maintainAspectRatio:!1,cutout:80,plugins:{cutoutPercentage:40,legend:{display:!1}}}))),e},t.prototype.init=function(){var r=this;Chart.defaults.font.family='-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif',r.charts=this.initCharts(),o(window).on("resizeEnd",function(t){o.each(r.charts,function(t,r){try{r.destroy()}catch(t){}}),r.charts=r.initCharts()}),o(window).resize(function(){this.resizeTO&&clearTimeout(this.resizeTO),this.resizeTO=setTimeout(function(){o(this).trigger("resizeEnd")},500)})},o.ChartJs=new t,o.ChartJs.Constructor=t}(window.jQuery),function(){"use strict";window.jQuery.ChartJs.init()}();

//training-status-chart
!function(o){"use strict";
    var trainingSubmitted = $('#trainingSubmittedPercentage').val();
    var trainingReviewed = $('#trainingReviewedPercentage').val();
    var trainingApproved = $('#trainingApprovedPercentage').val();

function t(){this.$body=o("body"),this.charts=[]}t.prototype.respChart=function(r,a,e,i){Chart.defaults.font.color="#8391a2",Chart.defaults.scale.grid.color="#8391a2";var n=r.get(0).getContext("2d"),s=o(r).parent();return function(){var t;switch(r.attr("width",o(s).width()),a){case"Line":t=new Chart(n,{type:"line",data:e,options:i});break;case"Bar":t=new Chart(n,{type:"bar",data:e,options:i});break;case"Doughnut":t=new Chart(n,{type:"doughnut",data:e,options:i})}return t}()},t.prototype.initCharts=function(){var t,r,a,e=[];return 0<o("#task-area-chart").length&&(t={labels:["Sprint 1","Sprint 2","Sprint 3","Sprint 4","Sprint 5","Sprint 6","Sprint 7","Sprint 8","Sprint 9","Sprint 10","Sprint 11","Sprint 12","Sprint 13","Sprint 14","Sprint 15","Sprint 16","Sprint 17","Sprint 18","Sprint 19","Sprint 20","Sprint 21","Sprint 22","Sprint 23","Sprint 24"],datasets:[{label:"This year",backgroundColor:o("#task-area-chart").data("bgcolor")||"#727cf5",borderColor:o("#task-area-chart").data("bordercolor")||"#727cf5",data:[16,44,32,48,72,60,84,64,78,50,68,34,26,44,32,48,72,60,74,52,62,50,32,22]}]},e.push(this.respChart(o("#task-area-chart"),"Bar",t,{maintainAspectRatio:!1,barPercentage:.7,categoryPercentage:.5,plugins:{filler:{propagate:!1},legend:{display:!1},tooltips:{intersect:!1},hover:{intersect:!0}},scales:{x:{grid:{color:"rgba(0,0,0,0.05)"}},y:{ticks:{stepSize:10,display:!1},min:10,max:100,display:!0,borderDash:[5,5],grid:{color:"rgba(0,0,0,0)",fontColor:"#fff"}}}}))),0<o("#training-status-chart").length&&(a={labels:["Approved(%)","Submitted(%)","In-review(%)"],datasets:[{data:[trainingApproved,trainingSubmitted,trainingReviewed],backgroundColor:(r=o("#training-status-chart").data("colors"))?r.split(","):["#0acf97","#727cf5","#fa5c7c"],borderColor:"transparent",borderWidth:"3"}]},e.push(this.respChart(o("#training-status-chart"),"Doughnut",a,{maintainAspectRatio:!1,cutout:80,plugins:{cutoutPercentage:40,legend:{display:!1}}}))),e},t.prototype.init=function(){var r=this;Chart.defaults.font.family='-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif',r.charts=this.initCharts(),o(window).on("resizeEnd",function(t){o.each(r.charts,function(t,r){try{r.destroy()}catch(t){}}),r.charts=r.initCharts()}),o(window).resize(function(){this.resizeTO&&clearTimeout(this.resizeTO),this.resizeTO=setTimeout(function(){o(this).trigger("resizeEnd")},500)})},o.ChartJs=new t,o.ChartJs.Constructor=t}(window.jQuery),function(){"use strict";window.jQuery.ChartJs.init()}();


//reference-status-chart
!function(o){"use strict";
    var referenceSubmitted = $('#referenceSubmittedPercentage').val();
    var referenceReviewed = $('#referenceReviewedPercentage').val();
    var referenceApproved = $('#referenceApprovedPercentage').val();

function t(){this.$body=o("body"),this.charts=[]}t.prototype.respChart=function(r,a,e,i){Chart.defaults.font.color="#8391a2",Chart.defaults.scale.grid.color="#8391a2";var n=r.get(0).getContext("2d"),s=o(r).parent();return function(){var t;switch(r.attr("width",o(s).width()),a){case"Line":t=new Chart(n,{type:"line",data:e,options:i});break;case"Bar":t=new Chart(n,{type:"bar",data:e,options:i});break;case"Doughnut":t=new Chart(n,{type:"doughnut",data:e,options:i})}return t}()},t.prototype.initCharts=function(){var t,r,a,e=[];return 0<o("#task-area-chart").length&&(t={labels:["Sprint 1","Sprint 2","Sprint 3","Sprint 4","Sprint 5","Sprint 6","Sprint 7","Sprint 8","Sprint 9","Sprint 10","Sprint 11","Sprint 12","Sprint 13","Sprint 14","Sprint 15","Sprint 16","Sprint 17","Sprint 18","Sprint 19","Sprint 20","Sprint 21","Sprint 22","Sprint 23","Sprint 24"],datasets:[{label:"This year",backgroundColor:o("#task-area-chart").data("bgcolor")||"#727cf5",borderColor:o("#task-area-chart").data("bordercolor")||"#727cf5",data:[16,44,32,48,72,60,84,64,78,50,68,34,26,44,32,48,72,60,74,52,62,50,32,22]}]},e.push(this.respChart(o("#task-area-chart"),"Bar",t,{maintainAspectRatio:!1,barPercentage:.7,categoryPercentage:.5,plugins:{filler:{propagate:!1},legend:{display:!1},tooltips:{intersect:!1},hover:{intersect:!0}},scales:{x:{grid:{color:"rgba(0,0,0,0.05)"}},y:{ticks:{stepSize:10,display:!1},min:10,max:100,display:!0,borderDash:[5,5],grid:{color:"rgba(0,0,0,0)",fontColor:"#fff"}}}}))),0<o("#reference-status-chart").length&&(a={labels:["Approved(%)","Submitted(%)","In-review(%)"],datasets:[{data:[referenceApproved,referenceSubmitted,referenceReviewed],backgroundColor:(r=o("#reference-status-chart").data("colors"))?r.split(","):["#0acf97","#727cf5","#fa5c7c"],borderColor:"transparent",borderWidth:"3"}]},e.push(this.respChart(o("#reference-status-chart"),"Doughnut",a,{maintainAspectRatio:!1,cutout:80,plugins:{cutoutPercentage:40,legend:{display:!1}}}))),e},t.prototype.init=function(){var r=this;Chart.defaults.font.family='-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif',r.charts=this.initCharts(),o(window).on("resizeEnd",function(t){o.each(r.charts,function(t,r){try{r.destroy()}catch(t){}}),r.charts=r.initCharts()}),o(window).resize(function(){this.resizeTO&&clearTimeout(this.resizeTO),this.resizeTO=setTimeout(function(){o(this).trigger("resizeEnd")},500)})},o.ChartJs=new t,o.ChartJs.Constructor=t}(window.jQuery),function(){"use strict";window.jQuery.ChartJs.init()}();

//health-status-chart
!function(o){"use strict";
    var healthSubmitted = $('#healthSubmittedPercentage').val();
    var healthReviewed = $('#healthReviewedPercentage').val();
    var healthApproved = $('#healthApprovedPercentage').val();

function t(){this.$body=o("body"),this.charts=[]}t.prototype.respChart=function(r,a,e,i){Chart.defaults.font.color="#8391a2",Chart.defaults.scale.grid.color="#8391a2";var n=r.get(0).getContext("2d"),s=o(r).parent();return function(){var t;switch(r.attr("width",o(s).width()),a){case"Line":t=new Chart(n,{type:"line",data:e,options:i});break;case"Bar":t=new Chart(n,{type:"bar",data:e,options:i});break;case"Doughnut":t=new Chart(n,{type:"doughnut",data:e,options:i})}return t}()},t.prototype.initCharts=function(){var t,r,a,e=[];return 0<o("#task-area-chart").length&&(t={labels:["Sprint 1","Sprint 2","Sprint 3","Sprint 4","Sprint 5","Sprint 6","Sprint 7","Sprint 8","Sprint 9","Sprint 10","Sprint 11","Sprint 12","Sprint 13","Sprint 14","Sprint 15","Sprint 16","Sprint 17","Sprint 18","Sprint 19","Sprint 20","Sprint 21","Sprint 22","Sprint 23","Sprint 24"],datasets:[{label:"This year",backgroundColor:o("#task-area-chart").data("bgcolor")||"#727cf5",borderColor:o("#task-area-chart").data("bordercolor")||"#727cf5",data:[16,44,32,48,72,60,84,64,78,50,68,34,26,44,32,48,72,60,74,52,62,50,32,22]}]},e.push(this.respChart(o("#task-area-chart"),"Bar",t,{maintainAspectRatio:!1,barPercentage:.7,categoryPercentage:.5,plugins:{filler:{propagate:!1},legend:{display:!1},tooltips:{intersect:!1},hover:{intersect:!0}},scales:{x:{grid:{color:"rgba(0,0,0,0.05)"}},y:{ticks:{stepSize:10,display:!1},min:10,max:100,display:!0,borderDash:[5,5],grid:{color:"rgba(0,0,0,0)",fontColor:"#fff"}}}}))),0<o("#health-status-chart").length&&(a={labels:["Approved(%)","Submitted(%)","In-review(%)"],datasets:[{data:[healthApproved,healthSubmitted,healthReviewed],backgroundColor:(r=o("#health-status-chart").data("colors"))?r.split(","):["#0acf97","#727cf5","#fa5c7c"],borderColor:"transparent",borderWidth:"3"}]},e.push(this.respChart(o("#health-status-chart"),"Doughnut",a,{maintainAspectRatio:!1,cutout:80,plugins:{cutoutPercentage:40,legend:{display:!1}}}))),e},t.prototype.init=function(){var r=this;Chart.defaults.font.family='-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif',r.charts=this.initCharts(),o(window).on("resizeEnd",function(t){o.each(r.charts,function(t,r){try{r.destroy()}catch(t){}}),r.charts=r.initCharts()}),o(window).resize(function(){this.resizeTO&&clearTimeout(this.resizeTO),this.resizeTO=setTimeout(function(){o(this).trigger("resizeEnd")},500)})},o.ChartJs=new t,o.ChartJs.Constructor=t}(window.jQuery),function(){"use strict";window.jQuery.ChartJs.init()}();

//dbs-status-chart
!function(o){"use strict";
    var DBSSubmitted = $('#DBSSubmittedPercentage').val();
    var DBSReviewed = $('#DBSReviewedPercentage').val();
    var DBSApproved = $('#DBSApprovedPercentage').val();

function t(){this.$body=o("body"),this.charts=[]}t.prototype.respChart=function(r,a,e,i){Chart.defaults.font.color="#8391a2",Chart.defaults.scale.grid.color="#8391a2";var n=r.get(0).getContext("2d"),s=o(r).parent();return function(){var t;switch(r.attr("width",o(s).width()),a){case"Line":t=new Chart(n,{type:"line",data:e,options:i});break;case"Bar":t=new Chart(n,{type:"bar",data:e,options:i});break;case"Doughnut":t=new Chart(n,{type:"doughnut",data:e,options:i})}return t}()},t.prototype.initCharts=function(){var t,r,a,e=[];return 0<o("#task-area-chart").length&&(t={labels:["Sprint 1","Sprint 2","Sprint 3","Sprint 4","Sprint 5","Sprint 6","Sprint 7","Sprint 8","Sprint 9","Sprint 10","Sprint 11","Sprint 12","Sprint 13","Sprint 14","Sprint 15","Sprint 16","Sprint 17","Sprint 18","Sprint 19","Sprint 20","Sprint 21","Sprint 22","Sprint 23","Sprint 24"],datasets:[{label:"This year",backgroundColor:o("#task-area-chart").data("bgcolor")||"#727cf5",borderColor:o("#task-area-chart").data("bordercolor")||"#727cf5",data:[16,44,32,48,72,60,84,64,78,50,68,34,26,44,32,48,72,60,74,52,62,50,32,22]}]},e.push(this.respChart(o("#task-area-chart"),"Bar",t,{maintainAspectRatio:!1,barPercentage:.7,categoryPercentage:.5,plugins:{filler:{propagate:!1},legend:{display:!1},tooltips:{intersect:!1},hover:{intersect:!0}},scales:{x:{grid:{color:"rgba(0,0,0,0.05)"}},y:{ticks:{stepSize:10,display:!1},min:10,max:100,display:!0,borderDash:[5,5],grid:{color:"rgba(0,0,0,0)",fontColor:"#fff"}}}}))),0<o("#dbs-status-chart").length&&(a={labels:["Approved(%)","Submitted(%)","In-review(%)"],datasets:[{data:[DBSApproved,DBSSubmitted,DBSReviewed],backgroundColor:(r=o("#dbs-status-chart").data("colors"))?r.split(","):["#0acf97","#727cf5","#fa5c7c"],borderColor:"transparent",borderWidth:"3"}]},e.push(this.respChart(o("#dbs-status-chart"),"Doughnut",a,{maintainAspectRatio:!1,cutout:80,plugins:{cutoutPercentage:40,legend:{display:!1}}}))),e},t.prototype.init=function(){var r=this;Chart.defaults.font.family='-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif',r.charts=this.initCharts(),o(window).on("resizeEnd",function(t){o.each(r.charts,function(t,r){try{r.destroy()}catch(t){}}),r.charts=r.initCharts()}),o(window).resize(function(){this.resizeTO&&clearTimeout(this.resizeTO),this.resizeTO=setTimeout(function(){o(this).trigger("resizeEnd")},500)})},o.ChartJs=new t,o.ChartJs.Constructor=t}(window.jQuery),function(){"use strict";window.jQuery.ChartJs.init()}();


//induction-status-chart
!function(o){"use strict";
    var inductionConfirmed = $('#inductionConfirmedPercentage').val();
    var inductionCancelled = $('#inductionCancelledPercentage').val();
    var inductionAtteneded = $('#inductionAttenededPercentage').val();

function t(){this.$body=o("body"),this.charts=[]}t.prototype.respChart=function(r,a,e,i){Chart.defaults.font.color="#8391a2",Chart.defaults.scale.grid.color="#8391a2";var n=r.get(0).getContext("2d"),s=o(r).parent();return function(){var t;switch(r.attr("width",o(s).width()),a){case"Line":t=new Chart(n,{type:"line",data:e,options:i});break;case"Bar":t=new Chart(n,{type:"bar",data:e,options:i});break;case"Doughnut":t=new Chart(n,{type:"doughnut",data:e,options:i})}return t}()},t.prototype.initCharts=function(){var t,r,a,e=[];return 0<o("#task-area-chart").length&&(t={labels:["Sprint 1","Sprint 2","Sprint 3","Sprint 4","Sprint 5","Sprint 6","Sprint 7","Sprint 8","Sprint 9","Sprint 10","Sprint 11","Sprint 12","Sprint 13","Sprint 14","Sprint 15","Sprint 16","Sprint 17","Sprint 18","Sprint 19","Sprint 20","Sprint 21","Sprint 22","Sprint 23","Sprint 24"],datasets:[{label:"This year",backgroundColor:o("#task-area-chart").data("bgcolor")||"#727cf5",borderColor:o("#task-area-chart").data("bordercolor")||"#727cf5",data:[16,44,32,48,72,60,84,64,78,50,68,34,26,44,32,48,72,60,74,52,62,50,32,22]}]},e.push(this.respChart(o("#task-area-chart"),"Bar",t,{maintainAspectRatio:!1,barPercentage:.7,categoryPercentage:.5,plugins:{filler:{propagate:!1},legend:{display:!1},tooltips:{intersect:!1},hover:{intersect:!0}},scales:{x:{grid:{color:"rgba(0,0,0,0.05)"}},y:{ticks:{stepSize:10,display:!1},min:10,max:100,display:!0,borderDash:[5,5],grid:{color:"rgba(0,0,0,0)",fontColor:"#fff"}}}}))),0<o("#induction-status-chart").length&&(a={labels:["Attended(%)","Confirmed(%)","Cancelled(%)"],datasets:[{data:[inductionAtteneded,inductionConfirmed,inductionCancelled],backgroundColor:(r=o("#induction-status-chart").data("colors"))?r.split(","):["#0acf97","#727cf5","#fa5c7c"],borderColor:"transparent",borderWidth:"3"}]},e.push(this.respChart(o("#induction-status-chart"),"Doughnut",a,{maintainAspectRatio:!1,cutout:80,plugins:{cutoutPercentage:40,legend:{display:!1}}}))),e},t.prototype.init=function(){var r=this;Chart.defaults.font.family='-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif',r.charts=this.initCharts(),o(window).on("resizeEnd",function(t){o.each(r.charts,function(t,r){try{r.destroy()}catch(t){}}),r.charts=r.initCharts()}),o(window).resize(function(){this.resizeTO&&clearTimeout(this.resizeTO),this.resizeTO=setTimeout(function(){o(this).trigger("resizeEnd")},500)})},o.ChartJs=new t,o.ChartJs.Constructor=t}(window.jQuery),function(){"use strict";window.jQuery.ChartJs.init()}();
</script>