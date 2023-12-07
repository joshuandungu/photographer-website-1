<?php include_once('header.php');?>

<?php include('connection.php');?>  <!-- include the page with php database connecton -->
<div class="main-content">
	<div class="wrapper">
		<h1>Add Admin</h1>
		<br><br> <br>



		<?php
		if(isset($_SESSION['add'])) /// checking whether the session is set or not
		{
			echo $_SESSION['add']; // Displaying session message
			unset($_SESSION['add']);  // removing session message
		}


		?>
		<br><br><br>


		<form action="" method="POST">
			<table class="tbl-30">
				<tr>
					
					<td> Full Name:</td>
					<td> <input type="text" name="full_name" plceholder="Enter your name"></td>

				</tr>
				<tr>
					
					<td> Username:</td>
					<td> <input type="text" name="username" plceholder="Enter username"></td>
					
				</tr>
				<tr>
					
					<td> Password:</td>
					<td> <input type="Password" name="password" plceholder="Enter your Password"></td>
					
				</tr>
				<tr> <td> <colspan="2"></td>
					<td><input type="submit" name="Submit" value="Add Admin" class="btn-secondary"></td>
				</td></tr>
			</table>



		</form>
	</div>
</div>








<?php include_once('footer.php');





// process the value is submitted and save it into the database
// check whether the submit button is clicked or not

if(isset($_POST['submit']))
{
// Get te data from form

	$full_name=$_POST['full_name'];
	$username=$_POST['username'];
	$password=md5($_POST['password']); // Password encryption with md5


	//sql query to save data to the database

	$sql="INSERT INTO admin(full_name,username, password) values('$full_name','$username','$password')";    
     


	mysqli_query($con, $sql);
	// Execute query and save data into the database
	


	$res=mysqli_query($con, $sql) or die(mysqli_error());
	// check whether the query is executed data is inserted  or not and display appropriate error message

	if($res==TRUE)
	{
		// Data inserted
		$_SESSION['add'] = "Admin Added successfullly";
		header("location:" .SETURL."index.php");
	}
	else
	{
		// Failed to insert data
		echo"Failed to insert data";
		$_SESSION['add'] = "Failed to add admin";
	}


	}
	?>
