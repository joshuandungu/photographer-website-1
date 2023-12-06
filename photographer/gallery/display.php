<?php
$conn = mysqli_connect("localhost","root","","photo");
$query="SELECT * FROM `gallery`";
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
    <link rel="style.css">

</head>
<body>
    <div>
    <center><h1>Create your profile</h1></center>
    <center><h3><a href="index.php">Upload and set your profile</a></h3></center>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    
                    <th>category</th>
                    <th>Image</th>
                    <th>Photographer Name</th>
                    <th>More Details</th>
                    
                    
                    
                    <th>Actions
                        <td><button><a href="update_image.php"> Update</a></button><td/>
                        <td><button><a href="delete_image.php"> Delete</a></button><td>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                while($fetch=mysqli_fetch_assoc($result)){
                    echo  "<tr>";
                    echo "<td>{$fetch['id']}</td>";
                    echo "<td>{$fetch['category']}</td>";
                    echo "<td><img src='images/{$fetch['image']}' width='200' height='200'></td>";
                    echo "<td>{$fetch['name']}</td>";
                    echo "<td>{$fetch['description']}</td>";
                    

                    

                    echo " </tr>";
                }
                 
                ?>
                
            </tbody>
        </table>
    </div>
    
</body>
</html>