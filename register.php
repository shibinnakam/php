<?php
// Database connection
$servername = "localhost";  // Update with your database host
$username = "root";         // Update with your database username
$password = "";             // Update with your database password
$dbname = "userslist";      // Database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize variables
$message = "";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user input from the form
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // Prepare SQL statement to insert the data into users table (no password hashing)
    $sql = "INSERT INTO users (username, password) VALUES ('$user', '$pass')";

    // Execute the query and check for success
    if ($conn->query($sql) === TRUE) {
        $message = "Registration successful!";
    } else {
        $message = "Error: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .form-box {
            background-color: white;
            padding: 30px;
            border-radius: 20px;
            border: 2px solid orange; /* Thin orange border outside the box */
            width: 300px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 10px;
            border: 1px solid #ccc;
            font-size: 16px;
        }
        input:focus {
            outline: none;
            border-color: #007BFF;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: blue; /* Blue register button */
            color: white;
            border: none;
            border-radius: 20px; /* Side curved button */
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: darkblue;
        }
        p {
            text-align: center;
            color: green;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="form-box">
            <h2>Register</h2>

            <?php
            // Display message if set
            if (!empty($message)) {
                echo "<p>$message</p>";
            }
            ?>

            <form method="POST" action="register.php">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" required><br><br>
                
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" required><br><br>
                
                <button type="submit">Register</button>
 <p>If you register then? <a href="index.php">login</a></p>

            </form>
        </div>
    </div>

</body>
</html>
