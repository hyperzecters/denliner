<?php
if(isset($_GET['persons'])){
	$price = 0;
	if (isset($_POST['tickettype'])){
	for($i=1;$i<=$_GET['persons'];$i++){
		$koneksi = mysql_connect('localhost','root','');
		mysql_select_db('mtrain', $koneksi);
	
		$query ="SELECT price FROM ticket_type WHERE ticket_type='".$_POST['tickettype']."'";
		$mQuery = mysql_query($query);
		$result = mysql_fetch_array($mQuery);
		$price =  $price + $result[0];
	}
		echo 'Rp. '.strrev(implode('.',str_split(strrev(strval($price)),3))).',-';
	} else {
		echo 'Rp. '.strrev(implode('.',str_split(strrev(strval($price)),3))).',-';
	}
}
?>