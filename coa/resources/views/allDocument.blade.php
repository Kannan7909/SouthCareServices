<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from coderthemes.com/hyper/saas/pages-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 12 Aug 2022 09:06:26 GMT -->
<head>
        <meta charset="utf-8" />
        <title>All Documents</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta name="csrf-token" content="{{ csrf_token() }}">

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
            @if( $loggedUser->employee_contract == "Pending" )
                @include('navigationMenu')
            @else
                @include('navigationMenuContract')
            @endif

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
                                        @if(count($profile) == 0)
                                            <img src="images/user.png" alt="" class="rounded-circle img-thumbnail">
                                        @else
                                            <img src="{{ $profile[0]->file_path}}" alt="" class="rounded-circle img-thumbnail">
                                        @endif                                    
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
                                    <h4 class="page-title">All Documents</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title --> 

                        <div class="row">
                            <div class="col-xl-12">
                                <!-- Personal-Information -->
                             <!--    <div class="card">
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
                                            <p class="text-muted"><strong>Postcode :</strong>
                                                <span class="ms-2"> {{ $user->postcode }} </span>
                                            </p>
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

                                        </div>
                                    </div>
                                </div> -->
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
                        <input class="form-control  mb-3 required-personal" type="hidden" id="loggedId" name="loggedId"  value="{{ $user->id }}" autocomplete=off> 

                        <div class="row">
                            <div class="col-xl-12">
                                <!-- Training-Information -->
                                <div class="card">
                                    <div class="card-body">
                                    <h4 class="header-title mt-0 mb-3"> Application Form Uploaded Documents</h4>
                                        <p class="text-muted font-13">
                                        </p>
                                        <hr>
                                         
                                    <div class="text-start">
<!--                                     <div class="mt-0 mb-3"><b>Uploaded Documents</b></div>
 -->                                    <table class="table table-striped  dt-responsive nowrap w-100">
                                                <tr>
                                                <thead>
                                                <th>#</th>
                                                <th>Documents</th>
                                                <th>Expiry Date</th>
                                                <th>File Preview</th>
                                                </thead>
                                                 </tr>     
                                                 <tbody class="allData">
                                                 @if(count($applicationDoc) == 0)
                                                 <tr>
                                                    <td align="center" colspan="10">No Data Found</td>
                                                </tr>
                                                @else
                                                 @foreach ($applicationDoc as $employee)
                                                <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                        
                                                    <td>{{ $employee->file_type}}</td>
                                                    <td>{{ $employee->expiry_date}}</td>
                                                    <td>
                                                    <div id="filepreview" class="displaynone"> 
<!--                                                         <img src="" class="displaynone" with="200px" height="200px"><br>
 -->                                                        <i class="fa fa-file" aria-hidden="true" style="color:blue;font-size: 1.95em;"></i>
                                                     <a target="_blank" href="{{ $employee->file_path}}" class="displaynone" data-toggle="tooltip" data-placement="right" title="Click here to view">{{ $employee->file_name}}</a> 
                                                     </div> 
                                                    </td>
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
                                    <h4 class="header-title mt-0 mb-3"> Education Uploaded Documents</h4>
                                        <p class="text-muted font-13">
                                        </p>
                                        <hr>
                                         
                                    <div class="text-start">
<!--                                     <div class="mt-0 mb-3"><b>Uploaded Documents</b></div>
 -->                                    <table class="table table-striped  dt-responsive nowrap w-100">
                                                <tr>
                                                <thead>
                                                <th>#</th>
                                                <th>Documents</th>
                                                <th>File Preview</th>
                                                </thead>
                                                 </tr>     
                                                 <tbody class="allData">
                                                 @if(count($educationDoc) == 0)
                                                 <tr>
                                                    <td align="center" colspan="10">No Data Found</td>
                                                </tr>
                                                @else
                                                 @foreach ($educationDoc as $employee)
                                                <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                        
                                                    <td>{{ $employee->file_type}}</td>
                                                    <td>
                                                    <div id="filepreview" class="displaynone"> 
                                                        <i class="fa fa-file" aria-hidden="true" style="color:blue;font-size: 1.95em;"></i>
                                                     <a target="_blank" href="{{ $employee->file_path}}" class="displaynone" data-toggle="tooltip" data-placement="right" title="Click here to view">{{ $employee->file_name}}</a> 
                                                     </div> 
                                                    </td>
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
                                    <h4 class="header-title mt-0 mb-3"> Work Uploaded Documents</h4>
                                        <p class="text-muted font-13">
                                        </p>
                                        <hr>
                                         
                                    <div class="text-start">
