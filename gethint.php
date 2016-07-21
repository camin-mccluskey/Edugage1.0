<?php
include 'bootstrap.html';
//Connect to login db
include 'connect.php';
mysqli_select_db($connection,"login");

// get the q parameter from URL
$q = $_REQUEST["q"];
$classname = $_REQUEST["classname"];

// Search Login DB for matches with the search $q and usertype is student
$sql = "SELECT * FROM login WHERE usertype = 'student' AND (username = '$q' OR first_name = '$q' OR surname = '$q')";
$query = mysqli_query($connection,$sql) or die("Error Connecting to database");
$numrows = mysqli_num_rows($query);
if ($numrows > 0) {
  // Echo out table head when there are results
  echo "<table>
        <tr> <th>ID</th> <th>Username</th> <th>First Name</th> <th>Surname</th> <th>Year</th> <th>Form</th> </tr>";
  while ($entries = mysqli_fetch_assoc($query)){
    echo "<tr>
          <td>" . $entries['id'] . "</td>
          <td>" . $entries['username'] . "</td>
          <td>" . $entries['first_name'] . "</td>
          <td>" . $entries['surname'] . "</td>
          <td>" . $entries['year'] . "</td>
          <td>" . $entries['form'] . "</td>
          <td><span class = 'glyphicon glyphicon-plus' onclick = \"addstudent($entries[id],'$classname')\"</span></td>
          </tr>";
  }
  echo "</table>";
}
else if ($numrows == 0) {
  // Display all students intially
    $sql = "SELECT * FROM login WHERE usertype = 'student'";
    $query1 = mysqli_query($connection,$sql) or die("Error Connecting to database");
    // Echo out table
    echo "<table>
          <tr> <th>ID</th> <th>Username</th> <th>First Name</th> <th>Surname</th> <th>Year</th> <th>Form</th> </tr>";
    while ($entries1 = mysqli_fetch_assoc($query1)){
      echo "<tr>
            <td>" . $entries1['id'] . "</td>
            <td>" . $entries1['username'] . "</td>
            <td>" . $entries1['first_name'] . "</td>
            <td>" . $entries1['surname'] . "</td>
            <td>" . $entries1['year'] . "</td>
            <td>" . $entries1['form'] . "</td>
            <td><span class = 'glyphicon glyphicon-plus' onclick = \"addstudent($entries1[id],'$classname')\"</span></td>
            </tr>";
    }
    echo "</table>";
  }
?>
<script type="text/javascript" src = "addstudenttoclass.js"> </script>
