<?php 
include'includes/connection.php';




if($_SERVER['REQUEST_METHOD']=='POST'){
     include 'includes/connection.php';
     $id = $_POST['edit_id'];
     $first_name = $_POST['first_name'];
     $last_name = $_POST['last_name'];
     $email = $_POST['email'];
     $username = $_POST['username'];
     $password = $_POST['password'];
     $confirm_password = $_POST['repeatpassword'];

          $query = "UPDATE admin SET first_name='$first_name',last_name='$last_name',email='$email',password='$password'";

          WHERE id = $id";
          $query_run = mysqli_query($con, $query);
         if($query_run)
           {
               echo "saved";
                $_SESSION['success'] = "Admin profile updated successfully";
                header('location: adminprofile.php');
            }

            else 
            {
                $_SESSION['status'] = "Admin profile failed to update";
                header('location: register_edit.php');
            }
    

    else 
        {
            $_SESSION['status'] = "password and confirm password does not match";
            header('location: register_edit.php');
        }


} 









?>   