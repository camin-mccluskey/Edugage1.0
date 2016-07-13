<?php
// Declare Variables
session_start();
  $quiztype = $_SESSION['quiztype'];
  $no_questions = $_SESSION['no_questions'];
  $quiztitle = $_SESSION['quiz_title'];
  $timelimit = $_SESSION['time_limit'];
  

// Create new table $quizname to store questions and answers
include 'connect.php';
mysqli_select_db($connection,"quizes");

// for single answer or essay style
if (!isset($_SESSION['no_choices'])) {
$quiztitle = str_ireplace(" ", "_", $quiztitle); // Replaces spaces with underscores so the quiztitle can be used in db
$sql = "CREATE TABLE $quiztitle (question_number INT(20) AUTO_INCREMENT NOT NULL PRIMARY KEY,
question VARCHAR(45) NOT NULL,
answer VARCHAR(45) NOT NULL)";
$query = mysqli_query($connection, $sql);

if ($query) {
  // retreive question and answers from quizsetup.php and enter them into quiz table
  for ($i=1; $i < $no_questions + 1; $i++) {
  $question = $_POST["question_$i"];
  $answer = $_POST["answer_$i"];

  $sql = "INSERT INTO $quiztitle (question_number, question, answer) VALUES
  (NULL, '$question', '$answer')";
  $query = mysqli_query($connection, $sql);
  var_dump($query);
}
}
else {
  echo "Quiz could not be created";
}
}
// for multiple choice quizes execute the below
else {
  $answer = "answer_1 VARCHAR(45) NOT NULL";
  for ($i=2; $i < 4 ; $i++) {
    $answer .= ", answer_" . $i . " VARCHAR(45) NOT NULL";
  }
  $quiztitle = str_ireplace(" ", "_", $quiztitle); // Replaces spaces with underscores so the quiztitle can be used in db
  $sql = "CREATE TABLE $quiztitle (question_number INT(20) AUTO_INCREMENT NOT NULL PRIMARY KEY,
  question VARCHAR(45) NOT NULL," . $answer . ")";
  $query = mysqli_query($connection, $sql);
  if ($query) {
    // retreive question and answers from quizsetup.php and enter them into quiz table
    for ($i=1; $i < $no_questions + 1; $i++) {
    $question = $_POST["question_$i"];
    $answer = $_POST["answer_$i"];

    $sql = "INSERT INTO $quiztitle (question_number, question, answer) VALUES
    (NULL, '$question', '$answer')";
    $query = mysqli_query($connection, $sql);
    var_dump($query);
  }
  }
  else {
    echo "Quiz could not be created";
  }
}


?>
