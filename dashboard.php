<?php
include 'connect.php';
session_start();

// Check if admin is logged in, otherwise redirect to login page
if (!isset($_SESSION["admin_logged_in"]) || $_SESSION["admin_logged_in"] !== true) {
    header("Location: adminlogin.html");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <nav>
        <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="remove_user.php">Remove User</a></li>
            <li><a href="generate_report.php">Generate Reports</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
    <h1>Welcome, Admin!</h1>
</body>
</html>
