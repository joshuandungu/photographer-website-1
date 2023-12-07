<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photographer Admin Dashboard</title>
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

        .dashboard-content {
            max-width: 800px;
            margin: 0 auto;
        }

        .card {
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
        <?php include ('includes/header.php');?>
    </header>

    <section>
        <div class="dashboard-content">
            <div class="card">
                <div class="card-header">
                    Photographer Management
                </div>
                <div class="card-body">
                    <a href="photographers.php" class="btn btn-primary">View Photographers</a>
                    <a href="add_photographer.php" class="btn btn-success">Add Photographer</a>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    Booking Management
                </div>
                <div class="card-body">
                    <a href="bookings.php" class="btn btn-primary">View Bookings</a>
                </div>
            </div>

            <!-- Add more cards for other functionalities -->

        </div>
    </section>

    <footer>
        &copy; 2023 Photographer Admin
    </footer

