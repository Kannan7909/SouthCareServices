<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Profile</title>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.5/jquery-ui.min.js'></script>
	<link rel="stylesheet" type="text/css" href="css/profile.css">
	<script type="text/javascript" src="js/profile.js"></script>

</head>
<body>
    <!-- multistep form -->
<form id="msform">
	<!-- progressbar -->
	<ul id="progressbar">
		<li>Account Setup</li>
		<li class="active">Upload Documents</li>
		<li>Induction Program</li>
	</ul>
	<!-- fieldsets -->
	<fieldset>
		<h2 class="fs-title">Verify Your Identity</h2>
		<h3 class="fs-subtitle">Your application will not be complete until all required items are submitted.</h3>
		<!-- <input type="text" name="twitter" placeholder="Twitter" />
		<input type="text" name="facebook" placeholder="Facebook" />
		<input type="text" name="gplus" placeholder="Google Plus" />  -->
		<input type="file" id="file" name="file">
		<input type="submit" name="upload" class="upload" value="Upload" /><br>
		<input type="button" name="previous" class="previous action-button" value="Previous" />
		<input type="button"  name="next" class="next action-button" value="Next" />
	</fieldset>
</form>

</body>
</html>