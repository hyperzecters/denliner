<?php
function addTicket($noTicket,$ticketName,$departure_date,$ticketType,$seat){
	$koneksi = mysql_connect('localhost','root','');
	mysql_select_db('mtrain', $koneksi);
	
	$query = "INSERT INTO `ticket` (no_ticket, ticketname, departure_date, ticket_type, seat) VALUES ".
			"('$noTicket', '$ticketName', '$departure_date', '$ticketType', '$seat')";
	if (!mysql_query($query)){
		echo "Ticket Error".mysql_error()."<br><br>";
	}
	mysql_close();
}
?>