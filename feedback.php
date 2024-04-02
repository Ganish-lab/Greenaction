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
    $feedback_content = mysqli_real_escape_string($connect, $_POST['feedback_content']);

    // Insert feedback into the feedback table
    $sql = "INSERT INTO feedback (volunteer_id, event_id, feedback_content) VALUES ('$volunteer_id', '$event_id', '$feedback_content')";
    $result = mysqli_query($connect, $sql);

    if ($result) {
        header("location: events.php");
    } else {
        echo "Error: " . mysqli_error($connect);
    }
} else {
    echo "Error: Invalid request method.";
}
?>
