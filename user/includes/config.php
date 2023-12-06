<?php 
$servername = 'localhost';
$username = 'root';
$password = '';
$db_name = 'photo';

$conn =  mysqli_connect($servername, $username, $password, $db_name);
if(!$conn){
    die ("Failed to connect to the database" .mysqli_connect_error($conn));
}
?>