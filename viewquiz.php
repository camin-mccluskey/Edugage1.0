<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  </head>
  <body>
   <?php
include 'connect.php';
// Starts timer
session_start();
$quiz_start = time();
$_SESSION['quizstart'] = $quiz_start;
// Retrieve selected quiz data
$id = $_COOKIE['id'];
$sql = "SELECT * FROM quizes WHERE id = $id";
$result = mysqli_query($connection, $sql);
$result = mysqli_fetch_assoc($result);
$quizname =  $result['quiz_name'];
$quiztype = $result['quiz_type'];

//if quiz in single answer type
if ($quiztype == 'single answer') {
echo "<h1>" . $quizname . "</h1>";
//Fetch Question and Answer pairs
$quizname = str_replace(" ","_",$quizname); // Inserts underscores to search quiz
$sql = "SELECT * FROM $quizname";
$query = mysqli_query($connection, $sql);

// Check quiz has entry in db
if ($query !== 0) {

$numrows = mysqli_num_rows($query);

// Present quiz questions, and store quiz answers as variables
  echo "<form action = 'quizresult.php' method = 'POST'";
  for ($i = 1; $i < $numrows + 1; $i++) {
    $result = mysqli_fetch_assoc($query);
    echo  "<br>" . "Question $i <br>" . $result['question'] . "<br>
    <input type = 'text' name = 'answer_$i' id = 'answer_$i' placeholder = 'Enter Answer Here' onkeyup = 'checkanswers(value,\"$i\",\"$quizname\")'> <br>
    <p id = \"$i\"> Enter an Answer</p>";
  }
  echo "<input type = 'submit' name = 'submit'>
        </form>";
}
}
// if quiz is multiple choice
elseif ($quiztype == 'multiple choice') {
  echo "multiple choice";
}
?>
<!-- Loads script that takes inputs and checks answers against db to return sucess or failure icons -->
<script src = "dynamicquery.js"></script>
</body>
</html>
