<!DOCTYPE html>
<html lang="en">

    
<!-- Mirrored from coderthemes.com/hyper/saas/pages-login-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 12 Aug 2022 09:07:44 GMT -->
<head>
        <meta charset="utf-8" />
        <title>Reset Username</title>
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
                     <!--    <div class="auth-brand text-center text-lg-start">
                            <a href="index.html" class="logo-dark">
                                <span><img src="images/images-theme/logo-dark.png" alt="" height="18"></span>
                            </a>
                            <a href="index.html" class="logo-light">
                                <span><img src="images/images-theme/logo.png" alt="" height="18"></span>
                            </a>
                            <div class="alert-message">
                            @if (session()->has('error'))
                                <p class="error login-fail"> {{ session()->get('error') }} </p>
                            @endif
                            </div>
                        </div> -->

                        <!-- title-->
                        <h4 class="mt-0">Reset Username</h4>
                        <p class="text-muted mb-4">You can reset your username here.</p>

                        <!-- form -->
                        <form method="post" action="{{ route('new.username') }}">
                        @csrf
                            <div class="mb-3">
                                <label for="username" class="form-label">New User Name</label>
                                <input class="form-control field-control" type="login" name="login" placeholder="Enter your username" required>
                            </div>
                            <!-- <div class="mb-3">
                                 <a href="pages-recoverpw-2.html" class="text-muted float-end"><small>Forgot your password?</small></a>
                                 <label for="password" class="form-label">Password</label>
                                <input class="form-control field-control" type="password" name="password" placeholder="Password" required>
                            </div>
                            <div class="mb-3">
                                <div class="form-check">
                                <a href="{{ route('forgot.username') }}" class="text-muted float-start"><small>Forgot Username?</small></a>
                                <a href="{{ route('forgot.password') }}" class="text-muted float-end"><small>Forgot Password?</small></a>
                                     <input type="checkbox" class="form-check-input" id="checkbox-signin">
                                    <label class="form-check-label" for="checkbox-signin">Remember me</label> 
                                </div>
                            </div> -->
                            <div class="d-grid mb-0 text-center">
                                <button class="btn btn-primary" type="submit"><i class="mdi mdi-login"></i> Reset Password </button>
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
                    </p>
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


<!-- Mirrored from coderthemes.com/hyper/saas/pages-login-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 12 Aug 2022 09:07:44 GMT -->
</html>