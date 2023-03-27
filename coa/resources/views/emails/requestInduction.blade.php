<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Induction Request</title>
</head>
<body>
    <div> 
    Hi,<br />
            New request for induction.  <br/>
            Date : {{$mailData['date']}} <br/>
            Time : {{$mailData['time']}} <br/>
            click to confirm or cancel induction <a href="{{ $mailData['url'] }}">click here </a>
        </div>
</body>
</html>