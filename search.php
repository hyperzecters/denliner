<?php
include "user.php";
//Search Booking
if (isset($_POST['search']) && $_POST['search'] != null){
  if (isset($_GET['type']) && $_GET['type'] == 'booking') {
      header("location:booking.php?user=".getUsername()."&page=".$_GET['page']."&search=".$_POST['search']);
    }
  } else {
    if (isset($_GET['type']) && $_GET['type'] == 'booking') {
      header("location:booking.php?user=".getUsername()."&page=".$_GET['page']);
    }
  }
?>