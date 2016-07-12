<!-- Code creates quiz entries in teachers quiz table and, if no such table exists, creates one.-->

<?php
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
if (empty($_POST['quiztitle']) || empty($_POST['quiztype']) || empty($_POST['no_questions']) || empty($_POST['timelimit'])) {
$error = "Please Enter All Fields";
echo $error;
}
else {

// Define $quiztitle, $quiztype, $no_questions and $timelimit
$quiztitle = $_POST['quiztitle'];
$quiztype = $_POST['quiztype'];
$no_questions = $_POST['no_questions'];
$timelimit = $_POST['timelimit'];

// Retreive user data from browsing session
$user_check = $_SESSION['login_user'];

// Establishing Connection with Server by passing server_name, user_id and password as a parameter
include 'connect.php';

// To protect MySQL injection for Security purpose
$quiztitle = stripslashes($quiztitle);
$quiztype = stripslashes($quiztype);
$no_questions = stripslashes($no_questions);
$timelimit = stripslashes($timelimit);
// $quiztitle = mysqli_real_escape_string($connection, $quiztitle); // preserve spaces
// $quiztype = mysqli_real_escape_string($connection, $quiztype); // taken out because data is not user inputted
$no_questions = mysqli_real_escape_string($connection, $no_questions);
$timelimit = mysqli_real_escape_string($connection, $timelimit);

// To avoid quizes of the same name
$sql = "SELECT * FROM quizes WHERE quiz_name = '$quiztitle'";
$query = mysqli_query($connection, $sql);
$rows = mysqli_num_rows($query);

if ($rows == 0) {
// Insert new quiz entry into quizes db
  $sql = "INSERT INTO quizes (id, quiz_name, quiz_type, no_questions, time_limit, teacher_name)
  VALUES (NULL, '$quiztitle','$quiztype','$no_questions','$timelimit', '$user_check')";
  $query = mysqli_query($connection, $sql);

if ($query) {
  echo "Quiz Created";
}
else {  echo "Quiz Could Not Be Created";
}
mysqli_close($connection); // Closing Connection
// Stored to use on quiz setup
$_SESSION['quiztype'] = $quiztype;
$_SESSION['no_questions'] = $no_questions;
$_SESSION['quiz_title'] = $quiztitle;
$_SESSION['time_limit'] = $timelimit;

header("location: quizsetup.php");
}
else {
  echo "Quiz of this title exists, please rename quiz.";
}

}
}

?>
