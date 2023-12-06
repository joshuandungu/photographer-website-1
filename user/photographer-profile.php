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

        .photographer-list {
            list-style: none;
            padding: 0;
            margin: 20px 0;
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
    <?php include ('includes/header.php');?>
    </header>

    <section>
        <div class="container search-container">
            <form>
                <div class="form-group">
                    <label for="search">Search for Photographers</label>
                    <input type="text" class="form-control" id="search" placeholder="Enter location or photographer name">
                </div>
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </div>
    </section>

    <section>
        <div class="container">
            <h2>Photographer List</h2>
            <ul class="photographer-list">
                <!-- Example photographers, replace with dynamic content from your database -->
                <li class="photographer">
                    <h3>Photographer 1</h3>
                    <p>Location: City A</p>
                    <button class="btn btn-success">Book Now</button>
                </li>
                <li class="photographer">
                    <h3>Photographer 2</h3>
                    <p>Location: City B</p>
                    <button class="btn btn-success">Book Now</button>
                </li>
                <!-- Add more photographers as needed -->
            </ul>
        </div>
    </section>

    <section>
        <div class="container">
            <h2>Book Now</h2>
            <div class="booking-form">
                <form>
                    <div class="form-group">
                        <label for="name">Your Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter your name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Your Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter your email" required>
                    </div>
                    <div class="form-group">
                        <label for="photographer">Select Photographer</label>
                        <select class="form-control" id="photographer" required>
                            <option value="">Select Photographer</option>
                            <!-- Dynamically populate this list from your database -->
                            <option value="photographer1">Photographer 1</option>
                            <option value="photographer2">Photographer 2</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Book Now</button>
                </form>
            </div>
        </div>
    </section>

    <?php include ('includes/footer.php');?>