  <html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<?php
		$ch = curl_init();
		curl_setopt($ch,CURLOPT_URL,"http://yecccmu-test.herokuapp.com/dataAnalyse.json");
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
		$output=curl_exec($ch);
		curl_close($ch);
		//echo $output;
	?>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

	
		
		function drawChart() {
		var xx = [
          ['Year', 'Sales', 'Expenses'],
          ['2004',  1000,      400],
          ['2005',  1170,      460],
          ['2006',  660,       1120],
          ['2007',  1030,      540]
        ];
		
        var data = google.visualization.arrayToDataTable(<?=$output?>);

        var options = {
          
          curveType: 'function',
          legend: { position: 'bottom' },
	  series: {
          // Gives each series an axis name that matches the Y-axis below.
          0: {axis: 'Temps'},
        },
        axes: {
          // Adds labels to each axis; they don't have to match the axis names.
          y: {
            Temperature: {label: 'Temps (Celsius)'},
            Datetime: {label: 'Datetime'}
          }
	  
          
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
	  <center>
    <div id="curve_chart" style="width: 300px; height: 200px"></div>
		  </center>
  </body>
</html>
