<?php
require_once('includes/config.php');

$success = $failed = "";
$firstname = $lastname = $email = $username = $gender = $address = $photographer = $package = "";
$image_name = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Assign values from the form
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $photographer = $_POST['photographer'];
    $package = $_POST['package'];

    // Handle image upload
    if (isset($_FILES['image_name'])) {
        $image = $_FILES['image_name'];
        $image_name = $image['name'];
        // Move uploaded image to the desired directory
        move_uploaded_file($image['tmp_name'], 'images/' . $image_name);
    }

    // Check if email already exists
    $check_email_query = "SELECT * FROM photographer WHERE email = '$email'";
    $check_email_result = mysqli_query($conn, $check_email_query);

    if (mysqli_num_rows($check_email_result) > 0) {
        $failed = "Email is already associated with another account. Please use a different email.";
    } else {
        // Insert data into the database
        $insert_query = "INSERT INTO photographer (firstname, lastname, email, username, gender, phone, address, photographer, package, image_name) 
                         VALUES ('$firstname', '$lastname', '$email', '$username', '$gender', '$phone', '$address', '$photographer', '$package', '$image_name')";

        $result = mysqli_query($conn, $insert_query);

        if ($result) {
            $success = "Photographer account created successfully.";
        } else {
            $failed = "Failed to create a photographer account. Please try again.";
        }
    }
}
?>

<!-- HTML form goes here -->



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photographer Signup</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Add your custom styles here -->
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }

        header {
            background-color: #343a40;
            color: #ffffff;
            padding: 80px 0;
            text-align: center;
        }

        h1 {
            font-size: 3em;
            margin-bottom: 20px;
        }

        section {
            padding: 40px 0;
            text-align: center;
        }

        .signup-form {
            max-width: 400px;
            margin: 0 auto;
        }

        .form-group {
            margin-bottom: 20px;
        }

        footer {
            background-color: #343a40;
            color: #ffffff;
            padding: 20px 0;
            text-align: center;
        }

        .error {
            color: red;
        }
    </style>
</head>

<body>
    <header><?php include('includes/header.php'); ?></header>
<?php 
if(isset($_SESSION['userid'])){
    $user = $_SESSION['userid'];
     $query = mysqli_query($conn, "SELECT * FROM users WHERE email = '$user'");
     while($row=mysqli_fetch_assoc($query)){
        ?>

<section>
        <div class="container signup-form">
            <form method="POST" action="">
                <div class="form-group">
                    <label for="firstname">First Name</label>
                    <input type="text" class="form-control" id="firstname" name="firstname"
                        value="<?php echo $row['firstname'];?>" placeholder="Enter your first name e.g John" required>
                    
                </div>
                <div class="form-group">
                    <label for="lastname">Last Name</label>
                    <input type="text" class="form-control" id="lastname" name="lastname"
                    value="<?php echo $row['lastname'];?>" placeholder="Enter your last name e.g Doe " required>
                    
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" name="email"
                    value="<?php echo $row['email'];?>" placeholder="Enter your email e.g johndoe@gmail.com" required>
                    
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username"
                    value="<?php echo $row['username'];?>" placeholder="Enter your username e.g john@123" required>
                    
                </div>
                
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <input type="radio" class="form-control" id="gender" name="gender" value="<?php echo $row['gender'];?>" required>
                    <input type="radio" class="form-control" id="gender" name="gender" value="<?php echo $row['gender'];?>" required>
                    
                </div>
                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="text" class="form-control" id="phone" name="phone"
                        value="<?php echo $row['phone'];?> " placeholder="Enter your phone number  e.g +097 123 456 789  " required>
                    
                </div>

                <div class="form-group">
                    <label for="address">City Address</label>
                    <input type="text" class="form-control" id="address" name="address"
                       value="<?php echo $row['address'];?>" placeholder="Enter your home/city  e.g  63733-73737,  NewYork , USA " required>
                   
                </div>
                <div class="form-group">
                    <label for="address">Photographer Category</label>
                    <select type="photographer">
                        <option>Wedding </option>
                        <option>Parties/Events </option>
                        <option>Music Festivals </option>
                        <option>Sports </option>
                        <option>Hiking events </option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="address">Package</label>
                    <input type="number" class="form-control" id="address" name="package"  value="1" min="1" max="50000" placeholder="Choose a pricing package">
                </div>
                <div class="form-group">
                    <label for="image">Image Account</label>
                    <input type="file" class="form-control" id="address" name="image_name"    placeholder="Choose an image">
                </div>

                <button type="submit" class="btn btn-primary">Create Account</button>
            </form>
        </div>
    </section>
     <?php }}?>


    

    <?php include('includes/footer.php'); ?>
</body>

</html>

