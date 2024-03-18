<?php
include "connection.php";


if($_SERVER['REQUEST_METHOD']== 'POST'){
	$vehicle_type = $_POST['vehicle_type'];
    $distance = $_POST['distance'];
    $max_load = $_POST['max_load'];
    $fixed_price = $_POST['fixed_price'];

    do {
    	if (empty($vehicle_type) || empty($distance) || empty($max_load) || empty($fixed_price) ) {$errormessage = "All fields are required"; break;
    }

// add new vehicles
    $sql = "INSERT INTO new_vehicles(vehicle_type, distance, max_load, fixed_price)"; "VALUES ('$vehicle_type', '$distance', '$max_load', '$fixed_price') ";
    $result = $conn->query($sql);

    if (!$result){
    	$errormessage = "invalid query: " . $conn->error;
    	break;
    }

$successmessage ="vehicle added correctly"; 

header("location:carindex.php");
exit;

    } while(false);

}
?>

<!DOCTYPE html>
<html>
<head>
	<title>new vehicle</title>

	<?php
if (!empty($errormessage)){
	echo"
	<div class='alert alert-warning alert-dismissible fade show' role='alert'>
	<strong>$errormessage</strong>
	<button type='button' class='btn-close' data-bs-dissmiss='alert' arial-label='close'></button>
	</div>
	";
}
?>


	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
	<div class="container my-5">
		<h2>new vehicle</h2>
		<form method="post">
			 <div class="row mb-3">
        	<label class="col-sm-3 col-form-label">vehicle_type</label>
        	<div class="col-sm-6">
        		<input type="text" class="form-control" name="vehicle_type" valeu="<?php echo $vehicle_type; ?>"
        	</div>
        </div>
        <div class="row mb-3">
        	<label class="col-sm-3 col-form-label">distance</label>
        	<div class="col-sm-6">
        		<input type="text" class="form-control" name="distance" valeu="<?php echo $distance; ?>"
        	</div>
        </div>
        <div class="row mb-3">
        	<label class="col-sm-3 col-form-label">max_load</label>
        	<div class="col-sm-6">
        		<input type="text" class="form-control" name="max_load" valeu="<?php echo $max_load; ?>"
        	</div>
        </div>
        <div class="row mb-3">
        	<label class="col-sm-3 col-form-label">fixed_price</label>
        	<div class="col-sm-6">
        		<input type="text" class="form-control" name="fixed_price" valeu="<?php echo $fixed_price; ?>"
        	</div>
        </div>

       <?php
        if (!empty($successmessage)) {
        	echo"
        	<div class='row mb-3'>
        	<div class='offset-sm-3 col-sm-6'>
        	<div class='alert alert-success alert alert-dismissible fade show' role='alert'>
        	<strong>$successmessage</strong>
        	<button type='button' class='btn-close' data-bs-dissmiss='alert' arial-label='close'></button>
        	</div>
        	</div>
        	</div>
        	";
        }
        ?>

        <div class="row mb-3">
        	<div class="offset-sm-3 col-sm-3 d-grid">
        		<button type="submit" class="btn btn-primary">submit</button>
        	</div>
        	<div class="col-sm-3 d-grid">
        		<a class="btn btn-outline-primary" href="carindex.php" role="button">cancle</a>
        	</div>
        </div>
    </form>
</div>
</body>
</html>
