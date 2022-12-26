<!DOCTYPE html>
<html>
<head>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
 <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
</head>
<style>

</style>
<body>
<div class="bottomleft">
  <div class="chart-container">
    <div class="pie-chart-container">
      <canvas id="pie-chart"></canvas>
    </div>
  </div>
</div>
  <!-- javascript -->

   <script>
  $(function(){
      //get the pie chart canvas
      var cData = JSON.parse(`<?php echo $chart_data; ?>`);
      var sData = JSON.parse(`<?php echo $chart_customer; ?>`);
      var ctx = $("#pie-chart");
      var data = {
        labels: cData.label,
        datasets: [
          {
            label: "Leads",
            data: cData.data,


            backgroundColor: [
              "red",
              "red",
              "red",
              "red",
              "red",
              "red",
              "red",

            ],
            borderColor: [
              "red",
              "red",
              "red",
              "red",
              "red",
              "red",
              "red",
            ],
            borderWidth: 10,
 barThickness:15,
maxBarThickness: 10,
          },

          {
            label:"Customer",
            data:sData.customer,


            backgroundColor: [
              'green',
              'green',
              'green',
              'green',
              'green',
              'green',
              'green',
            ],
            borderColor: [
             'green',
             'green',
             'green',
             'green',
             'green',
             'green',
             'green',
             'green',

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

      //create Pie Chart class object
      var chart1 = new Chart(ctx, {
        type: "bar",
        data: data,
        data: data,
        options: options
      });

  });
</script>
</body>
</html>
