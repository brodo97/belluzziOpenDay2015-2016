<?php
global $color, $footerText;
$color = "red";
$footerText = "white-text";
include_once '../phpMod/geshi.php';
$sourceDice = "";
$sourceCollatz = "";

$handle = fopen("../scripts/clusterTwoDiceRollSum.py", "r");
if ($handle) {
  while (($line = fgets($handle)) !== false) {
    $sourceDice = $sourceDice.$line;
  }
  fclose($handle);
} else {
  echo "Errore";
}
$handle = fopen("../scripts/clusterCollatz.py", "r");
if ($handle) {
  while (($line = fgets($handle)) !== false) {
    $sourceCollatz = $sourceCollatz.$line;
  }
  fclose($handle)
  
} else {
  echo "Errore";
}
$geshiDice = new GeSHi($sourceDice, "python");
$geshiCollatz = new GeSHi($sourceCollatz, "python");
?>
<html>
<head>
  <title>Collatz</title>
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>

  <!--Ottimizzato per la navigazione da mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

  <meta charset="UTF-16">

  <!--Blocco dello zoom su mobile-->
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
</head>
<body class="grey lighten-2">
  <main>
    <div class="container">

      <!--Grafico-->
      <div class="section">
        <h1>The Core: Dispy</h1>
        <p class="flow-text">The Collatz conjecture, also known as the 3n+1 conjecture. The conjecture can be summarized as follows. Take any positive integer n. If n is even, divide it by 2 to get n/2. If n is odd, multiply it by 3 and add 1 to obtain 3n+1. The conjecture is that no matter what number you start with, you will always eventually reach 1.</p>
        <p class="flow-text">Paul Erdős said about the Collatz conjecture: "Mathematics may not be ready for such problems."</p>
      </div>

      <!--Esempio codice-->
      <div class="section">
        <ul class="collapsible" data-collapsible="accordion">
          <li>
            <div id="example" class="collapsible-header"><i class="material-icons">new_releases</i>Dice example</div>
            <div class="collapsible-body white">
              <div class="row">
                <div class="col s12 m12 l12">
                  <span>Script (Python):</span><br><span><?php echo $geshiDice->parse_code(); ?></span>
                </div>
              </div>
            </div>
          </li>
          <li>
            <div id="example" class="collapsible-header"><i class="material-icons">new_releases</i>Collatz example</div>
            <div class="collapsible-body white">
              <div class="row">
                <div class="col s12 m12 l12">
                  <span>Script (Python):</span><br><span><?php echo $geshiCollatz->parse_code(); ?></span>
                </div>
              </div>
            </div>
          </li>
        </ul>
      </div>
    <?php require_once '../phpMod/homebtn.php' ?>
  </main>
  <?php require_once '../phpMod/footer.php' ?>
  <!--Import jQuery before materialize.js-->
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script type="text/javascript" src="../js/materialize.min.js"></script>
</body>
</html>
