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

	$usertypetable = "$usertype";

	//create new user in `$usertype` table
	$query = "INSERT INTO $usertypetable (username, first_name, surname, id , year, form)
	VALUES ('$username', '$firstname', '$surname', NULL,'$year', '$form')";
	$result = mysqli_query($connection,$query);

	//check if user was successfully created
	if (!isset($result)) {
	//redirect to admin_homepage.html but with user not created text
		$_SESSION['username'] = $username;
		echo "user " . $username . " couldnt not be created";
	}
	//redirect to admin_homepage.html but with user created text
	else {
  //check the user type to determine the form the users table should time_take
	if ($usertype == "students") {
		//create table to store quizname and score pairs
			$sql = "CREATE TABLE $username (id INT(100) NOT NULL AUTO_INCREMENT PRIMARY KEY, quiz_name VARCHAR(45) NOT NULL,
	  	score INT(100) NOT NULL, time_taken INT(100) NOT NULL)";
			$query = mysqli_query($connection, $sql);
		}
	elseif ($usertype == "teachers") {
		//create table to store ????
			$sql = "CREATE TABLE $username (id INT(100) NOT NULL AUTO_INCREMENT PRIMARY KEY, class_name VARCHAR(45) NOT NULL,
	  	no_pupils INT(100) NOT NULL, subject VARCHAR(45) NOT NULL)";
			$query = mysqli_query($connection, $sql);
	}
	else {
		//create table to store  ????
			$sql = "CREATE TABLE $username (id INT(100) NOT NULL AUTO_INCREMENT PRIMARY KEY, quiz_name VARCHAR(45) NOT NULL,
			score INT(100) NOT NULL, time_taken INT(100) NOT NULL)";
			$query = mysqli_query($connection, $sql);
	}
			// create entry into login table
if($query) {
			$sql = "INSERT INTO login (id, username, password, usertype) VALUES (NULL, '$username', 'password', '$usertype')";
			$query = mysqli_query($connection, $sql);
			var_dump($query);
if($query) {
			$_SESSION['username'] = $username ;
			echo "user " . $username . " was successfully created";
		}
	else {
		echo $username . " could not be created";
	}
		}
	else {
		echo $username . " could not be created";
		}
					}
?>
