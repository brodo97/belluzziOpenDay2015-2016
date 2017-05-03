<?php
global $color, $footerText;
$color = "indigo";
$footerText = "white-text";
?>
<html>
<head>
	<title>Cluster</title>
	<!--Import Google Icon Font-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<!--Import materialize.css-->
	<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

	<!--Ottimizzato per la navigazione da mobile-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

	<meta charset="UTF-16">

	<!--Blocco dello zoom su mobile-->
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
	<style media="screen">
	.tabs .indicator{
		background-color: #F0F;
	}
	</style>
</head>
<body class="grey lighten-2">
	<main>
		<div class="container">
			<div class="row">
				<div class="col s12 m12 l12">
					<div class="section">
						<h1 class="center">Pi Cluster</h1>
						<p class="flow-text center">A computer cluster consists of a set of connected computers that work together so that, in many respects, they can be viewed as a single system. A computer clusters have each node set to perform the same task, controlled and scheduled by <a href="http://dispy.sourceforge.net/" target="_blank" title="Dispy">software</a>.</p>
					</div>
					<div class="section">
						<div class="card indigo">
							<div class="card-content">
								<span class="card-title white-text">Utilizzi</span>
							</div>
							<div class="card-tabs">
								<ul class="tabs tabs-fixed-width transparent">
									<li class="tab"><a class="active white-text" href="#statistica">Statistics</a></li>
									<li class="tab"><a class="white-text" href="#matematica">Mathematics</a></li>
									<li class="tab"><a class="white-text" href="#sicurezza">Security</a></li>
								</ul>
							</div>
							<div class="card-content white">
								<div id="statistica" class="row">
									<div class="col s12 m6 l4">
										<div class="card blue lighten-2">
											<div class="card-content center black-text">
												<span class="card-title">Two dice sum</span>
												<p>Massive sums of two dices'<br>face</p>
											</div>
											<div class="card-action blue lighten-4">
												<a class="black-text" href="dice" title="Apri pagina">Go to the page</a>
											</div>
										</div>
									</div>
								</div>
								<div id="matematica" class="row">
									<div class="col s12 m6 l4">
										<div class="card red lighten-2">
											<div class="card-content center black-text">
												<span class="card-title">3n+1</span>
												<p>Collatz, Syracuse or Ulam conjecture</p>
											</div>
											<div class="card-action red lighten-4">
												<a class="black-text" href="collatz" title="Apri pagina">Go to the page</a>
											</div>
										</div>
									</div>
								</div>
								<div id="sicurezza" class="row">
									<div class="col s12 m6 l4">
										<div class="card green lighten-2">
											<div class="card-content center black-text">
												<span class="card-title">Brute-force</span>
												<p>Brute-force of a password for a login</p>
											</div>
											<div class="card-action green lighten-4">
												<a class="black-text" href="secure" title="Apri pagina">Go to the page</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<a href="easter.php" class="right"><img src="img/easter.png" style="width:50px"></a>
			</div>
		</div>
	</main>
	<?php require_once 'phpMod/footer.php' ?>
	<!--Import jQuery before materialize.js-->
	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="js/materialize.min.js"></script>
	<script type="text/javascript" src="js/init.js"></script>
</body>
</html>
