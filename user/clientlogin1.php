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
                    <li><a href="clientlogin1.php">Home</a></li>
                    <li><a href="clientlogin1.php">Photographer profile</a></li>
                    <li><a href="clientlogin1.php">Gallery/ Recent works</a></li>
                    <li><a href="clientlogin1.php">Portfolio</a></li>
          <li><a href="clientlogin1.php">Contact</a></li>
          <li><a href="logout.php">Logout</a></li> 
                      
                </ul>
            </nav>
        </header>




<?php
$login=0;
$invalid=0;

if($_SERVER['REQUEST_METHOD']=='POST'){
     include 'connection.php';
     $username=$_POST['username'];
     $password=$_POST['password'];



     $sql="select * from client where username='$username' and password='$password'";
     $result=mysqli_query($con,$sql);
     if($result){
        $num=mysqli_num_rows($result);
        if($num>0){
            $login=1;
            session_start();
            $_SESSION['username']=$username;
            header('location:index.php');

        }
        else{
          $invalid=1;
          header('location:clientlogin1.php');


        }
        
        
     }

    
}

?>






<?php 

if($invalid){
    echo'<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong> <center> Oh no sorry</strong> invalid credentials</center> <button type="button"  class="close" data_dismiss="alert" aria-label="close">
    <span aria-hidden="true"></span>
    </button
    </div>';
     }
    ?>

<?php 

if($login){
    echo'<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>You have successfully logged in </strong>  <button type="button"  class="close" data_dismiss="alert" aria-label="close">
    <span aria-hidden="true"></span>
    </button
    </div>';}

?>

    
    <h1 align-items="center"> Login  as a Client  </h1>
                      

                      
                      
           <align-items-right>
           <!-- Login Form -->
           <div class="form-container">
             <form class="form" action="clientlogin1.php" method="POST">
               <h2>Login</h2>
               
               <div class="form-group">
                <input type="text" name="username" placeholder="username" required>
              </div>
               <div class="form-group">
                 <input type="password" name="password" placeholder="Password" required>
               </div>
               <button type="submit">Login</button>
               <div class="form-footer">
                 <span>I dont  have an account?</span>
                 <a href="clientsignup1.php">Signup</a>
               </div>
               </form>
              </td>
              </tr>
            </table>
          </align-items-right>
                        </div>

                        
                                  <?php include_once('footer.php');?>

                                  



  