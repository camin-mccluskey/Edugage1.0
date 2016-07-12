<?php

// get the user inputted answer, question number and the name of quiz
$answer = $_GET["answer"];
$question_no = $_GET["question_no"];
$quizname = $_GET['quizname'];

//query quiz table to find correct answer, compare with user inputted $answer
include 'connect.php';
$sql = "SELECT answer FROM $quizname WHERE question_number = $question_no";
$query = mysqli_query($connection, $sql);

if (isset($query)) {
  $correctanswer = mysqli_fetch_array($query);

  // check if answer matches - strtolower to make statement case insensitive
  if (strtolower($answer) == strtolower($correctanswer[0])) {
    echo $question_no . "Great Work!";
  }
  else if ($answer == "") {
    echo $question_no . "Enter an answer";
  }
  else {
    echo $question_no . "Wrong answer";
  }
}
?>
