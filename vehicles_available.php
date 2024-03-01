<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MetroMovers Inventory</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        form {
            max-width: 600px;
            margin: auto;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        select {
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
            background-color: #45a049;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>
<body>

    <h2>MetroMovers Vehicle Options</h2>

    <form id="vehicle-form">
        <label for="vehicleType">Select Vehicle:</label>
        <select id="vehicleType" name="vehicleType" required>
            <option value="smallVan">Small Van</option>
            <option value="mediumVan">Medium Van</option>
            <option value="pickup">pickup</option>
            <option value="lorry">lorry</option>
            <option value="Truck">Truck</option>
        </select>

        <button type="button" onclick="showVehicleDetails()">Show Details</button>
        
    </form>

    <div id="vehicleDetails">   
    </div>
    <div>
        <button onclick="window.location.href='newbooking.html'; ">SELECT VEHICLE </button>
    </div>

    <script>
        function showVehicleDetails() {
            // Retrieve selected vehicle details and display them
            const vehicleType = document.getElementById('vehicleType').value;
            const vehicleDetails = getVehicleDetails(vehicleType);

            const detailsContainer = document.getElementById('vehicleDetails');
            detailsContainer.innerHTML = '';
    
            

            if (vehicleDetails) {
                const table = document.createElement('table');
                const headerRow = table.insertRow();
                const header1 = headerRow.insertCell(0);
                const header2 = headerRow.insertCell(1);
                
                header1.textContent = 'Price';
                header2.textContent = 'Maximum Distance (km)';
                
                const row = table.insertRow();
                const cell1 = row.insertCell(0);
                const cell2 = row.insertCell(1);
               

                cell1.textContent = vehicleDetails.price;
                cell2.textContent = vehicleDetails.maxDistance;
                

                detailsContainer.appendChild(table);

            } else {
                detailsContainer.textContent = 'No details available for the selected vehicle.';
            }
        }

        function getVehicleDetails(vehicleType) {
            // Replace this with actual data retrieval logic based on the vehicle type
            switch (vehicleType) {
                case 'smallVan':
                    return { price: 'kshs20,000.00', maxDistance: 0-100 };
                case 'mediumVan':
                    return { price: 'kshs30,000.00', maxDistance: 0-200 };
                case 'pickup':
                    return { price: 'ksh50,000.00', maxDistance: 0-300 };
                case 'lorry':
                    return { price: 'ksh70,000.00', maxDistance: 0-500 };
                case 'Truck':
                    return { price: 'ksh100,000.00', maxDistance: 0-1000 };
                default:
                    return null;
            }
        }
    </script>

</body>
</html>