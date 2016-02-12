<?php
function addShow($fromVenue, $toVenue, $departure, $id_train, $seat){
	$koneksi = mysql_connect('localhost','root','');
	mysql_select_db('mtrain', $koneksi);
	
	$query ="INSERT INTO `show` (from_venue, to_venue, departure, train, seatname) VALUES ".
			"('$fromVenue', '$toVenue', '$departure', '$id_train', '$seat')";
	if (!mysql_query($query)){
		echo "Show Error".mysql_error()."<br><br>";
	}
	mysql_close();
}

function editShow($fromVenue, $toVenue, $departure, $id_train, $seat, $id_show){
	$koneksi = mysql_connect('localhost','root','');
	mysql_select_db('mtrain', $koneksi);
	
	$query ="UPDATE `show` SET 
				`from_venue`= '$fromVenue', 
				`to_venue`	= '$toVenue', 
				`departure` = '$departure', 
				`train` 	= '$id_train', 
				`seatname` 	= '$seat'
			WHERE `id_show` = '$id_show'";
	if (!mysql_query($query)){
		echo "Show Error".mysql_error()."<br><br>";
	}
	mysql_close();
}

function removeShow($id_show){
	$koneksi = mysql_connect('localhost','root','');
	mysql_select_db('mtrain', $koneksi);

	$query = "DELETE FROM `show` WHERE `id_show`='$id_show'";
	if (!mysql_query($query)){
		echo "Show Error : ".mysql_error()."<br><br>";
	}
}

function getShow(){
	$show = $_SESSION['show'];
	return $show;
}

function setShow($show){
	$_SESSION['show'] = $show;
}

function loadShows($show){
	$koneksi = mysql_connect('localhost','root','');
	mysql_select_db('mtrain', $koneksi);
	
	$query ="SELECT 
                    `show`.`from_venue`,
                    `show`.`to_venue`,
                    `train`.`train_name`,
                    `train`.`class`,
                    `show`.`departure`,
                    `show`.`seatname`,
                    `show`.`status` FROM `show` INNER JOIN train ON `show`.`train`=`train`.`id_train` 
            WHERE 
            	`show`.`id_show` LIKE '$show%'";
	$mQuery = mysql_query($query);
	$result = mysql_fetch_array($mQuery);
	return $result;
	mysql_close();
}

function getIdTrainByNameClass($name, $class){
	$koneksi = mysql_connect('localhost','root','');
	mysql_select_db('mtrain', $koneksi);
	
	$query ="SELECT `id_train` FROM `train` WHERE `train_name`='$name' AND `class`='$class'";
	$mQuery = mysql_query($query);
	$result = mysql_fetch_array($mQuery);
	return $result[0];
	mysql_close();
}

function checkShow($fromVenue, $toVenue, $departure, $id_train, $seat){
	$query ="SELECT * FROM `show`  
            WHERE 
            	`from_venue`='$fromVenue'
            AND `to_venue`='$toVenue'
            AND `departure`='$departure'
            AND `train`='$id_train'
            AND `seatname`='$seat'";

	$koneksi = mysql_connect('localhost','root','');
	mysql_select_db('mtrain', $koneksi);

	$mQuery = mysql_query($query);
	$result = mysql_num_rows($mQuery);
	return $result;
	mysql_close();
}

function getIdShow($fromVenue, $toVenue, $departure, $id_train, $seat){
	$query ="SELECT `id_show` FROM `show`  
            WHERE 
            	`from_venue`='$fromVenue'
            AND `to_venue`='$toVenue'
            AND `departure`='$departure'
            AND `train`='$id_train'
            AND `seatname`='$seat'";

	$koneksi = mysql_connect('localhost','root','');
	mysql_select_db('mtrain', $koneksi);

	$mQuery = mysql_query($query);
	$result = mysql_fetch_array($mQuery);
	return $result[0];
	mysql_close();
}

function updateShowStatus($id_show){
	$koneksi = mysql_connect('localhost','root','');
	mysql_select_db('mtrain', $koneksi);
	
	$query ="UPDATE `show` SET 
				`status`= 'BOOKING'
			WHERE `id_show` = '$id_show'";
	if (!mysql_query($query)){
		echo "Show Error".mysql_error()."<br><br>";
	}
	mysql_close();
}
?>