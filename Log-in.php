<?php


$error =false;
$login = false;
if($_SERVER["REQUEST_METHOD"] == "POST" ){


    require "Partials/db-connect.php";
    $username = $_POST["name"];
    $password = $_POST["password"];

    $sql = "Select * from practice where Name='$username'";
    $result = mysqli_query($conn,$sql);
    $num = mysqli_num_rows($result);
    if($num == 1){
    while($row = mysqli_fetch_assoc($result)){
        if(password_verify($password,$row['password'])){
            $login = true;
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['Name'] = $username;
            header("location: Home.php");
        }
        else{
            $error = "Invalid credentials";
        }
    }
    
}else if($num == 0){
    $error = "Data not filled Correctly";
}




}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <?php require "Partials/Nav.php"?>
    <?php
if($login){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Congratulation!</strong> You are logged in .
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
}

if($error){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Failed!</strong> '.$error.'.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
}
?>


    <form action="/MyLogin/Log-in.php" class="mx-5 px-5 " method="post">
        <H1 class="text-center">Log-in page</H1>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Name</label>
    <input type="name" class="form-control" id="name" aria-describedby="name" name="name">
    
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>