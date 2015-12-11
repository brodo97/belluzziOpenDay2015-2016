<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Zona 'sicura'</title>
    <link rel='stylesheet prefetch' href='http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css'>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body class="body-index">

	<?php

		function printForm () {
			?>
				<div class='login-card'>
      				<h1>Accesso banca</h1><br>
      				<form method='post' autocomplete='off'>    
        				<input type='text' name='psw' placeholder='Password'>
        				<input type='submit' class='login login-submit' value='Entra'>
      				</form>
      				<div class='login-help-small'><a href='set.php'><p>Cambia password</p></a></div>
    			</div>
    		<?php
		}

		$filename = "password.txt";
		$psw;

		if ($_POST['psw'] != null) {
			if (file_exists($filename)){
				$file = fopen($filename, 'r');
				$psw = fgets($file);
				fclose($file);

				if ($_POST['psw'] == $psw) {
					echo "<div class='login-help'><h1>Password corretta!</h1><h3>Ora siamo nel TUO account.</h3></div>";
				}
				else {
					printForm();
					echo "<div class='login-help'><p style='color:red'>Password errata!</p></div>";
					header("HTTP/1.1 401 Unauthorized", true, 401);
    				exit;
				}
			}
			else {
				echo "File not found!";
			}
		}
		else {
			printForm();
		}		
	?>

</body>
</html>