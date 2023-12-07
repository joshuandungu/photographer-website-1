<?php
include 'index.php';
$conn = mysqli_connect("localhost","root","","photo");

                 
$name = $_POST['name']; 
$email = $_POST['email'];
$phone_number = $_POST['phone_number'];
$DOB = $_POST['DOB'];
$type = $_POST['type'];
$description = $_POST['description'];
$image  = $_FILES['image_upload'];              // get image from post data 
$image_name=$image['name'];                   // image name
$image_tmp_name=$image['tmp_name'];          // temp file path
$destination="images/".$image_name;       // Folder path Where Image saved
move_uploaded_file($image_tmp_name , $destination);   // this function are used to store the file in destination path 



 

$query="INSERT INTO  profile(image,name,email,phone_number,DOB,type,description) VALUES ('$image_name','$name','$email','$phone_number','$DOB','$type','$description') ";
$result=mysqli_query($conn , $query);
header('location:display.php');
?>