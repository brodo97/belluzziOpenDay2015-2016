<?php
global $color, $footerText;
$color = "red";
$footerText = "white-text";
include_once '../phpMod/geshi.php';
$source = 'n = 685
count = 0
while n!=1:
  if n%2==0:
    n = n/2
  else:
    n = 3*n+1
  count += 1
print "Iterations count:", count';
$geshi = new GeSHi($source, "python");
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

  <!--Libreria google per la realizzazione del grafico-->
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

  <!--Script per la realizzazione del grafico-->
  <script type="text/javascript">
  google.charts.load('current', {'packages':['corechart']});
  var option = null;
  var char = null;
  var data = null;
  google.charts.setOnLoadCallback(function () {
    options = {
      title: 'Last Test',
      titleTextStyle:{fontSize: 24},
      curveType: 'none',
      legend: { position: 'none' },
      colors: ['red'],
      animation:{
        duration: 1000,
        easing: 'inAndOut',
        startup: true
      },
      crosshair:{
        trigger: 'both'
      },
      hAxis: {title: 'Num. of iterations'},
      vAxis: {title: 'Frequency'}
    };

    data = google.visualization.arrayToDataTable([
      ['Num. of iterations', 'Frequency'],
      <?php
      $handle = fopen("export.txt", "r");
      if (($line = fgets($handle)) !== false) {
        $strInfo = $line;
        $info = explode(",",$strInfo);
      }
      if ($handle) {
        while (($line = fgets($handle)) !== false) {
          echo $line;
        }
        fclose($handle);
      } else {
        echo "Errore";
      }?>
    ]);

    chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
    draw();
  });

  function draw(){
    chart.draw(data, options);
  }
  </script>

  <script type="text/javascript">
  function check() {
    if (document.getElementById("from").value>=document.getElementById("to").value) {
      alert("Inserire dati validi");
    }else{
      document.getElementById("newTest").submit();
    }
  }
  </script>
</head>
<body class="grey lighten-2">
  <main>
    <div class="container">

      <!--Grafico-->
      <div class="section">
        <h2>Collatz Conjecture</h2>
        <p class="flow-text">The Collatz conjecture, also known as the 3n+1 conjecture. The conjecture can be summarized as follows. Take any positive integer n. If n is even, divide it by 2 to get n/2. If n is odd, multiply it by 3 and add 1 to obtain 3n+1. The conjecture is that no matter what number you start with, you will always eventually reach 1.</p>
        <p class="flow-text">Paul Erdős said about the Collatz conjecture: "Mathematics may not be ready for such problems."</p>
        <div class="card z-depth-4">
          <div id="curve_chart" class="card medium transparent z-depth-0"></div>
          <div class="card-action">
            <p></p>
          </div>
        </div>

      </div>

      <div class="divider red"></div>

      <!--Esempio codice-->
      <div class="section">
        <ul class="collapsible" data-collapsible="accordion">
          <li>
            <div id="example" class="collapsible-header"><i class="material-icons">new_releases</i>Iterations' count for any number: n</div>
            <div class="collapsible-body white">
              <div class="row">
                <div class="col s12 m8 l6">
                  <span>Script (Python):</span><br><span><?php echo $geshi->parse_code(); ?></span>
                </div>
                <div class="col s12 m4 l6">
                  <span>Output:</span><br><span>Number of iterations: 126</span>
                </div>
              </div>
            </div>
          </li>
        </ul>
      </div>

      <div class="section">
        <div class="card">
          <div class="card-content">
            <h4 class="card-title">Description</h4>
            <p><a href="../dispy">Dispy </a>will assign to each node a range of numbers to work with.</p><br>
            <p>Each node, for each number of the range, will calculate the number of iterations to reach 1. <a href="#example" onclick="document.getElementById('example').click()">An example here</a></p><br>
            <p>The graph shows the number of iterations (X) and the frequency of each of them (Y).</p>
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

  <!--Screen orientation reloader and controls-->
  <script type="text/javascript">

  if(window.innerHeight > window.innerWidth){
    Materialize.toast('Optimized for landscape mode!', 4000)
  }
  $(window).on("orientationchange",function(){
    setTimeout(draw,500);
  });
  </script>
</body>
</html>
