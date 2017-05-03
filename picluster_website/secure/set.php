<?php
global $color, $footerText;
$color = "green";
$footerText = "white-text";
$done = "";

if (isset($_POST["newPw"]) && $_POST["newPw"] != "") {
      $filename = "password.txt";
			$file = fopen($filename, 'w');
			fwrite($file, $_POST['newPw']);
			fclose($file);
      $done = "<h3 class='white-text'>Password changed! Lenght: " . strlen($_POST['newPw']) . " </h3>";
}
 ?>
<!DOCTYPE html>
<html>
<head>
  <title>Brute-Force</title>
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>

  <!--Ottimizzato per la navigazione da mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

  <meta charset="UTF-16">

  <!--Blocco dello zoom su mobile-->
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
  <link rel="stylesheet" href="../css/logSigUp.css">
</head>
<body class="grey lighten-3">
  <main>
    <div class="auth-section">
      <div class="auth-box-header"></div>
      <div class="auth-box-contents">
        <div class="container auth-zone">
          <div class="row">
            <div class="col s12 auth-brand-zone">
              <?php echo $done ?>
            </div>
            <div class="col s12 m10 l6 offset-m1 offset-l3">
              <form class="col s12 auth-box z-depth-1" action="set.php" method="POST">
                <div class="input-field col s10 m10 offset-s1 offset-m1">
                  <h1><i class="material-icons">lock_outline</i> Change password</h1>
                </div>
                <div class="input-field col s10 m10 offset-s1 offset-m1">
                  <input id="auth-signup-password" type="text" name="newPw" autocomplete="off">
                  <label for="auth-signup-password">New password</label>
                </div>
                <div class="input-field col s10 m10 offset-s1 offset-m1">
                  <input type="checkbox" id="auth-signup-accept-terms">
                  <label for="auth-signup-accept-terms">I agree to terms and conditions.</label>
                </div>
                <div class="input-field col s10 offset-s1 offset-m1">
                  <button type="submit" id="auth-signup-submit" class="waves-effect waves-light btn col s12 green">Change</button>
                </div>
                <div class="input-field col s12 center">
                  <span>Did you change the password? <a href=".">Login</a></span>
                </div>
              </form>
            </div>
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
  <script type="text/javascript" src="../js/init.js"></script>
</body>
</html>
