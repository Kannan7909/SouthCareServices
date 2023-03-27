<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Add induction phase2</title>
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Font-->
	<link rel="stylesheet" type="text/css" href="css/nunito-font.css">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<!-- Main Style Css -->
    <link rel="stylesheet" href="css/register.css"/>
</head>
<body>
@include('adminPanel')
	<div class="container" >
		<div class="row text-center">
			<h2>Induction Phase2</h2>
		</div>
		<form method="POST" action="{{ route('add.inductionPhase2') }}" >
        @csrf
		<div class="row">
		</div>
		<div class="row">
			<div class="col-md-12">
			<div class="col-md-2">
    		</div>
				<div class="col-md-1">
				</div>
				<div class="col-md-2">
					<label for="date">Choose Induction Date </label>
				</div>
				<div class="col-md-6">
					<input type="date" name="inductionDate2" id="inductionDate2" class="input-data" required>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
			<div class="col-md-2">
    		</div>
				<div class="col-md-1">
				</div>
				<div class="col-md-2">
					<label for="time">Choose Induction Time </label>
				</div>
				<div class="col-md-6">
					<input type="time" name="inductionTime2" id="inductionTime2" class="input-data" required>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
			<div class="col-md-2">
    		</div>
				<div class="col-md-1">
				</div>
				<div class="col-md-2">
					<label for="limit">Induction Limit </label>
				</div>
				<div class="col-md-6">
					<input type="number" name="inductionLimit2" id="inductionLimit2" class="input-data" required>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-12">
				<div class="col-md-1">
				</div>
				<div class="col-md-2">
		
				</div>
				<div class="col-md-2">
    		</div>
				<div class="col-md-6">
					<input type="reset" value="Reset All" class="submit" name="reset" id="reset" />
					<input type="submit" value="Submit" class="submit" name="submit" id="submit" />
				</div>
			</div>
		</div>
</form>
	</div>
</body>
</html>