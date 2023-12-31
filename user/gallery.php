<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photo Gallery</title>
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

        .gallery {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            grid-gap: 10px;
            margin: 20px;
        }

        .gallery img {
            width: 100%;
            height: auto;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
        }

        .gallery img:hover {
            transform: scale(1.1);
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
        <?php include ('includes/header.php');?>
    </header>


    <?php 
require_once('includes/config.php');
$sql = mysqli_query($conn, "SELECT * FROM portfolio");
?>

<section>
    <div class="container">
        <div class="gallery">
            <?php while($row = mysqli_fetch_assoc($sql)) { ?>
                <!-- Example gallery images, replace with dynamic content from your database -->
                <img src="../photographer/portfolio/<?php echo $row['file_path'];?>" alt="Photo 1">
                <!-- Add more images as needed -->
            <?php } ?>
        </div>
    </div>
</section>


    <?php include ('includes/footer.php');?>
