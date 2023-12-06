<?php
$login=0;
$invalid=0;

if($_SERVER['REQUEST_METHOD']=='POST'){
     include 'includes/connection.php';
     $username=$_POST['username'];
     $password=$_POST['password'];



     $sql="select * from admin where username='$username' and password='$password'";
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
          header('location:login.php');


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








