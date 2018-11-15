<?php
function ConnectDB()
{
    $mysqli = new mysqli("localhost", "root" , "" , "abp_project");
    	
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