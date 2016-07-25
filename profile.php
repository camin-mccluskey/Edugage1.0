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

#QuizScores {
  display: block;
  float: left;
  border: 1px solid black;
  width: 50%;
}

#QuizScoresGraph {
  display: block;
  float: right;
  border: 1px solid black;
  width: 50%;
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
