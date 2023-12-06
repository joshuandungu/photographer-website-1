<?php  
session_start();
if(!isset($_SESSION['username'])){
  header('login.php');

}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Photographer Portfolio</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">  
</head>
<body>
    <header>
        <nav>
            <ul>
              <p><img src="images/logo.png "  width="50px"  height="50px"> See ur Logo</p>
                <li><a href="index.php">Home</a></li>
                <li><a href="profile.php">Photographer profile</a></li>
                <li><a href="portfolio.php">Portfolio</a></li>


                  <div class="dropdown">  
                  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Dropdown Example  
                  <span class="caret"></span></button>  
                 <ul class="dropdown-menu">  
                 <li><a href="nandicountyphotographers.php">Nandi Photographers</a></li>  
                 <li><a href="nakurucountyphotographers.php"> Nakuru Photographers</a></li>  
                 <li><a href="#">More Regions</a></li> 
                 <li><a href="bookinghistory.php">Booking History</a></li> 
                <li><a href="contact1.php">Contact</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>