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
          Have an Account ? 
          <a class="btn btn-block waves-effect waves-light" href="index.html">Home</a>
        </li>
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
    <div class="container">
      <div class="center-align">
        <img src="img/logo.png" width="100px" />
        <h3 class="header light-green-text" style="margin-top:0">M-TRAIN</h3>
      </div>
      <br>
      <div class="col s12">
          <div class="card-panel">
            <h4 class="left-align">Register</h4>
            <?php
			  if (isset($_GET['stat'])){
				  if ($_GET['stat'] == "success"){
			?>
            <blockquote class="green-text">User is registered</blockquote>
            <?php  
				  }
			  }
			?>
              <div class="row">
                <form action="proses.php" method="post" class="col s12">
                  <div class="row">
                    <div class="input-field col s6">
         			  <i class="material-icons prefix">account_box</i>
          			  <input name="firstname" id="firstname" type="text" class="validate" required>
          			  <label for="firstname">First Name</label>
        			</div>
        			<div class="input-field col s6">
          			  <i class="material-icons prefix">account_box</i>
          			  <input name="lastname" id="lastname" type="text" class="validate" required>
          			  <label for="lastname">Last Name</label>
        			</div>
                  </div>
                  <div class="row">
                    <div class="input-field col s6">
                       <i class="material-icons prefix">person</i>
                       <input name="username" id="username" type="text" class="validate" required>
                       <label for="username">Username</label>
                    </div>
                    <div class="input-field col s6">
                       <i class="material-icons prefix">lock</i>
                       <input name="password" id="pass" type="password" class="validate" required>
                       <label for="pass">Password</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s12">
                       <i class="material-icons prefix">home</i>
                       <textarea name="address" id="address" class="materialize-textarea" required></textarea>
                       <label for="address">Address</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s6">
                       <i class="material-icons prefix">location_city</i>
                       <input name="town" id="town" type="text" class="validate" required>
                       <label for="town">Town</label>
                    </div>
                    <div class="input-field col s6">
                       <i class="material-icons prefix">language</i>
                       <input name="country" id="country" type="text" class="validate" required>
                       <label for="country">Country</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s3">
                       <i class="material-icons prefix">markunread_mailbox</i>
                       <input name="postcode" id="postcode" type="text" class="validate" required>
                       <label for="postcode">Postcode</label>
                    </div>
                    <div class="input-field col s9">
                       <i class="material-icons prefix">email</i>
                       <input name="email" id="email" type="email" class="validate" required>
                       <label for="email">Email</label>
                    </div>
                  </div>
                  <div class="divider"></div><br>
                  <div class="row">
                    <div class="col s12">
                       <p class="center-align">
                        <button class="btn btn-block waves-effect waves-light" type="submit" name="register">Register</button>
                       </p>
                    </div>
                  </div>
                </form>
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
  <script src="js/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>
