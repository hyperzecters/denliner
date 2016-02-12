<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
function addUser($firstName,$lastName,$username,$password,$address,$town,$country,$postCode,$email) {
	$koneksi = mysql_connect('localhost','root','');
	mysql_select_db('mtrain', $koneksi);
	
	$query ="INSERT INTO user(id_user, firstname, lastname, username, password, address, town, country, postcode, email) VALUES ".
			"('', '$firstName', '$lastName', '$username', '$password', '$address', '$town', '$country', '$postCode', '$email')";
	mysql_query($query);
	mysql_close();
}

function editUser($firstName,$lastName,$address,$town,$country,$postCode,$email,$username) {
	$koneksi = mysql_connect('localhost','root','');
	mysql_select_db('mtrain', $koneksi);
	
	$query = "UPDATE user SET
				firstname='$firstName',
				lastname='$lastName',
				address='$address',
				town='$town',
				country='$country',
				postcode='$postCode',
				email='$email'
			  WHERE username='$username'";
	mysql_query($query);
	mysql_close();
}

function removeUser($username) {
	$koneksi = mysql_connect('localhost','root','');
	mysql_select_db('mtrain', $koneksi);
	
	$query ="DELETE FROM user WHERE username='$username'";
	if (!mysql_query($query)){
		echo "User Delete Error : ". mysql_error();
	}
	mysql_close();
}

function getUsername() {
	if (isset($_SESSION['username'])){
		$username = $_SESSION['username'];
		return $username;
	} else {
		$koneksi = mysql_connect('localhost','root','');
		mysql_select_db('mtrain', $koneksi);
	
		$query ="SELECT username FROM user WHERE id_user='".$_SESSION['user_id']."'";
		$mQuery = mysql_query($query);
		$result = mysql_fetch_array($mQuery);
		return $result[0];
	}
	mysql_close();
}

function setUsername($username) {
	$_SESSION['username'] = $username;
}

function loadUsers($username) {
	$koneksi = mysql_connect('localhost','root','');
	mysql_select_db('mtrain', $koneksi);
	
	$query ="SELECT * FROM user WHERE username LIKE '$username'";
	$mQuery = mysql_query($query);
	$result = mysql_fetch_array($mQuery);
	return $result;
	mysql_close();
}
?>