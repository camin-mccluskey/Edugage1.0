<!-- Landing page -->
<?php
// If the user is logged in take them directly to their profile
include('login.php'); // Includes Login Script
if(isset($_SESSION['login_user'])){
header("location: profile.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<title>EduGage Homepage </title>
<?php include ('bootstrap.html');?>
<style media="screen">

  .jumbotron {
    height: 100vh;
  }

  p {
    text-align: center;
  }

  h1 {
    text-align: center;
  }

  form {
    margin: 0 auto;
    width:250px;
    padding-top: 10px;
  }

  input {
    text-align: center;
    border-radius: 5px;
    background-color:  #e6e6e6;
    transition: all 0.5s ease;
  }

  input:focus {
    transition: all 0.5s ease;
    background-color:  #bfbfbf;
  }

  #form {
    margin: auto;
    opacity: 0;
    transition: all 0.7s ease;
  }

  #form:hover {
    opacity: 1;
    transition: all 0.7s ease;
  }
</style>
</head>
<body>
<div class="jumbotron">
  <h1>Welcome to EduGage</h1>
  <p> Log in as an educator or student</p>
<p><span class="glyphicon glyphicon-hand-down"></span></p>
<div id="form">
  <form id="login_form" action="" method="post" autocomplete="on">
  <p><input id="name" name="username" placeholder="username" type="text" onfocus="this.placeholder=''" onblur="this.placeholder = 'username'" required></p>
  <p><input id="password" name="password" placeholder="password" type="password" onfocus="this.placeholder=''" onblur="this.placeholder = 'password'"required></p>
  <p><input class="btn btn-primary btn-lg" name="submit" type="submit" value=" Login "></p>
  <span><?php echo $error; ?></span>
  </form>
</div>
<p><a id="learnMore" class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>
</div>
</body>

</html>
