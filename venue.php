<?php
function addVenue($venue, $location){
	$koneksi = mysql_connect('localhost','root','');
	mysql_select_db('mtrain', $koneksi);
	
	$query ="INSERT INTO venue (venuename, venuelocation) VALUES ('$venue','$location')";
	$mQuery = mysql_query($query);
	mysql_close();
}

function editVenue($newVenue, $newLocation, $venue){
	$koneksi = mysql_connect('localhost','root','');
	mysql_select_db('mtrain', $koneksi);
	
	$query ="UPDATE venue SET venuename='$newVenue', venuelocation='$newLocation' WHERE venuename='$venue'";
	$mQuery = mysql_query($query);
	mysql_close();
}

function removeVenue($venue){
	$koneksi = mysql_connect('localhost','root','');
	mysql_select_db('mtrain', $koneksi);
	
	$query ="DELETE FROM venue WHERE venuename='$venue'";
	if (!mysql_query($query)){
		echo "Delete Value Error : ". mysql_error();
	}
	mysql_close();
}

function getVenue(){
	$koneksi = mysql_connect('localhost','root','');
	mysql_select_db('mtrain', $koneksi);
	
	$query ="SELECT venuename FROM venue";
	$mQuery = mysql_query($query);
	$result = mysql_fetch_array($mQuery);
	return $result;
	mysql_close();
}

function setVenue($venue){
	$_SESSION['venue'] = $venue;
}

function getLocation(){
	$koneksi = mysql_connect('localhost','root','');
	mysql_select_db('mtrain', $koneksi);
	
	$query ="SELECT venuelocation FROM venue";
	$mQuery = mysql_query($query);
	$result = mysql_fetch_array($mQuery);
	return $result;
	mysql_close();
}

function setLocation($location){
	$_SESSION['location'] = $location;
}

function loadVenues($venue){
	$koneksi = mysql_connect('localhost','root','');
	mysql_select_db('mtrain', $koneksi);
	
	$query ="SELECT * FROM venue WHERE venuename='$venue'";
	$mQuery = mysql_query($query);
	$result = mysql_fetch_array($mQuery);
	return $result;
	mysql_close();
}
?>