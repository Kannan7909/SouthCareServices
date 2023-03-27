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
    <link rel="stylesheet" href="css/starter.css"/>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" rel="stylesheet" />

</head>
<body>
<!-- 	<div class="panel panel-default text-center">
       <div class="col-xl-2 col-lg-6">
            <div class="logo">
                <a href="index.html"><img src="images/EC-logo.png" alt="logo"></a>
            </div>
        </div>
    </div> -->
	<div id="applicationContainer" class="container">
        <div class="row">
			<h2>Application Form</h2>
            <!-- <hr class="line"> -->
		</div>
        <h2>Personal Details</h2>
		<form method="POST" action="{{ route('save.application') }}" class="application-form" id="application-form">
        @csrf
        <div class="row">
			<div class="col-md-12">
				<div class="col-md-1">
				</div>
				<div class="col-md-2 field">
					<label for="first_name">Post Applied For </label>
				</div>
				<div class="col-md-6">
                    <select name="posts" id="posts" class="input-data field" required>
						<option value=""></option>
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
                        <select name="title" id="title" class="input-data field" required>
						<option value=""></option>
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
					<input type="text" name="surname" id="surname" class="input-data" required/>
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
					<input type="text" name="first_name" id="first_name" class="input-data" required/>
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
					<input type="date" id="birthday" name="birthday" class="input-data" required>
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
                        <option value="">-Select Marital Status-</option>
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
					<input type="text" name="nationality" id="nationality" class="input-data" required/>
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
					<input type="text" name="ni_number" id="ni_number" class="input-data" required/>
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
					<textarea class="address" name="address" id="address" rows="2" cols="40"  aria-required="true" class="input-data" required></textarea>
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
					<input type="text" name="postcode" id="postcode" class="input-data" required/>
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
					<input type="text" name="tel_no" id="tel_no" class="input-data" required/>
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
					<input type="text" name="mobile_no" id="mobile_no" class="input-data" required/>
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
					<input type="email" name="email" id="email" class="input-data" required/>
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
					<input type="text" name="passport_no" id="passport_no" class="input-data" required/>
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
					<input type="text" name="place_of_issue" id="place_of_issue" class="input-data" required/>
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
					<input type="date" id="issue_date" name="issue_date" class="input-data" required>
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
					<input type="date" id="expiry_date" name="expiry_date" class="input-data" required>
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
					<input type="text" name="visa_status" id="visa_status" class="input-data" required/>
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
					<input type="date" id="visa_expiry_date" name="visa_expiry_date" class="input-data" required>
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
				<input type="text" name="course" id="course" class="input-data"/>
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
					<input type="text" name="relative_name" id="relative_name" class="input-data" required/>
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
					<input type="text" name="relationship" id="relationship" class="input-data" required/>
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
					<textarea class="address" name="relative_address" id="relative_address" rows="2" cols="40"  aria-required="true" class="input-data" required></textarea>
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
					<input type="text" name="relative_tel" id="relative_tel" class="input-data" required/>
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
					<input type="text" name="relative_mobile" id="relative_mobile" class="input-data" required/>
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
					<input type="email" name="relative_email" id="relative_email" class="input-data"  required/>
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
						<input type="text" id="study_place" name="study_place" class="input-data" required>
					</td>
                    <td>
						<input type="text" id="qualification" name="qualification" class="input-data" required>
					</td>
                    <td>
						<input type="date" id="qualified_date" name="qualified_date" class="input-data" required>
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
					<input type="text" id="course_name" name="course_name" class="input-data" required>
					</td>
                    <td>
						<input type="date" id="date_attended" name="date_attended" class="input-data" required>
					</td>
                    <td>
						<input type="date" id="course_expiry_date" name="course_expiry_date" class="input-data" required>
					</td>
					<td>
						<textarea class="details" name="details" id="details" rows="2" cols="40"  aria-required="true" class="input-data"></textarea>
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
						<input type="date" id="from" name="from" class="input-data" required>
					</td>
                    <td>
						<input type="date" id="to" name="to" class="input-data" required>
					</td>
                    <td>
						<input type="text" id="employer_name" name="employer_name" class="input-data" required>
					</td>
					<td>
						<input type="text" id="business_type" name="business_type" class="input-data" required>
					</td>
					<td>
						<input type="text" id="job_title" name="job_title" class="input-data" required>
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
					<input type="text" name="refer1_name" id="refer1_name" class="input-data" required/>
				</div>
			
				<div class="col-md-2 field">
					<label for="refer2_name">Name </label>
				</div>
				<div class="col-md-4">
					<input type="text" name="refer2_name" id="refer2_name" class="input-data" required/>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="col-md-2 field">
					<label for="refer1_job">Job Title </label>
				</div>
				<div class="col-md-4">
					<input type="text" name="refer1_job" id="refer1_job" class="input-data" required/>
				</div>
				<div class="col-md-2 field">
					<label for="refer2_job">Job Title </label>
				</div>
				<div class="col-md-4">
					<input type="text" name="refer2_job" id="refer2_job" class="input-data" required/>
				</div>
			</div>
		</div>
        <div class="row">
			<div class="col-md-12">
				<div class="col-md-2 field">
					<label for="refer1_relation">Relationship </label>
				</div>
				<div class="col-md-4">
					<input type="text" name="refer1_relation" id="refer1_relation" class="input-data" required/>
				</div>
				<div class="col-md-2 field">
					<label for="refer2_relation">Relationship </label>
				</div>
				<div class="col-md-4">
					<input type="text" name="refer2_relation" id="refer2_relation" class="input-data" required/>
				</div>
			</div>
		</div>
        <div class="row">
			<div class="col-md-12">
				<div class="col-md-2 field">
					<label for="refer1_address">Address </label>
				</div>
				<div class="col-md-4">
					<textarea class="refer1_address" name="refer1_address" id="refer1_address" rows="2" cols="40"  aria-required="true" class="input-data" required></textarea>
				</div>
				<div class="col-md-2 field">
					<label for="refer2_address">Address </label>
				</div>
				<div class="col-md-4">
					<textarea class="refer2_address" name="refer2_address" id="refer2_address" rows="2" cols="40"  aria-required="true" class="input-data" required></textarea>
				</div>
			</div>
		</div>
        <div class="row">
			<div class="col-md-12">
				<div class="col-md-2 field">
					<label for="refer1_company">Company Name </label>
				</div>
				<div class="col-md-4">
					<input type="text" name="refer1_company" id="refer1_company" class="input-data" required/>
				</div>
				<div class="col-md-2 field">
					<label for="refer2_company">Company Name </label>
				</div>
				<div class="col-md-4">
					<input type="text" name="refer2_company" id="refer2_company" class="input-data" required/>
				</div>
			</div>
		</div>
        <div class="row">
			<div class="col-md-12">
				<div class="col-md-2 field">
					<label for="refer1_tel">Tel No. </label>
				</div>
				<div class="col-md-4">
					<input type="text" name="refer1_tel" id="refer1_tel" class="input-data" required/>
				</div>
				<div class="col-md-2 field">
					<label for="refer2_tel">Tel No. </label>
				</div>
				<div class="col-md-4">
					<input type="text" name="refer2_tel" id="refer2_tel" class="input-data" required/>
				</div>
			</div>
        </div>
        <div class="row">
			<div class="col-md-12">
				<div class="col-md-2 field">
					<label for="refer1_email">Email  </label>
				</div>
				<div class="col-md-4">
					<input type="email" name="refer1_email" id="refer1_email" class="input-data"  required/>
				</div>
				<div class="col-md-2 field">
					<label for="refer2_email">Email  </label>
				</div>
				<div class="col-md-4">
					<input type="email" name="refer2_email" id="refer2_email" class="input-data"  required/>
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
					<label for="white">White </label>
					<input type="radio" name="choose" id="white" value="white">
				</div>
				<div class="col-md-1 field">
					<label for="mixed">Mixed </label>
					<input type="radio" name="choose" id="mixed" value="mixed">
				</div>
				<div class="col-md-1 field">
					<label for="asian">Asian </label>
					<input type="radio" name="choose" id="asian" value="asian">
				</div>
				<div class="col-md-1 field">
					<label for="black">Black </label>
					<input type="radio" name="choose" id="black" value="black">
				</div>
				<div class="col-md-1 field">
					<label for="chinese">Chinese </label>
					<input type="radio" name="choose" id="chinese" value="chinese">
				</div>
				<div class="col-md-1 field">
					<label for="other">Other </label>
				</div>
				<div class="col-md-4">
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
						<label for="male">Male</label>
						<input type="radio" value="male" name="gender" id="male" class="male-radio" required>
					</div>
					<div class="radio">
						<label for="female">Female</label>
						<input type="radio" name="gender" id="female" value="female">
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
					<input type="radio" name="age" id="age1" value="age1">
				</div>
				<div class="col-md-1 field">
					<label for="age2">22-25 </label>
					<input type="radio" name="age" id="age2" value="age2">
				</div>
				<div class="col-md-1 field">
					<label for="age3">26-30 </label>
					<input type="radio" name="age" id="age3" value="age3">
				</div>
				<div class="col-md-1 field">
					<label for="age4">31-35 </label>
					<input type="radio" name="age" id="age4" value="age4">
				</div>
				<div class="col-md-1 field">
					<label for="age5">36-40 </label>
					<input type="radio" name="age" id="age5" value="age5">
				</div>
				<div class="col-md-1 field">
					<label for="age6">41-50 </label>
					<input type="radio" name="age" id="age6" value="age6">
				</div>
				<div class="col-md-1 field">
					<label for="age7">51-60 </label>
					<input type="radio" name="age" id="age7" value="age7">
				</div>
				<div class="col-md-1 field">
					<label for="age8">61-65 </label>
					<input type="radio" name="age" id="age8" value="age8">
				</div>
			</div>
		</div>
		<!-- <div class="row">
			<div class="col-md-12">
				<div class="col-md-1">
				</div>
				<div class="col-md-6 field">
					<label for="disable" class="radio-label">Do you consider yourself to have a disability of some kind ? </label>
				</div>
				<div class="col-md-6 field">
					<div class="radio">
						<label for="disable">Yes</label>
						<input type="radio" value="yes" name="disable" id="disable" class="disable-radio" required>
					</div>
					<div class="radio">
						<label for="not_disable">No</label>
						<input type="radio" name="disable" id="not_disable" value="no">
					</div>
					<div class="radio">
						<label for="disability_details" class="radio-label">If yes, give details </label>
						<input type="text" name="disability_details" id="disability_details" class="input-data" required/>
					</div>
				</div>
			</div>
		</div> -->
		<div class="row">
			<div class="col-md-12">
				<div class="col-md-5 field">
					<label for="gender" class="radio-label">Do you consider yourself to have a disability of some kind ? </label>
				</div>
				<div class="col-md-3 field">
					<label for="disable">Yes</label>
					<input type="radio" value="yes" name="disable" id="disable" class="disable-radio" required>
					<label for="not_disable">No</label>
					<input type="radio" name="disable" id="not_disable" value="no">
				</div>	
				<div class="col-md-3">
					<label for="disability_details" class="radio-label">If yes, give details </label>
					<input type="text" name="disability_details" id="disability_details" class="input-data" />
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
						<label for="service">Yes</label>
						<input type="radio" value="yes" name="service" id="service" class="service-radio" required>
					</div>
					<div class="radio">
						<label for="no_service">No</label>
						<input type="radio" name="service" id="no_service" value="no">
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
						<label for="offence">Yes</label>
						<input type="radio" value="yes" name="offence" id="offence" class="offence-radio" required>
					</div>
					<div class="radio">
						<label for="no_offence">No</label>
						<input type="radio" name="offence" id="no_offence" value="no">
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
						<label for="disciplinary_procedure">Yes</label>
						<input type="radio" value="yes" name="disciplinary_procedure" id="disciplinary_procedure" class="behavior-radio" required>
					</div>
					<div class="radio">
						<label for="no_disciplinary_procedure">No</label>
						<input type="radio" name="disciplinary_procedure" id="no_disciplinary_procedure" value="no">
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
						<label for="criminal_offence">Yes</label>
						<input type="radio" value="yes" name="criminal_offence" id="criminal_offence" class="criminal-radio" required>
					</div>
					<div class="radio">
						<label for="no_disciplinary_proceduree">No</label>
						<input type="radio" name="criminal_offence" id="no_criminal_offence" value="no">
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
                    <input type="text" id="signature" name="signature" class="input-data" required>
                </div>
                <div class="col-md-6 field">
                    <label for="date">Date</label>
                    <input type="date" id="date" name="date" class="input-data" required>
                </div>
            </div>
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
			<input type="radio" value="yes" name="agree" id="agree" class="agree-radio" required>
		</div>
		<hr class="line">
		<h2>Notes</h2>
		<div class="row">
			<textarea class="notes" name="notes" id="notes" rows="2" cols="40"  aria-required="true" class="input-data" required></textarea>
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
                    <input type="text" id="signature" name="signature" class="input-data" required>
                </div>
                <div class="col-md-3 field">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" class="input-data" required>
                </div>
                <div class="col-md-3 field">
                    <label for="date">Date</label>
                    <input type="date" id="date" name="date" class="input-data" required>
                </div>
            </div>
        </div>
		<div class="row">
			<div class="col-md-12">
				<div class="col-md-1">
				</div>
				<!-- <div class="col-md-2">
		
				</div> -->
				<div class="col-md-3">
					<input type="reset" value="Reset All" class="reset" name="reset" id="reset"  />
				</div>
				<div class="col-md-3">
                <input type="submit" id="bankSubmit" value='Submit' class=''>
				</div>
				<div class="col-md-3">
                <input type="button" id="bankfinish" value='Confirm' onclick="submitApplication()" class='submit-action'>
				</div>
			</div>
		</div>
	
</form>
		<div class="row">
        </div>
        <div class="row">
        </div>
		</div>	
		<div class="row">
        </div>
        <div class="row">
        </div>	
		<div  id="applicationInfo" style="display:none">
            
		</div>
</body>
</html>

<script>
	function submitApplication(){
		jQuery.ajax({  
      url: "{{route('application.status')}}",
        type: 'get', 
          success: function(data) {  
            document.getElementById('applicationInfo').style.display = "block";
            document.getElementById('applicationContainer').style.display = "none";
            document.getElementById("applicationInfo").innerHTML = data['result'];         }  
        }); 
  }
</script>
