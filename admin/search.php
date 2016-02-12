<?php
//ADMIN
//Search User
if (isset($_POST['search']) && $_POST['search'] != null){
	if (isset($_GET['type']) && $_GET['type'] == 'user'){
    	header("location:user-page.php?page=".$_GET['page']."&search=".$_POST['search']);
	}
  } else {
  	if (isset($_GET['type']) && $_GET['type'] == 'user'){
    	header("location:user-page.php?page=".$_GET['page']);
    }
  }

//Search Venue
if (isset($_POST['search']) && $_POST['search'] != null){
	if (isset($_GET['type']) && $_GET['type'] == 'venue') {
    	header("location:venue-page.php?page=".$_GET['page']."&search=".$_POST['search']);
    }
  } else {
  	if (isset($_GET['type']) && $_GET['type'] == 'venue') {
    	header("location:venue-page.php?page=".$_GET['page']);
    }
  }

//Search Ticket Type
if (isset($_POST['search']) && $_POST['search'] != null){
  if (isset($_GET['type']) && $_GET['type'] == 'tickettype') {
      header("location:ticket-type.php?page=".$_GET['page']."&search=".$_POST['search']);
    }
  } else {
    if (isset($_GET['type']) && $_GET['type'] == 'tickettype') {
      header("location:ticket-type.php?page=".$_GET['page']);
    }
  }

//Search Train
if (isset($_POST['search']) && $_POST['search'] != null){
  if (isset($_GET['type']) && $_GET['type'] == 'train') {
      header("location:train-page.php?page=".$_GET['page']."&search=".$_POST['search']);
    }
  } else {
    if (isset($_GET['type']) && $_GET['type'] == 'train') {
      header("location:train-page.php?page=".$_GET['page']);
    }
  }

//Search Seat
if (isset($_POST['search']) && $_POST['search'] != null){
  if (isset($_GET['type']) && $_GET['type'] == 'seat') {
      header("location:seat-page.php?page=".$_GET['page']."&search=".$_POST['search']);
    }
  } else {
    if (isset($_GET['type']) && $_GET['type'] == 'seat') {
      header("location:seat-page.php?page=".$_GET['page']);
    }
  }

//Search Show
if (isset($_POST['search']) && $_POST['search'] != null){
  if (isset($_GET['type']) && $_GET['type'] == 'show') {
      header("location:show-page.php?page=".$_GET['page']."&search=".$_POST['search']);
    }
  } else {
    if (isset($_GET['type']) && $_GET['type'] == 'show') {
      header("location:show-page.php?page=".$_GET['page']);
    }
  }
?>