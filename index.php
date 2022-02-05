<?php

// Start session processing 
session_start();
// Read function.php 
include("function.php");
// Call the Users class of function that conects to MySQL
$userObj = new Users();
// Put the object into this function
$userObj->check_login();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRM</title>
</head>

<body>
    <h2>Index page</h2>
    <a href="Logout.php">Log Out</a>

</body>

</html>