<?php
// For plus sign on table
include 'bootstrap.html';

// Retrieved from teacherprofile.php
$classname_withspaces = $_POST['class_name'];
$subject = $_POST['subject'];

// Remove whitespace from Class Name
$classname = str_replace(" ","_",$classname_withspaces);

// Commit this class to the teacher class list table
// Fetch username
include('session.php');
$teachername = $login_session;

include 'connect.php';
mysqli_select_db($connection,$teachername);
$sql = "INSERT INTO classlist (id, name, subject) VALUES (NULL, '$classname', '$subject')";
$query = mysqli_query($connection,$sql) ;

// Fetch table ID number
$sql = "SELECT id FROM classlist WHERE name = '$classname' AND subject = '$subject'";
$query = mysqli_query($connection,$sql) or die("Error: Could not retreive class ID nummber");
$id = mysqli_fetch_assoc($query);

// If class is commited to class list then create its own entry in the classes DB
mysqli_select_db($connection,"classes");
if ($query) {
  // Insert class table into teacher DB
  $sql = "CREATE TABLE $classname (id INT(20) AUTO_INCREMENT NOT NULL PRIMARY KEY,
  first_name VARCHAR(45) NOT NULL, surname VARCHAR(45) NOT NULL, username VARCHAR(45) NOT NULL)";
  $query = mysqli_query($connection, $sql) or die ("Error: could not create class table");

 // Insert into masterlist - referencing the ID number
  $sql = "INSERT INTO masterlist (id, name, subject, teacher) VALUES ($id[id], '$classname','$subject','$teachername')";
  $query = mysqli_query($connection,$sql) or die ("Error: Could not create class entry into Masterlist");
  echo "Class Created";
}
 ?>
 <!-- Search bar sends ajax request with value of search and quizname for later use-->
 <h1>Add Students to Class: <?php echo " " . $classname_withspaces ?></h1>
 <form>
 Search Students: <input type="text" onkeyup="showHint(this.value,'<?php echo $classname; ?>')">
 </form>

 <!--Area for students to be displayed -->
 <p><span id="txtHint">
<?php
// Display all students intially
  mysqli_select_db($connection, "login");
  $sql = "SELECT * FROM login WHERE usertype = 'student'";
  $query = mysqli_query($connection,$sql) or die("Error Connecting to database");
  // Echo out table
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
          <td><span class = 'glyphicon glyphicon-plus' onclick = \"addstudent($entries[id],'$classname','$subject')\"</span></td>
          </tr>";
  }
  echo "</table>";
 ?>
 </span></p>

 <p>
   <span id="studentAdded"></span>
 </p>

<!--Make this an external script -->
 <script>
 function showHint(str,classname) {
         var xmlhttp = new XMLHttpRequest();
         xmlhttp.onreadystatechange = function() {
             if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                 document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
             }
         };

         xmlhttp.open("GET", "gethint.php?q=" + str + "&classname=" + classname, true);
         xmlhttp.send();
     }
 </script>
 <!--Script loads the addstudent function on glyphicon press -->
 <script type="text/javascript" src = "addstudenttoclass.js">
 </script>
