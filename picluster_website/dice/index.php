<?php
global $color, $footerText;
$color = "blue";
$footerText = "white-text";
?>
<html>
<head>
	<title>Lancio dadi</title>
	<!--Import Google Icon Font-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<!--Import materialize.css-->
	<link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>

	<!--Ottimizzato per la navigazione da mobile-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

	<meta charset="UTF-16">

	<!--Blocco dello zoom su mobile-->
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />

	<!--Libreria google per la realizzazione del grafico-->
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

	<!--Script per la realizzazione del grafico-->
	<script type="text/javascript">
	google.charts.load("current", {packages:['corechart']});
	var option = null;
	var char = null;
	var data = null;
	var view = null;
	google.charts.setOnLoadCallback(function () {
		data = google.visualization.arrayToDataTable([
			<?php
			$handle = fopen("export.txt", "r");
			if ($handle) {
				while (($line = fgets($handle)) !== false) {
					echo $line;
				}
				fclose($handle);
			} else {
				echo "Errore";
			}?>
		]);

		options = {
			title: 'Last Test',
      titleTextStyle:{fontSize: 24},
			legend: { position: "none" },
			bar: {groupWidth: "90%"},
			annotations: {
				highContrast: false
			},
			animation:{
				duration: 1000,
				easing: 'inAndOut',
				startup: true
			},
		};
		chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
		draw()
	});
	function draw() {
		chart.draw(data, options);
	}
	</script>
</head>
<body class="grey lighten-2">
	<main>
		<div class="container">
			<h2>Throw of two dices</h2>
			<div class="section">
				<div class="card z-depth-4">
					<div id="columnchart_values" class="card medium transparent z-depth-0"></div>
				</div>
			</div>

			<div class="divider"></div>

			<div class="section">
				<?php require_once '../phpMod/statsread.php' ?>
				<h4>Data:</h4>
				<div class="row">
					<div class="col s6 m6 l3">
						<p>Total throws: <?php echo $total_rolls ?></p>
					</div>
					<div class="col s6 m6 l3">
						<p>Real time execution: <?php echo $total_real_time ?></p>
					</div>
					<div class="col s6 m6 l3">
						<p>Single node time: <?php echo $total_job_time ?></p>
					</div>
					<div class="col s6 m6 l3">
						<p>Saving: <?php echo $percentage ?>%</p>
					</div>
				</div>
			</div>

			<div class="section center">
				<a class="btn blue darken-3" href='stats.txt' target='_blank'>Statistiche complete</a>
			</div>

			<div class="section">
        <div class="card">
          <div class="card-content">
            <h4 class="card-title">Description</h4>
            <p><a href="../dispy">Dispy </a>will assign a number of dices' throws.</p><br>
            <p>For each throw we'll get two random number, the possible faces of a dice, and we'll save the sum.</p><br>
            <p>For every number of throws we'll get the same graph shape. That's because the most central numbers can be found in more different ways.</p>
          </div>
        </div>
      </div>
		</div>
		<?php require_once '../phpMod/homebtn.php' ?>
	</main>
	<?php require_once '../phpMod/footer.php' ?>
	<!--Import jQuery before materialize.js-->
	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="../js/materialize.min.js"></script>

	<!--Screen orientation reloader and controls-->
	<script type="text/javascript">

	if(window.innerHeight > window.innerWidth){
		Materialize.toast('Ottimizzato per la navigazione in landscape!', 4000)
	}
	$(window).on("orientationchange",function(){
		setTimeout(draw,500);
	});
	</script>
</body>
</html>
