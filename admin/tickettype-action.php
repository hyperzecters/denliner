<?php
include "admin.php";
include "../tickettype.php";

if(isset($_GET['action'])){
  if($_GET['action'] == 'edit'){ ?>
    <h4>Edit Ticket Type</h4>
          <div class="row">
            <div class="col s12">
              <div class="row">
                <form action="tickettype-action.php?page=<?php echo $_GET['page']; ?>" method="post" class="col s12">
                  <div class="row">
                    <div class="input-field col s6">
                      <i class="material-icons prefix active">local_activity</i>
                      <input name="ticket_type" id="ticket_type" type="text" value="<?php echo loadTicketType($_GET['tickettypeid'])['ticket_type']; ?>" class="validate" required>
                      <label class="active" for="ticket_type">Ticket Type</label>
                    </div>
                    <div class="input-field col s6">
                      <i class="material-icons prefix active">attach_money</i>
                      <input name="price" id="price" type="text" value="<?php echo loadTicketType($_GET['tickettypeid'])['price']; ?>" class="validate" required>
                      <label class="active" for="price">Price</label>
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
  if($_GET['action'] == 'add'){ ?>
    <h4>Add Ticket Type</h4>
          <div class="row">
            <div class="col s12">
              <div class="row">
                <form action="tickettype-action.php?page=<?php echo $_GET['page']; ?>" method="post" class="col s12">
                  <div class="row">
                    <div class="input-field col s6">
                      <i class="material-icons prefix active">local_activity</i>
                      <input name="ticket_type" id="ticket_type" type="text" class="validate" required>
                      <label class="active" for="ticket_type">Ticket Type</label>
                    </div>
                    <div class="input-field col s6">
                      <i class="material-icons prefix active">attach_money</i>
                      <input name="price" id="price" type="text" class="validate" required>
                      <label class="active" for="price">Price</label>
                    </div>
                  </div>
                  <div class="divider"></div>
                  <div class="row">
                    <div class="col s12">
                       <p class="center-align">
                        <button class="btn btn-block waves-effect waves-light" type="submit" name="add">Add Ticket Type</button>
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
  editTicketType($_POST['ticket_type'], $_POST['price']);
  $_SESSION['edit-tickettype'] = 'success';
  header("location:ticket-type.php?page=".$_GET['page']);
}

if (isset($_POST['add'])){
  addTicketType($_POST['ticket_type'], $_POST['price']);
  $_SESSION['add-tickettype'] = 'success';
  header("location:ticket-type.php?page=".$_GET['page']);
}

?>

<script src="../js/jquery-2.1.1.min.js"></script>