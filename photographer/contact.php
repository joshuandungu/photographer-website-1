<?php include_once('header.php');?>

<?php include_once('header.php');?>
	<main>
		<section>
			<h2>Send a message</h2>
			<form action="contact.php"  method="POST">
				<label for="name">Name:</label>
				<input type="text" id="name" name="name" required>
				<label for="email">Email:</label>
				<input type="email" id="email" name="email" required>
				<label for="phone">Phone:</label>
				<input type="tel" id="phone" name="phone">
				<label for="message">Message:</label>
				<textarea id="message" name="message" required></textarea>
				<button type="submit">Send</button>
			</form>
		</section>
		<section>
			<h2>Contact Information</h2>
			<ul>
				<li>Phone: 555-555-5555</li>
				<li>Email: info@photographername.com</li>
				<li>Address: 123 Main Street, NANDI COUNTY</li>
			</ul>
			<ul class="social">
				<li><a href="#">Facebook</a></li>
				<li><a href="#">Instagram</a></li>
				<li><a href="#">Twitter</a></li>
			</ul>
		</section>
		<section>
			<h2>Location</h2>
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3021.767662165459!2d-73.98584168455116!3d40.74831497932865!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c259b3ec7f74bf%3A0xb1f9c5fa5b5a5a6f!2sEmpire%20State%20Building!5e0!3m2!1sen!2sus!4v1646826118547!5m2!1sen!2sus" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
		</section>
	</main>
<?php include_once('footer.php');?>

<?php
 session_start();
 error_reporting(0);
 include('connection.php');
 if (strlen($_SESSION['userid']==0)) {
   header('location:login.php');
   } else{}
   ?>


<?php
include ("connection.php");


$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$message=$_POST['message'];
$con=mysqli_connect('localhost','root');


mysqli_select_db($con,'photo');

$h="insert into contact(name,email,phone,message) values('$name','$email','$phone','$message')";

mysqli_query($con,$h);






mysqli_close($con);

?>








