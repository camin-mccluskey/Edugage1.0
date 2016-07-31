<!--This page populates the profile.php page with content if user is a student -->

<!--Main div with (at present) 3 icons -->
<div class="content">
  <a href="#"><img class="icons" onclick="DisplayQuizScores(triangle1)" src="user.png" alt="" /></a>
  <a href="#"><img class="icons" onclick="DisplayQuizScores(triangle2)" src="notes.png" alt="" /></a>
  <a href="#"><img class="icons" onclick="DisplayQuizScores(triangle3)" src="quiz.png" alt="" /></a>
</div>
<!-- The nice little triangular shape that appears -->
  <div id="triangle1"></div>
  <div id="triangle2"></div>
  <div id="triangle3"></div>
<!-- This is where the content is loaded depending on what is clicked -->
<div id="Focus">
    <!-- Button to close content div -->
    <img id="x-button" onclick="closeDropdown()" src="cross.png" alt="" />
    <!-- Import the content from loadContent.js down here-->
    <div id="content"></div>
</div>
<!-- import this sweet ajax function -->
<script type="text/javascript" src="loadContent.js"></script>
<script type="text/javascript">
  function DisplayQuizScores(icon) {
      // set focus and all triangles to display: none to initalise
      document.getElementById('Focus').style.display = 'none';
      document.getElementById('triangle1').style.display = 'none';
      document.getElementById('triangle2').style.display = 'none';
      document.getElementById('triangle3').style.display = 'none';

      // GENERATE DROP DOWN
      if (icon == triangle1) {
        document.getElementById('Focus').style.display = 'block';
        document.getElementById('triangle1').style.display = 'block';
        // generate content for classes dropdown
        loadContent("classes", "content", "studentData.php");
      }
      else if (icon == triangle2) {
        document.getElementById('Focus').style.display = 'block';
        document.getElementById('triangle2').style.display = 'block';
        // generate content for quizes dropdown
        loadContent("notes", "content", "studentData.php");
      }
      else {
        document.getElementById('Focus').style.display = 'block';
        document.getElementById('triangle3').style.display = 'block';
        // generate content for notes dropdown
        loadContent("quizes", "content", "studentData.php");
      }
  }
function closeDropdown() {
  document.getElementById('Focus').style.display = 'none';
  document.getElementById('triangle1').style.display = 'none';
  document.getElementById('triangle2').style.display = 'none';
  document.getElementById('triangle3').style.display = 'none';
}
</script>
