<?php
$success=0;
$user=0;

if($_SERVER['REQUEST_METHOD']=='POST'){
     include 'connection.php';
     $name=$_POST['name'];
     $email=$_POST['email'];
     $username=$_POST['username'];
     $password=$_POST['password'];


     $sql="select * from client where email='$email' and password='$password'";
     $result=mysqli_query($con,$sql);
     if($result){
        $num=mysqli_num_rows($result);
        if($num>0){
            // echo"User already exist";
            $user=1;


        }
        else {
     $sql="insert into client(name,email,username,password) values('$name','$email','$username','$password')";
     $result=mysqli_query($con, $sql);
     if($result){
        // 
        $success=1;
        header('location:clientlogin1.php');
     }
     else{
        die(mysqli_error($con));
     }

        }
     }

    
}
?>











<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Booking Website</title>
        <link rel="stylesheet" href="style.css">
        <link rel="https://fonts.googleapis.com/css?family=Cantarell:italic|Droid+Serif:bold">
        <link rel="https://fonts.googleapis.com/css?family=Cantarell:i|Droid+Serif:b">
        <link rel="https://fonts.googleapis.com/css?family=Cantarell:i|Droid+Serif:700">
    </head>
    <body>
        <header>
            <h1>Booking Website</h1>
            <nav>
                <ul>
          <p><img src="images/logo.png "  width="50px"  height="50px"> See ourLogo</p>
                    <li><a href="clientsignup1.php">Home</a></li>
                    <li><a href="clientsignup1.php">Photographer profile</a></li>
                    <li><a href="clientsignup1.php">Gallery/ Recent works</a></li>
                    <li><a href="clientsignup1.php">Portfolio</a></li>
          <li><a href="clientsignup1.php">Contact</a></li>
          <li><a href="logout.php">Logout</a></li> 
                      
                </ul>
            </nav>
        </header>




<?php 

if($user){
    echo'<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong> Oh no sorry</strong> User already exist <button type="button"  class="close" data_dismiss="alert" aria-label="close">
    <span aria-hidden="true"></span>
    </button
    </div>';
} 
?>

<?php 

if($success){
    echo'<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>You have successfully signed up</strong>  <button type="button"  class="close" data_dismiss="alert" aria-label="close">
    <span aria-hidden="true">$times;</span>
    </button
    </div>';
} 
?>



    <h1 align-items="center"> signup as a Client  </h1>
                      

                      
                      
           <align-items-right>
           <!-- Signup Form -->
           <div class="form-container">
             <form class="form" action="clientsignup1.php" method="POST">
               <h2>Sign Up</h2>
               <div class="form-group">
                 <input type="text" name="name" placeholder="Name" required>
               </div>
               
               <div class="form-group">
                 <input type="email" name="email" placeholder="Email" required>
               </div>
               <div class="form-group">
                <input type="text" name="username" placeholder="username" required>
              </div>
               <div class="form-group">
                 <input type="password" name="password" placeholder="Password" required>
               </div>
               <button type="submit">Sign Up</button>
               <div class="form-footer">
                 <span>Already have an account?</span>
                 <a href="clientlogin1.php">Login</a>
               </div>
               </form>
              </td>
              </tr>
            </table>
          </align-items-right>
                        </div>

                        
                             <?php include_once('footer.php');?>

                             