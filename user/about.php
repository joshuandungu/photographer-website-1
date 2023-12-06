<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
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

        .about-content {
            max-width: 800px;
            margin: 0 auto;
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
        <div class="container about-content">
            <p>Welcome to [Your Organization Name], where we [briefly describe your mission or purpose]. We are dedicated to [provide a brief overview of what your organization does]. Our team is passionate about [mention any specific values, goals, or principles].</p>

            <p>Founded in [year], we have been [describe any significant achievements or milestones]. Our commitment to [specific aspects of your work] has helped us [mention any positive impacts or outcomes].</p>

            <p>At [Your Organization Name], we believe in [core beliefs or values]. Our team consists of dedicated professionals who bring a wealth of experience and expertise in [mention relevant fields]. Together, we strive to [reiterate your mission or goals].</p>

            <p>Thank you for your support and interest in [Your Organization Name]. If you have any questions or would like to get involved, feel free to [provide contact information or link to the contact page].</p>
        </div>
    </section>

    <?php include ('includes/footer.php');?>