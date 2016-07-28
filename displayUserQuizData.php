<?php
include('connect.php');
include('session.php');
include('bootstrap.html');
set_time_limit (60);

    // Fetches data to do with past quiz performances
    $username = $login_session;
    mysqli_select_db($connection, $username);
    $sql = "SELECT * FROM quiz_results";
    $query = mysqli_query($connection,$sql);

    echo "<h3> Your Tests </h3>
    <table>
          <tr>
          <th> Quiz Name </th>
          <th> Score </th>
          <th> Time Taken </th>
          </tr>";
    // Generate Table of all quiz results
    while ($quizdata = mysqli_fetch_assoc($query)) {
      echo "<tr>
            <td>" . $quizdata['name'] . "</td>
            <td>" . $quizdata['result'] . "%" . "</td>
            <td>" . $quizdata['time_taken'] . "</td>
            </tr>";
}
  /* Save score, time taken and quiz name in arrays to generate graph
  $quizname[$i] = $quizdata['name'];
  $quizscore[$i] = $quizdata['result'];
  $quiztime[$i] = $quizdata['time_taken'];
}
/*
//Graph here
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
*/
 ?>