<!--                                     <div class="mt-0 mb-3"><b>Uploaded Documents</b></div>
 -->                                    <table class="table table-striped  dt-responsive nowrap w-100">
                                                <tr>
                                                <thead>
                                                <th>#</th>
                                                <th>Documents</th>
                                                <th>File Preview</th>
                                                </thead>
                                                 </tr>       
                                                 <tbody class="allData">
                                                 @if(count($workDoc) == 0)
                                                 <tr>
                                                    <td align="center" colspan="10">No Data Found</td>
                                                </tr>
                                                @else
                                                 @foreach ($workDoc as $employee)
                                                <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                        
                                                    <td>{{ $employee->file_type}}</td>
                                                    <td>
                                                    <div id="filepreview" class="displaynone"> 
                                                        <i class="fa fa-file" aria-hidden="true" style="color:blue;font-size: 1.95em;"></i>
                                                     <a target="_blank" href="{{ $employee->file_path}}" class="displaynone" data-toggle="tooltip" data-placement="right" title="Click here to view">{{ $employee->file_name}}</a> 
                                                     </div> 
                                                    </td>
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
                                    <h4 class="header-title mt-0 mb-3"> DBS Check Uploaded Documents</h4>
                                        <p class="text-muted font-13">
                                        </p>
                                        <hr>
                                         
                                    <div class="text-start">
<!--                                     <div class="mt-0 mb-3"><b>Uploaded Documents</b></div>
 -->                                    <table class="table table-striped  dt-responsive nowrap w-100">
                                                <tr>
                                                <thead>
                                                <th>#</th>
                                                <th>Documents</th>
                                                <th>Expiry Date</th>
                                                <th>File Preview</th>
                                                </thead>
                                                 </tr>     
                                                 <tbody class="allData">
                                                 @if(count($dbsDoc) == 0)
                                                 <tr>
                                                    <td align="center" colspan="10">No Data Found</td>
                                                </tr>
                                                @else
                                                 @foreach ($dbsDoc as $employee)
                                                <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                        
                                                    <td>{{ $employee->file_type}}</td>
                                                    <td>{{ $employee->expiry_date}}</td>
                                                    <td>
                                                    <div id="filepreview" class="displaynone"> 
<!--                                                         <img src="" class="displaynone" with="200px" height="200px"><br>
 -->                                                        <i class="fa fa-file" aria-hidden="true" style="color:blue;font-size: 1.95em;"></i>
                                                     <a target="_blank" href="{{ $employee->file_path}}" class="displaynone" data-toggle="tooltip" data-placement="right" title="Click here to view">{{ $employee->file_name}}</a> 
                                                     </div> 
                                                    </td>
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
                                    <h4 class="header-title mt-0 mb-3"> Training Check Uploaded Documents</h4>
                                        <p class="text-muted font-13">
                                        </p>
                                        <hr>
                                         
                                    <div class="text-start">
