

<?php
require_once('includes/config.php');

// Define variables and set to empty
$firstnameErr = $lastnameErr = $emailErr = $usernameErr = $passwordErr = $genderErr = $phoneErr = $addressErr = "";
$firstname = $lastname = $email = $username = $password = $gender = $phone = $address = "";
$successful = $failed = "";

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Validate and sanitize input
    if (empty($_POST["firstname"])) {
        $firstnameErr = "Please enter a valid name";
    } else {
        $firstname = test_input($_POST["firstname"]);
        if (!preg_match("/^[a-zA-Z-']*$/", $firstname)) {
            $firstnameErr = "Only letters and white spaces allowed";
        }
    }

    if (empty($_POST["lastname"])) {
        $lastnameErr = "Please enter a valid name";
    } else {
        $lastname = test_input($_POST["lastname"]);
        if (!preg_match("/^[a-zA-Z-']*$/", $lastname)) {
            $lastnameErr = "Only letters and white spaces allowed";
        }
    }

    if (empty($_POST["email"])) {
        $emailErr = "Please enter a valid email address";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "The email address is incorrect";
        }
    }

    if (empty($_POST["username"])) {
        $usernameErr = "Please enter a username";
    } else {
        $username = test_input($_POST["username"]);
        if (!preg_match("/^[a-zA-Z-']*$/", $username)) {
            $usernameErr = "Only letters and white spaces allowed";
        }
    }

    if (empty($_POST["password"])) {
        $passwordErr = "Please enter a valid password";
    } else {
        $password = test_input($_POST["password"]);
        $hashedpwd = password_hash($password, PASSWORD_BCRYPT);
    }

    if (empty($_POST["gender"])) {
        $genderErr = "Please select gender";
    } else {
        $gender = test_input($_POST["gender"]);
    }

    if (empty($_POST["phone"])) {
        $phoneErr = "Please enter a valid phone number";
    } else {
        $phone = test_input($_POST["phone"]);
        $pattern = "/^\d{10}$/";  // Assuming a 10-digit phone number without dashes or spaces

        // Check if the phone number matches the pattern
        if (!preg_match($pattern, $phone)) {
            $phoneErr = "Please enter a valid telephone/phone number";
        }
    }

    if (empty($_POST["address"])) {
        $addressErr = "Please enter a valid address";
    } else {
        $address = test_input($_POST['address']);
    }

    // Check if user with the same credentials already exists
    $query = mysqli_query($conn, "SELECT * FROM users WHERE firstname = '$firstname' || lastname = '$lastname' && email = '$email'");
    $ret = mysqli_fetch_array($query);

    if ($ret > 0) {
        $failed = "User with the same credentials already exists";
    } else {
        // Insert user into the database
        $sql = mysqli_query($conn, "INSERT INTO users(firstname, lastname, email, username, password, gender, phone, address) VALUES ('$firstname','$lastname','$email','$username','$hashedpwd','$gender','$phone','$address')");

        if ($sql == TRUE) {
            $successful = "Registered successfully";
            header('location:login.php?signup=success');
            exit();
        } else {
            $failed = "Failed to register, please try again";
        }
    }
}

// Function to sanitize and validate input

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
            <form method="POST" action="">
                <div class="form-group">
                    <label for="firstname">First Name</label>
                    <input type="text" class="form-control" id="firstname" name="firstname"
                        value="<?php if (isset($_POST['firstname'])) {
                            echo $_POST['firstname'];
                        } ?>" placeholder="Enter your first name e.g John" required>
                    <?php if (!empty($_POST['firstname'])) {
                        echo "<span class='error'>$firstnameErr</span>";
                    } ?>
                </div>
                <div class="form-group">
                    <label for="lastname">Last Name</label>
                    <input type="text" class="form-control" id="lastname" name="lastname"
                        value="<?php if (isset($_POST['lastname'])) {
                            echo $_POST['lastname'];
                        } ?>" placeholder="Enter your last name e.g Doe " required>
                    <?php if (!empty($_POST['lastname'])) {
                        echo "<span class='error'>$lastnameErr</span>";
                    } ?>
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" name="email"
                        value="<?php if (isset($_POST['email'])) {
                            echo $_POST['email'];
                        } ?>" placeholder="Enter your email e.g johndoe@gmail.com" required>
                    <?php if (!empty($_POST['email'])) {
                        echo "<span class='error'>$emailErr</span>";
                    } ?>
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username"
                        value="<?php if (isset($_POST['username'])) {
                            echo $_POST['username'];
                        } ?>" placeholder="Enter your username e.g john@123" required>
                    <?php if (!empty($_POST['username'])) {
                        echo "<span class='error'>$usernameErr</span>";
                    } ?>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password"
                        value="<?php if (isset($_POST['password'])) {
                            echo $_POST['password'];
                        } ?> " placeholder="Enter your password  e.g !@#*6xbx8bxh " required>
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
                        value="<?php if (isset($_POST['phone'])) {
                            echo $_POST['phone'];
                        } ?> " placeholder="Enter your phone number  e.g +097 123 456 789  " required>
                    <?php if (!empty($_POST['phone'])) {
                        echo "<span class='error'>$phoneErr</span>";
                    } ?>
                </div>

                <div class="form-group">
                    <label for="address">City Address</label>
                    <input type="text" class="form-control" id="address" name="address"
                        value="<?php if (isset($_POST['address'])) {
                            echo $_POST['address'];
                        } ?> " placeholder="Enter your home/city  e.g  63733-73737,  NewYork , USA " required>
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

