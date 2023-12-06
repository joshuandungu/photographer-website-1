<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbname = "cart_db";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpassword,$dbname))
{
    die("Failed to connect to database:");
}
// Set character encoding to UTF-8
mysqli_set_charset($con, 'utf8');
?>
