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

    // Check if event_id exists in events table
    $check_event_sql = "SELECT event_id FROM events WHERE event_id = '$event_id'";
    $check_event_result = mysqli_query($connect, $check_event_sql);

    if (mysqli_num_rows($check_event_result) > 0) {
        // Construct SQL query
        $sql = "INSERT INTO volunteers (volunteer_id, event_id) VALUES ('$volunteer_id', '$event_id')";

        // Execute query
        $result = mysqli_query($connect, $sql);

        // Check for errors
        if ($result) {
            echo "You have successfully registered for the event.";
        } else {
            echo "Error: " . mysqli_error($connect);
        }
    } else {
        echo "Error: Event does not exist.";
    }
}
?>
