<?php
session_start();
// En caso de que no se haya introducido aun el login y el password, manda a la vista de login 

if(!isset($_REQUEST['login']) && !(isset($_REQUEST['password']))){
	include '../View/Login_View.php';
	$login = new Login();
}
else{
	function Login($login, $password){
		
		include_once '../Model/Access_DB.php';
		$mysqli = ConnectDB();

		$sql = "select * from user where login = '".$login."'";
		$result = $mysqli->query($sql);
		if ($result->num_rows == 1){ 
			//Fetch to associative array
			$tupla = $result->fetch_array();
			if ($tupla['password'] == $password){
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




	function getPermission($login){
		include_once '../Model/Access_DB.php';
		$mysqli = ConnectDB();
		$toret="";

		$sql = "select * from user where login = '".$login."'";
		$result = $mysqli->query($sql);

		if ($result->num_rows == 1){ 
			//Fetch to associative array
			$tupla = $result->fetch_array();
			$toret = $tupla['type'];
			

		}
		return $toret;
		//end if

	}
	
	$respuesta = Login($_REQUEST['login'], $_REQUEST['password']);
	
	if ($respuesta == 'true'){
		session_start();
		$_SESSION['login'] = $_REQUEST['login'];
		$type= getPermission($_REQUEST['login']);

		 $_SESSION['type'] = $type;
		 var_dump($_SESSION['type']);
		 //Redirige a index que a este punto se supone que el usuario esta logeado
		header('Location:../index.php');
	}
	else{
		include '../View/MESSAGE_View.php';
		new MESSAGE($respuesta, '../Controller/Login_Controller.php');
	}
}
?>
