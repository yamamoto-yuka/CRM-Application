<?php


include("function.php");

$userObj = new Users();


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $userObj->Signup();
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
    <title>Signup Page</title>
</head>

<body>

    <div class="container">
        <header>
            <h2>CRM Application</h2>
        </header>

        <div class="section">
            <h1>Add your information</h1>
            <form method="post">

                <div class="form-group">
                    <label for="user_namee">User Name</label>
                    <input type="text" class="form-control" id="user_name" name="user_name" placeholder="User name">
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="text" class="form-control" id="password" name="password" placeholder="Password">
                </div>

                <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input type="text" class="form-control" id="first_nam" name="first_name" placeholder="First name">
                </div>

                <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last name">
                </div>

                <div class="form-group">
                    <label for="phone">Phone number</label>
                    <input type="tel" class="form-control" pattern="[\d\-]*" maxlength="9" id="phone" name="phone"
                        placeholder="Phone number">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                </div>

                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Address"><br>
                </div>


                <input type="submit" id="button" name="button" class="btn btn-danger" value="Signup"><br>
            </form>

            <a href="login.php">Click here to login</a>
        </div>
    </div>


</body>

</html>