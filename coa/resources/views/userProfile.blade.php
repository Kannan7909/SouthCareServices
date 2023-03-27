<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>User Profile</title>
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Font-->
	<link rel="stylesheet" type="text/css" href="css/nunito-font.css">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<!-- Main Style Css -->
    <link rel="stylesheet" href="css/starter.css"/>
</head>
<body>
<!-- 	<div class="panel panel-default text-center">
       <div class="col-xl-2 col-lg-6">
            <div class="logo">
                <a href="index.html"><img src="images/EC-logo.png" alt="logo"></a>
            </div>
        </div>
    </div> -->
	<div class="container text-left">
        <div class="row">
			<h2 class="container text-center">User Profile</h2>
            <!-- <hr class="line"> -->
		</div>
		<form method="POST" action="{{ route('save.user') }}" class="register-form" id="register-form">
        @csrf
        <div class="row">
		<h1 class="greet">Hi! Welcome {{ $employee->surname }} {{ $employee->firstname }}</h1>

			<div class="col-md-12">
				<div class="col-md-1">
				</div>
				<div class="col-md-2 field">
					<label for="title">Title </label>
				</div>
				<div class="col-md-6">
                        <select name="title" id="title" class="input-data field" {{ $employee->title }} required>
						<option value="{{ $employee->title }}" selected hidden>{{ $employee->title }}</option>
						<option value="Mr">Mr.</option>
						<option value="Mrs">Mrs.</option>                               
					</select>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="col-md-1">
				</div>
				<div class="col-md-2 field">
					<label for="surname">Surname </label>
				</div>
				<div class="col-md-6">
					<input type="text" name="surname" id="surname" class="input-data" value="{{ $employee->surname }}" required/>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="col-md-1">
				</div>
				<div class="col-md-2 field">
					<label for="first_name">First Name </label>
				</div>
				<div class="col-md-6">
					<input type="text" name="first_name" id="first_name" class="input-data" value="{{ $employee->firstname }}" required/>
				</div>
			</div>
		</div>
        <div class="row">
			<div class="col-md-12">
				<div class="col-md-1">
				</div>
				<div class="col-md-2 field">
					<label for="first_name">Post Applied For </label>
				</div>
				<div class="col-md-6">
                    <select name="posts" id="posts" class="input-data" required>
						<option value="{{ $employee->posts }}" selected hidden>{{ $employee->posts }}</option>
						<option value="Nurse">Nurse(RGN)</option>
						<option value="Care Assistant">Care Assistant</option>
						<option value="Senior Carer">Senior Carer</option>
						<option value="Chefs">Chefs</option>
						<option value="Kitchen Assistant">Kitchen Assistant</option>
						<option value="Domcare">Domcare</option>
					</select>
				</div>
			</div>
		</div>
        <div class="row">
			<div class="col-md-12">
				<div class="col-md-1">
				</div>
				<div class="col-md-4 field">
					<label for="status" class="radio-label">Status </label>
					<div class="radio">
					    <label for="fresher">Fresher   </label>
						@if ( $employee->status =='fresher')
                        <input type="radio" value="fresher" name="status" id="fresher" class="status" checked>
						@else
                        <input type="radio" value="fresher" name="status" id="fresher" class="status">
                         @endif
					</div>
					<div class="radio">
					    <label for="experianced">Experianced</label>
						@if ( $employee->status =='experianced')
                        <input type="radio" name="status" id="experianced" value="experianced"  checked>
						@else
                        <input type="radio" value="fresher" name="status" id="fresher" >
                         @endif
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="col-md-1">
				</div>
				<div class="col-md-2 field">
					<label for="address1">Address-1 </label>
				</div>
				<div class="col-md-6">
					<textarea class="address" name="address1" id="address1" rows="2" cols="40"  aria-required="true" class="input-data" required>{{ $employee->address1 }}</textarea>
				</div>
			</div>
		</div>
        <div class="row">
			<div class="col-md-12">
				<div class="col-md-1">
				</div>
				<div class="col-md-2 field">
					<label for="address2">Address-2 </label>
				</div>
				<div class="col-md-6">
					<textarea class="address" name="address2" id="address2" rows="2" cols="40"  aria-required="true" class="input-data" required>{{ $employee->address2 }}</textarea>
				</div>
			</div>
		</div>
        <div class="row">
			<div class="col-md-12">
				<div class="col-md-1">
				</div>
				<div class="col-md-2 field">
					<label for="postcode">Postcode </label>
				</div>
				<div class="col-md-6">
					<input type="text" name="postcode" id="postcode" class="input-data" value="{{ $employee->postcode }}" required/>
				</div>
			</div>
		</div>
        <div class="row">
			<div class="col-md-12">
				<div class="col-md-1">
				</div>
				<div class="col-md-2 field">
					<label for="contact">Contact No. </label>
				</div>
				<div class="col-md-6">
					<input type="text" name="contact" id="contact" class="input-data" value="{{ $employee->contact_no }}" required/>
				</div>
			</div>
		</div>
        <div class="row">
			<div class="col-md-12">
				<div class="col-md-1">
				</div>
				<div class="col-md-2 field">
					<label for="uk_contact">UK Contact No. </label>
				</div>
				<div class="col-md-6">
					<input type="text" name="uk_contact" id="uk_contact" class="input-data" value="{{ $employee->uk_contact_no }}" required/>
				</div>
			</div>
		</div>
        <div class="row">
			<div class="col-md-12">
				<div class="col-md-1">
				</div>
				<div class="col-md-2 field">
					<label for="email">Email Id </label>
				</div>
				<div class="col-md-6">
					<input type="email" name="email" id="email" class="input-data" value="{{ $employee->email }}" required/>
				</div>
			</div>
		</div>
        <div class="row">
			<div class="col-md-12">
				<div class="col-md-1">
				</div>
				<div class="col-md-2 field">
                    <label for="login">Login ID </label>
				</div>
				<div class="col-md-6">
					<input type="text" name="login" id="login" class="input-data" value="{{ $employee->login_id }}" required/>
				</div>
			</div>
		</div>
        <div class="row">
			<div class="col-md-12">
				<div class="col-md-1">
				</div>
				<div class="col-md-2 field">
                    <label for="password">Password </label>
				</div>
				<div class="col-md-6">
					<input type="password" name="password" id="password" class="input-data" value="{{ $employee->password }}" required/>
				</div>
			</div>
		</div>
        <!-- <div class="row">
			<div class="col-md-12">
				<div class="col-md-1">
				</div>
				<div class="col-md-1">
		
				</div>
				<div class="col-md-2">
					<input type="reset" value="Reset All" class="reset" name="reset" id="reset"  />
				</div>
				<div class="col-md-2">
					<input type="submit" value="Submit" class="submit" name="submit" id="submit" />
				</div>
			</div>
		</div> -->
</form>
		<div class="row">
        </div>
        <div class="row">
        </div>
		</div>
</body>
</html>