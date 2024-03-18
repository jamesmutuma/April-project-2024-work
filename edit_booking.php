<?php

include "connection.php";

if(isset($_POST["Update"])) {
    $Description=$_POST["description"];
    $Specificload = $_POST["specificLoad"];
    $Quantity = $_POST["quantity"];
    $Pickuppoint = $_POST["Pickuppoint"];
    $Destination = $_POST["destination"];
    $Distancecoverd = $_POST["distance"];

    // Prepare and execute the SQL query to update data into the database


    $query=mysqli_query($conn,"UPDATE newbooking SET description='$Description',specificLoad='$Specificload',quantity='$Quantity',Pickuppoint='$Pickuppoint',destination='$Destination',distance='$Distancecoverd'");

    if($query) {
        // Data updated successfully
        echo "<script>alert('Updated Successfully!!'); location.href='payment.php';</script>";
    } else {
        // Error occurred while updating data
        echo "Error: " . mysqli_error($conn);
        echo "<script>alert('Update Failed!!');</script>";

    }
}



//if(isset($_REQUEST["userid"])){
//$id=$_REQUEST["userid"];
$query=mysqli_query($conn,"SELECT * FROM newbooking");
$row=mysqli_fetch_assoc($query);


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

    <form action="edit_booking.php" method="post" enctype="multipart/form-data">
    <table >
		<tr><td>Description:</td><td><input type="text" value="<?php echo $row["Description"]?>"name="description" required="" placeholder="enter your description"></td></tr>
	    <tr><td>Specificload:</td><td><input type="text" value="<?php echo $row["Specificload"]?>" name="Specificload" required="" placeholder="enter your Specificload"></td></tr>
	    <tr><td>Quatity:</td><td><input type="text" name="quantity" value="<?php echo $row["Quantity"]?>" placeholder="enter your quantity"></td></tr>
	    <tr><td>pickuppoint:</td><td><input type="text" name="pickuppoint" value="<?php echo $row["Pickuppoint"]?>" placeholder="enter your Pickuppoint"></td></tr>
	    	<tr><td>Destination:</td><td><input type="text" value="<?php echo $row["Destination"]; ?>" name="destination" placeholder="enter your destination"></td></tr>
	    		<tr><td>Distancecovered:</td><td><input type="text" value="<?php echo $row["Distancecoverd"]?>"  name="distance" placeholder="enter your distance"></td></tr>
	    		
	    		<tr><td colspan="2"><input type="submit" name="update" value="update"></td></tr>
	     	
</table>

        
        
    </form>

    <p>Your Booking Number: <span id="bookingNumber"></span></p>

   
</body>