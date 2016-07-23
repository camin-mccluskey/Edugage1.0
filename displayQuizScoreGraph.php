<?php
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
 ?>
