<?php
include('connect.php');
include('session.php');
set_time_limit (60);
?>
<!DOCTYPE html>
<html>
<head>
<title>Your Home Page</title>
</head>
<body>
<div id="profile">
<b id="welcome"> User : <i><?php echo $login_session; ?></i></b>
<b id="logout"><a href="logout.php">Log Out</a></b>

<?php
$usertype = $_SESSION['usertype'];
if ($usertype == "student") {
include('studentprofile.php');
}
else if ($usertype == "teacher") {
include('teacherprofile.php');
}
else if ($usertype == "administrator") {
echo "<br> <a href = 'admin_homepage.html'> Create or Search User";
}
else {
  echo "Error";
}
?>
</div>
</body>
</html>
