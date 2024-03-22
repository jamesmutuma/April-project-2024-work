<!DOCTYPE html>
<html>
<head>
    <title>Vehicle Management</title>
   
   <style>

    tr{
    border:1px solid #ddd;
}
 th{
    background-color: #04aa6d;
    color:white;
    text-align: left;
    border:1px;
}


</style>
</head>
<body>
    <h1>Vehicle Management</h1>

    <h2>Add New Vehicle</h2>
    <form method="post" action="newvehicles.php">
        
            <label >vehicle_type</label>
            
                <input type="text" name="vehicle_type" >
           
            <label>distance</label>
            
                <input type="text"  name="distance" >
        
            <label>max_load</label>
            
                <input type="text"  name="max_load" >
          
       
            <label>fixed_price</label>
           
                <input type="text" name="fixed_price" >
        
                <button type="submit"  name='add'>ADD</button>
                

</form>   
<table>
    <tr><th>Vehicle Type</th><th>Distance</th><th>Max Load</th><th>Fixed Price (KES)</th><th>Action</th></tr>
    <?php
      include "connection.php";
    $query=mysqli_query($conn, "SELECT 'vehicle_type', distance, 'max_load', 'fixed_price FROM new_vehicles");

   $i=1;
    while ($query)
    {
    ?>
    <td><?php echo $row["vehicle_type"];?></td>
    <td><?php echo $row["distance"];?></td>
    <td><?php echo $row["max_load"];?></td>
    <td><?php echo $row["fixed _price"];?></td>
    <td><a href='?delete=" . $row['id'] . "'>Delete</a>
    <a href='updatevehicle.php?id=" . $row['id'] . "'>Update</a></td>";
            
        } else {

            echo "<tr><td colspan='5'>No vehicles found.</td></tr>";
        }

            
        <?php
$i++;
    }
    ?>   
   

</table>


    </body>


 <?php
 include "connection.php";


        // Add a new vehicle
if (isset($_POST['add'])) {
            $vehicle_type = $_POST['vehicle_type'];
            $distance = $_POST['distance'];
            $max_load = $_POST['max_load'];
            $fixed_price = $_POST['fixed_price'];

            $query = "INSERT INTO new_vehicles VALUES (0,'$vehicle_type', '$distance', '$max_load', '$fixed_price')";

             if(mysqli_query($conn, $query)) {

                echo "<script>alert(New vehicle added successfully.);</script>";
            } else {
                echo "Error: " . mysqli_error($conn);
                echo "<script>No vehicle added</script>";

            }
        }
                                               

        // Delete a vehicle
        if (isset($_GET['delete'])) {
            $id = $_GET['delete'];

            $query = "DELETE FROM new_vehicles WHERE id=$id";

            if(mysqli_query($conn, $query)) {
                echo "<script>alert('Vehicle deleted successfully.');</script>";
            } else {
                echo "Error: " . $query . "<br>" . $conn->error;
            }
        }


        $sql = "SELECT id, vehicle_type, distance, max_load, fixed_price FROM new_vehicles";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
            
           echo "<table>";
        
                echo "<tr>";

                echo "<td >". $row['vehicle_type'] . "</td>";

                echo "<td>" . $row['distance'] . "</td>";
                echo "<td>" . $row['max_load'] . "</td>";
                echo "<td>KES " . $row['fixed_price'] . "</td>";
                echo "<td>
                        <a href='?delete=" . $row['id'] . "'>Delete</a>
                        <a href='updatevehicle.php?id=" . $row['id'] . "'>Update</a>
                      </td>";
                echo "</tr>";
            echo "</table>";
            }
        } else {

            echo "<tr><td colspan='5'>No vehicles found.</td></tr>";
        }

     
        ?>
