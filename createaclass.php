<?php
// Retrieved from teacherprofile.php
$classname_withspaces = $_POST['class_name'];
$subject = $_POST['subject'];

// Remove whitespace from Class Name
$classname = str_replace(" ","_",$classname_withspaces);

// Commit this class to the teacher class list table
// Fetch username
include('session.php');
$teachername = $login_session;
echo $teachername;

include 'connect.php';
mysqli_select_db($connection,$teachername);
$sql = "INSERT INTO classlist (id, name, subject) VALUES (NULL, '$classname', '$subject')";
$query = mysqli_query($connection,$sql) ;
// If class is commited to class list then create its own entry in the classes DB
mysqli_select_db($connection,"classes");
if ($query) {
  $sql = "CREATE TABLE $classname (id INT(20) AUTO_INCREMENT NOT NULL PRIMARY KEY,
  first_name VARCHAR(45) NOT NULL, surname VARCHAR(45) NOT NULL, username VARCHAR(45) NOT NULL)";
  $query = mysqli_query($connection, $sql); // or die ("could not create class");
  echo "Class Created";
}
 ?>
 <!-- Search bar sends ajax request-->
 <h1>Add Students to Class: <?php echo " " . $classname_withspaces ?></h1>
 <form>
 Search Students: <input type="text" onkeyup="showHint(this.value)">
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
          </tr>";
  }
  echo "</table>";
 ?>
 </span></p>

<!--Make this an external script -->
 <script>
 function showHint(str) {
         var xmlhttp = new XMLHttpRequest();
         xmlhttp.onreadystatechange = function() {
             if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                 document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
             }
         };
         xmlhttp.open("GET", "gethint.php?q=" + str, true);
         xmlhttp.send();
     }
 </script>
 ?>
