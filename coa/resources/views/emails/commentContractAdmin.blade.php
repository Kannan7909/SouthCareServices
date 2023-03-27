<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Contract Admin Commented</title>
</head>
<body>
    <div> 
    Hi {{ $mailData['name'] }},<br />

            South Care Services Ltd Employer Contract has been commented by the Admin. <br />
            @if($mailData['comment']!="Nil")
            Comment : {{ $mailData['comment'] }} <br />
            @endif
            To know your progress <a href="{{ $mailData['url'] }}">click here </a>
        </div>
</body>
</html>