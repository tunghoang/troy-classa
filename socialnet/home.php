<?php
require_once('db.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello World Home Page</title>
    <style>
        /* Basic Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        /* Navbar Styling */
        .navbar {
            background-color: #333;
            overflow: hidden;
            display: flex;
            justify-content: center;
        }

        .navbar a {
            color: white;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
            font-size: 17px;
        }

        /* Hover Effect */
        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }

        /* Active/Current Link */
        .navbar a.active {
            background-color: #04AA6D;
        }

        /* Content Area */
        .content {
            padding: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <?php
        session_start();
        if (isset($_SESSION['username'])) {
    ?>
        <!-- Menu Bar -->
        <div class="navbar">
            <a href="#home" class="active">Home</a>
            <a href="profile.php">Profile</a>
            <a href="setting.php">Settings</a>
            <a href="signout.php">Logout</a>
        </div>
    <?php
            $rows = db_query("SELECT fullname FROM account where username = '". $_SESSION['username'] . "'");
            $row = $rows->fetch_assoc();
            $fullname = $row['fullname'];
        }
        else {
            header("Location: /socialnet/signin.php");
            exit();
        }
    ?>
    
    <!-- Page Content -->
    <div class="content">
        <h1>Hello <?= $fullname ?></h1>
        <p>Welcome to my new home page.</p>
    </div>

</body>
</html>
