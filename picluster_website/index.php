<?php
global $color, $footerText,$theme;
$theme = "#3f51b5";
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

	<!--Favicon-->
	<link rel='icon' href='../img/favicon.png' />

	<!--Ottimizzato per la navigazione da mobile-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

	<meta charset="UTF-8">

	<!--Blocco dello zoom su mobile-->
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />

	<!--Descrizione-->
	<meta name='description' content='Raspberry Pi Cluster using dispy. How to install and how to use, examples and front-end data processing.'>

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
						<p class="flow-text center">A computer cluster consists of a set of connected computers that work together so that, in many respects, they can be viewed as a single system. A computer clusters have each node set to perform the same task, controlled and scheduled by <a href="dispy" title="dispy">software</a>.</p>
					</div>
					<div class="section">
						<div class="card indigo">
							<div class="card-content">
								<span class="card-title white-text">Usages</span>
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
												<a class="black-text" href="dice" title="Apri pagina">Open</a>
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
												<a class="black-text" href="collatz" title="Apri pagina">Open</a>
											</div>
										</div>
									</div>

									<div class="col s12 m6 l4">
										<div class="card orange lighten-2">
											<div class="card-content center black-text">
												<span class="card-title"><b>&pi;</b>L</span>
												<p>Calculate <b>&pi;</b> using Gottfried Leibniz's formula</p>
											</div>
											<div class="card-action orange lighten-4">
												<a class="black-text" href="pi/index.php#leibniz" title="Apri pagina">Open</a>
											</div>
										</div>
									</div>

									<div class="col s12 m6 l4">
										<div class="card amber lighten-2">
											<div class="card-content center black-text">
												<span class="card-title"><b>&pi;</b>B</span>
												<p>Calculate <b>&pi;</b> using Buffon's needle problem</p>
											</div>
											<div class="card-action amber lighten-4">
												<a class="black-text" href="pi/index.php#buffon" title="Apri pagina">Open</a>
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
												<a class="black-text" href="secure" title="Apri pagina">Open</a>
											</div>
										</div>
									</div>

									<div class="col s12 m6 l4">
										<div class="card light-green lighten-2">
											<div class="card-content center black-text">
												<span class="card-title">Hash</span>
												<p>Brute-force hash function (Reverse hash function)</p>
											</div>
											<div class="card-action light-green lighten-4">
												<a class="black-text" href="hash" title="Apri pagina">Open</a>
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
