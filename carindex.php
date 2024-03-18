<?php
    include "connection.php";       	

            	
if(isset($_POST["create"])) {
            	//read all rows from database table
            	$sql ="SELECT * FROM new_vehicles";
            	$result=$conn->query($sql);

            	if (!$results){
            		die("invalid query: " . $conn->error);
            	}

            	//read data from each row
            	while($row = $result->fetch_assoc()) {
            		echo "
            		<tr>
            		<td>$row[vehicle_type]</td>
                    <td>$row[distance]</td>
                    <td>$row[max_load]</td>
                    <td>$row[fixed_price] (KES)</td>
                    <td>
                    	<a class='btn btn-primary btn-sm' href='/'>Edit</a>
                    	<a class='btn btn-danger btn-sm' href='/'>Delete</a>
                    </td>
                </tr>
            		";
            	}
            }
            	?>
            	

<!DOCTYPE html>
<html>
<head>
	<title>new vehicle</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
	<div class="contaiiner my-5">
		<h2>list of vehicles</h2>
		<a class="btn btn-primary" href="create.php" role="button" name="create"> new vehicle</a>
		<br>
		<table class="table">
			<thead>
				<tr>
					<th>Vehicle Type</th>
                    <th>Distance</th>
                    <th>Max Load</th>
                    <th>Fixed Price (KES)</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            	
            </tbody>
        </table>
    </div>

</body>
</html>

