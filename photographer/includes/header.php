<?php 
if(!isset($_SESSION['userid'])){
    header('location:login.php');
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Navbar</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

<?php
    // Start the session
    session_start();
    ?>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Your Logo</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
            <?php if (isset($_SESSION['userid'])) {?>
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="create-gallery.php">Create Gallery</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="photographer-gallery.php">My Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="photographer-booking.php">My Bookings</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="photographer-account.php">Photo Account</a>
                    </li>
                    <li class="nav-item">
                       <p> <a class="nav-link" href="my-account.php<?php echo $_SESSION['userid']; ?>">
                        </a></p>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                    
                <?php }?>
                
             <?php if (!isset($_SESSION['userid'])) {?>
                    <li class="nav-item active">
                        <a class="nav-link" href="../index.php">Home <span class="sr-only">(current)</span></a>
                   
                        <a class="nav-link" href="start-selling.php.php">Create Account</a>
                    </li>
                    
                <?php } ?>
            </ul>
        </div>
    </nav>

    <!-- Your content goes here -->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
