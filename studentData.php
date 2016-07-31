<?php
include 'connect.php';
// Specified data type from loadContent.js
$dataRequest = $_GET['q'];
 if ($dataRequest == "quizes") {
   include 'displayUserQuizData.php';
 }
 elseif ($dataRequest == "classes") {
   include 'session.php';
   mysqli_select_db($connection, $login_session);
   $sql = "SELECT * FROM classes";
   $query = mysqli_query($connection,$sql) or die ("Error: Could not load your classes");
   while ($class = mysqli_fetch_assoc($query)) {
     echo $class['id'] . " " . $class['name'];
   }
 }
 elseif ($dataRequest == "notes") {
   echo "retrieve notes data";
 }
 else {
   echo "Error: Could not retreive user data";
 }
 ?>