<!--                                     <div class="mt-0 mb-3"><b>Uploaded Documents</b></div>
 -->                                    <table class="table table-striped  dt-responsive nowrap w-100">
                                                <tr>
                                                <thead>
                                                <th>#</th>
                                                <th>Documents</th>
                                                <th>Expiry Date</th>
                                                <th>File Preview</th>
                                                </thead>
                                                 </tr>       
                                                 <tbody class="allData">
                                                 @if(count($trainingDoc) == 0)
                                                 <tr>
                                                    <td align="center" colspan="10">No Data Found</td>
                                                </tr>
                                                @else
                                                 @foreach ($trainingDoc as $employee)
                                                <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                        
                                                    <td>{{ $employee->file_type}}</td>
                                                    <td>{{ $employee->expiry_date}}</td>
                                                    <td>
                                                    <div id="filepreview" class="displaynone"> 
                                                        <i class="fa fa-file" aria-hidden="true" style="color:blue;font-size: 1.95em;"></i>
                                                     <a target="_blank" href="{{ $employee->file_path}}" class="displaynone" data-toggle="tooltip" data-placement="right" title="Click here to view">{{ $employee->file_name}}</a> 
                                                     </div> 
                                                    </td>
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
                                    <h4 class="header-title mt-0 mb-3"> P45 Uploaded Documents</h4>
                                        <p class="text-muted font-13">
                                        </p>
                                        <hr>
                                         
                                    <div class="text-start">
<!--                                     <div class="mt-0 mb-3"><b>Uploaded Documents</b></div>
 -->                                    <table class="table table-striped  dt-responsive nowrap w-100">
                                                <tr>
                                                <thead>
                                                <th>#</th>
                                                <th>Documents</th>
                                                <th>File Preview</th>
                                                </thead>
                                                 </tr>       
                                                 <tbody class="allData">
                                                 @if(count($p45Doc) == 0)
                                                 <tr>
                                                    <td align="center" colspan="10">No Data Found</td>
                                                </tr>
                                                @else
                                                 @foreach ($p45Doc as $employee)
                                                <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                        
                                                    <td>{{ $employee->file_type}}</td>
                                                    <td>
                                                    <div id="filepreview" class="displaynone"> 
                                                        <i class="fa fa-file" aria-hidden="true" style="color:blue;font-size: 1.95em;"></i>
                                                     <a target="_blank" href="{{ $employee->file_path}}" class="displaynone" data-toggle="tooltip" data-placement="right" title="Click here to view">{{ $employee->file_name}}</a> 
                                                     </div> 
                                                    </td>
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
                                    <h4 class="header-title mt-0 mb-3"> Additional Uploaded Documents</h4>
                                        <p class="text-muted font-13">
                                        </p>
                                        <hr>
                                         
                                    <div class="text-start">
<!--                                     <div class="mt-0 mb-3"><b>Uploaded Documents</b></div>
 -->                                    <table class="table table-striped  dt-responsive nowrap w-100">
                                                <tr>
                                                <thead>
                                                <th>#</th>
                                                <th>Documents</th>
                                                <th>File Preview</th>
                                                </thead>
                                                 </tr>      
                                                 <tbody class="allData">
                                                 @if(count($additionalDoc) == 0)
                                                 <tr>
                                                    <td align="center" colspan="10">No Data Found</td>
                                                </tr>
                                                @else
                                                 @foreach ($additionalDoc as $employee)
                                                <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                        
                                                    <td>{{ $employee->file_type}}</td>
                                                    <td>
                                                    <div id="filepreview" class="displaynone"> 
                                                        <i class="fa fa-file" aria-hidden="true" style="color:blue;font-size: 1.95em;"></i>
                                                     <a target="_blank" href="{{ $employee->file_path}}" class="displaynone" data-toggle="tooltip" data-placement="right" title="Click here to view">{{ $employee->file_name}}</a> 
                                                     </div> 
                                                    </td>
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
                                        <div class="row">   
                                            <div class="col-md-5 mb-3" style="width: 35%">
                                                <label for="more_documents" class="form-label">Upload Documents</label>
                                            </div>
                                            <!-- <div class="col-md-2 mb-3">
                                                <select name="more_documents" id="more_documents" class="form-control select2 form-select required-dbs" autocomplete=off>
                                                    <option value="" disabled selected hidden>Choose One</option>
                                                    <option value="yes">Yes</option>
                                                    <option value="no">No</option>
                                                </select>
                                            </div> -->
                                        </div>
                                 <div class="alert displaynone" id="responseMsg" style="display:none"></div>
                                        <div id="otherTable">
                                                <table id="tbl">
                                                <!-- <tr>
                                                    <th>SL. No</th>
                                                    <th>Place Of Study</th>
                                                    <th>Qualification</th>
                                                    <th>Graduation Date</th>
                                                </tr>   --> 
                                                 <tr>
