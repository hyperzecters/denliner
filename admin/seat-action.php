<?php
include "admin.php";
include "../seat.php";

if(isset($_GET['action'])){
  if($_GET['action'] == 'edit'){ ?>
    <h4>Edit Seat</h4>
          <div class="row">
            <div class="col s12">
              <div class="row">
                <form action="seat-action.php?page=<?php echo $_GET['page']; ?>" method="post" class="col s12">
                  <div class="row">
                    <div class="input-field col s6">
                      <i class="material-icons prefix active"></i>
                      <input name="seat" id="seat" type="text" value="<?php echo loadSeat($_GET['seatid']); ?>" class="validate" required>
                      <input type="hidden" name="seatid" value="<?php echo $_GET['seatid'] ?>">
                      <label class="active" for="seat">Seat Name</label>
                    </div>
                  </div>
                    <div class="col s6">
                       <p class="center-align">
                        <button class="btn btn-block waves-effect waves-light" type="submit" name="edit">Update</button>
                       </p>
                    </div>
                </form>
              </div>
            </div>
          </div>
        </div>
<?php
  }
  if($_GET['action'] == 'add'){ ?>
    <h4>Add Seat</h4>
          <div class="row">
            <div class="col s12">
              <div class="row">
                <form action="seat-action.php?page=<?php echo $_GET['page']; ?>" method="post" class="col s12">
                  <div class="row">
                    <div class="input-field col s6">
                      <i class="material-icons prefix active"></i>
                      <input name="seat" id="seat" type="text" class="validate" required>
                      <label class="active" for="seat">Seat Name</label>
                    </div>
                  </div>
                    <div class="col s6">
                       <p class="center-align">
                        <button class="btn btn-block waves-effect waves-light" type="submit" name="add">Add Seat</button>
                       </p>
                    </div>
                </form>
              </div>
            </div>
          </div>
        </div>
<?php
  }
}

if (isset($_POST['edit'])){
  editSeat($_POST['seat'], $_POST['seatid']);
  $_SESSION['edit-seat'] = 'success';
  header("location:seat-page.php?page=".$_GET['page']);
}

if (isset($_POST['add'])){
  addSeat($_POST['seat']);
  $_SESSION['add-seat'] = 'success';
  header("location:seat-page.php?page=".$_GET['page']);
}

?>

<script src="../js/jquery-2.1.1.min.js"></script>