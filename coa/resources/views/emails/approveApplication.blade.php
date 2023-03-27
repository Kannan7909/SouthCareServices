<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Approve Application</title>
</head>
<body>
    <div> 
    Hi,<br />

       <!--  Welcome to Excellent Care Business Solutions. For further process, you will need a login for our website. Plaese go to the login page using the following account information:<br /><br />  -->
            Your South Care Services Ltd Application form has been approved. <br />
            @if($mailData['comment']!="Nil")
            Comment : {{ $mailData['comment'] }} <br />
            @endif
            To know your progress <a href="{{ $mailData['url'] }}">click here </a>
        </div>
</body>
</html>