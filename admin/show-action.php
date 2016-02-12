<?php
include "admin.php";
include "../show.php";

if(isset($_GET['action'])){
  if($_GET['action'] == 'edit'){ 
    $from_venue   = loadShows($_GET['showid'])['from_venue'];
    $to_venue     = loadShows($_GET['showid'])['to_venue'];
    $departure    = loadShows($_GET['showid'])['departure'];
    $train_name   = loadShows($_GET['showid'])['train_name'];
    $seatname     = loadShows($_GET['showid'])['seatname'];
    ?>
    <h4>Edit Show</h4>
          <div class="row">
            <div class="col s12">
              <div class="row">
                <form action="show-action.php?page=<?php echo $_GET['page']; ?>" method="post" class="col s12">
                  <div class="row">
                    <div class="col s4">
                      <label>From Venue</label>
                      <select class="browser-default" name="from_venue">
                        <option value="" disabled selected>Choose Your Venue</option>
                        <?php 
                        $koneksi = mysql_connect('localhost','root','');
                        mysql_select_db('mtrain', $koneksi);
      
                        $query ="SELECT * FROM venue";
                        $mQuery = mysql_query($query);

                        while ($result = mysql_fetch_array($mQuery)){ 
                        ?>
                        <option value="<?php echo $result[0]; ?>" <?php if($result[0] == $from_venue) {echo "selected";} ?>><?php echo $result[0]; ?></option>
                        <?php } mysql_close(); ?>
                      </select>
                    </div>
                    <div class="col s4">
                      <label>To Venue</label>
                      <select class="browser-default" name="to_venue">
                        <option value="" disabled selected>Choose Your Venue</option>
                        <?php 
                        $koneksi = mysql_connect('localhost','root','');
                        mysql_select_db('mtrain', $koneksi);
      
                        $query ="SELECT * FROM venue";
                        $mQuery = mysql_query($query);

                        while ($result = mysql_fetch_array($mQuery)){ 
                        ?>
                        <option value="<?php echo $result[0]; ?>" <?php if($result[0] == $to_venue) {echo "selected";} ?>><?php echo $result[0]; ?></option>
                        <?php } mysql_close(); ?>
                      </select>
                    </div>
                    <div class="input-field col s4">
                      <input id="departure" type="text" name="departure" value="<?php echo $departure; ?>">
                      <label class="active" for="departure">Departure</label>
                    </div>
                  </div>
                  <div class="row">
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
                        <option value="<?php echo $result[1]; ?>" <?php if($result[1] == $train_name) {echo "selected";} ?>><?php echo $result[1]; ?></option>
                        <?php } mysql_close(); ?>
                      </select>
                    </div>
                    <div class="col s3">
                      <label>Class</label>
                      <select id="class-edit" class="browser-default" name="class" disabled>
                        <option value="" disabled selected>Choose Your Class</option>
                      </select>
                    </div>
                    <div class="col s3">
                      <label>Seat</label>
                      <select class="browser-default" name="seat">
                        <option value="" disabled selected>Choose Your Seat</option>
                        <?php 
                        $koneksi = mysql_connect('localhost','root','');
                        mysql_select_db('mtrain', $koneksi);
      
                        $query ="SELECT * FROM seat";
                        $mQuery = mysql_query($query);

                        while ($result = mysql_fetch_array($mQuery)){ 
                        ?>
                        <option value="<?php echo $result[0]; ?>" <?php if($result[0] == $seatname) {echo "selected";} ?>><?php echo $result[0]; ?></option>
                        <?php } mysql_close(); ?>
                      </select>
                    </div>
                  </div>
                  <input type="hidden" name="showid" value="<?php echo $_GET['showid']; ?>">
                  <div class="divider"></div>
                  <div class="row">
                    <div class="col s12">
                       <p class="center-align">
                        <button class="btn waves-effect waves-light" type="submit" name="edit">Update</button>
                       </p>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
<?php
  }
  if($_GET['action'] == 'delete'){ ?>
    <h4>Delete Show</h4>
          <div class="row">
            <div class="col s12">
              <div class="row">
                <form action="show-action.php?page=<?php echo $_GET['page']; ?>" method="post" class="col s12">
                  <div class="row">
                    <div class="input-field col s4">
                      <input id="from_venue" class="active" type="text" name="from_venue" value="<?php echo loadShows($_GET['showid'])['from_venue']; ?>" disabled>
                      <label class="active" for="from_venue">From Venue</label>
                      <input type="hidden" name="showid" value="<?php echo $_GET['showid']; ?>">
                    </div>
                    <div class="input-field col s4">
                      <input id="to_venue" class="active" type="text" name="to_venue" value="<?php echo loadShows($_GET['showid'])['to_venue']; ?>" disabled>
                      <label class="active" for="to_venue">to Venue</label>
                    </div>
                    <div class="input-field col s4">
                      <input id="departure" class="active" type="text" name="departure" value="<?php echo loadShows($_GET['showid'])['departure']; ?>" disabled>
                      <label class="active" for="departure">Departure</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s6">
                      <input id="train" class="active" type="text" name="train" value="<?php echo loadShows($_GET['showid'])['train_name']; ?>" disabled>
                      <label class="active" for="train">Train</label>
                    </div>
                    <div class="input-field col s3">
                      <input id="class" class="active" type="text" name="class" value="<?php echo loadShows($_GET['showid'])['class']; ?>" disabled>
                      <label class="active" for="class">Class</label>
                    </div>
                    <div class="input-field col s3">
                      <input id="seat" class="active" type="text" name="seat" value="<?php echo loadShows($_GET['showid'])['seatname']; ?>" disabled>
                      <label class="active" for="seat">Seat</label>
                    </div>
                  </div>
                  <div class="divider"></div>
                  <div class="row">
                    <div class="col s12">
                       <p class="center-align">
                        <button class="btn waves-effect waves-light" type="submit" name="delete">Delete</button>
                       </p>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
<?php
  }
  if($_GET['action'] == 'add'){ ?>
    <h4>Add Show</h4>
          <div class="row">
            <div class="col s12">
              <div class="row">
                <form action="show-action.php?page=<?php echo $_GET['page']; ?>" method="post" class="col s12">
                  <div class="row">
                    <div class="col s4">
                      <label>From Venue</label>
                      <select class="browser-default" name="from_venue">
                        <option value="" disabled selected>Choose Your Venue</option>
                        <?php 
                        $koneksi = mysql_connect('localhost','root','');
                        mysql_select_db('mtrain', $koneksi);

                        $query ="SELECT * FROM venue";
                        $mQuery = mysql_query($query);

                        while ($result = mysql_fetch_array($mQuery)){ 
                        ?>
                        <option value="<?php echo $result[0]; ?>"><?php echo $result[0]; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="col s4">
                      <label>To Venue</label>
                      <select class="browser-default" name="to_venue">
                        <option value="" disabled selected>Choose Your Venue</option>
                        <?php 
                        $query ="SELECT * FROM venue";
                        $mQuery = mysql_query($query);

                        while ($result = mysql_fetch_array($mQuery)){ 
                        ?>
                        <option value="<?php echo $result[0]; ?>"><?php echo $result[0]; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="input-field col s4">
                      <input id="departure" type="text" name="departure">
                      <label for="departure">Departure</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col s6">
                      <label>Train</label>
                      <select id="train" class="browser-default" name="train">
                        <option value="" disabled selected>Choose Your Train</option>
                        <?php 
                        $query ="SELECT * FROM train GROUP BY train_name";
                        $mQuery = mysql_query($query);

                        while ($result = mysql_fetch_array($mQuery)){ 
                        ?>
                        <option value="<?php echo $result[1]; ?>"><?php echo $result[1]; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="col s3">
                      <label>Class</label>
                      <select id="class" class="browser-default" name="class" disabled>
                        <option value="" disabled selected>Choose Your Class</option>
                      </select>
                    </div>
                    <div class="col s3">
                      <label>Seat</label>
                      <select class="browser-default" name="seat">
                        <option value="" disabled selected>Choose Your Seat</option>
                        <?php 
                        $query ="SELECT * FROM seat";
                        $mQuery = mysql_query($query);

                        while ($result = mysql_fetch_array($mQuery)){ 
                        ?>
                        <option value="<?php echo $result[0]; ?>"><?php echo $result[0]; ?></option>
                        <?php } mysql_close(); ?>
                      </select>
                    </div>
                  </div>
                  <div class="divider"></div>
                  <div class="row">
                    <div class="col s12">
                       <p class="center-align">
                        <button class="btn waves-effect waves-light" type="submit" name="add">Add Show</button>
                       </p>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
<?php
  }
}

if (isset($_GET['train'])){ ?>
  <option value="" disabled selected>Choose Your Class</option>
  <?php 

  $class = loadShows($_GET['showid'])['class'];

  $koneksi = mysql_connect('localhost','root','');
  mysql_select_db('mtrain', $koneksi);
      
  $query ="SELECT class FROM train WHERE train_name='".$_GET['train']."'";
  $mQuery = mysql_query($query);

  while ($result = mysql_fetch_array($mQuery)){ 
  ?>
  <option value="<?php echo $result[0]; ?>" <?php if(isset($_GET['action']) == 'edit'){ if($result[0] == $class) {echo "selected";}} ?>>
    <?php echo $result[0]; ?>
  </option>
  <?php } mysql_close();
}

if (isset($_POST['edit'])){
  $idTrain = getIdTrainByNameClass($_POST['train'], $_POST['class']);
  $show = checkShow($_POST['from_venue'], $_POST['to_venue'], $_POST['departure'], $idTrain, $_POST['seat']);
  $_SESSION['edit-show'] = 'success';
  if ($show == 0){
    editShow($_POST['from_venue'], $_POST['to_venue'], $_POST['departure'], $idTrain, $_POST['seat'], $_POST['showid']);
    $_SESSION['edit-show'] = 'success';
    header("location:show-page.php?page=".$_GET['page']);
  } else {
    $_SESSION['edit-show'] = 'failed';
    header("location:show-page.php?page=".$_GET['page']);
  }
}

if (isset($_POST['delete'])){
  removeShow($_POST['showid']);
  $_SESSION['delete-show'] = 'success';
  header("location:show-page.php?page=".$_GET['page']);
}

if (isset($_POST['add'])){
  $idTrain = getIdTrainByNameClass($_POST['train'], $_POST['class']);
  $show = checkShow($_POST['from_venue'], $_POST['to_venue'], $_POST['departure'], $idTrain, $_POST['seat']);
  if ($show == 0){
    addShow($_POST['from_venue'], $_POST['to_venue'], $_POST['departure'], $idTrain, $_POST['seat']);
    $_SESSION['add-show'] = 'success';
    header("location:show-page.php?page=".$_GET['page']);
  } else {
    $_SESSION['add-show'] = 'failed';
    header("location:show-page.php?page=".$_GET['page']);
  }
  
}

?>

<script src="../js/jquery-2.1.1.min.js"></script>
<script src="../js/show-page.js"></script>
<script>
  var length = $('#class-edit > option').length;
    if (length == 1){
      $('#class-edit').removeAttr('disabled');
      $.ajax({    
        type: 'GET',
        url: 'show-action.php?action=edit&train='+$("#train").val(),
        dataType: 'html',                   
        success: function(response){                    
          $('#class-edit').html(response);
        }
      }); 
    }
    $("#train").change(function(){
      $('#class').removeAttr('disabled');
      $.ajax({    
        type: 'GET',
        url: 'show-action.php?train='+$("#train").val(),
        dataType: 'html',                   
        success: function(response){                    
          $('#class').html(response);
        }
      }); 
    });
</script>