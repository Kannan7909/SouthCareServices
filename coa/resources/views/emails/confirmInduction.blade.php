<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Induction Confirmed</title>
</head>
<body>
    <div> 
    Hi,<br />
            Your South Care Services Ltd Induction has been confirmed.  <br/>
            Date : {{$mailData['date']}} <br/>
            Time : {{$mailData['time']}} <br/>
            To know your progress <a href="{{ $mailData['url'] }}">click here </a>
        </div>
</body>
</html>