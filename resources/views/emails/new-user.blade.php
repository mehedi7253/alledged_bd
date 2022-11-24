<html>
<head>
    <title>Welcome to HM Expo Private Limited</title>
</head>
<body>
    <h2>Welcome,</h2>
    <h3>Congratulations! Your account has been successfully created.</h3>
    <p>Username: {{ $email }}</p>
    <p>Password: {{ $password }}</p>
    <a href="{{ env("APP_URL") }}/login">Click on this link to login.</a>
    <p>Have a great day!<br>
    <p>HM Expo Private Limited</p>
</body>
</html>