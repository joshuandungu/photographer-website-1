<?php
session_start();
include('includes/config.php');

if (!isset($_SESSION['userid'])) {
    header('location: login');
    exit();
}
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
            margin: 0;
            padding: 0;
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
            max-width: 1000px;
            margin: 0 auto;
        }

        .overview-card {
            border: 1px solid #ddd;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 10px;
        }

        .sidebar {
            height: 100%;
            width: 110px;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0px;
            background-color: #343a40;
            padding-top: 20px;
            padding-left: 10px;
            color: #ffffff;
            transition: 0.5s;
            overflow-x: hidden;
        }

        .sidebar a {
            padding: 10px;
            text-decoration: none;
            font-size: 18px;
            color: #ffffff;
            display: block;
        }

        .sidebar a:hover {
            background-color: #555;
            color: white;
        }

        .content {
            margin-left: 0;
            transition: 0.5s;
        }

        @media screen and (max-width: 768px) {
            .sidebar {
                left: 0;
            }

            .content {
                margin-left: 250px;
            }
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
    <div class="sidebar">
        <a href="Photographer-dashboard.php">Dashboard</a>
        <a href="create-gallery.php">Create Gallery</a>
        <a href="photographer-gallery.php">View Gallery</a>
         <a href="view-booking.php">Bookings</a>
        <!-- Add more links as needed -->
    </div>

    <div class="content">
        <header>
            <?php include('includes/photographer_panel_header.php'); ?>
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
    </div>

    <footer>
        &copy; 2023 Photographer Home
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
