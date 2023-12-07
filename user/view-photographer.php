<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Photographer</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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

        section {
            padding: 40px 0;
            text-align: center;
        }

        .photographer-details {
            max-width: 600px;
            margin: 0 auto;
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 20px;
            background-color: #fff;
        }

        .portfolio {
            max-width: 800px;
            margin: 20px auto;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
        }

        .portfolio img {
            width: 100%;
            border-radius: 8px;
        }

        footer {
            background-color: #343a40;
            color: #ffffff;
            padding: 20px 0;
            text-align: center;
        }
    </style>
</head>

<body>

    <header>
    <?php include('includes/header.php'); ?>
    </header>
<?php 
require_once('includes/config.php');

if(isset($_SESSION['userid'])){
    $userEmail = $_SESSION['userid'];
    $userQuery = mysqli_query($conn, "SELECT * FROM users WHERE email = '$userEmail'");
    
    while($userRow = mysqli_fetch_assoc($userQuery)){
?>
    <section>
        <div class="container signup-form">
            <form method="POST" action="book.php">
                <input type="hidden" name="client_name" value="<?php echo $userRow['firstname'] . '  ' . $userRow['lastname']; ?>">
                <input type="hidden" name="client_email" value="<?php echo $userRow['email']; ?>">
                <input type="hidden" name="client_gender" value="<?php echo $userRow['gender']; ?>">
                <input type="hidden" name="client_phone" value="<?php echo $userRow['phone']; ?>">
                <input type="hidden" name="client_address" value="<?php echo $userRow['address']; ?>">

                <?php
                if(isset($_GET['viewid'])){
                    $phid = $_GET['viewid'];
                    $photographerQuery = mysqli_query($conn, "SELECT * FROM photographer WHERE id = '$phid'"); 

                    while($photographerRow = mysqli_fetch_assoc($photographerQuery)){
                ?>
                        <input type="hidden" name="ph_name" value="<?php echo $photographerRow['firstname'] . ' ' . $photographerRow['lastname']; ?>">
                        <input type="hidden" name="ph_email"  value="<?php echo $photographerRow['email']; ?>">
                        <input type="hidden" name="ph_gender"  value="<?php echo $photographerRow['gender']; ?>">
                        <input type="hidden" name="ph_phone"  value="<?php echo $photographerRow['phone']; ?>">
                        <input type="hidden" name="ph_address"  value="<?php echo $photographerRow['address']; ?>">
                        <input type="hidden" name="package"  value="<?php echo $photographerRow['package']; ?>">
                <?php
                    }
                }
                ?> 

                <button type="submit" class="btn btn-primary">Book Now</button>
            </form>
        </div>
    </section>
<?php 
    }
}
?>
 
   
     

    <section>
        <div class="container">

            <?php
            require_once('includes/config.php');

            if (isset($_GET['viewid'])) {
                $photographerId = $_GET['viewid'];
                $query = mysqli_query($conn, "SELECT * FROM photographer WHERE email = '$photographerId'");
                $row = mysqli_fetch_assoc($query);

                if ($row) {
                    $photographer = $row['email'];
            ?>
                    <div class="photographer-details">
                        <img src="users/<?php echo $row['image']; ?>" alt="profile">
                        <h2><?php echo $row['firstname'] . ' ' . $row['lastname']; ?></h2>
                        <h4><?php echo $row['email']; ?></h4>
                        <h4><?php echo $row['username']; ?></h4>
                        <h4><?php echo $row['gender']; ?></h4>
                        <h4><?php echo $row['phone']; ?></h4>
                        <h4><?php echo $row['address']; ?></h4>
                        <p>Category: <?php echo $row['photographer']; ?></p>
                        <p>Location: <?php echo $row['package']; ?></p>
                        <!-- Add more details as needed -->

                        <h3>Portfolio</h3>
                        <div class="portfolio">
                            <?php
                            // Assuming you have a table for the photographer's portfolio
                            $portfolioQuery = mysqli_query($conn, "SELECT * FROM portfolio WHERE photographer_name = '$photographer'");
                            while ($portfolioRow = mysqli_fetch_assoc($portfolioQuery)) {
                            ?>
                                <img src="../photographer/portfolio/<?php echo $portfolioRow['file_path']; ?>" alt="Portfolio Image">
                            <?php
                            }
                            ?>
                        </div>
                    </div>
            <?php
                } else {
                    echo "Photographer not found.";
                }
            }
            ?>
        </div>
    </section>

    <?php include('includes/footer.php'); ?>
</body>

</html>
