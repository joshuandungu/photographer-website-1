<?php
include 'connect.php';
include 'createdb.php';

if(isset($_POST['submit'])) {
    if (!empty($_POST['id']) && !empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['mobile']) && !empty($_POST['password'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $password = $_POST['password'];

        $query = "insert into employee(id,name,email,mobile,password) values ('$id','$name','$email','$mobile','$password')";
        $run = mysqli_query($conn,$query) or die("Failed to connect with MySQL: ". mysqli_connect_error());

        if ($run) {
            // echo '<script type="text/javascript"> alert("Form submitted successfully") </script>';
            header('location:display.php');
        } else {
            echo '<script type="text/javascript"> alert("Form submission failed") </script>';
        }
    }
    else {
        echo '<script type="text/javascript"> alert("all fields required") </script>';

    }
}
?>




<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>create, read, update and delete opearation</title>
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
    <form method="POST">
  <div class="mb-3">
    <label>ID Number</label> <br>
    <input type="text" class="form-control" placeholder="Enter your ID" name="id" autocomplete="off">
  </div>
  <div class="mb-3">
    <label>Name</label> <br>
    <input type="text" class="form-control" placeholder="Enter your name" name="name" autocomplete="off">
  </div>
  <div class="mb-3">
    <label>Email</label> <br>
    <input type="email" class="form-control" placeholder="e.g example@gmail.com" name="email" autocomplete="off">
  </div>
  <div class="mb-3">
    <label>Mobile</label> <br>
    <input type="text" class="form-control" placeholder="e.g 0748223540" name="mobile" autocomplete="off">
  </div>
  <div class="mb-3">
    <label>Password</label> <br>
    <input type="password" class="form-control" placeholder="Enter your password" name="password" autocomplete="off">
  </div>
  
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>
    </div>
    <script src="js/bootstrap.bundle.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>

