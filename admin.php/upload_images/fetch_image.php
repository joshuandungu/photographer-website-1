<?php
$conn = mysqli_connect("localhost","root","","cart_db");
$query="SELECT * FROM `image`";
$result=mysqli_query($conn , $query);
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image list</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> 

</head>
<body>
    <div class="col-6 border m-2">
    <h3>Image list</h3>
        <table class="table table-bordered"> 
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Actions
                        <button><a href="update_image.php"> Update</a></button>
                        <button><a href="delete_image.php"> Delete</a></button>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                while($fetch=mysqli_fetch_assoc($result)){
                    echo  "<tr>";
                    echo "<td>{$fetch['id']}</td>";
                    echo "<td>{$fetch['title']}</td>";
                    echo "<td><img src='images/{$fetch['image']}' width='100'></td>";
                    echo " </tr>";
                }
                ?>
                
            </tbody>
        </table>
    </div>
    <a href="index.php">Upload image</a>
</body>
</html>