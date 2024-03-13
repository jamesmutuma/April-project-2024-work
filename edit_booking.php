<?php

include "connection.php";

if(isset($_POST["Update"])) {
    $DescriptionPOST["description"];
    $Specificload = $_POST["specificLoad"];
    $Quantity = $_POST["quantity"];
    $Pickuppoint = $_POST["Pickuppoint"];
    $Destination = $_POST["destination"];
    $Distancecoverd = $_POST["distance"];

    // Prepare and execute the SQL query to insert data into the database


    $query=mysqli_query($conn,"UPDATE newbooking SET description='$Description',specificLoad='$Specificload',quantity='$Quantity',Pickuppoint='$Pickuppoint',destination='$Destination',distance='$Distancecoverd' WHERE $booking_number=1");

    if($query) {
        // Data inserted successfully
        echo "<script>alert('Updated Successfully!!'); location.href='payment.php';</script>";
    } else {
        // Error occurred while inserting data
        echo "Error: " . mysqli_error($conn);
        echo "<script>alert('Update Failed!!');</script>";

    }
}
if(isset($_REQUEST["userid"])){
$id=$_REQUEST["userid"];
$query=mysqli_query($conn,"SELECT * FROM newbooking");
$row=mysqli_fetch_assoc($query);

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
            background-color: blue;
            color: white;
            padding: 20px 30px;
            border: none;
            border-radius: 3px;
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
        <button name="Update" onclick="window.location.href='payment.php'">UPDATE</button>
     
        
    </form>

    <p>Your Booking Number: <span id="bookingNumber"></span></p>

   
</body>