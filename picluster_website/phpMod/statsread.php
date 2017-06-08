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
}

// formatting data:
$total_rolls = number_format((int)$total_rolls, 0, '', '\'');
$percentage = number_format(100-(floatval($total_real_time)/floatval($total_job_time)*100),1);
?>
