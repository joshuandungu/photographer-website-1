<?php 
include'includes/connection.php';




if($_SERVER['REQUEST_METHOD']=='POST'){
     include 'includes/connection.php';
     $first_name = $_POST['first_name'];
	 $last_name = $_POST['last_name'];
	 $email = $_POST['email'];
	 $username = $_POST['username'];
	 $password = $_POST['password'];
	 $confirm_password = $_POST['repeatpassword'];
	

	if($password == $confirm_password)
	{




	      $query = "INSERT INTO admin(first_name, last_name, email,username,password) VALUES('$first_name','$last_name','$email','$username','$password')";
	      $query_run = mysqli_query($con, $query);
	     if($query_run)
	       {
		       echo "saved";
				$_SESSION['success'] = "Admin profile added";
				header('location: login.php');
			}

			else 
			{
				$_SESSION['status'] = "Admin profilie not added";
				header('location: register.php');
			}
	}

	else 
		{
			$_SESSION['status'] = "password and confirm password does not match";
			header('location: register.php');
		}


} 









?>   