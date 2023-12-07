
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search and Book Photographers</title>
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

        h1 {
            font-size: 3em;
            margin-bottom: 20px;
        }

        section {
            padding: 40px 0;
            text-align: center;
        }

        .search-container {
            max-width: 600px;
            margin: 0 auto;
        }

        .photographer-gallery {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .photographer {
            border: 1px solid #ccc;
            border-radius: 8px;
            margin: 10px;
            padding: 10px;
            width: 200px;
            text-align: center;
        }

        .booking-form {
            max-width: 600px;
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
    </style>
</head>

<body>

    <header>
        <?php include('includes/header.php'); ?>
    </header>

    <section>
        <div class="container search-container">
            <form action="" method="GET">
                <div class="form-group">
                    <label for="search">Search for Photographers</label>
                    <input type="text" name="search" class="form-control" id="search" placeholder="Enter location or photographer name">
                </div>
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </div>
    </section>
    <section>
    <div class="container">
        <h2>Photographer Gallery</h2>
        <div class="photographer-gallery">
            <?php
            require_once('includes/config.php');
            if (isset($_GET['search'])) {
                $searchdata = $_GET['search'];
                $sql = mysqli_query($conn, "SELECT * FROM photographer  WHERE (firstname LIKE '%$searchdata%' OR lastname LIKE '%$searchdata%' OR email LIKE '%$searchdata%'  OR username LIKE '%$searchdata%' OR gender LIKE '%$searchdata%' OR phone LIKE '%$searchdata%' OR address LIKE '%$searchdata%' OR photographer LIKE '%$searchdata%' OR package LIKE '%$searchdata%')");
            } else {
                $sql = mysqli_query($conn, "SELECT * FROM photographer ");
            }

            if (mysqli_num_rows($sql) > 0) {
                while ($row = mysqli_fetch_assoc($sql)) {
                    $photographer = $row['firstname'] . ' ' . $row['lastname'];
            ?>
                    <div class="photographer">
                        <img src="<?php echo $photographer; ?>">
                        <h3><?php echo $row['firstname'] . ' ' . $row['lastname']; ?></h3>
                        <p>Category: <?php echo $row['photographer']; ?></p>
                        <p>Location: <?php echo $row['address']; ?></p>
                        <button class="btn btn-success"><a href="view-photographer.php?viewid=<?php echo $row['email']; ?>">View More</a></button>
                    </div>
            <?php
                }
            } else {
                echo "<h3 style='color:red;'>Photographer with the above search results is not found.</h3>";
            }
            ?>
        </div>
    </div>
</section>



    <?php include('includes/footer.php'); ?>
</body>

</html>
