<?php
// Determine what data needs to be loaded - classes, notes or quizes
$data = $_REQUEST['q'];

if ($data == "classes") {
// Extract class data from teachers classlist
include 'connect.php'; include 'session.php';
mysqli_select_db($connection, $login_session);

$sql = "SELECT * FROM classlist";
$query = mysqli_query($connection,$sql) or die ("Error Could not establish connection to database");

echo "
<div class = 'row'>
<div class='col-md-12'>
  <h2>My Classes</h2>
<table id = 'myClasses' class = 'col-md-12'>
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
          <td><span class = 'glyphicon glyphicon-minus' onclick = \"deleteEntry('$className','$login_session')\"></span></td>
          </tr>";
  }
echo "</table>
</div>
</div>";
}
?>




<script type="text/javascript" src = "selectentry.js"></script>
<script type="text/javascript" src = "deleteEntry.js"></script>
