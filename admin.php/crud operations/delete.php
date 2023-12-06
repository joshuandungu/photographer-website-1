<?php
include 'connect.php';
include 'createdb.php';

if(isset($_GET['deleteid'])) {
    $id=$_GET['deleteid'];

    $sql= "delete from `employee` where id='$id'";
    $result = mysqli_query($conn,$sql);

    if ($result) {
        header('location:display.php');
        // echo '<script type="text/javascript"> alert("Data deleted successfully") </script>';
    } else {
        echo '<script type="text/javascript"> alert("Deletion failed") </script>';
    }

}
?>