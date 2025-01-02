<?php
// profile.php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // If not logged in, redirect to login page
    header('Location: index.php');
    exit();
}

// Get the username from session
$username = $_SESSION['username'];

if (isset($_POST['logout'])) {
    // Logout the user
    session_unset();
    session_destroy();
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <style>
        .welcome-message {
            color: green;
            font-size: 24px;
            text-align: center;
            margin-top: 50px;
        }
        .logout-btn {
            background-color: red;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 20px;
            cursor: pointer;
            display: block;
            margin: 20px auto;
        }
        .logout-btn:hover {
            background-color: darkred;
        }
    </style>
</head>
<body>

    <div class="welcome-message">
        <p>Welcome, <?php echo htmlspecialchars($username); ?>!</p>
    </div>

    <form method="post" action="profile.php">
        <button type="submit" name="logout" class="logout-btn">Logout</button>
    </form>

</body>
</html>
