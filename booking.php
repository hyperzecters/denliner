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
  <?php
  include "user.php";
  include "seat.php";
  include "venue.php";
  ?>

  <nav class="light-green lighten-1" role="navigation">
    <div class="nav-wrapper container">
      <ul class="left hide-on-med-and-down">
        <?php if (!isset($_GET['user'])) { ?>
        <li><a href="index.html">Home</a></li>
        <li><a href="booking.php">Booking</a></li>
        <?php } else { ?>
        <li><a href="home.php">Home</a></li>
        <li><a href="booking.php?user=<?php echo getUsername(); ?>">Booking</a></li>
        <?php } ?>
        <li><a href="#">Help</a></li>
      </ul>
      <?php if (!isset($_GET['user'])) { ?>
      <ul class="right hide-on-med-and-down">
        <li>
          Have an Account ? 
          <a class="btn btn-block waves-effect waves-light" href="index.html">Home</a>
        </li>
      </ul>
      <?php } else { ?>
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
      <?php } ?>
      <ul id="nav-mobile" class="side-nav">
        <?php if (!isset($_GET['user'])) { ?>
        <li><a href="index.html">Home</a></li>
        <li><a href="booking.php">Booking</a></li>
        <?php } else { ?>
        <li><a href="home.php">Home</a></li>
        <li><a href="booking.php?user=<?php echo getUsername(); ?>">Booking</a></li>
        <?php } ?>
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
          	<div class="row">
        	  <div class="col s8">
          		<a class="waves-effect waves-light btn btn-large" href="add-booking.php?user=<?php echo getUsername(); ?>">Add Booking</a>
        	  </div>
              <div class="col s4">
          		<nav>
    			  <div class="nav-wrapper light-green">
      				<form action="search.php?page=<?php echo $_GET['page']. "&type=booking"; ?>" method="post">
        			  <div class="input-field">
          				<input id="search" name="search" type="search">
          				<label for="search"><i class="material-icons">search</i></label>
          				<i class="material-icons">close</i>
        			  </div>
      				</form>
    			  </div>
  				</nav>
        	  </div>
            <div class="col s12">
            <?php if ((isset($_GET['stat'])) == 'success'){ ?>
              <blockquote class="green-text">Booking success</blockquote>
            <?php } ?>
            </div>
      		</div>  
            <div class="row">
              <div class="col s12">
      			    <table class="highlight">
                  <thead class="light-green lighten-1">
                    <tr>
                      <th class="white-text">Booking Code</th>
                      <th class="white-text">No Ticket</th>
                      <th class="white-text">Ticket Name</th>
                      <th class="white-text">Seat</th>
                      <th class="white-text">Time Booking</th>
                      <th class="white-text">Status</th>
                    </tr>
                  </thead>

                  <tbody>
                  <?php 
                  if ($_GET['page'] == 0) {header("location:booking.php?user=".getUsername()."&page=1");}
                  $num_rec_per_page=10;
                  $koneksi = mysql_connect('localhost','root','');
                  mysql_select_db('mtrain', $koneksi);
                  if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
                  $start_from = ($page-1) * $num_rec_per_page; 
                  $sql = "";
                  if (isset($_GET['search'])){
                    $booking_code = $_GET['search'];
                    $sql = "SELECT 
                      `booking`.`booking_code`, 
                      `booking`.`no_ticket`,
                      `booking`.`time_booking`, 
                      `ticket`.`ticketname`,
                      `show`.`seatname`,
                      `booking`.`status`
                    FROM `booking` 
                    INNER JOIN `ticket` ON `ticket`.`no_ticket` = `booking`.`no_ticket` 
                    INNER JOIN `show` ON `show`.`id_show` = `booking`.`id_show` 
                    WHERE `booking`.`booking_code` LIKE '$booking_code%'
                    ORDER BY `booking`.`time_booking` DESC 
                    LIMIT $start_from, $num_rec_per_page"; 
                  } else {
                    $sql = "SELECT 
                      `booking`.`booking_code`, 
                      `booking`.`no_ticket`,
                      `booking`.`time_booking`, 
                      `ticket`.`ticketname`,
                      `show`.`seatname`,
                      `booking`.`status`
                    FROM `booking` 
                    INNER JOIN `ticket` ON `ticket`.`no_ticket` = `booking`.`no_ticket` 
                    INNER JOIN `show` ON `show`.`id_show` = `booking`.`id_show` 
                    ORDER BY `booking`.`time_booking` DESC
                    LIMIT $start_from, $num_rec_per_page";
                  } 
                  $rs_result = mysql_query ($sql); //run the query
                  while ($result = mysql_fetch_assoc($rs_result)) { 
                  ?> 
                    <tr>
                      <td><?php echo $result['booking_code']; ?></td>
                      <td><?php echo $result['no_ticket']; ?></td>
                      <td><?php echo $result['ticketname']; ?></td>
                      <td><?php echo $result['seatname']; ?></td>
                      <td><?php echo $result['time_booking']; ?></td>
                      <td><?php echo $result['status']; ?></td>
                    </tr>
                  <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="row">
              <?php 
                $sql = "";
                if (isset($_GET['search'])){
                  $booking_code = $_GET['search'];
                  $sql = "SELECT 
                      `booking`.`booking_code`, 
                      `booking`.`no_ticket`,
                      `booking`.`time_booking`, 
                      `ticket`.`ticketname`,
                      `show`.`seatname`,
                      `booking`.`status`
                    FROM `booking` 
                    INNER JOIN `ticket` ON `ticket`.`no_ticket` = `booking`.`no_ticket` 
                    INNER JOIN `show` ON `show`.`id_show` = `booking`.`id_show` 
                    WHERE `booking`.`booking_code` LIKE '$booking_code%'
                    ORDER BY `booking`.`time_booking` DESC"; 
                } else {
                  $sql = "SELECT 
                      `booking`.`booking_code`, 
                      `booking`.`no_ticket`,
                      `booking`.`time_booking`, 
                      `ticket`.`ticketname`,
                      `show`.`seatname`,
                      `booking`.`status`
                    FROM `booking` 
                    INNER JOIN `ticket` ON `ticket`.`no_ticket` = `booking`.`no_ticket` 
                    INNER JOIN `show` ON `show`.`id_show` = `booking`.`id_show` 
                    ORDER BY `booking`.`time_booking` DESC";
                }
                $rs_result = mysql_query($sql); //run the query
                $total_records = mysql_num_rows($rs_result);  //count number of records
                $total_pages = ceil($total_records / $num_rec_per_page); ?>
                <div class="col s12 center">
                  <ul class="pagination">
                    <li class="disabled"><a href="booking.php?user=<?php echo getUsername(); ?>&page=<?php echo $_GET['page'] - 1; ?>"><i class="material-icons">chevron_left</i></a></li>
                    <?php $i = 0; for ($i=1; $i<=$total_pages; $i++) { ?>
                    <li class="<?php if(($i == $_GET['page']) || ($i == 1 && !$_GET['page'])) { echo 'active'; } else { echo 'waves-effect'; } ?>">
                      <a href="booking.php?user=<?php echo getUsername(); ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a>
                    </li>
                    <?php if ($_GET['page'] > $total_pages) {header("location:booking.php?user=<?php echo getUsername(); ?>&page=$total_pages");} } ?>
                    <li class="waves-effect"><a href="booking.php?user=<?php echo getUsername(); ?>&page=<?php echo $_GET['page'] + 1; ?>"><i class="material-icons">chevron_right</i></a></li>
                  </ul>
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
  <script src="js/booking.js"></script>

  </body>
</html>
