<?php
// Ensure that the user has logged in before accessing this page
include "connect.php";
session_start();
if (!isset($_SESSION['username'],$_SESSION['id'])) {
    header("location:login.html");

}
if ($_SERVER['REQUEST_METHOD']=='POST') {
    // Assuming event_id is an integer
    $event_id = intval($_POST['event_id']);
    $volunteer_id = $_SESSION['id']; // Volunteers are also users
    // Ensure event_id and volunteer_id are correctly formatted for the SQL query
    $sql = "INSERT INTO volunteers(event_id, volunteer_id) VALUES($event_id, $volunteer_id)";
    $result = mysqli_query($connect, $sql);
    if ($result) {
        echo "You have successfully registered for the event.";
    } else {
        // Display a detailed error message
        die("Error: " . mysqli_error($connect));
    }
}

?>
