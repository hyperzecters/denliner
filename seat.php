<?php
function addSeat($seatname){
	$koneksi = mysql_connect('localhost','root','');
	mysql_select_db('mtrain', $koneksi);
	
	$query ="INSERT INTO seat (seatname) VALUES ('$seatname')";
	mysql_query($query);
	mysql_close();
}

function editSeat($newSeat, $seatname){
	$koneksi = mysql_connect('localhost','root','');
	mysql_select_db('mtrain', $koneksi);
	
	$query ="UPDATE seat SET seatname='$newSeat' WHERE seatname='$seatname'";
	mysql_query($query);
	mysql_close();
}

function removeSeat(){
	
}

function getSeat(){
	$koneksi = mysql_connect('localhost','root','');
	mysql_select_db('mtrain', $koneksi);
	
	$query ="SELECT * FROM seat";
	$mQuery = mysql_query($query);
	$result = mysql_fetch_array($mQuery);
	return $result[0];
	mysql_close();
}
?>