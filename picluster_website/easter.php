<?php
  define('DB_SERVER', 'picluster.altervista.org');
  define('DB_USERNAME', 'root');
  define('DB_PASSWORD', '');
  define('DB_DATABASE', 'my_picluster');
  $conn = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE) or die('Problema connessione: '.mysqli_error());
  $result = mysqli_query($conn,"SELECT count FROM button");
  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
  $count = $row['count'];
  if (isset($_POST["aumentz"])) {
    $count=$count+1;
    mysqli_query($conn,"UPDATE button SET count=($count)");
  }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Easter Eggz</title>
  <!--Import Google Icon Font-->
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <style>
  header, main, footer {
    padding-left: 300px;
  }

  @media only screen and (max-width : 992px) {
    header, main, footer {
      padding-left: 0;
    }
  }

  </style>
</head>
<body class="grey lighten-3">
  <main class="center">
    <ul id='slide-out' class='side-nav fixed'>
      <br>
      <li><a href='index.php'>Home Page</a></li>
    </ul>
    <h2 class="center truncate" id="status">Useless Button</h2>
    <br><br><br><br>
    <form action="easter.php" method="post">
      <input class="btn indigo" name="aumentz" type="submit" value="<?php echo $count;?>" />
    </form>
  </main>
  <!--Import jQuery before materialize.js-->
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script>
</body>
</html>
