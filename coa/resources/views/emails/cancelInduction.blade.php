<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Induction Cancelled</title>
</head>
<body>
    <div> 
    Hi,<br />
            Your South Care Services Ltd Induction scheduled on.  <br/>
            Date : {{$mailData['date']}} <br/>
            Time : {{$mailData['time']}} <br/>
            has been cancelled <br/>
            click to reschedule induction <a href="{{ $mailData['url'] }}">click here </a>
        </div>
</body>
</html>