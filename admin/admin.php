<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

function addAdmin($name,$username,$password,$level) {
	$koneksi = mysql_connect('localhost','root','');
	mysql_select_db('mtrain', $koneksi);
	
	$query ="INSERT INTO admin(name,username,password,level) VALUES ".
			"('$name', '$username', '$password', '$level')";
	mysql_query($query);
	mysql_close();
}

function removeAdmin($username) {
	$koneksi = mysql_connect('localhost','root','');
	mysql_select_db('mtrain', $koneksi);
	
	$query ="DELETE FROM admin WHERE username=$username";
	mysql_query($query);
	mysql_close();
}

function getUsernameAdmin() {
	$username = $_SESSION['username'];
	return $username;
}

function setUsernameAdmin($username) {
	$_SESSION['username'] = $username;
}

function loadAdmins($username) {
	$koneksi = mysql_connect('localhost','root','');
	mysql_select_db('mtrain', $koneksi);
	
	$query ="SELECT * FROM admin WHERE username LIKE '$username'";
	$mQuery = mysql_query($query);
	$result = mysql_fetch_array($mQuery);
	return $result;
}

function getLevel(){
	$koneksi = mysql_connect('localhost','root','');
	mysql_select_db('mtrain', $koneksi);
	
	$query ="SELECT level FROM admin WHERE username='".getUsername()."'";
	$mQuery = mysql_query($query);
	$result = mysql_fetch_array($mQuery);
	return $result['level'];
	mysql_close();
}
?>