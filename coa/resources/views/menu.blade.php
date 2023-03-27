<!DOCTYPE html>
<html lang="en">
<head>
  <title>Application Menu  List</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

    <div class="container">
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#bank">Bank Details</a></li>
            <li><a data-toggle="tab" href="#starter">Starter Checklist</a></li>
            <li><a data-toggle="tab" href="#health">Health Questionnaire</a></li>
            <li><a data-toggle="tab" href="#application">Application Form</a></li>
        </ul>

        <div class="tab-content text-left">
            <div id="bank" class="tab-pane fade in active">
            @include('bank')
            </div>
            <div id="starter" class="tab-pane fade">
                @include('starterChecklist')
            </div>
            <div id="health" class="tab-pane fade">
                @include('health')
            </div>
            <div id="application" class="tab-pane fade">
                @include('application')
            </div>
        </div>
    </div>
</body>
</html>
