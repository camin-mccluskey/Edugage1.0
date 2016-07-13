<?php
echo "you are a teacher";
echo "<br> <a href='createquiz.php'> Create Quiz </a>";

$classname = $_POST['class_name'];
echo $classname;
 ?>
<form class="" action="teacherprofile.php" method="post">
  <input type="text" name="class_name" value="" placeholder="Input Class Name"></input>
  <input type="submit" name="name" value="">Submit</input>
</form>
