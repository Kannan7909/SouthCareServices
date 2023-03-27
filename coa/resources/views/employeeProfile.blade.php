<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Profile</title>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.5/jquery-ui.min.js'></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/profile.css">
	<script type="text/javascript" src="js/profile.js"></script>
<!--     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
 --><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	
</head>
<body>
    @include('adminPanel');
   <div class="container-fluid">
	<div class="row justify-content-center">
		<div class="" >
            <div class="col-md-12">
                <div id="msform">
                    <!-- progressbar -->
                    <ul id="progressbar">
                        <li class="active" id="account"><strong>User Profile</strong></li>
                        <li id="personal"><strong>Upload Documents</strong></li>
                        <li id="payment"><strong>Application Forms</strong></li>
                        <li id="confirm"><strong>Induction Phase1 </strong></li>
                        <li id="induction2"><strong>Induction Phase2 </strong></li>

                    </ul>
                   <!--  <div class="progress">
                    	<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                	</div> -->
                    <br>
                    <!-- fieldsets -->
                    <fieldset>
                    @include('userProfile')
                        <input type="button" name="next" class="next action-button" value="Next"/>
                        <!-- <div class="form-card">
                        	<div class="row">
                        		<div class="col-7">
                            		<h2 class="fs-title">Account Information:</h2>
                            	</div>
                            	<div class="col-5">
                            		<h2 class="steps">Step 1 - 4</h2>
                            	</div>
                            </div>
                            <h2 class="fs-title">Hi! Welcome</h2>
							<h3 class="fs-subtitle">Registration Sucessfuly Completed.</h3>
                        </div>
                        <input type="button" name="next" class="next action-button" value="Next"/> -->
                    </fieldset>
                    <fieldset>
                        @include('employeeDocument')
                        @if($employee->document_verified == 'approved')
                        <input type="button" name="next" class="next action-button" value="Next"/>
                        @else
                        <input type="button" name="next" class="next action-button" value="Next" style="display:none"/>
                        @endif
                        <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                     </fieldset>
                    <fieldset>
						@include('menu')
                        @if($employee->forms_verified == '4')
                        <input type="button" name="next" class="next action-button" value="Next"/>
                        @else
                        <input type="button" name="next" class="next action-button" value="Next" style="display:none"/>
                        @endif                        
                        <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>

<!--                         <input type="button" name="induction" class="induction action-button" value="Next"/>
 --><!--                         <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
 -->                  </fieldset>
                    <fieldset>
                   
                    @include('inductionPhase1')
                        <input type="button" name="next" class="next action-button" value="Next"/>
                        <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>

                    </fieldset>
                    <fieldset>
                   
                    @include('inductionPhase2')
                        <input type="button" name="next" class="next action-button" value="Next"/>
                        <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>

                    </fieldset>
</div>
            </div>
        </div>
	</div>
</div>
</body>
</html>