<?php
session_start();
if(!isset($_SESSION["check"])){
   header("location: index.php");
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
</head>
<body class="grey lighten-3">

    <!--DropDown NavBar Large-->
    <ul id="dropdown1" class="dropdown-content green">
      <li><a href="#" class="white-text">Profile</a></li>
      <li><a href="#" class="white-text">Settings</a></li>
      <li class="divider"></li>
      <li><a href="logout.php" class="white-text">Logout</a></li>
    </ul>

    <!--SideNav-->
    <ul id="slide-out" class="side-nav">
      <li><a href="#">New transition<i class="material-icons">fiber_new</i></a></li>
      <li><a href="#">Show credit cards<i class="material-icons">list</i></a></li>
      <li><a href="#">Add new credit card<i class="material-icons">credit_card</i></a></li>
      <li><div class="divider"></div></li>
      <li><a href="#">Profile<i class="material-icons">person</i></a></li>
      <li><a href="#">Settings<i class="material-icons">settings</i></a></li>
      <li><a href="logout.php">Logout<i class="material-icons">exit_to_app</i></a></li>
    </ul>

    <!--NavBar-->
    <div class="navbar-fixed">
      <nav>
        <div class="nav-wrapper grey darken-3">
          <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
          <ul class="right hide-on-med-and-down">
            <li><a href="#">New transition</a></li>
            <li><a href="#">Show credit cards</a></li>
            <li><a href="#">Add new credit card</a></li>
            <li><a class="dropdown-button" href="#!" data-activates="dropdown1">Profile<i class="material-icons right">arrow_drop_down</i></a></li>
          </ul>
        </div>
      </nav>
  </div>

  <main>
    <div class="row">
  <div class="col s12 m10 l8 offset-m1 offset-l2">
    <div class="row">
      <div class="col s12 m12 l12">
        <div class="card">
          <div class="card-content">
            <div class="row">
              <div class="col s3 m3 l3">
                <img class="circle responsive-img" src="../img/avatar.png" alt="" />
              </div>
              <div class="col s9 m9 l9">
                <div class="collection">
                  <a href="#!" class="collection-item"><span class="badge">1</span>Messages</a>
                  <a href="#!" class="collection-item"><span class="new badge">4</span>Transitions</a>
                  <a href="#!" class="collection-item">Other important things</a>
                  <a href="#!" class="collection-item"><span class="badge">14</span>Spam</a>
                </div>
              </div>
            </div>
            <span class="card-title black-text">Bruce Wayne</span>
            <p>Important informations...</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
  </main>

  <!--Import jQuery before materialize.js-->
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script type="text/javascript" src="../js/materialize.min.js"></script>
  <script type="text/javascript" src="../js/init.js"></script>
  <script type="text/javascript">
    $(".button-collapse").sideNav();
    $('.dropdown-button').dropdown({
        belowOrigin: true
      }
    );
    $('.collapsible').collapsible();
  </script>
</body>
</html>
