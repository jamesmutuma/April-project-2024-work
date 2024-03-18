<?php

include "connection.php";

if($_SERVER['REQUEST_METHOD']== 'POST'){
	$vehicle_type = $_POST['vehicle_type'];
    $distance = $_POST['distance'];
    $max_load = $_POST['max_load'];
    $fixed_price = $_POST['fixed_price'];
       $query=mysqli_query($conn,"UPDATE new_vehicles SET vehicle_type=$vehicle_type,distance=$distance,max_load=$max_load,fixed_price=$fixed_price WHERE id=$id");

    if($query) {
        // Data updated successfully
        echo "<script>alert('Updated Successfully!!'); location.href='payment.php';</script>";
    } else {
        // Error occurred while updating data
        echo "Error: " . mysqli_error($conn);
        echo "<script>alert('Update Failed!!');</script>";

    }


   $query=mysqli_query($conn,"SELECT * FROM new_vehicles WHERE id=$id");
$row=mysqli_fetch_assoc($query);

}
?>

<!DOCTYPE html>
<h1>Update vehicle</h1>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <form method="post" action="newvehicles.php">

       <tr><td>vehicle_type:</td><td><input type="text" value="<?php echo $row["vehicle_type"]?>" name="vehicle_type"></td></tr>
         
       <tr><td>Distance:</td><td><input type="number" value="<?php echo $row["distance"]?>" name="distance"></td></tr>
        	
       <tr><td>max_load:</td><td><input type="number" value="<?php echo $row["max_load"]?>" name="max_load"></td></tr>

        <tr><td>fixed_price:</td><td><input type="number" value="<?php echo $row["fixed_price"]?>" name="fixed_price"></td></tr>
       

        <div class="row mb-3">
        	<div class="offset-sm-3 col-sm-3 d-grid">
        		<button type="submit">submit</button>
        	</div>
        	<div class="col-sm-3 d-grid">
        		<a class="btn btn-outline-primary" href="newvehicles.php" role="button">cancel</a>
        	</div>
        </div>
    </form>
    </body>
    
