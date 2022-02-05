<?php

session_start();

include("function.php");

$userObj = new Users();

$date = $userObj->viewData();

if (isset(($_POST['submit']))) {
    $userObj->add();
}

if(isset($_GET['del_id']) && !empty($_GET['del_id'])){
    $delId = $_GET['del_id'];
    $userObj->delete($delId);
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
    <title>contact page</title>
</head>

<body>
    <div class="container">
        <header>
            <h2>CRM Application</h2>
        </header>

        <div class="section">
            <h1>Add your contact records</h1>
            <form action="contact.php" method="POST">
                <div class="form-group">
                    <label for="business_name">Business Name</label>
                    <input type="text" class="form-control" name="business_name" id="business_name"
                        aria-describedby="business_name" placeholder="Enter your business name">

                </div>
                <div class="form-group">
                    <label for="contact_name">Contact Name</label>
                    <input type="text" class="form-control" name="contact_name" id="contact_name"
                        aria-describedby="contact_name" placeholder="Enter your contact name">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email" id="email" aria-describedby="email"
                        placeholder="Enter your email">
                </div>
                <div class="form-group">
                    <label for="email">Phone</label>
                    <input type="tel" class="form-control" name="phone" id="phone" aria-describedby="phone"
                        placeholder="Enter you phone">
                </div>

                <div class="form-group">
                    <label for="inquiry">Inquiry</label>
                    <input type="text" class="form-control" name="inquiry" id="inquiry" aria-describedby="inquiry"
                        placeholder="Enter your inquiry">
                </div>
                <div class="form-group">
                    <label for="product">Product</label>
                    <input type="text" class="form-control" name="product" id="product" aria-describedby="product"
                        placeholder="Enter the product">
                </div>

                <input type="submit" style="margin:20px;" name="submit" value="Add Record" class="btn btn-danger">


            </form>
        </div>


        <main>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Serial # </th>
                        <th scope="col">Business Name</th>
                        <th scope="col">Contact Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Inquiry</th>
                        <th scope="col">Product</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($date as $user) {

                    ?>
                    <tr>
                        <th scope="row"><?php echo $user['id'] ?></th>
                        <td><?php echo $user['business_name'] ?></td>
                        <td><?php echo $user['contact_name'] ?></td>
                        <td><?php echo $user['email'] ?></td>
                        <td><?php echo $user['phone'] ?></td>
                        <td><?php echo $user['inquiry'] ?></td>
                        <td><?php echo $user['product'] ?></td>
                        <td><a href="edit.php?edit_id=<?php echo $user['id']; ?>"><i class="fas fa-edit"> </i></a>
                            <a href="contact.php?del_id=<?php echo $user['id']; ?>"><i class="fas fa-trash"></i></a>
                        </td>

                    </tr>
                    <?php } ?>
                </tbody>

            </table>

            <a href="logout.php">Log out</a>


        </main>
    </div>
</body>

</html>