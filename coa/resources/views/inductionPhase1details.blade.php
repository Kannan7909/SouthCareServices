<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from coderthemes.com/hyper/saas/pages-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 12 Aug 2022 09:06:26 GMT -->
<head>
        <meta charset="utf-8" />
        <title>Induction</title>
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
                            <div class="col-md-2">
                                <div class="page-title-box">                                   
                                    <h4 class="page-title">Induction Details</h4>
                                </div>
                            </div>
                            <div class="col-md-3"></div>

                            <div class="app-search dropdown d-none d-lg-block col-md-3" style="margin-top: 2%;">
                                <form>
                                    <div class="input-group">
                                        <input type="text" class="form-control dropdown-toggle"  placeholder="Search..." id="search" name="search">
                                        <span class="mdi mdi-magnify search-icon"></span>
                                    </div>
                                </form>
                            </div> 
                            <div class="col-md-3" style="margin-top: 2%;">
                                
                                <div class="page-title-box">                                   
                                <select name="filter_status" id="filter_status"  required style="padding: 0.45rem 0.9rem;border-radius: 0.25em;border: #c1b5b5;">
                                    <option value="" disabled selected hidden>Choose Filter Status</option>
                                     <option value="no"> Pending</option>
                                    <option value="Confirmed"> Confirmed</option>
                                    <option value="Attended"> Attended</option>
                                    <option value="cancelled">Cancelled </option>
                                </select>    
                            </div> 
                                
                            </div> 
                            <div class="col-md-4">
                                <!-- <div class="page-title-box">                                   
                                <label for="status_filter" style="margin-top: 27px;">Status Filter</label>
                                <select name="filter_status" id="filter_status" class="" required style="background-color:#f1f3fa">
                                    <option value="" disabled selected hidden>Choose Filter Status</option>
                                    <option value="registration_completed">All Users</option>
                                    <option value="application_pending">Application Pending </option>
                                    <option value="application_submitted">Application Submitted </option>
                                    <option value="application_approved">Application Approved </option>
                                    <option value="reference_pending"> Reference Pending</option>
                                    <option value="reference_submitted"> Reference Submitted</option>
                                    <option value="reference_approved"> Reference Approved</option>
                                    <option value="training_pending"> Training Pending</option>
                                    <option value="training_requested"> Training Requested</option>
                                    <option value="training_submitted"> Training Submitted</option>
                                    <option value="training_approved"> Training Approved</option>
                                    <option value="dbs_pending"> DBS Pending</option>
                                    <option value="dbs_requested"> DBS Requested</option>
                                    <option value="dbs_submitted"> DBS Submitted</option>
                                    <option value="dbs_approved"> DBS Approved</option>
                                </select>    
                                </div>
                         -->    </div>
                           
                        </div>
                        <!-- end page title --> 

                    
                        


                        <div class="row">
                            <div class="col-xl-12">
                                <!-- training-Information -->
                                <div class="card">
                                    <div class="card-body">
                                    <div id="education-work-details" class="education-work-details">
                                        

                                            
                                            <br>
                                            <table class="table table-bordered">
                                                <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Induction date <!-- <i class="fa fa-sort"> --></i></th>
                                                <th>Induction Time</th>
                                                <th>Status</th>
                                                <th>ACTIONS</th>
                                                 </tr>               
                                                 <tbody class="allData">
                                                    @foreach ($inductionUserDetails as $employee)
                                                    <tr>
                                                    <th scope="row">{{ $loop->iteration }}</th>
                                            
                                                        <td>{{ $employee->firstname }} {{ $employee->surname }}</td>
                                                        <td>{{ $employee->induction_date }}</td>
                                                        <td>{{ $employee->induction_time }}</td>
                                                        <td>@if($employee->induction_status == 'no')
                                                            <span>Pending</span>
                                                        @else
                                                            {{ $employee->induction_status }}@endif</td>
                                                        <td>
                                                        @if($employee->induction_status == 'no')
                                                        <a href="{{ route('confirm.induction',encrypt($employee->induction_user_id)) }}" class="edit btn btn-primary" title="Confirm" data-toggle="tooltip">Confirm Session</a>
                                                        <a href="{{ route('cancel.induction',encrypt($employee->induction_user_id)) }}" class="edit btn btn-primary" title="Confirm" data-toggle="tooltip">Cancel Session</a>
                                                        @elseif ($employee->induction_status == 'Confirmed')
                                                        <a href="{{ route('attend.induction',encrypt($employee->induction_user_id)) }}" class="edit btn btn-primary" title="Confirm" data-toggle="tooltip">Attended Session</a>
                                                        <a href="{{ route('cancel.induction',encrypt($employee->induction_user_id)) }}" class="edit btn btn-primary" title="Confirm" data-toggle="tooltip">Cancel Session</a>
                                                        @elseif ($employee->induction_status == 'Cancelled')
                                                        Session Cancelled
                                                        @else
                                                         Session Attended
                                                        @endif
                                                        
                                                        </td>
                                                    </tr> 
                                                    @endforeach
                                                </tbody>
                                                
                                                <tbody id="content" class="searchData"></tbody>
                                                
                                                </table>

                                                <div class="row">
                                                <div class="col-md-8">
                                                
                                                </div>
                                             
                                            </div>
                                          
                                        <!-- </div>   -->                          
                                    </div>  <!-- Education-work-Details end-->


                                    
                                    </div>
                                </div>
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
        <script src="js/js-theme/pages/demo.profile.js"></script>
        <!-- end demo js-->
        
        <script>
            $(document).ready(function(){
              $('#search').keyup(function(){
                $value=$(this).val();
                if($value){
                    $('.allData').hide();
                    $('.searchData').show();
                }
                else{
                    $('.allData').show();
                    $('.searchData').hide();
                }
                $.ajax({
                    type:'get',
                    url: '{{ route('search.inductionUser') }}',
                    data:{'search':$value},
            
                    success:function(data){
                        //console.log(data);
                        $('#content').html(data);
                    }
                })
              });
              
              
              $("#filter_status").change(function(){
                var status = this.value;

            if(status){
                    $('.allData').hide();
                    $('.searchData').show();
                }
                else{
                    $('.allData').show();
                    $('.searchData').hide();
                }
                $.ajax({
                    type:'get',
                    url: '{{ route('filter.induction') }}',
                    data:{
                        'status':status,
                    },
            
                    success:function(data){
                        console.log(data);
                        $('#content').html(data);
                    }
                })
              });
              
              
            });
        </script>
        
        
    </body>

</html>
