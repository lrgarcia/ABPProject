<?php
	
session_start(); 
require_once '../Functions/Authentication.php';
require_once '../Model/User_Model.php';
require_once '../Model/User.php';
require_once '../View/User_ADD_View.php';	
require_once '../View/MESSAGE_View.php';

function get_data_form(){

	

	$name = $_REQUEST['name'];
	$surname = $_REQUEST['surname'];
	$login = $_REQUEST['login'];
	$password = $_REQUEST['password'];
	$email = $_REQUEST['email'];
	$type = $_REQUEST['type'];
    

	$user = new User(null,$login,$password,$name,$surname,$email,$type);
	return $user;

	
}

if (!isset($_REQUEST['action'])){
	$_REQUEST['action'] = '';
}

Switch ($_REQUEST['action']){
	
	case 'ADD':
		if (!$_POST){
			new User_ADD_View();
		}
		else{
			$user = get_data_form();
			$user_model= new User_Model();
			$respuesta = $user_model->ADD($user);
			new MESSAGE($respuesta, '../Controller/User_Controller.php');
		}
		break;	

	default: 
			new User_ADD_View();
}

?>

