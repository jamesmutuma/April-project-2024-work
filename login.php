<?php
include "connection.php";

if(isset($_SESSION['user'])){
  
}
//if (isset($_SESSION['usr_id']) || $row["role"] = 1){ 
if(isset($_POST["login"]))
{

                $Email =$_POST["email"];
                $Password =md5($_POST["password"]);

$sql = "SELECT * FROM re WHERE email ='$Email' AND password = '$Password'";
                                    $result = $conn->query($sql);

    // Check if result contains any rows
                                    if ($result->num_rows == 1) {
        // User exists, allow login
        echo "<script>alert('Login successful!!');location.href='homepage.html';</script>";
        // Redirect to dashboard or perform other actions
    } else {
        // User doesn't exist or incorrect credentials
        echo"<script>alert('sorry. Login failed!!!');location.href='login.php';</script> ";
        // You can redirect back to the login page or display an error message
}                          
   
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        form {
            background-color: default;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #4caf50;
            color: white;
            padding: 10px 15px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <form action="login.php" method="post" enctype="multipart/form-data">
        <h2>login</h2>
<label for="email">Email</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
     <button type="submit" name="login" >login</button>
       
<p> don't have an account?</p>
 
<button type="button" onclick="window.location.href='registration.php';">Register</button>

<p>Admin button</p>
<button type="button" onclick="window.location.href='admin.html';">Admin login</button>
</form>

</body>


