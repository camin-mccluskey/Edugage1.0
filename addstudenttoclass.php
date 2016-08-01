<?php
include 'session.php';
// ID of student Retrieved from onclick() event handler through addstudenttoclass.js
$id = $_REQUEST["q"];
$classname = $_REQUEST["classname"];
$subject = $_REQUEST["subject"];

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

// Check that only one user is selected, then add that user to the class
$numrows = mysqli_num_rows($query);
if ($numrows == 1) {

// First check student isnt already in class to avoid double entries
$sql = "SELECT * FROM $classname WHERE id = $id";
$query = mysqli_query($connection,$sql);
$userpresent = mysqli_num_rows($query);
  if ($userpresent == 0) {
    $sql = "INSERT INTO $classname (id,first_name,surname,username) VALUES ($id, '$firstname', '$surname', '$username')";
    $query = mysqli_query($connection,$sql) or die("Error: Student could not be added to class");

    //Add class to the users 'classes' table
    mysqli_select_db($connection,$username);
    $sql = "INSERT INTO classes (id, name, teacher, subject) VALUES ($id, '$classname', '$login_session', '$subject')";
    $query = mysqli_query($connection,$sql);
      if ($query) {
        echo "Student - " . $student['first_name'] . " " . $student['surname'] . " " . "was added to class";
      }  else {
         echo "Error: student could not be added to class";
    }
  }
  else {
    echo "Error: student is already in that class";
  }
}
else {
  echo "Error: More than one student selected";
}
 ?>
