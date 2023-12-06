<?php
    include 'connect.php';
    include 'createdb.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>display create, read, update and delete opearation</title>
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
    <div class="container table-responsive-md">
        <button class="btn btn-primary my-5"> <a href="insert.php" class="text-light">Insert Employee</a> </button>
        <table class="table table-bordered table-hover table-striped">
  <thead>
    <tr class="table-danger">
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Mobile</th>
      <th scope="col">Password</th>
      <th scope="col">Operations</th>
    </tr>
  </thead>
  <tbody>

  <?php
  $sql = "Select * from `employee`";
  $result= mysqli_query($conn,$sql);

  if($result){
    while($row=mysqli_fetch_assoc($result)) {
        $id = $row['id']; 
        $name = $row['name'];
        $email = $row['email'];
        $mobile = $row['mobile'];
        $password = $row['password'];
        echo '
        <tr>
        <th scope="row">'.$id.'</th>
        <td>'.$name.'</td>
        <td>'.$email.'</td>
        <td>'.$mobile.'</td>
        <td>'.$password.'</td>
        <td>
        <button class="btn btn-primary"><a href="update.php?updateid='.$id.'" class="text-light">Update</a></button>
        <button class="btn btn-danger"><a href="delete.php?deleteid='.$id.'" class="text-light">Delete</a></button>
        </td>
      </tr>
            '
            ;
    }
  }
  ?> 
  </tbody> 
</table>
    </div>
<script src="js/bootstrap.bundle.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>

