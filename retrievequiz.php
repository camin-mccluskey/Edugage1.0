<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Find a Quiz</title>
  </head>
  <body>
    <?php
    include 'connect.php';
    // Search for quiz by its title, teacher, type, lengh and time_limit
    $quiztitle = $_POST['quiztitle'];
    $teachername = $_POST['teachername'];
    $quiztype = $_POST['quiztype'];

echo $quiztitle;
    // Retrieve Questions from Quiz db
    $sql = "SELECT * FROM quizes WHERE quiz_name = '$quiztitle' OR quiz_type = '$quiztype' OR teacher_name = '$teachername'";
    $query = mysqli_query($connection, $sql);

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
    echo "<tr onclick = \"selectentry($id)\">
    <td>" . $result['quiz_name'] . "</td>
    <td>" . $result['quiz_type'] . "</td>
    <td>" . $result['no_questions'] . "</td>
    <td>" . $result['time_limit'] . "</td>
    <td>" . $result['teacher_name'] . "</td>";
}
    echo "</table>";
     ?>
<script type="text/javascript">
  function selectentry(id) {
    document.cookie = "id="+id;
    window.location = "viewquiz.php";
}
</script>
  </body>
</html>
