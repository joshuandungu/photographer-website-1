  <?php
require_once('includes/config.php');

$emailErr = $passwordErr = "";
$success = $failed = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        $failed = "Empty field, please fill in all the fields";
    } else {
        $valid_email = filter_var($email, FILTER_VALIDATE_EMAIL);

        if (!$valid_email) {
            $emailErr  = "Please enter a valid email";
        } else {
            $sql = "SELECT * FROM users WHERE email='$valid_email' AND password='$password'";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                $num = mysqli_num_rows($result);

                if ($num > 0) {
                    // echo "<script>alert('Logged in Successfully');</script>";
                    $success ="Logged in successfully";
                    session_start();
            $_SESSION['userid'] = $email;
            header('location:index.php');
                    exit();
                } else {
                    // echo "<script>alert('Invalid email or password. Please try again.');</script>";
                    $failed = "Inavlid email or password";
                    header('location:login.php');
                    exit();
                }
            } else {
                // echo "<script>alert('Something Went Wrong. Please try again.');</script>";
                $failed = "Something went wrong, please try gain";
                header('location:login.php');
                exit();
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
    <title>Photographer Login</title>
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

        .login-form {
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
            font-weight: bold;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 20px;
        }
    </style>
</head>

<body>

   
    <?php include ('includes/header.php');?>


    <section>
        <div class="container login-form">
        <?php
    if (!empty($success)) {
        echo "<p style='color: green;'>$success</p>";
    }
    if (!empty($failed)) {
        echo "<p style='color: red;'>$failed</p>";
    }
    ?>
            <form action ="login.php" method="POST">
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" name= "email" aria-describedby="emailHelp"
                        placeholder="Enter email e.g johndoe$gmail.com"  required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password e.g !#$%^&hgU99"  required>
                </div>
                <button type="submit" value="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </section>

    <?php include ('includes/footer.php');?>