<!DOCTYPE html>
<html>
<head>
    <title>Vehicle Management</title>
   
   <style>
  table {
   
  border: 1px solid black;
  width: 100%;
}
th, td{
    width: 100px;
    border: 1px solid black;

}


   input[type=text] {
      padding: 10px;
      font-size: 17px;
      border: 1px solid grey;
      float: left;
      width: 50%;
      background: #CCCCCC;
      text-align: center;
    }
    button {
      background-color: #1252FF;
      width: 50px;
      font-size: 16px;
      padding: 10px;
    }
    button:hover {
      background: #0b7dda;
    }

</style>
</head>
<body>
    <h1>Current Bookings</h1>
     <h2> Search Button </h2>
    <form  action="/service.php">
      <input id="search box" type="text" placeholder="Search here" name="search">
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>

    
<table>
    <tr><th>Phone</th><th>Booking Number</th><th>Description</th><th>Specific load</th><th>Quantity</th><th>Pickup point</th><th>Destination</th><th>Distance covered</th><th>Action</th></tr>
    
   

</table>


    </body>


 <?php
 include "connection.php";
  //$Phoneno=$_POST["Phoneno"];

    $sql = "SELECT phonenumber,booking_number, Description, Specificload, Quantity, Pickuppoint,Destination,Distancecoverd FROM newbooking ";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
            
         echo "<table>";
        
                echo "<tr>";
                echo "<td >". $row['phonenumber'] . "</td>";
                echo "<td >". $row['booking_number'] . "</td>";
                echo "<td >". $row['Description'] . "</td>";
                echo "<td >". $row['Specificload'] . "</td>";
                echo "<td >". $row['Quantity'] . "</td>";
                echo "<td >". $row['Pickuppoint'] . "</td>";
                echo "<td >". $row['Destination'] . "</td>";
                echo "<td >". $row['Distancecoverd'] . "</td>";

         echo "<td> <a href='edit_booking.php?phonenumber=" . $row['phonenumber'] . "'>Update</a></td>";
        echo "</tr>";
            echo "</table>";
            
       }}
        else {
            echo "Error: " . mysqli_error($conn);
           echo "<tr><td colspan='5'>No vehicles found.</td></tr>";
        }
                        
            
        
     
        ?>
