<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Updated</title>
</head>
<body>
    <div> 
    Hi Admin,<br />
            User {{ $mailData['name'] }} has updated Application Form.  <br/>
          Please check <a href="{{ $mailData['url'] }}">click here </a>
        </div>
</body>
</html>