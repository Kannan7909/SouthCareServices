<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Edit Starter Checklist Details</title>
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
		<div class="row">
			<h2>Instructions for employers</h2>
			<div>This Starter Checklist can be used to gather information about your new employee. You can use this information
to help fill in your first Full Payment Submission (FPS) for this employee. You need to keep the information
recorded on the Starter Checklist record for the current and previous 3 tax years. Do not send this form to
HM Revenue and Customs (HMRC).</div>
</div>
        <div class="row">
			<h2>Instructions for employers</h2>
			<div>As a new employee your employer needs the information on this form before your first payday to tell HMRC about you
and help them use the correct tax code. Fill in this form then give it to your employer. Do not send this form to HMRC.
It’s important that you choose the correct statement. If you do not choose the correct statement you may pay too much
or too little tax. For help filling in this form watch our short youtube video, go to www.youtube.com/hmrcgovuk</div>
<hr class="line">
		</div>
		<form method="POST" action="{{ route('update.starter') }}" class="starter-form" id="starter-form">
        @csrf
        <div class="row">
			<h2>Employee's Personal Details</h2>
        </div>
		<div class="row">
			<div class="col-md-12">
				<div class="col-md-1">
				</div>
				<div class="col-md-2 field">
                    <input type="hidden"  name="employee_id" id="employee_id" value="{{ encrypt($employee->id) }})">
					<label for="last_name">Last Name </label>
				</div>
				<div class="col-md-6">
					<input type="text" name="last_name" id="last_name" class="input-data field" value="{{ $employee->lastname }}" required/>
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
					<input type="text" name="first_name" id="first_name" class="input-data field" value="{{ $employee->firstname }}" required/>
				</div>
			</div>
		</div>
		<!-- <div class="row">
			<div class="col-md-12">
				<div class="col-md-1">
				</div>
				<div class="col-md-3 field">
					<label for="status" class="radio-label">Are you male or female? </label>
					<div class="radio">
					    <label for="male">Male   </label>
						@if ( $employee->gender =='male')
                        <input type="radio" value="male" name="gender" id="male" class="" checked>
						@else
                        <input type="radio" value="female" name="gender" id="female" class="">
                         @endif
					</div>
					<div class="radio">
					    <label for="female">Female</label>
						@if ( $employee->gender =='female')
                        <input type="radio" name="gender" id="female" value="female"  checked>
						@else
                        <input type="radio" value="female" name="gender" id="female" >
                         @endif
					</div>
				</div>
			</div>
		</div> -->
        <div class="field">
        <div class="col-md-1 field">
