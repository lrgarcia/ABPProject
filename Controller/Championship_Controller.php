<?php
	
session_start(); 
include '../Functions/Authentication.php';
if (!IsAuthenticated()){
	header('Location:../index.php');
}
include '../View/Championship_ADD_View.php';

include '../Model/Championship_Model.php';
include '../View/MESSAGE_View.php';

// Agui se debe meter los atributos del campeonato que ha recibido de la vista para luego crear el objeto campeonato
function get_data_championship(){

	$login_creator = $_SESSION['login'];
	$name = $_REQUEST['name'];
	$dateStart = $_REQUEST['dateStart'];
	$dateInscriptions = $_REQUEST['dateInscriptions'];
    $championship = new calendario_Model($login_creator, $name, $dateStart,$dateInscriptions);
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
			new Championship_ADD_View();
		}
		// Aqui se meterá que datos ha pillado una vez se ha hecho introducido los datos del campeonato
		else{
			$championpionship = get_data_championship();
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