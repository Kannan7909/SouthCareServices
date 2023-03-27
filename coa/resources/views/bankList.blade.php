<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from coderthemes.com/hyper/saas/pages-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 12 Aug 2022 09:06:26 GMT -->
<head>
        <meta charset="utf-8" />
        <title>Bank List</title>
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
                                    <h4 class="page-title">Bank Status</h4>
                                </div>
                            </div>
                            <div class="app-search dropdown d-none d-lg-block col-xl-3" style="margin-top: 18px;">
                                <form>
                                    <div class="input-group">
                                        <input type="text" class="form-control dropdown-toggle"  placeholder="Search..." id="search" name="search">
                                        <span class="mdi mdi-magnify search-icon"></span>
                                </div>
                                </form>
                            </div>
                          <!--  <div class="col-md-1"></div> -->
                            <div class="col-md-3">
                                <div class="page-title-box">                                   
                                <label for="status_filter" style="margin-top: 27px;">Status Filter</label>
                                <select name="filter_status" id="filter_status" class="" required style="background-color:#f1f3fa">
                                    <option value="" disabled selected hidden>Choose Filter Status</option>
<!--                                <option value="registration_completed">All Users</option>
                                    <option value="application_pending">Application Pending </option>
                                    <option value="application_submitted">Application Submitted </option>
                                    <option value="application_under Review">Application Under Review </option>
                                    <option value="application_approved">Application Approved </option>  -->
                                    <option value="bank_pending"> Bank Pending</option>
                                    <option value="bank_submitted"> Bank Submitted</option>
                                    <option value="bank_under Review">Bank Under Review </option>
                                    <option value="bank_approved"> Bank Approved</option>
                                  <!--  <option value="training_pending"> Training Pending</option>
                                    <option value="training_requested"> Training Requested</option>
                                    <option value="training_submitted"> Training Submitted</option>
                                    <option value="training_approved"> Training Approved</option>
                                    <option value="dbs_pending"> DBS Pending</option>
                                    <option value="dbs_requested"> DBS Requested</option>
                                    <option value="dbs_submitted"> DBS Submitted</option>
                                    <option value="dbs_approved"> DBS Approved</option> -->
                                </select>   
                                </div>
                            </div>
                           
                        </div>
                        <!-- end page title --> 


                        <div class="row">
                            <div class="col-xl-12">
                                <!-- training-Information -->
                                <div class="card">
                                    <div class="card-body">
                                    <div id="education-work-details" class="education-work-details">
                                        

                                            
                                            <br>
                                            <table class="table table-striped dt-responsive nowrap w-100">
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
                                                 @if(count($bankData) == 0)
                                                 <tr>
                                                    <td align="center" colspan="10">No Data Found</td>
                                                </tr>
                                                @else
                                                 @foreach ($bankData as $employee)
                                                <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                    <td>{{ $employee->firstname }} {{ $employee->surname }}</td>
                                                    <td>{{ $employee->contact_no }}</td>
                                                    <td>{{ $employee->uk_contact_no }}</td>                                                    
                                                    <td>{{ $employee->email }}</td>
                                                    @if($employee->bank_status == "Submitted")
                                                    <td><i class="mdi mdi-circle text-primary"></i>Bank {{ $employee->bank_status }}</td>
                                                    @endif
                                                    @if($employee->bank_status == "Under Review")
                                                    <td><i class="mdi mdi-circle text-warning"></i>Bank {{ $employee->bank_status }}</td>
                                                    @endif
                                                    @if($employee->bank_status == "Approved")
                                                    <td><i class="mdi mdi-circle text-success"></i>Bank {{ $employee->bank_status }}</td>
                                                    @endif
                                                    <td>
                                                        <a href="{{ route('view.bank',encrypt($employee->employee_id)) }}" class="btn btn-primary" title="View" data-toggle="tooltip">View</a>
                                                  </td>
                                                </tr> 
                                                @endforeach
                                                @endif
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
                    url: '{{ route('search.bank') }}',
                    data:{'search':$value},
            
                    success:function(data){
                        console.log(data);
                        $('#content').html(data);
                    }
                })
              });
            });
            
            $("#filter_status").change(function(){
    var value = this.value;
    var data = value.split("_");
    //console.log(data[0]);
    var column = data[0]+"_status";
    var status = data[1];
if(value){
        $('.allData').hide();
        $('.searchData').show();
    }
    else{
        $('.allData').show();
        $('.searchData').hide();
    }
    $.ajax({
        type:'get',
        url: '{{ route('filter.bank') }}',
        data:{
            'column':column,
            'status':status,
        },

        success:function(data){
            console.log(data);
            $('#content').html(data);
        }
    })
  });

        </script> 
        
        
    </body>

</html>
