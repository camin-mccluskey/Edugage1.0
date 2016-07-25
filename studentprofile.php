<div class="jumbotron">
  <a href="#"><img class="icons" src="user.png" alt="" /></a>
  <a href="#"><img class="icons" onclick="DisplayQuizScores()" src="quiz.png" alt="" /></a>
  <a href="#"><img class="icons" src="notes.png" alt="" /></a>
</div>
<div id="Focus">
<?php include 'DisplayQuizScores.php'; include 'displayQuizScoreGraph.php'; ?>
</div>

<script type="text/javascript">
  function DisplayQuizScores() {
    document.getElementById('Focus').style.display = 'block';
  }
</script>
