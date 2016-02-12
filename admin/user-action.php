<?php
include "admin.php";
include "../user.php";

if(isset($_GET['action'])){
  if($_GET['action'] == 'edit'){ ?>
    <h4>Edit User</h4>
          <div class="row">
            <div class="col s12">
              <div class="row">
                <form action="user-action.php?page=<?php echo $_GET['page']; ?>" method="post" class="col s12">
                  <div class="row">
                    <div class="input-field col s6">
                <i class="material-icons prefix active">account_box</i>
                  <input name="firstname" id="firstname" type="text" value="<?php echo loadUsers($_GET['userid'])['firstname']; ?>" class="validate" required>
                  <label class="active" for="firstname">First Name</label>
                  <input type="hidden" name="username" value="<?php echo loadUsers($_GET['userid'])['username']; ?>">
              </div>
              <div class="input-field col s6">
                  <i class="material-icons prefix active">account_box</i>
                  <input name="lastname" id="lastname" type="text" value="<?php echo loadUsers($_GET['userid'])['lastname']; ?>" class="validate" required>
                  <label class="active" for="lastname">Last Name</label>
              </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s12">
                       <i class="material-icons prefix active">home</i>
                       <textarea name="address" id="address" class="materialize-textarea" required><?php echo loadUsers($_GET['userid'])['address']; ?></textarea>
                       <label class="active" for="address">Address</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s6">
                       <i class="material-icons prefix active">location_city</i>
                       <input name="town" id="town" type="text" value="<?php echo loadUsers($_GET['userid'])['town']; ?>" class="validate" required>
                       <label class="active" for="town">Town</label>
                    </div>
                    <div class="input-field col s6">
                       <i class="material-icons prefix active">language</i>
                       <input name="country" id="country" type="text" value="<?php echo loadUsers($_GET['userid'])['country']; ?>" class="validate" required>
                       <label class="active" for="country">Country</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s3">
                       <i class="material-icons prefix active">markunread_mailbox</i>
                       <input name="postcode" id="postcode" type="text" value="<?php echo loadUsers($_GET['userid'])['postcode']; ?>" class="validate" required>
                       <label class="active" for="postcode">Postcode</label>
                    </div>
                    <div class="input-field col s9">
                       <i class="material-icons prefix active">email</i>
                       <input name="email" id="email" type="email" value="<?php echo loadUsers($_GET['userid'])['email']; ?>" class="validate" required>
                       <label class="active" for="email">Email</label>
                    </div>
                  </div>
                  <div class="divider"></div><br>
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
    <h4>Delete User</h4>
          <div class="row">
            <div class="col s12">
              <div class="row">
                <form action="user-action.php?page=<?php echo $_GET['page']; ?>" method="post" class="col s12">
                  <div class="row">
                    <div class="input-field col s6">
                <i class="material-icons prefix active">account_box</i>
                  <input name="firstname" id="firstname" type="text" value="<?php echo loadUsers($_GET['userid'])['firstname']; ?>" class="validate" disabled>
                  <label class="active" for="firstname">First Name</label>
                  <input type="hidden" name="username" value="<?php echo loadUsers($_GET['userid'])['username']; ?>">
              </div>
              <div class="input-field col s6">
                  <i class="material-icons prefix active">account_box</i>
                  <input name="lastname" id="lastname" type="text" value="<?php echo loadUsers($_GET['userid'])['lastname']; ?>" class="validate" disabled>
                  <label class="active" for="lastname">Last Name</label>
              </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s12">
                       <i class="material-icons prefix active">home</i>
                       <textarea name="address" id="address" class="materialize-textarea" disabled><?php echo loadUsers($_GET['userid'])['address']; ?></textarea>
                       <label class="active" for="address">Address</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s6">
                       <i class="material-icons prefix active">location_city</i>
                       <input name="town" id="town" type="text" value="<?php echo loadUsers($_GET['userid'])['town']; ?>" class="validate" disabled>
                       <label class="active" for="town">Town</label>
                    </div>
                    <div class="input-field col s6">
                       <i class="material-icons prefix active">language</i>
                       <input name="country" id="country" type="text" value="<?php echo loadUsers($_GET['userid'])['country']; ?>" class="validate" disabled>
                       <label class="active" for="country">Country</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s3">
                       <i class="material-icons prefix active">markunread_mailbox</i>
                       <input name="postcode" id="postcode" type="text" value="<?php echo loadUsers($_GET['userid'])['postcode']; ?>" class="validate" disabled>
                       <label class="active" for="postcode">Postcode</label>
                    </div>
                    <div class="input-field col s9">
                       <i class="material-icons prefix active">email</i>
                       <input name="email" id="email" type="email" value="<?php echo loadUsers($_GET['userid'])['email']; ?>" class="validate" disabled>
                       <label class="active" for="email">Email</label>
                    </div>
                  </div>
                  <div class="divider"></div><br>
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
}

if (isset($_POST['edit'])){
  editUser($_POST['firstname'],$_POST['lastname'],$_POST['address'],$_POST['town'],$_POST['country'],$_POST['postcode'],
  $_POST['email'],$_POST['username']);
  $_SESSION['edit-user'] = 'success';
  header("location:user-page.php?page=".$_GET['page']);
}

if (isset($_POST['delete'])){
  removeUser($_POST['username']);
  $_SESSION['delete-user'] = 'success';
  header("location:user-page.php?page=".$_GET['page']);
}

?>

<script src="../js/jquery-2.1.1.min.js"></script>