<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <link rel="shortcut icon" href="img/logo.ico"/>
  <title>M-TRAIN</title>

  <!-- CSS  -->
  <link href="css/Material+Icons.css" type="text/css" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
<?php include "user.php" ?>
  <nav class="light-green lighten-1" role="navigation">
    <div class="nav-wrapper container">
      <ul class="left hide-on-med-and-down">
        <li><a href="home.php">Home</a></li>
        <li><a href="booking.php?user=<?php echo getUsername(); ?>">Booking</a></li>
        <li><a href="#">Help</a></li>
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
        <li><a href="home.html">Home</a></li>
        <li><a href="booking.php?user=<?php echo getUsername(); ?>">Booking</a></li>
        <li><a href="#">Help</a></li>
        <li class="divider"></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>
  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <div class="center-align">
        <img src="img/logo.png" width="100px" />
        <h3 class="header light-green-text" style="margin-top:0">M-TRAIN</h3>
      </div>
      <br>
    <div class="row">
      <div class="col s12">
        <div class="slider col s12">
          <ul class="slides">
            <li>
              <img src="img/slide1.jpg"> <!-- random image -->
              <div class="caption center-align">
                <h3>This is our big Tagline!</h3>
                <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
              </div>
            </li>
            <li>
              <img src="img/slide2.jpg"> <!-- random image -->
              <div class="caption left-align">
                <h3>Left Aligned Caption</h3>
                <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
              </div>
            </li>
            <li>
              <img src="img/slide3.jpg"> <!-- random image -->
              <div class="caption right-align">
                <h3>Right Aligned Caption</h3>
                <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col s12">
  		<ul class="collapsible" data-collapsible="accordion">
    	  <li>
      		<div class="collapsible-header"><i class="material-icons prefix">history</i>Booking History</div>
      		<div class="collapsible-body">
            <p>Lorem ipsum dolor sit amet.</p>
            <div class="row">
              <div class="col s12 center">
                <ul class="pagination">
                  <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
                  <li class="active"><a href="#!">1</a></li>
                  <li class="waves-effect"><a href="#!">2</a></li>
                  <li class="waves-effect"><a href="#!">3</a></li>
                  <li class="waves-effect"><a href="#!">4</a></li>
                  <li class="waves-effect"><a href="#!">5</a></li>
                  <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
                </ul>
              </div>
            </div>
          </div>
    	  </li>
  		</ul>
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
  <script src="js/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
  <script>
  	$(document).ready(function(){
  	$('.slider').slider();
	});
  </script>

  </body>
</html>
