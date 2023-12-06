<?php
require_once('includes/config.php');

// Define variables and set to empty
$firstnameErr = $lastnameErr = $emailErr = $usernameErr = $passwordErr = $genderErr = $phoneErr = $addressErr = "";
$firstname = $lastname = $email = $username = $password = $gender = $phone = $address = "";
$successful = $failed = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include('includes/config.php');

    // Collect user input
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    // Check if the user already exists
    $checkUserQuery = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $checkUserQuery);

    if ($result) {
        $num = mysqli_num_rows($result);

        if ($num > 0) {
            // User already exists
            $failed = "User with such email already exists";
        } else {
            // Insert the new user
            $insertUserQuery = "INSERT INTO users (firstname, lastname, email, username, password, gender, phone, address) VALUES ('$firstname', '$lastname', '$email', '$username', '$password', '$gender', '$phone', '$address')";
            $result = mysqli_query($conn, $insertUserQuery);

            if ($result) {
                // Registration successful
                $successful = "Registered successfully";
                header('location:login.php');
                exit();
            } else {
                // Registration failed
                die(mysqli_error($conn));
                $failed = "Registration failed";
            }
        }
    }
}
?>






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

    <section>
        <div class="container signup-form">
            <form method="POST" action="signup.php">
                <div class="form-group">
                    <label for="firstname">First Name</label>
                    <input type="text" class="form-control" id="firstname" name="firstname"
                         placeholder="Enter your first name e.g John" required>
                    <?php if (!empty($_POST['firstname'])) {
                        echo "<span class='error'>$firstnameErr</span>";
                    } ?>
                </div>
                <div class="form-group">
                    <label for="lastname">Last Name</label>
                    <input type="text" class="form-control" id="lastname" name="lastname"
                        placeholder="Enter your last name e.g Doe " required>
                    <?php if (!empty($_POST['lastname'])) {
                        echo "<span class='error'>$lastnameErr</span>";
                    } ?>
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" name="email"
                         placeholder="Enter your email e.g johndoe@gmail.com" required>
                    <?php if (!empty($_POST['email'])) {
                        echo "<span class='error'>$emailErr</span>";
                    } ?>
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username"
                         placeholder="Enter your username e.g john@123" required>
                    <?php if (!empty($_POST['username'])) {
                        echo "<span class='error'>$usernameErr</span>";
                    } ?>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password"
                         placeholder="Enter your password  e.g !@#*6xbx8bxh " required>
                    <?php if (!empty($_POST['password'])) {
                        echo "<span class='error'>$passwordErr</span>";
                    } ?>
                </div>
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <input type="radio" class="form-control" id="gender" name="gender" value="Male" required>
                    <input type="radio" class="form-control" id="gender" name="gender" value="Female" required>
                    <?php if (!empty($_POST['gender'])) {
                        echo "<span class='error'>$genderErr</span>";
                    } ?>
                </div>
                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="text" class="form-control" id="phone" name="phone"
                         placeholder="Enter your phone number  e.g +097 123 456 789  " required>
                    <?php if (!empty($_POST['phone'])) {
                        echo "<span class='error'>$phoneErr</span>";
                    } ?>
                </div>

                <div class="form-group">
                    <label for="address">City Address</label>
                    <input type="text" class="form-control" id="address" name="address"
                     placeholder="Enter your home/city  e.g  63733-73737,  NewYork , USA " required>
                    <?php if (!empty($_POST['address'])) {
                        echo "<span class='error'>$addressErr</span>";
                    } ?>
                </div>
                <button type="submit" class="btn btn-primary">Signup</button>
            </form>
        </div>
    </section>

    <?php include('includes/footer.php'); ?>
</body>

</html>
