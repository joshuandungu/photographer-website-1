<?php
include 'connection.php';
if(isset($GET['delete'])){
	$id = $_GET['delete'];
	mysqli_query($conn, DELETE FROM image where id = $id);
	header('location:fetch_image.php');
}; 
?>