<!--                                                     <td><label for="other" class="form-label  mb-3" style="width:90px">File Type</label></td> 
 -->                                                    <td>
                                                        <select name="file_list1" id="file_list1" class="form-control select2 form-select required-dbs " autocomplete=off>
                                                            <option value="" disabled selected hidden>Select Your File</option>
                                                            <option value="Passport">Passport</option>
                                                            <option value="BRP">BRP</option>
                                                            <option value="Right to Work">Right to Work</option>
                                                            <option value="Education">Education</option>
                                                            <option value="Work">Work</option>
                                                            <option value="DBS">DBS</option>
                                                            <option value="UpdateFile">UpdateFile</option>
                                                            <option value="Moving and Handling">Moving and Handling</option>
                                                            <option value="Safeguarding Adults">Safeguarding Adults</option>
                                                            <option value="Health and Safety">Health and Safety</option>
                                                            <option value="Food and Hygiene">Food and Hygiene</option>
                                                            <option value="First Aid/ Basic Life Support">First Aid/ Basic Life Support</option>
                                                            <option value="COSHH">COSHH</option>
                                                            <option value="Fire Safety">Fire Safety</option>
                                                            <option value="Challenging Behavior">Challenging Behavior</option>
                                                            <option value="Epilepsy">Epilepsy</option>
                                                            <option value="Dementia">Dementia</option>
                                                            <option value="Mental Capacity Act">Mental Capacity Act</option>
                                                            <option value="Infection Prevention Control">Infection Prevention Control</option>
                                                            <option value="Learning Disabilities">Learning Disabilities</option>
                                                            <option value="Care Certificate">Care Certificate</option>
                                                            <option value="P45">P45</option>
                                                            <option value="Additional">Other</option>
                                                        </select>
                                                    </td> 
                                                    <td><input class="form-control required-personal" type="text" id="additional_file_type1" name="additional_file_type1" placeholder="Enter The File Name" style="display:none" autocomplete=off></td> 
                                                    <td> 
                                                         <div class="col-md-10 mb-3"  style="display:none" id="file_expiry">
                                                            <label for="expiry_date" class="form-label">Expiry Date</label>
                                                            <input type="date" class="form-control date" id="expiry_date" name="expiry_date">
                                                        </div>
                                                     </td>
                                                    <td><input class="form-control required-personal" type="file" id="additional_file1" name="additional_file1" onchange="uploadAdditionalDoc()"></td>
<!--                                                     <td><input type="button" class="button" value="+" id="" onclick="addOtherRows('tbl')"/></td>
 -->
                                                </tr> 
                                                <tr>
                                                    <span id="select-file" class="hide-text mob-helpers mb-3" style="color:red;">
                                                        Please select your file before uploading
                                                    </span>
                                                </tr>
                                                </table>
                                               
                                                </div>
                                     
                                        </div>
                                        </div>
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

<!-- 
   //Jquery worked in local but not in cpanel 
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
 -->

 <style>
.hide-text{
  display: none;
}
</style>

<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>

<script>
          var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute("content");

     var i=1;
 $(document).ready(function(){
        $("#reviewButton").hide();
        $("#approveButton").hide();
        $("#mailSend").hide();
    });
    
    $('#file_list1').on('change', function () {

        if ((this.value === 'Education') || (this.value === 'Work') || (this.value === 'Additional')){
            document.getElementById('additional_file_type1').style.display = "block";
        } else {
            document.getElementById('additional_file_type1').style.display = "none";

        }
        if ((this.value === 'Passport') || (this.value === 'BRP') || (this.value === 'DBS') || (this.value === 'Moving and Handling') || (this.value === 'Safeguarding Adults') || (this.value === 'Health and Safety') || (this.value === 'Food and Hygiene') || (this.value === 'First Aid/ Basic Life Support') || (this.value === 'COSHH') || (this.value === 'Fire Safety') || (this.value === 'Challenging Behavior') || (this.value === 'Epilepsy') || (this.value === 'Dementia') || (this.value === 'Mental Capacity Act') || (this.value === 'Infection Prevention Control') || (this.value === 'Learning Disabilities') || (this.value === 'Care Certificate')){
            document.getElementById('file_expiry').style.display = "block";
        } else {
            document.getElementById('file_expiry').style.display = "none";

        }
    });


