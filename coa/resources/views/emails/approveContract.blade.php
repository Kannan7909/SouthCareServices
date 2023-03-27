<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Approve Contract</title>
</head>
<body>
    <div> 
    Hi {{ $mailData['name'] }},<br />

            Your South Care Services Ltd Employee Contract has been approved. <br />
            To know your progress <a href="{{ $mailData['url'] }}">click here </a>
        </div>
</body>
</html>