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
  <nav class="light-green lighten-1" role="navigation">
    <div class="nav-wrapper container">
      <ul class="left hide-on-med-and-down">
        <li><a href="index.html">Home</a></li>
        <li><a href="booking.php">Booking</a></li>
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
        <li><a href="index.html">Home</a></li>
        <li><a href="booking.php">Booking</a></li>
        <li><a href="#">Help</a></li>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>
  <div class="section no-pad-bot" id="index-banner">
  <?php include "user.php"; ?>
    <div class="container">
      <div class="center-align">
        <img src="img/logo.png" width="100px" />
        <h3 class="header light-green-text" style="margin-top:0">M-TRAIN</h3>
      </div>
      <br>
      <div class="col s12">
          <div class="card-panel">
            <?php
			      if (isset($_GET['stat'])){
				      if ($_GET['stat'] == "success"){
			        ?>
              <blockquote class="green-text">User is registered</blockquote>
              <?php  
				      }
			      }
			      ?>
              <h4 class="center-align">Booking</h4><br>
              <form class="container" action="proses.php" method="post">
                <div class="row">
                  <div class="col s12">
                    <div class="row">
                      <div class="input-field col s6">
                        <input id="firstname" name="firstname" type="text" class="validate" <?php if(isset($_GET['user'])) { echo 'value="'.loadUsers(getUsername())[1].'" readonly'; } ?>>
                        <label for="firstname">First Name</label>
                      </div>
                    <div class="input-field col s6">
                      <input id="lastname" name="lastname" type="text" class="validate" <?php if(isset($_GET['user'])) { echo 'value="'.loadUsers(getUsername())[2].'" readonly'; } ?>>
                      <label for="lastname">Last Name</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col s12"><label>FROM</label></div>
                    <div class="col s6">
                      <?php
                      $koneksi = mysql_connect('localhost','root','');
                      mysql_select_db('mtrain', $koneksi);
  
                      $query ="SELECT * FROM venue GROUP BY venuelocation";
                      $mQuery = mysql_query($query);
                      ?>
                      <label>Venue Location</label>
                      <select class="browser-default" id="from" name="from_location">
                        <option value="" disabled selected>Choose Your Location</option>
                        <?php while($venue = mysql_fetch_array($mQuery)){ ?>
                        <option value="<?php echo $venue[1]; ?>"><?php echo $venue[1]; ?></option>
                        <?php } mysql_close(); ?>
                      </select>
                    </div>
                    <div id="r_from" class="col s6">
                
                    </div>
                  </div>
                  <div class="row">
                    <div class="col s12"><label>TO</label></div>
                    <div class="col s6">
                      <?php
                      $koneksi = mysql_connect('localhost','root','');
                      mysql_select_db('mtrain', $koneksi);
  
                      $query ="SELECT * FROM venue GROUP BY venuelocation";
                      $mQuery = mysql_query($query);
                      ?>
                    <label>Venue Location</label>
                    <select class="browser-default" id="to" name="to_location">
                      <option value="" disabled selected>Choose Your Location</option>
                      <?php while($venue = mysql_fetch_array($mQuery)){ ?>
                      <option value="<?php echo $venue[1]; ?>"><?php echo $venue[1]; ?></option>
                      <?php } mysql_close(); ?>
                    </select>
                  </div>
                  <div id="r_to" class="col s6">
                
                  </div>
                </div>
                <div class="row">
                  <div class="col s12">
                    <div class="row">
                      <div class="col s3">
                        <label>Departure Date</label>
                        <input name="berangkat" type="date" class="datepicker" required>
                      </div>
                      <div class="col s6">
                        <label>Train</label>
                        <select id="train" class="browser-default" name="train">
                          <option value="" disabled selected>Choose Your Train</option>
                          <?php 
                          $koneksi = mysql_connect('localhost','root','');
                          mysql_select_db('mtrain', $koneksi);

                          $query ="SELECT * FROM train GROUP BY train_name";
                          $mQuery = mysql_query($query);

                          while ($result = mysql_fetch_array($mQuery)){ 
                          ?>
                          <option value="<?php echo $result[1]; ?>"><?php echo $result[1]; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <div class="col s3">
                        <label>Check</label>
                        <button id="check" class="center-align btn btn-block waves-effect" type="button">Check</button>
                      </div>
                    </div>
                  </div>
                  <div id="r_class" class="col s12">
                    <div class="row">
                      <div class="col s6">
                        <label>Class</label>
                        <select id="class" class="browser-default" disabled>
                          <option value="" disabled selected>Choose Your Class</option>
                        </select>
                      </div>
                      <div id="departure" class="col s6">
                        <label>Departure</label>
                        <select class="browser-default" disabled>
                          <option value="" disabled selected>Choose Your Departure</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col s12">
                    <div class="row">
                      <div class="col s10"><label>Type</label></div>
                      <div class="col s2"><label>Person</label></div>
                      <div class="col s5">
                        <p>
                          <input name="type" type="radio" id="group" value="Group" /> 
                          <label for="group" class="black-text">Group</label>
                        </p>
                      </div>
                      <div class="col s5">
                        <p>
                          <input name="type" type="radio" id="individu" value="Individu" />
                          <label for="individu" class="black-text">Individu</label>
                        </p>
                      </div>
                      <div class="col s2">
                        <select class="browser-default" id="persons" name="persons" disabled>
                          <?php for ($i = 1; $i <= 10; $i++) { ?>
                          <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row" id="r_cs">
              
                </div>
                <div class="row">
                  <div class="col s12"><label>Total Price</label></div>
                  <div class="col s4">
                    <button class="btn btn-block waves-effect waves-light green lighten-1" type="button" id="calculate">Calculate</button>
                  </div>
                  <div class="col s8">
                    <blockquote style="margin: 0; margin-top: -20px"><h4 id="price">Rp. 0,-</h4></blockquote>
                  </div>
                </div>
                <div class="row">
                  <div class="col m12">
                    <p class="center-align">
                      <button id="booking" class="btn btn-block waves-effect waves-light" type="submit" name="booking">Booking</button>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </form>
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
  <script src="js/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
  <script src="js/booking.js"></script>
  <script src="js/disable-date.js"></script>

  </body>
</html>
