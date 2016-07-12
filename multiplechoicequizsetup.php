<!-- if user has selected a multiple choice type quiz then load this page -->
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Multiple Choice Quiz Set-up</title>
    <link rel="stylesheet" href="quizsetup.css" media="screen" title="no title" charset="utf-8">
  </head>
  <body>
<?php
// Declare Variables
session_start();
  $quiztype = $_SESSION['quiztype'];
  $no_questions = $_SESSION['no_questions'];
  $quiztitle = $_SESSION['quiz_title'];
  $timelimit = $_SESSION['time_limit'];

?>
<h1>Enter Questions and Answers for <?php echo $quiztitle; ?></h1>
<!-- Gather #choices for each answer -->
<form class='' action='' method='post'>
  <input type='number' id = 'no_choices' name="no_choices" value=''>
  <input type="submit" id = "submit" name="submit" value="Generate Quiz">
</form>
<?php
    // Gather #choices for each answer and procede if they're entered
    if (isset($_POST['no_choices'])) {
    $no_choices = $_POST['no_choices'];
    if (is_numeric($no_choices)) {
    if ($no_choices !== 0) {

    // Insert number of choices in the quizes table as no_choices
    include 'connect.php';
    $sql = "UPDATE quizes SET no_options = '$no_choices' WHERE quiz_name = '$quiztitle'";
    $query = mysqli_query($connection, $sql);
    if ($query) {
    // echo form for question and answer input
    echo
    "<form action = 'process_quiz.php' method = 'POST'>";
      for ($i=1; $i < $no_questions + 1; $i++) {
    echo
     "<div class = 'QandA'>
     <label class = 'question'>Question $i</label> <br>
      <input type = 'text' id = \"question_$i\"> <br>";
      // echo through multiple choice fields. Note: use $j because $i already denotes Q and A pair
    for ($j=1; $j< $no_choices + 1; $j++) {
      echo "<label class = 'multipleanswer'>Answer $i .$j</label> <br>
      <input type = 'text' id = \"answer_$i . $j\"> <br>";
    }
      echo "</div>";
    }
    echo
    "<input type ='submit' id = \"submit\">
    </form>";

// save number of choices to session
    $_SESSION['no_choices'] = $no_choices;
}
else {
  echo "Could not register with quiz database";
}
}
else {
    echo "please enter a valid number of multiple choice options";
  }
}
else {
  echo "please enter a valid number of multiple choice options";
}
}
else {
  echo "Please input number of multiple answer choices";
}
?>
</body>
</html>
