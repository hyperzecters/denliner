<?php
include "admin.php";
if(isset($_POST['submit'])){
	$username = $_POST['username'];
	$passUser = $_POST['password'];
	
	$query = "select * from admin where username='$username'";
	$koneksi = mysql_connect('localhost','root','');
	mysql_select_db('mtrain', $koneksi);
	$mQuery = mysql_query($query);
	$userCheck = mysql_fetch_array($mQuery);
	if(!$username || $userCheck['password'] != $passUser){
		header('location:index.html?login=fail');
	} else {
		setUsernameAdmin($userCheck['username']);
		header('location:home.php');
	}
}
?>