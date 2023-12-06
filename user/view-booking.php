<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Bookings</title>
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
            list-style: none;
            padding: 0;
            margin: 20px 0;
        }

        .booking {
            border: 1px solid #ccc;
            border-radius: 8px;
            margin: 10px;
            padding: 10px;
            width: 300px;
            text-align: center;
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
<header><?php include ('includes/header.php');?></header>
    

    <section>
        <div class="container">
            <ul class="booking-list">
                <!-- Example bookings, replace with dynamic content from your database -->
                <li class="booking">
                    <h3>Booking ID: 123</h3>
                    <p>Photographer: Photographer 1</p>
                    <p>Date: January 15, 2023</p>
                </li>
                <li class="booking">
                    <h3>Booking ID: 456</h3>
                    <p>Photographer: Photographer 2</p>
                    <p>Date: February 20, 2023</p>
                </li>
                <!-- Add more bookings as needed -->
            </ul>
        </div>
    </section>

    <?php include ('includes/footer.php');?>