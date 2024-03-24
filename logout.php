<?php
	//logout a user
	session_start();
	session_destroy();
	header("location:login.html");
?>