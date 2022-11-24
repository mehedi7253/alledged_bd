<!DOCTYPE html>
<html>
<head>
    <title>Reset your password</title>
</head>
<body>
    <h1>Hi! Need to reset your password?</h1>
    <a href="{{ env("APP_URL") }}/reset-password/{{$token}}">Click on this link to change your password</a>
    <p>How to create a strong password:<br>
    1. Do not use passwords that are easy to guess (your date of birth, your name or your pet's name, etc.).<br>
    2. Do not use common passwords like 123456, 111111, password, qwerty.<br>
    3. Make it as long as possible (at least 6 characters).<br><br>
    If you did not request a password reset, then simply ignore this email and no changes will be made.<br><br><br>
    Have a great day!<br>
    HM Expo Private Limited</p>
</body>
</html>