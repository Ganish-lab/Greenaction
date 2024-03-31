<?php
include 'connect.php';
session_start();

// Check if admin is logged in and user agent matches, otherwise redirect to login page
// Check if user is logged in, if not redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.html");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
   
    <div class="container mt-5">
        <h1>Welcome, Admin</h1>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item"><a class="nav-link" href="home.php"><button class="btn btn-primary">Home</button></a></li>
            <li class="nav-item"><a class="nav-link" href="remove_user.php"><button class="btn btn-primary">Remove User</button></a></li>
            <li class="nav-item"><a class="nav-link" href="generate_report.php"><button class="btn btn-primary">Generate Reports</button></a></li>
            <li class="nav-item"><a class="nav-link" href="logout.php"><button class="btn btn-danger">Logout</button></a></li>
        </ul>
    </nav>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
