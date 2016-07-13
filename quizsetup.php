<!-- page for user to enter quiz questions and answers-->
<?php
// Declare Variables
session_start();
  $quiztype = $_SESSION['quiztype'];
  $no_questions = $_SESSION['no_questions'];
  $quiztitle = $_SESSION['quiz_title'];
  $timelimit = $_SESSION['time_limit'];
  ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Create Quiz</title>
    <?php
    include('bootstrap.html');
    ?>
    <style media="screen">
      .QandA {
        border: 1px ridge black;
        background: #ffffff;
        background: -moz-linear-gradient(45deg,  #ffffff 0%, #f1f1f1 50%, #e1e1e1 51%, #f6f6f6 100%);
        background: -webkit-linear-gradient(45deg,  #ffffff 0%,#f1f1f1 50%,#e1e1e1 51%,#f6f6f6 100%);
        background: linear-gradient(45deg,  #ffffff 0%,#f1f1f1 50%,#e1e1e1 51%,#f6f6f6 100%);
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#f6f6f6',GradientType=1 );
        margin: 1%;
      }
      input {
        width: 50%;
        margin: 2%;
      }
    </style>
  </head>
  <body>
    <h1>Enter Quiz Questions and Answers for <?php echo $quiztitle ?></h1>
    <?php
    // Find out Quiz type - Multiple Choice, Single Answer, or Essay
    if ($quiztype == "multiple choice") {
      header("location: multiplechoicequizsetup.php");
      }
    elseif ($quiztype == "single answer") {
    echo
    "<form action = 'process_quiz.php' method = 'POST'>";
      for ($i=1; $i < $no_questions + 1; $i++) {
    echo
     "<div class = 'QandA'>
     <label class = 'question'>Question $i</label> <br>
      <input type = 'text' name = \"question_$i\" id = 'question_$i'> <br>
      <label class = 'singleanswer'>Answer $i</label> <br>
      <input type = 'text' name = \"answer_$i\" id = 'answer_$i'> <br>
      </div>";
    }
    echo
    "<input type ='submit' id = 'submit'>
    </form>";
    }
    elseif ($quiztype == "essay") {
      echo
      "<form action = 'process_quiz.php' method = 'POST'>";
        for ($i=1; $i < $no_questions + 1; $i++) {
      echo
       "<div class = 'QandA'
        <label class = 'question'>Question $i</label> <br>
        <input type = 'text' name = \"question_$i\" id = 'question $i'> <br>
        <label class = 'essayanswer'>Answer $i</label> <br>
        <input type = 'text' name = \"answer_$i\" id = 'answer $i'> <br>
        </div>";
      }
      echo
      "<input type ='submit' id = 'submit'>
      </form>";
    }
    else {
      "Please enter all fields";
    }
     ?>
  </body>
</html>
