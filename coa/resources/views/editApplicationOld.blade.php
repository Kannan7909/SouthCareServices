<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Application Form</title>
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Font-->
	<link rel="stylesheet" type="text/css" href="css/nunito-font.css">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<!-- Main Style Css -->
    <link rel="stylesheet" href="../css/starter.css">
</head>
<body>
@include('editViewAdminPanel')
<!-- 	<div class="panel panel-default text-center">
       <div class="col-xl-2 col-lg-6">
            <div class="logo">
                <a href="index.html"><img src="images/EC-logo.png" alt="logo"></a>
            </div>
        </div>
    </div> -->
	<div class="container">
		<div class="col-md-2">
		</div>
    	<div class="col-md-10">
		<div>
			@if (session()->has('success'))
				<div class="alert alert-success">
				<h2 class="message"> {{ session()->get('success') }} </h2>
				</div>
			@endif
		</div>
        <div class="row text-center">
			<h2>Application Form</h2>
            <!-- <hr class="line"> -->
		</div>
        <h2>Personal Details</h2>
		<form method="POST" action="{{ route('update.application') }}" class="application-form" id="application-form">
        @csrf
        <div class="row">
			<div class="col-md-12">
				<div class="col-md-1">
				</div>
				<div class="col-md-2 field">
					<input type="hidden"  name="employee_id" id="employee_id" value="{{ encrypt($employee->id) }})">
					<label for="first_name">Post Applied For </label>
				</div>
				<div class="col-md-6">
                    <select name="posts" id="posts" class="input-data field" required>
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
					<input type="text" name="surname" id="surname" class="input-data field" value="{{ $employee->surname }}" required/>
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
					<input type="text" name="firstname" id="firstname" class="input-data field" value="{{ $employee->firstname }}" required/>
				</div>
			</div>
		</div>
        <div class="row">
			<div class="col-md-12">
				<div class="col-md-1">
				</div>
				<div class="col-md-2 field">
                <label for="birthday">Date Of Birth:</label>
				</div>
				<div class="col-md-6">
					<input type="date" id="date_of_birth" name="date_of_birth" class="input-data field" value="{{ $employee->date_of_birth }}" required>
				</div>
			</div>
		</div>
        <div class="row">
			<div class="col-md-12">
				<div class="col-md-1">
				</div>
				<div class="col-md-2 field">
					<label for="marital_status">Marital Status </label>
				</div>
				<div class="col-md-6">
                    <select name="marital_status" id="marital_status" class="input-data field">
						<option value="{{ $employee->marital_status }}" selected hidden>{{ $employee->marital_status }}</option>
                        <option value="Single">Single</option>
                        <option value="Married">Married</option>
                        <option value="Widowed">Widowed</option>
                        <option value="Separated">Separated</option>
                        <option value="Divorced">Divorced</option>
                    </select>
                 </div>
			</div>
		</div>
        <div class="row">
			<div class="col-md-12">
				<div class="col-md-1">
				</div>
				<div class="col-md-2 field">
					<label for="nationality">Nationality </label>
				</div>
				<div class="col-md-6">
					<input type="text" name="nationality" id="nationality" class="input-data field" value="{{ $employee->nationality }}" required/>
				</div>
			</div>
		</div>
       <div class="row">
			<div class="col-md-12">
				<div class="col-md-1">
				</div>
				<div class="col-md-2 field">
					<label for="ni_number">NI Number </label>
				</div>
				<div class="col-md-6">
					<input type="text" name="ni_number" id="ni_number" class="input-data field" value="{{ $employee->ni_number }}" required/>
				</div>
			</div>
		</div>
        <div class="row">
			<div class="col-md-12">
				<div class="col-md-1">
				</div>
				<div class="col-md-2 field">
					<label for="address">Address </label>
				</div>
				<div class="col-md-6">
					<textarea class="address" name="address" id="address" rows="2" cols="40"  aria-required="true" class="input-data" required>
					{{ $employee->address }}
					</textarea>
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
					<input type="text" name="postcode" id="postcode" class="input-data field" value="{{ $employee->postcode }}" required/>
				</div>
			</div>
		</div>
        <div class="row">
			<div class="col-md-12">
				<div class="col-md-1">
				</div>
				<div class="col-md-2 field">
					<label for="tel_no">Contact Tel  </label>
				</div>
				<div class="col-md-6">
					<input type="text" name="tel_no" id="tel_no" class="input-data field" value="{{ $employee->tel_no }}" required/>
				</div>
			</div>
		</div>
        <div class="row">
			<div class="col-md-12">
				<div class="col-md-1">
				</div>
				<div class="col-md-2 field">
					<label for="mobile_no">Mobile No. </label>
				</div>
				<div class="col-md-6">
					<input type="text" name="mobile_no" id="mobile_no" class="input-data field" value="{{ $employee->mobile_no }}" required/>
				</div>
			</div>
        </div>
		<div class="row">
			<div class="col-md-12">
				<div class="col-md-1">
				</div>
				<div class="col-md-2 field">
					<label for="email">Email </label>
				</div>
				<div class="col-md-6">
					<input type="email" name="email" id="email" class="input-data field" value="{{ $employee->email }}" required/>
				</div>
			</div>
		</div>
        <hr class="line">
        <h2>Passport Details</h2>
        <div class="row">
			<div class="col-md-12">
				<div class="col-md-1">
				</div>
				<div class="col-md-2 field">
					<label for="passport_no">Passport No. </label>
				</div>
				<div class="col-md-6">
					<input type="text" name="passport_no" id="passport_no" class="input-data field" value="{{ $employee->passport_no }}" required/>
				</div>
			</div>
		</div>
        <div class="row">
			<div class="col-md-12">
				<div class="col-md-1">
				</div>
				<div class="col-md-2 field">
					<label for="place_of_issue">Place Of Issue </label>
				</div>
				<div class="col-md-6">
					<input type="text" name="place_of_issue" id="place_of_issue" class="input-data field" value="{{ $employee->place_of_issue }}" required/>
				</div>
			</div>
		</div>
        <div class="row">
			<div class="col-md-12">
				<div class="col-md-1">
				</div>
				<div class="col-md-2 field">
                <label for="issue_date">Issue Date</label>
				</div>
				<div class="col-md-6">
					<input type="date" id="issue_date" name="issue_date" class="input-data field" value="{{ $employee->issue_date }}" required>
				</div>
			</div>
		</div>
        <div class="row">
			<div class="col-md-12">
				<div class="col-md-1">
				</div>
				<div class="col-md-2 field">
                <label for="expiry_date">Expiry Date</label>
				</div>
				<div class="col-md-6">
					<input type="date" id="expiry_date" name="expiry_date" class="input-data field" value="{{ $employee->expiry_date }}" required>
				</div>
			</div>
		</div>
        <div class="row">
			<div class="col-md-12">
				<div class="col-md-1">
				</div>
				<div class="col-md-2 field">
					<label for="visa_status">Visa Status </label>
				</div>
				<div class="col-md-6">
					<input type="text" name="visa_status" id="visa_status" class="input-data field" value="{{ $employee->visa_status }}" required/>
				</div>
			</div>
		</div>
        <div class="row">
			<div class="col-md-12">
				<div class="col-md-1">
				</div>
				<div class="col-md-2 field">
                <label for="visa_expiry_date">Visa Expiry Date</label>
				</div>
				<div class="col-md-6">
					<input type="date" id="visa_expiry_date" name="visa_expiry_date" class="input-data field" value="{{ $employee->visa_expiry_date }}" required>
				</div>
			</div>
		</div>
        <div class="row">
			<div class="col-md-12">
				<div class="col-md-1">
				</div>
				<div class="col-md-4 field">
					<label for="course">If Student, please provide the course details </label>
				</div>
            
			<div class="col-md-6">
				<input type="text" name="course" id="course" class="input-data field" value="{{ $employee->course }}"/>
            </div>
	    </div>
    </div>
    <hr class="line">
        <h2>Next Of Kin</h2>
        <div class="row">
			<div class="col-md-12">
				<div class="col-md-1">
				</div>
				<div class="col-md-2 field">
					<label for="relative_name">Name </label>
				</div>
				<div class="col-md-6">
					<input type="text" name="relative_name" id="relative_name" class="input-data field" value="{{ $employee->relative_name }}" required/>
				</div>
			</div>
		</div>
        <div class="row">
			<div class="col-md-12">
				<div class="col-md-1">
				</div>
				<div class="col-md-2 field">
					<label for="relationship">Relationship </label>
				</div>
				<div class="col-md-6">
					<input type="text" name="relationship" id="relationship" class="input-data field" value="{{ $employee->relationship }}" required/>
				</div>
			</div>
		</div>
        <div class="row">
			<div class="col-md-12">
				<div class="col-md-1">
				</div>
				<div class="col-md-2 field">
					<label for="relative_address">Address </label>
				</div>
				<div class="col-md-6">
					<textarea class="address" name="relative_address" id="relative_address" rows="2" cols="40"  aria-required="true" class="input-data" required>
					{{ $employee->relative_address }}
					</textarea>
				</div>
			</div>
		</div>
        <div class="row">
			<div class="col-md-12">
				<div class="col-md-1">
				</div>
				<div class="col-md-2 field">
					<label for="relative_tel">Tel No. </label>
				</div>
				<div class="col-md-6">
					<input type="text" name="relative_tel" id="relative_tel" class="input-data field" value="{{ $employee->relative_tel }}" required/>
				</div>
			</div>
		</div>
        <div class="row">
			<div class="col-md-12">
				<div class="col-md-1">
				</div>
				<div class="col-md-2 field">
					<label for="relative_mobile">Mobile No. </label>
				</div>
				<div class="col-md-6">
					<input type="text" name="relative_mobile" id="relative_mobile" class="input-data field" value="{{ $employee->relative_mobile }}" required/>
				</div>
			</div>
        </div>
        <div class="row">
			<div class="col-md-12">
				<div class="col-md-1">
				</div>
				<div class="col-md-2 field">
					<label for="relative_email">Email  </label>
				</div>
				<div class="col-md-6">
					<input type="email" name="relative_email" id="relative_email" class="input-data field"  value="{{ $employee->relative_email }}" required/>
				</div>
			</div>
		</div>
		<hr class="line">
		<div class="row">
			<h2>Educational Qualifications</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Place Of Study</th>
                        <th>Qualification</th>
                        <th>Date Qualified</th>
                    </tr>
                </thead>
                <tr>
                    <td>
						<input type="text" id="study_place" name="study_place" class="input-data field" value="{{ $employee->study_place }}" required>
					</td>
                    <td>
						<input type="text" id="qualification" name="qualification" class="input-data field" value="{{ $employee->qualification }}" required>
					</td>
                    <td>
						<input type="date" id="qualified_date" name="qualified_date" class="input-data field" value="{{ $employee->qualified_date }}" required>
					</td>
                </tr>
            </table>
        </div>
    	<hr class="line">
		<div class="row">
			<h2>Training</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Course Name</th>
                        <th>Date Attended</th>
                        <th>Expiry Date</th>
						<th>Details(If necessary)</th>
                    </tr>
                </thead>
                <tr>
                    <td>
					<input type="text" id="course_name" name="course_name" class="input-data field" value="{{ $employee->course_name }}" required>
					</td>
                    <td>
						<input type="date" id="date_attended" name="date_attended" class="input-data field" value="{{ $employee->date_attended }}" required>
					</td>
                    <td>
						<input type="date" id="course_expiry_date" name="course_expiry_date" class="input-data field" value="{{ $employee->course_expiry_date }}" required>
					</td>
					<td>
						<textarea class="details" name="details" id="details" rows="2" cols="40"  aria-required="true" class="input-data">
						{{ $employee->details }}
						</textarea>
					</td>
                </tr>
            </table>
        </div>
    	<hr class="line">
		<div class="row">
			<h2>Work Experiance</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>From</th>
                        <th>To</th>
                        <th>Name Of Employer</th>
						<th>Type Of Business</th>
						<th>Job Title</th>
                    </tr>
                </thead>
                <tr>
                    <td>
						<input type="date" id="from" name="from" class="input-data field" value="{{ $employee->from }}" required>
					</td>
                    <td>
						<input type="date" id="to" name="to" class="input-data field" value="{{ $employee->to }}" required>
					</td>
                    <td>
						<input type="text" id="employer_name" name="employer_name" class="input-data field" value="{{ $employee->employer_name }}" required>
					</td>
					<td>
						<input type="text" id="business_type" name="business_type" class="input-data field" value="{{ $employee->business_type }}" required>
					</td>
					<td>
						<input type="text" id="job_title" name="job_title" class="input-data field" value="{{ $employee->job_title }}" required>
					</td>
                </tr>
            </table>
        </div>
    	<hr class="line">
		<h2>Reference</h2>
		<p>Please give the names and contact details of two referees. One should be your previous Employer.</p>
        <div class="row">
			<div class="col-md-12">
				<div class="col-md-2 field">
					<label for="refer1_name">Name </label>
				</div>
				<div class="col-md-4">
					<input type="text" name="refer1_name" id="refer1_name" class="input-data field" value="{{ $employee->refer1_name }}" required/>
				</div>
			
				<div class="col-md-2 field">
					<label for="refer2_name">Name </label>
				</div>
				<div class="col-md-4">
					<input type="text" name="refer2_name" id="refer2_name" class="input-data field" value="{{ $employee->refer2_name }}" required/>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="col-md-2 field">
					<label for="refer1_job">Job Title </label>
				</div>
				<div class="col-md-4">
					<input type="text" name="refer1_job" id="refer1_job" class="input-data field" value="{{ $employee->refer1_job }}" required/>
				</div>
				<div class="col-md-2 field">
					<label for="refer2_job">Job Title </label>
				</div>
				<div class="col-md-4">
					<input type="text" name="refer2_job" id="refer2_job" class="input-data field" value="{{ $employee->refer2_job }}" required/>
				</div>
			</div>
		</div>
        <div class="row">
			<div class="col-md-12">
				<div class="col-md-2 field">
					<label for="refer1_relation">Relationship </label>
				</div>
				<div class="col-md-4">
					<input type="text" name="refer1_relation" id="refer1_relation" class="input-data field" value="{{ $employee->refer1_relation }}" required/>
				</div>
				<div class="col-md-2 field">
					<label for="refer2_relation">Relationship </label>
				</div>
				<div class="col-md-4">
					<input type="text" name="refer2_relation" id="refer2_relation" class="input-data field" value="{{ $employee->refer2_relation }}" required/>
				</div>
			</div>
		</div>
        <div class="row">
			<div class="col-md-12">
				<div class="col-md-2 field">
					<label for="refer1_address">Address </label>
				</div>
				<div class="col-md-4">
					<textarea class="refer1_address" name="refer1_address" id="refer1_address" rows="2" cols="40"  aria-required="true" class="input-data" required>
					{{ $employee->refer1_address }}
					</textarea>
				</div>
				<div class="col-md-2 field">
					<label for="refer2_address">Address </label>
				</div>
				<div class="col-md-4">
					<textarea class="refer2_address" name="refer2_address" id="refer2_address" rows="2" cols="40"  aria-required="true" class="input-data" required>
					{{ $employee->refer2_address }}
					</textarea>
				</div>
			</div>
		</div>
        <div class="row">
			<div class="col-md-12">
				<div class="col-md-2 field">
					<label for="refer1_company">Company Name </label>
				</div>
				<div class="col-md-4">
					<input type="text" name="refer1_company" id="refer1_company" class="input-data field" value="{{ $employee->refer1_company }}" required/>
				</div>
				<div class="col-md-2 field">
					<label for="refer2_company">Company Name </label>
				</div>
				<div class="col-md-4">
					<input type="text" name="refer2_company" id="refer2_company" class="input-data field" value="{{ $employee->refer2_company }}" required/>
				</div>
			</div>
		</div>
        <div class="row">
			<div class="col-md-12">
				<div class="col-md-2 field">
					<label for="refer1_tel">Tel No. </label>
				</div>
				<div class="col-md-4">
					<input type="text" name="refer1_tel" id="refer1_tel" class="input-data field" value="{{ $employee->refer1_tel }}" required/>
				</div>
				<div class="col-md-2 field">
					<label for="refer2_tel">Tel No. </label>
				</div>
				<div class="col-md-4">
					<input type="text" name="refer2_tel" id="refer2_tel" class="input-data field" value="{{ $employee->refer2_tel }}" required/>
				</div>
			</div>
        </div>
        <div class="row">
			<div class="col-md-12">
				<div class="col-md-2 field">
					<label for="refer1_email">Email  </label>
				</div>
				<div class="col-md-4">
					<input type="email" name="refer1_email" id="refer1_email" class="input-data field"  value="{{ $employee->refer1_email }}" required/>
				</div>
				<div class="col-md-2 field">
					<label for="refer2_email">Email  </label>
				</div>
				<div class="col-md-4">
					<input type="email" name="refer2_email" id="refer2_email" class="input-data field"  value="{{ $employee->refer2_email }}" required/>
				</div>
			</div>
		</div>
		<hr class="line">
		<h2>Equal Opportunity Monitoring Form</h2>
		<p>
			The information on this form will be used in total confidence and accordance with current data protection legislation. It will help to ensure
			that the company property monitors and confirms with its policies relating to equality of opportunity. Information will be used for monitoring
			only. Our commitment aims to allow our staff to develop their skills and realize their maximum potential as individuals without any wish on
			the part of the company to limit their opportunity.
		</p>
		<h3>Please tick the relevent box</h3>
        <div class="row">
			<div class="col-md-12">
				<div class="col-md-1">
				</div>
				<div class="col-md-1 field">
					@if ( $employee->choose =='white')
					<input type="radio" name="choose" id="white" value="white" checked>
					@else
					<input type="radio" name="choose" id="white" value="white">
					@endif
					<label for="white">White </label>
				</div>
				<div class="col-md-1 field">
					@if ( $employee->choose =='mixed')
					<input type="radio" name="choose" id="mixed" value="mixed" checked>
					@else
					<input type="radio" name="choose" id="mixed" value="mixed">
					@endif
					<label for="mixed">Mixed </label>
				</div>
				<div class="col-md-1 field">
					@if ( $employee->choose =='asian')
					<input type="radio" name="choose" id="asian" value="asian" checked>
					@else
					<input type="radio" name="choose" id="asian" value="asian">
					@endif
					<label for="asian">Asian </label>
				</div>
				<div class="col-md-1 field">
					@if ( $employee->choose =='black')
					<input type="radio" name="choose" id="black" value="black" checked>
					@else
					<input type="radio" name="choose" id="black" value="black">
					@endif
					<label for="black">Black </label>
				</div>
				<div class="col-md-2 field">
					@if ( $employee->choose =='chinese')
					<input type="radio" name="choose" id="chinese" value="chinese" checked>
					@else
					<input type="radio" name="choose" id="chinese" value="chinese">
					@endif
					<label for="chinese">Chinese </label>
				</div>
				<div class="col-md-1 field">
					<label for="other">Other </label>
				</div>
				<div class="col-md-4 field">
					<input type="text" name="other" id="other" class="input-data"/>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="col-md-1">
				</div>
				<div class="col-md-3 field">
					<label for="gender" class="radio-label">Gender </label>
					<div class="radio">
						@if ( $employee->gender =='male')
						<input type="radio" value="male" name="gender" id="male" class="male-radio" checked required>
						@else
						<input type="radio" value="male" name="gender" id="male" class="male-radio" required>
						@endif
						<label for="male">Male</label>
					</div>
					<div class="radio">
						@if ( $employee->gender =='female')
						<input type="radio" name="gender" id="female" value="female">
						@else
						<input type="radio" name="gender" id="female" value="female">
						@endif
						<label for="female">Female</label>
					</div>
				</div>
			</div>
		</div>
		<h3>Please Indicate your age range by ticking one of the boxes below :</h3>
		<div class="row">
			<div class="col-md-12">
				<div class="col-md-1">
				</div>
				<div class="col-md-1 field">
					<label for="age1">16-21 </label>
					@if ( $employee->age =='age1')
					<input type="radio" name="age" id="age1" value="age1" checked>
					@else
					<input type="radio" name="age" id="age1" value="age1">
					@endif
				</div>
				<div class="col-md-1 field">
					<label for="age2">22-25 </label>
					@if ( $employee->age =='age2')
					<input type="radio" name="age" id="age2" value="age2" checked>
					@else
					<input type="radio" name="age" id="age2" value="age2">
					@endif
				</div>
				<div class="col-md-1 field">
					<label for="age3">26-30 </label>
					@if ( $employee->age =='age3')
					<input type="radio" name="age" id="age3" value="age3" checked>
					@else
					<input type="radio" name="age" id="age3" value="age3">
					@endif
				</div>
				<div class="col-md-1 field">
					<label for="age4">31-35 </label>
					@if ( $employee->age =='age4')
					<input type="radio" name="age" id="age4" value="age4" checked>
					@else
					<input type="radio" name="age" id="age4" value="age4">
					@endif
				</div>
				<div class="col-md-1 field">
					<label for="age5">36-40 </label>
					@if ( $employee->age =='age5')
					<input type="radio" name="age" id="age5" value="age5" checked>
					@else
					<input type="radio" name="age" id="age5" value="age5">
					@endif
				</div>
				<div class="col-md-1 field">
					<label for="age6">41-50 </label>
					@if ( $employee->age =='age6')
					<input type="radio" name="age" id="age6" value="age6" checked>
					@else
					<input type="radio" name="age" id="age6" value="age6">
					@endif
				</div>
				<div class="col-md-1 field">
					<label for="age7">51-60 </label>
					@if ( $employee->age =='age7')
					<input type="radio" name="age" id="age7" value="age7" checked>
					@else
					<input type="radio" name="age" id="age7" value="age7">
					@endif
				</div>
				<div class="col-md-1 field">
					<label for="age8">61-65 </label>
					@if ( $employee->age =='age8')
					<input type="radio" name="age" id="age8" value="age8 checked">
					@else
					<input type="radio" name="age" id="age8" value="age8">
					@endif
				</div>
			</div>
		</div>
	
		<div class="row">
			<div class="col-md-12">
				<div class="col-md-5 field">
					<label for="gender" class="radio-label">Do you consider yourself to have a disability of some kind ? </label>
				</div>
				<div class="col-md-3 field">
					<label for="disable">Yes</label>
					@if ( $employee->disable =='yes')
					<input type="radio" value="yes" name="disable" id="disable" class="disable-radio" checked required>
					@else
					<input type="radio" value="yes" name="disable" id="disable" class="disable-radio" required>
					@endif
					<label for="not_disable">No</label>
					@if ( $employee->disable =='no')
					<input type="radio" name="disable" id="not_disable" value="no" checked>
					@else
					<input type="radio" name="disable" id="not_disable" value="no">
					@endif
				</div>	
				<div class="col-md-3">
					<label for="disability_details" class="radio-label">If yes, give details </label>
					<input type="text" name="disability_details" id="disability_details" class="input-data field" value="{{ $employee->disability_details }}"/>
				</div>
			</div>
		</div>
		<hr class="line">
		<h3>Protection Of Children and Vulnerable Adults Declaration</h3>
		<div class="row">
			<div class="col-md-12">
				<div class="col-md-10 field">
					<label for="service" class="radio-label">Has any Social Service Department or Police Service ever conducted an enquiry or investigation into any allegations
					or that you may pose an actual or potential risk to children or vulnerable adults? </label>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="col-md-1">
				</div>
				<div class="col-md-3 field">
					<div class="radio">
						@if ( $employee->service =='yes')
						<input type="radio" value="yes" name="service" id="service" class="service-radio" checked required>
						@else
						<input type="radio" value="yes" name="service" id="service" class="service-radio" required>
						@endif
						<label for="service">Yes</label>
					</div>
					<div class="radio">
						@if ( $employee->service =='no')
						<input type="radio" name="service" id="no_service" value="no" checked>
						@else
						<input type="radio" name="service" id="no_service" value="no">
						@endif
						<label for="no_service">No</label>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="col-md-10 field">
					<label for="offence" class="radio-label">Have you ever been convicted of any offence relating to children or vulnerable adults? </label>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="col-md-1">
				</div>
				<div class="col-md-3 field">
					<div class="radio">
						@if ( $employee->offence =='yes')
						<input type="radio" value="yes" name="offence" id="offence" class="offence-radio" checked required>
						@else
						<input type="radio" value="yes" name="offence" id="offence" class="offence-radio" required>
						@endif
						<label for="offence">Yes</label>
					</div>
					<div class="radio">
						@if ( $employee->offence =='no')
						<input type="radio" name="offence" id="no_offence" value="no" checked>
						@else
						<input type="radio" name="offence" id="no_offence" value="no">
						@endif
						<label for="no_offence">No</label>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="col-md-10 field">
					<label for="disciplinary_procedure" class="radio-label">Have you ever been the subject of any disciplinary procedure or been asked to leave employment or voluntary
