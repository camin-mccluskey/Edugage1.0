<?php
// Specified data type from loadContent.js
$dataRequest = $_GET['q'];
 if ($dataRequest == "quizes") {
   include 'displayUserQuizData.php';
 }
 elseif ($dataRequest == "classes") {
   echo "retrieve class data";
 }
 elseif ($dataRequest == "notes") {
   echo "retrieve notes data";
 }
 else {
   echo "Error: Could not retreive user data";
 }
 ?>
