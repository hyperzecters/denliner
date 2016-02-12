<?php
function addTicketType($tickettype, $price){
	$koneksi = mysql_connect('localhost','root','');
	mysql_select_db('mtrain', $koneksi);
	
	$query ="INSERT INTO ticket_type (ticket_type, price) VALUES ('$tickettype','$price')";
	$mQuery = mysql_query($query);
	mysql_close();
}

function editTicketType($newTicket_type, $newPrice, $ticket_type){
	$koneksi = mysql_connect('localhost','root','');
	mysql_select_db('mtrain', $koneksi);
	
	$query ="UPDATE ticket_type SET ticket_type='$newTicket_type', price='$newPrice' WHERE ticket_type='$ticket_type'";
	$mQuery = mysql_query($query);
	mysql_close();
}

function removeTicketType(){
	
}

function setTicketType(){
	
}

function setPrice(){
	
}

function loadTicketType($ticket_type){
	$koneksi = mysql_connect('localhost','root','');
	mysql_select_db('mtrain', $koneksi);
	
	$query ="SELECT * FROM ticket_type WHERE ticket_type='$ticket_type'";
	$mQuery = mysql_query($query);
	$result = mysql_fetch_array($mQuery);
	return $result;
	mysql_close();
}
?>