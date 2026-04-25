<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Information Form</title>
    <style>
        body { font-family: sans-serif; margin: 40px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; }
        input { padding: 8px; width: 300px; }
    </style>
</head>
<body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    print("There is a new user created. Process it");
    print($_POST['username']);
    print($_POST['fullname']);
    print($_POST['password']);

    // Create a user using the above information 
    
    $servername = "127.0.0.1";
    $username = "admin";
    $password = "Abc123";
    $dbname = "socialnetA";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    $stmt = $conn->prepare("INSERT INTO account (username, fullname, password, description) VALUES (?, ?, ?, ?)");

    $user = $_POST['username'];
    $full = $_POST['fullname'];
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT); // Always hash passwords!
    $desc = "Hello guys!";
    $stmt->bind_param("ssss", $user, $full, $pass, $desc);

    // 4. Execute the statement
    if ($stmt->execute()) {
        echo "New account created successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // 5. Close statement and connection
    $stmt->close();
    $conn->close();

}
?>
    <h2>User Registration</h2>
    <form action="newuser.php" method="POST">
        <div class="form-group">
            <label for="username">Username (max 20 characters):</label>
            <input type="text" id="username" name="username" maxlength="20" required>
        </div>

        <div class="form-group">
            <label for="fullname">Full Name (max 200 characters):</label>
            <input type="text" id="fullname" name="fullname" maxlength="200" required>
        </div>

        <div class="form-group">
            <label for="password">Password (max 10 characters):</label>
            <input type="text" id="password" name="password" maxlength="10" required>
        </div>

        <button type="submit">Submit</button>
    </form>

</body>
</html>
