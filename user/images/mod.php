<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Event's </title>
</head>
<body>
<a href="index.html">
<button style="color:darkblue;">HOME</button></a>

<a href="contact.php">
<button style="color:darkblue;">CONTACT US</button></a>
<a href="about.php">
<button style="color:darkblue;">ABOUT US</button></a>
<a href="reg.php">
<button align=right; style="color:darkblue; float:right;">register</button></a>
<a href="login.php">
<button align=right; style="color:darkblue; float:right;">login</button></a>

</br>
<h1> <b style="text-align:center;color:white;">URBAN EVENTS </b></h1>
</br>


<?php

$a=$_POST['t1'];
$b=$_POST['t2'];
$c=$_POST['t3'];
$d=$_POST['t4'];
$e=$_POST['t5'];
$f=$_POST['t6'];


$con=mysqli_connect('localhost','root');


mysqli_select_db($con,'event');

$h="insert into modify(Name, email, EventName, location, Date_time, no_of_tickets) values('$a','$b','$c','$d','$e','$f')";

mysqli_query($con,$h);

/*$d="update admin,even set admin.payment=no_of_tickets*even.price where even.price=(Select price from even where EventName='$z
mysqli_query($con,$d);*/
mysqli_close($con);
?>
<h1 align="middle" style="color:white"> Thank You! Your record is submitted.</h1>

<h1  align= "middle" style="color:white">Your data is modified.</h1>



<style>
body
{
background-image:url('black.jpg');background-repeat:no-repeat;background-size:cover;
}
</style>
</body>
</html>