<?php
global $color, $footerText;
$color = "green";
$footerText = "white-text";
if (isset($_POST["pwd"]) && $_POST["pwd"] != "") {
  $filename = "password.txt";
  $file = fopen($filename, 'r');
  $psw = fgets($file);
  fclose($file);
  if ($_POST["pwd"] == $psw) {
    session_start();
    $_SESSION["check"] = true;
    header("location: in.php");
  }
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
              <h3 class="white-text">Brute-Force</h3>
            </div>
            <div class="col s12 m10 l6 offset-m1 offset-l3">
              <form class="col s12 auth-box z-depth-1 auth" autocomplete="off" action="." method="POST">
                <div class="input-field col s10 m10 offset-s1 offset-m1">
                  <h1><i class="material-icons">lock_open</i> Fake Login</h1>
                </div>
                <div class="input-field col s10 m10 offset-s1 offset-m1">
                  <input id="auth-input-passw" autocomplete="off" name="pwd" type="password">
                  <label for="auth-input-passw">Password</label>
                </div>
                <div class="input-field col s10 m10 offset-s1 offset-m1">
                  <input name="pwd" type="checkbox" id="login-remember-me-checkbox">
                  <label for="login-remember-me-checkbox">Remember me</label>
                </div>
                <div class="input-field col s10 offset-s1 offset-m1">
                  <button type="submit" class="waves-effect waves-light btn col s12 green">Login</button>
                </div>
                <div class="input-field col s10 offset-s1 offset-m1 center">
                  <span><a href="#">Forgot password?</a></span>
                </div>
                <div class="input-field col s10 offset-s1 offset-m1 center">
                  <span><a href="set.php">Change password</a></span>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="section">
        <div class="card">
          <div class="card-content">
            <h4 class="card-title">Description</h4>
            <p><a href="../dispy">Dispy </a>will assign to each node a range of password to work with.</p><br>
            <p>For each password we'll receive a boolean valuee: <b>True </b>(Correct password), <b>False </b>(Wrong password)</p><br>
            <p>At the end of the execution we'll find the only one possible password</p>
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
