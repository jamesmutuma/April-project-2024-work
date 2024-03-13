<?php
session_start();
if(isset($_SESSION['booking_number'])) {
    $booking_number = $_SESSION['booking_number'];
    echo "Your Booking Number: " . $booking_number;
} else {
    echo "Booking number not found!";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cash Payment</title>
</head>
<body>
    <h1>Cash Payment</h1>
    <form action="/process_payment" method="post">
        <label for="amount">Enter Amount:</label><br>
        <input type="number" id="amount" name="amount" min="0" step="0.01" required><br><br>
        <label for="currency">Currency:</label><br>
        <select id="currency" name="currency" required>
            <option value="KSH">KSH</option><br> 
        </select>
            
        <input type="submit" value="Submit Payment">
    </form>
</body>
</html>