`       </div>
        <label for="status" class="radio-label">Are you male or female? </label>
             
					    <label for="male">Male   </label>
                     @if ( $employee->gender =='male')
                        <input type="radio" value="male" name="gender" id="male" class="" checked>
                    @else
                        <input type="radio" value="male" name="gender" id="male" class="" >
                    @endif
					    <label for="female">Female</label>
                    @if ( $employee->gender =='female')
                        <input type="radio" name="gender" id="female" value="female"  checked>
                    @else
                        <input type="radio" name="gender" id="female" value="female" >
                    @endif

			
            </div>
        <div class="row">
			<div class="col-md-12">
				
				<div class="col-md-2 field">
                <label for="birthday">Date Of Birth:</label>
				</div>
				<div class="col-md-6">
					<input type="date" id="birthday" name="birthday" class="input-data field" value="{{ $employee->birthday }}" required>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="col-md-1">
				</div>
				<div class="col-md-2 field">
					<label for="address1">Home Address </label>
				</div>
				<div class="col-md-6">
					<textarea class="address" name="address" id="address" rows="2" cols="40"  aria-required="true" class="input-data field" required>
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
                <label for="insurance">National Insurance No.</label>
				</div>
				<div class="col-md-6">
					<input type="text" id="insurance" name="insurance" class="input-data field" value="{{ $employee->insurance }}" required>
				</div>
			</div>
		</div>
        <div class="row">
			<div class="col-md-12">
				<div class="col-md-1">
				</div>
				<div class="col-md-2 field">
                <label for="start_date">Employment Start Date:</label>
				</div>
				<div class="col-md-6">
					<input type="date" id="start_date" name="start_date" class="input-data field" value="{{ $employee->start_date }}" required>
				</div>
			</div>
		</div>
		
        <hr class="line">
		<div class="row">
			<h2>Employee Statement</h2>
            <p>Choose the statement that applies to you, either A, B or C, and tick the appropriate box.</p>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Statement A</th>
                        <th>Statement B</th>
                        <th>Statement C</th>
                    </tr>
                </thead>
                <tr>
                    <td>
                        <p>Do not choose this statement if you’re in receipt of a State, Works or Private Pension.</p>
                        <p>Choose this statement if the following applies.</p>
                        <p>This is my first job since 6 April and since the 6 April I’ve not received payments from any of the following:</p>
						<div class="col-md-12">
						<div class="col-md-8">
						<ul>
                            <li>Jobseeker’s Allowance</li>
                            <li>Employment and Support Allowance</li>
                            <li>Incapacity Benefit</li>
                        </ul>
						<div class="row"></div>
                        <div class="row"></div>
                        <hr>
                        <p> Statement A applies to me</p>
                        <input type="checkbox" id="a" name="statement[]" value="a" required>
						</div>
						</div>
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
    	<hr class="line">
		<div class="row">
        <div class="col-md-6">
			<h2>Student Loan</h2>
            <p>For more guidance about repaying, go to www.gov.uk/repaying-your-student-loan</p>
            <p> Do you have one of the Student Loan Plans described below which is not fully repaid?</p>
				<div class="" >
					<label for="loan">Yes</label>
                    @if ( $employee->loan =='yes')
					<input type="radio" value="yes" name="loan" id="loan" checked required>
                    @else
                    <input type="radio" value="yes" name="loan" id="loan" checked required>
                    @endif
					<label for="no_loan">No</label>
                    @if ( $employee->loan =='no')
					<input type="radio" name="loan" id="no_loan" checked value="no">
                    @else
                    <input type="radio" name="loan" id="no_loan" value="no">
                    @endif
				</div>	
			
                <p> Did you complete or leave your studies before 6th April?</p>
                 <div class="">
				 	<label for="completed">Yes</label>
                     @if ( $employee->is_complete =='yes')
					<input type="radio" value="yes" name="is_complete" id="completed" checked required>
                    @else
                    <input type="radio" value="yes" name="is_complete" id="completed" required>
                    @endif
					<label for="not_completed">No</label>
                    @if ( $employee->is_complete =='no')
					<input type="radio" name="is_complete" id="no_loan" checked value="no">
                    @else
                    <input type="radio" name="is_complete" id="no_loan" value="no">
                    @endif

				</div>
                <p> Are you repaying your Student Loan directly to the Student Loans Company by direct debit?</p>
                 <div class="">
				 	<label for="debit">Yes</label>
                     @if ( $employee->is_debit =='yes')
					<input type="radio" value="yes" name="is_debit" id="debit" checked required>
                    @else
                    <input type="radio" value="yes" name="is_debit" id="debit" required>
                    @endif
					<label for="no_debit">No</label>
                    @if ( $employee->is_debit =='no')
					<input type="radio" name="is_debit" id="no_debit" value="no" checked>
                    @else
                    <input type="radio" name="is_debit" id="no_debit" value="no">
                    @endif
				</div>
                <p> What type of Student Loan do you have?</p>
                 <div class="">
				 	<label for="plan1">Plan 1</label>
                     @if ( $employee->loan_type =='plan1')
					<input type="radio" value="plan1" name="loan_type" id="plan1" checked required>
                    @else
                    <input type="radio" value="plan1" name="loan_type" id="plan1" required>
                    @endif
					<label for="plan2">Plan 2</label>
                    @if ( $employee->loan_type =='plan2')
					<input type="radio" value="plan2" name="loan_type" id="plan2" checked>
                    @else
                    <input type="radio" value="plan2" name="loan_type" id="plan2">
                    @endif
					<label for="both">Both</label>
                    @if ( $employee->loan_type =='both')
                    <input type="radio" value="both" name="loan_type" id="both" checked>
                    @else
                    <input type="radio" value="both" name="loan_type" id="both">
                    @endif
				</div>
        </div>
        <div class="col-md-6">
			<h2>Postgraduate Loan</h2>
            <p>For more guidance about funding and repaying, go to www.gov.uk/funding-for-postgraduate-study For more guidance for employers, go to www.gov.uk/guidance/special-rules-for-student-loans</p>
            <p> Do you have a Postgraduate Loan which is not fully repaid?</p>
                 <div class="">
				 	<label for="pg_loan">Yes</label>
                     @if ( $employee->pg_loan =='yes')
					<input type="radio" value="yes" name="pg_loan" id="pg_loan" checked required>
                    @else
                    <input type="radio" value="yes" name="pg_loan" id="pg_loan" required>
                    @endif
					<label for="no_pg_loan">No</label>
                    @if ( $employee->pg_loan =='no')
					<input type="radio" value="no" name="pg_loan" id="no_pg_loan" checked>
                    @else
                    <input type="radio" value="no" name="pg_loan" id="no_pg_loan">
                    @endif
				</div>
                <p> You’ll have a Postgraduate Loan if:</p>
				<div class="col-md-12">
					<div class="col-md-10">
                		<ul>
                            <li>you lived in England and started your Postgraduate Master’s course on or after 1 August 2016</li>
                            <li>you lived in Wales and started your Postgraduate Master’s course on or after 1 August 2017</li>
                            <li>you lived in England or Wales and started your Postgraduate Doctoral course on or after 1 August 2018</li>
                        </ul>
					</div>
				</div>
                <p> Did you complete or leave your Postgraduate studies before 6th April?</p>
                 <div class="">
					<label for="pg_complete">Yes</label>
                    @if ( $employee->is_pg_complete =='yes')
					<input type="radio" value="yes" name="is_pg_complete" id="pg_complete" checked required>
                    @else
                    <input type="radio" value="yes" name="is_pg_complete" id="pg_complete" required>
                    @endif
					<label for="not_pg_complete">No</label>
                    @if ( $employee->is_pg_complete =='no')
					<input type="radio" value="no" name="is_pg_complete" id="not_pg_complete" checked>
                    @else
					<input type="radio" value="no" name="is_pg_complete" id="not_pg_complete">
                    @endif
				</div>
                <p> Are you repaying your Postgraduate Loan direct to the Student Loans Company by direct debit?</p>
                 <div class="">
				 	<label for="pg_debit">Yes</label>
                     @if ( $employee->pg_debit =='yes')
					<input type="radio" value="yes" name="pg_debit" id="pg_debit" checked required>
                    @else
					<input type="radio" value="yes" name="pg_debit" id="pg_debit" required>
                    @endif
					<label for="not_pg_debit">No</label>
                    @if ( $employee->pg_debit =='no')
					<input type="radio" value="no" name="pg_debit" id="not_pg_debit" checked>
                    @else
					<input type="radio" value="no" name="pg_debit" id="not_pg_debit">
                    @endif
				</div>
                <p> Fill in the declaration.</p>
        </div>
        </div>
        <hr class="line">
		<div class="row">
			<h2>DECLARATION</h2>
			<div>I confirm that the information I’ve given on this form is correct.</div>
		</div>
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3 field">
                    <label for="signature">Signature</label>
                    <input type="text" id="signature" name="signature" class="input-data" value="{{ $employee->signature }}" required>
                </div>
                <div class="col-md-3 field">
                    <label for="fullname">Full Name</label>
                    <input type="text" id="full_name" name="full_name" class="input-data" value="{{ $employee->firstname }} {{ $employee->lastname }}" required>
                </div>
                <div class="col-md-3 field">
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
        </div>
        <div class="row">
        </div>
        <div class="row">
        </div>
        <div class="row">
        </div>
		<div class="row">
			<div class="col-md-12">
				<div class="col-md-8">
				</div>
				<div class="col-md-4">
                <input type="submit" id="bankSubmit" value='Update' class='submit-action'>
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
        <div class="row">
        </div>
        <div class="row">
        </div>
    </div>
    
  </div>




	
</body>
</html>