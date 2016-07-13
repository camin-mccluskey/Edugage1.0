<?php
session_start();
?>
<!DOCTYPE HTML>
<html lang = en>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<title> Admin Homepage - User Created </title>

	<style>
	.createnewuser {
	width: 49%;
	margin-top: 3px;
	margin-left: 2px;
	border: 1px solid blue;
	padding: 1px;
	}

	.searchuser {
	position: absolute;
	top: 59px;
	right: 1px;
	width: 49%;
	margin-top: 3px;
	margin-right: 2px;
	border: 1px solid green;
	padding: 1px;
	}

	tr:hover {
		background-color: blue;
	}

	button {
	width: 100%;
	}
	</style>
</head>
<body>
	<h2> Admin Homepage. </h2>

<div class="createnewuser">
<legend> Create New User </legend>
  <form method = "POST" action = "create_new_user.php">
    <div class="form-group">
	<Label> First Name </label>
      <input type="text" class="form-control" id="First_Name" name = "First_Name" placeholder="Enter First Name">
    </div>
	<label> Surname </label>
    <div class="form-group">
      <input type="text" class="form-control" id="Surname" name = "Surname" placeholder="Enter Surname">
    </div>
	<div class="form-group">
	<label> Username </label>
      <input type="username" class="form-control" id="Username" name = "Username" placeholder="Enter Username">
    </div>
	<label> User Type </label>
	<div class="form-group">
    <select name="User_Type">
		<option value="student">Student</option>
		<option value="teacher">Teacher</option>
		<option value="administrator">Administrator</option>
	</select>
    </div>
	<label> Year </label>
	<div class="form-group">
      <select name="Year">
		<option value=""> </option>
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
		<option value="5">5</option>
		<option value="6">6</option>
		<option value="7">7</option>
		<option value="8">8</option>
		<option value="9">9</option>
		<option value="10">10</option>
		<option value="11">11</option>
		<option value="12">12</option>
		<option value="13">13</option>
		<option value="14">14</option>
	  </select>
    </div>
	<label> Form </label>
	<div class="form-group">
      <select name="Form">
	  	<option value=""> </option>
		<option value="A">A</option>
		<option value="B">B</option>
		<option value="C">C</option>
		<option value="D">D</option>
		<option value="E">E</option>
		<option value="F">F</option>
		<option value="G">G</option>
		<option value="H">H</option>
		<option value="I">I</option>
		<option value="J">J</option>
		<option value="K">K</option>
		<option value="L">L</option>
		<option value="M">M</option>
		<option value="N">N</option>
		<option value="O">O</option>
		<option value="P">P</option>
		<option value="Q">Q</option>
		<option value="R">R</option>
		<option value="S">S</option>
		<option value="T">T</option>
		<option value="U">U</option>
		<option value="V">V</option>
		<option value="W">W</option>
		<option value="X">X</option>
		<option value="Y">Y</option>
		<option value="Z">Z</option>
	  </select>
    </div>
    <button type="submit" class="btn btn-default">Create User</button>
  </form>
  </div>

<div class="searchuser">
<?php
// connect to the db
 include ("connect.php");
 mysqli_select_db($connection,"login");

//query the database
$query = $_SESSION['query'];
$result = mysqli_query($connection,$query) or die ("Couldn't Find User");
$numrows = mysqli_num_rows($result);

// display values in table
	if($result) {
    echo '<table width ="100%" cellpadding="5px" cellspacing="5px" class="db-table">';
    echo '<tr><th>ID</th><th>First Name</th><th>Surname</th><th>Username</th><th>User Type</th><th>Year</th><th>Form</th></tr>';
      for ($i = 0; $i < $numrows; $i++) {
        $row = mysqli_fetch_assoc($result);
        $username = $row['username'];
			    echo "<tr onclick= \"selectentry('$username')\">
      <td>" . $row['id'] . "</td>
      <td>" . $row['first_name'] . "</td>
      <td>" . $row['surname'] . "</td>
      <td>" . $row['username'] . "</td>
      <td>" . $row['usertype'] . "</td>
      <td>" . $row['year'] . "</td>
      <td>" . $row['form'] . "</td></tr>";
}
    echo "</table><br>";
	}
	else {
		echo "User Does Not Exist";
  }
?>
<script type="text/javascript">
  function selectentry(username) {
    document.cookie = "username="+username;
    window.location = "viewprofile.php";
}
</script>
<a href = "admin_homepage.html"><button btn-default>Reset Search</button><a>
</div>
</body>
</html>
