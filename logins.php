<?php
// login.php
session_start();

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'userslist');

    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    $query = "SELECT * FROM users WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ss', $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['username'] = $username;
        header('Location: profile.php');
    } else {
        echo "<p style='color: red;'>Invalid username or password.</p>";
    }

    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        .box {
            border: 2px solid orange;
            width: 300px;
            margin: 50px auto;
            padding: 20px;
            border-radius: 15px;
            text-align: center;
        }
        .curved-btn {
            background-color: orange;
            border: none;
            padding: 10px 20px;
            border-radius: 20px;
            color: white;
            cursor: pointer;
        }
        .curved-btn:hover {
            background-color: darkorange;
        }
    </style>
</head>
<body>
    <div class="box">
        <h2>Login</h2>
        <form method="post">
            <div>
                <label>Username</label><br>
                <input type="text" name="username" required><br><br>
            </div>
            <div>
                <label>Password</label><br>
                <input type="password" name="password" required><br><br>
            </div>
            <button type="submit" name="login" class="curved-btn">Login</button>
        </form>
        <p>Didn't have an account? <a href="register.php">Register</a></p>
    </div>
</body>
</html>

