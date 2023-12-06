<?php
include 'index.php';
$conn = mysqli_connect("localhost","root","","photo");

                 

$category = $_POST['category'];
$image  = $_FILES['image_upload'];              // get image from post data 
$image_name=$image['name'];                   // image name
$image_tmp_name=$image['tmp_name'];          // temp file path
$destination="images/".$image_name;       // Folder path Where Image saved
move_uploaded_file($image_tmp_name , $destination);   // this function are used to store the file in destination path 
$name = $_POST['name'];
$description = $_POST['description'];



 

$query="INSERT INTO  gallery(category,image, name, description) VALUES ('$category','$image_name','$name','$description') ";
$result=mysqli_query($conn, $query);
header('location:display.php');
?>