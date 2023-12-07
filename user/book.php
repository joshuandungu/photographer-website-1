<?php
// Include your database configuration file
require_once('includes/config.php');

// Assuming you have a form with fields: firstname, lastname, email, and any other fields you need to insert
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize and validate user input
    $client_name = mysqli_real_escape_string($conn, $_POST['client_name']);
    $client_email = mysqli_real_escape_string($conn, $_POST['client_email']);
    $client_gender = mysqli_real_escape_string($conn, $_POST['client_gender']);
    $client_phone = mysqli_real_escape_string($conn, $_POST['client_phone']);
    $client_address = mysqli_real_escape_string($conn, $_POST['client_address']);
    $ph_name = mysqli_real_escape_string($conn, $_POST['ph_name']);
    $ph_email = mysqli_real_escape_string($conn, $_POST['ph_email']);
    $ph_gender = mysqli_real_escape_string($conn, $_POST['ph_gender']);
    $ph_phone = mysqli_real_escape_string($conn, $_POST['ph_phone']);
    $ph_address = mysqli_real_escape_string($conn, $_POST['ph_address']);
    $package = mysqli_real_escape_string($conn, $_POST['package']);

    $invoiceid = mt_rand(1000000000, 999999999);
    $sid = $_POST['sid'];
    
    for ($i = 0; $i < count($sid); $i++) {
        $bookid = $sid[$i];
    
    
    $sql = mysqli_query($conn, "SELECT * FROM bookings WHERE client_name= '$client_name'");
    $result = mysqli_num_rows($sql);
    
    if ($result > 0) {
        echo "<script>alert('You have already made a booking. View your booking history.')</script>";
    } else {
        // Your SQL query to insert data into the database
        $insertQuery = "INSERT INTO bookings (book_id,client_name, client_email, client_gender, client_phone, client_address, photographer_name, photographer_email, photographer_gender, photographer_phone, photographer_address, package) VALUES ('$book_id','$client_name', '$client_email', '$client_gender', '$client_phone', '$client_address', '$ph_name', '$ph_email', '$ph_gender', '$ph_phone', '$ph_address', '$package')";
    
        // Execute the query
        $insertResult = mysqli_query($conn, $insertQuery);
    
        if ($insertResult) {
            // Get the auto-incremented booking ID
            $bookingId = mysqli_insert_id($conn);
            
            echo "<script>alert('Booking successful. Your Booking ID is: $bookingId');</script>";
            header('location:view-bookings.php');
            exit();
        } else {
            echo "<script>alert('Failed to book. Something went wrong, please try again later.');</script>";
        }
    }
}

    // Close the database connection
    mysqli_close($conn);
}
?>
