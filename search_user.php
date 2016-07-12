<?php
//start session for later
session_start();

//get search parameters from admin_homepage.html
	$firstname	= $_POST["First_Name"];
	$surname	= $_POST["Surname"];
	$username	= $_POST["Username"];
	$usertype	= $_POST["User_Type"];
	$year		= $_POST["Year"];
	$form		= $_POST["Form"];

//set the query. note the .= operator to append values to string
$values = "";
if (!empty($firstname)) {
	$value1  = " AND first_name = '$firstname' ";
}
else {
	$value1 = "";
}
if (!empty($surname)) {
	$value2 = " AND surname = '$surname' ";
}
else {
	$value2 = "";
}
if (!empty($username)) {
	$value3 = " AND username = '$username' ";
}
else {
	$value3 = "";
}
if (!empty($year)) {
	$value4 =  " AND year = '$year' ";
}
else {
	$value4 = "";
}
if (!empty($form)) {
	$value5 = " AND form = '$form' ";
}
else {
	$value5 = "";
}

$values .= $value1 .= $value2 .= $value3 .= $value4 .= $value5;

//query the table

$query = "SELECT * FROM login WHERE id != 0 $values";
$_SESSION['query'] = $query;
header("Location: admin_homepage_searched_user.php");
?>
