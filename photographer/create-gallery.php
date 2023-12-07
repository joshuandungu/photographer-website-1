<?php
session_start();
include('includes/config.php');

if (!isset($_SESSION['userid'])) {
    header('location: login');
    exit();
}
?>


<?php
require_once('includes/config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    $file = $_FILES['file'];
    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileType = $file['type'];
    $fileError = $file['error'];

    $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    $allowedExtensions = array('jpg', 'jpeg', 'png', 'gif', 'mp4', 'avi', 'mov');

    if (in_array($fileExt, $allowedExtensions)) {
        if ($fileError === 0) {
            $newFileName = uniqid('', true) . '.' . $fileExt;
            $fileDestination = 'portfolio/' . $newFileName;
            move_uploaded_file($fileTmpName, $fileDestination);

            // Insert into the database
            $photographer = $_SESSION['userid']; // assuming you have photographer_id in the session
            $insertQuery = "INSERT INTO portfolio (photographer_name, file_path, description) VALUES ('$photographer', '$fileDestination', '$description')";
            $result = mysqli_query($conn, $insertQuery);

            if ($result) {
                echo "<script>alert('File uploaded successfully.');</script>";
                header('location: photographer-gallery.php');
                exit();
            } else {
                echo "<script>alert('Failed to upload file.');</script>";
            }
        } else {
            echo "<script>alert('Error uploading file.');</script>";
        }
    } else {
        echo "<script>alert('Invalid file type.');</script>";
    }
}
?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Portfolio</title>
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

        section {
            padding: 40px 0;
            text-align: center;
        }

        .upload-form {
            max-width: 600px;
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

    <header>
        <?php include('includes/photographer_panel_header.php'); ?>
    </header>

    <section>
        <div class="container">
            <h2>Upload Portfolio</h2>
            <div class="upload-form">
                <form action="create-gallery.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="file">Select File</label>
                        <input type="file" class="form-control" id="file" name="file" accept="image/*,video/*" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </form>
            </div>
        </div>
    </section>

    <?php include('includes/footer.php'); ?>
</body>

</html>


