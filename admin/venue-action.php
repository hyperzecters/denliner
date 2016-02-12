<?php
include "admin.php";
include "../venue.php";

if(isset($_GET['action'])){
  if($_GET['action'] == 'edit'){ ?>
    <h4>Edit Venue</h4>
          <div class="row">
            <div class="col s12">
              <div class="row">
                <form action="venue-action.php?page=<?php echo $_GET['page']; ?>" method="post" class="col s12">
                  <div class="row">
                    <div class="input-field col s6">
                      <i class="material-icons prefix active">directions_railway</i>
                      <input name="venuename" id="venuename" type="text" value="<?php echo loadVenues($_GET['venueid'])['venuename']; ?>" class="validate" required>
                      <label class="active" for="venuename">Venue Name</label>
                    </div>
                    <div class="input-field col s6">
                      <i class="material-icons prefix active">place</i>
                      <input name="venuelocation" id="venuelocation" type="text" value="<?php echo loadVenues($_GET['venueid'])['venuelocation']; ?>" class="validate" required>
                      <label class="active" for="venuelocation">Venue Location</label>
                    </div>
                  </div>
                  <div class="divider"></div>
                  <div class="row">
                    <div class="col s12">
                       <p class="center-align">
                        <button class="btn btn-block waves-effect waves-light" type="submit" name="edit">Update</button>
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
    <h4>Delete Venue</h4>
          <div class="row">
            <div class="col s12">
              <div class="row">
                <form action="venue-action.php?page=<?php echo $_GET['page']; ?>" method="post" class="col s12">
                  <div class="row">
                    <div class="input-field col s6">
                      <i class="material-icons prefix active">directions_railway</i>
                      <input name="venuename" id="venuename" type="text" value="<?php echo loadVenues($_GET['venueid'])['venuename']; ?>" class="validate" disabled>
                      <input name="venuename" type="hidden" value="<?php echo loadVenues($_GET['venueid'])['venuename']; ?>">
                      <label class="active" for="venuename">Venue Name</label>
                    </div>
                    <div class="input-field col s6">
                      <i class="material-icons prefix active">place</i>
                      <input name="venuelocation" id="venuelocation" type="text" value="<?php echo loadVenues($_GET['venueid'])['venuelocation']; ?>" class="validate" disabled>
                      <label class="active" for="venuelocation">Venue Name</label>
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
    <h4>Add Venue</h4>
          <div class="row">
            <div class="col s12">
              <div class="row">
                <form action="venue-action.php?page=<?php echo $_GET['page']; ?>" method="post" class="col s12">
                  <div class="row">
                    <div class="input-field col s6">
                      <i class="material-icons prefix active">directions_railway</i>
                      <input name="venuename" id="venuename" type="text" class="validate" required>
                      <label class="active" for="venuename">Venue Name</label>
                    </div>
                    <div class="input-field col s6">
                      <i class="material-icons prefix active">place</i>
                      <input name="venuelocation" id="venuelocation" type="text" class="validate" required>
                      <label class="active" for="venuelocation">Venue Location</label>
                    </div>
                  </div>
                  <div class="divider"></div>
                  <div class="row">
                    <div class="col s12">
                       <p class="center-align">
                        <button class="btn btn-block waves-effect waves-light" type="submit" name="add">Add Venue</button>
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

if (isset($_POST['edit'])){
  editVenue($_POST['venuename'], $_POST['venuelocation'], $_GET['venueid']);
  $_SESSION['edit-venue'] = 'success';
  header("location:venue-page.php?page=".$_GET['page']);
}

if (isset($_POST['delete'])){
  removeVenue($_POST['venuename']);
  $_SESSION['delete-venue'] = 'success';
  header("location:venue-page.php?page=".$_GET['page']);
}

if (isset($_POST['add'])){
  addVenue($_POST['venuename'], $_POST['venuelocation']);
  $_SESSION['add-venue'] = 'success';
  header("location:venue-page.php?page=".$_GET['page']);
}

?>

<script src="../js/jquery-2.1.1.min.js"></script>