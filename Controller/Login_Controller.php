<?php
session_start();
if(!isset($_REQUEST['login']) && !(isset($_REQUEST['password']))){
	include '../View/Login_View.php';
	$login = new Login();
}
else{
	function Login($login, $password){
		
		include_once '../Model/Access_DB.php';
		$mysqli = ConnectDB();
		$sql = "select * from usuario where login = '".$login."'";
		$result = $mysqli->query($sql);
		if ($result->num_rows == 1){ 
			$tupla = $result->fetch_array();
			if ($tupla['pass'] == $password){
				return true;
			}
			else{
				return 'La contraseña para este usuario es errónea'; 
			}
		}
		else{
	    		return "El usuario no existe";
		}
	}
	
	$respuesta = Login($_REQUEST['login'], $_REQUEST['password']);
	
	if ($respuesta == 'true'){
		session_start();
		$_SESSION['login'] = $_REQUEST['login'];
		header('Location:../index.php');
	}
	else{
		include '../View/MESSAGE_View.php';
		new MESSAGE($respuesta, '../Controller/Login_Controller.php');
	}
}
?>
