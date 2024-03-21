<?php

include "connection.php";

if(isset($_POST["newbooking"])) {
    $phonenumber = $_POST["phonenumber"];
    $Description = $_POST["description"];
    $Specificload = $_POST["specificLoad"];
    $Quantity = $_POST["quantity"];
    $Pickuppoint = $_POST["Pickuppoint"];
    $Destination = $_POST["destination"];
    $Distancecoverd = $_POST["distance"];

    // Generate a unique booking number
    $booking_number = uniqid('BK-');

    // Store the booking number in a session variable
    session_start();
    $_SESSION['booking_number'] = $booking_number;

    // Include your database connection file

    // Prepare and execute the SQL query to insert data into the database
    $query = "INSERT INTO newbooking  
              VALUES ('$phonenumber', '$booking_number','$Description', '$Specificload', $Quantity, '$Pickuppoint', '$Destination', '$Distancecoverd')";

    if(mysqli_query($conn, $query)) {
        // Data inserted successfully
        echo "<script>alert('Booking Successful!!'); location.href='payment.php';</script>";
    } else {
        // Error occurred while inserting data
        echo "Error: " . mysqli_error($conn);
        echo "<script>alert('Booking Failed!!');</script>";

    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MetroMovers Booking</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        form {
            background-color: default;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input, select {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        button {
            background-color: green;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: default;
        }
    </style>
</head>
<body>

    <h2>MetroMovers Booking</h2>

    <form action="newbooking.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="booking_number" value="<?php echo $booking_number; ?>">

        <label for="phonenumber">phonenumber:</label>
        <input type="number" id="phonenumber" name="phonenumber" required>
        <label for="description">Description:</label>
        <input type="text" id="description" name="description" required>

        <label for="specificLoad">SpecificLoad:</label>
        <input type="text" id="specificLoad" name="specificLoad" required>

        <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity" required>

        <label for="pickuppoint">Pickup_point:</label>
        <input type="text" id="Pickuppoint" name="Pickuppoint" required>

        <label for="destinatio">Destination:</label>
        <input type="text" id="destination" name="destination" required>

        <label for="distance">Distance(in km):</label>
        <input type="number" id="distance" name="distance" required>
        <button name="newbooking" onclick="window.location.href='payment.php'">New Booking</button>
        <button name="Update" onclick="window.location.href='edit_booking.php'">Update</button>
     
        
    </form>

    <p>Your Booking Number: <span id="bookingNumber"></span></p>

   
</body>
