<?php
require_once('db.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
</head>
<body>
    <?php
        session_start();
        if (isset($_SESSION['username'])) {
    ?>
    <?php
            $rows = db_query("SELECT fullname, description FROM account where username = '". $_SESSION['username'] . "'");
            $row = $rows->fetch_assoc();
            $fullname = $row['fullname'];
            $description = $row['description'];
        }
        else {
            header("Location: /socialnet/signin.php");
            exit();
        }
    ?>
    
    <!-- Page Content -->
    <div class="content">
        <h1>Profile page for <?= $fullname ?></h1>
        <p><?= $description ?></p>
    </div>

</body>
</html>
