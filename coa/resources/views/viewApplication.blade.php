<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from coderthemes.com/hyper/saas/pages-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 12 Aug 2022 09:06:26 GMT -->
<head>
        <meta charset="utf-8" />
        <title>User Application</title>
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
                                    <span class="account-user-name"><strong> {{ $user->firstname }} {{ $user->surname }}</strong></span>
                                     <span class="account-position">{{ $user->login_id }}</span> 
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
                                    <h4 class="page-title">Application Status</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title --> 

                        <div class="row">
                            <div class="col-xl-12">
                                <!-- Personal-Information -->
                                <div class="card">
                                    <div class="card-body">
                                    <div class="row">
                                    <div class="col-md-10">
                                        <h4 class="header-title mt-0 mb-3">Personal Details</h4>

                                           <!--  <p class="text-muted font-13">
                                            </p>
 -->                                    </div>
                                    @if(  $employee[0]->disable  == "yes" || $employee[0]->service  == "yes" || $employee[0]->offence  == "yes" || $employee[0]->disciplinary_procedure  == "yes" || $employee[0]->criminal_offence  == "yes")
                                    <div class="col-md-2">
                                        <div id="user-warning" style="color:red">User Warning</div>
<!--                                     <div class="warning-icon"><i class="fa fa-exclamation-triangle" aria-hidden="true" title="User Warning"></i></div>
 -->                                    </div>
                                    @endif
                                            <hr>
                                    </div>
                                    <div class="text-start">
                                        <div class="row">
                                            <div class="col-md-4">
                                                 <p class="text-muted"><strong>Post Applied For :</strong><span class="ms-2">
                                                    @foreach($employee as $employee)
                                                    {{ $employee->posts }}
                                                    @endforeach
                                                </span></p>
                                            </div>
                                            <div class="col-md-4">
                                                 <p class="text-muted"><strong>Surname :</strong> <span class="ms-2">{{ $employee->surname }}</span></p>
                                            </div>
                                            <div class="col-md-4">
                                                 <p class="text-muted"><strong>First Name :</strong> <span class="ms-2">{{ $employee->firstname }}</span></p>
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
                                                <p class="text-muted"><strong>Mobile Number :</strong><span class="ms-2">{{ $employee->uk_contact_no }}</span></p>
                                            </div>
                                            <div class="col-md-4">
                                                <p class="text-muted"><strong>Email :</strong> <span class="ms-2">{{ $employee->email }}</span></p>
                                                <input class="form-control" type="hidden" id="userEmail" name="userEmail" value= "{{ $employee->email }}" required>
                                            </div>
                                            <div class="col-md-4">
                                                <p class="text-muted"><strong>DOB :</strong> <span class="ms-2">{{ $employee->date_of_birth }}</span></p>
                                            </div>
                                         </div>
                                         <div class="row">
                                            <div class="col-md-4">
                                                <p class="text-muted"><strong>Marital Status :</strong><span class="ms-2">{{ $employee->marital_status }}</span></p>
                                            </div>
                                            <div class="col-md-4">
                                                <p class="text-muted"><strong>Nationality :</strong> <span class="ms-2">{{ $employee->nationality }}</span></p>
                                            </div>
                                            <div class="col-md-4">
                                                <p class="text-muted"><strong>NI Number :</strong> <span class="ms-2">{{ $employee->ni_number }}</span></p>
                                            </div>
                                         </div>
                                         <div class="row">
                                            <div class="col-md-4">
                                            <p class="text-muted"><strong>User Name :</strong><span class="ms-2">{{ $employee->login_id }}</span></p>
                                            </div>
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

                                <!-- Next Of Kin-Information -->
                                <div class="card">
                                    <div class="card-body">
                                    <h4 class="header-title mt-0 mb-3">Next Of Kin</h4>
                                        <p class="text-muted font-13">
                                        </p>
                                        <hr>

                                         <div class="text-start">
                                         <div class="row">
                                            <div class="col-md-4">
                                                <p class="text-muted"><strong>Name :</strong><span class="ms-2">{{ $employee->relative_name }}</span></p>
                                            </div>
                                            <div class="col-md-4">
                                                <p class="text-muted"><strong>Relationship :</strong> <span class="ms-2">{{ $employee->relationship }}</span></p>
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
                                        </div>
                                         <div class="row">
                                            <div class="col-md-4">
                                                <p class="text-muted"><strong>Contact Tel :</strong><span class="ms-2">{{ $employee->relative_tel }}</span></p>
                                            </div>
                                            <div class="col-md-4">
                                                <p class="text-muted"><strong>Mobile No. :</strong> <span class="ms-2">{{ $employee->relative_mobile }}</span></p>
                                            </div>
                                            <div class="col-md-4">
                                                <p class="text-muted"><strong>Email :</strong> <span class="ms-2">{{ $employee->relative_email }}</span></p>
                                            </div>
                                         </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- End Next Of Kin-Information -->

                                <!-- Health-Questionnaire-->
                                  <!-- End Health Questionnaire-Information -->

                                <!-- Passport-Details-->
                                <div class="card">
                                    <div class="card-body">
                                    <h4 class="header-title mt-0 mb-3">Passport/ Visa Details</h4>
                                        <p class="text-muted font-13">
                                        </p>
                                        <hr>

                                         <div class="text-start">
                                         <div class="row">
                                            <div class="col-md-4">
                                                <p class="text-muted"><strong>Passport No. :</strong><span class="ms-2">{{ $employee->passport_no }}</span></p>
                                            </div>
                                            <div class="col-md-4">
                                                <p class="text-muted"><strong>Place Of Issue :</strong> <span class="ms-2">{{ $employee->place_of_issue }}</span></p>
                                            </div>
                                            <div class="col-md-4">
                                                <p class="text-muted"><strong>Issue Date :</strong> <span class="ms-2">{{ $employee->issue_date }}</span></p>
                                            </div>
                                         </div>
                                         <div class="row">
                                            <div class="col-md-4">
                                                <p class="text-muted"><strong>Expiry Date :</strong><span class="ms-2">{{ $employee->expiry_date }}</span></p>
                                            </div>
                                            <div class="col-md-4">
                                                <p class="text-muted"><strong>Visa Status :</strong> <span class="ms-2">{{ $employee->visa_status }}</span></p>
                                            </div>
                                            <div class="col-md-4">
                                                <p class="text-muted"><strong>Visa Expiry Date :</strong> <span class="ms-2">{{ $employee->visa_expiry_date }}</span></p>
                                            </div>
                                         </div>
                                         <div class="row">
                                         @if(count($brpDoc) == 0)
                                            <div class="col-md-4">
                                                <p class="text-muted"><strong>BRP Expiry Date :</strong><span class="ms-2">Not Available</span></p>
                                            </div>
                                        @else
                                            <div class="col-md-4">
                                                <p class="text-muted"><strong>BRP Expiry Date :</strong><span class="ms-2">{{ $brpDoc[0]->expiry_date }}</span></p>
                                            </div>
                                        @endif
                                            <div class="col-md-4">
                                                <p class="text-muted"><strong>Sharecode :</strong> <span class="ms-2">{{ $employee->have_sharecode }}</span></p>
                                            </div>
                                            <div class="col-md-4">
                                                <p class="text-muted"><strong>Sharecode Number :</strong> <span class="ms-2">{{ $employee->sharecode }}</span></p>
                                            </div>
                                         </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- End Passport-Details-->

                                 <!-- Education Details-->
                                 <div class="card">
                                    <div class="card-body">
                                    <h4 class="header-title mt-0 mb-3">Education Details</h4>
                                        <p class="text-muted font-13">
                                        </p>
                                        <hr>

                                         <div class="text-start">
                                         <table id="tbl" class="table table-striped  dt-responsive nowrap w-100">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Place Of Study</th>
                                                    <th>Qualification</th>
                                                    <th>Graduation Date</th>
                                                </tr> 
                                            </thead>  
                                                 @if(count($education) == 0)
                                                 <tr>
                                                    <td align="center" colspan="10">No Data Found</td>
                                                </tr>
                                                @else         
                                                    @foreach($education as $education)
                                                    <tr>
                                                     <td>{{ $loop->iteration }}</td>
                                                     <td>{{ $education->study_place }}</td>
                                                     <td>{{ $education->qualification }}</td>
                                                     <td>{{ $education->qualified_date }}</td>
                                                     </tr>
                                                    @endforeach
                                                @endif
                                         </table>

                                        </div>
                                    </div>
                                </div>
                                <!-- End Education-Details-->

                                 <!-- Work Details-->
                                 <div class="card">
                                    <div class="card-body">
                                    <h4 class="header-title mt-0 mb-3">Work Details</h4>
                                        <p class="text-muted font-13">
                                        </p>
                                        <hr>

                                         <div class="text-start">
                                         <table id="workTable" class="table table-striped  dt-responsive nowrap w-100">
                                         <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>From</th>
                                                <th>To</th>
                                                <th>Name Of Employer</th>
                                                <th>Type Of Business</th>
                                                <th>Job Title</th>
                                                </tr>
                                            </thead>
                                                @if(count($work) == 0)
                                                 <tr>
                                                    <td align="center" colspan="10">No Data Found</td>
                                                </tr>
                                                @else                 
                                                    @foreach($work as $work)
                                                    <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $work->from }}</td>
                                                    <td>{{ $work->to }}</td>
                                                    <td>{{ $work->employer_name }}</td>
                                                    <td>{{ $work->business_type }}</td>
                                                    <td>{{ $work->job_title }}</td>
                                                    </tr>
                                                    @endforeach
                                                @endif
                                         </table>

                                        </div>
                                    </div>
                                </div>
                                <!-- End Education-Details-->

                                <div class="card">
                                    <div class="card-body">
                                    <h4 class="header-title mt-0 mb-3">Uploaded Documents</h4>
                                    
                                  <table class="table table-striped  dt-responsive nowrap w-100">
                                        <thead>
                                                <tr>
                                                <th>#</th>
                                                <th>Documents</th>
                                                <th>File Preview</th>
                                                 </tr>   
                                            </thead>  
                                                 <tbody class="allData">
                                                 @if(count($userFile) == 0)
                                                 <tr>
                                                    <td align="center" colspan="10">No Data Found</td>
                                                </tr>
                                                @else
                                                 @foreach ($userFile as $userFile)
                                                <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>{{ $userFile->file_type}}</td>
                                                    <td>
                                                    <div id="filepreview" class="displaynone"> 
                                                        <i class="fa fa-file" aria-hidden="true" style="color:blue;font-size: 1.95em;"></i>
                                                     <a target="_blank" href="{{ $userFile->file_path}}" class="displaynone" data-toggle="tooltip" data-placement="right" title="Click here to view">{{ $userFile->file_name}}</a> 
                                                    </div> 
                                                    </td>
                                                </tr> 
                                                @endforeach
                                                @endif
                                                </tbody>                  
                                                </table>
                                                                                    

                                    </div>
                                </div>
                                <!-- Equal Opportunity Monitoring Form-Details-->
                                <div class="card">
                                    <div class="card-body">
                                    <div class="row">
                                    <div class="col-md-11">
                                    <h4 class="header-title mt-0 mb-3">Equal Opportunity Monitoring Form</h4>
                                        <p class="text-muted font-13">
                                        </p>
                                        </div>
                                    @if($employee->disable  == "yes")
                                    <div class="col-md-1">
                                    <div class="warning-icon"><i class="fa fa-exclamation-triangle" aria-hidden="true" title="User Warning"></i></div>
                                    </div>
                                    @endif
                                            <hr>
                                    </div>

                                         <div class="text-start">
                                         <div class="row">
                                            <div class="col-md-4">
                                                <p class="text-muted"><strong>Ethinic Groups :</strong><span class="ms-2">{{ $employee->choose }}</span></p>
                                            </div>
                                            <div class="col-md-4">
                                                <p class="text-muted"><strong>Gender :</strong> <span class="ms-2">{{ $employee->gender }}</span></p>
                                            </div>
                                            <div class="col-md-4">
                                            @if($employee->age  == "age1")
                                                <p class="text-muted"><strong>Age Range :</strong> <span class="ms-2">16-21</span></p>
                                            </div>
                                            @elseif($employee->age  == "age2")
                                                <p class="text-muted"><strong>Age Range :</strong> <span class="ms-2">22-25</span></p>
                                            </div>
                                            @elseif($employee->age  == "age3")
                                                <p class="text-muted"><strong>Age Range :</strong> <span class="ms-2">26-30</span></p>
                                            </div>
                                            @elseif($employee->age  == "age4")
                                                <p class="text-muted"><strong>Age Range :</strong> <span class="ms-2">31-35</span></p>
                                            </div>
                                            @elseif($employee->age  == "age5")
                                                <p class="text-muted"><strong>Age Range :</strong> <span class="ms-2">36-40</span></p>
                                            </div>
                                            @elseif($employee->age  == "age6")
                                                <p class="text-muted"><strong>Age Range :</strong> <span class="ms-2">41-50</span></p>
                                            </div>
                                            @elseif($employee->age  == "age5")
                                                <p class="text-muted"><strong>Age Range :</strong> <span class="ms-2">51-60</span></p>
                                            </div>
                                            @elseif($employee->age  == "age6")
                                                <p class="text-muted"><strong>Age Range :</strong> <span class="ms-2">61-65</span></p>
                                            </div>
                                            @endif
                                         </div>
                                         <!-- <div class="row">
                                            <div class="col-md-12">
                                                <p class="text-muted"><strong>Do you consider yourself to have a disability of some kind ?  :</strong><span class="ms-2">{{ $employee->disable }}</span></p>
                                            </div>
                                         </div> -->
                                        </br>
                                         <table class="table table-striped  dt-responsive nowrap w-100">
                                              <thead>        
                                                <tr>
                                                    <th>#</th>
                                                    <th>Question</th>
                                                    <th>Answer</th>
                                                    <th>Comments</th>
                                                 </tr>  
                                                </thead>             
                                                 <tbody class="allData">
                                                <tr>
                                                    <td>1</td>
                                                    <td>Do you consider yourself to have a disability of some kind ?</td>
                                                    <td>{{ $employee->disable }}</td>
                                                    <td>{{ $employee->disability_note }}</td>
                                                </tr> 

                                                </tbody>
                                                <tbody id="content" class="searchData"></tbody>

                                                </table>

                                        </div>
                                    </div>
                                </div>


                                <div class="card">
                                    <div class="card-body">
                                    <div class="row">
                                    <div class="col-md-11">
                                    <h4 class="header-title mt-0 mb-3">Protection Of Children and Vulnerable Adults Declaration</h4>
                                        <p class="text-muted font-13">
                                        </p>
                                        </div>
                                    @if($employee->service  == "yes" || $employee->offence  == "yes" || $employee->disciplinary_procedure  == "yes")
                                    <div class="col-md-1">
                                    <div class="warning-icon"><i class="fa fa-exclamation-triangle" aria-hidden="true" title="User Warning"></i></div>
                                    </div>
                                    @endif
                                            <hr>
                                    </div>

                                         <div class="text-start">
                                        <!--  <div class="row">
                                            <div class="col-md-12">
                                                <p class="text-muted"><strong>Has any Social Service Department or Police Service ever conducted an enquiry or investigation into any allegations
					or that you may pose an actual or potential risk to children or vulnerable adults? :</strong><span class="ms-2">{{ $employee->service }}</span></p>
                                            </div>
                                           
                                         </div>
                                         <div class="row">
                                            <div class="col-md-12">
                                                <p class="text-muted"><strong>Have you ever been convicted of any offence relating to children or vulnerable adults?  :</strong><span class="ms-2">{{ $employee->offence }}</span></p>
                                            </div>
                                         </div>
                                         <div class="row">
                                            <div class="col-md-12">
                                                <p class="text-muted"><strong>Have you ever been the subject of any disciplinary procedure or been asked to leave employment or voluntary
                                                    activity due to inappropriate behavior towards a child or vulnerable adult?  :</strong><span class="ms-2">{{ $employee->disciplinary_procedure }}</span></p>
                                            </div>
                                         </div> -->

                                         <table class="table table-striped dt-responsive nowrap w-100">
                                              <thead>        
                                                <tr>
                                                    <th>#</th>
                                                    <th>Question</th>
                                                    <th>Answer</th>
                                                    <th>Comments</th>
                                                 </tr>  
                                                </thead>             
                                                 <tbody class="allData">
                                                <tr>
                                                    <td>1</td>
                                                    <td>Has any Social Service Department or Police Service ever conducted an enquiry or investigation into any allegations
					or that you may pose an actual or potential risk to children or vulnerable adults?</td>
                                                    <td>{{ $employee->service }}</td>
                                                    <td>{{ $employee->service_note }}</td>
                                                </tr> 

                                                <tr>
                                                    <td>2</td>
                                                    <td>Have you ever been convicted of any offence relating to children or vulnerable adults?</td>
                                                    <td>{{ $employee->offence }}</td>
                                                    <td>{{ $employee->offence_note }}</td>
                                                </tr> 

                                                <tr>
                                                    <td>3</td>
                                                    <td>Have you ever been the subject of any disciplinary procedure or been asked to leave employment or voluntary
                                                    activity due to inappropriate behavior towards a child or vulnerable adult?</td>
                                                    <td>{{ $employee->disciplinary_procedure }}</td>
                                                    <td>{{ $employee->disciplinary_note }}</td>
                                                </tr> 

                                                </tbody>
                                                <tbody id="content" class="searchData"></tbody>

                                                </table>

                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-body">
                                    <div class="row">
                                    <div class="col-md-11">
                                    <h4 class="header-title mt-0 mb-3">Rehabilation Of Offenders</h4>
                                        <p class="text-muted font-13">
                                        </p>
                                        </div>
                                    @if($employee->criminal_offence  == "yes")
                                    <div class="col-md-1">
                                    <div class="warning-icon"><i class="fa fa-exclamation-triangle" aria-hidden="true" title="User Warning"></i></div>
                                    </div>
                                    @endif
                                            <hr>
                                    </div>

                                         <div class="text-start">
                                           <!--  <div class="row">
                                                <div class="col-md-12">
                                                    <p class="text-muted"><strong>Have you ever been convicted of a criminal offence, or been subject to any confidential discharge, bind overs or caution?  :</strong><span class="ms-2">{{ $employee->criminal_offence }}</span></p>
                                                </div>
                                            </div> -->

                                            <table class="table table-striped dt-responsive nowrap w-100">
                                              <thead>        
                                                <tr>
                                                    <th>#</th>
                                                    <th>Question</th>
                                                    <th>Answer</th>
                                                    <th>Comments</th>
                                                 </tr>  
                                                </thead>             
                                                 <tbody class="allData">
                                                <tr>
                                                    <td>1</td>
                                                    <td>Have you ever been convicted of a criminal offence, or been subject to any confidential discharge, bind overs or caution? </td>
                                                    <td>{{ $employee->criminal_offence }}</td>
                                                    <td>{{ $employee->criminal_note }}</td>
                                                </tr> 

                                                </tbody>
                                                <tbody id="content" class="searchData"></tbody>

                                                </table>

                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-body">
                                    <h4 class="header-title mt-0 mb-3">Declaration</h4>
                                        <p class="text-muted font-13">
                                        </p>
                                        <hr>

                                         <div class="text-start">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <p class="text-muted"><strong>Name :</strong> <span class="ms-2">{{ $employee->name }}</span></p>
                                                </div>
                                                <div class="col-md-4">
                                                    <p class="text-muted"><strong>Signature :</strong><span class="ms-2 signature">{{ $employee->signature }}</span></p>
                                                </div>
                                                <div class="col-md-4">
                                                    <p class="text-muted"><strong>Date :</strong> <span class="ms-2">{{ $employee->date }}</span></p>
                                                </div>
                                            </div><br/>
                                            </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                    </br>
                                            <div class="row">   
                                                <div class="col-md-12 mb-3">
                                                <p class="text-muted"><strong>Current status of the user :</strong><span class="ms-2">{{ $employee->application_status }}</span></p>
                                                </div>
                                                <input class="form-control" type="hidden" id="created_by" name="created_by" value="{{ $user->firstname }} {{ $user->surname }}">
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
                                                    <textarea  class="form-control required-personal" id="application_comments" name="application_comments"  rows="3"  placeholder="Enter Your Comment"  ></textarea>
                                            </div> </br>
                                            <div class="row">   
                                                <div class="col-md-3 mb-3">
                                                    <label for="status" class="form-label">Change the status of the user </label>
                                                </div>
                                                <div class="col-md-2 mb-3">
                                                    <select name="changeStatus" id="changeStatus" class="form-control select2 form-select" required>
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
                          
                             
                                <!-- Equal Opportunity Monitoring Form-Details end-->
                                

                                
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
<style>
     @import url(https://fonts.googleapis.com/css?family=Cedarville+Cursive);  
    .warning-icon{
        color:red;
        font-size:25px;
        margin-top:-10px;
    }
    .signature{
    font-family:"Cedarville Cursive";
    }
</style>
<script>
     $( document ).ready(function() {
        $("#reviewButton").hide();
        $("#approveButton").hide(); 
        $("#mailSend").hide();   
    });
    $('#changeStatus').on('change', function () {
    // if (this.value == '1'); { No semicolon and I used === instead of ==

    if (this.value === 'Reviewed'){
        $("#approveButton").hide();
        $("#reviewButton").show();
        $("#reviewButton").text("Review");
    } else {
        $("#approveButton").show();
        $("#approveButton").text("Approve");
        $("#approveButton").css('background-color','#727cf5');
        $("#reviewButton").hide();

    }
});
$('#approveButton').click(function(){
    $("#approveButton").hide();
    $("#mailSend").show();
    $("#mailSend").css('color','#727cf5');
    var email=$("#userEmail").val();
    var comment_section = "Application";
    var comment=$("#application_comments").val();
    if(comment==""){
        comment="Nil";
    }
    var created_by=$("#created_by").val();
    jQuery.ajax({
  
  url: "{{ route('approve.application') }}",
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
    window.location.href = "{{ route('application.list') }}"

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
    var comment_section = "Application";
    var comment=$("#application_comments").val();
    if(comment==""){
        comment="Nil";
    }
    var created_by=$("#created_by").val();
    jQuery.ajax({
  
  url: "{{ route('review.application') }}",
  method: 'get',
    data: {
    email :  email,
    comment: comment,
    comment_section: comment_section,
    created_by: created_by
 },  
  success: function(result){
     console.log(result);
    window.location.href = "{{ route('application.list') }}"

  }});
});

</script>