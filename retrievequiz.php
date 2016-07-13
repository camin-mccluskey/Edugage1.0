<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Find a Quiz</title>
      <style media="screen">
        #entry:hover {
          background-color: blue;
        }
      </style>
  </head>
  <body>
    <?php
    include 'connect.php';
    // Search for quiz by its title, teacher, type, lengh and time_limit
    $quiztitle = $_POST['quiztitle'];
    $teachername = $_POST['teachername'];
    $quiztype = $_POST['quiztype'];

    // Make a search query
    $values = "";
    if (!empty($quiztitle)) {
    	$value1  = " AND name = '$quiztitle' ";
    }
    else {
    	$value1 = "";
    }
    if (!empty($teachername)) {
    	$value2 = " AND  teacher = '$teachername' ";
    }
    else {
    	$value2 = "";
    }
    if (!empty($quiztype)) {
    	$value3 = " AND type = '$quiztype' ";
    }
    else {
    	$value3 = "";
    }

    $values .= $value1 .= $value2 .= $value3;

echo $quiztitle;
    // Retrieve Questions from Quiz db
    mysqli_select_db($connection, "quizes");
    $sql = "SELECT * FROM master_list WHERE id != 0 $values";
    $query = mysqli_query($connection, $sql);
    if ($query) {
    // Present quizes as clickable links
    $numrows = mysqli_num_rows($query);
    echo "<table>
    <tr>
  <th>Quiz Title</th>
  <th>Quiz Type</th>
  <th>Number of Questions</th>
  <th>Time Limit</th>
  <th>Teacher</th>
  </tr>";
    for ($i = 0; $i < $numrows +1; $i++) {
    $result = mysqli_fetch_assoc($query);
    $id = $result['id'];
    echo "<tr id = 'entry' onclick = \"selectentry($id)\">
    <td>" . $result['name'] . "</td>
    <td>" . $result['type'] . "</td>
    <td>" . $result['no_questions'] . "</td>
    <td>" . $result['time_limit'] . "</td>
    <td>" . $result['teacher'] . "</td>";
}
    echo "</table>";
}
  else {
    echo "No Quiz exists";
  }
     ?>
<script type="text/javascript">
  function selectentry(id) {
    document.cookie = "id="+id;
    window.location = "viewquiz.php";
}
</script>
  </body>
</html>
