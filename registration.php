<?php

include "connection.php";

if(isset($_POST["register"]))
{
    $User =$_POST["username"];
    $Phoneno =$_POST["phonenumber"];
    $Email =$_POST["email"];
    $Password =md5($_POST["password"]);
    $Confirmpassword =md5($_POST["confirmPassword"]);
    //check if password match
    if($Password !==$Confirmpassword){
    echo "<script>alert('error:password do not match.');location.href='Registration.php'</script>";
    exit;
}

    $results=mysqli_query($conn,"SELECT * FROM re WHERE email='$Email'");
                                            $email_check= mysqli_num_rows($results);
                                            if($email_check==0)
                                            {
                                            $query=mysqli_query($conn,"INSERT INTO re VALUES(0,'$User',$Phoneno,'$Email', '$Password', '$Confirmpassword')");
                                                if($query)
                                                {
                                                    
                                                    echo "<script>alert('Registration Successful!!');location.href='homepage.html';</script>";
                                                }}
                                                else
                                                {
                                                   echo "<script>alert('Registration failed!!');</script>"; 
                                                }


}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
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
            text-align: left;
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
          background-color:green;
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

    <form action="Registration.php" method="post" enctype="multipart/form-data">
        <h2>User Registration</h2>

        <label for="username">Username</label>
        <input type="text" id="username" name="username" required>
<label for="phone number">phone number</label>
        <input type="text" id="phone number" name="phonenumber" required>


        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>

        <label for="confirmPassword">Confirm Password</label>
        <input type="password" id="confirmPassword" name="confirmPassword" required>
        <select id="member_role" name="member_role" required>
            <option value="admin">Admin</option>
            <option value="user">Users</option>
        </select><br><br>

        <button onclick="window.location.href='homepage.html';" name="register" >register</button>
<p> Already have an account?</p>
 <div class="container">
    <button onclick="window.location.href='login.php';" >login</button>
</div>
    </form>

</body>
