<?php
// GET variables from deleteEntry.js
$classNameWithWhitespace = $_REQUEST['q']; // Dummy name, see below
$teacher = $_REQUEST['teacher'];

// Add underscores back into className
$className = str_replace(" ","_",$classNameWithWhitespace);

// connect to DB
include 'connect.php';
mysqli_select_db($connection,"classes");

// Delete entry from master list and from teachers db
$sql = "DROP TABLE $className";
$query = mysqli_query($connection,$sql) or die ("Error: Could not delete class from database");
$sql = "DELETE FROM masterlist WHERE name = '$className' ";
$query = mysqli_query($connection,$sql);
  if ($query) {
    // Connect to teachers database
      mysqli_select_db($connection, $teacher) or die('Couldn\'t connect to teacher database');
      $sql = "DELETE FROM classlist WHERE name = '$className' ";
      $query = mysqli_query($connection,$sql) or die('Couldn\'t delete class from master list');

      // Assuming both queries pass, the class will be fully deleted and we need to now display the updated My Classes table
      $sql = "SELECT * FROM classlist";
      $query = mysqli_query($connection,$sql) or die ("Error Could not establish connection to database");

      // Echo out table
      echo "<table id = 'myClasses' class = 'col-md-12'>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Subject</th>
      </tr>";
      while ($entries = mysqli_fetch_assoc($query)) {
        $id = $entries['id'];
        $className = str_replace("_", " ",$entries['name']);
        echo "<tr class = 'classEntry'>
              <td onclick = \"selectentry($id, 'viewclass.php')\">" . $id . "</td>
              <td onclick = \"selectentry($id, 'viewclass.php')\">" . $className . "</td>
              <td onclick = \"selectentry($id, 'viewclass.php')\">" . $entries['subject'] . "</td>
              <td><span class = 'glyphicon glyphicon-plus' onclick = \"deleteEntry($className,'$login_session')\"</span></td>
              </tr>";
      }
      echo "</table>";
}   else {
  echo "Error: could not delete selection";
}
 ?>
