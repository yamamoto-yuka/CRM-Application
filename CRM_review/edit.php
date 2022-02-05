<?php

include('function.php');
$userObj = new Users();

if(isset($_GET['edit_id']) && !empty($_GET['edit_id'])){
    $editId = $_GET['edit_id'];
    echo "The edit id".$editId."<br>";
    $userRecord = $userObj->getRecordById($editId);
    echo var_dump($userRecord);
}else{
    echo "We don't have edit id";
}


if(isset($_POST['update'])){
    echo "Please update";
    $data = $userObj->update($_POST['update']);
    echo $data;
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

    <title>Edit page</title>
</head>
<div class="container">
    <header>
        <h2>CRM Application</h2>
    </header>

    <div class="section">
        <h1>Edit student your contact record </h1>
        <form action="edit.php" method="POST">

            <div class="form-group">
                <label for="business_name">Business Name</label>
                <input type="text" class="form-control" name="business_name" id="business_name"
                    value="<?php echo $userRecord['business_name'] ?>" aria-describedby="business_name"
                    placeholder="Enter Business Name">
            </div>


            <div class="form-group">
                <label for="contact_name">Contact Name</label>
                <input type="text" class="form-control" name="contact_name" id="contact_name"
                    aria-describedby="contact_name" value="<?php echo $userRecord['contact_name'] ?>"
                    placeholder="Enter Contact Name">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" name="email" id="email" aria-describedby="email"
                    value="<?php echo $userRecord['email'] ?>" placeholder="Enter Email">
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="tel" class="form-control" name="phone" id="phone" aria-describedby="phone"
                    value="<?php echo $userRecord['phone'] ?>" placeholder="Enter Phone">
            </div>
            <div class="form-group">
                <label for="inquiry">Inquiry</label>
                <input type="text" class="form-control" name="inquiry" id="inquiry" aria-describedby="inquiry "
                    value="<?php echo $userRecord['inquiry'] ?>" placeholder="Enter Inquiry">
            </div>
            <div class="form-group">
                <label for="product">Product</label>
                <input type="text" class="form-control" name="product" id="product" aria-describedby="product"
                    value="<?php echo $userRecord['product'] ?>" placeholder="Enter Product">
            </div>

            <input type="hidden" name="id" value="<?php echo $userRecord['id']?>">

            <input type="submit" style="margin:20px;" name="update" value="Updata Record" class="btn btn-danger">


        </form>
    </div>
</div>


<body>

</body>

</html>