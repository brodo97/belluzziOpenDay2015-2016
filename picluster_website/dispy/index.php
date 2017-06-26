<?php
global $color, $footerText,$theme;
$theme = "#2196f3";
$color = "blue";
$footerText = "white-text";
include_once "../phpMod/geshi.php";

$example = "";
$handle = fopen("../scripts/dispyExample.py", "r");
if ($handle) {
  while (($line = fgets($handle)) !== false) {
    $example = $example.$line;
  }
  fclose($handle);
} else {
  echo "Errore";
}

$important = "";
$handle = fopen("../scripts/important.py", "r");
if ($handle) {
  while (($line = fgets($handle)) !== false) {
    $important = $important.$line;
  }
  fclose($handle);
} else {
  echo "Errore";
}

$useDispy = new GeSHi($example, "python");
$importantUse = new GeSHi($important, "python");
$installPipDebian = new GeSHi("$ sudo apt install python-pip python-dev build-essential", "bash");
$installPipArch = new GeSHi("$ sudo pacman -S python-pip", "bash");
$installDispy = new GeSHi("$ sudo pip install dispy", "bash");
$runDispy = new GeSHi("$ dispynode.py -i YOUR_SERVER_IP", "bash");
?>
<html>
<head>
  <title>Dispy</title>
  <?php require_once "../phpMod/headInit.php" ?>

  <style media="screen">
  @media only screen and (max-width : 992px) {
    header, main, footer {
      padding-left: 0;
    }
  }
  </style>
</head>
<body class="grey lighten-2">
  <main>
    <div class="container">

      <!--Introduction-->
      <div id="introduction" class="section">
        <h1>The Core: <a href="http://dispy.sourceforge.net/" target="_blank">dispy</a><i class="material-icons">keyboard_return</i></h1>
        <p class="flow-text">dispy is an easy-to-use Python based framework for creating and using clusters to execute computations in parallel across multiple processors in a single machine, among many machines in a cluster, grid or even cloud.</p>
        <p class="flow-text">dispy is one of the most simple cluster middleware. It's easy to install, easy to use and easy to understand. It's compact and lightweight, in few lines of Python you can build simple but efficient distributed algorithm.</p>
      </div>

      <div class="divider black"></div>

      <!--Installation-->
      <div id="install" class="section">
        <h3>How to install</h3>
        <p class="flow-text">dispy need pip to be installed. pip is an easy-to-use Python's package/library installer.</p>
        <div class="row">
          <div class="col s12 m12 l12 card">
            <div class="card-content">
              <span class="card-title">Install pip on Debian based distribution:</span>
              <?php echo $installPipDebian->parse_code(); ?>
            </div>
          </div>
          <div class="col s12 m12 l12 card">
            <div class="card-content">
              <span class="card-title">Install pip on Arch based distribution:</span>
              <?php echo $installPipArch->parse_code(); ?>
            </div>
          </div>
        </div>
        <p class="flow-text">Then install dispy:</p>
        <div class="row">
          <div class="col s12 m12 l12 card">
            <div class="card-content">
              <span class="card-title">Install dispy</span>
              <?php echo $installDispy->parse_code(); ?>
            </div>
          </div>
        </div>
        <h4 class="red-text">Important!</h4>
        <p class="flow-text">Every node of the cluster <b>MUST</b> have the same dispy version or it can cause problem or service crashes.</p>
      </div>

      <div class="divider black"></div>

      <!--Execution-->
      <div id="run" class="section">
        <h3>How to run</h3>
        <p class="flow-text">Finally run dispy with the following command:</p>
        <div class="row">
          <div class="col s12 m12 l12 card">
            <div class="card-content">
              <span class="card-title">Run dispy</span>
              <?php echo $runDispy->parse_code(); ?>
            </div>
          </div>
        </div>
        <p class="flow-text">This command should be running on each of the nodes (servers), it executes jobs for dispy clients.</p>
      </div>

      <div class="divider black"></div>

      <!--Use-->
      <div id="use" class="section">
        <h3>How to use</h3>
        <p class="flow-text">dispy works with Python, on the documentation page you can find few examples like this one:</p>
        <div class="row">
          <div class="col s12 m12 l12 card">
            <div class="card-content">
              <span class="card-title">Use dispy</span>
              <?php echo $useDispy->parse_code(); ?>
            </div>
          </div>
        </div>
        <p class="flow-text">The most importants parts:</p>
        <div class="row">
          <div class="col s12 m12 l12 card">
            <div class="card-content">
              <span class="card-title">Creation of the cluster</span>
              <?php echo $importantUse->parse_code(); ?>
            </div>
          </div>
        </div>
      </div>

      <?php require_once "../phpMod/homebtn.php" ?>
    </main>

    <?php require_once "../phpMod/footer.php" ?>

    <ul id="slide-out" class="side-nav fixed transparent z-depth-0">
      <br><br>
      <li><a href="#introduction" class="blue-text text-darken-3">Introduction</a></li>
      <li><a href="#install" class="blue-text text-darken-3">How to install</a></li>
      <li><a href="#run" class="blue-text text-darken-3">How to run</a></li>
      <li><a href="#use" class="blue-text text-darken-3">How to use</a></li>
    </ul>
    <a data-activates="slide-out" class="button-collapse"></a>

    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="../js/materialize.min.js"></script>
    <script type="text/javascript">
    $('.button-collapse').sideNav({
      menuWidth: 150,
      edge: 'left',
      closeOnClick: false,
      draggable: false
    }
  );
  var $root = $('html, body');
  $('a').click(function() {
    var href = $.attr(this, 'href');
    $root.animate({
      scrollTop: $(href).offset().top
    }, 500, function () {
      window.location.hash = href;
    });
    return false;
  });
  </script>
</body>
</html>
