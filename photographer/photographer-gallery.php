

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photographer Gallery</title>
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

        .gallery {
            max-width: 800px;
            margin: 20px auto;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
        }

        .gallery img {
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

// Assuming you have the photographer's ID from the session or URL parameter
if(isset($_SESSION['userid'])){
    $photographerId = $_SESSION['userid'];

    // Fetch photographer details
    $query = mysqli_query($conn, "SELECT * FROM portfolio WHERE photographer_name = '$photographerId'");
?>

<section>
    <div class="container">
        <div class="photographer-details">
            <div class="gallery">
                <?php
                while($row = mysqli_fetch_assoc($query)) {
                    ?>
                    <img src="portfolio/<?php echo $row['file_path'];?>" width="100px" height="100px" alt="image">
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</section>

<?php } ?>

    <?php include('includes/footer.php'); ?>
</body>

</html>