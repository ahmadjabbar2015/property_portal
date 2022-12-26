<!DOCTYPE html>
<html>
<head>

</head>


<body>
    <canvas id="myChart" height="100px"></canvas>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script type="text/javascript">

       var labels =   <?php echo $labels; ?>;
        var users =    <?php echo $datapayment; ?>;

             const data = {
             labels: labels,
             datasets: [{
             label:"Sales",
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: users,
        }]

};
        const config = {
        type: 'line',
        data: data,
        options: {}
      };

      const myChart = new Chart(
        document.getElementById('myChart'),
        config
      );


</script>
</html>
