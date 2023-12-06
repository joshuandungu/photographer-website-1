<?php

$server = "localhost";
$username = "root";
$password = "";
$dbname = "employeesRecords";

//create connection
$conn = new mysqli($server,$username,$password);

//check connection
if (!$conn) {
    die("Connection Failed".mysqli_connect_error());
}

$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
$result = mysqli_query($conn,$sql);

if($result) {
    // echo '<script type="text/javascript"> alert("Database employeesRecords Created Successfully...!") </script>';
$conn = new mysqli($server,$username,$password,$dbname);

$sql = "
CREATE TABLE IF NOT EXISTS employee (
    id VARCHAR(40) NOT NULL PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    mobile VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL
    
);
";

if (mysqli_query($conn,$sql)) {
    return $conn;
    // echo '<script type="text/javascript"> alert("Table employee Created Successfully...!") </script>';
} else {
    echo "Cannot Create table...!";
}

} else {
    echo "Error while creating database".mysqli_error($conn);
}
?>