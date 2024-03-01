<?php

include "connection.php";

if(isset($_POST["make_booking"]))
{
    $Description =$_POST["description"];
    $Specificload =$_POST["specificLoad"];
    $Quantity =$_POST["quantity"];
    $Pickuppoint =$_POST["Pickup_point"];
    $Destination =$_POST["Destination"];
    $Distancecovered =$_POST["distance"];
         
                                            {
      
                                            $query=mysqli_query($conn,"INSERT INTO  newbooking VALUES('$Description',$Specificload,'$Quantity', '$Pickuppoint', '$Destination', 'Distancecovered')");
                                                if($query)
                                                {
                                                    
                                                    echo "<script>alert('Booking Successful!!');location.href='payment.html';</script>";
                                                }
                                                else
                                                {
                                                   echo "<script>alert('Booking failed!!');</script>"; 
                                                }}


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
        <label for="description">Description:</label>
        <input type="text" id="description" name="description" required>

        <label for="specificLoad">SpecificLoad:</label>
        <input type="text" id="specificLoad" name="specificLoad" required>

        <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity" required>

        <label for="pickup_point">Pickup_point:</label>
        <input type="text" id="Pickup_point" name="Pickup_point" required>

        <label for="destinatio">Destination:</label>
        <input type="text" id="Destination" name="Destination" required>

        <label for="distance">Distance(in km):</label>
        <input type="number" id="distance" name="distance" required>
        <button name="make_booking">Making booking</button>
        
    </form>

    <p>Your Booking Number: <span id="bookingNumber"></span></p>

   
</body>
</html>