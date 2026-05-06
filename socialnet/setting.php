<?php
session_start();
if ( !isset($_SESSION['username']) ) {
    header('Location: /socialnet/signin.php');
    exit();
}

$u = $_SESSION['username'];

require_once('db.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $description = $_POST['description'];
    db_execute("UPDATE account SET description='" . $description . "' WHERE username = '" . $u . "'");
    echo "Success";
    header('Location: /socialnet/setting.php');
    exit();
}
else {
    $rows = db_query("SELECT description FROM account WHERE username = '" . $u . "'");
    $row = $rows->fetch_assoc();
    $old_description = $row['description'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Setting: Edit profile page</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f7f6; display: flex; justify-content: center; align-items: center; height: 100vh; }
        .form-container { background: white; padding: 30px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); }
        input { width: 100%; padding: 12px; margin-bottom: 15px; border: 1px solid #ccc; }
        .signup-btn { background-color: #04AA6D; color: white; padding: 14px; width: 100%; border: none; cursor: pointer; }
        div {
            margin: 12px 0;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Create Account</h1>
        <form action="setting.php" method="POST">
            <div><label for="content">Content</label></div>
            <div><textarea rows="10" cols="100" name="description" required><?= $old_description ?></textarea></div>
            <div><button type="submit" class="signup-btn">Save</button></div>
        </form>
    </div>
</body>
</html>

