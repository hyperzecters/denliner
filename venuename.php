<?php
include 'show.php';

if (isset($_GET['location'])){
$koneksi = mysql_connect('localhost','root','');
mysql_select_db('mtrain', $koneksi);
$query ="SELECT * FROM venue WHERE venuelocation='".$_GET['venue']."'";
$mQuery = mysql_query($query);
?>

  <label>Venue Name</label>
  <select class="browser-default"<?php if ($_GET['location'] == "from"){ echo 'name="from_venue" id="from_venue"'; } else { echo 'name="to_venue"  id="to_venue"'; } ?>>
	<option value="" disabled selected>Choose Your Name</option>
	<?php while($venue = mysql_fetch_array($mQuery)){ ?>
	<option value="<?php echo $venue[0]; ?>"><?php echo $venue[0]; ?></option>
	<?php } ?>
  </select>

<?php
mysql_close();
}

if (isset($_GET['getclass'])) { 
  $train  = $_GET['train'];
  ?>
  <div class="row">
    <div class="col s6">
      <label>Class</label>
      <select class="browser-default tickettype" name="tickettype" onchange="
        $.ajax({    //create an ajax request to load_page.php
          type: 'GET',
          url: 'venuename.php?getdeparture=&class='+$(this).val()+'&from='+$('#from_venue').val()+'&to='+$('#to_venue').val()+'&train='+
          $('#train').val(), 
          dataType: 'html',   //expect html to be returned                
          success: function(response){                    
            $('#departure').html(response);
          }
        });">
        <option value="" disabled selected>Choose Your Class</option>
        <?php 
        $koneksi = mysql_connect('localhost','root','');
        mysql_select_db('mtrain', $koneksi);
  
        $query ="SELECT `class` FROM `train` WHERE train_name='$train'";
        $mQuery = mysql_query($query);

        while ($result = mysql_fetch_array($mQuery)){ 
        ?>
        <option value="<?php echo $result[0]; ?>"><?php echo $result[0]; ?></option>
        <?php } mysql_close(); ?>
      </select>
    </div>
    <div id="departure" class="col s6">
      <label>Departure</label>
      <select class="browser-default" disabled>
        <option value="" disabled selected>Choose Your Departure</option>
      </select>
    </div>
  </div>
<?php
}

if (isset($_GET['getdeparture'])) { 
  $train  = $_GET['train'];
  $from   = $_GET['from'];
  $to     = $_GET['to'];
  $class  = $_GET['class'];
  $id_train = getIdTrainByNameClass($train, $class);
  ?>
  <label>Departure</label>
  <select class="browser-default" name="departure">
    <option value="" disabled selected>Choose Your Departure</option>
    <?php 
    $koneksi = mysql_connect('localhost','root','');
    mysql_select_db('mtrain', $koneksi);
  
    $query ="SELECT `departure` FROM `show` WHERE 
    `train`='$id_train' AND 
    `from_venue`='$from' AND 
    `to_venue`='$to' 
    GROUP BY `departure`";
    $mQuery = mysql_query($query);

    while ($result = mysql_fetch_array($mQuery)){ 
    ?>
    <option value="<?php echo $result[0]; ?>"><?php echo $result[0]; ?></option>
    <?php } mysql_close(); ?>
  </select>
<?php
}

if (isset($_GET['persons'])) {
  $train      = $_GET['train'];
  $class      = $_GET['class'];
  $from       = $_GET['from'];
  $to         = $_GET['to'];
  $departure  = $_GET['departure'];
  $id_train   = getIdTrainByNameClass($train, $class);
	for($i = 1; $i <= $_GET['persons']; $i++){
?>
        	    <div class="col s4">
          		  <label>Seat <?php echo $i; ?></label>
    			      <select class="browser-default" name="seat<?php echo $i; ?>">
      				    <option value="" disabled selected>Choose Your Seat</option>
                  <?php 
                  $koneksi = mysql_connect('localhost','root','');
                  mysql_select_db('mtrain', $koneksi);
  
                  $query ="SELECT `seatname` FROM `show` WHERE 
                      `from_venue`='$from' AND
                      `to_venue`='$to' AND
                      `departure`='$departure' AND
                      `train`='$id_train' AND
                      `status`='UNBOOKED' GROUP BY `seatname`";
                  $mQuery = mysql_query($query);

                  while ($result = mysql_fetch_array($mQuery)){ 
                  ?>
                  <option value="<?php echo $result[0]; ?>"><?php echo $result[0]; ?></option>
                  <?php } mysql_close(); ?>
    			      </select>
        	    </div>
<?php
    }
}
?>
<script src="js/jquery-2.1.1.min.js"></script>