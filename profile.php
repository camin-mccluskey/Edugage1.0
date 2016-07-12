<?php
include('connect.php');
include('session.php');
set_time_limit (60);

?>
<!DOCTYPE html>
<html>
<head>
<title>Your Home Page</title>
</head>
<body>
<div id="profile">
<b id="welcome"> User : <i><?php echo $login_session; ?></i></b>
<b id="logout"><a href="logout.php">Log Out</a></b>

<?php
$usertype = $_SESSION['usertype'];
if ($usertype == "students") {

// Generate Student Profile Page
  $sql = "SELECT * FROM students WHERE username = '$login_session'";
  $query = mysqli_query($connection, $sql);
  if ($query) {
    $user = mysqli_fetch_assoc($query);
    echo "<br>";
    echo $user['first_name'] . " " . $user['surname'];

    // Fetches data to do with past quiz performances
    $username = $user['username'];
    $sql = "SELECT * FROM $username";
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

    //Graph here - Good luck to me
    echo "<canvas id='chart' width='500' height='500'></canvas>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js'></script>
    <script>
      var ctx = document.getElementById('chart').getContext('2d');
      var data = {
        labels: [";
    // Echo through each quiz as a title
        for ($i=0; $i <= $quiznum - 2 ; $i++) {
    echo  "`$quizname[$i]`," ;
  }
    // Echo last quiz and close label array
          $j = $quiznum -1;
    echo  "`$quizname[$j]`],";
    echo "
          datasets: [ {
          label: 'Quiz Score',
          fillColor: 'rgba(220,220,220,0.2)',
          lineTension: 5,
          strokeColor: 'red',
          pointColor: 'black',
          pointStrokeColor: '#fff',
          pointHighlightFill: '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data: [";

      // Echo through each quiz as a title
              for ($i=0; $i <= $quiznum - 2 ; $i++) {
          echo  $quizscore[$i] . ",";
        }
          // Echo last quiz and close label array
                $j = $quiznum - 1;
          echo  $quizscore[$j] . "]}]};";
          /*
        {
          label: 'Time Taken',
          fillColor: 'rgba(220,220,220,0.2)',
          strokeColor: 'red',
          pointColor: 'black',
          pointStrokeColor: '#fff',
          pointHighlightFill: '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data: [" . $quiztime[0]. "," . $quiztime[1] . "," . $quiztime[2] . "," . $quiztime[3] . "," . $quiztime[4] . "]
        } ]
      */
      echo "
      var options =  {
        legend: {
            display: true,
            labels: {
                fontColor: 'rgb(255, 99, 132)'
            }
}
}
      var MyNewChart = new Chart(ctx).Line(data, options);
    </script>";
  }

  else echo "Couldn't Fetch User Data";
}

else if ($usertype == "teachers") {
echo "<br> <a href='createquiz_1.php'> Create Quiz </a>";
}
else if ($usertype == "administrators") {
echo "<br> <a href = 'admin_homepage.html'> Create or Search User";
}
else {
  echo "Error";
}
?>
</div>
</body>
</html>
