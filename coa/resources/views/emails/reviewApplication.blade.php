<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review Training</title>
</head>
<body>
   <div> 
    Hi,<br />
            Your South Care Services Ltd Application form is under review. <br />
            @if($mailData['comment']!="Nil")
            Comment : {{ $mailData['comment'] }} <br />
            @endif
            To know your progress <a href="{{ $mailData['url'] }}">click here </a>
        </div>
</body>
</html>