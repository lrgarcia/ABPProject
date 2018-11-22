<?php
function ConnectDB()
{
    $mysqli = new mysqli("localhost", "root" , "" , "abp_database");
    	
	if ($mysqli->connect_errno) {
		include '../View/MESSAGE_View.php';
		new MESSAGE("Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error, '../index.php');
		return false;
	}
	else{
		return $mysqli;
	}
}

?>