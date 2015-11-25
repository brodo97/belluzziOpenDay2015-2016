<!DOCTYPE html>
<html>
	<head>
		<title>Lancio dadi</title>

		<!-- amCharts javascript sources -->
		<script src="http://www.amcharts.com/lib/3/amcharts.js" type="text/javascript"></script>
		<script src="http://www.amcharts.com/lib/3/serial.js" type="text/javascript"></script>
		<script src="http://www.amcharts.com/lib/3/themes/black.js" type="text/javascript"></script>
		<script src="json/dataloader.min.js"></script>
		<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
		<!-- amCharts javascript code -->
		<script type="text/javascript">
			AmCharts.makeChart("chartdiv",
				{
					"type": "serial",
					"dataLoader": {
       				"url": "export.csv",
        				"format": "csv",
        				"delimiter": ",",
        				"useColumnNames": true
     				},
     				"colors": ["#0066ff"],
     				"title": "Facce",
					"categoryField": "somma",
					"dataDateFormat": "",
					"angle": 40,
					"depth3D": 20,
					"startDuration": 1,
					"fontFamily": "Roboto",
					"fontSize": 20,
					"theme": "black",
					"categoryAxis": {
						"gridPosition": "start"
					},
					"trendLines": [],
					"graphs": [
						{
							"balloonText": "Somma ottenuta [[category]]: [[value]]",
							"bulletBorderThickness": 0,
							"customMarker": "",
							"fillAlphas": 1,
							"id": "AmGraph-1",
							"title": "Frequenza",
							"type": "column",
							"valueField": "numero"
						}
					],
					"guides": [],
					"valueAxes": [
						{
							"id": "ValueAxis-1",
							"title": ""
						}
					],
					"allLabels": [],
					"balloon": {},
					"legend": {
						"useGraphSettings": true
					},
					"titles": [
						{
							"id": "Title-1",
							"size": 30,
							"text": "Lancio di due dadi e somma delle facce"
						}
					],
				}
			);
		</script>
        <style>
        	body{
            	font-family: 'Roboto', sans-serif;
            	background-color: #222222;
            }

            h3 {
            	font-family: 'Ubuntu', sans-serif;
            	color: #bfbfbf;
            }

            p {
            	font-family: 'Roboto', sans-serif;
            	color: #bfbfbf;
            	font-size: 25px;
            }

            table {
            	margin-top: -30px;
            }
        </style>
	</head>
	<body >
		<div id="chartdiv" style="width: 100%; height: 600px; background-color: #222222;"></div>

		<?php

			// reading stats:

			$total_job_time = "No stats";
			$total_real_time = "No stats";
			$total_rolls = "No stats";

			if (file_exists("stats.txt")) {
				$file = fopen("stats.txt", "r");
				
				while (!feof($file)) {				
					$line = fgets($file);

					if (strpos($line, "Total job time:") !== false) {
						$total_job_time = substr($line, 16);
					}
					if (strpos($line, "Computation real time:") !== false) {
						$total_real_time = substr($line, 23);
					}
					if (strpos($line, "Total Rolls:") !== false) {
						$total_rolls = substr($line, 13);
					}
				}

				fclose($file);				
			}

			// formatting data:
			$total_rolls = number_format($total_rolls, 0, '', '\'');
			$percentage = (floatval($total_real_time)*100)/floatval($total_job_time);
			$percentage = number_format($percentage, 1);

			// creating table:
			echo "
				<table width='100%'>
					<tr>
						<td><p>Lanci effettuati: $total_rolls</p></td>
						<td><p>Tempo esecuzione: $total_real_time</p></td>
						<td><p>Tempo macchina: $total_job_time</p></td>
						<td><p>Risparmio: $percentage%</p></td>
						<td><a href='stats.txt' target='_blank' style='color: #bfbfbf;font-size: 25px'>Statistiche complete</a></td>
					</tr>
				</table>";
		?>		
        <hr>
        <h3>Brunelli Mattia - Pinardi Giacomo - Visalli Simone</h3>        
	</body>
</html>