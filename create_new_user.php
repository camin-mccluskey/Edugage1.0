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
		mysqli_select_db($connection,$username);
			if ($query) {
	// if user is a student create a table for their quiz results
	if ($usertype == "student") {
				$sql = "CREATE TABLE quiz_results ( `id` INT(45) NOT NULL AUTO_INCREMENT , `name` VARCHAR(45) NOT NULL , `time_taken` INT(45) NOT NULL , `result` INT(100), PRIMARY KEY (`id`))";
				$query = mysqli_query($connection, $sql) or die("could not create quiz result table");
			}
	// If user is a teacher create a table to store their classes
	elseif ($usertype == "teacher") {
				$sql = "CREATE TABLE classlist ( `id` INT(45) NOT NULL AUTO_INCREMENT , `name` VARCHAR(45) NOT NULL , `subject` VARCHAR(45) NOT NULL , PRIMARY KEY (`id`))";
				$query = mysqli_query($connection, $sql) or die("could not create classlist table");
	}

	else {
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
				}
		else {
		echo "user exists, please chose another username";
	}
?>
