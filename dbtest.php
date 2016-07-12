<?php
$answer = "answer_1 VARCHAR(45) NOT NULL";
for ($i=2; $i < 4 ; $i++) {
  $answer .= ", answer_" . $i . " VARCHAR(45) NOT NULL";
}
echo $answer;
 ?>
