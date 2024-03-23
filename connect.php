<?php
	//connect to db
	$server = 'localhost';
	$user = 'root';
	$password = '';
	$database = 'greenaction';
	//establish connection
	$connect = mysqli_connect($server, $user, $password, $database);
	if (!$connect) {
		die(mysqli_connect_error());
	}


?>