<?php
$conn = mysqli_connect("localhost","root","","cart_db");

$title = $_POST['image_title'];                  // image title
$image  = $_FILES['image_upload'];              // get image from post data 
$image_name=$image['name'];                   // image name
$image_tmp_name=$image['tmp_name'];          // temp file path
$destination="images/".$image_name;       // Folder path Where Image saved
move_uploaded_file($image_tmp_name , $destination);   // this function are used to store the file in destination path 
$query="INSERT INTO `image`( `title` , `image`) VALUES ( '{$title}' , '{$image_name}') ";
$result=mysqli_query($conn , $query);
header('location:fetch_image.php');
?>