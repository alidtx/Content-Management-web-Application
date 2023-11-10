<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email Verification</title>
</head>
<body>
   <p>Hello, </p><strong>Mr. {{$data->name}}</strong>
   <p>Welcome to BUP club, thank you for registration, For active your account Please click <a href="{{route('verify.email',$data->verify_token)}}">here</a></p>
</body>
</html>