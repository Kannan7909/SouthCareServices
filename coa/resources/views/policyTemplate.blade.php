<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from coderthemes.com/hyper/saas/pages-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 12 Aug 2022 09:06:26 GMT -->
<head>
        <meta charset="utf-8" />
        <title>Terms & Conditions</title>
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
                                        <img src="images/user.png" alt="user-image" class="rounded-circle">
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
                                    <h4 class="page-title">T&C Template</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title --> 
                        <div class="card">
                            <div class="card-body">
                        
                            <div class="alert alert-success successMsg" id="successMsg"role="alert" style="display:none">
                                    Saved Successfully!
                             </div>
                        <div class="row">   
                                <label for="status" class="form-label">T&C Heading</label>
                        
                            <div class="col-md-3 mb-3">
                                <input class="form-control required-heading" type="text" id="heading" name="heading" placeholder="Enter T&C heading" required autocomplete=off>
                            </div>
                        </div>       

                        <div class="row">
                            <div class="col-xl-12">
                                <div>
                                    <textarea id="ckplot"></textarea>
                                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" ></script>
                                    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
                                    
                                </div>
                           
                                <!-- Toll free number box-->
                                <div class="card text-white bg-info overflow-hidden">
                                    
                                </div> <!-- end card-->
                                <!-- End Toll free number box-->

                                <!-- Messages-->
                              

                            </div> <!-- end col-->



                        </div>
                        <!-- end row -->
                        <div class="row">
                            <div class="col-md-5 mb-3" style="margin-left:-40px;">
                            </div>
                            <div class="col-md-2 mb-0 d-grid text-center">
                                <button class="btn btn-primary toggle-disabled" type="submit" id="submit" disabled> Submit</button>
                            </div>
                        </div>
                    </div> <!-- container -->

                </div> <!-- content -->
                
                </div> 

                </div>
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

<script>
CKEDITOR.replace("ckplot");
$(document).ready(function(){
    jQuery.ajax({
  
  url: "{{ route('get.policy') }}",
  method: 'get',
/*   data: {
    template :  template,
    template_section: template_section
 }, */ 
  success: function(result){
     console.log(result);
     showFunction(result);

  }});     
});

        $(document).on('change keyup', '.required-heading', function(e){
                let Disabled = true;
                $(".required-heading").each(function() {
                let value = this.value
                if ((value)&&(value.trim() !=''))
                    {
                        Disabled = false
                    }else{
                        Disabled = true
                        return false
                    }
                });
            
            if(Disabled){
                    $('.toggle-disabled').prop("disabled", true);
                }else{
                    $('.toggle-disabled').prop("disabled", false);
                }
            });
//CKEDITOR.instances["ckplot"].setData("<h1> data to render</h1>")

$('#submit').click(function(){
     var template = CKEDITOR.instances["ckplot"].getData();
     var template_section ="Policy";
     var heading = $('#heading').val();
    jQuery.ajax({
  
  url: "{{ route('save.policy') }}",
  method: 'get',
  data: {
    template :  template,
    heading :  heading,
    template_section: template_section
 }, 
  success: function(result){
     console.log(result);
     successFunction();

  }}); 
});
function successFunction(result){
    document.getElementById('successMsg').style.display = "block";
}
function showFunction(result){
    $('.toggle-disabled').prop("disabled", false);
    CKEDITOR.instances["ckplot"].setData(result['template']);
    $('#heading').val(result['heading']);
}
    </script>