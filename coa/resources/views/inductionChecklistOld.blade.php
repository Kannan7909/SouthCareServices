<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Starter Checklist</title>
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
	<div class="container">
		<div class="row">
			<h2>Induction Checklist</h2>
		</div>
		<div class="col-md-12">
            <div class="row">
                <div class="col-md-4 field">
                    <label for="staff_member">Name Of Staff Member</label>
                    <input type="text" id="staff_member" name="staff_member" class="input-data" required>
                </div>
                <div class="col-md-3 field">
                    <label for="job_title">Job Title</label>
                    <input type="text" id="job_title" name="job_title" class="input-data" required>
                </div>
                <div class="col-md-4 field">
                    <label for="commencement">Date of Commencement</label>
                    <input type="date" id="commencement" name="commencement" class="input-data" required>
                </div>
            </div>
        </div>
		<form method="POST" action="{{ route('save.starter') }}" class="starter-form" id="starter-form">
        @csrf
		<div class="row"></div>
		<div class="row"></div>
		<div class="row"></div>
		<div class="row">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Area of Induction</th>
                        <th>Tick relevant induction area when completed</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tr>
                    <td>
						<label for="loan">History and Culture of Organisation </label>
                        <input type="checkbox" id="a" name="history" value="a" required>
                    </td>
                    <td>
                        <p>Do not choose this statement if you’re in receipt of a State, Works or Private Pension</p>
                        <p>Choose this statement if the following applies.</p>
                        <p>Since 6 April I have had another job but I do not have a P45. And/or since the 6 April I have receive payments from any of the following:</p>
						<div class="col-md-12">
						<div class="col-md-8">
						<ul>
                            <li>Jobseeker’s Allowance</li>
                            <li>Employment and Support Allowance</li>
                            <li>Incapacity Benefit</li>
                        </ul>
                        <hr>
                        <p> Statement B applies to me</p>
						<div>
                        <input class="col-md-4" type="checkbox" id="b" name="statement[]" value="b">
						</div>
						</div>
						</div>
                    </td>
                    <td class="col-md-4">
                        <p>Choose this statement if:</p>
						<div class="col-md-12">
						<div class="col-md-8">
                        <ul>
                            <li>you have another job and/or</li>
                            <li>you’re in receipt of a State, Works or Private Pension</li>
                        </ul>
                        <div class="row"></div>
                        <div class="row"></div>
                        <div class="row"></div>
                        <div class="row"></div>
                        <div class="row"></div>
                        <div class="row"></div>
                        <div class="row"></div>
                        <div class="row"></div>
						<div class="row"></div>
                        <div class="row"></div>
						<div class="row"></div>
                        <div class="row"></div>
						<div class="row"></div>
                        <hr>
                        <p> Statement C applies to me</p>
                        <input type="checkbox" id="c" name="statement[]" value="c">
						</div>
						</div>
                    </td>
                </tr>
            </table>
        </div>
</body>
</html>