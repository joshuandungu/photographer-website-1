<?php
require_once('includes/config.php');

// Check if the user is logged in
if (isset($_SESSION['userid'])) {
    $photographerId = $_SESSION['userid'];

    // Fetch photographer details
    $query = mysqli_query($conn, "SELECT * FROM photographer WHERE id = '$photographerId'");
    $row = mysqli_fetch_assoc($query);

    // Handle form submission for updating details
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Collect updated information from the form
        $updatedFirstname = mysqli_real_escape_string($conn, $_POST['firstname']);
        $updatedLastname = mysqli_real_escape_string($conn, $_POST['lastname']);
        $updatedEmail = mysqli_real_escape_string($conn, $_POST['email']);
        $updatedUsername = mysqli_real_escape_string($conn, $_POST['username']);
        $updatedGender = mysqli_real_escape_string($conn, $_POST['gender']);
        $updatedPhone = mysqli_real_escape_string($conn, $_POST['phone']);
        $updatedAddress = mysqli_real_escape_string($conn, $_POST['address']);
        $updatedPhotographer = mysqli_real_escape_string($conn, $_POST['photographer']);
        $updatedPackage = mysqli_real_escape_string($conn, $_POST['package']);

        // File upload handling
        $image = $_FILES['image_upload'];
        $image_name = $image['name'];
        $image_tmp_name = $image['tmp_name'];
        $destination = "images/" . $image_name;
        move_uploaded_file($image_tmp_name, $destination);

        // Update the details in the database
        $updateQuery = "UPDATE photographer SET 
                        firstname = '$updatedFirstname', 
                        lastname = '$updatedLastname', 
                        email = '$updatedEmail', 
                        username = '$updatedUsername', 
                        gender = '$updatedGender', 
                        phone = '$updatedPhone', 
                        address = '$updatedAddress', 
                        photographer = '$updatedPhotographer', 
                        package = '$updatedPackage', 
                        image_name = '$image_name'
                        WHERE id = '$photographerId'";

        $updateResult = mysqli_query($conn, $updateQuery);

        if ($updateResult) {
            echo "<script>alert('Photographer account updated successfully');</script>";
            // Refresh the page to reflect the updated details
            header("Location: login.php");
            exit();
        } else {
            $updateError = "Failed to update details. Please try again.";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photographer Account</title>
    <!-- Add your styles and links to Bootstrap or other CSS frameworks -->
</head>

<body>

    <header>
        <?php include('includes/header.php'); ?>
    </header>
    <?php 
    require_once('includes/config.php');
    $email = $_SESSION['userid'];
    $query = mysqli_query($conn, "  SELECT * FROM photographer WHERE email = '$email'");
    while($row=mysqli_fetch_assoc($query)){
        ?>
    
    <section>
        <div class="container signup-form">
            <form method="POST" action="">
                <div class="form-group">
                    <label for="firstname">First Name</label>
                    <input type="text" class="form-control" id="firstname" name="firstname" 
                         placeholder="Enter your first name e.g John"  value="<?php echo $row['firstname'];?>" required>
                    
                </div>
                <div class="form-group">
                    <label for="lastname">Last Name</label>
                    <input type="text" class="form-control" id="lastname" name="lastname"
                    placeholder="Enter your last name e.g Doe " value="<?php echo $row['lastname'];?>" required>
                    
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" name="email"
                    placeholder="Enter your email e.g johndoe@gmail.com" value="<?php echo $row['email'];?>" required>
                    
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username"
                     placeholder="Enter your username e.g john@123" value="<?php echo $row['username'];?>" required>
                    
                </div>
                
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <input type="radio" class="form-control" id="gender" name="gender"  value="MALE"
                        required>

                        <input type="radio" class="form-control" id="gender" name="gender" value="FEMALE"
                        required>
                   
                    
                </div>
                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="text" class="form-control" id="phone" name="phone"
                          placeholder="Enter your phone number  e.g +097 123 456 789  " value=<?php echo $row['phone'];?> required>
                    
                </div>

                <div class="form-group">
                    <label for="address">City Address</label>
                    <input type="text" class="form-control" id="address" name="address"
                       placeholder="Enter your home/city  e.g  63733-73737,  NewYork , USA " value=<?php echo $row['address'];?> required>
                   
                </div>
                <div class="form-group">
                    <label for="address">Photographer Category</label>
                    <select name="photographer">
                        <option>Wedding </option>
                        <option>Parties/Events </option>
                        <option>Music Festivals </option>
                        <option>Sports </option>
                        <option>Hiking events </option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="address">Package</label>
                    <input type="number" class="form-control" id="address" name="package"  value="1" min="1" max="50000" step="9" placeholder="Choose a pricing package">
                </div>
                <div class="form-group">
                    <label for="image">Image Account</label>
                    <img src= "images/<?php echo $row['image_name'];?>" alt="image" width="100px" height="100px">
                    <input type="file" class="form-control" id="address" accept="image/*" name="image_upload"    placeholder="Choose an image">
                </div>

                <button type="submit" class="btn btn-primary">Update Account</button>
            </form><br>
          <a href="login.php">  <button  class="btn btn-primary">I have Account</button></a>
        </div>
    </section>
    <?php }  ?>

    <?php include('includes/footer.php'); ?>

</body>

</html>
