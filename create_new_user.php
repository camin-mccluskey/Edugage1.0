<?php
	//connect to server and start browsing session
	session_start();
	include ("connect.php");

	//retrieve user information from admin_homepage.html
	$firstname	= $_POST["First_Name"];
	$surname	= $_POST["Surname"];
	$username	= $_POST["Username"];
	$usertype	= $_POST["User_Type"];
	$year		= $_POST["Year"];
	$form		= $_POST["Form"];

	//connect to login table
	mysqli_select_db($connection,"login");

	// Create user database
		$sql = "CREATE DATABASE $username";
		$query = mysqli_query($connection,$sql);
		if ($query) {
				// Create entry in login table
				$sql = "INSERT INTO login (id, username, password, usertype, first_name, surname, year, form) VALUES (NULL, '$username', 'password', '$usertype', '$firstname', '$surname', '$year', '$form')";
				$query = mysqli_query($connection, $sql);
					if ($query) {
						echo "User Created";
					}
						else {
							echo "User could not be created";
						}
				}
		else {
		echo "user exists, please chose another username";
	}
?>
