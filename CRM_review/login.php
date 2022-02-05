<?php

session_start();
include('function.php');
$userObj = new Users();
if(isset($_POST['submit'])){
    $userObj->login();
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <title>Login Page</title>
</head>

<body>
    <div class="container">
        <header>
            <h2>CRM Application</h2>
        </header>

        <div class="section">
            <h1>Enter your informatio</h1>
        </div>

        <form method="post">
            <!-- User name input form -->
            <div class="form-group">
                <label for="user_name">Enter your username</label>
                <input type="text" id="user_name" class="form-control" name="user_name" placeholder="User name">
            </div>

            <!-- Password input form -->
            <div class="form-group">
                <label for="password">Enter your username</label>
                <input type="text" id="password" class="form-control" name="password" placeholder="Password">
            </div>

            <input type="submit" class="btn btn-danger" name="submit" value="Login">
        </form>
        <a href="signup.php">Click here to Sign up</a>
    </div>



</body>

</html>