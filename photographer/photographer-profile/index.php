<!-- photographer_home.php -->

<?php
session_start();
include('includes/config.php');

if (!isset($_SESSION['userid'])) {
    header('location: start_selling.php');
    exit();
}

// Retrieve photographer's data from the database (you need to implement this part)
$photographerData = []; // Replace this with actual data retrieval

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photographer Home</title>
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

        .container {
            max-width: 800px;
            margin: 0 auto;
        }

        .overview-card {
            border: 1px solid #ddd;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 10px;
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
        <?php include ('../user/includes/header.php');?>
    </header>

    <section>
        <div class="container">
            <h2>Overview</h2>
            <div class="row">
                <div class="col-md-6">
                    <div class="overview-card">
                        <h3>Total Bookings</h3>
                        <p><?php echo $photographerData['total_bookings']; ?></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="overview-card">
                        <h3>Total Earnings</h3>
                        <p><?php echo $photographerData['total_earnings']; ?></p>
                    </div>
                </div>
                <!-- Add more overview cards as needed -->
            </div>
        </div>
    </section>

    <footer>
        &copy; 2023 Photographer Home
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>