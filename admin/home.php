<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <link rel="shortcut icon" href="../img/logo.ico"/>
  <title>M-TRAIN</title>

  <!-- CSS  -->
  <link href="../css/Material+Icons.css" type="text/css" rel="stylesheet">
  <link href="../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
<?php include "admin.php"; ?>
  <nav class="light-green lighten-1" role="navigation">
    <div class="nav-wrapper container">
      <ul class="left hide-on-med-and-down">
        <li class="active"><a href="home.php">Home</a></li>
        <li><a href="user-page.php">User</a></li>
        <li><a href="ticket-type.php">Ticket Type</a></li>
        <li><a href="venue-page.php">Venue</a></li>
        <li><a href="train-page.php">Train</a></li>
        <li><a href="seat-page.php">Seat</a></li>
        <li><a href="booking.php">Booking</a></li>
      </ul>
      <ul class="right hide-on-med-and-down">
        <li>
          <a class="dropdown-button" href="#" data-activates="dropdown">
          	<i class="material-icons">perm_identity</i>
          </a>
        </li>
      </ul>
      
      <ul id="dropdown" class="dropdown-content">
    	  <li><a href="profil.php">Profil</a></li>
    	  <li class="divider"></li>
    	  <li><a href="logout.php">Logout</a></li>
  	  </ul>

      <ul id="nav-mobile" class="side-nav">
        <li><a href="home.php">Home</a></li>
        <li class="divider"></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>
  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <div class="center-align">
        <img src="../img/logo.png" width="100px" />
        <h3 class="header light-green-text" style="margin-top:0">M-TRAIN</h3>
      </div>
      <br>
    
    <div class="row">
      <div class="col s12">
      	<div class="card-panel">
          <div class="row">
            <div class="col s12 center-align">
              <h4>Admin Menu</h4>
            </div>
          </div>
          <div class="row">
            <div class="col s3 center">
              <a class="btn-large waves-effect" href="user-page.php">User Page</a>
            </div>
            <div class="col s3 center">
              <a class="btn-large waves-effect" href="ticket-type.php">Ticket Type</a>
            </div>
            <div class="col s3 center">
              <a class="btn-large waves-effect" href="venue-page.php">Venue Page</a>
            </div>
            <div class="col s3 center">
              <a class="btn-large waves-effect" href="train-page.php">Train Page</a>
            </div>
          </div>
          <div class="row">
            <div class="col s4 center">
              <a class="btn-large waves-effect" href="seat-page.php">Seat Page</a>
            </div>
            <div class="col s4 center">
              <a class="btn-large waves-effect" href="show-page.php">Show Page</a>
            </div>
            <div class="col s4 center">
              <a class="btn-large waves-effect" href="booking-page.php">Booking Page</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <footer class="page-footer light-green darken-4">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Company Bio</h5>
          <p class="grey-text text-lighten-4">We are a team of college students working on this project like it's our full time job. Any amount would help support and continue development on this project and is greatly appreciated.</p>


        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Settings</h5>
          <ul>
            <li><a class="white-text" href="#!">Link 1</a></li>
            <li><a class="white-text" href="#!">Link 2</a></li>
            <li><a class="white-text" href="#!">Link 3</a></li>
            <li><a class="white-text" href="#!">Link 4</a></li>
          </ul>
        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Contact</h5>
          <ul>
            <li class="white-text"><i class="material-icons prefix">email</i> tezamaulana.9b@gmail.com</li>
            <li class="white-text"><i class="material-icons prefix">phone</i> 08XX-XXXX-XXXX</li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
        Copyright © 2016
      </div>
    </div>
  </footer>


  <!--  Scripts-->
  <script src="../js/jquery-2.1.1.min.js"></script>
  <script src="../js/materialize.js"></script>
  <script src="../js/init.js"></script>
  <script type="text/javascript">
  $(".dropdown-button").material-select();
  </script>

  </body>
</html>
