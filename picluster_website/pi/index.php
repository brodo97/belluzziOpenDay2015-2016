<?php
global $color, $footerText;
$color = "orange";
$footerText = "white-text";
?>
<html>
<head>
  <title>Pi Leibniz</title>
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

  <style media="screen">
  // Only necessary for window height sized blocks.
  html, body, .block {
    height: 100%;
  }
  // Class for when element is above threshold
  .pin-top {
    position: relative;
  }

  // Class for when element is below threshold
  .pin-bottom {
    position: relative;
  }

  // Class for when element is pinned
  .pinned {
    position: fixed !important;
  }
  mark{
    background-color: #FF9800;
  }
  </style>
</head>
<body class="grey lighten-2">
  <div id="leibniz" class="block grey lighten-3">
    <nav class="pushpin" data-target="leibniz" style="top: 0px;">
      <div class="nav-wrapper orange">
        <div class="container">
          <a href="#" class="brand-logo">Leibniz formula for &pi;</a>
          <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="#buffon">Pi Buffon</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <br>
    <br>
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
    </div>
  </div>

  <div id="buffon" class="block grey lighten-3">
    <nav class="pushpin" data-target="buffon" style="top: 0px; z-index:1">
      <div class="nav-wrapper amber darken-1">
        <div class="container">
          <a href="#" class="brand-logo">Buffon's needle problem</a>
          <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="#leibniz">Pi Leibniz</a></li>
          </ul>
        </div>
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
          </tbody>
        </table>
        <p class="flow-text">Sometimes we need only 300 needles to reach a good approximation. But sometimes we need over 4000 needles to reach the same approximation!</p>
      </div>
    </div>
  </div>

  <?php require_once '../phpMod/homebtn.php' ?>
  <?php require_once '../phpMod/footer.php' ?>
  <!--Import jQuery before materialize.js-->
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script type="text/javascript" src="../js/materialize.min.js"></script>
  <script type="text/javascript">
  $(document).ready(function(){
    $('.target').pushpin();
    $('.pushpin').each(function() {
      var $this = $(this);
      var $target = $('#' + $(this).attr('data-target'));
      $this.pushpin({
        top: $target.offset().top,
        bottom: $target.offset().top + $target.outerHeight() - $this.height()
      });
    });
  });

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
