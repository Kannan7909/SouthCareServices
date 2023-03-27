<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Health Check Qusetionnaire</title>
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
			<h2>Health Check Questionnaire</h2>
            <!-- <hr class="line"> -->
		</div>
		<div class="row">
		</div>
        <h2>Personal Details</h2>
		<form method="POST" action="{{ route('update.health') }}" class="health-form" id="health-form">
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
					<label for="surname">Surname </label>
				</div>
				<div class="col-md-6">
					<input type="text" name="surname" id="surname" class="input-data field" value="{{ $employee->surname }}"required/>
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
					<input type="text" name="first_name" id="first_name" class="input-data field" value="{{ $employee->first_name }}" required/>
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
					<label for="tel_no">Tel No. </label>
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
            <hr class="line">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-1">
                </div>
                <div class="col-md-2 field">
                    <label for="gp_contact">GP Contact Details</label>
                </div>
                <div class="col-md-6">
				    <input type="text" name="gp_contact" id="gp_contact" class="input-data field" value="{{ $employee->gp_contact }}" required/>
                </div>
			</div>
			<div class="row">
			</div>
			<div class="row">
			</div>
            <div class="row">
                <div class="col-md-1">
                </div>
                 Please answer all the following questions by giving relevant details
            </div>
        </div>
        <div class="row">
			<div class="col-md-12">
            <label for="">1.Have you ever suffered from any of the following:</label>
			</div>
		</div>
        <div class="row">
			<div class="col-md-12">
				<div class="col-md-1">
				</div>
				<div class="col-md-5 ">
                <label for="depression">a) Depression, anxiety state, nervous illness or breakdown</label>
				</div>
				<div class="col-md-2 field">
					<label for="debit">Yes</label>
                    @if ( $employee->depression =='yes')
                    <input type="radio" value="yes" name="depression" id="depression" checked required>
                    @else
                    <input type="radio" value="yes" name="depression" id="depression" required>
                    @endif
					<label for="no_depression">No</label>
                    @if ( $employee->depression =='no')
					<input type="radio" name="depression" id="no_depression" value="no" checked>
                    @else
					<input type="radio" name="depression" id="no_depression" value="no">
                    @endif
                </div>
                <div class="col-md-2">
                    <label for="depression_note">If, Yes </label>
					<input type="text" id="depression_note" name="depression_note" class="input-data field" value="{{ $employee->depression_note }}">
				 </div>
			</div>
		</div>
        <div class="row">
			<div class="col-md-12">
				<div class="col-md-1">
				</div>
				<div class="col-md-5 ">
                <label for="epilepsy">b) Epilepsy or disease of the nervous system</label>
				</div>
				<div class="col-md-2 field">
					<label for="epilepsy">Yes</label>
                    @if ( $employee->epilepsy =='yes')
					<input type="radio" value="yes" name="epilepsy" id="epilepsy" checked required>
                    @else
                    <input type="radio" value="yes" name="depression" id="depression" required>
                    @endif
					<label for="no_epilepsy">No</label>
                    @if ( $employee->epilepsy =='no')
					<input type="radio" name="epilepsy" id="no_epilepsy" value="no" checked>
                    @else
					<input type="radio" name="epilepsy" id="no_epilepsy" value="no">
                    @endif
                </div>
                <div class="col-md-2">
                    <label for="epilepsy_note">If, Yes </label>
					<input type="text" id="epilepsy_note" name="epilepsy_note" class="input-data field" value="{{ $employee->epilepsy_note }}">
				</div>
			</div>
		</div>
        <div class="row">
			<div class="col-md-12">
				<div class="col-md-1">
				</div>
				<div class="col-md-5 ">
                <label for="ailment">c) Ailment of lungs or chest</label>
				</div>
				<div class="col-md-2 field">
					<label for="ailment">Yes</label>
                    @if ( $employee->ailment =='yes')
					<input type="radio" value="yes" name="ailment" id="ailment" checked required>
                    @else
					<input type="radio" value="yes" name="ailment" id="ailment" required>
                    @endif
					<label for="no_ailment">No</label>
                    @if ( $employee->ailment =='no')
					<input type="radio" name="ailment" id="no_ailment" value="no" checked>
                    @else
					<input type="radio" name="ailment" id="no_ailment" value="no">
                    @endif
                </div>
                    <div class="col-md-2">
                    <label for="ailment_note">If, Yes </label>
					<input type="text" id="ailment_note" name="ailment_note" class="input-data field" value="{{ $employee->ailment_note }}">
				    </div>
			</div>
		</div>
        <div class="row">
			<div class="col-md-12">
				<div class="col-md-1">
				</div>
				<div class="col-md-5 ">
                <label for="spinal">d) Spinal problem (backache)</label>
				</div>
				<div class="col-md-2 field">
					<label for="spinal">Yes</label>
                    @if ( $employee->ailment =='yes')
					<input type="radio" value="yes" name="spinal" id="spinal" checked required>
                    @else
					<input type="radio" value="yes" name="spinal" id="spinal" required>
                    @endif
					<label for="no_spinal">No</label>
                    @if ( $employee->spinal =='no')
					<input type="radio" name="spinal" id="no_spinal" value="no" checked>
                    @else
					<input type="radio" name="spinal" id="no_spinal" value="no">
                    @endif
                </div>
                    <div class="col-md-2">
                    <label for="spinal_note">If, Yes </label>
					<input type="text" id="spinal_note" name="spinal_note" class="input-data field" value="{{ $employee->spinal_note }}">
				    </div>
			</div>
		</div>
        <div class="row">
			<div class="col-md-12">
				<div class="col-md-1">
				</div>
				<div class="col-md-5 ">
                <label for="arthritis">e) Arthritis, Rheumatism or Gout etc</label>
				</div>
				<div class="col-md-2 field">
					<label for="arthritis">Yes</label>
                    @if ( $employee->arthritis =='yes')
					<input type="radio" value="yes" name="arthritis" id="arthritis" checked required>
                    @else
					<input type="radio" value="yes" name="arthritis" id="arthritis" required>
                    @endif
					<label for="no_arthritis">No</label>
                    @if ( $employee->arthritis =='no')
					<input type="radio" name="arthritis" id="no_arthritis" value="no" checked>
                    @else
					<input type="radio" name="arthritis" id="no_arthritis" value="no">
                    @endif
                </div>
                    <div class="col-md-2">
                    <label for="arthritis_note">If, Yes </label>
					<input type="text" id="arthritis_note" name="arthritis_note" class="input-data field" value="{{ $employee->arthritis_note }}">
				    </div>
			</div>
		</div>
        <div class="row">
			<div class="col-md-12">
				<div class="col-md-1">
				</div>
				<div class="col-md-5 ">
                <label for="heart">f) Any heart or circulatory, including blood problems</label>
				</div>
				<div class="col-md-2 field">
					<label for="heart">Yes</label>
                    @if ( $employee->heart =='yes')
					<input type="radio" value="yes" name="heart" id="heart" checked required>
                    @else
					<input type="radio" value="yes" name="heart" id="heart" required>
                    @endif
					<label for="no_heart">No</label>
                    @if ( $employee->heart =='no')
					<input type="radio" name="heart" id="no_heart" value="no" checked>
                    @else
					<input type="radio" name="heart" id="no_heart" value="no">
                    @endif
                </div>
                <div class="col-md-2">
                    <label for="heart_note">If, Yes </label>
					<input type="text" id="heart_note" name="heart_note" class="input-data field" value="{{ $employee->heart_note }}">
				</div>
			</div>
		</div>
        <div class="row">
			<div class="col-md-12">
				<div class="col-md-1">
				</div>
				<div class="col-md-5 ">
                <label for="kidney">g) Illness of the kidneys, bladder, liver or glands</label>
				</div>
				<div class="col-md-2 field">
					<label for="kidney">Yes</label>
                    @if ( $employee->kidney =='yes')
					<input type="radio" value="yes" name="kidney" id="kidney" checked required>
                    @else
					<input type="radio" value="yes" name="kidney" id="kidney" required>
                    @endif
					<label for="no_kidney">No</label>
                    @if ( $employee->kidney =='no')
					<input type="radio" name="kidney" id="no_kidney" value="no" checked>
                    @else
					<input type="radio" name="kidney" id="no_kidney" value="no">
                    @endif
                </div>
                    <div class="col-md-2">
                    <label for="kidney_note">If, Yes </label>
					<input type="text" id="kidney_note" name="kidney_note" class="input-data field" value="{{ $employee->kidney_note }}">
				    </div>
			</div>
		</div>
        <div class="row">
			<div class="col-md-12">
				<div class="col-md-1">
				</div>
				<div class="col-md-5 ">
                <label for="diabetes">h) Diabetes</label>
				</div>
				<div class="col-md-2 field">
					<label for="diabetes">Yes</label>
                    @if ( $employee->diabetes =='yes')
					<input type="radio" value="yes" name="diabetes" id="diabetes" checked required>
                    @else
					<input type="radio" value="yes" name="diabetes" id="diabetes" required>
                    @endif
					<label for="no_diabetes">No</label>
                    @if ( $employee->diabetes =='no')
					<input type="radio" name="diabetes" id="no_diabetes" value="no" checked>
                    @else
					<input type="radio" name="diabetes" id="no_diabetes" value="no">
                    @endif
                </div>
                    <div class="col-md-2">
                    <label for="diabetes_note">If, Yes </label>
					<input type="text" id="diabetes_note" name="diabetes_note" class="input-data field" value="{{ $employee->diabetes_note }}">
				    </div>
			</div>
		</div>
        <div class="row">
			<div class="col-md-12">
				<div class="col-md-1">
				</div>
				<div class="col-md-5 ">
                <label for="skin">i) Skin disorder</label>
				</div>
				<div class="col-md-2 field">
					<label for="skin">Yes</label>
                    @if ( $employee->skin =='yes')
					<input type="radio" value="yes" name="skin" id="skin" checked required>
                    @else
					<input type="radio" value="yes" name="skin" id="skin" required>
                    @endif
					<label for="no_skin">No</label>
                    @if ( $employee->skin =='no')
					<input type="radio" name="skin" id="no_skin" value="no" checked>
                    @else
					<input type="radio" name="skin" id="no_skin" value="no">
                    @endif
                </div>
                    <div class="col-md-2">
                    <label for="skin_note">If, Yes </label>
					<input type="text" id="skin_note" name="skin_note" class="input-data field" value="{{ $employee->skin_note }}">
				    </div>
			</div>
		</div>
        <div class="row">
			<div class="col-md-12">
            <label for="medication">2) Are you presently taking medication or undergoing treatment. If so give details</label>
			</div>
        </div>
        <div class="row">
			<div class="col-md-12">
				<div class="col-md-6">
					<input type="text" name="medication" id="medication" class="input-data" value="{{ $employee->medication }}" required/>
				</div>
			</div>
		</div>
        <div class="row">
				<div class="col-md-4 field">
                    <label for="consumption">3) What is your average daily consumption of: </label>
				</div>
				<div class="col-md-4">
                <label for="alcohol">Alcohol </label>
                 <input type="text" id="alcohol" name="alcohol" class="input-data field" value="{{ $employee->alcohol }}" required/>
				</div>
                <div class="col-md-4">
                <label for="tobacco">Tobacco </label>
                 <input type="text" id="tobacco" name="tobacco" class="input-data field" value="{{ $employee->tobacco }}" required/>
				</div>
        </div>
        <div class="row">
				<div class="col-md-4 field">
                    <label for="consumption">4) Are you a registered disabled person? </label>
				</div>
				<div class="col-md-4 field">
                <label for="not_disabled">No</label>
                @if ( $employee->disabled =='no')
                <input type="radio" value="no" name="disabled" id="not_disabled" checked>
                @else
                <input type="radio" value="no" name="disabled" id="not_disabled">
                @endif
				</div>
                <div class="col-md-4 field">
                <label for="disabled">Yes</label>
                @if ( $employee->disabled =='yes')
                <input type="radio" value="yes" name="disabled" id="disabled" checked>
                @else
                <input type="radio" value="yes" name="disabled" id="disabled" required>
                @endif
				</div>
        </div>
        <div class="row">
			<div class="col-md-12">
            <label for="benefit">5) Details of any industrial disablement benefit received:</label>
			</div>
        </div>
        <div class="row">
			<div class="col-md-12">
				<div class="col-md-6">
					<input type="text" name="benefit" id="benefit" class="input-data" value="{{ $employee->benefit }}" required/>
				</div>
			</div>
		</div>
        <div class="row">
			<div class="col-md-12">
            <label for="absent">6) How many working days have you been absent from during the last 12 months (apart from holidays)
