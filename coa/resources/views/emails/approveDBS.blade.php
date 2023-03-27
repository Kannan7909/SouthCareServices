<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Approve DBS</title>
</head>
<body>
    <div> 
    Hi,<br />
            Your South Care Services Ltd DBS form has been approved. To know your progress<br />
            @if($mailData['comment']!="Nil")
            Comment : {{ $mailData['comment'] }} <br />
            @endif
             <a href="{{ $mailData['url'] }}">click here </a>
        </div>
</body>
</html>