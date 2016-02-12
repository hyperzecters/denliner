<?php
include "user.php";
include "show.php";
include "ticket.php";
include "bookingFunction.php";

// USER PROCESS
if (isset($_POST['register'])){
	addUser($_POST['firstname'],$_POST['lastname'],$_POST['username'],$_POST['password'],$_POST['address'],$_POST['town'],
	$_POST['country'],$_POST['postcode'],$_POST['email']);
	header("location:register.php?stat=success");
}
if (isset($_POST['updateUser'])){
	editUser($_POST['firstname'],$_POST['lastname'],$_POST['address'],$_POST['town'],$_POST['country'],$_POST['postcode'],
	$_POST['email'], getUsername());
	header("location:profil.php?update=success");
}

//BOOKING PROCESS
if (isset($_POST['booking'])){
	date_default_timezone_set("Asia/Jakarta");
	$from		= $_POST['from_venue'];
	$to			= $_POST['to_venue'];
	$train		= $_POST['train'];
	$departure	= $_POST['departure'];
	$id_train	= getIdTrainByNameClass($train, $_POST['tickettype']);

	$booking_code = mt_rand(1000000000,9999999999);
	$time_booking = date("Y-m-d H:i:s");
	$user = loadUsers(getUsername());
	for ($i = 1; $i <= $_POST['persons']; $i++){
		${'booking_reference'.$i} = mt_rand(1000000000,9999999999);
		${'no_ticket'.$i} = mt_rand(1000000000,9999999999);
		${'id_show'.$i} = getIdShow($from,$to,$departure,$id_train,$_POST['seat'.$i]);

		if($_POST['persons'] > 0){
			addTicket(${'no_ticket'.$i}, $train.'('.$from.' - '.$to.')',$_POST['berangkat'], $_POST['tickettype'],$_POST['seat'.$i]);
			addBooking(${'booking_reference'.$i},$booking_code,${'id_show'.$i},$user[0],${'no_ticket'.$i},$_POST['berangkat'],$time_booking);
			updateShowStatus(${'id_show'.$i});
		}
	}
	header("location:booking.php?user=".getUsername()."&stat=success");
}
?>