</label>
			</div>
        </div>
        <div class="row">
			<div class="col-md-12">
				<div class="col-md-6">
					<input type="text" name="absent" id="absent" class="input-data" value="{{ $employee->absent }}" required/>
				</div>
			</div>
		</div>
        <div class="row">
            <div class="col-md-3 field">
                <label for="pregnant">7) Are you now pregnant? </label>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 field">
                <div class="radio">
                    @if ( $employee->pregnant =='no')
                    <input type="radio" value="no" name="pregnant" id="not_pregnant" checked>
                    @else
                    <input type="radio" value="no" name="pregnant" id="not_pregnant">
                    @endif
					<label for="not_pregnant">No</label>
                </div>
            </div>
            <div class="col-md-3 field">
                <div class="radio">
                    @if ( $employee->pregnant =='yes')
                    <input type="radio" value="yes" name="pregnant" id="pregnant" checked>
                    @else
                    <input type="radio" value="yes" name="pregnant" id="pregnant">
                    @endif
					<label for="pregnant">Yes</label>
                </div>
                </div>
                <div class="col-md-3 field">
                <div class="radio">
                    @if ( $employee->pregnant =='N/A')
                    <input type="radio" value="N/A" name="pregnant" id="not_available" checked>
                    @else
                    <input type="radio" value="N/A" name="pregnant" id="not_available">
                    @endif
					<label for="not_available">N/A</label>
                </div>
                </div>
		</div>

        <div class="row">
			<div class="col-md-12">
            <label for="additional">8) Additional details: ( If necessary)</label>
			</div>
        </div>
        <div class="row">
			<div class="col-md-12">
				<div class="col-md-6">
					<input type="text" name="additional" id="additional" class="input-data" value="{{ $employee->additional }}" required/>
				</div>
			</div>
		</div>
        <hr class="line">
        <div class="row">
			<h2>DECLARATION</h2>
            <div>I confirm that the information given within this form is true and accurate. I hereby give consent for this information being used for personnel administration and business purposes.</div>
		</div>
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3 field">
                    <label for="signature">Signature</label>
                    <input type="text" id="signature" name="signature" class="input-data" value="{{ $employee->signature }}">
                </div>
                <div class="col-md-3 field">
                    <label for="full_name">Full Name</label>
                    <input type="text" id="full_name" name="full_name" class="input-data" value="{{ $employee->surname }} {{ $employee->first_name }}">
                </div>
                <div class="col-md-3 field">
                    <label for="date">Date</label>
                    <input type="date" id="date" name="date" class="input-data" value="{{ $employee->date }}">
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