<?php
include 'connect.php';
/* Following a click event on the searched user field this will trigger a removal
of the user from the login db, remove their own db, and remove them from any classes they
happen to be in. The GET request comes from deleteUser.js */

$username = $_REQUEST['q'];

// Delete user from login table
    mysqli_select_db($connection,"login");
    $sql = "DELETE FROM login WHERE username = '$username'";
    mysqli_query($connection,$sql) or die ("Error: Could not delete user from login database");

// Delete users db
    $sql = "DROP DATABASE $username";
    mysqli_query($connection,$sql) or die ("Error: Could not delete user's database");

// This is needed for the table generated below. Otherwise the username echoed in the confirmation is the last username in the table
$usernameDeleted = $username;

// If user is sucessfully deleted echo confirmation and reload table with users updated
mysqli_select_db($connection,"login");
$sql = "SELECT * FROM login";
$query = mysqli_query($connection,$sql) or die ("Error: Could not regenerate user table");

echo '<table width ="100%" cellpadding="5px" cellspacing="5px" class="db-table">';
echo '<tr><th>ID</th><th>First Name</th><th>Surname</th><th>Username</th><th>User Type</th><th>Year</th><th>Form</th></tr>';
  while($result = mysqli_fetch_assoc($query)) {
    $username = $result['username'];
      echo "<tr>
  <td onclick= \"selectentry('$username')\">" . $result['id'] . "</td>
  <td onclick= \"selectentry('$username')\">" . $result['first_name'] . "</td>
  <td onclick= \"selectentry('$username')\">" . $result['surname'] . "</td>
  <td onclick= \"selectentry('$username')\">" . $result['username'] . "</td>
  <td onclick= \"selectentry('$username')\">" . $result['usertype'] . "</td>
  <td onclick= \"selectentry('$username')\">" . $result['year'] . "</td>
  <td onclick= \"selectentry('$username')\">" . $result['form'] . "</td>
  <td onclick= \"deleteUser('$username')\"> <span class = 'glyphicon glyphicon-minus'></span></td></tr>";
}

echo "</table><br>";
echo "User: " . $usernameDeleted . " was sucessfully deleted";
?>
