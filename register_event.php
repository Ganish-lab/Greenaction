<?php
include "connect.php";
if ($_SERVER['REQUEST_METHOD']=='POST') {
    $event_id = $_POST['event_id'];
    $volunteer_id = $_SESSION['id']; //volunteers are also users
    $sql = "INSERT INTO volunteers(event_id, volunteer_id) VALUES($event_id, $volunteer_id)";
    $result = mysqli_query($connect, $sql);
    if ($result) {
        echo "You have successfully registered for the event.";
    } else{
        die(mysqli_error($connect));
    }
}
?>
