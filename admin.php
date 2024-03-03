<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Management Admin Page</title>
</head>
<body>
    <h1>Welcome, Admin!</h1>
    <h2>Add New Members</h2>
    <form action="/add_member" method="post">
        <label for="member_name">Member Username:</label><br>
        <input type="text" id="member_Username" name="member_Username" required><br><br>
        <label for="member_email">Member Email:</label><br>
        <input type="email" id="member_email" name="member_email" required><br><br>
        <label for="member_role">Member Role:</label><br>
        <select id="member_role" name="member_role" required>
            <option value="admin">Admin</option>
            <option value="user">Users</option>
        </select><br><br>
        <input type="submit" value="Add Member">
    </form>
</body>