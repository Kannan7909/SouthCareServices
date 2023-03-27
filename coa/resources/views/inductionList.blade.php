<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from coderthemes.com/hyper/saas/pages-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 12 Aug 2022 09:06:26 GMT -->
<head>
        <meta charset="utf-8" />
        <title>Induction List</title>
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
                            <div class="col-12">
                                <div class="page-title-box">
                                    
                                    <h4 class="page-title">Induction Details</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title --> 

                   <!--- <div class="row">
                        <div class=" col-xl-8"></div>
                        
                        <div class="app-search dropdown d-none d-lg-block col-xl-4">
                            <form>
                                <div class="input-group">
                                    <input type="date" class="form-control mb-3" id="inductionDate" name="inductionDate" data-toggle="date-picker" data-single-date-picker="false">
                               </div>
                            </form>

                        </div>
                    </div><br>--->
                        


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
                                                <th>Induction Date</th>
                                                <th>Induction Time</th>
                                                <th>Total Seats</th>
                                                <th>Total Bookings</th>
                                                <th>ACTIONS</th>
                                                 </tr>               
                                                 <tbody class="allData">
                                                    @foreach ($inductionData as $employee)
                                                    <tr>
                                                    <td scope="row">{{ $loop->iteration }}</td>
                                                        <td>{{ $employee->induction_date }}</td>
                                                        <td>{{ $employee->induction_time }}</td>
                                                        <td>{{ $employee->limit }}</td>
                                                        <td>{{ $employee->seat }}</td>
                                                        <td>
                                                            @if($employee->status == 'no')
                                                            <a href="{{ route('delete.induction',encrypt($employee->id)) }}" class="edit btn btn-primary" title="Confirm" data-toggle="tooltip">Delete</a></td>
                                                            @endif
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
        
       <!-- <script>
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
                    url: '{{ route('search.inductionList') }}',
                    data:{'search':$value},
            
                    success:function(data){
                        console.log(data);
                        $('#content').html(data);
                    }
                })
              });
            });
        </script>-->
        
        
    </body>

</html>
