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
<?php include "user.php"; ?>
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
        <li><a href="home.php">Home</a></li>
        <li><a href="booking.php?user=<?php echo getUsername(); ?>">Booking</a></li>
        <li><a href="#">Help</a></li>
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
      <div class="col s12">
          <div class="card-panel">
            <h4 class="left-align">Profil</h4>
            <?php
			  if (isset($_GET['update'])){
				  if ($_GET['update'] == "success"){
			?>
            <blockquote class="green-text">User is updated</blockquote>
            <?php  
				  }
			  }
			?>
              <div class="row">
			  <?php 
			  $user = loadUsers(getUsername());
			  ?>
                <form action="proses.php" method="post" class="col s12">
                  <div class="row">
                    <div class="input-field col s6">
         			  <i class="material-icons prefix">account_circle</i>
          			  <input name="firstname" id="firstname" type="text"<?php if (!isset($_GET['stat'])) { ?> disabled <?php } ?>
                      class="validate" required value="<?php echo $user[1]; ?>">
          			  <label for="firstname">First Name</label>
        			</div>
        			<div class="input-field col s6">
          			  <i class="material-icons prefix">account_circle</i>
          			  <input name="lastname" id="lastname" type="text"<?php if (!isset($_GET['stat'])) { ?> disabled <?php } ?>
                      class="validate" required value="<?php echo $user[2]; ?>">
          			  <label for="lastname">Last Name</label>
        			</div>
                  </div>
                  <div class="row">
                    <div class="input-field col s12">
                       <i class="material-icons prefix">store</i>
                       <textarea name="address" id="address"<?php if (!isset($_GET['stat'])) { ?> disabled <?php } ?>
                       class="materialize-textarea" required><?php echo $user[5]; ?></textarea>
                       <label for="address">Address</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s6">
                       <i class="material-icons prefix">business</i>
                       <input name="town" id="town" type="text"<?php if (!isset($_GET['stat'])) { ?> disabled <?php } ?>
                       class="validate" required value="<?php echo $user[6]; ?>">
                       <label for="town">Town</label>
                    </div>
                    <div class="input-field col s6">
                       <i class="material-icons prefix">language</i>
                       <input name="country" id="country" type="text"<?php if (!isset($_GET['stat'])) { ?> disabled <?php } ?>
                       class="validate" required value="<?php echo $user[7]; ?>">
                       <label for="country">Country</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s3">
                       <i class="material-icons prefix">markunread_mailbox</i>
                       <input name="postcode" id="postcode" type="text"<?php if (!isset($_GET['stat'])) { ?> disabled <?php } ?>
                       class="validate" required value="<?php echo $user[8]; ?>">
                       <label for="postcode">Postcode</label>
                    </div>
                    <div class="input-field col s9">
                       <i class="material-icons prefix">email</i>
                       <input name="email" id="email" type="email"<?php if (!isset($_GET['stat'])) { ?> disabled <?php } ?>
                       class="validate" required value="<?php echo $user[9]; ?>">
                       <label for="email">Email</label>
                    </div>
                  </div>
                  <div class="divider"></div><br>
                  <div class="row">
                    <div class="col m12">
                       <p class="center-align">
					    <?php if (isset($_GET['stat'])) { ?>
                        <button class="btn btn-block waves-effect waves-light" type="submit" name="updateUser">Update</button>
                        <?php } else { ?>
                        <a href="profil.php?stat=edit">
                          <button class="btn btn-block waves-effect waves-light" type="button">
                            Update Profile
                          </button>
                        </a>
                        <?php } ?>
                       </p>
                    </div>
                  </div>
                </form>
                <?php mysql_close(); ?>
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