/* $('#more_documents').on('change', function () {

if (this.value === 'yes'){
    $("#otherTable").show();
} else {
    $("#otherTable").hide();
}
}); */

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
    $comments=$("#training_comments").val();
    $email=$("#userEmail").val();
    jQuery.ajax({
  
  url: "{{ route('approve.training') }}",
  method: 'get',
  data: {
    email :  $email,
    comments: $comments
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
    $comments=$("#training_comments").val();
    $email=$("#userEmail").val();
    jQuery.ajax({
  
  url: "{{ route('review.training') }}",
  method: 'get',
    data: {
    email :  $email,
    comments: $comments
 },  
  success: function(result){
     console.log(result);
    window.location.href = "{{ route('training.list') }}"

  }});
});

function addOtherRows( table ){
            i=i+1;
            var tableRef = document.getElementById(table);
          console.log(tableRef)
            var newRow   = tableRef.insertRow(-1);

           /*  var newCell  = newRow.insertCell(0);
            var newElem = document.createElement( 'label' );
            newElem.setAttribute("name", "other");
            newElem.setAttribute("name", "other");
            newElem.innerHTML = "File Type";
            newElem.setAttribute("class", " mb-3");
            newCell.appendChild(newElem); */
            //newElem.innerHTML = "Other "+i;

            var newCell  = newRow.insertCell(0);
            var newElem = document.createElement( 'select' );
            newElem.setAttribute("name", 'file_list'+i);
            newElem.setAttribute("id", 'file_list'+i);
            newElem.setAttribute("class", "form-control select2 form-select  mb-3");

            var op = new Option();
            op.value = "";
            op.text = "Select Your File";
            op.text = "Select Your File";
            newElem.options.add(op);

            var op1 = new Option();
            op1.value = "Passport";
            op1.text = "Passport";
            newElem.options.add(op1);

            var op2 = new Option();
            op2.value = "BRP";
            op2.text = "BRP";
            newElem.options.add(op2);

            var op3 = new Option();
            op3.value = "Right to Work";
            op3.text = "Right to Work";
            newElem.options.add(op2);

            var op4 = new Option();
            op4.value = "Education";
            op4.text = "Education";
            newElem.options.add(op4);

            var op5 = new Option();
            op5.value = "Work";
            op5.text = "Work";
            newElem.options.add(op5);

            var op6 = new Option();
            op6.value = "DBS";
            op6.text = "DBS";
            newElem.options.add(op6);

            var op7 = new Option();
            op7.value = "UpdateFile";
            op7.text = "UpdateFile";
            newElem.options.add(op7);

            var op8 = new Option();
            op8.value = "Moving and Handling";
            op8.text = "Moving and Handling";
            newElem.options.add(op8);

            var op9 = new Option();
            op9.value = "";
            op9.text = "Safeguarding Adults";
            op9.text = "Safeguarding Adults";
            newElem.options.add(op9);

            var op10 = new Option();
            op10.value = "Health and Safety";
            op10.text = "Health and Safety";
            newElem.options.add(op10);

            var op11 = new Option();
            op11.value = "Food and Hygiene";
            op11.text = "Food and Hygiene";
            newElem.options.add(op11);

            var op12 = new Option();
            op12.value = "First Aid/ Basic Life Support";
            op12.text = "First Aid/ Basic Life Support";
            newElem.options.add(op12);

            var op13 = new Option();
            op13.value = "COSHH";
            op13.text = "COSHH";
            newElem.options.add(op13);

            var op14 = new Option();
            op14.value = "Fire Safety";
            op14.text = "Fire Safety";
            newElem.options.add(op14);

            var op15 = new Option();
            op15.value = "Challenging Behavior";
            op15.text = "Challenging Behavior";
            newElem.options.add(op15);

            var op16 = new Option();
            op16.value = "Epilepsy";
            op16.text = "Epilepsy";
            newElem.options.add(op16);

            var op18 = new Option();
            op18.value = "Dementia";
            op18.text = "Dementia";
            newElem.options.add(op18);

            var op19 = new Option();
            op19.value = "Mental Capacity Act";
            op19.text = "Mental Capacity Act";
            newElem.options.add(op19);

            var op20 = new Option();
            op20.value = "Infection Prevention Control";
            op20.text = "Infection Prevention Control";
            newElem.options.add(op20);

            var op21 = new Option();
            op21.value = "Learning Disabilities";
            op21.text = "Learning Disabilities";
            newElem.options.add(op21);

            var op22 = new Option();
            op22.value = "Care Certificate";
            op22.text = "Care Certificate";
            newElem.options.add(op22);

            var op23 = new Option();
            op23.value = "Additional";
            op23.text = "Other";
            newElem.options.add(op23);



            newCell.appendChild(newElem);

            var newCell  = newRow.insertCell(1);
            var newElem = document.createElement( 'input' );
            newElem.setAttribute("name", 'additional_file_type'+i);
            newElem.setAttribute("id", 'additional_file_type'+i);
            newElem.setAttribute("type", "text");
            newElem.setAttribute("class", "form-control mb-3");
            newElem.setAttribute("placeholder", "Enter The File Type");
            newElem.setAttribute("hidden", true);
            newCell.appendChild(newElem);
           
            var newCell  = newRow.insertCell(2);
            var newElem = document.createElement( 'input' );
            newElem.setAttribute("name", 'additional_file'+i);
            newElem.setAttribute("id", 'additional_file'+i);
            newElem.setAttribute("type", "file");
            newElem.setAttribute("class", "form-control mb-3");
            newElem.setAttribute("onchange", "uploadAdditionalFiles(i)");

            newCell.appendChild(newElem);


            $('#file_list'+i).on('change', function () {

if ((this.value === 'Education') || (this.value === 'Work') || (this.value === 'Additional')){
    //document.getElementById('additional_file_type'+i).removeAttribute("hidden");
    document.getElementById('additional_file_type'+i).hidden=false;
} else {
    document.getElementById('additional_file_type'+i).hidden=true;

}
});
           
        /*     var newCell  = newRow.insertCell(2);
            var newElem = document.createElement( 'input' );
            newElem.setAttribute("name",i);
            newElem.setAttribute("id", i);
            newElem.setAttribute("type", "button");
            newElem.setAttribute("value", "Upload");
            newElem.setAttribute("class", "btn btn-primary mb-3");
            newElem.setAttribute("onclick", "otherFileUpload(this.id)");
            newCell.appendChild(newElem); */

            /*  newCell = newRow.insertCell(3);
            newElem = document.createElement( 'input' );
            newElem.setAttribute("type", "button");
            newElem.setAttribute("value", "Delete Row");
            newElem.setAttribute("onclick", 'SomeDeleteRowFunction(this)')
            newCell.appendChild(newElem); */
            }


            window.SomeDeleteRowFunction = function SomeDeleteRowFunction(o) {
            var p=o.parentNode.parentNode;
            p.parentNode.removeChild(p);
            }

    
 function uploadAdditionalDoc(){
   
    /* alert("bhgj")
    alert($("#additional_file_type1").val()) */
    // Get the selected file
    //alert($("#file_list1").val()) 
 var type= $("#file_list1").val()
 var employeeId= $("#loggedId").val()
 var expiry_date= $("#expiry_date").val()
if(expiry_date == ""){
    expiry_date="1900-01-01"
}

 if(type==null){
    $('#file_list1').attr('required', true);
    $("#select-file").removeClass("hide-text");
    $("#additional_file1").val(null);
 }else{
   var files = $('#additional_file1')[0].files;
   console.log(files);
var additional = $("#additional_file_type1").val();
if(additional==""){
   additional=type;
}
   if(files.length > 0){
      var fd = new FormData();

      // Append data 
      fd.append('file',files[0]);
      fd.append('_token',CSRF_TOKEN);
      fd.append('file_type',additional);
      fd.append('file_type_additional',type);
      fd.append('employeeId',employeeId);
      fd.append('expiry_date',expiry_date);


      // Hide alert 
      $('#responseMsg').hide();

      // AJAX request 
      $.ajax({
        url: "{{route('file.upload')}}",
        method: 'post',
        data: fd,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function(response){
console.log(response.filetype)
console.log(response.error)

          // Hide error container
          $('#err_file').removeClass('d-block');
          $('#err_file').addClass('d-none');

          if(response.success == 1){ // Uploaded successfully

            // Response message
            $('#responseMsg').removeClass("alert-danger");
            $('#responseMsg').addClass("alert-success");
            $('#responseMsg').html(response.message);
            $('#responseMsg').show();
            window.location.href = "{{ route('all.documents') }}"


            // File preview
            $('#filepreview').show();
            $('#filepreview img,#filepreview a').hide();
            if(response.extension == 'jpg' || response.extension == 'jpeg' || response.extension == 'png'){

               $('#filepreview img').attr('src',response.filepath);
               $('#filepreview img').show();
            }else{
               $('#filepreview a').attr('href',response.filepath).show();
               $('#filepreview a').show();
            }
          }else if(response.success == 2){ // File not uploaded

            // Response message
            $('#responseMsg').removeClass("alert-success");
            $('#responseMsg').addClass("alert-danger");
            $('#responseMsg').html(response.message);
            $('#responseMsg').show();
          }else{
            // Display Error
            $('#err_file').text(response.error);
            $('#err_file').removeClass('d-none');
            $('#err_file').addClass('d-block');
          } 
        },
        error: function(response){
           console.log("error : " + JSON.stringify(response) );
        }
      });
   }else{
      alert("Please select a file.");
   }
    }
}

    function uploadAdditionalFiles(id){
 // Get the selected file
 var type= $("#file_list"+id).val()
 var files = $('#additional_file'+id)[0].files;
 console.log(files);
 var additional = $("#additional_file_type"+id).val();

 if(files.length > 0){
    var fd = new FormData();

    // Append data 
    fd.append('file',files[0]);
    fd.append('_token',CSRF_TOKEN);
    fd.append('file_type',type);
    fd.append('file_type_additional',additional);

    // Hide alert 
    $('#responseMsg').hide();

    // AJAX request 
    $.ajax({
      url: "{{route('file.upload')}}",
      method: 'post',
      data: fd,
      contentType: false,
      processData: false,
      dataType: 'json',
      success: function(response){

        // Hide error container
        $('#err_file').removeClass('d-block');
        $('#err_file').addClass('d-none');

        if(response.success == 1){ // Uploaded successfully

          // Response message
          $('#responseMsg').removeClass("alert-danger");
          $('#responseMsg').addClass("alert-success");
          $('#responseMsg').html(response.message);
          $('#responseMsg').show();
          window.location.href = "{{ route('all.documents') }}"

          // File preview
          $('#filepreview').show();
          $('#filepreview img,#filepreview a').hide();
          if(response.extension == 'jpg' || response.extension == 'jpeg' || response.extension == 'png'){

             $('#filepreview img').attr('src',response.filepath);
             $('#filepreview img').show();
          }else{
             $('#filepreview a').attr('href',response.filepath).show();
             $('#filepreview a').show();
          }
        }else if(response.success == 2){ // File not uploaded

          // Response message
          $('#responseMsg').removeClass("alert-success");
          $('#responseMsg').addClass("alert-danger");
          $('#responseMsg').html(response.message);
          $('#responseMsg').show();
        }else{
          // Display Error
          $('#err_file').text(response.error);
          $('#err_file').removeClass('d-none');
          $('#err_file').addClass('d-block');
        } 
      },
      error: function(response){
         console.log("error : " + JSON.stringify(response) );
      }
    });
 }else{
    alert("Please select a file.");
 }


}
</script>