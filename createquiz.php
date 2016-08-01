<?php
include('session.php');
include ('quiz.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Create A New Quiz</title>
    <?php include 'bootstrap.html'; include 'navbar.php';?>
    <style media="screen">
      .quiztype {
        border: 2px solid black;
      }
      input[type=radio] {
        border-left: 50%;
      }
    </style>
  </head>
  <body>
    <h1>Create New Quiz</h1>
    <!-- form to input quiz type, length and other parameters to be added -->
  <form id = "newquiz" class="" action="" method="post">
  <div class="quiztype">
          <p><label for="">Quiz Title</label></p>
          <input type="text" id = "quiztitle" name="quiztitle" value=""  required>

          <p><label for="">Quiz Type:</label></p>
          <select name = "quiztype" form = "newquiz" required>
            <option value="multiple choice">Multiple Choice</option>
            <option value="single answer">Single Answer</option>
            <option value="essay">Essay</option>
          </select>
        <br>
  </div>
      <label for="">Number of Qustions:</label>
        <input type="number" id = "no_questions" name="no_questions" value="" placeholder="Enter Number of Questions Here" required>
      <label for="">Time Limit:</label>
      <input type="time" id = "timelimit" name="timelimit" placeholder="time in minutes" value="" required>
      <input type="submit" name="submit" value="Submit">
    </form>
  </body>
</html>
