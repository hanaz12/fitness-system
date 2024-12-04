<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="preload" href="resources/css/app.css" as="style">

    <link href="https://fonts.googleapis.com/css2?family=Bad+Script&display=swap" rel="stylesheet">
    {{-- @vite (['resources/css/app.css', 'resources/js/app.js']) --}}
</head>
<body>
    <div class="body-login">
    <div class="loginpage">
    <div class="div-welcome-tittle">
        <h2 class="welcome-tittle">Fitness Website</h2>
    </div>
        <form action="/loginn" method="POST">
    @csrf
    <div>
        <input type="text" class="username-1" placeholder="      Username" name="username" required>
    </div><br>
    <div>
        <input type="password" class="pass-1" placeholder="       Password" name="password" required>
    </div><br>
    <div class="radio-btn">
        <div class="div1"> <input type="radio" value="trainee" id="trainee" name="user" required>
            <label for="trainee">Trainee</label></div>
        <div class="div1">    <input type="radio" value="Admin" id="Admin" name="user" required>
            <label for="Admin">Admin</label></div>
        <div class="div1"><input type="radio" value="Admin-moderator" id="Admin-modirator" name="user" required>
            <label for="Admin-modirator">Admin-moderator</label></div>
        <div class="div1">  <input type="radio" value="Coach" id="Coach" name="user" required>
            <label for="Coach">Coach</label></div>
    </div><br>


    <div>
        <p>Don't have an account? <a href="{{ route('signup.create') }}">Sign Up</a></p>

    </div>
    <div class="btn1">
        <input class="submit-1" type="submit" value="Sign in">
    </div><br>
</form>
</div>
</div>
</body>
</html>
