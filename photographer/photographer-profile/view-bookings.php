<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking View</title>
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

        .booking-list {
            max-width: 600px;
            margin: 0 auto;
        }

        .booking-item {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
            background-color: #ffffff;
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
        <h1>Booking View</h1>
    </header>

    <section>
        <div class="container booking-list">
            <?php
            // Include your database configuration file
            include('includes/config.php');

            // Query to retrieve booking information from the database
            $query = "SELECT * FROM bookings";
            $result = mysqli_query($conn, $query);

            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<div class='booking-item'>";
                    echo "<h3>Booking ID: " . $row['booking_id'] . "</h3>";
                    echo "<p>Client Name: " . $row['client_name'] . "</p>";
                    echo "<p>Booking Date: " . $row['booking_date'] . "</p>";
                    // Add more details as needed
                    echo "</div>";
                }
            } else {
                // Handle query execution error
                echo "<p>Error retrieving bookings. Please try again.</p>";
            }

            // Close the database connection
            mysqli_close($conn);
            ?>
        </div>
    </section>

    <footer>
        &copy; 2023 Booking View
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
