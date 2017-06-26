<?php
global $color, $footerText,$theme;
$theme = "#ff9800";
$color = "orange";
$footerText = "white-text";
?>
<html>
<head>
  <title>Cluster &pi;</title>

  <?php require_once "../phpMod/headInit.php" ?>

  <!--Libreria google per la realizzazione del grafico-->
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

  <style media="screen">
  mark{
    background-color: #FF9800;
  }
  </style>
</head>
<body class="grey lighten-2">

  <nav>
    <div id="leibniz" class="nav-wrapper orange darken-2">
      <a href="#" class="brand-logo">&nbsp;&nbsp;Leibniz formula for &pi;</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="#buffon">Pi Buffon</a></li>
      </ul>
    </div>
  </nav>
  <div class="container">
    <!--Introduction-->
    <div class="section">
      <p class="flow-text">It is also called Madhava–Leibniz series as it is a special case of a more general series expansion for the inverse tangent function, first discovered by the Indian mathematician Madhava of Sangamagrama in the 14th century. </p>
      <p class="flow-text">Following these <a href="https://en.wikipedia.org/wiki/Leibniz_formula_for_%CF%80" target="_blank">formulas</a> and this series:</p>
      <img src="../img/pil.png" alt="Leibniz formula">
      <p class="flow-text">we can easily calculate &pi;.</p>
      <p class="flow-text">But we'll obtain alaways the same value of &pi; if we use the same 'n'. For a more random calculation we can use the <a href="#buffon">Buffon's needle problem.</a></p>
      <p class="flow-text">For 'n' &lt; 10.000.000 we'll get the following table:</p>
      <table class="bordered striped centered">
        <thead>
          <th>Decimal Precision</th>
          <th>n</th>
          <th>Calculated &pi;</th>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>18</td>
            <td><mark>3,1</mark>94187</td>
          </tr>
          <tr>
            <td>2</td>
            <td>118</td>
            <td><mark>3,14</mark>9995</td>
          </tr>
          <tr>
            <td>3</td>
            <td>1.687</td>
            <td><mark>3,141</mark>000</td>
          </tr>
          <tr>
            <td>4</td>
            <td>10.793</td>
            <td><mark>3,1415</mark>00</td>
          </tr>
          <tr>
            <td>5</td>
            <td>136.120</td>
            <td><mark>3,14159</mark>9</td>
          </tr>
          <tr>
            <td>6</td>
            <td>1.530.023</td>
            <td><mark>3,141592</mark></td>
          </tr>
        </tbody>
      </table>
    </div>

    <!--Description-->
    <div class="section">
      <div class="card">
        <div class="card-content">
          <h4 class="card-title">Description</h4>
          <p><a href="../dispy">dispy </a>will assign to each node a range of the series to work with.</p><br>
          <p>Every node produce an approximation, but in the end of the execution we'll found the more accurate one.</p><br>
          <p><a href="https://github.com/brodo97/belluzziOpenDay2015-2016/blob/master/cluster_engine/clusterLeibniz.py" target="_blank">Click here </a>to see how it works.</p>
        </div>
      </div>
    </div>
  </div>
</div>

<nav>
  <div id="buffon" class="nav-wrapper amber darken-2">
    <a href="#" class="brand-logo">&nbsp;&nbsp;Buffon's needle problem</a>
    <ul id="nav-mobile" class="right hide-on-med-and-down">
      <li><a href="#leibniz">Pi Leibniz</a></li>
    </ul>
  </div>
</nav>
<div class="container">
  <!--Introduction-->
  <div class="section">
    <p class="flow-text"> Buffon's needle problem is a question first posed in the 18th century by Georges-Louis Leclerc, Comte de Buffon:</p>
    <div class="card">
      <div class="card-content">
        <p class="flow-text">Suppose we have a floor made of parallel strips of wood, each the same width, and we drop a needle onto the floor. What is the probability that the needle will lie across a line between two strips?</p>
      </div>
    </div>
    <p class="flow-text">We estimate &pi; using the following formula:</p>
    <img src="../img/pib.png" alt="Buffon Formula">
    <p class="flow-text">where 'l' is the number of needles dropped and 'tP' the number of needles across a line between two strips.</p>
    <p class="flow-text">We ask for 4 precise digit and in just four test we got this table:</p>
    <table class="bordered striped centered">
      <thead>
        <th>Decimal Precision</th>
        <th>l</th>
        <th>Calculated &pi;</th>
      </thead>
      <tbody>
        <tr>
          <td>4</td>
          <td>1.354</td>
          <td><mark>3,1415</mark>31</td>
        </tr>
        <tr>
          <td>4</td>
          <td>2.042</td>
          <td><mark>3,1415</mark>38</td>
        </tr>
        <tr>
          <td>4</td>
          <td>333</td>
          <td><mark>3,1415</mark>09</td>
        </tr>
        <tr>
          <td>4</td>
          <td>4.695</td>
          <td><mark>3,1415</mark>18</td>
        </tr>
        <tr>
          <td>6</td>
          <td>26.259</td>
          <td><mark>3,141592</mark></td>
        </tr>
      </tbody>
    </table>
    <p class="flow-text">Sometimes we only need 300 needles to reach a good approximation. But sometimes we need over 4000 needles to reach the same approximation!</p>
  </div>

  <!--Description-->
  <div class="section">
    <div class="card">
      <div class="card-content">
        <h4 class="card-title">Description</h4>
        <p><a href="../dispy">dispy </a>will assign to each node a number of needles.</p><br>
        <p>Every node produce an approximation, but in the end of the execution we'll found a more accurate one.</p><br>
        <p><a href="https://github.com/brodo97/belluzziOpenDay2015-2016/blob/master/cluster_engine/clusterBuffon.py" target="_blank">Click here </a>to see how it works.</p>
      </div>
    </div>
  </div>
</div>
</div>

<?php require_once '../phpMod/homebtn.php' ?>
<?php require_once '../phpMod/footer.php' ?>
<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="../js/materialize.min.js"></script>
<script type="text/javascript">
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
