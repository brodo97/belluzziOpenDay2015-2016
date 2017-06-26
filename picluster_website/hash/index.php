<?php
global $color, $footerText,$theme;
$theme = "#8bc34a";
$color = "light-green";
$footerText = "white-text";
include_once '../phpMod/geshi.php';
$source = 'import time

alphabet = "abcdefghijklmnopqrstuvwxyz"
base = len(alphabet)

pw = "c0af77cf8294ff93a5cdb2963ca9f038"

def hackHash(start, end, base, alphabet, pw, passwordLength):
    import hashlib
    def baseN(num, base, alpha):
        return ((num == 0) and alpha[0]) or (baseN(num // base, base, alpha).lstrip(alpha[0]) + alpha[num % base])

    for i in xrange(start, end):
        word = baseN(i, base, alphabet).rjust(passwordLength, "a")
    return time.time()

if __name__ == "__main__":

    tStart = time.time()

    maxWordNumber = base**4

    tEnd = hackHash(0, maxWordNumber, base, alphabet, pw, 5) - tStart

    print maxWordNumber/tEnd,"words/s"';
$geshi = new GeSHi($source, "python");
?>
<html>
<head>
  <title>Hash</title>

  <?php require_once "../phpMod/headInit.php" ?>

  <script type="text/javascript" src="md5.js"></script>
  <script type="text/javascript">
  function encrypt(s) {
    if(s==''){
      document.getElementById('md5Out').innerHTML = 'Output: '
    }else{
      document.getElementById('md5Out').innerHTML = 'Output: ' + md5(s)
    }
  }
  </script>
</head>
<body class="grey lighten-2">
  <main>
    <div class="container">
      <h1>Reversing hash function</h1>
      <p class="flow-text">An hash function is any function that can be used to map data of arbitrary size to data of fixed size. The values returned by a hash function are called hash values, hash codes, digests, or simply hashes.</p>
      <p class="flow-text">Hashes are strong because isn't reversible, but every string has a unique hash. So if you hash every single word you can compare it and find the original one.</p>

      <div class="section card">
        <div class="card-content">
          <h4>Hash example</h4><br>
          <p class="flow-text">MD5 hash for <b>tree</b> is: <b>c0af77cf8294ff93a5cdb2963ca9f038</b></p><br>
          <p class="flow-text">If we only use lowercase alphabet and words with length=4, we'll find the word after <b>345.544</b> hashes.</p><br>
          <p class="flow-text">If we use numbers, lowercase and uppercase alphabet, we'll fine the word after <b>4.593.832</b> hashes.</p><br>
          <p class="flow-text">With an Intel Core i5-2410M 4x2,3Ghz you can hash <b>~380.000words/s.</b></p><br>
          <div class="divider"></div>
          <div class="input-field">
            <input type="text" id="word" onkeyup="encrypt(this.value)">
            <label for="word">Encrypt your word</label>
          </div>
          <h5 id="md5Out">Output: </h5>
          <!--Esempio codice-->
          <div class="section">
            <ul class="collapsible" data-collapsible="accordion">
              <li>
                <div id="example" class="collapsible-header"><i class="material-icons">code</i>Test words processing speed</div>
                <div class="collapsible-body white">
                  <div class="row">
                    <div class="col s12 m12 l12">
                      <span>Script (Python):</span><br><span><?php echo $geshi->parse_code(); ?></span>
                    </div>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>

      <!--Description-->
      <div class="section">
        <div class="card">
          <div class="card-content">
            <h4 class="card-title">Description</h4>
            <p><a href="../dispy">dispy </a>will assign to each node a range of words to encrypt.</p><br>
            <p>Every word will be compared to the inserted hash. When the cluster find the word, it will return it.</p><br>
            <p><a href="https://github.com/brodo97/belluzziOpenDay2015-2016/blob/master/cluster_engine/clusterHash.py" target="_blank">Click here </a>to see how it works.</p>
          </div>
        </div>
      </div>
    </div>
    <?php require_once "../phpMod/homebtn.php" ?>
  </main>
  <?php require_once "../phpMod/footer.php" ?>

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
