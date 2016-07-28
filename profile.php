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

 #triangle1 {
   display: none;
   z-index: 0;
   position: absolute;
   margin-left: 20.7%;
   margin-top: -3.5%;
   padding-top: 0px;
   width: 0;
   height: 0;
   border-bottom: 50px solid #99ddff;
   border-left: 70px solid transparent;
   border-right: 70px solid transparent;
}

#triangle2 {
  display: none;
  z-index: 0;
  position: absolute;
  margin-left: 43%;
  margin-top: -3.5%;
  padding-top: 0px;
  width: 0;
  height: 0;
  border-bottom: 50px solid #99ddff;
  border-left: 70px solid transparent;
  border-right: 70px solid transparent;
}

#triangle3 {
  display: none;
  z-index: 0;
  position: absolute;
  margin-left: 64.7%;
  margin-top: -3.5%;
  padding-top: 0px;
  width: 0;
  height: 0;
  border-bottom: 50px solid #99ddff;
  border-left: 70px solid transparent;
  border-right: 70px solid transparent;
}

.content {
  text-align: center;
  padding-bottom: 0px;
  margin-bottom: 0px;
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
  background-color: #99ddff;
  position: absolute;
  z-index: 1;
  display: none;
  margin-top: 0%;
  width: 100%;
  text-align: center;
  height: 100%;
}

#x-button {
  transform: scale(0.5);
  z-index: 2;
  position: relative;;
  padding: 0px;
  margin-left: 95%;
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
  background-color:  #b3e6ff;
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
