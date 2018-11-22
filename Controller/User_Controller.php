<?php
	
session_start(); 
include '../Functions/Authentication.php';



include '../Model/User_Model.php';
include '../View/User_ADD.php';	
include '../View/MESSAGE_View.php';

function get_data_form(){



	$name = $_REQUEST['name'];
	$surname = $_REQUEST['apellidos'];
	$login = $_REQUEST['login'];
	$pass = $_REQUEST['pass'];
	$email = $_REQUEST['email'];
	$usuario = new User_Model($name,$surname,$login,$pass,$email);
	return $usuario;

	
}

if (!isset($_REQUEST['action'])){
	$_REQUEST['action'] = '';
}

Switch ($_REQUEST['action']){
	
	case 'ADD':
		if (!$_POST){
			new usuario_ADD();
		}
		else{
			$usuario = get_data_form();
			$respuesta = $usuario->ADD();
			new MESSAGE($respuesta, '../Controller/User_Controller.php');
		}
		break;	

	default: 
			new usuario_ADD();
}

?>

