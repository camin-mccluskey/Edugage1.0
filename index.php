<!-- landing page for user (need to incorporate previos login script for different user types)-->
<?php
include('login.php'); // Includes Login Script

if(isset($_SESSION['login_user'])){
header("location: profile.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<title>EduGage Homepage </title>
<?php include 'bootstrap.html'; ?>
</head>
<body>
<div id="main">
<h1>EduGage Login</h1>
<div id="login">
<h2>Login Form</h2>
<form action="" method="post" autocomplete="on">
<label>UserName :</label>
<input id="name" name="username" placeholder="username" type="text" required>
<label>Password :</label>
<input id="password" name="password" placeholder="**********" type="password" required>
<input name="submit" type="submit" value=" Login ">
<span><?php echo $error; ?></span>
</form>
</div>
</div>
</body>
</html>
