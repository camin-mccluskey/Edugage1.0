<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  <?php include 'bootstrap.html'; include 'session.php';?>
  </head>
  <body>
    <h1>I picked this class</h1>
  </body>
<?php
  // Fetch Quiz id from selectEntry() on teacherprofile.php page
     $quizID = $_COOKIE['id'];

  // Connect to DB
     include 'connect.php';
     mysqli_select_db($connection, "classes");

 // Select the quiz from teachers db and then the classes list
     $sql = "SELECT name FROM masterlist WHERE id = $quizID";
     $query = mysqli_query($connection,$sql) or die("Error: Could not retrieve quiz name data from masterlist");
     $quizName = mysqli_fetch_assoc($query);
      if ($query) {

 // Select all the data about pupils from the class listing and display as a table
        $sql = "SELECT * FROM $quizName[name]";
        $query = mysqli_query($connection,$sql) or die("Error: Could not retrieve students from class listing");
        ?>

    <table>
      <tr>
        <th>First Name</th>
        <th>Surname</th>
        <th>Username</th>
      </tr>
      <?php
        while ($entries = mysqli_fetch_assoc($query)) {
          echo "<tr class = 'studentEntry'>
                <td>" . $entries['first_name'] . "</td>
                <td>" . $entries['surname'] . "</td>
                <td>" . $entries['username'] . "</td>
                <td><span class = 'glyphicon glyphicon-plus'></span></td>
                </tr>";
        }

    }
?>
</html>
