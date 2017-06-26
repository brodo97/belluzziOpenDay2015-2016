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
			$totjt = explode(",",$line);
			$total_job_time = substr($totjt[0], 16, 20);
		}
		if (strpos($line, "Computation real time:") !== false) {
			$total_real_time = substr($line, 23);
		}
	}
	fclose($file);
	
	// formatting data:
	$total_rolls = number_format((int)$total_rolls, 0, '', '\'');
	$percentage = number_format(100-(floatval($total_real_time)/floatval($total_job_time)*100),1);

	echo "<div class='section'>
		<h4>Last data:</h4>
		<div class='row'>
			<div class='col s6 m6 l4 center'>
				<p>Real time execution: $total_real_time</p>
			</div>
			<div class='col s6 m6 l4 center'>
				<p>Single node time: $total_job_time</p>
			</div>
			<div class='col s12 m12 l4 center'>
				<p><b>Saving: $percentage%</b></p>
			</div>
		</div>
	</div>";
}
?>
