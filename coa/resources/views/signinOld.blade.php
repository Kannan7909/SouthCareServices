<!DOCTYPE html>
<html lang="en">
<head>
	<title>Log In</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->

<!-- Font awesome link -->
<!-- 	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
 --> <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

 <!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->


</head>
<body>
 <form method="post" action="{{ route('home.user') }}">
 {{ csrf_field() }}
	<div class="limiter">
	
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100">
			<div class="alert-message">
				@if (session()->has('error'))
					<p class="error"> {{ session()->get('error') }} </p>
				@endif
			</div>
				<form class="login100-form validate-form">
					<!-- <span class="login100-form-logo">
						<i class="zmdi zmdi-landscape"></i>
					</span>
 -->
					<span class="login100-form-title p-b-34 p-t-27">
						Login Here
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="email" placeholder="Username">
 						<span class="focus-input100" data-placeholder="&#xf207;"></span>
<!--					<span class="focus-input100">
 							<i class="fa-solid fa-user"></i>
 						</span>
 -->
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder="Password">
 						<span class="focus-input100" data-placeholder="&#xf191;"></span>
 						<!-- <span class="focus-input100"><i class="fa fa-key" aria-hidden="true"></i></span>
 -->
					</div>

					<div class="contact100-form-checkbox">
						<!-- <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
						<label class="label-checkbox100" for="ckb1">
							Remember me
						</label> -->
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>
					<div class="text-center p-t-90">
					<div class="text-center p-t-90">Don't have an account?
						<a class="txt1" href="{{ route('create.user') }}">
							Create one
						</a>
					</div>
<!-- 					<div class="text-center p-t-90">
 -->						<a class="txt1" href="{{ route('forgot.password') }}">
							Forgot Password?
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>