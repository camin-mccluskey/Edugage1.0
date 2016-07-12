
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js"></script>
  <script>
    var ctx = document.getElementById("chart").getContext("2d");
    var data = {
        labels: ["January", "February", "March", "April", "May", "June", "July"],
        datasets: [ {
        label: "My First dataset",
        fillColor: "rgba(220,220,220,0.2)",
        strokeColor: "red",
        pointColor: "black",
        pointStrokeColor: "#fff",
        pointHighlightFill: "#fff",
        pointHighlightStroke: "rgba(220,220,220,1)",
        data: [65, 59, 80, 81, 56, 55, 40]
      } ]
    };
    var MyNewChart = new Chart(ctx).Line(data);
  </script>
