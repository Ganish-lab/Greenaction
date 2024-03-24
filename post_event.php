<?php
	//ensure that the user has logged in before accessing this page
	session_start();
	if (!isset($_SESSION['username'],$_SESSION['id'])) {
		header("location:login.html");
	}
$user_id = $_SESSION['id'];
include "connect.php";
if ($_SERVER['REQUEST_METHOD']=='POST') {
    $event_name = $_POST['event_name'];
    $deadline = $_POST['deadline'];
    $event_time = $_POST['event_time']; 
    $stakeholder = $_POST['stakeholder'];
    $location = $_POST['location']; 
    $sql = "INSERT INTO events(event_name, deadline, event_time, stakeholder, location, user_id) VALUES('$event_name', '$deadline', '$event_time', '$stakeholder', '$location', $user_id)";
    $result = mysqli_query($connect, $sql);
    if ($result) {
        header("location:events.php");
    } else{
        die(mysqli_error($connect));
    }
}
?>
