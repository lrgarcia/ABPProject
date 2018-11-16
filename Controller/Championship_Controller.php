<?php
	
session_start(); 
include '../Functions/Authentication.php';
if (!IsAuthenticated()){
	header('Location:../index.php');
}
include '../Model/Championship_Model.php';
include '../View/MESSAGE_View.php';

// Agui se debe meter los atributos del campeonato que ha recibido de la vista para luego crear el objeto campeonato
function get_data_championship(){
	
	$login_creator = $_SESSION['login'];
	$nombre = $_REQUEST['nombre'];
	$users = $_REQUEST['users'];
	if(isset($_REQUEST['id'])){
		$calendario = new calendario_Model($_REQUEST['id'], $login_creator, $nombre, $users);
	}
	else $calendario = new calendario_Model('', $login_creator, $nombre, $users);
	return $calendario;
	
}



/* En REQUEST ACTION se extrae que acción ha seleccionado el usuario. Si no ha sido seleccionada ninguna acción 
Hara un showcurrent por defecto
*/

if (!isset($_REQUEST['action'])){
	$_REQUEST['action'] = '';
}
Switch ($_REQUEST['action']){
	
	case 'ADD':
	// Si no se ha introducido el campeonato
		if (!$_POST){
			new calendario_ADD();
		}
		// Aqui se meterá que datos ha pillado una vez se ha hecho introducido los datos del campeonato
		else{
			$calendario = get_data_formC();
			$id = rand(1,99999);
			while(!$calendario->comprobarId($id)){
				$id = rand(1,99999);
			}
			$calendario->setId($id);
			$horario = get_data_formH($id);
			foreach($horario as $h){
				$h->ADD();
			}
			$respuesta = $calendario->ADD();
			new MESSAGE($respuesta, '../Controller/calendario_Controller.php');
		}
		break;	
	case 'EDIT':		
		if (!$_POST){
			
		}
		else{
			
			$respuesta = $calendario->EDIT();
			new MESSAGE($respuesta, '../Controller/calendario_Controller.php');
		}
		
		break;

	case 'SHOWCURRENT':
	
		break;
	default: 
		$calendario = new calendario_Model('','','','');
		$datos = $calendario->yourSurveys($_SESSION['login']);
		new Calendario_SHOWALL($datos);
		break;
}
?>