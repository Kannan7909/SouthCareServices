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
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                            <p class="text-muted"><strong>Mobile No. :</strong> <span class="ms-2">{{ $employee->contact_no }}</span></p>
                                            </div>
                                            <div class="col-md-4">
                                            <p class="text-muted"><strong>Whatsapp No. :</strong><span class="ms-2">{{ $employee->uk_contact_no }}</span></p>
                                            </div>
                                            <div class="col-md-4">
                                            <p class="text-muted"><strong>Email :</strong> <span class="ms-2">{{ $employee->email }}</span></p>
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
                                                    <td></td>
                                                </tr> 

                                                </tbody>
                                                <tbody id="content" class="searchData"></tbody>

                                                </table>
                                </div>
                                </div>
                    <!-- PDF Download Info-->
                   
                                <div class="card">
                                    <div class="card-body">
                                    <div class="row"> 
                                        <div id="download-staff-heading" class="col-md-9"> 
                                            <h4 class="header-title mt-0 mb-3">Staff Profile</h4>
                                        </div>
                                        <div class="col-md-3">
                                        <div id="editor"></div>
                                         <button  id="cmd" type="button" class="btn btn-info"><i class="uil-file-download-alt"></i> <span>Download PDF</span> </button>
                                        </div>
                                    </div>
                                        <p class="text-muted font-13">
                                        </p>

                                        <hr>

                                <!-- Start PDF Download Div--> 
                              <div id="download-staff">

                                 <div class="text-start">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p class="text-muted"><strong>Job Title :</strong> <span class="ms-2">{{ $employee->posts }}</span></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                 <p class="text-muted"><strong>Forename :</strong> <span class="ms-2">{{ $employee->firstname }}</span></p>
                                            </div>
                                            <div class="col-md-4">
                                                 <p class="text-muted"><strong>Surname :</strong> <span class="ms-2">{{ $employee->surname }}</span></p>
                                            </div>
                                           
                                        </div>
                                        <div class="row">
                                        @if(count($application) == 0)
                                            <div class="col-md-4">
                                                <p class="text-muted"><strong>Gender :</strong> <span class="ms-2">Not Available</span></p>
                                            </div>
                                        @else
                                            <div class="col-md-4">
                                                <p class="text-muted"><strong>Gender :</strong> <span class="ms-2">{{ $application[0]->gender }}</span></p>
                                            </div>
                                         @endif
                                         @if(count($application) == 0)
                                            <div class="col-md-4">
                                                <p class="text-muted"><strong>Nationality :</strong> <span class="ms-2">Not Available</span></p>
                                            </div>
                                        @else
                                            <div class="col-md-4">
                                                <p class="text-muted"><strong>Nationality :</strong> <span class="ms-2">{{ $application[0]->nationality }}</span></p>
                                            </div>
                                        @endif
                                        @if(count($application) == 0)
                                            <div class="col-md-4">
                                            <p class="text-muted"><strong>Date Of Birth :</strong>
                                                <span class="ms-2"> Not Available </span>
                                            </p>
                                            </div>
                                         @else   
                                            <div class="col-md-4">
                                            <p class="text-muted"><strong>Date Of Birth :</strong>
                                                <span class="ms-2"> {{ $application[0]->date_of_birth }} </span>
                                            </p>
                                            </div>
                                         @endif  
                                        </div>
                         

                                        </div>
                                    </div>
                                </div>
                        <div id="download-dbs">
                                <div class="card">
                                    <div class="card-body">
                                    <h4 class="header-title mt-0 mb-3">DBS Details</h4>
                                        <p class="text-muted font-13">
                                        </p>

                                        <hr>

                                    <div class="text-start">
                                        <div class="row">
                                        @if(count($dbsEmployee) == 0)
                                            <div class="col-md-4">
                                                <p class="text-muted"><strong>DBS Number :</strong> <span class="ms-2">Not Available</span></p>
                                            </div>
                                        @else
                                            <div class="col-md-4">
                                                <p class="text-muted"><strong>DBS Number :</strong> <span class="ms-2">{{ $dbsEmployee[0]->dbsNumber }}</span></p>
                                            </div>
                                         @endif
                                         @if(count($dbsDoc) == 0)
                                            <div class="col-md-4">
                                                <p class="text-muted"><strong>DBS Expiry Date :</strong> <span class="ms-2">Not Available</span></p>
                                            </div>
                                        @else
                                            <div class="col-md-4">
                                                <p class="text-muted"><strong>DBS Expiry Date :</strong> <span class="ms-2">{{ $dbsDoc[0]->expiry_date }}</span></p>
                                            </div>
                                         @endif
                                        </div>
                        

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="download-visa">
                                <div class="card">
                                    <div class="card-body">
                                    <h4 class="header-title mt-0 mb-3">Visa Details</h4>
                                        <p class="text-muted font-13">
                                        </p>

                                        <hr>

                                    <div class="text-start">
                                        <div class="row">
                                        @if(count($application) == 0)
                                            <div class="col-md-4">
                                                <p class="text-muted"><strong>Visa Status :</strong> <span class="ms-2">Not Available</span></p>
                                            </div>
                                        @else
                                            <div class="col-md-4">
                                                <p class="text-muted"><strong>Visa Status :</strong> <span class="ms-2">{{ $application[0]->visa_status }}</span></p>
                                            </div>
                                        @endif 
                                        @if(count($application) == 0)
                                            <div class="col-md-4">
                                                <p class="text-muted"><strong>Visa Expiry Date :</strong> <span class="ms-2">Not Available</span></p>
                                            </div>
                                        @else
                                            <div class="col-md-4">
                                                <p class="text-muted"><strong>Visa Expiry Date :</strong> <span class="ms-2">{{ $application[0]->visa_expiry_date }}</span></p>
                                            </div>
                                         @endif
                                         </div>
                                       <!--  <div class="row">
                                        @if(count($dbsEmployee) == 0)
                                            <div class="col-md-12">
                                                <p class="text-muted"><strong>DBS Number :</strong> <span class="ms-2">Not Available</span></p>
                                            </div>
                                        @else
                                            <div class="col-md-12">
                                                <p class="text-muted"><strong>DBS Number :</strong> <span class="ms-2">{{ $dbsEmployee[0]->dbsNumber }}</span></p>
                                            </div>
                                         @endif
                                        </div> -->
                        

                                        </div>
                                    </div>
                                </div>
                            </div>
                               
                                <!-- <div class="card">
                                    <div class="card-body">
                                    <h4 class="header-title mt-0 mb-3">Training Modules</h4>
                                        <p class="text-muted font-13">
                                        </p>

                                        <hr>

                                    <div class="text-start">
                                    <table class="table table-striped dt-responsive nowrap w-100">
                                         <thead>   
                                                <tr>
                                                <th>#</th>
                                                <th>Documents</th>
                                                <th>Expiry Date</th>
                                                 </tr> 
                                        </thead>   
                                                 <tbody class="allData">
                                                 @if(count($trainingDoc) == 0)
                                                 <tr>
                                                    <td align="center" colspan="10">No Data Found</td>
                                                </tr>
                                                @else
                                                 @foreach ($trainingDoc as $employee)
                                                <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                 <td>{{ $employee->file_type}}</td>
                                                 <td>NIL</td>
                                                </tr> 
                                                @endforeach
                                                @endif
                                                </tbody>                  
                                                </table>
                         -->

                                        </div>
                                    </div>
                                </div>

                        <div id="download-training">
                                <div class="card">
                                    <div class="card-body">
                                    <div id="download-training-heading"><h4 class="header-title mt-0 mb-3">Training Modules</h4></div>
                                        <p class="text-muted font-13">
                                        </p>

                                        <hr>

                                    <div class="text-start">
                                    <table  class="table table-striped dt-responsive nowrap w-100">
                                    <thead> 
                                                <tr>
                                                <th>#</th>
                                                <th>Documents</th>
                                                <th>Expiry Date</th>
                                                 </tr> 
                                        </thead> 
                                                 <tbody class="allData">
                                                 @if(count($trainingDoc) == 0)
                                                 <tr>
                                                    <td align="center" colspan="10">No Data Found</td>
                                                </tr>
                                                @else

                                                 @foreach ($trainingDoc as $employee)
                                                 
                                                <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                 <td>{{ $employee->file_type}}</td>
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
                                        <div>
                                            Excellent Care Ltd. or its panel agency have checked and verified the above stated details and confirms that those are true to the best of our knowledge. If you need any further clarifications regarding this candidate, please feel free to contact us at any time.
                                        </div>   <br/>
                                        <div>Kind Regards</div>
                                        <div> HR Department</div>
                                        <div>Excellent Care Ltd.</div>
                                    </div>
                                </div>
                            </div> <!-- End PDF Download Div-->

                               
                    <!-- End PDF Download Info-->
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

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
<script type="text/javascript" src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>

 <script>
var doc = new jsPDF();
var specialElementHandlers = {
    '#editor': function (element, renderer) {
        return true;
    }
};

$('#cmd').click(function () {
    doc.fromHTML($('#download-staff-heading').html(), 85, 15, {
        'width': 170,
            'elementHandlers': specialElementHandlers
    });
     doc.fromHTML($('#download-staff').html(), 15, 25, {
        'width': 170,
            'elementHandlers': specialElementHandlers
    });
    doc.fromHTML($('#download-dbs').html(), 15, 80, {
        'width': 170,
            'elementHandlers': specialElementHandlers
    });
    doc.fromHTML($('#download-visa').html(), 15, 105, {
        'width': 170,
            'elementHandlers': specialElementHandlers
    });
   /*  doc.fromHTML($('#download-training-heading').html(), 15, 150, {
        'width': 170,
            'elementHandlers': specialElementHandlers
    }); */
    doc.fromHTML($('#download-training').html(), 15, 150, {
        'width': 170,
            'elementHandlers': specialElementHandlers
    });

    doc.save('sample-file.pdf');
});
</script> 