<?php
 include "connection.php";

if (isset($_POST['update'])) {
            $vehicle_type = $_POST['vehicle_type'];
            $distance = $_POST['distance'];
            $max_load = $_POST['max_load'];
            $fixed_price = $_POST['fixed_price'];
            $id=$_POST["id"];
                                            

                                            
                $query=mysqli_query($conn,"UPDATE new_vehicles SET vehicle_type='$vehicle_type',distance=$distance,max_load=$max_load,fixed_price=$fixed_price WHERE id=$id");
                                 if($query) {
                echo "<script>alert('Vehicle updated successfully.');window.location.href='newvehicles.php';</script>";
            } else {
                echo "Error: " . $query . "<br>" . $conn->error;
                echo "<script>alert('Sorry, problem detected!!');</script>";

            }
        }
    
                                                
                                            
if(isset($_REQUEST["id"])){
$id=$_REQUEST["id"];
$query=mysqli_query($conn,"SELECT * FROM new_vehicles WHERE id=$id");
$row=mysqli_fetch_assoc($query);
}
?>

<!DOCTYPE html>

<h2>Update vehicle</h2>
<form method="post" action="updatevehicle.php" enctype="multipart/form-data">
      <input type="hidden" value="<?php echo $row["id"]?>" name="id"> 

       <tr><td>vehicle_type:</td>
       	<td>
       		<input type="text" 
       		value="<?php echo $row["vehicle_type"]?>" 
       		name="vehicle_type">
       	</td></tr>
       
         
       <tr><td>Distance:</td><td><input type="number" value="<?php echo $row["distance"]?>" name="distance"></td></tr>
        	
       <tr><td>max_load:</td><td><input type="number" value="<?php echo $row["max_load"]?>" name="max_load"></td></tr>

        <tr><td>fixed_price:</td><td><input type="number" value="<?php echo $row["fixed_price"]?>" name="fixed_price"></td></tr>
       

        <div class="row mb-3">
        	<div class="offset-sm-3 col-sm-3 d-grid">
        		<button type="submit" name="update">submit</button>
        	</div>
        	<div class="col-sm-3 d-grid">
        		<a class="btn btn-outline-primary" href="newvehicles.php" role="button">cancel</a>
        	</div>
        </div>
    
    </form>
    </body>
    
