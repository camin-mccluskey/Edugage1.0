<!--Set the navar bar up for a teacher -->
<script type="text/javascript">
  function setActive() {
    document.getElementById('pill1').className = "active";
  }
  window.onLoad = setActive();
</script>
<?php include 'bootstrap.html';?>

<!--Main div with (at present) 3 icons -->
<div class="content">
  <a href="#"><img class="icons" onclick="DisplayQuizScores(triangle1)" src="user.png" alt="" /></a>
  <a href="#"><img class="icons" onclick="DisplayQuizScores(triangle2)" src="notes.png" alt="" /></a>
  <a href="#"><img class="icons" onclick="DisplayQuizScores(triangle3)" src="quiz.png" alt="" /></a>
</div>
<!-- The nice little triangular shape that appears -->
  <div id="triangle1"></div>
  <div id="triangle2"></div>
  <div id="triangle3"></div>
<!-- This is where the content is loaded depending on what is clicked -->
<div id="Focus">
    <!-- Button to close content div -->
    <img id="x-button" onclick="closeDropdown()" src="cross.png" alt="" />
    <!-- Import the content from loadContent.js down here-->
    <div id="content"></div>
</div>
<!-- import this sweet ajax function -->
<script type="text/javascript" src="loadContent.js"></script>
<script type="text/javascript">
  function DisplayQuizScores(icon) {
      // set focus and all triangles to display: none to initalise
      document.getElementById('Focus').style.display = 'none';
      document.getElementById('triangle1').style.display = 'none';
      document.getElementById('triangle2').style.display = 'none';
      document.getElementById('triangle3').style.display = 'none';

      // GENERATE DROP DOWN
      if (icon == triangle1) {
        document.getElementById('Focus').style.display = 'block';
        document.getElementById('triangle1').style.display = 'block';
        // generate content for classes dropdown
        loadContent("classes", "content", "teacherData.php");
      }
      else if (icon == triangle2) {
        document.getElementById('Focus').style.display = 'block';
        document.getElementById('triangle2').style.display = 'block';
        // generate content for quizes dropdown
        loadContent("notes", "content", "studentData.php");
      }
      else {
        document.getElementById('Focus').style.display = 'block';
        document.getElementById('triangle3').style.display = 'block';
        // generate content for notes dropdown
        loadContent("quizes", "content", "studentData.php");
      }
  }
function closeDropdown() {
  document.getElementById('Focus').style.display = 'none';
  document.getElementById('triangle1').style.display = 'none';
  document.getElementById('triangle2').style.display = 'none';
  document.getElementById('triangle3').style.display = 'none';
}
</script>
<!--
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
enter php tag!!!! while ($entries = mysqli_fetch_assoc($query)) {
    $id = $entries['id'];
    $className = str_replace("_", " ",$entries['name']);
    echo "<tr class = 'classEntry'>
          <td onclick = \"selectentry($id, 'viewclass.php')\">" . $id . "</td>
          <td onclick = \"selectentry($id, 'viewclass.php')\">" . $className . "</td>
          <td onclick = \"selectentry($id, 'viewclass.php')\">" . $entries['subject'] . "</td>
          <td><span class = 'glyphicon glyphicon-minus' onclick = \"deleteEntry('$className','$login_session')\"></span></td>
          </tr>";
  }    CLOSE PHP TAG!!
</table>
</div>
</div>
<script type="text/javascript" src = "selectentry.js"></script>
<script type="text/javascript" src = "deleteEntry.js"></script>
