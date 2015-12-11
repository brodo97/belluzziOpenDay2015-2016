<!DOCTYPE html>
<html >
  <head>
	<meta charset="UTF-8">
    <link rel='stylesheet prefetch' href='http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css'>
    <link rel="stylesheet" href="css/style.css">
    <title>Cambia password</title>
  </head>
  <body class="body-set">

	<?php
		$filename = "password.txt";

		if ($_POST['newpsw'] != "") {			
			$file = fopen($filename, 'w');
			fwrite($file, $_POST['newpsw']);
			fclose($file);

			echo "<h1 class='msg'>Password cambiata! [" . strlen($_POST['newpsw']) . "] <a href='index.php'>Accedi</a></h1>";
		}
		else {
			?>

			<div class='login-card'>
      			<h1>Cambia password</h1><br>
      			<form method='post' autocomplete='off'>    
        			<input type='password' name='newpsw' placeholder='Nuova password'>
        			<input type='submit' class='login login-submit' value='Cambia password'>
      			</form>
                <div class='login-help-small'><a href='index.php'><p>Accedi</p></a></div>
    		</div>

			<?php
		}
	?>

</body>
</html>