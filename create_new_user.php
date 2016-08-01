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

	// Create user database
		$sql = "CREATE DATABASE $username";
		$query = mysqli_query($connection,$sql);
			if ($query) {
	// Create entry into login table
		mysqli_select_db($connection,"login");
		$sql = "INSERT INTO login (id, username, password, usertype, first_name, surname, year, form) VALUES (NULL, '$username', 'password', '$usertype', '$firstname', '$surname', '$year', '$form')";
		$query = mysqli_query($connection, $sql) or die ("Error: User not entered to login table");

	// if user is a student create a table for their quiz results and the classes they're a member of
	if ($usertype == "student") {
				mysqli_select_db($connection,$username) or die("Error: Could not connect to User database");
				$sql = "CREATE TABLE quiz_results ( `id` INT(45) NOT NULL AUTO_INCREMENT , `name` VARCHAR(45) NOT NULL , `time_taken` INT(45) NOT NULL , `result` INT(100), PRIMARY KEY (`id`))";
				$query = mysqli_query($connection, $sql) or die("could not create quiz result table");
				$sql = "CREATE TABLE classes ( `id` INT(45) NOT NULL AUTO_INCREMENT , `name` VARCHAR(45) NOT NULL, `teacher` VARCHAR(45) NOT NULL, `subject` VARCHAR(45) NOT NULL, PRIMARY KEY (`id`))";
				$query = mysqli_query($connection, $sql) or die("could not create classes table");
			}
	// If user is a teacher create a table to store their classes
	elseif ($usertype == "teacher") {
		mysqli_select_db($connection,$username) or die("Error: Could not connect to User database");
				$sql = "CREATE TABLE classlist ( `id` INT(45) NOT NULL AUTO_INCREMENT , `name` VARCHAR(45) NOT NULL , `subject` VARCHAR(45) NOT NULL , PRIMARY KEY (`id`))";
				$query = mysqli_query($connection, $sql) or die("could not create classlist table");
	}
}
	else {
		Echo "Error with usertype";
	}
	echo "User: " . $username . " was successfully created";
?>
