
<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from coderthemes.com/hyper/saas/pages-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 12 Aug 2022 09:06:26 GMT -->
<head>
        <meta charset="utf-8" />
        <title>Current Status</title>
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

    <body class="loading" data-layout-color="light" data-leftbar-theme="dark" data-layout-mode="fluid" data-rightbar-onstart="true">
        <!-- Begin page -->
        <div class="wrapper">
        @if( $employee->employee_contract == "Pending" )
                @include('navigationMenu')
            @else
                @include('navigationMenuContract')
            @endif
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
                                    
                                    <h4 class="page-title"> {{ $form }}</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title --> 


                        


                        <div class="row">
                            <div class="col-xl-12">
                                <!-- training-Information -->
                                <div class="card">
                                    <div class="card-body">
                               @if($path!='all.documents')
                                @if($form=='Employee Contract Form')
                                 @if($status=='Commented')
                                 
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
                            
                                    To continue to {{ $form }}? <a href="{{ route($path) }}" class="text-muted ms-1"><b style="color:red;">Click Here</b></a>
                                 @elseif($status=='Submitted')
                                    <label for="msg" class="form-label"> {{ $data }} </label> </br></br></br>
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

                                     @elseif($status=='Under Review')
                                     <label for="msg" class="form-label"> {{ $data }} </label> </br></br>
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
                            
                                    To continue to {{ $form }}? <a href="{{ route($path) }}" class="text-muted ms-1"><b style="color:red;">Click Here</b></a>
                                     @elseif($status=='Approved')
                                    <label for="msg" class="form-label"> {{ $data }} </label> </br></br>
                                    @include('downloadContract')    
                                @endif

                                    @elseif($form=='Induction Checklist') 
                                    <label for="msg" class="form-label"> {{ $data }} </label> </br>
                                    @if($comment=="Nil")
                                    <label for="msg" class="form-label"> </label>
                                    @else
                                    <label for="msg" class="form-label">Comment by admin : {{ $comment }}  </label> </br></br>
                                    @endif

                                    @else
                                    <label for="msg" class="form-label"> {{ $data }} </label> </br>
                                    @if($comment=="Nil")
                                    <label for="msg" class="form-label"> </label>
                                    @else
                                    <label for="msg" class="form-label">Comment by admin : {{ $comment }}  </label> </br></br>
                                    @endif
                                    Do you want to Edit {{ $form }}? <a href="{{ route($path) }}" class="text-muted ms-1"><b style="color:red;">Click Here</b></a>
                                    @endif
                                @elseif($form=='Training Check') 
                                    <label for="msg" class="form-label"> {{ $data }} </label> </br>
                                    @if($comment=="Nil")
                                    <label for="msg" class="form-label"> </label>
                                    @else
                                    <label for="msg" class="form-label">Comment by admin : {{ $comment }}  </label> </br></br>
                                    @endif 
                                    Do you want to see your uploaded training documents? <a href="{{ route($path) }}" class="text-muted ms-1"><b style="color:red;">Click Here</b></a>
                                @elseif($form=='Starter Checklist') 
                                <label for="msg" class="form-label"> {{ $data }} </label> </br>
                                @if($comment=="Nil")
                                <label for="msg" class="form-label"> </label>
                                @else
                                <label for="msg" class="form-label">Comment by admin : {{ $comment }}  </label> </br></br>
                                @endif 
                                Do you want to see your uploaded P45 document? <a href="{{ route($path) }}" class="text-muted ms-1"><b style="color:red;">Click Here</b></a>
                               
                                @endif                                    
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
    </body>

</html>

<script type="text/javascript">
$(".notification-list").on('click', function(event){
    $(".dropdown-menu").show();
});
</script>

