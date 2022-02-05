<?php

session_start();

include("function.php");
$index_user = new Users();
$index_user->check_login();




?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index page</title>
</head>

<body>
    <h2>CRM Application</h2>

    <a href="logout.php">Log Out</a>


</body>

</html>