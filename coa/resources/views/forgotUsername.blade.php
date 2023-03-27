<!DOCTYPE html>
<html lang="en">

    
<!-- Mirrored from coderthemes.com/hyper/saas/pages-recoverpw-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 12 Aug 2022 09:07:44 GMT -->
<head>
        <meta charset="utf-8" />
        <title>Forgot Username</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="images/images-theme/favicon.ico">

        <!-- App css -->
        <link href="css/css-theme/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="css/css-theme/app.min.css" rel="stylesheet" type="text/css" id="app-style"/>

    </head>

    <body class="authentication-bg pb-0" data-layout-config='{"darkMode":false}'>

        <div class="auth-fluid">
            <!--Auth fluid left content -->
            <div class="auth-fluid-form-box">
                <div class="align-items-center d-flex h-100">
                    <div class="card-body">

                        <!-- Logo -->
                        <!-- <div class="auth-brand text-center text-lg-start">
                            <a href="index.html" class="logo-dark">
                                <span><img src="images/images-theme/logo-dark.png" alt="" height="18"></span>
                            </a>
                            <a href="index.html" class="logo-light">
                                <span><img src="images/images-theme/logo.png" alt="" height="18"></span>
                            </a>
                        </div> -->

                        <!-- title-->
                        <h4 class="mt-0">Reset Username</h4>
                        <p class="text-muted mb-4">Enter your email address and we'll send you an email with instructions to reset your username.</p>

                        <!-- form -->
                        <form method="post" action="{{ route('username.mail') }}">
                        {{ csrf_field() }}
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input class="form-control" type="email" id="email" name="email" required="" placeholder="Enter your email address">
                            </div>
                            <div class="mb-0 text-center d-grid">
                                <button class="btn btn-primary" type="submit"><i class="mdi mdi-lock-reset"></i> Email Send </button>
                            </div>
                        </form>
                        <!-- end form-->

                        <!-- Footer-->
                         <footer class="footer footer-alt">
                            <p class="text-muted">Already have an account <a href="{{ route('sign.in') }}" class="text-muted ms-1"><b>Login Here</b></a></p>
                        </footer> 

                    </div> <!-- end .card-body -->
                </div> <!-- end .align-items-center.d-flex.h-100-->
            </div>
            <!-- end auth-fluid-form-box-->

            <!-- Auth fluid right content -->
            <div class="auth-fluid-right text-center">
                <div class="auth-user-testimonial">
                    <!-- <h2 class="mb-3">I love the color!</h2>
                    <p class="lead"><i class="mdi mdi-format-quote-open"></i> It's a elegent templete. I love it very much! . <i class="mdi mdi-format-quote-close"></i>
                    </p>-->
                    <div class="row">   
                            <div class="col-md-7">
                            </div>
                            <div class="col-md-5" style="margin-bottom:-25px;color:#c0b8b8">
							 <a target="_blank" href="https://www.freepik.com/free-photo/group-people-working-out-business-plan-office_5495118.htm#query=office%20meeting&position=2&from_view=search&track=sph" style="color:#c0b8b8">Image by senivpetro on Freepik</a>
                            </div>
                        </div>
                <!-- 
                    <p>
                        - Hyper Admin User
                    </p> -->
                </div> <!-- end auth-user-testimonial-->
            </div>
            <!-- end Auth fluid right content -->
        </div>
        <!-- end auth-fluid-->

        <!-- bundle -->
        <script src="js/js-theme/vendor.min.js"></script>
        <script src="js/js-theme/app.min.js"></script>

    </body>


<!-- Mirrored from coderthemes.com/hyper/saas/pages-recoverpw-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 12 Aug 2022 09:07:44 GMT -->
</html>