activity due fo inappropriate behavior towards a child or vulnerable adult? </label>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="col-md-1">
				</div>
				<div class="col-md-3 field">
					<div class="radio">
						@if ( $employee->disciplinary_procedure =='yes')
						<input type="radio" value="yes" name="disciplinary_procedure" id="disciplinary_procedure" class="behavior-radio" checked required>
						@else
						<input type="radio" value="yes" name="disciplinary_procedure" id="disciplinary_procedure" class="behavior-radio" required>
						@endif
						<label for="disciplinary_procedure">Yes</label>
					</div>
					<div class="radio">
						@if ( $employee->disciplinary_procedure =='no')
						<input type="radio" name="disciplinary_procedure" id="no_disciplinary_procedure" value="no" checked>
						@else
						<input type="radio" name="disciplinary_procedure" id="no_disciplinary_procedure" value="no">
						@endif
						<label for="no_disciplinary_procedure">No</label>
					</div>
				</div>
			</div>
		</div>
		<hr class="line">
		<h2>Rehabilation Of Offenders</h2>
		<div>
		Because of the nature of the work for which youare applying, this post is exempt from the provisions of Section 4(2} of the
		Rehabilitation of Offenders Act 1974, by virtue of the Rehabilitation of Offenders Act 1974 (Exemptions) Order 1975. Applicants
		are therefore not entitled to withhold information about convictions, which for other purposes are spent under the provisions of the
		act and in the event of employment any failure to disclose such convictions could result in dismissal or disciplinary action by the
		employer. All Successful candidates will be required to obtain an enhanced disclosure report from the Disclosure and Barring
		Service. Have you ever been convicted of a criminal offence, or been subject to any confidential discharge, bind overs or caution.
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="col-md-1">
				</div>
				<div class="col-md-3 field">
					<div class="radio">
						@if ( $employee->criminal_offence =='yes')
						<input type="radio" value="yes" name="criminal_offence" id="criminal_offence" class="criminal-radio" checked required>
						@else
						<input type="radio" value="yes" name="criminal_offence" id="criminal_offence" class="criminal-radio" required>
						@endif
						<label for="criminal_offence">Yes</label>
					</div>
					<div class="radio">
						@if ( $employee->criminal_offence =='no')
						<input type="radio" name="criminal_offence" id="no_criminal_offence" value="no" checked>
						@else
						<input type="radio" name="criminal_offence" id="no_criminal_offence" value="no">
						@endif
						<label for="no_disciplinary_proceduree">No</label>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div>I declare that I do not possess, nor have I ever possessed a criminal conviction, not have I been subject to any conditional
			discharges, bindovers or cautions.</div>
		</div>
		<div class="col-md-12">
            <div class="row">
                <div class="col-md-6 field">
                    <label for="signature">Signature</label>
                    <input type="text" id="signature" name="signature" class="input-data" value="{{ $employee->signature }}" required>
                </div>
                <div class="col-md-6 field">
                    <label for="date">Date</label>
                    <input type="date" id="date" name="date" class="input-data" value="{{ $employee->date }}" required>
                </div>
            </div>
        </div>
		<div class="row">
		</div>
		<div class="row">
		</div>
		<div class="row">
			<div>Any information contained in this form will be treated in confidence. Failure to disclose any relevant information or providing false or inaccurate
			information may be regarded as a breach of any subsequent contract of employment, resulting in disciplinary action and/or dismissal.</div>
		</div>
		<hr class="line">
		<h2>Panel Agency Membership</h2>
		<div>If youlike to work through our panel agencies in various locations please sign the declaration below. This will help you to
			work with different clients in various locations through other agencies who are our partners. The related staff pay and other
			benefits are availed through the panel agency members directly. Please tick the box below if youare interested.
		</div>
		<div class="row">
		</div>
		<div class="row">
			<label for="agree">I have no objections in working with the panel agencies through E care solutions</label>
			@if ( $employee->agree =='yes')
			<input type="radio" value="yes" name="agree" id="agree" class="agree-radio" checked required>
			@else
			<input type="radio" value="yes" name="agree" id="agree" class="agree-radio" required>
			@endif
		</div>
		<hr class="line">
		<h2>Notes</h2>
		<div class="row">
			<textarea class="notes" name="notes" id="notes" rows="2" cols="40"  aria-required="true" class="input-data" required>
			{{ $employee->notes }}
			</textarea>
		</div>	
		<hr class="line">
		<div class="row">
			<h2>DECLARATION</h2>
			<div>I confirm that the information given within this form is true and accurate. I hereby give consent for this information being used for
				personnel administration and business purposes.
			</div>
		</div>
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3 field">
                    <label for="signature">Signature</label>
                    <input type="text" id="signature" name="signature" class="input-data" value="{{ $employee->signature }}" required>
                </div>
                <div class="col-md-3 field">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" class="input-data" value="{{ $employee->name }}" required>
                </div>
                <div class="col-md-3 field">
                    <label for="date">Date</label>
                    <input type="date" id="date" name="date" class="input-data" value="{{ $employee->date }}" required>
                </div>
            </div>
        </div>
		<div class="row">
			<div class="col-md-12">
				<div class="col-md-9">
				</div>
				<div class="col-md-3">
                <input type="submit" id="bankSubmit" value='Update' class='submit-action'>
				</div>
			</div>
		</div>
	</div>
</form>
		<div class="row">
        </div>
        <div class="row">
        </div>
		<div class="row">
        </div>
        <div class="row">
        </div>
	</div>	
</div>		
</body>
</html>