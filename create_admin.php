<?php
include 'connect.php';
// Hash the password
$password = password_hash("admin@254", PASSWORD_DEFAULT);

// Insert admin user into the users table
$sql = "INSERT INTO users (username, password) VALUES ('admin', '$password')";

if ($connect->query($sql) === TRUE) {
    echo "Admin user created successfully";
} else {
    echo "Error creating admin user: " . $connect->error;
}

// Close the connection
$connect->close();
?>
