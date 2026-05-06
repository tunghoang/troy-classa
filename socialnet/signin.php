<?php
    require_once('db.php');
    session_start();
    if (isset($_SESSION['username'])) {
        header('Location: /socialnet/home.php');
        exit();
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $u = $_POST['username'];
        $p = $_POST['password'];
        $stmt = "SELECT username, password FROM account WHERE username = '" . $u . "'";
        
        $result = db_query($stmt);
        $row = $result->fetch_assoc();
        if ($row == NULL) {
            echo "No user " . $u . " found";
        }
        else {
            if (password_verify($p, $row['password'])) {
                $_SESSION['username'] = $u;
                header("Location: /socialnet/home.php");
                exit();
            }
            else {
                echo "Wrong password";
            }
        }
        //echo var_dump($row);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign in</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f7f6; display: flex; justify-content: center; align-items: center; height: 100vh; }
        .form-container { background: white; padding: 30px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); }
        input { width: 100%; padding: 12px; margin-bottom: 15px; border: 1px solid #ccc; }
        .signup-btn { background-color: #04AA6D; color: white; padding: 14px; width: 100%; border: none; cursor: pointer; }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Create Account</h1>
        <form action="signin.php" method="POST">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
            <button type="submit" class="signup-btn">Sign Up</button>
        </form>
    </div>
</body>
</html>

