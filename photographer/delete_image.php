<?php
include 'connection.php';
if(isset($GET['delete'])){
	$id = $_GET['delete'];
	$sql = mysqli_query($conn, "DELETE FROM  image where id = $id");
	if($sql){
		echo "<script>alert('Image Deleted successfully');</script>";
	}
	header('location:fetch_image.php');
}; 
?>