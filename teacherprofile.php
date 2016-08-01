<!--Set the navar bar up for a teacher -->
<script type="text/javascript">
  function setActive() {
    document.getElementById('pill1').className = "active";
  }
  window.onLoad = setActive();
</script>
<?php
include 'bootstrap.html';
echo "<br> <a href='createquiz.php'> Create Quiz </a>";

// Extract class data from teachers classlist
include 'connect.php';
mysqli_select_db($connection,$login_session);

$sql = "SELECT * FROM classlist";
$query = mysqli_query($connection,$sql) or die ("Error Could not establish connection to database");

 ?>
 <div class = "row">
 <div class="col-md-6" style="border: 1px black solid">
 <h2>Create a Class:</h2>
<form class="col-md-12" action="createaclass.php" method="post" style="border: 1px black solid">
  <input type="text" name="class_name" value="" placeholder="Input Class Name"></input> <br>
  <input type="text" name="subject" value="" placeholder="Input Subject"></input> <br>
  <input type="submit" name="name" value="Create"></input>
</form>
  </div>
<div class="col-md-6" style="border: 1px black solid">
  <h2>My Classes</h2>
<table id = "myClasses" class = "col-md-12">
<tr>
  <th>ID</th>
  <th>Name</th>
  <th>Subject</th>
</tr>
  <?php while ($entries = mysqli_fetch_assoc($query)) {
    $id = $entries['id'];
    $className = str_replace("_", " ",$entries['name']);
    echo "<tr class = 'classEntry'>
          <td onclick = \"selectentry($id, 'viewclass.php')\">" . $id . "</td>
          <td onclick = \"selectentry($id, 'viewclass.php')\">" . $className . "</td>
          <td onclick = \"selectentry($id, 'viewclass.php')\">" . $entries['subject'] . "</td>
          <td><span class = 'glyphicon glyphicon-minus' onclick = \"deleteEntry('$className','$login_session')\"></span></td>
          </tr>";
  } ?>
</table>
</div>
</div>
<script type="text/javascript" src = "selectentry.js"></script>
<script type="text/javascript" src = "deleteEntry.js"></script>
