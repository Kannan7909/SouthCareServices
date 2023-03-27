<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Created</title>
</head>
<body>
    <div> 
    Hi {{ $mailData['name'] }},<br />

       <!--  Welcome to Excellent Care Business Solutions. For further process, you will need a login for our website. Plaese go to the login page using the following account information:<br /><br />  -->
      Thank you for registering with South Care Services Ltd. To proceed please login using the details given below.<br /><br />

            Login Id : {{ $mailData['login_id'] }}<br />
            Password : {{ $mailData['password'] }}<br />
            To Login : <a href="{{ $mailData['url'] }}">click here </a>
        </div>
</body>
</html>

