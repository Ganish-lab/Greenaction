<?php
// Initialize the session
session_start();

// Include your database connection file
include "connect.php";

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if username is empty
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter username.";
    } else {
        $username = trim($_POST["username"]);
    }

    // Check if password is empty
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter your password.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate credentials
    if (empty($username_err) && empty($password_err)) {
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM users WHERE username = '$username'";

        // Execute the query
        $result = mysqli_query($connect, $sql);

        // Check if username exists, if yes then verify password
        if ($result && mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $id = $row['id'];
            $hashed_password = $row['password'];

            if (password_verify($password, $hashed_password)) {
                // Password is correct, so start a new session
                session_start();

                // Store data in session variables
                $_SESSION["loggedin"] = true;
                $_SESSION["id"] = $id;
                $_SESSION["username"] = $username;

                // Redirect user to profile page
                header("location: home.php");
            } else {
                // Password is not valid, display a generic error message
                $login_err = "Invalid username or password.";
                echo "<script>alert('invalid username or password');</script>";
            }
        } else {
            // Username doesn't exist, display a generic error message
            $login_err = "Invalid username or password.";
            echo "<script>alert('invalid username or password');</script>";
        }
    }

    // Close connection
    mysqli_close($connect);
}
?>
