<?php
    $success = false;
    $error = false;

   if($_SERVER["REQUEST_METHOD"] == "POST"){

    require "Partials/db-connect.php";
    
    

    $username = $_POST["name"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    $exists = false;
    $existSql = "SELECT * FROM `practice` WHERE name = '$username'";
    $result = mysqli_query($conn,$existSql);
    $numExistRows = mysqli_num_rows($result);
    if($numExistRows > 0){
      $error = "Username Already Taken";
    }else{

    if(($password == $cpassword) && $exists == false){
       $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO `practice` (`Name`, `password`, `dt`)
         VALUES ('$username', '$hash', current_timestamp());";
        $result = mysqli_query($conn,$sql);
        //if($result){
           $success = true;
           header("location: Log-in.php");
        //}
        
    }
    else{
      $error = "Passwords do not match";
  }
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
    <?php require 'Partials/Nav.php'?>

   <?php
        if($success){
        echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Account Created.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        }

if($error){
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error!</strong> '.$error.' .
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';

}

?> 
    <form action="/MyLogin/Sign-Up.php" class="mx-5 px-5 " method="post">
      <H1 class="text-center">Sign-up to our Website</H1>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Name</label>
    <input type="name" class="form-control" id="name" aria-describedby="name" name="name">
    
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>
  <div class="mb-3">
    <label for="cpassword" class="form-label">Confirm Password</label>
    <input type="password" class="form-control" id="cpassword" name="cpassword">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>



 
 
 
 
 
 
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js">
    
 </script>   
</body>
</html>