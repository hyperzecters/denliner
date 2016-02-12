<?php
include "admin.php";
include "../tickettype.php";

function loadTrains($id_train){
  $koneksi = mysql_connect('localhost','root','');
  mysql_select_db('mtrain', $koneksi);
  
  $query ="SELECT * FROM train WHERE id_train LIKE '$id_train'";
  $mQuery = mysql_query($query);
  $result = mysql_fetch_array($mQuery);
  return $result;
  mysql_close();
}

if(isset($_GET['action'])){
  if($_GET['action'] == 'delete'){ ?>
    <h4>Delete Train</h4>
          <div class="row">
            <div class="col s12">
              <div class="row">
                <form action="train-action.php?page=<?php echo $_GET['page']; ?>" method="post" class="col s12">
                  <div class="row">
                    <div class="input-field col s6">
                      <i class="material-icons prefix active">directions_railway</i>
                      <input name="train_name" id="train_name" type="text" value="<?php echo loadTrains($_GET['trainid'])['train_name']; ?>" class="validate" disabled>
                      <input name="id_train" type="hidden" value="<?php echo $_GET['trainid']; ?>">
                      <label class="active" for="train_name">Train Name</label>
                    </div>
                    <div class="input-field col s6">
                      <i class="material-icons prefix active">class</i>
                      <input name="class" id="class" type="text" value="<?php echo loadTrains($_GET['trainid'])['class']; ?>" class="validate" disabled>
                      <label class="active" for="class">Class</label>
                    </div>
                  </div>
                  <div class="divider"></div>
                  <div class="row">
                    <div class="col s12">
                       <p class="center-align">
                        <button class="btn btn-block waves-effect waves-light" type="submit" name="delete">Delete</button>
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
    <h4>Add Train</h4>
          <div class="row">
            <div class="col s12">
              <div class="row">
                <form action="train-action.php?page=<?php echo $_GET['page']; ?>" method="post" class="col s12">
                  <div class="row">
                    <div class="input-field col s6">
                      <i class="material-icons prefix">directions_railway</i>
                      <input name="train_name" id="train_name" type="text" class="validate" required>
                      <label for="train_name">Train Name</label>
                    </div>
                    <div class="col s6" style="margin-top:-5px"><label>Class</label></div>
                    <div class="input-field col s6">
                      <select class="browser-default" name="class" style="margin-top:-15px">
                        <option value="" disabled selected>Choose Your Class</option>
                        <?php 
                        $koneksi = mysql_connect('localhost','root','');
                        mysql_select_db('mtrain', $koneksi);
    
                        $query ="SELECT * FROM ticket_type";
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
                        <button class="btn btn-block waves-effect waves-light" type="submit" name="add">Add Train</button>
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

if (isset($_POST['delete'])){
  $koneksi = mysql_connect('localhost','root','');
  mysql_select_db('mtrain', $koneksi);
  
  $query ="DELETE FROM train WHERE id_train='".$_POST['id_train']."'";
  $mQuery = mysql_query($query);
  mysql_close();
  $_SESSION['delete-train'] = 'success';
  header("location:train-page.php?page=".$_GET['page']);
}

if (isset($_POST['add'])){
  $koneksi = mysql_connect('localhost','root','');
  mysql_select_db('mtrain', $koneksi);
  
  $query ="INSERT INTO train (train_name, class) VALUES ('".$_POST['train_name']."','".$_POST['class']."')";
  $mQuery = mysql_query($query);
  mysql_close();
  $_SESSION['add-train'] = 'success';
  header("location:train-page.php?page=".$_GET['page']);
}

?>

<script src="../js/jquery-2.1.1.min.js"></script>