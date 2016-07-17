<?php
// ID of student Retrieved from onclick() event handler
$id = $_REQUEST["q"];
$classname = $_REQUEST["classname"];

// Connect to db
include 'connect.php';
mysqli_select_db($connection,"login");

// Retrieve student info from login table
$sql = "SELECT * FROM login WHERE id = $id";
$query = mysqli_query($connection,$sql) or die ("Error");
$student  = mysqli_fetch_assoc($query);

// create the input fields for the db
$firstname = $student['first_name'];
$surname  = $student['surname'];
$username = $student['username'];
// Switch DB to classes
mysqli_select_db($connection,"classes");

// Check that only one user is selected (hopefully unnessecary), then add that user to the class
$numrows = mysqli_num_rows($query);
if ($numrows == 1) {
  $sql = "INSERT INTO $classname (id,first_name,surname,username) VALUES ($id, '$firstname', '$surname', '$username')";
  $query = mysqli_query($connection,$sql);
    if ($query) {
      echo "Student - " . $student['first_name'] . " " . $student['surname'] . " " . "was added to class";
    } else {
      echo "Error: student could not be added to class";
    }
}
else {
  echo "Error: More than one student selected";
}
 ?>
