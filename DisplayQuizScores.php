<?php
// Generate Student Profile Page
  $sql = "SELECT * FROM login WHERE username = '$login_session'";
  $query = mysqli_query($connection, $sql) or die ("Error: Could not select user from database");

    $user = mysqli_fetch_assoc($query);
    echo "<br>";
    echo $user['first_name'] . " " . $user['surname'];

    // Fetches data to do with past quiz performances
    $username = $user['username'];
    mysqli_select_db($connection, $username);
    $sql = "SELECT * FROM quiz_results";
    $query = mysqli_query($connection,$sql);
    $quiznum = mysqli_num_rows($query);

    echo "<br> <a href = 'quizhomepage.html'> Search Quizes </a>";

    echo "<h3> Your Tests </h3>
    <table>
          <tr>
          <th> Quiz Name </th>
          <th> Score % </th>
          <th> Time Taken </th>
          </tr>";
    // Generate Table of all quiz results
    for ($i=0; $i < $quiznum ; $i++) {
      $quizdata = mysqli_fetch_assoc($query);
      echo "<tr>
            <td>" . $quizdata['quiz_name'] . "</td>
            <td>" . $quizdata['score'] . "%" . "</td>
            <td>" . $quizdata['time_taken'] . "</td>
            </tr>";

  // Save score, time taken and quiz name in arrays to generate graph
  $quizname[$i] = $quizdata['quiz_name'];
  $quizscore[$i] = $quizdata['score'];
  $quiztime[$i] = $quizdata['time_taken'];
}
 ?>
