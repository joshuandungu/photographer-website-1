<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find Your Photographer</title>
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

        .search-bar {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .photographer-card {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .photographer-card img {
            border-radius: 50%;
            width: 100px;
            height: 100px;
            object-fit: cover;
            margin-right: 20px;
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

    <section class="search-bar">
        <div class="container">
            <form>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search for photographers or services">
                </div>
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </div>
    </section>
    
    <section>
        <div class="container">
            <div class="photographer-card">
                <img src="photographer1.jpg" alt="Photographer 1">
                <div>
                    <h3>Photographer 1</h3>
                    <p>Specializing in portrait photography</p>
                </div>
                <button class="btn btn-secondary">View Profile</button>
            </div>

            <div class="photographer-card">
                <img src="photographer2.jpg" alt="Photographer 2">
                <div>
                    <h3>Photographer 2</h3>
                    <p>Expert in wedding photography</p>
                </div>
                <button class="btn btn-secondary">View Profile</button>
            </div>

            <!-- Add more photographer cards as needed -->

        </div>
    </section>

    <?php include ('includes/footer.php');?>