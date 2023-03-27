<!DOCTYPE html>
<html lang="en">

    
<!-- Mirrored from coderthemes.com/hyper/saas/pages-login-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 12 Aug 2022 09:07:44 GMT -->
<head>
        <meta charset="utf-8" />
        <title>South care services </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="South care services COA Platform" name="description" />
        <meta content="South care services " name="author" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
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
                        <div class="auth-brand text-center text-lg-start">
                            <!-- <a href="index.html" class="logo-dark">
                                <span> <img src="images/images-theme/logo-dark.png" alt="" height="18"></span>
                            </a>
                            <a href="index.html" class="logo-light">
                                <span><img src="images/images-theme/logo.png" alt="" height="18"></span>
                            </a> -->
                            <div class="alert-message text-danger">
                            @if (session()->has('error'))
                                <p class="error login-fail"> {{ session()->get('error') }} </p>
                            @endif
                            </div>
                        </div>

                        <!-- title-->
                        <h4 class="mt-0">Login Here</h4>
                        <p class="text-muted mb-4">Enter your email address and password to access account.</p>

                        <!-- form -->
                        <form method="post" action="{{ route('home.user') }}">
                        @csrf
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input class="form-control field-control" type="login" name="login" placeholder="Enter your username" required autocomplete=off>
                            </div>
                            <div class="mb-3">
<!--                                 <a href="pages-recoverpw-2.html" class="text-muted float-end"><small>Forgot your password?</small></a>
 -->                                <label for="password" class="form-label">Password</label>
                                <input class="form-control field-control" type="password" name="password" placeholder="Enter your password" required>
                            </div>
                            <div class="mb-3">
                                <div class="align-username">
                                <a href="{{ route('forgot.username') }}" class="text-muted float-start"><p class="text-muted">Forgot Username?</p></a>
                                <a href="{{ route('forgot.password') }}" class="text-muted float-end"><p class="text-muted">Forgot Password?</p></a>
                                <!-- <input type="checkbox" class="form-check-input" id="checkbox-signin">
                                    <label class="form-check-label" for="checkbox-signin">Remember me</label> -->
                                </div> 
                            </div>
                            <div class="d-grid mb-0 text-center">
                                <button class="btn btn-primary" type="submit"><i class="mdi mdi-login"></i> Log In </button>
                            </div>
                            <!-- social-->
                            <!-- <div class="text-center mt-4">
                                <p class="text-muted font-16">Sign in with</p>
                                <ul class="social-list list-inline mt-3">
                                    <li class="list-inline-item">
                                        <a href="javascript: void(0);" class="social-list-item border-primary text-primary"><i class="mdi mdi-facebook"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="javascript: void(0);" class="social-list-item border-danger text-danger"><i class="mdi mdi-google"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="javascript: void(0);" class="social-list-item border-info text-info"><i class="mdi mdi-twitter"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="javascript: void(0);" class="social-list-item border-secondary text-secondary"><i class="mdi mdi-github"></i></a>
                                    </li>
                                </ul>
                            </div> -->
                        </form>
                        <!-- end form-->

                        <!-- Footer-->
                        <footer class="footer footer-alt">
                            <p class="text-muted">Not registered yet? <a href="{{ route('create.user') }}" class="text-muted ms-1"><b>Create an account</b></a></p>
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
                <!--     <p>
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


<!-- Mirrored from coderthemes.com/hyper/saas/pages-login-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 12 Aug 2022 09:07:44 GMT -->
</html>