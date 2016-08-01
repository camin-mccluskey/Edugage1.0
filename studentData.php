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
   echo "<h3> Your Classes </h3>
   <table>
         <tr>
         <th> Class Name </th>
         <th> Subject </th>
         <th> Teacher </th>
         </tr>";
   while ($class = mysqli_fetch_assoc($query)) {
     echo "<tr>
           <td>" . $class['name'] . "</td>
           <td>" . $class['subject'] . "</td>
           <td>" . $class['teacher'] . "</td>
           </tr>";
         }
 }
 elseif ($dataRequest == "notes") {
   echo "retrieve notes data";
 }
 else {
   echo "Error: Could not retreive user data";
 }
 ?>
