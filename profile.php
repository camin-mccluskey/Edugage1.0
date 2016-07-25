<?php
include('connect.php');
include('session.php');
include('bootstrap.html');
set_time_limit (60);
?>
<!DOCTYPE html>
<html>
<head>
<title>Your Home Page</title>
<link href="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"/>
<style media="screen">

.jumbotron {
  text-align: center;
}

.icons {
  margin: 5%;
  transform: scale(1.0);
  transition: all 0.75s ease;
}

.icons:hover {
  transform: scale(1.25);
  transition: all 0.75s ease;
}

#Focus {
  display: none;
  margin: auto;
  width: 50%;
  text-align: center;
}

table {
  text-align: center;
  margin: auto;
  width: 100%;
}

td,th {
  padding: 2%;
  text-align: center;
}

tr:hover {
  background-color: red;
}
</style>
</head>
<body>
<!--Header - external file navbar.html -->
<?php include('navbar.php');
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
</body>
</html>
