<?php
// Retreive number of questions to cycle through each and save result to db

$id = $_COOKIE['id'];
include 'connect.php';
mysqli_select_db($connection,"quizes");
session_start();
$sql = "SELECT * FROM master_list WHERE id = $id";
$query = mysqli_query($connection,$sql);
$result  = mysqli_fetch_assoc($query);
$numquestions = $result['no_questions'];
// insert _ in place of spaces for db search
$x = $result['name'];
$quizname = str_replace(" ", "_", $x);

$pupil = $_SESSION['login_user'];
// intialise score
$score = 0;
// cycle through user inputted answers and save them to answer array
for ($i= 1; $i < $numquestions + 1; $i++) {
  $answerno = "answer_".$i;
  $answer = $_POST[$answerno];

// select correct answers from db and compare each to the given answer
$sql = "SELECT answer FROM $quizname WHERE question_number = $i";
$query = mysqli_query($connection, $sql);
$correctanswer = mysqli_fetch_array($query);

if (strtolower($answer) == strtolower($correctanswer[0])) {
      $score++;
}
else {
  $score = $score;
}
}
// express score as a percentage
$finalscore = ($score/$numquestions)*100;
// Record time taken to complete quiz in seconds
$time_post = time();
$time_pre = $_SESSION['quizstart'];
$time_taken = $time_post - $time_pre;

// enter final score into pupil quiz result database
$quizname = str_replace("_", " ", $quizname);
// change to user data base
mysqli_select_db($connection,$pupil);
$sql = "INSERT INTO quiz_results (quiz_name, score, time_taken) VALUES ('$quizname','$finalscore', '$time_taken')";
$query = mysqli_query($connection,$sql);
  if ($query) {
    echo "Your score was " . $score . " out of " . $numquestions . " = " . $finalscore . " % <br>";
    echo "You took " . $time_taken . " seconds to complete the quiz";
}
  else {
    echo "Your score was not registered";
}
?>
