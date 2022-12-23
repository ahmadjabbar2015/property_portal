<!DOCTYPE html>
<html>
<head>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
 <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
</head>
<style>

</style>
<body>

    <div class="rent-chart-container">
      <canvas id="rent-chart"></canvas>
    </div>

  <!-- javascript -->

   <script>
  $(function(){

    var labels =   <?php echo $rentStatsLabels; ?>;
    var data =    <?php echo $rentStatusData; ?>;

    var labelsZero =   <?php echo $rentStatsZeroLabels; ?>;
    var datazero =    <?php echo $rentStatusZeroData; ?>;

      var ctx = $("#rent-chart");

      var data = {
        labels: labels,
        datasets: [
          {
            label: "Paid",
            data:  data,

            backgroundColor: [
              "#0069c0",
              "#0069c0",
              "#0069c0",
              "#0069c0",
              "#0069c0",
              "#0069c0",
              "#0069c0",

            ],
            borderColor: [
                "#0069c0",
                "#0069c0",
                "#0069c0",
                "#0069c0",
                "#0069c0",
                "#0069c0",
                "#0069c0",

            ],
            borderWidth: 10,
 barThickness:15,
maxBarThickness: 10,
          },

          {
            label:"Unpaid",
            data:datazero,


            backgroundColor: [
              '#1fe074',
              '#1fe074',
              '#1fe074',
              '#1fe074',
              '#1fe074',
              '#1fe074',
              '#1fe074',
            ],
            borderColor: [
             '#1fe074',
             '#1fe074',
             '#1fe074',
             '#1fe074',
             '#1fe074',
             '#1fe074',
             '#1fe074',
             '#1fe074',

            ],
            borderWidth: 10,
barThickness: 15,
maxBarThickness: 10,

          }
        ],

      };
      var options = {
        scales: {
            yAxes: [{
            display: true,
            ticks: {
                suggestedMin: 0,
                beginAtZero: true
            }
        }]
      }
};

      var chart1 = new Chart(ctx, {
        type: "bar",
        data: data,
    //    data: datazero,
        options: options
      });

  });
</script>
</body>
</html>
