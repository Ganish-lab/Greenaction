<?php
	//ensure that the user has logged in before accessing this page
	session_start();
	if (!isset($_SESSION['username'],$_SESSION['id'])) {
		header("location:login.html");
	}

    $username = $_SESSION['username'];
    echo "Welcome $username";
?>