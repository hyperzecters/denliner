<?php
function addBooking($bookingReference, $bookingCode, $idShow, $idUser, $noTicket, $berangkat, $timeBooking){
	$koneksi = mysql_connect('localhost','root','');
	mysql_select_db('mtrain', $koneksi);
	
	$query ="INSERT INTO `booking` (booking_reference, booking_code, id_show, id_user, no_ticket, berangkat, time_booking) VALUES ".
			"('$bookingReference', '$bookingCode', '$idShow', '$idUser', '$noTicket', '$berangkat', '$timeBooking')";
	if (!mysql_query($query)){
		echo "Booking Error".mysql_error()."<br><br>";
	}
	mysql_close();
}
?>