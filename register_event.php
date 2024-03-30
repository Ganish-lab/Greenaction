<?php
// Ensure that the user has logged in before accessing this page
include "connect.php";
session_start();
if (!isset($_SESSION['username'], $_SESSION['id'])) {
    header("location:login.html");
    exit(); // Terminate script to prevent further execution
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Assuming event_id is an integer
    $event_id = intval($_POST['event_id']);
    $volunteer_id = $_SESSION['id']; // Volunteers are also users

    // Sanitize inputs
    $volunteer_id = mysqli_real_escape_string($connect, $volunteer_id);
    $event_id = mysqli_real_escape_string($connect, $event_id);

    // Check if the volunteer has already registered for the event
    $check_duplicate_sql = "SELECT * FROM volunteers WHERE volunteer_id = '$volunteer_id' AND event_id = '$event_id'";
    $check_duplicate_result = mysqli_query($connect, $check_duplicate_sql);

    if (mysqli_num_rows($check_duplicate_result) > 0) {
        // Volunteer has already registered for the event
        echo "You have already registered for this event.";
    } else {
        // Proceed with registration
        // Construct SQL query
        $sql = "INSERT INTO volunteers (volunteer_id, event_id) VALUES ('$volunteer_id', '$event_id')";

        // Execute query
        $result = mysqli_query($connect, $sql);

        // Check for errors
        if ($result) {
            // After successful registration
            echo "Registration successful!";
        } else {
            // Error occurred during registration
            echo "Error: " . mysqli_error($connect);
        }
    }
} else {
    echo "Error: Invalid request method.";
}
?>
