<?php
// Retrieved from teacherprofile.php
$classname = $_POST['class_name'];
$subject = $_POST['subject'];

// Remove whitespace from Class Name
$classname = str_replace(" ","_",$classname);

// Commit this class to the teacher class list table
// Fetch username
include('session.php');
$teachername = $login_session;
echo $teachername;

include 'connect.php';
mysqli_select_db($connection,$teachername);
$sql = "INSERT INTO classlist (id, name, subject) VALUES (NULL, '$classname', '$subject')";
$query = mysqli_query($connection,$sql) ;
// If class is commited to class list then create its own entry under the teachername
if ($query) {
  $sql = "CREATE TABLE $classname (id INT(20) AUTO_INCREMENT NOT NULL PRIMARY KEY,
  first_name VARCHAR(45) NOT NULL, surname VARCHAR(45) NOT NULL, username VARCHAR(45) NOT NULL)";
  $query = mysqli_query($connection, $sql) or die ("could not create class");
  echo "Class Created";
}
 ?>
